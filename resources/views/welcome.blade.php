@extends('layouts.app')

@section('title', 'ASYIHAN — Born from Asih. Crafted for the Soul.')
@section('meta_description', 'Discover the fragrance crafted from the essence of your character. Born from Asih, guided by numerology, crafted for eternity.')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6">

    {{-- ============================================================ --}}
    {{-- PART 1: TOP MAIN & SIDEBAR GRID (MATCHING IMAGE 1)          --}}
    {{-- ============================================================ --}}
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
        
        {{-- LEFT COLUMN (Main - 8 Cols) --}}
        <div class="lg:col-span-8 flex flex-col gap-8">
            
            {{-- 1. Hero Visual Box with Celestial/Numerology Chart --}}
            <section class="rounded-2xl p-6 sm:p-10 relative overflow-hidden border border-gold-400/25 bg-[#090909] min-h-[460px] flex flex-col justify-center shadow-2xl">
                {{-- Background Chart Overlay --}}
                <div class="absolute inset-0 z-0 bg-cover bg-right sm:bg-center opacity-50 sm:opacity-70 pointer-events-none" style="background-image: url('{{ asset('images/background.png') }}');"></div>
                <div class="absolute inset-0 z-0 bg-gradient-to-r from-black via-black/85 sm:via-black/70 to-transparent pointer-events-none"></div>

                <div class="grid grid-cols-1 md:grid-cols-12 gap-6 items-center relative z-10">
                    {{-- Hero Typography & CTA --}}
                    <div class="md:col-span-7 space-y-4">
                        <h1 class="font-serif leading-none tracking-wide text-white">
                            <span class="text-3xl sm:text-4xl lg:text-5xl font-bold block mb-1">EVERY SOUL</span>
                            <span class="text-xl sm:text-2xl lg:text-3xl text-gold-300 italic font-serif block mb-3">HAS A NUMBER.</span>
                            <span class="text-3xl sm:text-4xl lg:text-5xl font-bold block mb-1">EVERY NUMBER</span>
                            <span class="text-xl sm:text-2xl lg:text-3xl text-gold-300 italic font-serif block">HAS A SCENT.</span>
                        </h1>

                        <p class="text-gray-300 font-light text-xs sm:text-sm leading-relaxed max-w-sm pt-2">
                            Discover the fragrance crafted from the essence of your character.
                        </p>

                        <div class="pt-3">
                            <a href="{{ route('calculator') }}" class="btn-gold px-7 py-3 text-xs tracking-[0.2em] rounded-[3px] shadow-xl inline-block font-semibold">
                                DISCOVER MY NUMBER
                            </a>
                        </div>
                    </div>

                    {{-- Hero Sacred Geometry Mandala --}}
                    <div class="md:col-span-5 hidden md:flex justify-center items-center">
                        <div class="relative w-48 h-48 lg:w-56 lg:h-56 flex items-center justify-center">
                            <img src="{{ asset('images/logo_asy.png') }}" alt="ASYIHAN Sacred Emblem" class="w-full h-full object-contain drop-shadow-[0_0_25px_rgba(197,160,89,0.5)] animate-pulse-gold">
                        </div>
                    </div>
                </div>
            </section>

            {{-- 2. Brand Promise Box --}}
            <section class="bg-panel rounded-2xl p-7 sm:p-9 text-center border border-gold-400/20 relative overflow-hidden shadow-xl">
                <h2 class="text-base sm:text-lg lg:text-xl font-serif text-gold-400 tracking-[0.2em] uppercase glow-gold font-medium mb-3">
                    BORN FROM ASIH. CRAFTED FOR THE SOUL.
                </h2>
                <p class="text-gray-300 text-xs sm:text-sm max-w-xl mx-auto font-light leading-relaxed mb-4">
                    ASYIHAN adalah pertemuan antara kearifan Sunda, kemewahan tradisi wewangian Timur Tengah, dan keunikan karakter setiap manusia.
                </p>
                <a href="{{ route('about') }}" class="inline-block text-[11px] text-gold-400 uppercase tracking-[0.2em] border-b border-gold-400/50 pb-0.5 hover:border-gold-400 hover:text-white transition-all">
                    EXPLORE OUR STORY
                </a>
            </section>

            {{-- 3. Essence Collection Box (6 Cards) --}}
            <section class="bg-panel rounded-2xl p-6 sm:p-8 border border-gold-400/20 shadow-xl">
                <div class="text-center mb-6">
                    <h2 class="text-xl sm:text-2xl font-serif text-gold-400 tracking-[0.2em] uppercase glow-gold font-medium">
                        ESSENCE COLLECTION
                    </h2>
                    <p class="text-gray-400 text-xs font-light mt-1">
                        9 Essence. 9 Karakter. 9 Aroma. Temukan yang paling sesuai dengan dirimu.
                    </p>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-3.5 sm:gap-4">
                    @foreach(array_slice($archetypes, 0, 6, true) as $essence)
                        <a href="{{ route('essence.detail', $essence['slug']) }}" class="border border-gold-400/20 rounded-xl p-4 text-center hover:border-gold-400/80 transition-all duration-300 group bg-black/40 hover:-translate-y-1 block">
                            <div class="text-2xl sm:text-3xl font-serif text-gold-400 mb-1 group-hover:glow-gold font-bold">
                                {{ $essence['number'] }}
                            </div>
                            <h3 class="text-xs uppercase tracking-widest text-white mb-1 font-medium group-hover:text-gold-200">
                                {{ $essence['name'] }}
                            </h3>
                            <p class="text-[10px] text-gray-400 font-light truncate">
                                {{ implode(' - ', $essence['traits']) }}
                            </p>
                        </a>
                    @endforeach
                </div>

                <div class="text-center mt-6">
                    <a href="{{ route('collection') }}" class="btn-gold px-8 py-2.5 text-[11px] tracking-[0.2em] rounded-[3px] shadow-md uppercase font-semibold">
                        LIHAT SEMUA ESSENCE
                    </a>
                </div>
            </section>

        </div>

        {{-- RIGHT COLUMN (Sidebar - 4 Cols) --}}
        <div class="lg:col-span-4 flex flex-col gap-8">
            
            {{-- 1. Calculator Numerology Widget --}}
            <aside id="calculator-widget" class="bg-panel rounded-2xl p-6 sm:p-7 border border-gold-400/20 relative overflow-hidden text-center shadow-xl">
                <div>
                    {{-- Sun/Radiance Icon --}}
                    <div class="w-8 h-8 mx-auto mb-2 text-gold-400 flex items-center justify-center">
                        <svg class="w-6 h-6 glow-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path>
                        </svg>
                    </div>

                    <h3 class="font-serif text-gold-400 text-sm sm:text-base tracking-[0.18em] uppercase glow-gold font-medium mb-1">
                        CALCULATOR NUMEROLOGY
                    </h3>
                    <p class="text-gray-400 text-[11px] font-light mb-5">
                        Temukan angka intimu dan kenali esensi dirimu.
                    </p>

                    <form id="sidebar-calc-form" class="space-y-3.5 text-left">
                        @csrf
                        <div>
                            <label for="sidebar_name" class="block text-[10px] uppercase tracking-wider text-gray-400 mb-1 font-mono">NAMA LENGKAP</label>
                            <input id="sidebar_name" name="name" type="text" placeholder="Masukkan nama lengkap" required class="input-dark text-xs py-2">
                        </div>

                        <div>
                            <label for="sidebar_birth_date" class="block text-[10px] uppercase tracking-wider text-gray-400 mb-1 font-mono">TANGGAL LAHIR</label>
                            <input id="sidebar_birth_date" name="birth_date" type="date" required class="input-dark text-xs py-2">
                        </div>

                        <button id="sidebar-calc-btn" type="submit" class="w-full btn-gold py-2.5 text-xs tracking-[0.2em] rounded-[3px] uppercase mt-2 shadow-lg font-semibold">
                            FIND MY ESSENCE
                        </button>
                    </form>

                    {{-- Mystic Sorceress / Portal Image --}}
                    <div class="mt-4 rounded-xl overflow-hidden border border-gold-400/20 shadow-lg">
                        <img src="{{ asset('images/mystic_calculator_element.png') }}" alt="Mystic Numerology Portal" class="w-full h-auto object-cover">
                    </div>
                </div>
            </aside>

            {{-- 2. Dynamic Calculation Result Card (Hidden by default, shown upon calculation) --}}
            <aside id="sidebar-result-card" class="hidden bg-panel rounded-2xl p-6 sm:p-7 border border-gold-400/30 flex flex-col justify-between shadow-2xl animate-fade-in-up transition-all duration-500">
                <div>
                    <div class="text-center mb-4">
                        <h3 id="res-essence-roman" class="font-serif text-gold-400 text-sm sm:text-base tracking-[0.2em] uppercase font-medium glow-gold">
                            ESSENCE VII
                        </h3>
                        <p id="res-archetype-title" class="text-white/80 text-[11px] tracking-[0.25em] uppercase font-light mt-0.5">
                            THE SEEKER
                        </p>
                    </div>

                    {{-- Luxury Perfume Bottle Presentation with Dynamic Roman Label --}}
                    <div class="rounded-xl overflow-hidden border border-gold-400/20 bg-gradient-to-b from-[#1c160e] via-[#0d0d0d] to-black p-4 text-center mb-4 shadow-xl relative group">
                        <div class="absolute inset-0 bg-radial-gradient from-gold-400/10 via-transparent to-transparent pointer-events-none"></div>
                        
                        {{-- Glass Bottle Render with Ambient Glow --}}
                        <div class="py-3 flex flex-col items-center justify-center relative z-10">
                            <div class="w-24 h-32 relative flex flex-col items-center">
                                {{-- Gold Cap --}}
                                <div class="w-10 h-6 bg-gradient-to-r from-gold-300 via-gold-100 to-gold-500 rounded-t-sm shadow-md border-b border-gold-600"></div>
                                <div class="w-12 h-1.5 bg-gold-500 mb-0.5"></div>
                                {{-- Heavy Glass Body --}}
                                <div class="w-20 h-24 bg-gradient-to-b from-white/15 via-gold-400/10 to-gold-900/40 rounded-sm border border-gold-400/40 backdrop-blur-sm p-2 flex flex-col items-center justify-center shadow-[0_0_20px_rgba(197,160,89,0.25)]">
                                    <div class="w-14 h-14 border border-gold-400/50 rounded-xs bg-black/60 flex flex-col items-center justify-center text-center p-1">
                                        <span class="text-[6px] tracking-widest text-gold-400 font-serif">ASYIHAN</span>
                                        <span id="res-bottle-label" class="text-[8px] font-bold text-gold-200 font-serif my-0.5">ESSENCE VII</span>
                                        <span class="text-[5px] text-gray-400 font-light">EAU DE PARFUM</span>
                                    </div>
                                </div>
                            </div>
                            <div class="w-28 h-2 bg-radial-gradient from-gold-400/30 to-transparent rounded-full mt-2 blur-[1px]"></div>
                        </div>
                    </div>

                    <p id="res-description" class="text-gray-300 text-xs font-light leading-relaxed mb-4">
                        Untuk jiwa yang mencari makna, menyelami kebenaran, dan membawa kebijaksanaan dalam setiap langkah.
                    </p>

                    <div class="bg-black/40 rounded-xl p-3 border border-white/5 space-y-1 mb-5">
                        <p class="text-gold-400 text-[10px] uppercase tracking-widest font-semibold mb-1 font-mono">NOTES</p>
                        <div class="text-[11px] flex justify-between"><span class="text-gray-500">Top</span> <span id="res-note-top" class="text-gray-300">Bergamot, Black Pepper</span></div>
                        <div class="text-[11px] flex justify-between"><span class="text-gray-500">Middle</span> <span id="res-note-mid" class="text-gray-300">Oud, Frankincense</span></div>
                        <div class="text-[11px] flex justify-between"><span class="text-gray-500">Base</span> <span id="res-note-base" class="text-gray-300">Dark Musk, Amber</span></div>
                    </div>
                </div>

                <div class="flex flex-col gap-3 border-t border-white/10 pt-4">
                    <div class="flex justify-between items-center">
                        <div>
                            <span id="res-price" class="text-sm sm:text-base text-white font-medium font-serif">
                                Rp 1.380.000
                            </span>
                        </div>
                        <a id="res-order-link" href="{{ route('order') }}" class="btn-gold-outline px-4 py-1.5 text-[10px] uppercase tracking-wider rounded-[2px] font-medium">
                            ORDER SEKARANG
                        </a>
                    </div>
                    <a id="res-detail-link" href="{{ route('collection') }}" class="text-[10px] text-gold-400/80 hover:text-white uppercase tracking-widest text-center transition-colors">
                        Lihat Ajian & Detail Esensi &rarr;
                    </a>
                </div>
            </aside>

        </div>

    </div>

    {{-- ============================================================ --}}
    {{-- PART 2: FILOSOFI ASIH & GEOMETRI SUCI (MATCHING IMAGE 2)    --}}
    {{-- ============================================================ --}}
    <section class="mt-24 pt-8">
        {{-- 1. Smoke Banner Header --}}
        <div class="relative rounded-2xl overflow-hidden border border-gold-400/20 p-8 sm:p-14 text-center bg-[#090909] shadow-2xl">
            {{-- Background Smoke Image --}}
            <div class="absolute inset-0 bg-cover bg-center opacity-40 pointer-events-none" style="background-image: url('{{ asset('images/background_filosofi.png') }}');"></div>
            <div class="absolute inset-0 bg-gradient-to-b from-black/80 via-transparent to-black/90 pointer-events-none"></div>

            <div class="relative z-10 max-w-3xl mx-auto">
                <div class="text-gold-400 text-lg mb-2 glow-gold">✦</div>
                <h2 class="text-2xl sm:text-3xl lg:text-4xl font-serif text-gold-400 tracking-[0.25em] uppercase glow-gold font-medium mb-4">
                    FILOSOFI ASIH
                </h2>
                <p class="text-gray-300 text-xs sm:text-sm font-light leading-relaxed max-w-2xl mx-auto">
                    Lebih dari sekadar wewangian, ASYIHAN adalah sebuah perjalanan spiritual. Terlahir dari kearifan Sunda Kuno, memadukan tradisi mistis dengan kemewahan perfumery Timur Tengah.
                </p>
            </div>
        </div>

        {{-- 2. Sub-section: Asal Mula 'Asih' --}}
        <div class="mt-14 grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
            <div class="lg:col-span-6 space-y-4">
                <h3 class="text-xl sm:text-2xl font-serif text-gold-400 font-medium tracking-wide">
                    Asal Mula 'Asih'
                </h3>
                <div class="bg-[#101010] rounded-2xl p-6 sm:p-8 border border-gold-400/20 space-y-4 text-xs sm:text-sm text-gray-300 font-light leading-relaxed shadow-xl">
                    <p>
                        Dalam bahasa Sunda, 'Asih' bermakna kasih sayang yang mendalam, cinta yang tulus, dan kepedulian yang tak bersyarat. Ia adalah energi fundamental yang mengikat alam semesta.
                    </p>
                    <p>
                        ASYIHAN mengambil esensi ini, meraciknya bukan hanya untuk mengharumkan raga, tetapi untuk membangkitkan 'Asih' di dalam jiwa. Setiap tetes adalah pengingat akan koneksi kita dengan Sang Pencipta dan alam semesta.
                    </p>
                </div>
            </div>

            <div class="lg:col-span-6">
                <div class="rounded-2xl border border-gold-400/20 overflow-hidden shadow-2xl h-full max-h-[380px] bg-black/40">
                    <img src="{{ asset('images/Background_asalmula.png') }}" alt="Asal Mula Asih - Manuskrip Sunda Kuno" class="w-full h-full object-cover rounded-2xl">
                </div>
            </div>
        </div>

        {{-- 3. Sub-section: Geometri Suci --}}
        <div class="mt-20">
            <div class="text-center mb-10">
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
                <div class="bg-[#101010] rounded-2xl p-6 sm:p-7 border border-gold-400/20 text-center flex flex-col items-center group hover:border-gold-400/60 transition-all shadow-xl">
                    <div class="w-12 h-12 rounded-full border border-gold-400/50 flex items-center justify-center mb-4 text-gold-400 font-serif text-lg glow-gold bg-black/40">
                        A
                    </div>
                    <h4 class="font-serif text-gold-300 text-sm font-medium mb-2 uppercase tracking-wider">
                        Aksara Awal
                    </h4>
                    <p class="text-gray-400 text-xs font-light leading-relaxed">
                        Huruf 'A' merepresentasikan awal, sebuah pintu gerbang menuju penemuan diri. Dalam konteks spiritual, ia adalah simbol dari 'Alif', fondasi dari segala penciptaan.
                    </p>
                </div>

                {{-- Card 2: Lingkaran Keabadian --}}
                <div class="bg-[#101010] rounded-2xl p-6 sm:p-7 border border-gold-400/20 text-center flex flex-col items-center group hover:border-gold-400/60 transition-all shadow-xl">
                    <div class="w-12 h-12 rounded-full border border-gold-400/50 flex items-center justify-center mb-4 text-gold-400 text-xl glow-gold bg-black/40">
                        ◯
                    </div>
                    <h4 class="font-serif text-gold-300 text-sm font-medium mb-2 uppercase tracking-wider">
                        Lingkaran Keabadian
                    </h4>
                    <p class="text-gray-400 text-xs font-light leading-relaxed">
                        Lingkaran sempurna melambangkan kesatuan, siklus kehidupan yang tak terputus, dan energi universal yang melingkupi kita. Ia mewakili ketidakterbatasan esensi jiwa.
                    </p>
                </div>

                {{-- Card 3: Numerologi 1-9 --}}
                <div class="bg-[#101010] rounded-2xl p-6 sm:p-7 border border-gold-400/20 text-center flex flex-col items-center group hover:border-gold-400/60 transition-all shadow-xl">
                    <div class="px-3 py-1.5 rounded-lg border border-gold-400/50 flex items-center justify-center mb-4 text-gold-400 font-serif text-sm font-semibold glow-gold bg-black/40 h-12 min-w-[48px]">
                        1-9
                    </div>
                    <h4 class="font-serif text-gold-300 text-sm font-medium mb-2 uppercase tracking-wider">
                        Numerologi 1-9
                    </h4>
                    <p class="text-gray-400 text-xs font-light leading-relaxed">
                        Angka-angka ini bukan sekadar urutan, melainkan representasi dari sembilan karakter dasar manusia dalam numerologi. Setiap angka memiliki frekuensi dan aromanya sendiri.
                    </p>
                </div>
            </div>

            {{-- Wide Bottom Card: Garis Geometris --}}
            <div class="mt-6 bg-[#101010] rounded-2xl p-6 sm:p-7 border border-gold-400/20 text-center max-w-3xl mx-auto shadow-xl">
                <h4 class="font-serif text-gold-300 text-sm font-medium mb-2 uppercase tracking-wider">
                    Garis Geometris
                </h4>
                <p class="text-gray-400 text-xs font-light leading-relaxed">
                    Garis-garis yang menghubungkan elemen-elemen ini menggambarkan jalinan takdir. Ia menunjukkan bagaimana karakter kita (1-9) berinteraksi dengan energi semesta (Lingkaran) melalui titik awal kesadaran (A).
                </p>
            </div>
        </div>

        {{-- 4. Sub-section: Temukan Esensimu CTA --}}
        <div class="mt-20 text-center py-6">
            <h3 class="text-2xl sm:text-3xl font-serif text-gold-400 tracking-[0.2em] font-medium uppercase glow-gold mb-5">
                Temukan Esensimu
            </h3>
            <a href="{{ route('calculator') }}" class="btn-gold px-8 py-3 text-xs tracking-[0.2em] uppercase rounded-[3px] shadow-xl inline-block font-semibold">
                GUNAKAN KALKULATOR NUMEROLOGI
            </a>
        </div>
    </section>

</div>
@endsection
