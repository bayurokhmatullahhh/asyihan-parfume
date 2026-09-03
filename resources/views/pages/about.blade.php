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
    <section class="bg-panel rounded-2xl p-8 sm:p-12 border border-gold-400/20 mb-12 relative overflow-hidden">
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
                <div class="bg-black/50 border border-gold-400/20 rounded-xl p-6 text-center">
                    <div class="text-3xl font-serif text-gold-400 mb-2">A • S • Y • I • H • A • N</div>
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
    <section class="bg-panel rounded-2xl p-8 sm:p-10 border border-gold-400/20 mb-12">
        <div class="text-center mb-8">
            <span class="text-xs uppercase tracking-[0.25em] text-gold-400 font-serif">The Olfactory Translation</span>
            <h2 class="text-2xl font-serif text-white tracking-wide mt-1">Karakter Diterjemahkan Menjadi Aroma</h2>
            <p class="text-gray-400 text-xs mt-2">Setiap elemen alam merepresentasikan kedalaman jiwa manusia.</p>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
            <div class="p-4 bg-black/40 rounded-xl border border-white/5 text-center">
                <span class="text-2xl mb-2 block">🪵</span>
                <h4 class="font-serif text-gold-300 text-sm">KAYU</h4>
                <p class="text-[11px] text-gray-400 mt-1">Untuk Keteguhan & Ketabahan</p>
            </div>
            <div class="p-4 bg-black/40 rounded-xl border border-white/5 text-center">
                <span class="text-2xl mb-2 block">🏺</span>
                <h4 class="font-serif text-gold-300 text-sm">OUD</h4>
                <p class="text-[11px] text-gray-400 mt-1">Untuk Kedalaman & Spiritual</p>
            </div>
            <div class="p-4 bg-black/40 rounded-xl border border-white/5 text-center">
                <span class="text-2xl mb-2 block">✨</span>
                <h4 class="font-serif text-gold-300 text-sm">AMBER</h4>
                <p class="text-[11px] text-gray-400 mt-1">Untuk Kehangatan & Daya Tarik</p>
            </div>
            <div class="p-4 bg-black/40 rounded-xl border border-white/5 text-center">
                <span class="text-2xl mb-2 block">🕊️</span>
                <h4 class="font-serif text-gold-300 text-sm">MUSK</h4>
                <p class="text-[11px] text-gray-400 mt-1">Untuk Keintiman & Memori</p>
            </div>
            <div class="p-4 bg-black/40 rounded-xl border border-white/5 text-center">
                <span class="text-2xl mb-2 block">🌿</span>
                <h4 class="font-serif text-gold-300 text-sm">REMPAH</h4>
                <p class="text-[11px] text-gray-400 mt-1">Untuk Keberanian & Semangat</p>
            </div>
            <div class="p-4 bg-black/40 rounded-xl border border-white/5 text-center">
                <span class="text-2xl mb-2 block">🌸</span>
                <h4 class="font-serif text-gold-300 text-sm">BUNGA</h4>
                <p class="text-[11px] text-gray-400 mt-1">Untuk Kelembutan & Kasih Sayang</p>
            </div>
        </div>
    </section>

    {{-- Logo Philosophy --}}
    <section class="bg-panel rounded-2xl p-8 sm:p-10 border border-gold-400/20 mb-12">
        <div class="text-center mb-8">
            <span class="text-xs uppercase tracking-[0.25em] text-gold-400 font-serif">Sacred Geometry</span>
            <h2 class="text-2xl font-serif text-white tracking-wide mt-1">Simbol & Filosofi Logo ASYIHAN</h2>
            <div class="w-16 h-0.5 bg-gold-400/40 mx-auto my-3"></div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="flex gap-4 p-4 bg-black/30 rounded-xl border border-gold-400/10">
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

            <div class="flex gap-4 p-4 bg-black/30 rounded-xl border border-gold-400/10">
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

            <div class="flex gap-4 p-4 bg-black/30 rounded-xl border border-gold-400/10">
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

            <div class="flex gap-4 p-4 bg-black/30 rounded-xl border border-gold-400/10">
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
