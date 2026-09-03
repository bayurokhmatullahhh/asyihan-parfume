@extends('layouts.app')

@section('title', 'ASYIHAN — Perfumery & Numerology')
@section('meta_description', 'Born from Asih. Crafted for the Soul. Wewangian personal berbasis 9 arketipe numerologi.')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6">
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
        
        {{-- Main Column (8 Cols) --}}
        <div class="lg:col-span-8 flex flex-col gap-8">
            
            {{-- Hero Visual Section --}}
            <section class="bg-panel rounded-2xl p-6 sm:p-10 relative overflow-hidden border border-gold-400/30 box-glow min-h-[560px] flex flex-col justify-center">
                {{-- Background Ambience --}}
                <div class="absolute inset-0 z-0 pointer-events-none">
                    <div class="absolute -top-24 -left-24 w-96 h-96 bg-gold-400/10 rounded-full blur-3xl"></div>
                    <div class="absolute -bottom-24 -right-24 w-96 h-96 bg-gold-600/10 rounded-full blur-3xl"></div>
                    <div class="absolute inset-0 bg-radial-gradient from-transparent via-black/40 to-black/80"></div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-12 gap-8 items-center relative z-10">
                    {{-- Hero Typography & CTA --}}
                    <div class="md:col-span-7 space-y-6">
                        <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-gold-400/10 border border-gold-400/30 text-gold-300 text-[11px] tracking-widest uppercase">
                            <span class="w-1.5 h-1.5 rounded-full bg-gold-400 animate-pulse"></span>
                            The Scent of Destiny
                        </div>

                        <h1 class="text-3xl sm:text-4xl md:text-5xl font-serif text-white leading-tight tracking-wide glow-gold">
                            EVERY SOUL<br>
                            <span class="text-xl sm:text-2xl text-gold-300 italic font-sans font-light">HAS A NUMBER.</span><br>
                            EVERY NUMBER<br>
                            <span class="text-xl sm:text-2xl text-gold-300 italic font-sans font-light">HAS A SCENT.</span>
                        </h1>

                        <p class="text-gray-300 font-light text-sm sm:text-base leading-relaxed max-w-md">
                            Discover the fragrance crafted from the essence of your character. Born from Asih, guided by numbers, crafted for eternity.
                        </p>

                        <div class="flex flex-wrap gap-4 pt-2">
                            <a href="{{ route('calculator') }}" class="btn-gold px-7 py-3 text-xs tracking-[0.2em] rounded-sm shadow-lg">
                                Discover My Number
                            </a>
                            <a href="{{ route('about') }}" class="btn-gold-outline px-6 py-3 text-xs tracking-[0.2em] rounded-sm">
                                Explore Story
                            </a>
                        </div>
                    </div>

                    {{-- Hero Mystical Mandala & Perfume Bottle Element --}}
                    <div class="md:col-span-5 flex justify-center items-center">
                        <div class="relative w-64 h-64 sm:w-72 sm:h-72 flex items-center justify-center">
                            {{-- Outer Spinning Ring --}}
                            <div class="absolute inset-0 border border-gold-400/40 rounded-full animate-spin-slow"></div>
                            {{-- Middle Dashed Ring --}}
                            <div class="absolute inset-3 border border-gold-400/20 border-dashed rounded-full animate-spin-reverse"></div>
                            {{-- Inner Glow Ring --}}
                            <div class="absolute inset-8 border border-gold-400/30 rounded-full animate-pulse-gold"></div>
                            
                            {{-- Center Sacred Geometry / Bottle Presentation --}}
                            <div class="relative z-20 w-40 h-40 sm:w-44 sm:h-44 rounded-full bg-gradient-to-tr from-black via-dark-300 to-black p-4 border border-gold-400/40 flex flex-col items-center justify-center text-center shadow-2xl group hover:border-gold-400 transition-colors">
                                <div class="w-10 h-10 rounded-full border border-gold-400/50 flex items-center justify-center mb-2 text-gold-400 font-serif text-lg glow-gold">
                                    A
                                </div>
                                <span class="text-[11px] uppercase tracking-[0.25em] text-gold-300 font-serif font-medium">ASYIHAN</span>
                                <span class="text-[9px] uppercase tracking-widest text-gray-400 mt-1 font-light">Haute Parfumerie</span>
                                <span class="text-[8px] text-gold-400/70 mt-2 tracking-widest">9 SACRED ESSENCES</span>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            {{-- Brand Story Banner --}}
            <section class="bg-panel rounded-2xl p-8 text-center border border-gold-400/20 relative overflow-hidden group">
                <div class="absolute inset-0 bg-shimmer opacity-30 pointer-events-none"></div>
                <h2 class="text-xl sm:text-2xl font-serif text-gold-400 mb-3 tracking-[0.2em] uppercase glow-gold">
                    Born From Asih. Crafted For The Soul.
                </h2>
                <p class="text-gray-300 text-xs sm:text-sm max-w-2xl mx-auto font-light leading-relaxed mb-4">
                    ASYIHAN adalah pertemuan antara kearifan Sunda, kemewahan tradisi wewangian Timur Tengah, dan keunikan karakter setiap manusia. Bukan sekadar wewangian, ia adalah ASIH yang menemukan bentuknya dalam aroma.
                </p>
                <a href="{{ route('about') }}" class="inline-flex items-center gap-2 text-xs text-gold-400 uppercase tracking-widest border-b border-gold-400/40 pb-1 hover:border-gold-400 hover:text-white transition-all">
                    Explore Our Sacred Journey
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                    </svg>
                </a>
            </section>

            {{-- Essence Collection Grid --}}
            <section class="bg-panel rounded-2xl p-6 sm:p-8 border border-gold-400/20">
                <div class="text-center mb-8">
                    <span class="text-xs uppercase tracking-[0.25em] text-gold-400 font-serif">The 9 Archetypes</span>
                    <h2 class="text-2xl sm:text-3xl font-serif text-white tracking-widest mt-1">ESSENCE COLLECTION</h2>
                    <div class="w-16 h-0.5 bg-gold-400/50 mx-auto my-3"></div>
                    <p class="text-gray-400 text-xs sm:text-sm font-light max-w-lg mx-auto">
                        9 Essence. 9 Karakter. 9 Aroma. Temukan aroma yang beresonansi dengan angka inti jiwamu.
                    </p>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                    @foreach($archetypes as $essence)
                        <div class="border border-gold-400/20 rounded-xl p-5 text-center hover:border-gold-400/80 transition-all duration-300 cursor-pointer group bg-black/40 hover:-translate-y-1 flex flex-col justify-between">
                            <div>
                                <div class="text-3xl font-serif text-gold-400 mb-2 group-hover:glow-gold font-bold">
                                    {{ $essence['number'] }}
                                </div>
                                <h3 class="text-xs uppercase tracking-widest text-white mb-1.5 font-medium group-hover:text-gold-200">
                                    {{ $essence['name'] }}
                                </h3>
                                <p class="text-[11px] text-gray-400 font-light">
                                    {{ implode(' • ', $essence['traits']) }}
                                </p>
                            </div>
                            
                            <div class="pt-3 mt-4 border-t border-white/5">
                                <a href="{{ route('essence.detail', $essence['slug']) }}" class="text-[10px] text-gold-400 uppercase tracking-widest group-hover:text-white transition-colors">
                                    Lihat Esensi &rarr;
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="text-center mt-8">
                    <a href="{{ route('collection') }}" class="btn-gold px-8 py-3 text-xs tracking-[0.2em] rounded-sm">
                        Lihat Semua Essence
                    </a>
                </div>
            </section>

        </div>

        {{-- Right Sidebar Column (4 Cols) --}}
        <div class="lg:col-span-4 flex flex-col gap-8">
            
            {{-- Calculator Widget (Interactive AJAX) --}}
            <aside class="bg-panel rounded-2xl p-6 sm:p-8 border border-gold-400/30 box-glow text-center relative overflow-hidden">
                <div class="absolute top-0 left-1/2 -translate-x-1/2 w-full h-32 bg-gold-400/10 blur-3xl rounded-full"></div>
                
                <div class="mb-6 relative z-10">
                    <div class="w-10 h-10 rounded-full border border-gold-400/40 flex items-center justify-center mx-auto mb-3 text-gold-400">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path>
                        </svg>
                    </div>
                    <h2 class="text-lg font-serif text-gold-400 uppercase tracking-[0.15em] glow-gold">Calculator Numerology</h2>
                    <p class="text-xs text-gray-400 mt-1 font-light">Temukan angka intimu dan kenali esensi karaktermu.</p>
                </div>

                {{-- Calculator Form --}}
                <form id="sidebar-calc-form" class="space-y-4 relative z-10 text-left">
                    @csrf
                    <div>
                        <label for="sidebar_name" class="block text-[11px] text-gray-400 uppercase tracking-wider mb-1.5">Nama Lengkap</label>
                        <input id="sidebar_name" name="name" type="text" placeholder="Masukkan nama lengkap Anda" required class="input-dark text-sm">
                    </div>

                    <div>
                        <label for="sidebar_birth_date" class="block text-[11px] text-gray-400 uppercase tracking-wider mb-1.5">Tanggal Lahir</label>
                        <input id="sidebar_birth_date" name="birth_date" type="date" required class="input-dark text-sm">
                    </div>

                    <button id="sidebar-calc-btn" type="submit" class="w-full btn-gold py-3 text-xs tracking-[0.2em] rounded-sm mt-2 flex items-center justify-center gap-2">
                        <span>Find My Essence</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                        </svg>
                    </button>
                </form>

                {{-- Live Result Preview Container (Hidden initially) --}}
                <div id="sidebar-result" class="hidden mt-6 pt-6 border-t border-gold-400/20 text-left relative z-10 animate-fade-in-up">
                    <div class="bg-black/60 rounded-xl p-4 border border-gold-400/30">
                        <div class="flex items-center justify-between mb-2">
                            <span class="text-[10px] uppercase tracking-widest text-gold-400">Angka Inti Anda:</span>
                            <span id="res-number" class="text-2xl font-serif text-gold-400 font-bold glow-gold">7</span>
                        </div>
                        <h4 id="res-archetype" class="text-sm font-serif text-white font-semibold">The Seeker</h4>
                        <p id="res-desc" class="text-xs text-gray-400 font-light mt-1.5 line-clamp-3 leading-relaxed"></p>
                        
                        <div class="mt-4 pt-3 border-t border-white/10 flex justify-between items-center">
                            <span id="res-essence-name" class="text-[11px] text-gold-300 font-medium truncate max-w-[150px]"></span>
                            <a id="res-link" href="#" class="text-[11px] text-white bg-gold-500/20 hover:bg-gold-500 hover:text-black border border-gold-400/40 px-3 py-1 rounded transition-colors uppercase tracking-wider">
                                Baca Ajian &rarr;
                            </a>
                        </div>
                    </div>
                </div>

                {{-- Mystical Symbol / Deck Art --}}
                <div class="mt-6 pt-4 border-t border-white/5 opacity-60 flex justify-center">
                    <div class="text-[10px] text-gray-500 tracking-widest uppercase font-serif">
                        ✦ Authentic • Scent • Sacred Geometry ✦
                    </div>
                </div>
            </aside>

            {{-- Product Highlight Widget --}}
            <aside class="bg-panel rounded-2xl p-6 sm:p-7 border border-gold-400/20 relative overflow-hidden">
                <div class="text-center pb-4 border-b border-gold-400/20 mb-5">
                    <span class="text-[10px] uppercase tracking-[0.2em] text-gold-400 font-serif">Signature Selection</span>
                    <h3 class="font-serif text-gold-400 text-lg uppercase tracking-wider mt-1">
                        {{ $featured['essence_name'] }}
                    </h3>
                    <p class="text-xs text-gray-400 italic">{{ implode(' • ', $featured['traits']) }}</p>
                </div>

                <div class="text-xs font-light text-gray-300 space-y-4 mb-6">
                    <p class="leading-relaxed">
                        {{ $featured['description'] }}
                    </p>

                    <div class="bg-black/40 rounded-lg p-3.5 border border-white/5 space-y-1.5">
                        <p class="text-gold-400 text-[10px] uppercase tracking-widest font-semibold mb-1">Fragrance Pyramid</p>
                        <div class="text-[11px] flex justify-between"><span class="text-gray-500">Top</span> <span class="text-gray-300">{{ $featured['notes']['top'] }}</span></div>
                        <div class="text-[11px] flex justify-between"><span class="text-gray-500">Middle</span> <span class="text-gray-300">{{ $featured['notes']['middle'] }}</span></div>
                        <div class="text-[11px] flex justify-between"><span class="text-gray-500">Base</span> <span class="text-gray-300">{{ $featured['notes']['base'] }}</span></div>
                    </div>
                </div>

                <div class="flex justify-between items-center border-t border-white/10 pt-4">
                    <div>
                        <span class="text-[10px] text-gray-500 block uppercase tracking-wider">Investasi Jiwa</span>
                        <span class="text-base sm:text-lg text-white font-medium font-serif">
                            Rp {{ number_format($featured['price'], 0, ',', '.') }}
                        </span>
                    </div>
                    <a href="{{ route('order', ['essence' => $featured['number']]) }}" class="btn-gold-outline px-4 py-2 text-[11px] uppercase tracking-wider rounded-sm hover:text-black">
                        Order Sekarang
                    </a>
                </div>
            </aside>

        </div>

    </div>
</div>
@endsection
