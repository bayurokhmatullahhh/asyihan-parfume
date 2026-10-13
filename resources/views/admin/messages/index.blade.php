@extends('layouts.admin')

@section('title', 'Pesan Jiwa & Konsultasi — ASYIHAN Admin')
@section('page_title', 'Arsip Pesan Jiwa & Konsultasi Audiens')

@section('content')
<div class="space-y-6">

    <!-- KPI Summary Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
        <!-- Card 1: Total Pesan -->
        <div class="bg-[#0e0e0e] border border-gold-400/20 rounded-2xl p-5 shadow-[0_4px_25px_rgba(0,0,0,0.6)] relative overflow-hidden group">
            <div class="flex items-center justify-between">
                <div>
                    <span class="text-[10px] uppercase font-mono tracking-widest text-slate-400 block mb-1">TOTAL PESAN MASUK</span>
                    <h3 class="text-2xl sm:text-3xl font-serif text-slate-100 font-bold">{{ number_format($stats['total'] ?? $messages->total()) }}</h3>
                    <span class="text-[11px] text-slate-500 font-mono mt-1 block">Arsip seluruh konsultasi</span>
                </div>
                <div class="w-12 h-12 rounded-xl bg-gold-400/10 border border-gold-400/20 flex items-center justify-center text-gold-300 text-xl group-hover:scale-105 transition-transform">
                    📜
                </div>
            </div>
        </div>

        <!-- Card 2: Pesan Baru (Unread) -->
        <a href="{{ route('admin.messages.index', array_merge(request()->except(['status', 'page']), ['status' => 'unread'])) }}"
           class="bg-[#0e0e0e] border {{ request('status') === 'unread' ? 'border-amber-400 ring-1 ring-amber-400/40' : 'border-amber-500/25 hover:border-amber-400/40' }} rounded-2xl p-5 shadow-[0_4px_25px_rgba(0,0,0,0.6)] relative overflow-hidden group transition-all">
            <div class="flex items-center justify-between">
                <div>
                    <div class="flex items-center gap-2 mb-1">
                        <span class="text-[10px] uppercase font-mono tracking-widest text-amber-400 block">BELUM DIBACA</span>
                        @if(($stats['unread'] ?? 0) > 0)
                            <span class="w-2 h-2 rounded-full bg-amber-400 animate-pulse"></span>
                        @endif
                    </div>
                    <h3 class="text-2xl sm:text-3xl font-serif text-amber-300 font-bold">{{ number_format($stats['unread'] ?? 0) }}</h3>
                    <span class="text-[11px] text-slate-400 font-mono mt-1 block">Perlu balasan kurator</span>
                </div>
                <div class="w-12 h-12 rounded-xl bg-amber-400/15 border border-amber-400/30 flex items-center justify-center text-amber-300 text-xl group-hover:scale-105 transition-transform">
                    ✉️
                </div>
            </div>
        </a>

        <!-- Card 3: Dari Member Terdaftar -->
        <a href="{{ route('admin.messages.index', array_merge(request()->except(['user_type', 'page']), ['user_type' => 'registered'])) }}"
           class="bg-[#0e0e0e] border {{ request('user_type') === 'registered' ? 'border-purple-400 ring-1 ring-purple-400/40' : 'border-purple-500/25 hover:border-purple-400/40' }} rounded-2xl p-5 shadow-[0_4px_25px_rgba(0,0,0,0.6)] relative overflow-hidden group transition-all">
            <div class="flex items-center justify-between">
                <div>
                    <span class="text-[10px] uppercase font-mono tracking-widest text-purple-400 block mb-1">MEMBER TERDAFTAR</span>
                    <h3 class="text-2xl sm:text-3xl font-serif text-purple-300 font-bold">{{ number_format($stats['registered'] ?? 0) }}</h3>
                    <span class="text-[11px] text-slate-400 font-mono mt-1 block">Telah memiliki akun</span>
                </div>
                <div class="w-12 h-12 rounded-xl bg-purple-400/15 border border-purple-400/30 flex items-center justify-center text-purple-300 text-xl group-hover:scale-105 transition-transform">
                    👤
                </div>
            </div>
        </a>

        <!-- Card 4: Dari Tamu / Pengunjung -->
        <a href="{{ route('admin.messages.index', array_merge(request()->except(['user_type', 'page']), ['user_type' => 'guest'])) }}"
           class="bg-[#0e0e0e] border {{ request('user_type') === 'guest' ? 'border-sky-400 ring-1 ring-sky-400/40' : 'border-sky-500/25 hover:border-sky-400/40' }} rounded-2xl p-5 shadow-[0_4px_25px_rgba(0,0,0,0.6)] relative overflow-hidden group transition-all">
            <div class="flex items-center justify-between">
                <div>
                    <span class="text-[10px] uppercase font-mono tracking-widest text-sky-400 block mb-1">TAMU (BELUM LOGIN)</span>
                    <h3 class="text-2xl sm:text-3xl font-serif text-sky-300 font-bold">{{ number_format($stats['guest'] ?? 0) }}</h3>
                    <span class="text-[11px] text-slate-400 font-mono mt-1 block">Pengunjung etalase publik</span>
                </div>
                <div class="w-12 h-12 rounded-xl bg-sky-400/15 border border-sky-400/30 flex items-center justify-center text-sky-300 text-xl group-hover:scale-105 transition-transform">
                    🌐
                </div>
            </div>
        </a>
    </div>

    <!-- Filter & Search Bar -->
    <div class="bg-[#0e0e0e] border border-gold-400/20 rounded-2xl p-5 shadow-[0_4px_25px_rgba(0,0,0,0.6)]">
        <form action="{{ route('admin.messages.index') }}" method="GET" class="flex flex-col lg:flex-row gap-4 justify-between items-stretch lg:items-center">
            
            <!-- Filters Group -->
            <div class="flex flex-wrap items-center gap-3">
                <!-- Status Filter -->
                <select name="status" onchange="this.form.submit()"
                    class="px-3.5 py-2 bg-black/80 border border-gold-400/25 rounded-xl text-xs text-slate-200 focus:outline-none focus:border-gold-400">
                    <option value="" {{ request('status') == '' ? 'selected' : '' }}>Semua Status Pembacaan</option>
                    <option value="unread" {{ request('status') == 'unread' ? 'selected' : '' }}>Belum Dibaca</option>
                    <option value="read" {{ request('status') == 'read' ? 'selected' : '' }}>Sudah Dibaca</option>
                </select>

                <!-- User Type Filter -->
                <select name="user_type" onchange="this.form.submit()"
                    class="px-3.5 py-2 bg-black/80 border border-gold-400/25 rounded-xl text-xs text-slate-200 focus:outline-none focus:border-gold-400">
                    <option value="" {{ request('user_type') == '' ? 'selected' : '' }}>Semua Tipe Pengirim</option>
                    <option value="registered" {{ request('user_type') == 'registered' ? 'selected' : '' }}>Member Terdaftar (Login)</option>
                    <option value="guest" {{ request('user_type') == 'guest' ? 'selected' : '' }}>Tamu Pengunjung (Belum Login)</option>
                </select>

                <!-- Category Filter -->
                <select name="category" onchange="this.form.submit()"
                    class="px-3.5 py-2 bg-black/80 border border-gold-400/25 rounded-xl text-xs text-slate-200 focus:outline-none focus:border-gold-400">
                    <option value="">Semua Kategori Fokus</option>
                    @foreach($categories as $cat)
                        <option value="{{ $cat }}" {{ request('category') === $cat ? 'selected' : '' }}>{{ $cat }}</option>
                    @endforeach
                </select>

                @if(request()->anyFilled(['status', 'user_type', 'category', 'search']))
                    <a href="{{ route('admin.messages.index') }}" class="text-xs text-rose-400 hover:text-rose-300 font-mono flex items-center gap-1">
                        ✕ Reset Filter
                    </a>
                @endif
            </div>

            <!-- Search Input -->
            <div class="flex items-center gap-2 w-full lg:w-72">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama, nomor, pesan..."
                    class="w-full px-3.5 py-2 bg-black/80 border border-gold-400/25 rounded-xl text-xs text-slate-200 placeholder-slate-500 focus:outline-none focus:border-gold-400">
                <button type="submit" class="px-3 py-2 bg-gold-400/20 border border-gold-400/40 rounded-xl text-gold-300 text-xs hover:bg-gold-400/30 transition-all shrink-0">
                    Cari
                </button>
            </div>
        </form>
    </div>

    <!-- Messages Table -->
    <div class="bg-[#0e0e0e] border border-gold-400/25 rounded-2xl overflow-hidden shadow-[0_4px_25px_rgba(0,0,0,0.6)]">
        <div class="overflow-x-auto">
            <table class="w-full text-xs text-left">
                <thead class="bg-black/80 text-[10px] uppercase font-mono tracking-wider text-slate-400 border-b border-white/10">
                    <tr>
                        <th class="py-3.5 px-4 text-center">Status</th>
                        <th class="py-3.5 px-4">Pengirim & Status Akun</th>
                        <th class="py-3.5 px-4">Kontak WhatsApp</th>
                        <th class="py-3.5 px-4">Fokus Komunikasi</th>
                        <th class="py-3.5 px-4">Info Lahir / Angka</th>
                        <th class="py-3.5 px-4 w-1/3">Penggalan Pesan Jiwa</th>
                        <th class="py-3.5 px-4">Waktu Terkirim</th>
                        <th class="py-3.5 px-4 text-center">Tindakan</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-white/5">
                    @forelse($messages as $msg)
                        <tr class="hover:bg-white/[0.02] transition-colors {{ ! $msg->is_read ? 'bg-amber-400/[0.02]' : '' }}">
                            <!-- Read Status -->
                            <td class="py-4 px-4 text-center whitespace-nowrap">
                                @if(! $msg->is_read)
                                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-amber-400/20 border border-amber-400/50 text-amber-300 font-mono text-[10px] font-bold shadow-[0_0_8px_rgba(251,191,36,0.2)]">
                                        <span class="w-1.5 h-1.5 rounded-full bg-amber-400 animate-pulse"></span>
                                        Baru
                                    </span>
                                @else
                                    <span class="inline-flex items-center gap-1.5 px-2 py-0.5 rounded-full bg-slate-800 text-slate-400 font-mono text-[10px]">
                                        Dibaca
                                    </span>
                                @endif
                            </td>

                            <!-- Sender & User Account -->
                            <td class="py-4 px-4">
                                <div class="font-medium text-slate-100">{{ $msg->name }}</div>
                                <div class="mt-1">
                                    @if($msg->user_id)
                                        <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded bg-amber-400/10 border border-amber-400/30 text-amber-300 font-mono text-[9px]" title="Terdaftar sebagai: {{ $msg->user?->email }}">
                                            👤 Member #{{ $msg->user_id }}
                                        </span>
                                    @else
                                        <span class="inline-flex items-center gap-1 px-1.5 py-0.5 rounded bg-slate-800 text-slate-400 font-mono text-[9px]">
                                            Tamu Publik
                                        </span>
                                    @endif
                                </div>
                            </td>

                            <!-- WhatsApp Contact -->
                            <td class="py-4 px-4 font-mono text-slate-300 text-[11px] whitespace-nowrap">
                                <div>{{ $msg->phone }}</div>
                            </td>

                            <!-- Focus Category -->
                            <td class="py-4 px-4">
                                <span class="px-2 py-1 rounded-lg bg-black border border-gold-400/25 text-gold-300 font-serif text-[11px] whitespace-nowrap">
                                    {{ $msg->category }}
                                </span>
                            </td>

                            <!-- Birth Info -->
                            <td class="py-4 px-4 font-mono text-slate-400 text-[11px]">
                                {{ $msg->birth_info ?: '-' }}
                            </td>

                            <!-- Message Content -->
                            <td class="py-4 px-4 text-slate-200 leading-relaxed font-light">
                                <div class="bg-black/40 border border-white/5 rounded-xl p-3 text-[11px] max-h-24 overflow-y-auto">
                                    {{ $msg->message }}
                                </div>
                            </td>

                            <!-- Created At -->
                            <td class="py-4 px-4 font-mono text-slate-400 text-[11px] whitespace-nowrap">
                                <div>{{ $msg->created_at->isoFormat('D MMM Y') }}</div>
                                <div class="text-[10px] text-slate-500">{{ $msg->created_at->format('H:i') }} WIB</div>
                            </td>

                            <!-- Actions -->
                            <td class="py-4 px-4 text-center">
                                <div class="flex items-center justify-center gap-2 whitespace-nowrap">
                                    <!-- Balas via WhatsApp -->
                                    @php
                                        $cleanPhone = preg_replace('/[^0-9]/', '', $msg->phone);
                                        if (str_starts_with($cleanPhone, '0')) {
                                            $cleanPhone = '62' . substr($cleanPhone, 1);
                                        }
                                        $greeting = "Halo {$msg->name}, terima kasih telah mengirimkan pesan jiwa kepada kami di Sanctum ASYIHAN terkait \"{$msg->category}\". Kami siap mendampingi perjalanan aroma Anda. Bagaimana kami dapat membantu lebih lanjut?";
                                    @endphp
                                    <a href="https://wa.me/{{ $cleanPhone }}?text={{ urlencode($greeting) }}" target="_blank"
                                        class="px-2.5 py-1 rounded bg-emerald-500/20 border border-emerald-500/40 text-emerald-300 text-[11px] hover:bg-emerald-500/30 transition-all font-mono"
                                        title="Balas via WhatsApp">
                                        Balas WA ↗
                                    </a>

                                    <!-- Toggle Read / Unread -->
                                    <form action="{{ route('admin.messages.read', $msg) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit"
                                            class="p-1 rounded text-slate-400 hover:text-amber-300 hover:bg-amber-400/10 transition-colors"
                                            title="{{ $msg->is_read ? 'Tandai Belum Dibaca' : 'Tandai Sudah Dibaca' }}">
                                            @if($msg->is_read)
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 19v-8.93a2 2 0 01.89-1.664l7-4.666a2 2 0 012.22 0l7 4.666A2 2 0 0121 10.07V19M3 19a2 2 0 002 2h14a2 2 0 002-2M3 19l6.75-4.5M21 19l-6.75-4.5M3 10l6.75 4.5M21 10l-6.75 4.5m0 0l-1.14.76a2 2 0 01-2.22 0l-1.14-.76"/></svg>
                                            @else
                                                <svg class="w-4 h-4 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                            @endif
                                        </button>
                                    </form>

                                    <!-- Delete -->
                                    <form action="{{ route('admin.messages.destroy', $msg) }}" method="POST" onsubmit="return confirm('Hapus pesan jiwa dari {{ $msg->name }}?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="p-1 rounded text-rose-400/70 hover:text-rose-300 hover:bg-rose-500/10 transition-colors" title="Hapus">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="py-12 text-center text-slate-500">
                                @if(request('status') === 'unread')
                                    Tidak ada pesan baru yang belum dibaca. Semua telah direspons!
                                @elseif(request('user_type') === 'registered')
                                    Belum ada pesan dari member terdaftar.
                                @elseif(request('user_type') === 'guest')
                                    Belum ada pesan dari pengunjung publik.
                                @else
                                    Belum ada pesan jiwa yang masuk dari formulir kontak.
                                @endif
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($messages->hasPages())
            <div class="p-4 border-t border-white/5">
                {{ $messages->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
