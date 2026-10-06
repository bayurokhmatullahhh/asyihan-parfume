@extends('layouts.admin')

@section('title', 'Manajemen Kategori Sakral — ASYIHAN Admin')
@section('page_title', 'Altar Kategori Produk')

@section('content')
<div class="space-y-6">
    <!-- Top Header -->
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
        <div>
            <p class="text-xs text-slate-400 font-light">
                Kelola taksonomi dan pengelompokan wewangian sakral ASYIHAN. Kategori aktif akan otomatis muncul pada etalase pemesanan.
            </p>
        </div>
        <a href="{{ route('admin.products.index') }}"
            class="px-3.5 py-2 rounded-xl bg-black/80 border border-gold-400/30 text-gold-300 hover:bg-gold-400/10 font-medium text-xs transition-all flex items-center gap-1.5">
            <span>← Kembali ke Katalog Flacon</span>
        </a>
    </div>

    @if ($errors->any())
        <div class="p-4 rounded-xl bg-rose-950/70 border border-rose-500/30 text-rose-200 text-xs">
            <ul class="list-disc list-inside space-y-1">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 items-start">
        <!-- Form Tambah Kategori -->
        <div class="bg-[#0e0e0e] border border-gold-400/25 rounded-2xl p-6 shadow-[0_4px_25px_rgba(0,0,0,0.6)]">
            <h3 class="font-serif text-sm text-gold-300 uppercase tracking-wider mb-4 flex items-center gap-2">
                <span>✧</span> Tambah Kategori Baru
            </h3>

            <form action="{{ route('admin.categories.store') }}" method="POST" class="space-y-4 text-xs">
                @csrf

                <div>
                    <label class="block uppercase tracking-wider text-slate-300 mb-1 font-light">
                        Nama Kategori <span class="text-gold-400">*</span>
                    </label>
                    <input type="text" name="name" value="{{ old('name') }}" required
                        placeholder="Contoh: Extrait de Parfum"
                        class="w-full px-3.5 py-2.5 bg-black/80 border border-gold-400/25 rounded-xl text-slate-100 placeholder-slate-600 focus:outline-none focus:border-gold-400 transition-colors">
                </div>

                <div>
                    <label class="block uppercase tracking-wider text-slate-300 mb-1 font-light">
                        Slug URL (Opsional)
                    </label>
                    <input type="text" name="slug" value="{{ old('slug') }}"
                        placeholder="otomatis dari nama"
                        class="w-full px-3.5 py-2.5 bg-black/80 border border-gold-400/25 rounded-xl text-slate-100 placeholder-slate-600 focus:outline-none focus:border-gold-400 font-mono text-[11px] transition-colors">
                </div>

                <div>
                    <label class="block uppercase tracking-wider text-slate-300 mb-1 font-light">
                        Deskripsi Singkat
                    </label>
                    <textarea name="description" rows="2"
                        placeholder="Penjelasan wewangian dalam kategori ini..."
                        class="w-full px-3.5 py-2.5 bg-black/80 border border-gold-400/25 rounded-xl text-slate-100 placeholder-slate-600 focus:outline-none focus:border-gold-400 transition-colors">{{ old('description') }}</textarea>
                </div>

                <div>
                    <label class="block uppercase tracking-wider text-slate-300 mb-1 font-light">
                        Urutan Tampil (Sort Order)
                    </label>
                    <input type="number" name="sort_order" value="{{ old('sort_order', count($categories) + 1) }}" min="0"
                        class="w-full px-3.5 py-2.5 bg-black/80 border border-gold-400/25 rounded-xl text-slate-100 focus:outline-none focus:border-gold-400 font-mono transition-colors">
                </div>

                <div class="pt-2">
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="checkbox" name="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }}
                            class="rounded border-gold-400/40 bg-black text-gold-500 focus:ring-gold-400/40 w-4 h-4">
                        <span class="text-slate-200">Aktifkan Kategori</span>
                    </label>
                </div>

                <button type="submit"
                    class="w-full mt-2 py-2.5 rounded-xl bg-gradient-to-r from-amber-500 via-gold-400 to-yellow-600 text-black font-semibold uppercase tracking-wider text-xs shadow-md hover:brightness-110 transition-all">
                    + Simpan Kategori
                </button>
            </form>
        </div>

        <!-- Tabel Daftar Kategori -->
        <div class="lg:col-span-2 bg-[#0e0e0e] border border-gold-400/25 rounded-2xl overflow-hidden shadow-[0_4px_25px_rgba(0,0,0,0.6)]">
            <div class="p-5 border-b border-white/5 flex items-center justify-between">
                <h3 class="font-serif text-sm text-gold-300 uppercase tracking-wider flex items-center gap-2">
                    <span>✧</span> Daftar Kategori Sakral ({{ $categories->count() }})
                </h3>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-xs text-left">
                    <thead class="bg-black/80 text-[10px] uppercase font-mono tracking-wider text-slate-400 border-b border-white/10">
                        <tr>
                            <th class="py-3 px-4 text-center">Urutan</th>
                            <th class="py-3 px-4">Nama & Deskripsi</th>
                            <th class="py-3 px-4">Slug</th>
                            <th class="py-3 px-4 text-center">Produk</th>
                            <th class="py-3 px-4 text-center">Status</th>
                            <th class="py-3 px-4 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-white/5">
                        @forelse($categories as $category)
                            <tr class="hover:bg-white/[0.02] transition-colors">
                                <td class="py-3 px-4 text-center font-mono text-gold-400">
                                    #{{ $category->sort_order }}
                                </td>
                                <td class="py-3 px-4">
                                    <span class="font-semibold text-slate-100 font-serif block">{{ $category->name }}</span>
                                    @if($category->description)
                                        <span class="text-[10px] text-slate-400 italic block">{{ $category->description }}</span>
                                    @endif
                                </td>
                                <td class="py-3 px-4 font-mono text-[11px] text-amber-300/80">
                                    {{ $category->slug }}
                                </td>
                                <td class="py-3 px-4 text-center">
                                    <a href="{{ route('admin.products.index', ['category_id' => $category->id]) }}"
                                        class="inline-block px-2.5 py-0.5 rounded-full text-[10px] font-mono bg-gold-400/10 text-gold-300 border border-gold-400/25 hover:bg-gold-400/20">
                                        {{ $category->products_count }} produk
                                    </a>
                                </td>
                                <td class="py-3 px-4 text-center">
                                    <form action="{{ route('admin.categories.toggle', $category) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="px-2.5 py-0.5 rounded-full text-[10px] font-mono border transition-all {{ $category->is_active ? 'bg-emerald-500/20 text-emerald-300 border-emerald-500/40 hover:bg-emerald-500/30' : 'bg-rose-500/20 text-rose-300 border-rose-500/40 hover:bg-rose-500/30' }}">
                                            {{ $category->is_active ? 'Aktif' : 'Nonaktif' }}
                                        </button>
                                    </form>
                                </td>
                                <td class="py-3 px-4 text-center">
                                    <div class="flex items-center justify-center gap-2">
                                        <!-- Edit Modal Trigger -->
                                        <button onclick="openEditModal({{ json_encode($category) }})"
                                            class="px-2.5 py-1 rounded bg-gold-400/15 border border-gold-400/30 text-gold-300 text-[11px] hover:bg-gold-400/25 transition-all">
                                            Edit
                                        </button>

                                        <form action="{{ route('admin.categories.destroy', $category) }}" method="POST" onsubmit="return confirm('Hapus kategori {{ $category->name }}? Produk terkait tidak akan terhapus.')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="p-1 rounded text-rose-400/70 hover:text-rose-300 hover:bg-rose-500/10 transition-colors" title="Hapus Kategori">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="py-10 text-center text-slate-500">Belum ada kategori yang dibuat.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Edit Category Modal -->
<div id="edit-category-modal" class="fixed inset-0 bg-black/80 backdrop-blur-sm z-50 flex items-center justify-center hidden p-4">
    <div class="bg-[#101010] border border-gold-400/30 rounded-2xl max-w-md w-full p-6 text-xs space-y-4 shadow-[0_0_40px_rgba(0,0,0,0.8)]">
        <div class="flex items-center justify-between border-b border-white/10 pb-3">
            <h4 class="font-serif text-gold-300 text-sm uppercase tracking-wider flex items-center gap-1.5">
                <span>✧</span> Sunting Kategori Sakral
            </h4>
            <button onclick="closeEditModal()" class="text-slate-400 hover:text-white text-lg">&times;</button>
        </div>

        <form id="edit-category-form" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label class="block uppercase tracking-wider text-slate-300 mb-1 font-light">
                    Nama Kategori <span class="text-gold-400">*</span>
                </label>
                <input type="text" id="edit-name" name="name" required
                    class="w-full px-3.5 py-2.5 bg-black/80 border border-gold-400/25 rounded-xl text-slate-100 focus:outline-none focus:border-gold-400 transition-colors">
            </div>

            <div>
                <label class="block uppercase tracking-wider text-slate-300 mb-1 font-light">
                    Slug URL <span class="text-gold-400">*</span>
                </label>
                <input type="text" id="edit-slug" name="slug" required
                    class="w-full px-3.5 py-2.5 bg-black/80 border border-gold-400/25 rounded-xl text-slate-100 focus:outline-none focus:border-gold-400 font-mono text-[11px] transition-colors">
            </div>

            <div>
                <label class="block uppercase tracking-wider text-slate-300 mb-1 font-light">
                    Deskripsi Singkat
                </label>
                <textarea id="edit-description" name="description" rows="2"
                    class="w-full px-3.5 py-2.5 bg-black/80 border border-gold-400/25 rounded-xl text-slate-100 focus:outline-none focus:border-gold-400 transition-colors"></textarea>
            </div>

            <div>
                <label class="block uppercase tracking-wider text-slate-300 mb-1 font-light">
                    Urutan Tampil
                </label>
                <input type="number" id="edit-sort_order" name="sort_order" min="0"
                    class="w-full px-3.5 py-2.5 bg-black/80 border border-gold-400/25 rounded-xl text-slate-100 focus:outline-none focus:border-gold-400 font-mono transition-colors">
            </div>

            <div>
                <label class="flex items-center gap-2 cursor-pointer">
                    <input type="checkbox" id="edit-is_active" name="is_active" value="1"
                        class="rounded border-gold-400/40 bg-black text-gold-500 focus:ring-gold-400/40 w-4 h-4">
                    <span class="text-slate-200">Kategori Aktif</span>
                </label>
            </div>

            <div class="pt-3 border-t border-white/10 flex justify-end gap-2">
                <button type="button" onclick="closeEditModal()" class="px-4 py-2 rounded-xl border border-white/20 text-slate-300 hover:bg-white/5">
                    Batal
                </button>
                <button type="submit" class="px-5 py-2 rounded-xl bg-gradient-to-r from-amber-500 to-yellow-600 text-black font-semibold uppercase tracking-wider shadow-md hover:brightness-110">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    function openEditModal(category) {
        const modal = document.getElementById('edit-category-modal');
        const form = document.getElementById('edit-category-form');
        form.action = `/astral-gateway/categories/${category.id}`;
        document.getElementById('edit-name').value = category.name;
        document.getElementById('edit-slug').value = category.slug;
        document.getElementById('edit-description').value = category.description || '';
        document.getElementById('edit-sort_order').value = category.sort_order;
        document.getElementById('edit-is_active').checked = !!category.is_active;
        modal.classList.remove('hidden');
    }

    function closeEditModal() {
        document.getElementById('edit-category-modal').classList.add('hidden');
    }
</script>
@endsection
