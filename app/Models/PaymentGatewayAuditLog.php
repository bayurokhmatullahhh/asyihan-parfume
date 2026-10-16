<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PaymentGatewayAuditLog extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'gateway',
        'action',
        'environment',
        'changes',
        'ip_address',
        'user_agent',
        'created_at',
    ];

    /**
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'changes' => 'array',
            'created_at' => 'datetime',
        ];
    }

    /**
     * The user who performed the action.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Record an audit log entry. Credentials are never stored in the log.
     *
     * @param  array<string, mixed>  $changes
     */
    public static function record(
        int $userId,
        string $action,
        ?string $environment = null,
        array $changes = [],
        string $gateway = 'midtrans',
    ): self {
        return static::create([
            'user_id' => $userId,
            'gateway' => $gateway,
            'action' => $action,
            'environment' => $environment,
            'changes' => $changes,
            'ip_address' => request()->ip(),
            'user_agent' => mb_substr((string) request()->userAgent(), 0, 500),
            'created_at' => now(),
        ]);
    }

    /**
     * Human-readable action label in Indonesian.
     */
    public function getActionLabelAttribute(): string
    {
        return match ($this->action) {
            'credentials_updated' => 'Kredensial Diperbarui',
            'environment_changed' => 'Environment Dialihkan',
            'gateway_activated' => 'Gateway Diaktifkan',
            'gateway_deactivated' => 'Gateway Dinonaktifkan',
            'production_activated' => 'Production Diaktifkan',
            'settings_updated' => 'Pengaturan Diperbarui',
            'connection_tested' => 'Koneksi Diuji',
            default => ucfirst(str_replace('_', ' ', $this->action)),
        };
    }
}
