<?php

namespace Tests\Feature;

use App\Models\PaymentGatewaySetting;
use App\Models\User;
use App\Services\MidtransService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class PaymentGatewayTest extends TestCase
{
    use RefreshDatabase;

    public function test_guest_cannot_access_payment_gateway_settings(): void
    {
        $response = $this->get('/astral-gateway/payment-gateway');

        $response->assertRedirect('/login');
    }

    public function test_regular_user_cannot_access_payment_gateway_settings(): void
    {
        $user = User::factory()->create(['role' => 'user']);

        $response = $this->actingAs($user)->get('/astral-gateway/payment-gateway');

        $response->assertRedirect(route('admin.login'));
    }

    public function test_admin_can_view_settings_page_with_readonly_state(): void
    {
        $admin = User::factory()->admin()->create();

        $response = $this->actingAs($admin)->get('/astral-gateway/payment-gateway');

        $response->assertOk();
        $response->assertSee('Pengaturan Midtrans Payment Gateway');
        $response->assertSee('Mode Read-Only');
    }

    public function test_regular_admin_cannot_update_payment_gateway_settings(): void
    {
        $admin = User::factory()->admin()->create();

        $response = $this->actingAs($admin)->put('/astral-gateway/payment-gateway', [
            'is_active' => 1,
            'active_environment' => 'sandbox',
            'is_3ds' => 1,
            'sandbox_client_key' => 'SB-Mid-client-sample123',
            'sandbox_server_key' => 'SB-Mid-server-sample123',
        ]);

        $response->assertForbidden();
        $this->assertDatabaseCount('payment_gateway_settings', 0);
    }

    public function test_super_admin_can_update_sandbox_credentials_and_encrypts_them(): void
    {
        $superAdmin = User::factory()->superAdmin()->create();

        $response = $this->actingAs($superAdmin)->put('/astral-gateway/payment-gateway', [
            'is_active' => 1,
            'active_environment' => 'sandbox',
            'is_3ds' => 1,
            'sandbox_merchant_name' => 'ASYIHAN Dev',
            'sandbox_client_key' => 'SB-Mid-client-valid1234567890',
            'sandbox_server_key' => 'SB-Mid-server-secret1234567890',
        ]);

        $response->assertRedirect(route('admin.payment-gateway.index'));
        $response->assertSessionHas('success');

        $setting = PaymentGatewaySetting::where('gateway', 'midtrans')
            ->where('environment', 'sandbox')
            ->first();

        $this->assertNotNull($setting);
        $this->assertTrue($setting->is_active);
        $this->assertEquals('sandbox', $setting->active_environment);
        $this->assertEquals('SB-Mid-client-valid1234567890', $setting->client_key);
        $this->assertEquals('SB-Mid-server-secret1234567890', $setting->server_key);

        // Verify audit log created
        $this->assertDatabaseHas('payment_gateway_audit_logs', [
            'user_id' => $superAdmin->id,
            'gateway' => 'midtrans',
            'environment' => 'sandbox',
        ]);
    }

    public function test_sandbox_key_prefix_validation_rejects_invalid_keys(): void
    {
        $superAdmin = User::factory()->superAdmin()->create();

        $response = $this->actingAs($superAdmin)->put('/astral-gateway/payment-gateway', [
            'is_active' => 1,
            'active_environment' => 'sandbox',
            'is_3ds' => 1,
            'sandbox_client_key' => 'INVALID-client-key',
            'sandbox_server_key' => 'SB-Mid-server-valid',
        ]);

        $response->assertSessionHasErrors();
        $this->assertDatabaseCount('payment_gateway_settings', 0);
    }

    public function test_activating_production_requires_exact_confirmation_text_and_password(): void
    {
        $superAdmin = User::factory()->superAdmin()->create([
            'password' => Hash::make('secret-password-123'),
        ]);

        // Attempt 1: missing confirm_production text
        $response1 = $this->actingAs($superAdmin)->put('/astral-gateway/payment-gateway', [
            'is_active' => 1,
            'active_environment' => 'production',
            'is_3ds' => 1,
            'production_client_key' => 'Mid-client-prod12345',
            'production_server_key' => 'Mid-server-prod12345',
            'confirm_production' => 'salah ketik',
            'password_confirmation' => 'secret-password-123',
        ]);

        $response1->assertSessionHasErrors(['confirm_production']);

        // Attempt 2: wrong password
        $response2 = $this->actingAs($superAdmin)->put('/astral-gateway/payment-gateway', [
            'is_active' => 1,
            'active_environment' => 'production',
            'is_3ds' => 1,
            'production_client_key' => 'Mid-client-prod12345',
            'production_server_key' => 'Mid-server-prod12345',
            'confirm_production' => 'AKTIFKAN PRODUCTION',
            'password_confirmation' => 'wrong-pass',
        ]);

        $response2->assertSessionHasErrors(['password_confirmation']);

        // Attempt 3: valid confirmation and valid password
        $response3 = $this->actingAs($superAdmin)->put('/astral-gateway/payment-gateway', [
            'is_active' => 1,
            'active_environment' => 'production',
            'is_3ds' => 1,
            'production_client_key' => 'Mid-client-prod12345',
            'production_server_key' => 'Mid-server-prod12345',
            'confirm_production' => 'AKTIFKAN PRODUCTION',
            'password_confirmation' => 'secret-password-123',
        ]);

        $response3->assertRedirect(route('admin.payment-gateway.index'));
        $response3->assertSessionHas('success');

        // Check production log
        $this->assertDatabaseHas('payment_gateway_audit_logs', [
            'user_id' => $superAdmin->id,
            'action' => 'production_activated',
            'environment' => 'production',
        ]);
    }

    public function test_midtrans_service_reads_dynamically_from_database(): void
    {
        $superAdmin = User::factory()->superAdmin()->create();

        PaymentGatewaySetting::create([
            'gateway' => 'midtrans',
            'environment' => 'sandbox',
            'merchant_name' => 'ASYIHAN Dynamic Test',
            'client_key' => 'SB-Mid-client-dynamicKey123',
            'server_key' => 'SB-Mid-server-dynamicSecret123',
            'is_active' => true,
            'is_3ds' => true,
            'active_environment' => 'sandbox',
            'updated_by' => $superAdmin->id,
        ]);

        $service = app(MidtransService::class);

        $this->assertTrue($service->isEnabled());
        $this->assertEquals('SB-Mid-client-dynamicKey123', $service->getClientKey());
        $this->assertFalse($service->isProduction());
        $this->assertEquals('ASYIHAN Dynamic Test', $service->getMerchantName());
        $this->assertEquals('https://app.sandbox.midtrans.com/snap/snap.js', $service->getSnapJsUrl());
    }

    public function test_key_masking_utility_hides_sensitive_middle_part(): void
    {
        $key = 'SB-Mid-client-ABCDEFGHIJKL1234';
        $masked = PaymentGatewaySetting::maskKey($key);

        $this->assertStringStartsWith('SB-Mid-cli', $masked);
        $this->assertStringEndsWith('1234', $masked);
        $this->assertStringContainsString('•', $masked);
        $this->assertStringNotContainsString('ABCDEF', $masked);
    }
}
