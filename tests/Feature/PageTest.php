<?php

namespace Tests\Feature;

use Tests\TestCase;

class PageTest extends TestCase
{
    public function test_home_page_is_accessible_and_renders_brand(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('ASYIHAN');
        $response->assertSee('EVERY SOUL');
        $response->assertSee('ESSENCE COLLECTION');
    }

    public function test_about_page_is_accessible_and_renders_philosophy(): void
    {
        $response = $this->get('/about');

        $response->assertStatus(200);
        $response->assertSee('TENTANG ASYIHAN');
        $response->assertSee('ASIH');
        $response->assertSee('Filosofi Logo ASYIHAN');
    }

    public function test_collection_page_is_accessible_and_lists_all_nine_essences(): void
    {
        $response = $this->get('/collection');

        $response->assertStatus(200);
        $response->assertSee('ESSENCE COLLECTION');
        $response->assertSee('The Leader');
        $response->assertSee('The Seeker');
        $response->assertSee('The Visionary');
    }

    public function test_essence_detail_page_is_accessible_for_valid_slug(): void
    {
        $response = $this->get('/essence/the-seeker');

        $response->assertStatus(200);
        $response->assertSee('The Seeker');
        $response->assertSee('Piramida Aroma');
        $response->assertSee('Ajian Afirmasi Jiwa');
    }

    public function test_essence_detail_page_returns_404_for_invalid_slug(): void
    {
        $response = $this->get('/essence/invalid-essence-slug-xyz');

        $response->assertStatus(404);
    }

    public function test_ajian_page_is_accessible_and_renders_rituals(): void
    {
        $response = $this->get('/ajian');

        $response->assertStatus(200);
        $response->assertSee('AJIAN');
        $response->assertSee('9 Ajian Arketipe');
    }

    public function test_contact_page_is_accessible(): void
    {
        $response = $this->get('/contact');

        $response->assertStatus(200);
        $response->assertSee('HUBUNGI KAMI');
        $response->assertSee('WhatsApp Concierge');
    }

    public function test_privacy_policy_page_is_accessible(): void
    {
        $response = $this->get('/privacy-policy');

        $response->assertStatus(200);
        $response->assertSee('PRIVACY POLICY');
        $response->assertSee('Kami menghargai privasi Anda');
        $response->assertSee('Data tidak dibagikan ke pihak ketiga tanpa izin');
    }

    public function test_terms_of_service_page_is_accessible(): void
    {
        $response = $this->get('/terms-of-service');

        $response->assertStatus(200);
        $response->assertSee('TERMS OF SERVICE');
        $response->assertSee('Dengan menggunakan layanan ini, Anda setuju');
        $response->assertSee('Konten hanya untuk penggunaan pribadi');
    }

    public function test_shipping_returns_page_is_accessible(): void
    {
        $response = $this->get('/shipping-returns');

        $response->assertStatus(200);
        $response->assertSee('SHIPPING &amp; RETURNS');
        $response->assertSee('Estimasi pengiriman: 3–7 hari kerja');
        $response->assertSee('Barang dapat dikembalikan dalam 14 hari');
    }
}
