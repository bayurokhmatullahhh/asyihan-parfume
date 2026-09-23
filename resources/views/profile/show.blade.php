@extends('layouts.app')

@section('title', 'Akun Saya — Sanctum Jiwa Pemilik — ASYIHAN')

@section('content')
<div class="py-10 md:py-14 px-4 sm:px-6 max-w-6xl mx-auto">
    <!-- Header Section -->
    <div class="flex flex-col md:flex-row md:items-end justify-between gap-4 mb-8">
        <div>
            <div class="flex items-center gap-2 text-[10px] uppercase tracking-[0.25em] text-amber-400 font-serif font-semibold">
                <span class="w-1.5 h-1.5 rounded-full bg-amber-400 inline-block shadow-[0_0_8px_rgba(251,191,36,0.6)]"></span>
                SANCTUM JIWA PEMILIK
            </div>
            <h1 class="font-serif text-3xl sm:text-4xl text-amber-100 font-normal tracking-wide mt-1">
                Akun Saya
            </h1>
            <p class="text-xs sm:text-sm text-zinc-400 mt-1.5 font-light leading-relaxed">
                Selamat datang di gerbang resonansi batiniah dan jejak wewangian sakral Anda.
            </p>
        </div>

        <div class="self-start md:self-auto">
            <span class="px-4 py-2 rounded-full bg-black/60 border border-amber-500/30 text-amber-300 text-[11px] font-serif uppercase tracking-wider flex items-center gap-2 shadow-lg shadow-black/40">
                <svg class="w-3.5 h-3.5 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                </svg>
                ANGGOTA TERPILIH SANCTUM ASYIHAN
            </span>
        </div>
    </div>

    <!-- Profile Hero Card (Faithful to Mockup) -->
    <div class="bg-[#131313] border border-amber-500/25 rounded-2xl p-6 sm:p-8 shadow-2xl relative overflow-hidden mb-10">
        <div class="flex flex-col lg:flex-row items-center lg:items-start justify-between gap-6 relative z-10">
            <!-- Left: Avatar + Details -->
            <div class="flex flex-col sm:flex-row items-center sm:items-start gap-6 text-center sm:text-left">
                <!-- Sacred Geometry Avatar -->
                <div class="w-24 h-24 sm:w-28 sm:h-28 rounded-2xl bg-black border border-amber-500/40 p-2 flex items-center justify-center flex-shrink-0 shadow-[0_0_25px_rgba(251,191,36,0.12)] relative group">
                    <div class="w-full h-full rounded-xl border border-amber-400/20 bg-gradient-to-br from-amber-950/40 to-black flex items-center justify-center">
                        <svg class="w-12 h-12 text-amber-400 group-hover:scale-105 transition-transform duration-500" viewBox="0 0 100 100" fill="none" stroke="currentColor">
                            <circle cx="50" cy="50" r="42" stroke-width="1.5" stroke-dasharray="2 3"/>
                            <polygon points="50,15 80,75 20,75" stroke-width="1.5"/>
                            <polygon points="50,85 80,25 20,25" stroke-width="1.5"/>
                            <circle cx="50" cy="50" r="16" stroke-width="1.5"/>
                            <circle cx="50" cy="50" r="6" fill="currentColor"/>
                        </svg>
                    </div>
                </div>

                <!-- User Info -->
                <div class="space-y-2">
                    <div class="flex flex-wrap items-center justify-center sm:justify-start gap-3">
                        <h2 class="font-serif text-2xl sm:text-3xl text-amber-100 font-medium tracking-wide">
                            {{ $user->name }}
                        </h2>
                        <span class="px-2.5 py-0.5 rounded bg-amber-400/10 border border-amber-400/30 text-amber-300 text-[10px] font-mono uppercase tracking-widest">
                            INITIE LEVEL {{ $archetype['core_number'] ?? 'VII' }}
                        </span>
                    </div>

                    <!-- Contact details -->
                    <div class="flex flex-wrap items-center justify-center sm:justify-start gap-4 text-xs text-zinc-400 font-mono">
                        <span class="flex items-center gap-1.5">
                            <svg class="w-3.5 h-3.5 text-zinc-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                            {{ $user->email }}
                        </span>
                        @if($user->phone)
                            <span class="flex items-center gap-1.5">
                                <svg class="w-3.5 h-3.5 text-zinc-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                </svg>
                                {{ $user->phone }}
                            </span>
                        @endif
                    </div>

                    <!-- Aura / Weton Badges -->
                    <div class="flex flex-wrap items-center justify-center sm:justify-start gap-2.5 pt-2">
                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-lg bg-black/60 border border-zinc-800 text-amber-200 text-[11px] font-mono">
                            <span class="text-amber-400">✧</span>
                            ANGKA INTI: {{ $archetype['core_number'] ?? 7 }} ({{ strtoupper($archetype['archetype']['name'] ?? 'THE SEEKER') }})
                        </span>
                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-lg bg-black/60 border border-zinc-800 text-zinc-300 text-[11px] font-mono">
                            <span class="text-amber-400">☾</span>
                            WETON: {{ strtoupper($archetype['weton'] ?? 'SUKRA PON') }}
                        </span>
                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-lg bg-black/60 border border-zinc-800 text-amber-400/90 text-[11px] font-mono">
                            <span class="text-amber-400">🛡</span>
                            ALCHEMIST MEMBER
                        </span>
                    </div>
                </div>
            </div>

            <!-- Right: Action Buttons -->
            <div class="flex flex-col sm:flex-row lg:flex-col gap-2.5 w-full sm:w-auto flex-shrink-0">
                <a href="{{ route('profile.edit') }}" 
                   class="px-5 py-2.5 rounded-xl bg-black/80 hover:bg-zinc-800 border border-zinc-700 hover:border-amber-400/50 text-zinc-200 hover:text-amber-300 text-xs font-serif uppercase tracking-wider transition-all flex items-center justify-center gap-2">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
                    </svg>
                    <span>EDIT PROFIL</span>
                </a>

                <button type="button" onclick="shareProfileAura()"
                   class="px-5 py-2.5 rounded-xl bg-black/80 hover:bg-zinc-800 border border-zinc-700 hover:border-amber-400/50 text-zinc-200 hover:text-amber-300 text-xs font-serif uppercase tracking-wider transition-all flex items-center justify-center gap-2">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z"/>
                    </svg>
                    <span id="shareBtnText">BAGIKAN AURA</span>
                </button>
            </div>
        </div>
    </div>

    <!-- Navigation Tabs Bar -->
    <div class="flex items-center justify-between border-b border-zinc-800/80 mb-8 pb-3 overflow-x-auto">
        <div class="flex items-center gap-6 sm:gap-8">
            <button class="text-xs sm:text-sm font-serif uppercase tracking-wider text-amber-300 border-b-2 border-amber-400 pb-3 flex items-center gap-2 -mb-3.5">
                <svg class="w-4 h-4 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                </svg>
                <span>PESANAN SAYA</span>
                <span class="px-2 py-0.5 rounded-full bg-amber-400/20 text-amber-300 text-[10px] font-mono">{{ $orders->count() }}</span>
            </button>

            <a href="{{ route('profile.edit') }}" class="text-xs sm:text-sm font-serif uppercase tracking-wider text-zinc-400 hover:text-amber-200 pb-3 flex items-center gap-2 transition-colors">
                <svg class="w-4 h-4 text-zinc-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                </svg>
                <span>ALAMAT PENGIRIMAN</span>
            </a>

            <span class="text-xs sm:text-sm font-serif uppercase tracking-wider text-zinc-400 pb-3 flex items-center gap-2 cursor-not-allowed opacity-60">
                <svg class="w-4 h-4 text-zinc-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/>
                </svg>
                <span>METODE PEMBAYARAN</span>
            </span>
        </div>

        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="text-xs font-serif uppercase tracking-wider text-zinc-400 hover:text-rose-400 flex items-center gap-1.5 transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                </svg>
                <span>KELUAR GERBANG</span>
            </button>
        </form>
    </div>

    <!-- Section Header: Riwayat Pesanan -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6">
        <div>
            <h3 class="font-serif text-xl sm:text-2xl text-amber-100 font-medium">
                Riwayat Perjalanan & Pesanan Sakral
            </h3>
            <p class="text-xs text-zinc-400 font-light mt-1">
                Daftar formula wewangian yang telah diselaraskan dengan weton dan frekuensi jiwa Anda.
            </p>
        </div>

        <div class="flex items-center gap-2 text-xs font-mono text-zinc-400">
            <span>URUTKAN:</span>
            <select class="bg-black/80 border border-zinc-800 rounded-lg px-3 py-1.5 text-xs text-zinc-300 outline-none">
                <option>Terbaru</option>
                <option>Selesai</option>
                <option>Dalam Proses</option>
            </select>
        </div>
    </div>

    <!-- Orders Cards List -->
    @if($orders->isEmpty())
        <div class="bg-[#131313] border border-amber-900/30 rounded-2xl p-12 text-center shadow-xl">
            <div class="w-16 h-16 rounded-full bg-amber-400/10 border border-amber-400/30 mx-auto flex items-center justify-center text-amber-400 text-2xl mb-4">
                ✧
            </div>
            <h4 class="font-serif text-lg text-amber-100 font-medium">Belum Ada Riwayat Pesanan Sakral</h4>
            <p class="text-xs text-zinc-400 mt-1 max-w-sm mx-auto">
                Anda belum melakukan inisiasi pemesanan wewangian. Mulailah perjalanan aromatik Anda sekarang.
            </p>
            <div class="mt-6 flex justify-center gap-4">
                <a href="{{ route('collection') }}" class="px-6 py-2.5 rounded-xl bg-gradient-to-r from-amber-400 to-yellow-500 text-black font-serif font-semibold text-xs uppercase tracking-wider transition-all">
                    Jelajahi Altar Koleksi
                </a>
            </div>
        </div>
    @else
        <div class="space-y-6">
            @foreach($orders as $order)
                <div class="bg-[#131313] border border-amber-900/30 rounded-2xl overflow-hidden shadow-xl transition-all duration-300 hover:border-amber-500/40">
                    <!-- Top Bar: Order Meta & Status -->
                    <div class="bg-[#171717] border-b border-zinc-800/80 px-6 py-4 flex flex-wrap items-center justify-between gap-4">
                        <div class="flex flex-wrap items-center gap-6 sm:gap-8">
                            <div>
                                <div class="text-[9px] uppercase tracking-widest text-zinc-500 font-mono">NOMOR PESANAN</div>
                                <div class="font-mono text-sm sm:text-base font-bold text-amber-200">
                                    #{{ $order->order_number }}
                                </div>
                            </div>
                            <div>
                                <div class="text-[9px] uppercase tracking-widest text-zinc-500 font-mono">WAKTU INISIASI</div>
                                <div class="text-xs sm:text-sm text-zinc-300 font-mono">
                                    {{ $order->created_at->isoFormat('D MMMM Y') }}
                                </div>
                            </div>
                            <div>
                                <div class="text-[9px] uppercase tracking-widest text-zinc-500 font-mono">TOTAL MAHAKARYA</div>
                                <div class="text-xs sm:text-sm font-mono font-bold text-amber-100">
                                    {{ $order->formatted_total_price }}
                                </div>
                            </div>
                        </div>

                        <!-- Status Pill Badge -->
                        <div>
                            @if($order->status === 'delivered')
                                <span class="px-3.5 py-1 rounded-full bg-zinc-800 border border-zinc-700 text-zinc-300 text-xs font-mono flex items-center gap-1.5">
                                    <span class="w-1.5 h-1.5 rounded-full bg-zinc-400"></span>
                                    SELESAI PURNA
                                </span>
                            @elseif($order->status === 'shipped')
                                <span class="px-3.5 py-1 rounded-full bg-emerald-500/10 border border-emerald-500/40 text-emerald-400 text-xs font-mono flex items-center gap-1.5">
                                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-400"></span>
                                    TERKIRIM — SEGEL SAKRAL UTUH
                                </span>
                            @elseif($order->isPaid())
                                <span class="px-3.5 py-1 rounded-full bg-amber-500/10 border border-amber-500/40 text-amber-300 text-xs font-mono flex items-center gap-1.5">
                                    <span class="w-1.5 h-1.5 rounded-full bg-amber-400 animate-pulse"></span>
                                    DISUCIKAN & DIRAPALKAN MANTRA
                                </span>
                            @else
                                <span class="px-3.5 py-1 rounded-full bg-amber-400/10 border border-amber-400/40 text-amber-300 text-xs font-mono flex items-center gap-1.5">
                                    <span class="w-1.5 h-1.5 rounded-full bg-amber-400 animate-pulse"></span>
                                    MENUNGGU PEMBAYARAN
                                </span>
                            @endif
                        </div>
                    </div>

                    <!-- Items List Inside Order Card -->
                    <div class="p-6 divide-y divide-zinc-800/60">
                        @foreach($order->items as $item)
                            <div class="py-3.5 first:pt-0 last:pb-0 flex items-start justify-between gap-4">
                                <div class="flex items-start gap-4">
                                    <!-- Item Icon / Thumbnail -->
                                    <div class="w-12 h-12 bg-black rounded-xl border border-amber-900/30 p-1 flex items-center justify-center flex-shrink-0">
                                        @if($item->product && $item->product->image && file_exists(public_path($item->product->image)))
                                            <img src="{{ asset($item->product->image) }}" alt="{{ $item->product_name }}" class="w-full h-full object-contain">
                                        @else
                                            <span class="text-amber-400 font-serif text-sm font-bold">
                                                {{ $item->essence_number ?? '✧' }}
                                            </span>
                                        @endif
                                    </div>

                                    <div>
                                        <h4 class="font-serif text-sm sm:text-base text-amber-100 font-medium">
                                            {{ $item->product_name }}
                                        </h4>
                                        <p class="text-[11px] text-zinc-400 font-light mt-0.5">
                                            50ml Extrait Pure (Konsentrasi Jiwa 35%) • Resonansi {{ $archetype['weton'] ?? 'Sukra Pon' }}
                                        </p>
                                    </div>
                                </div>

                                <div class="text-right flex-shrink-0">
                                    <div class="text-[10px] text-zinc-500 font-mono">{{ $item->quantity }} Unit</div>
                                    <div class="font-mono text-xs sm:text-sm text-amber-200 font-semibold mt-0.5">
                                        {{ $item->formatted_subtotal }}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Card Footer: Courier / Delivery Info & Action Buttons -->
                    <div class="bg-[#101010] border-t border-zinc-800/80 px-6 py-4 flex flex-col md:flex-row items-center justify-between gap-4">
                        <!-- Left Info -->
                        <div class="flex items-center gap-2.5 text-xs text-zinc-400 w-full md:w-auto">
                            @if($order->tracking_number)
                                <svg class="w-4 h-4 text-amber-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0"/>
                                </svg>
                                <span>Kurir {{ ucfirst($order->tracking_courier ?? 'Sanctum Express') }}: <span class="font-mono text-amber-200 font-bold">{{ $order->tracking_number }}</span></span>
                            @else
                                <svg class="w-4 h-4 text-zinc-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                <span>Estimasi Siap Diantar: Pengiriman Sakral Menuju {{ $order->city ?? 'Tujuan' }}</span>
                            @endif
                        </div>

                        <!-- Right Buttons -->
                        <div class="flex items-center gap-3 w-full md:w-auto justify-end">
                            @if(! $order->isPaid() && $order->status !== 'cancelled')
                                <a href="{{ route('checkout.payment', $order) }}"
                                    class="px-4 py-2 rounded-xl bg-gradient-to-r from-amber-400 to-yellow-500 hover:brightness-110 text-black font-serif font-bold text-xs uppercase tracking-wider transition-all">
                                    Bayar Sekarang →
                                </a>
                            @endif

                            <a href="{{ route('order.show', $order) }}"
                                class="px-4 py-2 rounded-xl bg-amber-400/10 hover:bg-amber-400/20 border border-amber-400/40 text-amber-300 font-serif text-xs uppercase tracking-wider transition-all flex items-center gap-1.5">
                                <span>Lihat Detail Pesanan</span>
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>

@push('scripts')
<script>
    function shareProfileAura() {
        const dummyUrl = window.location.href;
        navigator.clipboard.writeText(dummyUrl).then(() => {
            const btnText = document.getElementById('shareBtnText');
            btnText.textContent = 'Aura Tersalin!';
            setTimeout(() => {
                btnText.textContent = 'BAGIKAN AURA';
            }, 2000);
        });
    }
</script>
@endpush
@endsection
