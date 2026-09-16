@extends('layouts.app')

@section('title', 'Shipping & Returns — ASYIHAN')
@section('meta_description', 'Shipping & Returns ASYIHAN — Kebijakan Pengiriman dan Pengembalian Produk ASYIHAN.')

@section('content')
<div class="max-w-5xl mx-auto px-4 sm:px-6 py-8">
    
    {{-- Header & Badge --}}
    <div class="text-center mb-12">
        <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-gold-400/10 border border-gold-400/30 text-gold-300 text-xs tracking-[0.2em] uppercase mb-4">
            Pengiriman & Pengembalian
        </div>
        <h1 class="text-3xl sm:text-5xl font-serif text-white tracking-wider glow-gold mb-3">
            SHIPPING & RETURNS
        </h1>
        <p class="text-gold-300 font-serif italic text-base sm:text-lg">
            Kebijakan Pengiriman & Pengembalian Produk ASYIHAN
        </p>
        <div class="w-24 h-0.5 bg-gradient-to-r from-transparent via-gold-400 to-transparent mx-auto mt-6"></div>
    </div>

    {{-- Content Section --}}
    <section class="bg-panel rounded-2xl p-8 sm:p-12 border border-gold-400/20 mb-12 relative overflow-hidden shadow-2xl">
        <div class="absolute -top-32 -left-32 w-80 h-80 bg-gold-400/5 rounded-full blur-3xl"></div>

        <div class="prose prose-invert max-w-none text-gray-300 font-light leading-relaxed space-y-8">
            {{-- Penjelasan --}}
            <div class="bg-black/60 border-l-2 border-gold-400 p-6 rounded-r-xl">
                <h2 class="text-xl font-serif text-gold-300 mb-3 tracking-wide">Komitmen Layanan Pengiriman</h2>
                <p class="text-sm sm:text-base text-gray-300 leading-relaxed">
                    Kami berusaha memberikan layanan pengiriman terbaik.
                </p>
            </div>

            {{-- Poin-Poin Utama --}}
            <div>
                <h3 class="text-lg font-serif text-gold-400 tracking-wide uppercase mb-6 flex items-center gap-2">
                    <span class="w-2 h-2 rounded-full bg-gold-400"></span>
                    Poin-Poin Penting
                </h3>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="p-6 bg-black/40 rounded-xl border border-gold-400/20 flex flex-col justify-between">
                        <div>
                            <div class="w-10 h-10 rounded-full border border-gold-400/40 flex items-center justify-center bg-gold-400/10 text-gold-400 shadow-[0_0_10px_rgba(197,160,89,0.25)] mb-4">
                                <svg class="w-5 h-5 text-gold-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 104 0m6 0a2 2 0 104 0m-4 0a2 2 0 104 0"/>
                                </svg>
                            </div>
                            <h4 class="font-serif text-white text-sm sm:text-base mb-2">Estimasi Pengiriman</h4>
                            <p class="text-xs sm:text-sm text-gray-400 font-light leading-relaxed">
                                Estimasi pengiriman: 3–7 hari kerja.
                            </p>
                        </div>
                    </div>

                    <div class="p-6 bg-black/40 rounded-xl border border-gold-400/20 flex flex-col justify-between">
                        <div>
                            <div class="w-10 h-10 rounded-full border border-gold-400/40 flex items-center justify-center bg-gold-400/10 text-gold-400 shadow-[0_0_10px_rgba(197,160,89,0.25)] mb-4">
                                <svg class="w-5 h-5 text-gold-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                                </svg>
                            </div>
                            <h4 class="font-serif text-white text-sm sm:text-base mb-2">Syarat Pengembalian</h4>
                            <p class="text-xs sm:text-sm text-gray-400 font-light leading-relaxed">
                                Barang dapat dikembalikan dalam 14 hari jika rusak atau tidak sesuai.
                            </p>
                        </div>
                    </div>

                    <div class="p-6 bg-black/40 rounded-xl border border-gold-400/20 flex flex-col justify-between">
                        <div>
                            <div class="w-10 h-10 rounded-full border border-gold-400/40 flex items-center justify-center bg-gold-400/10 text-gold-400 shadow-[0_0_10px_rgba(197,160,89,0.25)] mb-4">
                                <svg class="w-5 h-5 text-gold-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 10h18M7 15h1m4 0h1m-7 4h12a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                </svg>
                            </div>
                            <h4 class="font-serif text-white text-sm sm:text-base mb-2">Biaya Pengiriman</h4>
                            <p class="text-xs sm:text-sm text-gray-400 font-light leading-relaxed">
                                Biaya pengiriman tidak dapat dikembalikan.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Detail Tambahan --}}
            <div class="border-t border-gold-400/15 pt-8 mt-8">
                <p class="text-xs sm:text-sm text-gray-400 leading-relaxed italic">
                    Membutuhkan bantuan terkait status pesanan atau pengembalian? Hubungi tim concierge kami melalui halaman <a href="{{ route('contact') }}" class="text-gold-400 hover:underline">Contact Us</a> atau <a href="{{ route('order') }}" class="text-gold-400 hover:underline">Order</a>.
                </p>
            </div>
        </div>
    </section>
</div>
@endsection
