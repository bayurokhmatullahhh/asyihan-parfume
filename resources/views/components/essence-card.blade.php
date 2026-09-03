@props(['essence'])

<div class="bg-panel rounded-xl p-5 border border-gold-400/20 hover:border-gold-400/70 transition-all duration-300 group hover:-translate-y-1 relative overflow-hidden flex flex-col justify-between">
    <div class="absolute -top-10 -right-10 w-24 h-24 bg-gold-400/5 rounded-full blur-xl group-hover:bg-gold-400/15 transition-all"></div>
    
    <div>
        <div class="flex items-center justify-between mb-4">
            <span class="text-2xl font-serif text-gold-400 font-bold tracking-wider group-hover:glow-gold">
                {{ $essence['number'] }}
            </span>
            <span class="text-[10px] uppercase tracking-widest px-2.5 py-1 rounded bg-black/50 border border-gold-400/20 text-gold-300">
                {{ $essence['element'] }}
            </span>
        </div>

        <h3 class="text-base font-serif text-white mb-1 group-hover:text-gold-200 transition-colors">
            {{ $essence['name'] }}
        </h3>
        
        <p class="text-xs text-gold-400/80 mb-3 font-light">
            {{ implode(' • ', $essence['traits']) }}
        </p>

        <p class="text-xs text-gray-400 font-light leading-relaxed line-clamp-3 mb-4">
            {{ $essence['fragrance_description'] }}
        </p>
    </div>

    <div class="pt-3 border-t border-white/5 mt-auto">
        <div class="text-[11px] text-gray-500 mb-3 space-y-1">
            <p><span class="text-gray-400">Notes:</span> {{ $essence['notes']['top'] }}</p>
        </div>

        <div class="flex items-center justify-between gap-2">
            <span class="text-xs font-semibold text-white">
                Rp {{ number_format($essence['price'], 0, ',', '.') }}
            </span>
            <a href="{{ route('essence.detail', $essence['slug']) }}" class="text-[11px] text-gold-400 uppercase tracking-wider hover:text-white transition-colors flex items-center gap-1 group-hover:translate-x-0.5">
                Detail
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5l7 7-7 7"/>
                </svg>
            </a>
        </div>
    </div>
</div>
