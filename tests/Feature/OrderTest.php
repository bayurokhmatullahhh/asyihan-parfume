<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class OrderTest extends TestCase
{
    use RefreshDatabase;

    public function test_order_page_is_accessible(): void
    {
        $response = $this->get('/order');

        $response->assertStatus(200);
        $response->assertSee('PEMESANAN ESENSI');
        $response->assertSee('Pilih Varian Esensi Sakral');
    }

    public function test_user_can_submit_order_and_redirects_to_whatsapp(): void
    {
        $orderData = [
            'name' => 'Bayu Rokhmatullah',
            'phone' => '081234567890',
            'email' => 'bayu@example.com',
            'essence_number' => 7,
            'quantity' => 2,
            'notes' => 'Tolong kirim ke Bandung',
        ];

        $response = $this->post('/order', $orderData);

        $response->assertStatus(302);
        $this->assertStringContainsString('wa.me', $response->headers->get('Location'));

        $this->assertDatabaseHas('orders', [
            'name' => 'Bayu Rokhmatullah',
            'phone' => '081234567890',
            'essence_number' => 7,
            'quantity' => 2,
            'total_price' => 2760000,
            'status' => 'pending',
        ]);
    }

    public function test_order_submission_validates_required_fields(): void
    {
        $response = $this->post('/order', []);

        $response->assertSessionHasErrors(['name', 'phone', 'essence_number', 'quantity']);
        $this->assertDatabaseCount('orders', 0);
    }

    public function test_order_submission_validates_essence_number_range(): void
    {
        $response = $this->post('/order', [
            'name' => 'Test User',
            'phone' => '081234567890',
            'essence_number' => 99, // Out of range 1-9
            'quantity' => 1,
        ]);

        $response->assertSessionHasErrors(['essence_number']);
        $this->assertDatabaseCount('orders', 0);
    }
}
