<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Services\MidtransService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

class PaymentController extends Controller
{
    public function __construct(
        protected MidtransService $midtrans
    ) {}

    /**
     * Show the Midtrans Snap payment page for an order.
     */
    public function show(Order $order): View|RedirectResponse
    {
        // Ensure order belongs to current user
        if (Auth::check() && $order->user_id !== Auth::id()) {
            abort(403);
        }

        // If already paid, redirect to order detail
        if ($order->isPaid()) {
            return redirect()->route('order.show', $order)
                ->with('info', 'Pesanan ini sudah dibayar.');
        }

        // Generate snap token if not exists
        if (! $order->snap_token) {
            $snapToken = $this->midtrans->createSnapToken($order);
        } else {
            $snapToken = $order->snap_token;
        }

        $order->loadMissing('items.product');
        $clientKey = config('midtrans.client_key');

        return view('checkout.payment', compact('order', 'snapToken', 'clientKey'));
    }

    /**
     * Handle Midtrans webhook notification (server-to-server).
     */
    public function callback(Request $request)
    {
        try {
            $this->midtrans->handleNotification($request->all());

            return response()->json(['status' => 'ok']);
        } catch (\Exception $e) {
            Log::error('Midtrans callback error: '.$e->getMessage(), [
                'payload' => $request->all(),
            ]);

            return response()->json(['status' => 'error'], 500);
        }
    }

    /**
     * Handle redirect after payment (finish/unfinish/error from Snap).
     */
    public function finish(Request $request)
    {
        $orderNumber = $request->query('order_id');
        $transactionStatus = $request->query('transaction_status', 'pending');

        $order = Order::where('order_number', $orderNumber)->first();

        if (! $order) {
            return redirect()->route('profile')->with('error', 'Pesanan tidak ditemukan.');
        }

        if ($transactionStatus === 'settlement' || $transactionStatus === 'capture') {
            return redirect()->route('order.show', $order)
                ->with('success', '✨ Pembayaran berhasil! Pesanan sakral Anda sedang diproses oleh para peracik.');
        }

        if ($transactionStatus === 'pending') {
            return redirect()->route('order.show', $order)
                ->with('info', 'Pembayaran Anda sedang diproses. Kami akan mengkonfirmasi setelah pembayaran diterima.');
        }

        return redirect()->route('order.show', $order)
            ->with('error', 'Pembayaran gagal atau dibatalkan. Silakan coba lagi.');
    }
}
