<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
