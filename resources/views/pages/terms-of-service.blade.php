@extends('layouts.app')

@section('title', 'Terms of Service — ASYIHAN')
@section('meta_description', 'Terms of Service ASYIHAN — Syarat dan ketentuan penggunaan layanan ASYIHAN.')

@section('content')
<div class="max-w-5xl mx-auto px-4 sm:px-6 py-8">
    
    {{-- Header & Badge --}}
    <div class="text-center mb-12">
        <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-gold-400/10 border border-gold-400/30 text-gold-300 text-xs tracking-[0.2em] uppercase mb-4">
            Legal & Syarat Layanan
        </div>
        <h1 class="text-3xl sm:text-5xl font-serif text-white tracking-wider glow-gold mb-3">
            TERMS OF SERVICE
        </h1>
        <p class="text-gold-300 font-serif italic text-base sm:text-lg">
            Syarat & Ketentuan Layanan ASYIHAN
        </p>
        <div class="w-24 h-0.5 bg-gradient-to-r from-transparent via-gold-400 to-transparent mx-auto mt-6"></div>
    </div>

    {{-- Content Section --}}
    <section class="bg-panel rounded-2xl p-8 sm:p-12 border border-gold-400/20 mb-12 relative overflow-hidden shadow-2xl">
        <div class="absolute -top-32 -left-32 w-80 h-80 bg-gold-400/5 rounded-full blur-3xl"></div>

        <div class="prose prose-invert max-w-none text-gray-300 font-light leading-relaxed space-y-8">
            {{-- Penjelasan --}}
            <div class="bg-blue/40 border-l-2 border-gold-400 p-6 rounded-r-xl">
                <h2 class="text-xl font-serif text-gold-300 mb-3 tracking-wide">Persetujuan Layanan</h2>
                <p class="text-sm sm:text-base text-gray-300 leading-relaxed">
                    Dengan menggunakan layanan ini, Anda setuju pada syarat dan ketentuan berikut:
                </p>
            </div>

            {{-- Poin-Poin Utama --}}
            <div>
                <h3 class="text-lg font-serif text-gold-400 tracking-wide uppercase mb-6 flex items-center gap-2">
                    <span class="w-2 h-2 rounded-full bg-gold-400"></span>
                    Poin-Poin Penting
                </h3>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="p-6 bg-black/40 rounded-xl border border-gold-400/15 flex flex-col justify-between">
                        <div>
                            <div class="w-10 h-10 rounded-full border border-gold-400/30 flex items-center justify-center text-gold-400 font-serif text-lg bg-gold-400/5 mb-4">
                                👤
                            </div>
                            <h4 class="font-serif text-white text-sm sm:text-base mb-2">Penggunaan Pribadi</h4>
                            <p class="text-xs sm:text-sm text-gray-400 font-light leading-relaxed">
                                Konten hanya untuk penggunaan pribadi.
                            </p>
                        </div>
                    </div>

                    <div class="p-6 bg-black/40 rounded-xl border border-gold-400/15 flex flex-col justify-between">
                        <div>
                            <div class="w-10 h-10 rounded-full border border-gold-400/30 flex items-center justify-center text-gold-400 font-serif text-lg bg-gold-400/5 mb-4">
                                ⚖️
                            </div>
                            <h4 class="font-serif text-white text-sm sm:text-base mb-2">Larangan Penyalahgunaan</h4>
                            <p class="text-xs sm:text-sm text-gray-400 font-light leading-relaxed">
                                Dilarang menyalahgunakan layanan untuk tujuan ilegal.
                            </p>
                        </div>
                    </div>

                    <div class="p-6 bg-black/40 rounded-xl border border-gold-400/15 flex flex-col justify-between">
                        <div>
                            <div class="w-10 h-10 rounded-full border border-gold-400/30 flex items-center justify-center text-gold-400 font-serif text-lg bg-gold-400/5 mb-4">
                                📝
                            </div>
                            <h4 class="font-serif text-white text-sm sm:text-base mb-2">Perubahan Syarat</h4>
                            <p class="text-xs sm:text-sm text-gray-400 font-light leading-relaxed">
                                Perubahan syarat dapat dilakukan sewaktu-waktu.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Detail Tambahan --}}
            <div class="border-t border-gold-400/15 pt-8 mt-8">
                <p class="text-xs sm:text-sm text-gray-400 leading-relaxed italic">
                    Untuk informasi atau pertanyaan mengenai syarat layanan kami, silakan hubungi tim ASYIHAN melalui <a href="{{ route('contact') }}" class="text-gold-400 hover:underline">Contact Us</a>.
                </p>
            </div>
        </div>
    </section>
</div>
@endsection
