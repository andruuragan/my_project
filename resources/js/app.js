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
window.sendFilterAjax = function () {
    const filterForm = document.querySelector('.filter-form');
    const productsWrapper = document.getElementById('productsWrapper');
    if (!filterForm || !productsWrapper) return;

    productsWrapper.style.transition = 'opacity 0.2s ease';
    productsWrapper.style.opacity = '0.5';

    const params = new URLSearchParams(new FormData(filterForm)).toString();
    fetch(`${filterForm.action || window.location.href}?${params}`, {
        headers: { 'X-Requested-With': 'XMLHttpRequest', 'Accept': 'text/html' }
    })
        .then(res => res.text())
        .then(html => {
            productsWrapper.innerHTML = html;
            productsWrapper.style.opacity = '1';
            if (window.Choices) {
                document.querySelectorAll('.js-choice').forEach(el => {
                    if (el.choicesInstance) el.choicesInstance.destroy();
                });
            }
            if (typeof window.initGlobalChoices === 'function') window.initGlobalChoices();
            if (typeof window.initAwesomeTooltips === 'function') window.initAwesomeTooltips();
        });
};

window.initGlobalChoices = function () {
    document.querySelectorAll('.js-choice').forEach(element => {
        if (element.classList.contains('choices__input')) return;
        element.choicesInstance = new Choices(element, { searchEnabled: true, shouldSort: false, itemSelectText: '' });
        element.addEventListener('change', () => window.sendFilterAjax());
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
    window.initGlobalChoices();
    window.initRichTextEditors();

    const filterForm = document.querySelector('.filter-form');
    if (filterForm) {
        filterForm.addEventListener('change', (e) => { if (e.target.matches('input, select')) window.sendFilterAjax(); });
        filterForm.addEventListener('submit', (e) => { e.preventDefault(); window.sendFilterAjax(); });
    }

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