// =============== Left Side Value Increase Decrease
document.querySelectorAll('.calculation-item .mid input[type="range"]').forEach(slider => {
    function updateFill() {
        const min = +slider.min || 0;
        const max = +slider.max || 100;
        const val = +slider.value;
        const pct = ((val - min) / (max - min)) * 100;

        const isDark = document.documentElement.getAttribute('data-theme') === 'dark';
        const trackColor = isDark ? 'rgba(255,255,255,0.08)' : 'rgba(0,0,0,0.12)';

        slider.style.background = `linear-gradient(
        to right,
        var(--primary-color) 0%,
        var(--primary-color) ${pct}%,
        ${trackColor} ${pct}%,
        ${trackColor} 100%
    )`;
    }

    slider.addEventListener('input', updateFill);
    updateFill();
});

// Re-run all sliders when theme toggles
const observer = new MutationObserver(() => {
    document.querySelectorAll('.calculation-item .mid input[type="range"]').forEach(slider => {
        slider.dispatchEvent(new Event('input'));
    });
});

observer.observe(document.documentElement, {
    attributes: true,
    attributeFilter: ['data-theme']
});

// =============== Syringe Value Increase Decrease JS
const ticksEl = document.getElementById('ticks');
for (let i = 0; i <= 20; i++) {
    const d = document.createElement('div');
    d.className = i % 2 === 0 ? 'tick-maj' : 'tick-min';
    ticksEl.appendChild(d);
}

// Build labels
const labelsEl = document.getElementById('barrel-labels');
[0, 10, 20, 30, 40, 50, 60, 70, 80, 90, 100].forEach((v, i) => {
    const s = document.createElement('span');
    s.textContent = i === 0 ? '0 IU' : i === 10 ? '100 IU' : v;
    labelsEl.appendChild(s);
});

// Update function
const fill = document.getElementById('fill');
const display = document.getElementById('val-display');
const slider = document.getElementById('slider');

function update(v) {
    v = Math.max(0, Math.min(100, v));
    slider.value = v;
    fill.style.width = v + '%';
    display.innerHTML = v + ' <small>IU</small>';
}

slider.addEventListener('input', () => update(+slider.value));

function adj(delta) {
    update(+slider.value + delta);
}

update(10);

// ========================= 



