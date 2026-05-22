@extends('layouts.main')

@section('content')
    <div class="container-1600 py-4">

        <!-- Кнопка повернення -->
        <div class="mb-4">
            <a href="{{ route('shop.index') }}" class="btn btn-sm btn-outline-secondary rounded-pill d-inline-flex align-items-center gap-1 shadow-sm">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                </svg>
                Повернутись до каталогу
            </a>
        </div>

        <!-- Головна картка товару: Фото + Характеристики -->
        <div class="card shadow-sm border-0 bg-white rounded-3 overflow-hidden p-4 mb-4">
            <div class="row g-4">

                <!-- Ліва колона: Велика картинка -->
                <div class="col-12 col-md-5 col-lg-4 text-center d-flex align-items-center justify-content-center bg-light rounded-3 p-3" style="min-height: 350px;">
                    @if($catalog->image)
                        <img src="{{ asset('storage/' . $catalog->image) }}"
                             alt="{{ $catalog->name }}"
                             class="img-fluid"
                             style="max-width: 100%; max-height: 350px; width: auto; height: auto; object-fit: contain; border-radius: 8px;">
                    @else
                        <div class="text-muted d-flex flex-column align-items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" class="bi bi-image text-secondary mb-2" viewBox="0 0 16 16">
                                <path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                                <path d="M2.002 1a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2h-12zm12 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                            </svg>
                            <span>Немає зображення</span>
                        </div>
                    @endif
                </div>

                <!-- Права колона: Назва, ціна, кнопка купування та характеристики -->
                <div class="col-12 col-md-7 col-lg-8 d-flex flex-column justify-content-between ps-md-4">
                    <div>
                        <h2 class="fw-bold text-dark mb-3">{{ $catalog->name }}</h2>

                        <!-- Блок ціни, кількості та кнопки -->
                        <div class="bg-light p-3 rounded-3 mb-4 border product-card-container">
                            <div class="d-flex flex-wrap align-items-center justify-content-between gap-4">
                                <div class="d-flex gap-4">
                                    <!-- Базова ціна за 1 шт -->
                                    <div>
                                        <span class="text-muted small d-block text-uppercase fw-bold">Ціна:</span>
                                        <span class="fs-2 fw-black" style="color: #d97706;">
                                             {{ number_format($catalog->price, 0, '.', ' ') }}
                                            <small class="fs-5 fw-normal text-muted">грн</small>
                                        </span>
                                    </div>

                                    <!-- Загальна сума (показується при зміні кількості) -->
                                    <!-- Додано клас ms-4 (або ms-5 для більшого відступу) -->
                                    <div id="total-price-block" class="d-none" style="margin-left: 50px; transition: all 0.3s ease;">
                                        <span class="text-muted small d-block text-uppercase fw-bold text-success">Разом:</span>
                                        <span class="fs-2 fw-black text-success">
        <span id="dynamic-total">{{ number_format($catalog->price, 0, '.', ' ') }}</span>
        <small class="fs-5 fw-normal text-muted">грн</small>
    </span>
                                    </div>
                                </div>

                                <div class="d-flex flex-wrap align-items-center gap-3">
                                    @auth
                                        <!-- Вибір кількості (Мінус / Цифра / Плюс) -->
                                        <div class="d-flex flex-column gap-1">
                                            <span class="text-muted small fw-bold">Кількість:</span>
                                            <div class="input-group" style="max-width: 140px; height: 46px;">
                                                <button class="btn btn-outline-secondary px-3 rounded-start-pill fw-bold" type="button" id="btn-minus" style="border-right: none;">−</button>
                                                <input type="number"
                                                       id="product-qty"
                                                       class="form-control text-center fw-bold border-secondary-subtle custom-qty-input"
                                                       value="1"
                                                       min="1"
                                                       style="max-width: 60px; pointer-events: none; background: #fff;">
                                                <button class="btn btn-outline-secondary px-3 rounded-end-pill fw-bold" type="button" id="btn-plus" style="border-left: none;">+</button>
                                            </div>
                                        </div>

                                        <!-- Кнопка додавання -->
                                        <div class="d-flex align-items-end" style="height: 46px; margin-top: auto;">
                                            <button type="button"
                                                    id="add-to-cart-{{ $catalog->id }}"
                                                    class="btn btn-lg px-4 py-2 rounded-pill d-flex align-items-center gap-2 add-to-cart-btn text-white fw-medium shadow-sm custom-orange-btn"
                                                    style="background-color: #d97706; border-color: #d97706;"
                                                    data-id="{{ $catalog->id }}"
                                                    data-name="{{ $catalog->name }}"
                                                    data-price="{{ $catalog->price }}"
                                                    data-url="{{ route('cart.add', $catalog->id) }}">

                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-cart3 cart-icon" viewBox="0 0 16 16">
                                                    <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401H4.37l-.402 1.607L1.5 13H11a.5.5 0 0 1 0 1H1.5a.5.5 0 0 1-.49-.598l1-5a.5.5 0 0 1 .465-.401h9.396l.732-3.662H3.89l-.371-1.482A.5.5 0 0 1 3 1H1.5a.5.5 0 0 1-.5-.5zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                                                </svg>
                                                <span class="btn-text">У кошик</span>
                                            </button>
                                        </div>

                                        <!-- Маленький стиль для гарного ефекту наведення (hover) -->
                                        <style>
                                            .custom-orange-btn:hover {
                                                background-color: #b45309 !important;
                                                border-color: #b45309 !important;
                                                color: #fff !important;
                                            }
                                            .custom-qty-input::-webkit-outer-spin-button,
                                            .custom-qty-input::-webkit-inner-spin-button {
                                                -webkit-appearance: none;
                                                margin: 0;
                                            }
                                            .custom-qty-input {
                                                -moz-appearance: textfield !important;
                                                text-align: center !important;
                                            }
                                        </style>
                                    @else
                                        <!-- Варіант для гостей -->
                                        <button type="button"
                                                class="btn btn-outline-secondary btn-lg px-4 py-2 rounded-pill"
                                                data-bs-toggle="modal"
                                                data-bs-target="#loginModal">
                                            Авторизуйтесь, щоб купити
                                        </button>
                                    @endauth
                                </div>
                            </div>

                            <!-- Блок сповіщення про успіх -->
                            <div class="cart-success-msg d-none mt-2 text-success small d-flex align-items-center gap-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                                </svg>
                                Товар успішно додано до вашого кошика!
                            </div>
                        </div>

                        <!-- Характеристики -->
                        <h5 class="fs-6 text-muted text-uppercase fw-bold border-bottom pb-2 mb-3">Технічні характеристики</h5>
                        <div class="row row-cols-1 row-cols-sm-2 g-3">
                            <div class="col d-flex justify-content-between border-bottom pb-2">
                                <span class="text-muted">Тип:</span>
                                <span class="fw-medium text-dark">{{ $catalog->type ?? '-' }}</span>
                            </div>
                            <div class="col d-flex justify-content-between border-bottom pb-2">
                                <span class="text-muted">Товщина:</span>
                                <span class="fw-medium text-dark">{{ $catalog->thickness ?? '-' }}</span>
                            </div>
                            <div class="col d-flex justify-content-between border-bottom pb-2">
                                <span class="text-muted">Марка нерж. (AISI):</span>
                                <span class="fw-medium text-dark">{{ $catalog->grade ?? '-' }}</span>
                            </div>
                            <div class="col d-flex justify-content-between border-bottom pb-2">
                                <span class="text-muted">Діаметр:</span>
                                <span class="fw-medium text-dark">{{ $catalog->diameter ?? '-' }}</span>
                            </div>
                            <div class="col d-flex justify-content-between border-bottom pb-2">
                                <span class="text-muted">Тип димоходу:</span>
                                <span class="fw-medium text-dark">{{ $catalog->chimneyType ?? '-' }}</span>
                            </div>
                            <div class="col d-flex justify-content-between border-bottom pb-2">
                                <span class="text-muted">Кожух:</span>
                                <span class="fw-medium text-dark">{{ $catalog->casing == 'н' ? '-' : $catalog->casing }}</span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- Таби з описами -->
        <div class="description-content mt-4">
            @if(optional($catalog->description))
                <div class="card shadow-sm border-0 bg-white rounded-3 p-4">
                    <ul class="nav nav-tabs card-header-tabs flex-wrap" role="tablist">
                        <li class="nav-item">
                            <button class="nav-link active fw-medium px-4" data-bs-toggle="tab" data-bs-target="#ov">Опис</button>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link fw-medium px-4" data-bs-toggle="tab" data-bs-target="#adv">Переваги</button>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link fw-medium px-4" data-bs-toggle="tab" data-bs-target="#usage">Застосування</button>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link fw-medium px-4" data-bs-toggle="tab" data-bs-target="#why">Чому ми</button>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link fw-medium px-4" data-bs-toggle="tab" data-bs-target="#extra">Додатково</button>
                        </li>
                    </ul>

                    <div class="tab-content mt-4 text-secondary lh-base">
                        <div class="tab-pane fade show active" id="ov">
                            {!! $catalog->description->overview ?? '<p class="text-muted">Опис відсутній</p>' !!}
                        </div>
                        <div class="tab-pane fade" id="adv">
                            {!! $catalog->description->advantages ?? '<p class="text-muted">Інформація відсутня</p>' !!}
                        </div>
                        <div class="tab-pane fade" id="usage">
                            {!! $catalog->description->usage ?? '<p class="text-muted">Інформація відсутня</p>' !!}
                        </div>
                        <div class="tab-pane fade" id="why">
                            {!! $catalog->description->why_choose_us ?? '<p class="text-muted">Інформація відсутня</p>' !!}
                        </div>
                        <div class="tab-pane fade" id="extra">
                            {!! $catalog->description->additional_info ?? '<p class="text-muted">Інформація відсутня</p>' !!}
                        </div>
                    </div>
                </div>
            @endif
        </div>

    </div>

    {{-- АЯКС СКРИПТ --}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Керування кнопками кількості та динамічний перерахунок суми
            const btnMinus = document.getElementById('btn-minus');
            const btnPlus = document.getElementById('btn-plus');
            const qtyInput = document.getElementById('product-qty');

            // Оголошуємо ОДИН раз для всього скрипта
            const addToCartBtn = document.querySelector('.add-to-cart-btn');
            const basePrice = addToCartBtn ? parseFloat(addToCartBtn.getAttribute('data-price')) : 0;

            const totalPriceBlock = document.getElementById('total-price-block');
            const dynamicTotal = document.getElementById('dynamic-total');

            function updateLiveTotal() {
                if (!qtyInput || !dynamicTotal || !totalPriceBlock || basePrice === 0) return;

                let currentQty = parseInt(qtyInput.value) || 1;
                let total = basePrice * currentQty;

                // Форматуємо число з пропусками (наприклад: 12 500)
                dynamicTotal.textContent = new Intl.NumberFormat('uk-UA').format(total);

                // Якщо кількість > 1, плавно показуємо блок "Разом", якщо 1 — ховаємо
                if (currentQty > 1) {
                    totalPriceBlock.classList.remove('d-none');
                } else {
                    totalPriceBlock.classList.add('d-none');
                }
            }

            if (btnMinus && btnPlus && qtyInput) {
                btnMinus.addEventListener('click', function () {
                    let current = parseInt(qtyInput.value) || 1;
                    if (current > 1) {
                        qtyInput.value = current - 1;
                        updateLiveTotal();
                    }
                });

                btnPlus.addEventListener('click', function () {
                    let current = parseInt(qtyInput.value) || 1;
                    qtyInput.value = current + 1;
                    updateLiveTotal();
                });
            }

            // AJAX додавання в кошик
            const successMsg = document.querySelector('.cart-success-msg');
            const navbarCartCount = document.getElementById('cartCount');
            const navbarCartSum = document.getElementById('cartTotalNav');

            if (addToCartBtn) {
                addToCartBtn.addEventListener('click', function () {
                    const url = this.getAttribute('data-url');
                    const btnText = this.querySelector('.btn-text');
                    const selectedQty = qtyInput ? (parseInt(qtyInput.value) || 1) : 1;

                    if (!url) {
                        console.error('Помилка: Не вказано data-url на кнопці!');
                        return;
                    }

                    addToCartBtn.disabled = true;

                    fetch(url, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '',
                            'Accept': 'application/json'
                        },
                        body: JSON.stringify({ qty: selectedQty })
                    })
                        .then(response => {
                            if (!response.ok) throw new Error('Помилка сервера');
                            return response.json();
                        })
                        .then(data => {
                            addToCartBtn.disabled = false;

                            // Перетворюємо кнопку на зелену
                            addToCartBtn.removeAttribute('style');
                            addToCartBtn.classList.remove('custom-orange-btn');
                            addToCartBtn.classList.add('btn-success');

                            if (btnText) btnText.textContent = 'У кошику';

                            if (successMsg) {
                                successMsg.classList.remove('d-none');
                            }

                            // Оновлення кількості в навбарі
                            if (navbarCartCount && data.count !== undefined) {
                                navbarCartCount.textContent = data.count;
                                navbarCartCount.classList.remove('d-none');
                            }

                            // Оновлення суми в навбарі
                            if (navbarCartSum && data.total !== undefined) {
                                navbarCartSum.textContent = data.total.toLocaleString('ru-RU');
                            }
                        })
                        .catch(error => {
                            addToCartBtn.disabled = false;
                            alert('Не вдалося додати товар у кошик. Спробуйте ще раз.');
                            console.error(error);
                        });
                });
            }
        });
    </script>
@endsection
