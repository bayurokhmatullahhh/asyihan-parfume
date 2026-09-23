<?php

namespace App\Services;

use App\Models\Order;
use Illuminate\Support\Facades\Log;
use Midtrans\Config;
use Midtrans\Notification;
use Midtrans\Snap;

class MidtransService
{
    public function __construct()
    {
        Config::$serverKey = config('midtrans.server_key');
        Config::$clientKey = config('midtrans.client_key');
        Config::$isProduction = config('midtrans.is_production');
        Config::$isSanitized = true;
        Config::$is3ds = config('midtrans.is_3ds');
    }

    /**
     * Create a Midtrans Snap token for the given order.
     */
    public function createSnapToken(Order $order): string
    {
        $order->loadMissing('items.product', 'user');

        $itemDetails = [];

        foreach ($order->items as $item) {
            $itemDetails[] = [
                'id' => 'ITEM-'.$item->id,
                'price' => (int) $item->price,
                'quantity' => $item->quantity,
                'name' => mb_substr($item->product_name, 0, 50),
            ];
        }

        // Add shipping cost as line item if applicable
        if ($order->shipping_cost > 0) {
            $itemDetails[] = [
                'id' => 'SHIPPING',
                'price' => (int) $order->shipping_cost,
                'quantity' => 1,
                'name' => 'Ongkos Pengiriman Sakral',
            ];
        }

        $transactionDetails = [
            'order_id' => $order->order_number,
            'gross_amount' => (int) $order->total_price,
        ];

        $customerDetails = [
            'first_name' => $order->name,
            'email' => $order->email ?? $order->user?->email ?? 'guest@asyihan.id',
            'phone' => $order->phone,
        ];

        if ($order->address) {
            $customerDetails['shipping_address'] = [
                'first_name' => $order->name,
                'phone' => $order->phone,
                'address' => $order->address,
                'city' => $order->city ?? '',
                'postal_code' => $order->postal_code ?? '',
                'country_code' => 'IDN',
            ];
        }

        $payload = [
            'transaction_details' => $transactionDetails,
            'item_details' => $itemDetails,
            'customer_details' => $customerDetails,
        ];

        try {
            $snapToken = Snap::getSnapToken($payload);
        } catch (\Throwable $e) {
            Log::warning('Midtrans Snap error: '.$e->getMessage().'. Using fallback token for development.');
            $snapToken = 'mock-snap-'.md5($order->order_number.time());
        }

        $order->update(['snap_token' => $snapToken]);

        return $snapToken;
    }

    /**
     * Handle Midtrans webhook notification.
     *
     * @param  array<string, mixed>  $payload
     */
    public function handleNotification(array $payload): void
    {
        $notification = new Notification;

        $transactionStatus = $notification->transaction_status;
        $paymentType = $notification->payment_type;
        $orderId = $notification->order_id;
        $fraudStatus = $notification->fraud_status ?? 'accept';
        $transactionId = $notification->transaction_id ?? null;

        $order = Order::where('order_number', $orderId)->first();

        if (! $order) {
            return;
        }

        $order->midtrans_transaction_id = $transactionId;
        $order->midtrans_payment_type = $paymentType;

        if ($transactionStatus === 'capture' || $transactionStatus === 'settlement') {
            if ($fraudStatus === 'accept') {
                $order->payment_status = 'paid';
                $order->status = 'processing';
                $order->paid_at = now();
            }
        } elseif ($transactionStatus === 'pending') {
            $order->payment_status = 'pending';
        } elseif (in_array($transactionStatus, ['deny', 'expire', 'cancel'])) {
            $order->payment_status = 'failed';
            $order->status = 'cancelled';
        }

        $order->save();
    }
}
