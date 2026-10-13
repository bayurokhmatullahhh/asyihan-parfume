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
                    Rp {{ number_format($totalRevenue, 0, ',', '.') }}
                </div>
                <div class="flex items-center gap-2 mt-2 text-[11px]">
                    <span class="{{ $revenueGrowth >= 0 ? 'text-emerald-400' : 'text-rose-400' }} font-mono">
                        {{ $revenueGrowth >= 0 ? '↑ +' : '↓ ' }}{{ $revenueGrowth }}%
                    </span>
                    <span class="text-slate-500 font-light">vs siklus minggu lalu</span>
                </div>
                <div class="mt-3 pt-2.5 border-t border-white/5 flex justify-between text-[10px] text-slate-400 font-mono">
                    <span>Rata-rata order:</span>
                    <span class="text-slate-200">Rp {{ number_format($averageOrderValue, 0, ',', '.') }}/order</span>
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
                    {{ number_format($totalFlacon, 0, ',', '.') }} Flacon
                </div>
                <div class="flex items-center gap-2 mt-2 text-[11px]">
                    <span class="{{ $flaconGrowth >= 0 ? 'text-emerald-400' : 'text-rose-400' }} font-mono">
                        {{ $flaconGrowth >= 0 ? '↑ +' : '↓ ' }}{{ $flaconGrowth }}%
                    </span>
                    <span class="text-slate-500 font-light">dari {{ $totalOrders }} transaksi pesanan</span>
                </div>
                <div class="mt-3 pt-2.5 border-t border-white/5 flex justify-between text-[10px] text-slate-400 font-mono">
                    <span>Tingkat pemenuhan:</span>
                    <span class="text-emerald-400">{{ $fulfillmentRate }}% Berhasil</span>
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
                    {{ number_format($totalUsers + $totalLeads, 0, ',', '.') }} Jiwa
                </div>
                <div class="flex items-center gap-2 mt-2 text-[11px]">
                    <span class="text-emerald-400 font-mono">+{{ $newUsersThisWeek }}</span>
                    <span class="text-slate-500 font-light">Jiwa Baru Minggu Ini</span>
                </div>
                <div class="mt-3 pt-2.5 border-t border-white/5 flex justify-between text-[10px] text-slate-400 font-mono">
                    <span class="text-gold-400">User: {{ $totalUsers }}</span>
                    <span>•</span>
                    <span class="text-purple-400">Leads: {{ $totalLeads }}</span>
                    <span>•</span>
                    <span class="text-sky-400">Produk: {{ $totalProducts }}</span>
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
                    {{ $conversionRate }}%
                </div>
                <div class="flex items-center gap-2 mt-2 text-[11px]">
                    <span class="text-slate-300 font-mono">{{ $totalLeads }} Perhitungan</span>
                    <span class="text-slate-500">→ {{ $totalOrders }} Order</span>
                </div>
                <div class="mt-3 pt-2.5 border-t border-white/5 flex justify-between text-[10px] text-slate-400 font-mono">
                    <span>Katalog Aktif:</span>
                    <span class="text-gold-300">{{ $totalProducts }} Mahakarya</span>
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

            <!-- 4 Mini Metric Chips Inside Card (Real Data from Last 4 Days) -->
            <div class="grid grid-cols-2 sm:grid-cols-4 gap-3 mb-5">
                @php
                    $recentDays = $days->take(-4)->values();
                    $recentRev = $revenueData->take(-4)->values();
                    $recentQty = $ordersCountData->take(-4)->values();
                @endphp
                @foreach($recentDays as $idx => $dName)
                    <div class="bg-black/60 border {{ $idx === 3 ? 'border-gold-400/30 bg-gold-400/[0.03]' : 'border-white/5' }} p-2.5 rounded-xl">
                        <span class="text-[9px] {{ $idx === 3 ? 'text-gold-400' : 'text-slate-500' }} font-mono block">{{ $dName }}</span>
                        <div class="font-mono text-xs {{ $idx === 3 ? 'text-gold-300' : 'text-slate-200' }} font-bold mt-0.5">
                            Rp {{ number_format($recentRev[$idx] ?? 0, 0, ',', '.') }}
                        </div>
                        <span class="text-[10px] {{ $idx === 3 ? 'text-gold-400/80' : 'text-slate-400' }}">
                            {{ $recentQty[$idx] ?? 0 }} Pesanan
                        </span>
                    </div>
                @endforeach
            </div>

            <!-- Canvas Line Chart -->
            <div class="h-60 relative">
                <canvas id="weeklySalesChart"></canvas>
            </div>

            <div class="mt-4 pt-3 border-t border-white/5 flex items-center justify-between text-[11px] text-slate-400 font-mono">
                <div class="flex items-center gap-2">
                    <span class="text-gold-400">📍</span>
                    <span>Monitoring dinamika pergerakan omset real-time 7 hari terakhir dari database.</span>
                </div>
                <a href="{{ route('admin.orders.index') }}" class="text-gold-400 hover:underline cursor-pointer hidden sm:inline">Buka Riwayat Order →</a>
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
                    <span class="text-[10px] font-mono text-gold-400 bg-gold-400/10 px-2 py-0.5 rounded border border-gold-400/30">{{ $totalFlacon }} Flacon</span>
                </div>

                <!-- Doughnut Chart Container -->
                <div class="h-44 relative flex items-center justify-center my-3">
                    <canvas id="flaconCompositionChart"></canvas>
                    <div class="absolute inset-0 flex flex-col items-center justify-center pointer-events-none">
                        <span class="font-serif text-xl font-bold text-gold-300">{{ $totalFlacon }}</span>
                        <span class="text-[8px] uppercase tracking-widest text-slate-400 font-mono">Flacon Total</span>
                    </div>
                </div>

                <!-- Breakdown Items (Real Top Products) -->
                <div class="space-y-2 text-xs">
                    @php
                        $chartColors = ['#D4AF37', '#F59E0B', '#10B981', '#8B5CF6', '#38BDF8'];
                    @endphp
                    @forelse($topProducts as $idx => $tp)
                        @php
                            $pct = $totalFlacon > 0 ? round(($tp->total_qty / $totalFlacon) * 100, 1) : 0;
                            $dotColor = $chartColors[$idx % count($chartColors)];
                        @endphp
                        <div class="flex justify-between items-center text-slate-300">
                            <div class="flex items-center gap-2 truncate">
                                <span class="w-2 h-2 rounded-full" style="background-color: {{ $dotColor }};"></span>
                                <span class="truncate font-mono text-[11px]">{{ $tp->product_name }}</span>
                            </div>
                            <span class="font-mono text-gold-300 font-bold text-[11px]">{{ $pct }}% ({{ $tp->total_qty }} btl)</span>
                        </div>
                    @empty
                        <div class="text-center py-4 text-slate-500 font-mono text-[11px]">
                            Belum ada distribusi pesanan flacon.
                        </div>
                    @endforelse
                </div>
            </div>

            <!-- Inventory Alert Box (Real Low Stock) -->
            @if($lowStockProducts->isNotEmpty())
                <div class="mt-4 p-2.5 rounded-xl bg-amber-500/10 border border-amber-500/25 text-[11px] text-amber-300 flex items-start gap-2">
                    <span>⚠️</span>
                    <span class="leading-tight font-light">
                        Peringatan Persediaan: 
                        @foreach($lowStockProducts as $lp)
                            <strong>{{ $lp->name }}</strong> sisa {{ $lp->stock }} botol{{ !$loop->last ? ', ' : '.' }}
                        @endforeach
                        Harap periksa altar gudang.
                    </span>
                </div>
            @else
                <div class="mt-4 p-2.5 rounded-xl bg-emerald-500/10 border border-emerald-500/25 text-[11px] text-emerald-300 flex items-start gap-2">
                    <span>✓</span>
                    <span class="leading-tight font-light">Persediaan Aman: Seluruh stok wewangian aktif berada dalam ambang batas optimal.</span>
                </div>
            @endif
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
                <button type="button" class="px-3 py-1 rounded-lg bg-gold-400 text-black font-bold">Semua Jiwa ({{ $totalUsers + $totalLeads }})</button>
                <button type="button" class="px-3 py-1 rounded-lg text-slate-400 hover:text-white">User Terdaftar ({{ $totalUsers }})</button>
                <button type="button" class="px-3 py-1 rounded-lg text-slate-400 hover:text-white">User Baru ({{ $newUsersThisWeek }})</button>
                <button type="button" class="px-3 py-1 rounded-lg text-slate-400 hover:text-white">Leads Numerologi ({{ $totalLeads }})</button>
            </div>
        </div>

        <!-- 3 Feature Summary Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <!-- Box 1 -->
            <div class="bg-black/60 border border-emerald-500/25 p-4 rounded-xl">
                <div class="flex justify-between items-center mb-2">
                    <div class="flex items-center gap-2">
                        <span class="w-2 h-2 rounded-full bg-emerald-400"></span>
                        <span class="text-xs font-mono font-bold text-slate-200">USER TERDAFTAR (LOGIN)</span>
                    </div>
                    <span class="text-xs font-mono text-emerald-400 font-bold">{{ $totalUsers }} Jiwa</span>
                </div>
                <p class="text-[11px] text-slate-400 font-light leading-relaxed">
                    Pengguna terautentikasi yang memiliki akun sakral, profil tersimpan, dan akses ke riwayat pesanan serta altar batin.
                </p>
                <div class="mt-3 pt-2 border-t border-white/5 flex justify-between text-[10px] font-mono text-slate-400">
                    <span>Transaksi Terkait:</span>
                    <span class="text-emerald-400 font-bold">{{ $totalOrders }} Pesanan</span>
                </div>
            </div>

            <!-- Box 2 -->
            <div class="bg-black/60 border border-amber-500/25 p-4 rounded-xl">
                <div class="flex justify-between items-center mb-2">
                    <div class="flex items-center gap-2">
                        <span class="w-2 h-2 rounded-full bg-amber-400"></span>
                        <span class="text-xs font-mono font-bold text-slate-200">USER BARU MINGGU INI</span>
                    </div>
                    <span class="text-xs font-mono text-amber-400 font-bold">{{ $newUsersThisWeek }} Jiwa</span>
                </div>
                <p class="text-[11px] text-slate-400 font-light leading-relaxed">
                    Akun baru yang terverifikasi dalam siklus mingguan saat ini setelah melakukan registrasi dan penyelarasan takdir.
                </p>
                <div class="mt-3 pt-2 border-t border-white/5 flex justify-between text-[10px] font-mono text-slate-400">
                    <span>Pertumbuhan:</span>
                    <span class="text-amber-400 font-bold">+{{ $newUsersThisWeek }} Akun Baru</span>
                </div>
            </div>

            <!-- Box 3 -->
            <div class="bg-black/60 border border-white/10 p-4 rounded-xl">
                <div class="flex justify-between items-center mb-2">
                    <div class="flex items-center gap-2">
                        <span class="w-2 h-2 rounded-full bg-purple-400"></span>
                        <span class="text-xs font-mono font-bold text-slate-200">LEADS NUMEROLOGI</span>
                    </div>
                    <span class="text-xs font-mono text-purple-300 font-bold">{{ $totalLeads }} Jiwa</span>
                </div>
                <p class="text-[11px] text-slate-400 font-light leading-relaxed">
                    Pengunjung kalkulator frekuensi jiwa: 
                    <strong class="text-amber-300 font-mono">{{ \App\Models\NumerologyLead::whereNotNull('user_id')->count() }} Member</strong> • 
                    <strong class="text-sky-300 font-mono">{{ \App\Models\NumerologyLead::whereNull('user_id')->count() }} Tamu</strong>.
                </p>
                <div class="mt-3 pt-2 border-t border-white/5 flex justify-between text-[10px] font-mono text-slate-400">
                    <span>Rasio Konversi Order:</span>
                    <span class="text-gold-300 font-bold">{{ $conversionRate }}%</span>
                </div>
            </div>
        </div>

        <!-- Mapped Users Table (Real Data from Database) -->
        <div class="overflow-x-auto border border-white/5 rounded-xl">
            <table class="w-full text-xs text-left">
                <thead class="bg-black/90 text-[10px] uppercase font-mono tracking-wider text-slate-400 border-b border-white/10">
                    <tr>
                        <th class="py-3 px-4">Identitas & Akun</th>
                        <th class="py-3 px-4">Role & Status</th>
                        <th class="py-3 px-4 text-center">Jumlah Pesanan</th>
                        <th class="py-3 px-4 text-right">Total Transaksi</th>
                        <th class="py-3 px-4">Bergabung Sejak</th>
                        <th class="py-3 px-4 text-center">Pesanan Terakhir</th>
                        <th class="py-3 px-4 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-white/5 bg-[#090909]">
                    @forelse($recentUsers as $user)
                        <tr class="hover:bg-white/[0.02] transition-colors">
                            <td class="py-3 px-4 flex items-center gap-3">
                                <div class="w-8 h-8 rounded-full bg-gold-400/20 border border-gold-400/40 flex items-center justify-center font-serif text-gold-300 font-bold text-xs uppercase">
                                    {{ strtoupper(substr($user->name, 0, 2)) }}
                                </div>
                                <div>
                                    <span class="font-medium text-slate-200 block">{{ $user->name }}</span>
                                    <span class="text-[10px] text-slate-500 font-mono">{{ $user->email }}</span>
                                </div>
                            </td>
                            <td class="py-3 px-4">
                                <span class="px-2 py-0.5 rounded text-[9px] font-mono bg-emerald-500/15 text-emerald-300 border border-emerald-500/30 uppercase">
                                    {{ $user->role ?? 'User Terdaftar' }}
                                </span>
                            </td>
                            <td class="py-3 px-4 text-center font-mono text-slate-300">
                                <span class="px-2 py-0.5 rounded-full bg-white/5 text-[10px]">
                                    {{ $user->orders_count }} Pesanan
                                </span>
                            </td>
                            <td class="py-3 px-4 text-right font-mono text-gold-300 font-bold">
                                Rp {{ number_format($user->total_spent ?? 0, 0, ',', '.') }}
                            </td>
                            <td class="py-3 px-4 text-slate-400 font-mono text-[10px]">
                                {{ $user->created_at->isoFormat('D MMM Y') }}
                            </td>
                            <td class="py-3 px-4 text-center">
                                @if($user->last_order)
                                    <span class="px-2 py-0.5 rounded-full text-[9px] font-mono bg-sky-500/20 text-sky-300">
                                        #{{ $user->last_order->order_number ?? $user->last_order->id }} ({{ ucfirst($user->last_order->status) }})
                                    </span>
                                @else
                                    <span class="text-[10px] text-slate-600 font-mono">Belum ada order</span>
                                @endif
                            </td>
                            <td class="py-3 px-4 text-center">
                                <a href="{{ route('admin.users.index') }}" class="px-2.5 py-1 rounded bg-gold-400/15 text-gold-300 text-[10px] hover:bg-gold-400/25 transition-all inline-block">
                                    Lihat Profil
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="py-8 text-center text-slate-500 font-mono">
                                Belum ada data pengguna terdaftar di database.
                            </td>
                        </tr>
                    @endforelse
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

        // Line Chart for Weekly Sales (Real Data from Database)
        new Chart(ctxWeekly, {
            type: 'line',
            data: {
                labels: @json($days),
                datasets: [{
                    label: 'Omset Transaksi (Rp)',
                    data: @json($revenueData),
                    borderColor: '#D4AF37',
                    backgroundColor: grad,
                    borderWidth: 3,
                    fill: true,
                    tension: 0.4,
                    pointBackgroundColor: '#F6E05E',
                    pointBorderColor: '#000',
                    pointBorderWidth: 2,
                    pointRadius: 5,
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
                                return 'Rp ' + Number(ctx.parsed.y).toLocaleString('id-ID');
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
                                if (val >= 1000000) {
                                    return 'Rp ' + (val / 1000000).toFixed(1) + 'M';
                                }
                                if (val >= 1000) {
                                    return 'Rp ' + (val / 1000).toFixed(0) + 'k';
                                }
                                return 'Rp ' + val;
                            }
                        }
                    }
                }
            }
        });

        // Doughnut Chart for Flacon Composition (Real Top Products)
        @php
            $donutLabels = $topProducts->pluck('product_name')->all();
            $donutData = $topProducts->pluck('total_qty')->map(fn($q) => (int)$q)->all();
            if (empty($donutLabels)) {
                $donutLabels = ['Belum Ada Pesanan'];
                $donutData = [1];
            }
        @endphp
        const ctxDoughnut = document.getElementById('flaconCompositionChart').getContext('2d');
        new Chart(ctxDoughnut, {
            type: 'doughnut',
            data: {
                labels: @json($donutLabels),
                datasets: [{
                    data: @json($donutData),
                    backgroundColor: [
                        '#D4AF37',
                        '#F59E0B',
                        '#10B981',
                        '#8B5CF6',
                        '#38BDF8'
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
                    legend: { display: false },
                    tooltip: {
                        backgroundColor: '#0c0c0c',
                        borderColor: '#D4AF37',
                        borderWidth: 1,
                        titleColor: '#D4AF37',
                        bodyColor: '#fff',
                        callbacks: {
                            label: function(ctx) {
                                return ctx.label + ': ' + ctx.parsed + ' botol';
                            }
                        }
                    }
                }
            }
        });
    });
</script>
@endsection
