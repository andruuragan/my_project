<div id="productsWrapper">
    <div class="row">

        @forelse($catalogs as $catalog)

            <div class="col-xl-3 col-lg-4 col-md-6 mb-4">
                <div class="card product-card shadow-sm h-100 border-0 rounded-4 overflow-hidden position-relative">

                    <!-- ФОТО ТОВАРУ -->
                    <div class="position-relative product-image-wrapper bg-light d-flex align-items-center justify-content-center" style="height: 220px; overflow: hidden;">
                        <img src="{{ Storage::url($catalog->image) }}"
                             class="product-image"
                             alt="{{ $catalog->name }}"
                             loading="lazy"
                             style="max-height: 100%; object-fit: contain; transition: transform 0.3s ease;">

                        <!-- ІКОНКИ ПОВЕРХ ФОТО -->
                        <div class="product-icons p-3 d-flex justify-content-between w-100 position-absolute top-0 start-0">
                            <button type="button" class="icon-btn wishlist-btn rounded-circle shadow-sm border-0 d-flex align-items-center justify-content-center bg-white" style="width: 36px; height: 36px;">
                                <i class="bi bi-heart text-muted"></i>
                            </button>

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
                        <!-- 1. Назва (Головний акцент) -->
                        <h6 class="product-title fw-semibold text-dark mb-2 line-clamp-2" style="height: 40px; overflow: hidden; line-height: 1.3;">
                            {{ $catalog->name }}
                        </h6>

                        <!-- 2. Лінія з ефектом розчинення -->
                        <div class="my-1" style="height: 1px; background: linear-gradient(to right, rgba(0,0,0,0), rgba(0,0,0,0.1) 20%, rgba(0,0,0,0.1) 80%, rgba(0,0,0,0));"></div>

                        <!-- 3. Технічні характеристики -->
                        <div class="product-specs small text-uppercase fw-bold text-muted mt-2 mb-3" style="letter-spacing: 0.5px; font-size: 0.72rem;">
                            Ø{{ $catalog->diameter }} • {{ $catalog->thickness }} мм • AISI {{ $catalog->grade }}
                        </div>

                        <!-- Блок Ціни -->
                        <div class="mt-auto pt-2 border-top border-light">
                            <div class="d-flex align-items-baseline gap-1 mb-1">
                            <span class="fs-4 fw-bold text-dark item-price" data-price="{{ $catalog->price }}">
                                {{ number_format($catalog->price, 0, '.', ' ') }}
                            </span>
                                <span class="small text-muted">грн/шт</span>
                            </div>

                            <!-- Динамічна сума -->
                            <div class="total-price mb-3 invisible-initial" style="font-size: 0.85rem; height: 20px;">
                                <span class="text-muted">Разом:</span>
                                <strong class="total-sum text-primary">{{ number_format($catalog->price, 0, '.', ' ') }}</strong> <span class="text-primary fw-medium">грн</span>
                            </div>
                        </div>

                        <!-- ФОРМА / КНОПКИ КУПІВЛІ -->
                        <form class="add-to-cart-form" action="{{ route('cart.add', $catalog->id) }}" method="POST">
                            @csrf

                            <div class="d-flex align-items-center gap-2">
                                <!-- Компактний вибір кількості (Ширина 120px для двозначних цифр) -->
                                <div class="input-group rounded-pill border border-secondary-subtle overflow-hidden bg-white custom-qty-group" style="width: 100px; min-width: 100px; height: 40px;">
                                    <button type="button" class="btn p-0 fw-bold qty-btn minus" style="width: 32px;">−</button>
                                    <input type="number"
                                           name="qty"
                                           value="1"
                                           min="1"
                                           class="form-control border-0 text-center p-0 fw-bold qty-input qty-value"
                                           style="background: transparent; pointer-events: none; font-size: 0.95rem; -moz-appearance: textfield;">
                                    <button type="button" class="btn p-0 fw-bold qty-btn plus" style="width: 32px;">+</button>
                                </div>

                                <!-- Помаранчева кнопка «Купити» -->
                                <button class="btn btn-orange flex-grow-1 rounded-pill d-flex align-items-center justify-content-center gap-2 text-white fw-medium shadow-sm add-cart-btn" style="height: 40px; background-color: #d97706; border: none; font-size: 0.9rem; white-space: nowrap;">
                                    <i class="bi bi-cart3"></i>
                                    <span>Купити</span>
                                </button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

        @empty
            <div class="col-12 text-center">
                <p>Товари не знайдені</p>
            </div>
        @endforelse

    </div>

    <div class="d-flex justify-content-center mt-4">
        {{ $catalogs->links() }}
    </div>
</div>

{{-- ВСІ СТИЛІ ОДНИМ БЛОКОМ ПОЗА ЦИКЛОМ --}}
<style>
    /* Ефекти для картки товару */
    .product-card {
        transition: transform 0.25s ease, box-shadow 0.25s ease;
    }
    .product-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.08) !important;
    }

    /* Зуминг картинки при наведенні */
    .product-card:hover .product-image {
        transform: scale(1.05);
    }

    /* Наш фірмовий помаранчевий колір */
    .btn-orange {
        transition: background-color 0.2s ease;
    }
    .btn-orange:hover {
        background-color: #b45309 !important;
        color: #fff !important;
    }

    /* Стилізація іконок поверх фото */
    .icon-btn {
        transition: all 0.2s ease;
        opacity: 0.85;
    }
    .icon-btn:hover {
        opacity: 1;
        transform: scale(1.1);
    }
    .icon-btn:hover i {
        color: #d97706 !important;
    }

    /* Прибираємо стрілочки в інпуті кількості */
    .qty-input::-webkit-outer-spin-button,
    .qty-input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    /* СТИЛІ ДЛЯ СУПЕР-ХОВЕРУ КНОПОК КІЛЬКОСТІ */
    .custom-qty-group .qty-btn {
        color: #212529;
        background-color: transparent;
        border: none;
        border-radius: 0;
        box-shadow: none !important;
        transition: background-color 0.2s ease, color 0.2s ease;
    }
    .custom-qty-group:hover {
        background-color: #f1f3f5 !important;
    }
    .custom-qty-group:hover .qty-btn {
        color: #212529;
    }
    .custom-qty-group .qty-btn:hover {
        background-color: #212529 !important;
        color: #ffffff !important;
    }
    .custom-qty-group .qty-input {
        color: #212529 !important;
        box-shadow: none !important;
    }

    /* Кастомні спливаючі підказки (Тултіпи) */
    .custom-orange-tooltip .tooltip-inner {
        background-color: #d97706 !important;
        color: #ffffff !important;
        font-weight: 500;
        font-size: 0.8rem;
        padding: 6px 12px;
        border-radius: 30px;
        box-shadow: 0 4px 10px rgba(217, 119, 6, 0.2);
    }
    .custom-orange-tooltip .tooltip-arrow::before {
        border-top-color: #d97706 !important;
    }
</style>

{{-- СКРИПТ ІНІЦІАЛІЗАЦІЇ ПІДКАЗОК --}}
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        });
    });
</script>
