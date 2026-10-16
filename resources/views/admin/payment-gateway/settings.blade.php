@extends('layouts.admin')

@section('title', 'Payment Gateway Settings — ASYIHAN Admin')
@section('page_title', 'Pengaturan Midtrans Payment Gateway')

@section('content')
<div class="space-y-8" x-data="{
    activeTab: '{{ $activeEnvironment }}',
    isActive: {{ $isActive ? 'true' : 'false' }},
    is3ds: {{ $is3ds ? 'true' : 'false' }},
    selectedEnv: '{{ $activeEnvironment }}',
    showModal: false,
    showSandboxServerKey: false,
    showProductionServerKey: false,
    confirmText: '',
    confirmPassword: '',
    initialEnv: '{{ $activeEnvironment }}',
    initialActive: {{ $isActive ? 'true' : 'false' }},
    needsProductionConfirmation() {
        return this.isActive && this.selectedEnv === 'production' && (this.initialEnv !== 'production' || !this.initialActive);
    },
    handleSubmit(e) {
        if (this.needsProductionConfirmation() && !this.showModal) {
            e.preventDefault();
            this.showModal = true;
        }
    }
}">

    <!-- Flash Messages -->
    @if(session('success'))
        <div class="p-4 rounded-xl bg-emerald-500/10 border border-emerald-500/30 text-emerald-300 text-xs flex items-center justify-between shadow-[0_0_20px_rgba(16,185,129,0.15)] animate-fade-in">
            <div class="flex items-center gap-3">
                <svg class="w-5 h-5 text-emerald-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <span class="font-medium">{{ session('success') }}</span>
            </div>
            <button type="button" @click="$el.parentElement.remove()" class="text-emerald-400 hover:text-emerald-200">✕</button>
        </div>
    @endif

    @if($errors->any())
        <div class="p-4 rounded-xl bg-rose-500/10 border border-rose-500/30 text-rose-300 text-xs shadow-[0_0_20px_rgba(244,63,94,0.15)]">
            <div class="flex items-center gap-2 mb-2 font-semibold text-rose-200">
                <svg class="w-5 h-5 text-rose-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                </svg>
                <span>Terjadi kendala pada pengisian form:</span>
            </div>
            <ul class="list-disc list-inside space-y-1 text-slate-300 pl-2">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Non-SuperAdmin Notice -->
    @if(!$isSuperAdmin)
        <div class="p-4 rounded-xl bg-amber-500/10 border border-amber-500/30 text-amber-200 text-xs flex items-start gap-3">
            <svg class="w-5 h-5 text-amber-400 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
            <div>
                <span class="font-bold uppercase tracking-wider text-amber-300">Mode Read-Only:</span>
                <p class="text-slate-300 mt-0.5">Anda login sebagai Administrator biasa. Konfigurasi kredensial dan aktivasi payment gateway hanya dapat diubah oleh <strong>Super Admin</strong> demi keamanan sistem transaksi.</p>
            </div>
        </div>
    @endif

    <!-- System Status Banner -->
    <div class="bg-[#0e0e0e] border border-gold-400/25 rounded-2xl p-6 shadow-[0_4px_30px_rgba(0,0,0,0.7)] relative overflow-hidden">
        <div class="absolute -right-16 -top-16 w-56 h-56 rounded-full bg-gold-500/5 blur-3xl pointer-events-none"></div>

        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-6 relative z-10">
            <div>
                <div class="flex items-center gap-3">
                    <span class="px-2.5 py-1 text-[10px] font-mono uppercase tracking-widest rounded-md bg-gold-400/10 text-gold-300 border border-gold-400/30">
                        Midtrans Core Engine
                    </span>
                    <span class="text-xs text-slate-400 font-mono">v1.0 (Dynamic Gateway)</span>
                </div>
                <h2 class="text-lg font-serif text-slate-100 font-normal mt-2 tracking-wide">
                    Pusat Kendali Gerbang Pembayaran
                </h2>
                <p class="text-xs text-slate-400 mt-1 max-w-xl">
                    Kelola kredensial Midtrans Sandbox & Production secara dinamis tanpa perlu deploy ulang kode aplikasi atau mengubah berkas .env server.
                </p>
            </div>

            <!-- Badges Status -->
            <div class="flex flex-wrap items-center gap-3">
                <!-- Gateway Active State -->
                <div class="px-4 py-2.5 rounded-xl border {{ $isActive ? 'bg-emerald-500/10 border-emerald-500/30' : 'bg-slate-800/40 border-slate-700/50' }} flex items-center gap-3">
                    <span class="w-2.5 h-2.5 rounded-full {{ $isActive ? 'bg-emerald-400 animate-pulse shadow-[0_0_8px_rgba(52,211,153,0.8)]' : 'bg-slate-500' }}"></span>
                    <div>
                        <span class="text-[9px] uppercase tracking-widest text-slate-400 font-mono block">Status Gateway</span>
                        <span class="text-xs font-semibold {{ $isActive ? 'text-emerald-300' : 'text-slate-400' }}">
                            {{ $isActive ? 'AKTIF (Menerima Bayar)' : 'NONAKTIF' }}
                        </span>
                    </div>
                </div>

                <!-- Environment Active State -->
                <div class="px-4 py-2.5 rounded-xl border {{ $activeEnvironment === 'production' ? 'bg-purple-500/10 border-purple-500/40' : 'bg-cyan-500/10 border-cyan-500/40' }} flex items-center gap-3">
                    <span class="w-2.5 h-2.5 rounded-full {{ $activeEnvironment === 'production' ? 'bg-purple-400' : 'bg-cyan-400' }} shadow-[0_0_8px_currentColor]"></span>
                    <div>
                        <span class="text-[9px] uppercase tracking-widest text-slate-400 font-mono block">Mode Aktif</span>
                        <span class="text-xs font-semibold font-mono {{ $activeEnvironment === 'production' ? 'text-purple-300' : 'text-cyan-300' }}">
                            {{ strtoupper($activeEnvironment) }}
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Webhook / Notification URL Card -->
    <div class="bg-[#0e0e0e] border border-white/10 rounded-2xl p-5 shadow-[0_4px_25px_rgba(0,0,0,0.6)]">
        <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-4">
            <div class="space-y-1">
                <div class="flex items-center gap-2">
                    <svg class="w-4 h-4 text-gold-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                    </svg>
                    <span class="text-xs font-semibold text-slate-200">Webhook Notification URL (Midtrans MAP)</span>
                </div>
                <p class="text-[11px] text-slate-400">
                    Masukkan URL ini pada menu <em>Settings → Configuration → Payment Notification URL</em> di dashboard Midtrans Anda.
                </p>
            </div>
            <div class="flex items-center gap-2 max-w-md w-full" x-data="{ copied: false }">
                <input type="text" readonly value="{{ url('/payment/callback') }}"
                    class="w-full px-3 py-2 bg-black/80 border border-white/10 rounded-xl text-xs font-mono text-gold-300 focus:outline-none">
                <button type="button"
                    @click="navigator.clipboard.writeText('{{ url('/payment/callback') }}'); copied = true; setTimeout(() => copied = false, 2500)"
                    class="px-3.5 py-2 bg-gold-400/15 hover:bg-gold-400/25 border border-gold-400/30 text-gold-300 text-xs rounded-xl font-medium transition-all flex items-center gap-1.5 flex-shrink-0">
                    <span x-show="!copied">Salin URL</span>
                    <span x-show="copied" class="text-emerald-300 font-bold">Tersalin ✓</span>
                </button>
            </div>
        </div>

        @if(str_contains(url('/'), 'localhost') || str_contains(url('/'), '127.0.0.1') || str_contains(url('/'), '.test'))
            <div class="mt-4 pt-4 border-t border-white/5 flex items-start gap-2 text-[11px] text-amber-300/90 leading-relaxed bg-amber-500/5 p-3 rounded-xl border border-amber-500/20">
                <span class="text-sm">💡</span>
                <div>
                    <strong class="text-amber-200">Catatan Pengembangan Lokal (Localhost):</strong>
                    Server Midtrans di cloud menolak alamat <code class="font-mono bg-black/60 px-1 py-0.5 rounded text-amber-100">localhost</code> karena tidak dapat dijangkau dari internet publik.
                    <span class="text-slate-300 block mt-1">
                        • <strong>Saat di Localhost:</strong> Menu Notification URL di dashboard Midtrans <em>boleh dikosongkan</em> (website ASYIHAN sudah otomatis memproses pembayaran via rute finish Snap). Atau gunakan tunnel seperti <code class="font-mono text-cyan-300">ngrok</code> (<code class="font-mono text-cyan-300">https://xxx.ngrok-free.app/payment/callback</code>).<br>
                        • <strong>Saat Live / Production:</strong> URL domain publik Anda (contoh: <code class="font-mono text-emerald-300">https://asyihan.id/payment/callback</code>) akan langsung diterima dengan sukses oleh Midtrans.
                    </span>
                </div>
            </div>
        @endif
    </div>

    <!-- Main Configuration Form -->
    <form action="{{ route('admin.payment-gateway.update') }}" method="POST" @submit="handleSubmit($event)">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

            <!-- Left Col: Global Activation & Switches (1 Col) -->
            <div class="lg:col-span-1 space-y-6">
                <!-- Status Control Box -->
                <div class="bg-[#0e0e0e] border border-gold-400/20 rounded-2xl p-6 shadow-[0_4px_25px_rgba(0,0,0,0.6)] space-y-6">
                    <h3 class="text-xs uppercase font-mono tracking-wider text-gold-400 font-bold border-b border-white/10 pb-3 flex items-center gap-2">
                        <svg class="w-4 h-4 text-gold-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"/>
                        </svg>
                        <span>Status Operasi Gateway</span>
                    </h3>

                    <!-- Toggle Gateway Active -->
                    <div class="space-y-2">
                        <label class="text-xs font-medium text-slate-200 block">Aktivasi Gateway</label>
                        <p class="text-[11px] text-slate-400">Jika dinonaktifkan, checkout otomatis menolak pembayaran online.</p>
                        <div class="flex items-center gap-3 pt-2">
                            <input type="hidden" name="is_active" id="hidden_is_active" value="{{ $isActive ? '1' : '0' }}" :value="isActive ? 1 : 0">
                            <button type="button"
                                @if(!$isSuperAdmin) disabled @endif
                                @click="isActive = !isActive"
                                :class="isActive ? 'bg-gold-400' : 'bg-slate-700'"
                                class="relative inline-flex h-6 w-11 flex-shrink-0 cursor-pointer rounded-full border-2 border-transparent transition-colors duration-200 ease-in-out focus:outline-none disabled:opacity-50 disabled:cursor-not-allowed {{ $isActive ? 'bg-gold-400' : 'bg-slate-700' }}">
                                <span :class="isActive ? 'translate-x-5' : 'translate-x-0'"
                                    class="pointer-events-none inline-block h-5 w-5 transform rounded-full bg-black shadow ring-0 transition duration-200 ease-in-out {{ $isActive ? 'translate-x-5' : 'translate-x-0' }}"></span>
                            </button>
                            <span class="text-xs font-mono font-medium {{ $isActive ? 'text-emerald-300' : 'text-slate-500' }}"
                                :class="isActive ? 'text-emerald-300' : 'text-slate-500'"
                                x-text="isActive ? 'Payment Gateway AKTIF' : 'Payment Gateway NONAKTIF'">
                                {{ $isActive ? 'Payment Gateway AKTIF' : 'Payment Gateway NONAKTIF' }}
                            </span>
                        </div>
                    </div>

                    <!-- Environment Selector -->
                    <div class="space-y-2 border-t border-white/5 pt-4">
                        <label class="text-xs font-medium text-slate-200 block">Pilihan Environment Aktif</label>
                        <p class="text-[11px] text-slate-400">Menentukan akun dan server Midtrans mana yang memproses transaksi riil pengunjung.</p>

                        <div class="grid grid-cols-2 gap-2 pt-2">
                            <label class="cursor-pointer">
                                <input type="radio" name="active_environment" value="sandbox"
                                    @if(!$isSuperAdmin) disabled @endif
                                    {{ $activeEnvironment === 'sandbox' ? 'checked' : '' }}
                                    x-model="selectedEnv"
                                    @change="activeTab = 'sandbox'"
                                    class="peer sr-only">
                                <div :class="selectedEnv === 'sandbox' ? 'border-cyan-400 bg-cyan-500/10 text-cyan-200' : 'border-white/10 bg-black/40 text-slate-400'"
                                    class="p-3 rounded-xl border border-white/10 bg-black/40 text-center peer-checked:border-cyan-400 peer-checked:bg-cyan-500/10 peer-checked:text-cyan-200 transition-all hover:border-white/20">
                                    <span class="text-xs font-bold font-mono block">SANDBOX</span>
                                    <span class="text-[10px] block mt-0.5 opacity-80">Simulasi Uji Coba</span>
                                </div>
                            </label>

                            <label class="cursor-pointer">
                                <input type="radio" name="active_environment" value="production"
                                    @if(!$isSuperAdmin) disabled @endif
                                    {{ $activeEnvironment === 'production' ? 'checked' : '' }}
                                    x-model="selectedEnv"
                                    @change="activeTab = 'production'"
                                    class="peer sr-only">
                                <div :class="selectedEnv === 'production' ? 'border-purple-400 bg-purple-500/10 text-purple-200' : 'border-white/10 bg-black/40 text-slate-400'"
                                    class="p-3 rounded-xl border border-white/10 bg-black/40 text-center peer-checked:border-purple-400 peer-checked:bg-purple-500/10 peer-checked:text-purple-200 transition-all hover:border-white/20">
                                    <span class="text-xs font-bold font-mono block">PRODUCTION</span>
                                    <span class="text-[10px] block mt-0.5 opacity-80">Uang Nyata</span>
                                </div>
                            </label>
                        </div>
                    </div>

                    <!-- 3DS Toggle -->
                    <div class="space-y-2 border-t border-white/5 pt-4">
                        <label class="text-xs font-medium text-slate-200 block">3D Secure (3DS)</label>
                        <p class="text-[11px] text-slate-400">Wajibkan verifikasi OTP kartu kredit (sangat disarankan selalu aktif).</p>
                        <div class="flex items-center gap-3 pt-1">
                            <input type="hidden" name="is_3ds" id="hidden_is_3ds" value="{{ $is3ds ? '1' : '0' }}" :value="is3ds ? 1 : 0">
                            <button type="button"
                                @if(!$isSuperAdmin) disabled @endif
                                @click="is3ds = !is3ds"
                                :class="is3ds ? 'bg-gold-400' : 'bg-slate-700'"
                                class="relative inline-flex h-6 w-11 flex-shrink-0 cursor-pointer rounded-full border-2 border-transparent transition-colors duration-200 ease-in-out focus:outline-none disabled:opacity-50 disabled:cursor-not-allowed {{ $is3ds ? 'bg-gold-400' : 'bg-slate-700' }}">
                                <span :class="is3ds ? 'translate-x-5' : 'translate-x-0'"
                                    class="pointer-events-none inline-block h-5 w-5 transform rounded-full bg-black shadow ring-0 transition duration-200 ease-in-out {{ $is3ds ? 'translate-x-5' : 'translate-x-0' }}"></span>
                            </button>
                            <span class="text-xs font-mono font-medium {{ $is3ds ? 'text-gold-300' : 'text-slate-500' }}"
                                :class="is3ds ? 'text-gold-300' : 'text-slate-500'"
                                x-text="is3ds ? '3DS Diaktifkan' : '3DS Dimatikan'">
                                {{ $is3ds ? '3DS Diaktifkan' : '3DS Dimatikan' }}
                            </span>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    @if($isSuperAdmin)
                        <div class="pt-4 border-t border-white/10">
                            <button type="submit"
                                class="w-full py-3 px-4 rounded-xl bg-gradient-to-r from-amber-500 via-gold-400 to-yellow-600 text-black font-semibold text-xs uppercase tracking-wider shadow-[0_0_20px_rgba(212,175,55,0.3)] hover:brightness-110 active:scale-[0.99] transition-all flex items-center justify-center gap-2">
                                <svg class="w-4 h-4 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"/>
                                </svg>
                                <span>Simpan Konfigurasi</span>
                            </button>
                            <p class="text-[10px] text-slate-500 text-center mt-2">
                                Perubahan disimpan ke basis data secara terenkripsi.
                            </p>
                        </div>
                    @endif
                </div>

                <!-- Guidance Info Box -->
                <div class="bg-black/40 border border-white/5 rounded-2xl p-5 space-y-3 text-slate-400 text-xs">
                    <div class="flex items-center gap-2 text-gold-400 font-semibold text-xs">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <span>Panduan Format Kunci</span>
                    </div>
                    <ul class="space-y-1.5 text-[11px] leading-relaxed">
                        <li>• <strong class="text-cyan-300">Sandbox Client Key:</strong> Dimulai dengan <code class="text-cyan-200 bg-cyan-950/60 px-1 py-0.5 rounded font-mono">SB-Mid-client-</code></li>
                        <li>• <strong class="text-cyan-300">Sandbox Server Key:</strong> Dimulai dengan <code class="text-cyan-200 bg-cyan-950/60 px-1 py-0.5 rounded font-mono">SB-Mid-server-</code></li>
                        <li>• <strong class="text-purple-300">Production Client Key:</strong> Dimulai dengan <code class="text-purple-200 bg-purple-950/60 px-1 py-0.5 rounded font-mono">Mid-client-</code></li>
                        <li>• <strong class="text-purple-300">Production Server Key:</strong> Dimulai dengan <code class="text-purple-200 bg-purple-950/60 px-1 py-0.5 rounded font-mono">Mid-server-</code></li>
                    </ul>
                </div>
            </div>

            <!-- Right Col: Dual-Environment Credential Tabs (2 Cols) -->
            <div class="lg:col-span-2 space-y-6">

                <!-- Tab Headers -->
                <div class="bg-[#0e0e0e] border border-gold-400/20 rounded-2xl p-2 flex gap-2">
                    <button type="button"
                        @click="activeTab = 'sandbox'"
                        :class="activeTab === 'sandbox' ? 'bg-cyan-500/20 text-cyan-200 border-cyan-500/40' : 'text-slate-400 hover:text-slate-200 border-transparent'"
                        class="flex-1 py-3 px-4 rounded-xl text-xs font-mono font-bold border transition-all flex items-center justify-center gap-2">
                        <span class="w-2 h-2 rounded-full bg-cyan-400"></span>
                        <span>SANDBOX CREDENTIALS</span>
                        @if($sandboxConfig && $sandboxConfig->client_key)
                            <span class="px-1.5 py-0.5 text-[9px] rounded bg-cyan-500/20 text-cyan-300 font-mono">Tersimpan</span>
                        @endif
                    </button>

                    <button type="button"
                        @click="activeTab = 'production'"
                        :class="activeTab === 'production' ? 'bg-purple-500/20 text-purple-200 border-purple-500/40' : 'text-slate-400 hover:text-slate-200 border-transparent'"
                        class="flex-1 py-3 px-4 rounded-xl text-xs font-mono font-bold border transition-all flex items-center justify-center gap-2">
                        <span class="w-2 h-2 rounded-full bg-purple-400"></span>
                        <span>PRODUCTION CREDENTIALS</span>
                        @if($productionConfig && $productionConfig->client_key)
                            <span class="px-1.5 py-0.5 text-[9px] rounded bg-purple-500/20 text-purple-300 font-mono">Tersimpan</span>
                        @endif
                    </button>
                </div>

                <!-- SANDBOX PANEL -->
                <div x-show="activeTab === 'sandbox'" class="bg-[#0e0e0e] border border-cyan-500/20 rounded-2xl p-6 shadow-[0_4px_30px_rgba(0,0,0,0.7)] space-y-5">
                    <div class="flex items-center justify-between border-b border-white/10 pb-4">
                        <div>
                            <h3 class="text-sm font-semibold text-cyan-300 flex items-center gap-2">
                                <svg class="w-4 h-4 text-cyan-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"/>
                                </svg>
                                <span>Kredensial Midtrans Sandbox (Testing)</span>
                            </h3>
                            <p class="text-xs text-slate-400 mt-0.5">Digunakan saat pengujian fitur pembayaran tanpa memotong uang asli.</p>
                        </div>
                        <span class="px-2.5 py-1 text-[10px] font-mono rounded bg-cyan-500/10 text-cyan-300 border border-cyan-500/30">
                            Mode Pengujian
                        </span>
                    </div>

                    <!-- Sandbox Merchant Name -->
                    <div class="space-y-1.5">
                        <label class="text-xs font-medium text-slate-300 block">Merchant Name (Opsional)</label>
                        <input type="text" name="sandbox_merchant_name"
                            @if(!$isSuperAdmin) disabled @endif
                            value="{{ old('sandbox_merchant_name', $sandboxConfig?->merchant_name ?? 'ASYIHAN Parfume (Sandbox)') }}"
                            placeholder="Contoh: ASYIHAN Parfume (Sandbox)"
                            class="w-full px-4 py-2.5 bg-black/80 border border-white/10 rounded-xl text-xs text-slate-200 placeholder-slate-600 focus:outline-none focus:border-cyan-400 disabled:opacity-50">
                    </div>

                    <!-- Sandbox Client Key -->
                    <div class="space-y-1.5">
                        <div class="flex items-center justify-between">
                            <label class="text-xs font-medium text-slate-300 block">
                                Client Key <span class="text-cyan-400 font-mono text-[11px]">(SB-Mid-client-...)</span>
                            </label>
                            @if($sandboxClientKeyMasked)
                                <span class="text-[10px] font-mono text-cyan-300/80 bg-cyan-950/40 px-2 py-0.5 rounded border border-cyan-800/40">
                                    Tersimpan: {{ $sandboxClientKeyMasked }}
                                </span>
                            @endif
                        </div>
                        <input type="text" name="sandbox_client_key"
                            @if(!$isSuperAdmin) disabled @endif
                            placeholder="{{ $sandboxClientKeyMasked ? 'Kunci tersimpan. Kosongkan jika tidak ingin mengubah.' : 'SB-Mid-client-...' }}"
                            class="w-full px-4 py-2.5 bg-black/80 border border-white/10 rounded-xl text-xs font-mono text-slate-200 placeholder-slate-600 focus:outline-none focus:border-cyan-400 disabled:opacity-50">
                        <p class="text-[10px] text-slate-500">Client Key bersifat publik dan digunakan oleh script Snap JS di peramban pembeli.</p>
                    </div>

                    <!-- Sandbox Server Key -->
                    <div class="space-y-1.5">
                        <div class="flex items-center justify-between">
                            <label class="text-xs font-medium text-slate-300 block">
                                Server Key <span class="text-cyan-400 font-mono text-[11px]">(SB-Mid-server-...)</span>
                            </label>
                            @if($sandboxServerKeyMasked)
                                <span class="text-[10px] font-mono text-cyan-300/80 bg-cyan-950/40 px-2 py-0.5 rounded border border-cyan-800/40">
                                    Tersimpan: {{ $sandboxServerKeyMasked }}
                                </span>
                            @endif
                        </div>
                        <div class="relative">
                            <input :type="showSandboxServerKey ? 'text' : 'password'" name="sandbox_server_key"
                                @if(!$isSuperAdmin) disabled @endif
                                placeholder="{{ $sandboxServerKeyMasked ? 'Kunci tersimpan terenkripsi. Kosongkan jika tidak ingin mengubah.' : 'SB-Mid-server-...' }}"
                                class="w-full px-4 py-2.5 pr-11 bg-black/80 border border-white/10 rounded-xl text-xs font-mono text-slate-200 placeholder-slate-600 focus:outline-none focus:border-cyan-400 disabled:opacity-50">
                            <button type="button" @click="showSandboxServerKey = !showSandboxServerKey"
                                class="absolute right-3 top-2.5 text-slate-500 hover:text-slate-300 focus:outline-none">
                                <svg x-show="!showSandboxServerKey" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                <svg x-show="showSandboxServerKey" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l18 18"/></svg>
                            </button>
                        </div>
                        <p class="text-[10px] text-slate-500">Kunci rahasia server (disimpan dengan enkripsi AES-256). Jangan pernah disebarluaskan.</p>
                    </div>
                </div>

                <!-- PRODUCTION PANEL -->
                <div x-show="activeTab === 'production'" class="bg-[#0e0e0e] border border-purple-500/25 rounded-2xl p-6 shadow-[0_4px_30px_rgba(0,0,0,0.7)] space-y-5">
                    <div class="flex items-center justify-between border-b border-white/10 pb-4">
                        <div>
                            <h3 class="text-sm font-semibold text-purple-300 flex items-center gap-2">
                                <svg class="w-4 h-4 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                </svg>
                                <span>Kredensial Midtrans Production (Uang Nyata)</span>
                            </h3>
                            <p class="text-xs text-slate-400 mt-0.5">Digunakan saat website siap menerima transaksi riil dari pelanggan ASYIHAN.</p>
                        </div>
                        <span class="px-2.5 py-1 text-[10px] font-mono rounded bg-purple-500/10 text-purple-300 border border-purple-500/30">
                            Live Payment
                        </span>
                    </div>

                    <!-- Production Merchant Name -->
                    <div class="space-y-1.5">
                        <label class="text-xs font-medium text-slate-300 block">Merchant Name Perusahaan (Opsional)</label>
                        <input type="text" name="production_merchant_name"
                            @if(!$isSuperAdmin) disabled @endif
                            value="{{ old('production_merchant_name', $productionConfig?->merchant_name ?? 'ASYIHAN Parfume') }}"
                            placeholder="Contoh: PT Asyihan Parfume Indonesia"
                            class="w-full px-4 py-2.5 bg-black/80 border border-white/10 rounded-xl text-xs text-slate-200 placeholder-slate-600 focus:outline-none focus:border-purple-400 disabled:opacity-50">
                    </div>

                    <!-- Production Client Key -->
                    <div class="space-y-1.5">
                        <div class="flex items-center justify-between">
                            <label class="text-xs font-medium text-slate-300 block">
                                Client Key <span class="text-purple-400 font-mono text-[11px]">(Mid-client-...)</span>
                            </label>
                            @if($productionClientKeyMasked)
                                <span class="text-[10px] font-mono text-purple-300/80 bg-purple-950/40 px-2 py-0.5 rounded border border-purple-800/40">
                                    Tersimpan: {{ $productionClientKeyMasked }}
                                </span>
                            @endif
                        </div>
                        <input type="text" name="production_client_key"
                            @if(!$isSuperAdmin) disabled @endif
                            placeholder="{{ $productionClientKeyMasked ? 'Kunci tersimpan. Kosongkan jika tidak ingin mengubah.' : 'Mid-client-...' }}"
                            class="w-full px-4 py-2.5 bg-black/80 border border-white/10 rounded-xl text-xs font-mono text-slate-200 placeholder-slate-600 focus:outline-none focus:border-purple-400 disabled:opacity-50">
                        <p class="text-[10px] text-slate-500">Dapatkan Client Key Production dari Midtrans MAP akun resmi perusahaan.</p>
                    </div>

                    <!-- Production Server Key -->
                    <div class="space-y-1.5">
                        <div class="flex items-center justify-between">
                            <label class="text-xs font-medium text-slate-300 block">
                                Server Key <span class="text-purple-400 font-mono text-[11px]">(Mid-server-...)</span>
                            </label>
                            @if($productionServerKeyMasked)
                                <span class="text-[10px] font-mono text-purple-300/80 bg-purple-950/40 px-2 py-0.5 rounded border border-purple-800/40">
                                    Tersimpan: {{ $productionServerKeyMasked }}
                                </span>
                            @endif
                        </div>
                        <div class="relative">
                            <input :type="showProductionServerKey ? 'text' : 'password'" name="production_server_key"
                                @if(!$isSuperAdmin) disabled @endif
                                placeholder="{{ $productionServerKeyMasked ? 'Kunci tersimpan terenkripsi. Kosongkan jika tidak ingin mengubah.' : 'Mid-server-...' }}"
                                class="w-full px-4 py-2.5 pr-11 bg-black/80 border border-white/10 rounded-xl text-xs font-mono text-slate-200 placeholder-slate-600 focus:outline-none focus:border-purple-400 disabled:opacity-50">
                            <button type="button" @click="showProductionServerKey = !showProductionServerKey"
                                class="absolute right-3 top-2.5 text-slate-500 hover:text-slate-300 focus:outline-none">
                                <svg x-show="!showProductionServerKey" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                <svg x-show="showProductionServerKey" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l18 18"/></svg>
                            </button>
                        </div>
                        <p class="text-[10px] text-slate-500">Kunci rahasia Production terenkripsi. Berbahaya jika terekspos ke publik.</p>
                    </div>
                </div>

            </div>
        </div>

        <!-- Production Activation Confirmation Modal -->
        <div x-show="showModal" style="display: none;"
            class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/80 backdrop-blur-sm">
            <div class="bg-[#121212] border border-rose-500/40 rounded-2xl p-6 max-w-lg w-full shadow-[0_0_50px_rgba(244,63,94,0.25)] space-y-5"
                @click.away="showModal = false">
                
                <div class="flex items-center gap-3 text-rose-400">
                    <div class="w-10 h-10 rounded-full bg-rose-500/10 border border-rose-500/30 flex items-center justify-center flex-shrink-0">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                        </svg>
                    </div>
                    <div>
                        <h4 class="text-base font-serif font-bold text-slate-100">Konfirmasi Aktivasi Mode Production</h4>
                        <p class="text-xs text-rose-300">Peringatan Keamanan Transaksi Uang Nyata</p>
                    </div>
                </div>

                <div class="bg-rose-950/20 border border-rose-900/40 rounded-xl p-4 text-xs text-slate-300 space-y-2">
                    <p>
                        Anda akan mengaktifkan <strong>Mode Production</strong> Midtrans pada website ASYIHAN.
                    </p>
                    <ul class="list-disc list-inside space-y-1 text-slate-400">
                        <li>Semua checkout berikutnya akan memproses <strong>uang asli</strong>.</li>
                        <li>Pastikan kredensial Production milik akun perusahaan resmi ASYIHAN sudah benar.</li>
                    </ul>
                </div>

                <!-- Typing confirmation -->
                <div class="space-y-1.5">
                    <label class="text-xs font-medium text-slate-200 block">
                        Ketik <code class="text-rose-300 font-mono font-bold bg-rose-950/40 px-1 py-0.5 rounded">AKTIFKAN PRODUCTION</code> untuk melanjutkan:
                    </label>
                    <input type="text" name="confirm_production" x-model="confirmText"
                        placeholder="AKTIFKAN PRODUCTION"
                        class="w-full px-4 py-2 bg-black border border-white/20 rounded-xl text-xs font-mono text-slate-100 placeholder-slate-600 focus:outline-none focus:border-rose-400">
                </div>

                <!-- Re-authentication password -->
                <div class="space-y-1.5">
                    <label class="text-xs font-medium text-slate-200 block">
                        Konfirmasi Password Akun Anda:
                    </label>
                    <input type="password" name="password_confirmation" x-model="confirmPassword"
                        placeholder="Masukkan password akun Super Admin"
                        class="w-full px-4 py-2 bg-black border border-white/20 rounded-xl text-xs text-slate-100 placeholder-slate-600 focus:outline-none focus:border-rose-400">
                </div>

                <!-- Modal Actions -->
                <div class="flex items-center justify-end gap-3 pt-3 border-t border-white/10">
                    <button type="button" @click="showModal = false"
                        class="px-4 py-2 rounded-xl text-xs text-slate-400 hover:text-slate-200 hover:bg-white/5 transition-all">
                        Batal
                    </button>
                    <button type="submit"
                        :disabled="confirmText !== 'AKTIFKAN PRODUCTION' || !confirmPassword"
                        class="px-5 py-2 rounded-xl bg-rose-500 hover:bg-rose-600 text-white font-semibold text-xs transition-all disabled:opacity-40 disabled:cursor-not-allowed">
                        Konfirmasi & Aktifkan Production
                    </button>
                </div>
            </div>
        </div>

    </form>

    <!-- Audit Log Table -->
    <div class="bg-[#0e0e0e] border border-gold-400/20 rounded-2xl overflow-hidden shadow-[0_4px_30px_rgba(0,0,0,0.6)]">
        <div class="p-5 border-b border-white/10 flex items-center justify-between">
            <div class="flex items-center gap-2.5">
                <svg class="w-4 h-4 text-gold-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <h3 class="text-xs font-mono uppercase tracking-wider text-slate-200 font-bold">
                    Catatan Audit & Riwayat Perubahan (20 Terakhir)
                </h3>
            </div>
            <span class="text-[10px] text-slate-500 font-mono">Immutable Log — Nilai kunci tidak pernah dicatat</span>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-xs text-left">
                <thead class="bg-black/60 text-[10px] uppercase font-mono tracking-wider text-slate-400 border-b border-white/5">
                    <tr>
                        <th class="py-3 px-4">Waktu</th>
                        <th class="py-3 px-4">Pengguna</th>
                        <th class="py-3 px-4">Aktivitas</th>
                        <th class="py-3 px-4 text-center">Mode</th>
                        <th class="py-3 px-4">Ringkasan Perubahan</th>
                        <th class="py-3 px-4 text-right">Alamat IP</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-white/5 font-mono text-[11px]">
                    @forelse($auditLogs as $log)
                        <tr class="hover:bg-white/[0.02] transition-colors">
                            <td class="py-3.5 px-4 text-slate-400 whitespace-nowrap">
                                {{ $log->created_at->format('d/m/Y H:i:s') }}
                            </td>
                            <td class="py-3.5 px-4 text-slate-200">
                                <span class="font-sans font-medium text-slate-100 block">{{ $log->user?->name ?? 'Sistem' }}</span>
                                <span class="text-[10px] text-slate-500">{{ $log->user?->email ?? '-' }}</span>
                            </td>
                            <td class="py-3.5 px-4 font-sans">
                                @if($log->action === 'production_activated')
                                    <span class="px-2 py-0.5 rounded bg-purple-500/20 text-purple-300 border border-purple-500/40 font-semibold text-[10px]">
                                        {{ $log->action_label }}
                                    </span>
                                @elseif($log->action === 'credentials_updated')
                                    <span class="px-2 py-0.5 rounded bg-amber-500/20 text-amber-300 border border-amber-500/40 font-semibold text-[10px]">
                                        {{ $log->action_label }}
                                    </span>
                                @else
                                    <span class="px-2 py-0.5 rounded bg-slate-800 text-slate-300 border border-white/10 text-[10px]">
                                        {{ $log->action_label }}
                                    </span>
                                @endif
                            </td>
                            <td class="py-3.5 px-4 text-center">
                                <span class="px-2 py-0.5 rounded uppercase text-[10px] {{ $log->environment === 'production' ? 'bg-purple-900/40 text-purple-300' : 'bg-cyan-900/40 text-cyan-300' }}">
                                    {{ $log->environment ?? '-' }}
                                </span>
                            </td>
                            <td class="py-3.5 px-4 text-slate-400 font-sans text-xs">
                                @if(is_array($log->changes) && count($log->changes) > 0)
                                    <div class="flex flex-wrap gap-1.5">
                                        @foreach($log->changes as $key => $val)
                                            <span class="px-1.5 py-0.5 rounded bg-black/60 border border-white/10 text-[10px] font-mono text-slate-300">
                                                {{ $key }}: <span class="text-gold-400">{{ is_bool($val) ? ($val ? 'true' : 'false') : $val }}</span>
                                            </span>
                                        @endforeach
                                    </div>
                                @else
                                    <span class="text-slate-600">-</span>
                                @endif
                            </td>
                            <td class="py-3.5 px-4 text-right text-slate-500">
                                {{ $log->ip_address ?? '-' }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="py-8 text-center text-slate-500 font-sans">
                                Belum ada catatan riwayat perubahan konfigurasi payment gateway.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection
