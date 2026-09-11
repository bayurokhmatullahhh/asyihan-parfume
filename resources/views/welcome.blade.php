@extends('layouts.app')

@section('title', 'ASYIHAN — Born from Asih. Crafted for the Soul.')
@section('meta_description', 'Discover the fragrance crafted from the essence of your character. Born from Asih, guided by numerology, crafted for eternity.')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6">

    {{-- ============================================================ --}}
    {{-- PART 1: TOP MAIN SECTIONS (FULL WIDTH)                       --}}
    {{-- ============================================================ --}}
    <div class="flex flex-col gap-10 lg:gap-14">
        
        {{-- 1. Hero Visual Box with Celestial/Numerology Chart --}}
        <section class="rounded-2xl p-6 sm:p-10 lg:p-12 relative overflow-hidden border border-gold-400/25 bg-[#071126]/90 min-h-[520px] sm:min-h-[480px] flex flex-col justify-center shadow-2xl">
            {{-- Background Chart Overlay --}}
            <div class="absolute inset-0 z-0 bg-cover bg-center opacity-65 sm:opacity-70 pointer-events-none" style="background-image: url('{{ asset('images/background.png') }}');"></div>
            {{-- Lighter gradient so mystical background shows through --}}
            <div class="absolute inset-0 z-0 bg-gradient-to-r from-[#030818]/90 via-[#030818]/70 sm:via-[#030818]/55 to-[#030818]/25 sm:to-transparent pointer-events-none"></div>
            {{-- Additional top-bottom gradient for text readability --}}
            <div class="absolute inset-0 z-0 bg-gradient-to-b from-[#030818]/50 via-transparent to-[#030818]/60 pointer-events-none"></div>

            {{-- SVG Constellation Particles Overlay --}}
            <div class="absolute inset-0 z-[1] pointer-events-none overflow-hidden">
                {{-- Orbiting Sacred Ring --}}
                <div class="absolute top-8 right-6 sm:top-12 sm:right-16 w-24 h-24 sm:w-32 sm:h-32">
                    <div class="sacred-ring w-full h-full animate-sacred-rotate"></div>
                    <div class="orbit-dot animate-orbit" style="--orbit-radius: 40px;"></div>
                    <div class="orbit-dot animate-orbit-reverse" style="--orbit-radius: 50px; animation-delay: -5s;"></div>
                </div>

                {{-- Constellation Stars scattered across hero --}}
                <div class="constellation-star animate-constellation-pulse top-[15%] left-[8%]" style="animation-delay: 0s;"></div>
                <div class="constellation-star animate-constellation-twinkle top-[25%] left-[85%]" style="animation-delay: 1.2s;"></div>
                <div class="constellation-star animate-constellation-pulse top-[70%] left-[12%]" style="animation-delay: 2.4s;"></div>
                <div class="constellation-star animate-constellation-twinkle top-[80%] left-[90%]" style="animation-delay: 0.8s;"></div>
                <div class="constellation-star animate-constellation-pulse top-[45%] left-[5%]" style="animation-delay: 3.1s;"></div>
                <div class="constellation-star animate-constellation-twinkle top-[60%] left-[75%] sm:left-[45%]" style="animation-delay: 1.8s;"></div>
                <div class="constellation-star animate-constellation-pulse top-[10%] left-[60%]" style="animation-delay: 4s; width: 4px; height: 4px;"></div>
                <div class="constellation-star animate-constellation-twinkle top-[90%] left-[50%]" style="animation-delay: 2.7s;"></div>

                {{-- Floating Gold Particles --}}
                <div class="absolute bottom-12 left-[20%] w-1.5 h-1.5 rounded-full bg-gold-400/60 animate-float-particle" style="animation-delay: 0s; animation-duration: 5s;"></div>
                <div class="absolute bottom-8 left-[50%] w-1 h-1 rounded-full bg-gold-400/40 animate-float-particle" style="animation-delay: 1.5s; animation-duration: 6s;"></div>
                <div class="absolute bottom-16 left-[70%] w-1.5 h-1.5 rounded-full bg-gold-400/50 animate-float-particle" style="animation-delay: 3s; animation-duration: 4.5s;"></div>
                <div class="absolute bottom-6 left-[35%] w-1 h-1 rounded-full bg-gold-300/50 animate-float-particle" style="animation-delay: 2s; animation-duration: 5.5s;"></div>

                {{-- Runic/Mystical SVG Overlay --}}
                <svg class="absolute inset-0 w-full h-full opacity-[0.06]" viewBox="0 0 400 400" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="200" cy="200" r="150" stroke="currentColor" stroke-width="0.5" class="text-gold-400" stroke-dasharray="4 8"/>
                    <circle cx="200" cy="200" r="120" stroke="currentColor" stroke-width="0.3" class="text-gold-400" stroke-dasharray="2 12"/>
                    <line x1="200" y1="50" x2="200" y2="350" stroke="currentColor" stroke-width="0.3" class="text-gold-400" stroke-dasharray="6 6"/>
                    <line x1="50" y1="200" x2="350" y2="200" stroke="currentColor" stroke-width="0.3" class="text-gold-400" stroke-dasharray="6 6"/>
                    <line x1="94" y1="94" x2="306" y2="306" stroke="currentColor" stroke-width="0.2" class="text-gold-400" stroke-dasharray="3 9"/>
                    <line x1="306" y1="94" x2="94" y2="306" stroke="currentColor" stroke-width="0.2" class="text-gold-400" stroke-dasharray="3 9"/>
                    <polygon points="200,60 205,70 195,70" fill="currentColor" class="text-gold-400" opacity="0.5"/>
                    <polygon points="200,340 205,330 195,330" fill="currentColor" class="text-gold-400" opacity="0.5"/>
                    <polygon points="60,200 70,195 70,205" fill="currentColor" class="text-gold-400" opacity="0.5"/>
                    <polygon points="340,200 330,195 330,205" fill="currentColor" class="text-gold-400" opacity="0.5"/>
                </svg>
            </div>

            {{-- Mobile Logo — Prominent Sacred Emblem at Top --}}
            <div class="flex justify-center mb-6 lg:hidden relative z-10">
                <div class="relative">
                    <div class="absolute inset-[-16px] rounded-full border border-gold-400/15 animate-sacred-rotate"></div>
                    <div class="absolute inset-[-28px] rounded-full border border-dashed border-gold-400/8 animate-sacred-rotate-reverse"></div>
                    <div class="absolute inset-[-8px] rounded-full bg-gold-400/5 blur-xl animate-pulse-gold"></div>
                    <img src="{{ asset('images/logo_asy.png') }}" alt="ASYIHAN Sacred Emblem" class="w-32 h-32 sm:w-36 sm:h-36 object-contain animate-glow-breathe relative z-10">
                    <div class="absolute inset-0 w-full h-full flex items-center justify-center">
                        <div class="orbit-dot animate-orbit" style="--orbit-radius: 80px; animation-duration: 12s;"></div>
                        <div class="orbit-dot animate-orbit-reverse" style="--orbit-radius: 95px; animation-duration: 18s; animation-delay: -4s;"></div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center relative z-10">
                {{-- Hero Typography & CTA --}}
                <div class="lg:col-span-7 space-y-4 text-center lg:text-left">
                    <h1 class="font-serif leading-none tracking-wide text-white">
                        <span class="text-3xl sm:text-4xl lg:text-5xl xl:text-6xl font-bold block mb-1.5 animate-text-reveal" style="animation-delay: 0.1s;">EVERY SOUL</span>
                        <span class="text-xl sm:text-2xl lg:text-3xl xl:text-4xl text-gold-300 italic font-serif block mb-3.5 animate-text-reveal" style="animation-delay: 0.3s;">HAS A NUMBER.</span>
                        <span class="text-3xl sm:text-4xl lg:text-5xl xl:text-6xl font-bold block mb-1.5 animate-text-reveal" style="animation-delay: 0.5s;">EVERY NUMBER</span>
                        <span class="text-xl sm:text-2xl lg:text-3xl xl:text-4xl text-gold-300 italic font-serif block animate-text-reveal" style="animation-delay: 0.7s;">HAS A SCENT.</span>
                    </h1>

                    <p class="text-gray-300 font-light text-xs sm:text-sm lg:text-base leading-relaxed max-w-lg pt-2 animate-text-reveal mx-auto lg:mx-0" style="animation-delay: 0.9s;">
                        Discover the fragrance crafted from the essence of your character. Born from Asih, guided by numerology, crafted for eternity.
                    </p>

                    <div class="pt-4 flex flex-wrap items-center justify-center lg:justify-start gap-4 animate-text-reveal" style="animation-delay: 1.1s;">
                        <a href="#calculator-section" class="btn-gold px-8 py-3.5 text-xs tracking-[0.2em] rounded-[3px] shadow-xl inline-flex items-center gap-2 font-semibold">
                            <span>DISCOVER MY NUMBER</span>
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"/></svg>
                        </a>
                        <a href="{{ route('collection') }}" class="btn-gold-outline px-6 py-3.5 text-xs tracking-[0.2em] rounded-[3px] inline-block font-medium">
                            EXPLORE SCENTS
                        </a>
                    </div>

                    {{-- Mobile Mystical Tagline --}}
                    <div class="flex items-center justify-center lg:hidden gap-3 pt-3 animate-text-reveal" style="animation-delay: 1.3s;">
                        <span class="text-gold-400/40 text-[10px]">☽</span>
                        <span class="text-[9px] uppercase tracking-[0.3em] text-gold-400/50 font-light">Numerology · Astrology · Soul</span>
                        <span class="text-gold-400/40 text-[10px]">☾</span>
                    </div>
                </div>

                {{-- Hero Sacred Geometry Mandala (Desktop) --}}
                <div class="lg:col-span-5 hidden lg:flex justify-center items-center">
                    <div class="relative w-56 h-56 xl:w-64 xl:h-64 flex items-center justify-center">
                        <div class="absolute inset-[-24px] rounded-full border border-gold-400/15 animate-sacred-rotate"></div>
                        <div class="absolute inset-[-42px] rounded-full border border-dashed border-gold-400/10 animate-sacred-rotate-reverse"></div>
                        <div class="absolute inset-[-14px] rounded-full bg-gold-400/5 blur-2xl animate-pulse-gold"></div>
                        <img src="{{ asset('images/logo_asy.png') }}" alt="ASYIHAN Sacred Emblem" class="w-full h-full object-contain animate-glow-breathe relative z-10">
                        <div class="orbit-dot animate-orbit" style="--orbit-radius: 125px; animation-duration: 15s;"></div>
                        <div class="orbit-dot animate-orbit-reverse" style="--orbit-radius: 145px; animation-duration: 22s; animation-delay: -6s;"></div>
                        <div class="orbit-dot animate-orbit" style="--orbit-radius: 115px; animation-duration: 30s; animation-delay: -12s;"></div>
                    </div>
                </div>
            </div>
        </section>

        {{-- 2. Brand Promise Box --}}
        <section class="bg-panel rounded-2xl p-7 sm:p-10 text-center border border-gold-400/20 relative overflow-hidden shadow-xl">
            {{-- Subtle Shimmer Background --}}
            <div class="absolute inset-0 animate-shimmer pointer-events-none"></div>

            {{-- Top Sacred Divider --}}
            <div class="sacred-divider mb-5">
                <span class="text-gold-400/60 text-sm glow-gold shrink-0">✦</span>
            </div>

            <h2 class="text-base sm:text-lg lg:text-2xl font-serif text-gold-400 tracking-[0.2em] uppercase glow-gold font-medium mb-3">
                BORN FROM ASIH. CRAFTED FOR THE SOUL.
            </h2>
            <p class="text-gray-300 text-xs sm:text-sm lg:text-base max-w-2xl mx-auto font-light leading-relaxed mb-5">
                ASYIHAN adalah pertemuan antara kearifan Sunda, kemewahan tradisi wewangian Timur Tengah, dan keunikan karakter setiap manusia.
            </p>

            {{-- Mystical Symbol Row --}}
            <div class="flex items-center justify-center gap-4 sm:gap-6 mb-5 text-gold-400/35 text-xs sm:text-sm">
                <span class="animate-rune-flick" style="animation-delay: 0s;">☿</span>
                <span class="animate-rune-flick" style="animation-delay: 0.8s;">♀</span>
                <span class="animate-rune-flick" style="animation-delay: 1.6s;">☉</span>
                <span class="animate-rune-flick" style="animation-delay: 2.4s;">♂</span>
                <span class="animate-rune-flick" style="animation-delay: 3.2s;">♃</span>
                <span class="animate-rune-flick" style="animation-delay: 4s;">♄</span>
                <span class="animate-rune-flick" style="animation-delay: 0.4s;">☽</span>
                <span class="animate-rune-flick" style="animation-delay: 1.2s;">♆</span>
                <span class="animate-rune-flick" style="animation-delay: 2s;">♇</span>
            </div>

            <a href="{{ route('about') }}" class="inline-block text-[11px] sm:text-xs text-gold-400 uppercase tracking-[0.2em] border-b border-gold-400/50 pb-0.5 hover:border-gold-400 hover:text-white transition-all">
                EXPLORE OUR STORY
            </a>

            {{-- Bottom Sacred Divider --}}
            <div class="sacred-divider mt-5">
                <span class="text-gold-400/60 text-sm glow-gold shrink-0">✦</span>
            </div>
        </section>

        {{-- 3. Essence Collection Box (6 Cards Grid) --}}
        <section class="bg-panel rounded-2xl p-6 sm:p-9 border border-gold-400/20 shadow-xl relative overflow-hidden">
            {{-- Background Sacred Geometry SVG --}}
            <svg class="absolute inset-0 w-full h-full opacity-[0.02] pointer-events-none" viewBox="0 0 600 400" fill="none">
                <circle cx="300" cy="200" r="180" stroke="currentColor" stroke-width="0.5" class="text-gold-400" stroke-dasharray="8 16"/>
                <circle cx="300" cy="200" r="140" stroke="currentColor" stroke-width="0.3" class="text-gold-400" stroke-dasharray="4 12"/>
                <circle cx="300" cy="200" r="100" stroke="currentColor" stroke-width="0.2" class="text-gold-400" stroke-dasharray="2 8"/>
            </svg>

            <div class="text-center mb-8 relative z-10">
                <div class="flex items-center justify-center gap-3 mb-3">
                    <div class="w-8 h-px bg-gradient-to-r from-transparent to-gold-400/40"></div>
                    <span class="text-gold-400/40 text-[10px] animate-constellation-pulse">◆</span>
                    <div class="w-8 h-px bg-gradient-to-l from-transparent to-gold-400/40"></div>
                </div>

                <h2 class="text-xl sm:text-2xl lg:text-3xl font-serif text-gold-400 tracking-[0.2em] uppercase glow-gold font-medium">
                    ESSENCE COLLECTION
                </h2>
                <p class="text-gray-400 text-xs sm:text-sm font-light mt-1.5">
                    9 Essence. 9 Karakter. 9 Aroma. Temukan yang paling sesuai dengan dirimu.
                </p>
            </div>

            @php
                $elementIcons = [
                    'Fire' => '🜂', 'Water' => '🜄', 'Earth' => '🜃', 'Air' => '🜁',
                    'Ether' => '✧', 'Light' => '☀', 'Shadow' => '☽', 'Metal' => '⚙', 'Spirit' => '✦'
                ];
            @endphp

            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-3 sm:gap-4 relative z-10">
                @foreach(array_slice($archetypes, 0, 6, true) as $essence)
                    <a href="{{ route('essence.detail', $essence['slug']) }}" class="mystical-card-hover border border-gold-400/20 rounded-xl p-4 text-center hover:border-gold-400/80 transition-all duration-300 group bg-black/40 hover:-translate-y-1 block relative">
                        {{-- Mystical Number with Sacred Ring --}}
                        <div class="essence-num-ring mx-auto mb-2">
                            <div class="text-2xl sm:text-3xl font-serif text-gold-400 group-hover:glow-gold-strong font-bold relative z-10 transition-all duration-300">
                                {{ $essence['number'] }}
                            </div>
                        </div>
                        <h3 class="text-[10px] sm:text-xs uppercase tracking-widest text-white mb-1 font-medium group-hover:text-gold-200 relative z-10">
                            {{ $essence['name'] }}
                        </h3>
                        <p class="text-[9px] sm:text-[10px] text-gray-400 font-light truncate relative z-10">
                            {{ implode(' · ', $essence['traits']) }}
                        </p>
                        {{-- Element Icon Badge --}}
                        <div class="absolute top-2 right-2 text-[8px] text-gold-400/30 group-hover:text-gold-400/60 transition-colors">
                            {{ $elementIcons[$essence['element']] ?? '✦' }}
                        </div>
                    </a>
                @endforeach
            </div>

            <div class="text-center mt-8 relative z-10">
                <a href="{{ route('collection') }}" class="btn-gold px-8 py-2.5 text-[11px] tracking-[0.2em] rounded-[3px] shadow-md uppercase font-semibold">
                    LIHAT SEMUA ESSENCE
                </a>
            </div>
        </section>

    </div>

    {{-- ============================================================ --}}
    {{-- PART 2: CALCULATOR NUMEROLOGY (DEDICATED SECTION)           --}}
    {{-- ============================================================ --}}
    <section id="calculator-section" class="mt-16 sm:mt-24 scroll-mt-20">
        {{-- Section Header --}}
        <div class="text-center mb-8 sm:mb-10">
            <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-gold-400/10 border border-gold-400/30 text-gold-300 text-xs tracking-[0.2em] uppercase mb-3">
                ✦ Sacred Numerology ✦
            </div>
            <h2 class="text-2xl sm:text-3xl lg:text-4xl font-serif text-gold-400 tracking-[0.2em] uppercase glow-gold font-medium mb-3">
                CALCULATOR NUMEROLOGY
            </h2>
            <p class="text-gray-300 font-light text-xs sm:text-sm max-w-xl mx-auto leading-relaxed">
                Temukan angka intimu, selaraskan energi jiwamu, dan temukan formula aroma ASYIHAN yang ditakdirkan untukmu.
            </p>
            <div class="sacred-divider mt-4 max-w-xs mx-auto">
                <span class="text-gold-400/50 text-xs glow-gold shrink-0">✦</span>
            </div>
        </div>

        {{-- Main Calculator Card --}}
        <div class="bg-panel rounded-2xl p-6 sm:p-10 border border-gold-400/25 relative overflow-hidden shadow-2xl">
            {{-- Background ambient glow & sacred geometry --}}
            <div class="absolute -top-24 -right-24 w-80 h-80 bg-gold-400/5 rounded-full blur-3xl pointer-events-none"></div>
            <div class="absolute -bottom-24 -left-24 w-80 h-80 bg-gold-400/5 rounded-full blur-3xl pointer-events-none"></div>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-10 items-start relative z-10">
                
                {{-- LEFT COLUMN: INTERACTIVE FORM (5 Cols) --}}
                <div class="lg:col-span-5 flex flex-col justify-between h-full">
                    <div>
                        {{-- Form Title & Subtitle --}}
                        <div class="flex items-center gap-3 mb-4 pb-3 border-b border-gold-400/15">
                            <div class="w-9 h-9 rounded-full bg-gold-400/10 border border-gold-400/30 flex items-center justify-center text-gold-400 shrink-0">
                                <svg class="w-5 h-5 glow-gold animate-pulse-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-serif text-white text-base sm:text-lg font-semibold tracking-wide">
                                    Hitung Angka Inti
                                </h3>
                                <p class="text-[11px] text-gray-400 font-light">
                                    Masukkan nama & tanggal lahir manual
                                </p>
                            </div>
                        </div>

                        {{-- Calculation Form --}}
                        <form id="sidebar-calc-form" class="space-y-4">
                            @csrf
                            
                            {{-- Field 1: Nama Lengkap --}}
                            <div>
                                <label for="sidebar_name" class="block text-[10px] uppercase tracking-wider text-gold-400/90 mb-1.5 font-mono">
                                    NAMA LENGKAP
                                </label>
                                <input 
                                    id="sidebar_name" 
                                    name="name" 
                                    type="text" 
                                    placeholder="Masukkan nama lengkap Anda" 
                                    required 
                                    class="input-dark text-xs sm:text-sm py-2.5 px-3.5 w-full bg-black/60 border border-gold-400/30 rounded-lg text-white focus:border-gold-400 focus:outline-none focus:ring-1 focus:ring-gold-400/50 transition-all placeholder:text-gray-500"
                                >
                            </div>

                            {{-- Field 2: Tanggal Lahir (3 Kotak Manual: DD / MM / YYYY) --}}
                            <div>
                                <div class="flex items-center justify-between mb-1.5">
                                    <label class="block text-[10px] uppercase tracking-wider text-gold-400/90 font-mono">
                                        TANGGAL LAHIR (INPUT MANUAL)
                                    </label>
                                    <span class="text-[9px] text-gray-400 font-mono">Ketik angka langsung</span>
                                </div>

                                {{-- 3 Kolom Kotak Input: Tanggal, Bulan, Tahun --}}
                                <div class="grid grid-cols-12 gap-2 sm:gap-2.5 items-center">
                                    {{-- Kolom 1: Tanggal (DD) --}}
                                    <div class="col-span-3">
                                        <div class="relative">
                                            <input 
                                                id="home_calc_day" 
                                                type="text" 
                                                inputmode="numeric" 
                                                pattern="[0-9]*" 
                                                maxlength="2" 
                                                placeholder="DD" 
                                                autocomplete="off"
                                                required 
                                                class="w-full text-center py-2.5 sm:py-3 px-1.5 bg-black/70 border border-gold-400/30 rounded-lg text-gold-200 font-mono text-base sm:text-lg focus:border-gold-400 focus:outline-none focus:ring-1 focus:ring-gold-400/60 transition-all placeholder:text-gray-600 tracking-wider shadow-inner"
                                            >
                                            <span class="block text-[9px] uppercase tracking-wider text-gray-400 text-center mt-1 font-mono">TGL</span>
                                        </div>
                                    </div>

                                    {{-- Separator Slash --}}
                                    <div class="col-span-1 text-center text-gold-400/40 text-base font-serif select-none">/</div>

                                    {{-- Kolom 2: Bulan (MM) --}}
                                    <div class="col-span-3">
                                        <div class="relative">
                                            <input 
                                                id="home_calc_month" 
                                                type="text" 
                                                inputmode="numeric" 
                                                pattern="[0-9]*" 
                                                maxlength="2" 
                                                placeholder="MM" 
                                                autocomplete="off"
                                                required 
                                                class="w-full text-center py-2.5 sm:py-3 px-1.5 bg-black/70 border border-gold-400/30 rounded-lg text-gold-200 font-mono text-base sm:text-lg focus:border-gold-400 focus:outline-none focus:ring-1 focus:ring-gold-400/60 transition-all placeholder:text-gray-600 tracking-wider shadow-inner"
                                            >
                                            <span class="block text-[9px] uppercase tracking-wider text-gray-400 text-center mt-1 font-mono">BLN</span>
                                        </div>
                                    </div>

                                    {{-- Separator Slash --}}
                                    <div class="col-span-1 text-center text-gold-400/40 text-base font-serif select-none">/</div>

                                    {{-- Kolom 3: Tahun (YYYY) --}}
                                    <div class="col-span-4">
                                        <div class="relative">
                                            <input 
                                                id="home_calc_year" 
                                                type="text" 
                                                inputmode="numeric" 
                                                pattern="[0-9]*" 
                                                maxlength="4" 
                                                placeholder="YYYY" 
                                                autocomplete="off"
                                                required 
                                                class="w-full text-center py-2.5 sm:py-3 px-1.5 bg-black/70 border border-gold-400/30 rounded-lg text-gold-200 font-mono text-base sm:text-lg focus:border-gold-400 focus:outline-none focus:ring-1 focus:ring-gold-400/60 transition-all placeholder:text-gray-600 tracking-wider shadow-inner"
                                            >
                                            <span class="block text-[9px] uppercase tracking-wider text-gray-400 text-center mt-1 font-mono">THN</span>
                                        </div>
                                    </div>
                                </div>

                                {{-- Error container --}}
                                <div id="home_calc_date_error" class="hidden mt-2 p-2 rounded bg-red-900/20 border border-red-500/30 text-red-300 text-[11px] font-mono flex items-center gap-1.5">
                                    <span class="text-xs">⚠</span>
                                    <span id="home_calc_date_error_msg">Format tanggal tidak valid.</span>
                                </div>
                            </div>

                            {{-- Submit Button --}}
                            <div class="pt-2">
                                <button 
                                    id="sidebar-calc-btn" 
                                    type="submit" 
                                    class="w-full btn-gold py-3 text-xs sm:text-sm tracking-[0.2em] rounded-[3px] uppercase shadow-xl font-semibold flex items-center justify-center gap-2 group"
                                >
                                    <span>TEMUKAN ESENSI JIWAKU</span>
                                    <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                                    </svg>
                                </button>
                            </div>
                        </form>
                    </div>

                    {{-- Bottom Sacred Note --}}
                    <div class="mt-6 pt-4 border-t border-white/5 flex items-center gap-2 text-[11px] text-gray-400 font-light">
                        <span class="text-gold-400">✧</span>
                        <span>Dihitung dengan reduksi numerologi Pythagoras 1–9.</span>
                    </div>
                </div>

                {{-- RIGHT COLUMN: DYNAMIC PREVIEW & CALCULATION RESULT (7 Cols) --}}
                <div class="lg:col-span-7">
                    
                    {{-- STATE A: DEFAULT MYSTIC PORTAL SHOWCASE (Shown before calculation) --}}
                    <div id="home_calc_placeholder" class="rounded-xl overflow-hidden border border-gold-400/30 bg-gradient-to-b from-dark blue-800/80 via-dark blue-800/70 to-dark blue-800 p-5 sm:p-6 shadow-xl relative group">
                        {{-- Subtle background glow --}}
                        <div class="absolute inset-0 bg-radial-gradient from-gold-400/10 via-transparent to-transparent pointer-events-none"></div>

                        <div class="grid grid-cols-1 md:grid-cols-12 gap-5 items-center relative z-10">
                            {{-- Mystic Portal Artwork --}}
                            <div class="md:col-span-5 rounded-lg overflow-hidden border border-gold-400/30 relative">
                                <img src="{{ asset('images/mystic_calculator_element.png') }}" alt="Mystic Numerology Portal" class="w-full h-48 md:h-56 object-cover group-hover:scale-105 transition-transform duration-700">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent"></div>
                                <div class="absolute bottom-2 left-2 right-2 text-center">
                                    <span class="text-[9px] uppercase tracking-widest text-gold-300 font-mono bg-black/70 px-2 py-0.5 rounded border border-gold-400/20 inline-block">
                                        GERBANG ESENSI
                                    </span>
                                </div>
                            </div>

                            {{-- Explanatory copy --}}
                            <div class="md:col-span-7 space-y-3 text-left">
                                <div class="inline-flex items-center gap-1.5 text-gold-400 text-xs font-mono">
                                    <span>☽</span>
                                    <span class="uppercase tracking-widest">Koneksi Karakter & Scent</span>
                                    <span>☾</span>
                                </div>

                                <h4 class="font-serif text-white text-base sm:text-lg font-medium leading-snug">
                                    Setiap Angka Kelahiran Menyimpan Aroma Sejati
                                </h4>

                                <p class="text-gray-300 text-xs font-light leading-relaxed">
                                    Kombinasi hari, bulan, dan tahun kelahiranmu adalah frekuensi kosmik yang menentukan kepribadian terdalammu. ASYIHAN menerjemahkan getaran tersebut menjadi racikan aroma sakral.
                                </p>

                                <div class="pt-2 flex flex-wrap gap-2">
                                    <span class="text-[10px] px-2.5 py-1 rounded bg-black/60 border border-gold-400/20 text-gold-300 font-mono">1. Sang Penggagas</span>
                                    <span class="text-[10px] px-2.5 py-1 rounded bg-black/60 border border-gold-400/20 text-gold-300 font-mono">5. Sang Penjelajah</span>
                                    <span class="text-[10px] px-2.5 py-1 rounded bg-black/60 border border-gold-400/20 text-gold-300 font-mono">7. Sang Analis</span>
                                    <span class="text-[10px] px-2.5 py-1 rounded bg-black/60 border border-gold-400/20 text-gold-300 font-mono">9 Dimensi Arketipe</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- STATE B: DYNAMIC CALCULATION RESULT CARD (Revealed upon calculation) --}}
                    <aside id="sidebar-result-card" class="hidden bg-panel rounded-2xl p-5 sm:p-7 border border-gold-400/30 flex flex-col gap-6 shadow-2xl animate-fade-in-up transition-all duration-500">
                        
                        {{-- Header with Recalculate Button --}}
                        <div class="flex items-center justify-between pb-3 border-b border-white/10">
                            <div>
                                <span class="text-[10px] uppercase tracking-widest text-gold-400 font-mono block">HASIL NUMEROLOGI SAKRAL</span>
                                <h4 id="res-user-name" class="text-base sm:text-lg font-serif text-white font-medium capitalize mt-0.5">Nama Anda</h4>
                            </div>
                            <div class="flex items-center gap-3">
                                <button id="home_calc_reset_btn" type="button" class="text-[10px] uppercase tracking-wider text-gray-400 hover:text-gold-300 border border-white/10 hover:border-gold-400/40 px-2.5 py-1 rounded transition-colors font-mono cursor-pointer">
                                    Hitung Ulang ↺
                                </button>
                                <div class="text-right">
                                    <span class="text-[9px] uppercase tracking-wider text-gray-400 block font-mono">ANGKA INTI</span>
                                    <span id="res-core-number" class="text-2xl sm:text-3xl font-serif text-gold-400 font-bold glow-gold">7</span>
                                </div>
                            </div>
                        </div>

                        {{-- BAGIAN 1: HASIL ANALISIS NUMEROLOGI & KARAKTER DIRI --}}
                        <div class="bg-black/60 rounded-xl p-4 sm:p-5 border border-gold-400/25 relative overflow-hidden">
                            <div class="absolute -top-10 -right-10 w-28 h-28 bg-gold-400/10 rounded-full blur-2xl pointer-events-none"></div>

                            <div class="flex items-center justify-between">
                                <h3 id="res-archetype-name" class="font-serif text-base sm:text-lg text-gold-300 font-semibold tracking-wide">
                                    Sang Analis
                                </h3>
                                <span id="res-element-badge" class="text-[10px] uppercase tracking-wider px-2.5 py-0.5 rounded bg-gold-400/15 border border-gold-400/30 text-gold-300 font-mono">
                                    Elemen: Ether
                                </span>
                            </div>

                            {{-- Traits badges --}}
                            <div id="res-traits-container" class="flex flex-wrap gap-1.5 mt-2.5">
                                {{-- Populated via JS --}}
                            </div>

                            {{-- Character Description --}}
                            <div class="mt-3 pt-3 border-t border-white/5">
                                <p class="text-[10px] uppercase tracking-widest text-gold-400/80 font-mono mb-1 font-semibold">KARAKTERISTIK JIWAMU</p>
                                <p id="res-character-desc" class="text-gray-300 text-xs font-light leading-relaxed"></p>
                            </div>
                        </div>

                        {{-- BAGIAN TOKOH INSPIRATIF SEJIWA --}}
                        <div class="bg-gradient-to-r from-black/80 via-[#0d1324] to-black/80 rounded-xl p-4 sm:p-5 border border-gold-400/30 relative overflow-hidden shadow-lg">
                            <div class="absolute top-2 right-3 text-gold-400/20 text-3xl font-serif pointer-events-none select-none">✦</div>
                            <span class="text-[9px] uppercase tracking-[0.25em] text-gold-400/80 font-mono block mb-2.5">
                                TOKOH INSPIRATIF SEJIWA DENGANMU
                            </span>
                            <div class="flex items-start sm:items-center gap-3.5">
                                <div class="w-12 h-12 shrink-0 rounded-xl bg-gradient-to-br from-gold-400/20 to-gold-400/5 border border-gold-400/30 flex items-center justify-center text-xl shadow-md">
                                    ⭐
                                </div>
                                <div class="flex-1 min-w-0">
                                    <div class="flex flex-wrap items-center gap-2 mb-1">
                                        <h4 id="res-tokoh-name" class="text-sm sm:text-base font-serif text-gold-300 font-semibold tracking-wide">
                                            Albert Einstein
                                        </h4>
                                        <span id="res-tokoh-asal" class="text-[9px] uppercase tracking-wider px-2 py-0.5 rounded bg-gold-400/10 border border-gold-400/20 text-gold-400/80 font-mono">
                                            Jerman / AS
                                        </span>
                                    </div>
                                    <p id="res-tokoh-lahir" class="text-[10px] text-gray-400 font-mono mb-1">
                                        Lahir: 14 Maret 1879
                                    </p>
                                    <p id="res-tokoh-desc" class="text-xs text-gray-300 font-light leading-relaxed">
                                        Fisikawan genius — analisis mendalam terhadap alam semesta menghasilkan teori relativitas yang mengubah sains.
                                    </p>
                                </div>
                            </div>
                        </div>

                        {{-- BAGIAN 2: REKOMENDASI PARFUM ESENSI JIWA --}}
                        <div class="grid grid-cols-1 md:grid-cols-12 gap-5 items-center">
                            {{-- Luxury Perfume Bottle Presentation --}}
                            <div class="md:col-span-5">
                                <div class="rounded-xl overflow-hidden border border-gold-400/20 bg-gradient-to-b from-[#1c160e] via-[#0d0d0d] to-black p-4 text-center shadow-xl relative group">
                                    <div class="absolute inset-0 bg-radial-gradient from-gold-400/10 via-transparent to-transparent pointer-events-none"></div>
                                    
                                    <div class="text-center mb-2">
                                        <span class="text-[8px] uppercase tracking-[0.25em] text-gold-400 font-mono block">REKOMENDASI PARFUM</span>
                                        <h3 id="res-essence-roman" class="font-serif text-gold-400 text-sm sm:text-base tracking-[0.2em] uppercase font-medium glow-gold mt-0.5">
                                            ESSENCE VII
                                        </h3>
                                        <p id="res-archetype-title" class="text-white/80 text-[10px] tracking-[0.25em] uppercase font-light mt-0.5">
                                            SANG ANALIS
                                        </p>
                                    </div>

                                    {{-- Glass Bottle Render with Ambient Glow --}}
                                    <div class="py-2 flex flex-col items-center justify-center relative z-10">
                                        <div class="w-20 h-28 relative flex flex-col items-center">
                                            {{-- Gold Cap --}}
                                            <div class="w-8 h-5 bg-gradient-to-r from-gold-300 via-gold-100 to-gold-500 rounded-t-sm shadow-md border-b border-gold-600"></div>
                                            <div class="w-10 h-1 bg-gold-500 mb-0.5"></div>
                                            {{-- Heavy Glass Body --}}
                                            <div class="w-16 h-20 bg-gradient-to-b from-white/15 via-gold-400/10 to-gold-900/40 rounded-sm border border-gold-400/40 backdrop-blur-sm p-1.5 flex flex-col items-center justify-center shadow-[0_0_20px_rgba(197,160,89,0.25)]">
                                                <div class="w-12 h-12 border border-gold-400/50 rounded-xs bg-black/60 flex flex-col items-center justify-center text-center p-0.5">
                                                    <span class="text-[5px] tracking-widest text-gold-400 font-serif">ASYIHAN</span>
                                                    <span id="res-bottle-label" class="text-[7px] font-bold text-gold-200 font-serif my-0.5">ESSENCE VII</span>
                                                    <span class="text-[4px] text-gray-400 font-light">EAU DE PARFUM</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="w-24 h-2 bg-radial-gradient from-gold-400/30 to-transparent rounded-full mt-2 blur-[1px]"></div>
                                    </div>
                                </div>
                            </div>

                            {{-- Fragrance Details & Notes --}}
                            <div class="md:col-span-7 space-y-3">
                                <p id="res-fragrance-desc" class="text-gray-300 text-xs font-light leading-relaxed"></p>

                                {{-- Notes Pyramid --}}
                                <div class="bg-black/40 rounded-xl p-3 border border-white/5 space-y-1">
                                    <p class="text-gold-400 text-[9px] uppercase tracking-widest font-semibold mb-1 font-mono">NOTES PYRAMID</p>
                                    <div class="text-[11px] flex justify-between"><span class="text-gray-500">Top:</span> <span id="res-note-top" class="text-gray-300">Bergamot, Black Pepper</span></div>
                                    <div class="text-[11px] flex justify-between"><span class="text-gray-500">Middle:</span> <span id="res-note-mid" class="text-gray-300">Oud, Frankincense</span></div>
                                    <div class="text-[11px] flex justify-between"><span class="text-gray-500">Base:</span> <span id="res-note-base" class="text-gray-300">Dark Musk, Amber</span></div>
                                </div>

                                {{-- Ajian Snippet --}}
                                <div class="bg-gold-400/5 rounded-xl p-2.5 border border-gold-400/20">
                                    <p class="text-gold-400 text-[8px] uppercase tracking-widest font-semibold mb-0.5 font-mono">AJIAN JIWA</p>
                                    <p id="res-ajian-snippet" class="text-[10px] text-gold-200 italic font-light leading-relaxed"></p>
                                </div>
                            </div>
                        </div>

                        {{-- Card Bottom Actions --}}
                        <div class="flex flex-col sm:flex-row justify-between items-center gap-3 border-t border-white/10 pt-4">
                            <div>
                                <span class="text-[10px] text-gray-400 uppercase tracking-wider block font-mono">INVESTASI PERSONAL</span>
                                <span id="res-price" class="text-base sm:text-lg text-white font-medium font-serif">
                                    Rp 1.380.000
                                </span>
                            </div>
                            <div class="flex flex-wrap items-center gap-2.5 w-full sm:w-auto justify-end">
                                {{-- Download PDF Button --}}
                                <button id="home-download-pdf-btn" type="button"
                                    class="btn-gold-outline py-2 px-3 text-[10px] uppercase tracking-wider rounded-[2px] font-medium inline-flex items-center gap-1.5 hover:bg-gold-400/10 transition-colors cursor-pointer"
                                    title="Unduh Hasil Numerologi (PDF)">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                    </svg>
                                    <span>UNDUH PDF</span>
                                </button>
                                <a id="res-detail-link" href="{{ route('collection') }}" class="text-[10px] text-gold-400/80 hover:text-white uppercase tracking-widest text-center transition-colors">
                                    Ritual Lengkap &rarr;
                                </a>
                                <a id="res-order-link" href="{{ route('order') }}" class="btn-gold px-5 py-2 text-xs uppercase tracking-wider rounded-[2px] font-medium text-center">
                                    ORDER SEKARANG
                                </a>
                            </div>
                        </div>
                    </aside>

                </div>

            </div>
        </div>
    </section>

    {{-- ============================================================ --}}
    {{-- PART 3: FILOSOFI ASIH & GEOMETRI SUCI                       --}}
    {{-- ============================================================ --}}
    <section class="mt-24 pt-8">
        {{-- 1. Smoke Banner Header --}}
        <div class="relative rounded-2xl overflow-hidden border border-gold-400/20 p-8 sm:p-14 text-center bg-[#071126]/90 shadow-2xl">
            {{-- Background Smoke Image — Higher opacity --}}
            <div class="absolute inset-0 bg-cover bg-center opacity-50 sm:opacity-50 pointer-events-none" style="background-image: url('{{ asset('images/background_filosofi.png') }}');"></div>
            <div class="absolute inset-0 bg-gradient-to-b from-[#030818]/80 via-transparent to-[#030818]/90 pointer-events-none"></div>

            {{-- Side golden lines --}}
            <div class="absolute left-0 top-[20%] bottom-[20%] w-px bg-gradient-to-b from-transparent via-gold-400/20 to-transparent pointer-events-none"></div>
            <div class="absolute right-0 top-[20%] bottom-[20%] w-px bg-gradient-to-b from-transparent via-gold-400/20 to-transparent pointer-events-none"></div>

            {{-- Corner ornaments --}}
            <div class="absolute top-3 left-3 w-6 h-6 border-t border-l border-gold-400/20 pointer-events-none"></div>
            <div class="absolute top-3 right-3 w-6 h-6 border-t border-r border-gold-400/20 pointer-events-none"></div>
            <div class="absolute bottom-3 left-3 w-6 h-6 border-b border-l border-gold-400/20 pointer-events-none"></div>
            <div class="absolute bottom-3 right-3 w-6 h-6 border-b border-r border-gold-400/20 pointer-events-none"></div>

            {{-- Constellation stars --}}
            <div class="constellation-star animate-constellation-twinkle top-[10%] left-[15%]" style="animation-delay: 0.5s;"></div>
            <div class="constellation-star animate-constellation-pulse top-[20%] right-[10%]" style="animation-delay: 2s;"></div>
            <div class="constellation-star animate-constellation-twinkle bottom-[15%] left-[80%]" style="animation-delay: 3.5s;"></div>
            <div class="constellation-star animate-constellation-pulse bottom-[25%] right-[85%]" style="animation-delay: 1s;"></div>

            <div class="relative z-10 max-w-3xl mx-auto">
                {{-- Sacred Ornament --}}
                <div class="sacred-divider mb-4">
                    <span class="text-gold-400 text-lg glow-gold shrink-0 animate-pulse-gold">✦</span>
                </div>

                <h2 class="text-2xl sm:text-3xl lg:text-4xl font-serif text-gold-400 tracking-[0.25em] uppercase glow-gold font-medium mb-4">
                    FILOSOFI ASIH
                </h2>
                <p class="text-gray-300 text-xs sm:text-sm font-light leading-relaxed max-w-2xl mx-auto">
                    Lebih dari sekadar wewangian, ASYIHAN adalah sebuah perjalanan spiritual. Terlahir dari kearifan Sunda Kuno, memadukan tradisi mistis dengan kemewahan perfumery Timur Tengah.
                </p>

                {{-- Bottom Sacred Ornament --}}
                <div class="sacred-divider mt-5">
                    <span class="text-gold-400/40 text-xs shrink-0">◆</span>
                </div>
            </div>
        </div>

        {{-- 2. Sub-section: Asal Mula 'Asih' --}}
        <div class="mt-14 grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
            <div class="lg:col-span-6 space-y-4">
                <h3 class="text-xl sm:text-2xl font-serif text-gold-400 font-medium tracking-wide">
                    Asal Mula 'Asih'
                </h3>
                <div class="bg-[#0a1630]/80 rounded-2xl p-6 sm:p-8 border border-gold-400/20 space-y-4 text-xs sm:text-sm text-gray-300 font-light leading-relaxed shadow-xl relative overflow-hidden">
                    {{-- Subtle corner sacred geometry --}}
                    <svg class="absolute top-2 right-2 w-12 h-12 opacity-[0.06]" viewBox="0 0 48 48" fill="none">
                        <circle cx="24" cy="24" r="20" stroke="currentColor" stroke-width="0.5" class="text-gold-400"/>
                        <circle cx="24" cy="24" r="14" stroke="currentColor" stroke-width="0.3" class="text-gold-400" stroke-dasharray="2 4"/>
                        <circle cx="24" cy="24" r="8" stroke="currentColor" stroke-width="0.3" class="text-gold-400"/>
                    </svg>

                    <p>
                        Dalam bahasa Sunda, 'Asih' bermakna kasih sayang yang mendalam, cinta yang tulus, dan kepedulian yang tak bersyarat. Ia adalah energi fundamental yang mengikat alam semesta.
                    </p>
                    <p>
                        ASYIHAN mengambil esensi ini, meraciknya bukan hanya untuk mengharumkan raga, tetapi untuk membangkitkan 'Asih' di dalam jiwa. Setiap tetes adalah pengingat akan koneksi kita dengan Sang Pencipta dan alam semesta.
                    </p>
                </div>
            </div>

            <div class="lg:col-span-6">
                <div class="rounded-2xl border border-gold-400/20 overflow-hidden shadow-2xl h-full max-h-[380px] bg-black/40 relative group">
                    <img src="{{ asset('images/Background_asalmula.png') }}" alt="Asal Mula Asih - Manuskrip Sunda Kuno" class="w-full h-full object-cover rounded-2xl">
                    {{-- Hover Glow Overlay --}}
                    <div class="absolute inset-0 bg-gradient-to-t from-gold-400/10 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 pointer-events-none"></div>
                    {{-- Corner Ornaments --}}
                    <div class="absolute top-2 left-2 w-5 h-5 border-t border-l border-gold-400/25 pointer-events-none"></div>
                    <div class="absolute top-2 right-2 w-5 h-5 border-t border-r border-gold-400/25 pointer-events-none"></div>
                    <div class="absolute bottom-2 left-2 w-5 h-5 border-b border-l border-gold-400/25 pointer-events-none"></div>
                    <div class="absolute bottom-2 right-2 w-5 h-5 border-b border-r border-gold-400/25 pointer-events-none"></div>
                </div>
            </div>
        </div>

        {{-- 3. Sub-section: Geometri Suci --}}
        <div class="mt-20">
            <div class="text-center mb-10">
                <div class="sacred-divider mb-4 max-w-xs mx-auto">
                    <span class="text-gold-400/60 text-xs glow-gold shrink-0">✦</span>
                </div>
                <h3 class="text-2xl sm:text-3xl font-serif text-gold-400 tracking-[0.2em] font-medium uppercase glow-gold">
                    Geometri Suci
                </h3>
                <p class="text-gray-400 text-xs sm:text-sm font-light mt-1.5">
                    Mengungkap makna tersembunyi dibalik lambang ASYIHAN.
                </p>
            </div>

            {{-- 3 Sacred Geometry Cards in Row --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                {{-- Card 1: Aksara Awal --}}
                <div class="mystical-card-hover bg-[#0a1630]/80 rounded-2xl p-6 sm:p-7 border border-gold-400/20 text-center flex flex-col items-center group hover:border-gold-400/60 transition-all shadow-xl">
                    <div class="w-14 h-14 rounded-full border border-gold-400/50 flex items-center justify-center mb-4 text-gold-400 font-serif text-lg glow-gold bg-black/40 relative animate-energy-pulse group-hover:animate-none group-hover:shadow-[0_0_20px_rgba(197,160,89,0.3)]">
                        A
                        <div class="absolute inset-[-4px] rounded-full border border-dashed border-gold-400/15 animate-sacred-rotate"></div>
                    </div>
                    <h4 class="font-serif text-gold-300 text-sm font-medium mb-2 uppercase tracking-wider relative z-10">
                        Aksara Awal
                    </h4>
                    <p class="text-gray-400 text-xs font-light leading-relaxed relative z-10">
                        Huruf 'A' merepresentasikan awal, sebuah pintu gerbang menuju penemuan diri. Dalam konteks spiritual, ia adalah simbol dari 'Alif', fondasi dari segala penciptaan.
                    </p>
                </div>

                {{-- Card 2: Lingkaran Keabadian --}}
                <div class="mystical-card-hover bg-[#0a1630]/80 rounded-2xl p-6 sm:p-7 border border-gold-400/20 text-center flex flex-col items-center group hover:border-gold-400/60 transition-all shadow-xl">
                    <div class="w-14 h-14 rounded-full border border-gold-400/50 flex items-center justify-center mb-4 text-gold-400 text-xl glow-gold bg-black/40 relative animate-energy-pulse group-hover:animate-none group-hover:shadow-[0_0_20px_rgba(197,160,89,0.3)]" style="animation-delay: 0.7s;">
                        ◯
                        <div class="absolute inset-[-4px] rounded-full border border-dashed border-gold-400/15 animate-sacred-rotate-reverse"></div>
                    </div>
                    <h4 class="font-serif text-gold-300 text-sm font-medium mb-2 uppercase tracking-wider relative z-10">
                        Lingkaran Keabadian
                    </h4>
                    <p class="text-gray-400 text-xs font-light leading-relaxed relative z-10">
                        Lingkaran sempurna melambangkan kesatuan, siklus kehidupan yang tak terputus, dan energi universal yang melingkupi kita. Ia mewakili ketidakterbatasan esensi jiwa.
                    </p>
                </div>

                {{-- Card 3: Numerologi 1-9 --}}
                <div class="mystical-card-hover bg-[#0a1630]/80 rounded-2xl p-6 sm:p-7 border border-gold-400/20 text-center flex flex-col items-center group hover:border-gold-400/60 transition-all shadow-xl">
                    <div class="px-3 py-1.5 rounded-lg border border-gold-400/50 flex items-center justify-center mb-4 text-gold-400 font-serif text-sm font-semibold glow-gold bg-black/40 h-14 min-w-[56px] relative animate-energy-pulse group-hover:animate-none group-hover:shadow-[0_0_20px_rgba(197,160,89,0.3)]" style="animation-delay: 1.4s;">
                        1-9
                        <div class="absolute inset-[-4px] rounded-lg border border-dashed border-gold-400/15 animate-sacred-rotate"></div>
                    </div>
                    <h4 class="font-serif text-gold-300 text-sm font-medium mb-2 uppercase tracking-wider relative z-10">
                        Numerologi 1-9
                    </h4>
                    <p class="text-gray-400 text-xs font-light leading-relaxed relative z-10">
                        Angka-angka ini bukan sekadar urutan, melainkan representasi dari sembilan karakter dasar manusia dalam numerologi. Setiap angka memiliki frekuensi dan aromanya sendiri.
                    </p>
                </div>
            </div>

            {{-- Wide Bottom Card: Garis Geometris --}}
            <div class="mt-6 bg-[#0a1630]/80 rounded-2xl p-6 sm:p-7 border border-gold-400/20 text-center max-w-3xl mx-auto shadow-xl relative overflow-hidden">
                {{-- Connecting Line SVG --}}
                <svg class="absolute inset-0 w-full h-full opacity-[0.04] pointer-events-none" viewBox="0 0 600 100" fill="none">
                    <line x1="0" y1="50" x2="600" y2="50" stroke="currentColor" stroke-width="0.5" class="text-gold-400" stroke-dasharray="8 12"/>
                    <circle cx="150" cy="50" r="20" stroke="currentColor" stroke-width="0.3" class="text-gold-400"/>
                    <circle cx="300" cy="50" r="30" stroke="currentColor" stroke-width="0.3" class="text-gold-400"/>
                    <circle cx="450" cy="50" r="20" stroke="currentColor" stroke-width="0.3" class="text-gold-400"/>
                </svg>

                <h4 class="font-serif text-gold-300 text-sm font-medium mb-2 uppercase tracking-wider relative z-10">
                    Garis Geometris
                </h4>
                <p class="text-gray-400 text-xs font-light leading-relaxed relative z-10">
                    Garis-garis yang menghubungkan elemen-elemen ini menggambarkan jalinan takdir. Ia menunjukkan bagaimana karakter kita (1-9) berinteraksi dengan energi semesta (Lingkaran) melalui titik awal kesadaran (A).
                </p>
            </div>
        </div>

        {{-- 4. Sub-section: Temukan Esensimu CTA --}}
        <div class="mt-20 text-center py-6 relative">
            {{-- Background mystical glow --}}
            <div class="absolute inset-0 flex items-center justify-center pointer-events-none">
                <div class="w-64 h-64 bg-gold-400/3 rounded-full blur-3xl"></div>
            </div>

            <div class="sacred-divider mb-6 max-w-sm mx-auto">
                <span class="text-gold-400/50 text-sm glow-gold shrink-0 animate-pulse-gold">✦</span>
            </div>

            <h3 class="text-2xl sm:text-3xl font-serif text-gold-400 tracking-[0.2em] font-medium uppercase glow-gold mb-5 relative z-10">
                Temukan Esensimu
            </h3>
            <a href="{{ route('calculator') }}" class="btn-gold px-8 py-3 text-xs tracking-[0.2em] uppercase rounded-[3px] shadow-xl inline-block font-semibold relative z-10">
                GUNAKAN KALKULATOR NUMEROLOGI
            </a>

            <div class="sacred-divider mt-6 max-w-sm mx-auto">
                <span class="text-gold-400/50 text-sm glow-gold shrink-0">◆</span>
            </div>
        </div>
    </section>

</div>
@endsection
