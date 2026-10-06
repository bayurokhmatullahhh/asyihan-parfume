@extends('layouts.admin')

@section('title', 'Tambah Pengguna Baru — ASYIHAN Admin')
@section('page_title', 'Inisiasi Jiwa Baru')

@section('content')
<div class="max-w-3xl space-y-6">
    <a href="{{ route('admin.users.index') }}" class="text-xs text-gold-400/80 hover:text-gold-300 flex items-center gap-1.5 transition-colors">
        ← Kembali ke Daftar Jiwa
    </a>

    <div class="bg-[#0e0e0e] border border-gold-400/25 rounded-2xl p-6 sm:p-8 shadow-[0_4px_30px_rgba(0,0,0,0.7)]">
        @if ($errors->any())
            <div class="mb-6 p-4 rounded-xl bg-rose-950/70 border border-rose-500/30 text-rose-200 text-xs">
                <ul class="list-disc list-inside space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.users.store') }}" method="POST" class="space-y-5 text-xs">
            @csrf

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block uppercase tracking-wider text-slate-300 mb-1.5 font-light">
                        Nama Lengkap <span class="text-gold-400">*</span>
                    </label>
                    <input type="text" name="name" value="{{ old('name') }}" required
                        placeholder="Contoh: Raden Surya"
                        class="w-full px-4 py-3 bg-black/80 border border-gold-400/25 rounded-xl text-slate-100 placeholder-slate-600 focus:outline-none focus:border-gold-400">
                </div>

                <div>
                    <label class="block uppercase tracking-wider text-slate-300 mb-1.5 font-light">
                        Alamat Email <span class="text-gold-400">*</span>
                    </label>
                    <input type="email" name="email" value="{{ old('email') }}" required
                        placeholder="jiwa@asyihan.com"
                        class="w-full px-4 py-3 bg-black/80 border border-gold-400/25 rounded-xl text-slate-100 placeholder-slate-600 focus:outline-none focus:border-gold-400">
                </div>

                <div>
                    <label class="block uppercase tracking-wider text-slate-300 mb-1.5 font-light">
                        Nomor WhatsApp / Telepon
                    </label>
                    <input type="text" name="phone" value="{{ old('phone') }}"
                        placeholder="081234567890"
                        class="w-full px-4 py-3 bg-black/80 border border-gold-400/25 rounded-xl text-slate-100 placeholder-slate-600 focus:outline-none focus:border-gold-400">
                </div>

                <div>
                    <label class="block uppercase tracking-wider text-slate-300 mb-1.5 font-light">
                        Peran Akun <span class="text-gold-400">*</span>
                    </label>
                    <select name="role" required
                        class="w-full px-4 py-3 bg-black/80 border border-gold-400/25 rounded-xl text-slate-100 focus:outline-none focus:border-gold-400">
                        <option value="user" {{ old('role') === 'user' ? 'selected' : '' }}>Pelanggan (User Biasa)</option>
                        <option value="admin" {{ old('role') === 'admin' ? 'selected' : '' }}>Sanctuary Master (Admin)</option>
                    </select>
                </div>

                <div>
                    <label class="block uppercase tracking-wider text-slate-300 mb-1.5 font-light">
                        Tanggal Lahir
                    </label>
                    <input type="date" name="birth_date" value="{{ old('birth_date') }}"
                        class="w-full px-4 py-3 bg-black/80 border border-gold-400/25 rounded-xl text-slate-100 focus:outline-none focus:border-gold-400">
                </div>

                <div>
                    <label class="block uppercase tracking-wider text-slate-300 mb-1.5 font-light">
                        Kata Sandi <span class="text-gold-400">*</span>
                    </label>
                    <input type="password" name="password" required minlength="8"
                        placeholder="Minimal 8 karakter"
                        class="w-full px-4 py-3 bg-black/80 border border-gold-400/25 rounded-xl text-slate-100 placeholder-slate-600 focus:outline-none focus:border-gold-400">
                </div>

                <div class="sm:col-span-2">
                    <label class="block uppercase tracking-wider text-slate-300 mb-1.5 font-light">
                        Konfirmasi Kata Sandi <span class="text-gold-400">*</span>
                    </label>
                    <input type="password" name="password_confirmation" required minlength="8"
                        placeholder="Ulangi kata sandi"
                        class="w-full px-4 py-3 bg-black/80 border border-gold-400/25 rounded-xl text-slate-100 placeholder-slate-600 focus:outline-none focus:border-gold-400">
                </div>

                <div class="sm:col-span-2">
                    <label class="block uppercase tracking-wider text-slate-300 mb-1.5 font-light">
                        Alamat Pengiriman
                    </label>
                    <textarea name="address" rows="3"
                        placeholder="Alamat domisili atau pengiriman sakral..."
                        class="w-full px-4 py-3 bg-black/80 border border-gold-400/25 rounded-xl text-slate-100 placeholder-slate-600 focus:outline-none focus:border-gold-400">{{ old('address') }}</textarea>
                </div>
            </div>

            <div class="pt-4 border-t border-white/5 flex justify-end gap-3">
                <a href="{{ route('admin.users.index') }}" class="px-5 py-2.5 rounded-xl border border-white/20 text-slate-300 hover:bg-white/5 transition-all">
                    Batal
                </a>
                <button type="submit"
                    class="px-6 py-2.5 rounded-xl bg-gradient-to-r from-amber-500 via-gold-400 to-yellow-600 text-black font-semibold uppercase tracking-wider shadow-md hover:brightness-110 transition-all">
                    Simpan Pengguna
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
