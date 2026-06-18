import './bootstrap';
import * as bootstrap from 'bootstrap';
import Choices from 'choices.js';
import Alpine from 'alpinejs';
import IMask from 'imask';

window.Choices = Choices;
window.bootstrap = bootstrap;
window.Alpine = Alpine;
Alpine.start();

const csrf = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');

// --- ГЛОБАЛЬНЫЕ ФУНКЦИИ ---
window.sendFilterAjax = function (form) {
    const productsWrapper = document.getElementById('productsWrapper');
    if (!form || !productsWrapper) return;

    productsWrapper.style.opacity = '0.5';

    const params = new URLSearchParams(new FormData(form)).toString();

    fetch(`${form.action}?${params}`, {
        headers: {
            'X-Requested-With': 'XMLHttpRequest',
            'Accept': 'text/html'
        }
    })
        .then(res => res.text())
        .then(html => {
            productsWrapper.innerHTML = html;
            productsWrapper.style.opacity = '1';
        });
};



window.initRichTextEditors = function () {
    if (typeof ClassicEditor === 'undefined') return;
    document.querySelectorAll('.rich-text:not(.ck-editor-init)').forEach(textarea => {
        textarea.classList.add('ck-editor-init');
        ClassicEditor.create(textarea).catch(console.error);
    });
};

window.refreshCart = function () {
    fetch('/cart/state', { headers: { 'Accept': 'application/json' } })
        .then(res => res.json())
        .then(data => {
            document.querySelectorAll('[id^="cartCount"]').forEach(el => { el.innerText = data.count; el.style.display = data.count > 0 ? 'inline-block' : 'none'; });
            document.querySelectorAll('[id^="cartTotal"]').forEach(el => { el.innerText = new Intl.NumberFormat('uk-UA').format(data.total); });
        });
};

// --- ЕДИНЫЙ ЗАПУСК ---
document.addEventListener('DOMContentLoaded', () => {

    document.addEventListener('click', function (e) {

        const plus = e.target.closest('.plus');
        const minus = e.target.closest('.minus');

        if (!plus && !minus) return;

        const card = e.target.closest('.product-card');
        if (!card) return;

        const input = card.querySelector('.qty-input');
        if (!input) return;

        let qty = parseInt(input.value) || 1;

        if (plus) qty++;
        if (minus && qty > 1) qty--;

        input.value = qty;

        const priceEl = card.querySelector('.item-price');
        const totalEl = card.querySelector('.total-sum');
        const totalWrap = card.querySelector('.total-price-box');

        if (priceEl && totalEl) {
            const total = qty * Number(priceEl.dataset.price);
            totalEl.textContent = total.toLocaleString('uk-UA');

            if (totalWrap) {
                totalWrap.style.opacity = qty > 1 ? '1' : '0';
            }
        }
    });
    const cartTable = document.querySelector('table.table');

    if (cartTable) {

        cartTable.addEventListener('click', function (e) {

            const plus = e.target.closest('.plus');
            const minus = e.target.closest('.minus');

            if (plus || minus) {

                const row = e.target.closest('tr[data-id]');
                const input = row.querySelector('.qty');

                let qty = parseInt(input.value) || 1;

                if (plus) qty++;
                if (minus && qty > 1) qty--;

                input.value = qty;

                fetch(`/cart/update/${row.dataset.id}`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrf,
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify({ qty })
                })
                    .then(res => res.json())
                    .then(() => location.reload());

                return;
            }

        });

    }
    const clearBtn = document.getElementById('clearCartBtn');

    if (clearBtn) {

        clearBtn.addEventListener('click', function (e) {

            e.preventDefault();

            if (!confirm('Очистити весь кошик?')) {
                return;
            }

            fetch('/cart/clear', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': csrf,
                    'Accept': 'application/json'
                }
            })
                .then(() => location.reload())
                .catch(err => console.error(err));

        });

    }
    document.addEventListener('click', function (e) {

        const btn = e.target.closest('.delete-btn');

        if (!btn) return;

        if (!confirm('Видалити товар із кошика?')) {
            return;
        }

        fetch(`/cart/remove/${btn.dataset.id}`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': csrf,
                'Accept': 'application/json'
            }
        })
            .then(() => location.reload())
            .catch(err => console.error(err));

    });
    //window.initGlobalChoices();
    window.initRichTextEditors();

    document.querySelectorAll('.filter-form').forEach(form => {

        form.addEventListener('change', (e) => {
            if (e.target.matches('input, select')) {
                window.sendFilterAjax(form);
            }
        });

        form.addEventListener('submit', (e) => {
            e.preventDefault();
            window.sendFilterAjax(form);
        });

    });

    const phoneInputs = document.querySelectorAll('#phone, #register_phone');
    phoneInputs.forEach(input => {
        IMask(input, { mask: '+38 (000) 000-00-00' });
    });
});

// --- АДМИН-ФУНКЦИИ ---
window.showAlert = function (message, type = 'success') {
    const alert = document.createElement('div');
    alert.className = `custom-alert ${type}-alert`;
    alert.innerHTML = `<i class="bi ${type === 'success' ? 'bi-check-circle-fill' : 'bi-exclamation-triangle-fill'}"></i> ${message}`;
    document.body.appendChild(alert);
    setTimeout(() => { alert.style.opacity = '0'; setTimeout(() => alert.remove(), 300); }, 4000);
};

window.changeOrderStatus = function (selectElement, url) {
    const status = selectElement.value;
    selectElement.disabled = true;
    fetch(url, {
        method: 'POST',
        headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'), 'X-HTTP-Method-Override': 'PATCH' },
        body: JSON.stringify({ status })
    })
        .then(res => res.json())
        .then(() => { selectElement.disabled = false; window.showAlert('Статус оновлено!', 'success'); })
        .catch(() => { selectElement.disabled = false; window.showAlert('Помилка', 'error'); });
};

window.deleteOrder = function (buttonElement, url) {
    if (!confirm('Видалити?')) return;
    fetch(url, {
        method: 'POST',
        headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'), 'X-HTTP-Method-Override': 'DELETE' }
    })
        .then(() => {
            const row = buttonElement.closest('tr');
            if (row) row.remove();
        });
};