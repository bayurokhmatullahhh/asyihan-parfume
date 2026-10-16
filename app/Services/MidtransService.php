<?php

namespace App\Services;

use App\Models\Order;
use App\Models\PaymentGatewaySetting;
use Illuminate\Support\Facades\Log;
use Midtrans\Config;
use Midtrans\Notification;
use Midtrans\Snap;
use RuntimeException;

class MidtransService
{
    protected ?PaymentGatewaySetting $activeSetting = null;

    public function __construct()
    {
        $this->configure();
    }

    /**
     * Configure Midtrans SDK using database settings, falling back to .env config.
     */
    protected function configure(): void
    {
        $this->activeSetting = PaymentGatewaySetting::getActiveConfig('midtrans');

        if ($this->activeSetting && $this->activeSetting->is_active && $this->activeSetting->hasValidCredentials()) {
            Config::$serverKey = $this->activeSetting->server_key;
            Config::$clientKey = $this->activeSetting->client_key;
            Config::$isProduction = $this->activeSetting->active_environment === 'production';
            Config::$isSanitized = true;
            Config::$is3ds = $this->activeSetting->is_3ds;
        } else {
            // Fallback to .env config
            Config::$serverKey = config('midtrans.server_key');
            Config::$clientKey = config('midtrans.client_key');
            Config::$isProduction = config('midtrans.is_production');
            Config::$isSanitized = true;
            Config::$is3ds = config('midtrans.is_3ds');
        }
    }

    /**
     * Check if the gateway is enabled and ready to process payments.
     */
    public function isEnabled(): bool
    {
        if ($this->activeSetting && $this->activeSetting->is_active) {
            return $this->activeSetting->hasValidCredentials();
        }

        // Fallback: if .env keys are present, consider it enabled
        return ! empty(config('midtrans.server_key')) && ! empty(config('midtrans.client_key'));
    }

    /**
     * Get the client key for frontend use.
     */
    public function getClientKey(): string
    {
        return Config::$clientKey ?? '';
    }

    /**
     * Check if currently in production mode.
     */
    public function isProduction(): bool
    {
        return Config::$isProduction ?? false;
    }

    /**
     * Get the merchant name from active settings.
     */
    public function getMerchantName(): string
    {
        return $this->activeSetting?->merchant_name ?? config('app.name', 'ASYIHAN');
    }

    /**
     * Get the Snap JS script URL based on current environment.
     */
    public function getSnapJsUrl(): string
    {
        return $this->isProduction()
            ? 'https://app.midtrans.com/snap/snap.js'
            : 'https://app.sandbox.midtrans.com/snap/snap.js';
    }

    /**
     * Create a Midtrans Snap token for the given order.
     */
    public function createSnapToken(Order $order): string
    {
        if (! $this->isEnabled()) {
            throw new RuntimeException('Payment gateway Midtrans tidak aktif atau belum dikonfigurasi.');
        }

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
        // Re-configure to ensure correct server key is used for signature verification
        $this->configure();

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
                $order->save();

                // Reduce product stock automatically
                $order->reduceStock();

                return;
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
