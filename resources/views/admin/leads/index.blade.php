@extends('layouts.admin')

@section('title', 'Leads Kalkulator Numerologi — ASYIHAN Admin')
@section('page_title', 'Data Leads Kalkulator Takdir')

@section('content')
<div class="space-y-6">
    <!-- Filter & Search Bar -->
    <div class="bg-[#0e0e0e] border border-gold-400/20 rounded-2xl p-5 shadow-[0_4px_25px_rgba(0,0,0,0.6)]">
        <form action="{{ route('admin.leads.index') }}" method="GET" class="flex flex-col sm:flex-row gap-4 justify-between items-center">
            <!-- Archetype Filter Dropdown -->
            <div class="flex items-center gap-3 w-full sm:w-auto">
                <select name="archetype" onchange="this.form.submit()"
                    class="px-3.5 py-2 bg-black/80 border border-gold-400/25 rounded-xl text-xs text-slate-200 focus:outline-none focus:border-gold-400">
                    <option value="">Semua Frekuensi Archetype</option>
                    @foreach($archetypes as $arch)
                        <option value="{{ $arch }}" {{ request('archetype') === $arch ? 'selected' : '' }}>{{ $arch }}</option>
                    @endforeach
                </select>
                <span class="text-xs text-slate-400 font-mono hidden md:inline">Total: {{ $leads->total() }} Jiwa</span>
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

    <!-- Leads Table -->
    <div class="bg-[#0e0e0e] border border-gold-400/25 rounded-2xl overflow-hidden shadow-[0_4px_25px_rgba(0,0,0,0.6)]">
        <div class="overflow-x-auto">
            <table class="w-full text-xs text-left">
                <thead class="bg-black/80 text-[10px] uppercase font-mono tracking-wider text-slate-400 border-b border-white/10">
                    <tr>
                        <th class="py-3.5 px-4 text-center">Core</th>
                        <th class="py-3.5 px-4">Nama Lengkap</th>
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
                            <td class="py-4 px-4 text-center">
                                <span class="w-7 h-7 mx-auto rounded-full bg-gold-400/15 border border-gold-400/30 flex items-center justify-center font-serif text-gold-300 font-bold text-xs">
                                    {{ $lead->core_number }}
                                </span>
                            </td>
                            <td class="py-4 px-4 font-medium text-slate-100">
                                {{ $lead->full_name }}
                            </td>
                            <td class="py-4 px-4 font-mono text-slate-400 text-[11px]">
                                {{ $lead->birth_date ? $lead->birth_date->isoFormat('D MMM Y') : '-' }}
                            </td>
                            <td class="py-4 px-4">
                                <span class="text-gold-300 font-serif font-medium">{{ $lead->archetype_name }}</span>
                            </td>
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
                            <td class="py-4 px-4 font-mono text-slate-400 text-[11px]">
                                {{ $lead->created_at->isoFormat('D MMM Y, HH:mm') }}
                            </td>
                            <td class="py-4 px-4 text-center">
                                <div class="flex items-center justify-center gap-2">
                                    @if($lead->phone)
                                        @php
                                            $cleanPhone = preg_replace('/[^0-9]/', '', $lead->phone);
                                            if (str_starts_with($cleanPhone, '0')) {
                                                $cleanPhone = '62' . substr($cleanPhone, 1);
                                            }
                                            $waGreeting = "Halo {$lead->full_name}, kami dari ASYIHAN. Kami melihat aura takdirmu selaras dengan {$lead->archetype_name} (Angka {$lead->core_number}). Apakah ingin berkonsultasi mengenai esensi wewangian yang cocok?";
                                        @endphp
                                        <a href="https://wa.me/{{ $cleanPhone }}?text={{ urlencode($waGreeting) }}" target="_blank"
                                            class="px-2.5 py-1 rounded bg-emerald-500/20 border border-emerald-500/40 text-emerald-300 text-[11px] hover:bg-emerald-500/30 transition-all"
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
                            <td colspan="7" class="py-12 text-center text-slate-500">Belum ada leads dari kalkulator numerologi.</td>
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
