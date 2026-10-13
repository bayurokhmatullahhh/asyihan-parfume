<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class NumerologyLead extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'full_name',
        'birth_date',
        'phone',
        'email',
        'core_number',
        'archetype_name',
        'ip_address',
        'user_agent',
    ];

    protected function casts(): array
    {
        return [
            'birth_date' => 'date',
            'core_number' => 'integer',
        ];
    }

    /**
     * The registered user who generated this lead (null for guests).
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Check whether this lead was created by a registered user.
     */
    public function isRegisteredUser(): bool
    {
        return $this->user_id !== null;
    }
}
