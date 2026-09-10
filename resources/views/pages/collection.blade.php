@extends('layouts.app')

@section('title', 'Essence Collection — 9 Sacred Fragrances | ASYIHAN')
@section('meta_description', '9 Essence, 9 Karakter, 9 Aroma. Temukan yang paling sesuai dengan dirimu.')

@section('content')
<div class="max-w-6xl mx-auto px-4 sm:px-6 py-6 sm:py-10">

    {{-- Page Header --}}
    <div class="text-center mb-8 sm:mb-12">
        <h1 class="text-3xl sm:text-4xl md:text-5xl font-serif text-gold-300 tracking-[0.2em] uppercase glow-gold font-medium mb-3">
            ESSENCE COLLECTION
        </h1>
        <p class="text-gray-300 font-light text-xs sm:text-sm tracking-wide flex items-center justify-center gap-1.5 sm:gap-2 flex-wrap">
            <span class="text-gold-400 text-xs">✦</span>
            <span>9 Essence.</span>
            <span class="text-gold-400 text-xs">✦</span>
            <span>9 Karakter.</span>
            <span class="text-gold-400 text-xs">✦</span>
            <span>9 Aroma.</span>
            <span class="text-gray-400 ml-1">Temukan yang paling sesuai dengan dirimu.</span>
        </p>
    </div>

    {{-- Essences Grid with Inline Detail --}}
    <div id="essence-grid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5 sm:gap-6 max-w-5xl mx-auto">
        @foreach($archetypes as $essence)
            {{-- Each card wrapped in a container for inline detail injection --}}
            <div id="essence-wrapper-{{ $essence['number'] }}" class="essence-wrapper" data-essence-num="{{ $essence['number'] }}">
                <div id="essence-card-{{ $essence['number'] }}" 
                     class="essence-card group cursor-pointer relative rounded-2xl overflow-hidden border border-gold-400/20 hover:border-gold-400/80 transition-all duration-300 bg-[#0c0c0c] hover:-translate-y-1 hover:shadow-[0_0_30px_rgba(197,160,89,0.3)] flex flex-col justify-end aspect-[600/620]"
                     onclick="toggleInlineDetail({{ $essence['number'] }})"
                     title="Klik untuk melihat detail {{ $essence['name'] }}">
                    
                    {{-- HD Clean Bottle Background --}}
                    <div class="absolute inset-0 z-0">
                        <img src="{{ asset('images/cards/clean/card_' . $essence['number'] . '_bg.png') }}" 
                             alt="{{ $essence['essence_name'] }}" 
                             class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-black via-black/25 to-transparent pointer-events-none"></div>
                    </div>

                    {{-- Card Number Badge --}}
                    <div class="absolute top-3 left-3 z-10">
                        <span class="bg-black/70 backdrop-blur-md text-gold-400 text-xs font-mono font-bold px-2.5 py-1 rounded border border-gold-400/30">
                            {{ $essence['number'] }}
                        </span>
                    </div>

                    {{-- Typography Overlay (Divider, Title, Traits) --}}
                    <div class="relative z-10 w-full p-4 sm:p-5 text-left bg-gradient-to-t from-[#0c0c0c] via-[#0c0c0c]/85 to-transparent pt-6">
                        <div class="w-full h-px bg-gold-400/30 mb-2.5"></div>
                        <h3 class="text-sm sm:text-base font-serif font-semibold tracking-[0.18em] text-gold-200 group-hover:text-gold-100 uppercase transition-colors glow-gold">
                            {{ $essence['name'] }}
                        </h3>
                        <p class="text-[10px] sm:text-[11px] text-gray-400 font-light tracking-wide mt-1 truncate">
                            {{ implode(' • ', $essence['traits']) }}
                        </p>
                    </div>

                    {{-- Active Card Indicator Glow --}}
                    <div class="active-indicator absolute inset-0 border-2 border-transparent rounded-2xl transition-all duration-300 pointer-events-none z-20"></div>
                </div>
            </div>
        @endforeach
    </div>

    {{-- Inline Detail Template (hidden, cloned via JS) --}}
    <template id="inline-detail-template">
        <div class="inline-detail-panel" 
             style="grid-column: 1 / -1; overflow: hidden;">
            <div class="inline-detail-inner bg-[#0c0c0c] border border-gold-400/40 rounded-2xl p-5 sm:p-7 md:p-8 shadow-[0_0_40px_rgba(0,0,0,0.9),0_0_25px_rgba(197,160,89,0.25)] relative overflow-hidden">
                
                {{-- Ambient Background Glow --}}
                <div class="absolute -top-32 -right-32 w-80 h-80 bg-gold-400/5 rounded-full blur-3xl pointer-events-none"></div>
                <div class="absolute -bottom-32 -left-32 w-80 h-80 bg-gold-400/5 rounded-full blur-3xl pointer-events-none"></div>

                {{-- Close Button --}}
                <button type="button" onclick="closeInlineDetail()" class="absolute top-3 right-3 z-20 w-8 h-8 rounded-full bg-black/70 border border-gold-400/30 text-gold-400 hover:text-white hover:border-gold-400 flex items-center justify-center transition-all cursor-pointer" aria-label="Tutup detail">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>

                <div class="grid grid-cols-1 md:grid-cols-12 gap-5 sm:gap-7 md:gap-8 items-center relative z-10">
                    
                    {{-- Left Column: Perfume Bottle --}}
                    <div class="md:col-span-5 flex justify-center">
                        <div class="relative w-full max-w-[240px] sm:max-w-[280px] aspect-square rounded-xl overflow-hidden border border-gold-400/30 bg-gradient-to-b from-[#141414] to-[#060606] p-4 flex items-center justify-center shadow-2xl">
                            <div class="absolute inset-0 bg-cover bg-center opacity-35 pointer-events-none" style="background-image: url('{{ asset('images/background.png') }}');"></div>
                            <img class="inline-bottle-img w-full h-full object-contain relative z-10 drop-shadow-[0_10px_20px_rgba(0,0,0,0.95)]" src="" alt="">
                        </div>
                    </div>

                    {{-- Right Column: Details & Action Buttons --}}
                    <div class="md:col-span-7 space-y-3 sm:space-y-4 text-left">
                        
                        {{-- Number, Title & Character Traits --}}
                        <div>
                            <span class="inline-detail-number text-4xl sm:text-5xl font-serif text-gold-400 font-bold block leading-none mb-1"></span>
                            <h2 class="inline-detail-title text-xl sm:text-2xl md:text-3xl font-serif font-bold text-gold-200 tracking-wider uppercase glow-gold"></h2>
                            <p class="inline-detail-traits text-xs sm:text-sm text-gold-300/90 font-mono tracking-widest uppercase mt-1"></p>
                        </div>

                        {{-- Quote with Gold Accent Left Border --}}
                        <div class="border-l-2 border-gold-400/70 pl-4 py-1">
                            <p class="inline-detail-quote text-xs sm:text-sm text-gray-300 font-light italic leading-relaxed"></p>
                        </div>

                        {{-- Scent Notes & Ajian (Mantra) Grid --}}
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 pt-1 text-xs">
                            {{-- Scent Notes --}}
                            <div class="space-y-1.5 bg-black/40 p-3 rounded-lg border border-gold-400/15">
                                <span class="text-[10px] uppercase tracking-widest text-gold-400 font-mono font-semibold block">
                                    Scent Notes
                                </span>
                                <p class="text-gray-300 text-[11px] leading-relaxed">
                                    <span class="text-gray-500 font-medium">Top:</span> <span class="inline-notes-top text-slate-200"></span>
                                </p>
                                <p class="text-gray-300 text-[11px] leading-relaxed">
                                    <span class="text-gray-500 font-medium">Mid:</span> <span class="inline-notes-mid text-slate-200"></span>
                                </p>
                                <p class="text-gray-300 text-[11px] leading-relaxed">
                                    <span class="text-gray-500 font-medium">Base:</span> <span class="inline-notes-base text-slate-200"></span>
                                </p>
                            </div>

                            {{-- Ajian (Mantra) --}}
                            <div class="space-y-1.5 bg-black/40 p-3 rounded-lg border border-gold-400/15">
                                <span class="text-[10px] uppercase tracking-widest text-gold-400 font-mono font-semibold block">
                                    Ajian (Mantra)
                                </span>
                                <p class="inline-detail-ajian text-gold-200/90 text-[11px] italic leading-relaxed"></p>
                            </div>
                        </div>

                        {{-- Action Buttons: VIEW DETAILS & ORDER --}}
                        <div class="pt-3 flex flex-wrap items-center gap-3">
                            <a class="inline-view-btn btn-gold px-6 py-2.5 text-xs font-semibold tracking-[0.2em] uppercase rounded-[2px] shadow-lg text-black hover:scale-105 transition-all inline-flex items-center gap-2" href="#">
                                VIEW DETAILS
                            </a>
                            <a class="inline-order-btn btn-gold-outline px-6 py-2.5 text-xs font-semibold tracking-[0.2em] uppercase rounded-[2px] text-gold-300 hover:text-white transition-all inline-flex items-center gap-2" href="#">
                                ORDER
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </template>

    {{-- Explore All Rituals CTA --}}
    <div class="text-center mt-12 sm:mt-16 mb-6">
        <a href="{{ route('ajian') }}" class="btn-gold-outline px-8 sm:px-10 py-3 text-xs tracking-[0.25em] uppercase rounded-[2px] font-medium inline-block hover:shadow-[0_0_20px_rgba(197,160,89,0.4)]">
            EXPLORE ALL RITUALS
        </a>
    </div>

</div>

@push('scripts')
<style>
    /* ============================================
       Inline Detail Panel - Slide + Zoom Animations
       ============================================ */

    .inline-detail-panel {
        max-height: 0;
        opacity: 0;
        transform: scale(0.92) translateX(-20px);
        transition: max-height 0.5s cubic-bezier(0.4, 0, 0.2, 1),
                    opacity 0.4s cubic-bezier(0.4, 0, 0.2, 1) 0.05s,
                    transform 0.45s cubic-bezier(0.4, 0, 0.2, 1) 0.05s;
        pointer-events: none;
    }

    .inline-detail-panel.is-open {
        max-height: 700px;
        opacity: 1;
        transform: scale(1) translateX(0);
        pointer-events: auto;
    }

    /* Active card styling */
    .essence-card.is-active {
        border-color: rgba(197, 160, 89, 0.9) !important;
        box-shadow: 0 0 30px rgba(197, 160, 89, 0.45) !important;
        transform: translateY(-4px) !important;
    }

    .essence-card.is-active .active-indicator {
        border-color: rgba(197, 160, 89, 0.6);
        box-shadow: inset 0 0 30px rgba(197, 160, 89, 0.08);
    }

    /* Inner content stagger animation */
    .inline-detail-panel.is-open .inline-bottle-img {
        animation: detailSlideInLeft 0.5s cubic-bezier(0.34, 1.56, 0.64, 1) 0.15s both;
    }
    
    .inline-detail-panel.is-open .inline-detail-number,
    .inline-detail-panel.is-open .inline-detail-title {
        animation: detailFadeSlideUp 0.4s ease-out 0.2s both;
    }

    .inline-detail-panel.is-open .inline-detail-traits {
        animation: detailFadeSlideUp 0.4s ease-out 0.25s both;
    }

    .inline-detail-panel.is-open .inline-detail-quote {
        animation: detailFadeSlideUp 0.4s ease-out 0.3s both;
    }

    @keyframes detailSlideInLeft {
        from {
            opacity: 0;
            transform: translateX(-30px) scale(0.9);
        }
        to {
            opacity: 1;
            transform: translateX(0) scale(1);
        }
    }

    @keyframes detailFadeSlideUp {
        from {
            opacity: 0;
            transform: translateY(12px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Smooth grid reflow */
    #essence-grid {
        transition: all 0.3s ease;
    }

    /* On mobile: single column detail */
    @media (max-width: 639px) {
        .inline-detail-panel {
            transform: scale(0.95) translateX(0);
        }
        .inline-detail-panel.is-open {
            max-height: 900px;
        }
    }
</style>

<script>
    const archetypesData = @json($archetypes);
    const orderBaseUrl = "{{ route('order') }}";
    const essenceDetailBaseUrl = "{{ url('/essence') }}";
    let activeInlineNum = null;

    /**
     * Toggle the inline detail view for a given essence number.
     * If the same card is clicked again, close the detail.
     * If a different card is clicked, close the old one and open the new one.
     */
    function toggleInlineDetail(num) {
        const essence = archetypesData[num];
        if (!essence) return;

        // If clicking the same active card → close it
        if (activeInlineNum === num) {
            closeInlineDetail();
            return;
        }

        // Close any existing detail first
        const existingPanel = document.querySelector('.inline-detail-panel');
        if (existingPanel) {
            existingPanel.classList.remove('is-open');
            // Remove after transition
            setTimeout(() => {
                existingPanel.remove();
            }, 350);
        }

        // Remove active state from all cards
        document.querySelectorAll('.essence-card').forEach(card => {
            card.classList.remove('is-active');
        });

        // Set active state on clicked card
        const activeCard = document.getElementById(`essence-card-${num}`);
        if (activeCard) {
            activeCard.classList.add('is-active');
        }

        activeInlineNum = num;

        // Determine where to insert the inline detail panel.
        // It should appear after the last card in the same visual row.
        const grid = document.getElementById('essence-grid');
        const wrapper = document.getElementById(`essence-wrapper-${num}`);

        // Get all wrappers
        const wrappers = Array.from(grid.querySelectorAll('.essence-wrapper'));
        
        // Calculate which row this card is in
        const wrapperRect = wrapper.getBoundingClientRect();
        const wrapperTop = wrapperRect.top;
        
        // Find the last wrapper in the same row
        let lastInRow = wrapper;
        for (let i = wrappers.indexOf(wrapper) + 1; i < wrappers.length; i++) {
            const siblingRect = wrappers[i].getBoundingClientRect();
            if (Math.abs(siblingRect.top - wrapperTop) < 30) {
                lastInRow = wrappers[i];
            } else {
                break;
            }
        }

        // Clone the template and populate data
        const template = document.getElementById('inline-detail-template');
        const clone = template.content.cloneNode(true);
        const panel = clone.querySelector('.inline-detail-panel');

        // Populate all data fields
        panel.querySelector('.inline-bottle-img').src = essence.bottle_image 
            ? `/${essence.bottle_image}` 
            : `/images/cards/clean/card_${essence.number}_bottle.png`;
        panel.querySelector('.inline-bottle-img').alt = essence.name;
        panel.querySelector('.inline-detail-number').textContent = essence.number;
        panel.querySelector('.inline-detail-title').textContent = essence.name.toUpperCase();
        panel.querySelector('.inline-detail-traits').textContent = Array.isArray(essence.traits) 
            ? essence.traits.join(' • ') 
            : essence.traits;
        panel.querySelector('.inline-detail-quote').textContent = `"${essence.quote || essence.description}"`;
        panel.querySelector('.inline-notes-top').textContent = essence.notes.top;
        panel.querySelector('.inline-notes-mid').textContent = essence.notes.middle;
        panel.querySelector('.inline-notes-base').textContent = essence.notes.base;
        panel.querySelector('.inline-detail-ajian').textContent = `"${essence.ajian_short || essence.ajian}"`;
        panel.querySelector('.inline-view-btn').href = `${essenceDetailBaseUrl}/${essence.slug}`;
        panel.querySelector('.inline-order-btn').href = `${orderBaseUrl}?essence=${essence.number}`;

        // Insert after the last card in the row (with a small delay for close transition)
        const delay = existingPanel ? 380 : 0;

        setTimeout(() => {
            // Insert the panel after the last wrapper in the same row
            lastInRow.insertAdjacentElement('afterend', panel);
            
            // Trigger open animation after DOM insertion
            requestAnimationFrame(() => {
                requestAnimationFrame(() => {
                    panel.classList.add('is-open');
                    
                    // Smooth scroll to bring the detail into view
                    setTimeout(() => {
                        panel.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
                    }, 200);
                });
            });
        }, delay);
    }

    /**
     * Close the currently open inline detail panel.
     */
    function closeInlineDetail() {
        const panel = document.querySelector('.inline-detail-panel');
        if (panel) {
            panel.classList.remove('is-open');
            setTimeout(() => {
                panel.remove();
            }, 450);
        }

        // Remove active state from all cards
        document.querySelectorAll('.essence-card').forEach(card => {
            card.classList.remove('is-active');
        });

        activeInlineNum = null;
    }

    // Initialize: check URL param for pre-selected essence
    document.addEventListener('DOMContentLoaded', () => {
        const urlParams = new URLSearchParams(window.location.search);
        const urlEssence = urlParams.get('essence');
        if (urlEssence) {
            setTimeout(() => {
                toggleInlineDetail(parseInt(urlEssence));
            }, 300);
        }
    });

    // Close on Escape key
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') closeInlineDetail();
    });
</script>
@endpush
@endsection
