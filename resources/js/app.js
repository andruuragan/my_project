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
window.choicesInstances = window.choicesInstances || [];

window.initGlobalChoices = function () {

    document.querySelectorAll('.js-choice').forEach(element => {

        // уже инициализирован
        if (element.dataset.choicesInitialized === 'true') return;

        // защита от повторного DOM wrap
        if (element.closest('.choices')) return;

        try {
            const choice = new Choices(element, {
                searchEnabled: true,
                shouldSort: false,
                itemSelectText: ''
            });

            window.choicesInstances.push(choice);
            element.dataset.choicesInitialized = 'true';

        } catch (e) {
            console.warn('Choices error:', e);
        }
    });
};
window.sendFilterAjax = function (form) {

    const productsWrapper = document.getElementById('productsWrapper');
    if (!form || !productsWrapper) return;

    productsWrapper.style.opacity = '0.5';

    const formData = new FormData(form);
    const params = new URLSearchParams(formData).toString();

    fetch(`${form.action}?${params}`, {
        headers: {
            'X-Requested-With': 'XMLHttpRequest',
            'Accept': 'application/json'
        }
    })
        .then(res => res.json())
        .then(data => {

            if (!data || !data.html) return;

            productsWrapper.innerHTML = data.html;
            productsWrapper.style.opacity = '1';

            // total
            const totalEl = document.getElementById('productsTotal');
            if (totalEl) {
                totalEl.textContent = data.total ?? 0;
            }

            // reinit UI
            window.initGlobalChoices();
        })
        .catch(err => {
            console.error('Filter error:', err);
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

    // =============================================
    const cards = document.querySelectorAll(
        '.technology-card, .project-card, .solution-card, .value-card, .gallery-item, .workflow-card, .workfup-card, .useful-fade'
    );

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('show');
                observer.unobserve(entry.target);
            }
        });
    }, {
        threshold: 0.15
    });

    cards.forEach(card => observer.observe(card));



// =============================================

    
    window.initGlobalChoices();
    
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
    document.addEventListener('click', function (e) {

        const wishlistBtn = e.target.closest('.wishlist-btn');

        if (!wishlistBtn) return;

        const catalogId = wishlistBtn.dataset.id;

        fetch(`/wishlist/toggle/${catalogId}`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': csrf,
                'Content-Type': 'application/json',
                'Accept': 'application/json'
            }
        })
            .then(response => {

                if (response.status === 401) {

                    const loginModal = document.getElementById('loginModal');

                    if (loginModal) {
                        bootstrap.Modal.getOrCreateInstance(loginModal).show();
                    }

                    return null;
                }

                return response.json();
            })
            .then(data => {

                if (!data || !data.success) return;

                const icon = wishlistBtn.querySelector('i');

                if (data.is_liked) {
                    icon.className = 'bi bi-heart-fill text-danger';
                } else {
                    icon.className = 'bi bi-heart text-muted';
                }

            })
            .catch(console.error);

    });



   
    // Список товаров для сравнения
    // Список товаров для сравнения
    let compareList = JSON.parse(localStorage.getItem('compareList') || '[]')
        .map(String); // 👈 важно: всегда строки

    window.saveCompareList = function () {
        localStorage.setItem('compareList', JSON.stringify(compareList));
    }

    window.syncCompareButtons = function () {
        const btn = document.getElementById('compareFloatingBtn');
        const count = document.getElementById('compareCount');

        if (!btn || !count) return;

        count.textContent = compareList.length;

        // показываем только если есть хотя бы 1 товар
        btn.classList.toggle('is-hidden', compareList.length === 0);
    }

    window.updateCompareButton = function () {
        const scalesIcon = `
 <svg xmlns="http://www.w3.org/2000/svg"
         width="18"
         height="18"
         viewBox="0 0 24 24"
         fill="none"
         stroke="currentColor"
         stroke-width="2"
         stroke-linecap="round"
         stroke-linejoin="round">
      <path d="m16 16 3-8 3 8c0 1.7-1.3 3-3 3s-3-1.3-3-3Z"/>
      <path d="m2 16 3-8 3 8c0 1.7-1.3 3-3 3s-3-1.3-3-3Z"/>
      <path d="M7 21h10"/>
      <path d="M12 3v18"/>
      <path d="M3 7h18"/>
      <path d="M16 7a4 4 0 0 0-8 0"/>
    </svg>`;

        document.querySelectorAll('.compare-btn').forEach(btn => {
            const id = String(btn.dataset.id || '');

            const active = compareList.includes(id);

            btn.classList.toggle('active', active);

            btn.innerHTML = active
                ? '<i class="bi bi-check-lg text-success"></i>'
                : scalesIcon;
        });
    }

    // один обработчик
    document.addEventListener('click', function (e) {
        const btn = e.target.closest('.compare-btn');
        if (!btn) return;

        const id = String(btn.dataset.id || '');
        if (!id) return;

        const index = compareList.indexOf(id);

        // 1. УДАЛЕНИЕ (ВСЕГДА РАЗРЕШЕНО)
        if (index !== -1) {
            compareList.splice(index, 1);
            window.saveCompareList();
            window.updateCompareButton();
            window.syncCompareButtons();
            return;
        }

        // 2. ДОБАВЛЕНИЕ С ЛИМИТОМ
        if (compareList.length >= 4) {
            alert('Можна порівнювати максимум 4 товари');
            return;
        }

        compareList.push(id);

        window.saveCompareList();
        window.updateCompareButton();
        window.syncCompareButtons();
    });
  

    // init при загрузке
    window.updateCompareButton();
    window.syncCompareButtons();
    document.getElementById('compareFloatingBtn')?.addEventListener('click', function () {
        if (compareList.length < 2) {
            alert('Потрібно мінімум 2 товари для порівняння');
            return;
        }

        window.location.href = '/compare?ids=' + compareList.join(',');
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

        const mask = IMask(input, {
            mask: '+38 (000) 000-00-00',
            lazy: true
        });

        input.addEventListener('focus', () => {
            if (!input.value) {
                mask.updateOptions({ lazy: false });
            }
        });

        input.addEventListener('blur', () => {
            if (!input.value) {
                mask.updateOptions({ lazy: true });
            }
        });

        if (input.id === 'register_phone') {
            window.regPhoneMaskInstance = mask;
        }
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
