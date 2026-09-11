@extends('layouts.app')

@section('title', 'Kalkulator Numerologi — ASYIHAN')
@section('meta_description', 'Hitung angka inti kelahiranmu dan temukan arketipe jiwa serta formula wewangian ASYIHAN yang selaras.')

@section('content')
<div class="calc-page min-h-screen text-gray-200" style="background: linear-gradient(180deg, #030818 0%, #071126 40%, #030818 100%);">

    {{-- ============================================================ --}}
    {{-- HERO SECTION                                                  --}}
    {{-- ============================================================ --}}
    <section class="calc-hero relative overflow-hidden py-16 sm:py-24 text-center">
        {{-- Ambient overlays --}}
        <div class="absolute inset-0 z-0 bg-cover bg-center opacity-25 pointer-events-none" style="background-image: url('{{ asset('images/background.png') }}');"></div>
        <div class="absolute inset-0 z-0 bg-gradient-to-b from-[#030818]/80 via-transparent to-[#030818]/80 pointer-events-none"></div>

        {{-- Constellation Stars --}}
        <div class="absolute inset-0 z-[1] pointer-events-none overflow-hidden">
            <div class="constellation-star animate-constellation-pulse top-[15%] left-[12%]" style="animation-delay: 0s;"></div>
            <div class="constellation-star animate-constellation-twinkle top-[22%] left-[82%]" style="animation-delay: 1.5s;"></div>
            <div class="constellation-star animate-constellation-pulse top-[68%] left-[9%]" style="animation-delay: 3s;"></div>
            <div class="constellation-star animate-constellation-twinkle top-[75%] left-[90%]" style="animation-delay: 2s;"></div>
            <div class="constellation-star animate-constellation-pulse top-[48%] left-[50%]" style="animation-delay: 4s; width: 4px; height: 4px;"></div>
        </div>

        <div class="relative z-10 max-w-4xl mx-auto px-4">
            {{-- Sacred Badge --}}
            <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full border border-gold-400/30 bg-gold-400/5 text-gold-300 text-[10px] sm:text-[11px] tracking-[0.25em] uppercase mb-6 shadow-[0_0_15px_rgba(197,160,89,0.15)]">
                <span>✦</span> SACRED NUMEROLOGY CALCULATOR <span>✦</span>
            </div>

            {{-- Main Headline --}}
            <h1 class="font-serif text-white leading-tight mb-5">
                <span class="block text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-normal tracking-tight">Every Soul Has a Number.</span>
                <span class="block text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-normal tracking-tight mt-1">
                    <em class="italic text-gold-300 font-serif">Every Number Has a Scent.</em>
                </span>
            </h1>

            {{-- Subtitle --}}
            <p class="text-gray-300/90 font-light text-xs sm:text-sm max-w-2xl mx-auto leading-relaxed mb-6">
                Masukkan nama lengkap dan tanggal lahirmu untuk menemukan angka inti kelahiran, arketipe kepribadian, dan formula wewangian ASYIHAN yang selaras dengan getaran jiwamu.
            </p>

            {{-- Sacred 3-Diamond Divider --}}
            <div class="flex items-center justify-center gap-3 text-gold-400/60 text-xs">
                <span>✦</span>
                <span class="text-[10px]">✦</span>
                <span>✦</span>
            </div>
        </div>
    </section>

    {{-- ============================================================ --}}
    {{-- CALCULATOR MAIN SECTION                                      --}}
    {{-- ============================================================ --}}
    <section id="calc-main-section" class="max-w-2xl mx-auto px-4 sm:px-6 -mt-6 sm:-mt-10 relative z-20 mb-20 sm:mb-28 transition-all duration-700">
        <div id="calc-grid-container" class="space-y-6">

            {{-- FORM & PYTHAGORAS GUIDE COLUMN --}}
            <div id="calc-form-column" class="space-y-6">

                {{-- CARD 1: FORMULIR RESONANSI JIWA --}}
                <div class="calc-form-panel rounded-2xl p-6 sm:p-8 border border-gold-400/25 relative overflow-hidden shadow-2xl bg-gradient-to-b from-[#0c1228] via-[#071126] to-[#030818]">
                    {{-- Ambient background glow --}}
                    <div class="absolute -top-16 -right-16 w-44 h-44 bg-gold-400/10 rounded-full blur-3xl pointer-events-none"></div>

                    {{-- Form Header --}}
                    <div class="flex items-center justify-between pb-4 mb-6 border-b border-gold-400/15">
                        <div>
                            <span class="text-[9px] uppercase tracking-[0.25em] text-gold-400/70 font-mono block mb-1">PENGHITUNGAN INTI</span>
                            <h2 class="font-serif text-white text-lg sm:text-xl font-medium tracking-wide">
                                Formulir Resonansi Jiwa
                            </h2>
                        </div>
                        <div class="w-8 h-8 rounded-full bg-gold-400/10 border border-gold-400/30 flex items-center justify-center text-gold-400 shrink-0">
                            <span class="text-sm glow-gold animate-pulse-gold">✦</span>
                        </div>
                    </div>

                    {{-- Form --}}
                    <form id="full-calculator-form" class="space-y-5 relative z-10">
                        @csrf
                        {{-- Hidden Date Input for Backend Submission --}}
                        <input type="hidden" id="calc_birth_date" name="birth_date" value="">

                        {{-- Nama Lengkap --}}
                        <div>
                            <label for="calc_name" class="block text-[10px] uppercase tracking-[0.18em] text-gold-400/90 mb-2 font-medium">
                                Nama Lengkap (Sesuai Akta / KTP)
                            </label>
                            <input id="calc_name" name="name" type="text" value="" placeholder="Contoh: BudiSantoso" required
                                class="w-full py-3 px-4 text-sm rounded-lg bg-black/60 border border-gold-400/25 text-white placeholder-gray-500 focus:outline-none focus:border-gold-400 focus:ring-1 focus:ring-gold-400 transition-colors">
                        </div>

                        {{-- Tanggal Lahir (3 Kolom: DD - MM - YYYY) --}}
                        <div>
                            <label class="block text-[10px] uppercase tracking-[0.18em] text-gold-400/90 mb-2 font-medium">
                                Tanggal Lahir (Hari - Bulan - Tahun)
                            </label>
                            <div class="grid grid-cols-3 gap-3">
                                {{-- Tanggal (DD) --}}
                                <div>
                                    <input id="calc_day" type="number" min="1" max="31" value="" placeholder="DD" required
                                        class="w-full py-3 px-2 text-center text-base sm:text-lg font-mono font-medium rounded-lg bg-black/60 border border-gold-400/25 text-white placeholder-gray-500 focus:outline-none focus:border-gold-400 focus:ring-1 focus:ring-gold-400 transition-colors">
                                    <span class="block text-[9px] uppercase tracking-widest text-center text-gray-500 mt-1">Tanggal</span>
                                </div>

                                {{-- Bulan (MM) --}}
                                <div>
                                    <input id="calc_month" type="number" min="1" max="12" value="" placeholder="MM" required
                                        class="w-full py-3 px-2 text-center text-base sm:text-lg font-mono font-medium rounded-lg bg-black/60 border border-gold-400/25 text-white placeholder-gray-500 focus:outline-none focus:border-gold-400 focus:ring-1 focus:ring-gold-400 transition-colors">
                                    <span class="block text-[9px] uppercase tracking-widest text-center text-gray-500 mt-1">Bulan</span>
                                </div>

                                {{-- Tahun (YYYY) --}}
                                <div>
                                    <input id="calc_year" type="number" min="1920" max="2030" value="" placeholder="YYYY" required
                                        class="w-full py-3 px-2 text-center text-base sm:text-lg font-mono font-medium rounded-lg bg-black/60 border border-gold-400/25 text-white placeholder-gray-500 focus:outline-none focus:border-gold-400 focus:ring-1 focus:ring-gold-400 transition-colors">
                                    <span class="block text-[9px] uppercase tracking-widest text-center text-gray-500 mt-1">Tahun</span>
                                </div>
                            </div>
                        </div>

                        {{-- Calculation Breakdown Preview --}}
                        <div class="p-2.5 rounded-lg bg-black/40 border border-gold-400/15 text-center min-h-[38px] flex items-center justify-center">
                            <p class="text-[10px] text-gold-400/60 font-mono tracking-wider" id="calc-preview-text">
                                Masukkan tanggal lahir Anda untuk melihat reduksi angka Pythagoras
                            </p>
                        </div>

                        {{-- Submit Button --}}
                        <button id="calc-submit-btn" type="submit"
                            class="w-full py-3.5 px-4 rounded-lg bg-gradient-to-r from-[#C5A059] via-[#E2C37A] to-[#C5A059] text-black font-semibold text-xs sm:text-sm tracking-[0.2em] uppercase shadow-[0_4px_20px_rgba(197,160,89,0.3)] hover:shadow-[0_4px_30px_rgba(197,160,89,0.5)] hover:brightness-105 active:scale-[0.99] transition-all duration-300 flex items-center justify-center gap-2">
                            <span>✦ BUKA GERBANG RESONANSI JIWA ✦</span>
                        </button>
                    </form>

                    {{-- Loading Indicator --}}
                    <div id="calc-loading" class="hidden my-6 text-center">
                        <div class="w-10 h-10 border-2 border-gold-400/30 border-t-gold-400 rounded-full animate-spin mx-auto mb-2"></div>
                        <p class="text-[11px] text-gold-300 font-mono tracking-widest uppercase">Menyelaraskan Frekuensi Kosmik...</p>
                    </div>
                </div>

                {{-- CARD 2: METODE PERHITUNGAN PYTHAGORAS --}}
                <div class="rounded-2xl p-6 sm:p-7 border border-gold-400/20 bg-gradient-to-b from-[#0c1228] via-[#071126] to-[#030818] shadow-xl space-y-4">
                    {{-- Header with Compass Icon --}}
                    <div class="flex items-center gap-3 pb-3 border-b border-gold-400/15">
                        <div class="w-7 h-7 rounded-full bg-gold-400/10 border border-gold-400/30 flex items-center justify-center text-gold-400 shrink-0">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <circle cx="12" cy="12" r="9" stroke-width="1.5"></circle>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M14.5 9.5L9.5 14.5M14.5 9.5l-2 5-3-3 5-2z"></path>
                            </svg>
                        </div>
                        <h3 class="font-serif text-white text-sm sm:text-base font-medium tracking-wide">
                            Metode Perhitungan Pythagoras
                        </h3>
                    </div>

                    {{-- Step 1 --}}
                    <div class="flex items-start gap-3">
                        <div class="w-6 h-6 rounded-full bg-black/60 border border-gold-400/30 text-gold-400 text-xs font-mono flex items-center justify-center shrink-0 mt-0.5">
                            1
                        </div>
                        <div>
                            <h4 class="text-xs font-medium text-white tracking-wide">Reduksi Semua Angka Kelahiran</h4>
                            <p class="text-[11px] text-gray-400 font-light mt-0.5 leading-relaxed">
                                Hari, bulan, dan tahun masing-masing dijumlahkan hingga menghasilkan 1 digit angka (1–9).
                            </p>
                        </div>
                    </div>

                    {{-- Step 2 --}}
                    <div class="flex items-start gap-3">
                        <div class="w-6 h-6 rounded-full bg-black/60 border border-gold-400/30 text-gold-400 text-xs font-mono flex items-center justify-center shrink-0 mt-0.5">
                            2
                        </div>
                        <div>
                            <h4 class="text-xs font-medium text-white tracking-wide">Penyatuan Energi (1 hingga 9)</h4>
                            <p class="text-[11px] text-gray-400 font-light mt-0.5 leading-relaxed">
                                Hasil akhir adalah esensi jiwamu yang terhubung langsung dengan formula wewangian ASYIHAN.
                            </p>
                        </div>
                    </div>

                    {{-- Highlight Note --}}
                    <div class="p-3.5 rounded-xl bg-gold-400/5 border border-gold-400/25 flex items-start gap-2.5 mt-2">
                        <span class="text-gold-400 text-xs mt-0.5 shrink-0">✦</span>
                        <p class="text-[11px] text-gray-300 font-light leading-relaxed">
                            <strong class="text-gold-300 font-medium">Angka Inti (Soul Core)</strong> adalah cetak biru energi bawaan. Memadukannya dengan wewangian resonan membantu amplifikasi vibrasi positif dalam hidup.
                        </p>
                    </div>
                </div>

            </div>

            {{-- RESULT CARD (HIDDEN INITIALLY UNTIL BUKA GERBANG RESONANSI JIWA DI-KLIK) --}}
            <div id="calc-result-wrapper" class="hidden">
                <div id="calculator-result-container" class="calc-result-panel rounded-2xl p-6 sm:p-8 border border-gold-400/30 relative overflow-hidden shadow-2xl bg-gradient-to-b from-[#0c1228] via-[#071126] to-[#030818]">
                    {{-- Ambient background glow --}}
                    <div class="absolute top-0 right-0 w-80 h-80 bg-gold-400/5 rounded-full blur-3xl pointer-events-none"></div>

                    {{-- TOP MEDALLION (Glowing Square Box) --}}
                    <div class="flex flex-col items-center justify-center text-center pt-2 pb-6">
                        <div class="relative w-28 h-28 sm:w-32 sm:h-32 rounded-2xl border border-gold-400/40 bg-gradient-to-b from-[#12182b] to-[#080c16] flex flex-col items-center justify-center shadow-[0_0_35px_rgba(197,160,89,0.25)] p-2 group transition-transform duration-500 hover:scale-105">
                            {{-- Inner ornamental border --}}
                            <div class="absolute inset-1.5 rounded-xl border border-gold-400/20 pointer-events-none"></div>

                            <span class="text-[8px] uppercase tracking-[0.25em] text-gold-400/80 font-mono mb-1">
                                ANGKA INTI JIWA
                            </span>
                            <span id="out-core-number" class="text-4xl sm:text-5xl font-serif text-gold-300 font-bold glow-gold leading-none">
                                7
                            </span>
                            <div class="w-8 h-0.5 bg-gold-400/40 mt-2"></div>
                        </div>

                        {{-- Archetype Pill & Title --}}
                        <div class="mt-5">
                            <span class="inline-block text-[9px] uppercase tracking-[0.25em] px-3 py-1 rounded-full bg-gold-400/10 border border-gold-400/25 text-gold-300 mb-2 font-mono">
                                ARKETIPE UTAMA
                            </span>
                            <h2 id="out-archetype-name" class="text-2xl sm:text-3xl font-serif text-white font-medium tracking-wide">
                                Sang Analis
                            </h2>
                            <p id="out-subtitle-id" class="text-xs sm:text-sm text-gold-400/80 font-light mt-1 font-serif italic">
                                Sang Analis & Pencari Kebenaran Hakiki
                            </p>
                        </div>

                        {{-- Dominant Elements Badges --}}
                        <div class="flex flex-wrap items-center justify-center gap-2.5 mt-4">
                            <span class="text-[10px] sm:text-[11px] px-3 py-1 rounded-md bg-black/60 border border-gold-400/20 text-gray-300">
                                Elemen Dominan: <strong id="out-element" class="text-gold-300 font-medium">Ether</strong>
                            </span>
                            <span class="text-[10px] sm:text-[11px] px-3 py-1 rounded-md bg-black/60 border border-gold-400/20 text-gray-300">
                                Aroma Utama: <strong id="out-aroma-main" class="text-gold-300 font-medium">Woody & Frankincense</strong>
                            </span>
                        </div>

                        {{-- Character Description --}}
                        <p id="out-description" class="text-xs sm:text-sm text-gray-300/90 font-light leading-relaxed max-w-xl mx-auto mt-4 text-center">
                            Individu dengan angka 7 memiliki intuisi mistis yang tajam, haus akan pengetahuan mendalam, serta ketenangan batin yang memikat.
                        </p>
                    </div>

                    {{-- ============================================================ --}}
                    {{-- SECTION: TOKOH INSPIRATIF SEJIWA                            --}}
                    {{-- ============================================================ --}}
                    <div class="mt-5 pt-5 border-t border-gold-400/15">
                        <span class="text-[9px] uppercase tracking-[0.25em] text-gold-400/70 font-mono block mb-3 text-center sm:text-left">
                            TOKOH INSPIRATIF SEJIWA DENGANMU
                        </span>
                        <div class="p-4 sm:p-5 rounded-xl bg-gradient-to-r from-black/70 via-[#0d1324] to-black/70 border border-gold-400/25 relative overflow-hidden">
                            {{-- Decorative star --}}
                            <div class="absolute top-3 right-4 text-gold-400/20 text-4xl font-serif pointer-events-none">✦</div>
                            <div class="flex flex-col sm:flex-row items-start sm:items-center gap-4">
                                {{-- Icon area --}}
                                <div class="w-14 h-14 shrink-0 rounded-xl bg-gradient-to-br from-gold-400/20 to-gold-400/5 border border-gold-400/30 flex items-center justify-center shadow-lg">
                                    <span class="text-2xl">⭐</span>
                                </div>
                                {{-- Text area --}}
                                <div class="flex-1">
                                    <div class="flex flex-wrap items-center gap-2 mb-1">
                                        <h3 id="out-tokoh-name" class="text-base sm:text-lg font-serif text-gold-300 font-semibold tracking-wide">
                                            Albert Einstein
                                        </h3>
                                        <span id="out-tokoh-asal" class="text-[9px] uppercase tracking-wider px-2 py-0.5 rounded bg-gold-400/10 border border-gold-400/20 text-gold-400/80 font-mono">
                                            Jerman / AS
                                        </span>
                                    </div>
                                    <p id="out-tokoh-lahir" class="text-[10px] text-gray-500 font-mono mb-1.5">
                                        Lahir: 14 Maret 1879
                                    </p>
                                    <p id="out-tokoh-desc" class="text-xs sm:text-sm text-gray-300 font-light leading-relaxed">
                                        Fisikawan genius — analisis mendalam terhadap alam semesta menghasilkan teori relativitas yang mengubah sains.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- SECTION: CATATAN AROMA (NOTES) --}}
                    <div class="mt-6 pt-5 border-t border-gold-400/15">
                        <span class="text-[9px] uppercase tracking-[0.25em] text-gold-400/70 font-mono block mb-3 text-center sm:text-left">
                            CATATAN AROMA (NOTES)
                        </span>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3.5">
                            {{-- Top & Heart Notes --}}
                            <div class="p-4 rounded-xl bg-black/50 border border-gold-400/15 space-y-1">
                                <span class="text-[9px] uppercase tracking-wider text-gold-400/80 font-mono block">
                                    TOP & HEART NOTES
                                </span>
                                <h4 id="out-notes-top-title" class="text-xs sm:text-sm font-serif text-white font-medium">
                                    Bergamot Calabria & Olibanum Oman
                                </h4>
                                <p id="out-notes-top-desc" class="text-[11px] text-gray-400 font-light leading-relaxed">
                                    Menenangkan pikiran dan membuka intuisi batin
                                </p>
                            </div>

                            {{-- Base Notes --}}
                            <div class="p-4 rounded-xl bg-black/50 border border-gold-400/15 space-y-1">
                                <span class="text-[9px] uppercase tracking-wider text-gold-400/80 font-mono block">
                                    BASE NOTES
                                </span>
                                <h4 id="out-notes-base-title" class="text-xs sm:text-sm font-serif text-white font-medium">
                                    Sacred Sandalwood Mysore & Amber
                                </h4>
                                <p id="out-notes-base-desc" class="text-[11px] text-gray-400 font-light leading-relaxed">
                                    Memberi ketenangan dan rasa grounding spiritual
                                </p>
                            </div>
                        </div>
                    </div>

                    {{-- SECTION: REKOMENDASI FORMULA ASYIHAN --}}
                    <div class="mt-6 pt-5 border-t border-gold-400/15">
                        <span class="text-[9px] uppercase tracking-[0.25em] text-gold-400/70 font-mono block mb-3 text-center sm:text-left">
                            REKOMENDASI FORMULA ASYIHAN
                        </span>

                        <div class="p-4 sm:p-5 rounded-xl bg-gradient-to-r from-black/80 via-[#0d1324] to-black/80 border border-gold-400/30 flex flex-col sm:flex-row items-center gap-4 sm:gap-5 relative">
                            {{-- Bottle Thumbnail --}}
                            <div class="w-20 h-24 sm:w-24 sm:h-28 shrink-0 rounded-lg overflow-hidden border border-gold-400/25 bg-black/60 flex items-center justify-center p-1.5 relative group">
                                <img id="out-bottle-img"
                                     src="{{ asset('images/cards/card_7_hd.png') }}"
                                     alt="Essence Formula Bottle"
                                     class="w-full h-full object-contain rounded transition-transform duration-500 group-hover:scale-110">
                            </div>

                            {{-- Details & CTA --}}
                            <div class="flex-1 text-center sm:text-left space-y-1.5">
                                <span id="out-formula-badge" class="inline-block text-[8px] uppercase tracking-[0.2em] px-2 py-0.5 rounded bg-gold-400/10 border border-gold-400/25 text-gold-300 font-mono">
                                    FORMULA KHUSUS NO. <span id="out-formula-num">7</span>
                                </span>
                                <h3 id="out-essence-title" class="text-sm sm:text-base font-serif text-white font-medium tracking-wide">
                                    ASYIHAN ESSENCE VII — SANG ANALIS
                                </h3>
                                <p id="out-formula-extract" class="text-[11px] text-gray-300/90 font-light leading-relaxed">
                                    Ekstrak murni Olibanum Oman, Sandalwood Mysore, dan Bergamot Calabria.
                                </p>
                                <div class="pt-1 flex flex-wrap items-center justify-center sm:justify-between gap-3">
                                    <div class="text-xs">
                                        <span id="out-price" class="text-gold-300 font-serif font-semibold text-sm">
                                            Rp 1.380.000
                                        </span>
                                        <span class="text-gray-400 font-light text-[11px]"> • Eau de Parfum 50ml</span>
                                    </div>
                                    <a id="out-order-link" href="{{ route('order', ['essence' => 7]) }}"
                                       class="px-4 py-1.5 rounded bg-gold-400 text-black text-[11px] font-semibold tracking-wider uppercase hover:bg-gold-300 transition-colors shadow-[0_2px_10px_rgba(197,160,89,0.3)]">
                                        Pesan Sekarang
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- BOTTOM SHARE & PDF & CUSTOM CTA BAR --}}
                    <div class="mt-6 pt-5 border-t border-gold-400/15 flex flex-col sm:flex-row items-center justify-between gap-4">
                        {{-- Social Share --}}
                        <div class="flex items-center gap-3">
                            <span class="text-[9px] uppercase tracking-wider text-gray-400 font-mono">
                                BAGIKAN HASIL
                            </span>
                            <div class="flex items-center gap-2">
                                {{-- WhatsApp --}}
                                <a id="share-wa" href="https://api.whatsapp.com/send?text=Saya%20telah%20menghitung%20angka%20inti%20numerologi%20saya%20di%20ASYIHAN.%20Coba%20di%20{{ urlencode(url()->current()) }}" target="_blank"
                                   class="w-7 h-7 rounded-full bg-black/60 border border-gold-400/25 hover:border-gold-400 hover:text-gold-300 flex items-center justify-center text-gray-400 text-xs transition-colors" title="Bagikan via WhatsApp">
                                    <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24"><path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.711 2.598 2.664-.698c.983.541 1.879.827 2.796.827 3.183 0 5.768-2.587 5.769-5.767.001-3.18-2.585-5.766-5.769-5.767zm7.558 5.767c0 4.168-3.39 7.559-7.558 7.559-1.272 0-2.463-.317-3.517-.872l-4.514 1.183 1.205-4.405c-.651-1.096-1.032-2.38-1.032-3.465 0-4.168 3.39-7.558 7.558-7.558 4.168 0 7.558 3.39 7.558 7.558z"/></svg>
                                </a>

                                {{-- Instagram (Copy link + notice) --}}
                                <button id="share-ig" type="button"
                                   class="w-7 h-7 rounded-full bg-black/60 border border-gold-400/25 hover:border-gold-400 hover:text-gold-300 flex items-center justify-center text-gray-400 text-xs transition-colors" title="Salin untuk Instagram Story">
                                    <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                                </button>

                                {{-- Facebook --}}
                                <a id="share-fb" href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}" target="_blank"
                                   class="w-7 h-7 rounded-full bg-black/60 border border-gold-400/25 hover:border-gold-400 hover:text-gold-300 flex items-center justify-center text-gray-400 text-xs transition-colors" title="Bagikan via Facebook">
                                    <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24"><path d="M22.675 0h-21.35c-.732 0-1.325.593-1.325 1.325v21.351c0 .731.593 1.324 1.325 1.324h11.495v-9.294h-3.128v-3.622h3.128v-2.671c0-3.1 1.893-4.788 4.659-4.788 1.325 0 2.463.099 2.795.143v3.24l-1.918.001c-1.504 0-1.795.715-1.795 1.763v2.313h3.587l-.467 3.622h-3.12v9.293h6.116c.73 0 1.323-.593 1.323-1.325v-21.35c0-.732-.593-1.325-1.325-1.325z"/></svg>
                                </a>

                                {{-- Copy Link --}}
                                <button id="copy-result-link" type="button"
                                   class="w-7 h-7 rounded-full bg-black/60 border border-gold-400/25 hover:border-gold-400 hover:text-gold-300 flex items-center justify-center text-gray-400 text-xs transition-colors" title="Salin Tautan">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/></svg>
                                </button>
                            </div>
                        </div>

                        {{-- Download PDF & Custom CTA --}}
                        <div class="flex flex-wrap items-center gap-3">
                            {{-- Download PDF Button --}}
                            <button id="download-pdf-btn" type="button"
                                class="btn-gold-outline py-2.5 px-4 text-[10px] sm:text-xs tracking-[0.2em] uppercase rounded-lg font-medium inline-flex items-center gap-2 hover:bg-gold-400/10 transition-all">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                </svg>
                                <span>UNDUH PDF</span>
                            </button>

                            {{-- Custom Formulation Button --}}
                            <a href="https://wa.me/6281234567890?text=Halo%20ASYIHAN,%20saya%20tertarik%20untuk%20memesan%20racikan%20custom%20sesuai%20angka%20inti%20saya" target="_blank"
                               class="btn-gold-outline py-2.5 px-5 text-[10px] sm:text-xs tracking-[0.2em] uppercase rounded-lg font-medium inline-flex items-center gap-2 hover:bg-gold-400/10">
                                <span>✦ RACIKAN CUSTOM ✦</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    {{-- ============================================================ --}}
    {{-- 9 DIMENSI ARKETIPE KARAKTER (3x3 GRID)                        --}}
    {{-- ============================================================ --}}
    <section class="max-w-7xl mx-auto px-4 sm:px-6 mb-20 sm:mb-28">
        {{-- Section Header --}}
        <div class="text-center mb-12 sm:mb-16">
            <span class="text-[10px] uppercase tracking-[0.3em] text-gold-400/80 font-mono block mb-2">
                ARKETIPE NUMEROLOGI
            </span>
            <h2 class="text-2xl sm:text-3xl lg:text-4xl font-serif text-white tracking-wide font-normal">
                9 Dimensi Arketipe Karakter
            </h2>
            <p class="text-gray-400 text-xs sm:text-sm font-light mt-2.5 max-w-2xl mx-auto leading-relaxed">
                Setiap jiwa memiliki frekuensi unik dari sembilan angka dasar Pythagoras. Kenali dirimu, temukan potensimu, dan perkuat auramu dengan wewangian yang tepat.
            </p>
        </div>

        {{-- 9 Archetypes Grid --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5 sm:gap-6">
            @foreach($archetypes as $arch)
                <div id="arch-card-{{ $arch['number'] }}"
                     class="archetype-grid-card rounded-2xl p-6 sm:p-7 relative transition-all duration-300 flex flex-col justify-between border border-gold-400/20 bg-gradient-to-b from-[#0c1228] via-[#071126] to-[#030818] hover:border-gold-400/50 hover:-translate-y-1">

                    <div>
                        {{-- Card Header: Number Image & Badge --}}
                        <div class="flex items-center justify-between mb-4">
                            {{-- Number Image instead of plain text --}}
                            <div class="w-14 h-14 sm:w-16 sm:h-16 flex items-center justify-center">
                                <img src="{{ asset('images/angka/' . $arch['number'] . '.png') }}"
                                     alt="Angka {{ $arch['number'] }}"
                                     class="w-full h-full object-contain drop-shadow-[0_0_8px_rgba(197,160,89,0.5)]">
                            </div>
                            <span class="text-[8px] sm:text-[9px] uppercase tracking-[0.2em] px-2.5 py-1 rounded bg-black/60 border border-gold-400/30 text-gold-300 font-mono">
                                {{ $arch['badge'] }}
                            </span>
                        </div>

                        {{-- Title --}}
                        <h3 class="font-serif text-white text-base sm:text-lg font-medium tracking-wide mb-1">
                            {{ $arch['display_title'] }}
                        </h3>

                        {{-- Description --}}
                        <p class="text-xs text-gray-400 font-light leading-relaxed mb-4">
                            {{ $arch['short_desc'] }}
                        </p>

                        {{-- Inner Inspirational Figure Box --}}
                        <div class="p-3 rounded-xl bg-black/60 border border-gold-400/15 mb-4 space-y-1.5">
                            <span class="text-[9px] uppercase tracking-wider text-gold-400/80 font-mono block">
                                TOKOH INSPIRATIF SEJIWA:
                            </span>
                            <div class="flex flex-wrap gap-1.5">
                                @foreach(array_slice($arch['tokoh_inspiratif'] ?? [], 0, 3) as $tokoh)
                                    <span class="text-[10px] px-2 py-0.5 rounded bg-gold-400/10 border border-gold-400/20 text-gold-300 font-light">
                                        {{ $tokoh['nama'] }}
                                    </span>
                                @endforeach
                                @if(count($arch['tokoh_inspiratif'] ?? []) > 3)
                                    <span class="text-[10px] px-2 py-0.5 rounded bg-white/5 border border-white/10 text-gray-400 font-light">
                                        +{{ count($arch['tokoh_inspiratif']) - 3 }} lainnya
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>

                    {{-- Bottom Action Link --}}
                    <div class="pt-3 border-t border-white/5 flex items-center justify-between">
                        <a href="{{ route('essence.detail', $arch['slug']) }}"
                           class="text-[10px] sm:text-[11px] text-gold-400 uppercase tracking-wider font-mono inline-flex items-center gap-1 hover:text-gold-300 transition-colors">
                            <span>LIHAT DETAIL ARKETIPE</span>
                            <span>➔</span>
                        </a>
                        <div class="w-8 h-8 flex items-center justify-center opacity-60">
                            <img src="{{ asset('images/angka/' . $arch['number'] . '.png') }}"
                                 alt="{{ $arch['number'] }}"
                                 class="w-full h-full object-contain">
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    {{-- ============================================================ --}}
    {{-- INSPIRATIONAL QUOTE SECTION                                   --}}
    {{-- ============================================================ --}}
    <section class="relative overflow-hidden py-16 sm:py-24 text-center bg-gradient-to-b from-transparent via-[#030818] to-black">
        <div class="max-w-3xl mx-auto px-4 relative z-10 space-y-6">
            {{-- Sacred Emblem Icon --}}
            <div class="w-12 h-12 mx-auto rounded-full bg-gold-400/10 border border-gold-400/30 flex items-center justify-center text-gold-400">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"/>
                </svg>
            </div>

            {{-- Main Quote --}}
            <blockquote class="text-xl sm:text-2xl lg:text-3xl font-serif text-white leading-relaxed font-light">
                "Angka inti bukan ramalan masa depan, melainkan cermin untuk mengenali potensi sejati dan menjemput kemakmuran hidup."
            </blockquote>

            {{-- Subtitle --}}
            <p class="text-gray-400 text-xs sm:text-sm font-light max-w-xl mx-auto leading-relaxed">
                Racikan wewangian kami disesuaikan secara khusus menurut getaran frekuensi jiwamu, menghidupkan daya magnetis serta ketenangan batin secara bersamaan.
            </p>

            {{-- Two Buttons --}}
            <div class="pt-4 flex flex-wrap items-center justify-center gap-4">
                <a href="https://wa.me/6281234567890?text=Halo%20ASYIHAN,%20saya%20ingin%20konsultasi%20dapur%20racik%20wewangian%20personal" target="_blank"
                   class="btn-gold px-7 py-3 text-xs tracking-[0.2em] uppercase rounded-lg font-semibold shadow-xl">
                    KONSULTASI DAPUR RACIK
                </a>
                <a href="{{ route('about') }}"
                   class="btn-gold-outline px-6 py-3 text-xs tracking-[0.2em] uppercase rounded-lg font-medium">
                    PELAJARI METODE KAMI LEBIH JAUH
                </a>
            </div>
        </div>
    </section>

</div>

{{-- ============================================================ --}}
{{-- jsPDF + html2canvas CDN (for PDF download)                   --}}
{{-- ============================================================ --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>

<script>
(function () {
    'use strict';
    window.hasCustomCalcHandler = true;

    // ================================================================
    // ARCHETYPE DATA (mirrors NumerologyService — used for JS preview)
    // ================================================================
    const archetypeData = {
        1: {
            name: 'Sang Penggagas',
            subtitle: 'Sang Penggagas & Perintis Perubahan',
            element: 'Api',
            aroma: 'Citrus, Cedarwood & Pink Pepper',
            desc: 'Kamu terlahir sebagai pemimpin — jiwa yang merintis, membuka jalan, dan tak pernah gentar menghadapi kegelapan. Angka 1 membawa energi matahari: terang, tegas, dan penuh daya cipta.',
            essenceName: 'ASYIHAN ESSENCE I — SANG PENGGAGAS',
            notesTopTitle: 'Bergamot & Pink Pepper',
            notesTopDesc: 'Memberi kesegaran berani dan memicu fokus kepemimpinan',
            notesBaseTitle: 'Cedarwood & Vetiver',
            notesBaseDesc: 'Kekokohan prinsip dan akar kepercayaan diri yang kuat',
            formulaExtract: 'Ekstrak murni Bergamot Calabria, Cedarwood Atlas, dan Vetiver Bourbon.',
            price: 'Rp 1.380.000',
            bottleImg: '{{ asset("images/cards/card_1_hd.png") }}',
            orderLink: '{{ route("order", ["essence" => 1]) }}',
        },
        2: {
            name: 'Sang Penghubung',
            subtitle: 'Sang Penghubung & Penjaga Harmoni',
            element: 'Air',
            aroma: 'Jasmine Sambac, Lavender & White Musk',
            desc: 'Kamu adalah jembatan antar jiwa — pendengar, penjaga keseimbangan, dan pembawa kedamaian. Angka 2 membawa energi bulan: lembut, intuitif, dan penuh kasih.',
            essenceName: 'ASYIHAN ESSENCE II — SANG PENGHUBUNG',
            notesTopTitle: 'Lavender & Pear',
            notesTopDesc: 'Menenangkan batin dan menghadirkan kejernihan emosional',
            notesBaseTitle: 'Sandalwood & White Musk',
            notesBaseDesc: 'Kehangatan pelukan batin dan harmoni cinta yang abadi',
            formulaExtract: 'Ekstrak murni Lavender Provence, Rose Damascena, dan White Musk lembut.',
            price: 'Rp 1.380.000',
            bottleImg: '{{ asset("images/cards/card_2_hd.png") }}',
            orderLink: '{{ route("order", ["essence" => 2]) }}',
        },
        3: {
            name: 'Sang Komunikator',
            subtitle: 'Sang Komunikator & Seniman Jiwa',
            element: 'Udara',
            aroma: 'Neroli, Sparkling Citrus & Vanilla',
            desc: 'Kamu adalah seniman kehidupan — yang mewarnai dunia dengan ide, suara, dan keindahan. Angka 3 membawa energi bintang: berkilau, memikat, dan penuh inspirasi.',
            essenceName: 'ASYIHAN ESSENCE III — SANG KOMUNIKATOR',
            notesTopTitle: 'Grapefruit & Neroli',
            notesTopDesc: 'Membuka kanal inspirasi kreatif dan antusiasme sosial',
            notesBaseTitle: 'Patchouli & Vanilla',
            notesBaseDesc: 'Daya pikat magnetis dan imajinasi tanpa batas',
            formulaExtract: 'Ekstrak murni Neroli Tunisia, Grapefruit Segar, dan Vanilla Madagaskar.',
            price: 'Rp 1.380.000',
            bottleImg: '{{ asset("images/cards/card_3_hd.png") }}',
            orderLink: '{{ route("order", ["essence" => 3]) }}',
        },
        4: {
            name: 'Sang Pembangun',
            subtitle: 'Sang Pembangun & Pilar Kehidupan',
            element: 'Tanah',
            aroma: 'Vetiver, Patchouli & Oakmoss',
            desc: 'Kamu adalah fondasi — yang membangun dengan kesabaran, ketelitian, dan kesetiaan tanpa batas. Angka 4 membawa energi bumi: kokoh, dapat diandalkan, dan tak tergoyahkan.',
            essenceName: 'ASYIHAN ESSENCE IV — SANG PEMBANGUN',
            notesTopTitle: 'Sage & Juniper Berry',
            notesTopDesc: 'Ketajaman pikiran logis dan disiplin diri yang teguh',
            notesBaseTitle: 'Oakmoss & Cedarwood',
            notesBaseDesc: 'Kekuatan membumi tak tergoyahkan seperti batu karang',
            formulaExtract: 'Ekstrak murni Clary Sage, Oakmoss Perancis, dan Cedarwood Virginia.',
            price: 'Rp 1.380.000',
            bottleImg: '{{ asset("images/cards/card_4_hd.png") }}',
            orderLink: '{{ route("order", ["essence" => 4]) }}',
        },
        5: {
            name: 'Sang Penjelajah',
            subtitle: 'Sang Penjelajah & Pembawa Perubahan',
            element: 'Angin',
            aroma: 'Cardamom, Bergamot & Black Pepper',
            desc: 'Kamu adalah angin — yang tak bisa dikurung, selalu bergerak, dan membawa perubahan ke mana pun kau pergi. Angka 5 membawa energi petualangan: dinamis, penasaran, dan penuh kejutan.',
            essenceName: 'ASYIHAN ESSENCE V — SANG PENJELAJAH',
            notesTopTitle: 'Lime & Ginger',
            notesTopDesc: 'Percikan energi dinamis dan gairah eksplorasi bebas',
            notesBaseTitle: 'Driftwood & Musk',
            notesBaseDesc: 'Karisma magnet perubahan yang selalu memikat sekeliling',
            formulaExtract: 'Ekstrak murni Cardamom Guatemala, Zesty Lime, dan Driftwood.',
            price: 'Rp 1.380.000',
            bottleImg: '{{ asset("images/cards/card_5_hd.png") }}',
            orderLink: '{{ route("order", ["essence" => 5]) }}',
        },
        6: {
            name: 'Sang Pengasuh',
            subtitle: 'Sang Pengasuh & Penyembuh Jiwa',
            element: 'Bumi',
            aroma: 'Damask Rose, Fig & Tonka Bean',
            desc: 'Kamu adalah rumah — tempat kembali, tempat merasa aman, tempat menemukan cinta. Angka 6 membawa energi kasih sayang: hangat, melindungi, dan menyembuhkan.',
            essenceName: 'ASYIHAN ESSENCE VI — SANG PENGASUH',
            notesTopTitle: 'Peony & Mandarin',
            notesTopDesc: 'Kelembutan kasih sayang dan ketenangan rumah tangga',
            notesBaseTitle: 'Amber & Tonka Bean',
            notesBaseDesc: 'Aura perlindungan batin dan rasa aman yang meneduhkan',
            formulaExtract: 'Ekstrak murni Bulgarian Rose, Sweet Mandarin, dan Amber Resin hangat.',
            price: 'Rp 1.380.000',
            bottleImg: '{{ asset("images/cards/card_6_hd.png") }}',
            orderLink: '{{ route("order", ["essence" => 6]) }}',
        },
        7: {
            name: 'Sang Analis',
            subtitle: 'Sang Analis & Pencari Kebenaran Hakiki',
            element: 'Ether',
            aroma: 'Woody & Frankincense',
            desc: 'Individu dengan angka 7 memiliki intuisi mistis yang tajam, haus akan pengetahuan mendalam, serta ketenangan batin yang memikat.',
            essenceName: 'ASYIHAN ESSENCE VII — SANG ANALIS',
            notesTopTitle: 'Bergamot Calabria & Olibanum Oman',
            notesTopDesc: 'Menenangkan pikiran dan membuka intuisi batin',
            notesBaseTitle: 'Sacred Sandalwood Mysore & Amber',
            notesBaseDesc: 'Memberi ketenangan dan rasa grounding spiritual',
            formulaExtract: 'Ekstrak murni Olibanum Oman, Sandalwood Mysore, dan Bergamot Calabria.',
            price: 'Rp 1.380.000',
            bottleImg: '{{ asset("images/cards/card_7_hd.png") }}',
            orderLink: '{{ route("order", ["essence" => 7]) }}',
        },
        8: {
            name: 'Sang Strategis',
            subtitle: 'Sang Strategis & Penguasa Kelimpahan',
            element: 'Logam',
            aroma: 'Agarwood (Oud), Amber & Leather',
            desc: 'Kamu adalah kekuatan — yang mengubah visi menjadi kenyataan, yang membangun kerajaan dari ketiadaan. Angka 8 membawa energi kemakmuran: ambisius, tegas, dan penuh otoritas.',
            essenceName: 'ASYIHAN ESSENCE VIII — SANG STRATEGIS',
            notesTopTitle: 'Saffron & Elemi',
            notesTopDesc: 'Aura kemewahan, ketegasan visi, dan keberanian eksekusi',
            notesBaseTitle: 'Oud Kalimantan & Benzoin',
            notesBaseDesc: 'Otoritas tertinggi dan daya tarik kemakmuran tanpa batas',
            formulaExtract: 'Ekstrak murni Agarwood Kalimantan, Iranian Saffron, dan Smoked Leather.',
            price: 'Rp 1.380.000',
            bottleImg: '{{ asset("images/cards/card_8_hd.png") }}',
            orderLink: '{{ route("order", ["essence" => 8]) }}',
        },
        9: {
            name: 'Sang Pembimbing',
            subtitle: 'Sang Pembimbing & Cahaya Kemanusiaan',
            element: 'Cahaya',
            aroma: 'Rare Florals, Incense & White Amber',
            desc: 'Kamu adalah jiwa tua — yang memahami siklus, merasakan semuanya lebih dalam, dan membawa cahaya untuk banyak orang. Angka 9 membawa energi kebijaksanaan universal.',
            essenceName: 'ASYIHAN ESSENCE IX — SANG PEMBIMBING',
            notesTopTitle: 'Iris Florence & Violet Leaf',
            notesTopDesc: 'Kehalusan rasa cinta semesta dan pandangan visioner',
            notesBaseTitle: 'Myrrh & Sacred Incense',
            notesBaseDesc: 'Koneksi dengan yang ilahi dan pencerahan spiritual abadi',
            formulaExtract: 'Ekstrak murni Tuscan Iris, Sacred Incense Kuil, dan Somalian Myrrh.',
            price: 'Rp 1.380.000',
            bottleImg: '{{ asset("images/cards/card_9_hd.png") }}',
            orderLink: '{{ route("order", ["essence" => 9]) }}',
        },
    };

    // ================================================================
    // ROMAN NUMERALS HELPER
    // ================================================================
    const romanMap = { 1: 'I', 2: 'II', 3: 'III', 4: 'IV', 5: 'V', 6: 'VI', 7: 'VII', 8: 'VIII', 9: 'IX' };

    // ================================================================
    // PYTHAGORAS REDUCE
    // ================================================================
    function sumDigits(n) {
        return String(Math.abs(n)).split('').reduce((a, d) => a + parseInt(d), 0);
    }
    function reduceToSingleDigit(n) {
        while (n > 9) { n = sumDigits(n); }
        return n;
    }
    function calculateCoreNumber(day, month, year) {
        const s = sumDigits(day) + sumDigits(month) + sumDigits(year);
        return reduceToSingleDigit(s);
    }

    // ================================================================
    // LIVE PREVIEW
    // ================================================================
    const dayEl   = document.getElementById('calc_day');
    const monthEl = document.getElementById('calc_month');
    const yearEl  = document.getElementById('calc_year');
    const previewEl = document.getElementById('calc-preview-text');

    function updatePreview() {
        const d = parseInt(dayEl.value), m = parseInt(monthEl.value), y = parseInt(yearEl.value);
        if (!d || !m || !y || y < 1900 || y > 2030 || d < 1 || d > 31 || m < 1 || m > 12) {
            previewEl.textContent = 'Masukkan tanggal lahir Anda untuk melihat reduksi angka Pythagoras';
            return;
        }
        const sDay = sumDigits(d), sMon = sumDigits(m), sYr = sumDigits(y);
        const total = sDay + sMon + sYr;
        const core  = reduceToSingleDigit(total);
        previewEl.textContent = `${d} → ${sDay}  |  ${m} → ${sMon}  |  ${y} → ${sYr}  ⟹  ${sDay}+${sMon}+${sYr} = ${total} → Angka Inti: ${core}`;

        // Build hidden date
        const pad2 = (n) => String(n).padStart(2, '0');
        document.getElementById('calc_birth_date').value = `${y}-${pad2(m)}-${pad2(d)}`;
    }

    [dayEl, monthEl, yearEl].forEach(el => el && el.addEventListener('input', updatePreview));

    // ================================================================
    // FORM SUBMIT — AJAX
    // ================================================================
    const form        = document.getElementById('full-calculator-form');
    const loadingEl   = document.getElementById('calc-loading');
    const submitBtn   = document.getElementById('calc-submit-btn');
    const resultWrap  = document.getElementById('calc-result-wrapper');

    form.addEventListener('submit', async function (e) {
        e.preventDefault();

        const name      = document.getElementById('calc_name').value.trim();
        const birthDate = document.getElementById('calc_birth_date').value;

        if (!name || !birthDate) {
            alert('Mohon isi nama dan tanggal lahir dengan lengkap.');
            return;
        }

        // Show loading
        submitBtn.classList.add('opacity-50', 'pointer-events-none');
        loadingEl.classList.remove('hidden');
        resultWrap.classList.add('hidden');

        function expandLayout() {
            const mainSection = document.getElementById('calc-main-section');
            if (mainSection) {
                mainSection.classList.remove('max-w-2xl');
                mainSection.classList.add('max-w-7xl');
            }
            const gridContainer = document.getElementById('calc-grid-container');
            if (gridContainer) {
                gridContainer.classList.remove('space-y-6');
                gridContainer.classList.add('grid', 'grid-cols-1', 'lg:grid-cols-12', 'gap-6', 'lg:gap-8', 'items-start');
            }
            const formCol = document.getElementById('calc-form-column');
            if (formCol) {
                formCol.classList.add('lg:col-span-5');
            }
            resultWrap.classList.remove('hidden');
            resultWrap.classList.add('lg:col-span-7');
        }

        try {
            const response = await fetch('{{ route("calculator.calculate") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'Accept': 'application/json',
                },
                body: JSON.stringify({ name, birth_date: birthDate }),
            });

            const json = await response.json();

            if (json.success) {
                populateResult(json.data, name, birthDate);
                expandLayout();
                resultWrap.scrollIntoView({ behavior: 'smooth', block: 'start' });
            } else {
                alert(json.message || 'Terjadi kesalahan. Silakan coba lagi.');
            }
        } catch (err) {
            // Fallback: calculate client-side
            const parts = birthDate.split('-');
            const d = parseInt(parts[2]), m = parseInt(parts[1]), y = parseInt(parts[0]);
            const core = calculateCoreNumber(d, m, y);
            const tokoh = getLocalTokoh(core, d, m, y);
            populateResultLocal(core, name, birthDate, tokoh);
            expandLayout();
            resultWrap.scrollIntoView({ behavior: 'smooth', block: 'start' });
        } finally {
            submitBtn.classList.remove('opacity-50', 'pointer-events-none');
            loadingEl.classList.add('hidden');
        }
    });

    // ================================================================
    // LOCAL TOKOH DATA (fallback, mirrors PHP)
    // ================================================================
    const tokohData = {
        1: [
            { nama: 'Ir. Soekarno', asal: 'Indonesia', lahir: '6 Juni 1901', deskripsi: 'Proklamator & Presiden pertama RI — perintis kemerdekaan dengan api visi yang tak pernah padam.' },
            { nama: 'Steve Jobs', asal: 'Amerika Serikat', lahir: '24 Februari 1955', deskripsi: 'Co-founder Apple — penggagas revolusi teknologi yang mengubah cara dunia berinteraksi.' },
            { nama: 'Elon Musk', asal: 'Afrika Selatan / AS', lahir: '28 Juni 1971', deskripsi: 'Visioner Tesla & SpaceX — bermimpi membawa manusia ke Mars dan mengubah energi bumi.' },
            { nama: 'BJ Habibie', asal: 'Indonesia', lahir: '25 Juni 1936', deskripsi: 'Ilmuwan & Presiden RI ke-3 — pelopor teknologi kedirgantaraan Asia yang diakui dunia.' },
            { nama: 'Walt Disney', asal: 'Amerika Serikat', lahir: '5 Desember 1901', deskripsi: 'Penggagas kerajaan hiburan imajinatif — membuktikan bahwa mimpi besar bisa menjadi nyata.' },
            { nama: 'Napoleon Bonaparte', asal: 'Prancis', lahir: '15 Agustus 1769', deskripsi: 'Pemimpin militer legendaris — ahli strategi yang mendirikan kembali tatanan Eropa dari nol.' },
            { nama: 'Chairul Tanjung', asal: 'Indonesia', lahir: '16 Juni 1962', deskripsi: 'Pengusaha "Si Anak Singkong" — membuktikan bahwa tekad adalah modal utama meraih puncak.' },
        ],
        2: [
            { nama: 'Abdurrahman Wahid (Gus Dur)', asal: 'Indonesia', lahir: '7 September 1940', deskripsi: 'Presiden RI ke-4 — jembatan pluralisme yang menghubungkan semua lapisan masyarakat.' },
            { nama: 'Nelson Mandela', asal: 'Afrika Selatan', lahir: '18 Juli 1918', deskripsi: 'Pemimpin anti-apartheid — memaafkan dan merangkul semua pihak demi harmoni bangsanya.' },
            { nama: 'Mahatma Gandhi', asal: 'India', lahir: '2 Oktober 1869', deskripsi: 'Bapak bangsa India — jembatan perubahan besar melalui jalan damai dan kasih sayang universal.' },
            { nama: 'Oprah Winfrey', asal: 'Amerika Serikat', lahir: '29 Januari 1954', deskripsi: 'Media mogul & filantropis — menghubungkan jutaan hati melalui empati dan kisah manusiawi.' },
            { nama: 'Sri Sultan Hamengkubuwono X', asal: 'Indonesia', lahir: '2 April 1946', deskripsi: 'Raja Yogyakarta — penghubung tradisi dan modernitas yang dihormati lintas generasi.' },
            { nama: 'Eleanor Roosevelt', asal: 'Amerika Serikat', lahir: '11 Oktober 1884', deskripsi: 'Ibu negara & diplomat — suara kemanusiaan yang menjembatani hak asasi semua bangsa.' },
            { nama: 'Tri Rismaharini', asal: 'Indonesia', lahir: '20 November 1961', deskripsi: 'Mantan Walikota Surabaya — penghubung pemerintah dan warga melalui kebijakan yang berpihak pada rakyat.' },
        ],
        3: [
            { nama: 'Pramoedya Ananta Toer', asal: 'Indonesia', lahir: '6 Februari 1925', deskripsi: 'Sastrawan besar Indonesia — kata-katanya menjadi jembatan antara jiwa manusia dan realita sejarah.' },
            { nama: 'Raisa Andriana', asal: 'Indonesia', lahir: '6 Juni 1990', deskripsi: 'Diva pop Indonesia — komunikator emosi lewat melodi yang menyentuh jutaan pendengar.' },
            { nama: 'J.K. Rowling', asal: 'Inggris', lahir: '31 Juli 1965', deskripsi: 'Penulis Harry Potter — mengkomunikasikan nilai keberanian dan persahabatan kepada seluruh dunia.' },
            { nama: 'Soekarno', asal: 'Indonesia', lahir: '6 Juni 1901', deskripsi: 'Orator ulung Indonesia — kata-katanya mampu membakar semangat jutaan jiwa dalam sekejap.' },
            { nama: 'Taylor Swift', asal: 'Amerika Serikat', lahir: '13 Desember 1989', deskripsi: 'Penyanyi & penulis lagu — mengkomunikasikan perasaan universal sehingga menyentuh hati miliaran orang.' },
            { nama: 'Will Smith', asal: 'Amerika Serikat', lahir: '25 September 1968', deskripsi: 'Aktor & motivator — mengkomunikasikan semangat dan harapan lewat layar dan kata-kata yang menggetarkan.' },
            { nama: 'Andrea Hirata', asal: 'Indonesia', lahir: '24 Oktober 1967', deskripsi: 'Penulis "Laskar Pelangi" — komunikator mimpi anak Belitung yang menginspirasi generasi muda Indonesia.' },
        ],
        4: [
            { nama: 'Ciputra', asal: 'Indonesia', lahir: '24 Agustus 1931', deskripsi: 'Raja properti Indonesia — membangun kota demi kota dari ketiadaan dengan disiplin dan visi jangka panjang.' },
            { nama: 'Bill Gates', asal: 'Amerika Serikat', lahir: '28 Oktober 1955', deskripsi: 'Co-founder Microsoft — membangun fondasi era komputer personal yang mengubah peradaban manusia.' },
            { nama: 'Warren Buffett', asal: 'Amerika Serikat', lahir: '30 Agustus 1930', deskripsi: 'Investor legendaris — membangun kekayaan dengan kesabaran, disiplin, dan prinsip nilai jangka panjang.' },
            { nama: 'Henry Ford', asal: 'Amerika Serikat', lahir: '30 Juli 1863', deskripsi: 'Pendiri Ford Motor Company — membangun industri otomotif modern dengan sistem produksi massal.' },
            { nama: 'Joko Widodo', asal: 'Indonesia', lahir: '21 Juni 1961', deskripsi: 'Presiden RI ke-7 — pembangun infrastruktur yang mengubah wajah konektivitas seluruh nusantara.' },
            { nama: 'Mochtar Riady', asal: 'Indonesia', lahir: '12 Mei 1929', deskripsi: 'Pendiri Lippo Group — membangun kerajaan bisnis dari Eropa hingga Asia dengan fondasi yang kokoh.' },
            { nama: 'Angela Merkel', asal: 'Jerman', lahir: '17 Juli 1954', deskripsi: 'Kanselir Jerman terlama — membangun stabilitas Eropa dengan pendekatan metodis dan pragmatis.' },
        ],
        5: [
            { nama: 'Richard Branson', asal: 'Inggris', lahir: '18 Juli 1950', deskripsi: 'Pendiri Virgin Group — penjelajah bisnis, laut, dan antariksa yang tidak pernah berhenti bereksperimen.' },
            { nama: 'Ernest Hemingway', asal: 'Amerika Serikat', lahir: '21 Juli 1899', deskripsi: 'Novelis penjelajah — menjadikan setiap sudut dunia sebagai kanvas tulisannya yang abadi.' },
            { nama: 'Christiano Ronaldo', asal: 'Portugal', lahir: '5 Februari 1985', deskripsi: 'Bintang sepak bola dunia — penjelajah kompetisi dari Portugal ke Inggris, Spanyol, Italia, hingga Arab.' },
            { nama: 'Megawati Soekarnoputri', asal: 'Indonesia', lahir: '23 Januari 1947', deskripsi: 'Presiden RI ke-5 — penjelajah panggung politik yang menembus batas sebagai pemimpin perempuan pertama.' },
            { nama: 'Marco Polo', asal: 'Italia', lahir: '15 September 1254', deskripsi: 'Penjelajah abad pertengahan — membuka jalur sutra dan menghubungkan Eropa dengan Asia.' },
            { nama: 'Sheila Majid', asal: 'Malaysia', lahir: '5 Januari 1965', deskripsi: 'Penyanyi jazz Asia — penjelajah genre musik yang melampaui batas negara dan generasi.' },
            { nama: 'Anies Baswedan', asal: 'Indonesia', lahir: '7 Mei 1969', deskripsi: 'Politisi & mantan Gubernur DKI — penjelajah ide dan gagasan segar dalam lanskap perpolitikan Indonesia.' },
        ],
        6: [
            { nama: 'R.A. Kartini', asal: 'Indonesia', lahir: '21 April 1879', deskripsi: 'Pahlawan emansipasi wanita Indonesia — mengasuh cita-cita pendidikan untuk semua dengan jiwa penuh kasih.' },
            { nama: 'Mother Teresa', asal: 'Albania / India', lahir: '26 Agustus 1910', deskripsi: 'Biarawati & pemenang Nobel — seluruh hidupnya didedikasikan untuk mengasuh kaum miskin dan sakit.' },
            { nama: 'Princess Diana', asal: 'Inggris', lahir: '1 Juli 1961', deskripsi: 'Putri rakyat Inggris — pengasuh jiwa yang tak kenal batas, dari penderita AIDS hingga korban ranjau darat.' },
            { nama: 'Malala Yousafzai', asal: 'Pakistan', lahir: '12 Juli 1997', deskripsi: 'Aktivis pendidikan termuda pemenang Nobel — mengasuh hak belajar anak perempuan di seluruh dunia.' },
            { nama: 'Sri Mulyani Indrawati', asal: 'Indonesia', lahir: '26 Agustus 1962', deskripsi: 'Menteri Keuangan terbaik dunia — mengasuh ekonomi Indonesia dengan kepedulian dan integritas tinggi.' },
            { nama: 'Oprah Winfrey', asal: 'Amerika Serikat', lahir: '29 Januari 1954', deskripsi: 'Media mogul & filantropis — jiwa pengasuh yang menyuburkan semangat jutaan jiwa dengan empatinya.' },
            { nama: 'Yohanes Surya', asal: 'Indonesia', lahir: '6 November 1963', deskripsi: 'Fisikawan & pendidik — mengasuh bakat anak-anak terpencil Indonesia menjadi juara olimpiade sains dunia.' },
        ],
        7: [
            { nama: 'Albert Einstein', asal: 'Jerman / AS', lahir: '14 Maret 1879', deskripsi: 'Fisikawan genius — analisis mendalam terhadap alam semesta menghasilkan teori relativitas yang mengubah sains.' },
            { nama: 'BJ Habibie', asal: 'Indonesia', lahir: '25 Juni 1936', deskripsi: 'Ilmuwan & Presiden RI ke-3 — analis jenius yang menghitung crack propagation pesawat terbang dengan presisi luar biasa.' },
            { nama: 'Nikola Tesla', asal: 'Serbia / AS', lahir: '10 Juli 1856', deskripsi: 'Penemu arus bolak-balik — analis visioner yang karyanya baru dihargai dunia seabad setelah penciptaannya.' },
            { nama: 'Stephen Hawking', asal: 'Inggris', lahir: '8 Januari 1942', deskripsi: 'Fisikawan kosmologi — menganalisis lubang hitam dan alam semesta dari kursi rodanya dengan pikiran tanpa batas.' },
            { nama: 'Carl Jung', asal: 'Swiss', lahir: '26 Juli 1875', deskripsi: 'Psikolog arketipe — menganalisis kedalaman jiwa manusia dan menciptakan peta bawah sadar kolektif.' },
            { nama: 'Isaac Newton', asal: 'Inggris', lahir: '4 Januari 1643', deskripsi: 'Bapak fisika klasik — menganalisis gerakan apel jatuh dan menemukan hukum gravitasi universal.' },
            { nama: 'Bacharuddin Jusuf Habibie', asal: 'Indonesia', lahir: '25 Juni 1936', deskripsi: 'Maestro teknologi — menganalisis ribuan kalkulasi teknik untuk menghadirkan pesawat N250 kebanggaan bangsa.' },
        ],
        8: [
            { nama: 'Sandiaga Salahuddin Uno', asal: 'Indonesia', lahir: '28 Juni 1969', deskripsi: 'Pengusaha & politisi — strategi bisnisnya membuktikan bahwa kesuksesan lahir dari kerja keras dan kalkulasi cerdas.' },
            { nama: 'Jack Ma', asal: 'China', lahir: '10 September 1964', deskripsi: 'Pendiri Alibaba — merancang strategi e-commerce yang mengubah peta perdagangan global dari nol.' },
            { nama: 'Lee Kuan Yew', asal: 'Singapura', lahir: '16 September 1923', deskripsi: 'Bapak Singapura modern — arsitek strategi pembangunan yang mengubah kampung nelayan menjadi metropolis dunia.' },
            { nama: 'John D. Rockefeller', asal: 'Amerika Serikat', lahir: '8 Juli 1839', deskripsi: 'Pendiri Standard Oil — miliarder pertama dunia dengan strategi monopoli yang tak tertandingi di zamannya.' },
            { nama: 'Prabowo Subianto', asal: 'Indonesia', lahir: '17 Oktober 1951', deskripsi: 'Presiden RI ke-8 & mantan jenderal — negarawan strategis dengan visi pertahanan dan kedaulatan bangsa.' },
            { nama: 'Sun Tzu', asal: 'China', lahir: '544 SM', deskripsi: '"The Art of War"-nya menjadi kitab strategi yang dipelajari pemimpin sepanjang zaman.' },
            { nama: 'Hartono Bersaudara', asal: 'Indonesia', lahir: '28 April 1941', deskripsi: 'Pemilik Djarum & BCA — strategi bisnis lintas generasi yang menjadikan mereka orang terkaya di Indonesia.' },
        ],
        9: [
            { nama: 'Dalai Lama XIV', asal: 'Tibet', lahir: '6 Juli 1935', deskripsi: 'Pemimpin spiritual Buddhisme — membimbing jutaan jiwa menuju kedamaian batin dengan kasih universal.' },
            { nama: 'Mohammad Hatta (Bung Hatta)', asal: 'Indonesia', lahir: '12 Agustus 1902', deskripsi: 'Proklamator & Wakil Presiden RI pertama — pembimbing bangsa yang menjunjung integritas di atas segalanya.' },
            { nama: 'Martin Luther King Jr.', asal: 'Amerika Serikat', lahir: '15 Januari 1929', deskripsi: 'Pemimpin gerakan hak sipil — membimbing Amerika menuju keadilan dengan kekuatan mimpi dan damai.' },
            { nama: 'Rabindranath Tagore', asal: 'India', lahir: '7 Mei 1861', deskripsi: 'Penyair & pemenang Nobel — membimbing jiwa Asia menuju kebangkitan spiritual lewat syair dan filosofi.' },
            { nama: 'Nelson Mandela', asal: 'Afrika Selatan', lahir: '18 Juli 1918', deskripsi: 'Pembimbing rekonsiliasi bangsa — 27 tahun penjara tak memadamkan semangat membimbingnya menuju kebebasan.' },
            { nama: 'Joko Widodo', asal: 'Indonesia', lahir: '21 Juni 1961', deskripsi: 'Presiden RI ke-7 — pembimbing rakyat kecil menuju kemakmuran dengan kepemimpinan yang membumi.' },
            { nama: 'Buya Hamka', asal: 'Indonesia', lahir: '17 Februari 1908', deskripsi: 'Ulama, sastrawan & pejuang — pembimbing spiritual jutaan Muslim Indonesia dengan tulisan yang mencerahkan.' },
        ],
    };

    function getLocalTokoh(coreNumber, day, month, year) {
        const list = tokohData[coreNumber] || [];
        if (!list.length) { return { nama: '-', asal: '-', lahir: '-', deskripsi: '-' }; }
        const seed  = (day * 7) + (month * 31) + (year % 100);
        const index = seed % list.length;
        return list[index];
    }

    // ================================================================
    // POPULATE RESULT FROM SERVER RESPONSE
    // ================================================================
    function populateResult(data, name, birthDate) {
        const core    = data.core_number;
        const arch    = archetypeData[core];
        const tokoh   = data.tokoh;

        populateResultUI(core, arch, tokoh, name);
    }

    function populateResultLocal(core, name, birthDate, tokoh) {
        const arch = archetypeData[core];
        populateResultUI(core, arch, tokoh, name);
    }

    function populateResultUI(core, arch, tokoh, name) {
        if (!arch) { return; }

        const roman = romanMap[core];

        document.getElementById('out-core-number').textContent    = core;
        document.getElementById('out-archetype-name').textContent = arch.name;
        document.getElementById('out-subtitle-id').textContent    = arch.subtitle;
        document.getElementById('out-element').textContent        = arch.element;
        document.getElementById('out-aroma-main').textContent     = arch.aroma;
        document.getElementById('out-description').textContent    = arch.desc;
        document.getElementById('out-notes-top-title').textContent= arch.notesTopTitle;
        document.getElementById('out-notes-top-desc').textContent = arch.notesTopDesc;
        document.getElementById('out-notes-base-title').textContent= arch.notesBaseTitle;
        document.getElementById('out-notes-base-desc').textContent = arch.notesBaseDesc;
        document.getElementById('out-formula-num').textContent    = roman;
        document.getElementById('out-essence-title').textContent  = arch.essenceName;
        document.getElementById('out-formula-extract').textContent= arch.formulaExtract;
        document.getElementById('out-price').textContent          = arch.price;
        document.getElementById('out-bottle-img').src             = arch.bottleImg;
        document.getElementById('out-order-link').href            = arch.orderLink;

        // Tokoh Inspiratif
        if (tokoh) {
            document.getElementById('out-tokoh-name').textContent  = tokoh.nama  || '-';
            document.getElementById('out-tokoh-asal').textContent  = tokoh.asal  || '-';
            document.getElementById('out-tokoh-lahir').textContent = 'Lahir: ' + (tokoh.lahir || '-');
            document.getElementById('out-tokoh-desc').textContent  = tokoh.deskripsi || '-';
        }

        // Highlight the matching archetype card
        document.querySelectorAll('.archetype-grid-card').forEach(card => {
            card.classList.remove('ring-2', 'ring-gold-400', 'border-gold-400/70');
        });
        const matchCard = document.getElementById('arch-card-' + core);
        if (matchCard) {
            matchCard.classList.add('ring-2', 'ring-gold-400', 'border-gold-400/70');
        }
    }

    // ================================================================
    // SOCIAL SHARE
    // ================================================================
    document.getElementById('share-ig').addEventListener('click', function () {
        navigator.clipboard.writeText(window.location.href)
            .then(() => alert('Link tersalin! Tempelkan di Instagram Story atau Bio kamu.'))
            .catch(() => alert('Gagal menyalin link. Salin URL secara manual dari address bar.'));
    });

    document.getElementById('copy-result-link').addEventListener('click', function () {
        navigator.clipboard.writeText(window.location.href)
            .then(() => { this.innerHTML = '<svg class="w-3.5 h-3.5 text-gold-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>'; })
            .catch(() => alert('Gagal menyalin link.'));
    });

    // ================================================================
    // PDF DOWNLOAD
    // ================================================================
    document.getElementById('download-pdf-btn').addEventListener('click', async function () {
        const btn = this;
        btn.disabled = true;
        btn.innerHTML = '<svg class="w-3.5 h-3.5 animate-spin" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg><span>Menyiapkan...</span>';

        try {
            const container = document.getElementById('calculator-result-container');
            const canvas = await html2canvas(container, {
                backgroundColor: '#030818',
                scale: 2,
                useCORS: true,
                allowTaint: true,
                logging: false,
            });

            const imgData  = canvas.toDataURL('image/png');
            const { jsPDF } = window.jspdf;
            const pdf = new jsPDF({
                orientation: 'portrait',
                unit: 'mm',
                format: 'a4',
            });

            const pageW  = pdf.internal.pageSize.getWidth();
            const pageH  = pdf.internal.pageSize.getHeight();
            const margin = 10;
            const imgW   = pageW - margin * 2;
            const imgH   = (canvas.height * imgW) / canvas.width;

            // Header
            pdf.setFillColor(3, 8, 24);
            pdf.rect(0, 0, pageW, pageH, 'F');

            // Gold accent line
            pdf.setDrawColor(197, 160, 89);
            pdf.setLineWidth(0.5);
            pdf.line(margin, 8, pageW - margin, 8);

            // Title
            pdf.setTextColor(197, 160, 89);
            pdf.setFontSize(10);
            pdf.setFont('helvetica', 'bold');
            pdf.text('ASYIHAN — HASIL NUMEROLOGI SAKRAL', pageW / 2, 5.5, { align: 'center' });

            // Content image
            const yStart = 12;
            if (imgH + yStart <= pageH - margin) {
                pdf.addImage(imgData, 'PNG', margin, yStart, imgW, imgH);
            } else {
                // Scale down to fit one page
                const scaledH = pageH - margin - yStart;
                const scaledW = (canvas.width * scaledH) / canvas.height;
                const xOffset = (pageW - scaledW) / 2;
                pdf.addImage(imgData, 'PNG', xOffset, yStart, scaledW, scaledH);
            }

            // Footer
            pdf.setTextColor(100, 100, 120);
            pdf.setFontSize(7);
            pdf.setFont('helvetica', 'normal');
            pdf.text('asyihan.com  •  Sacred Numerology & Fragrance  •  Dihitung dengan metode Pythagoras', pageW / 2, pageH - 4, { align: 'center' });
            pdf.line(margin, pageH - 7, pageW - margin, pageH - 7);

            const archetypeName = document.getElementById('out-archetype-name').textContent.replace(/\s+/g, '-').toLowerCase();
            pdf.save(`ASYIHAN-Numerologi-${archetypeName}.pdf`);
        } catch (err) {
            console.error('PDF error:', err);
            alert('Gagal membuat PDF. Silakan coba screenshot manual.');
        } finally {
            btn.disabled = false;
            btn.innerHTML = '<svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg><span>UNDUH PDF</span>';
        }
    });

})();
</script>
@endsection
