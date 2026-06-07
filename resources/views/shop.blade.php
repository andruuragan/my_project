@extends('layouts.main')

@section('content')

    <div class="container-1600 shop-page">

        <div class="title-shop text-center mb-5 mt-3">
            <h1 class="fw-bold text-dark position-relative d-inline-block pb-3 fs-2">
                Каталог елементів димоходу
                <span class="position-absolute bottom-0 start-50 translate-middle-x rounded-pill" style="width: 80px; height: 4px; background-color: #d97706;"></span>
            </h1>
        </div>

        <div class="row">

            <div class="col-xl-2 col-lg-3 mb-4 align-self-start">
                <div class="card p-3 shadow-sm filter-card">

                    <h5>
                        <i class="bi bi-sliders me-2"></i>
                        Фільтр товарів
                    </h5>

                    <form class="filter-form" method="GET" action="{{ route('shop.index') }}">

                        <div class="mb-3">
                            <label class="form-label" for="element_name">Назва елемента</label>
                            <input type="text"
                                   id="element_name"
                                   name="name"
                                   value="{{ request('name') }}"
                                   class="form-control"
                                   autocomplete="off">
                        </div>

                        {{-- TYPE --}}
                        @php
                            $types = [
                                'Труба', 'Коліно 45°', 'Коліно 90°', 'Трійник 90°', 'Трійник 45°',
                                'Волпер', 'Грибок', 'Іскрогасник', 'Регулятор тяги(Кагла)', 'Лійка',
                                'Окапник', 'Закінчення димоходу', 'Переход', 'Радіатор', 'Ревізія',
                                'Розета', 'Сітка', 'Скоба', 'Криза', 'Кронштейн',
                                'Розвантажувальна підставка', 'Обжимний хомут', 'Хомут під розтяжки',
                                'Стіновий хомут', 'Монтажний хомут', 'Конус', 'Термоґрибок', 'Дека',
                                'Заглушка', 'Старт-сендвіч', 'Труба-подовжувач', 'Прохід', 'Відображувач'
                            ];
                        @endphp

                        <div class="mb-3" x-ignore>
                            <label class="form-label" for="filter-element_type">Тип</label>
                            <select id="filter-element_type" name="type" class="js-choice" autocomplete="off">
                                <option value="">Все</option>
                                @foreach($types as $type)
                                    <option value="{{ $type }}" @selected(request('type') == $type)>
                                        {{ $type }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        {{-- DIAMETER --}}
                        @php
                            $diameters = [
                                '100', '110', '120', '125', '130', '140', '150', '160', '170', '180',
                                '190', '200', '210', '220', '230', '240', '250', '260', '270', '280',
                                '290', '300', '310', '320', '330', '350', '360', '370', '380', '400',
                                '420', '450', '460', '500', '520', '860',
                                '100/160', '110/180', '120/180', '130/200', '140/200',
                                '150/220', '160/220', '180/250', '200/260', '220/280',
                                '230/300', '250/320', '300/360', '350/420', '400/460',
                                '500/560', '100/200', '120/220', '130/230', '140/240',
                                '150/250', '160/260', '180/280', '200/300'
                            ];
                        @endphp

                        <div class="mb-3" x-ignore>
                            <label class="form-label" for="filter-element_diameter">Діаметр</label>
                            <select id="filter-element_diameter" name="diameter" class="js-choice" autocomplete="off">
                                <option value="">Все</option>
                                @foreach($diameters as $d)
                                    <option value="{{ $d }}" @selected(request('diameter') == $d)>
                                        {{ $d }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        {{-- THICKNESS --}}
                        @php
                            $thicknesses = ['0,5 мм', '0,8 мм', '1 мм', '2 мм'];
                        @endphp

                        <div class="mb-3" x-ignore>
                            <label class="form-label" for="filter-thickness">Товщина нерж.</label>
                            <select id="filter-thickness" name="thickness" class="js-choice" autocomplete="off">
                                <option value="">Все</option>
                                @foreach($thicknesses as $t)
                                    <option value="{{ $t }}" @selected(request('thickness') == $t)>
                                        {{ $t }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        {{-- GRADE --}}
                        @php
                            $grades = [
                                '304' => '304 AISI',
                                '321' => '321 AISI',
                                '201' => '201 AISI',
                                '430' => '430 AISI',
                            ];
                        @endphp

                        <div class="mb-3" x-ignore>
                            <label class="form-label" for="filter-grade">Марка нерж.</label>
                            <select id="filter-grade" name="grade" class="js-choice" autocomplete="off">
                                <option value="">Все</option>
                                @foreach($grades as $value => $label)
                                    <option value="{{ $value }}" @selected(request('grade') == $value)>
                                        {{ $label }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        {{-- CHIMNEY TYPE --}}
                        @php
                            $chimneyTypes = ['Одностінний', 'Термо'];
                        @endphp

                        <div class="mb-3" x-ignore>
                            <label class="form-label" for="filter-chimneyType">Тип димохода</label>
                            <select id="filter-chimneyType" name="chimneyType" class="js-choice" autocomplete="off">
                                <option value="">Все</option>
                                @foreach($chimneyTypes as $type)
                                    <option value="{{ $type }}" @selected(request('chimneyType') == $type)>
                                        {{ $type }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        {{-- CASING --}}
                        @php
                            $casings = ['н/н', 'н/оц'];
                        @endphp

                        <div class="mb-3" x-ignore>
                            <label class="form-label" for="filter-casing">Кожух</label>
                            <select id="filter-casing" name="casing" class="js-choice" autocomplete="off">
                                <option value="">Все</option>
                                @foreach($casings as $casing)
                                    <option value="{{ $casing }}" @selected(request('casing') == $casing)>
                                        {{ $casing }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        {{-- PRICE --}}
                        <div class="mb-3">
                            <label class="form-label" for="price_to">Ціна до</label>
                            <input type="number"
                                   id="price_to"
                                   name="price_to"
                                   value="{{ request('price_to') }}"
                                   class="form-control"
                                   autocomplete="off">
                        </div>

                        <div class="d-flex flex-column gap-2 mt-3">
                            <a href="{{ route('shop.index') }}" class="filter-reset-btn text-center py-2 btn btn-outline-secondary rounded-pill w-100">
                                Скинути
                            </a>
                            <button class="filter-btn rounded-pill w-100" type="submit">
                                Застосувати
                            </button>
                        </div>

                    </form>

                </div>
            </div>

            <div class="col-lg-9 products-area">
                <div id="productsWrapper">
                    @include('partials.products', ['catalogs' => $catalogs])
                </div>
            </div>

        </div>
    </div>

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
    // Анимация полета товара в корзину
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
            const targetX = cartRect.left + 15;
            const targetY = cartRect.top + (cartRect.height / 2) - 8;
            clone.style.transform = `translate(${targetX - imgRect.left}px, ${targetY - imgRect.top}px) scale(0.12)`;
            clone.style.opacity = '0.15';
        });

        setTimeout(() => {
            clone.remove();
            cartBtn.style.transform = 'scale(1.15)';
            setTimeout(() => { cartBtn.style.transform = 'none'; }, 150);
        }, 800);
    }

    // Делегированный клик «КУПИТИ» (работает и после AJAX фильтрации)
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

        fetch(url, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': csrfToken,
                'Accept': 'application/json',
                'X-Requested-With': 'XMLHttpRequest'
            },
            body: formData
        })
        .then(async res => {
            if (!res.ok) return null;
            return res.json().catch(() => null);
        })
        .then(data => {
            if (data && data.success) {
                if (typeof refreshCart === 'function') refreshCart();
                if (typeof showAlert === 'function') showAlert('Додано у кошик', 'success');
            }
        })
        .catch(err => console.error('Помилка:', err));
    });

    // Обработка модальных окон изображений
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
            if (!modalEl || !modalImage) return;

            modalImage.src = btn.dataset.image;
            if (modalInstance) modalInstance.show();
        });
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