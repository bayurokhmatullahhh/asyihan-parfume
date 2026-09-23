<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerbang Astral — Pintu Rahasia Penguasa ASYIHAN</title>

    <link rel="icon" type="image/x-icon" href="{{ asset('images/favicon.ico') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;600;700&family=Montserrat:wght@300;400;500;600&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#050505] text-slate-200 antialiased font-sans min-h-screen flex items-center justify-center p-4 relative overflow-hidden">

    <!-- Ambient Astral Particles Background -->
    <div class="fixed inset-0 pointer-events-none" aria-hidden="true">
        <div class="absolute -top-40 -left-40 w-96 h-96 bg-gold-600/10 rounded-full blur-[140px]"></div>
        <div class="absolute -bottom-40 -right-40 w-96 h-96 bg-amber-700/10 rounded-full blur-[140px]"></div>
        <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_center,transparent_0%,rgba(0,0,0,0.85)_80%)]"></div>
    </div>

    <div class="w-full max-w-md relative z-10">
        <div class="bg-[#0b0b0b]/95 border border-gold-400/30 rounded-3xl p-8 sm:p-10 shadow-[0_20px_60px_rgba(0,0,0,0.95),0_0_50px_rgba(212,175,55,0.08)] backdrop-blur-xl">
            <!-- Mystical Emblem -->
            <div class="text-center mb-8">
                <div class="w-16 h-16 mx-auto mb-4 rounded-full border border-gold-400/40 bg-gold-400/5 flex items-center justify-center shadow-[0_0_25px_rgba(212,175,55,0.2)]">
                    <span class="font-serif text-2xl text-gold-400 font-bold">✧</span>
                </div>
                <h1 class="font-serif text-xl sm:text-2xl text-gold-400 tracking-[0.25em] font-medium glow-gold">
                    GERBANG ASTRAL
                </h1>
                <p class="text-[11px] text-slate-400 font-mono tracking-widest mt-1 uppercase">
                    Pusat Kendali Penguasa Takdir
                </p>
            </div>

            @if(session('error'))
                <div class="mb-5 p-3 rounded-xl bg-rose-950/70 border border-rose-500/30 text-rose-300 text-xs">
                    {{ session('error') }}
                </div>
            @endif

            @if(session('info'))
                <div class="mb-5 p-3 rounded-xl bg-gold-950/70 border border-gold-400/30 text-gold-300 text-xs">
                    {{ session('info') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="mb-5 p-3 rounded-xl bg-rose-950/70 border border-rose-500/30 text-rose-300 text-xs">
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            <form action="{{ route('admin.login.submit') }}" method="POST" class="space-y-4">
                @csrf
                <input type="hidden" name="is_admin_portal" value="1">

                <div>
                    <label class="block text-[11px] uppercase tracking-wider text-slate-400 mb-1.5 font-mono">
                        Identitas Master (Email)
                    </label>
                    <input type="email" name="email" value="{{ old('email', 'admin@asyihan.id') }}" required autofocus
                        class="w-full px-4 py-3 bg-black/80 border border-gold-400/25 rounded-xl text-sm text-slate-100 placeholder-slate-600 focus:outline-none focus:border-gold-400 transition-all font-mono"
                        placeholder="master@asyihan.id">
                </div>

                <div>
                    <label class="block text-[11px] uppercase tracking-wider text-slate-400 mb-1.5 font-mono">
                        Kunci Astral (Password)
                    </label>
                    <input type="password" name="password" required
                        class="w-full px-4 py-3 bg-black/80 border border-gold-400/25 rounded-xl text-sm text-slate-100 placeholder-slate-600 focus:outline-none focus:border-gold-400 transition-all"
                        placeholder="••••••••">
                </div>

                <div class="pt-2">
                    <button type="submit"
                        class="w-full py-3.5 px-6 rounded-xl bg-gradient-to-r from-amber-500 via-gold-400 to-yellow-600 text-black font-semibold text-xs uppercase tracking-[0.25em] shadow-[0_0_25px_rgba(212,175,55,0.4)] hover:shadow-[0_0_35px_rgba(212,175,55,0.6)] hover:brightness-110 transition-all duration-300">
                        Buka Gerbang Kendali
                    </button>
                </div>
            </form>

            <div class="mt-8 pt-6 border-t border-white/5 text-center">
                <a href="{{ route('home') }}" class="text-xs text-slate-500 hover:text-gold-400 transition-colors">
                    ← Kembali ke Dimensi Manusia
                </a>
            </div>
        </div>
    </div>
</body>
</html>
