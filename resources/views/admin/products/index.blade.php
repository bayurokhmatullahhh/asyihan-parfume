@extends('layouts.admin')

@section('title', 'Katalog Altar Produk — ASYIHAN Admin')
@section('page_title', 'Katalog Mahakarya Wewangian')

@section('content')
<div class="space-y-6">
    <!-- Header with Create Button -->
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
        <div>
            <p class="text-xs text-slate-400 font-light">Kelola koleksi 9 esensi numerologi dan persembahan khusus.</p>
        </div>
        <a href="{{ route('admin.products.create') }}"
            class="px-4 py-2 rounded-xl bg-gradient-to-r from-amber-500 to-yellow-600 text-black font-semibold text-xs uppercase tracking-wider shadow-md hover:brightness-110 transition-all flex items-center gap-2">
            <span>+ Tambah Mahakarya Baru</span>
        </a>
    </div>

    <!-- Filter & Search Bar -->
    <div class="bg-[#0e0e0e] border border-gold-400/20 rounded-2xl p-5 shadow-[0_4px_25px_rgba(0,0,0,0.6)]">
        <form action="{{ route('admin.products.index') }}" method="GET" class="flex flex-col sm:flex-row gap-4 justify-between items-center">
            <!-- Category Tabs -->
            <div class="flex flex-wrap gap-2 w-full sm:w-auto">
                <a href="{{ route('admin.products.index') }}"
                    class="px-3.5 py-1.5 rounded-lg text-xs font-mono transition-all {{ !request('category') ? 'bg-gold-400 text-black font-bold' : 'bg-black/60 text-slate-400 hover:text-gold-300 border border-white/5' }}">
                    Semua Produk
                </a>
                <a href="{{ route('admin.products.index', ['category' => 'essence']) }}"
                    class="px-3.5 py-1.5 rounded-lg text-xs font-mono transition-all {{ request('category') === 'essence' ? 'bg-amber-500 text-black font-bold' : 'bg-black/60 text-slate-400 hover:text-amber-300 border border-white/5' }}">
                    9 Essence
                </a>
                <a href="{{ route('admin.products.index', ['category' => 'special']) }}"
                    class="px-3.5 py-1.5 rounded-lg text-xs font-mono transition-all {{ request('category') === 'special' ? 'bg-purple-500 text-black font-bold' : 'bg-black/60 text-slate-400 hover:text-purple-300 border border-white/5' }}">
                    Special Offerings
                </a>
            </div>

            <!-- Search Input -->
            <div class="flex items-center gap-2 w-full sm:w-72">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama produk..."
                    class="w-full px-3.5 py-2 bg-black/80 border border-gold-400/25 rounded-xl text-xs text-slate-200 placeholder-slate-500 focus:outline-none focus:border-gold-400">
                <button type="submit" class="px-3 py-2 bg-gold-400/20 border border-gold-400/40 rounded-xl text-gold-300 text-xs hover:bg-gold-400/30 transition-all">
                    Cari
                </button>
            </div>
        </form>
    </div>

    <!-- Products Table -->
    <div class="bg-[#0e0e0e] border border-gold-400/25 rounded-2xl overflow-hidden shadow-[0_4px_25px_rgba(0,0,0,0.6)]">
        <div class="overflow-x-auto">
            <table class="w-full text-xs text-left">
                <thead class="bg-black/80 text-[10px] uppercase font-mono tracking-wider text-slate-400 border-b border-white/10">
                    <tr>
                        <th class="py-3.5 px-4 text-center">Botol</th>
                        <th class="py-3.5 px-4">Nama Produk</th>
                        <th class="py-3.5 px-4 text-center">Kategori</th>
                        <th class="py-3.5 px-4 text-center">Stok</th>
                        <th class="py-3.5 px-4 text-right">Harga</th>
                        <th class="py-3.5 px-4 text-center">Status</th>
                        <th class="py-3.5 px-4 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-white/5">
                    @forelse($products as $product)
                        <tr class="hover:bg-white/[0.02] transition-colors">
                            <td class="py-3 px-4 text-center">
                                <div class="w-10 h-10 mx-auto bg-black/80 rounded-lg border border-gold-400/20 p-1 flex items-center justify-center">
                                    @if($product->image && file_exists(public_path($product->image)))
                                        <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" class="max-h-full object-contain">
                                    @else
                                        <span class="font-serif text-gold-400 font-bold text-xs">{{ $product->essence_number ?? '✧' }}</span>
                                    @endif
                                </div>
                            </td>
                            <td class="py-3 px-4">
                                <span class="font-medium text-slate-100 block font-serif">{{ $product->name }}</span>
                                <span class="text-[10px] text-slate-400 italic block">{{ $product->tagline }}</span>
                            </td>
                            <td class="py-3 px-4 text-center">
                                <span class="px-2 py-0.5 rounded text-[10px] uppercase font-mono border {{ $product->category === 'essence' ? 'bg-amber-500/15 text-amber-300 border-amber-500/30' : 'bg-purple-500/15 text-purple-300 border-purple-500/30' }}">
                                    {{ $product->category }}
                                </span>
                            </td>
                            <td class="py-3 px-4 text-center font-mono text-slate-300">
                                {{ $product->stock }}
                            </td>
                            <td class="py-3 px-4 text-right font-mono text-gold-300 font-medium">
                                {{ $product->formatted_price }}
                            </td>
                            <td class="py-3 px-4 text-center">
                                <form action="{{ route('admin.products.toggle', $product) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="px-2.5 py-0.5 rounded-full text-[10px] font-mono border transition-all {{ $product->is_active ? 'bg-emerald-500/20 text-emerald-300 border-emerald-500/40 hover:bg-emerald-500/30' : 'bg-rose-500/20 text-rose-300 border-rose-500/40 hover:bg-rose-500/30' }}">
                                        {{ $product->is_active ? 'Aktif' : 'Nonaktif' }}
                                    </button>
                                </form>
                            </td>
                            <td class="py-3 px-4 text-center">
                                <div class="flex items-center justify-center gap-2">
                                    <a href="{{ route('admin.products.edit', $product) }}"
                                        class="px-2.5 py-1 rounded bg-gold-400/15 border border-gold-400/30 text-gold-300 text-[11px] hover:bg-gold-400/25 transition-all">
                                        Edit
                                    </a>
                                    <form action="{{ route('admin.products.destroy', $product) }}" method="POST" onsubmit="return confirm('Hapus produk ini dari katalog?')">
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
                            <td colspan="7" class="py-12 text-center text-slate-500">Tidak ada produk dalam katalog.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($products->hasPages())
            <div class="p-4 border-t border-white/5">
                {{ $products->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
