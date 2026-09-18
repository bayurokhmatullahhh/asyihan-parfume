@extends('layouts.app')

@section('title', 'Pemesanan Sakral — ASYIHAN Haute Parfumerie')
@section('meta_description', 'Koleksi Mahakarya & Pemesanan Sakral. Pilih esensi personalmu dan selesaikan pemesanan langsung terintegrasi WhatsApp.')

@section('content')
<div class="max-w-6xl mx-auto px-4 sm:px-6 py-6 sm:py-10">

    {{-- ========================================================================= --}}
    {{-- VIEW 1: CATALOG COLLECTION GRID ("KOLEKSI MAHAKARYA & PEMESANAN SAKRAL") --}}
    {{-- ========================================================================= --}}
    <div id="view-catalog" class="transition-all duration-500">

        {{-- Hero Title Section --}}
        <div class="text-center mb-10">
            <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-gold-400/10 border border-gold-400/30 text-gold-300 text-xs tracking-[0.2em] font-mono uppercase mb-4 shadow-[0_0_15px_rgba(197,160,89,0.15)]">
                ✦ THE SACRED SANCTUM OF SCENT ✦
            </div>
            <h1 class="text-3xl sm:text-5xl font-serif font-bold text-white tracking-wider glow-gold mb-4 uppercase">
                KOLEKSI MAHAKARYA & PEMESANAN SAKRAL
            </h1>
            <p class="text-gray-300 font-light text-sm sm:text-base lg:text-lg max-w-2xl mx-auto leading-relaxed italic">
                "Setiap tetes wewangian direcik dengan getaran alkimia murni — dari Extrait de Parfum tubuh berfrekuensi jiwa hingga penyelarasan atmosfer ruangan dan sanggar sakral."
            </p>
            <div class="w-32 h-0.5 bg-gradient-to-r from-transparent via-gold-400 to-transparent mx-auto mt-6"></div>
        </div>

        {{-- Filter Category Pills --}}
        <div class="flex flex-wrap justify-center items-center gap-2 sm:gap-3 mb-8 text-xs font-mono">
            <button type="button" onclick="filterCatalog('all')" id="filter-all" class="filter-btn px-4 py-2 rounded-full border border-gold-400 bg-gold-400 text-black font-semibold shadow-[0_0_15px_rgba(197,160,89,0.4)] transition-all">
                SEMUA KOLEKSI (ALL OFFERINGS)
            </button>
            <button type="button" onclick="filterCatalog('extrait')" id="filter-extrait" class="filter-btn px-4 py-2 rounded-full border border-gold-400/20 bg-black/60 text-gold-300/80 hover:border-gold-400/60 hover:text-gold-200 transition-all">
                EXTRAIT DE PARFUM (BODY SIGNATURE)
            </button>
            <button type="button" onclick="filterCatalog('sanctuary')" id="filter-sanctuary" class="filter-btn px-4 py-2 rounded-full border border-gold-400/20 bg-black/60 text-gold-300/80 hover:border-gold-400/60 hover:text-gold-200 transition-all">
                RUANGAN & SANCTUARY (ROOM & SPACE MIST)
            </button>
            <button type="button" onclick="filterCatalog('diffuser')" id="filter-diffuser" class="filter-btn px-4 py-2 rounded-full border border-gold-400/20 bg-black/60 text-gold-300/80 hover:border-gold-400/60 hover:text-gold-200 transition-all">
                REED DIFFUSER (ALIRAN DIFFUSER)
            </button>
            <button type="button" onclick="filterCatalog('botanik')" id="filter-botanik" class="filter-btn px-4 py-2 rounded-full border border-gold-400/20 bg-black/60 text-gold-300/80 hover:border-gold-400/60 hover:text-gold-200 transition-all">
                UJI RITUAL & SETA BOTANIK
            </button>
        </div>

        {{-- Grid Sub-header --}}
        <div class="flex items-center justify-between border-b border-gold-400/20 pb-3 mb-8 text-xs font-mono tracking-widest text-gold-400">
            <div class="flex items-center gap-2">
                <span>❖</span>
                <span class="uppercase">MAHAKARYA PILIHAN TAKDIR</span>
            </div>
            <div id="catalog-count" class="text-gray-400 text-[11px]">
                MENAMPILKAN 6 FORMULA MISTIK
            </div>
        </div>

        @php
            $catalogItems = [
                [
                    'id' => 7,
                    'category' => 'extrait',
                    'badge_left' => 'EXTRAIT PUR 35%',
                    'badge_right' => 'EKSTRAK SAKRAL NO. 7',
                    'label' => 'NUMEROLOGI JIWA 7',
                    'title' => 'Essence VII - The Seeker',
                    'desc' => 'Gaharu Singkil, Melati Keraton, & Cendana Mistik. Membangkitkan petunjuk & kebijaksanaan batin.',
                    'specs' => ['50ML FLACON', '30ML GRAND'],
                    'price' => 350000,
                    'image' => asset('images/bottle/bottle_7.jpg'),
                    'short_notes' => '50ml Extrait de Parfum • Konsentrasi 35%',
                ],
                [
                    'id' => 101,
                    'category' => 'sanctuary',
                    'badge_left' => 'AROMATIK INTENSIF',
                    'badge_right' => 'RUANGAN & SANCTUARY',
                    'label' => 'PEMERSIH SAKRAL',
                    'title' => 'Sanctuary Mist - Hening Dugo',
                    'desc' => 'Gaharu, Kemuning Putih, & Cendana Nusa Penida. Menyucikan aura buana dan mengundang ketenangan sanggar.',
                    'specs' => ['100ML GLASS', 'PISAH BOTOL'],
                    'price' => 350000,
                    'image' => asset('images/bottle/bottle_2.jpg'),
                    'short_notes' => '100ml Room & Space Mist Purifier',
                ],
                [
                    'id' => 102,
                    'category' => 'diffuser',
                    'badge_left' => 'KETAHANAN 30 HARI',
                    'badge_right' => 'DIFFUSER SAKRAL',
                    'label' => 'ALIRAN RITUAL',
                    'title' => 'Reed Diffuser - Asih Rembulan',
                    'desc' => 'Melati Putih Malam, Kayu Cendana Pasang, & Kamboja Madu. Penjaga ketenangan ruang meditasi dan kamar peraduan.',
                    'specs' => ['150ML + BOTANICAL'],
                    'price' => 350000,
                    'image' => asset('images/bottle/bottle_3.jpg'),
                    'short_notes' => '150ml Reed Diffuser & Botanical Sticks',
                ],
                [
                    'id' => 103,
                    'category' => 'botanik',
                    'badge_left' => 'LILIN SATU MALAM',
                    'badge_right' => 'LILIN RITUAL',
                    'label' => 'PETUNJUK JIWA',
                    'title' => 'Lilin Sakral - Kemurnian Surya',
                    'desc' => 'Lilin Kedelai 200g, dalam bejana tembikar hitam berukir mantra kuno. Bergamot, Cendana, & Kapulaga.',
                    'specs' => ['220G BEJANA KERAMIK'],
                    'price' => 350000,
                    'image' => asset('images/bottle/bottle_4.jpg'),
                    'short_notes' => '220g Scented Soy Candle Keramik Hitam',
                ],
                [
                    'id' => 1,
                    'category' => 'extrait',
                    'badge_left' => 'EXTRAIT PUR 35%',
                    'badge_right' => 'MAHAKARYA NO. 1',
                    'label' => 'NUMEROLOGI JIWA 1',
                    'title' => 'Essence I - The Leader',
                    'desc' => 'Bergamot Cirebon, Black Pepper, & Resin Cedarwood. Membangkitkan aura kepemimpinan dan ketegasan aura.',
                    'specs' => ['50ML FLACON'],
                    'price' => 350000,
                    'image' => asset('images/bottle/bottle_1.png'),
                    'short_notes' => '50ml Extrait de Parfum • Konsentrasi 35%',
                ],
                [
                    'id' => 104,
                    'category' => 'botanik',
                    'badge_left' => '3 VARIANT PEMULA',
                    'badge_right' => 'DISCOVERY SET',
                    'label' => 'TRILOGI ESSENCE',
                    'title' => 'Sacred Travel Discovery Set',
                    'desc' => 'Set berisi 3 vial esensi (3 x 10ml) pilihan pemenang. Anda selain tidak ragu memutar berbaur intrik mistik.',
                    'specs' => ['3 X 10ML DISCOVERY SET'],
                    'price' => 350000,
                    'image' => asset('images/bottle/bottle_5.jpg'),
                    'short_notes' => '3 x 10ml Sacred Discovery Vials',
                ],
                [
                    'id' => 2,
                    'category' => 'extrait',
                    'badge_left' => 'EXTRAIT PUR 35%',
                    'badge_right' => 'MAHAKARYA NO. 2',
                    'label' => 'NUMEROLOGI JIWA 2',
                    'title' => 'Essence II - The Mediator',
                    'desc' => 'Pear, Peony, & White Musk. Menghubungkan hati, menghadirkan rasa aman dan kedamaian.',
                    'specs' => ['50ML FLACON'],
                    'price' => 350000,
                    'image' => asset('images/bottle/bottle_2.jpg'),
                    'short_notes' => '50ml Extrait de Parfum • Konsentrasi 35%',
                ],
                [
                    'id' => 3,
                    'category' => 'extrait',
                    'badge_left' => 'EXTRAIT PUR 35%',
                    'badge_right' => 'MAHAKARYA NO. 3',
                    'label' => 'NUMEROLOGI JIWA 3',
                    'title' => 'Essence III - The Creator',
                    'desc' => 'Lemon, Neroli, & Vanilla. Membangkitkan ide, ekspresi, dan keceriaan jiwa.',
                    'specs' => ['50ML FLACON'],
                    'price' => 350000,
                    'image' => asset('images/bottle/bottle_3.jpg'),
                    'short_notes' => '50ml Extrait de Parfum • Konsentrasi 35%',
                ],
                [
                    'id' => 4,
                    'category' => 'extrait',
                    'badge_left' => 'EXTRAIT PUR 35%',
                    'badge_right' => 'MAHAKARYA NO. 4',
                    'label' => 'NUMEROLOGI JIWA 4',
                    'title' => 'Essence IV - The Builder',
                    'desc' => 'Bergamot, Lavender, & Cedarwood. Fondasi disiplin, stabilitas, dan keteraturan.',
                    'specs' => ['50ML FLACON'],
                    'price' => 350000,
                    'image' => asset('images/bottle/bottle_4.jpg'),
                    'short_notes' => '50ml Extrait de Parfum • Konsentrasi 35%',
                ],
                [
                    'id' => 5,
                    'category' => 'extrait',
                    'badge_left' => 'EXTRAIT PUR 35%',
                    'badge_right' => 'MAHAKARYA NO. 5',
                    'label' => 'NUMEROLOGI JIWA 5',
                    'title' => 'Essence V - The Adventurer',
                    'desc' => 'Bergamot, Marine Accord, & Ambergris. Kebebasan, petualangan, dan eksplorasi kemungkinan baru.',
                    'specs' => ['50ML FLACON'],
                    'price' => 350000,
                    'image' => asset('images/bottle/bottle_5.jpg'),
                    'short_notes' => '50ml Extrait de Parfum • Konsentrasi 35%',
                ],
                [
                    'id' => 6,
                    'category' => 'extrait',
                    'badge_left' => 'EXTRAIT PUR 35%',
                    'badge_right' => 'MAHAKARYA NO. 6',
                    'label' => 'NUMEROLOGI JIWA 6',
                    'title' => 'Essence VI - The Nurturer',
                    'desc' => 'Bergamot, Jasmine, & Sandalwood. Kasih sayang, perlindungan, dan penyembuhan jiwa.',
                    'specs' => ['50ML FLACON'],
                    'price' => 350000,
                    'image' => asset('images/bottle/bottle_6.jpg'),
                    'short_notes' => '50ml Extrait de Parfum • Konsentrasi 35%',
                ],
                [
                    'id' => 8,
                    'category' => 'extrait',
                    'badge_left' => 'EXTRAIT PUR 35%',
                    'badge_right' => 'MAHAKARYA NO. 8',
                    'label' => 'NUMEROLOGI JIWA 8',
                    'title' => 'Essence VIII - The Achiever',
                    'desc' => 'Bergamot, Black Pepper, & Sandalwood. Visi strategis, kewibawaan, dan kelimpahan.',
                    'specs' => ['50ML FLACON'],
                    'price' => 350000,
                    'image' => asset('images/bottle/bottle_8.jpg'),
                    'short_notes' => '50ml Extrait de Parfum • Konsentrasi 35%',
                ],
                [
                    'id' => 9,
                    'category' => 'extrait',
                    'badge_left' => 'EXTRAIT PUR 35%',
                    'badge_right' => 'MAHAKARYA NO. 9',
                    'label' => 'NUMEROLOGI JIWA 9',
                    'title' => 'Essence IX - The Philanthropist',
                    'desc' => 'Bergamot, Rose, & Sandalwood. Bimbingan spiritual, kejelasan, dan cahaya kemanusiaan.',
                    'specs' => ['50ML FLACON'],
                    'price' => 350000,
                    'image' => asset('images/bottle/bottle_9.jpg'),
                    'short_notes' => '50ml Extrait de Parfum • Konsentrasi 35%',
                ],
            ];
        @endphp

        {{-- Product Grid --}}
        <div id="catalog-grid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-12">
            @foreach($catalogItems as $item)
                <div class="catalog-card-item" data-category="{{ $item['category'] }}" data-id="{{ $item['id'] }}">
                    <div class="bg-gradient-to-b from-[#141210] to-[#0a0a0a] rounded-2xl border border-gold-400/25 hover:border-gold-400/70 transition-all duration-300 overflow-hidden flex flex-col justify-between shadow-[0_10px_30px_rgba(0,0,0,0.8)] hover:-translate-y-1 group relative h-full">
                        
                        {{-- Image Top Container --}}
                        <div class="relative aspect-[4/3] w-full overflow-hidden bg-black">
                            <img src="{{ $item['image'] }}" alt="{{ $item['title'] }}" class="w-full h-full object-cover object-center group-hover:scale-105 transition-transform duration-500">
                            <div class="absolute inset-0 bg-gradient-to-t from-[#141210] via-transparent to-black/60"></div>
                            
                            {{-- Badges --}}
                            <div class="absolute top-3 left-3 bg-black/80 backdrop-blur-sm border border-gold-400/30 text-gold-300 text-[10px] tracking-widest font-mono uppercase px-2.5 py-1 rounded">
                                {{ $item['badge_left'] }}
                            </div>
                            <div class="absolute top-3 right-3 bg-black/80 backdrop-blur-sm border border-gold-400/30 text-gold-300 text-[10px] tracking-widest font-mono uppercase px-2.5 py-1 rounded">
                                {{ $item['badge_right'] }}
                            </div>
                        </div>

                        {{-- Card Details --}}
                        <div class="p-5 flex-1 flex flex-col justify-between space-y-4">
                            <div class="space-y-2">
                                <div class="text-gold-400 text-[11px] tracking-[0.2em] uppercase font-mono flex items-center gap-1.5 font-semibold">
                                    <span class="text-gold-400">❖</span>
                                    <span>{{ $item['label'] }}</span>
                                </div>
                                <h3 class="text-lg font-serif font-bold text-white group-hover:text-gold-200 transition-colors">
                                    {{ $item['title'] }}
                                </h3>
                                <p class="text-xs sm:text-sm text-gray-300 font-light leading-relaxed">
                                    {{ $item['desc'] }}
                                </p>
                            </div>

                            {{-- Specs pills --}}
                            <div class="flex flex-wrap gap-2 pt-1">
                                @foreach($item['specs'] as $spec)
                                    <span class="px-2.5 py-1 bg-gold-400/10 border border-gold-400/30 text-gold-300 text-[10px] font-mono rounded tracking-wider uppercase">
                                        {{ $spec }}
                                    </span>
                                @endforeach
                            </div>

                            {{-- Bottom Row: Price & Order Action --}}
                            <div class="pt-3 border-t border-gold-400/15 flex items-center justify-between gap-3">
                                <div>
                                    <span class="text-[9px] uppercase text-gray-400 tracking-widest font-mono block">INVESTASI JIWA</span>
                                    <span class="text-base font-serif font-bold text-gold-300 glow-gold">Rp {{ number_format($item['price'], 0, ',', '.') }}</span>
                                </div>
                                
                                <button type="button" 
                                        onclick="proceedToCheckout({{ $item['id'] }}, '{{ addslashes($item['label']) }}', '{{ addslashes($item['title']) }}', '{{ addslashes($item['short_notes']) }}', {{ $item['price'] }}, '{{ $item['image'] }}')"
                                        class="btn-select-order-{{ $item['id'] }} btn-gold text-xs px-4 py-2.5 font-mono tracking-widest uppercase rounded text-black font-bold hover:scale-105 transition-all flex items-center gap-1 shadow-lg">
                                    <span>BUAT PESANAN</span>
                                </button>
                            </div>
                        </div>

                    </div>
                </div>
            @endforeach
        </div>

        {{-- Guarantees Section ("JAMINAN SAKRAL KAMI") --}}
        <div class="my-16 text-center">
            <div class="text-[10px] sm:text-xs font-mono text-gold-400 tracking-[0.3em] uppercase mb-2">
                ZAMINAN SAKRAL KAMI
            </div>
            <h2 class="text-2xl sm:text-3xl font-serif text-gold-200 glow-gold font-bold mb-8">
                Ketenteraman Jiwa Dalam Setiap Tetesan
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                {{-- Guarantee Card 1 --}}
                <div class="bg-gradient-to-b from-[#141210] to-[#0a0a0a] rounded-2xl p-6 border border-gold-400/20 text-center space-y-3 hover:border-gold-400/50 transition-all">
                    <div class="w-12 h-12 rounded-xl bg-gold-400/10 border border-gold-400/30 flex items-center justify-center text-gold-400 mx-auto">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                        </svg>
                    </div>
                    <h3 class="text-base font-serif font-bold text-white">100% Extrait De Parfum Asli</h3>
                    <p class="text-xs sm:text-sm text-gray-300 leading-relaxed font-light">
                        Diramu murni dari minyak atsiri murni asli. Gua Kalimantan, dan kemenyan purba tanpa pengenceran berlebih. Sertifikasi kualitas internasional.
                    </p>
                </div>

                {{-- Guarantee Card 2 --}}
                <div class="bg-gradient-to-b from-[#141210] to-[#0a0a0a] rounded-2xl p-6 border border-gold-400/20 text-center space-y-3 hover:border-gold-400/50 transition-all">
                    <div class="w-12 h-12 rounded-xl bg-gold-400/10 border border-gold-400/30 flex items-center justify-center text-gold-400 mx-auto">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-base font-serif font-bold text-white">Garansi Ketahanan 12-16 Jam</h3>
                    <p class="text-xs sm:text-sm text-gray-300 leading-relaxed font-light">
                        Satu memikat yang melekat melampaui waktu. Menyertai setiap langkah dan ritual harian Anda dengan pancaran aura yang stabil dan menenangkan.
                    </p>
                </div>

                {{-- Guarantee Card 3 --}}
                <div class="bg-gradient-to-b from-[#141210] to-[#0a0a0a] rounded-2xl p-6 border border-gold-400/20 text-center space-y-3 hover:border-gold-400/50 transition-all">
                    <div class="w-12 h-12 rounded-xl bg-gold-400/10 border border-gold-400/30 flex items-center justify-center text-gold-400 mx-auto">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                        </svg>
                    </div>
                    <h3 class="text-base font-serif font-bold text-white">Garansi Ganti Baru Tanpa Syarat</h3>
                    <p class="text-xs sm:text-sm text-gray-300 leading-relaxed font-light">
                        Apabila botol mengalami kerusakan atau cacat saat proses transit, kami kirimkan unit baru seketika lengkap dengan doa pembersihan ulang.
                    </p>
                </div>
            </div>
        </div>

    </div>


    {{-- ========================================================================= --}}
    {{-- VIEW 2: CHECKOUT RITUAL PAGE ("PEMESANAN & PENYELARASAN TAKDIR")           --}}
    {{-- ========================================================================= --}}
    <div id="view-checkout" class="hidden transition-all duration-500">

        {{-- BACK BUTTON (TANDA PANAH KEMBALI) --}}
        <div class="mb-6">
            <button type="button" 
                    onclick="showCatalogView()" 
                    class="inline-flex items-center gap-2.5 px-4 py-2 rounded-full border border-gold-400/40 bg-black/80 text-gold-300 hover:text-white hover:border-gold-400 hover:bg-gold-400/10 transition-all font-mono text-xs tracking-wider cursor-pointer shadow-lg">
                <svg class="w-4 h-4 text-gold-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                <span>Kembali ke Koleksi Mahakarya</span>
            </button>
        </div>

        {{-- Header Section --}}
        <div class="text-center mb-8">
            <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-gold-400/10 border border-gold-400/30 text-gold-300 text-xs tracking-[0.2em] font-mono uppercase mb-3 shadow-[0_0_15px_rgba(197,160,89,0.15)]">
                ✦ THE SACRED CHECKOUT RITUAL ✦
            </div>
            <h1 class="text-3xl sm:text-5xl font-serif font-bold text-white tracking-wider glow-gold mb-3 uppercase leading-tight">
                PEMESANAN & PENYELARASAN TAKDIR
            </h1>
            <p class="text-gray-200 font-light text-base sm:text-lg max-w-2xl mx-auto leading-relaxed italic">
                "Dari Asih menjadi wangi, dari frekuensi jiwa mengalir ke dalam botol suci yang diselaraskan khusus untuk kehadiran Anda."
            </p>
        </div>

        {{-- 4-Step Progress Indicator Bar --}}
        <div class="grid grid-cols-2 md:grid-cols-4 gap-3 mb-10">
            {{-- Step 1 --}}
            <div class="bg-dark-900/80 border border-gold-400/30 rounded-xl p-3 text-center flex items-center gap-3">
                <div class="w-8 h-8 rounded-full bg-gold-400 text-black font-bold flex items-center justify-center text-xs shadow-md">
                    ✓
                </div>
                <div class="text-left">
                    <div class="text-[11px] font-mono font-bold text-white uppercase tracking-wider">1. PILIH SIGNATURE</div>
                    <div id="step-signature-label" class="text-[10px] font-mono text-gold-400 truncate max-w-[120px]">Essence VII Terpilih</div>
                </div>
            </div>

            {{-- Step 2 --}}
            <div class="bg-gold-400/10 border-2 border-gold-400 rounded-xl p-3 text-center flex items-center gap-3 shadow-[0_0_20px_rgba(197,160,89,0.25)]">
                <div class="w-8 h-8 rounded-full bg-gold-400 text-black font-bold flex items-center justify-center text-xs">
                    2
                </div>
                <div class="text-left">
                    <div class="text-[11px] font-mono font-bold text-gold-200 uppercase tracking-wider">2. ALAMAT & PENGIRIMAN</div>
                    <div class="text-[10px] font-mono text-gold-400">Sedang Berlangsung</div>
                </div>
            </div>

            {{-- Step 3 --}}
            <div class="bg-black/50 border border-white/10 rounded-xl p-3 text-center flex items-center gap-3 opacity-60">
                <div class="w-8 h-8 rounded-full bg-white/10 text-gray-400 font-bold flex items-center justify-center text-xs">
                    3
                </div>
                <div class="text-left">
                    <div class="text-[11px] font-mono font-bold text-gray-300 uppercase tracking-wider">3. PEMBAYARAN SAKRAL</div>
                    <div class="text-[10px] font-mono text-gray-500">Metode Instan & VA</div>
                </div>
            </div>

            {{-- Step 4 --}}
            <div class="bg-black/50 border border-white/10 rounded-xl p-3 text-center flex items-center gap-3 opacity-60">
                <div class="w-8 h-8 rounded-full bg-white/10 text-gray-400 font-bold flex items-center justify-center text-xs">
                    4
                </div>
                <div class="text-left">
                    <div class="text-[11px] font-mono font-bold text-gray-300 uppercase tracking-wider">4. KONFIRMASI & DOA</div>
                    <div class="text-[10px] font-mono text-gray-500">Penyegelan Mistik</div>
                </div>
            </div>
        </div>

        {{-- Validation Errors --}}
        @if ($errors->any())
            <div class="mb-6 p-4 rounded-lg bg-red-900/30 border border-red-500/50 text-red-200 text-xs">
                <ul class="list-disc list-inside space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- MAIN CHECKOUT FORM --}}
        <form action="{{ route('order.store') }}" method="POST" id="checkout-form" class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
            @csrf
            
            <input type="hidden" name="essence_number" id="form-essence-number" value="7">
            <input type="hidden" name="quantity" value="1">

            {{-- LEFT COLUMN: INPUT FORMS (8 Cols) --}}
            <div class="lg:col-span-7 space-y-6">
                
                {{-- 1. Informasi Pemesan --}}
                <div class="bg-gradient-to-b from-[#141210] to-[#0c0b0a] rounded-2xl p-6 border border-gold-400/30 shadow-xl space-y-4">
                    <div class="border-b border-gold-400/20 pb-3">
                        <h2 class="text-lg sm:text-xl font-serif font-bold text-white uppercase tracking-wider">1. Informasi Pemesan</h2>
                    </div>
                    <p class="text-sm sm:text-base text-gray-300 font-light leading-relaxed">
                        Notifikasi pelacakan astral dan audio doa penyelarasan akan dikirimkan ke kontak ini.
                    </p>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label for="checkout-email" class="block text-[10px] uppercase tracking-widest text-gold-400 font-mono mb-1.5">
                                ALAMAT EMAIL RESITAL *
                            </label>
                            <input id="checkout-email" name="email" type="email" placeholder="contoh: jiwa@asyihan.com" required class="input-dark py-2.5 text-xs" value="{{ old('email', request('email')) }}">
                        </div>

                        <div>
                            <label for="checkout-phone" class="block text-[10px] uppercase tracking-widest text-gold-400 font-mono mb-1.5">
                                NO. WHATSAPP KERABAT *
                            </label>
                            <input id="checkout-phone" name="phone" type="tel" placeholder="+62 812 3456 7890" required class="input-dark py-2.5 text-xs" value="{{ old('phone', request('phone')) }}">
                        </div>
                    </div>
                </div>

                {{-- 2. Titik Singgah Penerimaan --}}
                <div class="bg-gradient-to-b from-[#141210] to-[#0c0b0a] rounded-2xl p-6 border border-gold-400/30 shadow-xl space-y-4">
                    <div class="border-b border-gold-400/20 pb-3">
                        <h2 class="text-base font-serif font-bold text-white uppercase tracking-wider">2. Titik Singgah Penerimaan</h2>
                    </div>
                    <p class="text-[11px] text-gray-400 font-light">
                        Pastikan alamat terlindungi dan siap menerima kurir suci kami.
                    </p>

                    <div class="space-y-4">
                        <div>
                            <label for="checkout-name" class="block text-[10px] uppercase tracking-widest text-gold-400 font-mono mb-1.5">
                                NAMA LENGKAP PEMEGANG WANGI *
                            </label>
                            <input id="checkout-name" name="name" type="text" placeholder="Nama lengkap sesuai KTP / Penyelarasan Diri" required class="input-dark py-2.5 text-xs" value="{{ old('name', request('name')) }}">
                        </div>

                        <div>
                            <label for="checkout-address" class="block text-[10px] uppercase tracking-widest text-gold-400 font-mono mb-1.5">
                                ALAMAT LENGKAP HUNIAN / SANGGAR *
                            </label>
                            <textarea id="checkout-address" name="address" rows="3" placeholder="Nama Jalan, No. Rumah, RT/RW, Blok, Patokan Khusus..." required class="textarea-dark text-xs py-2.5">{{ old('address') }}</textarea>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
                            <div>
                                <label for="checkout-city" class="block text-[10px] uppercase tracking-widest text-gold-400 font-mono mb-1.5">
                                    KOTA / KABUPATEN *
                                </label>
                                <input id="checkout-city" name="city" type="text" placeholder="Bandung" required class="input-dark py-2.5 text-xs" value="{{ old('city') }}">
                            </div>
                            <div>
                                <label for="checkout-province" class="block text-[10px] uppercase tracking-widest text-gold-400 font-mono mb-1.5">
                                    PROVINSI *
                                </label>
                                <input id="checkout-province" name="province" type="text" placeholder="Jawa Barat" required class="input-dark py-2.5 text-xs" value="{{ old('province') }}">
                            </div>
                            <div>
                                <label for="checkout-postal" class="block text-[10px] uppercase tracking-widest text-gold-400 font-mono mb-1.5">
                                    KODE POS *
                                </label>
                                <input id="checkout-postal" name="postal_code" type="text" placeholder="40115" required class="input-dark py-2.5 text-xs" value="{{ old('postal_code') }}">
                            </div>
                        </div>
                    </div>
                </div>

                {{-- 3. Pelayanan Ekspedisi Khusus --}}
                <div class="bg-gradient-to-b from-[#141210] to-[#0c0b0a] rounded-2xl p-6 border border-gold-400/30 shadow-xl space-y-4">
                    <div class="border-b border-gold-400/20 pb-3">
                        <h2 class="text-base font-serif font-bold text-white uppercase tracking-wider">3. Pelayanan Ekspedisi Khusus</h2>
                    </div>

                    <div class="space-y-3">
                        {{-- Courier Option 1 --}}
                        <label class="block cursor-pointer">
                            <div class="bg-black/60 border border-gold-400/40 rounded-xl p-4 flex items-start gap-3 hover:border-gold-400 transition-all">
                                <input type="radio" name="expedition" value="express" checked onchange="updateShippingPrice(0)" class="mt-1 accent-gold-400">
                                <div class="flex-1">
                                    <div class="flex items-center justify-between">
                                        <span class="text-xs font-mono font-bold text-white uppercase">EXPRESS SACRED COURIER (AMAN & TERSEGEL)</span>
                                        <span class="text-[10px] font-mono font-bold text-gold-400 bg-gold-400/10 border border-gold-400/30 px-2 py-0.5 rounded">GRATIS INVESTASI</span>
                                    </div>
                                    <p class="text-[11px] text-gray-400 font-light mt-1">
                                        Setiap kemasan dilapisi beludru obsidian tahan bentur, kotak pengaman berikrar, dan segel lilin lebah emas lambang ASYIHAN. Estimasi 1-2 hari kerja tiba di altar Anda.
                                    </p>
                                </div>
                            </div>
                        </label>

                        {{-- Courier Option 2 --}}
                        <label class="block cursor-pointer">
                            <div class="bg-black/60 border border-white/10 rounded-xl p-4 flex items-start gap-3 hover:border-gold-400/60 transition-all">
                                <input type="radio" name="expedition" value="same_day" onchange="updateShippingPrice(150000)" class="mt-1 accent-gold-400">
                                <div class="flex-1">
                                    <div class="flex items-center justify-between">
                                        <span class="text-xs font-mono font-bold text-white uppercase">SAME-DAY MIDNIGHT HAND DELIVERY</span>
                                        <span class="text-[10px] font-mono font-bold text-gold-300">+ Rp 150.000</span>
                                    </div>
                                    <p class="text-[11px] text-gray-400 font-light mt-1">
                                        Khusus wilayah Jabodetabek & Bandung Raya. Dikirimkan langsung oleh kurir berbusana etnik sakral sebelum fajar atau setelah senja.
                                    </p>
                                </div>
                            </div>
                        </label>
                    </div>
                </div>

                {{-- 4. Pesan Kepada Ahli Racik (Opsional) --}}
                <div class="bg-gradient-to-b from-[#141210] to-[#0c0b0a] rounded-2xl p-6 border border-gold-400/30 shadow-xl space-y-3">
                    <div class="border-b border-gold-400/20 pb-3">
                        <h2 class="text-base font-serif font-bold text-white uppercase tracking-wider">4. Pesan Kepada Ahli Racik (Opsional)</h2>
                    </div>
                    <p class="text-[11px] text-gray-400 font-light">
                        Tuliskan nama panggilan atau tanggal kelahiran yang ingin diukirkan pada Kartu Ajian Emas Pengantar Pesona:
                    </p>
                    <textarea name="craftsman_note" rows="2" placeholder="Misal: 'Penyelarasan untuk Raden Arya - Lahir Sukra Pon'" class="textarea-dark text-xs py-2.5"></textarea>
                </div>

            </div>


            {{-- RIGHT COLUMN: SUMMARY & PAYMENT GATEWAYS (5 Cols) --}}
            <div class="lg:col-span-5 space-y-6">

                <div class="bg-gradient-to-b from-[#181613] to-[#0e0d0b] rounded-2xl p-6 border border-gold-400/40 shadow-2xl space-y-6 relative overflow-hidden">
                    <div class="absolute -top-20 -right-20 w-60 h-60 bg-gold-400/10 rounded-full blur-3xl pointer-events-none"></div>

                    {{-- Ringkasan Header --}}
                    <div class="flex items-center justify-between border-b border-gold-400/20 pb-3 text-xs font-mono">
                        <span class="text-gold-400 uppercase font-bold tracking-wider">RINGKASAN MAHAKARYA</span>
                        <span class="text-gray-400 text-[10px]">1 ITEM TERPILIH</span>
                    </div>

                    {{-- Selected Product Details Card --}}
                    <div class="flex gap-4 items-center bg-black/60 p-3.5 rounded-xl border border-gold-400/20">
                        <img id="checkout-summary-img" src="{{ asset('images/bottle/bottle_7.jpg') }}" alt="Essence" class="w-16 h-16 object-cover rounded-lg border border-gold-400/30 shadow-md">
                        <div class="flex-1 min-w-0">
                            <span id="checkout-summary-label" class="text-[10px] text-gold-400 font-mono tracking-widest uppercase block font-semibold">❖ NUMEROLOGI JIWA 7</span>
                            <h3 id="checkout-summary-title" class="text-sm font-serif font-bold text-white truncate uppercase glow-gold">ESSENCE VII - THE SEEKER</h3>
                            <p id="checkout-summary-notes" class="text-[11px] text-gray-400 font-light truncate">50ml Extrait de Parfum • Konsentrasi 35%</p>
                            <span id="checkout-summary-unit-price" class="text-xs font-serif font-bold text-gold-300 mt-1 block">Rp 350.000</span>
                        </div>
                    </div>

                    {{-- Complimentary Relics --}}
                    <div class="space-y-2 bg-gold-400/5 p-4 rounded-xl border border-gold-400/20 text-xs">
                        <div class="text-[10px] font-mono text-gold-400 font-bold uppercase tracking-wider">
                            <span>COMPLIMENTARY SACRED RELICS</span>
                        </div>
                        <ul class="space-y-1.5 text-[11px] text-gray-300 font-light">
                            <li class="flex items-center gap-2">
                                <span class="text-gold-400">•</span>
                                <span>Batu Kristal Alami Raw Amethyst Penyelaras Vibrasi</span>
                            </li>
                            <li class="flex items-center gap-2">
                                <span class="text-gold-400">•</span>
                                <span>Kartu Resital Ajian Emas Tertulis Nama Anda</span>
                            </li>
                            <li class="flex items-center gap-2">
                                <span class="text-gold-400">•</span>
                                <span>Pouch Sutra Beludru Mistik Pelindung Botol</span>
                            </li>
                        </ul>
                    </div>

                    {{-- Breakdown Totals --}}
                    <div class="space-y-2.5 pt-2 text-xs border-t border-gold-400/15 font-mono">
                        <div class="flex justify-between text-gray-400">
                            <span>Subtotal Mahakarya</span>
                            <span id="summary-subtotal" class="text-white">Rp 350.000</span>
                        </div>
                        <div class="flex justify-between text-gray-400">
                            <span>Kotak Hadiah Hardbox & Segel Emas</span>
                            <span class="text-gold-400 font-bold">COMPLIMENTARY</span>
                        </div>
                        <div class="flex justify-between text-gray-400">
                            <span>Biaya Kirim Suci (Nusantara)</span>
                            <span id="summary-shipping" class="text-gold-400 font-bold">GRATIS</span>
                        </div>

                        <div class="border-t border-gold-400/30 pt-3 flex justify-between items-center">
                            <div>
                                <span class="text-xs font-serif font-bold text-gold-400 uppercase block tracking-wider">TOTAL INVESTASI JIWA</span>
                                <span class="text-[9px] text-gray-500 font-light block">Terselesai Pajak & Bea Sakral</span>
                            </div>
                            <span id="checkout-grand-total" class="text-xl font-serif font-bold text-white glow-gold">Rp 350.000</span>
                        </div>
                    </div>

                    {{-- Payment Gateways Selection --}}
                    <div class="space-y-3 pt-2 border-t border-gold-400/15">
                        <span class="text-[10px] font-mono font-bold text-gold-400 uppercase tracking-widest block">PILIH GERBANG PEMBAYARAN:</span>
                        
                        <div class="grid grid-cols-2 gap-2">
                            <label class="cursor-pointer">
                                <input type="radio" name="payment_method" value="qris" checked class="peer sr-only">
                                <div class="bg-black/70 border border-white/10 peer-checked:border-gold-400 peer-checked:bg-gold-400/10 p-2.5 rounded-lg text-center transition-all">
                                    <div class="text-xs font-mono font-bold text-white">QRIS INSTAN</div>
                                    <div class="text-[9px] text-gray-400">GoPay, OVO, Dana</div>
                                </div>
                            </label>

                            <label class="cursor-pointer">
                                <input type="radio" name="payment_method" value="va" class="peer sr-only">
                                <div class="bg-black/70 border border-white/10 peer-checked:border-gold-400 peer-checked:bg-gold-400/10 p-2.5 rounded-lg text-center transition-all">
                                    <div class="text-xs font-mono font-bold text-white">VIRTUAL ACCOUNT</div>
                                    <div class="text-[9px] text-gray-400">BCA, Mandiri, BRI</div>
                                </div>
                            </label>

                            <label class="cursor-pointer">
                                <input type="radio" name="payment_method" value="cc" class="peer sr-only">
                                <div class="bg-black/70 border border-white/10 peer-checked:border-gold-400 peer-checked:bg-gold-400/10 p-2.5 rounded-lg text-center transition-all">
                                    <div class="text-xs font-mono font-bold text-white">KARTU KREDIT</div>
                                    <div class="text-[9px] text-gray-400">Visa, Mastercard</div>
                                </div>
                            </label>

                            <label class="cursor-pointer">
                                <input type="radio" name="payment_method" value="shopeepay" class="peer sr-only">
                                <div class="bg-black/70 border border-white/10 peer-checked:border-gold-400 peer-checked:bg-gold-400/10 p-2.5 rounded-lg text-center transition-all">
                                    <div class="text-xs font-mono font-bold text-white">SHOPEEPAY</div>
                                    <div class="text-[9px] text-gray-400">Auto Redirection</div>
                                </div>
                            </label>
                        </div>
                    </div>

                    {{-- Submit Button --}}
                    <button type="submit" class="w-full btn-gold py-4 text-xs font-mono font-bold tracking-[0.2em] uppercase rounded-sm flex items-center justify-center gap-2 shadow-2xl text-black hover:scale-[1.02] transition-all">
                        <span>LANJUTKAN KE PEMBAYARAN AMAN</span>
                    </button>

                    <div class="text-center text-[10px] font-mono text-gray-500 flex items-center justify-center gap-1.5">
                        <span>256-Bit SSL Encrypted Sacred Transaction</span>
                    </div>

                </div>

                {{-- Helpline Box --}}
                <div class="bg-black/40 border border-gold-400/20 rounded-2xl p-4">
                    <div class="text-xs font-mono font-bold text-white uppercase mb-1">PERLU BIMBINGAN PEMILIHAN?</div>
                    <div class="text-[11px] text-gray-400 font-light leading-snug">
                        Hubungi Konsultan Wangi Astral kami via WhatsApp untuk penyelarasan tanggal lahir secara personal.
                    </div>
                </div>

            </div>

        </form>

    </div>

</div>
@endsection

@push('scripts')
<script>
    let currentBasePrice = 350000;
    let currentShippingExtra = 0;

    // Filter catalog items in View 1
    function filterCatalog(category) {
        const buttons = document.querySelectorAll('.filter-btn');
        buttons.forEach(btn => {
            btn.className = 'filter-btn px-4 py-2 rounded-full border border-gold-400/20 bg-black/60 text-gold-300/80 hover:border-gold-400/60 hover:text-gold-200 transition-all';
        });

        const activeBtn = document.getElementById('filter-' + category);
        if (activeBtn) {
            activeBtn.className = 'filter-btn px-4 py-2 rounded-full border border-gold-400 bg-gold-400 text-black font-semibold shadow-[0_0_15px_rgba(197,160,89,0.4)] transition-all';
        }

        const items = document.querySelectorAll('.catalog-card-item');
        let count = 0;
        items.forEach(item => {
            if (category === 'all' || item.getAttribute('data-category') === category) {
                item.style.display = 'block';
                count++;
            } else {
                item.style.display = 'none';
            }
        });

        document.getElementById('catalog-count').textContent = `MENAMPILKAN ${count} FORMULA MISTIK`;
    }

    // Switch from Catalog View to Checkout View when "BUAT PESANAN" is clicked
    function proceedToCheckout(id, label, title, notes, price, image) {
        currentBasePrice = price;
        
        // Update hidden form inputs & labels
        document.getElementById('form-essence-number').value = id;
        document.getElementById('step-signature-label').textContent = title + ' Terpilih';
        
        document.getElementById('checkout-summary-img').src = image;
        document.getElementById('checkout-summary-label').textContent = '❖ ' + label;
        document.getElementById('checkout-summary-title').textContent = title.toUpperCase();
        document.getElementById('checkout-summary-notes').textContent = notes;
        document.getElementById('checkout-summary-unit-price').textContent = 'Rp ' + price.toLocaleString('id-ID');
        document.getElementById('summary-subtotal').textContent = 'Rp ' + price.toLocaleString('id-ID');

        recalculateTotal();

        // Toggle Views
        document.getElementById('view-catalog').classList.add('hidden');
        document.getElementById('view-checkout').classList.remove('hidden');

        // Smooth scroll to top of checkout view
        window.scrollTo({ top: 0, behavior: 'smooth' });
    }

    // Return back to Catalog View when Back Arrow is clicked
    function showCatalogView() {
        document.getElementById('view-checkout').classList.add('hidden');
        document.getElementById('view-catalog').classList.remove('hidden');
        window.scrollTo({ top: 0, behavior: 'smooth' });
    }

    function updateShippingPrice(extra) {
        currentShippingExtra = extra;
        const shippingEl = document.getElementById('summary-shipping');
        if (shippingEl) {
            shippingEl.textContent = extra > 0 ? '+ Rp ' + extra.toLocaleString('id-ID') : 'GRATIS';
        }
        recalculateTotal();
    }

    function recalculateTotal() {
        const grandTotal = currentBasePrice + currentShippingExtra;
        const grandTotalEl = document.getElementById('checkout-grand-total');
        if (grandTotalEl) {
            grandTotalEl.textContent = 'Rp ' + grandTotal.toLocaleString('id-ID');
        }
    }

    // Check URL parameters for pre-selected essence
    document.addEventListener('DOMContentLoaded', function () {
        const urlParams = new URLSearchParams(window.location.search);
        const urlEssence = urlParams.get('essence');
        if (urlEssence) {
            const initialId = parseInt(urlEssence);
            const initialCard = document.querySelector(`[data-id="${initialId}"]`);
            if (initialCard) {
                const btn = initialCard.querySelector('button');
                if (btn) btn.click();
            }
        }
    });
</script>
@endpush
