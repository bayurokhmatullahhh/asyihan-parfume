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
            <div class="bg-black/60 border-l-2 border-gold-400 p-6 rounded-r-xl">
                <h2 class="text-xl font-serif text-gold-300 mb-3 tracking-wide">Persetujuan Layanan</h2>
                <p class="text-sm sm:text-base text-gray-300 leading-relaxed">
                    Dengan menggunakan layanan ini, Anda setuju pada syarat dan ketentuan berikut:
                </p>
            </div>

            {{-- Disclaimer Numerologi --}}
            <div class="p-6 rounded-xl border border-gold-400/30 bg-[#040919]/90 relative overflow-hidden shadow-lg">
                <div class="flex items-start gap-4">
                    <div class="w-10 h-10 rounded-full border border-gold-400/40 bg-gold-400/10 flex items-center justify-center shrink-0 text-gold-400 font-serif text-lg">
                        ✦
                    </div>
                    <div class="space-y-2">
                        <h3 class="font-serif text-gold-300 text-base font-medium tracking-wide uppercase">
                            Disclaimer / Sanggahan Hasil Numerologi
                        </h3>
                        <p class="text-xs sm:text-sm text-gray-300 leading-relaxed font-light">
                            Seluruh fitur kalkulator dan hasil perhitungan numerologi pada platform ASYIHAN disediakan untuk tujuan edukasi, refleksi diri, serta penumbuhan sugesti positif. Hasil analisis numerologi dan saran wewangian yang disajikan <strong class="text-gold-300 font-normal">bukanlah suatu kebenaran mutlak atau kepastian yang mengikat</strong>, melainkan inspirasi untuk membangun harmoni energi dalam keseharian Anda.
                        </p>
                    </div>
                </div>
            </div>

            {{-- Poin-Poin Utama --}}
            <div>
                <h3 class="text-lg font-serif text-gold-400 tracking-wide uppercase mb-6 flex items-center gap-2">
                    <span class="w-2 h-2 rounded-full bg-gold-400"></span>
                    Poin-Poin Penting
                </h3>
                
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    <div class="p-6 bg-black/40 rounded-xl border border-gold-400/20 flex flex-col justify-between">
                        <div>
                            <div class="w-10 h-10 rounded-full border border-gold-400/40 flex items-center justify-center bg-gold-400/10 text-gold-400 shadow-[0_0_10px_rgba(197,160,89,0.25)] mb-4">
                                <svg class="w-5 h-5 text-gold-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                </svg>
                            </div>
                            <h4 class="font-serif text-white text-sm sm:text-base mb-2">Penggunaan Pribadi</h4>
                            <p class="text-xs sm:text-sm text-gray-400 font-light leading-relaxed">
                                Konten hanya untuk penggunaan pribadi dan non-komersial.
                            </p>
                        </div>
                    </div>

                    <div class="p-6 bg-black/40 rounded-xl border border-gold-400/20 flex flex-col justify-between">
                        <div>
                            <div class="w-10 h-10 rounded-full border border-gold-400/40 flex items-center justify-center bg-gold-400/10 text-gold-400 shadow-[0_0_10px_rgba(197,160,89,0.25)] mb-4">
                                <svg class="w-5 h-5 text-gold-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/>
                                </svg>
                            </div>
                            <h4 class="font-serif text-white text-sm sm:text-base mb-2">Sifat Numerologi</h4>
                            <p class="text-xs sm:text-sm text-gray-400 font-light leading-relaxed">
                                Hasil bersifat penumbuhan sugesti positif &amp; bukan mutlak.
                            </p>
                        </div>
                    </div>

                    <div class="p-6 bg-black/40 rounded-xl border border-gold-400/20 flex flex-col justify-between">
                        <div>
                            <div class="w-10 h-10 rounded-full border border-gold-400/40 flex items-center justify-center bg-gold-400/10 text-gold-400 shadow-[0_0_10px_rgba(197,160,89,0.25)] mb-4">
                                <svg class="w-5 h-5 text-gold-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 6l9-4 9 4v6c0 5.55-3.84 10.74-9 12-5.16-1.26-9-6.45-9-12V6z"/>
                                </svg>
                            </div>
                            <h4 class="font-serif text-white text-sm sm:text-base mb-2">Larangan Penyalahgunaan</h4>
                            <p class="text-xs sm:text-sm text-gray-400 font-light leading-relaxed">
                                Dilarang menyalahgunakan layanan untuk tujuan ilegal.
                            </p>
                        </div>
                    </div>

                    <div class="p-6 bg-black/40 rounded-xl border border-gold-400/20 flex flex-col justify-between">
                        <div>
                            <div class="w-10 h-10 rounded-full border border-gold-400/40 flex items-center justify-center bg-gold-400/10 text-gold-400 shadow-[0_0_10px_rgba(197,160,89,0.25)] mb-4">
                                <svg class="w-5 h-5 text-gold-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                </svg>
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
