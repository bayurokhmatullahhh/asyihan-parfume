@extends('layouts.admin')

@section('title', 'Kelola Pengguna — ASYIHAN Admin')
@section('page_title', 'Daftar Pengguna Terdaftar')

@section('content')
<div class="space-y-6">
    <!-- Filter & Search Bar -->
    <div class="bg-[#0e0e0e] border border-gold-400/20 rounded-2xl p-5 shadow-[0_4px_25px_rgba(0,0,0,0.6)]">
        <form action="{{ route('admin.users.index') }}" method="GET" class="flex flex-col sm:flex-row gap-4 justify-between items-center">
            <!-- Role Filter -->
            <div class="flex flex-wrap gap-2 w-full sm:w-auto">
                <a href="{{ route('admin.users.index') }}"
                    class="px-3.5 py-1.5 rounded-lg text-xs font-mono transition-all {{ !request('role') ? 'bg-gold-400 text-black font-bold' : 'bg-black/60 text-slate-400 hover:text-gold-300 border border-white/5' }}">
                    Semua
                </a>
                <a href="{{ route('admin.users.index', ['role' => 'admin']) }}"
                    class="px-3.5 py-1.5 rounded-lg text-xs font-mono transition-all {{ request('role') === 'admin' ? 'bg-amber-500 text-black font-bold' : 'bg-black/60 text-slate-400 hover:text-amber-300 border border-white/5' }}">
                    Admin
                </a>
                <a href="{{ route('admin.users.index', ['role' => 'user']) }}"
                    class="px-3.5 py-1.5 rounded-lg text-xs font-mono transition-all {{ request('role') === 'user' ? 'bg-sky-500 text-black font-bold' : 'bg-black/60 text-slate-400 hover:text-sky-300 border border-white/5' }}">
                    Pelanggan (User)
                </a>
            </div>

            <!-- Search Input -->
            <div class="flex items-center gap-2 w-full sm:w-72">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama, email, WA..."
                    class="w-full px-3.5 py-2 bg-black/80 border border-gold-400/25 rounded-xl text-xs text-slate-200 placeholder-slate-500 focus:outline-none focus:border-gold-400">
                <button type="submit" class="px-3 py-2 bg-gold-400/20 border border-gold-400/40 rounded-xl text-gold-300 text-xs hover:bg-gold-400/30 transition-all">
                    Cari
                </button>
            </div>
        </form>
    </div>

    <!-- Users Table -->
    <div class="bg-[#0e0e0e] border border-gold-400/25 rounded-2xl overflow-hidden shadow-[0_4px_25px_rgba(0,0,0,0.6)]">
        <div class="overflow-x-auto">
            <table class="w-full text-xs text-left">
                <thead class="bg-black/80 text-[10px] uppercase font-mono tracking-wider text-slate-400 border-b border-white/10">
                    <tr>
                        <th class="py-3.5 px-4">Pengguna</th>
                        <th class="py-3.5 px-4">Email</th>
                        <th class="py-3.5 px-4">Nomor WA</th>
                        <th class="py-3.5 px-4 text-center">Peran</th>
                        <th class="py-3.5 px-4 text-center">Pesanan</th>
                        <th class="py-3.5 px-4">Terdaftar Sejak</th>
                        <th class="py-3.5 px-4 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-white/5">
                    @forelse($users as $user)
                        <tr class="hover:bg-white/[0.02] transition-colors">
                            <td class="py-4 px-4 flex items-center gap-3">
                                <div class="w-8 h-8 rounded-full bg-gold-400/10 border border-gold-400/30 flex items-center justify-center font-serif text-gold-300 font-bold text-xs flex-shrink-0">
                                    {{ strtoupper(substr($user->name, 0, 1)) }}
                                </div>
                                <div>
                                    <span class="font-medium text-slate-100 block">{{ $user->name }}</span>
                                    @if($user->id === auth()->id())
                                        <span class="text-[9px] text-emerald-400 font-mono">(Akun Anda)</span>
                                    @endif
                                </div>
                            </td>
                            <td class="py-4 px-4 font-mono text-slate-300">{{ $user->email }}</td>
                            <td class="py-4 px-4 font-mono text-slate-400">{{ $user->phone ?? '-' }}</td>
                            <td class="py-4 px-4 text-center">
                                @if($user->isAdmin())
                                    <span class="px-2.5 py-0.5 rounded-full text-[10px] font-mono bg-amber-500/20 text-amber-300 border border-amber-500/30">
                                        Admin
                                    </span>
                                @else
                                    <span class="px-2.5 py-0.5 rounded-full text-[10px] font-mono bg-slate-700/50 text-slate-300 border border-white/10">
                                        User
                                    </span>
                                @endif
                            </td>
                            <td class="py-4 px-4 text-center font-mono text-gold-400 font-medium">
                                {{ $user->orders_count }}
                            </td>
                            <td class="py-4 px-4 font-mono text-slate-400 text-[11px]">
                                {{ $user->created_at->isoFormat('D MMM Y') }}
                            </td>
                            <td class="py-4 px-4 text-center">
                                @if($user->id !== auth()->id())
                                    <div class="flex items-center justify-center gap-2">
                                        <form action="{{ route('admin.users.toggle-role', $user) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="px-2.5 py-1 rounded bg-gold-400/10 border border-gold-400/30 text-gold-300 text-[10px] hover:bg-gold-400/20 transition-all"
                                                title="Ubah peran admin/user">
                                                Jadikan {{ $user->role === 'admin' ? 'User' : 'Admin' }}
                                            </button>
                                        </form>

                                        <form action="{{ route('admin.users.destroy', $user) }}" method="POST" onsubmit="return confirm('Hapus akun pengguna {{ $user->name }}?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="p-1 rounded text-rose-400/70 hover:text-rose-300 hover:bg-rose-500/10 transition-colors" title="Hapus">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                            </button>
                                        </form>
                                    </div>
                                @else
                                    <span class="text-slate-600 text-[10px] italic">Aktif</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="py-12 text-center text-slate-500">Tidak ada data pengguna yang ditemukan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($users->hasPages())
            <div class="p-4 border-t border-white/5">
                {{ $users->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
