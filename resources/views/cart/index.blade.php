@extends('layouts.app')

@section('title', 'Keranjang Pesanan Sakral — ASYIHAN Haute Parfumerie')

@section('content')
<div class="py-8 md:py-12 px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto">
    <!-- Breadcrumb -->
    <div class="flex items-center gap-2 text-[10px] sm:text-[11px] tracking-[0.2em] uppercase text-zinc-500 font-serif mb-6">
        <a href="{{ route('home') }}" class="hover:text-amber-400 transition-colors">BERANDA</a>
        <span>/</span>
        <span class="text-amber-400/90 font-medium">KERANJANG PESANAN</span>
    </div>

    <!-- Header Section -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8 pb-6 border-b border-amber-900/30">
        <div>
            <div class="flex items-center gap-2 text-[10px] sm:text-[11px] tracking-[0.25em] uppercase text-amber-400 font-mono font-semibold">
                <span class="w-2 h-2 rounded-full bg-amber-400 inline-block shadow-[0_0_8px_rgba(251,191,36,0.8)]"></span>
                MANIFESTASI PILIHAN BATIN
            </div>
            <h1 class="font-serif text-2xl sm:text-4xl text-amber-100 font-normal tracking-wide mt-2">
                Keranjang Pesanan Sakral
            </h1>
            <p class="text-xs sm:text-sm text-zinc-400 mt-2 font-light leading-relaxed max-w-2xl">
                Pilih wewangian & mahakarya batiniah yang ingin Anda manifestasikan untuk diproses ke gerbang pemesanan.
            </p>
        </div>

        <div class="flex items-center gap-3">
            @if($items->isNotEmpty())
                <span class="px-4 py-2 rounded-lg bg-amber-400 text-black font-semibold text-xs tracking-wider uppercase flex items-center gap-2 shadow-[0_0_15px_rgba(251,191,36,0.3)]">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                    </svg>
                    KERANJANG ({{ $items->count() }} ITEM)
                </span>

                <form action="{{ route('cart.clear') }}" method="POST" onsubmit="return confirm('Kosongkan keranjang untuk simulasi empty state?');">
                    @csrf
                    <button type="submit" class="px-3.5 py-2 rounded-lg border border-zinc-800 hover:border-zinc-600 bg-zinc-900/60 text-zinc-400 hover:text-zinc-200 text-xs font-mono tracking-wider uppercase flex items-center gap-1.5 transition-colors">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                        </svg>
                        SIMULASI KOSONG
                    </button>
                </form>
            @endif
        </div>
    </div>

    @if($items->isEmpty())
        <!-- Empty State -->
        <div class="bg-gradient-to-b from-[#131210] to-[#0a0a0a] border border-amber-900/30 rounded-2xl p-12 sm:p-20 text-center max-w-2xl mx-auto shadow-2xl">
            <div class="w-20 h-20 rounded-full bg-amber-400/10 border border-amber-400/30 mx-auto flex items-center justify-center text-amber-400 text-3xl mb-6 shadow-[0_0_25px_rgba(251,191,36,0.15)]">
                ✦
            </div>
            <h2 class="font-serif text-xl sm:text-2xl text-amber-100 font-medium tracking-wide">Peti Persembahan Masih Hening</h2>
            <p class="text-xs sm:text-sm text-zinc-400 mt-3 font-light leading-relaxed max-w-md mx-auto">
                Belum ada esensi wewangian yang dipilih. Temukan formula yang selaras dengan angka kelahiran Anda atau jelajahi koleksi mahakarya kami.
            </p>
            <div class="mt-8 flex flex-wrap justify-center gap-4">
                <a href="{{ route('calculator') }}" class="px-6 py-3 rounded-xl border border-amber-400/40 text-amber-300 text-xs uppercase tracking-wider hover:bg-amber-400/10 transition-all font-mono">
                    Hitung Frekuensi Takdir
                </a>
                <a href="{{ route('order') }}" class="px-6 py-3 rounded-xl bg-gradient-to-r from-amber-400 via-amber-500 to-yellow-500 text-black font-semibold text-xs uppercase tracking-wider hover:brightness-110 shadow-lg shadow-amber-900/20 transition-all font-mono">
                    Jelajahi Altar Koleksi
                </a>
            </div>
        </div>
    @else
        <!-- Cart Layout: 2 Columns Matching Screenshot -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
            
            <!-- Left Column: Item Selection & List (7 cols) -->
            <div class="lg:col-span-7 space-y-4">
                
                <!-- Select All Bar -->
                <div class="bg-[#111111] border border-amber-900/30 rounded-xl px-5 py-3.5 flex items-center justify-between shadow-md">
                    <label class="flex items-center gap-3 cursor-pointer select-none">
                        <input type="checkbox" id="selectAllCheckbox" checked 
                            class="w-4 h-4 rounded border-amber-400/60 bg-black text-amber-500 focus:ring-0 cursor-pointer accent-amber-400">
                        <span class="text-xs font-serif tracking-wider uppercase text-zinc-200">
                            PILIH SEMUA (<span id="totalProductCount">{{ $items->count() }}</span> PRODUK)
                        </span>
                    </label>
                    
                    <div class="flex items-center gap-4 text-xs font-serif text-zinc-400">
                        <button type="button" onclick="removeSelectedItems()" class="hover:text-rose-400 transition-colors flex items-center gap-1.5 cursor-pointer">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                            </svg>
                            <span>Hapus Terpilih</span>
                        </button>
                        <span class="text-zinc-700">|</span>
                        <button type="button" onclick="window.showSacredToast('Wishlist Jiwa', 'Formula terpilih telah diselaraskan ke dalam altar batin.')" class="hover:text-amber-300 transition-colors flex items-center gap-1.5 cursor-pointer">
                            <svg class="w-3.5 h-3.5 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"/>
                            </svg>
                            <span>Pindahkan ke Wishlist Jiwa</span>
                        </button>
                    </div>
                </div>

                <!-- Cart Items List -->
                <div class="space-y-4">
                    @foreach($items as $item)
                        @php
                            $categoryLabel = match($item->product->category) {
                                'special' => 'PEMBERSIH RUANG & MEDITASI',
                                default => 'EXTRAIT PURE 38% • WETON PENYELARAS',
                            };
                            $badgeCorner = match($item->product->essence_number) {
                                101 => 'AURA',
                                102 => 'REED',
                                103 => 'LILIN',
                                104 => 'SET',
                                default => 'VII',
                            };
                        @endphp
                        <div class="cart-item-card bg-[#111111] border border-amber-900/30 rounded-2xl p-5 sm:p-6 transition-all duration-300 hover:border-amber-400/50 hover:shadow-xl hover:shadow-black/70 relative"
                             data-item-id="{{ $item->id }}"
                             data-price="{{ $item->product->price }}"
                             data-qty="{{ $item->quantity }}">
                            
                            <div class="flex items-start gap-4 sm:gap-5">
                                <!-- Checkbox -->
                                <div class="pt-2 flex-shrink-0">
                                    <input type="checkbox" value="{{ $item->id }}" checked 
                                        onchange="recalculateCart()"
                                        class="item-checkbox w-4 h-4 rounded border-amber-400/60 bg-black text-amber-500 focus:ring-0 cursor-pointer accent-amber-400">
                                </div>

                                <!-- Thumbnail Image with Corner Badge -->
                                <div class="w-20 h-20 sm:w-24 sm:h-24 bg-[#0a0a0a] rounded-xl border border-amber-900/40 p-2 flex items-center justify-center flex-shrink-0 overflow-hidden relative group">
                                    @if($item->product->image && file_exists(public_path($item->product->image)))
                                        <img src="{{ asset($item->product->image) }}" alt="{{ $item->product->name }}" class="w-full h-full object-contain group-hover:scale-105 transition-transform duration-300">
                                    @else
                                        <div class="w-full h-full rounded-lg bg-gradient-to-br from-amber-950/40 to-black flex items-center justify-center text-amber-400 font-serif text-2xl font-bold">
                                            {{ $item->product->essence_number ?? '✧' }}
                                        </div>
                                    @endif
                                    
                                    <!-- Small Corner Label -->
                                    <span class="absolute bottom-1 right-1 text-[8px] font-mono tracking-widest px-1 py-0.5 rounded bg-black/80 border border-amber-400/30 text-amber-300 uppercase">
                                        {{ $badgeCorner }}
                                    </span>
                                </div>

                                <!-- Product Information -->
                                <div class="flex-1 min-w-0">
                                    <!-- Category Pill & Action Buttons Row -->
                                    <div class="flex items-center justify-between gap-2 mb-1">
                                        <span class="text-[9px] uppercase tracking-widest font-mono px-2 py-0.5 rounded bg-amber-400/10 border border-amber-400/30 text-amber-300">
                                            {{ $categoryLabel }}
                                        </span>

                                        <div class="flex items-center gap-2">
                                            <!-- Wishlist Heart Button -->
                                            <button type="button" onclick="window.showSacredToast('Wishlist', '{{ addslashes($item->product->name) }} disematkan ke daftar cinta abadi.')"
                                                class="text-zinc-500 hover:text-amber-400 transition-colors p-1" title="Tambah ke Wishlist">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                                                </svg>
                                            </button>

                                            <!-- Delete Button -->
                                            <button type="button" onclick="removeItem({{ $item->id }})" 
                                                class="text-zinc-500 hover:text-rose-400 transition-colors p-1" title="Hapus dari Keranjang">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>

                                    <!-- Product Title -->
                                    <h3 class="font-serif text-base sm:text-lg text-amber-100 font-medium leading-tight">
                                        {{ $item->product->name }}
                                    </h3>

                                    <!-- Attribute Badges -->
                                    <div class="flex flex-wrap items-center gap-2 mt-1.5">
                                        <span class="inline-flex items-center gap-1 text-[10px] text-zinc-300 bg-black/60 border border-zinc-800 rounded px-2 py-0.5">
                                            <svg class="w-3 h-3 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                                            </svg>
                                            Varian: {{ $item->product->volume ?? '50ml Flacon' }}
                                        </span>
                                        <span class="text-[10px] text-amber-400/90 font-light">
                                            Bonus Batu Kristal Amethyst & Resital Doa
                                        </span>
                                    </div>

                                    <!-- Bottom Row: Counter & Price -->
                                    <div class="flex flex-wrap items-end justify-between gap-3 mt-4 pt-3 border-t border-zinc-800/80">
                                        <div class="flex items-center gap-3">
                                            <span class="text-[10px] tracking-wider uppercase text-zinc-400 font-serif">JUMLAH:</span>
                                            <div class="flex items-center border border-zinc-700 bg-black/80 rounded-lg overflow-hidden">
                                                <button type="button" onclick="updateQuantity({{ $item->id }}, {{ $item->quantity - 1 }})"
                                                    class="w-7 h-7 flex items-center justify-center text-zinc-400 hover:text-amber-300 hover:bg-amber-400/10 transition-colors {{ $item->quantity <= 1 ? 'opacity-40 cursor-not-allowed' : '' }}"
                                                    {{ $item->quantity <= 1 ? 'disabled' : '' }}>
                                                    -
                                                </button>
                                                <span class="w-8 text-center text-xs font-mono text-amber-200 font-semibold" id="qty-display-{{ $item->id }}">
                                                    {{ $item->quantity }}
                                                </span>
                                                <button type="button" onclick="updateQuantity({{ $item->id }}, {{ $item->quantity + 1 }})"
                                                    class="w-7 h-7 flex items-center justify-center text-zinc-400 hover:text-amber-300 hover:bg-amber-400/10 transition-colors">
                                                    +
                                                </button>
                                            </div>
                                            <span class="text-xs text-zinc-400 font-mono">
                                                @ Rp {{ number_format($item->product->price, 0, ',', '.') }}
                                            </span>
                                        </div>

                                        <div class="text-right">
                                            <div class="text-[9px] tracking-widest uppercase text-amber-400/80 font-mono">SUBTOTAL ITEM</div>
                                            <div class="font-serif text-base sm:text-lg text-amber-200 font-bold" id="item-subtotal-{{ $item->id }}">
                                                {{ $item->formatted_subtotal }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Recommendation Banner (Exact from Mockup) -->
                <div class="bg-gradient-to-r from-[#171410] to-[#101010] border border-amber-500/30 rounded-2xl p-4 sm:p-5 flex flex-col sm:flex-row items-center justify-between gap-4 shadow-lg">
                    <div class="flex items-center gap-3.5">
                        <div class="w-10 h-10 rounded-xl bg-amber-400/10 border border-amber-400/30 flex items-center justify-center text-amber-400 flex-shrink-0">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"/>
                            </svg>
                        </div>
                        <div>
                            <div class="text-[10px] uppercase tracking-widest text-amber-400 font-serif font-semibold">REKOMENDASI PENYELARAS JIWA</div>
                            <div class="text-xs text-zinc-300 font-light mt-0.5">
                                Tambahkan <span class="text-amber-200 font-medium">Lilin Sakral Kemurnian Surya (Rp 350.000)</span> untuk membuka Gratis Ongkir Khusus & Kristal Citrine.
                            </div>
                        </div>
                    </div>
                    <button type="button" onclick="window.addToCart(null, 103, this)"
                        class="px-4 py-2 rounded-xl border border-amber-400/40 text-amber-300 hover:bg-amber-400/10 text-xs font-mono transition-colors whitespace-nowrap flex-shrink-0 cursor-pointer">
                        + TAMBAHKAN (RP 350K)
                    </button>
                </div>

            </div>

            <!-- Right Column: Sticky "Ringkasan Pesanan" (5 cols) -->
            <div class="lg:col-span-5">
                <div class="sticky top-24 bg-[#111111] border border-amber-900/40 rounded-2xl p-6 sm:p-7 shadow-2xl space-y-6">
                    
                    <!-- Summary Title & Selected Badge -->
                    <div class="flex items-center justify-between border-b border-zinc-800 pb-4">
                        <h2 class="font-serif text-xl sm:text-2xl text-amber-100 font-medium">
                            Ringkasan Pesanan
                        </h2>
                        <span id="selectedBadge" class="px-3 py-1 rounded-full bg-amber-400/10 border border-amber-400/30 text-amber-300 text-[11px] font-mono">
                            <span id="selectedCountDisplay">{{ $items->count() }}</span> Item Dipilih
                        </span>
                    </div>

                    <!-- Price Details -->
                    <div class="space-y-3.5 text-xs">
                        <div class="flex items-center justify-between text-zinc-300">
                            <span>Total Harga (<span id="selectedCountSubtext">{{ $items->count() }}</span> Produk Terpilih)</span>
                            <span id="itemsSubtotalDisplay" class="font-mono text-amber-200 font-semibold text-sm">
                                Rp {{ number_format($subtotal, 0, ',', '.') }}
                            </span>
                        </div>

                        <div class="flex items-start justify-between text-zinc-300">
                            <div>
                                <div class="flex items-center gap-1.5">
                                    <span>Pengiriman Sakral</span>
                                    <svg class="w-3.5 h-3.5 text-amber-400/70" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                </div>
                                <span class="text-[10px] text-zinc-500">Garansi Tiba Selamat</span>
                            </div>
                            <div class="text-right">
                                <span class="font-mono text-emerald-400 font-semibold text-xs block">
                                    GRATIS (NUSANTARA)
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- Voucher Input -->
                    <div class="pt-2 border-t border-zinc-800/80">
                        <label class="block text-[10px] uppercase tracking-wider text-zinc-400 mb-1.5 font-mono">
                            KODE BERKAH / WETON SPESIAL
                        </label>
                        <div class="flex gap-2">
                            <div class="relative flex-1">
                                <input type="text" id="voucherCode" placeholder="Cth: WETON7KILAT"
                                    class="w-full bg-black/70 border border-zinc-700 rounded-xl px-3.5 py-2.5 text-xs text-amber-200 uppercase font-mono placeholder-zinc-600 focus:border-amber-400 outline-none">
                                <span class="absolute right-3 top-2.5 text-zinc-500">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                                    </svg>
                                </span>
                            </div>
                            <button type="button" onclick="applyVoucher()"
                                class="px-4 py-2.5 rounded-xl bg-zinc-800 hover:bg-zinc-700 text-amber-300 text-xs font-serif uppercase tracking-wider transition-colors cursor-pointer">
                                TERAPKAN
                            </button>
                        </div>
                    </div>

                    <!-- Star Divider -->
                    <div class="flex items-center justify-center text-amber-400/40 text-sm py-0.5">
                        ☆
                    </div>

                    <!-- Total Section -->
                    <div class="border-t border-zinc-800 pt-4">
                        <div class="flex items-baseline justify-between">
                            <div>
                                <div class="text-[10px] tracking-widest uppercase text-amber-400/90 font-mono font-bold">TOTAL PEMBELIAN</div>
                                <div class="text-[10px] text-zinc-500 font-light mt-0.5">Pajak & restu sertifikasi disertakan</div>
                            </div>
                            <div class="text-right">
                                <div id="grandTotalDisplay" class="font-serif text-2xl sm:text-3xl text-amber-100 font-bold tracking-tight">
                                    Rp {{ number_format($subtotal, 0, ',', '.') }}
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Primary Yellow/Gold Action CTA -->
                    <button type="button" onclick="openCheckoutModal()" id="checkoutSubmitBtn"
                        class="w-full py-4 px-6 rounded-xl bg-gradient-to-r from-amber-400 via-amber-500 to-yellow-500 hover:from-amber-300 hover:to-yellow-400 text-black font-serif font-bold text-xs sm:text-sm uppercase tracking-wider shadow-lg shadow-amber-500/25 hover:shadow-amber-500/40 hover:scale-[1.01] transition-all flex items-center justify-center gap-2 group cursor-pointer">
                        <span id="submitBtnText">BELI SEKARANG ({{ $items->count() }} ITEM) — Rp {{ number_format($subtotal, 0, ',', '.') }}</span>
                        <svg class="w-4 h-4 transform group-hover:translate-x-1.5 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                        </svg>
                    </button>

                    <!-- Trust Badges List (Exact from Mockup) -->
                    <div class="pt-4 border-t border-zinc-800/80 space-y-2.5 text-[10px] text-zinc-400 font-mono">
                        <div class="flex items-center gap-2.5">
                            <span class="text-amber-400">⬡</span>
                            <span>100% EXTRAIT DE PARFUM MURNI OTENTIK</span>
                        </div>
                        <div class="flex items-center gap-2.5">
                            <span class="text-amber-400">⬡</span>
                            <span>ENKRIPSI PEMBAYARAN SAKRAL 256-BIT SSL</span>
                        </div>
                        <div class="flex items-center gap-2.5">
                            <span class="text-amber-400">⬡</span>
                            <span>GARANSI KETAHANAN SILLAGE 12-16 JAM</span>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    @endif
</div>

{{-- ========================================================================= --}}
{{-- MODAL / VIEW: ✦ THE SACRED CHECKOUT RITUAL ✦ (Pemesanan & Penyelarasan Takdir) --}}
{{-- ========================================================================= --}}
<div id="checkoutModal" class="fixed inset-0 z-50 bg-black/85 backdrop-blur-md hidden flex items-center justify-center p-4 sm:p-6 overflow-y-auto">
    <div class="bg-[#121110] border border-amber-500/40 rounded-2xl max-w-2xl w-full p-6 sm:p-8 shadow-2xl relative my-8 max-h-[90vh] overflow-y-auto">
        <!-- Close Button -->
        <button type="button" onclick="closeCheckoutModal()" class="absolute top-5 right-5 text-zinc-400 hover:text-amber-300 transition-colors p-1 cursor-pointer">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>

        <div class="text-center mb-6 border-b border-amber-900/30 pb-4">
            <div class="text-[10px] uppercase font-mono tracking-[0.25em] text-amber-400 mb-1">
                ✦ THE SACRED CHECKOUT RITUAL ✦
            </div>
            <h2 class="font-serif text-xl sm:text-2xl text-amber-100 font-semibold">
                Pemesanan & Penyelarasan Takdir
            </h2>
            <p class="text-xs text-zinc-400 mt-1">
                Lengkapi titik singgah pengiriman untuk memproses mahakarya wewangian Anda.
            </p>
        </div>

        <form id="sacredCheckoutForm" action="{{ route('cart.checkout') }}" method="POST" class="space-y-4">
            @csrf
            
            <!-- Hidden Selected Item IDs (Dynamically populated from checked checkboxes) -->
            <div id="modalSelectedIdsContainer"></div>

            <!-- Biodata Pemesan -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-serif text-zinc-300 mb-1.5">Nama Penerima Sakral *</label>
                    <input type="text" name="name" value="{{ old('name', auth()->user()?->name) }}" required
                        placeholder="Contoh: Raden Bayu"
                        class="w-full bg-black/70 border border-zinc-700 rounded-xl px-3.5 py-2.5 text-xs text-amber-100 placeholder-zinc-600 focus:border-amber-400 outline-none">
                </div>
                <div>
                    <label class="block text-xs font-serif text-zinc-300 mb-1.5">Nomor WhatsApp / HP *</label>
                    <input type="text" name="phone" value="{{ old('phone', auth()->user()?->phone) }}" required
                        placeholder="Contoh: 081234567890"
                        class="w-full bg-black/70 border border-zinc-700 rounded-xl px-3.5 py-2.5 text-xs text-amber-100 placeholder-zinc-600 focus:border-amber-400 outline-none">
                </div>
            </div>

            <div>
                <label class="block text-xs font-serif text-zinc-300 mb-1.5">Alamat Email (Untuk Bukti Snap Midtrans)</label>
                <input type="email" name="email" value="{{ old('email', auth()->user()?->email) }}"
                    placeholder="email@domain.com"
                    class="w-full bg-black/70 border border-zinc-700 rounded-xl px-3.5 py-2.5 text-xs text-amber-100 placeholder-zinc-600 focus:border-amber-400 outline-none">
            </div>

            <div>
                <label class="block text-xs font-serif text-zinc-300 mb-1.5">Alamat Lengkap Tempat Singgah *</label>
                <textarea name="address" rows="2" required
                    placeholder="Nama jalan, nomor rumah/paviliun, RT/RW, kelurahan, kecamatan..."
                    class="w-full bg-black/70 border border-zinc-700 rounded-xl px-3.5 py-2.5 text-xs text-amber-100 placeholder-zinc-600 focus:border-amber-400 outline-none">{{ old('address', auth()->user()?->address) }}</textarea>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
                <div>
                    <label class="block text-[11px] font-serif text-zinc-300 mb-1">Kota / Kabupaten *</label>
                    <input type="text" name="city" value="{{ old('city', 'Bandung') }}" required placeholder="Bandung"
                        class="w-full bg-black/70 border border-zinc-700 rounded-xl px-3 py-2 text-xs text-amber-100 placeholder-zinc-600 focus:border-amber-400 outline-none">
                </div>
                <div>
                    <label class="block text-[11px] font-serif text-zinc-300 mb-1">Provinsi *</label>
                    <input type="text" name="province" value="{{ old('province', 'Jawa Barat') }}" required placeholder="Jawa Barat"
                        class="w-full bg-black/70 border border-zinc-700 rounded-xl px-3 py-2 text-xs text-amber-100 placeholder-zinc-600 focus:border-amber-400 outline-none">
                </div>
                <div>
                    <label class="block text-[11px] font-serif text-zinc-300 mb-1">Kode Pos</label>
                    <input type="text" name="postal_code" value="{{ old('postal_code') }}" placeholder="40112"
                        class="w-full bg-black/70 border border-zinc-700 rounded-xl px-3 py-2 text-xs text-amber-100 placeholder-zinc-600 focus:border-amber-400 outline-none">
                </div>
            </div>

            <!-- Ekspedisi -->
            <div class="pt-2">
                <label class="block text-xs font-serif text-zinc-300 mb-2">Pilihan Kurir & Pengiriman</label>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                    <label class="flex items-start gap-3 p-3 rounded-xl border border-amber-500/40 bg-amber-400/5 cursor-pointer">
                        <input type="radio" name="expedition" value="express" checked onchange="updateModalShipping(0)"
                            class="mt-0.5 text-amber-500 accent-amber-400">
                        <div>
                            <div class="text-xs font-serif text-amber-200 font-medium">Express Sacred Courier</div>
                            <div class="text-[10px] text-zinc-400">Gratis Seluruh Nusantara (2-3 Hari)</div>
                            <div class="text-[10px] text-emerald-400 font-mono mt-0.5 font-bold">GRATIS</div>
                        </div>
                    </label>
                    <label class="flex items-start gap-3 p-3 rounded-xl border border-zinc-800 bg-black/40 hover:border-zinc-700 cursor-pointer">
                        <input type="radio" name="expedition" value="same_day" onchange="updateModalShipping(150000)"
                            class="mt-0.5 text-amber-500 accent-amber-400">
                        <div>
                            <div class="text-xs font-serif text-zinc-200 font-medium">Midnight Hand Delivery</div>
                            <div class="text-[10px] text-zinc-400">Pengantaran Hari Ini Segel Lilin</div>
                            <div class="text-[10px] text-amber-400 font-mono mt-0.5 font-bold">+ Rp 150.000</div>
                        </div>
                    </label>
                </div>
            </div>

            <!-- Catatan Pengrajin (Opsional) -->
            <div>
                <label class="block text-xs font-serif text-zinc-300 mb-1">Ukiran Mantra / Catatan untuk Peracik (Opsional)</label>
                <input type="text" name="craftsman_note" placeholder="Misal: Mohon sertakan berkah untuk tanggal lahir 17 Agustus"
                    class="w-full bg-black/70 border border-zinc-700 rounded-xl px-3.5 py-2 text-xs text-amber-100 placeholder-zinc-600 focus:border-amber-400 outline-none">
            </div>

            <!-- Total Review inside modal -->
            <div class="bg-black/80 border border-amber-900/30 rounded-xl p-3.5 flex items-center justify-between text-xs">
                <div>
                    <span class="text-zinc-400 block text-[10px]">TOTAL INVESTASI SAKRAL:</span>
                    <span id="modalGrandTotal" class="font-serif text-lg text-amber-300 font-bold">Rp 0</span>
                </div>
                <div class="text-right text-[10px] text-zinc-500 font-mono">
                    Midtrans Snap Payment Gateway
                </div>
            </div>

            <!-- Submit CTA -->
            <button type="submit"
                class="w-full py-3.5 px-6 rounded-xl bg-gradient-to-r from-amber-400 via-amber-500 to-yellow-500 hover:from-amber-300 hover:to-yellow-400 text-black font-serif font-bold text-xs uppercase tracking-wider shadow-lg shadow-amber-500/25 transition-all flex items-center justify-center gap-2 cursor-pointer">
                <span>LANJUTKAN KE PEMBAYARAN AMAN (MIDTRANS SNAP) &rarr;</span>
            </button>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
    let currentShippingExtra = 0;

    function formatRupiah(amount) {
        return 'Rp ' + amount.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    }

    function recalculateCart() {
        const checkboxes = document.querySelectorAll('.item-checkbox');
        let selectedCount = 0;
        let selectedSubtotal = 0;

        checkboxes.forEach(cb => {
            if (cb.checked) {
                const card = cb.closest('.cart-item-card');
                const price = parseFloat(card.dataset.price);
                const qty = parseInt(card.dataset.qty);
                selectedCount += 1;
                selectedSubtotal += (price * qty);
            }
        });

        // Update displays
        const countDisplay = document.getElementById('selectedCountDisplay');
        const countSubtext = document.getElementById('selectedCountSubtext');
        const subtotalDisplay = document.getElementById('itemsSubtotalDisplay');
        const grandTotalDisplay = document.getElementById('grandTotalDisplay');
        const submitBtnText = document.getElementById('submitBtnText');
        const submitBtn = document.getElementById('checkoutSubmitBtn');

        if (countDisplay) countDisplay.textContent = selectedCount;
        if (countSubtext) countSubtext.textContent = selectedCount;
        if (subtotalDisplay) subtotalDisplay.textContent = formatRupiah(selectedSubtotal);
        if (grandTotalDisplay) grandTotalDisplay.textContent = formatRupiah(selectedSubtotal);

        if (submitBtnText) {
            submitBtnText.textContent = `BELI SEKARANG (${selectedCount} ITEM) — ${formatRupiah(selectedSubtotal)}`;
        }

        if (submitBtn) {
            if (selectedCount === 0) {
                submitBtn.classList.add('opacity-50', 'cursor-not-allowed');
                submitBtn.disabled = true;
            } else {
                submitBtn.classList.remove('opacity-50', 'cursor-not-allowed');
                submitBtn.disabled = false;
            }
        }

        // Update select all checkbox state
        const selectAll = document.getElementById('selectAllCheckbox');
        if (selectAll) {
            selectAll.checked = (selectedCount > 0 && selectedCount === checkboxes.length);
        }
    }

    // Select All / Deselect All
    const selectAllCheckbox = document.getElementById('selectAllCheckbox');
    if (selectAllCheckbox) {
        selectAllCheckbox.addEventListener('change', function() {
            const checkboxes = document.querySelectorAll('.item-checkbox');
            checkboxes.forEach(cb => {
                cb.checked = selectAllCheckbox.checked;
            });
            recalculateCart();
        });
    }

    // Update Quantity via AJAX
    function updateQuantity(cartId, newQty) {
        if (newQty < 1) return;

        fetch(`/cart/${cartId}`, {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ quantity: newQty })
        })
        .then(res => res.json())
        .then(data => {
            if (data.success) {
                const card = document.querySelector(`.cart-item-card[data-item-id="${cartId}"]`);
                if (card) {
                    card.dataset.qty = newQty;
                    const qtyEl = document.getElementById(`qty-display-${cartId}`);
                    if (qtyEl) qtyEl.textContent = newQty;
                    const subtotalEl = document.getElementById(`item-subtotal-${cartId}`);
                    if (subtotalEl) subtotalEl.textContent = data.item_subtotal;
                }
                recalculateCart();
            }
        })
        .catch(err => {
            console.error(err);
            window.showSacredToast('Pembaruan Gagal', 'Tidak dapat memperbarui kuantitas.', 'error');
        });
    }

    // Remove Single Item
    function removeItem(cartId) {
        if (!confirm('Keluarkan mahakarya ini dari peti pesanan?')) return;

        fetch(`/cart/${cartId}`, {
            method: 'DELETE',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        })
        .then(() => {
            window.location.reload();
        })
        .catch(err => {
            console.error(err);
            window.location.reload();
        });
    }

    // Remove Selected Items
    function removeSelectedItems() {
        const checkboxes = document.querySelectorAll('.item-checkbox:checked');
        const ids = Array.from(checkboxes).map(cb => cb.value);

        if (ids.length === 0) {
            window.showSacredToast('Pemberitahuan', 'Pilih minimal satu item untuk dihapus.', 'error');
            return;
        }

        if (!confirm(`Hapus ${ids.length} item terpilih dari keranjang?`)) return;

        fetch('{{ route("cart.removeSelected") }}', {
            method: 'DELETE',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ ids: ids })
        })
        .then(res => res.json())
        .then(data => {
            window.location.reload();
        })
        .catch(err => {
            console.error(err);
            window.location.reload();
        });
    }

    // Voucher application
    function applyVoucher() {
        const code = document.getElementById('voucherCode')?.value?.trim();
        if (!code) {
            window.showSacredToast('Kode Kosong', 'Silakan masukkan kode berkah atau weton.', 'error');
            return;
        }
        window.showSacredToast('Berkah Tersambung', `Kode "${code.toUpperCase()}" berhasil diverifikasi! Diskon berkah akan diterapkan di gerbang pembayaran.`);
    }

    // Open Checkout Modal
    function openCheckoutModal() {
        const checkboxes = document.querySelectorAll('.item-checkbox:checked');
        if (checkboxes.length === 0) {
            window.showSacredToast('Peti Kosong', 'Silakan pilih minimal satu persembahan untuk dibeli.', 'error');
            return;
        }

        // Populate hidden inputs in modal form
        const container = document.getElementById('modalSelectedIdsContainer');
        container.innerHTML = '';
        checkboxes.forEach(cb => {
            const input = document.createElement('input');
            input.type = 'hidden';
            input.name = 'selected_ids[]';
            input.value = cb.value;
            container.appendChild(input);
        });

        // Compute total for modal
        let selectedSubtotal = 0;
        checkboxes.forEach(cb => {
            const card = cb.closest('.cart-item-card');
            const price = parseFloat(card.dataset.price);
            const qty = parseInt(card.dataset.qty);
            selectedSubtotal += (price * qty);
        });

        const totalWithShipping = selectedSubtotal + currentShippingExtra;
        document.getElementById('modalGrandTotal').textContent = formatRupiah(totalWithShipping);

        document.getElementById('checkoutModal').classList.remove('hidden');
        document.body.classList.add('overflow-hidden');
    }

    function closeCheckoutModal() {
        document.getElementById('checkoutModal').classList.add('hidden');
        document.body.classList.remove('overflow-hidden');
    }

    function updateModalShipping(extra) {
        currentShippingExtra = extra;
        const checkboxes = document.querySelectorAll('.item-checkbox:checked');
        let selectedSubtotal = 0;
        checkboxes.forEach(cb => {
            const card = cb.closest('.cart-item-card');
            const price = parseFloat(card.dataset.price);
            const qty = parseInt(card.dataset.qty);
            selectedSubtotal += (price * qty);
        });
        document.getElementById('modalGrandTotal').textContent = formatRupiah(selectedSubtotal + currentShippingExtra);
    }
</script>
@endpush
