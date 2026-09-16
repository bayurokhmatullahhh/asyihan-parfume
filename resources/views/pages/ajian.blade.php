@extends('layouts.app')

@section('title', 'Ajian & Ritual Penggunaan — ASYIHAN')
@section('meta_description', 'Panduan sakral mantra afirmasi dan tata cara penggunaan wewangian ASYIHAN untuk memaksimalkan daya pesona batin.')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 py-8">

    {{-- HERO HEADER --}}
    <div class="text-center mb-16 max-w-4xl mx-auto">
        <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-gold-400/10 border border-gold-400/30 text-gold-300 text-[11px] sm:text-xs tracking-[0.25em] uppercase mb-6 font-medium shadow-[0_0_15px_rgba(197,160,89,0.2)]">
            ✦ AJIAN & RITUAL PENGGUNAAN ✦
        </div>
        <h1 class="text-3xl sm:text-5xl lg:text-6xl font-serif text-white tracking-wider leading-tight mb-4">
            Aktifkan Ajianmu, Hidupkan<br class="hidden sm:inline"> Esensi Jiwamu
        </h1>

        <div class="w-32 h-0.5 bg-gradient-to-r from-transparent via-gold-400 to-transparent mx-auto my-6 relative flex items-center justify-center">
            <span class="text-gold-400 text-xs bg-[#0a0a0a] px-2 font-serif">◆</span>
        </div>

        {{-- Quote Card --}}
        <div class="bg-panel rounded-2xl p-6 sm:p-8 border border-gold-400/25 max-w-3xl mx-auto relative overflow-hidden box-glow shadow-2xl">
            <div class="text-gold-400 text-4xl font-serif leading-none opacity-40 mb-2">“</div>
            <blockquote class="text-gold-200 font-serif italic text-lg sm:text-xl md:text-2xl leading-relaxed mb-4 px-4 sm:px-8">
                "Parfum adalah jejak tak terlihat yang bisa ditinggalkan ketika kita telah berlalu. Ajian adalah niat suci yang membangkitkan kekuatannya."
            </blockquote>
            <cite class="not-italic text-xs sm:text-sm text-gold-400 tracking-[0.2em] font-serif uppercase block">
                BAPA CENGKRANG OPA / UNGKAPAN KUNO
            </cite>
        </div>
    </div>

    {{-- 30-DETIK RITUAL ASYIHAN --}}
    <section class="mb-20">
        <div class="text-center mb-12 max-w-3xl mx-auto">
            <div class="inline-block px-3.5 py-1 rounded-full bg-gold-400/10 border border-gold-400/20 text-gold-400 text-xs tracking-[0.2em] uppercase mb-3 font-mono">
                TATACARA RITUAL HARIAN
            </div>
            <h2 class="text-2xl sm:text-4xl font-serif text-white tracking-wide mb-3">
                30-Detik Ritual Asyihan
            </h2>
            <p class="text-gray-300 text-sm sm:text-base md:text-lg font-light leading-relaxed max-w-2xl mx-auto">
                Ritual singkat ini mengkombinasikan daya olah napas, sugesti batin, dan aroma untuk membangkitkan esensi jiwamu.
            </p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
            {{-- Step 1 --}}
            <div class="bg-panel border border-gold-400/20 rounded-xl p-6 flex flex-col justify-between hover:border-gold-400/50 transition-all group hover:-translate-y-1">
                <div>
                    <div class="flex items-center justify-between mb-4">
                        <span class="w-8 h-8 rounded border border-gold-400/40 flex items-center justify-center font-serif text-gold-400 text-sm font-bold bg-black/40">
                            1
                        </span>
                        <div class="w-9 h-9 rounded-full border border-gold-400/40 flex items-center justify-center shrink-0 bg-gold-400/10 text-gold-400 shadow-[0_0_10px_rgba(197,160,89,0.25)]">
                            <svg class="w-4 h-4 text-gold-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path>
                            </svg>
                        </div>
                    </div>
                    <h3 class="text-lg font-serif text-white mb-2 group-hover:text-gold-300 transition-colors">
                        Tarik Napas & Berfokus
                    </h3>
                    <p class="text-gray-300 text-sm font-light leading-relaxed mb-6">
                        Pegang botol Asyihan di dekat hidungmu. Tarik napas 3x perlahan melalui hidung dan hembuskan perlahan melalui mulut. Tenangkan pikiran.
                    </p>
                </div>
                <div class="pt-4 border-t border-white/5">
                    <a href="{{ route('calculator') }}" class="text-xs text-gold-400 hover:text-white uppercase tracking-wider font-mono flex items-center gap-1 font-medium">
                        BACA SELENGKAPNYA ›
                    </a>
                </div>
            </div>

            {{-- Step 2 --}}
            <div class="bg-panel border border-gold-400/20 rounded-xl p-6 flex flex-col justify-between hover:border-gold-400/50 transition-all group hover:-translate-y-1">
                <div>
                    <div class="flex items-center justify-between mb-4">
                        <span class="w-8 h-8 rounded border border-gold-400/40 flex items-center justify-center font-serif text-gold-400 text-sm font-bold bg-black/40">
                            2
                        </span>
                        <div class="w-9 h-9 rounded-full border border-gold-400/40 flex items-center justify-center shrink-0 bg-gold-400/10 text-gold-400 shadow-[0_0_10px_rgba(197,160,89,0.25)]">
                            <svg class="w-4 h-4 text-gold-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L5.6 15.17a2 2 0 00-1.4.11L3 16l4.243 4.243a2 2 0 002.828 0l8.357-8.357a2 2 0 000-2.828l-1.414-1.414z"></path>
                            </svg>
                        </div>
                    </div>
                    <h3 class="text-lg font-serif text-white mb-2 group-hover:text-gold-300 transition-colors">
                        Semprot di Titik Nadi
                    </h3>
                    <p class="text-gray-300 text-sm font-light leading-relaxed mb-6">
                        Semprotkan 2-3 kali Asyihan pada titik nadi utama (pergelangan tangan, leher, atau dada). Biarkan aroma meresap.
                    </p>
                </div>
                <div class="pt-4 border-t border-white/5">
                    <a href="{{ route('calculator') }}" class="text-xs text-gold-400 hover:text-white uppercase tracking-wider font-mono flex items-center gap-1 font-medium">
                        BACA SELENGKAPNYA ›
                    </a>
                </div>
            </div>

            {{-- Step 3 --}}
            <div class="bg-panel border border-gold-400/20 rounded-xl p-6 flex flex-col justify-between hover:border-gold-400/50 transition-all group hover:-translate-y-1">
                <div>
                    <div class="flex items-center justify-between mb-4">
                        <span class="w-8 h-8 rounded border border-gold-400/40 flex items-center justify-center font-serif text-gold-400 text-sm font-bold bg-black/40">
                            3
                        </span>
                        <div class="w-9 h-9 rounded-full border border-gold-400/40 flex items-center justify-center shrink-0 bg-gold-400/10 text-gold-400 shadow-[0_0_10px_rgba(197,160,89,0.25)]">
                            <svg class="w-4 h-4 text-gold-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path>
                            </svg>
                        </div>
                    </div>
                    <h3 class="text-lg font-serif text-white mb-2 group-hover:text-gold-300 transition-colors">
                        Ucapkan Ajian
                    </h3>
                    <p class="text-gray-300 text-sm font-light leading-relaxed mb-6">
                        Lafalkan mantra afirmasi sesuai arketipemu dengan meyakini setiap kata dalam batinmu.
                    </p>
                </div>
                <div class="pt-4 border-t border-white/5">
                    <a href="{{ route('calculator') }}" class="text-xs text-gold-400 hover:text-white uppercase tracking-wider font-mono flex items-center gap-1 font-medium">
                        BACA SELENGKAPNYA ›
                    </a>
                </div>
            </div>

            {{-- Step 4 --}}
            <div class="bg-panel border border-gold-400/20 rounded-xl p-6 flex flex-col justify-between hover:border-gold-400/50 transition-all group hover:-translate-y-1">
                <div>
                    <div class="flex items-center justify-between mb-4">
                        <span class="w-8 h-8 rounded border border-gold-400/40 flex items-center justify-center font-serif text-gold-400 text-sm font-bold bg-black/40">
                            4
                        </span>
                        <div class="w-9 h-9 rounded-full border border-gold-400/40 flex items-center justify-center shrink-0 bg-gold-400/10 text-gold-400 shadow-[0_0_10px_rgba(197,160,89,0.25)]">
                            <svg class="w-4 h-4 text-gold-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path>
                            </svg>
                        </div>
                    </div>
                    <h3 class="text-lg font-serif text-white mb-2 group-hover:text-gold-300 transition-colors">
                        Pancarkan Pesona
                    </h3>
                    <p class="text-gray-300 text-sm font-light leading-relaxed mb-6">
                        Rasakan energi dan aroma Asyihan memancar dari tubuhmu. Langkahlah keluar dengan percaya diri dan magnetisme tinggi.
                    </p>
                </div>
                <div class="pt-4 border-t border-white/5">
                    <a href="{{ route('calculator') }}" class="text-xs text-gold-400 hover:text-white uppercase tracking-wider font-mono flex items-center gap-1 font-medium">
                        BACA SELENGKAPNYA ›
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- {{-- MANTRA AJIAN & AFIRMASI JIWA 9 ESENSI PARFUM --}}
    <section class="mb-20">
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-4 mb-10 pb-4 border-b border-white/10">
            <div>
                <div class="inline-block px-3.5 py-1 rounded-full bg-gold-400/10 border border-gold-400/20 text-gold-400 text-xs tracking-[0.2em] uppercase mb-2 font-mono">
                    9 ARKETIPE ESENSI • 9 MANTRA AJIAN
                </div>
                <h2 class="text-2xl sm:text-4xl font-serif text-white tracking-wide">
                    Mantra Ajian & Afirmasi Jiwa 9 Esensi Parfum
                </h2>
            </div>
            <p class="text-sm text-gray-300 max-w-xs font-light leading-relaxed">
                Pilihlah ajian yang sesuai dengan arketipe angka kelahirannya untuk hasil maksimal.
            </p>
        </div> -->

        {{-- MANTRA AJIAN & AFIRMASI JIWA 9 ESENSI PARFUM --}}
        <section class="mb-20">
            <div class="flex flex-col gap-3 mb-10 pb-4 border-b border-white/10">
                <div>
                    <div class="inline-block px-3.5 py-1 rounded-full bg-gold-400/10 border border-gold-400/20 text-gold-400 text-xs tracking-[0.2em] uppercase mb-2 font-mono">
                        9 ARKETIPE ESENSI • 9 MANTRA AJIAN
                    </div>
                    <h2 class="text-2xl sm:text-4xl font-serif text-white tracking-wide">
                        Mantra Ajian & Afirmasi Jiwa 9 Esensi Parfum
                    </h2>
                </div>
                <p class="text-sm text-gray-300 font-light leading-relaxed">
                    Pilihlah ajian yang sesuai dengan arketipe angka kelahirannya untuk hasil maksimal.
                </p>
            </div>
        </section>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($archetypes as $essence)
                @php
                    $numFormatted = sprintf('%02d', $essence['number']);
                    $cardImg = file_exists(public_path('images/cards/card_' . $essence['number'] . '_hd.png'))
                        ? asset('images/cards/card_' . $essence['number'] . '_hd.png')
                        : asset($essence['bottle_image']);

                    // Categories map matching archetypes
                    $categories = [
                        1 => 'KARAKTER & KEPEMIMPINAN',
                        2 => 'KESEIMBANGAN & EMPATI',
                        3 => 'EKSPRESI & KREATIFITAS',
                        4 => 'FONDASI & KETENANGAN',
                        5 => 'PETUALANGAN & DINAMIS',
                        6 => 'PENGASIH & KELUARGA',
                        7 => 'MISTIS & SPIRITUAL',
                        8 => 'AMBISI & KEWARISAN',
                        9 => 'KEBIJAKSANAAN AGUNG',
                    ];
                    $catTitle = $categories[$essence['number']] ?? 'ESENSI SAKRAL';
                @endphp

                <div class="bg-panel rounded-2xl p-6 border border-gold-400/20 hover:border-gold-400/50 transition-all flex flex-col justify-between group hover:-translate-y-1 shadow-lg">
                    <div>
                        {{-- Header Row: Big Number + Category --}}
                        <div class="flex items-center justify-between mb-4">
                            <span class="font-serif text-4xl sm:text-5xl font-bold text-gold-400/90 group-hover:text-gold-300 transition-colors">
                                {{ $numFormatted }}
                            </span>
                            <div class="text-right">
                                <span class="text-xs tracking-wider text-gray-300 uppercase font-mono block">
                                    {{ $catTitle }}
                                </span>
                                <span class="text-sm font-serif text-gold-400">
                                    Esensi No. {{ $essence['number'] }}
                                </span>
                            </div>
                        </div>

                        {{-- Image with Overlay --}}
                        <div class="relative rounded-xl overflow-hidden mb-5 border border-gold-400/20 aspect-[4/3]">
                            <img src="{{ $cardImg }}" alt="{{ $essence['essence_name'] }}" class="w-full h-full object-cover object-center group-hover:scale-105 transition-transform duration-500">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent"></div>
                            
                            {{-- Traits Pill on Image --}}
                            <div class="absolute bottom-3 left-3 right-3">
                                <div class="inline-block px-3 py-1 rounded bg-black/80 backdrop-blur-md border border-gold-400/30 text-xs uppercase tracking-widest text-gold-200 font-medium">
                                    {{ implode(' • ', array_map('mb_strtoupper', $essence['traits'])) }}
                                </div>
                            </div>
                        </div>

                        {{-- Mantra Badge --}}
                        <div class="mb-3">
                            <span class="inline-block px-3 py-1 rounded bg-gold-400/10 border border-gold-400/30 text-gold-300 text-xs tracking-[0.2em] font-serif uppercase font-medium">
                                MANTRA AJIAN {{ $numFormatted }}
                            </span>
                        </div>

                        {{-- Mantra Quote --}}
                        <div class="mb-4">
                            <p class="text-base sm:text-lg font-serif italic text-gold-200 leading-snug">
                                "{{ $essence['ajian'] }}"
                            </p>
                        </div>

                        {{-- Description --}}
                        <p class="text-sm text-gray-300 font-light leading-relaxed mb-6">
                            {{ $essence['description'] }}
                        </p>
                    </div>

                    {{-- Card Footer / Application & Element Info --}}
                    <div class="pt-4 border-t border-white/10 space-y-2.5 text-xs sm:text-sm">
                        <div class="flex justify-between items-center text-gray-300">
                            <span class="text-gold-400 font-mono font-medium">LETAK SEMPROT:</span>
                            <span class="text-gray-200 text-right truncate max-w-[190px]">{{ Str::after($essence['sugesti'], 'Semprotkan di ') ?: $essence['sugesti'] }}</span>
                        </div>
                        <div class="flex justify-between items-center text-gray-300">
                            <span class="text-gold-400 font-mono font-medium">ELEMEN:</span>
                            <span class="text-gold-300 font-serif font-medium">{{ strtoupper($essence['element']) }}</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    {{-- RUMUS AJIAN ASIHAN --}}
    <section class="bg-panel rounded-2xl p-6 sm:p-10 border border-gold-400/30 relative overflow-hidden box-glow mb-12">
        <div class="text-center mb-10 max-w-3xl mx-auto">
            <div class="inline-block px-3.5 py-1 rounded-full bg-gold-400/10 border border-gold-400/30 text-gold-300 text-xs tracking-[0.25em] uppercase mb-3 font-mono">
                MANDIRI & MEMBANGKITKAN KEKUATAN
            </div>
            <h2 class="text-2xl sm:text-4xl font-serif text-white tracking-wide mb-3">
                Rumus Ajian Asihan
            </h2>
            <p class="text-gray-300 text-sm sm:text-base font-light leading-relaxed">
                Syarat utama kesaktian ritual Asyihan adalah mengkombinasikan niat diri, keharuman parfum, dan tindakan nyata secara seimbang.
            </p>
        </div>

        {{-- Formula Flow --}}
        <div class="max-w-4xl mx-auto space-y-6">
            {{-- Top Row: 3 Boxes + Plus & Equals --}}
            <div class="grid grid-cols-1 md:grid-cols-5 gap-3 items-center text-center">
                {{-- Box 1 --}}
                <div class="border border-gold-400/30 rounded-xl p-4 flex flex-col items-center justify-center min-h-[120px] bg-black/40">
                    <div class="w-11 h-11 rounded-full border border-gold-400/40 flex items-center justify-center shrink-0 bg-gold-400/10 text-gold-400 shadow-[0_0_10px_rgba(197,160,89,0.25)] mb-2">
                        <svg class="w-5 h-5 text-gold-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v18m9-9H3m15.364 6.364l-12.728-12.728m12.728 0L6.343 17.657"/>
                        </svg>
                    </div>
                    <span class="text-sm font-serif font-bold text-white tracking-wider uppercase">ANGKA TAKDIR</span>
                    <span class="text-xs text-gray-300 mt-0.5">(AKU YANG SEJATI)</span>
                </div>

                {{-- Plus --}}
                <div class="text-gold-400 text-2xl font-serif font-bold">+</div>

                {{-- Box 2 --}}
                <div class="border border-gold-400/30 rounded-xl p-4 flex flex-col items-center justify-center min-h-[120px] bg-black/40">
                    <div class="w-11 h-11 rounded-full border border-gold-400/40 flex items-center justify-center shrink-0 bg-gold-400/10 text-gold-400 shadow-[0_0_10px_rgba(197,160,89,0.25)] mb-2">
                        <svg class="w-5 h-5 text-gold-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 2.25c-5.25 6-7.5 9.75-7.5 13.5a7.5 7.5 0 0015 0c0-3.75-2.25-7.5-7.5-13.5z"/>
                        </svg>
                    </div>
                    <span class="text-sm font-serif font-bold text-white tracking-wider uppercase">AROMA PARFUM</span>
                    <span class="text-xs text-gray-300 mt-0.5">(PENGHUBUNG FREKUENSI)</span>
                </div>

                {{-- Equals --}}
                <div class="text-gold-400 text-2xl font-serif font-bold">=</div>

                {{-- Box 3 --}}
                <div class="border border-gold-400/30 rounded-xl p-4 flex flex-col items-center justify-center min-h-[120px] bg-black/40">
                    <div class="w-11 h-11 rounded-full border border-gold-400/40 flex items-center justify-center shrink-0 bg-gold-400/10 text-gold-400 shadow-[0_0_10px_rgba(197,160,89,0.25)] mb-2">
                        <svg class="w-5 h-5 text-gold-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                        </svg>
                    </div>
                    <span class="text-sm font-serif font-bold text-white tracking-wider uppercase">TRINITAS AJIAN</span>
                    <span class="text-xs text-gray-300 mt-0.5">(HASIL YANG TERBENTUK)</span>
                </div>
            </div>

            {{-- Bottom Row --}}
            <div class="grid grid-cols-1 md:grid-cols-11 gap-3 items-center text-center pt-2">
                {{-- Box Left (5 cols) --}}
                <div class="md:col-span-5 border border-gold-400/30 rounded-xl p-4 flex flex-col items-center justify-center min-h-[110px] bg-black/40">
                    <div class="w-11 h-11 rounded-full border border-gold-400/40 flex items-center justify-center shrink-0 bg-gold-400/10 text-gold-400 shadow-[0_0_10px_rgba(197,160,89,0.25)] mb-2">
                        <svg class="w-5 h-5 text-gold-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                        </svg>
                    </div>
                    <span class="text-sm font-serif font-bold text-white tracking-wider uppercase">AFIRMASI JIWA</span>
                    <span class="text-xs text-gray-300 mt-0.5">(PUNGKASAN NIAT DALAM BATIN)</span>
                </div>

                {{-- Arrow (1 col) --}}
                <div class="md:col-span-1 text-gold-400 text-2xl font-bold">➔</div>

                {{-- Box Right (5 cols - Highlighted Gold) --}}
                <div class="md:col-span-5 bg-gradient-to-r from-gold-400 to-gold-500 text-black font-semibold rounded-xl p-4 flex flex-col items-center justify-center min-h-[110px] shadow-lg">
                    <div class="w-11 h-11 rounded-full border border-black/30 bg-black/20 flex items-center justify-center shrink-0 text-black shadow-inner mb-2">
                        <svg class="w-5 h-5 text-black" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                        </svg>
                    </div>
                    <span class="text-sm font-serif font-bold text-black tracking-wider uppercase">TINDAKAN NYATA</span>
                    <span class="text-xs text-black/90 font-medium mt-0.5">(MEMBERIKAN BUKTI KARYA)</span>
                </div>
            </div>
        </div>

        {{-- CTA Button --}}
        <div class="text-center mt-10">
            <a href="{{ route('calculator') }}" class="inline-flex items-center gap-2 px-6 py-3.5 rounded-full bg-gold-400/20 border border-gold-400/60 text-gold-300 hover:bg-gold-400 hover:text-black font-serif text-sm tracking-[0.2em] uppercase transition-all duration-300 box-glow font-medium">
                BUNYIKAN AJIAN & MULAI RITUAL SEKARANG ›
            </a>
        </div>
    </section>

</div>
@endsection

