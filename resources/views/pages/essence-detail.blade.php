@extends('layouts.app')

@section('title', $essence['essence_name'] . ' — ASYIHAN')
@section('meta_description', $essence['description'])

@section('content')
<div class="max-w-6xl mx-auto px-4 sm:px-6 py-8">

    {{-- Back Link --}}
    <div class="mb-8">
        <a href="{{ route('collection') }}" class="inline-flex items-center gap-2 text-xs text-gold-400 uppercase tracking-widest hover:text-white transition-colors">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
            </svg>
            Kembali ke Koleksi
        </a>
    </div>

    {{-- Main Product Detail Card --}}
    <div class="bg-panel rounded-2xl p-6 sm:p-10 border border-gold-400/30 box-glow mb-12 relative overflow-hidden">
        <div class="absolute -top-32 -right-32 w-96 h-96 bg-gold-400/10 rounded-full blur-3xl pointer-events-none"></div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-start">
            
            {{-- Left Column: Sacred Emblem & Mandala Visual --}}
            <div class="lg:col-span-5 flex flex-col items-center justify-center text-center">
                <div class="relative w-72 h-72 sm:w-80 sm:h-80 flex items-center justify-center my-4">
                    {{-- Spinning Outer Ring --}}
                    <div class="absolute inset-0 border border-gold-400/30 rounded-full animate-spin-slow"></div>
                    <div class="absolute inset-4 border border-gold-400/20 border-dashed rounded-full animate-spin-reverse"></div>
                    
                    {{-- Center Emblem --}}
                    <div class="w-48 h-48 rounded-full bg-gradient-to-b from-dark-300 to-black border-2 border-gold-400 flex flex-col items-center justify-center p-6 shadow-2xl animate-pulse-gold">
                        <span class="text-5xl font-serif text-gold-400 font-bold glow-gold">
                            {{ $essence['number'] }}
                        </span>
                        <span class="text-xs uppercase tracking-[0.25em] text-white font-serif mt-2">
                            {{ $essence['name'] }}
                        </span>
                        <span class="text-[10px] uppercase tracking-widest text-gold-300/80 mt-1">
                            Elemen {{ $essence['element'] }}
                        </span>
                    </div>
                </div>

                {{-- Price Tag --}}
                <div class="mt-6 text-center">
                    <span class="text-xs text-gray-500 uppercase tracking-widest block mb-1">Mahar & Investasi</span>
                    <span class="text-2xl sm:text-3xl font-serif text-white font-semibold glow-gold">
                        Rp {{ number_format($essence['price'], 0, ',', '.') }}
                    </span>
                    <span class="text-[11px] text-gray-400 block mt-1">Eau de Parfum • 50ml / 1.7 fl.oz</span>
                </div>
            </div>

            {{-- Right Column: Information, Fragrance Pyramid, Ritual & Order --}}
            <div class="lg:col-span-7 space-y-6">
                <div>
                    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-gold-400/10 border border-gold-400/30 text-gold-300 text-[11px] tracking-widest uppercase mb-3">
                        Sacred Essence #{{ $essence['number'] }}
                    </div>
                    <h1 class="text-2xl sm:text-4xl font-serif text-white tracking-wide glow-gold">
                        {{ $essence['essence_name'] }}
                    </h1>
                    <p class="text-gold-300 text-sm font-light mt-1">
                        {{ implode(' • ', $essence['traits']) }}
                    </p>
                </div>

                <div class="prose prose-invert text-gray-300 text-xs sm:text-sm font-light leading-relaxed">
                    <p>{{ $essence['description'] }}</p>
                    <p class="text-gray-400 italic mt-2">{{ $essence['fragrance_description'] }}</p>
                </div>

                {{-- Fragrance Pyramid --}}
                <div class="bg-black/50 rounded-xl p-5 border border-gold-400/20 space-y-3">
                    <h3 class="font-serif text-gold-400 text-xs uppercase tracking-[0.2em]">Piramida Aroma</h3>
                    <div class="space-y-2 text-xs">
                        <div class="flex items-center justify-between pb-2 border-b border-white/5">
                            <span class="text-gold-400/80 font-medium">Top Notes</span>
                            <span class="text-gray-300">{{ $essence['notes']['top'] }}</span>
                        </div>
                        <div class="flex items-center justify-between pb-2 border-b border-white/5">
                            <span class="text-gold-400/80 font-medium">Middle Notes</span>
                            <span class="text-gray-300">{{ $essence['notes']['middle'] }}</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-gold-400/80 font-medium">Base Notes</span>
                            <span class="text-gray-300">{{ $essence['notes']['base'] }}</span>
                        </div>
                    </div>
                </div>

                {{-- Ajian (Mantra) Section --}}
                <div class="bg-black/70 rounded-xl p-5 border border-gold-400/30">
                    <span class="text-[10px] uppercase tracking-[0.25em] text-gold-400 font-serif block mb-2">Ajian Afirmasi Jiwa</span>
                    <p class="text-xs sm:text-sm text-gold-200 font-serif italic leading-relaxed">
                        "{{ $essence['ajian'] }}"
                    </p>
                </div>

                {{-- Sugesti & Ritual Penggunaan --}}
                <div class="bg-panel rounded-xl p-4 border border-white/10 text-xs text-gray-400 space-y-1">
                    <strong class="text-white font-medium block">Ritual Penggunaan:</strong>
                    <p class="leading-relaxed">{{ $essence['sugesti'] }}</p>
                </div>

                {{-- Order Action --}}
                <div class="pt-4 border-t border-gold-400/20 flex flex-wrap gap-4">
                    <a href="{{ route('order', ['essence' => $essence['number']]) }}" class="btn-gold px-8 py-3.5 text-xs tracking-[0.2em] rounded-sm flex-1 text-center">
                        Order Essence {{ $essence['number'] }} Sekarang
                    </a>
                    <a href="{{ route('calculator') }}" class="btn-gold-outline px-6 py-3.5 text-xs tracking-wider rounded-sm text-center">
                        Cek Kecocokan Tanggal Lahir
                    </a>
                </div>

            </div>

        </div>
    </div>

    {{-- Other Essences --}}
    <section class="mt-16">
        <h3 class="text-xl font-serif text-gold-400 uppercase tracking-widest text-center mb-8">
            Esensi Sakral Lainnya
        </h3>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4">
            @foreach($allEssences as $other)
                @if($other['number'] !== $essence['number'])
                    <a href="{{ route('essence.detail', $other['slug']) }}" class="bg-panel rounded-xl p-4 border border-gold-400/20 hover:border-gold-400/70 transition-all text-center group">
                        <span class="text-2xl font-serif text-gold-400 font-bold block mb-1 group-hover:glow-gold">{{ $other['number'] }}</span>
                        <h4 class="text-xs font-serif text-white uppercase tracking-wider group-hover:text-gold-200">{{ $other['name'] }}</h4>
                        <p class="text-[10px] text-gray-500 mt-1">{{ $other['element'] }}</p>
                    </a>
                @endif
            @endforeach
        </div>
    </section>

</div>
@endsection
