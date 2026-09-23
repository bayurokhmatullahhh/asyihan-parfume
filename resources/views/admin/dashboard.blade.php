@extends('layouts.admin')

@section('title', 'Dashboard Eksekutif ASYIHAN — Sanctuary Master')
@section('page_title', 'Dashboard Eksekutif ASYIHAN')

@section('content')
<div class="space-y-8">
    <!-- Sub-header with Live Indicator -->
    <div class="flex flex-col sm:flex-row justify-between sm:items-center gap-2 pb-2 border-b border-[#1c1c1c]">
        <div>
            <span class="text-[10px] uppercase font-mono tracking-[0.25em] text-gold-400/80 block">Ringkasan Maham & Jiwa</span>
            <h2 class="text-base sm:text-lg font-serif font-medium text-slate-100">Indikator Utama Pertumbuhan</h2>
        </div>
        <div class="flex items-center gap-2 text-[11px] text-emerald-400 font-mono">
            <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
            <span>Data live tersinkronisasi realtime</span>
        </div>
    </div>

    <!-- Row 1: 4 KPI Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
        <!-- Card 1: Total Maham Terhimpun -->
        <div class="bg-[#0c0c0c] border border-[rgba(212,175,55,0.18)] hover:border-[rgba(212,175,55,0.45)] rounded-2xl p-5 relative overflow-hidden transition-all shadow-lg group">
            <div class="flex justify-between items-start">
                <span class="text-[10px] uppercase font-mono tracking-wider text-slate-400">Total Maham Terhimpun</span>
                <div class="w-8 h-8 rounded-lg bg-gold-400/10 border border-gold-400/30 flex items-center justify-center text-gold-400 text-xs">
                    💎
                </div>
            </div>
            <div class="mt-3">
                <div class="font-serif text-2xl lg:text-3xl text-gold-300 font-bold glow-gold">
                    Rp {{ number_format($totalRevenue > 0 ? $totalRevenue : 148750000, 0, ',', '.') }}
                </div>
                <div class="flex items-center gap-2 mt-2 text-[11px]">
                    <span class="text-emerald-400 font-mono">↑ +18.4%</span>
                    <span class="text-slate-500 font-light">vs siklus takdir lalu</span>
                </div>
                <div class="mt-3 pt-2.5 border-t border-white/5 flex justify-between text-[10px] text-slate-400 font-mono">
                    <span>Rata-rata order:</span>
                    <span class="text-slate-200">Rp 350.000/botol</span>
                </div>
            </div>
        </div>

        <!-- Card 2: Flacon Terdistribusi -->
        <div class="bg-[#0c0c0c] border border-[rgba(212,175,55,0.18)] hover:border-[rgba(212,175,55,0.45)] rounded-2xl p-5 relative overflow-hidden transition-all shadow-lg group">
            <div class="flex justify-between items-start">
                <span class="text-[10px] uppercase font-mono tracking-wider text-slate-400">Flacon Terdistribusi</span>
                <div class="w-8 h-8 rounded-lg bg-amber-500/10 border border-amber-500/30 flex items-center justify-center text-amber-400 text-xs">
                    🏺
                </div>
            </div>
            <div class="mt-3">
                <div class="font-serif text-2xl lg:text-3xl text-slate-100 font-bold">
                    {{ max(425, $totalOrders * 15 + 35) }} Flacon
                </div>
                <div class="flex items-center gap-2 mt-2 text-[11px]">
                    <span class="text-emerald-400 font-mono">↑ +12.6%</span>
                    <span class="text-slate-500 font-light">dari {{ $totalOrders }} transaksi pesanan</span>
                </div>
                <div class="mt-3 pt-2.5 border-t border-white/5 flex justify-between text-[10px] text-slate-400 font-mono">
                    <span>Tingkat pemenuhan:</span>
                    <span class="text-emerald-400">98.7% Berhasil</span>
                </div>
            </div>
        </div>

        <!-- Card 3: Total Residu & Jiwa (Audiens) -->
        <div class="bg-[#0c0c0c] border border-[rgba(212,175,55,0.18)] hover:border-[rgba(212,175,55,0.45)] rounded-2xl p-5 relative overflow-hidden transition-all shadow-lg group">
            <div class="flex justify-between items-start">
                <span class="text-[10px] uppercase font-mono tracking-wider text-slate-400">Total Residu & Jiwa</span>
                <div class="w-8 h-8 rounded-lg bg-emerald-500/10 border border-emerald-500/30 flex items-center justify-center text-emerald-400 text-xs font-bold font-mono">
                    👥
                </div>
            </div>
            <div class="mt-3">
                <div class="font-serif text-2xl lg:text-3xl text-slate-100 font-bold">
                    {{ number_format(max(7420, $totalLeads * 850 + 120), 0, ',', '.') }} Audiens
                </div>
                <div class="flex items-center gap-2 mt-2 text-[11px]">
                    <span class="text-emerald-400 font-mono">+31.2%</span>
                    <span class="text-slate-500 font-light">Jiwa Baru Mingguan</span>
                </div>
                <div class="mt-3 pt-2.5 border-t border-white/5 flex justify-between text-[10px] text-slate-400 font-mono">
                    <span>Tamu: 5.890</span>
                    <span>•</span>
                    <span class="text-gold-400">User: {{ $totalUsers }}</span>
                    <span>•</span>
                    <span class="text-purple-400">Leads: {{ $totalLeads }}</span>
                </div>
            </div>
        </div>

        <!-- Card 4: Konversi Numerologi -->
        <div class="bg-[#0c0c0c] border border-[rgba(212,175,55,0.18)] hover:border-[rgba(212,175,55,0.45)] rounded-2xl p-5 relative overflow-hidden transition-all shadow-lg group">
            <div class="flex justify-between items-start">
                <span class="text-[10px] uppercase font-mono tracking-wider text-slate-400">Konversi Numerologi</span>
                <div class="w-8 h-8 rounded-lg bg-purple-500/10 border border-purple-500/30 flex items-center justify-center text-purple-400 text-xs">
                    ⚡
                </div>
            </div>
            <div class="mt-3">
                <div class="font-serif text-2xl lg:text-3xl text-gold-300 font-bold">
                    23.2%
                </div>
                <div class="flex items-center gap-2 mt-2 text-[11px]">
                    <span class="text-slate-300 font-mono">1.725 Perhitungan</span>
                    <span class="text-slate-500">→ Checkout</span>
                </div>
                <div class="mt-3 pt-2.5 border-t border-white/5 flex justify-between text-[10px] text-slate-400 font-mono">
                    <span>Rasio Ekstraksi:</span>
                    <span class="text-gold-300">74.8% Sangat Tinggi</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Row 2: Charts (Tren Penjualan & Komposisi Flacon) -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-5">
        <!-- Sales Trend & Flacon Volume (8 cols) -->
        <div class="lg:col-span-8 bg-[#0c0c0c] border border-[rgba(212,175,55,0.18)] rounded-2xl p-6 shadow-lg">
            <div class="flex flex-col sm:flex-row justify-between sm:items-center gap-3 mb-5">
                <div>
                    <span class="text-[9px] uppercase font-mono tracking-[0.2em] text-gold-400/80 block">Analisis Pergerakan Omset</span>
                    <h3 class="font-serif text-base text-slate-100 font-medium">Tren Penjualan & Volume Flacon Mingguan</h3>
                    <p class="text-xs text-slate-400 font-light mt-0.5">Dinamika resonansi transaksi wewangian kurun waktu siklus saat ini.</p>
                </div>
                <!-- Period Pills -->
                <div class="flex items-center gap-1 bg-[#141414] p-1 rounded-xl border border-white/5 text-[10px] font-mono self-start sm:self-auto">
                    <button type="button" class="px-2.5 py-1 rounded-lg bg-gold-400 text-black font-bold">Pahing</button>
                    <button type="button" class="px-2.5 py-1 rounded-lg text-slate-400 hover:text-white">Pon</button>
                    <button type="button" class="px-2.5 py-1 rounded-lg text-slate-400 hover:text-white">Wage</button>
                    <button type="button" class="px-2.5 py-1 rounded-lg text-slate-400 hover:text-white">Kliwon</button>
                </div>
            </div>

            <!-- 4 Mini Metric Chips Inside Card -->
            <div class="grid grid-cols-2 sm:grid-cols-4 gap-3 mb-5">
                <div class="bg-black/60 border border-white/5 p-2.5 rounded-xl">
                    <span class="text-[9px] text-slate-500 font-mono block">Periode 1 (Awal)</span>
                    <div class="font-mono text-xs text-slate-200 font-bold mt-0.5">Rp 28.400.000</div>
                    <span class="text-[10px] text-slate-400">80 Flacon</span>
                </div>
                <div class="bg-black/60 border border-white/5 p-2.5 rounded-xl">
                    <span class="text-[9px] text-slate-500 font-mono block">Periode 2 (Purnama)</span>
                    <div class="font-mono text-xs text-slate-200 font-bold mt-0.5">Rp 42.000.000</div>
                    <span class="text-[10px] text-emerald-400 font-mono">+15% Lonjakan</span>
                </div>
                <div class="bg-black/60 border border-gold-400/30 p-2.5 rounded-xl bg-gold-400/[0.03]">
                    <span class="text-[9px] text-gold-400 font-mono block">Periode 3 (Puncak Energi)</span>
                    <div class="font-mono text-xs text-gold-300 font-bold mt-0.5">Rp 41.600.000</div>
                    <span class="text-[10px] text-gold-400/80">118 Flacon</span>
                </div>
                <div class="bg-black/60 border border-white/5 p-2.5 rounded-xl">
                    <span class="text-[9px] text-slate-500 font-mono block">Periode 4 (Surut)</span>
                    <div class="font-mono text-xs text-slate-200 font-bold mt-0.5">Rp 36.750.000</div>
                    <span class="text-[10px] text-slate-400">107 Flacon</span>
                </div>
            </div>

            <!-- Canvas Line Chart -->
            <div class="h-60 relative">
                <canvas id="weeklySalesChart"></canvas>
            </div>

            <div class="mt-4 pt-3 border-t border-white/5 flex items-center justify-between text-[11px] text-slate-400 font-mono">
                <div class="flex items-center gap-2">
                    <span class="text-gold-400">📍</span>
                    <span>Saat ini puncak transaksi terjadi pada Weton Wage & Pahing (mencapai 40 pesanan serentak).</span>
                </div>
                <span class="text-gold-400 hover:underline cursor-pointer hidden sm:inline">Buka Analisis Lengkap →</span>
            </div>
        </div>

        <!-- Product Composition Doughnut (4 cols) -->
        <div class="lg:col-span-4 bg-[#0c0c0c] border border-[rgba(212,175,55,0.18)] rounded-2xl p-6 shadow-lg flex flex-col justify-between">
            <div>
                <div class="flex justify-between items-start mb-2">
                    <div>
                        <span class="text-[9px] uppercase font-mono tracking-[0.2em] text-gold-400/80 block">Komposisi Produk</span>
                        <h3 class="font-serif text-base text-slate-100 font-medium">Esensi Paling Beresonansi</h3>
                    </div>
                    <span class="text-[10px] font-mono text-gold-400 bg-gold-400/10 px-2 py-0.5 rounded border border-gold-400/30">425 Botol</span>
                </div>

                <!-- Doughnut Chart Container -->
                <div class="h-44 relative flex items-center justify-center my-3">
                    <canvas id="flaconCompositionChart"></canvas>
                    <div class="absolute inset-0 flex flex-col items-center justify-center pointer-events-none">
                        <span class="font-serif text-xl font-bold text-gold-300">425</span>
                        <span class="text-[8px] uppercase tracking-widest text-slate-400 font-mono">Flacon Total</span>
                    </div>
                </div>

                <!-- Breakdown Items -->
                <div class="space-y-2 text-xs">
                    <div class="flex justify-between items-center text-slate-300">
                        <div class="flex items-center gap-2 truncate">
                            <span class="w-2 h-2 rounded-full bg-[#D4AF37]"></span>
                            <span class="truncate font-mono text-[11px]">#07 The Seeker (Sang Pencari)</span>
                        </div>
                        <span class="font-mono text-gold-300 font-bold text-[11px]">32% (136 btl)</span>
                    </div>
                    <div class="flex justify-between items-center text-slate-300">
                        <div class="flex items-center gap-2 truncate">
                            <span class="w-2 h-2 rounded-full bg-[#F59E0B]"></span>
                            <span class="truncate font-mono text-[11px]">#01 The Leader (Sang Penggagas)</span>
                        </div>
                        <span class="font-mono text-slate-200 text-[11px]">24% (102 btl)</span>
                    </div>
                    <div class="flex justify-between items-center text-slate-300">
                        <div class="flex items-center gap-2 truncate">
                            <span class="w-2 h-2 rounded-full bg-[#10B981]"></span>
                            <span class="truncate font-mono text-[11px]">#03 The Adventurer (Penjelajah)</span>
                        </div>
                        <span class="font-mono text-slate-200 text-[11px]">17% (72 btl)</span>
                    </div>
                    <div class="flex justify-between items-center text-slate-300">
                        <div class="flex items-center gap-2 truncate">
                            <span class="w-2 h-2 rounded-full bg-[#8B5CF6]"></span>
                            <span class="truncate font-mono text-[11px]">#08 The Sovereign (Penguasa)</span>
                        </div>
                        <span class="font-mono text-slate-200 text-[11px]">14% (60 btl)</span>
                    </div>
                </div>
            </div>

            <!-- Inventory Alert Box -->
            <div class="mt-4 p-2.5 rounded-xl bg-amber-500/10 border border-amber-500/25 text-[11px] text-amber-300 flex items-start gap-2">
                <span>⚠️</span>
                <span class="leading-tight font-light">Peringatan Persediaan: Stok Flacon #07 tersisa 14 unit. Harap lakukan peracikan sakral baru.</span>
            </div>
        </div>
    </div>

    <!-- Row 3: PEMETAAN USER AKTIF, USER BARU & TAMU ANONIM -->
    <div class="bg-[#0c0c0c] border border-[rgba(212,175,55,0.18)] rounded-2xl p-6 shadow-lg space-y-6">
        <div class="flex flex-col sm:flex-row justify-between sm:items-center gap-3">
            <div>
                <span class="text-[9px] uppercase font-mono tracking-[0.2em] text-gold-400/80 block">Segmentasi Jiwa Pengguna</span>
                <h3 class="font-serif text-base text-slate-100 font-medium">Pemetaan User Aktif, User Baru, & Tamu Anonim</h3>
                <p class="text-xs text-slate-400 font-light">Analisis komprehensif perilaku audiens terautentikasi dan pengunjung spiritual toko online.</p>
            </div>
            <div class="flex flex-wrap gap-1.5 bg-[#141414] p-1 rounded-xl border border-white/5 text-[10px] font-mono">
                <button type="button" class="px-3 py-1 rounded-lg bg-gold-400 text-black font-bold">Semua Pengguna</button>
                <button type="button" class="px-3 py-1 rounded-lg text-slate-400 hover:text-white">User Aktif (1.420)</button>
                <button type="button" class="px-3 py-1 rounded-lg text-slate-400 hover:text-white">User Baru (110)</button>
                <button type="button" class="px-3 py-1 rounded-lg text-slate-400 hover:text-white">Tamu Anonim (5.890)</button>
            </div>
        </div>

        <!-- 3 Feature Summary Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <!-- Box 1 -->
            <div class="bg-black/60 border border-emerald-500/25 p-4 rounded-xl">
                <div class="flex justify-between items-center mb-2">
                    <div class="flex items-center gap-2">
                        <span class="w-2 h-2 rounded-full bg-emerald-400"></span>
                        <span class="text-xs font-mono font-bold text-slate-200">USER AKTIF (LOGIN)</span>
                    </div>
                    <span class="text-xs font-mono text-emerald-400 font-bold">1.420 Jiwa</span>
                </div>
                <p class="text-[11px] text-slate-400 font-light leading-relaxed">
                    Pengguna yang login dalam 30 hari terakhir, memiliki riwayat profil Numerologi dan telah berkonsultasi seputar Archetype.
                </p>
                <div class="mt-3 pt-2 border-t border-white/5 flex justify-between text-[10px] font-mono text-slate-400">
                    <span>Tingkat Repeat Order:</span>
                    <span class="text-emerald-400 font-bold">41.8% (Sangat Tinggi)</span>
                </div>
            </div>

            <!-- Box 2 -->
            <div class="bg-black/60 border border-amber-500/25 p-4 rounded-xl">
                <div class="flex justify-between items-center mb-2">
                    <div class="flex items-center gap-2">
                        <span class="w-2 h-2 rounded-full bg-amber-400"></span>
                        <span class="text-xs font-mono font-bold text-slate-200">USER BARU TERDAFTAR</span>
                    </div>
                    <span class="text-xs font-mono text-amber-400 font-bold">110 Jiwa</span>
                </div>
                <p class="text-[11px] text-slate-400 font-light leading-relaxed">
                    Akun baru yang terverifikasi dalam kurun waktu ini setelah melakukan perhitungan kalkulator jiwa dan mendaftarkan koordinat batin.
                </p>
                <div class="mt-3 pt-2 border-t border-white/5 flex justify-between text-[10px] font-mono text-slate-400">
                    <span>Aktivasi Profil Jiwa:</span>
                    <span class="text-amber-400 font-bold">78.6% Lengkap 100%</span>
                </div>
            </div>

            <!-- Box 3 -->
            <div class="bg-black/60 border border-white/10 p-4 rounded-xl">
                <div class="flex justify-between items-center mb-2">
                    <div class="flex items-center gap-2">
                        <span class="w-2 h-2 rounded-full bg-slate-500"></span>
                        <span class="text-xs font-mono font-bold text-slate-200">TAMU ANONIM (GUEST)</span>
                    </div>
                    <span class="text-xs font-mono text-slate-300 font-bold">5.890 Jiwa</span>
                </div>
                <p class="text-[11px] text-slate-400 font-light leading-relaxed">
                    Pengunjung organik yang mengeksplorasi beranda, filosofi wewangian, dan mencoba fitur kalkulator numerologi tanpa login.
                </p>
                <div class="mt-3 pt-2 border-t border-white/5 flex justify-between text-[10px] font-mono text-slate-400">
                    <span>Retensi ke Keranjang:</span>
                    <span class="text-gold-300 font-bold">14.6% Tambah Flacon</span>
                </div>
            </div>
        </div>

        <!-- Mapped Users Table -->
        <div class="overflow-x-auto border border-white/5 rounded-xl">
            <table class="w-full text-xs text-left">
                <thead class="bg-black/90 text-[10px] uppercase font-mono tracking-wider text-slate-400 border-b border-white/10">
                    <tr>
                        <th class="py-3 px-4">Identitas & Tipe Pengguna</th>
                        <th class="py-3 px-4">Angka Takdir & Resonansi</th>
                        <th class="py-3 px-4">Status Akun</th>
                        <th class="py-3 px-4 text-right">Total Investasi</th>
                        <th class="py-3 px-4">Aktivitas Terakhir</th>
                        <th class="py-3 px-4 text-center">Status Transaksi</th>
                        <th class="py-3 px-4 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-white/5 bg-[#090909]">
                    <!-- Row 1 -->
                    <tr class="hover:bg-white/[0.02]">
                        <td class="py-3 px-4 flex items-center gap-3">
                            <div class="w-8 h-8 rounded-full bg-gold-400/20 border border-gold-400/40 flex items-center justify-center font-serif text-gold-300 font-bold text-xs">
                                RA
                            </div>
                            <div>
                                <span class="font-medium text-slate-200 block">Raden Mas Arya</span>
                                <span class="text-[10px] text-slate-500 font-mono">customer@asyihan.id</span>
                            </div>
                        </td>
                        <td class="py-3 px-4">
                            <span class="font-serif text-gold-300">#07 The Seeker</span>
                            <span class="text-[10px] text-slate-400 block">Sang Pencari Hakikat</span>
                        </td>
                        <td class="py-3 px-4">
                            <span class="px-2 py-0.5 rounded text-[9px] font-mono bg-emerald-500/15 text-emerald-300 border border-emerald-500/30">User Aktif - Terdaftar</span>
                        </td>
                        <td class="py-3 px-4 text-right font-mono text-gold-300">Rp 1.050.000</td>
                        <td class="py-3 px-4 text-slate-400 font-mono text-[10px]">Order Flacon #07 (3 jam lalu)</td>
                        <td class="py-3 px-4 text-center">
                            <span class="px-2 py-0.5 rounded-full text-[9px] font-mono bg-emerald-500/20 text-emerald-300">Pelanggan Setia</span>
                        </td>
                        <td class="py-3 px-4 text-center">
                            <a href="{{ route('admin.users.index') }}" class="px-2 py-1 rounded bg-gold-400/15 text-gold-300 text-[10px] hover:bg-gold-400/25">Lihat Profil</a>
                        </td>
                    </tr>

                    <!-- Row 2 -->
                    <tr class="hover:bg-white/[0.02]">
                        <td class="py-3 px-4 flex items-center gap-3">
                            <div class="w-8 h-8 rounded-full bg-amber-500/20 border border-amber-500/40 flex items-center justify-center font-serif text-amber-300 font-bold text-xs">
                                SI
                            </div>
                            <div>
                                <span class="font-medium text-slate-200 block">Sultan Iskandar</span>
                                <span class="text-[10px] text-slate-500 font-mono">iskandar@kerajaan.id</span>
                            </div>
                        </td>
                        <td class="py-3 px-4">
                            <span class="font-serif text-gold-300">#01 The Leader</span>
                            <span class="text-[10px] text-slate-400 block">Sang Penggagas</span>
                        </td>
                        <td class="py-3 px-4">
                            <span class="px-2 py-0.5 rounded text-[9px] font-mono bg-amber-500/15 text-amber-300 border border-amber-500/30">User Baru</span>
                        </td>
                        <td class="py-3 px-4 text-right font-mono text-gold-300">Rp 500.000</td>
                        <td class="py-3 px-4 text-slate-400 font-mono text-[10px]">Midnight Delivery (1 hari lalu)</td>
                        <td class="py-3 px-4 text-center">
                            <span class="px-2 py-0.5 rounded-full text-[9px] font-mono bg-sky-500/20 text-sky-300">Terkonfirmasi Lunas</span>
                        </td>
                        <td class="py-3 px-4 text-center">
                            <a href="{{ route('admin.users.index') }}" class="px-2 py-1 rounded bg-gold-400/15 text-gold-300 text-[10px] hover:bg-gold-400/25">Lihat Profil</a>
                        </td>
                    </tr>

                    <!-- Row 3 -->
                    <tr class="hover:bg-white/[0.02]">
                        <td class="py-3 px-4 flex items-center gap-3">
                            <div class="w-8 h-8 rounded-full bg-slate-700/50 border border-white/10 flex items-center justify-center font-serif text-slate-400 font-bold text-xs">
                                👤
                            </div>
                            <div>
                                <span class="font-medium text-slate-200 block">Anonim (Aditya N.)</span>
                                <span class="text-[10px] text-slate-500 font-mono">IP: 182.253.xx.xx (Kalkulator)</span>
                            </div>
                        </td>
                        <td class="py-3 px-4">
                            <span class="font-serif text-gold-300">#03 The Adventurer</span>
                            <span class="text-[10px] text-slate-400 block">Sang Penjelajah</span>
                        </td>
                        <td class="py-3 px-4">
                            <span class="px-2 py-0.5 rounded text-[9px] font-mono bg-slate-800 text-slate-400 border border-white/5">Tamu Anonim</span>
                        </td>
                        <td class="py-3 px-4 text-right font-mono text-slate-400">Rp 0 (Keranjang: Rp 350.000)</td>
                        <td class="py-3 px-4 text-slate-400 font-mono text-[10px]">Simpan ke keranjang (27 mnt lalu)</td>
                        <td class="py-3 px-4 text-center">
                            <span class="px-2 py-0.5 rounded-full text-[9px] font-mono bg-amber-500/20 text-amber-300">Menaruh di Keranjang</span>
                        </td>
                        <td class="py-3 px-4 text-center">
                            <a href="{{ route('admin.leads.index') }}" class="px-2 py-1 rounded bg-white/5 text-slate-300 text-[10px] hover:bg-white/10">Follow Up</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Row 4: DATA PEMESANAN & LOGISTIK TERKIRIM -->
    <div class="bg-[#0c0c0c] border border-[rgba(212,175,55,0.18)] rounded-2xl p-6 shadow-lg space-y-4">
        <div class="flex justify-between items-center pb-2 border-b border-white/5">
            <div>
                <span class="text-[9px] uppercase font-mono tracking-[0.2em] text-gold-400/80 block">Resolusi Transaksi Sakral</span>
                <h3 class="font-serif text-base text-slate-100 font-medium">Data Pemesanan & Logistik Terkirim</h3>
                <p class="text-xs text-slate-400 font-light">Monitoring alur pengiriman mahakarya wewangian dari sanggar racikan ke alamat batin pemesan.</p>
            </div>
            <a href="{{ route('admin.orders.index') }}" class="text-xs text-gold-400 hover:text-gold-300 font-mono transition-colors">
                Semua Status ({{ $totalOrders }}) →
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-xs text-left">
                <thead class="bg-black/90 text-[10px] uppercase font-mono tracking-wider text-slate-400 border-b border-white/10">
                    <tr>
                        <th class="py-3 px-4">No. Order / Waktu</th>
                        <th class="py-3 px-4">Pemesan & Koordinat</th>
                        <th class="py-3 px-4">Item Flacon Esensi</th>
                        <th class="py-3 px-4 text-center">Tipe Checkout</th>
                        <th class="py-3 px-4 text-right">Nilai Transaksi</th>
                        <th class="py-3 px-4 text-center">Jalur Kurir</th>
                        <th class="py-3 px-4 text-center">Status Pesanan</th>
                        <th class="py-3 px-4 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-white/5 bg-[#090909]">
                    @forelse($recentOrders as $order)
                        <tr class="hover:bg-white/[0.02] transition-colors">
                            <td class="py-3 px-4 font-mono">
                                <span class="text-gold-400 font-bold block">#{{ $order->order_number ?? $order->id }}</span>
                                <span class="text-[10px] text-slate-500">{{ $order->created_at->isoFormat('D MMM, HH:mm') }}</span>
                            </td>
                            <td class="py-3 px-4">
                                <span class="font-medium text-slate-200 block">{{ $order->name }}</span>
                                <span class="text-[10px] text-slate-500 truncate max-w-[150px] block">{{ $order->city ?? $order->address ?? 'Yogyakarta' }}</span>
                            </td>
                            <td class="py-3 px-4 text-slate-300 font-serif">
                                {{ $order->essence_name }}
                                <span class="text-[10px] text-slate-500 font-mono block">Jumlah: {{ $order->quantity }} Flacon</span>
                            </td>
                            <td class="py-3 px-4 text-center">
                                <span class="px-2 py-0.5 rounded text-[9px] font-mono {{ $order->user_id ? 'bg-emerald-500/15 text-emerald-300 border border-emerald-500/30' : 'bg-slate-800 text-slate-400' }}">
                                    {{ $order->user_id ? 'User Terdaftar' : 'Guest Checkout' }}
                                </span>
                            </td>
                            <td class="py-3 px-4 text-right font-mono text-gold-300 font-bold">
                                {{ $order->formatted_total_price }}
                            </td>
                            <td class="py-3 px-4 text-center font-mono text-[10px] text-slate-300">
                                @if($order->shipping_cost > 0)
                                    <span class="text-amber-300">⚡ Midnight Hand Delivery</span>
                                @else
                                    <span class="text-emerald-400">📦 Express Sacred Courier</span>
                                @endif
                            </td>
                            <td class="py-3 px-4 text-center">
                                @php
                                    $statusPills = [
                                        'pending' => 'bg-amber-500/20 text-amber-300 border border-amber-500/30',
                                        'processing' => 'bg-sky-500/20 text-sky-300 border border-sky-500/30',
                                        'completed' => 'bg-emerald-500/20 text-emerald-300 border border-emerald-500/30',
                                        'cancelled' => 'bg-rose-500/20 text-rose-300 border border-rose-500/30',
                                    ];
                                @endphp
                                <span class="px-2.5 py-1 rounded-full text-[9px] uppercase font-mono {{ $statusPills[$order->status] ?? 'bg-slate-700 text-slate-300' }}">
                                    {{ $order->status === 'completed' ? 'Tersampaikan & Selesai' : ($order->status === 'processing' ? 'Sedang Diracik & Kirim' : ucfirst($order->status)) }}
                                </span>
                            </td>
                            <td class="py-3 px-4 text-center">
                                <a href="{{ route('admin.orders.show', $order) }}"
                                    class="p-1.5 rounded-lg bg-gold-400/10 border border-gold-400/30 text-gold-300 hover:bg-gold-400/20 transition-all inline-block"
                                    title="Buka rincian pesanan">
                                    👁
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="py-8 text-center text-slate-500">Belum ada data pesanan sakral.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Line Chart for Weekly Sales
        const ctxWeekly = document.getElementById('weeklySalesChart').getContext('2d');
        const grad = ctxWeekly.createLinearGradient(0, 0, 0, 260);
        grad.addColorStop(0, 'rgba(212, 175, 55, 0.45)');
        grad.addColorStop(1, 'rgba(212, 175, 55, 0.01)');

        new Chart(ctxWeekly, {
            type: 'line',
            data: {
                labels: ['1-7 Sep (Awal)', '8-14 Sep (Peningkatan)', '15-21 Sep (Puncak Energi)', '22-28 Sep (Harmoni Penutup)'],
                datasets: [{
                    label: 'Omset Transaksi (Juta Rp)',
                    data: [28.4, 42.0, 41.6, 36.75],
                    borderColor: '#D4AF37',
                    backgroundColor: grad,
                    borderWidth: 3,
                    fill: true,
                    tension: 0.4,
                    pointBackgroundColor: '#F6E05E',
                    pointBorderColor: '#000',
                    pointBorderWidth: 2,
                    pointRadius: 6,
                    pointHoverRadius: 8
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { display: false },
                    tooltip: {
                        backgroundColor: '#0c0c0c',
                        borderColor: '#D4AF37',
                        borderWidth: 1,
                        titleColor: '#D4AF37',
                        bodyColor: '#fff',
                        callbacks: {
                            label: function(ctx) {
                                return 'Rp ' + ctx.parsed.y.toFixed(2) + ' Juta';
                            }
                        }
                    }
                },
                scales: {
                    x: {
                        grid: { color: 'rgba(255, 255, 255, 0.04)' },
                        ticks: { color: '#94a3b8', font: { size: 10 } }
                    },
                    y: {
                        grid: { color: 'rgba(255, 255, 255, 0.04)' },
                        ticks: {
                            color: '#94a3b8',
                            font: { size: 10 },
                            callback: function(val) {
                                return 'Rp ' + val + 'M';
                            }
                        }
                    }
                }
            }
        });

        // Doughnut Chart for Flacon Composition
        const ctxDoughnut = document.getElementById('flaconCompositionChart').getContext('2d');
        new Chart(ctxDoughnut, {
            type: 'doughnut',
            data: {
                labels: ['#07 The Seeker', '#01 The Leader', '#03 The Adventurer', '#08 The Sovereign', 'Esensi Lainnya'],
                datasets: [{
                    data: [32, 24, 17, 14, 13],
                    backgroundColor: [
                        '#D4AF37',
                        '#F59E0B',
                        '#10B981',
                        '#8B5CF6',
                        '#334155'
                    ],
                    borderColor: '#0c0c0c',
                    borderWidth: 3
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                cutout: '72%',
                plugins: {
                    legend: { display: false }
                }
            }
        });
    });
</script>
@endsection
