@extends('layouts.app')

@section('title', 'Daftar Akun Penyelarasan Takdir — ASYIHAN')

@section('content')
<div class="py-16 md:py-20 px-4 sm:px-6 flex justify-center items-center min-h-[85vh]">
    <div class="w-full max-w-lg">
        <!-- Mystical Card Container -->
        <div class="relative bg-[#0d0d0d]/90 backdrop-blur-xl border border-gold-400/30 rounded-2xl p-8 sm:p-10 shadow-[0_15px_40px_rgba(0,0,0,0.8),0_0_50px_rgba(212,175,55,0.06)]">
            <!-- Decorative Gold Accents -->
            <div class="absolute -top-3 left-1/2 -translate-x-1/2 px-4 py-1 bg-black border border-gold-400/40 rounded-full text-[10px] uppercase font-serif tracking-[0.25em] text-gold-300">
                Inisiasi Jiwa Baru
            </div>

            <div class="text-center mb-8 mt-2">
                <h1 class="font-serif text-2xl sm:text-3xl text-gold-400 font-normal tracking-[0.15em] mb-2 glow-gold">
                    DAFTAR AKUN
                </h1>
                <p class="text-xs text-slate-400 font-light italic">
                    Bergabunglah dengan lingkaran eksklusif ASYIHAN untuk memelihara wewangian takdir Anda.
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

            <form action="{{ route('register') }}" method="POST" class="space-y-4">
                @csrf

                <div>
                    <label for="name" class="block text-xs uppercase tracking-wider text-slate-300 mb-1.5 font-light">
                        Nama Lengkap <span class="text-gold-400">*</span>
                    </label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}" required autofocus
                        class="w-full px-4 py-3 bg-black/60 border border-gold-400/25 rounded-xl text-sm text-slate-100 placeholder-slate-600 focus:outline-none focus:border-gold-400 focus:ring-1 focus:ring-gold-400/50 transition-all"
                        placeholder="Nama Jiwa Anda">
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label for="email" class="block text-xs uppercase tracking-wider text-slate-300 mb-1.5 font-light">
                            Alamat Email <span class="text-gold-400">*</span>
                        </label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" required
                            class="w-full px-4 py-3 bg-black/60 border border-gold-400/25 rounded-xl text-sm text-slate-100 placeholder-slate-600 focus:outline-none focus:border-gold-400 focus:ring-1 focus:ring-gold-400/50 transition-all"
                            placeholder="jiwa@domain.com">
                    </div>

                    <div>
                        <label for="phone" class="block text-xs uppercase tracking-wider text-slate-300 mb-1.5 font-light">
                            Nomor WhatsApp
                        </label>
                        <input type="tel" id="phone" name="phone" value="{{ old('phone') }}"
                            class="w-full px-4 py-3 bg-black/60 border border-gold-400/25 rounded-xl text-sm text-slate-100 placeholder-slate-600 focus:outline-none focus:border-gold-400 focus:ring-1 focus:ring-gold-400/50 transition-all"
                            placeholder="081234567890">
                    </div>
                </div>

                <div>
                    <label for="birth_date" class="block text-xs uppercase tracking-wider text-slate-300 mb-1.5 font-light">
                        Tanggal Lahir (Untuk Sinkronisasi Numerologi)
                    </label>
                    <input type="date" id="birth_date" name="birth_date" value="{{ old('birth_date') }}"
                        class="w-full px-4 py-3 bg-black/60 border border-gold-400/25 rounded-xl text-sm text-slate-100 focus:outline-none focus:border-gold-400 focus:ring-1 focus:ring-gold-400/50 transition-all [color-scheme:dark]">
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label for="password" class="block text-xs uppercase tracking-wider text-slate-300 mb-1.5 font-light">
                            Kata Sandi <span class="text-gold-400">*</span>
                        </label>
                        <input type="password" id="password" name="password" required
                            class="w-full px-4 py-3 bg-black/60 border border-gold-400/25 rounded-xl text-sm text-slate-100 placeholder-slate-600 focus:outline-none focus:border-gold-400 focus:ring-1 focus:ring-gold-400/50 transition-all"
                            placeholder="Min. 8 karakter">
                    </div>

                    <div>
                        <label for="password_confirmation" class="block text-xs uppercase tracking-wider text-slate-300 mb-1.5 font-light">
                            Ulangi Sandi <span class="text-gold-400">*</span>
                        </label>
                        <input type="password" id="password_confirmation" name="password_confirmation" required
                            class="w-full px-4 py-3 bg-black/60 border border-gold-400/25 rounded-xl text-sm text-slate-100 placeholder-slate-600 focus:outline-none focus:border-gold-400 focus:ring-1 focus:ring-gold-400/50 transition-all"
                            placeholder="Konfirmasi sandi">
                    </div>
                </div>

                <button type="submit"
                    class="w-full mt-6 py-3.5 px-6 rounded-xl bg-gradient-to-r from-amber-500 via-gold-400 to-yellow-600 text-black font-semibold text-xs uppercase tracking-[0.2em] shadow-[0_0_20px_rgba(212,175,55,0.35)] hover:shadow-[0_0_30px_rgba(212,175,55,0.55)] hover:brightness-110 transition-all duration-300">
                    Selesaikan Inisiasi
                </button>
            </form>

            <div class="mt-6 pt-5 border-t border-gold-400/15 text-center text-xs text-slate-400 font-light">
                Sudah memiliki ikatan sakral?
                <a href="{{ route('login') }}" class="text-gold-400 hover:text-gold-300 font-medium underline underline-offset-4 ml-1">
                    Masuk di Sini
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
