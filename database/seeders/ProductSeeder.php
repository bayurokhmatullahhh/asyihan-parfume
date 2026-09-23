<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Services\NumerologyService;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $service = new NumerologyService;
        $archetypes = $service->getAllArchetypes();

        foreach ($archetypes as $number => $item) {
            Product::updateOrCreate(
                ['essence_number' => $number, 'category' => 'essence'],
                [
                    'name' => $item['essence_name'],
                    'slug' => 'essence-'.$number.'-'.Str::slug($item['name']),
                    'category' => 'essence',
                    'essence_number' => $number,
                    'tagline' => $item['quote'] ?? 'Aroma Selaras Takdir',
                    'description' => $item['fragrance_description'] ?? $item['short_desc'],
                    'notes' => $item['notes'] ?? null,
                    'price' => $item['price'] ?? 350000,
                    'stock' => 50,
                    'volume' => '50ml',
                    'image' => $item['bottle_image'] ?? 'images/bottle/bottle_'.$number.'.png',
                    'is_active' => true,
                    'is_featured' => in_array($number, [1, 7, 9]),
                ]
            );
        }

        // Special Offerings
        $specials = [
            [
                'name' => 'Sanctuary Mist - Hening Dugo',
                'slug' => 'sanctuary-mist-hening-dugo',
                'category' => 'special',
                'essence_number' => 101,
                'tagline' => 'Pembersih Ruang Astral & Penjernih Pikiran',
                'description' => 'Kabut aromaterapi dengan ekstrak gaharu sakral, daun sirih hitam, dan kristal garam himalaya untuk memurnikan aura ruangan meditasi.',
                'price' => 350000,
                'stock' => 30,
                'volume' => '100ml',
                'image' => 'images/bottle/bottle_7.png',
                'is_active' => true,
                'is_featured' => true,
            ],
            [
                'name' => 'Reed Diffuser - Asih Rembulan',
                'slug' => 'reed-diffuser-asih-rembulan',
                'category' => 'special',
                'essence_number' => 102,
                'tagline' => 'Penyebar Kehangatan Cinta & Kedamaian Batin',
                'description' => 'Diffuser ruangan dengan wewangian melati keraton malam, ylang-ylang, dan kayu cendana langka yang mengalirkan ketentraman tiada henti.',
                'price' => 350000,
                'stock' => 25,
                'volume' => '150ml',
                'image' => 'images/bottle/bottle_2.png',
                'is_active' => true,
                'is_featured' => false,
            ],
            [
                'name' => 'Lilin Sakral - Kemurnian Surya',
                'slug' => 'lilin-sakral-kemurnian-surya',
                'category' => 'special',
                'essence_number' => 103,
                'tagline' => 'Cahaya Penyala Ambisi & Kebangkitan Jiwa',
                'description' => 'Lilin soy wax organik dengan aroma rempah keemasan kayu manis, cengkeh, dan amber murni untuk ritual permulaan hari.',
                'price' => 350000,
                'stock' => 40,
                'volume' => '200g',
                'image' => 'images/bottle/bottle_3.png',
                'is_active' => true,
                'is_featured' => false,
            ],
            [
                'name' => 'Sacred Travel Discovery Set',
                'slug' => 'sacred-travel-discovery-set',
                'category' => 'special',
                'essence_number' => 104,
                'tagline' => 'Koleksi 9 Esensi Takdir Dalam Ukuran Portabel',
                'description' => 'Kotak kayu eksklusif berisi 9 botol vial mistis (masing-masing 5ml) mewakili sembilan frekuensi jiwa alam semesta.',
                'price' => 450000,
                'stock' => 15,
                'volume' => '9 x 5ml',
                'image' => 'images/bottle/bottle_9.png',
                'is_active' => true,
                'is_featured' => true,
            ],
        ];

        foreach ($specials as $special) {
            Product::updateOrCreate(
                ['slug' => $special['slug']],
                $special
            );
        }
    }
}
