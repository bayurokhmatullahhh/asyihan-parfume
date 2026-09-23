@extends('layouts.admin')

@section('title', 'Sunting Mahakarya: ' . $product->name . ' — ASYIHAN Admin')
@section('page_title', 'Sunting Mahakarya')

@section('content')
<div class="max-w-3xl space-y-6">
    <a href="{{ route('admin.products.index') }}" class="text-xs text-gold-400/80 hover:text-gold-300 flex items-center gap-1.5 transition-colors">
        ← Kembali ke Katalog
    </a>

    <div class="bg-[#0e0e0e] border border-gold-400/25 rounded-2xl p-6 sm:p-8 shadow-[0_4px_25px_rgba(0,0,0,0.6)]">
        @if ($errors->any())
            <div class="mb-6 p-4 rounded-xl bg-rose-950/70 border border-rose-500/30 text-rose-200 text-xs">
                <ul class="list-disc list-inside space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.products.update', $product) }}" method="POST" class="space-y-5 text-xs">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div class="sm:col-span-2">
                    <label class="block uppercase tracking-wider text-slate-300 mb-1.5 font-light">
                        Nama Mahakarya <span class="text-gold-400">*</span>
                    </label>
                    <input type="text" name="name" value="{{ old('name', $product->name) }}" required
                        class="w-full px-4 py-3 bg-black/80 border border-gold-400/25 rounded-xl text-slate-100 placeholder-slate-600 focus:outline-none focus:border-gold-400">
                </div>

                <div>
                    <label class="block uppercase tracking-wider text-slate-300 mb-1.5 font-light">
                        Kategori <span class="text-gold-400">*</span>
                    </label>
                    <select name="category" required class="w-full px-4 py-3 bg-black/80 border border-gold-400/25 rounded-xl text-slate-100 focus:outline-none focus:border-gold-400">
                        <option value="essence" {{ old('category', $product->category) === 'essence' ? 'selected' : '' }}>9 Essence Numerologi</option>
                        <option value="special" {{ old('category', $product->category) === 'special' ? 'selected' : '' }}>Special Offering</option>
                        <option value="talisman" {{ old('category', $product->category) === 'talisman' ? 'selected' : '' }}>Talisman / Lilin</option>
                    </select>
                </div>

                <div>
                    <label class="block uppercase tracking-wider text-slate-300 mb-1.5 font-light">
                        Nomor Esensi (1 - 9)
                    </label>
                    <input type="number" name="essence_number" value="{{ old('essence_number', $product->essence_number) }}" min="1" max="999"
                        class="w-full px-4 py-3 bg-black/80 border border-gold-400/25 rounded-xl text-slate-100 focus:outline-none focus:border-gold-400">
                </div>

                <div class="sm:col-span-2">
                    <label class="block uppercase tracking-wider text-slate-300 mb-1.5 font-light">
                        Tagline Filosofi
                    </label>
                    <input type="text" name="tagline" value="{{ old('tagline', $product->tagline) }}"
                        class="w-full px-4 py-3 bg-black/80 border border-gold-400/25 rounded-xl text-slate-100 focus:outline-none focus:border-gold-400">
                </div>

                <div class="sm:col-span-2">
                    <label class="block uppercase tracking-wider text-slate-300 mb-1.5 font-light">
                        Deskripsi Mahakarya & Karakter Wewangian
                    </label>
                    <textarea name="description" rows="3"
                        class="w-full px-4 py-3 bg-black/80 border border-gold-400/25 rounded-xl text-slate-100 focus:outline-none focus:border-gold-400">{{ old('description', $product->description) }}</textarea>
                </div>

                <div>
                    <label class="block uppercase tracking-wider text-slate-300 mb-1.5 font-light">
                        Harga Investasi (Rp) <span class="text-gold-400">*</span>
                    </label>
                    <input type="number" name="price" value="{{ old('price', (int)$product->price) }}" required min="0" step="1000"
                        class="w-full px-4 py-3 bg-black/80 border border-gold-400/25 rounded-xl text-slate-100 focus:outline-none focus:border-gold-400">
                </div>

                <div>
                    <label class="block uppercase tracking-wider text-slate-300 mb-1.5 font-light">
                        Stok Tersedia <span class="text-gold-400">*</span>
                    </label>
                    <input type="number" name="stock" value="{{ old('stock', $product->stock) }}" required min="0"
                        class="w-full px-4 py-3 bg-black/80 border border-gold-400/25 rounded-xl text-slate-100 focus:outline-none focus:border-gold-400">
                </div>

                <div>
                    <label class="block uppercase tracking-wider text-slate-300 mb-1.5 font-light">
                        Volume / Ukuran <span class="text-gold-400">*</span>
                    </label>
                    <input type="text" name="volume" value="{{ old('volume', $product->volume) }}" required
                        class="w-full px-4 py-3 bg-black/80 border border-gold-400/25 rounded-xl text-slate-100 focus:outline-none focus:border-gold-400">
                </div>

                <div>
                    <label class="block uppercase tracking-wider text-slate-300 mb-1.5 font-light">
                        Jalur Gambar Botol
                    </label>
                    <input type="text" name="image" value="{{ old('image', $product->image) }}"
                        class="w-full px-4 py-3 bg-black/80 border border-gold-400/25 rounded-xl text-slate-100 focus:outline-none focus:border-gold-400">
                </div>

                <div class="sm:col-span-2 flex items-center gap-6 pt-2">
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="checkbox" name="is_active" value="1" {{ old('is_active', $product->is_active) ? 'checked' : '' }}
                            class="rounded border-gold-400/40 bg-black text-gold-500 focus:ring-gold-400/40">
                        <span class="text-slate-200">Aktifkan Mahakarya (Tampil di Katalog)</span>
                    </label>

                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="checkbox" name="is_featured" value="1" {{ old('is_featured', $product->is_featured) ? 'checked' : '' }}
                            class="rounded border-gold-400/40 bg-black text-gold-500 focus:ring-gold-400/40">
                        <span class="text-slate-200">Sorot Unggulan (Featured)</span>
                    </label>
                </div>
            </div>

            <div class="pt-4 border-t border-white/5 flex justify-end gap-3">
                <a href="{{ route('admin.products.index') }}" class="px-5 py-2.5 rounded-xl border border-white/20 text-slate-300 hover:bg-white/5 transition-all">
                    Batal
                </a>
                <button type="submit"
                    class="px-6 py-2.5 rounded-xl bg-gradient-to-r from-amber-500 to-yellow-600 text-black font-semibold uppercase tracking-wider shadow-md hover:brightness-110 transition-all">
                    Perbarui Mahakarya
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
