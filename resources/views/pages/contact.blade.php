@extends('layouts.app')

@section('title', 'Hubungi Kami — ASYIHAN Concierge')
@section('meta_description', 'Layanan Concierge wewangian dan konsultasi numerologi ASYIHAN. Hubungi kami untuk peracikan aroma sakral dan konsultasi arketipe.')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 py-8 space-y-16">

    {{-- HERO HEADER --}}
    <div class="text-center max-w-4xl mx-auto">
        <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-gold-400/10 border border-gold-400/30 text-gold-300 text-[10px] sm:text-xs tracking-[0.25em] uppercase mb-6 font-medium">
            ✦ HUBUNGI KAMI ✦
        </div>
        <h1 class="text-3xl sm:text-5xl lg:text-6xl font-serif text-white tracking-wider leading-tight mb-4">
            Kami Siap Mendampingi<br class="hidden sm:inline"> Perjalanan Esensimu
        </h1>
        <p class="text-gray-300 text-xs sm:text-sm font-light max-w-2xl mx-auto leading-relaxed mb-6">
            Ingin berkonsultasi mengenai pembacaan numerologi, pemilihan aroma arketipe khusus, pemesanan sakral untuk perhelatan dan korporasi, atau sekadar menanyakan jejak pesanan Anda? Para kurator kami siap menyapa jiwa Anda.
        </p>
        <div class="w-24 h-0.5 bg-gradient-to-r from-transparent via-gold-400 to-transparent mx-auto relative flex items-center justify-center">
            <span class="text-gold-400 text-xs bg-[#0a0a0a] px-2 font-serif">◆</span>
        </div>
    </div>

    {{-- 4 TOP CONTACT CARDS --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
        {{-- Card 1: WhatsApp --}}
        <div class="bg-panel border border-gold-400/20 rounded-xl p-6 flex flex-col justify-between hover:border-gold-400/50 transition-all group hover:-translate-y-1">
            <div>
                <div class="w-10 h-10 rounded-lg bg-black/60 border border-gold-400/30 flex items-center justify-center text-gold-400 mb-4 group-hover:bg-gold-400 group-hover:text-black transition-all">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                </div>
                <span class="text-[10px] tracking-[0.2em] font-mono uppercase text-gold-400 block mb-1">
                    KONSULTASI SPIRITUAL CEPAT
                </span>
                <h3 class="text-xl font-serif text-white mb-2">WhatsApp</h3>
                <p class="text-gray-400 text-xs font-light leading-relaxed mb-4">
                    Respon langsung untuk analisis angka inti dan konfirmasi pesanan aroma personal.
                </p>
                <div class="mb-4">
                    <span class="text-sm font-semibold text-white block">08112144113</span>
                    <span class="text-[10px] text-gray-500 font-mono">SETIAP HARI • 09.00 - 21.00 WIB</span>
                </div>
            </div>
            <a href="https://wa.me/628112144113" target="_blank" class="btn-gold text-[10px] tracking-[0.2em] py-2.5 rounded text-center block w-full mt-2">
                BUKA WHATSAPP ↗
            </a>
        </div>

        {{-- Card 2: Instagram --}}
        <div class="bg-panel border border-gold-400/20 rounded-xl p-6 flex flex-col justify-between hover:border-gold-400/50 transition-all group hover:-translate-y-1">
            <div>
                <div class="w-10 h-10 rounded-lg bg-black/60 border border-gold-400/30 flex items-center justify-center text-gold-400 mb-4 group-hover:bg-gold-400 group-hover:text-black transition-all">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/></svg>
                </div>
                <span class="text-[10px] tracking-[0.2em] font-mono uppercase text-gold-400 block mb-1">
                    KOLEKTIF & RITUAL MISTIS
                </span>
                <h3 class="text-xl font-serif text-white mb-2">Instagram</h3>
                <p class="text-gray-400 text-xs font-light leading-relaxed mb-4">
                    Simak ajian mingguan, kupas tuntas 9 karakter wewangian, dan live sniffing virtual.
                </p>
                <div class="mb-4">
                    <span class="text-sm font-semibold text-white block">@asyihan.official</span>
                    <span class="text-[10px] text-gray-500 font-mono">UPDATE & INSPIRASI HARIAN</span>
                </div>
            </div>
            <a href="https://instagram.com/asyihan.official" target="_blank" class="btn-gold-outline text-[10px] tracking-[0.2em] py-2.5 rounded text-center block w-full mt-2">
                IKUTI INSTAGRAM ›
            </a>
        </div>

        {{-- Card 3: Email --}}
        <div class="bg-panel border border-gold-400/20 rounded-xl p-6 flex flex-col justify-between hover:border-gold-400/50 transition-all group hover:-translate-y-1">
            <div>
                <div class="w-10 h-10 rounded-lg bg-black/60 border border-gold-400/30 flex items-center justify-center text-gold-400 mb-4 group-hover:bg-gold-400 group-hover:text-black transition-all">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                </div>
                <span class="text-[10px] tracking-[0.2em] font-mono uppercase text-gold-400 block mb-1">
                    KOLABORASI & BISNIS
                </span>
                <h3 class="text-xl font-serif text-white mb-2">Surat Resmi</h3>
                <p class="text-gray-400 text-xs font-light leading-relaxed mb-4">
                    Permintaan wewangian pernikahan sakral, kurasi korporasi, wawancara media, serta kemitraan diplomatik.
                </p>
                <div class="mb-4">
                    <span class="text-sm font-semibold text-white block">info@asyihan.id</span>
                    <span class="text-[10px] text-gray-500 font-mono">BALASAN DALAM 24 JAM KERJA</span>
                </div>
            </div>
            <a href="mailto:info@asyihan.id" class="btn-gold-outline text-[10px] tracking-[0.2em] py-2.5 rounded text-center block w-full mt-2">
                KIRIM SUREL ✉
            </a>
        </div>

        {{-- Card 4: Sanctuary --}}
        <div class="bg-panel border border-gold-400/20 rounded-xl p-6 flex flex-col justify-between hover:border-gold-400/50 transition-all group hover:-translate-y-1">
            <div>
                <div class="w-10 h-10 rounded-lg bg-black/60 border border-gold-400/30 flex items-center justify-center text-gold-400 mb-4 group-hover:bg-gold-400 group-hover:text-black transition-all">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5m3 0h1m-4-8l2-2 2 2m-2-2v6"></path></svg>
                </div>
                <span class="text-[10px] tracking-[0.2em] font-mono uppercase text-gold-400 block mb-1">
                    PRIVATE SNIFFING SESSION
                </span>
                <h3 class="text-xl font-serif text-white mb-2">Sanctuary</h3>
                <p class="text-gray-400 text-xs font-light leading-relaxed mb-4">
                    Atelier wewangian hening untuk ritual pencocokan aroma secara tatap muka.
                </p>
                <div class="mb-4">
                    <span class="text-[11px] font-medium text-white block leading-snug">Jl. Tamblong No.46, Braga, Bandung</span>
                    <span class="text-[10px] text-gray-500 font-mono">BANDUNG • HANYA RESERVASI PRIVAT</span>
                </div>
            </div>
            <a href="https://wa.me/628112144113?text=Halo%20Asyihan,%20saya%20ingin%20reservasi%20Private%20Sniffing%20Session" target="_blank" class="btn-gold-outline text-[10px] tracking-[0.2em] py-2.5 rounded text-center block w-full mt-2">
                RESERVASI KUNJUNGAN 🗓
            </a>
        </div>
    </div>

    {{-- MAIN SECTION: FORM (LEFT) & SANCTUARY / MAP (RIGHT) --}}
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
        {{-- Left Column: Interactive Form (7 cols) --}}
        <div class="lg:col-span-7 bg-panel rounded-2xl p-6 sm:p-8 border border-gold-400/25 box-glow relative overflow-hidden">
            <div class="inline-block px-3 py-1 rounded-full bg-gold-400/10 border border-gold-400/20 text-gold-400 text-[10px] tracking-[0.2em] uppercase mb-3 font-mono">
                📜 SUKU PESAN JIWA
            </div>
            <h2 class="text-2xl font-serif text-white mb-2">
                Kirimkan Pesan Kepada Sang Peracik
            </h2>
            <p class="text-xs text-gray-400 font-light leading-relaxed mb-6">
                Tuliskan getaran rasa Anda. Setiap pesan dibaca secara mendalam oleh sang peracik dan kurator numerologi kami untuk memberikan rekomendasi aroma yang selaras.
            </p>

            <form id="contact-form" class="space-y-4">
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-[10px] uppercase tracking-widest text-gold-300 mb-1.5 font-mono">NAMA LENGKAP</label>
                        <input id="contact_name" type="text" placeholder="Raden Arya Damara" required class="input-dark">
                    </div>
                    <div>
                        <label class="block text-[10px] uppercase tracking-widest text-gold-300 mb-1.5 font-mono">NOMOR WHATSAPP AKTIF</label>
                        <input id="contact_info" type="text" placeholder="+62 811-xxxx-xxxx" required class="input-dark">
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-[10px] uppercase tracking-widest text-gold-300 mb-1.5 font-mono">TANGGAL LAHIR / ANGKA INTI (OPSIONAL)</label>
                        <input id="contact_dob" type="text" placeholder="Contoh: 14 Mei 1992 atau Angka 7" class="input-dark">
                    </div>
                    <div>
                        <label class="block text-[10px] uppercase tracking-widest text-gold-300 mb-1.5 font-mono">FOKUS KOMUNIKASI</label>
                        <select id="contact_category" class="input-dark">
                            <option value="Konsultasi Karakter & Numerologi" class="bg-dark-800 text-white">Konsultasi Karakter & Numerologi</option>
                            <option value="Pemesanan Custom / Event" class="bg-dark-800 text-white">Pemesanan Custom / Event</option>
                            <option value="Kerjasama Bisnis" class="bg-dark-800 text-white">Kerjasama Bisnis</option>
                            <option value="Lainnya" class="bg-dark-800 text-white">Lainnya</option>
                        </select>
                    </div>
                </div>

                <div>
                    <label class="block text-[10px] uppercase tracking-widest text-gold-300 mb-1.5 font-mono">CATATAN PESAN ATAU PERTANYAAN</label>
                    <textarea id="contact_message" rows="4" placeholder="Tuliskan penggalan pencarian aroma Anda atau hal yang ingin Anda temukan..." required class="textarea-dark"></textarea>
                </div>

                <div class="pt-2 flex flex-col sm:flex-row items-center justify-between gap-4">
                    <div class="flex items-center gap-2 text-[10px] text-gray-400 font-mono">
                        <span class="text-gold-400">🔒</span>
                        <span>DATA DAN PRIVASI ANDA SELALU DIJAGA KERAHASIAANNYA</span>
                    </div>
                    <button type="submit" class="w-full sm:w-auto btn-gold px-6 py-3 text-xs tracking-[0.2em] rounded flex items-center justify-center gap-2 shrink-0">
                        <span>KIRIM PESAN JIWA</span>
                        <span>➔</span>
                    </button>
                </div>
            </form>
        </div>

        {{-- Right Column: Sanctuary Box & Interactive Map (5 cols) --}}
        <div class="lg:col-span-5 space-y-6">
            {{-- Sanctuary Atmosphere Card --}}
            <div class="bg-panel rounded-2xl overflow-hidden border border-gold-400/20 group">
                <div class="relative h-48 overflow-hidden">
                    <img src="{{ asset('images/seeker_bottle_popup.jpg') }}" alt="Ruang Meditasi Aroma" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                    <div class="absolute inset-0 bg-gradient-to-t from-black via-black/40 to-transparent"></div>
                    <div class="absolute top-3 left-3">
                        <span class="px-2.5 py-1 rounded bg-black/70 backdrop-blur-md border border-gold-400/30 text-[9px] uppercase tracking-widest text-gold-300 font-mono">
                            SANCTUARY SUCI CHDC
                        </span>
                    </div>
                    <div class="absolute bottom-3 left-4 right-4">
                        <h3 class="text-lg font-serif text-white mb-1">Ruang Meditasi Aroma</h3>
                        <p class="text-xs text-gray-300 font-light leading-snug">
                            Stilling atelier dengan aroma kayu cendana tua, racikan kemenyan Sunda, dan minyak mawar murni.
                        </p>
                    </div>
                </div>
            </div>

            {{-- Map Location Card --}}
            <div class="bg-panel rounded-2xl p-5 border border-gold-400/20 space-y-4">
                <div class="flex items-center justify-between border-b border-white/10 pb-3">
                    <span class="text-xs font-serif font-bold text-white uppercase tracking-wider">PETA LOKASI SANCTUARY</span>
                    <span class="text-[10px] text-gray-400 font-mono">BANDUNG, JAWA BARAT</span>
                </div>

                {{-- Map Container with Google Maps Embed --}}
                <div class="relative rounded-xl overflow-hidden border border-gold-400/30 h-52 bg-[#1a1c23] group">
                    <iframe 
                        class="w-full h-full border-0 filter invert contrast-125 opacity-80 group-hover:opacity-100 transition-opacity duration-500"
                        src="https://maps.google.com/maps?q=Jl.+Tamblong+No.46,+Braga,+Kec.+Sumur+Bandung,+Kota+Bandung,+Jawa+Barat+40112&t=&z=16&ie=UTF8&iwloc=&output=embed" 
                        allowfullscreen="" 
                        loading="lazy" 
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                    
                    {{-- Overlay Navigation Button --}}
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-black/20 pointer-events-none flex items-center justify-center">
                        <a href="https://maps.google.com/?q=Jl.+Tamblong+No.46,+Braga,+Kec.+Sumur+Bandung,+Kota+Bandung,+Jawa+Barat+40112" target="_blank" class="pointer-events-auto inline-flex items-center gap-2 px-4 py-2 rounded-full bg-black/85 backdrop-blur-md border border-gold-400/60 text-gold-300 hover:bg-gold-400 hover:text-black font-mono text-xs uppercase tracking-wider transition-all duration-300 box-glow shadow-xl hover:scale-105">
                            <span>🌐 BUKA TITIK NAVIGASI</span>
                            <span>↗</span>
                        </a>
                    </div>
                </div>

                <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-2 pt-1 text-xs">
                    <div class="text-gray-300 font-light max-w-xs leading-relaxed">
                        Jl. Tamblong No.46, Braga, Kec. Sumur Bandung, Kota Bandung, Jawa Barat 40112
                    </div>
                    <span class="text-[10px] text-gold-400/90 font-mono bg-black/60 px-2.5 py-1 rounded border border-gold-400/20 shrink-0">
                        Hanya dengan Janji Temu
                    </span>
                </div>
            </div>
        </div>
    </div>

    {{-- QUOTE BANNER SECTION --}}
    <div class="bg-panel rounded-2xl p-6 sm:p-8 border border-gold-400/30 flex flex-col md:flex-row items-center justify-between gap-6 box-glow">
        <div class="flex items-center gap-5 text-center md:text-left">
            <div class="w-12 h-12 rounded-full border border-gold-400/40 flex items-center justify-center shrink-0 text-gold-400 text-xl bg-black/40">
                🕯️
            </div>
            <div>
                <h3 class="text-lg font-serif text-gold-200 mb-1">“Aroma adalah Doa Tanpa Kata”</h3>
                <p class="text-xs text-gray-400 font-light">
                    Setiap tetes wewangian ASYIHAN mengandung getaran frekuensi sakral energi nama dan tanggal lahir Anda.
                </p>
            </div>
        </div>
        <a href="{{ route('calculator') }}" class="btn-gold-outline px-6 py-3 text-xs tracking-[0.2em] rounded shrink-0 flex items-center gap-2">
            <span>🎴 TEMUKAN ANGKA INTI ANDA</span>
            <span>➔</span>
        </a>
    </div>

    {{-- FAQ SECTION --}}
    <div class="max-w-4xl mx-auto space-y-8 pt-4">
        <div class="text-center">
            <div class="inline-block px-3 py-1 rounded-full bg-gold-400/10 border border-gold-400/20 text-gold-400 text-[10px] tracking-[0.2em] uppercase mb-2 font-mono">
                PEDOMAN & KEPASTIAN
            </div>
            <h2 class="text-2xl sm:text-4xl font-serif text-white tracking-wide mb-2">
                Pertanyaan Yang Sering Dituturkan
            </h2>
            <p class="text-gray-400 text-xs sm:text-sm font-light">
                Temukan kejelasan seputar pemesanan, peracikan numerologi, dan pengantaran wewangian Anda.
            </p>
        </div>

        {{-- Accordion Items --}}
        <div class="space-y-4">
            {{-- FAQ 1 --}}
            <details class="bg-panel border border-gold-400/20 rounded-xl group overflow-hidden">
                <summary class="p-5 font-serif text-sm sm:text-base text-white hover:text-gold-300 cursor-pointer flex justify-between items-center list-none select-none">
                    <span>Bagaimana jika saya tidak mengetahui jam lahir saya secara pasti?</span>
                    <span class="text-gold-400 text-xl group-open:rotate-45 transition-transform duration-300">+</span>
                </summary>
                <div class="px-5 pb-5 text-xs text-gray-300 font-light leading-relaxed border-t border-white/5 pt-3">
                    Numerologi ASYIHAN dihitung berdasarkan tanggal, bulan, dan tahun kelahiran (bukan jam lahir), sehingga hasil pembacaan arketipe Anda tetap 100% akurat.
                </div>
            </details>

            {{-- FAQ 2 --}}
            <details class="bg-panel border border-gold-400/20 rounded-xl group overflow-hidden">
                <summary class="p-5 font-serif text-sm sm:text-base text-white hover:text-gold-300 cursor-pointer flex justify-between items-center list-none select-none">
                    <span>Berapa lama ketahanan aroma Extrait de Parfum ASYIHAN?</span>
                    <span class="text-gold-400 text-xl group-open:rotate-45 transition-transform duration-300">+</span>
                </summary>
                <div class="px-5 pb-5 text-xs text-gray-300 font-light leading-relaxed border-t border-white/5 pt-3">
                    Konsentrasi Extrait de Parfum ASYIHAN (30-35% pure perfume oil) bertahan 12 hingga 18 jam di kulit, dan hingga 24+ jam pada pakaian.
                </div>
            </details>

            {{-- FAQ 3 --}}
            <details class="bg-panel border border-gold-400/20 rounded-xl group overflow-hidden">
                <summary class="p-5 font-serif text-sm sm:text-base text-white hover:text-gold-300 cursor-pointer flex justify-between items-center list-none select-none">
                    <span>Apakah pengiriman aman hingga ke seluruh penjuru Nusantara dan Mancanegara?</span>
                    <span class="text-gold-400 text-xl group-open:rotate-45 transition-transform duration-300">+</span>
                </summary>
                <div class="px-5 pb-5 text-xs text-gray-300 font-light leading-relaxed border-t border-white/5 pt-3">
                    Setiap botol dikemas dalam kotak kayu terlindung dengan segel lilin sakral dan bubble wrap berlapis, dijamin aman tiba di tujuan.
                </div>
            </details>

            {{-- FAQ 4 --}}
            <details class="bg-panel border border-gold-400/20 rounded-xl group overflow-hidden">
                <summary class="p-5 font-serif text-sm sm:text-base text-white hover:text-gold-300 cursor-pointer flex justify-between items-center list-none select-none">
                    <span>Dapatkah saya meracik aroma kustom untuk suvenir pernikahan atau korporasi?</span>
                    <span class="text-gold-400 text-xl group-open:rotate-45 transition-transform duration-300">+</span>
                </summary>
                <div class="px-5 pb-5 text-xs text-gray-300 font-light leading-relaxed border-t border-white/5 pt-3">
                    Ya, kami melayani *bespoke fragrance formulation* untuk pernikahan sakral, perhelatan eksklusif, dan cenderamata korporasi.
                </div>
            </details>
        </div>
    </div>

</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const form = document.getElementById('contact-form');
        if (form) {
            form.addEventListener('submit', function (e) {
                e.preventDefault();
                const name = document.getElementById('contact_name').value;
                const info = document.getElementById('contact_info').value;
                const dob = document.getElementById('contact_dob').value;
                const cat = document.getElementById('contact_category').value;
                const msg = document.getElementById('contact_message').value;

                const text = `✨ *PESAN KONSULTASI ASYIHAN* ✨\n\nNama: ${name}\nKontak WA: ${info}\nTanggal Lahir/Angka: ${dob || '-'}\nFokus: ${cat}\n\nPesan:\n${msg}\n\n---\nFrom Asih, Comes Essence.`;
                const url = `https://wa.me/628112144113?text=${encodeURIComponent(text)}`;
                window.open(url, '_blank');
            });
        }
    });
</script>
@endpush

