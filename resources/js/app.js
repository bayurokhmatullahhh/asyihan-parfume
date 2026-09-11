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

                    // Tokoh Inspiratif Sejiwa
                    const tokoh = r.tokoh;
                    const elTokohName = document.getElementById('res-tokoh-name');
                    const elTokohAsal = document.getElementById('res-tokoh-asal');
                    const elTokohLahir = document.getElementById('res-tokoh-lahir');
                    const elTokohDesc = document.getElementById('res-tokoh-desc');

                    if (tokoh) {
                        if (elTokohName) elTokohName.textContent = tokoh.nama || '-';
                        if (elTokohAsal) elTokohAsal.textContent = tokoh.asal || '-';
                        if (elTokohLahir) elTokohLahir.textContent = 'Lahir: ' + (tokoh.lahir || '-');
                        if (elTokohDesc) elTokohDesc.textContent = tokoh.deskripsi || '-';
                    }

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

        // Download PDF Button for Home Calculator
        const homePdfBtn = document.getElementById('home-download-pdf-btn');
        if (homePdfBtn) {
            homePdfBtn.addEventListener('click', async () => {
                const btn = homePdfBtn;
                const origHtml = btn.innerHTML;
                btn.disabled = true;
                btn.innerHTML = `<span class="inline-block animate-spin mr-1">✦</span><span>Menyiapkan...</span>`;

                try {
                    const card = document.getElementById('sidebar-result-card');
                    if (!card) return;

                    const canvas = await window.html2canvas(card, {
                        backgroundColor: '#030818',
                        scale: 2,
                        useCORS: true,
                        allowTaint: true,
                        logging: false,
                    });

                    const imgData = canvas.toDataURL('image/png');
                    const { jsPDF } = window.jspdf;
                    const pdf = new jsPDF({
                        orientation: 'portrait',
                        unit: 'mm',
                        format: 'a4',
                    });

                    const pageW = pdf.internal.pageSize.getWidth();
                    const pageH = pdf.internal.pageSize.getHeight();
                    const margin = 12;
                    const imgW = pageW - margin * 2;
                    const imgH = (canvas.height * imgW) / canvas.width;

                    pdf.setFillColor(3, 8, 24);
                    pdf.rect(0, 0, pageW, pageH, 'F');

                    pdf.setDrawColor(197, 160, 89);
                    pdf.setLineWidth(0.5);
                    pdf.line(margin, 10, pageW - margin, 10);

                    pdf.setTextColor(197, 160, 89);
                    pdf.setFontSize(10);
                    pdf.setFont('helvetica', 'bold');
                    pdf.text('ASYIHAN — HASIL NUMEROLOGI SAKRAL', pageW / 2, 7, { align: 'center' });

                    const yStart = 14;
                    if (imgH + yStart <= pageH - margin) {
                        pdf.addImage(imgData, 'PNG', margin, yStart, imgW, imgH);
                    } else {
                        const scaledH = pageH - margin - yStart;
                        const scaledW = (canvas.width * scaledH) / canvas.height;
                        const xOffset = (pageW - scaledW) / 2;
                        pdf.addImage(imgData, 'PNG', xOffset, yStart, scaledW, scaledH);
                    }

                    pdf.setTextColor(120, 120, 140);
                    pdf.setFontSize(7);
                    pdf.setFont('helvetica', 'normal');
                    pdf.text('asyihan.com • Sacred Numerology & Fragrance', pageW / 2, pageH - 5, { align: 'center' });
                    pdf.line(margin, pageH - 8, pageW - margin, pageH - 8);

                    const archName = (document.getElementById('res-archetype-name')?.textContent || 'Hasil').trim().replace(/\s+/g, '-').toLowerCase();
                    pdf.save(`ASYIHAN-Numerologi-${archName}.pdf`);
                } catch (err) {
                    console.error('PDF error:', err);
                    alert('Gagal membuat PDF. Silakan coba screenshot layar.');
                } finally {
                    btn.innerHTML = origHtml;
                    btn.disabled = false;
                }
            });
        }
    }

    // ----------------------------------------------------
    // 4. Full Calculator Page
    // ----------------------------------------------------
    const fullCalcForm = document.getElementById('full-calculator-form');
    if (fullCalcForm && !window.hasCustomCalcHandler) {
        const dayInput = document.getElementById('calc_day');
        const monthInput = document.getElementById('calc_month');
        const yearInput = document.getElementById('calc_year');
        const birthDateInput = document.getElementById('calc_birth_date');
        const nameInput = document.getElementById('calc_name');

        const reduceNum = (n) => {
            let s = String(Math.abs(n)).split('').reduce((a, b) => a + Number(b), 0);
            while (s > 9) {
                s = String(s).split('').reduce((a, b) => a + Number(b), 0);
            }
            return s;
        };

        const updateDateInputs = () => {
            const dVal = dayInput?.value?.trim();
            const mVal = monthInput?.value?.trim();
            const yVal = yearInput?.value?.trim();
            const previewText = document.getElementById('calc-preview-text');

            if (!dVal || !mVal || !yVal) {
                if (birthDateInput) birthDateInput.value = '';
                if (previewText) {
                    previewText.innerHTML = '<span class="text-gold-400/60 font-mono text-[10px]">Masukkan tanggal lahir Anda untuk melihat reduksi angka Pythagoras</span>';
                }
                return;
            }

            const d = parseInt(dVal, 10);
            const m = parseInt(mVal, 10);
            const y = parseInt(yVal, 10);

            if (isNaN(d) || isNaN(m) || isNaN(y) || d < 1 || d > 31 || m < 1 || m > 12 || y < 1900 || y > 2050) {
                if (birthDateInput) birthDateInput.value = '';
                return;
            }

            // Pad month & day
            const dd = String(d).padStart(2, '0');
            const mm = String(m).padStart(2, '0');
            if (birthDateInput) {
                birthDateInput.value = `${y}-${mm}-${dd}`;
            }

            // Calculation preview text
            if (previewText) {
                const dDigits = String(d).split('');
                const dSum = dDigits.reduce((a, b) => a + Number(b), 0);
                const dFormatted = dDigits.length > 1 ? `${d} (${dDigits.join('+')}=${dSum})` : `${d}`;

                const yDigits = String(y).split('');
                const ySum = yDigits.reduce((a, b) => a + Number(b), 0);
                const yRed = reduceNum(ySum);
                const yFormatted = `${y} (${yDigits.join('+')}=${ySum}→${yRed})`;

                previewText.innerHTML = `ANGKA DASAR: <span class="text-gold-300 font-bold">${dFormatted}</span> | BULAN: <span class="text-gold-300 font-bold">${m}</span> | TAHUN: <span class="text-gold-300 font-bold">${yFormatted}</span>`;
            }
        };

        [dayInput, monthInput, yearInput].forEach(inp => {
            if (inp) {
                inp.addEventListener('input', updateDateInputs);
                inp.addEventListener('change', updateDateInputs);
            }
        });

        fullCalcForm.addEventListener('submit', async (e) => {
            e.preventDefault();
            updateDateInputs();

            const btn = document.getElementById('calc-submit-btn');
            const loading = document.getElementById('calc-loading');
            const name = nameInput?.value?.trim() || '';
            const birthDate = birthDateInput?.value || '';

            if (!name) {
                nameInput?.focus();
                return;
            }

            if (!birthDate) {
                dayInput?.focus();
                return;
            }

            btn.disabled = true;
            if (loading) loading.classList.remove('hidden');

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

                    // Expand layout to 2 columns
                    const mainSection = document.getElementById('calc-main-section');
                    if (mainSection) {
                        mainSection.classList.remove('max-w-2xl');
                        mainSection.classList.add('max-w-7xl');
                    }

                    const gridContainer = document.getElementById('calc-grid-container');
                    if (gridContainer) {
                        gridContainer.classList.remove('space-y-6');
                        gridContainer.classList.add('grid', 'grid-cols-1', 'lg:grid-cols-12', 'gap-6', 'lg:gap-8', 'items-start');
                    }

                    const formCol = document.getElementById('calc-form-column');
                    if (formCol) {
                        formCol.classList.add('lg:col-span-5');
                    }

                    const resultWrapper = document.getElementById('calc-result-wrapper');
                    if (resultWrapper) {
                        resultWrapper.classList.remove('hidden');
                        resultWrapper.classList.add('lg:col-span-7');
                    }

                    // Update result panel elements
                    const coreNumEl = document.getElementById('out-core-number');
                    if (coreNumEl) coreNumEl.textContent = r.core_number;

                    const archNameEl = document.getElementById('out-archetype-name');
                    if (archNameEl) archNameEl.textContent = arch.name;

                    const subtitleIdEl = document.getElementById('out-subtitle-id');
                    if (subtitleIdEl) subtitleIdEl.textContent = arch.subtitle_id || '';

                    const elementEl = document.getElementById('out-element');
                    if (elementEl) elementEl.textContent = arch.element;

                    const aromaMainEl = document.getElementById('out-aroma-main');
                    if (aromaMainEl) aromaMainEl.textContent = arch.aroma_resonan || (arch.notes?.top + ', ' + arch.notes?.base);

                    const descEl = document.getElementById('out-description');
                    if (descEl) descEl.textContent = arch.description;

                    const notesTopTitle = document.getElementById('out-notes-top-title');
                    if (notesTopTitle) notesTopTitle.textContent = arch.aroma_notes_top_title || arch.notes?.top;

                    const notesTopDesc = document.getElementById('out-notes-top-desc');
                    if (notesTopDesc) notesTopDesc.textContent = arch.aroma_notes_top_desc || 'Menenangkan pikiran dan membuka intuisi batin';

                    const notesBaseTitle = document.getElementById('out-notes-base-title');
                    if (notesBaseTitle) notesBaseTitle.textContent = arch.aroma_notes_base_title || arch.notes?.base;

                    const notesBaseDesc = document.getElementById('out-notes-base-desc');
                    if (notesBaseDesc) notesBaseDesc.textContent = arch.aroma_notes_base_desc || 'Memberi ketenangan dan rasa grounding spiritual';

                    const formulaNum = document.getElementById('out-formula-num');
                    if (formulaNum) formulaNum.textContent = arch.number;

                    const essenceTitle = document.getElementById('out-essence-title');
                    if (essenceTitle) essenceTitle.textContent = arch.essence_name;

                    const formulaExtract = document.getElementById('out-formula-extract');
                    if (formulaExtract) formulaExtract.textContent = arch.formula_extract || arch.fragrance_description;

                    const priceEl = document.getElementById('out-price');
                    if (priceEl) priceEl.textContent = `Rp ${arch.price.toLocaleString('id-ID')}`;

                    const orderLink = document.getElementById('out-order-link');
                    if (orderLink) orderLink.href = `/order?essence=${arch.number}`;

                    const bottleImg = document.getElementById('out-bottle-img');
                    if (bottleImg) {
                        bottleImg.src = `/images/cards/card_${arch.number}_hd.png`;
                    }

                    // Update active archetype card highlight in 9-grid
                    document.querySelectorAll('.archetype-grid-card').forEach(card => {
                        card.className = 'archetype-grid-card rounded-2xl p-6 sm:p-7 relative transition-all duration-300 flex flex-col justify-between border border-gold-400/20 bg-gradient-to-b from-[#0e1322] via-[#090d18] to-[#060912] hover:border-gold-400/50 hover:-translate-y-1';
                    });
                    const activeCard = document.getElementById(`arch-card-${arch.number}`);
                    if (activeCard) {
                        activeCard.className = 'archetype-grid-card rounded-2xl p-6 sm:p-7 relative transition-all duration-300 flex flex-col justify-between border-2 border-gold-400 bg-gradient-to-b from-[#151c30] via-[#0d1322] to-[#070b16] shadow-[0_0_25px_rgba(197,160,89,0.25)]';
                    }

                    // Update social share link
                    const shareWa = document.getElementById('share-wa');
                    if (shareWa) {
                        const shareText = encodeURIComponent(`Halo! Angka inti numerologi jiwa saya adalah ${arch.number} (${arch.name} - ${arch.subtitle_id}) dengan aroma resonan ${arch.aroma_resonan}. Coba hitung getaran jiwamu di ASYIHAN: ${window.location.href}`);
                        shareWa.href = `https://api.whatsapp.com/send?text=${shareText}`;
                    }

                    // Smooth scroll to result
                    const resultContainer = document.getElementById('calculator-result-container');
                    if (resultContainer) {
                        resultContainer.scrollIntoView({ behavior: 'smooth', block: 'start' });
                    }
                }
            } catch (err) {
                console.error('Calculator submission error:', err);
            } finally {
                btn.disabled = false;
                if (loading) loading.classList.add('hidden');
            }
        });

        // Copy Result Link
        const copyBtn = document.getElementById('copy-result-link');
        if (copyBtn) {
            copyBtn.addEventListener('click', async () => {
                try {
                    await navigator.clipboard.writeText(window.location.href);
                    const originalHTML = copyBtn.innerHTML;
                    copyBtn.innerHTML = `<span class="text-[9px] text-gold-300 font-bold">✓</span>`;
                    setTimeout(() => {
                        copyBtn.innerHTML = originalHTML;
                    }, 2000);
                } catch (e) {
                    console.error('Failed to copy link', e);
                }
            });
        }

        // Instagram Share Button (Copy Link)
        const igBtn = document.getElementById('share-ig');
        if (igBtn) {
            igBtn.addEventListener('click', async () => {
                try {
                    await navigator.clipboard.writeText(window.location.href);
                    alert('Tautan kalkulator ASYIHAN berhasil disalin! Anda dapat menempelkannya di Instagram Story.');
                } catch (e) {
                    console.error('Failed to copy link', e);
                }
            });
        }
    }
});
