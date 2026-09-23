@extends('layouts.app')

@section('title', 'Gerbang Pembayaran Sakral #' . $order->order_number . ' — ASYIHAN')

@section('content')
<div class="py-12 md:py-16 px-4 sm:px-6 max-w-4xl mx-auto">
    <!-- Breadcrumb -->
    <div class="flex items-center gap-2 text-[10px] tracking-[0.2em] uppercase text-zinc-500 font-serif mb-6">
        <a href="{{ route('home') }}" class="hover:text-amber-400 transition-colors">Beranda</a>
        <span>/</span>
        <a href="{{ route('cart.index') }}" class="hover:text-amber-400 transition-colors">Keranjang</a>
        <span>/</span>
        <span class="text-amber-400/90">Gerbang Pembayaran</span>
    </div>

    <!-- Header -->
    <div class="text-center max-w-xl mx-auto mb-10">
        <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-amber-400/10 border border-amber-400/30 text-amber-300 text-[11px] font-serif uppercase tracking-widest mb-3">
            <span class="w-1.5 h-1.5 rounded-full bg-amber-400 inline-block shadow-[0_0_8px_rgba(251,191,36,0.6)]"></span>
            GERBANG TRANSAKSI SAKRAL
        </div>
        <h1 class="font-serif text-3xl sm:text-4xl text-amber-100 font-normal tracking-wide">
            Selesaikan Penyelarasan Mahakarya
        </h1>
        <p class="text-xs sm:text-sm text-zinc-400 mt-2 font-light leading-relaxed">
            Pesanan Anda telah diinisiasi dengan nomor <span class="text-amber-300 font-mono font-semibold">#{{ $order->order_number }}</span>. Lanjutkan ke gerbang pembayaran aman Midtrans untuk memproses persembahan wewangian Anda.
        </p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-12 gap-8">
        <!-- Left: Payment Action Card (7 cols) -->
        <div class="md:col-span-7 space-y-6">
            <div class="bg-[#131313] border border-amber-500/30 rounded-2xl p-6 sm:p-8 shadow-2xl relative overflow-hidden">
                <div class="absolute -right-12 -top-12 w-48 h-48 bg-amber-500/5 rounded-full blur-3xl pointer-events-none"></div>

                <!-- Status Badge -->
                <div class="flex items-center justify-between border-b border-zinc-800 pb-4 mb-6">
                    <div class="text-xs font-serif uppercase tracking-wider text-zinc-400">Status Pembayaran</div>
                    <span class="px-3 py-1 rounded-full bg-amber-400/10 border border-amber-400/40 text-amber-300 text-xs font-mono flex items-center gap-1.5">
                        <span class="w-2 h-2 rounded-full bg-amber-400 animate-pulse"></span>
                        Menunggu Pembayaran
                    </span>
                </div>

                <!-- Total Amount Highlight -->
                <div class="text-center py-4 bg-black/50 border border-amber-900/30 rounded-xl mb-6">
                    <div class="text-[10px] uppercase tracking-widest font-mono text-zinc-400 mb-1">TOTAL YANG HARUS DIBAYAR</div>
                    <div class="font-serif text-3xl sm:text-4xl text-amber-200 font-bold tracking-tight">
                        {{ $order->formatted_total_price }}
                    </div>
                    <div class="text-[10px] text-zinc-500 mt-1">Termasuk PPN & Biaya Pengiriman Sakral</div>
                </div>

                <!-- Midtrans Snap Trigger Button -->
                <button type="button" id="payButton"
                    class="w-full py-4 px-6 rounded-xl bg-gradient-to-r from-amber-400 via-amber-500 to-yellow-500 hover:from-amber-300 hover:to-yellow-400 text-black font-serif font-bold text-sm uppercase tracking-wider shadow-lg shadow-amber-500/20 hover:shadow-amber-500/40 transition-all flex items-center justify-center gap-2 group cursor-pointer">
                    <svg class="w-5 h-5 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"/>
                    </svg>
                    <span>BAYAR SEKARANG VIA MIDTRANS</span>
                </button>

                <!-- Payment Methods Info -->
                <div class="mt-6 pt-6 border-t border-zinc-800 text-center">
                    <div class="text-[10px] uppercase tracking-widest text-zinc-500 font-mono mb-3">METODE PEMBAYARAN DIDUKUNG</div>
                    <div class="flex flex-wrap justify-center items-center gap-3 text-xs text-zinc-400 font-mono">
                        <span class="px-2.5 py-1 rounded bg-black/60 border border-zinc-800">QRIS (GoPay, OVO, Dana)</span>
                        <span class="px-2.5 py-1 rounded bg-black/60 border border-zinc-800">BCA / Mandiri / BNI / BRI VA</span>
                        <span class="px-2.5 py-1 rounded bg-black/60 border border-zinc-800">Kartu Kredit / Debit</span>
                    </div>
                </div>

                <!-- Fallback / Simulated Mode Box (Visible when testing in sandbox or fallback token) -->
                @if(str_starts_with($snapToken, 'mock-snap-') || config('midtrans.server_key') === 'SB-Mid-server-YOUR_SERVER_KEY' || empty(config('midtrans.server_key')))
                    <div class="mt-6 p-4 rounded-xl bg-amber-950/30 border border-amber-500/40 text-left">
                        <div class="flex items-center gap-2 text-xs font-serif text-amber-300 font-medium mb-1">
                            <span>✦</span> Mode Simulasi Sandbox / Testing
                        </div>
                        <p class="text-[11px] text-zinc-400 leading-relaxed">
                            Kunci API Midtrans masih dalam mode pengujian lokal. Anda dapat menguji alur pembayaran berhasil secara langsung di bawah:
                        </p>
                        <a href="{{ route('payment.finish', ['order_id' => $order->order_number, 'transaction_status' => 'settlement']) }}"
                            class="mt-3 inline-block w-full text-center py-2 px-4 rounded-lg bg-emerald-600/30 border border-emerald-500/50 hover:bg-emerald-600/40 text-emerald-300 text-xs font-mono uppercase tracking-wider transition-colors">
                            Simulasikan Pembayaran Berhasil (Success) →
                        </a>
                    </div>
                @endif
            </div>

            <!-- Alternative / Customer Support -->
            <div class="bg-[#131313]/60 border border-zinc-800 rounded-2xl p-5 flex items-center justify-between gap-4">
                <div>
                    <div class="text-xs font-serif text-zinc-300 font-medium">Mengalami Kendala Pembayaran?</div>
                    <div class="text-[11px] text-zinc-500 font-light mt-0.5">Para peracik kami siap membantu verifikasi manual via WhatsApp.</div>
                </div>
                <a href="https://wa.me/6281234567890?text={{ urlencode('Halo Sanctum Asyihan, saya ingin konfirmasi pembayaran pesanan #' . $order->order_number) }}" 
                   target="_blank"
                   class="px-4 py-2 rounded-xl border border-zinc-700 text-zinc-300 hover:text-amber-300 hover:border-amber-400/40 text-xs font-serif tracking-wider whitespace-nowrap transition-colors">
                    Hubungi Penjaga
                </a>
            </div>
        </div>

        <!-- Right: Order Summary Sidebar (5 cols) -->
        <div class="md:col-span-5 space-y-4">
            <div class="bg-[#131313] border border-amber-900/30 rounded-2xl p-6 shadow-xl space-y-5">
                <div class="border-b border-zinc-800 pb-3">
                    <div class="text-[10px] uppercase tracking-widest text-amber-400/80 font-mono">RINCIAN PESANAN</div>
                    <h3 class="font-serif text-lg text-amber-100 font-medium mt-0.5">#{{ $order->order_number }}</h3>
                </div>

                <!-- Items list -->
                <div class="space-y-3">
                    @foreach($order->items as $item)
                        <div class="flex items-center justify-between text-xs py-1 border-b border-zinc-800/40 pb-2">
                            <div class="min-w-0 pr-3">
                                <div class="font-serif text-zinc-200 font-medium truncate">{{ $item->product_name }}</div>
                                <div class="text-[10px] text-zinc-500">{{ $item->quantity }}x @ Rp {{ number_format($item->price, 0, ',', '.') }}</div>
                            </div>
                            <div class="font-mono text-amber-200 font-semibold text-right flex-shrink-0">
                                {{ $item->formatted_subtotal }}
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Delivery & Shipping -->
                <div class="space-y-2 text-xs border-b border-zinc-800 pb-3">
                    <div class="flex justify-between text-zinc-400">
                        <span>Ongkos Pengiriman</span>
                        <span class="font-mono text-zinc-300">
                            {{ $order->shipping_cost > 0 ? 'Rp ' . number_format($order->shipping_cost, 0, ',', '.') : 'GRATIS' }}
                        </span>
                    </div>
                    <div class="flex justify-between text-zinc-400">
                        <span>Layanan Kurir</span>
                        <span class="font-serif text-amber-200/80 text-[11px]">{{ ucfirst($order->expedition) }}</span>
                    </div>
                </div>

                <!-- Destination -->
                <div class="text-xs text-zinc-400 space-y-1">
                    <div class="text-[10px] uppercase font-mono text-zinc-500">Tujuan Pengiriman:</div>
                    <div class="text-zinc-300 font-serif">{{ $order->name }} ({{ $order->phone }})</div>
                    <div class="text-zinc-400 text-[11px] leading-relaxed">{{ $order->address }}, {{ $order->city }}, {{ $order->province }} {{ $order->postal_code }}</div>
                </div>

                <!-- Total -->
                <div class="border-t border-amber-900/40 pt-4 flex justify-between items-baseline">
                    <span class="font-serif text-sm text-zinc-300">Total Pembayaran</span>
                    <span class="font-serif text-xl text-amber-200 font-bold">{{ $order->formatted_total_price }}</span>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script src="{{ config('midtrans.is_production') ? 'https://app.midtrans.com/snap/snap.js' : 'https://app.sandbox.midtrans.com/snap/snap.js' }}" data-client-key="{{ $clientKey }}"></script>
<script>
    const payButton = document.getElementById('payButton');
    const snapToken = "{{ $snapToken }}";

    if (payButton) {
        payButton.addEventListener('click', function() {
            if (typeof window.snap !== 'undefined' && snapToken && !snapToken.startsWith('mock-snap-')) {
                window.snap.pay(snapToken, {
                    onSuccess: function(result) {
                        window.location.href = "{{ route('payment.finish') }}?order_id={{ $order->order_number }}&transaction_status=settlement";
                    },
                    onPending: function(result) {
                        window.location.href = "{{ route('payment.finish') }}?order_id={{ $order->order_number }}&transaction_status=pending";
                    },
                    onError: function(result) {
                        alert('Pembayaran gagal atau dibatalkan. Silakan coba metode lain.');
                    },
                    onClose: function() {
                        // User closed the popup without finishing payment
                    }
                });
            } else {
                // Fallback simulation or snap not loaded
                if (confirm('Midtrans Snap SDK dijalankan dalam mode sandbox simulasi. Tandai transaksi ini sebagai berhasil sekarang?')) {
                    window.location.href = "{{ route('payment.finish') }}?order_id={{ $order->order_number }}&transaction_status=settlement";
                }
            }
        });
    }
</script>
@endpush
@endsection
