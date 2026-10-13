@extends('layouts.admin')

@section('title', 'Leads Kalkulator Numerologi — ASYIHAN Admin')
@section('page_title', 'Data Leads Kalkulator Takdir')

@section('content')
<div class="space-y-6">

    <!-- KPI Summary Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
        <!-- Card 1: Total Leads -->
        <div class="bg-[#0e0e0e] border border-gold-400/20 rounded-2xl p-5 shadow-[0_4px_25px_rgba(0,0,0,0.6)] relative overflow-hidden group">
            <div class="flex items-center justify-between">
                <div>
                    <span class="text-[10px] uppercase font-mono tracking-widest text-slate-400 block mb-1">TOTAL LEADS MASUK</span>
                    <h3 class="text-2xl sm:text-3xl font-serif text-slate-100 font-bold">{{ number_format($stats['total'] ?? $leads->total()) }}</h3>
                    <span class="text-[11px] text-slate-500 font-mono mt-1 block">Aura terhitung di website</span>
                </div>
                <div class="w-12 h-12 rounded-xl bg-gold-400/10 border border-gold-400/20 flex items-center justify-center text-gold-300 text-xl group-hover:scale-105 transition-transform">
                    ✧
                </div>
            </div>
        </div>

        <!-- Card 2: Registered Members -->
        <a href="{{ route('admin.leads.index', array_merge(request()->except(['user_type', 'page']), ['user_type' => 'registered'])) }}"
           class="bg-[#0e0e0e] border {{ request('user_type') === 'registered' ? 'border-amber-400 ring-1 ring-amber-400/40' : 'border-amber-500/20 hover:border-amber-400/40' }} rounded-2xl p-5 shadow-[0_4px_25px_rgba(0,0,0,0.6)] relative overflow-hidden group transition-all">
            <div class="flex items-center justify-between">
                <div>
                    <div class="flex items-center gap-2 mb-1">
                        <span class="text-[10px] uppercase font-mono tracking-widest text-amber-400 block">MEMBER TERDAFTAR (LOGIN)</span>
                        <span class="px-1.5 py-0.2 text-[8px] rounded bg-amber-400/20 text-amber-300 font-mono">Prioritas</span>
                    </div>
                    <h3 class="text-2xl sm:text-3xl font-serif text-amber-300 font-bold">{{ number_format($stats['registered'] ?? 0) }}</h3>
                    <span class="text-[11px] text-slate-400 font-mono mt-1 block">Telah memiliki akun Asyihan</span>
                </div>
                <div class="w-12 h-12 rounded-xl bg-amber-400/15 border border-amber-400/30 flex items-center justify-center text-amber-300 text-xl group-hover:scale-105 transition-transform">
                    👤
                </div>
            </div>
        </a>

        <!-- Card 3: Guest Visitors -->
        <a href="{{ route('admin.leads.index', array_merge(request()->except(['user_type', 'page']), ['user_type' => 'guest'])) }}"
           class="bg-[#0e0e0e] border {{ request('user_type') === 'guest' ? 'border-sky-400 ring-1 ring-sky-400/40' : 'border-sky-500/20 hover:border-sky-400/40' }} rounded-2xl p-5 shadow-[0_4px_25px_rgba(0,0,0,0.6)] relative overflow-hidden group transition-all">
            <div class="flex items-center justify-between">
                <div>
                    <span class="text-[10px] uppercase font-mono tracking-widest text-sky-400 block mb-1">TAMU (BELUM LOGIN)</span>
                    <h3 class="text-2xl sm:text-3xl font-serif text-sky-300 font-bold">{{ number_format($stats['guest'] ?? 0) }}</h3>
                    <span class="text-[11px] text-slate-400 font-mono mt-1 block">Calon pembeli dari etalase</span>
                </div>
                <div class="w-12 h-12 rounded-xl bg-sky-400/15 border border-sky-400/30 flex items-center justify-center text-sky-300 text-xl group-hover:scale-105 transition-transform">
                    🌐
                </div>
            </div>
        </a>
    </div>

    <!-- Filter & Search Bar -->
    <div class="bg-[#0e0e0e] border border-gold-400/20 rounded-2xl p-5 shadow-[0_4px_25px_rgba(0,0,0,0.6)]">
        <form action="{{ route('admin.leads.index') }}" method="GET" class="flex flex-col lg:flex-row gap-4 justify-between items-stretch lg:items-center">
            
            <!-- Filters Group -->
            <div class="flex flex-wrap items-center gap-3">
                <!-- User Type Filter Dropdown -->
                <select name="user_type" onchange="this.form.submit()"
                    class="px-3.5 py-2 bg-black/80 border border-gold-400/25 rounded-xl text-xs text-slate-200 focus:outline-none focus:border-gold-400">
                    <option value="" {{ request('user_type') == '' ? 'selected' : '' }}>Semua Pengguna (Member & Tamu)</option>
                    <option value="registered" {{ request('user_type') == 'registered' ? 'selected' : '' }}>Hanya Member Terdaftar (Login)</option>
                    <option value="guest" {{ request('user_type') == 'guest' ? 'selected' : '' }}>Hanya Tamu (Belum Login)</option>
                </select>

                <!-- Archetype Filter Dropdown -->
                <select name="archetype" onchange="this.form.submit()"
                    class="px-3.5 py-2 bg-black/80 border border-gold-400/25 rounded-xl text-xs text-slate-200 focus:outline-none focus:border-gold-400">
                    <option value="">Semua Frekuensi Archetype</option>
                    @foreach($archetypes as $arch)
                        <option value="{{ $arch }}" {{ request('archetype') === $arch ? 'selected' : '' }}>{{ $arch }}</option>
                    @endforeach
                </select>

                @if(request()->anyFilled(['user_type', 'archetype', 'search']))
                    <a href="{{ route('admin.leads.index') }}" class="text-xs text-rose-400 hover:text-rose-300 font-mono flex items-center gap-1">
                        ✕ Reset Filter
                    </a>
                @endif
            </div>

            <!-- Search Input -->
            <div class="flex items-center gap-2 w-full lg:w-72">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama, email, WA..."
                    class="w-full px-3.5 py-2 bg-black/80 border border-gold-400/25 rounded-xl text-xs text-slate-200 placeholder-slate-500 focus:outline-none focus:border-gold-400">
                <button type="submit" class="px-3 py-2 bg-gold-400/20 border border-gold-400/40 rounded-xl text-gold-300 text-xs hover:bg-gold-400/30 transition-all shrink-0">
                    Cari
                </button>
            </div>
        </form>
    </div>

    <!-- Leads Table -->
    <div class="bg-[#0e0e0e] border border-gold-400/25 rounded-2xl overflow-hidden shadow-[0_4px_25px_rgba(0,0,0,0.6)]">
        <div class="overflow-x-auto">
            <table class="w-full text-xs text-left">
                <thead class="bg-black/80 text-[10px] uppercase font-mono tracking-wider text-slate-400 border-b border-white/10">
                    <tr>
                        <th class="py-3.5 px-4 text-center">Status Akses</th>
                        <th class="py-3.5 px-4 text-center">Core</th>
                        <th class="py-3.5 px-4">Nama Pengunjung</th>
                        <th class="py-3.5 px-4">Tgl Lahir</th>
                        <th class="py-3.5 px-4">Archetype Hasil</th>
                        <th class="py-3.5 px-4">Kontak (WA / Email)</th>
                        <th class="py-3.5 px-4">Waktu Akses</th>
                        <th class="py-3.5 px-4 text-center">Tindakan</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-white/5">
                    @forelse($leads as $lead)
                        <tr class="hover:bg-white/[0.02] transition-colors">
                            <!-- Status Akses: Member vs Tamu -->
                            <td class="py-4 px-4 text-center whitespace-nowrap">
                                @if($lead->user_id)
                                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-amber-400/15 border border-amber-400/40 text-amber-300 font-mono text-[10px] font-semibold" title="Pengguna terdaftar dengan akun: {{ $lead->user?->email }}">
                                        <span class="w-1.5 h-1.5 rounded-full bg-amber-400 shadow-[0_0_6px_rgba(251,191,36,0.8)]"></span>
                                        Member #{{ $lead->user_id }}
                                    </span>
                                @else
                                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-slate-800/80 border border-slate-700 text-slate-400 font-mono text-[10px]">
                                        <span class="w-1.5 h-1.5 rounded-full bg-slate-500"></span>
                                        Tamu Pengunjung
                                    </span>
                                @endif
                            </td>

                            <!-- Core Number -->
                            <td class="py-4 px-4 text-center">
                                <span class="w-7 h-7 mx-auto rounded-full bg-gold-400/15 border border-gold-400/30 flex items-center justify-center font-serif text-gold-300 font-bold text-xs">
                                    {{ $lead->core_number }}
                                </span>
                            </td>

                            <!-- Full Name -->
                            <td class="py-4 px-4 font-medium text-slate-100">
                                <div>{{ $lead->full_name }}</div>
                                @if($lead->user && $lead->user->name !== $lead->full_name)
                                    <div class="text-[10px] text-slate-500 font-mono">Akun: {{ $lead->user->name }}</div>
                                @endif
                            </td>

                            <!-- Birth Date -->
                            <td class="py-4 px-4 font-mono text-slate-400 text-[11px]">
                                {{ $lead->birth_date ? $lead->birth_date->isoFormat('D MMM Y') : '-' }}
                            </td>

                            <!-- Archetype Result -->
                            <td class="py-4 px-4">
                                <span class="text-gold-300 font-serif font-medium">{{ $lead->archetype_name }}</span>
                            </td>

                            <!-- Contact -->
                            <td class="py-4 px-4 text-slate-300 font-mono text-[11px]">
                                @if($lead->phone)
                                    <div class="text-slate-200">{{ $lead->phone }}</div>
                                @endif
                                @if($lead->email)
                                    <div class="text-slate-400 text-[10px]">{{ $lead->email }}</div>
                                @endif
                                @if(!$lead->phone && !$lead->email)
                                    <span class="text-slate-600 italic">Anonim</span>
                                @endif
                            </td>

                            <!-- Access Time -->
                            <td class="py-4 px-4 font-mono text-slate-400 text-[11px]">
                                {{ $lead->created_at->isoFormat('D MMM Y, HH:mm') }}
                            </td>

                            <!-- Actions -->
                            <td class="py-4 px-4 text-center">
                                <div class="flex items-center justify-center gap-2">
                                    @if($lead->phone)
                                        @php
                                            $cleanPhone = preg_replace('/[^0-9]/', '', $lead->phone);
                                            if (str_starts_with($cleanPhone, '0')) {
                                                $cleanPhone = '62' . substr($cleanPhone, 1);
                                            }
                                            $userGreetingType = $lead->user_id ? 'Member ASYIHAN' : 'Pengunjung ASYIHAN';
                                            $waGreeting = "Halo {$lead->full_name}, kami dari tim Sanctum ASYIHAN. Kami melihat Anda mengecek kalkulator takdir dan aura Anda selaras dengan {$lead->archetype_name} (Angka {$lead->core_number}). Apakah ingin berkonsultasi mengenai formula aroma yang paling selaras dengan energi Anda?";
                                        @endphp
                                        <a href="https://wa.me/{{ $cleanPhone }}?text={{ urlencode($waGreeting) }}" target="_blank"
                                            class="px-2.5 py-1 rounded bg-emerald-500/20 border border-emerald-500/40 text-emerald-300 text-[11px] hover:bg-emerald-500/30 transition-all font-mono"
                                            title="Chat WhatsApp">
                                            Chat WA
                                        </a>
                                    @endif
                                    <form action="{{ route('admin.leads.destroy', $lead) }}" method="POST" onsubmit="return confirm('Hapus data aura ini?')">
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
                                @if(request('user_type') === 'registered')
                                    Belum ada data dari member yang terdaftar (login).
                                @elseif(request('user_type') === 'guest')
                                    Belum ada data dari tamu pengunjung (belum login).
                                @else
                                    Belum ada leads dari kalkulator numerologi.
                                @endif
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($leads->hasPages())
            <div class="p-4 border-t border-white/5">
                {{ $leads->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
