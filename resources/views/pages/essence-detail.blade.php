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
            
            {{-- Left Column: Perfume Bottle & Sacred Visual --}}
            <div class="lg:col-span-5 flex flex-col items-center justify-center text-center">
                <div class="relative w-72 h-80 sm:w-80 sm:h-96 rounded-2xl overflow-hidden border border-gold-400/30 bg-black/50 p-6 flex flex-col items-center justify-center shadow-[0_0_40px_rgba(197,160,89,0.15)] group">
                    <div class="absolute inset-0 bg-cover bg-center opacity-30 pointer-events-none" style="background-image: url('{{ asset('images/background.png') }}');"></div>
                    
                    {{-- Bottle Image --}}
                    <div class="relative z-10 w-full h-full flex items-center justify-center">
                        <img src="{{ asset($essence['bottle_image']) }}" 
                             alt="{{ $essence['essence_name'] }}" 
                             class="w-full h-full object-contain filter drop-shadow-[0_15px_30px_rgba(0,0,0,0.9)] transition-transform duration-500 group-hover:scale-105">
                    </div>

                    {{-- Top Left Floating Number Badge --}}
                    <div class="absolute top-3.5 left-3.5 z-20">
                        <span class="bg-black/80 backdrop-blur-md text-gold-400 text-xs font-mono font-bold px-3 py-1 rounded-full border border-gold-400/40 shadow">
                            No. {{ $essence['number'] }}
                        </span>
                    </div>

                    {{-- Top Right Element Badge --}}
                    <div class="absolute top-3.5 right-3.5 z-20">
                        <span class="bg-black/80 backdrop-blur-md text-gold-300 text-[10px] uppercase font-mono tracking-wider px-2.5 py-1 rounded-full border border-gold-400/30">
                            {{ $essence['element'] }}
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
                    <div class="text-sm font-serif text-gold-400 font-medium mt-1">
                        {{ $essence['name'] }}
                    </div>
                    <p class="text-gold-300 text-sm font-light mt-1">
                        {{ implode(' • ', $essence['traits']) }}
                    </p>
                </div>

                <div class="prose prose-invert text-gray-300 text-xs sm:text-sm font-light leading-relaxed">
                    <p>{{ $essence['description'] }}</p>
                    <p class="text-gray-400 italic mt-2">{{ $essence['fragrance_description'] }}</p>
                </div>

                {{-- Fragrance Pyramid --}}
                <div class="rounded-xl p-5 border border-gold-400/20 space-y-3">
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
                <div class="rounded-xl p-5 border border-gold-400/30">
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
                @php
                    $product = null;
                    try {
                        if (\Illuminate\Support\Facades\Schema::hasTable('products')) {
                            $product = \App\Models\Product::where('essence_number', $essence['number'])->first();
                        }
                    } catch (\Throwable $e) {
                        $product = null;
                    }
                @endphp
                <div class="pt-4 border-t border-gold-400/20 flex flex-wrap items-center gap-3">
                    <a href="{{ route('order', ['essence' => $essence['number']]) }}" class="btn-gold px-6 py-3.5 text-xs tracking-[0.2em] rounded-sm flex-1 text-center font-bold text-black uppercase">
                        Pesan Sekarang
                    </a>

                    <button type="button" 
                            onclick="window.addToCart({{ $product?->id ? $product->id : 'null' }}, {{ $essence['number'] }}, this)"
                            class="flex-1 btn-gold-outline px-6 py-3.5 text-xs tracking-wider rounded-sm text-center flex items-center justify-center gap-2 hover:bg-gold-400/15 transition-all font-semibold cursor-pointer">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                        </svg>
                        <span>+ Masukkan ke Peti</span>
                    </button>

                    <a href="{{ route('calculator') }}" class="w-full sm:w-auto px-4 py-3.5 text-xs tracking-wider text-gray-400 hover:text-gold-300 text-center transition-colors">
                        Cek Kecocokan Weton →
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
