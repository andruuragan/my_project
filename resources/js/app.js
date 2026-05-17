import './bootstrap';
import Alpine from 'alpinejs';

window.Alpine = Alpine;
Alpine.start();

document.addEventListener('DOMContentLoaded', function () {

    const cards = document.querySelectorAll('.product-card');
    if (!cards.length) return;

    cards.forEach(card => {

        const minus = card.querySelector('.minus');
        const plus = card.querySelector('.plus');
        const input = card.querySelector('.qty-value');

        const priceEl = card.querySelector('.item-price');
        const totalWrap = card.querySelector('.total-price');
        const totalEl = card.querySelector('.total-sum');

        if (!minus || !plus || !input || !priceEl || !totalWrap || !totalEl) return;

        const basePrice = Number(priceEl.dataset.price || 0);

        function update() {

            let qty = Math.max(1, Number(input.value) || 1);

            input.value = qty;

            const total = basePrice * qty;

            totalEl.textContent = total.toLocaleString('uk-UA');

            totalWrap.classList.toggle('show', qty > 1);
        }

        minus.addEventListener('click', () => {
            input.value = Math.max(1, (Number(input.value) || 1) - 1);
            update();
        });

        plus.addEventListener('click', () => {
            input.value = (Number(input.value) || 1) + 1;
            update();
        });

        input.addEventListener('change', update);

        update();
    });
});
