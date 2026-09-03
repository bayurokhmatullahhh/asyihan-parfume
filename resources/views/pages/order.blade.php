@extends('layouts.app')

@section('title', 'Pemesanan — ASYIHAN Haute Parfumerie')
@section('meta_description', 'Pesan parfum personal ASYIHAN dengan mudah melalui pemesanan langsung terintegrasi WhatsApp.')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 py-8">

    {{-- Header --}}
    <div class="text-center mb-10">
        <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-gold-400/10 border border-gold-400/30 text-gold-300 text-xs tracking-[0.2em] uppercase mb-4">
            Direct Sacred Order
        </div>
        <h1 class="text-3xl sm:text-5xl font-serif text-white tracking-wider glow-gold mb-3">
            PEMESANAN ESENSI
        </h1>
        <p class="text-gray-300 font-light text-xs sm:text-sm max-w-lg mx-auto leading-relaxed">
            Pilih esensi personalmu, lengkapi data pemesan, dan selesaikan pesanan dengan konfirmasi langsung melalui Concierge WhatsApp kami.
        </p>
        <div class="w-24 h-0.5 bg-gradient-to-r from-transparent via-gold-400 to-transparent mx-auto mt-6"></div>
    </div>

    {{-- Order Form Card --}}
    <div class="bg-panel rounded-2xl p-6 sm:p-10 border border-gold-400/30 box-glow relative overflow-hidden mb-12">
        <div class="absolute -top-24 -right-24 w-80 h-80 bg-gold-400/10 rounded-full blur-3xl pointer-events-none"></div>

        @if ($errors->any())
            <div class="mb-6 p-4 rounded-lg bg-red-900/30 border border-red-500/50 text-red-200 text-xs">
                <ul class="list-disc list-inside space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('order.store') }}" method="POST" class="space-y-6 relative z-10" id="order-form">
            @csrf

            {{-- Essence Selection --}}
            <div>
                <label for="essence_number" class="block text-xs uppercase tracking-widest text-gold-400 font-medium mb-2">
                    Pilih Varian Esensi Sakral
                </label>
                <select id="essence_number" name="essence_number" required class="input-dark py-3">
                    @php
                        $selectedEssence = request()->query('essence', 1);
                    @endphp
                    @foreach($archetypes as $essence)
                        <option value="{{ $essence['number'] }}" {{ $selectedEssence == $essence['number'] ? 'selected' : '' }} data-price="{{ $essence['price'] }}" class="bg-dark-800 text-white">
                            Essence {{ $essence['number'] }} — {{ $essence['name'] }} (Rp {{ number_format($essence['price'], 0, ',', '.') }})
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Quantity Selection --}}
            <div>
                <label for="quantity" class="block text-xs uppercase tracking-widest text-gold-400 font-medium mb-2">
                    Jumlah Botol (50ml)
                </label>
                <input id="quantity" name="quantity" type="number" min="1" max="10" value="1" required class="input-dark py-3">
            </div>

            {{-- Customer Name --}}
            <div>
                <label for="name" class="block text-xs uppercase tracking-widest text-gold-400 font-medium mb-2">
                    Nama Lengkap Pemesan
                </label>
                <input id="name" name="name" type="text" placeholder="Masukkan nama lengkap Anda" required class="input-dark py-3" value="{{ old('name') }}">
            </div>

            {{-- Phone Number --}}
            <div>
                <label for="phone" class="block text-xs uppercase tracking-widest text-gold-400 font-medium mb-2">
                    Nomor WhatsApp
                </label>
                <input id="phone" name="phone" type="tel" placeholder="Contoh: 081234567890" required class="input-dark py-3" value="{{ old('phone') }}">
                <span class="text-[11px] text-gray-500 mt-1 block">Pesanan akan otomatis diteruskan ke WhatsApp untuk konfirmasi pengiriman.</span>
            </div>

            {{-- Email --}}
            <div>
                <label for="email" class="block text-xs uppercase tracking-widest text-gold-400 font-medium mb-2">
                    Alamat Email (Opsional)
                </label>
                <input id="email" name="email" type="email" placeholder="nama@domain.com" class="input-dark py-3" value="{{ old('email') }}">
            </div>

            {{-- Special Notes --}}
            <div>
                <label for="notes" class="block text-xs uppercase tracking-widest text-gold-400 font-medium mb-2">
                    Catatan Khusus / Alamat Pengiriman
                </label>
                <textarea id="notes" name="notes" rows="3" placeholder="Tuliskan alamat lengkap pengiriman atau pesan khusus..." class="textarea-dark">{{ old('notes') }}</textarea>
            </div>

            {{-- Order Summary Box --}}
            <div class="bg-black/60 rounded-xl p-5 border border-gold-400/30 space-y-3">
                <div class="flex justify-between items-center text-xs text-gray-400">
                    <span>Harga Satuan:</span>
                    <span id="summary-unit-price" class="text-white">Rp 1.380.000</span>
                </div>
                <div class="flex justify-between items-center text-xs text-gray-400">
                    <span>Jumlah:</span>
                    <span id="summary-qty" class="text-white">1 Botol</span>
                </div>
                <div class="border-t border-white/10 pt-3 flex justify-between items-center">
                    <span class="text-sm font-serif text-gold-400 uppercase tracking-wider">Total Investasi:</span>
                    <span id="summary-total" class="text-xl font-serif text-white font-bold glow-gold">Rp 1.380.000</span>
                </div>
            </div>

            {{-- Submit Button --}}
            <button type="submit" class="w-full btn-gold py-4 text-xs sm:text-sm tracking-[0.25em] rounded-sm flex items-center justify-center gap-2 shadow-xl">
                <span>Konfirmasi & Lanjutkan ke WhatsApp</span>
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
            </button>
        </form>
    </div>

</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const essenceSelect = document.getElementById('essence_number');
        const quantityInput = document.getElementById('quantity');
        const unitPriceEl = document.getElementById('summary-unit-price');
        const qtyEl = document.getElementById('summary-qty');
        const totalEl = document.getElementById('summary-total');

        function updateSummary() {
            const selectedOpt = essenceSelect.options[essenceSelect.selectedIndex];
            const price = parseInt(selectedOpt.getAttribute('data-price')) || 1380000;
            const qty = Math.max(1, parseInt(quantityInput.value) || 1);
            const total = price * qty;

            unitPriceEl.textContent = 'Rp ' + price.toLocaleString('id-ID');
            qtyEl.textContent = qty + ' Botol';
            totalEl.textContent = 'Rp ' + total.toLocaleString('id-ID');
        }

        if (essenceSelect && quantityInput) {
            essenceSelect.addEventListener('change', updateSummary);
            quantityInput.addEventListener('input', updateSummary);
            updateSummary();
        }
    });
</script>
@endpush
