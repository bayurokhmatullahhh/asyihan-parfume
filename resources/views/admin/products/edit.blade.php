@extends('layouts.admin')

@section('title', 'Sunting Mahakarya: ' . $product->name . ' — ASYIHAN Admin')
@section('page_title', 'Sunting Mahakarya')

@section('content')
<div class="max-w-4xl space-y-6">
    <a href="{{ route('admin.products.index') }}" class="text-xs text-gold-400/80 hover:text-gold-300 flex items-center gap-1.5 transition-colors">
        ← Kembali ke Katalog Flacon
    </a>

    <div class="bg-[#0e0e0e] border border-gold-400/25 rounded-2xl p-6 sm:p-8 shadow-[0_4px_30px_rgba(0,0,0,0.7)]">
        @if ($errors->any())
            <div class="mb-6 p-4 rounded-xl bg-rose-950/70 border border-rose-500/30 text-rose-200 text-xs">
                <div class="font-semibold text-rose-300 mb-1 flex items-center gap-2">
                    <span>⚠️</span> Mohon periksa kembali input Anda:
                </div>
                <ul class="list-disc list-inside space-y-1 text-slate-300">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.products.update', $product) }}" method="POST" enctype="multipart/form-data" class="space-y-6 text-xs">
            @csrf
            @method('PUT')

            <!-- Section 1: Identitas Produk -->
            <div>
                <h3 class="font-serif text-gold-400 text-sm tracking-wider uppercase mb-3 flex items-center gap-2">
                    <span>✧</span> Identitas Mahakarya
                </h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div class="sm:col-span-2">
                        <label class="block uppercase tracking-wider text-slate-300 mb-1.5 font-light">
                            Nama Mahakarya <span class="text-gold-400">*</span>
                        </label>
                        <input type="text" name="name" value="{{ old('name', $product->name) }}" required
                            class="w-full px-4 py-3 bg-black/80 border border-gold-400/25 rounded-xl text-slate-100 placeholder-slate-600 focus:outline-none focus:border-gold-400 transition-colors">
                    </div>

                    <div>
                        <label class="block uppercase tracking-wider text-slate-300 mb-1.5 font-light">
                            Kategori Sakral <span class="text-gold-400">*</span>
                        </label>
                        <select name="category_id" required class="w-full px-4 py-3 bg-black/80 border border-gold-400/25 rounded-xl text-slate-100 focus:outline-none focus:border-gold-400 transition-colors">
                            <option value="">-- Pilih Kategori --</option>
                            @foreach($categories as $cat)
                                <option value="{{ $cat->id }}" {{ old('category_id', $product->category_id ?? ($product->category === $cat->slug ? $cat->id : '')) == $cat->id ? 'selected' : '' }}>
                                    {{ $cat->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block uppercase tracking-wider text-slate-300 mb-1.5 font-light">
                            Nomor Esensi Numerologi (Opsional)
                        </label>
                        <input type="number" name="essence_number" value="{{ old('essence_number', $product->essence_number) }}" min="1" max="999"
                            class="w-full px-4 py-3 bg-black/80 border border-gold-400/25 rounded-xl text-slate-100 placeholder-slate-600 focus:outline-none focus:border-gold-400 transition-colors"
                            placeholder="1 - 9">
                    </div>

                    <div class="sm:col-span-2">
                        <label class="block uppercase tracking-wider text-slate-300 mb-1.5 font-light">
                            Tagline Filosofis
                        </label>
                        <input type="text" name="tagline" value="{{ old('tagline', $product->tagline) }}"
                            class="w-full px-4 py-3 bg-black/80 border border-gold-400/25 rounded-xl text-slate-100 placeholder-slate-600 focus:outline-none focus:border-gold-400 transition-colors">
                    </div>
                </div>
            </div>

            <!-- Section 2: Deskripsi & Karakteristik Jiwa (DIPISAH) -->
            <div class="pt-4 border-t border-white/5 space-y-4">
                <h3 class="font-serif text-gold-400 text-sm tracking-wider uppercase mb-1 flex items-center gap-2">
                    <span>✧</span> Filosofi & Karakteristik Jiwa
                </h3>

                <div>
                    <label class="block uppercase tracking-wider text-slate-300 mb-1.5 font-light flex items-center justify-between">
                        <span>Deskripsi Mahakarya & Karakter Wewangian</span>
                        <span class="text-[10px] text-slate-500 font-mono">Untuk detail wewangian & notes</span>
                    </label>
                    <textarea name="description" rows="3"
                        class="w-full px-4 py-3 bg-black/80 border border-gold-400/25 rounded-xl text-slate-100 placeholder-slate-600 focus:outline-none focus:border-gold-400 transition-colors leading-relaxed">{{ old('description', $product->description) }}</textarea>
                </div>

                <div>
                    <label class="block uppercase tracking-wider text-amber-300 mb-1.5 font-light flex items-center justify-between">
                        <span>Karakteristik Jiwamu (Hasil Kalkulator Numerologi)</span>
                        <span class="text-[10px] text-amber-400/70 font-mono">Field terpisah untuk narasi jiwa pengguna</span>
                    </label>
                    <textarea name="soul_character" rows="3"
                        class="w-full px-4 py-3 bg-black/80 border border-amber-500/30 rounded-xl text-amber-100 placeholder-slate-600 focus:outline-none focus:border-amber-400 transition-colors leading-relaxed">{{ old('soul_character', $product->soul_character) }}</textarea>
                </div>
            </div>

            <!-- Section 3: Inventori & Gambar (UPLOAD LANGSUNG) -->
            <div class="pt-4 border-t border-white/5 space-y-4">
                <h3 class="font-serif text-gold-400 text-sm tracking-wider uppercase mb-1 flex items-center gap-2">
                    <span>✧</span> Spesifikasi, Harga & Citra Visual
                </h3>

                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                    <div>
                        <label class="block uppercase tracking-wider text-slate-300 mb-1.5 font-light">
                            Harga Investasi (Rp) <span class="text-gold-400">*</span>
                        </label>
                        <input type="number" name="price" value="{{ old('price', (int)$product->price) }}" required min="0" step="1000"
                            class="w-full px-4 py-3 bg-black/80 border border-gold-400/25 rounded-xl text-slate-100 focus:outline-none focus:border-gold-400 transition-colors">
                    </div>

                    <div>
                        <label class="block uppercase tracking-wider text-slate-300 mb-1.5 font-light">
                            Stok Tersedia <span class="text-gold-400">*</span>
                        </label>
                        <input type="number" name="stock" value="{{ old('stock', $product->stock) }}" required min="0"
                            class="w-full px-4 py-3 bg-black/80 border border-gold-400/25 rounded-xl text-slate-100 focus:outline-none focus:border-gold-400 transition-colors">
                    </div>

                    <div>
                        <label class="block uppercase tracking-wider text-slate-300 mb-1.5 font-light">
                            Volume / Ukuran <span class="text-gold-400">*</span>
                        </label>
                        <input type="text" name="volume" value="{{ old('volume', $product->volume) }}" required
                            class="w-full px-4 py-3 bg-black/80 border border-gold-400/25 rounded-xl text-slate-100 focus:outline-none focus:border-gold-400 transition-colors"
                            placeholder="50ml">
                    </div>
                </div>

                <!-- Image Upload Box with Instant Preview -->
                <div>
                    <label class="block uppercase tracking-wider text-slate-300 mb-1.5 font-light">
                        Perbarui Foto Flacon / Produk
                    </label>
                    <div class="grid grid-cols-1 sm:grid-cols-4 gap-4 items-start">
                        <!-- Preview Box -->
                        <div class="sm:col-span-1">
                            <div class="relative w-full aspect-square bg-black/80 border border-dashed border-gold-400/30 rounded-xl overflow-hidden flex flex-col items-center justify-center p-2 text-center group">
                                <img id="image-preview" src="{{ $product->image_url }}" alt="{{ $product->name }}"
                                    class="max-h-full max-w-full object-contain transition-transform group-hover:scale-105 duration-300">
                            </div>
                            <span class="block text-[10px] text-slate-500 text-center mt-1">Foto Saat Ini</span>
                        </div>

                        <!-- Upload Input Control -->
                        <div class="sm:col-span-3">
                            <label for="image-upload"
                                class="flex flex-col items-center justify-center border-2 border-dashed border-gold-400/30 hover:border-gold-400/60 rounded-xl p-6 bg-black/40 hover:bg-gold-400/5 cursor-pointer transition-all">
                                <div class="w-10 h-10 rounded-full bg-gold-400/10 flex items-center justify-center text-gold-400 mb-2">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                </div>
                                <span class="text-xs text-slate-200 font-medium text-center">
                                    Klik untuk mengganti foto atau seret file baru ke sini
                                </span>
                                <span class="text-[11px] text-slate-500 mt-1">
                                    Biarkan kosong jika tidak ingin mengubah foto produk
                                </span>
                                <span id="file-name-display" class="text-xs text-gold-300 font-mono mt-2 hidden"></span>
                                <input id="image-upload" type="file" name="image" accept="image/*" class="hidden">
                            </label>
                        </div>
                    </div>
                </div>

                <!-- Switches -->
                <div class="flex flex-wrap items-center gap-6 pt-2">
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="checkbox" name="is_active" value="1" {{ old('is_active', $product->is_active) ? 'checked' : '' }}
                            class="rounded border-gold-400/40 bg-black text-gold-500 focus:ring-gold-400/40 w-4 h-4">
                        <span class="text-slate-200 font-medium">Aktifkan Mahakarya (Tampil di Katalog)</span>
                    </label>

                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="checkbox" name="is_featured" value="1" {{ old('is_featured', $product->is_featured) ? 'checked' : '' }}
                            class="rounded border-gold-400/40 bg-black text-gold-500 focus:ring-gold-400/40 w-4 h-4">
                        <span class="text-slate-200 font-medium">Sorot Unggulan (Featured)</span>
                    </label>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="pt-5 border-t border-white/10 flex justify-end gap-3">
                <a href="{{ route('admin.products.index') }}" class="px-5 py-2.5 rounded-xl border border-white/20 text-slate-300 hover:bg-white/5 transition-all">
                    Batal
                </a>
                <button type="submit"
                    class="px-6 py-2.5 rounded-xl bg-gradient-to-r from-amber-500 via-gold-400 to-yellow-600 text-black font-semibold uppercase tracking-wider shadow-[0_0_20px_rgba(212,175,55,0.4)] hover:brightness-110 transition-all flex items-center gap-2">
                    <span>✧</span>
                    <span>Perbarui Mahakarya</span>
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const input = document.getElementById('image-upload');
        const preview = document.getElementById('image-preview');
        const nameDisplay = document.getElementById('file-name-display');

        input.addEventListener('change', (e) => {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = (event) => {
                    preview.src = event.target.result;
                };
                reader.readAsDataURL(file);
                nameDisplay.textContent = 'File baru: ' + file.name + ' (' + (file.size / 1024).toFixed(1) + ' KB)';
                nameDisplay.classList.remove('hidden');
            }
        });
    });
</script>
@endsection
