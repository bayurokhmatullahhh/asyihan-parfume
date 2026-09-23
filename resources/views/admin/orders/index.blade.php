@extends('layouts.admin')

@section('title', 'Manajemen Pesanan Sakral — ASYIHAN Admin')
@section('page_title', 'Daftar Pesanan Sakral')

@section('content')
<div class="space-y-6">
    <!-- Filter & Search Bar -->
    <div class="bg-[#0e0e0e] border border-gold-400/20 rounded-2xl p-5 shadow-[0_4px_25px_rgba(0,0,0,0.6)]">
        <form action="{{ route('admin.orders.index') }}" method="GET" class="flex flex-col sm:flex-row gap-4 justify-between items-center">
            <!-- Status Tabs -->
            <div class="flex flex-wrap gap-2 w-full sm:w-auto">
                <a href="{{ route('admin.orders.index') }}"
                    class="px-3.5 py-1.5 rounded-lg text-xs font-mono transition-all {{ !request('status') ? 'bg-gold-400 text-black font-bold' : 'bg-black/60 text-slate-400 hover:text-gold-300 border border-white/5' }}">
                    Semua
                </a>
                <a href="{{ route('admin.orders.index', ['status' => 'pending']) }}"
                    class="px-3.5 py-1.5 rounded-lg text-xs font-mono transition-all {{ request('status') === 'pending' ? 'bg-amber-500 text-black font-bold' : 'bg-black/60 text-slate-400 hover:text-amber-300 border border-white/5' }}">
                    Pending
                </a>
                <a href="{{ route('admin.orders.index', ['status' => 'processing']) }}"
                    class="px-3.5 py-1.5 rounded-lg text-xs font-mono transition-all {{ request('status') === 'processing' ? 'bg-sky-500 text-black font-bold' : 'bg-black/60 text-slate-400 hover:text-sky-300 border border-white/5' }}">
                    Diproses
                </a>
                <a href="{{ route('admin.orders.index', ['status' => 'completed']) }}"
                    class="px-3.5 py-1.5 rounded-lg text-xs font-mono transition-all {{ request('status') === 'completed' ? 'bg-emerald-500 text-black font-bold' : 'bg-black/60 text-slate-400 hover:text-emerald-300 border border-white/5' }}">
                    Selesai
                </a>
                <a href="{{ route('admin.orders.index', ['status' => 'cancelled']) }}"
                    class="px-3.5 py-1.5 rounded-lg text-xs font-mono transition-all {{ request('status') === 'cancelled' ? 'bg-rose-500 text-black font-bold' : 'bg-black/60 text-slate-400 hover:text-rose-300 border border-white/5' }}">
                    Batal
                </a>
            </div>

            <!-- Search Input -->
            <div class="flex items-center gap-2 w-full sm:w-72">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama, WA, no order..."
                    class="w-full px-3.5 py-2 bg-black/80 border border-gold-400/25 rounded-xl text-xs text-slate-200 placeholder-slate-500 focus:outline-none focus:border-gold-400">
                <button type="submit" class="px-3 py-2 bg-gold-400/20 border border-gold-400/40 rounded-xl text-gold-300 text-xs hover:bg-gold-400/30 transition-all">
                    Cari
                </button>
            </div>
        </form>
    </div>

    <!-- Orders Table -->
    <div class="bg-[#0e0e0e] border border-gold-400/25 rounded-2xl overflow-hidden shadow-[0_4px_25px_rgba(0,0,0,0.6)]">
        <div class="overflow-x-auto">
            <table class="w-full text-xs text-left">
                <thead class="bg-black/80 text-[10px] uppercase font-mono tracking-wider text-slate-400 border-b border-white/10">
                    <tr>
                        <th class="py-3.5 px-4">No. Order</th>
                        <th class="py-3.5 px-4">Waktu</th>
                        <th class="py-3.5 px-4">Pemesan</th>
                        <th class="py-3.5 px-4">Esensi / Item</th>
                        <th class="py-3.5 px-4 text-right">Total Investasi</th>
                        <th class="py-3.5 px-4 text-center">Status</th>
                        <th class="py-3.5 px-4 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-white/5">
                    @forelse($orders as $order)
                        <tr class="hover:bg-white/[0.02] transition-colors">
                            <td class="py-4 px-4 font-mono text-gold-400 font-bold">
                                #{{ $order->order_number ?? $order->id }}
                            </td>
                            <td class="py-4 px-4 text-slate-400 font-mono text-[11px]">
                                {{ $order->created_at->isoFormat('D MMM Y, HH:mm') }}
                            </td>
                            <td class="py-4 px-4">
                                <span class="font-medium text-slate-200 block">{{ $order->name }}</span>
                                <span class="text-[10px] text-slate-500 font-mono">{{ $order->phone }}</span>
                            </td>
                            <td class="py-4 px-4 text-slate-300 max-w-xs truncate">
                                {{ $order->essence_name }}
                                <span class="text-[10px] text-slate-500 block">Qty: {{ $order->quantity }} botol</span>
                            </td>
                            <td class="py-4 px-4 text-right font-mono text-gold-300 font-medium">
                                {{ $order->formatted_total_price }}
                            </td>
                            <td class="py-4 px-4 text-center">
                                @php
                                    $colors = [
                                        'pending' => 'bg-amber-500/20 text-amber-300 border-amber-500/30',
                                        'processing' => 'bg-sky-500/20 text-sky-300 border-sky-500/30',
                                        'completed' => 'bg-emerald-500/20 text-emerald-300 border-emerald-500/30',
                                        'cancelled' => 'bg-rose-500/20 text-rose-300 border-rose-500/30',
                                    ];
                                @endphp
                                <span class="px-2.5 py-1 rounded-full text-[10px] uppercase font-mono border {{ $colors[$order->status] ?? 'bg-slate-700 text-slate-300' }}">
                                    {{ $order->status }}
                                </span>
                            </td>
                            <td class="py-4 px-4 text-center">
                                <div class="flex items-center justify-center gap-2">
                                    <a href="{{ route('admin.orders.show', $order) }}"
                                        class="px-2.5 py-1 rounded bg-gold-400/15 border border-gold-400/30 text-gold-300 text-[11px] hover:bg-gold-400/25 transition-all">
                                        Detail
                                    </a>
                                    <form action="{{ route('admin.orders.destroy', $order) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus pesanan ini?')">
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
                            <td colspan="7" class="py-12 text-center text-slate-500">Tidak ada pesanan yang sesuai filter.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($orders->hasPages())
            <div class="p-4 border-t border-white/5">
                {{ $orders->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
