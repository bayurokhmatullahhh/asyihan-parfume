@extends('layouts.admin')

@section('title', 'Detail Pesanan #' . ($order->order_number ?? $order->id) . ' — ASYIHAN Admin')
@section('page_title', 'Rincian Pesanan #' . ($order->order_number ?? $order->id))

@section('content')
<div class="space-y-6 max-w-5xl">
    <!-- Breadcrumb & Actions -->
    <div class="flex flex-col sm:flex-row justify-between sm:items-center gap-4">
        <a href="{{ route('admin.orders.index') }}" class="text-xs text-gold-400/80 hover:text-gold-300 flex items-center gap-1.5 transition-colors">
            ← Kembali ke Daftar Pesanan
        </a>
        <div class="flex items-center gap-3">
            @if($order->phone)
                @php
                    $cleanPhone = preg_replace('/[^0-9]/', '', $order->phone);
                    if (str_starts_with($cleanPhone, '0')) {
                        $cleanPhone = '62' . substr($cleanPhone, 1);
                    }
                @endphp
                <a href="https://wa.me/{{ $cleanPhone }}?text={{ urlencode('Halo ' . $order->name . ', kami dari ASYIHAN Parfume terkait pesanan Anda #' . ($order->order_number ?? $order->id)) }}"
                    target="_blank"
                    class="px-3.5 py-2 rounded-xl bg-emerald-500/20 border border-emerald-500/40 text-emerald-300 text-xs flex items-center gap-2 hover:bg-emerald-500/30 transition-all">
                    <span>💬 Hubungi Customer via WA</span>
                </a>
            @endif
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">
        <!-- Left: Customer & Items (8 cols) -->
        <div class="lg:col-span-8 space-y-6">
            <!-- Customer Card -->
            <div class="bg-[#0e0e0e] border border-gold-400/25 rounded-2xl p-6 shadow-[0_4px_25px_rgba(0,0,0,0.6)]">
                <h3 class="font-serif text-sm text-gold-300 font-medium pb-3 border-b border-white/5 mb-4 uppercase tracking-wider">
                    Informasi Pemesan & Alamat Pengiriman
                </h3>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-xs">
                    <div>
                        <span class="text-slate-400 block text-[11px]">Nama Lengkap</span>
                        <span class="font-medium text-slate-100 text-sm">{{ $order->name }}</span>
                    </div>
                    <div>
                        <span class="text-slate-400 block text-[11px]">Nomor WhatsApp</span>
                        <span class="font-mono text-slate-200">{{ $order->phone }}</span>
                    </div>
                    <div>
                        <span class="text-slate-400 block text-[11px]">Email</span>
                        <span class="font-mono text-slate-200">{{ $order->email ?? '-' }}</span>
                    </div>
                    <div>
                        <span class="text-slate-400 block text-[11px]">Akun Terdaftar</span>
                        <span class="text-slate-200">{{ $order->user ? $order->user->name . ' (ID: ' . $order->user->id . ')' : 'Guest (Tanpa Akun)' }}</span>
                    </div>
                    <div class="sm:col-span-2 pt-2 border-t border-white/5">
                        <span class="text-slate-400 block text-[11px] mb-1">Titik Singgah / Alamat Pengiriman</span>
                        <p class="text-slate-200 leading-relaxed italic bg-black/40 p-3 rounded-xl border border-white/5">
                            {{ $order->address ?? ($order->notes ?? 'Tidak ada alamat spesifik') }}
                            @if($order->city || $order->province)
                                <br><span class="text-gold-400/90 font-mono text-[11px]">{{ $order->city }}, {{ $order->province }} {{ $order->postal_code }}</span>
                            @endif
                        </p>
                    </div>
                    @if($order->craftsman_note)
                        <div class="sm:col-span-2">
                            <span class="text-amber-400 block text-[11px] mb-1">Ukiran Mantra / Catatan Pengrajin:</span>
                            <p class="text-amber-200 italic bg-amber-500/10 p-2.5 rounded-lg border border-amber-500/20">
                                "{{ $order->craftsman_note }}"
                            </p>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Items Card -->
            <div class="bg-[#0e0e0e] border border-gold-400/25 rounded-2xl p-6 shadow-[0_4px_25px_rgba(0,0,0,0.6)]">
                <h3 class="font-serif text-sm text-gold-300 font-medium pb-3 border-b border-white/5 mb-4 uppercase tracking-wider">
                    Daftar Mahakarya Pesanan
                </h3>

                <div class="overflow-x-auto">
                    <table class="w-full text-xs text-left">
                        <thead class="text-[10px] uppercase font-mono tracking-wider text-slate-400 border-b border-white/10">
                            <tr>
                                <th class="py-2.5">Produk</th>
                                <th class="py-2.5 text-center">Jumlah</th>
                                <th class="py-2.5 text-right">Harga Satuan</th>
                                <th class="py-2.5 text-right">Subtotal</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-white/5">
                            @if($order->items && $order->items->count() > 0)
                                @foreach($order->items as $item)
                                    <tr>
                                        <td class="py-3 text-slate-200 font-medium">
                                            {{ $item->product_name }}
                                            @if($item->essence_number)
                                                <span class="text-[10px] text-gold-400 block">Essence {{ $item->essence_number }}</span>
                                            @endif
                                        </td>
                                        <td class="py-3 text-center font-mono">{{ $item->quantity }}</td>
                                        <td class="py-3 text-right font-mono text-slate-400">{{ $item->formatted_price }}</td>
                                        <td class="py-3 text-right font-mono text-gold-300">{{ $item->formatted_subtotal }}</td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td class="py-3 text-slate-200 font-medium">
                                        {{ $order->essence_name }}
                                        @if($order->essence_number)
                                            <span class="text-[10px] text-gold-400 block">Essence {{ $order->essence_number }}</span>
                                        @endif
                                    </td>
                                    <td class="py-3 text-center font-mono">{{ $order->quantity }}</td>
                                    <td class="py-3 text-right font-mono text-slate-400">
                                        Rp {{ number_format(($order->total_price - $order->shipping_cost) / max(1, $order->quantity), 0, ',', '.') }}
                                    </td>
                                    <td class="py-3 text-right font-mono text-gold-300">
                                        Rp {{ number_format($order->total_price - $order->shipping_cost, 0, ',', '.') }}
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Right: Status Update & Summary (4 cols) -->
        <div class="lg:col-span-4 space-y-6">
            <!-- Update Status Form -->
            <div class="bg-[#0e0e0e] border border-gold-400/25 rounded-2xl p-6 shadow-[0_4px_25px_rgba(0,0,0,0.6)]">
                <h3 class="font-serif text-sm text-gold-300 font-medium pb-3 border-b border-white/5 mb-4 uppercase tracking-wider">
                    Kelola Status Pesanan
                </h3>

                <form action="{{ route('admin.orders.status', $order) }}" method="POST" class="space-y-4 text-xs">
                    @csrf
                    @method('PUT')

                    <div>
                        <label class="block uppercase tracking-wider text-slate-400 mb-1 font-mono text-[10px]">
                            Status Pengerjaan / Pengiriman
                        </label>
                        <select name="status" class="w-full px-3 py-2 bg-black/80 border border-gold-400/30 rounded-xl text-slate-200 focus:outline-none focus:border-gold-400">
                            <option value="pending" {{ $order->status === 'pending' ? 'selected' : '' }}>Pending (Menunggu Pembayaran)</option>
                            <option value="processing" {{ $order->status === 'processing' ? 'selected' : '' }}>Processing (Sedang Disucikan/Diracik)</option>
                            <option value="shipped" {{ $order->status === 'shipped' ? 'selected' : '' }}>Shipped (Dalam Pengiriman)</option>
                            <option value="delivered" {{ in_array($order->status, ['delivered', 'completed']) ? 'selected' : '' }}>Delivered / Selesai Diterima</option>
                            <option value="cancelled" {{ $order->status === 'cancelled' ? 'selected' : '' }}>Cancelled (Dibatalkan)</option>
                        </select>
                    </div>

                    <div>
                        <label class="block uppercase tracking-wider text-slate-400 mb-1 font-mono text-[10px]">
                            Kurir Ekspedisi
                        </label>
                        <input type="text" name="tracking_courier" value="{{ old('tracking_courier', $order->tracking_courier) }}"
                            placeholder="Contoh: JNE Express, J&T, Sanctum Express"
                            class="w-full px-3 py-2 bg-black/80 border border-gold-400/30 rounded-xl text-slate-200 focus:outline-none focus:border-gold-400">
                    </div>

                    <div>
                        <label class="block uppercase tracking-wider text-slate-400 mb-1 font-mono text-[10px]">
                            Nomor Resi Pengiriman
                        </label>
                        <input type="text" name="tracking_number" value="{{ old('tracking_number', $order->tracking_number) }}"
                            placeholder="Contoh: JNE98234190823"
                            class="w-full px-3 py-2 bg-black/80 border border-gold-400/30 rounded-xl text-slate-200 focus:outline-none focus:border-gold-400">
                    </div>

                    <div>
                        <label class="block uppercase tracking-wider text-slate-400 mb-1 font-mono text-[10px]">
                            Status Pembayaran
                        </label>
                        <select name="payment_status" class="w-full px-3 py-2 bg-black/80 border border-gold-400/30 rounded-xl text-slate-200 focus:outline-none focus:border-gold-400">
                            <option value="pending" {{ $order->payment_status === 'pending' ? 'selected' : '' }}>Pending (Belum Dibayar)</option>
                            <option value="paid" {{ $order->payment_status === 'paid' ? 'selected' : '' }}>Paid (Lunas)</option>
                            <option value="refunded" {{ $order->payment_status === 'refunded' ? 'selected' : '' }}>Refunded (Dikembalikan)</option>
                            <option value="failed" {{ $order->payment_status === 'failed' ? 'selected' : '' }}>Failed (Gagal)</option>
                        </select>
                    </div>

                    <div>
                        <label class="block uppercase tracking-wider text-slate-400 mb-1 font-mono text-[10px]">
                            Catatan Internal Admin
                        </label>
                        <textarea name="notes" rows="2" class="w-full px-3 py-2 bg-black/80 border border-gold-400/30 rounded-xl text-slate-200 focus:outline-none focus:border-gold-400" placeholder="Catatan internal pengrajin...">{{ old('notes', $order->notes) }}</textarea>
                    </div>

                    <button type="submit" class="w-full py-2.5 rounded-xl bg-gradient-to-r from-amber-500 to-yellow-600 text-black font-semibold text-xs uppercase tracking-wider shadow-md hover:brightness-110 transition-all">
                        Simpan Perubahan & Perbarui Resi
                    </button>
                </form>
            </div>

            <!-- Financial Breakdown -->
            <div class="bg-[#0e0e0e] border border-gold-400/25 rounded-2xl p-6 shadow-[0_4px_25px_rgba(0,0,0,0.6)] space-y-3 text-xs">
                <h3 class="font-serif text-sm text-gold-300 font-medium pb-2 border-b border-white/5 uppercase tracking-wider">
                    Ringkasan Finansial
                </h3>

                <div class="flex justify-between text-slate-400">
                    <span>Metode Bayar:</span>
                    <span class="font-mono text-slate-200 uppercase">{{ $order->payment_method ?? 'QRIS' }}</span>
                </div>
                <div class="flex justify-between text-slate-400">
                    <span>Ekspedisi:</span>
                    <span class="font-mono text-slate-200 uppercase">{{ $order->expedition ?? 'Express Courier' }}</span>
                </div>
                <div class="flex justify-between text-slate-400">
                    <span>Ongkos Kirim:</span>
                    <span class="font-mono text-slate-200">Rp {{ number_format($order->shipping_cost, 0, ',', '.') }}</span>
                </div>
                <div class="flex justify-between text-sm font-bold pt-3 border-t border-white/10 text-slate-100">
                    <span>Total Investasi:</span>
                    <span class="font-serif text-gold-300 glow-gold">{{ $order->formatted_total_price }}</span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
