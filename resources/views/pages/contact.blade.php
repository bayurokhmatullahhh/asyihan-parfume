@extends('layouts.app')

@section('title', 'Hubungi Kami — ASYIHAN Concierge')
@section('meta_description', 'Layanan Concierge wewangian dan konsultasi numerologi ASYIHAN.')

@section('content')
<div class="max-w-5xl mx-auto px-4 sm:px-6 py-8">

    {{-- Header --}}
    <div class="text-center mb-12">
        <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-gold-400/10 border border-gold-400/30 text-gold-300 text-xs tracking-[0.2em] uppercase mb-4">
            Concierge & Inquiries
        </div>
        <h1 class="text-3xl sm:text-5xl font-serif text-white tracking-wider glow-gold mb-3">
            HUBUNGI KAMI
        </h1>
        <p class="text-gray-300 font-light text-xs sm:text-sm max-w-lg mx-auto leading-relaxed">
            Konsultasikan pemilihan wewangian atau ajukan pertanyaan seputar numerologi karakter bersama tim kurator ASYIHAN.
        </p>
        <div class="w-24 h-0.5 bg-gradient-to-r from-transparent via-gold-400 to-transparent mx-auto mt-6"></div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start mb-16">
        
        {{-- Contact Information (5 cols) --}}
        <div class="lg:col-span-5 space-y-6">
            <div class="bg-panel rounded-2xl p-6 sm:p-8 border border-gold-400/20 space-y-6">
                <h2 class="text-lg font-serif text-gold-400 uppercase tracking-widest border-b border-gold-400/20 pb-3">
                    Layanan Resmi
                </h2>

                <div class="space-y-4 text-xs">
                    {{-- WhatsApp --}}
                    <div class="flex items-start gap-4 p-3 bg-black/40 rounded-xl border border-white/5">
                        <div class="w-10 h-10 rounded-full border border-gold-400/40 flex items-center justify-center shrink-0 text-gold-400">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                        </div>
                        <div>
                            <span class="text-gray-400 block">WhatsApp Concierge</span>
                            <a href="https://wa.me/6281234567890" target="_blank" class="text-white font-medium hover:text-gold-400 transition-colors text-sm">
                                +62 812-3456-7890
                            </a>
                        </div>
                    </div>

                    {{-- Email --}}
                    <div class="flex items-start gap-4 p-3 bg-black/40 rounded-xl border border-white/5">
                        <div class="w-10 h-10 rounded-full border border-gold-400/40 flex items-center justify-center shrink-0 text-gold-400">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        </div>
                        <div>
                            <span class="text-gray-400 block">Email Resmi</span>
                            <a href="mailto:info@asyihan.com" class="text-white font-medium hover:text-gold-400 transition-colors text-sm">
                                info@asyihan.com
                            </a>
                        </div>
                    </div>

                    {{-- Instagram --}}
                    <div class="flex items-start gap-4 p-3 bg-black/40 rounded-xl border border-white/5">
                        <div class="w-10 h-10 rounded-full border border-gold-400/40 flex items-center justify-center shrink-0 text-gold-400">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/></svg>
                        </div>
                        <div>
                            <span class="text-gray-400 block">Instagram</span>
                            <a href="https://instagram.com/asyihan.official" target="_blank" class="text-white font-medium hover:text-gold-400 transition-colors text-sm">
                                @asyihan.official
                            </a>
                        </div>
                    </div>
                </div>

                <div class="pt-4 border-t border-white/5 text-[11px] text-gray-500 space-y-1">
                    <p><strong class="text-gray-400">Jam Layanan Concierge:</strong></p>
                    <p>Senin – Minggu: 09.00 – 21.00 WIB</p>
                </div>
            </div>
        </div>

        {{-- Interactive Message Form (7 cols) --}}
        <div class="lg:col-span-7">
            <div class="bg-panel rounded-2xl p-6 sm:p-8 border border-gold-400/20 box-glow relative overflow-hidden">
                <h2 class="text-lg font-serif text-gold-400 uppercase tracking-widest mb-6">
                    Kirim Pesan atau Konsultasi
                </h2>

                <form id="contact-form" class="space-y-4">
                    <div>
                        <label class="block text-xs uppercase tracking-wider text-gray-400 mb-1.5">Nama Anda</label>
                        <input id="contact_name" type="text" placeholder="Masukkan nama Anda" required class="input-dark">
                    </div>

                    <div>
                        <label class="block text-xs uppercase tracking-wider text-gray-400 mb-1.5">Kontak WhatsApp / Email</label>
                        <input id="contact_info" type="text" placeholder="Nomor WhatsApp atau Email" required class="input-dark">
                    </div>

                    <div>
                        <label class="block text-xs uppercase tracking-wider text-gray-400 mb-1.5">Kategori Pertanyaan</label>
                        <select id="contact_category" class="input-dark">
                            <option value="Konsultasi Numerologi" class="bg-dark-800 text-white">Konsultasi Numerologi & Aroma</option>
                            <option value="Pemesanan Custom" class="bg-dark-800 text-white">Pemesanan Khusus / Kado</option>
                            <option value="Kerjasama Bisnis" class="bg-dark-800 text-white">Kerjasama & Reseller</option>
                            <option value="Lainnya" class="bg-dark-800 text-white">Lainnya</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-xs uppercase tracking-wider text-gray-400 mb-1.5">Pesan</label>
                        <textarea id="contact_message" rows="4" placeholder="Tuliskan pesan Anda..." required class="textarea-dark"></textarea>
                    </div>

                    <button type="submit" class="w-full btn-gold py-3.5 text-xs tracking-[0.2em] rounded-sm flex items-center justify-center gap-2">
                        <span>Kirim via WhatsApp Concierge</span>
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                    </button>
                </form>
            </div>
        </div>

    </div>

</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const form = document.getElementById('contact-form');
        if (form) {
            form.addEventListener('submit', function (e) {
                e.preventDefault();
                const name = document.getElementById('contact_name').value;
                const info = document.getElementById('contact_info').value;
                const cat = document.getElementById('contact_category').value;
                const msg = document.getElementById('contact_message').value;

                const text = `✨ *KONSULTASI ASYIHAN* ✨\n\nNama: ${name}\nKontak: ${info}\nKategori: ${cat}\n\nPesan:\n${msg}\n\n---\nFrom Asih, Comes Essence.`;
                const url = `https://wa.me/6281234567890?text=${encodeURIComponent(text)}`;
                window.open(url, '_blank');
            });
        }
    });
</script>
@endpush
