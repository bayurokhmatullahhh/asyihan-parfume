@extends('layouts.app')

@section('title', 'Tentang ASYIHAN — Filosofi, Makna & Simbolisme')
@section('meta_description', 'Kisah kelahiran ASYIHAN dari tanah Sunda hingga tradisi aroma adiluhung Timur Tengah.')

@section('content')
<div class="max-w-5xl mx-auto px-4 sm:px-6 py-8">
    
    {{-- Breadcrumb & Badge --}}
    <div class="text-center mb-12">
        <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-gold-400/10 border border-gold-400/30 text-gold-300 text-xs tracking-[0.2em] uppercase mb-4">
            Filosofi & Kisah
        </div>
        <h1 class="text-3xl sm:text-5xl font-serif text-white tracking-wider glow-gold mb-3">
            TENTANG ASYIHAN
        </h1>
        <p class="text-gold-300 font-serif italic text-base sm:text-lg">
            Born from Asih. Crafted for the Soul.
        </p>
        <div class="w-24 h-0.5 bg-gradient-to-r from-transparent via-gold-400 to-transparent mx-auto mt-6"></div>
    </div>

    {{-- Main Narrative --}}
    <section class="rounded-2xl p-8 sm:p-12 border border-gold-400/20 mb-12 relative overflow-hidden">
        <div class="absolute -top-32 -left-32 w-80 h-80 bg-gold-400/5 rounded-full blur-3xl"></div>
        
        <div class="prose prose-invert max-w-none text-gray-300 font-light leading-loose space-y-6 text-sm sm:text-base">
            <p class="text-lg sm:text-xl text-gold-200 font-serif leading-relaxed italic text-center max-w-2xl mx-auto">
                "Ada hal-hal dalam hidup yang tidak dapat dilihat, tetapi dapat dirasakan.<br>
                Kasih. Rindu. Pesona. Ingatan."
            </p>

            <div class="border-t border-b border-gold-400/15 py-8 my-8 text-center max-w-3xl mx-auto">
                <p class="text-white font-serif text-base sm:text-lg tracking-wide">
                    Orang Sunda mengenalnya melalui satu kata sederhana: <span class="text-gold-400 font-bold glow-gold">ASIH</span>.
                </p>
                <p class="text-gray-400 mt-2 text-xs sm:text-sm">
                    Asih bukan sekadar mencintai. Ia adalah rasa yang membuat manusia mendekat, menjaga, mengingat, dan meninggalkan kebaikan dalam hati manusia lainnya.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 my-10 items-center">
                <div class="space-y-4">
                    <h3 class="text-xl font-serif text-gold-400 tracking-wide">Dari ASIH Menjadi ASIHAN</h3>
                    <p class="text-xs sm:text-sm text-gray-300 leading-relaxed">
                        Dari ASIH, lahirlah <strong class="text-white font-medium">ASIHAN</strong>. Sebuah kata dari tanah Sunda yang sejak lama membawa makna tentang rasa, pesona, dan daya yang membuat seseorang dikenang.
                    </p>
                    <p class="text-xs sm:text-sm text-gray-300 leading-relaxed">
                        Kemudian kami memberinya sebuah perjalanan baru: <strong class="text-gold-300">ASIHAN menjadi ASYIHAN</strong>.
                    </p>
                </div>
                <div class="border border-gold-400/20 rounded-xl p-6 text-center">
                    <div class="text-2xl sm:text-3xl font-serif text-gold-400 mb-2 whitespace-nowrap overflow-hidden"><span class="inline-block tracking-[0.15em] sm:tracking-[0.2em]">A</span> <span class="text-gold-400/40">•</span> <span class="inline-block tracking-[0.15em] sm:tracking-[0.2em]">S</span> <span class="text-gold-400/40">•</span> <span class="inline-block tracking-[0.15em] sm:tracking-[0.2em]">Y</span> <span class="text-gold-400/40">•</span> <span class="inline-block tracking-[0.15em] sm:tracking-[0.2em]">I</span> <span class="text-gold-400/40">•</span> <span class="inline-block tracking-[0.15em] sm:tracking-[0.2em]">H</span> <span class="text-gold-400/40">•</span> <span class="inline-block tracking-[0.15em] sm:tracking-[0.2em]">A</span> <span class="text-gold-400/40">•</span> <span class="inline-block tracking-[0.15em] sm:tracking-[0.2em]">N</span></div>
                    <p class="text-[11px] text-gray-400 italic">
                        Sebuah nama yang akarnya tetap berpijak di tanah Sunda, tetapi aromanya mengembara jauh menuju negeri-negeri tempat Oud dibakar, Musk diwariskan, Amber dihangatkan, dan wewangian menjadi bagian dari kehormatan serta identitas seseorang.
                    </p>
                </div>
            </div>

            <div class="space-y-4 pt-4">
                <h3 class="text-xl font-serif text-gold-400 tracking-wide">Mengapa Aroma Kita Harus Sama?</h3>
                <p class="text-xs sm:text-sm text-gray-300 leading-relaxed">
                    ASYIHAN percaya bahwa kemewahan sejati bukanlah tentang memakai aroma yang sama dengan banyak orang. Sebab setiap manusia dilahirkan berbeda.
                </p>
                <p class="text-xs sm:text-sm text-gray-300 leading-relaxed">
                    Kita datang dengan tanggal yang berbeda. Membawa angka yang berbeda. Menjalani perjalanan yang berbeda. Memiliki kekuatan, kelembutan, luka, keberanian, dan impian yang berbeda.
                </p>
                <p class="text-xs sm:text-sm text-gold-300 font-medium">
                    Di ASYIHAN, angka bukanlah sekadar angka. Ia adalah pintu untuk memahami karakter.
                </p>
            </div>
        </div>
    </section>

    {{-- Scent Translation Formula --}}
    <section class="rounded-2xl p-8 sm:p-10 border border-gold-400/20 mb-12">
        <div class="text-center mb-8">
            <span class="text-xs uppercase tracking-[0.25em] text-gold-400 font-serif">The Olfactory Translation</span>
            <h2 class="text-2xl font-serif text-white tracking-wide mt-1">Karakter Diterjemahkan Menjadi Aroma</h2>
            <p class="text-gray-400 text-xs mt-2">Setiap elemen alam merepresentasikan kedalaman jiwa manusia.</p>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
            <div class="p-4 rounded-xl border border-gold-400/15 text-center">
                <span class="text-2xl mb-2 block text-gold-400">
                    <svg class="w-8 h-8 mx-auto" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.2">
                        <path d="M4 20c0 0 2-4 4-8s2-8 4-8c2 0 2 4 4 8s4 8 4 8" stroke-linecap="round"/>
                        <path d="M6 18c1-2 2-5 3-8" stroke-linecap="round" opacity="0.4"/>
                        <path d="M14 10c1 3 2 6 3 8" stroke-linecap="round" opacity="0.4"/>
                        <line x1="4" y1="20" x2="20" y2="20" stroke-linecap="round" opacity="0.5"/>
                    </svg>
                </span>
                <h4 class="font-serif text-gold-300 text-sm">KAYU</h4>
                <p class="text-[11px] text-gray-400 mt-1">Untuk Keteguhan & Ketabahan</p>
            </div>
            <div class="p-4 rounded-xl border border-gold-400/15 text-center">
                <span class="text-2xl mb-2 block text-gold-400">
                    <svg class="w-8 h-8 mx-auto" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.2">
                        <path d="M12 2c0 0-4 4-4 8a4 4 0 008 0c0-4-4-8-4-8z" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M9 18c0 0 0.5-2 3-2s3 2 3 2" stroke-linecap="round" opacity="0.5"/>
                        <path d="M12 14v4" stroke-linecap="round" opacity="0.3"/>
                        <path d="M8 20c0 1.1 1.8 2 4 2s4-.9 4-2" stroke-linecap="round" opacity="0.6"/>
                    </svg>
                </span>
                <h4 class="font-serif text-gold-300 text-sm">OUD</h4>
                <p class="text-[11px] text-gray-400 mt-1">Untuk Kedalaman & Spiritual</p>
            </div>
            <div class="p-4 rounded-xl border border-gold-400/15 text-center">
                <span class="text-2xl mb-2 block text-gold-400">
                    <svg class="w-8 h-8 mx-auto" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.2">
                        <circle cx="12" cy="12" r="5" stroke-linecap="round"/>
                        <circle cx="12" cy="12" r="2" opacity="0.5"/>
                        <path d="M12 2v3m0 14v3M2 12h3m14 0h3" stroke-linecap="round" opacity="0.4"/>
                        <path d="M5.64 5.64l2.12 2.12m8.48 8.48l2.12 2.12M5.64 18.36l2.12-2.12m8.48-8.48l2.12-2.12" stroke-linecap="round" opacity="0.25"/>
                    </svg>
                </span>
                <h4 class="font-serif text-gold-300 text-sm">AMBER</h4>
                <p class="text-[11px] text-gray-400 mt-1">Untuk Kehangatan & Daya Tarik</p>
            </div>
            <div class="p-4 rounded-xl border border-gold-400/15 text-center">
                <span class="text-2xl mb-2 block text-gold-400">
                    <svg class="w-8 h-8 mx-auto" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.2">
                        <path d="M12 3c-3 0-6 3-6 7 0 5 3 8 6 11 3-3 6-6 6-11 0-4-3-7-6-7z" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M12 7v8" stroke-linecap="round" opacity="0.3"/>
                        <path d="M9 11c0 0 1.5 1 3 1s3-1 3-1" stroke-linecap="round" opacity="0.4"/>
                    </svg>
                </span>
                <h4 class="font-serif text-gold-300 text-sm">MUSK</h4>
                <p class="text-[11px] text-gray-400 mt-1">Untuk Keintiman & Memori</p>
            </div>
            <div class="p-4 rounded-xl border border-gold-400/15 text-center">
                <span class="text-2xl mb-2 block text-gold-400">
                    <svg class="w-8 h-8 mx-auto" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.2">
                        <path d="M12 22c-2 0-4-1-5-3" stroke-linecap="round" opacity="0.5"/>
                        <path d="M7 19c-1-2-1-5 0-7" stroke-linecap="round" opacity="0.5"/>
                        <path d="M7 12c0-3 2-6 5-8" stroke-linecap="round"/>
                        <path d="M12 4c1 2 2 4 2 6" stroke-linecap="round" opacity="0.6"/>
                        <path d="M14 10c0 2-0.5 4-2 6" stroke-linecap="round" opacity="0.4"/>
                        <path d="M16 8c1 1 2 3 2 5s-1 4-2 6" stroke-linecap="round" opacity="0.35"/>
                    </svg>
                </span>
                <h4 class="font-serif text-gold-300 text-sm">REMPAH</h4>
                <p class="text-[11px] text-gray-400 mt-1">Untuk Keberanian & Semangat</p>
            </div>
            <div class="p-4 rounded-xl border border-gold-400/15 text-center">
                <span class="text-2xl mb-2 block text-gold-400">
                    <svg class="w-8 h-8 mx-auto" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.2">
                        <path d="M12 3c-1.5 2-3 4-3 6.5C9 12 10.3 14 12 14s3-2 3-4.5C15 7 13.5 5 12 3z" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M7 10c-2 1-3.5 3-3.5 5.5 0 3.5 3.8 5.5 8.5 5.5s8.5-2 8.5-5.5c0-2.5-1.5-4.5-3.5-5.5" stroke-linecap="round" opacity="0.5"/>
                        <path d="M9 15c0 0 1.2 1 3 1s3-1 3-1" stroke-linecap="round" opacity="0.3"/>
                    </svg>
                </span>
                <h4 class="font-serif text-gold-300 text-sm">BUNGA</h4>
                <p class="text-[11px] text-gray-400 mt-1">Untuk Kelembutan & Kasih Sayang</p>
            </div>
        </div>
    </section>

    {{-- Logo Philosophy --}}
    <section class="rounded-2xl p-8 sm:p-10 border border-gold-400/20 mb-12">
        <div class="text-center mb-8">
            <span class="text-xs uppercase tracking-[0.25em] text-gold-400 font-serif">Sacred Geometry</span>
            <h2 class="text-2xl font-serif text-white tracking-wide mt-1">Simbol & Filosofi Logo ASYIHAN</h2>
            <div class="w-16 h-0.5 bg-gold-400/40 mx-auto my-3"></div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="flex gap-4 p-4 rounded-xl border border-gold-400/10">
                <div class="w-12 h-12 rounded-full border border-gold-400/40 flex items-center justify-center shrink-0 font-serif text-gold-400 text-lg">
                    A
                </div>
                <div>
                    <h4 class="font-serif text-white text-sm">Huruf A — Awal & Authenticity</h4>
                    <p class="text-xs text-gray-400 font-light mt-1">
                        Simbol perjalanan menemukan diri sendiri, keberanian untuk menjadi autentik dan merintis babak kehidupan baru.
                    </p>
                </div>
            </div>

            <div class="flex gap-4 p-4 rounded-xl border border-gold-400/10">
                <div class="w-12 h-12 rounded-full border border-gold-400/40 flex items-center justify-center shrink-0 font-serif text-gold-400 text-lg">
                    ◯
                </div>
                <div>
                    <h4 class="font-serif text-white text-sm">Lingkaran — Keutuhan Diri</h4>
                    <p class="text-xs text-gray-400 font-light mt-1">
                        Menggambarkan keutuhan diri, siklus kehidupan yang tanpa awal dan akhir, serta harmoni batin yang tak terputus.
                    </p>
                </div>
            </div>

            <div class="flex gap-4 p-4 rounded-xl border border-gold-400/10">
                <div class="w-12 h-12 rounded-full border border-gold-400/40 flex items-center justify-center shrink-0 font-serif text-gold-400 text-sm">
                    1-9
                </div>
                <div>
                    <h4 class="font-serif text-white text-sm">Angka 1–9 — Sembilan Arketipe</h4>
                    <p class="text-xs text-gray-400 font-light mt-1">
                        Sembilan pola dasar karakter manusia yang menjadi fondasi personalisasi wewangian ASYIHAN.
                    </p>
                </div>
            </div>

            <div class="flex gap-4 p-4 rounded-xl border border-gold-400/10">
                <div class="w-12 h-12 rounded-full border border-gold-400/40 flex items-center justify-center shrink-0 font-serif text-gold-400 text-sm">
                    ✦
                </div>
                <div>
                    <h4 class="font-serif text-white text-sm">Sentuhan Emas — Nilai Abadi</h4>
                    <p class="text-xs text-gray-400 font-light mt-1">
                        Menggambarkan sesuatu yang bernilai, personal, dan timeless: setiap manusia mempunyai kemewahan batinnya sendiri.
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- Brand Manifesto / Outro --}}
    <section class="text-center py-12 border-t border-b border-gold-400/20 my-8">
        <h3 class="text-2xl font-serif text-gold-400 tracking-[0.25em] mb-4 glow-gold">
            THE ESSENCE OF YOU
        </h3>
        <p class="text-gray-300 text-sm max-w-xl mx-auto font-light leading-relaxed mb-6">
            Diciptakan bukan untuk membuatmu menjadi orang lain.<br>
            Tetapi untuk mengingatkan dunia tentang siapa dirimu.
        </p>
        <div class="flex justify-center gap-4">
            <a href="{{ route('calculator') }}" class="btn-gold px-7 py-3 text-xs tracking-widest rounded-sm">
                Hitung Angka Intimu
            </a>
            <a href="{{ route('collection') }}" class="btn-gold-outline px-6 py-3 text-xs tracking-widest rounded-sm">
                Jelajahi Koleksi
            </a>
        </div>
    </section>

</div>
@endsection
