<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Order extends Model
{
    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'order_number',
        'user_id',
        'name',
        'phone',
        'email',
        'essence_number',
        'essence_name',
        'quantity',
        'total_price',
        'address',
        'city',
        'province',
        'postal_code',
        'expedition',
        'shipping_cost',
        'payment_method',
        'payment_status',
        'snap_token',
        'midtrans_transaction_id',
        'midtrans_payment_type',
        'paid_at',
        'expires_at',
        'tracking_number',
        'tracking_courier',
        'shipped_at',
        'delivered_at',
        'notes',
        'craftsman_note',
        'status',
    ];

    /**
     * The attributes that should be cast.
     */
    protected function casts(): array
    {
        return [
            'essence_number' => 'integer',
            'quantity' => 'integer',
            'total_price' => 'integer',
            'shipping_cost' => 'decimal:2',
            'paid_at' => 'datetime',
            'expires_at' => 'datetime',
            'shipped_at' => 'datetime',
            'delivered_at' => 'datetime',
        ];
    }

    protected static function booted(): void
    {
        static::creating(function ($order) {
            if (empty($order->order_number)) {
                $order->order_number = 'ASY-'.date('ymd').'-'.strtoupper(substr(uniqid(), -4));
            }

            // Set 24-hour expiration for pending orders
            if (empty($order->expires_at) && $order->payment_status === 'pending') {
                $order->expires_at = Carbon::now()->addHours(24);
            }
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function getFormattedTotalPriceAttribute(): string
    {
        return 'Rp '.number_format($this->total_price, 0, ',', '.');
    }

    /**
     * Check if order has been paid.
     */
    public function isPaid(): bool
    {
        return $this->payment_status === 'paid';
    }

    /**
     * Check if order has been shipped.
     */
    public function isShipped(): bool
    {
        return in_array($this->status, ['shipped', 'delivered']);
    }

    /**
     * Check if order has been delivered.
     */
    public function isDelivered(): bool
    {
        return $this->status === 'delivered';
    }

    /**
     * Check if order payment has expired (past 24-hour window).
     */
    public function isExpired(): bool
    {
        if ($this->isPaid() || $this->status === 'cancelled') {
            return false;
        }

        return $this->expires_at && Carbon::now()->greaterThanOrEqualTo($this->expires_at);
    }

    /**
     * Get remaining seconds until payment expiry.
     */
    public function getRemainingSecondsAttribute(): int
    {
        if (! $this->expires_at || $this->isPaid() || $this->status === 'cancelled') {
            return 0;
        }

        $remaining = Carbon::now()->diffInSeconds($this->expires_at, false);

        return max(0, (int) $remaining);
    }

    /**
     * Restore stock for all items when order is cancelled.
     */
    public function restoreStock(): void
    {
        $this->loadMissing('items');

        if ($this->items->isNotEmpty()) {
            foreach ($this->items as $item) {
                $product = $item->product_id
                    ? Product::find($item->product_id)
                    : Product::where('essence_number', $item->essence_number)->first();

                if ($product) {
                    $product->increment('stock', $item->quantity);
                }
            }
        } elseif ($this->essence_number) {
            $product = Product::where('essence_number', $this->essence_number)->first();
            if ($product) {
                $product->increment('stock', $this->quantity ?: 1);
            }
        }
    }

    /**
     * Reduce stock for all items when order is paid.
     */
    public function reduceStock(): void
    {
        $this->loadMissing('items');

        if ($this->items->isNotEmpty()) {
            foreach ($this->items as $item) {
                $product = $item->product_id
                    ? Product::find($item->product_id)
                    : Product::where('essence_number', $item->essence_number)->first();

                if ($product && $product->stock >= $item->quantity) {
                    $product->decrement('stock', $item->quantity);
                }
            }
        } elseif ($this->essence_number) {
            $product = Product::where('essence_number', $this->essence_number)->first();
            if ($product && $product->stock >= ($this->quantity ?: 1)) {
                $product->decrement('stock', $this->quantity ?: 1);
            }
        }
    }

    /**
     * Get status label in Indonesian.
     */
    public function getStatusLabelAttribute(): string
    {
        return match ($this->status) {
            'pending' => 'Menunggu Pembayaran',
            'processing' => 'Sedang Diproses',
            'shipped' => 'Dalam Pengiriman',
            'delivered' => 'Selesai Diterima',
            'cancelled' => 'Dibatalkan',
            default => ucfirst($this->status),
        };
    }

    /**
     * Get payment status label in Indonesian.
     */
    public function getPaymentStatusLabelAttribute(): string
    {
        return match ($this->payment_status) {
            'pending' => 'Belum Dibayar',
            'paid' => 'Sudah Dibayar',
            'failed' => 'Gagal',
            'expired' => 'Kedaluwarsa',
            default => ucfirst($this->payment_status),
        };
    }

    /**
     * Get the status timeline for order tracking display.
     *
     * @return array<int, array{label: string, date: string|null, active: bool, completed: bool}>
     */
    public function getStatusTimelineAttribute(): array
    {
        $statuses = ['pending', 'processing', 'shipped', 'delivered'];
        $currentIndex = array_search($this->status, $statuses);

        if ($currentIndex === false) {
            $currentIndex = -1;
        }

        return [
            [
                'label' => 'Pesanan Dibuat',
                'date' => $this->created_at?->format('d M Y, H:i'),
                'active' => $currentIndex >= 0,
                'completed' => $currentIndex > 0,
            ],
            [
                'label' => 'Pembayaran Dikonfirmasi',
                'date' => $this->paid_at?->format('d M Y, H:i'),
                'active' => $currentIndex >= 1,
                'completed' => $currentIndex > 1,
            ],
            [
                'label' => 'Dalam Pengiriman',
                'date' => $this->shipped_at?->format('d M Y, H:i'),
                'active' => $currentIndex >= 2,
                'completed' => $currentIndex > 2,
            ],
            [
                'label' => 'Pesanan Diterima',
                'date' => $this->delivered_at?->format('d M Y, H:i'),
                'active' => $currentIndex >= 3,
                'completed' => $currentIndex >= 3,
            ],
        ];
    }
}
