import './bootstrap';
import * as bootstrap from 'bootstrap';
import Choices from 'choices.js';
window.Choices = Choices; // Это сделает его доступным для вашей функции window.initGlobalChoices
window.bootstrap = bootstrap;

import Alpine from 'alpinejs';
window.Alpine = Alpine;
Alpine.start();

const csrf = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');

// ======= 1. ГЛОБАЛЬНАЯ ИНИЦИАЛИЗАЦИЯ CHOICES.JS =======
// 1. Глобальная функция AJAX-фильтрации
window.sendFilterAjax = function () {
    const filterForm = document.querySelector('.filter-form');
    const productsWrapper = document.getElementById('productsWrapper');

    if (!filterForm || !productsWrapper) return;

    productsWrapper.style.opacity = '0.5';

    const formData = new FormData(filterForm);
    const params = new URLSearchParams(formData).toString();

    fetch(`${filterForm.action}?${params}`, {
        headers: { 'X-Requested-With': 'XMLHttpRequest' }
    })
        .then(response => response.text())
        .then(html => {
            productsWrapper.innerHTML = html;
            productsWrapper.style.opacity = '1';

            // Переинициализируем Choices, чтобы фильтры снова работали
            if (typeof window.initGlobalChoices === 'function') {
                window.initGlobalChoices();
            }
        })
        .catch(error => console.error('Ошибка:', error));
};

// 2. Функция инициализации Choices
window.initGlobalChoices = function () {
    document.querySelectorAll('.js-choice').forEach(element => {
        if (element.dataset.choicesInitialized === 'true') return;
        element.dataset.choicesInitialized = 'true';

        const choice = new Choices(element, {
            searchEnabled: true,
            shouldSort: false,
            itemSelectText: '',
        });

        // Слушаем изменение
        element.addEventListener('change', function () {
            window.sendFilterAjax();
        });
    });
};

// 3. Запуск при загрузке
document.addEventListener('DOMContentLoaded', () => {
    window.initGlobalChoices();
});

// ======= ИСПРАВЛЕНО: НАДЕЖНАЯ ИНИЦИАЛИЗАЦИЯ CKEDITOR =======
window.initRichTextEditors = function () {
    if (typeof ClassicEditor === 'undefined') return;

    document.querySelectorAll('.rich-text').forEach(textarea => {
        // 1. Проверяем текстовый класс-маркер
        if (textarea.classList.contains('ck-editor-init')) return;

        // 2. Железобетонная физическая проверка DOM: если рядом уже лежит созданный CKEditor, выходим
        if (textarea.nextElementSibling && textarea.nextElementSibling.classList.contains('ck-editor')) {
            textarea.classList.add('ck-editor-init');
            return;
        }

        // 3. МГНОВЕННО маркируем элемент ДО асинхронного вызова ClassicEditor.create
        textarea.classList.add('ck-editor-init');

        ClassicEditor
            .create(textarea, {
                placeholder: 'Введіть текст тут...'
            })
            .then(editor => {
                // Доступ к обертке созданного редактора для исправления accessibility (accessibility-валидаторы)
                const editorWrapper = editor.ui.view.element;
                if (editorWrapper) {
                    const voiceLabel = editorWrapper.querySelector('.ck-voice-label');
                    const editable = editorWrapper.querySelector('.ck-editor__editable');

                    if (voiceLabel && editable) {
                        if (!editable.hasAttribute('aria-label')) {
                            editable.setAttribute('aria-label', voiceLabel.textContent || textarea.id || 'Редактор');
                        }
                        // Скрываем служебный voice-label, чтобы он визуально не ломал верстку
                        voiceLabel.style.display = 'none';
                        voiceLabel.style.visibility = 'hidden';
                    }
                }
            })
            .catch(error => {
                // Если произошла ошибка, снимаем маркер, чтобы можно было попробовать инициализировать снова
                textarea.classList.remove('ck-editor-init');
                console.error('Помилка ініціалізації CKEditor:', error);
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
                        const loginModalElement = document.getElementById('loginModal');
                        if (loginModalElement) {
                            const loginModal = bootstrap.Modal.getOrCreateInstance(loginModalElement);
                            loginModal.show();
                        }
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

    // ======= Динамический AJAX-фильтр =======
    const filterForm = document.querySelector('.filter-form');
    const productsWrapper = document.getElementById('productsWrapper');

    if (filterForm && productsWrapper) {
        function sendFilterAjax() {
            productsWrapper.style.transition = 'opacity 0.2s ease';
            productsWrapper.style.opacity = '0.5';

            const formData = new FormData(filterForm);
            const params = new URLSearchParams(formData);

            fetch(`${filterForm.action}?${params.toString()}`, {
                headers: { 'X-Requested-With': 'XMLHttpRequest' }
            })
                .then(res => res.text())
                .then(html => {
                    productsWrapper.innerHTML = html;
                    productsWrapper.style.opacity = '1';
                    if (typeof initAwesomeTooltips === 'function') initAwesomeTooltips();
                    window.initGlobalChoices();
                })
                .catch(err => {
                    console.error('Помилка фільтрації:', err);
                    productsWrapper.style.opacity = '1';
                });
        }

        // 1. Единый обработчик изменений в форме
        filterForm.addEventListener('change', function (e) {
            if (e.target.matches('input, select')) {
                sendFilterAjax();
            }
        });

        // 2. Обработка текстового поля с задержкой
        const nameInput = filterForm.querySelector('input[name="name"]');
        if (nameInput) {
            let timeout;
            nameInput.addEventListener('input', function () {
                clearTimeout(timeout);
                timeout = setTimeout(sendFilterAjax, 500);
            });
        }

        // 3. Блокируем стандартную отправку формы
        filterForm.addEventListener('submit', function (e) {
            e.preventDefault();
            sendFilterAjax();
        });
    }
    // ВСЁ! Здесь заканчивается логика фильтра внутри DOMContentLoaded
}); // Эта скобка закрывает DOMContentLoaded

// ======= 3. СИСТЕМНЫЕ ФУНКЦИИ КОРЗИНЫ (ГЛОБАЛЬНЫЕ) =======
window.refreshCart = function () {
    fetch('/cart/state', {
        headers: { 'Accept': 'application/json' }
    })
        .then(res => {
            if (!res.ok) throw new Error('Network response was not ok');
            return res.json();
        })
        .then(data => {
            // Элементы для десктопа и мобильной версии
            const countElements = [
                document.getElementById('cartCountDesktop'),
                document.getElementById('cartCountMobile')
            ];

            const totalElements = [
                document.getElementById('cartTotalDesktop'),
                document.getElementById('cartTotalMobile')
            ];

            // Обновление счетчика товаров
            countElements.forEach(el => {
                if (el) {
                    el.innerText = data.count;
                    // Если товаров 0, скрываем бейдж, если > 0 — показываем
                    el.style.display = (data.count > 0) ? 'inline-block' : 'none';
                }
            });

            // Обновление суммы
            totalElements.forEach(el => {
                if (el) {
                    // Форматируем сумму как "1 000"
                    el.innerText = new Intl.NumberFormat('uk-UA').format(data.total);
                }
            });
        })
        .catch(err => console.error('Ошибка обновления корзины:', err));
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

    cartTable.addEventListener('input', function (e) {
        if (e.target.classList.contains('qty')) {
            updateServer(e.target.closest('tr'));
        }
    });

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
            if (typeof window.showAlert === 'function') window.showAlert('Статус успешно оновлено!', 'success');

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

document.addEventListener('hide.bs.modal', function (event) {
    const closingModal = event.target;
    if (document.activeElement && closingModal.contains(document.activeElement)) {
        document.activeElement.blur();
    }
});
// 1. Оголошуємо глобально на самому початку скрипта
// 1. Оголошуємо глобально
window.phoneMaskInstance = null;
document.addEventListener('DOMContentLoaded', function () {
    // Маска для головного поля телефону (якщо є)
    const phoneInput = document.getElementById('phone');
    if (phoneInput) {
        window.phoneMaskInstance = IMask(phoneInput, { mask: '+38 (000) 000-00-00' });
    }

    // Маска для телефону в модальному вікні реєстрації
    const regPhoneInput = document.getElementById('register_phone');
    if (regPhoneInput) {
        window.regPhoneMaskInstance = IMask(regPhoneInput, { mask: '+38 (000) 000-00-00' });
    }
    const profilePhoneInput = document.getElementById('phone');
    if (profilePhoneInput) {
        window.profilePhoneMaskInstance = IMask(profilePhoneInput, {
            mask: '+38 (000) 000-00-00'
        });
    }
});
