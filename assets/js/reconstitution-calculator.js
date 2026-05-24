// ============================================================
// PEPTIDE CALCULATOR
// ============================================================
function peptideCalculator({ peptideMg, bacWaterMl, desiredDoseMg }) {
    const concentration  = peptideMg / bacWaterMl;
    const volumePerDose  = desiredDoseMg / concentration;
    const syringeUnits   = volumePerDose * 100;
    const dosesPerVial   = bacWaterMl / volumePerDose;

    return {
          concentration:  concentration.toFixed(2),
        volumePerDose:  volumePerDose.toFixed(2),
        syringeUnits:   Number(syringeUnits.toFixed(2)), 
        dosesPerVial:   dosesPerVial.toFixed(1),
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
const state = {
    vialSize:    2,    // mg  (matches first preset active: 2mg)
    bacWater:    1,    // mL  (matches first preset active: 1ml)
    desiredDose: 0.1,  // mg  (matches first preset active: 100mcg)
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

const syringeDrawTo  = document.querySelector('.calculation-syringe-preview .top .text-end h2');
const syringeWarning = document.querySelector('.syringe-overflow-warning');
const barrelFill     = document.getElementById('fill');
const fillLine       = document.querySelector('.barrel-fill-line');

// ============================================================
// SYRINGE — build ticks & labels once
// ============================================================
(function buildSyringe() {
    const ticksEl = document.getElementById('ticks');
    for (let i = 0; i <= 20; i++) {
        const d = document.createElement('div');
        d.className = i % 2 === 0 ? 'tick-maj' : 'tick-min';
        ticksEl.appendChild(d);
    }

    const labelsEl = document.getElementById('barrel-labels');
    [0, 10, 20, 30, 40, 50, 60, 70, 80, 90, 100].forEach((v, i) => {
        const s = document.createElement('span');
        s.textContent = i === 0 ? '0 IU' : i === 10 ? '100 IU' : v;
        labelsEl.appendChild(s);
    });
})();

// ============================================================
// SYRINGE UPDATE
// ============================================================
function updateSyringe(units) {
    const isOverflow = units > 100;
    const pct = Math.min(units, 100);

    barrelFill.style.width      = pct + '%';
    barrelFill.style.background = isOverflow ? 'rgba(220, 38, 38, 0.5)' : '';
    fillLine.style.background   = isOverflow ? '#ef4444' : '';

    syringeDrawTo.textContent   = units.toFixed(1) + ' IU';
    syringeDrawTo.style.color   = isOverflow ? '#ef4444' : '';

    if (syringeWarning) {
        syringeWarning.style.display = isOverflow ? 'block' : 'none';
        syringeWarning.textContent   = `EXCEEDS ${(units / 100).toFixed(1)} ML`;
    }
}

// ============================================================
// SLIDER TRACK FILL (dark / light mode)
// ============================================================
function updateSliderFill(slider) {
    const min = +slider.min || 0;
    const max = +slider.max || 100;
    const pct = ((+slider.value - min) / (max - min)) * 100;
    const isDark      = document.documentElement.getAttribute('data-theme') === 'dark';
    const trackColor  = isDark ? 'rgba(255,255,255,0.08)' : 'rgba(0,0,0,0.12)';

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
        peptideMg:    state.vialSize,
        bacWaterMl:   state.bacWater,
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

        // Clear active preset if slider moved manually
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
            // Set active
            item.querySelectorAll('.calculation-item-pre-option button')
                .forEach(b => b.classList.remove('active'));
            btn.classList.add('active');

            // Get value from preset map
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
recalculate();