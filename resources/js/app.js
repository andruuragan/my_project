import './bootstrap';

import * as bootstrap from 'bootstrap';
window.bootstrap = bootstrap;
import Alpine from 'alpinejs';

window.Alpine = Alpine;
Alpine.start();
const csrf = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
document.addEventListener('DOMContentLoaded', function () {

    // ✅ функция должна быть отдельно
    function updateCard(card) {

        const input = card.querySelector('.qty-value');
        const priceEl = card.querySelector('.item-price');
        const totalWrap = card.querySelector('.total-price');
        const totalEl = card.querySelector('.total-sum');

        if (!input || !priceEl || !totalEl) return;

        const basePrice = Number(priceEl.dataset.price || 0);

        let qty = Math.max(1, Number(input.value) || 1);

        input.value = qty;

        const total = basePrice * qty;

        totalEl.textContent = total.toLocaleString('uk-UA');

        if (totalWrap) {
            totalWrap.classList.toggle('show', qty > 1);
        }
    }

    // ➕➖ работает даже после фильтра
    document.addEventListener('click', function (e) {

        const plus = e.target.closest('.plus');
        const minus = e.target.closest('.minus');

        if (!plus && !minus) return;

        const card = e.target.closest('.product-card');
        if (!card) return;

        const input = card.querySelector('.qty-value');
        if (!input) return;

        if (plus) {
            input.value = (parseInt(input.value) || 1) + 1;
        }

        if (minus) {
            input.value = Math.max(1, (parseInt(input.value) || 1) - 1);
        }

        updateCard(card);
    });

    // ручной ввод
    document.addEventListener('input', function (e) {

        if (!e.target.classList.contains('qty-value')) return;

        const card = e.target.closest('.product-card');
        if (!card) return;

        updateCard(card);
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
                // Вместо класса .hidden (если он не скрывает элемент),
                // можно управлять стилем напрямую, либо оставь как было, если .hidden настроен в CSS
                countEl.style.display = data.count === 0 ? 'none' : 'inline-block';
            }

            if (totalEl) {
                // Форматируем только чистое число, без дописок "грн."
                totalEl.innerText = new Intl.NumberFormat('uk-UA').format(data.total);
            }
        })
        .catch(err => console.error('Помилка оновлення кошика:', err));
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
document.addEventListener('DOMContentLoaded', function () {

    const filterForm = document.querySelector('.filter-form');

    if (!filterForm) return;

    filterForm.addEventListener('submit', function (e) {

        e.preventDefault();

        const formData = new FormData(filterForm);

        const params = new URLSearchParams(formData);

        fetch(`/dymohody-ta-komplektuyuchi?${params.toString()}`, {
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
            .then(res => res.text())
            .then(html => {

                document.getElementById('productsWrapper').innerHTML = html;

                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            });
    });

});
// Функция AJAX-смены статуса заказа (чтобы не забивать историю браузера)
window.changeOrderStatus = function(selectElement, url) {
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

            if (typeof window.showAlert === 'function') {
                window.showAlert('Статус успішно оновлено!', 'success');
            }

            // === НАХОДИМ И ОБНОВЛЯЕМ БЕЙДЖ В ТАБЛИЦЕ ===
            const row = selectElement.closest('tr');
            if (row) {
                const badgeCell = row.querySelector('.status-badge-cell');
                if (badgeCell) {
                    // Генерируем новый HTML в зависимости от статуса
                    if (status === 'pending') {
                        badgeCell.innerHTML = '<span class="badge bg-warning text-dark">Ожидает</span>';
                    } else if (status === 'paid') {
                        badgeCell.innerHTML = '<span class="badge bg-success">Оплачен</span>';
                    } else if (status === 'cancelled') {
                        badgeCell.innerHTML = '<span class="badge bg-danger">Отменён</span>';
                    } else {
                        badgeCell.innerHTML = `<span class="badge bg-secondary">${status}</span>`;
                    }
                }
            }
        })
        .catch(error => {
            selectElement.disabled = false;
            if (typeof window.showAlert === 'function') {
                window.showAlert('Не вдалося оновити статус', 'error');
            }
        });
};
/*function animateFlyToCart(imgElement) {
    const cartBtn = document.getElementById('cartBtnContainer') || document.querySelector('.cart-btn');
    if (!imgElement || !cartBtn) return;

    // 1. Получаем координаты картинки товара на экране
    const imgRect = imgElement.getBoundingClientRect();
    // 2. Получаем координаты кнопки корзины в навбаре
    const cartRect = cartBtn.getBoundingClientRect();

    // 3. Создаем клона картинки
    const clone = imgElement.cloneNode(true);
    clone.classList.add('flying-cart-item');

    // Ставим клона точно поверх оригинальной картинки
    clone.style.left = `${imgRect.left}px`;
    clone.style.top = `${imgRect.top}px`;
    clone.style.width = `${imgRect.width}px`;
    clone.style.height = `${imgRect.height}px`;

    document.body.appendChild(clone);

    // 4. Запускаем полет (нужен микро-таймаут, чтобы браузер успел отрисовать клон)
    requestAnimationFrame(() => {
        // Вычисляем точку приземления (центр кнопки корзины)
        const targetX = cartRect.left + (cartRect.width / 2) - (imgRect.width / 4);
        const targetY = cartRect.top + (cartRect.height / 2) - (imgRect.height / 4);

        // Перемещаем клон в корзину, одновременно сжимая его до 20px и делая полупрозрачным
        clone.style.transform = `translate(${targetX - imgRect.left}px, ${targetY - imgRect.top}px) scale(0.15)`;
        clone.style.opacity = '0.4';
    });

    // 5. Когда анимация завершилась (через 800мс), удаляем клона и слегка "встряхиваем" корзину
    setTimeout(() => {
        clone.remove();

        // Эффект микро-удара для корзины (по желанию)
        cartBtn.style.transform = 'scale(1.15)';
        setTimeout(() => {
            cartBtn.style.transform = 'none';
        }, 150);

    }, 800);
}*/
