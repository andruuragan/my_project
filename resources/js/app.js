import './bootstrap';

import * as bootstrap from 'bootstrap';
window.bootstrap = bootstrap;
import Alpine from 'alpinejs';

window.Alpine = Alpine;
Alpine.start();
const csrf = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
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

window.refreshCart = function () {

    fetch('/cart/state')
        .then(res => res.json())
        .then(data => {

            const countEl = document.getElementById('cartCount');
            const totalEl = document.getElementById('cartTotalNav');

            if (countEl) {
                countEl.innerText = data.count;
                countEl.classList.toggle('hidden', data.count === 0);
            }

            if (totalEl) {
                totalEl.innerText =
                    new Intl.NumberFormat('uk-UA').format(data.total) + ' грн.';

                totalEl.classList.toggle('hidden', data.total === 0);
            }
        });
};
document.addEventListener('DOMContentLoaded', function () {

    function parsePrice(text) {
        return parseFloat(text.replace(/\s/g, '').replace('грн.', '')) || 0;
    }

    function format(n) {
        return new Intl.NumberFormat('uk-UA').format(n);
    }

    function recalcRow(row) {
        let qty = parseInt(row.querySelector('.qty').value) || 1;
        let price = parsePrice(row.querySelector('.price-cell').innerText);

        row.querySelector('.item-sum').innerText =
            format(qty * price) + ' грн.';
    }

    function recalcTotal() {
        let total = 0;

        document.querySelectorAll('tr[data-id]').forEach(row => {
            let qty = parseInt(row.querySelector('.qty').value) || 1;
            let price = parsePrice(row.querySelector('.price-cell').innerText);

            total += qty * price;
        });

        document.getElementById('cartTotal').innerText = format(total);
    }

    function updateServer(row) {

        const csrf = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        let id = row.dataset.id;
        let qty = row.querySelector('.qty').value;

        fetch(`/cart/update/${id}`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrf,
                'Accept': 'application/json'
            },
            body: JSON.stringify({ qty })
        })
            .then(res => res.json())
            .then(data => {
                recalcRow(row);
                recalcTotal();
                window.refreshCart();
            });
    }

    // PLUS
    document.querySelectorAll('.plus').forEach(btn => {
        btn.addEventListener('click', function () {
            let row = this.closest('tr');
            let input = row.querySelector('.qty');

            input.value = parseInt(input.value) + 1;
            updateServer(row);
        });
    });

    // MINUS
    document.querySelectorAll('.minus').forEach(btn => {
        btn.addEventListener('click', function () {
            let row = this.closest('tr');
            let input = row.querySelector('.qty');

            if (input.value > 1) {
                input.value = parseInt(input.value) - 1;
                updateServer(row);
            }
        });
    });

    // INPUT
    document.querySelectorAll('.qty').forEach(input => {
        input.addEventListener('input', function () {
            updateServer(this.closest('tr'));
        });
    });

    // DELETE
    document.querySelectorAll('.delete-btn').forEach(btn => {
        btn.addEventListener('click', function () {

            if (!confirm('Видалити товар?')) return;

            let id = this.dataset.id;
            let row = this.closest('tr');

            fetch(`/cart/remove/${id}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': csrf,
                    'Accept': 'application/json'
                }
            })
                .then(res => res.json())
                .then(data => {
                    row.remove();
                    recalcTotal();
                    window.refreshCart();
                });
        });
    });

    // CLEAR
    const clearBtn = document.querySelector('#clearCartBtn');

    if (clearBtn) {
        clearBtn.addEventListener('click', function (e) {
            e.preventDefault();

            if (!confirm('Очистити кошик?')) return;

            fetch('/cart/clear', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': csrf,
                    'Accept': 'application/json'
                }
            })
                .then(res => res.json())
                .then(() => {
                    document.querySelectorAll('tr[data-id]').forEach(r => r.remove());
                    document.getElementById('cartTotal').innerText = '0';
                    window.refreshCart();
                });
        });
    }

});
window.showAlert = function (message, type = 'success') {

    const alert = document.createElement('div');

    alert.className =
        `custom-alert ${type}-alert`;

    alert.innerHTML = `
        <i class="bi ${
        type === 'success'
            ? 'bi-check-circle-fill'
            : 'bi-exclamation-triangle-fill'
    }"></i>

        ${message}
    `;

    document.body.appendChild(alert);

    setTimeout(() => {

        alert.style.opacity = '0';
        alert.style.transform = 'translateX(40px)';

        setTimeout(() => {
            alert.remove();
        }, 300);

    }, 4000);
};
