/**
 * ASYIHAN — Client Interactivity & Numerology Engine
 */

document.addEventListener('DOMContentLoaded', () => {
    // ----------------------------------------------------
    // 1. Mobile Menu Toggle
    // ----------------------------------------------------
    const mobileMenuBtn = document.getElementById('mobile-menu-btn');
    const mobileMenuClose = document.getElementById('mobile-menu-close');
    const mobileMenu = document.getElementById('mobile-menu');

    if (mobileMenuBtn && mobileMenu) {
        mobileMenuBtn.addEventListener('click', () => {
            mobileMenu.classList.add('active');
            document.body.style.overflow = 'hidden';
        });
    }

    if (mobileMenuClose && mobileMenu) {
        mobileMenuClose.addEventListener('click', () => {
            mobileMenu.classList.remove('active');
            document.body.style.overflow = '';
        });
    }

    // ----------------------------------------------------
    // 2. Collection Page Element Filter
    // ----------------------------------------------------
    const filterBtns = document.querySelectorAll('.filter-btn');
    const essenceItems = document.querySelectorAll('.essence-item');

    if (filterBtns.length > 0 && essenceItems.length > 0) {
        filterBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                const filter = btn.getAttribute('data-filter');

                // Update active state
                filterBtns.forEach(b => {
                    b.classList.remove('bg-gold-500', 'text-black', 'font-semibold');
                    b.classList.add('bg-black/40', 'border', 'border-gold-400/30', 'text-gold-400');
                });
                btn.classList.add('bg-gold-500', 'text-black', 'font-semibold');
                btn.classList.remove('bg-black/40', 'border-gold-400/30', 'text-gold-400');

                // Filter items
                essenceItems.forEach(item => {
                    const el = item.getAttribute('data-element');
                    if (filter === 'all' || el === filter) {
                        item.style.display = 'flex';
                    } else {
                        item.style.display = 'none';
                    }
                });
            });
        });
    }

    // ----------------------------------------------------
    // 3. Sidebar Numerology Form (Home page)
    // ----------------------------------------------------
    const sidebarForm = document.getElementById('sidebar-calc-form');
    if (sidebarForm) {
        sidebarForm.addEventListener('submit', async (e) => {
            e.preventDefault();
            const btn = document.getElementById('sidebar-calc-btn');
            const name = document.getElementById('sidebar_name').value;
            const birthDate = document.getElementById('sidebar_birth_date').value;
            const resContainer = document.getElementById('sidebar-result');

            if (!name || !birthDate) return;

            // UI loading
            const origText = btn.innerHTML;
            btn.innerHTML = `<span class="inline-block animate-spin mr-2">✦</span> Menghitung...`;
            btn.disabled = true;

            try {
                const token = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');
                const response = await fetch('/calculator/calculate', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': token,
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify({ name, birth_date: birthDate })
                });

                const data = await response.json();
                if (data.success && data.data) {
                    const r = data.data;
                    document.getElementById('res-number').textContent = r.core_number;
                    document.getElementById('res-archetype').textContent = r.archetype.name;
                    document.getElementById('res-desc').textContent = r.archetype.description;
                    document.getElementById('res-essence-name').textContent = r.archetype.essence_name;
                    document.getElementById('res-link').href = `/essence/${r.archetype.slug}`;

                    resContainer.classList.remove('hidden');
                    resContainer.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
                }
            } catch (err) {
                console.error('Calculation error:', err);
            } finally {
                btn.innerHTML = origText;
                btn.disabled = false;
            }
        });
    }

    // ----------------------------------------------------
    // 4. Full Calculator Page
    // ----------------------------------------------------
    const fullCalcForm = document.getElementById('full-calculator-form');
    if (fullCalcForm) {
        fullCalcForm.addEventListener('submit', async (e) => {
            e.preventDefault();
            const btn = document.getElementById('calc-submit-btn');
            const loading = document.getElementById('calc-loading');
            const resultBox = document.getElementById('calculator-result-container');
            const name = document.getElementById('calc_name').value;
            const birthDate = document.getElementById('calc_birth_date').value;

            if (!name || !birthDate) return;

            btn.disabled = true;
            if (loading) loading.classList.remove('hidden');
            if (resultBox) resultBox.classList.add('hidden');

            try {
                const token = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');
                const response = await fetch('/calculator/calculate', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': token,
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify({ name, birth_date: birthDate })
                });

                const data = await response.json();
                if (data.success && data.data) {
                    const r = data.data;
                    const arch = r.archetype;

                    document.getElementById('out-name').textContent = r.name;
                    document.getElementById('out-core-number').textContent = r.core_number;
                    document.getElementById('out-archetype-name').textContent = arch.name;
                    document.getElementById('out-element').textContent = `Elemen: ${arch.element}`;

                    // Traits badges
                    const traitsContainer = document.getElementById('out-traits');
                    traitsContainer.innerHTML = '';
                    arch.traits.forEach(t => {
                        const span = document.createElement('span');
                        span.className = 'text-[11px] uppercase tracking-wider px-2.5 py-1 rounded bg-black/60 border border-gold-400/20 text-gold-300';
                        span.textContent = t;
                        traitsContainer.appendChild(span);
                    });

                    // Details
                    document.getElementById('out-description').textContent = arch.description;
                    document.getElementById('out-essence-title').textContent = arch.essence_name;
                    document.getElementById('out-fragrance-desc').textContent = arch.fragrance_description;

                    document.getElementById('out-notes-top').textContent = arch.notes.top;
                    document.getElementById('out-notes-mid').textContent = arch.notes.middle;
                    document.getElementById('out-notes-base').textContent = arch.notes.base;

                    document.getElementById('out-ajian').textContent = `"${arch.ajian}"`;
                    document.getElementById('out-sugesti').textContent = arch.sugesti;

                    document.getElementById('out-price').textContent = `Rp ${arch.price.toLocaleString('id-ID')}`;
                    document.getElementById('out-detail-link').href = `/essence/${arch.slug}`;
                    document.getElementById('out-order-link').href = `/order?essence=${arch.number}`;

                    if (resultBox) {
                        resultBox.classList.remove('hidden');
                        resultBox.scrollIntoView({ behavior: 'smooth', block: 'start' });
                    }
                }
            } catch (err) {
                console.error('Calculator submission error:', err);
            } finally {
                btn.disabled = false;
                if (loading) loading.classList.add('hidden');
            }
        });
    }
});
