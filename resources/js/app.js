import * as bootstrap from 'bootstrap';
window.bootstrap = bootstrap;

document.addEventListener('DOMContentLoaded', function () {

    /* =========================
       IMAGE MODAL
    ========================= */
    const modalEl = document.getElementById('imageModal');
    const modalImage = document.getElementById('modalImage');

    if (modalEl && modalImage) {

        const modal = bootstrap.Modal.getOrCreateInstance(modalEl);

        document.addEventListener('click', function (e) {
            const btn = e.target.closest('.open-image');
            if (!btn) return;

            modalImage.src = btn.dataset.image || '';
            modal.show();
        });

        modalEl.addEventListener('hidden.bs.modal', function () {
            modalImage.src = '';
        });
    }


    /* =========================
       PRICE / QUANTITY
    ========================= */
    document.querySelectorAll('.product-card').forEach(card => {

        const minusBtn = card.querySelector('.minus');
        const plusBtn = card.querySelector('.plus');
        const qtyInput = card.querySelector('.qty-value');

        const priceEl = card.querySelector('.item-price');
        const totalEl = card.querySelector('.total-sum');

        if (!minusBtn || !plusBtn || !qtyInput || !priceEl || !totalEl) return;

        const basePrice = Number(priceEl.dataset.price || 0);

        function updateTotal() {
            let qty = parseInt(qtyInput.value);
            if (!qty || qty < 1) qty = 1;

            qtyInput.value = qty;

            const total = basePrice * qty;
            totalEl.textContent = new Intl.NumberFormat('uk-UA').format(total);
        }

        plusBtn.addEventListener('click', () => {
            qtyInput.value = (parseInt(qtyInput.value) || 1) + 1;
            updateTotal();
        });

        minusBtn.addEventListener('click', () => {
            let qty = parseInt(qtyInput.value) || 1;
            if (qty > 1) qtyInput.value = qty - 1;
            updateTotal();
        });

        qtyInput.addEventListener('input', updateTotal);

        updateTotal();
    });

});

