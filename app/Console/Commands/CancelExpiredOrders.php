<?php

namespace App\Console\Commands;

use App\Models\Order;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class CancelExpiredOrders extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'orders:cancel-expired';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Automatically cancel orders whose 24-hour payment window has expired';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $expiredOrders = Order::where('payment_status', 'pending')
            ->where('status', 'pending')
            ->whereNotNull('expires_at')
            ->where('expires_at', '<=', now())
            ->get();

        $count = $expiredOrders->count();

        if ($count === 0) {
            $this->info('Tidak ada pesanan kedaluwarsa yang perlu dibatalkan.');

            return self::SUCCESS;
        }

        foreach ($expiredOrders as $order) {
            $order->update([
                'payment_status' => 'expired',
                'status' => 'cancelled',
            ]);

            $order->restoreStock();

            Log::info("Pesanan #{$order->order_number} dibatalkan otomatis karena melewati batas waktu pembayaran 24 jam.");
        }

        $this->info("Berhasil membatalkan {$count} pesanan kedaluwarsa.");

        return self::SUCCESS;
    }
}
