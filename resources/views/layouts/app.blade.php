<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'ASYIHAN — Perfumery & Numerology')</title>
    <meta name="description" content="@yield('meta_description', 'ASYIHAN — Born from Asih. Crafted for the Soul. Parfum personal berdasarkan numerologi karakter Anda.')">
    <meta name="keywords" content="ASYIHAN, parfum, numerology, wewangian, Sunda, personal fragrance">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;500;600;700&family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,300;1,400&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="mystical-bg antialiased">

    {{-- Header --}}
    <header id="main-header" class="fixed w-full top-0 z-50 bg-[#040c21]/90 backdrop-blur-md border-b border-gold-400/20 shadow-[0_4px_30px_rgba(2,6,20,0.85)] transition-all duration-300">
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

            {{-- Right Header Icons --}}
            <div class="hidden sm:flex items-center gap-4 text-slate-300">
                <a href="{{ route('order') }}" class="hover:text-gold-400 transition-colors p-1" aria-label="Shopping Bag / Order">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                    </svg>
                </a>
                <a href="{{ route('calculator') }}" class="hover:text-gold-400 transition-colors p-1" aria-label="Numerology Profile">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                </a>
            </div>

            {{-- Mobile Menu Button --}}
            <button id="mobile-menu-btn" class="lg:hidden text-gold-400 hover:text-white transition-colors" aria-label="Toggle menu">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path id="menu-icon-open" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 6h16M4 12h16M4 18h16"></path>
                    <path id="menu-icon-close" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>

        {{-- Mobile Menu --}}
        <div id="mobile-menu" class="mobile-menu fixed top-0 right-0 w-72 h-screen bg-gradient-to-b from-[#06122e] via-[#040c21] to-[#020612] backdrop-blur-xl border-l border-gold-400/25 z-50 flex flex-col p-8 pt-20 lg:hidden shadow-2xl">
            <button id="mobile-menu-close" class="absolute top-4 right-4 text-gold-400 hover:text-white transition-colors" aria-label="Close menu">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>

            <nav class="flex flex-col gap-5 text-xs uppercase tracking-[0.18em]" aria-label="Mobile Navigation">
                <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'text-gold-400 font-medium' : 'text-slate-200 hover:text-gold-400' }} transition-colors border-b border-gold-400/10 pb-3">Home</a>
                <a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'text-gold-400 font-medium' : 'text-slate-200 hover:text-gold-400' }} transition-colors border-b border-gold-400/10 pb-3">About Asyihan</a>
                <a href="{{ route('calculator') }}" class="{{ request()->routeIs('calculator') ? 'text-gold-400 font-medium' : 'text-slate-200 hover:text-gold-400' }} transition-colors border-b border-gold-400/10 pb-3">Calculator</a>
                <a href="{{ route('collection') }}" class="{{ request()->routeIs('collection') ? 'text-gold-400 font-medium' : 'text-slate-200 hover:text-gold-400' }} transition-colors border-b border-gold-400/10 pb-3">Essence Collection</a>
                <a href="{{ route('ajian') }}" class="{{ request()->routeIs('ajian') ? 'text-gold-400 font-medium' : 'text-slate-200 hover:text-gold-400' }} transition-colors border-b border-gold-400/10 pb-3">Ajian & Ritual</a>
                <a href="{{ route('order') }}" class="{{ request()->routeIs('order') ? 'text-gold-400 font-medium' : 'text-slate-200 hover:text-gold-400' }} transition-colors border-b border-gold-400/10 pb-3">Order</a>
                <a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'text-gold-400 font-medium' : 'text-slate-200 hover:text-gold-400' }} transition-colors border-b border-gold-400/10 pb-3">Contact</a>
            </nav>

            <div class="mt-auto text-center">
                <p class="text-[11px] text-gold-400/80 font-serif italic">From Asih, Comes Essence.</p>
            </div>
        </div>
    </header>

    {{-- Main Content --}}
    <main class="pt-20 relative z-10 min-h-screen">
        @yield('content')
    </main>

    {{-- Footer --}}
    <footer class="mt-24 border-t border-gold-400/20 bg-gradient-to-b from-[#06122e] via-[#040c21] to-[#020510] pt-16 pb-12 relative z-10 shadow-[0_-12px_40px_rgba(2,5,15,0.85)]">
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
                        <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full border border-gold-400/20 bg-[#071333]/60 text-[11px] text-gold-300 font-serif tracking-wider">
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
                            <span class="text-slate-300 tracking-wide hover:text-white transition-colors">@asyihan.official</span>
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
                    <ul class="space-y-3 text-xs tracking-wider">
                        <li>
                            <a href="{{ route('about') }}" class="text-slate-300 hover:text-gold-400 transition-colors inline-flex items-center gap-1.5 group">
                                <span class="text-gold-400/40 group-hover:text-gold-400 transition-colors">&rsaquo;</span> Privacy Policy
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('about') }}" class="text-slate-300 hover:text-gold-400 transition-colors inline-flex items-center gap-1.5 group">
                                <span class="text-gold-400/40 group-hover:text-gold-400 transition-colors">&rsaquo;</span> Terms of Service
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('order') }}" class="text-slate-300 hover:text-gold-400 transition-colors inline-flex items-center gap-1.5 group">
                                <span class="text-gold-400/40 group-hover:text-gold-400 transition-colors">&rsaquo;</span> Shipping & Returns
                            </a>
                        </li>
                    </ul>
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

    @stack('scripts')
</body>
</html>
