<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'ASYIHAN — Perfumery & Numerology')</title>
    <meta name="description" content="@yield('meta_description', 'ASYIHAN — Born from Asih. Crafted for the Soul. Parfum personal berdasarkan numerologi karakter Anda.')">
    <meta name="keywords" content="ASYIHAN, parfum, numerology, wewangian, Sunda, personal fragrance">

            <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('images/favicon.ico') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon-16.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/favicon-32.png') }}">
    <link rel="icon" type="image/png" sizes="48x48" href="{{ asset('images/favicon-48.png') }}">
    <link rel="icon" type="image/png" sizes="64x64" href="{{ asset('images/favicon-64.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/apple-touch-icon.png') }}">
    <meta name="theme-color" content="#000000">
    <link rel="manifest" href="{{ asset('manifest.json') }}">



    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;500;600;700&family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,300;1,400&display=swap" rel="stylesheet">

    <!-- PDF Generation Libraries -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased bg-black text-slate-200 min-h-screen relative selection:bg-gold-500/30 selection:text-gold-200">

    {{-- Global Mystical Atmospheric Background --}}
    <div class="fixed inset-0 pointer-events-none z-0 overflow-hidden" aria-hidden="true">
        <!-- Deep Pitch Black Abyss -->
        <div class="absolute inset-0 bg-black"></div>
        <!-- Ethereal Mystic Smoky Fog & Incense Auras -->
        <div class="absolute -top-32 left-1/2 -translate-x-1/2 w-[950px] h-[550px] bg-gradient-to-b from-gold-500/[0.05] via-gold-600/[0.02] to-transparent rounded-full blur-[130px] animate-mystic-breath"></div>
        <div class="absolute top-1/4 -left-40 w-[550px] h-[550px] bg-gradient-to-tr from-gold-400/[0.035] via-amber-900/[0.02] to-transparent rounded-full blur-[110px] animate-float-slow"></div>
        <div class="absolute bottom-16 -right-40 w-[650px] h-[650px] bg-gradient-to-tl from-gold-500/[0.04] via-gold-700/[0.02] to-transparent rounded-full blur-[120px] animate-float-slow-reverse"></div>
        <!-- Occult Vignette Darkening (Black Infinite Void) -->
        <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_center,transparent_0%,rgba(0,0,0,0.45)_55%,rgba(0,0,0,0.98)_100%)]"></div>
        <!-- Subtle Mystical Sacred Stardust -->
        <div class="absolute inset-0 opacity-25 mystic-stardust"></div>
    </div>

    {{-- Header --}}
    <header id="main-header" class="fixed w-full top-0 z-50 bg-black/90 backdrop-blur-md border-b border-gold-400/20 shadow-[0_4px_35px_rgba(0,0,0,0.95)] transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 py-4 flex justify-between items-center">
            {{-- Logo --}}
            <a href="{{ route('home') }}" class="text-2xl font-serif text-gold-400 tracking-[0.25em] glow-gold hover:text-gold-200 transition-colors font-medium" aria-label="ASYIHAN Home">
                ASYIHAN
            </a>

            {{-- Desktop Navigation --}}
            <nav class="hidden lg:flex items-center gap-6 xl:gap-8 text-[11px] uppercase tracking-[0.18em] font-light" aria-label="Main Navigation">
                <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'text-gold-400 font-normal drop-shadow-[0_0_8px_rgba(212,175,55,0.4)]' : 'text-slate-300 hover:text-gold-300' }} transition-colors">Home</a>
                <a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'text-gold-400 font-normal drop-shadow-[0_0_8px_rgba(212,175,55,0.4)]' : 'text-slate-300 hover:text-gold-300' }} transition-colors">About Asyihan</a>
                <a href="{{ route('calculator') }}" class="{{ request()->routeIs('calculator') ? 'text-gold-400 font-normal drop-shadow-[0_0_8px_rgba(212,175,55,0.4)]' : 'text-slate-300 hover:text-gold-300' }} transition-colors">Calculator</a>
                <a href="{{ route('collection') }}" class="{{ request()->routeIs('collection', 'essence.detail') ? 'text-gold-400 font-normal drop-shadow-[0_0_8px_rgba(212,175,55,0.4)]' : 'text-slate-300 hover:text-gold-300' }} transition-colors">Essence Collection</a>
                <a href="{{ route('ajian') }}" class="{{ request()->routeIs('ajian') ? 'text-gold-400 font-normal drop-shadow-[0_0_8px_rgba(212,175,55,0.4)]' : 'text-slate-300 hover:text-gold-300' }} transition-colors">Ajian & Ritual</a>
                <a href="{{ route('order') }}" class="{{ request()->routeIs('order') ? 'text-gold-400 font-normal drop-shadow-[0_0_8px_rgba(212,175,55,0.4)]' : 'text-slate-300 hover:text-gold-300' }} transition-colors">Order</a>
                <a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'text-gold-400 font-normal drop-shadow-[0_0_8px_rgba(212,175,55,0.4)]' : 'text-slate-300 hover:text-gold-300' }} transition-colors">Contact</a>
            </nav>

            {{-- Right Header Icons & Auth --}}
            <div class="hidden sm:flex items-center gap-4 text-slate-300">
                {{-- Cart Button with Badge --}}
                @php
                    $cartCount = 0;
                    try {
                        if (\Illuminate\Support\Facades\Schema::hasTable('carts')) {
                            $cartCount = \App\Models\Cart::where(function($q) {
                                if (auth()->check()) {
                                    $q->where('user_id', auth()->id());
                                } else {
                                    $q->where('session_id', session()->getId());
                                }
                            })->sum('quantity');
                        }
                    } catch (\Throwable $e) {
                        $cartCount = 0;
                    }
                @endphp
                <a href="{{ route('cart.index') }}" class="relative hover:text-gold-400 transition-colors p-1.5 flex items-center group" aria-label="Keranjang Pesanan">
                    <svg class="w-5 h-5 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                    </svg>
                    <span id="global-cart-badge" class="{{ $cartCount > 0 ? '' : 'hidden' }} absolute -top-1 -right-1.5 bg-gradient-to-r from-amber-500 to-yellow-600 text-black font-bold text-[10px] w-4 h-4 rounded-full flex items-center justify-center shadow-md shadow-amber-500/40">
                        {{ $cartCount }}
                    </span>
                </a>

                @auth
                    {{-- User Profile & Logout --}}
                    <div class="relative group">
                        <a href="{{ route('profile') }}" class="flex items-center gap-2 py-1 px-2.5 rounded-full border border-gold-400/30 bg-gold-400/5 hover:border-gold-400/60 hover:bg-gold-400/10 transition-all text-xs text-gold-300 tracking-wider">
                            <span class="w-2 h-2 rounded-full bg-emerald-400 shadow-[0_0_8px_rgba(52,211,153,0.8)]"></span>
                            <span class="max-w-[100px] truncate">{{ auth()->user()->name }}</span>
                        </a>
                        <div class="absolute right-0 mt-2 w-48 bg-[#0a0a0a] border border-gold-400/30 rounded-xl shadow-[0_10px_30px_rgba(0,0,0,0.9)] py-2 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 z-50">
                            @if(auth()->user()->isAdmin())
                                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-2 px-4 py-2 text-xs text-amber-300 hover:bg-gold-400/10 transition-colors">
                                    <svg class="w-4 h-4 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                                    Gerbang Astral
                                </a>
                                <div class="border-t border-gold-400/10 my-1"></div>
                            @endif
                            <a href="{{ route('profile') }}" class="block px-4 py-2 text-xs text-slate-300 hover:text-gold-300 hover:bg-gold-400/10 transition-colors">Profil Jiwa</a>
                            <a href="{{ route('cart.index') }}" class="block px-4 py-2 text-xs text-slate-300 hover:text-gold-300 hover:bg-gold-400/10 transition-colors">Peti Persembahan</a>
                            <div class="border-t border-gold-400/10 my-1"></div>
                            <form action="{{ route('logout') }}" method="POST" class="w-full">
                                @csrf
                                <button type="submit" class="w-full text-left px-4 py-2 text-xs text-rose-400 hover:bg-rose-500/10 transition-colors">Keluar Portal</button>
                            </form>
                        </div>
                    </div>
                @else
                    {{-- Guest Auth Buttons --}}
                    <div class="flex items-center gap-2">
                        <a href="{{ route('login') }}" class="text-[11px] uppercase tracking-wider text-slate-300 hover:text-gold-300 px-3 py-1.5 transition-colors">
                            Masuk
                        </a>
                        <a href="{{ route('register') }}" class="text-[11px] uppercase tracking-wider text-gold-300 border border-gold-400/40 hover:border-gold-400 hover:bg-gold-400/10 px-3 py-1.5 rounded-full transition-all">
                            Daftar
                        </a>
                    </div>
                @endauth
            </div>

            {{-- Mobile Menu Button --}}
            <button id="mobile-menu-btn" class="lg:hidden text-gold-400 hover:text-white transition-colors p-1" aria-label="Toggle menu">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path id="menu-icon-open" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 6h16M4 12h16M4 18h16"></path>
                    <path id="menu-icon-close" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>

        {{-- Mobile Menu --}}
        <div id="mobile-menu" class="mobile-menu fixed top-0 right-0 w-72 h-screen bg-[#050505]/98 backdrop-blur-xl border-l border-gold-400/25 z-50 flex flex-col p-8 pt-20 lg:hidden shadow-2xl overflow-y-auto">
            <button id="mobile-menu-close" class="absolute top-4 right-4 text-gold-400 hover:text-white transition-colors" aria-label="Close menu">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>

            <nav class="flex flex-col gap-4 text-xs uppercase tracking-[0.18em]" aria-label="Mobile Navigation">
                <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'text-gold-400 font-medium' : 'text-slate-200 hover:text-gold-400' }} transition-colors border-b border-gold-400/10 pb-2.5">Home</a>
                <a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'text-gold-400 font-medium' : 'text-slate-200 hover:text-gold-400' }} transition-colors border-b border-gold-400/10 pb-2.5">About Asyihan</a>
                <a href="{{ route('calculator') }}" class="{{ request()->routeIs('calculator') ? 'text-gold-400 font-medium' : 'text-slate-200 hover:text-gold-400' }} transition-colors border-b border-gold-400/10 pb-2.5">Calculator</a>
                <a href="{{ route('collection') }}" class="{{ request()->routeIs('collection') ? 'text-gold-400 font-medium' : 'text-slate-200 hover:text-gold-400' }} transition-colors border-b border-gold-400/10 pb-2.5">Essence Collection</a>
                <a href="{{ route('cart.index') }}" class="{{ request()->routeIs('cart.*') ? 'text-gold-400 font-medium' : 'text-slate-200 hover:text-gold-400' }} transition-colors border-b border-gold-400/10 pb-2.5 flex items-center justify-between">
                    <span>Keranjang</span>
                    @if(isset($cartCount) && $cartCount > 0)
                        <span class="bg-gold-400 text-black px-2 py-0.5 rounded-full text-[10px] font-bold">{{ $cartCount }}</span>
                    @endif
                </a>
                <a href="{{ route('order') }}" class="{{ request()->routeIs('order') ? 'text-gold-400 font-medium' : 'text-slate-200 hover:text-gold-400' }} transition-colors border-b border-gold-400/10 pb-2.5">Order</a>
                <a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'text-gold-400 font-medium' : 'text-slate-200 hover:text-gold-400' }} transition-colors border-b border-gold-400/10 pb-2.5">Contact</a>

                <div class="pt-4 border-t border-gold-400/20 flex flex-col gap-3">
                    @auth
                        @if(auth()->user()->isAdmin())
                            <a href="{{ route('admin.dashboard') }}" class="text-amber-400 py-1.5 flex items-center gap-2">
                                <span>⚡ Gerbang Astral (Admin)</span>
                            </a>
                        @endif
                        <a href="{{ route('profile') }}" class="text-gold-300 py-1.5 flex items-center gap-2">
                            <span>👤 Profil: {{ auth()->user()->name }}</span>
                        </a>
                        <form action="{{ route('logout') }}" method="POST" class="w-full">
                            @csrf
                            <button type="submit" class="text-rose-400 text-left w-full py-1.5 text-xs">Keluar Portal</button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="text-center py-2 border border-gold-400/40 rounded text-gold-300 hover:bg-gold-400/10">Masuk</a>
                        <a href="{{ route('register') }}" class="text-center py-2 bg-gradient-to-r from-amber-500 to-yellow-600 rounded text-black font-semibold">Daftar Akun</a>
                    @endauth
                </div>
            </nav>

            <div class="mt-auto pt-6 text-center">
                <p class="text-[11px] text-gold-400/80 font-serif italic">From Asih, Comes Essence.</p>
            </div>
        </div>
    </header>

    {{-- Main Content & Flash Alerts --}}
    <main class="pt-20 relative z-10 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 pt-4">
            @if(session('success'))
                <div class="mb-6 p-4 rounded-xl bg-emerald-950/70 border border-emerald-500/40 text-emerald-200 text-sm flex items-center justify-between shadow-[0_4px_20px_rgba(16,185,129,0.15)]">
                    <div class="flex items-center gap-3">
                        <span class="text-emerald-400 text-lg">✨</span>
                        <span>{{ session('success') }}</span>
                    </div>
                    <button onclick="this.parentElement.remove()" class="text-emerald-400 hover:text-emerald-200">&times;</button>
                </div>
            @endif

            @if(session('error'))
                <div class="mb-6 p-4 rounded-xl bg-rose-950/70 border border-rose-500/40 text-rose-200 text-sm flex items-center justify-between shadow-[0_4px_20px_rgba(244,63,94,0.15)]">
                    <div class="flex items-center gap-3">
                        <span class="text-rose-400 text-lg">⚠️</span>
                        <span>{{ session('error') }}</span>
                    </div>
                    <button onclick="this.parentElement.remove()" class="text-rose-400 hover:text-rose-200">&times;</button>
                </div>
            @endif

            @if(session('info'))
                <div class="mb-6 p-4 rounded-xl bg-gold-950/60 border border-gold-400/30 text-gold-200 text-sm flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <span class="text-gold-400 text-lg">ℹ️</span>
                        <span>{{ session('info') }}</span>
                    </div>
                    <button onclick="this.parentElement.remove()" class="text-gold-400 hover:text-gold-200">&times;</button>
                </div>
            @endif
        </div>

        @yield('content')
    </main>

    {{-- Footer --}}
    <footer class="mt-24 border-t border-gold-400/20 bg-black pt-16 pb-12 relative z-10 shadow-[0_-12px_40px_rgba(0,0,0,0.95)]">
        {{-- Ambient top highlight line --}}
        <div class="absolute inset-x-0 top-0 h-px bg-gradient-to-r from-transparent via-gold-400/40 to-transparent"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-12 gap-10 lg:gap-8 text-sm font-light text-slate-300 pb-12">
                {{-- Col 1: Brand & Manifesto (4 cols) --}}
                <div class="lg:col-span-4 flex flex-col justify-between pr-0 lg:pr-6">
                    <div>
                        <a href="{{ route('home') }}" class="font-serif text-gold-400 text-2xl tracking-[0.25em] block mb-4 glow-gold font-medium hover:text-gold-200 transition-colors">
                            ASYIHAN
                        </a>
                        <p class="text-xs sm:text-[13px] leading-relaxed text-slate-300/90 italic font-light max-w-sm mb-6">
                            From Asih, Comes Essence. From Character, Comes Scent. From Scent, Remains a Memory.
                        </p>
                        <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full border border-gold-400/20 bg-black/80 text-[11px] text-gold-300 font-serif tracking-wider">
                            <span class="w-1.5 h-1.5 rounded-full bg-gold-400 animate-pulse"></span>
                            Cosmic Numerology & Haute Parfumerie
                        </div>
                    </div>
                </div>

                {{-- Col 2: Navigation (3 cols) --}}
                <div class="lg:col-span-3">
                    <h5 class="uppercase text-gold-400/90 tracking-[0.25em] mb-5 text-[11px] font-medium font-mono flex items-center gap-2">
                        <span class="w-1.5 h-1.5 rounded-full bg-gold-400/60"></span>
                        NAVIGATION
                    </h5>
                    <ul class="space-y-3 text-xs tracking-wider">
                        <li>
                            <a href="{{ route('home') }}" class="text-slate-300 hover:text-gold-400 transition-colors inline-flex items-center gap-1.5 group">
                                <span class="text-gold-400/40 group-hover:text-gold-400 transition-colors">&rsaquo;</span> Home
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('about') }}" class="text-slate-300 hover:text-gold-400 transition-colors inline-flex items-center gap-1.5 group">
                                <span class="text-gold-400/40 group-hover:text-gold-400 transition-colors">&rsaquo;</span> About Asyihan
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('calculator') }}" class="text-slate-300 hover:text-gold-400 transition-colors inline-flex items-center gap-1.5 group">
                                <span class="text-gold-400/40 group-hover:text-gold-400 transition-colors">&rsaquo;</span> Calculator
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('collection') }}" class="text-slate-300 hover:text-gold-400 transition-colors inline-flex items-center gap-1.5 group">
                                <span class="text-gold-400/40 group-hover:text-gold-400 transition-colors">&rsaquo;</span> Essence Collection
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('ajian') }}" class="text-slate-300 hover:text-gold-400 transition-colors inline-flex items-center gap-1.5 group">
                                <span class="text-gold-400/40 group-hover:text-gold-400 transition-colors">&rsaquo;</span> Ajian & Ritual
                            </a>
                        </li>
                    </ul>
                </div>

                {{-- Col 3: Contact Us (3 cols) --}}
                <div class="lg:col-span-3">
                    <h5 class="uppercase text-gold-400/90 tracking-[0.25em] mb-5 text-[11px] font-medium font-mono flex items-center gap-2">
                        <span class="w-1.5 h-1.5 rounded-full bg-gold-400/60"></span>
                        CONTACT US
                    </h5>
                    <ul class="space-y-3.5 text-xs">
                        <li class="flex items-center gap-3">
                            <span class="text-gold-400 shrink-0 p-1.5 rounded-lg bg-gold-400/10 border border-gold-400/20">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                                </svg>
                            </span>
                            <span class="text-slate-300 tracking-wide hover:text-white transition-colors">+62 8112144113</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <span class="text-gold-400 shrink-0 p-1.5 rounded-lg bg-gold-400/10 border border-gold-400/20">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                            </span>
                            <span class="text-slate-300 tracking-wide hover:text-white transition-colors">info@asyihan.id</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <span class="text-gold-400 shrink-0 p-1.5 rounded-lg bg-gold-400/10 border border-gold-400/20">
                                <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/>
                                </svg>
                            </span>
                            <span class="text-slate-300 tracking-wide hover:text-white transition-colors">@asyihan.id</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <span class="text-gold-400 shrink-0 p-1.5 rounded-lg bg-gold-400/10 border border-gold-400/20 mt-0.5">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                            </span>
                            <span class="text-slate-300 tracking-wide leading-relaxed">Jl. Tamblong No.46, Braga, Kec. Sumur Bandung, Kota Bandung, Jawa Barat 40112</span>
                        </li>
                    </ul>
                </div>

                {{-- Col 4: Legal & Information (2 cols) --}}
                <div class="lg:col-span-2">
                    <h5 class="uppercase text-gold-400/90 tracking-[0.25em] mb-5 text-[11px] font-medium font-mono flex items-center gap-2">
                        <span class="w-1.5 h-1.5 rounded-full bg-gold-400/60"></span>
                        LEGAL
                    </h5>
                    <ul class="space-y-3 text-xs tracking-wider mb-4">
                        <li>
                            <a href="{{ route('privacy-policy') }}" class="{{ request()->routeIs('privacy-policy') ? 'text-gold-400 font-normal drop-shadow-[0_0_8px_rgba(212,175,55,0.4)]' : 'text-slate-300 hover:text-gold-400' }} transition-colors inline-flex items-center gap-1.5 group">
                                <span class="text-gold-400/40 group-hover:text-gold-400 transition-colors">&rsaquo;</span> Privacy Policy
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('terms-of-service') }}" class="{{ request()->routeIs('terms-of-service') ? 'text-gold-400 font-normal drop-shadow-[0_0_8px_rgba(212,175,55,0.4)]' : 'text-slate-300 hover:text-gold-400' }} transition-colors inline-flex items-center gap-1.5 group">
                                <span class="text-gold-400/40 group-hover:text-gold-400 transition-colors">&rsaquo;</span> Terms of Service
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('shipping-returns') }}" class="{{ request()->routeIs('shipping-returns') ? 'text-gold-400 font-normal drop-shadow-[0_0_8px_rgba(212,175,55,0.4)]' : 'text-slate-300 hover:text-gold-400' }} transition-colors inline-flex items-center gap-1.5 group">
                                <span class="text-gold-400/40 group-hover:text-gold-400 transition-colors">&rsaquo;</span> Shipping & Returns
                            </a>
                        </li>
                    </ul>
                    <p class="text-[10px] text-slate-400/70 leading-relaxed italic border-t border-gold-400/10 pt-2.5">
                        * Perhitungan numerologi berfungsi sebagai penyelarasan sugesti positif &amp; bukan kebenaran mutlak.
                    </p>
                </div>
            </div>

            {{-- Bottom Center Credit --}}
            <div class="border-t border-gold-400/15 pt-8 flex flex-col sm:flex-row items-center justify-between gap-4 text-xs text-slate-400 font-light">
                <p class="tracking-widest font-serif text-slate-400/80">
                    &copy; {{ date('Y') }} PT. Lasuarindo | <span class="text-gold-400/90">Asyihan.id</span>
                </p>
                <p class="text-[11px] tracking-wider text-slate-400/60 font-mono">
                    Crafted with Soul &bull; Born from Asih
                </p>
            </div>
        </div>
    </footer>

    {{-- Sacred Toast Container --}}
    <div id="sacred-toast-container" class="fixed bottom-6 right-6 z-50 flex flex-col gap-3 pointer-events-none max-w-sm w-full px-4"></div>

    <script>
        // Global Add to Cart Helper Function
        window.addToCart = function(productId, essenceNumber, btnElement) {
            let originalContent = '';
            if (btnElement) {
                originalContent = btnElement.innerHTML;
                btnElement.disabled = true;
                btnElement.innerHTML = `
                    <svg class="animate-spin w-4 h-4 text-amber-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                `;
            }

            const payload = {
                _token: '{{ csrf_token() }}',
                quantity: 1
            };
            if (productId) payload.product_id = productId;
            if (essenceNumber) payload.essence_number = essenceNumber;

            fetch('{{ route("cart.add") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify(payload)
            })
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    // Update badges
                    const badge = document.getElementById('global-cart-badge');
                    if (badge) {
                        badge.textContent = data.cart_count;
                        badge.classList.remove('hidden');
                        badge.classList.add('animate-bounce');
                        setTimeout(() => badge.classList.remove('animate-bounce'), 1000);
                    }
                    const mobileBadge = document.getElementById('mobile-cart-badge');
                    if (mobileBadge) {
                        mobileBadge.textContent = data.cart_count;
                        mobileBadge.classList.remove('hidden');
                    }

                    // Show Sacred Toast Notification
                    window.showSacredToast(data.product_name || 'Mahakarya Wewangian', 'Telah ditambahkan ke Peti Persembahan Sakral.');
                } else {
                    window.showSacredToast('Pemberitahuan Alkimia', data.message || 'Gagal menambahkan produk.', 'error');
                }
            })
            .catch(err => {
                console.error('Error adding to cart:', err);
                window.showSacredToast('Koneksi Terputus', 'Gagal menyelaraskan persembahan. Silakan coba kembali.', 'error');
            })
            .finally(() => {
                if (btnElement) {
                    btnElement.disabled = false;
                    btnElement.innerHTML = originalContent;
                }
            });
        };

        window.showSacredToast = function(title, message, type = 'success') {
            const container = document.getElementById('sacred-toast-container');
            if (!container) return;

            const toast = document.createElement('div');
            toast.className = 'pointer-events-auto bg-[#12100d]/95 border border-amber-500/40 rounded-2xl p-4 shadow-2xl shadow-black/80 backdrop-blur-md flex items-start gap-3 transform translate-y-4 opacity-0 transition-all duration-300';
            
            const isError = type === 'error';
            const iconSvg = isError ? 
                `<svg class="w-5 h-5 text-rose-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>` :
                `<svg class="w-5 h-5 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/></svg>`;

            toast.innerHTML = `
                <div class="w-9 h-9 rounded-xl bg-amber-400/10 border border-amber-400/30 flex items-center justify-center flex-shrink-0">
                    ${iconSvg}
                </div>
                <div class="flex-1 min-w-0 pr-1">
                    <div class="text-[11px] font-serif font-bold text-amber-200 uppercase tracking-wider truncate">${title}</div>
                    <div class="text-[11px] text-zinc-300 font-light mt-0.5 leading-snug">${message}</div>
                    <div class="mt-2 flex items-center gap-3">
                        <a href="{{ route('cart.index') }}" class="text-[10px] font-mono uppercase tracking-widest text-amber-400 hover:text-amber-300 underline font-semibold">
                            Lihat Peti (${document.getElementById('global-cart-badge')?.textContent || '1'}) &rarr;
                        </a>
                    </div>
                </div>
                <button type="button" onclick="this.parentElement.remove()" class="text-zinc-500 hover:text-zinc-300 p-1">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            `;

            container.appendChild(toast);

            // Animate in
            requestAnimationFrame(() => {
                toast.classList.remove('translate-y-4', 'opacity-0');
            });

            // Auto dismiss after 4 seconds
            setTimeout(() => {
                toast.classList.add('opacity-0', 'translate-y-2');
                setTimeout(() => toast.remove(), 300);
            }, 4000);
        };
    </script>

    @stack('scripts')
</body>
</html>
