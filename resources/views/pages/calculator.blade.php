@extends('layouts.app')

@section('title', 'Kalkulator Numerologi — ASYIHAN')
@section('meta_description', 'Hitung angka inti kelahiranmu dan temukan arketipe jiwa serta formula wewangian ASYIHAN yang selaras.')

@section('content')
<div class="calc-page min-h-screen text-gray-200">

    {{-- ============================================================ --}}
    {{-- HERO SECTION                                                  --}}
    {{-- ============================================================ --}}
    <section class="calc-hero relative overflow-hidden py-16 sm:py-24 text-center">
        {{-- Ambient overlays --}}
        <div class="absolute inset-0 z-0 bg-cover bg-center opacity-25 pointer-events-none" style="background-image: url('{{ asset('images/background.png') }}');"></div>
        <!-- <div class="absolute inset-0 z-0 bg-gradient-to-b from-blue-100/15 via-blue-100/15 to-blue-100/15 pointer-events-none"></div> -->

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
                <div class="calc-form-panel rounded-2xl p-6 sm:p-8 border border-gold-400/25 relative overflow-hidden shadow-2xl bg-gradient-to-b from-[#0e1322] via-[#090d18] to-[#060912]">
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
                <div class="rounded-2xl p-6 sm:p-7 border border-gold-400/20 bg-gradient-to-b from-[#0c101c] via-[#080b14] to-[#050810] shadow-xl space-y-4">
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
                <div id="calculator-result-container" class="calc-result-panel rounded-2xl p-6 sm:p-8 border border-gold-400/30 relative overflow-hidden shadow-2xl bg-gradient-to-b from-[#0e1322] via-[#090d18] to-[#050810]">
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
                                The Seeker
                            </h2>
                            <p id="out-subtitle-id" class="text-xs sm:text-sm text-gold-400/80 font-light mt-1 font-serif italic">
                                Sang Pencari Kebenaran & Kedalaman Spiritual
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
                                    ASYIHAN ESSENCE VII — THE SEEKER
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

                    {{-- BOTTOM SHARE & CUSTOM CTA BAR --}}
                    <div class="mt-6 pt-5 border-t border-gold-400/15 flex flex-col sm:flex-row items-center justify-between gap-4">
                        {{-- Social Share --}}
                        <div class="flex items-center gap-3">
                            <span class="text-[9px] uppercase tracking-wider text-gray-400 font-mono">
                                BAGIKAN HASIL RESONANSI
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

                        {{-- Custom Formulation Button --}}
                        <a href="https://wa.me/6281234567890?text=Halo%20ASYIHAN,%20saya%20tertarik%20untuk%20memesan%20racikan%20custom%20sesuai%20angka%20inti%20saya" target="_blank"
                           class="btn-gold-outline py-2.5 px-5 text-[10px] sm:text-xs tracking-[0.2em] uppercase rounded-lg font-medium inline-flex items-center gap-2 hover:bg-gold-400/10">
                            <span>✦ PESAN RACIKAN CUSTOM ✦</span>
                        </a>
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
                     class="archetype-grid-card rounded-2xl p-6 sm:p-7 relative transition-all duration-300 flex flex-col justify-between border border-gold-400/20 bg-gradient-to-b from-[#0e1322] via-[#090d18] to-[#060912] hover:border-gold-400/50 hover:-translate-y-1">

                    <div>
                        {{-- Card Header: Number & Badge --}}
                        <div class="flex items-center justify-between mb-4">
                            <span class="text-3xl sm:text-4xl font-serif font-bold text-gold-400/90 leading-none">
                                {{ $arch['number'] }}
                            </span>
                            <span class="text-[8px] sm:text-[9px] uppercase tracking-[0.2em] px-2.5 py-1 rounded bg-black/60 border border-gold-400/30 text-gold-300 font-mono">
                                {{ $arch['badge'] }}
                            </span>
                        </div>

                        {{-- Title --}}
                        <h3 class="font-serif text-white text-base sm:text-lg font-medium tracking-wide mb-2">
                            {{ $arch['display_title'] }}
                        </h3>

                        {{-- Description --}}
                        <p class="text-xs text-gray-400 font-light leading-relaxed mb-4">
                            {{ $arch['short_desc'] }}
                        </p>

                        {{-- Inner Resonant Scent Box --}}
                        <div class="p-3 rounded-xl bg-black/60 border border-gold-400/15 mb-4 space-y-0.5">
                            <span class="text-[9px] uppercase tracking-wider text-gold-400/80 font-mono block">
                                TOKOH INSPIRATIF SEJIWA:
                            </span>
                            <p class="text-[11px] text-gray-300 font-light">
                                {{ $arch['aroma_resonan'] }}
                            </p>
                        </div>
                    </div>

                    {{-- Bottom Action Link --}}
                    <div class="pt-3 border-t border-white/5 flex items-center justify-between">
                        <a href="{{ route('essence.detail', $arch['slug']) }}"
                           class="text-[10px] sm:text-[11px] text-gold-400 uppercase tracking-wider font-mono inline-flex items-center gap-1 hover:text-gold-300 transition-colors">
                            <span>LIHAT DETAIL ARKETIPE</span>
                            <span>➔</span>
                        </a>
                        <span class="text-[10px] text-gray-500 font-mono">No. {{ $arch['number'] }}</span>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    {{-- ============================================================ --}}
    {{-- INSPIRATIONAL QUOTE SECTION                                   --}}
    {{-- ============================================================ --}}
    <section class="relative overflow-hidden py-16 sm:py-24 text-center bg-gradient-to-b from-transparent via-[#060912] to-black">
        <div class="max-w-3xl mx-auto px-4 relative z-10 space-y-6">
            {{-- Sacred Emblem Icon --}}
            <div class="w-12 h-12 mx-auto rounded-full bg-gold-400/10 border border-gold-400/30 flex items-center justify-center text-gold-400">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"/>
                </svg>
            </div>

            {{-- Main Quote --}}
            <blockquote class="text-xl sm:text-2xl lg:text-3xl font-serif text-white leading-relaxed font-light">
                “Angka inti bukan ramalan masa depan, melainkan cermin untuk mengenali potensi sejati dan menjemput kemakmuran hidup.”
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
@endsection
