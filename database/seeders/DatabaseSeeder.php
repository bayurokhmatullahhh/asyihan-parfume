<?php

namespace Database\Seeders;

use App\Models\NumerologyLead;
use App\Models\Order;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            AdminSeeder::class,
            ProductSeeder::class,
        ]);

        // Seed sample leads for dashboard preview
        $leadsSample = [
            ['full_name' => 'Aditya Nugraha', 'birth_date' => '1990-05-14', 'phone' => '081298765432', 'email' => 'aditya@gmail.com', 'core_number' => 1, 'archetype_name' => 'Sang Penggagas'],
            ['full_name' => 'Siti Nurhaliza', 'birth_date' => '1995-11-20', 'phone' => '087812345678', 'email' => 'siti.n@yahoo.com', 'core_number' => 2, 'archetype_name' => 'Sang Diplomat'],
            ['full_name' => 'Bima Sena', 'birth_date' => '1988-03-09', 'phone' => '085699887766', 'email' => 'bima.sena@gmail.com', 'core_number' => 3, 'archetype_name' => 'Sang Komunikator'],
            ['full_name' => 'Citra Lestari', 'birth_date' => '1992-08-27', 'phone' => '081344556677', 'email' => 'citra@outlook.com', 'core_number' => 7, 'archetype_name' => 'Sang Pencari Hakikat'],
            ['full_name' => 'Dimas Prakoso', 'birth_date' => '1985-12-04', 'phone' => '082133445566', 'email' => 'dimas.p@gmail.com', 'core_number' => 8, 'archetype_name' => 'Sang Penguasa'],
            ['full_name' => 'Eka Saputra', 'birth_date' => '1998-01-19', 'phone' => '089677889900', 'email' => 'eka.s@gmail.com', 'core_number' => 9, 'archetype_name' => 'Sang Humanis'],
            ['full_name' => 'Farah Diba', 'birth_date' => '1994-07-07', 'phone' => '081211223344', 'email' => 'farah@gmail.com', 'core_number' => 7, 'archetype_name' => 'Sang Pencari Hakikat'],
            ['full_name' => 'Gilang Ramadhan', 'birth_date' => '1991-09-15', 'phone' => '085266778899', 'email' => 'gilang@gmail.com', 'core_number' => 1, 'archetype_name' => 'Sang Penggagas'],
        ];

        foreach ($leadsSample as $lead) {
            NumerologyLead::updateOrCreate(
                ['email' => $lead['email']],
                array_merge($lead, [
                    'ip_address' => '127.0.0.1',
                    'user_agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)',
                    'created_at' => now()->subDays(rand(0, 6))->subHours(rand(1, 12)),
                ])
            );
        }

        // Seed sample orders for dashboard preview
        $ordersSample = [
            [
                'name' => 'Raden Mas Arya',
                'phone' => '085712345678',
                'email' => 'customer@asyihan.id',
                'essence_number' => 7,
                'essence_name' => 'ASYIHAN ESSENCE VII — SANG PENCARI HAKIKAT',
                'quantity' => 2,
                'total_price' => 700000,
                'address' => 'Jl. Malioboro No. 88',
                'city' => 'Yogyakarta',
                'province' => 'DI Yogyakarta',
                'postal_code' => '55271',
                'expedition' => 'express',
                'payment_method' => 'qris',
                'payment_status' => 'paid',
                'status' => 'processing',
                'created_at' => now()->subHours(3),
            ],
            [
                'name' => 'Sultan Iskandar',
                'phone' => '081299998888',
                'email' => 'iskandar@kerajaan.id',
                'essence_number' => 1,
                'essence_name' => 'ASYIHAN ESSENCE I — SANG PENGGAGAS',
                'quantity' => 1,
                'total_price' => 350000,
                'address' => 'Jl. Sudirman No. 10',
                'city' => 'Jakarta Selatan',
                'province' => 'DKI Jakarta',
                'postal_code' => '12190',
                'expedition' => 'same_day',
                'shipping_cost' => 150000,
                'payment_method' => 'bca_transfer',
                'payment_status' => 'paid',
                'status' => 'completed',
                'created_at' => now()->subDays(1),
            ],
            [
                'name' => 'Putri Ayu Wandira',
                'phone' => '081377776666',
                'email' => 'putri.ayu@gmail.com',
                'essence_number' => 104,
                'essence_name' => 'Sacred Travel Discovery Set',
                'quantity' => 1,
                'total_price' => 450000,
                'address' => 'Jl. Dago Asri No. 12',
                'city' => 'Bandung',
                'province' => 'Jawa Barat',
                'postal_code' => '40135',
                'expedition' => 'express',
                'payment_method' => 'qris',
                'payment_status' => 'pending',
                'status' => 'pending',
                'created_at' => now()->subDays(2),
            ],
            [
                'name' => 'Bambang Trihatmojo',
                'phone' => '081122334455',
                'email' => 'bambang.tri@yahoo.com',
                'essence_number' => 8,
                'essence_name' => 'ASYIHAN ESSENCE VIII — SANG PENGUASA',
                'quantity' => 3,
                'total_price' => 1050000,
                'address' => 'Jl. Diponegoro No. 25',
                'city' => 'Surabaya',
                'province' => 'Jawa Timur',
                'postal_code' => '60241',
                'expedition' => 'express',
                'payment_method' => 'mandiri_transfer',
                'payment_status' => 'paid',
                'status' => 'completed',
                'created_at' => now()->subDays(4),
            ],
        ];

        foreach ($ordersSample as $orderData) {
            $created_at = $orderData['created_at'];
            unset($orderData['created_at']);
            $order = Order::create($orderData);
            $order->created_at = $created_at;
            $order->save();
        }
    }
}
