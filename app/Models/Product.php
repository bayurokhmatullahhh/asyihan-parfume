<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'category',
        'category_id',
        'essence_number',
        'tagline',
        'description',
        'soul_character',
        'notes',
        'price',
        'stock',
        'volume',
        'image',
        'is_active',
        'is_featured',
    ];

    protected function casts(): array
    {
        return [
            'essence_number' => 'integer',
            'notes' => 'array',
            'price' => 'decimal:2',
            'stock' => 'integer',
            'is_active' => 'boolean',
            'is_featured' => 'boolean',
        ];
    }

    /**
     * Category this product belongs to.
     */
    public function categoryRelation(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    public function cartItems(): HasMany
    {
        return $this->hasMany(Cart::class);
    }

    public function getImageUrlAttribute(): string
    {
        if (empty($this->image)) {
            return asset('images/bottle/bottle_1.png');
        }

        if (str_starts_with($this->image, 'http://') || str_starts_with($this->image, 'https://')) {
            return $this->image;
        }

        if (str_starts_with($this->image, 'storage/')) {
            return asset($this->image);
        }

        if (str_starts_with($this->image, 'images/')) {
            return asset($this->image);
        }

        return asset('storage/'.ltrim($this->image, '/'));
    }

    public function getFormattedPriceAttribute(): string
    {
        return 'Rp '.number_format($this->price, 0, ',', '.');
    }

    /**
     * Frontend display category for order page filtering.
     */
    public function getDisplayCategoryAttribute(): string
    {
        if ($this->categoryRelation) {
            return $this->categoryRelation->slug;
        }

        return $this->category ?? 'essence';
    }

    /**
     * Badge label for the left corner of product cards.
     */
    public function getBadgeLeftAttribute(): string
    {
        if ($this->category === 'essence') {
            return 'EXTRAIT PUR 35%';
        }

        return match ($this->essence_number) {
            101 => 'AROMATIK INTENSIF',
            102 => 'KETAHANAN 30 HARI',
            103 => 'LILIN SATU MALAM',
            104 => '3 VARIANT PEMULA',
            default => strtoupper($this->category),
        };
    }

    /**
     * Badge label for the right corner of product cards.
     */
    public function getBadgeRightAttribute(): string
    {
        if ($this->category === 'essence') {
            return 'MAHAKARYA NO. '.$this->essence_number;
        }

        return match ($this->essence_number) {
            101 => 'RUANGAN & SANCTUARY',
            102 => 'DIFFUSER SAKRAL',
            103 => 'LILIN RITUAL',
            104 => 'DISCOVERY SET',
            default => strtoupper($this->category),
        };
    }

    /**
     * Display label for product category badge.
     */
    public function getDisplayLabelAttribute(): string
    {
        if ($this->category === 'essence') {
            return 'NUMEROLOGI JIWA '.$this->essence_number;
        }

        return match ($this->essence_number) {
            101 => 'PEMERSIH SAKRAL',
            102 => 'ALIRAN RITUAL',
            103 => 'PETUNJUK JIWA',
            104 => 'TRILOGI ESSENCE',
            default => strtoupper($this->category),
        };
    }

    /**
     * Product specification pills for display.
     *
     * @return array<int, string>
     */
    public function getDisplaySpecsAttribute(): array
    {
        $volume = strtoupper($this->volume ?? '50ml');

        if ($this->category === 'essence') {
            return [$volume.' FLACON'];
        }

        return match ($this->essence_number) {
            101 => [$volume.' GLASS', 'PISAH BOTOL'],
            102 => [$volume.' + BOTANICAL'],
            103 => [$volume.' BEJANA KERAMIK'],
            104 => ['3 X 10ML DISCOVERY SET'],
            default => [$volume],
        };
    }

    /**
     * Short description note for checkout summary.
     */
    public function getShortNotesDisplayAttribute(): string
    {
        if ($this->category === 'essence') {
            return ($this->volume ?? '50ml').' Extrait de Parfum • Konsentrasi 35%';
        }

        return match ($this->essence_number) {
            101 => ($this->volume ?? '100ml').' Room & Space Mist Purifier',
            102 => ($this->volume ?? '150ml').' Reed Diffuser & Botanical Sticks',
            103 => ($this->volume ?? '220g').' Scented Soy Candle Keramik Hitam',
            104 => '3 x 10ml Sacred Discovery Vials',
            default => $this->volume ?? '',
        };
    }
}
