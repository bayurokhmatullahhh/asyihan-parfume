@extends('layouts.app')

@section('title', 'Akun Saya — ASYIHAN Sanctum Jiwa Pemilik')
@section('meta_description', 'Halaman akun pribadi Anda di ASYIHAN. Lihat riwayat pesanan, lacak paket, dan kelola profil Sanctum Jiwa Anda.')

@section('content')
<div class="max-w-6xl mx-auto px-4 sm:px-6 py-6 sm:py-10">

    {{-- ========================================================================= --}}
    {{-- HERO HEADER SECTION                                                       --}}
    {{-- ========================================================================= --}}
    <div class="mb-8">
        <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-gold-400/10 border border-gold-400/30 text-gold-300 text-xs tracking-[0.2em] font-mono uppercase mb-4 shadow-[0_0_15px_rgba(197,160,89,0.15)]">
            ✦ SANCTUM JIWA PEMILIK ✦
        </div>
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div>
                <h1 class="text-3xl sm:text-4xl lg:text-5xl font-serif font-bold text-white tracking-wider glow-gold uppercase">
                    Akun Saya
                </h1>
                <p class="text-gray-300 font-light text-sm sm:text-base mt-2 leading-relaxed">
                    Selamat datang di gerbang resonansi batiniah dan jejak wewangian sakral Anda.
                </p>
            </div>
            <a href="#" class="btn-gold-outline text-[10px] px-5 py-2.5 rounded-full font-mono tracking-widest self-start sm:self-center whitespace-nowrap">
                ANGGOTA TERPILIH SANCTUM ASYIHAN
            </a>
        </div>
    </div>

    {{-- ========================================================================= --}}
    {{-- PROFILE CARD                                                              --}}
    {{-- ========================================================================= --}}
    <div class="bg-gradient-to-b from-[#141210] to-[#0a0a0a] rounded-2xl border border-gold-400/25 p-6 sm:p-8 mb-8 shadow-[0_10px_30px_rgba(0,0,0,0.8)] relative overflow-hidden">
        {{-- Ambient glow --}}
        <div class="absolute -top-20 -right-20 w-60 h-60 bg-gold-400/[0.06] rounded-full blur-3xl pointer-events-none"></div>

        <div class="flex flex-col sm:flex-row items-start sm:items-center gap-6 relative z-10">
            {{-- Avatar --}}
            <div class="relative shrink-0">
                <div class="w-20 h-20 sm:w-24 sm:h-24 rounded-full border-2 border-gold-400/50 bg-gradient-to-b from-[#1a1815] to-[#0d0c0a] flex items-center justify-center shadow-[0_0_30px_rgba(197,160,89,0.15)]">
                    <svg class="w-10 h-10 sm:w-12 sm:h-12 text-gold-400/70" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                </div>
                {{-- Status indicator --}}
                <div class="absolute -bottom-1 -right-1 w-5 h-5 rounded-full bg-emerald-500 border-2 border-[#141210] animate-pulse"></div>
            </div>

            {{-- User Info --}}
            <div class="flex-1 min-w-0">
                <div class="flex flex-col sm:flex-row sm:items-center gap-2 sm:gap-4 mb-2">
                    <h2 class="text-xl sm:text-2xl font-serif font-bold text-white tracking-wide">
                        Raden Arya Danuswara
                    </h2>
                    <span class="inline-flex items-center gap-1.5 px-3 py-0.5 rounded-full bg-gold-400/15 border border-gold-400/30 text-gold-300 text-[10px] font-mono tracking-wider uppercase self-start">
                        <span class="w-1.5 h-1.5 rounded-full bg-gold-400 animate-pulse"></span>
                        INTÉ · LEVEL VII
                    </span>
                </div>
                <div class="flex flex-wrap items-center gap-x-4 gap-y-1.5 text-xs text-gray-400 font-light mb-3">
                    <span class="flex items-center gap-1.5">
                        <svg class="w-3.5 h-3.5 text-gold-400/60" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                        arya.danuswara@sanctum.id
                    </span>
                    <span class="flex items-center gap-1.5">
                        <svg class="w-3.5 h-3.5 text-gold-400/60" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                        </svg>
                        +62 812-3456-7890
                    </span>
                </div>
                <div class="flex flex-wrap gap-2 text-[10px] font-mono tracking-wider">
                    <span class="px-2.5 py-1 rounded-full border border-gold-400/25 bg-gold-400/5 text-gold-300">
                        ANGKA INTI: 7 (THE SEEKER)
                    </span>
                    <span class="px-2.5 py-1 rounded-full border border-gold-400/25 bg-gold-400/5 text-gold-300">
                        WETON: SUKRA PON
                    </span>
                    <span class="px-2.5 py-1 rounded-full border border-gold-400/25 bg-gold-400/5 text-gold-300">
                        ALCHEMIST MEMBER
                    </span>
                </div>
            </div>

            {{-- Action Buttons --}}
            <div class="flex flex-col gap-2 shrink-0">
                <button class="btn-gold-outline text-[10px] px-4 py-2 rounded font-mono tracking-widest flex items-center gap-2">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                    </svg>
                    EDIT PROFIL
                </button>
                <button class="text-[10px] px-4 py-2 rounded font-mono tracking-widest border border-white/10 text-gray-400 hover:text-gold-300 hover:border-gold-400/30 transition-all flex items-center gap-2">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.367 2.684 3 3 0 00-5.367-2.684z"></path>
                    </svg>
                    BAGIKAN AURA
                </button>
            </div>
        </div>
    </div>

    {{-- ========================================================================= --}}
    {{-- TAB NAVIGATION                                                            --}}
    {{-- ========================================================================= --}}
    <div class="flex flex-wrap items-center justify-between border-b border-gold-400/20 mb-8">
        <div class="flex items-center gap-1 sm:gap-2 text-xs font-mono tracking-wider overflow-x-auto">
            <button id="tab-pesanan" onclick="switchTab('pesanan')" class="account-tab px-3 sm:px-5 py-3 border-b-2 border-gold-400 text-gold-400 font-bold uppercase transition-all flex items-center gap-1.5 whitespace-nowrap">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                </svg>
                PESANAN SAYA
            </button>
            <button id="tab-alamat" onclick="switchTab('alamat')" class="account-tab px-3 sm:px-5 py-3 border-b-2 border-transparent text-gray-400 hover:text-gold-300 uppercase transition-all flex items-center gap-1.5 whitespace-nowrap">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                </svg>
                ALAMAT PENGIRIMAN
            </button>
            <button id="tab-pembayaran" onclick="switchTab('pembayaran')" class="account-tab px-3 sm:px-5 py-3 border-b-2 border-transparent text-gray-400 hover:text-gold-300 uppercase transition-all flex items-center gap-1.5 whitespace-nowrap">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path>
                </svg>
                METODE PEMBAYARAN
            </button>
        </div>
        <a href="#" class="hidden sm:flex items-center gap-1.5 text-[11px] text-gold-400 hover:text-gold-200 font-mono tracking-wider transition-colors py-3">
            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
            </svg>
            KELUAR GERBANG
        </a>
    </div>


    {{-- ========================================================================= --}}
    {{-- TAB CONTENT: PESANAN SAYA                                                 --}}
    {{-- ========================================================================= --}}
    <div id="content-pesanan" class="tab-content">

        {{-- Section Title --}}
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-6 gap-3">
            <div>
                <h2 class="text-xl sm:text-2xl font-serif font-bold text-white tracking-wider">
                    Riwayat Perjalanan & Pesanan Sakral
                </h2>
                <p class="text-xs sm:text-sm text-gray-400 font-light mt-1">
                    Daftar formula wewangian yang telah diselaraskan dengan weton dan frekuensi jiwa Anda.
                </p>
            </div>
            <div class="flex items-center gap-2 text-[10px] font-mono text-gray-400 tracking-wider">
                <span>URUTKAN:</span>
                <select class="bg-black/60 border border-gold-400/20 text-gold-300 text-[10px] font-mono px-3 py-1.5 rounded cursor-pointer focus:outline-none focus:border-gold-400">
                    <option>Terbaru</option>
                    <option>Terlama</option>
                    <option>Harga Tertinggi</option>
                </select>
            </div>
        </div>

        {{-- Order Cards --}}
        <div class="space-y-6">
            @foreach($orders as $order)
                <div class="bg-gradient-to-b from-[#141210] to-[#0a0a0a] rounded-2xl border border-gold-400/20 overflow-hidden shadow-[0_6px_20px_rgba(0,0,0,0.7)] hover:border-gold-400/40 transition-all">

                    {{-- Order Header Bar --}}
                    <div class="flex flex-wrap items-center justify-between gap-3 px-5 sm:px-6 py-3 bg-gradient-to-r from-[#1a1815] to-[#121110] border-b border-gold-400/15">
                        <div class="flex flex-wrap items-center gap-4 sm:gap-8 text-[10px] sm:text-[11px] font-mono tracking-wider">
                            <div>
                                <span class="text-gray-500 uppercase block">NOMOR PESANAN</span>
                                <span class="text-gold-300 font-bold">#{{ $order['id'] }}</span>
                            </div>
                            <div>
                                <span class="text-gray-500 uppercase block">WAKTU MERAMU</span>
                                <span class="text-gray-300">{{ $order['date'] }}</span>
                            </div>
                            <div>
                                <span class="text-gray-500 uppercase block">TOTAL MAHAKARYA</span>
                                <span class="text-gold-200 font-bold">Rp {{ number_format($order['total'], 0, ',', '.') }}</span>
                            </div>
                        </div>

                        {{-- Status Badge --}}
                        @if($order['status'] === 'diterima')
                            <span class="px-3 py-1.5 rounded-full border border-emerald-500/40 bg-emerald-500/10 text-emerald-300 text-[10px] font-mono tracking-wider font-bold">
                                ✓ {{ $order['status_label'] }}
                            </span>
                        @elseif($order['status'] === 'dikirim')
                            <span class="px-3 py-1.5 rounded-full border border-gold-400/40 bg-gold-400/10 text-gold-300 text-[10px] font-mono tracking-wider font-bold animate-pulse">
                                ⟡ {{ $order['status_label'] }}
                            </span>
                        @else
                            <span class="px-3 py-1.5 rounded-full border border-gray-500/40 bg-gray-500/10 text-gray-300 text-[10px] font-mono tracking-wider font-bold">
                                ◆ {{ $order['status_label'] }}
                            </span>
                        @endif
                    </div>

                    {{-- Order Items --}}
                    <div class="p-5 sm:p-6 space-y-4">
                        @foreach($order['items'] as $item)
                            <div class="flex items-start gap-4 {{ !$loop->last ? 'pb-4 border-b border-gold-400/10' : '' }}">
                                {{-- Product Image --}}
                                <div class="relative shrink-0">
                                    <img src="{{ asset($item['image']) }}" alt="{{ $item['name'] }}" class="w-16 h-16 sm:w-20 sm:h-20 object-cover rounded-lg border border-gold-400/20 shadow-md">
                                </div>

                                {{-- Product Details --}}
                                <div class="flex-1 min-w-0">
                                    <h4 class="text-sm sm:text-base font-serif font-bold text-white tracking-wide">
                                        {{ $item['name'] }}
                                    </h4>
                                    <p class="text-[11px] sm:text-xs text-gray-400 font-light mt-0.5 leading-relaxed">
                                        {{ $item['desc'] }}
                                    </p>
                                    <p class="text-[10px] text-gray-500 font-light mt-0.5 italic">
                                        {{ $item['detail'] }}
                                    </p>
                                </div>

                                {{-- Qty & Price --}}
                                <div class="text-right shrink-0">
                                    <span class="text-[10px] text-gray-500 font-mono block">{{ $item['qty'] }} Unit</span>
                                    <span class="text-sm sm:text-base font-serif font-bold text-gold-300">Rp {{ number_format($item['price'], 0, ',', '.') }}</span>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    {{-- Order Footer Actions --}}
                    <div class="px-5 sm:px-6 py-3 bg-[#0d0c0a] border-t border-gold-400/10">
                        @if($order['status'] === 'diterima')
                            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3">
                                <p class="text-[10px] text-gray-500 font-mono font-light">
                                    <span class="text-gold-400">Kurk Khanoo Sanctum Express:</span> ASY-639-009412 • Diterima langsung di Pavilion Dago
                                </p>
                                <div class="flex items-center gap-2">
                                    <button class="btn-gold-outline text-[9px] px-3.5 py-1.5 rounded font-mono tracking-widest">
                                        UNDUH DOA & SERTIFIKAT
                                    </button>
                                    <a href="{{ route('account.track', $order['id']) }}" class="btn-gold text-[9px] px-3.5 py-1.5 rounded font-mono tracking-widest text-black">
                                        LIHAT DETAIL PESANAN
                                    </a>
                                </div>
                            </div>
                        @elseif($order['status'] === 'dikirim')
                            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3">
                                <p class="text-[10px] text-gray-500 font-mono font-light italic">
                                    Perkiraan Siap Diterima: <span class="text-gold-400">Malam Bulan Purnama (05 Oktober 2026)</span>
                                </p>
                                <div class="flex items-center gap-2">
                                    <a href="{{ route('account.track', $order['id']) }}" class="btn-gold-outline text-[9px] px-3.5 py-1.5 rounded font-mono tracking-widest">
                                        LACAK ALIRAN RITUAL
                                    </a>
                                    <a href="{{ route('account.track', $order['id']) }}" class="btn-gold text-[9px] px-3.5 py-1.5 rounded font-mono tracking-widest text-black">
                                        LIHAT DETAIL PESANAN
                                    </a>
                                </div>
                            </div>
                        @else
                            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3">
                                <p class="text-[10px] text-gray-500 font-mono font-light">
                                    Formula telah mekathar harmonis dengan stikit arismia Anda selama 48 hari.
                                </p>
                                <div class="flex items-center gap-2">
                                    <a href="{{ route('order') }}" class="btn-gold-outline text-[9px] px-3.5 py-1.5 rounded font-mono tracking-widest">
                                        PESAN ULANG FORMULA
                                    </a>
                                    <a href="{{ route('account.track', ['orderId' => 'ASY-8921-7701']) }}" class="btn-gold text-[9px] px-3.5 py-1.5 rounded font-mono tracking-widest text-black">
                                        LIHAT DETAIL PESANAN
                                    </a>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>


    {{-- ========================================================================= --}}
    {{-- TAB CONTENT: ALAMAT PENGIRIMAN                                            --}}
    {{-- ========================================================================= --}}
    <div id="content-alamat" class="tab-content hidden">
        <div class="bg-gradient-to-b from-[#141210] to-[#0a0a0a] rounded-2xl border border-gold-400/20 p-6 sm:p-8 shadow-[0_6px_20px_rgba(0,0,0,0.7)]">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-lg sm:text-xl font-serif font-bold text-white tracking-wider uppercase">
                    Titik Singgah Penerimaan
                </h2>
                <button class="btn-gold-outline text-[10px] px-4 py-2 rounded font-mono tracking-widest">
                    + TAMBAH ALAMAT
                </button>
            </div>

            <div class="space-y-4">
                {{-- Primary Address --}}
                <div class="bg-black/40 rounded-xl border-2 border-gold-400/40 p-5 relative">
                    <div class="absolute top-3 right-3 px-2 py-0.5 bg-gold-400/15 border border-gold-400/30 text-gold-300 text-[9px] font-mono rounded tracking-wider">
                        UTAMA
                    </div>
                    <h3 class="text-sm font-bold text-white font-serif mb-1">Raden Arya Danuswara</h3>
                    <p class="text-xs text-gray-400 font-light leading-relaxed">
                        +62 812-3456-7890<br>
                        Jl. Tamblong No.46, Braga, Kec. Sumur Bandung,<br>
                        Kota Bandung, Jawa Barat 40112
                    </p>
                    <div class="flex items-center gap-3 mt-4">
                        <button class="text-[10px] text-gold-400 hover:text-gold-200 font-mono tracking-wider transition-colors">EDIT</button>
                        <span class="text-gray-600">|</span>
                        <button class="text-[10px] text-gray-500 hover:text-red-400 font-mono tracking-wider transition-colors">HAPUS</button>
                    </div>
                </div>

                {{-- Secondary Address --}}
                <div class="bg-black/40 rounded-xl border border-white/10 p-5 hover:border-gold-400/20 transition-all">
                    <h3 class="text-sm font-bold text-white font-serif mb-1">Sanggar Meditasi Dago</h3>
                    <p class="text-xs text-gray-400 font-light leading-relaxed">
                        +62 812-3456-7890<br>
                        Jl. Ir. H. Juanda No.102, Dago,<br>
                        Kota Bandung, Jawa Barat 40135
                    </p>
                    <div class="flex items-center gap-3 mt-4">
                        <button class="text-[10px] text-gold-400 hover:text-gold-200 font-mono tracking-wider transition-colors">EDIT</button>
                        <span class="text-gray-600">|</span>
                        <button class="text-[10px] text-gray-500 hover:text-red-400 font-mono tracking-wider transition-colors">HAPUS</button>
                        <span class="text-gray-600">|</span>
                        <button class="text-[10px] text-gold-400 hover:text-gold-200 font-mono tracking-wider transition-colors">JADIKAN UTAMA</button>
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{-- ========================================================================= --}}
    {{-- TAB CONTENT: METODE PEMBAYARAN                                            --}}
    {{-- ========================================================================= --}}
    <div id="content-pembayaran" class="tab-content hidden">
        <div class="bg-gradient-to-b from-[#141210] to-[#0a0a0a] rounded-2xl border border-gold-400/20 p-6 sm:p-8 shadow-[0_6px_20px_rgba(0,0,0,0.7)]">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-lg sm:text-xl font-serif font-bold text-white tracking-wider uppercase">
                    Gerbang Pembayaran Tersimpan
                </h2>
                <button class="btn-gold-outline text-[10px] px-4 py-2 rounded font-mono tracking-widest">
                    + TAMBAH METODE
                </button>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                {{-- Payment Method 1 --}}
                <div class="bg-black/40 rounded-xl border-2 border-gold-400/40 p-5 relative">
                    <div class="absolute top-3 right-3 px-2 py-0.5 bg-gold-400/15 border border-gold-400/30 text-gold-300 text-[9px] font-mono rounded tracking-wider">
                        DEFAULT
                    </div>
                    <div class="flex items-center gap-3 mb-3">
                        <div class="w-10 h-10 rounded-lg bg-gold-400/10 border border-gold-400/20 flex items-center justify-center">
                            <svg class="w-5 h-5 text-gold-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-sm font-bold text-white font-serif">Transfer Bank (BCA)</h3>
                            <span class="text-[11px] text-gray-500 font-mono">•••• •••• •••• 4289</span>
                        </div>
                    </div>
                </div>

                {{-- Payment Method 2 --}}
                <div class="bg-black/40 rounded-xl border border-white/10 p-5 hover:border-gold-400/20 transition-all">
                    <div class="flex items-center gap-3 mb-3">
                        <div class="w-10 h-10 rounded-lg bg-gold-400/10 border border-gold-400/20 flex items-center justify-center">
                            <svg class="w-5 h-5 text-gold-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-sm font-bold text-white font-serif">QRIS Instan</h3>
                            <span class="text-[11px] text-gray-500 font-mono">GoPay, OVO, Dana</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection

@push('scripts')
<script>
    function switchTab(tabName) {
        // Hide all tab contents
        document.querySelectorAll('.tab-content').forEach(el => el.classList.add('hidden'));
        // Deactivate all tab buttons
        document.querySelectorAll('.account-tab').forEach(btn => {
            btn.classList.remove('border-gold-400', 'text-gold-400', 'font-bold');
            btn.classList.add('border-transparent', 'text-gray-400');
        });

        // Show the selected tab content
        const content = document.getElementById('content-' + tabName);
        if (content) content.classList.remove('hidden');

        // Activate the selected tab button
        const tab = document.getElementById('tab-' + tabName);
        if (tab) {
            tab.classList.remove('border-transparent', 'text-gray-400');
            tab.classList.add('border-gold-400', 'text-gold-400', 'font-bold');
        }
    }
</script>
@endpush
