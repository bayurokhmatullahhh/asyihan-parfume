@extends('layouts.app')

@section('title', 'Essence Collection — 9 Sacred Fragrances | ASYIHAN')
@section('meta_description', '9 Essence, 9 Karakter, 9 Aroma. Temukan yang paling sesuai dengan dirimu.')

@section('content')
<div class="max-w-6xl mx-auto px-4 sm:px-6 py-6 sm:py-10">

    {{-- Page Header matching image --}}
    <div class="text-center mb-10 sm:mb-14">
        <h1 class="text-3xl sm:text-4xl md:text-5xl font-serif text-gold-300 tracking-[0.2em] uppercase glow-gold font-medium mb-3">
            ESSENCE COLLECTION
        </h1>
        <p class="text-gray-300 font-light text-xs sm:text-sm tracking-wide flex items-center justify-center gap-1.5 sm:gap-2 flex-wrap">
            <span class="text-gold-400 text-xs">✦</span>
            <span>Essence,</span>
            <span class="text-gold-400 text-xs">✦</span>
            <span>Karakter,</span>
            <span class="text-gold-400 text-xs">✦</span>
            <span>Aroma.</span>
            <span class="text-gray-400 ml-1">Temukan yang paling sesuai dengan dirimu.</span>
        </p>
    </div>

    {{-- Essences Grid (3 Columns on Desktop, exactly matching screenshot) --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5 sm:gap-6 max-w-5xl mx-auto">
        @foreach($archetypes as $essence)
            <div class="essence-card group cursor-pointer relative rounded-2xl overflow-hidden border border-gold-400/20 hover:border-gold-400/80 transition-all duration-300 bg-[#0c0c0c] hover:-translate-y-1 hover:shadow-[0_0_30px_rgba(197,160,89,0.3)] flex flex-col justify-end aspect-[600/620]"
                 onclick="openEssenceModal({{ $essence['number'] }})"
                 title="Klik untuk melihat esensi {{ $essence['name'] }}">
                
                {{-- HD Clean Bottle Background with balanced lighting --}}
                <div class="absolute inset-0 z-0">
                    <img src="{{ asset('images/cards/clean/card_' . $essence['number'] . '_bg.png') }}" 
                         alt="{{ $essence['essence_name'] }}" 
                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-black via-black/25 to-transparent pointer-events-none"></div>
                </div>

                {{-- Razor-Sharp Vector Typography (Divider, Title, Traits) --}}
                <div class="relative z-10 w-full p-4 sm:p-5 text-left bg-gradient-to-t from-[#0c0c0c] via-[#0c0c0c]/85 to-transparent pt-6">
                    <div class="w-full h-px bg-gold-400/30 mb-2.5"></div>
                    <h3 class="text-sm sm:text-base font-serif font-semibold tracking-[0.18em] text-gold-200 group-hover:text-gold-100 uppercase transition-colors glow-gold">
                        {{ $essence['name'] }}
                    </h3>
                    <p class="text-[10px] sm:text-[11px] text-gray-400 font-light tracking-wide mt-1 truncate">
                        {{ implode(' • ', $essence['traits']) }}
                    </p>
                </div>

                {{-- Ambient Golden Glow on Hover --}}
                <div class="absolute inset-0 bg-gold-400/0 group-hover:bg-gold-400/10 transition-colors duration-300 pointer-events-none z-20"></div>
            </div>
        @endforeach
    </div>

    {{-- Explore All Rituals CTA --}}
    <div class="text-center mt-12 sm:mt-16 mb-6">
        <a href="{{ route('ajian') }}" class="btn-gold-outline px-8 sm:px-10 py-3 text-xs tracking-[0.25em] uppercase rounded-[2px] font-medium inline-block hover:shadow-[0_0_20px_rgba(197,160,89,0.4)]">
            EXPLORE ALL RITUALS
        </a>
    </div>

</div>

{{-- Product Pop-up Modal matching user's image --}}
<div id="essence-modal" class="fixed inset-0 z-50 bg-black/85 backdrop-blur-md flex items-center justify-center p-4 sm:p-6 opacity-0 pointer-events-none transition-opacity duration-300" role="dialog" aria-modal="true" aria-labelledby="modal-title">
    
    {{-- Modal Box Container --}}
    <div id="essence-modal-box" class="relative w-full max-w-3xl bg-[#0d0d0d] border border-gold-400/40 rounded-2xl shadow-[0_0_50px_rgba(0,0,0,0.9),0_0_30px_rgba(197,160,89,0.2)] overflow-hidden transform scale-95 transition-transform duration-300">
        
        {{-- Close Button (X) --}}
        <button type="button" onclick="closeEssenceModal()" class="absolute top-4 right-4 z-20 w-8 h-8 rounded-full bg-black/70 border border-gold-400/30 text-gold-400 hover:text-white hover:border-gold-400 flex items-center justify-center transition-all cursor-pointer" aria-label="Tutup modal">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </button>

        {{-- Modal Content: 2 Columns matching screenshot --}}
        <div class="grid grid-cols-1 md:grid-cols-12 items-center">
            
            {{-- Left: Perfume Bottle with Celestial Zodiac Atmosphere --}}
            <div class="md:col-span-5 bg-gradient-to-b from-[#141414] to-[#080808] p-6 sm:p-8 flex items-center justify-center border-b md:border-b-0 md:border-r border-white/5">
                <div class="relative w-full max-w-[240px] sm:max-w-[260px] aspect-square rounded-xl overflow-hidden border border-gold-400/25 shadow-2xl bg-black/60">
                    <img id="modal-bottle-img" src="{{ asset('images/cards/card_7_bottle.png') }}" alt="Bottle Preview" class="w-full h-full object-cover">
                </div>
            </div>

            {{-- Right: Details & Order CTA --}}
            <div class="md:col-span-7 p-6 sm:p-8 space-y-4 text-left">
                
                {{-- Number & Title --}}
                <div>
                    <span id="modal-number" class="text-3xl sm:text-4xl font-serif text-gold-400 font-bold block leading-none mb-1">
                        7
                    </span>
                    <h2 id="modal-title" class="text-2xl sm:text-3xl font-serif font-bold text-gold-200 tracking-wider glow-gold uppercase">
                        THE SEEKER
                    </h2>
                </div>

                {{-- Quote with gold bar accent --}}
                <div class="border-l-2 border-gold-400/60 pl-3.5 py-0.5">
                    <p id="modal-quote" class="text-xs sm:text-[13px] text-gray-300 font-light italic leading-relaxed">
                        "Untuk jiwa yang mencari makna, menyelami kebenaran, dan membawa kebijaksanaan dalam setiap langkah."
                    </p>
                </div>

                {{-- Scent Notes & Ajian (Mantra) --}}
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 pt-2 text-xs">
                    {{-- Scent Notes --}}
                    <div class="space-y-1">
                        <span class="text-[10px] uppercase tracking-widest text-gold-400/90 font-mono font-medium block">
                            Scent Notes
                        </span>
                        <p class="text-gray-300 text-[11px] leading-relaxed">
                            <span class="text-gray-500 font-medium">Top:</span> <span id="modal-notes-top">Bergamot, Saffron</span>
                        </p>
                        <p class="text-gray-300 text-[11px] leading-relaxed">
                            <span class="text-gray-500 font-medium">Mid:</span> <span id="modal-notes-mid">Oud, Frankincense</span>
                        </p>
                        <p class="text-gray-300 text-[11px] leading-relaxed">
                            <span class="text-gray-500 font-medium">Base:</span> <span id="modal-notes-base">Dark Musk, Patchouli</span>
                        </p>
                    </div>

                    {{-- Ajian (Mantra) --}}
                    <div class="space-y-1">
                        <span class="text-[10px] uppercase tracking-widest text-gold-400/90 font-mono font-medium block">
                            Ajian (Mantra)
                        </span>
                        <p id="modal-ajian" class="text-gray-300 text-[11px] italic leading-relaxed">
                            "Asih nu nyawiji dina rasa..."
                        </p>
                    </div>
                </div>

                {{-- ORDER CTA Button (changed from VIEW DETAILS to ORDER, navigates to /order) --}}
                <div class="pt-3">
                    <a id="modal-order-btn" href="{{ route('order') }}" class="btn-gold px-8 py-2.5 text-xs font-semibold tracking-[0.2em] uppercase rounded-[2px] shadow-lg inline-block text-black hover:scale-105 transition-all">
                        ORDER
                    </a>
                </div>

            </div>
        </div>

    </div>
</div>

@push('scripts')
<script>
    const archetypesData = @json($archetypes);
    const orderBaseUrl = "{{ route('order') }}";

    function openEssenceModal(num) {
        const essence = archetypesData[num];
        if (!essence) return;

        document.getElementById('modal-number').textContent = essence.number;
        document.getElementById('modal-title').textContent = essence.name.toUpperCase();
        document.getElementById('modal-quote').textContent = `"${essence.quote || essence.description}"`;
        document.getElementById('modal-notes-top').textContent = essence.notes.top;
        document.getElementById('modal-notes-mid').textContent = essence.notes.middle;
        document.getElementById('modal-notes-base').textContent = essence.notes.base;
        document.getElementById('modal-ajian').textContent = `"${essence.ajian_short || essence.ajian}"`;

        // Bottle image
        const modalBottleImg = document.getElementById('modal-bottle-img');
        if (modalBottleImg) {
            modalBottleImg.src = essence.bottle_image ? `/${essence.bottle_image}` : `/images/cards/bottle_${essence.number}.png`;
            modalBottleImg.alt = essence.name;
        }

        // Order button: Navigates to the Order navbar menu page with essence selected
        const orderBtn = document.getElementById('modal-order-btn');
        if (orderBtn) {
            orderBtn.href = `${orderBaseUrl}?essence=${essence.number}`;
        }

        // Show modal
        const modal = document.getElementById('essence-modal');
        const box = document.getElementById('essence-modal-box');
        modal.classList.remove('opacity-0', 'pointer-events-none');
        modal.classList.add('opacity-100', 'pointer-events-auto');
        box.classList.remove('scale-95');
        box.classList.add('scale-100');
        document.body.style.overflow = 'hidden';
    }

    function closeEssenceModal() {
        const modal = document.getElementById('essence-modal');
        const box = document.getElementById('essence-modal-box');
        if (!modal || !box) return;

        modal.classList.add('opacity-0', 'pointer-events-none');
        modal.classList.remove('opacity-100', 'pointer-events-auto');
        box.classList.add('scale-95');
        box.classList.remove('scale-100');
        document.body.style.overflow = '';
    }

    // Close on backdrop click
    document.getElementById('essence-modal')?.addEventListener('click', (e) => {
        if (e.target.id === 'essence-modal') {
            closeEssenceModal();
        }
    });

    // Close on Escape key
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') {
            closeEssenceModal();
        }
    });
</script>
@endpush
@endsection
