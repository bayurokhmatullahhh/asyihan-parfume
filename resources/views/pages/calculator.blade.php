@extends('layouts.app')

@section('title', 'Kalkulator Numerologi — ASYIHAN')
@section('meta_description', 'Hitung angka inti kelahiranmu dan temukan arketipe jiwa serta formula wewangian ASYIHAN yang selaras.')

@section('content')
<div class="max-w-5xl mx-auto px-4 sm:px-6 py-8">

    {{-- Header --}}
    <div class="text-center mb-10">
        <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-gold-400/10 border border-gold-400/30 text-gold-300 text-xs tracking-[0.2em] uppercase mb-4">
            ✦ Sacred Numerology ✦
        </div>
        <h1 class="text-3xl sm:text-4xl md:text-5xl font-serif text-white tracking-wider glow-gold mb-3">
            KALKULATOR NUMEROLOGI
        </h1>
        <p class="text-gray-300 font-light text-xs sm:text-sm max-w-xl mx-auto leading-relaxed">
            Masukkan nama dan tanggal lahirmu untuk mereduksi angka takdir menjadi angka inti 1–9. Temukan arketipe, wewangian, dan ajian sakralmu.
        </p>
    </div>

    {{-- Calculator Card --}}
    <div class="bg-panel rounded-2xl p-6 sm:p-10 border border-gold-400/30 box-glow max-w-2xl mx-auto relative overflow-hidden mb-12">
        <div class="absolute -top-24 -right-24 w-72 h-72 bg-gold-400/10 rounded-full blur-3xl pointer-events-none"></div>

        <form id="full-calculator-form" class="space-y-6 relative z-10">
            @csrf
            <div>
                <label for="calc_name" class="block text-xs uppercase tracking-widest text-gold-400 font-medium mb-2">Nama Lengkap</label>
                <input id="calc_name" name="name" type="text" placeholder="Contoh: Raden Bayu Rokhmatullah" required class="input-dark py-3">
            </div>

            <div>
                <label for="calc_birth_date" class="block text-xs uppercase tracking-widest text-gold-400 font-medium mb-2">Tanggal Lahir</label>
                <input id="calc_birth_date" name="birth_date" type="date" required class="input-dark py-3">
            </div>

            <button id="calc-submit-btn" type="submit" class="w-full btn-gold py-4 text-xs sm:text-sm tracking-[0.25em] rounded-sm flex items-center justify-center gap-2 shadow-xl">
                <span>Ungkap Angka Inti & Esensi Saya</span>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                </svg>
            </button>
        </form>

        {{-- Loading State --}}
        <div id="calc-loading" class="hidden my-8 text-center relative z-10">
            <div class="w-12 h-12 border-2 border-gold-400/30 border-t-gold-400 rounded-full animate-spin mx-auto mb-3"></div>
            <p class="text-xs text-gold-300 font-serif tracking-widest uppercase">Membaca getaran angka kelahiran...</p>
        </div>
    </div>

    {{-- Result Reveal Container --}}
    <div id="calculator-result-container" class="hidden animate-fade-in-up mb-16">
        <div class="bg-panel rounded-2xl p-6 sm:p-10 border border-gold-400/40 box-glow-strong relative overflow-hidden">
            <div class="absolute inset-0 bg-shimmer opacity-20 pointer-events-none"></div>

            <div class="text-center pb-6 border-b border-gold-400/20 mb-8">
                <span class="text-xs uppercase tracking-[0.25em] text-gold-400 font-serif">Hasil Perhitungan Numerologi</span>
                <p class="text-sm text-gray-300 mt-1">
                    Wahai <span id="out-name" class="text-gold-300 font-medium font-serif"></span>, jiwamu beresonansi dengan:
                </p>

                <div class="my-6 inline-flex flex-col items-center">
                    <div class="w-24 h-24 sm:w-28 sm:h-28 rounded-full border-2 border-gold-400 flex items-center justify-center bg-black/60 shadow-[0_0_30px_rgba(197,160,89,0.3)] animate-pulse-gold mb-3">
                        <span id="out-core-number" class="text-4xl sm:text-5xl font-serif text-gold-400 font-bold glow-gold">7</span>
                    </div>
                    <h2 id="out-archetype-name" class="text-2xl sm:text-3xl font-serif text-white tracking-wider glow-gold">
                        The Seeker
                    </h2>
                    <span id="out-element" class="text-[11px] uppercase tracking-widest px-3 py-1 rounded-full bg-gold-400/10 border border-gold-400/30 text-gold-300 mt-2">
                        Elemen: Ether
                    </span>
                </div>

                <div id="out-traits" class="flex flex-wrap justify-center gap-2 mt-2">
                    {{-- Traits badges populated by JS --}}
                </div>
            </div>

            {{-- Result Details Grid --}}
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
                {{-- Character Interpretation --}}
                <div class="bg-black/40 rounded-xl p-6 border border-gold-400/20 space-y-4">
                    <h3 class="font-serif text-gold-400 text-base uppercase tracking-wider flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                        Karakter Inti
                    </h3>
                    <p id="out-description" class="text-xs sm:text-sm text-gray-300 font-light leading-relaxed"></p>
                </div>

                {{-- Scent Translation --}}
                <div class="bg-black/40 rounded-xl p-6 border border-gold-400/20 space-y-4">
                    <h3 class="font-serif text-gold-400 text-base uppercase tracking-wider flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"/></svg>
                        Esensi Wewangian yang Selaras
                    </h3>
                    <h4 id="out-essence-title" class="text-sm font-serif text-white font-medium"></h4>
                    <p id="out-fragrance-desc" class="text-xs text-gray-300 font-light leading-relaxed"></p>
                    
                    <div class="pt-3 border-t border-white/10 space-y-1.5">
                        <div class="text-[11px] flex justify-between"><span class="text-gray-500">Top Notes:</span> <span id="out-notes-top" class="text-gray-300"></span></div>
                        <div class="text-[11px] flex justify-between"><span class="text-gray-500">Middle Notes:</span> <span id="out-notes-mid" class="text-gray-300"></span></div>
                        <div class="text-[11px] flex justify-between"><span class="text-gray-500">Base Notes:</span> <span id="out-notes-base" class="text-gray-300"></span></div>
                    </div>
                </div>
            </div>

            {{-- Ajian / Affirmation & Ritual --}}
            <div class="bg-black/60 rounded-xl p-6 sm:p-8 border border-gold-400/30 text-center space-y-4 mb-8">
                <span class="text-[10px] uppercase tracking-[0.3em] text-gold-400 font-serif">Ajian & Sugesti Penggunaan</span>
                <p id="out-ajian" class="text-sm sm:text-base text-gold-200 font-serif italic max-w-2xl mx-auto leading-relaxed"></p>
                <div class="w-16 h-0.5 bg-gold-400/30 mx-auto"></div>
                <p id="out-sugesti" class="text-xs text-gray-400 max-w-xl mx-auto font-light leading-relaxed"></p>
            </div>

            {{-- Order CTA for this essence --}}
            <div class="flex flex-col sm:flex-row justify-between items-center gap-4 pt-6 border-t border-gold-400/20">
                <div>
                    <span class="text-[11px] text-gray-500 uppercase tracking-wider block">Investasi Personal</span>
                    <span id="out-price" class="text-xl font-serif text-white font-semibold">Rp 1.380.000</span>
                </div>
                <div class="flex gap-3 w-full sm:w-auto">
                    <a id="out-detail-link" href="#" class="btn-gold-outline flex-1 sm:flex-none px-6 py-3 text-xs tracking-wider rounded-sm text-center">
                        Pelajari Detail
                    </a>
                    <a id="out-order-link" href="#" class="btn-gold flex-1 sm:flex-none px-6 py-3 text-xs tracking-wider rounded-sm text-center">
                        Order Esensi Saya
                    </a>
                </div>
            </div>
        </div>
    </div>

    {{-- All Archetypes Reference --}}
    <section class="mt-16">
        <div class="text-center mb-8">
            <h3 class="text-xl font-serif text-gold-400 uppercase tracking-widest">
                Eksplorasi 9 Arketipe
            </h3>
            <p class="text-xs text-gray-400 mt-1">Setiap angka memiliki getaran dan aromanya masing-masing.</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
            @foreach($archetypes as $arch)
                <x-essence-card :essence="$arch" />
            @endforeach
        </div>
    </section>

</div>
@endsection
