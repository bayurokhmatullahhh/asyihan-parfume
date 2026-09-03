@extends('layouts.app')

@section('title', 'Koleksi Esensi — 9 Sacred Fragrances | ASYIHAN')
@section('meta_description', 'Jelajahi 9 wewangian sakral ASYIHAN yang dirancang berdasarkan arketipe numerologi.')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 py-8">

    {{-- Header --}}
    <div class="text-center mb-12">
        <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-gold-400/10 border border-gold-400/30 text-gold-300 text-xs tracking-[0.2em] uppercase mb-4">
            Haute Parfumerie Collection
        </div>
        <h1 class="text-3xl sm:text-5xl font-serif text-white tracking-wider glow-gold mb-3">
            ESSENCE COLLECTION
        </h1>
        <p class="text-gray-300 font-light text-sm sm:text-base max-w-2xl mx-auto leading-relaxed">
            9 Essence. 9 Karakter. 9 Aroma. Setiap formula dirangkai untuk mendekati satu hal yang paling personal: Dirimu.
        </p>
        <div class="w-24 h-0.5 bg-gradient-to-r from-transparent via-gold-400 to-transparent mx-auto mt-6"></div>
    </div>

    {{-- Filter / Subnav --}}
    <div class="flex flex-wrap justify-center gap-2 mb-10">
        <button class="filter-btn active px-4 py-2 rounded-full text-xs font-serif uppercase tracking-wider bg-gold-500 text-black font-semibold transition-all" data-filter="all">
            Semua (9)
        </button>
        <button class="filter-btn px-4 py-2 rounded-full text-xs font-serif uppercase tracking-wider bg-black/40 border border-gold-400/30 text-gold-400 hover:border-gold-400 transition-all" data-filter="Api">
            Api
        </button>
        <button class="filter-btn px-4 py-2 rounded-full text-xs font-serif uppercase tracking-wider bg-black/40 border border-gold-400/30 text-gold-400 hover:border-gold-400 transition-all" data-filter="Air">
            Air
        </button>
        <button class="filter-btn px-4 py-2 rounded-full text-xs font-serif uppercase tracking-wider bg-black/40 border border-gold-400/30 text-gold-400 hover:border-gold-400 transition-all" data-filter="Udara">
            Udara
        </button>
        <button class="filter-btn px-4 py-2 rounded-full text-xs font-serif uppercase tracking-wider bg-black/40 border border-gold-400/30 text-gold-400 hover:border-gold-400 transition-all" data-filter="Tanah">
            Tanah
        </button>
        <button class="filter-btn px-4 py-2 rounded-full text-xs font-serif uppercase tracking-wider bg-black/40 border border-gold-400/30 text-gold-400 hover:border-gold-400 transition-all" data-filter="Angin">
            Angin
        </button>
        <button class="filter-btn px-4 py-2 rounded-full text-xs font-serif uppercase tracking-wider bg-black/40 border border-gold-400/30 text-gold-400 hover:border-gold-400 transition-all" data-filter="Bumi">
            Bumi
        </button>
        <button class="filter-btn px-4 py-2 rounded-full text-xs font-serif uppercase tracking-wider bg-black/40 border border-gold-400/30 text-gold-400 hover:border-gold-400 transition-all" data-filter="Ether">
            Ether
        </button>
        <button class="filter-btn px-4 py-2 rounded-full text-xs font-serif uppercase tracking-wider bg-black/40 border border-gold-400/30 text-gold-400 hover:border-gold-400 transition-all" data-filter="Logam">
            Logam
        </button>
        <button class="filter-btn px-4 py-2 rounded-full text-xs font-serif uppercase tracking-wider bg-black/40 border border-gold-400/30 text-gold-400 hover:border-gold-400 transition-all" data-filter="Cahaya">
            Cahaya
        </button>
    </div>

    {{-- Essences Grid --}}
    <div id="essence-grid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($archetypes as $essence)
            <div class="essence-item bg-panel rounded-2xl p-6 border border-gold-400/20 hover:border-gold-400/70 transition-all duration-300 group hover:-translate-y-1 relative overflow-hidden flex flex-col justify-between" data-element="{{ $essence['element'] }}">
                <div class="absolute -top-12 -right-12 w-28 h-28 bg-gold-400/5 rounded-full blur-xl group-hover:bg-gold-400/15 transition-all"></div>
                
                <div>
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-12 h-12 rounded-full border border-gold-400/40 flex items-center justify-center font-serif text-gold-400 text-xl font-bold group-hover:glow-gold group-hover:bg-gold-400 group-hover:text-black transition-all">
                            {{ $essence['number'] }}
                        </div>
                        <span class="text-[10px] uppercase tracking-widest px-2.5 py-1 rounded bg-black/60 border border-gold-400/20 text-gold-300">
                            {{ $essence['element'] }}
                        </span>
                    </div>

                    <h2 class="text-lg font-serif text-white mb-1 group-hover:text-gold-200 transition-colors">
                        {{ $essence['essence_name'] }}
                    </h2>
                    
                    <p class="text-xs text-gold-400/90 mb-3 font-light">
                        {{ implode(' • ', $essence['traits']) }}
                    </p>

                    <p class="text-xs text-gray-400 font-light leading-relaxed line-clamp-3 mb-4">
                        {{ $essence['fragrance_description'] }}
                    </p>

                    {{-- Fragrance Notes Preview --}}
                    <div class="bg-black/40 rounded-lg p-3 border border-white/5 space-y-1 mb-4 text-[11px]">
                        <div class="flex justify-between"><span class="text-gray-500">Top</span> <span class="text-gray-300">{{ $essence['notes']['top'] }}</span></div>
                        <div class="flex justify-between"><span class="text-gray-500">Mid</span> <span class="text-gray-300">{{ $essence['notes']['middle'] }}</span></div>
                        <div class="flex justify-between"><span class="text-gray-500">Base</span> <span class="text-gray-300">{{ $essence['notes']['base'] }}</span></div>
                    </div>
                </div>

                <div class="pt-4 border-t border-white/5 mt-auto flex items-center justify-between">
                    <div>
                        <span class="text-[10px] text-gray-500 block uppercase">Harga</span>
                        <span class="text-sm font-semibold text-white font-serif">
                            Rp {{ number_format($essence['price'], 0, ',', '.') }}
                        </span>
                    </div>
                    <div class="flex gap-2">
                        <a href="{{ route('essence.detail', $essence['slug']) }}" class="btn-gold-outline px-3.5 py-2 text-[10px] uppercase tracking-wider rounded-sm">
                            Detail
                        </a>
                        <a href="{{ route('order', ['essence' => $essence['number']]) }}" class="btn-gold px-3.5 py-2 text-[10px] uppercase tracking-wider rounded-sm">
                            Order
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

</div>
@endsection
