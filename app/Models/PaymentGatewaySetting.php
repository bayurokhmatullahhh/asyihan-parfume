<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PaymentGatewaySetting extends Model
{
    protected $fillable = [
        'gateway',
        'environment',
        'merchant_name',
        'client_key',
        'server_key',
        'is_active',
        'is_3ds',
        'active_environment',
        'updated_by',
    ];

    /**
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'client_key' => 'encrypted',
            'server_key' => 'encrypted',
            'is_active' => 'boolean',
            'is_3ds' => 'boolean',
        ];
    }

    /**
     * The user who last updated this setting.
     */
    public function updater(): BelongsTo
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    /**
     * Mask a key for safe display: show first 10 chars + last 4, mask the rest.
     */
    public static function maskKey(?string $key): string
    {
        if (empty($key)) {
            return '(belum diisi)';
        }

        $length = strlen($key);

        if ($length <= 14) {
            return substr($key, 0, 4).str_repeat('•', max(0, $length - 4));
        }

        return substr($key, 0, 10).str_repeat('•', $length - 14).substr($key, -4);
    }

    /**
     * Get the active settings row for a specific gateway.
     */
    public static function getActiveConfig(string $gateway = 'midtrans'): ?self
    {
        // First, find any row for this gateway to determine active_environment
        $anySetting = static::where('gateway', $gateway)->first();

        if (! $anySetting) {
            return null;
        }

        $activeEnv = $anySetting->active_environment;

        return static::where('gateway', $gateway)
            ->where('environment', $activeEnv)
            ->first();
    }

    /**
     * Get settings for a specific gateway and environment.
     */
    public static function getConfig(string $gateway, string $environment): ?self
    {
        return static::where('gateway', $gateway)
            ->where('environment', $environment)
            ->first();
    }

    /**
     * Check if the gateway is enabled and has valid credentials.
     */
    public function hasValidCredentials(): bool
    {
        return ! empty($this->client_key) && ! empty($this->server_key);
    }

    /**
     * Validate that key prefixes match the expected environment.
     */
    public function validateKeyPrefixes(): array
    {
        $errors = [];

        if ($this->environment === 'sandbox') {
            if ($this->client_key && ! str_starts_with($this->client_key, 'SB-Mid-client-')) {
                $errors[] = 'Client Key harus diawali dengan "SB-Mid-client-" untuk environment Sandbox.';
            }
            if ($this->server_key && ! str_starts_with($this->server_key, 'SB-Mid-server-')) {
                $errors[] = 'Server Key harus diawali dengan "SB-Mid-server-" untuk environment Sandbox.';
            }
        } elseif ($this->environment === 'production') {
            if ($this->client_key && str_starts_with($this->client_key, 'SB-')) {
                $errors[] = 'Client Key Production tidak boleh diawali dengan "SB-" (prefix Sandbox).';
            }
            if ($this->server_key && str_starts_with($this->server_key, 'SB-')) {
                $errors[] = 'Server Key Production tidak boleh diawali dengan "SB-" (prefix Sandbox).';
            }
            if ($this->client_key && ! str_starts_with($this->client_key, 'Mid-client-')) {
                $errors[] = 'Client Key Production harus diawali dengan "Mid-client-".';
            }
            if ($this->server_key && ! str_starts_with($this->server_key, 'Mid-server-')) {
                $errors[] = 'Server Key Production harus diawali dengan "Mid-server-".';
            }
        }

        return $errors;
    }
}
