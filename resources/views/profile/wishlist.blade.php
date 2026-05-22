@extends('layouts.main')

@section('content')
    <div class="container py-4">
        <h3 class="mb-4">❤️ Мої вподобані товари</h3>

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
                                     style="max-height: 100%; object-fit: contain; transition: transform 0.3s ease;">

                                <!-- ІКОНКИ ПОВЕРХ ФОТО -->
                                <div class="product-icons p-3 d-flex justify-content-between w-100 position-absolute top-0 start-0">
                                    <!-- Кнопка видалення з обраного (вона ж toggle) -->
                                    <button type="button"
                                            class="icon-btn wishlist-btn rounded-circle shadow-sm border-0 d-flex align-items-center justify-content-center bg-white"
                                            data-id="{{ $catalog->id }}"
                                            style="width: 36px; height: 36px;">
                                        <i class="bi bi-heart-fill text-danger"></i>
                                    </button>

                                    <div class="right-icons d-flex gap-2">
                                        <!-- ЛУПА (Точно як у каталозі) -->
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
                                <h6 class="product-title fw-semibold text-dark mb-2 line-clamp-2" style="height: 40px; overflow: hidden; line-height: 1.3;">
                                    {{ $catalog->name }}
                                </h6>

                                <div class="my-1" style="height: 1px; background: linear-gradient(to right, rgba(0,0,0,0), rgba(0,0,0,0.1) 20%, rgba(0,0,0,0.1) 80%, rgba(0,0,0,0));"></div>

                                <div class="product-specs small text-uppercase fw-bold text-muted mt-2 mb-3" style="letter-spacing: 0.5px; font-size: 0.72rem;">
                                    Ø{{ $catalog->diameter }} • {{ $catalog->thickness }} • AISI {{ $catalog->grade }}
                                </div>

                                <!-- Блок Ціни -->
                                <div class="mt-auto pt-2 border-top border-light">
                                    <div class="d-flex align-items-baseline gap-1 mb-1">
                                    <span class="fs-3 fw-bold item-price" data-price="{{ $catalog->price }}" style="color: #111827; font-weight: 800;">
                                        {{ number_format($catalog->price, 0, '.', ' ') }}
                                    </span>
                                        <span class="small text-muted fw-medium">грн/шт</span>
                                    </div>

                                    <div class="total-price mb-3 invisible-initial" style="font-size: 0.85rem; height: 20px;">
                                        <span class="text-muted">Разом:</span>
                                        <strong class="total-sum" style="color: #b45309;">{{ number_format($catalog->price, 0, '.', ' ') }}</strong>
                                        <span class="fw-medium" style="color: #b45309;">грн</span>
                                    </div>
                                </div>

                                <!-- ФОРМА КУПІВЛІ -->
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

    {{-- ВСТАВЛЯЄМО СТИЛІ КАТАЛОГУ ДЛЯ СИНХРОНІЗАЦІЇ ДИЗАЙНУ --}}
    <style>
        .product-card { transition: transform 0.25s ease, box-shadow 0.25s ease; }
        .product-card:hover { transform: translateY(-5px); box-shadow: 0 10px 20px rgba(0,0,0,0.08) !important; }
        .product-card:hover .product-image { transform: scale(1.05); }
        .btn-orange { transition: background-color 0.2s ease; }
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
    </style>
    <!-- HTML-каркас для модального вікна лупи (додаємо перед скриптом) -->
    <!-- МОДАЛЬНЕ ВІКНО ЛУПИ (Тепер хрестик прив'язаний строго до кута картинки) -->
    <div id="customImageModal" style="display: none; position: fixed; z-index: 9999; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0,0,0,0.85); align-items: center; justify-content: center; opacity: 0; transition: opacity 0.3s ease;">

        <!-- Контейнер-обгортка, який стискається під розмір картинки -->
        <div style="position: relative; max-width: 90%; max-height: 90%; display: inline-block;">

            <!-- Хрестик всередині контейнера: тепер позиція рахується від верхнього правого кута фото -->
            <span id="closeModalBtn" style="position: absolute; top: -15px; right: -15px; color: #fff; background-color: #d97706; width: 36px; height: 36px; border-radius: 50%; font-size: 28px; line-height: 32px; text-align: center; cursor: pointer; transition: all 0.2s ease; user-select: none; z-index: 10000; box-shadow: 0 4px 10px rgba(0,0,0,0.3);">
            &times;
        </span>

            <!-- Сама картинка -->
            <img id="modalTargetImage" src="" style="max-width: 100%; max-height: 85vh; object-fit: contain; border-radius: 12px; transform: scale(0.95); transition: transform 0.3s ease; display: block; border: 3px solid rgba(255,255,255,0.1);">
        </div>

    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {

            // ==========================================
            // 1. ОЖИВЛЯЄМО ЛУПУ (МОДАЛЬНЕ ВІКНО З ФОТО)
            // ==========================================
            const modal = document.getElementById('customImageModal');
            const modalImg = document.getElementById('modalTargetImage');
            const closeBtn = document.getElementById('closeModalBtn');

            document.body.addEventListener('click', function (e) {
                const openBtn = e.target.closest('.open-image');

                // ИСПРАВЛЕНО: Теперь предотвращаем дефолтное поведение ТОЛЬКО если кликнули по лупе
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

            // Закриття модалки на хрестик, ескейп або клік по тлу
            closeBtn.addEventListener('click', closeModal);
            modal.addEventListener('click', function (e) {
                if (e.target === modal) closeModal();
            });
            document.addEventListener('keydown', function (e) {
                if (e.key === 'Escape' && modal.style.display === 'flex') closeModal();
            });

            function closeModal() {
                modal.style.opacity = '0';
                modalImg.style.transform = 'scale(0.95)';
                setTimeout(() => {
                    modal.style.display = 'none';
                }, 300);
            }


            // ==========================================
            // 2. ІНІЦІАЛІЗАЦІЯ ТУЛТІПІВ
            // ==========================================
            document.body.addEventListener('mouseover', function (event) {
                const target = event.target.closest('[data-bs-toggle="tooltip"]');
                if (target && !bootstrap.Tooltip.getInstance(target)) {
                    const tooltip = new bootstrap.Tooltip(target);
                    tooltip.show();
                }
            });


            // ==========================================
            // ==========================================
// 3. РОБОТА КНОПКИ "КУПИТИ" (AJAX)
// ==========================================
            document.body.addEventListener('submit', function (e) {
                if (e.target.classList.contains('add-to-cart-form')) {
                    e.preventDefault();

                    const form = e.target;
                    const url = form.action;
                    const formData = new FormData(form);

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

                                // Оновлення кількості (id="cartCount")
                                const cartCountElement = document.getElementById('cartCount');
                                if (cartCountElement) {
                                    cartCountElement.textContent = data.count;
                                }

                                // Оновлення суми (id="cartTotalNav")
                                const cartTotalElement = document.getElementById('cartTotalNav');
                                if (cartTotalElement && data.total) {
                                    cartTotalElement.textContent = new Intl.NumberFormat('uk-UA').format(data.total);
                                }

                                // Анімація кнопки успіху за допомогою CSS-класу
                                const buyBtn = form.querySelector('.add-cart-btn');
                                if (buyBtn) {
                                    const originalContent = buyBtn.innerHTML;

                                    // Вмикаємо зелений стан
                                    buyBtn.innerHTML = '<i class="bi bi-check-lg"></i> Додано!';
                                    buyBtn.classList.add('btn-success-animated');

                                    setTimeout(() => {
                                        // Через 1 секунду повертаємо все назад
                                        buyBtn.innerHTML = originalContent;
                                        buyBtn.classList.remove('btn-success-animated');
                                    }, 1000);
                                }
                            }
                        })
                        .catch(error => console.error('Помилка додавання:', error));
                }
            });

            // ==========================================
            // 4. ЖИВЕ ВИДАЛЕННЯ З ОБРАНОГО
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

    <style>
        .btn-orange {
            /* Додаємо background-color в список плавно змінюваних властивостей */
            transition: background-color 0.3s ease, color 0.2s ease, transform 0.1s ease !important;
            background-color: #d97706;
        }

        .btn-orange:hover {
            background-color: #b45309 !important;
            color: #fff !important;
        }

        /* Цей клас тимчасово додається через JS при покупці */
        .add-cart-btn.btn-success-animated {
            background: #198754 !important;
            border-color: #198754 !important;
            color: #fff !important;
            transform: scale(1.03);
        }

        /* Ефект наведення на хрестик модалки */
        #closeModalBtn:hover {
            color: #d97706 !important;
            transform: scale(1.1);
        }
    </style>
@endsection
