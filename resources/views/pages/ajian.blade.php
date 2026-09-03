@extends('layouts.app')

@section('title', 'Ajian & Ritual Penggunaan — ASYIHAN')
@section('meta_description', 'Panduan sakral mantra afirmasi dan tata cara penggunaan wewangian ASYIHAN untuk memaksimalkan daya pesona batin.')

@section('content')
<div class="max-w-5xl mx-auto px-4 sm:px-6 py-8">

    {{-- Header --}}
    <div class="text-center mb-12">
        <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-gold-400/10 border border-gold-400/30 text-gold-300 text-xs tracking-[0.2em] uppercase mb-4">
            Mantra & Afirmasi Jiwa
        </div>
        <h1 class="text-3xl sm:text-5xl font-serif text-white tracking-wider glow-gold mb-3">
            AJIAN & RITUAL
        </h1>
        <p class="text-gold-300 font-serif italic text-base sm:text-lg">
            Mengikat Niat, Membangkitkan Esensi, Menyatu dengan Aroma
        </p>
        <div class="w-24 h-0.5 bg-gradient-to-r from-transparent via-gold-400 to-transparent mx-auto mt-6"></div>
    </div>

    {{-- Concept Introduction --}}
    <section class="bg-panel rounded-2xl p-8 sm:p-10 border border-gold-400/20 mb-12 relative overflow-hidden">
        <div class="prose prose-invert max-w-none text-gray-300 font-light leading-relaxed space-y-4 text-xs sm:text-sm">
            <h2 class="text-xl font-serif text-gold-400 tracking-wide mb-2">Makna Ajian di ASYIHAN</h2>
            <p>
                Ajian di ASYIHAN bukanlah ilmu hitam atau mantra mistis yang mengikat. Ia adalah <em>Afirmasi Sakral</em> — pengingat batin tentang hakikat diri dan kekuatan yang dianugerahkan Sang Maha Pencipta pada setiap angka kelahiran kita.
            </p>
            <p>
                Ketika aroma terhirup oleh indra penciuman dan dihantarkan ke sistem limbik otak (pusat memori dan emosi), kata-kata ajian yang diucapkan dalam hati akan mengunci niat baik tersebut, mengubah wewangian menjadi perisai dan pesona yang tak kasat mata.
            </p>

            <div class="bg-black/50 border border-gold-400/20 rounded-xl p-6 my-6 grid grid-cols-1 md:grid-cols-3 gap-4 text-center">
                <div>
                    <span class="text-gold-400 font-serif text-xl block mb-1">1. Heningkan Batin</span>
                    <p class="text-[11px] text-gray-400">Tarik napas dalam 3 kali sebelum menyemprotkan esensi.</p>
                </div>
                <div>
                    <span class="text-gold-400 font-serif text-xl block mb-1">2. Lafalkan Ajian</span>
                    <p class="text-[11px] text-gray-400">Ucapkan mantra afirmasi dengan penuh keyakinan dan keikhlasan.</p>
                </div>
                <div>
                    <span class="text-gold-400 font-serif text-xl block mb-1">3. Semprot di Titik Sakral</span>
                    <p class="text-[11px] text-gray-400">Aplikasikan pada titik nadi sesuai panduan arketipemu.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- List of 9 Ajian & Rituals --}}
    <section class="space-y-6 mb-16">
        <h3 class="text-2xl font-serif text-gold-400 text-center tracking-widest uppercase mb-8">
            9 Ajian Arketipe
        </h3>

        <div class="grid grid-cols-1 gap-6">
            @foreach($archetypes as $essence)
                <div class="bg-panel rounded-2xl p-6 sm:p-8 border border-gold-400/20 hover:border-gold-400/50 transition-all relative overflow-hidden group">
                    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 pb-4 border-b border-white/5 mb-4">
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 rounded-full border border-gold-400/40 flex items-center justify-center font-serif text-gold-400 text-xl font-bold group-hover:bg-gold-400 group-hover:text-black transition-all">
                                {{ $essence['number'] }}
                            </div>
                            <div>
                                <h4 class="text-lg font-serif text-white group-hover:text-gold-200">
                                    {{ $essence['essence_name'] }}
                                </h4>
                                <span class="text-xs text-gold-400/80">{{ implode(' • ', $essence['traits']) }}</span>
                            </div>
                        </div>
                        <span class="text-[10px] uppercase tracking-widest px-3 py-1 rounded bg-black/60 border border-gold-400/20 text-gold-300">
                            Elemen {{ $essence['element'] }}
                        </span>
                    </div>

                    {{-- Ajian Content --}}
                    <div class="bg-black/60 rounded-xl p-5 border border-gold-400/25 mb-4">
                        <span class="text-[10px] uppercase tracking-[0.25em] text-gold-400 font-serif block mb-1.5">Lafal Ajian:</span>
                        <p class="text-sm sm:text-base font-serif italic text-gold-200 leading-relaxed">
                            "{{ $essence['ajian'] }}"
                        </p>
                    </div>

                    {{-- Sugesti Penggunaan --}}
                    <div class="text-xs text-gray-300 space-y-1">
                        <strong class="text-gold-300 font-medium block">Tata Cara & Sugesti:</strong>
                        <p class="text-gray-400 font-light leading-relaxed">{{ $essence['sugesti'] }}</p>
                    </div>

                    <div class="mt-4 pt-4 border-t border-white/5 flex justify-end">
                        <a href="{{ route('essence.detail', $essence['slug']) }}" class="text-xs text-gold-400 hover:text-white uppercase tracking-widest flex items-center gap-1">
                            Lihat Esensi {{ $essence['number'] }} &rarr;
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

</div>
@endsection
