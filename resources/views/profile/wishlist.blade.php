@extends('layouts.main')

@section('content')
    <div class="container py-4">
        <h3 class="mb-4">❤️ Мої вподобані товари</h3>

        <div id="productsWrapper">
            <div class="row">
                @forelse($catalogs as $catalog)
                    <div class="col-xl-3 col-lg-4 col-md-6 mb-4">
                        <div class="card product-card shadow-sm h-100 border-0 rounded-4 overflow-hidden position-relative">

                            <div class="position-relative product-image-wrapper bg-light d-flex align-items-center justify-content-center" style="height: 220px; overflow: hidden;">
                                <img src="{{ asset($catalog->image) }}"
                                     class="product-image"
                                     alt="{{ $catalog->name }}"
                                     style="max-height: 100%; object-fit: contain; transition: transform 0.3s ease;">

                                <div class="product-icons p-3 d-flex justify-content-between w-100 position-absolute top-0 start-0">
                                    <button type="button"
                                            class="icon-btn wishlist-btn rounded-circle shadow-sm border-0 d-flex align-items-center justify-content-center bg-white"
                                            data-id="{{ $catalog->id }}"
                                            style="width: 36px; height: 36px;">
                                        <i class="bi bi-heart-fill text-danger"></i>
                                    </button>

                                    <div class="right-icons d-flex gap-2">
                                        <button type="button"
                                                class="icon-btn open-image rounded-circle shadow-sm border-0 d-flex align-items-center justify-content-center bg-white"
                                                data-bs-toggle="tooltip"
                                                data-bs-placement="top"
                                                data-bs-custom-class="custom-orange-tooltip"
                                                data-bs-title="Збільшити photo"
                                                style="width: 36px; height: 36px;"
                                                data-image="{{ Storage::url($catalog->image) }}">
                                            <i class="bi bi-search text-muted"></i>
                                        </button>

                                        <a href="{{ route('catalog.public.show', $catalog->id) }}"
                                           class="icon-btn rounded-circle shadow-sm border-0 d-flex align-items-center justify-content-center bg-white"
                                           data-bs-toggle="tooltip"
                                           data-bs-placement="top"
                                           data-bs-custom-class="custom-orange-tooltip"
                                           data-bs-title="Детальніше про товар"
                                           style="width: 36px; height: 36px;">
                                             <i class="bi bi-box-arrow-up-right text-muted"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body d-flex flex-column p-3">
                                <h6 class="product-title fw-semibold text-dark mb-2 line-clamp-2" style="height: 40px; overflow: hidden; line-height: 1.3;">
                                    {{ $catalog->name }}
                                </h6>

                                <div class="my-1" style="height: 1px; background: linear-gradient(to right, rgba(0,0,0,0), rgba(0,0,0,0.1) 20%, rgba(0,0,0,0.1) 80%, rgba(0,0,0,0));"></div>

                                <div class="product-specs small text-uppercase fw-bold text-muted mt-2 mb-3" style="letter-spacing: 0.5px; font-size: 0.72rem;">
                                    Ø{{ $catalog->diameter }} • {{ $catalog->thickness }} • AISI {{ $catalog->grade }}
                                </div>

                                <div class="mt-auto pt-2">
    <div class="d-flex align-items-center mb-1">
        <div class="price-badge px-3 py-1 rounded-3 d-inline-flex align-items-baseline">
            <span class="fs-4 fw-bold item-price" data-price="{{ $catalog->price }}">
                {{ number_format($catalog->price, 0, '.', ' ') }}
            </span>
            <span class="currency-label fw-bold ms-1">₴</span>
        </div>
    </div>

    <div class="total-price-box mb-2"
         style="font-size: 0.82rem; height: 18px; opacity: 0; transition: opacity 0.2s ease;">
        <span class="text-muted">Разом:</span>
        <strong class="total-sum text-muted-dark">
            {{ number_format($catalog->price, 0, '.', ' ') }}
        </strong>
        <span class="fw-medium text-muted-dark">₴</span>
    </div>
</div>

                                <form class="add-to-cart-form" action="{{ route('cart.add', $catalog->id) }}" method="POST">
                                    @csrf
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="input-group rounded-pill border border-secondary-subtle overflow-hidden bg-white custom-qty-group" style="width: 90px; min-width: 90px; height: 40px;">
                                            <button type="button" class="btn p-0 fw-bold qty-btn minus" style="width: 32px;">−</button>
                                            <input type="number"
                                                   name="qty"
                                                   value="1"
                                                   min="1"
                                                   class="form-control border-0 text-center p-0 fw-bold qty-input qty-value"
                                                   style="background: transparent; pointer-events: none; font-size: 0.95rem; -moz-appearance: textfield;">
                                            <button type="button" class="btn p-0 fw-bold qty-btn plus" style="width: 32px;">+</button>
                                        </div>

                                        <button class="btn btn-orange flex-grow-1 rounded-pill d-flex align-items-center justify-content-center gap-2 text-white fw-medium shadow-sm add-cart-btn"
                                                style="height: 40px; border: none; font-size: 0.9rem; white-space: nowrap;">
                                            <i class="bi bi-cart3"></i>
                                            <span>Купити</span>
                                        </button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center py-5">
                        <p class="text-muted fs-5">У вас поки немає збережених товарів.</p>
                        <a href="{{ route('shop.index') }}" class="btn btn-orange text-white rounded-pill px-4" style="background-color: #d97706;">Перейти до каталогу</a>
                    </div>
                @endforelse
            </div>

            <div class="d-flex justify-content-center mt-4">
                {{ $catalogs->links() }}
            </div>
        </div>
    </div>

    {{-- СТИЛІ СТОРІНКИ --}}
    <style>
        .product-card { transition: transform 0.25s ease, box-shadow 0.25s ease; }
        .product-card:hover { transform: translateY(-5px); box-shadow: 0 10px 20px rgba(0,0,0,0.08) !important; }
        .product-card:hover .product-image { transform: scale(1.05); }
        .btn-orange { transition: background-color 0.3s ease, color 0.2s ease, transform 0.1s ease !important; background-color: #d97706; }
        .btn-orange:hover { background-color: #b45309 !important; color: #fff !important; }
        .icon-btn { transition: all 0.2s ease; opacity: 0.85; }
        .icon-btn:hover { opacity: 1; transform: scale(1.1); }
        .icon-btn:hover i { color: #d97706 !important; }
        .qty-input::-webkit-outer-spin-button, .qty-input::-webkit-inner-spin-button { -webkit-appearance: none; margin: 0; }
        
        .custom-qty-group .qty-btn { color: #212529; background-color: transparent; border: none; border-radius: 0; box-shadow: none !important; transition: background-color 0.2s ease, color 0.2s ease; }
        .custom-qty-group:hover { background-color: #f1f3f5 !important; }
        .custom-qty-group:hover .qty-btn { color: #212529; }
        .custom-qty-group .qty-btn:hover { background-color: #212529 !important; color: #ffffff !important; }
        .custom-qty-group .qty-input { color: #212529 !important; box-shadow: none !important; }
        
        .custom-orange-tooltip .tooltip-inner { background-color: #d97706 !important; color: #ffffff !important; font-weight: 500; font-size: 0.8rem; padding: 6px 12px; border-radius: 30px; box-shadow: 0 4px 10px rgba(217, 119, 6, 0.2); }
        .custom-orange-tooltip .tooltip-arrow::before { border-top-color: #d97706 !important; }
        .product-image-wrapper .product-image { width: 100% !important; height: 100% !important; }

        .add-cart-btn.btn-success-animated { background: #198754 !important; border-color: #198754 !important; color: #fff !important; transform: scale(1.03); }
        #closeModalBtn:hover { color: #d97706 !important; transform: scale(1.1); }

        .invisible-initial {
            opacity: 0;
            visibility: hidden;
        }
        .price-badge {
    background-color: rgba(31, 25, 19, 0.1);
    color: #111827;
    border: 1px solid rgba(217, 119, 6, 0.12);
}

.item-price {
    font-weight: 850;
    letter-spacing: -0.5px;
}

.currency-label {
    color: #d97706;
    font-size: 1.05rem;
}

.text-muted-dark {
    color: #4b5563;
}
    </style>

    <div id="customImageModal" style="display: none; position: fixed; z-index: 9999; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0,0,0,0.85); align-items: center; justify-content: center; opacity: 0; transition: opacity 0.3s ease;">
        <div style="position: relative; max-width: 90%; max-height: 90%; display: inline-block;">
            <span id="closeModalBtn" style="position: absolute; top: -15px; right: -15px; color: #fff; background-color: #d97706; width: 36px; height: 36px; border-radius: 50%; font-size: 28px; line-height: 32px; text-align: center; cursor: pointer; transition: all 0.2s ease; user-select: none; z-index: 10000; box-shadow: 0 4px 10px rgba(0,0,0,0.3);">&times;</span>
            <img id="modalTargetImage" src="" style="max-width: 100%; max-height: 85vh; object-fit: contain; border-radius: 12px; transform: scale(0.95); transition: transform 0.3s ease; display: block; border: 3px solid rgba(255,255,255,0.1);">
        </div>
    </div>

    {{-- СКРИПТИ З АНІМАЦІЄЮ --}}
    {{-- СКРИПТИ З АНІМАЦІЄЮ --}}
<script>
document.addEventListener('DOMContentLoaded', function () {

    // ==========================================
    // ЛОГІКА ЗМІНИ КІЛЬКОСТІ ТА ПЕРЕРАХУНКУ СУМИ
    // ==========================================
    function updateProductTotal(card) {
        const qtyInput = card.querySelector('.qty-input');
        const priceSpan = card.querySelector('.item-price');
        const totalSumStrong = card.querySelector('.total-sum');
        const totalPriceBlock = card.querySelector('.total-price-box');

        if (!qtyInput || !priceSpan || !totalSumStrong || !totalPriceBlock) return;

        const currentQty = parseInt(qtyInput.value) || 1;
        const basePrice = parseFloat(priceSpan.dataset.price) || 0;
        const totalCost = basePrice * currentQty;

        totalSumStrong.textContent = new Intl.NumberFormat('uk-UA').format(totalCost);

        if (currentQty > 1) {
            totalPriceBlock.style.opacity = '1';
        } else {
            totalPriceBlock.style.opacity = '0';
        }
    }

    document.body.addEventListener('click', function (e) {
        const btn = e.target.closest('.qty-btn');
        if (!btn) return;

        const card = btn.closest('.product-card');
        const qtyInput = card.querySelector('.qty-input');
        if (!qtyInput) return;

        let currentValue = parseInt(qtyInput.value) || 1;

        if (btn.classList.contains('plus')) {
            currentValue++;
        } else if (btn.classList.contains('minus')) {
            if (currentValue > 1) currentValue--;
        }

        qtyInput.value = currentValue;
        updateProductTotal(card);
    });


    // ==========================================
    // МОДЕРНІЗОВАНА ФУНКЦІЯ АНІМАЦІЇ ПОЛЕТУ
    // ==========================================
    function animateFlyToCart(imgElement) {
        if (!imgElement) return;

        const cartBtn = document.getElementById('main-nav-cart') 
                      || document.querySelector('.cart-btn') 
                      || document.getElementById('cartBtnContainer') 
                      || document.querySelector('.bi-cart3')?.closest('a')
                      || document.querySelector('.bi-cart3')?.parentElement;

        const imgRect = imgElement.getBoundingClientRect();
        const cartRect = cartBtn ? cartBtn.getBoundingClientRect() : { left: window.innerWidth - 60, top: 20, width: 40, height: 40 };

        const clone = imgElement.cloneNode(true);

        clone.style.position = 'fixed';
        clone.style.zIndex = '99999';
        clone.style.pointerEvents = 'none';
        clone.style.objectFit = 'contain';
        clone.style.background = '#fff';
        clone.style.borderRadius = '12px';
        clone.style.boxShadow = '0 10px 25px rgba(0,0,0,0.15)';
        clone.style.transition = 'transform 0.85s cubic-bezier(0.25, 1, 0.5, 1), opacity 0.85s ease';

        clone.style.left = `${imgRect.left}px`;
        clone.style.top = `${imgRect.top}px`;
        clone.style.width = `${imgRect.width}px`;
        clone.style.height = `${imgRect.height}px`;
        clone.style.maxWidth = `${imgRect.width}px`;
        clone.style.maxHeight = `${imgRect.height}px`;

        document.body.appendChild(clone);

        requestAnimationFrame(() => {
            requestAnimationFrame(() => {
                clone.style.transformOrigin = 'left top';
                const targetX = cartRect.left + (cartRect.width / 2) - (imgRect.width * 0.1 / 2);
                const targetY = cartRect.top + (cartRect.height / 2) - (imgRect.height * 0.1 / 2);
                
                clone.style.transform = `translate(${targetX - imgRect.left}px, ${targetY - imgRect.top}px) scale(0.1)`;
                clone.style.opacity = '0.1';
            });
        });

        setTimeout(() => {
            clone.remove();
            if (cartBtn) {
                cartBtn.style.transition = 'transform 0.15s cubic-bezier(0.175, 0.885, 0.32, 1.275)';
                cartBtn.style.transform = 'scale(1.25)';
                setTimeout(() => { cartBtn.style.transform = 'none'; }, 150);
            }
        }, 850);
    }

    // ==========================================
    // ЛУПА (МОДАЛЬНЕ ВІКНО З ФОТО)
    // ==========================================
    const modal = document.getElementById('customImageModal');
    const modalImg = document.getElementById('modalTargetImage');
    const closeBtn = document.getElementById('closeModalBtn');

    document.body.addEventListener('click', function (e) {
        const openBtn = e.target.closest('.open-image');
        if (openBtn) {
            e.preventDefault();
            const imageUrl = openBtn.getAttribute('data-image');
            if (imageUrl) {
                modalImg.src = imageUrl;
                modal.style.display = 'flex';
                setTimeout(() => {
                    modal.style.opacity = '1';
                    modalImg.style.transform = 'scale(1)';
                }, 10);
            }
        }
    });

    if (closeBtn) closeBtn.addEventListener('click', closeModal);
    if (modal) modal.addEventListener('click', function (e) { if (e.target === modal) closeModal(); });
    document.addEventListener('keydown', function (e) { if (e.key === 'Escape' && modal.style.display === 'flex') closeModal(); });

    function closeModal() {
        modal.style.opacity = '0';
        modalImg.style.transform = 'scale(0.95)';
        setTimeout(() => { modal.style.display = 'none'; }, 300);
    }

    // ==========================================
    // ІНІЦІАЛІЗАЦІЯ ТУЛТІПІВ
    // ==========================================
    document.body.addEventListener('mouseover', function (event) {
        const target = event.target.closest('[data-bs-toggle="tooltip"]');
        if (target && !bootstrap.Tooltip.getInstance(target)) {
            const tooltip = new bootstrap.Tooltip(target);
            tooltip.show();
        }
    });

    // ==========================================
    // РОБОТА КНОПКИ "КУПИТИ" (AJAX + АНІМАЦІЯ)
    // ==========================================
    document.body.addEventListener('submit', function (e) {
        if (e.target.classList.contains('add-to-cart-form')) {
            e.preventDefault();

            const form = e.target;
            const url = form.action;
            const formData = new FormData(form);

            const productCard = form.closest('.product-card');
            const productImage = productCard ? productCard.querySelector('.product-image') : null;

            fetch(url, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    if (productImage) {
                        animateFlyToCart(productImage);
                    }

                    const cartCountElement = document.getElementById('cartCount');
                    if (cartCountElement) {
                        cartCountElement.textContent = data.count;
                    }

                    const cartTotalElement = document.getElementById('cartTotalNav');
                    if (cartTotalElement && data.total) {
                        cartTotalElement.textContent = new Intl.NumberFormat('uk-UA').format(data.total);
                    }

                    const buyBtn = form.querySelector('.add-cart-btn');
                    if (buyBtn) {
                        const originalContent = buyBtn.innerHTML;
                        buyBtn.innerHTML = '<i class="bi bi-check-lg"></i> Додано!';
                        buyBtn.classList.add('btn-success-animated');

                        setTimeout(() => {
                            buyBtn.innerHTML = originalContent;
                            buyBtn.classList.remove('btn-success-animated');
                        }, 500);
                    }
                }
            })
            .catch(error => console.error('Помилка додавання:', error));
        }
    });

    // ==========================================
    // ЖИВЕ ВИДАЛЕННЯ З ОБРАНОГО
    // ==========================================
    document.body.addEventListener('click', function (event) {
        const btn = event.target.closest('.wishlist-btn');
        if (!btn) return;

        const catalogId = btn.dataset.id;

        fetch(`/wishlist/toggle/${catalogId}`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Content-Type': 'application/json',
                'Accept': 'application/json'
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data && data.success) {
                if (!data.is_liked) {
                    const cardWrapper = btn.closest('.col-xl-3');
                    if (cardWrapper) {
                        cardWrapper.style.transition = 'all 0.3s ease';
                        cardWrapper.style.opacity = '0';
                        cardWrapper.style.transform = 'scale(0.8)';
                        setTimeout(() => {
                            cardWrapper.remove();
                            const remainingCards = document.querySelectorAll('#productsWrapper .col-xl-3');
                            if (remainingCards.length === 0) {
                                location.reload();
                            }
                        }, 300);
                    }
                }
            }
        })
        .catch(error => console.error('Error:', error));
    });
});
</script>
@endsection