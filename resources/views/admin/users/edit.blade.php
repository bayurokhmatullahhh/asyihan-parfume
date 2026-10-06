@extends('layouts.admin')

@section('title', 'Sunting Pengguna: ' . $user->name . ' — ASYIHAN Admin')
@section('page_title', 'Sunting Data Jiwa')

@section('content')
<div class="max-w-4xl space-y-6">
    <a href="{{ route('admin.users.index') }}" class="text-xs text-gold-400/80 hover:text-gold-300 flex items-center gap-1.5 transition-colors">
        ← Kembali ke Daftar Jiwa
    </a>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Left: Edit Form -->
        <div class="lg:col-span-2 bg-[#0e0e0e] border border-gold-400/25 rounded-2xl p-6 sm:p-8 shadow-[0_4px_30px_rgba(0,0,0,0.7)]">
            @if ($errors->any())
                <div class="mb-6 p-4 rounded-xl bg-rose-950/70 border border-rose-500/30 text-rose-200 text-xs">
                    <ul class="list-disc list-inside space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.users.update', $user) }}" method="POST" class="space-y-5 text-xs">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div class="sm:col-span-2">
                        <label class="block uppercase tracking-wider text-slate-300 mb-1.5 font-light">
                            Nama Lengkap <span class="text-gold-400">*</span>
                        </label>
                        <input type="text" name="name" value="{{ old('name', $user->name) }}" required
                            class="w-full px-4 py-3 bg-black/80 border border-gold-400/25 rounded-xl text-slate-100 placeholder-slate-600 focus:outline-none focus:border-gold-400">
                    </div>

                    <div>
                        <label class="block uppercase tracking-wider text-slate-300 mb-1.5 font-light">
                            Alamat Email <span class="text-gold-400">*</span>
                        </label>
                        <input type="email" name="email" value="{{ old('email', $user->email) }}" required
                            class="w-full px-4 py-3 bg-black/80 border border-gold-400/25 rounded-xl text-slate-100 placeholder-slate-600 focus:outline-none focus:border-gold-400">
                    </div>

                    <div>
                        <label class="block uppercase tracking-wider text-slate-300 mb-1.5 font-light">
                            Nomor WhatsApp / Telepon
                        </label>
                        <input type="text" name="phone" value="{{ old('phone', $user->phone) }}"
                            class="w-full px-4 py-3 bg-black/80 border border-gold-400/25 rounded-xl text-slate-100 placeholder-slate-600 focus:outline-none focus:border-gold-400">
                    </div>

                    <div>
                        <label class="block uppercase tracking-wider text-slate-300 mb-1.5 font-light">
                            Peran Akun <span class="text-gold-400">*</span>
                        </label>
                        <select name="role" required {{ $user->id === auth()->id() ? 'disabled' : '' }}
                            class="w-full px-4 py-3 bg-black/80 border border-gold-400/25 rounded-xl text-slate-100 focus:outline-none focus:border-gold-400">
                            <option value="user" {{ old('role', $user->role) === 'user' ? 'selected' : '' }}>Pelanggan (User Biasa)</option>
                            <option value="admin" {{ old('role', $user->role) === 'admin' ? 'selected' : '' }}>Sanctuary Master (Admin)</option>
                        </select>
                        @if($user->id === auth()->id())
                            <input type="hidden" name="role" value="admin">
                            <span class="text-[10px] text-slate-500 italic mt-1 block">Anda tidak dapat menurunkan peran akun Anda sendiri.</span>
                        @endif
                    </div>

                    <div>
                        <label class="block uppercase tracking-wider text-slate-300 mb-1.5 font-light">
                            Tanggal Lahir
                        </label>
                        <input type="date" name="birth_date" value="{{ old('birth_date', $user->birth_date?->format('Y-m-d')) }}"
                            class="w-full px-4 py-3 bg-black/80 border border-gold-400/25 rounded-xl text-slate-100 focus:outline-none focus:border-gold-400">
                    </div>

                    <div class="sm:col-span-2">
                        <label class="block uppercase tracking-wider text-slate-300 mb-1.5 font-light">
                            Alamat Pengiriman
                        </label>
                        <textarea name="address" rows="3"
                            class="w-full px-4 py-3 bg-black/80 border border-gold-400/25 rounded-xl text-slate-100 placeholder-slate-600 focus:outline-none focus:border-gold-400">{{ old('address', $user->address) }}</textarea>
                    </div>
                </div>

                <div class="pt-4 border-t border-white/5 flex justify-end gap-3">
                    <a href="{{ route('admin.users.index') }}" class="px-5 py-2.5 rounded-xl border border-white/20 text-slate-300 hover:bg-white/5 transition-all">
                        Batal
                    </a>
                    <button type="submit"
                        class="px-6 py-2.5 rounded-xl bg-gradient-to-r from-amber-500 via-gold-400 to-yellow-600 text-black font-semibold uppercase tracking-wider shadow-md hover:brightness-110 transition-all">
                        Perbarui Data
                    </button>
                </div>
            </form>
        </div>

        <!-- Right: Profile Info & Direct Password Reset -->
        <div class="space-y-6">
            <!-- User Summary Card -->
            <div class="bg-[#0e0e0e] border border-gold-400/25 rounded-2xl p-6 shadow-[0_4px_25px_rgba(0,0,0,0.6)] text-xs space-y-4">
                <div class="flex items-center gap-3">
                    <div class="w-12 h-12 rounded-full bg-gold-400/20 border border-gold-400/40 flex items-center justify-center font-serif text-gold-300 font-bold text-base flex-shrink-0">
                        {{ strtoupper(substr($user->name, 0, 2)) }}
                    </div>
                    <div>
                        <h4 class="font-medium text-slate-100 font-serif text-sm">{{ $user->name }}</h4>
                        <span class="text-[10px] text-gold-400 font-mono block">{{ strtoupper($user->role) }}</span>
                    </div>
                </div>

                <div class="border-t border-white/5 pt-3 space-y-2 text-slate-400 font-mono text-[11px]">
                    <div class="flex justify-between">
                        <span>Total Pesanan:</span>
                        <span class="text-gold-300 font-bold">{{ $user->orders()->count() }} Pesanan</span>
                    </div>
                    <div class="flex justify-between">
                        <span>Bergabung:</span>
                        <span class="text-slate-300">{{ $user->created_at->isoFormat('D MMM Y, HH:mm') }}</span>
                    </div>
                </div>
            </div>

            <!-- Direct Password Reset Box -->
            <div class="bg-[#0e0e0e] border border-gold-400/25 rounded-2xl p-6 shadow-[0_4px_25px_rgba(0,0,0,0.6)] text-xs space-y-4">
                <h4 class="font-serif text-gold-300 text-sm uppercase tracking-wider flex items-center gap-2">
                    <span>🔑</span> Reset Kata Sandi
                </h4>
                <p class="text-slate-400 text-[11px]">
                    Admin dapat memperbarui kata sandi akun pengguna ini secara langsung di bawah ini.
                </p>

                <form action="{{ route('admin.users.reset-password', $user) }}" method="POST" class="space-y-3">
                    @csrf
                    @method('PUT')

                    <div>
                        <label class="block uppercase tracking-wider text-slate-300 mb-1 font-light">
                            Kata Sandi Baru <span class="text-gold-400">*</span>
                        </label>
                        <input type="password" name="password" required minlength="8"
                            placeholder="Minimal 8 karakter"
                            class="w-full px-3.5 py-2.5 bg-black/80 border border-gold-400/25 rounded-xl text-slate-100 placeholder-slate-600 focus:outline-none focus:border-gold-400">
                    </div>

                    <div>
                        <label class="block uppercase tracking-wider text-slate-300 mb-1 font-light">
                            Konfirmasi Sandi <span class="text-gold-400">*</span>
                        </label>
                        <input type="password" name="password_confirmation" required minlength="8"
                            placeholder="Ulangi kata sandi"
                            class="w-full px-3.5 py-2.5 bg-black/80 border border-gold-400/25 rounded-xl text-slate-100 placeholder-slate-600 focus:outline-none focus:border-gold-400">
                    </div>

                    <button type="submit"
                        class="w-full py-2.5 rounded-xl bg-gold-400/20 border border-gold-400/40 text-gold-300 hover:bg-gold-400/30 font-medium uppercase tracking-wider text-[11px] transition-all">
                        Reset Kata Sandi Sekarang
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
