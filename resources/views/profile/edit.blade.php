@extends('layouts.app')

@section('title', 'Perbarui Profil Jiwa — ASYIHAN')

@section('content')
<div class="py-12 md:py-16 px-4 sm:px-6 max-w-3xl mx-auto">
    <!-- Breadcrumb & Title -->
    <div class="mb-8">
        <a href="{{ route('profile') }}" class="text-xs text-gold-400/80 hover:text-gold-300 flex items-center gap-1.5 mb-2 transition-colors">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 19l-7-7 7-7"/></svg>
            Kembali ke Profil
        </a>
        <h1 class="font-serif text-2xl sm:text-3xl text-gold-400 font-normal tracking-wide glow-gold">
            PENYELARASAN PROFIL
        </h1>
        <p class="text-xs text-slate-400 mt-1 font-light italic">Perbarui data diri dan koordinat pengiriman Anda.</p>
    </div>

    <div class="space-y-8">
        <!-- Form Profil -->
        <div class="bg-[#0d0d0d]/90 border border-gold-400/30 rounded-2xl p-6 sm:p-8">
            <h2 class="font-serif text-lg text-slate-100 font-medium pb-4 border-b border-white/5 mb-6">
                Informasi Pribadi
            </h2>

            <form action="{{ route('profile.update') }}" method="POST" class="space-y-4">
                @csrf
                @method('PUT')

                <div>
                    <label for="name" class="block text-xs uppercase tracking-wider text-slate-300 mb-1.5 font-light">
                        Nama Lengkap
                    </label>
                    <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" required
                        class="w-full px-4 py-3 bg-black/60 border border-gold-400/25 rounded-xl text-sm text-slate-100 focus:outline-none focus:border-gold-400 transition-all">
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs uppercase tracking-wider text-slate-400 mb-1.5 font-light">
                            Alamat Email (Tetap)
                        </label>
                        <input type="email" value="{{ $user->email }}" disabled
                            class="w-full px-4 py-3 bg-black/40 border border-white/10 rounded-xl text-sm text-slate-500 cursor-not-allowed">
                    </div>
                    <div>
                        <label for="phone" class="block text-xs uppercase tracking-wider text-slate-300 mb-1.5 font-light">
                            Nomor WhatsApp
                        </label>
                        <input type="tel" id="phone" name="phone" value="{{ old('phone', $user->phone) }}"
                            class="w-full px-4 py-3 bg-black/60 border border-gold-400/25 rounded-xl text-sm text-slate-100 focus:outline-none focus:border-gold-400 transition-all"
                            placeholder="081234567890">
                    </div>
                </div>

                <div>
                    <label for="birth_date" class="block text-xs uppercase tracking-wider text-slate-300 mb-1.5 font-light">
                        Tanggal Lahir (Untuk Numerologi Takdir)
                    </label>
                    <input type="date" id="birth_date" name="birth_date" value="{{ old('birth_date', $user->birth_date ? $user->birth_date->format('Y-m-d') : '') }}"
                        class="w-full px-4 py-3 bg-black/60 border border-gold-400/25 rounded-xl text-sm text-slate-100 focus:outline-none focus:border-gold-400 transition-all [color-scheme:dark]">
                </div>

                <div>
                    <label for="address" class="block text-xs uppercase tracking-wider text-slate-300 mb-1.5 font-light">
                        Alamat Pengiriman Utama
                    </label>
                    <textarea id="address" name="address" rows="3"
                        class="w-full px-4 py-3 bg-black/60 border border-gold-400/25 rounded-xl text-sm text-slate-100 focus:outline-none focus:border-gold-400 transition-all"
                        placeholder="Nama jalan, nomor rumah, RT/RW, kecamatan, kota, kode pos...">{{ old('address', $user->address) }}</textarea>
                </div>

                <div class="pt-2 flex justify-end">
                    <button type="submit"
                        class="px-6 py-3 rounded-xl bg-gradient-to-r from-amber-500 via-gold-400 to-yellow-600 text-black font-semibold text-xs uppercase tracking-[0.18em] shadow-md hover:brightness-110 transition-all">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>

        <!-- Form Ubah Sandi -->
        <div class="bg-[#0d0d0d]/90 border border-gold-400/20 rounded-2xl p-6 sm:p-8">
            <h2 class="font-serif text-lg text-slate-100 font-medium pb-4 border-b border-white/5 mb-6">
                Perbarui Kata Sandi
            </h2>

            <form action="{{ route('profile.password') }}" method="POST" class="space-y-4">
                @csrf
                @method('PUT')

                <div>
                    <label for="current_password" class="block text-xs uppercase tracking-wider text-slate-300 mb-1.5 font-light">
                        Kata Sandi Saat Ini
                    </label>
                    <input type="password" id="current_password" name="current_password" required
                        class="w-full px-4 py-3 bg-black/60 border border-gold-400/25 rounded-xl text-sm text-slate-100 focus:outline-none focus:border-gold-400 transition-all"
                        placeholder="••••••••">
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label for="password" class="block text-xs uppercase tracking-wider text-slate-300 mb-1.5 font-light">
                            Kata Sandi Baru
                        </label>
                        <input type="password" id="password" name="password" required
                            class="w-full px-4 py-3 bg-black/60 border border-gold-400/25 rounded-xl text-sm text-slate-100 focus:outline-none focus:border-gold-400 transition-all"
                            placeholder="Min. 8 karakter">
                    </div>
                    <div>
                        <label for="password_confirmation" class="block text-xs uppercase tracking-wider text-slate-300 mb-1.5 font-light">
                            Ulangi Sandi Baru
                        </label>
                        <input type="password" id="password_confirmation" name="password_confirmation" required
                            class="w-full px-4 py-3 bg-black/60 border border-gold-400/25 rounded-xl text-sm text-slate-100 focus:outline-none focus:border-gold-400 transition-all"
                            placeholder="Konfirmasi sandi baru">
                    </div>
                </div>

                <div class="pt-2 flex justify-end">
                    <button type="submit"
                        class="px-6 py-3 rounded-xl border border-gold-400/40 text-gold-300 text-xs uppercase tracking-[0.18em] hover:bg-gold-400/10 transition-all">
                        Perbarui Kata Sandi
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
