<div id="productsWrapper">
    <div class="row">

        @forelse($catalogs as $catalog)

            <div class="col-xl-3 col-lg-4 col-md-6 mb-4">
                <div class="card product-card shadow-sm h-100 border-0 rounded-4 overflow-hidden position-relative bg-white">

                    <!-- ФОТО ТОВАРУ -->
                    <div class="position-relative product-image-wrapper bg-light d-flex align-items-center justify-content-center" style="height: 220px; overflow: hidden;">
                        <img src="{{ Storage::url($catalog->image) }}"
                             class="product-image"
                             alt="{{ $catalog->name }}"
                             style="max-height: 100%; object-fit: contain; transition: transform 0.3s ease;">

                        <!-- ІКОНКИ ПОВЕРХ ФОТО -->
                        <div class="product-icons p-3 d-flex justify-content-between w-100 position-absolute top-0 start-0">
                            @auth
                                <button type="button"
                                        class="icon-btn wishlist-btn rounded-circle shadow-sm border-0 d-flex align-items-center justify-content-center bg-white"
                                        data-id="{{ $catalog->id }}"
                                        style="width: 36px; height: 36px;">
                                    @if(Auth::user()->wishlists->contains($catalog->id))
                                        <i class="bi bi-heart-fill text-danger"></i>
                                    @else
                                        <i class="bi bi-heart text-muted"></i>
                                    @endif
                                </button>
                            @else
                                <button type="button"
                                        class="icon-btn guest-wishlist-btn rounded-circle shadow-sm border-0 d-flex align-items-center justify-content-center bg-white"
                                        data-bs-toggle="modal" 
                                        data-bs-target="#loginModal"
                                        data-bs-placement="top"
                                        data-bs-custom-class="custom-orange-tooltip"
                                        data-bs-title="Авторизуйтесь, щоб додати в обране"
                                        style="width: 36px; height: 36px;">
                                    <i class="bi bi-heart text-muted"></i>
                                </button>
                            @endauth

                            <div class="right-icons d-flex gap-2">
                                <button type="button"
                                        class="icon-btn open-image rounded-circle shadow-sm border-0 d-flex align-items-center justify-content-center bg-white"
                                        data-bs-toggle="tooltip"
                                        data-bs-placement="top"
                                        data-bs-custom-class="custom-orange-tooltip"
                                        data-bs-title="Збільшити фото"
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

                    <!-- ТЕКСТОВА ЧАСТИНА -->
                    <div class="card-body d-flex flex-column p-3">
                        
                        <!-- НАЗВА ТОВАРУ ЯК ПОСИЛАННЯ -->
                        <h6 class="mb-2 line-clamp-2" style="height: 40px; overflow: hidden; line-height: 1.3;">
                            <a href="{{ route('catalog.public.show', $catalog->id) }}" class="product-title-link fw-semibold text-decoration-none">
                                {{ $catalog->name }}
                            </a>
                        </h6>

                        <!-- Розділювач -->
                        <div class="my-1" style="height: 1px; background: linear-gradient(to right, rgba(0,0,0,0), rgba(0,0,0,0.08) 20%, rgba(0,0,0,0.08) 80%, rgba(0,0,0,0));"></div>

                        <!-- Характеристики -->
                        <div class="product-specs small text-uppercase fw-bold text-muted mt-2 mb-3" style="letter-spacing: 0.5px; font-size: 0.72rem;">
                            Ø{{ $catalog->diameter }} • {{ $catalog->thickness }} • AISI {{ $catalog->grade }}
                        </div>

                        <!-- БЛОК ЦІНИ (З налаштовуваною прозорою заливкою) -->
                        <div class="mt-auto pt-2">
                            <div class="d-flex align-items-center mb-1">
                                <div class="price-badge px-3 py-1 rounded-3 d-inline-flex align-items-baseline">
                                    <span class="fs-4 fw-bold item-price" data-price="{{ $catalog->price }}">
                                        {{ number_format($catalog->price, 0, '.', ' ') }}
                                    </span>
                                    <span class="currency-label fw-bold ms-1">₴</span>
                                </div>
                            </div>

                            <!-- Динамічна сума "Разом" -->
                            <div class="total-price-box mb-2" style="font-size: 0.82rem; height: 18px; opacity: 0; transition: opacity 0.2s ease;">
                                <span class="text-muted">Разом:</span>
                                <strong class="total-sum text-muted-dark">{{ number_format($catalog->price, 0, '.', ' ') }}</strong>
                                <span class="fw-medium text-muted-dark">₴</span>
                            </div>
                        </div>

                        <!-- ФОРМА ДОДАВАННЯ В КОШИК -->
                        <form class="add-to-cart-form" action="{{ route('cart.add', $catalog->id) }}" method="POST">
                            @csrf

                            <div class="d-flex align-items-center justify-content-between gap-2 mt-1">
                                <!-- Кнопки кількості -->
                                <div class="input-group rounded-pill border border-secondary-subtle overflow-hidden bg-light custom-qty-group" style="width: 105px; height: 40px;">
                                    <button type="button" class="btn p-0 fw-bold qty-btn minus" style="width: 34px;">−</button>
                                    <input type="number"
                                           name="qty"
                                           value="1"
                                           min="1"
                                           class="form-control border-0 text-center p-0 fw-bold qty-input qty-value bg-transparent"
                                           style="pointer-events: none; font-size: 0.95rem; -moz-appearance: textfield;">
                                    <button type="button" class="btn p-0 fw-bold qty-btn plus" style="width: 34px;">+</button>
                                </div>

                                <!-- Кругла помаранчева кнопка-візок -->
                                <button type="submit" 
                                        class="btn-cart-circle add-cart-btn shadow-sm d-flex align-items-center justify-content-center" 
                                        data-bs-toggle="tooltip"
                                        data-bs-placement="top"
                                        data-bs-custom-class="custom-orange-tooltip"
                                        data-bs-title="Додати у кошик"
                                        style="width: 40px; height: 40px; border-radius: 50%;">
                                    <i class="bi bi-cart3 fs-5"></i>
                                </button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

        @empty
            <div class="col-12 text-center py-5">
                <p class="text-muted">Товари не знайдені</p>
            </div>
        @endforelse

    </div>

    <div class="d-flex justify-content-center mt-4">
        {{ $catalogs->links() }}
    </div>
</div>

{{-- СТИЛІ КАРТКИ --}}
<style>
    .product-card {
        transition: transform 0.28s cubic-bezier(0.4, 0, 0.2, 1), box-shadow 0.28s cubic-bezier(0.4, 0, 0.2, 1);
    }
    .product-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 12px 26px rgba(0,0,0,0.08) !important;
    }
    .product-card:hover .product-image {
        transform: scale(1.04);
    }

    .product-title-link {
        color: #1f2937;
        transition: color 0.2s ease;
    }
    .product-title-link:hover {
        color: #d97706;
    }

    /* НАЛАШТУВАННЯ ЗАЛИВКИ ЦІНИ ЧЕРЕЗ PROZRACHNOST (RGBA) */
    .price-badge {
        /* ТУТ МІНЯЙТЕ ОСТАННЄ ЧИСЛО (0.06) ДЛЯ РЕГУЛЮВАННЯ ПРОЗРАЧНОСТІ */
        /* Наприклад: 0.03 — майже невидима, 0.12 — яскравіша */
        background-color: rgba(217, 119, 6, 0.10); 
        
        color: #111827; /* Темні солідні цифри */
        border: 1px solid rgba(217, 119, 6, 0.12); /* Тонка легка рамка в тон заливки */
    }
    .item-price {
        font-weight: 850;
        letter-spacing: -0.5px;
    }
    .currency-label {
        color: #d97706; /* Помаранчева гривня */
        font-size: 1.05rem;
    }
    .text-muted-dark {
        color: #4b5563;
    }

    /* Кругла кнопка-візок */
    .btn-cart-circle {
        background: #d97706;
        color: #ffffff;
        border: none;
        transition: all 0.2s ease;
    }
    .btn-cart-circle:hover {
        background: #b45309;
        transform: scale(1.08);
    }
    .btn-cart-circle:active {
        transform: scale(0.95);
    }

    .custom-qty-group .qty-btn {
        color: #4b5563;
        background-color: transparent;
        border: none;
        box-shadow: none !important;
        transition: background-color 0.15s ease, color 0.15s ease;
    }
    .custom-qty-group .qty-btn:hover {
        background-color: #1f2937 !important;
        color: #ffffff !important;
    }

    .icon-btn {
        transition: all 0.2s ease;
        opacity: 0.65; 
    }
    .product-card:hover .icon-btn {
        opacity: 1;
    }
    .icon-btn:hover {
        transform: scale(1.1);
    }
    .icon-btn:hover i {
        color: #d97706 !important;
    }
    .icon-btn:hover i.bi-heart-fill {
        color: #dc3545 !important;
    }

    .custom-orange-tooltip .tooltip-inner {
        background-color: #d97706 !important;
        color: #ffffff !important;
        font-weight: 500;
        font-size: 0.78rem;
        padding: 5px 10px;
        border-radius: 20px;
    }
    .custom-orange-tooltip .tooltip-arrow::before {
        border-top-color: #d97706 !important;
    }
    
    .product-image-wrapper .product-image {
        width: 100% !important;
        height: 100% !important;
    }
    .qty-input::-webkit-outer-spin-button,
    .qty-input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }
</style>

{{-- ФУНКЦІОНАЛ (JS) --}}
<script>
document.addEventListener('DOMContentLoaded', function () {
    // 1. Динамічна ініціалізація тултіпів
    document.body.addEventListener('mouseover', function (event) {
        const target = event.target.closest('[data-bs-title]');
        if (target && !bootstrap.Tooltip.getInstance(target)) {
            const tooltip = new bootstrap.Tooltip(target);
            tooltip.show();
        }
    });

    // 2. Логіка кнопок кількості, розрахунку вартості та КЛІКУ НА КОРЗИНУ
    document.body.addEventListener('click', function (event) {
        const target = event.target;
        
        // ХОВАННЯ ТУЛТІПУ ПРИ КЛІКУ НА КОРЗИНУ
        const cartBtn = target.closest('.add-cart-btn');
        if (cartBtn) {
            const tooltipInstance = bootstrap.Tooltip.getInstance(cartBtn);
            if (tooltipInstance) {
                tooltipInstance.hide();
            }
        }

        // Кнопки Плюс / Мінус
        if (target.classList.contains('qty-btn')) {
            const cardBody = target.closest('.card-body');
            const input = cardBody.querySelector('.qty-input');
            const price = parseFloat(cardBody.querySelector('.item-price').dataset.price);
            const totalBox = cardBody.querySelector('.total-price-box');
            const totalSumText = cardBody.querySelector('.total-sum');
            
            let currentQty = parseInt(input.value) || 1;
            
            if (target.classList.contains('plus')) {
                currentQty++;
            } else if (target.classList.contains('minus') && currentQty > 1) {
                currentQty--;
            }
            
            input.value = currentQty;
            
            const finalSum = price * currentQty;
            totalSumText.textContent = finalSum.toLocaleString('uk-UA');
            
            if (currentQty > 1) {
                totalBox.style.opacity = '1';
            } else {
                totalBox.style.opacity = '0';
            }
        }

        // Лайки / Вибране
        if (target.closest('.guest-wishlist-btn')) return;

        const wishlistBtn = target.closest('.wishlist-btn');
        if (wishlistBtn) {
            const catalogId = wishlistBtn.dataset.id;

            fetch(`/wishlist/toggle/${catalogId}`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                }
            })
            .then(response => {
                if (response.status === 401) {
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
});
</script>