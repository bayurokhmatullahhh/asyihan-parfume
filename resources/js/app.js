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
    // 3. Numerology Form (Home page with 3 manual date inputs)
    // ----------------------------------------------------
    const sidebarForm = document.getElementById('sidebar-calc-form');
    if (sidebarForm) {
        const romanNumerals = ['', 'I', 'II', 'III', 'IV', 'V', 'VI', 'VII', 'VIII', 'IX'];
        const dayInput = document.getElementById('home_calc_day');
        const monthInput = document.getElementById('home_calc_month');
        const yearInput = document.getElementById('home_calc_year');
        const dateError = document.getElementById('home_calc_date_error');
        const dateErrorMsg = document.getElementById('home_calc_date_error_msg');
        const placeholderBox = document.getElementById('home_calc_placeholder');
        const resCard = document.getElementById('sidebar-result-card');
        const resetBtn = document.getElementById('home_calc_reset_btn');

        // Helper functions for error handling
        const showDateError = (msg) => {
            if (dateError && dateErrorMsg) {
                dateErrorMsg.textContent = msg;
                dateError.classList.remove('hidden');
            }
        };

        const hideDateError = () => {
            if (dateError) {
                dateError.classList.add('hidden');
            }
        };

        // Date input auto-advance, keydown backspace, and smart paste
        if (dayInput && monthInput && yearInput) {
            const inputs = [dayInput, monthInput, yearInput];

            inputs.forEach((input, index) => {
                input.addEventListener('input', (e) => {
                    hideDateError();
                    // Strip non-digits
                    e.target.value = e.target.value.replace(/\D/g, '');

                    // Auto-advance
                    if (input === dayInput && dayInput.value.length === 2) {
                        monthInput.focus();
                        monthInput.select();
                    } else if (input === monthInput && monthInput.value.length === 2) {
                        yearInput.focus();
                        yearInput.select();
                    }
                });

                input.addEventListener('keydown', (e) => {
                    if (e.key === 'Backspace' && input.value === '') {
                        if (index > 0) {
                            inputs[index - 1].focus();
                        }
                    }
                });

                // Paste support (DD-MM-YYYY, DD/MM/YYYY, YYYY-MM-DD, 17081995)
                input.addEventListener('paste', (e) => {
                    const pasteData = (e.clipboardData || window.clipboardData).getData('text').trim();
                    const clean = pasteData.replace(/[^\d\/-]/g, '');
                    const parts = clean.split(/[\/-]/);

                    if (parts.length === 3) {
                        e.preventDefault();
                        if (parts[0].length === 4) {
                            yearInput.value = parts[0].slice(0, 4);
                            monthInput.value = parts[1].slice(0, 2);
                            dayInput.value = parts[2].slice(0, 2);
                        } else {
                            dayInput.value = parts[0].slice(0, 2);
                            monthInput.value = parts[1].slice(0, 2);
                            yearInput.value = parts[2].slice(0, 4);
                        }
                        hideDateError();
                    } else if (clean.length === 8 && /^\d+$/.test(clean)) {
                        e.preventDefault();
                        dayInput.value = clean.slice(0, 2);
                        monthInput.value = clean.slice(2, 4);
                        yearInput.value = clean.slice(4, 8);
                        hideDateError();
                    }
                });
            });
        }

        // Reset button
        if (resetBtn) {
            resetBtn.addEventListener('click', () => {
                if (resCard) resCard.classList.add('hidden');
                if (placeholderBox) placeholderBox.classList.remove('hidden');
                hideDateError();
                document.getElementById('sidebar_name')?.focus();
            });
        }

        sidebarForm.addEventListener('submit', async (e) => {
            e.preventDefault();
            hideDateError();

            const btn = document.getElementById('sidebar-calc-btn');
            const name = document.getElementById('sidebar_name')?.value?.trim();
            const resCard = document.getElementById('sidebar-result-card');

            if (!name) {
                showDateError('Silakan masukkan nama lengkap Anda.');
                document.getElementById('sidebar_name')?.focus();
                return;
            }

            let birthDate = '';
            if (dayInput && monthInput && yearInput) {
                const dayVal = dayInput.value.trim();
                const monthVal = monthInput.value.trim();
                const yearVal = yearInput.value.trim();

                if (!dayVal || !monthVal || !yearVal) {
                    showDateError('Silakan isi ketiga kolom tanggal lahir (Hari, Bulan, Tahun).');
                    return;
                }

                const d = parseInt(dayVal, 10);
                const m = parseInt(monthVal, 10);
                const y = parseInt(yearVal, 10);
                const currentYear = new Date().getFullYear();

                if (isNaN(d) || isNaN(m) || isNaN(y)) {
                    showDateError('Format tanggal harus berupa angka.');
                    return;
                }

                if (d < 1 || d > 31) {
                    showDateError('Hari harus di antara angka 1 sampai 31.');
                    dayInput.focus();
                    return;
                }

                if (m < 1 || m > 12) {
                    showDateError('Bulan harus di antara angka 1 sampai 12.');
                    monthInput.focus();
                    return;
                }

                if (y < 1900 || y > currentYear) {
                    showDateError(`Tahun harus di antara 1900 sampai ${currentYear}.`);
                    yearInput.focus();
                    return;
                }

                const checkDate = new Date(y, m - 1, d);
                if (
                    checkDate.getFullYear() !== y ||
                    checkDate.getMonth() !== m - 1 ||
                    checkDate.getDate() !== d
                ) {
                    showDateError('Kombinasi tanggal tidak valid untuk kalender (misal: 31 Februari).');
                    return;
                }

                if (checkDate > new Date()) {
                    showDateError('Tanggal lahir tidak boleh di masa depan.');
                    return;
                }

                birthDate = `${y}-${String(m).padStart(2, '0')}-${String(d).padStart(2, '0')}`;
            } else {
                birthDate = document.getElementById('sidebar_birth_date')?.value;
            }

            if (!birthDate) return;

            // UI loading state
            const origText = btn.innerHTML;
            btn.innerHTML = `<span class="inline-block animate-spin mr-2">✦</span> Menghitung Esensi...`;
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
                    const arch = r.archetype;
                    const romanNum = romanNumerals[arch.number] || arch.number;

                    // Bagian 1: Analisis Numerologi & Karakter
                    const elUserName = document.getElementById('res-user-name');
                    const elCoreNumber = document.getElementById('res-core-number');
                    const elArchName = document.getElementById('res-archetype-name');
                    const elElementBadge = document.getElementById('res-element-badge');
                    const elTraitsContainer = document.getElementById('res-traits-container');
                    const elCharDesc = document.getElementById('res-character-desc');

                    if (elUserName) elUserName.textContent = r.name;
                    if (elCoreNumber) elCoreNumber.textContent = r.core_number;
                    if (elArchName) elArchName.textContent = arch.name;
                    if (elElementBadge) elElementBadge.textContent = `Elemen: ${arch.element}`;
                    if (elCharDesc) elCharDesc.textContent = arch.description;

                    if (elTraitsContainer && Array.isArray(arch.traits)) {
                        elTraitsContainer.innerHTML = '';
                        arch.traits.forEach(t => {
                            const span = document.createElement('span');
                            span.className = 'text-[9px] uppercase tracking-wider px-2 py-0.5 rounded bg-black/80 border border-gold-400/20 text-gold-300';
                            span.textContent = t;
                            elTraitsContainer.appendChild(span);
                        });
                    }

                    // Bagian 2: Rekomendasi Parfum
                    const elRoman = document.getElementById('res-essence-roman');
                    const elArchTitle = document.getElementById('res-archetype-title');
                    const elBottleLabel = document.getElementById('res-bottle-label');
                    const elFragDesc = document.getElementById('res-fragrance-desc');
                    const elTop = document.getElementById('res-note-top');
                    const elMid = document.getElementById('res-note-mid');
                    const elBase = document.getElementById('res-note-base');
                    const elAjian = document.getElementById('res-ajian-snippet');
                    const elPrice = document.getElementById('res-price');
                    const elOrderLink = document.getElementById('res-order-link');
                    const elDetailLink = document.getElementById('res-detail-link');

                    if (elRoman) elRoman.textContent = `ESSENCE ${romanNum}`;
                    if (elArchTitle) elArchTitle.textContent = arch.name.toUpperCase();
                    if (elBottleLabel) elBottleLabel.textContent = `ESSENCE ${romanNum}`;
                    if (elFragDesc) elFragDesc.textContent = arch.fragrance_description || arch.description;
                    if (elTop && arch.notes) elTop.textContent = arch.notes.top;
                    if (elMid && arch.notes) elMid.textContent = arch.notes.middle;
                    if (elBase && arch.notes) elBase.textContent = arch.notes.base;
                    if (elAjian) elAjian.textContent = `"${arch.ajian}"`;
                    if (elPrice) elPrice.textContent = `Rp ${arch.price.toLocaleString('id-ID')}`;
                    if (elOrderLink) elOrderLink.href = `/order?essence=${arch.number}`;
                    if (elDetailLink) elDetailLink.href = `/essence/${arch.slug}`;

                    // Toggle placeholder off, result card on
                    if (placeholderBox) {
                        placeholderBox.classList.add('hidden');
                    }
                    if (resCard) {
                        resCard.classList.remove('hidden');
                        resCard.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
                    }
                } else if (data.message) {
                    showDateError(data.message);
                }
            } catch (err) {
                console.error('Calculation error:', err);
                showDateError('Terjadi kendala saat menghitung esensi jiwa. Silakan coba kembali.');
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
