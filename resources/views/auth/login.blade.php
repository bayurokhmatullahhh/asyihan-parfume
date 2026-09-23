@extends('layouts.app')

@section('title', 'Masuk ke Portal Jiwa — ASYIHAN')

@section('content')
<div class="py-16 md:py-24 px-4 sm:px-6 flex justify-center items-center min-h-[80vh]">
    <div class="w-full max-w-md">
        <!-- Mystical Card Container -->
        <div class="relative bg-[#0d0d0d]/90 backdrop-blur-xl border border-gold-400/30 rounded-2xl p-8 sm:p-10 shadow-[0_15px_40px_rgba(0,0,0,0.8),0_0_50px_rgba(212,175,55,0.06)]">
            <!-- Decorative Gold Accents -->
            <div class="absolute -top-3 left-1/2 -translate-x-1/2 px-4 py-1 bg-black border border-gold-400/40 rounded-full text-[10px] uppercase font-serif tracking-[0.25em] text-gold-300">
                Pintu Penyelarasan
            </div>

            <div class="text-center mb-8 mt-2">
                <h1 class="font-serif text-2xl sm:text-3xl text-gold-400 font-normal tracking-[0.15em] mb-2 glow-gold">
                    MASUK PORTAL
                </h1>
                <p class="text-xs text-slate-400 font-light italic">
                    Sinkronisasikan frekuensi auramu untuk melihat catatan takdir & pesanan sakral.
                </p>
            </div>

            @if ($errors->any())
                <div class="mb-6 p-3.5 bg-rose-950/70 border border-rose-500/40 rounded-xl text-rose-200 text-xs">
                    <ul class="list-disc list-inside space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('login') }}" method="POST" class="space-y-5">
                @csrf

                <div>
                    <label for="email" class="block text-xs uppercase tracking-wider text-slate-300 mb-2 font-light">
                        Alamat Email
                    </label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus
                        class="w-full px-4 py-3 bg-black/60 border border-gold-400/25 rounded-xl text-sm text-slate-100 placeholder-slate-600 focus:outline-none focus:border-gold-400 focus:ring-1 focus:ring-gold-400/50 transition-all"
                        placeholder="jiwa@alamsemesta.com">
                </div>

                <div>
                    <div class="flex justify-between items-center mb-2">
                        <label for="password" class="text-xs uppercase tracking-wider text-slate-300 font-light">
                            Kata Sandi
                        </label>
                    </div>
                    <input type="password" id="password" name="password" required
                        class="w-full px-4 py-3 bg-black/60 border border-gold-400/25 rounded-xl text-sm text-slate-100 placeholder-slate-600 focus:outline-none focus:border-gold-400 focus:ring-1 focus:ring-gold-400/50 transition-all"
                        placeholder="••••••••">
                </div>

                <div class="flex items-center justify-between text-xs pt-1">
                    <label class="flex items-center gap-2 cursor-pointer text-slate-400 hover:text-slate-300">
                        <input type="checkbox" name="remember" class="rounded border-gold-400/40 bg-black/80 text-gold-500 focus:ring-gold-400/40">
                        <span>Ingat frekuensi ini</span>
                    </label>
                </div>

                <button type="submit"
                    class="w-full mt-4 py-3.5 px-6 rounded-xl bg-gradient-to-r from-amber-500 via-gold-400 to-yellow-600 text-black font-semibold text-xs uppercase tracking-[0.2em] shadow-[0_0_20px_rgba(212,175,55,0.35)] hover:shadow-[0_0_30px_rgba(212,175,55,0.55)] hover:brightness-110 transition-all duration-300">
                    Buka Gerbang Jiwa
                </button>
            </form>

            <div class="mt-8 pt-6 border-t border-gold-400/15 text-center text-xs text-slate-400 font-light">
                Belum terinisiasi ke dalam lingkaran?
                <a href="{{ route('register') }}" class="text-gold-400 hover:text-gold-300 font-medium underline underline-offset-4 ml-1">
                    Daftar Sekarang
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
