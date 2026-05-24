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

// Active syringe state
let activeSyringe = syringeTypes['1ml'];

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
    vialSize:    { '2mg': 2,       '5mg': 5,      '10mg': 10   },
    bacWater:    { '1ml': 1,       '2ml': 2,       '3ml': 3    },
    desiredDose: { '100mcg': 0.1,  '250mcg': 0.25, '500mcg': 0.5 },
};

// ============================================================
// STATE
// ============================================================
const state = {
    vialSize:    5,
    bacWater:    2,
    desiredDose: 0.25,
};

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

// ============================================================
// SYRINGE — build ticks & labels (called on syringe switch too)
// ============================================================
function buildSyringe(type) {
    // Clear existing
    ticksEl.innerHTML  = '';
    labelsEl.innerHTML = '';

    // Build ticks
    for (let i = 0; i <= type.tickCount; i++) {
        const d = document.createElement('div');
        d.className = i % 2 === 0 ? 'tick-maj' : 'tick-min';
        ticksEl.appendChild(d);
    }

    // Build labels  e.g. 0, 10, 20... or 0, 5, 10... or 0, 3, 6...
    const max  = type.maxUnits;
    const step = type.labelStep;
    for (let v = 0; v <= max; v += step) {
        const s = document.createElement('span');
        s.textContent = v === 0 ? '0 IU' : v === max ? `${max} IU` : v;
        labelsEl.appendChild(s);
    }

    // Update header text
    if (syringeTitle)    syringeTitle.textContent    = type.title;
    if (syringeSubLabel) syringeSubLabel.textContent = type.label;
}

// ============================================================
// SYRINGE UPDATE (fill based on active syringe max)
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
// SYRINGE SIZE VARIANTS — click handler
// ============================================================
const syringeKeys = ['1ml', '0.5ml', '0.3ml'];

document.querySelectorAll('.syringe-size-variant').forEach((variant, idx) => {
    variant.addEventListener('click', () => {
        document.querySelectorAll('.syringe-size-variant')
            .forEach(v => v.classList.remove('active'));
        variant.classList.add('active');

        activeSyringe = syringeTypes[syringeKeys[idx]];

        // ↓ ADD THESE TWO LINES
        document.querySelector('.active-syringe-size').textContent = activeSyringe.sizeLabel;
        document.querySelector('.syringe-size-desc').textContent   = activeSyringe.desc;

        buildSyringe(activeSyringe);
        recalculate();
    });
});

// ============================================================
// SLIDER TRACK FILL (dark / light mode)
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
}

// ============================================================
// WIRE UP SLIDERS
// ============================================================
Object.entries(sliders).forEach(([key, slider]) => {
    slider.addEventListener('input', () => {
        state[key] = +slider.value;
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
// WIRE UP PRESET BUTTONS
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
            slider.value               = val;
            topValues[key].textContent = formatDisplay(key, val);

            updateSliderFill(slider);
            recalculate();
        });
    });
});

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
    slider.value               = state[key];
    topValues[key].textContent = formatDisplay(key, state[key]);
    updateSliderFill(slider);
});

buildSyringe(activeSyringe);
recalculate();