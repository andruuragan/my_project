@extends('layouts.main')

@section('content')

    <div class="container-1600 shop-page">



        <div class="title-shop text-center mb-5 mt-3">
            <h1 class="fw-bold text-dark position-relative d-inline-block pb-3 fs-2">
                Каталог елементів димохода
                <!-- Акцентне підкреслення -->
                <span class="position-absolute bottom-0 start-50 translate-middle-x rounded-pill" style="width: 80px; height: 4px; background-color: #d97706;"></span>
            </h1>
        </div>

        <div class="row">

            <!-- SIDEBAR FILTER -->
            <div class="col-xl-2 col-lg-3 mb-4 align-self-start">
                <div class="card p-3 shadow-sm filter-card">

                    <h5>
                        <i class="bi bi-sliders me-2"></i>
                        Фільтр товарів
                    </h5>

                    <form class="filter-form" method="GET" action="{{ route('shop.index') }}">

                        <div class="mb-3">
                            <label class="form-label">Назва елемента</label>
                            <input type="text"
                                   name="name"
                                   value="{{ request('name') }}"
                                   class="form-control">
                        </div>

                        {{-- TYPE --}}
                        @php
                            $types = [
                                'Труба',
                                'Коліно 45°',
                                'Коліно 90°',
                                'Трійник 90°',
                                'Трійник 45°',
                                'Вольпер',
                                'Грибок',
                                'Іскрогасник',
                                'Регулятор тяги(Кагла)',
                                'Лійка',
                                'Окапник',
                                'Закінчення димоходу',
                                'Перехід',
                                'Радіатор',
                                'Ревізія',
                                'Розета',
                                'Сітка',
                                'Скоба',
                                'Криза',
                                'Кронштейн',
                                'Розвантажувальна підставка',
                                'Обжимний хомут',
                                'Хомут під розтяжки',
                                'Стіновий хомут',
                                'Монтажний хомут',
                                'Конус',
                                'Термоґрибок',
                                'Дека',
                                'Заглушка',
                                'Старт-сендвіч',
                                'Труба-подовжувач',
                                'Прохід',
                                'Відображувач',
                            ];
                        @endphp

                        <div class="mb-3">
                            <label class="form-label">Тип</label>
                            <select name="type" class="js-choice">
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
                            $diameters = ['100', '110', '120', '125', '130', '140', '150', '160', '170', '180',
                                '190', '200', '210', '220', '230', '240', '250', '260', '270', '280',
                                '290', '300', '310', '320', '330', '350', '360', '370', '380', '400',
                                '420', '450', '460', '500', '520', '860',
                                '100/160', '110/180', '120/180', '130/200', '140/200',
                                '150/220', '160/220', '180/250', '200/260', '220/280',
                                '230/300', '250/320', '300/360', '350/420', '400/460',
                                '500/560', '100/200', '120/220', '130/230', '140/240',
                                '150/250', '160/260', '180/280', '200/300'];
                        @endphp

                        <div class="mb-3">
                            <label class="form-label">Діаметр</label>
                            <select name="diameter" class="js-choice">
                                <option value="">Все</option>
                                @foreach($diameters as $d)
                                    <option value="{{ $d }}" @selected(request('diameter') == $d)>
                                        {{ $d }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        @php
                            $thicknesses = [
                                '0,5 мм',
                                '0,8 мм',
                                '1 мм',
                                '2 мм',
                            ];
                        @endphp

                        <div class="mb-3">
                            <label class="form-label" for="thickness">Товщина нерж.</label>

                            <select id="thickness" name="thickness" class="js-choice">
                                <option value="">Все</option>

                                @foreach($thicknesses as $t)
                                    <option value="{{ $t }}"
                                        {{ request('thickness') == $t ? 'selected' : '' }}>
                                        {{ $t }}
                                    </option>
                                @endforeach

                            </select>
                        </div>

                        @php
                            $grades = [
                                '304' => '304 AISI',
                                '321' => '321 AISI',
                                '201' => '201 AISI',
                                '430' => '430 AISI',
                            ];
                        @endphp

                        <div class="mb-3">
                            <label class="form-label" for="grade">Марка нерж.</label>

                            <select id="grade" name="grade" class="js-choice">
                                <option value="">Все</option>

                                @foreach($grades as $value => $label)
                                    <option value="{{ $value }}"
                                        {{ request('grade') == $value ? 'selected' : '' }}>
                                        {{ $label }}
                                    </option>
                                @endforeach

                            </select>
                        </div>
                        @php
                            $chimneyTypes = [
                                'Одностінний',
                                'Термо',
                            ];
                        @endphp

                        <div class="mb-3">
                            <label class="form-label" for="chimneyType">Тип димохода</label>

                            <select id="chimneyType" name="chimneyType" class="js-choice">
                                <option value="">Все</option>

                                @foreach($chimneyTypes as $type)
                                    <option value="{{ $type }}"
                                        {{ request('chimneyType') == $type ? 'selected' : '' }}>
                                        {{ $type }}
                                    </option>
                                @endforeach

                            </select>
                        </div>

                        @php
                            $casings = [
                                'н/н',
                                'н/оц',
                            ];
                        @endphp

                        <div class="mb-3">
                            <label class="form-label" for="casing">Кожух</label>

                            <select id="casing" name="casing" class="js-choice">
                                <option value="">Все</option>

                                @foreach($casings as $casing)
                                    <option value="{{ $casing }}"
                                        {{ request('casing') == $casing ? 'selected' : '' }}>
                                        {{ $casing }}
                                    </option>
                                @endforeach

                            </select>
                        </div>

                        {{-- PRICE --}}
                        <div class="mb-3">
                            <label class="form-label">Ціна до</label>
                            <input type="number"
                                   name="price_to"
                                   value="{{ request('price_to') }}"
                                   class="form-control">
                        </div>

                        <!-- flex-column вибудовує їх вертикально, gap-2 робить відступ між ними -->
                        <div class="d-flex flex-column gap-2 mt-3">

                            <a href="{{ route('shop.index') }}" class="filter-reset-btn text-center py-2 btn btn-outline-secondary rounded-pill w-100">
                                Скинути
                            </a>

                            <button class="filter-btn  rounded-pill w-100" type="submit">
                                Застосувати
                            </button>

                        </div>



                    </form>

                </div>
            </div>

            <!-- PRODUCTS -->
            <div class="col-lg-9 products-area">

                <div id="productsWrapper">
                    @include('partials.products', ['catalogs' => $catalogs])
                </div>

            </div>

        </div>
    </div>

    <!-- MODAL -->
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
    @push('styles')
        <style>
            select.js-choice {
                opacity: 0 !important;
                display: block !important;
                position: absolute;
                width: 100%;
                height: 42px;
                z-index: -1;
                pointer-events: none;
            }
        </style>
    @endpush
    <script>
        function animateFlyToCart(imgElement) {
            // Ищем саму кнопку корзины (или её контейнер), куда должна прилететь картинка
            const cartBtn = document.querySelector('.cart-btn') || document.getElementById('cartBtnContainer');
            if (!imgElement || !cartBtn) {
                console.warn('Анимация отменена: не найден элемент картинки или кнопка корзины в навбаре.');
                return;
            }

            // Получаем координаты стартовой точки (картинка) и финиша (корзина)
            const imgRect = imgElement.getBoundingClientRect();
            const cartRect = cartBtn.getBoundingClientRect();

            // Создаем временный клон картинки
            const clone = imgElement.cloneNode(true);
            clone.classList.add('flying-cart-item');

            // Стилизуем клон и ставим его точно поверх оригинала
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

            // Запускаем полёт в следующем кадре анимации
            // Запускаем полёт в следующем кадре анимации
            // Запускаем полёт в следующем кадре анимации
            // Запускаем полёт в следующем кадре анимации
            requestAnimationFrame(() => {
                // 1. Принудительно меняем точку трансформации на верхний левый угол клона.
                // Это уберёт хаотичные смещения при масштабировании (scale).
                clone.style.transformOrigin = 'left top';

                // 2. Рассчитываем точные координаты левого верхнего угла иконки корзины.
                // cartRect.left + 15px — это как раз место, где начинается рисунок корзины.
                const targetX = cartRect.left + 15;

                // cartRect.top + половина высоты кнопки — и вычитаем примерно 8-10px,
                // чтобы маленькая картинка встала ровно по центру высоты иконки.
                const targetY = cartRect.top + (cartRect.height / 2) - 8;

                // 3. Перемещаем клон ровно в цель и уменьшаем его до фиксированного размера
                clone.style.transform = `translate(${targetX - imgRect.left}px, ${targetY - imgRect.top}px) scale(0.12)`;
                clone.style.opacity = '0.15'; // Делаем почти прозрачным в самой корзине
            });

            // После завершения полёта удаляем клон и пружиним корзину
            setTimeout(() => {
                clone.remove();

                cartBtn.style.transform = 'scale(1.15)';
                setTimeout(() => {
                    cartBtn.style.transform = 'none';
                }, 150);
            }, 800);
        }

        // ======= 2. ОБРАБОТЧИК КЛИКА «КУПИТИ» =======
        document.addEventListener('click', function (e) {
            const buyBtn = e.target.closest('.add-cart-btn');
            if (!buyBtn) return;

            e.preventDefault();

            // Находим карточку и картинку внутри неё
            const card = buyBtn.closest('.product-card');
            if (!card) {
                console.error('Карточка продукту (.product-card) не знайдена!');
                return;
            }

            const productImg = card.querySelector('.product-image');

            // Вызываем функцию полёта, которую мы объявили выше
            if (productImg) {
                animateFlyToCart(productImg);
            } else {
                console.warn('Картинка с классом .product-image не найдена внутри карточки!');
            }

            // Дальше твой рабочий AJAX-запрос
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

            if (!csrfToken) {
                showAlert('Помилка безпеки (відсутній токен)', 'error');
                return;
            }

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
                    const data = await res.json().catch(() => null);

                    if (res.status === 401) {
                        showAlert('Потрібно авторизуватись', 'error');
                        return null;
                    }

                    if (!res.ok) {
                        showAlert(data?.message || 'Помилка', 'error');
                        return null;
                    }

                    return data;
                })
                .then(data => {
                    if (!data) return;

                    if (data.success) {
                        if (typeof refreshCart === 'function') {
                            refreshCart();
                        }
                        showAlert('Додано у кошик', 'success');
                    }
                })
                .catch(err => {
                    console.error('Помилка:', err);
                    showAlert('Сталася помилка при додаванні', 'error');
                });
        });



        document.addEventListener('DOMContentLoaded', function () {

            // НАХОДИМ МОДАЛКУ ОДИН РАЗ
            const modalEl = document.getElementById('imageModal');
            let modalInstance = null;

            if (modalEl) {
                modalInstance = bootstrap.Modal.getOrCreateInstance(modalEl);
            }

            // ОТКРЫТИЕ ИЗОБРАЖЕНИЯ
            document.addEventListener('click', function (e) {

                const btn = e.target.closest('.open-image');
                if (!btn) return;

                const modalEl = document.getElementById('imageModal');
                const modalImage = document.getElementById('modalImage');

                if (!modalEl || !modalImage) return;

                modalImage.src = btn.dataset.image;

                const modalInstance = bootstrap.Modal.getOrCreateInstance(modalEl);
                modalInstance.show();
            });

            // РУЧНОЕ ЗАКРЫТИЕ НА КРЕСТИК
            const closeBtn = modalEl ? modalEl.querySelector('.btn-close') : null;
            if (closeBtn) {
                closeBtn.addEventListener('click', function () {
                    if (modalInstance) {
                        modalInstance.hide();
                    }
                });
            }

        });
    </script>

@endsection

@push('styles')
    <style>
        /* Повністю ховаємо рідні селектори, поки JS не перетворить їх на красиві */
        select.js-choice {
            display: none !important;
        }
    </style>
@endpush
