@extends('layouts.app')

@section('title', 'Lacak Paket — Perjalanan Essence-mu | ASYIHAN')
@section('meta_description', 'Lacak perjalanan essence sakral Anda. Pantau setiap langkah pengiriman formula wewangian ASYIHAN menuju titik penerimaan Anda.')

@section('content')
<div class="max-w-6xl mx-auto px-4 sm:px-6 py-6 sm:py-10">

    {{-- ========================================================================= --}}
    {{-- BACK NAVIGATION                                                           --}}
    {{-- ========================================================================= --}}
    <div class="mb-6 text-[10px] font-mono tracking-wider text-gray-400">
        <a href="{{ route('account') }}" class="text-gold-400 hover:text-gold-200 transition-colors">‹ RIWAYAT PESANAN</a>
        <span class="mx-2 text-gray-600">›</span>
        <span>PELACAKAN SACRED ESSENCE</span>
    </div>

    {{-- ========================================================================= --}}
    {{-- HERO SECTION                                                              --}}
    {{-- ========================================================================= --}}
    <div class="relative mb-10 overflow-hidden rounded-2xl">
        {{-- Background with gradient overlay --}}
        <div class="absolute inset-0 bg-gradient-to-r from-black via-black/95 to-black/70 z-10"></div>
        <div class="absolute inset-0 bg-gradient-to-b from-[#141210] to-[#0a0a09] opacity-90"></div>
        <div class="absolute -top-20 -right-20 w-80 h-80 bg-gold-400/[0.05] rounded-full blur-[100px] pointer-events-none"></div>

        <div class="relative z-20 px-6 sm:px-10 py-8 sm:py-12 flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6">
            <div class="flex-1">
                <h1 class="text-3xl sm:text-4xl lg:text-5xl font-serif font-bold text-white tracking-wider glow-gold uppercase leading-tight mb-4">
                    PERJALANAN<br>
                    <span class="text-gold-400">ESSENCE-MU</span>
                </h1>
                <p class="text-sm sm:text-base text-gray-300 font-light italic max-w-xl leading-relaxed">
                    "Setiap pesanan bukan sekadar barang, melainkan bagian dari perjalanan menuju versi terbaik dirimu."
                </p>
            </div>
            <div class="shrink-0 hidden lg:block">
                <img src="{{ asset('images/background3.png') }}" alt="ASYIHAN Atelier" class="w-48 h-36 object-cover rounded-xl border border-gold-400/20 shadow-lg opacity-80">
            </div>
        </div>
    </div>


    {{-- ========================================================================= --}}
    {{-- ORDER IDENTIFICATION BAR                                                  --}}
    {{-- ========================================================================= --}}
    <div class="bg-gradient-to-r from-[#1a1815] to-[#121110] rounded-xl border border-gold-400/20 px-5 sm:px-6 py-4 mb-8 flex flex-col sm:flex-row sm:items-center justify-between gap-3">
        <div class="flex flex-wrap items-center gap-4 sm:gap-8 text-[11px] font-mono tracking-wider">
            <div>
                <span class="text-gray-500 uppercase block text-[9px]">NOMOR PESANAN</span>
                <span class="text-white font-bold text-sm">ORDER #{{ $tracking['order_id'] }}</span>
            </div>
            <div>
                <span class="text-gray-500 uppercase block text-[9px]">DIPESAN PADA</span>
                <span class="text-gray-300">{{ $tracking['order_date'] }}</span>
            </div>
        </div>
        <div class="flex items-center gap-3">
            <span class="text-[9px] text-gray-500 font-mono uppercase">STATUS PESANAN</span>
            <span class="px-3 py-1.5 rounded-full border border-gold-400/40 bg-gold-400/10 text-gold-300 text-[10px] font-mono tracking-wider font-bold animate-pulse">
                ⟡ {{ $tracking['status_label'] }}
            </span>
        </div>
        <div class="text-right text-[11px] font-mono">
            <span class="text-gray-500 uppercase block text-[9px]">PERKIRAAN TIBA</span>
            <span class="text-gold-300 font-bold">Perkiraan Diterima {{ $tracking['estimated_arrival'] }}</span>
        </div>
    </div>


    {{-- ========================================================================= --}}
    {{-- TRACKING PROGRESS STEPS                                                   --}}
    {{-- ========================================================================= --}}
    <div class="bg-gradient-to-b from-[#141210] to-[#0a0a0a] rounded-2xl border border-gold-400/20 p-6 sm:p-8 mb-8 shadow-[0_10px_30px_rgba(0,0,0,0.8)] text-center">
        {{-- Section Header --}}
        <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-gold-400/10 border border-gold-400/30 text-gold-300 text-[10px] tracking-[0.2em] font-mono uppercase mb-4">
            INTI PROSES SAKRAL
        </div>
        <h2 class="text-2xl sm:text-3xl font-serif font-bold text-white tracking-wider uppercase mb-2">
            PERJALANAN PESANAN ANDA
        </h2>
        <p class="text-xs sm:text-sm text-gray-400 font-light italic mb-8">
            "Dari tangan kami, menuju ke tanganmu."
        </p>

        {{-- 4-Step Progress Bar --}}
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 max-w-3xl mx-auto">
            {{-- Step 1: PESANAN DIBUAT --}}
            <div class="flex flex-col items-center gap-3">
                <div class="w-14 h-14 rounded-full bg-gold-400/15 border-2 border-gold-400 flex items-center justify-center text-gold-400 shadow-[0_0_20px_rgba(197,160,89,0.2)]">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path>
                    </svg>
                </div>
                <div>
                    <span class="text-[9px] text-gold-400 font-mono tracking-wider block">01 — SELESAI</span>
                    <span class="text-[11px] text-white font-bold font-mono uppercase block mt-0.5">PESANAN DIBUAT</span>
                </div>
            </div>

            {{-- Step 2: PEMBAYARAN --}}
            <div class="flex flex-col items-center gap-3">
                <div class="w-14 h-14 rounded-full bg-gold-400/15 border-2 border-gold-400 flex items-center justify-center text-gold-400 shadow-[0_0_20px_rgba(197,160,89,0.2)]">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path>
                    </svg>
                </div>
                <div>
                    <span class="text-[9px] text-gold-400 font-mono tracking-wider block">02 — SELESAI</span>
                    <span class="text-[11px] text-white font-bold font-mono uppercase block mt-0.5">PEMBAYARAN<br>DIKONFIRMASI</span>
                </div>
            </div>

            {{-- Step 3: DIPROSES --}}
            <div class="flex flex-col items-center gap-3">
                <div class="w-14 h-14 rounded-full bg-gold-400/15 border-2 border-gold-400 flex items-center justify-center text-gold-400 shadow-[0_0_20px_rgba(197,160,89,0.2)]">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"></path>
                    </svg>
                </div>
                <div>
                    <span class="text-[9px] text-gold-400 font-mono tracking-wider block">03 — SELESAI</span>
                    <span class="text-[11px] text-white font-bold font-mono uppercase block mt-0.5">DIPROSES</span>
                </div>
            </div>

            {{-- Step 4: DIKIRIM (Active/Current) --}}
            <div class="flex flex-col items-center gap-3">
                <div class="w-14 h-14 rounded-full bg-gold-400 border-2 border-gold-300 flex items-center justify-center text-black shadow-[0_0_30px_rgba(197,160,89,0.4)] animate-pulse-gold">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 17h8m0 0V9m0 8l-8-8-4 4-6-6"></path>
                    </svg>
                </div>
                <div>
                    <span class="text-[9px] text-gold-400 font-mono tracking-wider block font-bold">04 — AKTIF</span>
                    <span class="text-[11px] text-gold-200 font-bold font-mono uppercase block mt-0.5 glow-gold">DIKIRIM</span>
                </div>
            </div>
        </div>

        {{-- Estimated arrival callout --}}
        <div class="mt-8 inline-flex items-center gap-2 px-5 py-2 rounded-full bg-gold-400/10 border border-gold-400/25 text-gold-300 text-xs font-mono tracking-wider">
            <svg class="w-4 h-4 text-gold-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            <span>TIBA DI TUJUAN: <strong class="text-gold-200">{{ $tracking['estimated_arrival'] }}</strong></span>
        </div>
    </div>


    {{-- ========================================================================= --}}
    {{-- DETAIL PENGIRIMAN & RINGKASAN PESANAN                                     --}}
    {{-- ========================================================================= --}}
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 mb-8">

        {{-- LEFT: DETAIL PENGIRIMAN (7 cols) --}}
        <div class="lg:col-span-7 bg-gradient-to-b from-[#141210] to-[#0a0a0a] rounded-2xl border border-gold-400/20 p-6 sm:p-8 shadow-[0_6px_20px_rgba(0,0,0,0.7)]">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-lg sm:text-xl font-serif font-bold text-white tracking-wider uppercase">
                    DETAIL PENGIRIMAN
                </h3>
                <span class="text-[10px] text-gray-500 font-mono tracking-wider">INV #{{ $tracking['order_id'] }}</span>
            </div>

            {{-- Courier Info Bar --}}
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-6 pb-6 border-b border-gold-400/15">
                <div>
                    <span class="text-[9px] text-gray-500 font-mono uppercase block mb-1">KURIR</span>
                    <span class="text-sm text-white font-bold">{{ $tracking['courier'] }}</span>
                    <span class="text-[10px] text-gray-400 font-light block">{{ $tracking['service'] }}</span>
                </div>
                <div>
                    <span class="text-[9px] text-gray-500 font-mono uppercase block mb-1">NOMOR RESI</span>
                    <span class="text-sm text-gold-300 font-bold font-mono">{{ $tracking['tracking_number'] }}</span>
                    <span class="text-[10px] text-gray-400 font-light block">{{ $tracking['service'] }}</span>
                </div>
                <div>
                    <span class="text-[9px] text-gray-500 font-mono uppercase block mb-1">TANGGAL KIRIM</span>
                    <span class="text-sm text-white font-bold">{{ $tracking['ship_date'] }}</span>
                    <span class="text-[10px] text-gray-400 font-light block">{{ $tracking['ship_time'] }}</span>
                </div>
            </div>

            {{-- Copy Tracking Number --}}
            <div class="mb-6">
                <button onclick="copyTrackingNumber('{{ $tracking['tracking_number'] }}')" class="btn-gold-outline text-[10px] px-4 py-2 rounded font-mono tracking-widest flex items-center gap-2">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                    </svg>
                    LACAK DI WEBSITE KURIR
                </button>
            </div>

            {{-- Timeline --}}
            <div>
                <h4 class="text-xs text-gold-400 font-mono font-bold uppercase tracking-wider mb-4">
                    RIWAYAT PERJALANAN PAKET
                </h4>
                <div class="space-y-0">
                    @foreach($tracking['timeline'] as $index => $event)
                        <div class="flex items-start gap-4 relative">
                            {{-- Timeline dot and line --}}
                            <div class="flex flex-col items-center shrink-0">
                                @if($index === 0)
                                    <div class="w-4 h-4 rounded-full bg-gold-400 border-2 border-gold-300 shadow-[0_0_10px_rgba(197,160,89,0.5)] mt-1 z-10"></div>
                                @else
                                    <div class="w-3 h-3 rounded-full bg-gold-400/40 border border-gold-400/60 mt-1.5 z-10"></div>
                                @endif
                                @if(!$loop->last)
                                    <div class="w-0.5 h-12 bg-gradient-to-b from-gold-400/30 to-gold-400/10"></div>
                                @endif
                            </div>

                            {{-- Event Content --}}
                            <div class="pb-6 min-w-0">
                                <h5 class="text-sm font-bold {{ $index === 0 ? 'text-gold-200' : 'text-white' }}">
                                    {{ $event['status'] }}
                                </h5>
                                <p class="text-[11px] text-gray-400 font-light mt-0.5">
                                    {{ $event['detail'] }}
                                </p>
                                <span class="text-[10px] text-gray-500 font-mono mt-1 block">
                                    {{ $event['date'] }}
                                </span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>


        {{-- RIGHT: RINGKASAN PESANAN (5 cols) --}}
        <div class="lg:col-span-5 space-y-6">

            {{-- Order Summary Card --}}
            <div class="bg-gradient-to-b from-[#181613] to-[#0e0d0b] rounded-2xl border border-gold-400/25 p-6 shadow-[0_6px_20px_rgba(0,0,0,0.7)] relative overflow-hidden">
                <div class="absolute -top-16 -right-16 w-40 h-40 bg-gold-400/10 rounded-full blur-3xl pointer-events-none"></div>

                <h3 class="text-lg font-serif font-bold text-white tracking-wider uppercase mb-4 relative z-10">
                    RINGKASAN PESANAN
                </h3>

                {{-- Items --}}
                <div class="space-y-3 mb-5 relative z-10">
                    @foreach($tracking['items'] as $item)
                        <div class="flex items-start gap-3 {{ !$loop->last ? 'pb-3 border-b border-gold-400/10' : '' }}">
                            <img src="{{ asset($item['image']) }}" alt="{{ $item['name'] }}" class="w-14 h-14 object-cover rounded-lg border border-gold-400/20 shadow-sm shrink-0">
                            <div class="flex-1 min-w-0">
                                <h4 class="text-xs font-bold text-white font-serif tracking-wide">{{ $item['name'] }}</h4>
                                <p class="text-[10px] text-gray-400 font-light">{{ $item['desc'] }}</p>
                            </div>
                            <span class="text-xs font-serif font-bold text-gold-300 shrink-0">Rp {{ number_format($item['price'], 0, ',', '.') }}</span>
                        </div>
                    @endforeach
                </div>

                {{-- Price Breakdown --}}
                <div class="space-y-2 pt-3 border-t border-gold-400/15 text-xs font-mono relative z-10">
                    <div class="flex justify-between text-gray-400">
                        <span>Subtotal</span>
                        <span class="text-white">Rp {{ number_format($tracking['subtotal'], 0, ',', '.') }}</span>
                    </div>
                    <div class="flex justify-between text-gray-400">
                        <span>Ongkos Kirim</span>
                        <span class="text-gold-400 font-bold">{{ $tracking['shipping'] > 0 ? 'Rp ' . number_format($tracking['shipping'], 0, ',', '.') : 'Rp 0 (Complimentary)' }}</span>
                    </div>
                </div>

                {{-- Grand Total --}}
                <div class="mt-4 pt-4 border-t-2 border-gold-400/30 flex justify-between items-center relative z-10">
                    <span class="text-xs font-serif font-bold text-gold-400 uppercase tracking-wider">TOTAL</span>
                    <span class="text-xl sm:text-2xl font-serif font-bold text-white glow-gold">Rp {{ number_format($tracking['total'], 0, ',', '.') }}</span>
                </div>
            </div>

            {{-- Recipient Info --}}
            <div class="bg-gradient-to-b from-[#141210] to-[#0a0a0a] rounded-2xl border border-gold-400/20 p-6 shadow-[0_6px_20px_rgba(0,0,0,0.7)]">
                <h3 class="text-xs text-gold-400 font-mono font-bold uppercase tracking-wider mb-3 flex items-center gap-2">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                    ALAMAT PENERIMA
                </h3>
                <div class="bg-black/40 rounded-xl border border-gold-400/15 p-4">
                    <h4 class="text-sm font-bold text-white font-serif">{{ $tracking['recipient']['name'] }}</h4>
                    <p class="text-[11px] text-gray-400 font-light leading-relaxed mt-1">
                        {{ $tracking['recipient']['address'] }}
                    </p>
                </div>
            </div>

            {{-- Payment Method --}}
            <div class="bg-gradient-to-b from-[#141210] to-[#0a0a0a] rounded-2xl border border-gold-400/20 p-6 shadow-[0_6px_20px_rgba(0,0,0,0.7)]">
                <h3 class="text-xs text-gold-400 font-mono font-bold uppercase tracking-wider mb-3 flex items-center gap-2">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path>
                    </svg>
                    METODE PEMBAYARAN
                </h3>
                <div class="bg-black/40 rounded-xl border border-gold-400/15 p-4 flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <div class="w-9 h-9 rounded-lg bg-gold-400/10 border border-gold-400/20 flex items-center justify-center">
                            <svg class="w-4 h-4 text-gold-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path>
                            </svg>
                        </div>
                        <span class="text-sm text-white font-bold">{{ $tracking['payment_method'] }}</span>
                    </div>
                    <span class="text-[10px] text-emerald-400 font-mono tracking-wider font-bold px-2 py-1 rounded bg-emerald-500/10 border border-emerald-500/20">LUNAS</span>
                </div>
            </div>

        </div>
    </div>


    {{-- ========================================================================= --}}
    {{-- INSPIRATIONAL QUOTE SECTION                                               --}}
    {{-- ========================================================================= --}}
    <div class="bg-gradient-to-b from-[#141210] to-[#0a0a0a] rounded-2xl border border-gold-400/20 p-8 sm:p-12 text-center shadow-[0_10px_30px_rgba(0,0,0,0.8)] relative overflow-hidden">
        {{-- Ambient glows --}}
        <div class="absolute -top-20 left-1/2 -translate-x-1/2 w-80 h-80 bg-gold-400/[0.04] rounded-full blur-[100px] pointer-events-none"></div>

        <div class="relative z-10 max-w-2xl mx-auto">
            <svg class="w-10 h-10 text-gold-400/40 mx-auto mb-4" fill="currentColor" viewBox="0 0 24 24">
                <path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z"/>
            </svg>
            <blockquote class="text-lg sm:text-xl lg:text-2xl font-serif text-gold-200 italic leading-relaxed glow-gold mb-4">
                "Setiap langkah adalah bagian dari perjalanan menuju versi terbaik dirimu."
            </blockquote>
            <div class="w-20 h-0.5 bg-gradient-to-r from-transparent via-gold-400 to-transparent mx-auto mb-3"></div>
            <span class="text-xs font-mono text-gold-400/70 tracking-[0.3em] uppercase">ASYIHAN</span>
        </div>
    </div>

</div>
@endsection

@push('scripts')
<script>
    function copyTrackingNumber(number) {
        navigator.clipboard.writeText(number).then(() => {
            // Show a brief notification
            const btn = event.target.closest('button');
            const originalText = btn.innerHTML;
            btn.innerHTML = '<svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5 13l4 4L19 7"></path></svg> RESI TERSALIN!';
            btn.classList.add('border-emerald-400', 'text-emerald-300');
            setTimeout(() => {
                btn.innerHTML = originalText;
                btn.classList.remove('border-emerald-400', 'text-emerald-300');
            }, 2000);
        });
    }
</script>
@endpush
