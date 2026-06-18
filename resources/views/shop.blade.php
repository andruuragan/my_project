@extends('layouts.main')

@section('content')

   <div class="container-1600 shop-page">
    <div class="title-shop text-center mb-5 mt-3">
         <h1 class="fw-bold text-dark position-relative d-inline-block pb-3 fs-2">

                Каталог елементів димоходу

                <span class="position-absolute bottom-0 start-50 translate-middle-x rounded-pill" style="width: 80px; height: 4px; background-color: #d97706;"></span>

            </h1>
        </div>

    <button class="btn btn-warning d-lg-none mb-3" type="button" data-bs-toggle="offcanvas" data-bs-target="#filterOffcanvas">
        <i class="bi bi-sliders"></i> Фільтр товарів
    </button>

    <div class="row">
        
        <div class="offcanvas offcanvas-start" tabindex="-1" id="filterOffcanvas">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title">Фільтр товарів</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
            </div>
            <div class="offcanvas-body">
                <div class="card p-3 border-0">
                    @include('partials.filter-form')
                </div>
            </div>
        </div>

        <div class="col-xl-2 col-lg-3 mb-4 d-none d-lg-block">
            <div class="card p-3 shadow-sm filter-card">
                 <h5><i class="bi bi-sliders me-2"></i> Фільтр</h5>
                 @include('partials.filter-form')
            </div>
        </div>

        <div class="col-lg-9 products-area">
            <div id="productsWrapper">
                @include('partials.products', ['catalogs' => $catalogs])
            </div>
        </div>
    </div> </div>
           

    {{-- MODAL FOR IMAGE VIEW --}}
    <div class="modal fade" id="imageModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <button type="button"
                        class="btn-close position-absolute top-0 end-0 m-3"
                        style="z-index: 1060;"
                        data-bs-dismiss="modal"
                        aria-label="Close"></button>
                <div class="modal-body text-center p-0">
                    <img id="modalImage" class="img-fluid" style="max-height:85vh;">
                </div>
            </div>
        </div>
    </div>

   <script>
// 1. Анимация полета
function animateFlyToCart(imgElement) {
    const cartBtn = document.querySelector('.cart-btn') || document.getElementById('cartBtnContainer');
    if (!imgElement || !cartBtn) return;

    const imgRect = imgElement.getBoundingClientRect();
    const cartRect = cartBtn.getBoundingClientRect();

    const clone = imgElement.cloneNode(true);
    clone.classList.add('flying-cart-item');
    clone.style.position = 'fixed';
    clone.style.zIndex = '99999';
    clone.style.pointerEvents = 'none';
    clone.style.objectFit = 'contain';
    clone.style.background = '#fff';
    clone.style.borderRadius = '12px';
    clone.style.boxShadow = '0 10px 25px rgba(0,0,0,0.15)';
    clone.style.transition = 'transform 0.8s cubic-bezier(0.25, 1, 0.5, 1), opacity 0.8s ease, width 0.8s ease, height 0.8s ease';
    clone.style.left = `${imgRect.left}px`;
    clone.style.top = `${imgRect.top}px`;
    clone.style.width = `${imgRect.width}px`;
    clone.style.height = `${imgRect.height}px`;

    document.body.appendChild(clone);

    requestAnimationFrame(() => {
        clone.style.transformOrigin = 'left top';
        const mobileOffsetX = window.innerWidth < 992 ? 300 : 0;
        const mobileOffsetY = window.innerWidth < 992 ? 30 : 0;
        const targetX = cartRect.left + 15 + mobileOffsetX;
        const targetY = cartRect.top + (cartRect.height / 2) - 8 + mobileOffsetY;
        clone.style.transform = `translate(${targetX - imgRect.left}px, ${targetY - imgRect.top}px) scale(0.12)`;
        clone.style.opacity = '0.15';
    });

    setTimeout(() => {
        clone.remove();
        cartBtn.style.transform = 'scale(1.15)';
        setTimeout(() => { cartBtn.style.transform = 'none'; }, 150);
    }, 800);
}

// 2. Делегированный клик «КУПИТИ»
document.addEventListener('click', function (e) {
    const buyBtn = e.target.closest('.add-cart-btn');
    if (!buyBtn) return;

    e.preventDefault();
    const card = buyBtn.closest('.product-card');
    if (!card) return;

    const productImg = card.querySelector('.product-image');
    if (productImg) animateFlyToCart(productImg);

    const form = buyBtn.closest('form');
    let url, csrfToken, formData;

    if (form) {
        url = form.action;
        csrfToken = form.querySelector('[name="_token"]')?.value;
        formData = new FormData(form);
    } else {
        const productId = buyBtn.dataset.id;
        url = `/shop/${productId}/add`;
        csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');
        formData = new FormData();
        formData.append('qty', 1);
    }

    if (!csrfToken) return;

    // ИНДИКАЦИЯ ПРОЦЕССА
    buyBtn.classList.add('active-process');
    buyBtn.disabled = true;

    fetch(url, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': csrfToken,
            'Accept': 'application/json',
            'X-Requested-With': 'XMLHttpRequest'
        },
        body: formData
    })
    .then(res => res.ok ? res.json() : null)
   .then(data => {
    buyBtn.classList.remove('active-process');
    buyBtn.disabled = false;
    if (!data) return;

    // 1. Обновляем количество
    const countIds = ['cartCountMobile', 'cartCountDesktop', 'cartCount'];
    countIds.forEach(id => {
        const el = document.getElementById(id);
        if (el && typeof data.count !== 'undefined') el.textContent = data.count;
    });

    // 2. Обновляем сумму (с логикой скрытия если 0)
    const totalIds = ['cartTotalMobile', 'cartTotalDesktop', 'cartTotalNav'];
    totalIds.forEach(id => {
        const el = document.getElementById(id);
        if (el) {
            if (data.count > 0 && typeof data.total !== 'undefined') {
                el.textContent = new Intl.NumberFormat('uk-UA').format(data.total);
                el.style.display = ''; // Показываем элемент
            } else {
                el.textContent = '0'; // Или оставьте пустым, если нужно
                // el.style.display = 'none'; // Раскомментируйте, если нужно полностью скрывать сумму
            }
        }
    });

    // 3. Управление видимостью бейджа с количеством
    const badge = document.getElementById('cartBadgeMobile');
    if (badge) {
        badge.style.display = (data.count > 0) ? 'flex' : 'none';
    }

    // 4. Уведомления и анимация
    if (data.success) {
        if (typeof refreshCart === 'function') refreshCart();
        if (typeof showAlert === 'function') showAlert('Додано у кошик', 'success');
        
        const originalContent = buyBtn.innerHTML;
        buyBtn.innerHTML = '<i class="bi bi-check-lg"></i> Додано!';
        buyBtn.classList.add('btn-success-animated');
        
        setTimeout(() => { 
            buyBtn.innerHTML = originalContent; 
            buyBtn.classList.remove('btn-success-animated'); 
        }, 1500);
    }
})
    .catch(err => {
        buyBtn.classList.remove('active-process');
        buyBtn.disabled = false;
        console.error('Помилка:', err);
    });
});

// 3. Остальные обработчики (DOMContent...)
document.addEventListener('DOMContentLoaded', function () {
    const modalEl = document.getElementById('imageModal');
    let modalInstance = null;
    if (modalEl && typeof bootstrap !== 'undefined') {
        modalInstance = bootstrap.Modal.getOrCreateInstance(modalEl);
    }
    document.addEventListener('click', function (e) {
        const btn = e.target.closest('.open-image');
        if (!btn) return;
        const modalImage = document.getElementById('modalImage');
        if (modalImage) {
            modalImage.src = btn.dataset.image;
            if (modalInstance) modalInstance.show();
        }
    });
});

document.addEventListener('submit', function (e) {
    if (e.target.matches('.filter-form')) {
        e.preventDefault();
        console.log('Форма отправлена, запускаю AJAX...'); // ДОБАВЬТЕ ЭТО
        
        window.sendFilterAjax(); 
        
        const offcanvasEl = document.getElementById('filterOffcanvas');
        if (offcanvasEl) {
            const bsOffcanvas = bootstrap.Offcanvas.getInstance(offcanvasEl);
            if (bsOffcanvas) bsOffcanvas.hide();
        }
    }
});

</script>

@endsection

@push('styles')
    <style>
        /* Скрытие оригинальных селекторов */
        select.js-choice {
            position: absolute !important;
            clip: rect(1px, 1px, 1px, 1px);
            padding: 0 !important;
            border: 0 !important;
            height: 1px !important;
            width: 1px !important;
            overflow: hidden;
            opacity: 0 !important;
        }
    </style>
@endpush