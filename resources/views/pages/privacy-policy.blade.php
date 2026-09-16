@extends('layouts.app')

@section('title', 'Privacy Policy — ASYIHAN')
@section('meta_description', 'Kebijakan Privasi ASYIHAN — Kami menghargai dan melindungi privasi serta informasi pribadi Anda.')

@section('content')
<div class="max-w-5xl mx-auto px-4 sm:px-6 py-8">
    
    {{-- Header & Badge --}}
    <div class="text-center mb-12">
        <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-gold-400/10 border border-gold-400/30 text-gold-300 text-xs tracking-[0.2em] uppercase mb-4">
            Legal & Privasi
        </div>
        <h1 class="text-3xl sm:text-5xl font-serif text-white tracking-wider glow-gold mb-3">
            PRIVACY POLICY
        </h1>
        <p class="text-gold-300 font-serif italic text-base sm:text-lg">
            Perlindungan & Keamanan Data Pribadi Anda
        </p>
        <div class="w-24 h-0.5 bg-gradient-to-r from-transparent via-gold-400 to-transparent mx-auto mt-6"></div>
    </div>

    {{-- Content Section --}}
    <section class="bg-panel rounded-2xl p-8 sm:p-12 border border-gold-400/20 mb-12 relative overflow-hidden shadow-2xl">
        <div class="absolute -top-32 -left-32 w-80 h-80 bg-gold-400/5 rounded-full blur-3xl"></div>

        <div class="prose prose-invert max-w-none text-gray-300 font-light leading-relaxed space-y-8">
            {{-- Penjelasan --}}
            <div class="bg-black/60 border-l-2 border-gold-400 p-6 rounded-r-xl">
                <h2 class="text-xl font-serif text-gold-300 mb-3 tracking-wide">Kebijakan Privasi Kami</h2>
                <p class="text-sm sm:text-base text-gray-300 leading-relaxed">
                    Kami menghargai privasi Anda. Informasi pribadi yang dikumpulkan hanya digunakan untuk keperluan layanan dan meningkatkan pengalaman Anda bersama ASYIHAN.
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
                            Layanan ASYIHAN menyajikan analisis dan perhitungan numerologi sebagai metode penumbuhan sugesti serta dorongan energi positif untuk mengenali potensi diri. Seluruh hasil perhitungan numerologi dan rekomendasi wewangian yang dihasilkan <strong class="text-gold-300 font-normal">bukanlah hal yang mutlak, pasti, atau kebenaran absolut</strong>, melainkan panduan inspiratif untuk memandu penyesuaian aroma diri Anda.
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
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="p-6 bg-black/40 rounded-xl border border-gold-400/20 flex items-start gap-4">
                        <div class="w-10 h-10 rounded-full border border-gold-400/40 flex items-center justify-center shrink-0 bg-gold-400/10 text-gold-400 shadow-[0_0_10px_rgba(197,160,89,0.25)]">
                            <svg class="w-5 h-5 text-gold-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-serif text-white text-sm sm:text-base mb-1">Perlindungan Data</h4>
                            <p class="text-xs sm:text-sm text-gray-400 font-light leading-relaxed">
                                Data tidak dibagikan ke pihak ketiga tanpa izin dari Anda.
                            </p>
                        </div>
                    </div>

                    <div class="p-6 bg-black/40 rounded-xl border border-gold-400/20 flex items-start gap-4">
                        <div class="w-10 h-10 rounded-full border border-gold-400/40 flex items-center justify-center shrink-0 bg-gold-400/10 text-gold-400 shadow-[0_0_10px_rgba(197,160,89,0.25)]">
                            <svg class="w-5 h-5 text-gold-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/>
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-serif text-white text-sm sm:text-base mb-1">Sifat Hasil</h4>
                            <p class="text-xs sm:text-sm text-gray-400 font-light leading-relaxed">
                                Hasil numerologi bertujuan menumbuhkan sugesti positif &amp; bukan mutlak.
                            </p>
                        </div>
                    </div>

                    <div class="p-6 bg-black/40 rounded-xl border border-gold-400/20 flex items-start gap-4">
                        <div class="w-10 h-10 rounded-full border border-gold-400/40 flex items-center justify-center shrink-0 bg-gold-400/10 text-gold-400 shadow-[0_0_10px_rgba(197,160,89,0.25)]">
                            <svg class="w-5 h-5 text-gold-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-serif text-white text-sm sm:text-base mb-1">Penghapusan Data</h4>
                            <p class="text-xs sm:text-sm text-gray-400 font-light leading-relaxed">
                                Anda dapat meminta penghapusan data kapan saja dengan menghubungi kami.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Detail Tambahan --}}
            <div class="border-t border-gold-400/15 pt-8 mt-8">
                <p class="text-xs sm:text-sm text-gray-400 leading-relaxed italic">
                    Jika Anda memiliki pertanyaan lebih lanjut mengenai kebijakan privasi kami, silakan hubungi tim concierge kami melalui halaman <a href="{{ route('contact') }}" class="text-gold-400 hover:underline">Contact Us</a>.
                </p>
            </div>
        </div>
    </section>
</div>
@endsection
