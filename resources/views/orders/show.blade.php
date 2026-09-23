@extends('layouts.app')

@section('title', 'Lacak Pesanan #' . $order->order_number . ' — ASYIHAN')

@section('content')
<div class="py-10 md:py-14 px-4 sm:px-6 max-w-5xl mx-auto">
    <!-- Breadcrumb -->
    <div class="flex items-center gap-2 text-[10px] tracking-[0.2em] uppercase text-zinc-500 font-serif mb-6">
        <a href="{{ route('home') }}" class="hover:text-amber-400 transition-colors">Beranda</a>
        <span>/</span>
        <a href="{{ route('profile') }}" class="hover:text-amber-400 transition-colors">Akun Saya</a>
        <span>/</span>
        <span class="text-amber-400/90">Lacak Pesanan #{{ $order->order_number }}</span>
    </div>

    <!-- Header Section -->
    <div class="bg-[#131313] border border-amber-900/30 rounded-2xl p-6 sm:p-8 shadow-2xl mb-8 relative overflow-hidden">
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 border-b border-zinc-800 pb-6">
            <div>
                <div class="flex items-center gap-2 text-[10px] uppercase font-mono tracking-widest text-amber-400">
                    <span class="w-2 h-2 rounded-full bg-amber-400"></span>
                    PENELUSURAN TAKDIR PESANAN
                </div>
                <h1 class="font-serif text-2xl sm:text-3xl text-amber-100 font-medium mt-1">
                    Pesanan #{{ $order->order_number }}
                </h1>
                <div class="text-xs text-zinc-400 font-mono mt-1">
                    Diinisiasi pada: {{ $order->created_at->format('d F Y, H:i') }} WIB
                </div>
            </div>

            <!-- Status Badges -->
            <div class="flex flex-wrap items-center gap-2 sm:self-start">
                @if($order->isPaid())
                    <span class="px-3 py-1 rounded-full bg-emerald-500/10 border border-emerald-500/40 text-emerald-400 text-xs font-mono flex items-center gap-1.5">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        Pembayaran Lunas
                    </span>
                @else
                    <span class="px-3 py-1 rounded-full bg-amber-500/10 border border-amber-500/40 text-amber-300 text-xs font-mono flex items-center gap-1.5">
                        <span class="w-2 h-2 rounded-full bg-amber-400 animate-pulse"></span>
                        Menunggu Pembayaran
                    </span>
                @endif

                <span class="px-3 py-1 rounded-full bg-zinc-800 border border-zinc-700 text-zinc-300 text-xs font-serif tracking-wider">
                    {{ $order->status_label }}
                </span>
            </div>
        </div>

        <!-- Visual Tracking Timeline -->
        <div class="pt-8 pb-4">
            <div class="text-xs font-serif uppercase tracking-wider text-zinc-400 mb-6 flex items-center gap-2">
                <svg class="w-4 h-4 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                Progres Aliran & Ekspedisi Sakral
            </div>

            <div class="relative">
                <!-- Timeline Grid (4 stages) -->
                <div class="grid grid-cols-2 md:grid-cols-4 gap-6 relative z-10">
                    @php $timeline = $order->status_timeline; @endphp
                    @foreach($timeline as $stepIndex => $step)
                        <div class="flex flex-col items-start sm:items-center text-left sm:text-center">
                            <!-- Indicator Circle -->
                            <div class="w-9 h-9 rounded-full flex items-center justify-center text-xs font-bold mb-3 transition-all
                                {{ $step['completed'] ? 'bg-amber-400 text-black shadow-[0_0_12px_rgba(251,191,36,0.5)]' : ($step['active'] ? 'bg-black border-2 border-amber-400 text-amber-300 shadow-[0_0_10px_rgba(251,191,36,0.3)]' : 'bg-zinc-900 border border-zinc-800 text-zinc-600') }}">
                                @if($step['completed'])
                                    ✓
                                @else
                                    {{ $stepIndex + 1 }}
                                @endif
                            </div>
                            <!-- Step Label -->
                            <div class="font-serif text-xs sm:text-sm font-medium {{ $step['active'] ? 'text-amber-200' : 'text-zinc-500' }}">
                                {{ $step['label'] }}
                            </div>
                            <!-- Step Timestamp -->
                            <div class="text-[10px] font-mono mt-1 {{ $step['active'] ? 'text-zinc-400' : 'text-zinc-600' }}">
                                {{ $step['date'] ?? 'Menunggu proses' }}
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Tracking Number Card (If shipped) -->
        @if($order->tracking_number)
            <div class="mt-6 p-4 rounded-xl bg-gradient-to-r from-amber-950/30 to-black/60 border border-amber-500/40 flex flex-col sm:flex-row sm:items-center justify-between gap-3">
                <div class="flex items-center gap-3">
                    <div class="w-9 h-9 rounded-lg bg-amber-400/10 border border-amber-400/30 flex items-center justify-center text-amber-400">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0"/>
                        </svg>
                    </div>
                    <div>
                        <div class="text-[10px] uppercase tracking-wider text-amber-400 font-mono">NOMOR RESI PENGIRIMAN ({{ strtoupper($order->tracking_courier ?? 'KURIR SAKRAL') }})</div>
                        <div class="text-sm sm:text-base font-mono font-bold text-amber-100 flex items-center gap-2" id="trackingNumberText">
                            {{ $order->tracking_number }}
                        </div>
                    </div>
                </div>

                <button type="button" onclick="copyTrackingNumber()" 
                    class="px-4 py-2 rounded-lg bg-black/60 border border-zinc-700 hover:border-amber-400 text-amber-300 text-xs font-mono uppercase tracking-wider transition-colors flex items-center gap-1.5 self-start sm:self-center">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                    </svg>
                    <span id="copyBtnText">Salin Resi</span>
                </button>
            </div>
        @endif

        <!-- Unpaid Action Banner -->
        @if(! $order->isPaid() && $order->status !== 'cancelled')
            <div class="mt-6 p-4 sm:p-5 rounded-xl bg-amber-400/10 border border-amber-400/30 flex flex-col sm:flex-row items-center justify-between gap-4">
                <div>
                    <div class="text-xs font-serif text-amber-200 font-medium">Pesanan Ini Belum Dibayar</div>
                    <div class="text-[11px] text-zinc-400 mt-0.5">Selesaikan pembayaran untuk segera memulai ritual peracikan & pengiriman sakral.</div>
                </div>
                <a href="{{ route('checkout.payment', $order) }}"
                    class="w-full sm:w-auto px-6 py-2.5 rounded-xl bg-gradient-to-r from-amber-400 to-yellow-500 text-black font-serif font-bold text-xs uppercase tracking-wider hover:brightness-110 shadow-lg shadow-amber-500/20 transition-all text-center">
                    Bayar Sekarang ({{ $order->formatted_total_price }}) →
                </a>
            </div>
        @endif
    </div>

    <!-- Order Breakdown Grid -->
    <div class="grid grid-cols-1 md:grid-cols-12 gap-8">
        <!-- Left: Item List (7 cols) -->
        <div class="md:col-span-7 space-y-4">
            <div class="bg-[#131313] border border-amber-900/30 rounded-2xl p-6 shadow-xl">
                <div class="text-xs font-serif uppercase tracking-wider text-amber-300 font-medium border-b border-zinc-800 pb-3 mb-4">
                    Rincian Formula & Mahakarya ({{ $order->items->count() }} Item)
                </div>

                <div class="space-y-4">
                    @foreach($order->items as $item)
                        <div class="flex items-start gap-4 py-2 border-b border-zinc-800/60 last:border-0">
                            <!-- Thumbnail -->
                            <div class="w-14 h-14 bg-black/80 rounded-lg border border-amber-900/30 p-1 flex items-center justify-center flex-shrink-0">
                                @if($item->product && $item->product->image && file_exists(public_path($item->product->image)))
                                    <img src="{{ asset($item->product->image) }}" alt="{{ $item->product_name }}" class="w-full h-full object-contain">
                                @else
                                    <span class="text-amber-400 font-serif text-lg font-bold">
                                        {{ $item->essence_number ?? '✧' }}
                                    </span>
                                @endif
                            </div>

                            <!-- Detail -->
                            <div class="flex-1 min-w-0">
                                <h4 class="font-serif text-sm text-amber-100 font-medium leading-snug">
                                    {{ $item->product_name }}
                                </h4>
                                <div class="text-[11px] text-zinc-400 font-mono mt-0.5">
                                    {{ $item->quantity }} x Rp {{ number_format($item->price, 0, ',', '.') }}
                                </div>
                            </div>

                            <!-- Subtotal -->
                            <div class="text-right">
                                <span class="font-mono text-xs sm:text-sm text-amber-200 font-bold">
                                    {{ $item->formatted_subtotal }}
                                </span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Recipient Information -->
            <div class="bg-[#131313] border border-amber-900/30 rounded-2xl p-6 shadow-xl space-y-4">
                <div class="text-xs font-serif uppercase tracking-wider text-amber-300 font-medium border-b border-zinc-800 pb-3">
                    Informasi Pengiriman & Pemesan
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-xs">
                    <div>
                        <div class="text-[10px] text-zinc-500 uppercase font-mono">Penerima:</div>
                        <div class="text-zinc-200 font-serif font-medium mt-0.5">{{ $order->name }}</div>
                        <div class="text-zinc-400 font-mono mt-0.5">{{ $order->phone }}</div>
                        @if($order->email)
                            <div class="text-zinc-400 mt-0.5">{{ $order->email }}</div>
                        @endif
                    </div>

                    <div>
                        <div class="text-[10px] text-zinc-500 uppercase font-mono">Alamat Tujuan:</div>
                        <div class="text-zinc-300 leading-relaxed mt-0.5">
                            {{ $order->address }}<br>
                            {{ $order->city }}, {{ $order->province }} {{ $order->postal_code }}
                        </div>
                    </div>
                </div>

                @if($order->craftsman_note)
                    <div class="pt-3 border-t border-zinc-800 text-xs">
                        <div class="text-[10px] text-amber-400/80 uppercase font-mono">Ukiran Mantra / Catatan Khusus:</div>
                        <div class="text-amber-200/90 italic mt-1 bg-black/40 p-2.5 rounded-lg border border-zinc-800">
                            "{{ $order->craftsman_note }}"
                        </div>
                    </div>
                @endif
            </div>
        </div>

        <!-- Right: Summary & Assistance (5 cols) -->
        <div class="md:col-span-5 space-y-4">
            <div class="bg-[#131313] border border-amber-900/30 rounded-2xl p-6 shadow-xl space-y-4">
                <div class="text-xs font-serif uppercase tracking-wider text-amber-300 font-medium border-b border-zinc-800 pb-3">
                    Rincian Pembayaran
                </div>

                <div class="space-y-2 text-xs">
                    <div class="flex justify-between text-zinc-400">
                        <span>Subtotal Produk</span>
                        <span class="font-mono text-zinc-300">
                            Rp {{ number_format($order->items->sum('subtotal'), 0, ',', '.') }}
                        </span>
                    </div>
                    <div class="flex justify-between text-zinc-400">
                        <span>Biaya Pengiriman</span>
                        <span class="font-mono {{ $order->shipping_cost > 0 ? 'text-zinc-300' : 'text-emerald-400' }}">
                            {{ $order->shipping_cost > 0 ? 'Rp ' . number_format($order->shipping_cost, 0, ',', '.') : 'GRATIS' }}
                        </span>
                    </div>
                    <div class="flex justify-between text-zinc-400">
                        <span>Metode Pembayaran</span>
                        <span class="font-mono text-amber-300 uppercase">
                            {{ $order->midtrans_payment_type ?? $order->payment_method ?? 'Midtrans' }}
                        </span>
                    </div>
                </div>

                <div class="border-t border-zinc-800 pt-4 flex justify-between items-baseline">
                    <span class="font-serif text-sm text-zinc-200">Total Akhir</span>
                    <span class="font-serif text-xl text-amber-200 font-bold">{{ $order->formatted_total_price }}</span>
                </div>
            </div>

            <!-- WhatsApp Assistance Button -->
            <div class="bg-[#131313] border border-zinc-800 rounded-2xl p-6 text-center shadow-lg">
                <div class="w-10 h-10 rounded-full bg-emerald-500/10 border border-emerald-500/30 text-emerald-400 mx-auto flex items-center justify-center mb-3">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                    </svg>
                </div>
                <h4 class="font-serif text-sm text-zinc-200 font-medium">Bantuan Aliran Penyelarasan</h4>
                <p class="text-[11px] text-zinc-400 mt-1 font-light leading-relaxed">
                    Perlu konfirmasi khusus, perubahan alamat, atau konsultasi weton bersama peracik?
                </p>
                <a href="https://wa.me/6281234567890?text={{ urlencode('Halo Sanctum Asyihan, saya ingin menanyakan progres pesanan #' . $order->order_number) }}"
                   target="_blank"
                   class="mt-4 inline-flex items-center justify-center gap-2 w-full py-2.5 px-4 rounded-xl border border-zinc-700 hover:border-emerald-500/50 hover:bg-emerald-500/10 text-emerald-300 text-xs font-serif uppercase tracking-wider transition-all">
                    <span>Konsultasi via WhatsApp</span>
                </a>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    function copyTrackingNumber() {
        const text = document.getElementById('trackingNumberText').innerText.trim();
        navigator.clipboard.writeText(text).then(() => {
            const btnText = document.getElementById('copyBtnText');
            btnText.textContent = 'Tersalin!';
            setTimeout(() => {
                btnText.textContent = 'Salin Resi';
            }, 2000);
        });
    }
</script>
@endpush
@endsection
