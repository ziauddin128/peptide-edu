// ============================================================
// PEPTIDE DOSE DATABASE
// ============================================================
const peptideDatabase = {
    'BPC-157': {
        label:      'BPC-157',
        category:   'Healing',
        options: [
            { label: '5mg + 1mL',  vialSize: 5,  bacWater: 1, desiredDose: 0.25 },
            { label: '10mg + 2mL', vialSize: 10, bacWater: 2, desiredDose: 0.25 },
        ],
        defaultDoseLabel: '250mcg · 7x/wk',
    },
    'TB-500': {
        label:      'TB-500',
        category:   'Healing',
        options: [
            { label: '2mg + 1mL',  vialSize: 2,  bacWater: 1, desiredDose: 2.0 },
            { label: '5mg + 1mL',  vialSize: 5,  bacWater: 1, desiredDose: 2.0 },
            { label: '10mg + 2mL', vialSize: 10, bacWater: 2, desiredDose: 2.0 },
        ],
        defaultDoseLabel: '2.5mg · 2x/wk',
    },
    'CJC-1295 (No DAC)': {
        label:      'CJC-1295 (No DAC)',
        category:   'Growth Hormone',
        options: [
            { label: '2mg + 1mL',  vialSize: 2,  bacWater: 1, desiredDose: 0.1 },
            { label: '5mg + 2mL', vialSize: 5, bacWater: 2, desiredDose: 0.1 },
        ],
        defaultDoseLabel: '100mcg · Daily',
    },
    'Ipamorelin': {
        label:      'Ipamorelin',
        category:   'Growth Hormone',
        options: [
            { label: '2mg + 1mL',  vialSize: 2,  bacWater: 1, desiredDose: 0.2 },
            { label: '5mg + 2mL', vialSize: 5, bacWater: 2, desiredDose: 0.2 },
        ],
        defaultDoseLabel: '200mcg · 7x/wk',
    },
    'Retatrutide': {
        label:      'Retatrutide',
        category:   'GLP-1',
        options: [
            { label: '5mg + 1mL',  vialSize: 5,  bacWater: 1, desiredDose: 0.5 },
            { label: '10mg + 2mL', vialSize: 10, bacWater: 2, desiredDose: 0.5 },
        ],
        defaultDoseLabel: '500mcg · Weekly',
    },
    'Tesamorelin': {
        label:      'Tesamorelin',
        category:   'Growth Hormone',
        options: [
            { label: '2mg + 0.5mL',  vialSize: 2,  bacWater: 0.5, desiredDose: 2 },
            { label: '5mg + 2.5mL', vialSize: 5, bacWater: 2.5, desiredDose: 2 },
            { label: '10mg + 3mL', vialSize: 10, bacWater: 3, desiredDose: 2 },
        ],
        defaultDoseLabel: '2mg · 7x/wk',
    },
    'Sermorelin': {
        label:      'Sermorelin',
        category:   'Growth Hormone',
        options: [
            { label: '2mg + 1mL',  vialSize: 2,  bacWater: 1, desiredDose: 0.3 },
            { label: '5mg + 2.5mL', vialSize: 5, bacWater: 2.5, desiredDose: 0.3 },
        ],
        defaultDoseLabel: '300mcg · 7x/wk',
    },
    'GHK-Cu': {
        label:      'GHK-Cu',
        category:   'Copper Peptides',
        options: [
            { label: '50mg + 3mL', vialSize: 50, bacWater: 3, desiredDose: 1 },
            { label: '100mg + 3mL', vialSize: 100, bacWater: 3, desiredDose: 1 },
        ],
        defaultDoseLabel: '1mg · 7x/wk',
    },
    'PT-141': {
        label:      'PT-141',
        category:   'Melanocortin',
        options: [
            { label: '10mg + 3mL', vialSize: 10, bacWater: 3, desiredDose: 1 },
        ],
        defaultDoseLabel: '1mg · 1x/wk',
    },
    'Melanotan II': {
        label:      'Melanotan II',
        category:   'Melanocortin',
        options: [
            { label: '10mg + 2mL', vialSize: 10, bacWater: 2, desiredDose: 0.25 },
        ],
        defaultDoseLabel: '250mcg · 7x/wk',
    },
    'MOTS-c': {
        label:      'MOTS-c',
        category:   'Mitochondrial',
        options: [
            { label: '5mg + 1mL', vialSize: 5, bacWater: 1, desiredDose: 0.5 },
            { label: '10mg + 2mL', vialSize: 10, bacWater: 2, desiredDose: 0.5 },
        ],
        defaultDoseLabel: '500mcg · 3x/wk',
    },
    'SS-31': {
        label:      'SS-31',
        category:   'Mitochondrial',
        options: [
            { label: '10mg + 1mL', vialSize: 10, bacWater: 1, desiredDose: 5 },
            { label: '30mg + 3mL', vialSize: 30, bacWater: 3, desiredDose: 5 },
            { label: '50mg + 3mL', vialSize: 50, bacWater: 3, desiredDose: 5 },
        ],
        defaultDoseLabel: '5mg · 7x/wk',
    },
    'Semax': {
        label:      'Semax',
        category:   'Nootropic',
        options: [
            { label: '5mg + 1mL', vialSize: 5, bacWater: 1, desiredDose: 0.4 },
            { label: '10mg + 2mL', vialSize: 10, bacWater: 2, desiredDose: 0.4 },
        ],
        defaultDoseLabel: '400mcg · 7x/wk',
    },
    'Selank': {
        label:      'Selank',
        category:   'Nootropic',
        options: [
            { label: '5mg + 3mL', vialSize: 5, bacWater: 3, desiredDose: 0.25 },
            { label: '10mg + 3mL', vialSize: 10, bacWater: 3, desiredDose: 0.25 },
        ],
        defaultDoseLabel: '250mcg · 7x/wk',
    },
    'AOD-9604': {
        label:      'AOD-9604',
        category:   'Metabolic',
        options: [
            { label: '5mg + 3mL',  vialSize: 5,  bacWater: 3, desiredDose: 0.3 },
        ],
        defaultDoseLabel: '300mcg · 7x/wk',
    },
    '5-Amino-1MQ': {
        label:      '5-Amino-1MQ',
        category:   'Metabolic',
        options: [
            { label: '10mg + 2mL', vialSize: 10, bacWater: 2, desiredDose: 5 },
            { label: '50mg + 4mL', vialSize: 50, bacWater: 4, desiredDose: 5 },
        ],
        defaultDoseLabel: '5mg · 7x/wk',
    },
    'Epithalon': {
        label:      'Epithalon',
        category:   'Longevity',
        options: [
            { label: '10mg + 2mL', vialSize: 10, bacWater: 2, desiredDose: 5 },
        ],
        defaultDoseLabel: '5mg · 7x/wk',
    },
    'FOXO4-DRI': {
        label:      'FOXO4-DRI',
        category:   'Longevity',
        options: [
            { label: '10mg + 2mL', vialSize: 10, bacWater: 2, desiredDose: 0.5 },
        ],
        defaultDoseLabel: '500mcg · 5x/wk',
    },
    'Thymosin Alpha-1': {
        label:      'Thymosin Alpha-1',
        category:   'Immune',
        options: [
            { label: '5mg + 3mL',  vialSize: 5,  bacWater: 3, desiredDose: 0.45 },
            { label: '10mg + 3mL',  vialSize: 10,  bacWater: 3, desiredDose: 0.45 },
        ],
        defaultDoseLabel: '450mcg · 7x/wk',
    },
    'Kisspeptin': {
        label:      'Kisspeptin',
        category:   'Reproductive',
        options: [
            { label: '10mg + 3mL', vialSize: 10, bacWater: 3, desiredDose: 0.1 },
        ],
        defaultDoseLabel: '100mcg · 7x/wk',
    },
    'Retatrutide_Duplicate': { // Object key uniqueness adjustment if needed
        label:      'Retatrutide',
        category:   'GLP-1',
        options: [
            { label: '5mg + 1mL', vialSize: 5, bacWater: 1, desiredDose: 2 },
            { label: '10mg + 2mL', vialSize: 10, bacWater: 2, desiredDose: 2 },
            { label: '20mg + 1mL', vialSize: 20, bacWater: 1, desiredDose: 2 },
            { label: '30mg + 3mL', vialSize: 30, bacWater: 3, desiredDose: 2 },
        ],
        defaultDoseLabel: '2mg · 1x/wk',
    },
};

// ============================================================
// SYRINGE TYPES CONFIG
// ============================================================
const syringeTypes = {
    '1ml': {
        maxUnits:  100,
        mlPerUnit: 0.01,
        label:     '100 UNITS = 1 ML',
        title:     'U-100 · 1 ML VISUALIZER',
        tickCount: 20,
        labelStep: 10,
        sizeLabel: '1',
        desc:      'Standard 100-unit insulin syringe. Default for SubQ peptides.',
    },
    '0.5ml': {
        maxUnits:  50,
        mlPerUnit: 0.01,
        label:     '50 UNITS = 0.5 ML',
        title:     'U-100 · ½ ML VISUALIZER',
        tickCount: 20,
        labelStep: 5,
        sizeLabel: '½',
        desc:      '50-unit barrel. Wider tick spacing for microdosing precision.',
    },
    '0.3ml': {
        maxUnits:  30,
        mlPerUnit: 0.01,
        label:     '30 UNITS = 0.3 ML',
        title:     'U-100 · ⅓ ML VISUALIZER',
        tickCount: 20,
        labelStep: 3,
        sizeLabel: '⅓',
        desc:      '30-unit barrel. Best for tiny doses (BPC-157, ipamorelin).',
    },
};

let activeSyringe     = syringeTypes['1ml'];
let activePeptide     = null;   // currently selected peptide key
let activeOptionIndex = 0;      // which option (5mg/10mg etc) is selected

// Default state (no peptide selected)
const DEFAULT_STATE = { vialSize: 5, bacWater: 2, desiredDose: 0.25 };

// ============================================================
// PEPTIDE CALCULATOR
// ============================================================
function peptideCalculator({ peptideMg, bacWaterMl, desiredDoseMg }) {
    const concentration = peptideMg / bacWaterMl;
    const volumePerDose = desiredDoseMg / concentration;
    const syringeUnits  = volumePerDose * 100;
    const dosesPerVial  = bacWaterMl / volumePerDose;

    return {
        concentration:  concentration.toFixed(2),
        volumePerDose:  volumePerDose.toFixed(2),
        syringeUnits:   Number(syringeUnits.toFixed(2)),
        dosesPerVial:   dosesPerVial.toFixed(2),
    };
}

// ============================================================
// PRESET BUTTON VALUES (in mg)
// ============================================================
const presets = {
    vialSize:    { '2mg': 2,      '5mg': 5,      '10mg': 10    },
    bacWater:    { '1ml': 1,      '2ml': 2,       '3ml': 3     },
    desiredDose: { '100mcg': 0.1, '250mcg': 0.25, '500mcg': 0.5 },
};

// ============================================================
// STATE
// ============================================================
const state = { ...DEFAULT_STATE };

// ============================================================
// DOM REFS
// ============================================================
const sliders = {
    vialSize:    document.querySelector('.calculation-item:nth-child(1) .mid input[type="range"]'),
    bacWater:    document.querySelector('.calculation-item:nth-child(2) .mid input[type="range"]'),
    desiredDose: document.querySelector('.calculation-item:nth-child(3) .mid input[type="range"]'),
};
const topValues = {
    vialSize:    document.querySelector('.calculation-item:nth-child(1) .top h2'),
    bacWater:    document.querySelector('.calculation-item:nth-child(2) .top h2'),
    desiredDose: document.querySelector('.calculation-item:nth-child(3) .top h2'),
};
const resultEls = {
    concentration: document.querySelector('.calculation-dose-card div:nth-child(1) h1 span:first-child'),
    volumePerDose: document.querySelector('.calculation-dose-card div:nth-child(2) h1 span:first-child'),
    dosesPerVial:  document.querySelector('.calculation-dose-card div:nth-child(3) h1 span:first-child'),
};

const syringeDrawTo   = document.querySelector('.calculation-syringe-preview .top .text-end h2');
const syringeWarning  = document.querySelector('.syringe-overflow-warning');
const syringeTitle    = document.querySelector('.calculation-syringe-preview .top h5');
const syringeSubLabel = document.querySelector('.calculation-syringe-preview .top p');
const barrelFill      = document.getElementById('fill');
const fillLine        = document.querySelector('.barrel-fill-line');
const ticksEl         = document.getElementById('ticks');
const labelsEl        = document.getElementById('barrel-labels');

const specificDosePredefinedBtnWrapper  = document.querySelector('.specific-dose-predefined-btn-wrapper');   
const peptideOptionsBar  = document.querySelector('.specific-dose-options-bar');   // options row (5mg+1mL etc)
const peptideOptionsWrap = document.querySelector('.specific-dose-options-btns');   // buttons container inside bar

const comparisonTable = document.querySelector('.comparison-table');

// ============================================================
// BUILD SYRINGE TICKS & LABELS
// ============================================================
function buildSyringe(type) {
    ticksEl.innerHTML  = '';
    labelsEl.innerHTML = '';

    for (let i = 0; i <= type.tickCount; i++) {
        const d = document.createElement('div');
        d.className = i % 2 === 0 ? 'tick-maj' : 'tick-min';
        ticksEl.appendChild(d);
    }

    const max  = type.maxUnits;
    const step = type.labelStep;
    for (let v = 0; v <= max; v += step) {
        const s = document.createElement('span');
        s.textContent = v === 0 ? '0 IU' : v === max ? `${max} IU` : v;
        labelsEl.appendChild(s);
    }

    if (syringeTitle)    syringeTitle.textContent    = type.title;
    if (syringeSubLabel) syringeSubLabel.textContent = type.label;
}

// ============================================================
// UPDATE SYRINGE FILL
// ============================================================
function updateSyringe(units) {
    const max        = activeSyringe.maxUnits;
    const isOverflow = units > max;
    const pct        = Math.min((units / max) * 100, 100);

    barrelFill.style.width      = pct + '%';
    barrelFill.style.background = isOverflow ? 'rgba(220, 38, 38, 0.5)' : '';
    fillLine.style.background   = isOverflow ? '#ef4444' : '';

    syringeDrawTo.textContent = units.toFixed(1) + ' IU';
    syringeDrawTo.style.color = isOverflow ? '#ef4444' : '';

    if (syringeWarning) {
        syringeWarning.style.display = isOverflow ? 'block' : 'none';
        syringeWarning.textContent   = `EXCEEDS ${(units / 100).toFixed(1)} ML`;
    }
}

 
// ============================================================
// DYNAMIC COMPARISON TABLE GENERATOR (UPDATED & SYNCED)
// ============================================================
function updateComparisonTable() {
    if (!comparisonTable) return;

    let tbody = comparisonTable.querySelector('tbody');
    if (!tbody) {
        tbody = document.createElement('tbody');
        while (comparisonTable.firstChild) {
            tbody.appendChild(comparisonTable.firstChild);
        }
        comparisonTable.appendChild(tbody);
    }

    let targetVolumes = [1.0, 2.0, 3.0];
    const currentBac = state.bacWater;

    if (!targetVolumes.includes(currentBac)) {
        targetVolumes.push(currentBac);
        targetVolumes.sort((a, b) => a - b);
    }

    // [✨ UPDATE 1: ডাইনামিক হেডার টাইটেল জেনারেটর]
    // "U-100 · 1 ML VISUALIZER" থেকে "VISUALIZER" সরিয়ে "Units" যুক্ত করা হচ্ছে
    const syringeHeaderTitle = activeSyringe.title ? activeSyringe.title.replace('VISUALIZER', 'Units') : 'Units';

    const headerRow = `
        <tr>
            <th>BAC Water</th>
            <th>Concentration</th>
            <th>Draw Volume</th>
            <th>${syringeHeaderTitle}</th>
        </tr>`;
    
    tbody.innerHTML = headerRow;

    targetVolumes.forEach(vol => {
        const res = peptideCalculator({
            peptideMg: state.vialSize,
            bacWaterMl: vol,
            desiredDoseMg: state.desiredDose
        });

        const tr = document.createElement('tr');
        
        const isCurrent = (vol === currentBac);
        const labelContent = isCurrent 
            ? `${vol.toFixed(1)} mL <br><span class="text-primary-color small">CURRENT</span>`
            : `${vol.toFixed(1)} mL`;

        // [✨ UPDATE 2: কারেন্ট সিরিঞ্জের ম্যাক্স ক্যাপাসিটি অনুযায়ী ওভারফ্লো চেকিং ও কালার টগল]
        const isOverflow = res.syringeUnits > activeSyringe.maxUnits;
        const textClass = isOverflow ? 'text-overflow-color' : 'text-primary-color';

        tr.innerHTML = `
            <td>${labelContent}</td>
            <td>${res.concentration} mg/mL</td>
            <td>${res.volumePerDose} mL</td>
            <td><span class="${textClass}">${res.syringeUnits.toFixed(1)} IU</span></td>
        `;
        tbody.appendChild(tr);
    });
}

// ============================================================
// SYNC DESIRED DOSE SLIDER LIMIT
// ============================================================
function syncDesiredDoseLimit() {
    const desiredDoseSlider = sliders.desiredDose;
    if (!desiredDoseSlider) return;

    let maxLimit = state.vialSize;
    if (maxLimit > 15) {
        maxLimit = 15;
    }

    desiredDoseSlider.max = maxLimit;

    if (state.desiredDose > maxLimit) {
        state.desiredDose = maxLimit;
        desiredDoseSlider.value = maxLimit;
        topValues.desiredDose.textContent = formatDisplay('desiredDose', maxLimit);
    }
}

// ============================================================
// APPLY STATE TO SLIDERS + DISPLAY
// ============================================================
function applyState() {
    syncDesiredDoseLimit();

    Object.entries(sliders).forEach(([key, slider]) => {
        const currentValue = state[key];
        slider.value = currentValue;
        topValues[key].textContent = formatDisplay(key, currentValue);
        updateSliderFill(slider);

        const item = slider.closest('.calculation-item');
        if (item) {
            const buttons = item.querySelectorAll('.calculation-item-pre-option button');
            buttons.forEach(btn => {
                const label = btn.textContent.trim().toLowerCase();
                const btnVal = presets[key][label];
                
                if (btnVal !== undefined && btnVal === currentValue) {
                    btn.classList.add('active');
                } else {
                    btn.classList.remove('active');
                }
            });
        }
    });
    recalculate();
}

// ============================================================
// PEPTIDE OPTIONS BAR — show/hide & render buttons
// ============================================================
function showPeptideOptions(peptideKey) {
    const peptide = peptideDatabase[peptideKey];
    if (!peptide || !peptideOptionsWrap) return;

    // [✨ UPDATE 3: ভাঙা 'node.innerHTML' টোকেন এরর ফিক্স করা হয়েছে]
    peptideOptionsWrap.innerHTML = '';

    peptide.options.forEach((opt, idx) => {
        const btn = document.createElement('button');

        const parts = opt.label.split('+');
        btn.innerHTML = `<strong>${parts[0].trim()}</strong> <span>+${parts[1].trim()}</span>`;

        if (idx === activeOptionIndex) btn.classList.add('active');

        btn.addEventListener('click', () => {
            activeOptionIndex = idx;
            peptideOptionsWrap.querySelectorAll('button')
                .forEach(b => b.classList.remove('active'));
            btn.classList.add('active');
            applyPeptideOption(peptideKey, idx);
        });

        peptideOptionsWrap.appendChild(btn);
    });

    const optionsBar = document.querySelector('.specific-dose-options-bar');
    
    const existingBadge = optionsBar.querySelector('.main-peptide-badge');
    if (existingBadge) existingBadge.remove();

    if (peptide.label && optionsBar) {
        const mainBadge = document.createElement('button');
        mainBadge.className = 'active main-peptide-badge'; 
        mainBadge.innerHTML = `<strong>${peptide.label}</strong>`;
        optionsBar.prepend(mainBadge);
    }

    const freqSpan = document.createElement('span');
    freqSpan.className   = 'dose-freq-label';
    freqSpan.textContent = peptide.defaultDoseLabel;
    peptideOptionsWrap.appendChild(freqSpan);

    if (peptideOptionsBar) peptideOptionsBar.style.display = 'flex';
    if (specificDosePredefinedBtnWrapper) specificDosePredefinedBtnWrapper.style.display = 'none';

    const collapseEl = document.querySelector('#s_collapseOne');
    const collapseInstance = bootstrap.Collapse.getOrCreateInstance(collapseEl);
    const isOpen = collapseEl.classList.contains('show');
    
    if (isOpen) {
        collapseInstance.hide();
    }
}

function hidePeptideOptions() {
    if (peptideOptionsBar) peptideOptionsBar.style.display = 'none';
    if (specificDosePredefinedBtnWrapper) specificDosePredefinedBtnWrapper.style.display = 'flex';
    if (peptideOptionsWrap) peptideOptionsWrap.innerHTML   = '';
}

// ============================================================
// APPLY PEPTIDE OPTION TO STATE
// ============================================================
function applyPeptideOption(peptideKey, optionIdx) {
    const opt = peptideDatabase[peptideKey].options[optionIdx];
    if (!opt) return;

    state.vialSize    = opt.vialSize;
    state.bacWater    = opt.bacWater;
    state.desiredDose = opt.desiredDose;

    applyState();
}

// ============================================================
// PEPTIDE BUTTON CLICK
// ============================================================
function onPeptideClick(peptideKey, btn, allBtns) {
    if (activePeptide === peptideKey) {
        activePeptide     = null;
        activeOptionIndex = 0;
        allBtns.forEach(b => b.classList.remove('active'));
        hidePeptideOptions();
        state.vialSize    = DEFAULT_STATE.vialSize;
        state.bacWater    = DEFAULT_STATE.bacWater;
        state.desiredDose = DEFAULT_STATE.desiredDose;
        applyState();
        return;
    }

    activePeptide     = peptideKey;
    activeOptionIndex = 0;

    document.querySelectorAll('[data-peptide]').forEach(b => {
        b.classList.toggle('active', b.dataset.peptide === peptideKey);
    });

    const collapseEl = document.getElementById('s_collapseOne');
    if (collapseEl) {
        const collapseInstance = bootstrap.Collapse.getOrCreateInstance(collapseEl, {
            toggle: false
        });
        if (collapseEl.classList.contains('show')) {
            collapseInstance.hide();
        }
    }

    showPeptideOptions(peptideKey);
    applyPeptideOption(peptideKey, 0);
}

// ============================================================
// WIRE UP SHORTCUT BUTTONS (top row)
// ============================================================
document.querySelectorAll('.specific-dose-predefined-btn button[data-peptide]').forEach(btn => {
    btn.addEventListener('click', () => {
        const allBtns = document.querySelectorAll('[data-peptide]');
        onPeptideClick(btn.dataset.peptide, btn, allBtns);
    });
});

// ============================================================
// WIRE UP ACCORDION BUTTONS
// ============================================================
document.querySelectorAll('.more-dose-item-btns button[data-peptide]').forEach(btn => {
    btn.addEventListener('click', () => {
        const allBtns = document.querySelectorAll('[data-peptide]');
        onPeptideClick(btn.dataset.peptide, btn, allBtns);
    });
});

// ============================================================
// SEARCH FILTER
// ============================================================
const searchInput = document.querySelector('.dose-search input');
if (searchInput) {
    searchInput.addEventListener('input', () => {
        const query = searchInput.value.trim().toLowerCase();

        document.querySelectorAll('.more-dose-item').forEach(item => {
            const btns    = item.querySelectorAll('button[data-peptide]');
            let anyMatch  = false;

            btns.forEach(btn => {
                const name    = btn.dataset.peptide.toLowerCase();
                const matches = name.includes(query);
                btn.style.display = matches ? '' : 'none';
                if (matches) anyMatch = true;
            });

            item.style.display = anyMatch || query === '' ? '' : 'none';
        });
    });
}

// ============================================================
// CLEAR BUTTON
// ============================================================
const clearBtn = document.querySelector('.specific-dose-filter-clear-btn');
if (clearBtn) {
    clearBtn.addEventListener('click', () => {
        activePeptide     = null;
        activeOptionIndex = 0;

        document.querySelectorAll('[data-peptide]').forEach(b => b.classList.remove('active'));

        if (searchInput) {
            searchInput.value = '';
            searchInput.dispatchEvent(new Event('input'));
        }

        hidePeptideOptions();

        state.vialSize    = DEFAULT_STATE.vialSize;
        state.bacWater    = DEFAULT_STATE.bacWater;
        state.desiredDose = DEFAULT_STATE.desiredDose;
        applyState();
    });
}

// ============================================================
// SYRINGE SIZE VARIANTS
// ============================================================
const syringeKeys = ['1ml', '0.5ml', '0.3ml'];

document.querySelectorAll('.syringe-size-variant').forEach((variant, idx) => {
    variant.addEventListener('click', () => {
        document.querySelectorAll('.syringe-size-variant')
            .forEach(v => v.classList.remove('active'));
        variant.classList.add('active');

        activeSyringe = syringeTypes[syringeKeys[idx]];

        document.querySelector('.active-syringe-size').textContent = activeSyringe.sizeLabel;
        document.querySelector('.syringe-size-desc').textContent   = activeSyringe.desc;

        buildSyringe(activeSyringe);
        recalculate(); // এখানে রি-ক্যালকুলেটের মাধ্যমে টেবিল ও ওভারফ্লো ক্লাস আপডেট হবে অটোমেটিক
    });
});

// ============================================================
// SLIDER TRACK FILL
// ============================================================
function updateSliderFill(slider) {
    const min        = +slider.min || 0;
    const max        = +slider.max || 100;
    const pct        = ((+slider.value - min) / (max - min)) * 100;
    const isDark     = document.documentElement.getAttribute('data-theme') === 'dark';
    const trackColor = isDark ? 'rgba(255,255,255,0.08)' : 'rgba(0,0,0,0.12)';

    slider.style.background = `linear-gradient(to right,
        var(--primary-color) 0%,
        var(--primary-color) ${pct}%,
        ${trackColor} ${pct}%,
        ${trackColor} 100%)`;
}

// ============================================================
// DISPLAY FORMATTING
// ============================================================
function formatDisplay(key, value) {
    if (key === 'desiredDose') return value.toFixed(2);
    if (key === 'bacWater')    return value.toFixed(1);
    return value.toFixed(1);
}

// ============================================================
// MAIN RECALCULATE
// ============================================================
function recalculate() {
    const result = peptideCalculator({
        peptideMg:     state.vialSize,
        bacWaterMl:    state.bacWater,
        desiredDoseMg: state.desiredDose,
    });

    resultEls.concentration.textContent = result.concentration;
    resultEls.volumePerDose.textContent = result.volumePerDose;
    resultEls.dosesPerVial.textContent  = result.dosesPerVial;

    updateSyringe(result.syringeUnits);
    updateComparisonTable(); 
}

// ============================================================
// WIRE UP SLIDERS
// ============================================================
Object.entries(sliders).forEach(([key, slider]) => {
    slider.addEventListener('input', () => {
        state[key] = +slider.value;
        
        if (key === 'vialSize') {
            syncDesiredDoseLimit();
            updateSliderFill(sliders.desiredDose);
        }

        topValues[key].textContent = formatDisplay(key, +slider.value);

        const item = slider.closest('.calculation-item');
        item.querySelectorAll('.calculation-item-pre-option button')
            .forEach(b => b.classList.remove('active'));

        updateSliderFill(slider);
        recalculate();
    });

    updateSliderFill(slider);
});

// ============================================================
// WIRE UP CALCULATION PRESET BUTTONS
// ============================================================
document.querySelectorAll('.calculation-item').forEach((item, idx) => {
    const key    = ['vialSize', 'bacWater', 'desiredDose'][idx];
    const slider = sliders[key];

    item.querySelectorAll('.calculation-item-pre-option button').forEach(btn => {
        btn.addEventListener('click', () => {
            item.querySelectorAll('.calculation-item-pre-option button')
                .forEach(b => b.classList.remove('active'));
            btn.classList.add('active');

            const label = btn.textContent.trim().toLowerCase();
            const val   = presets[key][label];
            if (val === undefined) return;

            state[key]                 = val;
            
            if (key === 'vialSize') {
                syncDesiredDoseLimit();
                updateSliderFill(sliders.desiredDose);
            }

            slider.value               = val;
            topValues[key].textContent = formatDisplay(key, val);

            updateSliderFill(slider);
            recalculate();
        });
    });
});

// ============================================================
// COLLAPSE TOGGLE TEXT
// ============================================================
const collapseEl = document.getElementById('s_collapseOne');
const toggleBtn  = document.querySelector('.specific-dose-toggle');

if (collapseEl && toggleBtn) {
    collapseEl.addEventListener('show.bs.collapse', () => {
        toggleBtn.innerHTML = 'Less <i class="fa-solid fa-angle-up"></i>';
    });
    collapseEl.addEventListener('hide.bs.collapse', () => {
        toggleBtn.innerHTML = '+15 more <i class="fa-solid fa-angle-down"></i>';
    });
}

// ============================================================
// THEME OBSERVER
// ============================================================
new MutationObserver(() => {
    Object.values(sliders).forEach(updateSliderFill);
}).observe(document.documentElement, { attributes: true, attributeFilter: ['data-theme'] });

// ============================================================
// INIT
// ============================================================
Object.entries(sliders).forEach(([key, slider]) => {
    if (key === 'vialSize') syncDesiredDoseLimit();
    slider.value               = state[key];
    topValues[key].textContent = formatDisplay(key, state[key]);
    updateSliderFill(slider);
});

document.querySelector('.active-syringe-size').textContent = activeSyringe.sizeLabel;
document.querySelector('.syringe-size-desc').textContent   = activeSyringe.desc;

hidePeptideOptions();
buildSyringe(activeSyringe);
recalculate();