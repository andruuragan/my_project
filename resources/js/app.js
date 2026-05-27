import './bootstrap';
import * as bootstrap from 'bootstrap';
window.bootstrap = bootstrap;

import Alpine from 'alpinejs';
window.Alpine = Alpine;
Alpine.start();

const csrf = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');

// ======= 1. ГЛОБАЛЬНАЯ ИНИЦИАЛИЗАЦИЯ CHOICES.JS =======
window.initGlobalChoices = function () {
    if (typeof Choices === 'undefined') return;

    document.querySelectorAll('.js-choice').forEach(element => {
        if (element.classList.contains('choices__input') ||
            element.closest('.choices') ||
            element.dataset.choicesInitialized === 'true' ||
            element.hasAttribute('data-choices-initialized')) {
            return;
        }

        element.setAttribute('data-choices-initialized', 'true');
        element.dataset.choicesInitialized = 'true';

        new Choices(element, {
            searchEnabled: true,
            shouldSort: false,
            itemSelectText: '',
            callbackOnInit: function () {
                const container = this.containerOuter.element;
                if (!container) return;
                const clonedInput = container.querySelector('.choices__input--cloned');
                if (clonedInput) {
                    const originalId = element.id || 'choices';
                    clonedInput.setAttribute('id', `${originalId}_search`);
                    clonedInput.setAttribute('name', `${originalId}_search_name`);
                    // Исправление доступности: добавляем скрытый aria-label для роботов-валидаторов
                    clonedInput.setAttribute('aria-label', 'Пошук варіантів');
                }
            }
        });
    });

    document.querySelectorAll('.choices__input--cloned').forEach((input, index) => {
        if (!input.hasAttribute('id') || input.getAttribute('id') === '') {
            input.setAttribute('id', `choices_search_fallback_${index}`);
        }
        if (!input.hasAttribute('name') || input.getAttribute('name') === '') {
            input.setAttribute('name', `choices_name_fallback_${index}`);
        }
        if (!input.hasAttribute('aria-label')) {
            input.setAttribute('aria-label', 'Пошук');
        }
    });
};

// ======= NEW: ИНИЦИАЛИЗАЦИЯ CKEDITOR С ИСПРАВЛЕНИЕМ ЛЕЙБЛОВ =======
window.initRichTextEditors = function () {
    if (typeof ClassicEditor === 'undefined') return;

    document.querySelectorAll('.rich-text').forEach(textarea => {
        // Проверяем, не инициализирован ли редактор ранее
        if (textarea.dataset.editorInitialized === 'true') return;
        textarea.setAttribute('data-editorInitialized', 'true');

        ClassicEditor
            .create(textarea, {
                placeholder: 'Введіть текст тут...'
            })
            .then(editor => {
                const editableElement = editor.ui.view.editable.element;
                // Привязываем внутренний voice-label редактора к ID оригинального textarea
                if (editableElement && textarea.id) {
                    editableElement.setAttribute('aria-label', textarea.id);
                }
            })
            .catch(error => {
                console.error('Помилка инициалізації CKEditor:', error);
            });
    });
};

// ======= 2. ОБЩИЕ СКРИПТЫ ДОКУМЕНТА =======
document.addEventListener('DOMContentLoaded', function () {
    window.initGlobalChoices();
    window.initRichTextEditors(); // Запускаем наши текстовые редакторы

    // Управление количеством в карточках товаров
    function updateCard(card) {
        const input = card.querySelector('.qty-input');
        const priceEl = card.querySelector('.item-price');
        const totalWrap = card.querySelector('.total-price-box');
        const totalEl = card.querySelector('.total-sum');

        if (!input || !priceEl || !totalEl) return;

        const basePrice = Number(priceEl.dataset.price || 0);
        let qty = Math.max(1, Number(input.value) || 1);
        input.value = qty;

        const total = basePrice * qty;
        totalEl.textContent = total.toLocaleString('uk-UA');

        if (totalWrap) {
            totalWrap.style.opacity = qty > 1 ? '1' : '0';
        }
    }

    // Централизованное делегирование кликов (Плюс, Минус, Тултипы, Лайки)
    document.addEventListener('click', function (e) {
        const target = e.target;

        // Скрытие тултипа при клике "В корзину"
        const cartBtn = target.closest('.add-cart-btn');
        if (cartBtn && typeof bootstrap !== 'undefined') {
            const tooltipInstance = bootstrap.Tooltip.getInstance(cartBtn);
            if (tooltipInstance) tooltipInstance.hide();
        }

        // Кнопки Плюс и Минус в каталоге
        const plus = target.closest('.plus');
        const minus = target.closest('.minus');

        if (plus || minus) {
            const card = target.closest('.product-card');
            if (!card) return;

            const input = card.querySelector('.qty-input');
            if (!input) return;

            let currentQty = parseInt(input.value) || 1;

            if (plus) currentQty++;
            if (minus && currentQty > 1) currentQty--;

            input.value = currentQty;
            updateCard(card);
            return;
        }

        // Логика Избранного (Лайки)
        if (target.closest('.guest-wishlist-btn')) return;
        const wishlistBtn = target.closest('.wishlist-btn');
        if (wishlistBtn) {
            const catalogId = wishlistBtn.dataset.id;

            fetch(`/wishlist/toggle/${catalogId}`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': csrf || document.querySelector('meta[name="csrf-token"]')?.getAttribute('content'),
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                }
            })
                .then(response => {
                    if (response.status === 401 && typeof bootstrap !== 'undefined') {
                        const loginModal = new bootstrap.Modal(document.getElementById('loginModal'));
                        loginModal.show();
                        return;
                    }
                    return response.json();
                })
                .then(data => {
                    if (data && data.success) {
                        const icon = wishlistBtn.querySelector('i');
                        if (data.is_liked) {
                            icon.className = 'bi bi-heart-fill text-danger';
                        } else {
                            icon.className = 'bi bi-heart text-muted';
                        }
                    }
                })
                .catch(error => console.error('Error:', error));
        }
    });

    // Ручной ввод количества в каталоге
    document.addEventListener('input', function (e) {
        if (!e.target.classList.contains('qty-input')) return;
        const card = e.target.closest('.product-card');
        if (!card) return;

        updateCard(card);
    });

    // Динамический AJAX-фильтр
    const filterForm = document.querySelector('.filter-form');
    const productsWrapper = document.getElementById('productsWrapper');

    if (filterForm && productsWrapper) {
        function sendFilterAjax() {
            productsWrapper.style.transition = 'opacity 0.2s ease';
            productsWrapper.style.opacity = '0.5';

            const formData = new FormData(filterForm);
            const params = new URLSearchParams(formData);

            fetch(`/dymohody-ta-komplektuyuchi?${params.toString()}`, {
                headers: { 'X-Requested-With': 'XMLHttpRequest' }
            })
                .then(res => res.text())
                .then(html => {
                    productsWrapper.innerHTML = html;
                    productsWrapper.style.opacity = '1';

                    if (typeof initAwesomeTooltips === 'function') {
                        initAwesomeTooltips();
                    }
                })
                .catch(err => {
                    console.error('Помилка фільтрації:', err);
                    productsWrapper.style.opacity = '1';
                });
        }

        filterForm.querySelectorAll('select, input').forEach(element => {
            element.addEventListener('change', sendFilterAjax);
        });

        const nameInput = filterForm.querySelector('input[name="name"]');
        if (nameInput) {
            let timeout;
            nameInput.addEventListener('input', function () {
                clearTimeout(timeout);
                timeout = setTimeout(sendFilterAjax, 500);
            });
        }

        filterForm.addEventListener('submit', function (e) {
            e.preventDefault();
            sendFilterAjax();
        });
    }
});

// ======= 3. СИСТЕМНЫЕ ФУНКЦИИ КОРЗИНЫ (ГЛОБАЛЬНЫЕ) =======
window.refreshCart = function () {
    fetch('/cart/state')
        .then(res => res.json())
        .then(data => {
            const countEl = document.getElementById('cartCount');
            const totalEl = document.getElementById('cartTotalNav');

            if (countEl) {
                countEl.innerText = data.count;
                countEl.style.display = data.count === 0 ? 'none' : 'inline-block';
            }
            if (totalEl) {
                totalEl.innerText = new Intl.NumberFormat('uk-UA').format(data.total);
            }
        })
        .catch(err => console.error('Помилка оновлення кошика:', err));
};

// ======= 4. ЛОГИКА СТРАНИЦЫ КОРЗИНЫ (ТАБЛИЦА) =======
document.addEventListener('DOMContentLoaded', function () {
    const cartTable = document.querySelector('table.table');
    if (!cartTable) return;

    function parsePrice(text) {
        return parseFloat(text.replace(/\s/g, '').replace('грн.', '')) || 0;
    }

    function format(n) {
        return new Intl.NumberFormat('uk-UA').format(n);
    }

    function recalcRow(row) {
        let qty = parseInt(row.querySelector('.qty').value) || 1;
        let price = parsePrice(row.querySelector('.price-cell').innerText);
        row.querySelector('.item-sum').innerText = format(qty * price) + ' грн.';
    }

    function recalcTotal() {
        let total = 0;
        document.querySelectorAll('tr[data-id]').forEach(row => {
            let qty = parseInt(row.querySelector('.qty').value) || 1;
            let price = parsePrice(row.querySelector('.price-cell').innerText);
            total += qty * price;
        });
        const totalEl = document.getElementById('cartTotal');
        if (totalEl) totalEl.innerText = format(total);
    }

    function updateServer(row) {
        let id = row.dataset.id;
        let qty = row.querySelector('.qty').value;

        fetch(`/cart/update/${id}`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrf || document.querySelector('meta[name="csrf-token"]')?.getAttribute('content'),
                'Accept': 'application/json'
            },
            body: JSON.stringify({ qty })
        })
            .then(res => res.json())
            .then(() => {
                recalcRow(row);
                recalcTotal();
                window.refreshCart();
            });
    }

    // Клики внутри корзины (Плюс / Минус / Удаление)
    cartTable.addEventListener('click', function (e) {
        const plus = e.target.closest('.plus');
        const minus = e.target.closest('.minus');
        const delBtn = e.target.closest('.delete-btn');

        if (plus) {
            let row = plus.closest('tr');
            let input = row.querySelector('.qty');
            input.value = parseInt(input.value) + 1;
            updateServer(row);
        }

        if (minus) {
            let row = minus.closest('tr');
            let input = row.querySelector('.qty');
            if (parseInt(input.value) > 1) {
                input.value = parseInt(input.value) - 1;
                updateServer(row);
            }
        }

        if (delBtn) {
            if (!confirm('Видалити товар?')) return;
            let id = delBtn.dataset.id;
            let row = delBtn.closest('tr');

            fetch(`/cart/remove/${id}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': csrf || document.querySelector('meta[name="csrf-token"]')?.getAttribute('content'),
                    'Accept': 'application/json'
                }
            })
                .then(res => res.json())
                .then(() => {
                    row.remove();
                    recalcTotal();
                    window.refreshCart();
                });
        }
    });

    // Ручной ввод количества в корзине
    cartTable.addEventListener('input', function (e) {
        if (e.target.classList.contains('qty')) {
            updateServer(e.target.closest('tr'));
        }
    });

    // Очистка корзины целиком
    const clearBtn = document.querySelector('#clearCartBtn');
    if (clearBtn) {
        clearBtn.addEventListener('click', function (e) {
            e.preventDefault();
            if (!confirm('Очистити кошик?')) return;

            fetch('/cart/clear', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': csrf || document.querySelector('meta[name="csrf-token"]')?.getAttribute('content'),
                    'Accept': 'application/json'
                }
            })
                .then(res => res.json())
                .then(() => {
                    document.querySelectorAll('tr[data-id]').forEach(r => r.remove());
                    const totalEl = document.getElementById('cartTotal');
                    if (totalEl) totalEl.innerText = '0';
                    window.refreshCart();
                });
        });
    }
});

// ======= 5. АДМИН-ФУНКЦИИ И УВЕДОМЛЕНИЯ =======
window.showAlert = function (message, type = 'success') {
    const alert = document.createElement('div');
    alert.className = `custom-alert ${type}-alert`;
    alert.innerHTML = `
        <i class="bi ${type === 'success' ? 'bi-check-circle-fill' : 'bi-exclamation-triangle-fill'}"></i>
        ${message}
    `;
    document.body.appendChild(alert);

    setTimeout(() => {
        alert.style.opacity = '0';
        alert.style.transform = 'translateX(40px)';
        setTimeout(() => { alert.remove(); }, 300);
    }, 4000);
};

window.changeOrderStatus = function (selectElement, url) {
    const status = selectElement.value;
    selectElement.disabled = true;

    fetch(url, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            'X-HTTP-Method-Override': 'PATCH',
            'Accept': 'application/json'
        },
        body: JSON.stringify({ status: status })
    })
        .then(response => {
            if (!response.ok) throw new Error('Помилка сервера');
            return response.json();
        })
        .then(data => {
            selectElement.disabled = false;
            if (typeof window.showAlert === 'function') window.showAlert('Статус успішно оновлено!', 'success');

            const row = selectElement.closest('tr');
            if (row) {
                const badgeCell = row.querySelector('.status-badge-cell');
                if (badgeCell) {
                    const badges = {
                        pending: '<span class="badge bg-warning text-dark">Очікує</span>',
                        paid: '<span class="badge bg-success">Сплачено</span>',
                        processing: '<span class="badge bg-primary">Обробка</span>',
                        shipped: '<span class="badge bg-info text-dark">Відправлено</span>',
                        completed: '<span class="badge bg-dark">Завершено</span>',
                        cancelled: '<span class="badge bg-danger">Скасовано</span>'
                    };
                    badgeCell.innerHTML = badges[status] || `<span class="badge bg-secondary">${status}</span>`;
                }
            }
        })
        .catch(error => {
            selectElement.disabled = false;
            if (typeof window.showAlert === 'function') window.showAlert('Не вдалося оновити статус', 'error');
        });
};

window.deleteOrder = function (buttonElement, url) {
    if (!confirm('Ви впевнені, що хочете видалити цей замовлення?')) return;
    buttonElement.disabled = true;

    fetch(url, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            'X-HTTP-Method-Override': 'DELETE',
            'Accept': 'application/json'
        }
    })
        .then(response => {
            if (!response.ok) throw new Error('Помилка сервера');
            return response.json();
        })
        .then(data => {
            if (typeof window.showAlert === 'function') window.showAlert(data.message || 'Замовлення видалено', 'success');

            const row = buttonElement.closest('tr');
            if (row) {
                row.style.transition = 'all 0.3s ease';
                row.style.opacity = '0';
                row.style.transform = 'scale(0.95)';
                setTimeout(() => {
                    row.remove();
                    const tbody = document.querySelector('table.table tbody');
                    if (tbody && tbody.children.length === 0) location.reload();
                }, 300);
            }
        })
        .catch(error => {
            buttonElement.disabled = false;
            if (typeof window.showAlert === 'function') window.showAlert('Не вдалося видалити замовлення', 'error');
        });
};