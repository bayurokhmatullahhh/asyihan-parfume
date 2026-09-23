<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NumerologyLead extends Model
{
    use HasFactory;

    protected $fillable = [
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
}
