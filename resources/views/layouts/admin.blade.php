<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Dashboard Eksekutif ASYIHAN — Sanctuary Master')</title>

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('images/favicon.ico') }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;500;600;700&family=Montserrat:wght@300;400;500;600;700&family=JetBrains+Mono:wght@400;500&display=swap" rel="stylesheet">

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        :root {
            --bg-canvas: #050505;
            --bg-card: #0c0c0c;
            --bg-card-hover: #121212;
            --border-subtle: rgba(212, 175, 55, 0.18);
            --border-hover: rgba(212, 175, 55, 0.45);
            --gold-primary: #D4AF37;
            --gold-glow: rgba(212, 175, 55, 0.35);
        }

        body {
            background-color: var(--bg-canvas);
            font-family: 'Montserrat', sans-serif;
            color: #e2e8f0;
        }

        .font-serif {
            font-family: 'Cinzel', serif;
        }

        .font-mono {
            font-family: 'JetBrains Mono', monospace;
        }

        .glow-gold {
            text-shadow: 0 0 16px var(--gold-glow);
        }

        .sidebar-link {
            transition: all 0.2s ease;
            position: relative;
        }

        .sidebar-link.active {
            background: linear-gradient(90deg, rgba(212, 175, 55, 0.16) 0%, rgba(212, 175, 55, 0.02) 100%);
            border-left: 3px solid #D4AF37;
            color: #F6E05E;
        }

        .sidebar-link.active svg {
            color: #F6E05E;
        }

        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 5px;
            height: 5px;
        }
        ::-webkit-scrollbar-track {
            background: #070707;
        }
        ::-webkit-scrollbar-thumb {
            background: #2a2a2a;
            border-radius: 4px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #D4AF37;
        }
    </style>
</head>
<body class="antialiased selection:bg-gold-500/30 selection:text-gold-200">

    <div class="min-h-screen flex flex-col">
        <!-- Sidebar Backdrop (Mobile) -->
        <div id="sidebar-backdrop" class="fixed inset-0 bg-black/80 z-40 hidden md:hidden transition-opacity"></div>

        <!-- Sidebar Fixed -->
        <aside id="admin-sidebar"
            class="fixed top-0 bottom-0 left-0 w-64 bg-[#090909] border-r border-[#1e1e1e] flex flex-col z-50 transition-transform duration-300 -translate-x-full md:translate-x-0">
            
            <!-- Brand Header -->
            <div class="p-5 border-b border-[#1a1a1a] flex items-center justify-between">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 group">
                    <div class="w-9 h-9 rounded-full bg-gradient-to-tr from-amber-700 via-gold-400 to-yellow-300 p-0.5 flex-shrink-0 shadow-[0_0_12px_rgba(212,175,55,0.3)]">
                        <div class="w-full h-full bg-black rounded-full flex items-center justify-center text-gold-300 font-serif font-bold text-xs">
                            ✧
                        </div>
                    </div>
                    <div>
                        <div class="flex items-center gap-1.5">
                            <span class="font-serif text-base tracking-[0.2em] text-gold-300 font-bold glow-gold">ASYIHAN</span>
                            <span class="px-1.5 py-0.2 text-[8px] uppercase tracking-wider font-mono font-bold rounded bg-gold-400/20 text-gold-300 border border-gold-400/30">Admin</span>
                        </div>
                        <span class="text-[9px] uppercase tracking-[0.25em] text-slate-400 font-mono block">SANCTUARY MASTER</span>
                    </div>
                </a>

                <button id="close-sidebar-btn" class="md:hidden text-slate-400 hover:text-white p-1">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </div>

            <!-- Navigation Links -->
            <nav class="flex-1 px-3 py-5 space-y-6 overflow-y-auto">
                <!-- Group 1: PUSAT KENDALI -->
                <div>
                    <span class="px-3 text-[9px] uppercase tracking-[0.22em] text-gold-400/70 font-mono font-semibold block mb-2">
                        Pusat Kendali
                    </span>
                    <div class="space-y-1">
                        <a href="{{ route('admin.dashboard') }}"
                            class="sidebar-link flex items-center justify-between px-3 py-2 rounded-xl text-xs font-medium text-slate-300 hover:text-gold-200 hover:bg-white/[0.03] {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                            <div class="flex items-center gap-3">
                                <svg class="w-4 h-4 text-gold-400/80" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6" d="M4 5a1 1 0 011-1h4a1 1 0 011 1v5a1 1 0 01-1 1H5a1 1 0 01-1-1V5zm10 0a1 1 0 011-1h4a1 1 0 011 1v2a1 1 0 01-1 1h-4a1 1 0 01-1-1V5zM4 15a1 1 0 011-1h4a1 1 0 011 1v4a1 1 0 01-1 1H5a1 1 0 01-1-1v-4zm10-4a1 1 0 011-1h4a1 1 0 011 1v7a1 1 0 01-1 1h-4a1 1 0 01-1-1v-7z"/></svg>
                                <span>Ringkasan Eksekutif</span>
                            </div>
                            <span class="w-1.5 h-1.5 rounded-full bg-gold-400 shadow-[0_0_6px_rgba(212,175,55,0.8)]"></span>
                        </a>

                        <a href="{{ route('admin.orders.index') }}"
                            class="sidebar-link flex items-center justify-between px-3 py-2 rounded-xl text-xs font-medium text-slate-300 hover:text-gold-200 hover:bg-white/[0.03] {{ request()->routeIs('admin.orders.*') ? 'active' : '' }}">
                            <div class="flex items-center gap-3">
                                <svg class="w-4 h-4 text-gold-400/80" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/></svg>
                                <span>Data Penjualan</span>
                            </div>
                            <span class="px-1.5 py-0.5 text-[9px] font-mono rounded bg-emerald-500/15 text-emerald-400 border border-emerald-500/30">Live</span>
                        </a>

                        <a href="{{ route('admin.leads.index') }}"
                            class="sidebar-link flex items-center justify-between px-3 py-2 rounded-xl text-xs font-medium text-slate-300 hover:text-gold-200 hover:bg-white/[0.03] {{ request()->routeIs('admin.leads.*') ? 'active' : '' }}">
                            <div class="flex items-center gap-3">
                                <svg class="w-4 h-4 text-gold-400/80" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
                                <span>Leads Numerologi</span>
                            </div>
                            <span class="px-1.5 py-0.5 text-[9px] font-mono rounded bg-purple-500/15 text-purple-300 border border-purple-500/30">Aura</span>
                        </a>
                    </div>
                </div>

                <!-- Group 2: MANAJEMEN AUDIENS -->
                <div>
                    <span class="px-3 text-[9px] uppercase tracking-[0.22em] text-gold-400/70 font-mono font-semibold block mb-2">
                        Manajemen Audiens
                    </span>
                    <div class="space-y-1">
                        <a href="{{ route('admin.users.index') }}"
                            class="sidebar-link flex items-center justify-between px-3 py-2 rounded-xl text-xs font-medium text-slate-300 hover:text-gold-200 hover:bg-white/[0.03] {{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
                            <div class="flex items-center gap-3">
                                <svg class="w-4 h-4 text-gold-400/80" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                                <span>Data Jiwa / Pengguna</span>
                            </div>
                            <span class="px-1.5 py-0.5 text-[9px] font-mono rounded bg-amber-500/15 text-amber-300 border border-amber-500/30">Magister</span>
                        </a>
                    </div>
                </div>

                <!-- Group 3: OPERASIONAL & ASET -->
                <div>
                    <span class="px-3 text-[9px] uppercase tracking-[0.22em] text-gold-400/70 font-mono font-semibold block mb-2">
                        Operasional & Aset
                    </span>
                    <div class="space-y-1">
                        <a href="{{ route('admin.products.index') }}"
                            class="sidebar-link flex items-center gap-3 px-3 py-2 rounded-xl text-xs font-medium text-slate-300 hover:text-gold-200 hover:bg-white/[0.03] {{ request()->routeIs('admin.products.index') ? 'active' : '' }}">
                            <svg class="w-4 h-4 text-gold-400/80" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
                            <span>Katalog 9 Flacon Esensi</span>
                        </a>

                        <a href="{{ route('admin.products.create') }}"
                            class="sidebar-link flex items-center gap-3 px-3 py-2 rounded-xl text-xs font-medium text-slate-300 hover:text-gold-200 hover:bg-white/[0.03] {{ request()->routeIs('admin.products.create') ? 'active' : '' }}">
                            <svg class="w-4 h-4 text-gold-400/80" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6" d="M12 4v16m8-8H4"/></svg>
                            <span>Tambah Flacon Baru</span>
                        </a>

                        <a href="{{ route('home') }}" target="_blank"
                            class="flex items-center justify-between px-3 py-2 rounded-xl text-xs text-slate-400 hover:text-gold-300 hover:bg-white/[0.03] transition-colors">
                            <div class="flex items-center gap-3">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                                <span>Kunjungi Etalase Toko</span>
                            </div>
                            <span class="text-[10px] text-slate-600 font-mono">↗</span>
                        </a>
                    </div>
                </div>
            </nav>

            <!-- Bottom Master Profile Card -->
            <div class="p-3.5 border-t border-[#1a1a1a] bg-black/60">
                <div class="flex items-center justify-between p-2 rounded-xl bg-[#111] border border-[#222]">
                    <div class="flex items-center gap-2.5 overflow-hidden">
                        <div class="w-8 h-8 rounded-full bg-gold-400/20 border border-gold-400/40 flex items-center justify-center font-serif text-gold-300 font-bold text-xs flex-shrink-0">
                            {{ strtoupper(substr(auth()->user()->name, 0, 2)) }}
                        </div>
                        <div class="truncate">
                            <span class="text-xs text-slate-200 font-medium block truncate">{{ auth()->user()->name }}</span>
                            <div class="flex items-center gap-1.5 text-[9px] text-emerald-400 font-mono">
                                <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 animate-pulse"></span>
                                <span>Simpul Aktif (IP: OK)</span>
                            </div>
                        </div>
                    </div>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="p-1.5 rounded-lg text-slate-400 hover:text-rose-400 hover:bg-rose-500/10 transition-colors" title="Keluar dari Gerbang Astral">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                        </button>
                    </form>
                </div>
            </div>
        </aside>

        <!-- Main Content (Offset on md+ screens) -->
        <div class="flex-1 md:pl-64 flex flex-col min-w-0">
            <!-- TOP ADMIN BAR -->
            <header class="sticky top-0 z-30 bg-[#090909]/95 backdrop-blur-md border-b border-[#1c1c1c] px-4 sm:px-8 py-3.5 flex items-center justify-between gap-4">
                <!-- Left: Mobile Toggle & Page Title -->
                <div class="flex items-center gap-3">
                    <button id="open-sidebar-btn" class="md:hidden text-gold-400 p-1.5 rounded-lg border border-gold-400/30 bg-gold-400/10 hover:bg-gold-400/20 transition-all">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                    </button>
                    <div>
                        <h1 class="font-serif text-sm sm:text-base text-slate-100 font-semibold tracking-wide flex items-center gap-2">
                            <span>@yield('page_title', 'Dashboard Eksekutif ASYIHAN')</span>
                        </h1>
                    </div>
                </div>

                <!-- Right: Date Filter, Search, Bell, CTA -->
                <div class="flex items-center gap-3">
                    <!-- Date Pill (Cosmic Lunar Phase) -->
                    <div class="hidden lg:flex items-center gap-2 px-3 py-1.5 rounded-full bg-[#121212] border border-[#262626] text-[11px] font-mono text-slate-300">
                        <span class="text-gold-400">📅</span>
                        <span>{{ now()->isoFormat('D MMM Y') }}</span>
                        <span class="text-gold-400/80 font-serif italic">(Purnama Kliwon)</span>
                    </div>

                    <!-- Search Input -->
                    <div class="relative hidden sm:block w-48 xl:w-64">
                        <input type="text" placeholder="Cari data pesanan..."
                            class="w-full pl-8 pr-3 py-1.5 bg-[#121212] border border-[#262626] rounded-xl text-xs text-slate-200 placeholder-slate-500 focus:outline-none focus:border-gold-400/50">
                        <svg class="w-3.5 h-3.5 text-slate-400 absolute left-2.5 top-1/2 -translate-y-1/2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                    </div>

                    <!-- Notification Bell -->
                    <div class="relative p-2 rounded-xl bg-[#121212] border border-[#262626] text-slate-300 hover:text-gold-300 transition-colors cursor-pointer">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/></svg>
                        <span class="absolute top-1.5 right-1.5 w-2 h-2 rounded-full bg-gold-400 animate-ping"></span>
                    </div>

                    <!-- Gold CTA Button -->
                    <button onclick="window.print()" class="px-3 sm:px-4 py-1.5 rounded-xl bg-gradient-to-r from-amber-500 via-gold-400 to-yellow-600 text-black font-semibold text-[11px] uppercase tracking-wider shadow-[0_0_15px_rgba(212,175,55,0.3)] hover:brightness-110 transition-all flex items-center gap-1.5">
                        <span class="hidden sm:inline">⚡ UNDUH RINGKASAN</span>
                        <span class="sm:hidden">LAPORAN</span>
                    </button>
                </div>
            </header>

            <!-- Alerts -->
            <div class="px-4 sm:px-8 pt-4">
                @if(session('success'))
                    <div class="mb-4 p-3.5 rounded-xl bg-emerald-950/70 border border-emerald-500/40 text-emerald-200 text-xs flex items-center justify-between">
                        <div class="flex items-center gap-2">
                            <span>✨</span>
                            <span>{{ session('success') }}</span>
                        </div>
                        <button onclick="this.parentElement.remove()" class="text-emerald-400 hover:text-emerald-200">&times;</button>
                    </div>
                @endif

                @if(session('error'))
                    <div class="mb-4 p-3.5 rounded-xl bg-rose-950/70 border border-rose-500/40 text-rose-200 text-xs flex items-center justify-between">
                        <div class="flex items-center gap-2">
                            <span>⚠️</span>
                            <span>{{ session('error') }}</span>
                        </div>
                        <button onclick="this.parentElement.remove()" class="text-rose-400 hover:text-rose-200">&times;</button>
                    </div>
                @endif
            </div>

            <!-- Page Body -->
            <main class="flex-1 p-4 sm:p-8">
                @yield('content')
            </main>

            <!-- Bottom Status Footer -->
            <footer class="mt-auto px-6 py-4 border-t border-[#1a1a1a] bg-[#070707] text-[11px] text-slate-500 flex flex-col sm:flex-row justify-between items-center gap-3">
                <div class="flex items-center gap-2">
                    <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                    <span>Sistem ASYIHAN Cloud Versi 2.4.1</span>
                    <span class="hidden md:inline">• Waktu Server: {{ now()->timezone('Asia/Jakarta')->format('d M Y H:i') }} WIB (Bandung Sanctuary)</span>
                </div>
                <div class="flex items-center gap-4 text-[10px] font-mono">
                    <span class="hover:text-gold-400 cursor-pointer">Panduan Mistis & API</span>
                    <span>•</span>
                    <span class="hover:text-gold-400 cursor-pointer">Log Keamanan</span>
                    <span>•</span>
                    <span class="text-gold-400/80">Enkripsi 256-Bit TLS</span>
                </div>
            </footer>
        </div>
    </div>

    <!-- Toggle Script -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const openBtn = document.getElementById('open-sidebar-btn');
            const closeBtn = document.getElementById('close-sidebar-btn');
            const sidebar = document.getElementById('admin-sidebar');
            const backdrop = document.getElementById('sidebar-backdrop');

            const toggle = () => {
                const isOpen = !sidebar.classList.contains('-translate-x-full');
                if (isOpen) {
                    sidebar.classList.add('-translate-x-full');
                    backdrop.classList.add('hidden');
                } else {
                    sidebar.classList.remove('-translate-x-full');
                    backdrop.classList.remove('hidden');
                }
            };

            if (openBtn) openBtn.addEventListener('click', toggle);
            if (closeBtn) closeBtn.addEventListener('click', toggle);
            if (backdrop) backdrop.addEventListener('click', toggle);
        });
    </script>
</body>
</html>
