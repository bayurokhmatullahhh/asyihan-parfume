<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PaymentGatewayAuditLog;
use App\Models\PaymentGatewaySetting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

class PaymentGatewayController extends Controller
{
    /**
     * Display the payment gateway settings page.
     */
    public function index(Request $request): View
    {
        $sandboxConfig = PaymentGatewaySetting::getConfig('midtrans', 'sandbox');
        $productionConfig = PaymentGatewaySetting::getConfig('midtrans', 'production');

        // Determine which row has the canonical is_active and active_environment values
        $anySetting = $sandboxConfig ?? $productionConfig;

        $isActive = $anySetting?->is_active ?? false;
        $activeEnvironment = $anySetting?->active_environment ?? 'sandbox';
        $is3ds = $anySetting?->is_3ds ?? true;

        // Mask keys for display
        $sandboxClientKeyMasked = PaymentGatewaySetting::maskKey($sandboxConfig?->client_key);
        $sandboxServerKeyMasked = PaymentGatewaySetting::maskKey($sandboxConfig?->server_key);
        $productionClientKeyMasked = PaymentGatewaySetting::maskKey($productionConfig?->client_key);
        $productionServerKeyMasked = PaymentGatewaySetting::maskKey($productionConfig?->server_key);

        $isSuperAdmin = $request->user()->isSuperAdmin();

        // Audit log history
        $auditLogs = PaymentGatewayAuditLog::where('gateway', 'midtrans')
            ->with('user')
            ->latest('created_at')
            ->take(20)
            ->get();

        return view('admin.payment-gateway.settings', compact(
            'sandboxConfig',
            'productionConfig',
            'isActive',
            'activeEnvironment',
            'is3ds',
            'sandboxClientKeyMasked',
            'sandboxServerKeyMasked',
            'productionClientKeyMasked',
            'productionServerKeyMasked',
            'isSuperAdmin',
            'auditLogs',
        ));
    }

    /**
     * Update payment gateway settings. Only super_admin can modify.
     */
    public function update(Request $request): RedirectResponse
    {
        // Backend authorization — super_admin only
        if (! $request->user()->isSuperAdmin()) {
            abort(403, 'Hanya Super Admin yang dapat mengubah pengaturan payment gateway.');
        }

        // Normalize boolean fields
        $request->merge([
            'is_active' => $request->boolean('is_active'),
            'is_3ds' => $request->has('is_3ds') ? $request->boolean('is_3ds') : true,
        ]);

        $validated = $request->validate([
            'is_active' => 'required|boolean',
            'active_environment' => 'required|in:sandbox,production',
            'is_3ds' => 'required|boolean',
            'sandbox_merchant_name' => 'nullable|string|max:255',
            'sandbox_client_key' => 'nullable|string|max:500',
            'sandbox_server_key' => 'nullable|string|max:500',
            'production_merchant_name' => 'nullable|string|max:255',
            'production_client_key' => 'nullable|string|max:500',
            'production_server_key' => 'nullable|string|max:500',
            'confirm_production' => 'nullable|string',
            'password_confirmation' => 'nullable|string',
        ]);

        // If activating Production, require confirmation and password re-auth
        if ($validated['is_active'] && $validated['active_environment'] === 'production') {
            if ($validated['confirm_production'] !== 'AKTIFKAN PRODUCTION') {
                return back()->withErrors([
                    'confirm_production' => 'Ketik "AKTIFKAN PRODUCTION" untuk mengkonfirmasi aktivasi mode Production.',
                ])->withInput();
            }

            if (empty($validated['password_confirmation']) ||
                ! password_verify($validated['password_confirmation'], $request->user()->password)) {
                return back()->withErrors([
                    'password_confirmation' => 'Password tidak valid. Autentikasi ulang diperlukan untuk mengaktifkan Production.',
                ])->withInput();
            }
        }

        $changes = [];

        // === Update Sandbox Config ===
        $sandboxConfig = PaymentGatewaySetting::firstOrNew(
            ['gateway' => 'midtrans', 'environment' => 'sandbox']
        );

        $sandboxCredentialsChanged = false;

        $sandboxConfig->merchant_name = $validated['sandbox_merchant_name'] ?? $sandboxConfig->merchant_name;
        $sandboxConfig->is_active = (bool) $validated['is_active'];
        $sandboxConfig->is_3ds = (bool) $validated['is_3ds'];
        $sandboxConfig->active_environment = $validated['active_environment'];
        $sandboxConfig->updated_by = $request->user()->id;

        // Only update keys if new values are provided (non-empty means user wants to change)
        if (! empty($validated['sandbox_client_key'])) {
            $sandboxConfig->client_key = $validated['sandbox_client_key'];
            $sandboxCredentialsChanged = true;
        }
        if (! empty($validated['sandbox_server_key'])) {
            $sandboxConfig->server_key = $validated['sandbox_server_key'];
            $sandboxCredentialsChanged = true;
        }

        // Validate sandbox key prefixes
        $sandboxErrors = $sandboxConfig->validateKeyPrefixes();
        if (! empty($sandboxErrors)) {
            return back()->withErrors($sandboxErrors)->withInput();
        }

        $sandboxConfig->save();

        if ($sandboxCredentialsChanged) {
            $changes['sandbox_credentials'] = 'updated';
        }

        // === Update Production Config ===
        $productionConfig = PaymentGatewaySetting::firstOrNew(
            ['gateway' => 'midtrans', 'environment' => 'production']
        );

        $productionCredentialsChanged = false;

        $productionConfig->merchant_name = $validated['production_merchant_name'] ?? $productionConfig->merchant_name;
        $productionConfig->is_active = (bool) $validated['is_active'];
        $productionConfig->is_3ds = (bool) $validated['is_3ds'];
        $productionConfig->active_environment = $validated['active_environment'];
        $productionConfig->updated_by = $request->user()->id;

        if (! empty($validated['production_client_key'])) {
            $productionConfig->client_key = $validated['production_client_key'];
            $productionCredentialsChanged = true;
        }
        if (! empty($validated['production_server_key'])) {
            $productionConfig->server_key = $validated['production_server_key'];
            $productionCredentialsChanged = true;
        }

        // Validate production key prefixes
        $productionErrors = $productionConfig->validateKeyPrefixes();
        if (! empty($productionErrors)) {
            return back()->withErrors($productionErrors)->withInput();
        }

        $productionConfig->save();

        if ($productionCredentialsChanged) {
            $changes['production_credentials'] = 'updated';
        }

        // Determine audit action
        $action = 'settings_updated';
        if ($sandboxCredentialsChanged || $productionCredentialsChanged) {
            $action = 'credentials_updated';
        }

        $changes['is_active'] = $validated['is_active'];
        $changes['active_environment'] = $validated['active_environment'];
        $changes['is_3ds'] = $validated['is_3ds'];

        if ($validated['is_active'] && $validated['active_environment'] === 'production') {
            $action = 'production_activated';
        }

        PaymentGatewayAuditLog::record(
            userId: $request->user()->id,
            action: $action,
            environment: $validated['active_environment'],
            changes: $changes,
        );

        Log::info('Payment gateway settings updated', [
            'user_id' => $request->user()->id,
            'action' => $action,
            'environment' => $validated['active_environment'],
        ]);

        return redirect()->route('admin.payment-gateway.index')
            ->with('success', 'Pengaturan payment gateway Midtrans berhasil disimpan.');
    }
}
