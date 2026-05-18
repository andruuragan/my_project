@extends('layouts.main')

@section('content')

    <div class="container-1600 shop-page">

        <div class="title-shop text-center mb-4">
            <h3>Каталог елементів димохода</h3>
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
                            <label class="form-label">Назва</label>
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
                            <label class="form-label" for="thickness">Товщина сталі</label>

                            <select id="thickness" name="thickness" class="js-choice">
                                <option value="">Толщина (все)</option>

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
                                <option value="">Марка нерж. (все)</option>

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
                                <option value="">Тип дымохода (все)</option>

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
                                <option value="">Кожух (все)</option>

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

                        <button class="filter-btn" type="submit">
                            Застосувати
                        </button>

                        <a href="{{ route('shop.index') }}" class="filter-reset-btn">
                            Скинути
                        </a>

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
    <script>
        document.addEventListener('submit', function (e) {
            const form = e.target.closest('.add-to-cart-form');
            if (!form) return;

            e.preventDefault();

            fetch(form.action, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': form.querySelector('[name="_token"]').value,
                    'Accept': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest'
                },
                body: new FormData(form)
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

                    refreshCart();
                    showAlert('Додано у кошик', 'success');
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


