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

                <div class="row">

                    @forelse($catalogs as $catalog)

                        <div class="col-xl-3 col-lg-4 col-md-6 mb-4">

                            <div class="card product-card shadow-sm h-100">

                                <div class="position-relative product-image-wrapper">

                                    <img src="{{ Storage::url($catalog->image) }}"
                                         class="card-img-top product-image"
                                         alt="{{ $catalog->name }}"
                                         loading="lazy">

                                </div>

                                <div class="card-body d-flex flex-column">

                                    <h6 class="product-title">
                                        {{ $catalog->name }}
                                    </h6>

                                    <div class="product-specs">
                                        Ø{{ $catalog->diameter }} • {{ $catalog->thickness }} • AISI {{ $catalog->grade }}
                                    </div>

                                    <div class="product-price price-divider">
        <span class="item-price"
              data-price="{{ $catalog->price }}">
            {{ number_format($catalog->price, 0, '.', ' ') }}
        </span>
                                        грн
                                    </div>

                                    <!-- 🔥 ЦЕ ВАЖЛИВО ДЛЯ JS -->
                                    <div class="total-price mb-2">
                                        <span class="text-muted">Сума:</span>
                                        <strong class="total-sum">
                                            {{ number_format($catalog->price, 0, '.', ' ') }}
                                        </strong>
                                        грн
                                    </div>

                                    <form action="{{ route('cart.add', $catalog) }}" method="POST">
                                        @csrf

                                        <div class="quantity-box">

                                            <button type="button" class="qty-btn minus">−</button>

                                            <input type="number"
                                                   name="qty"
                                                   value="1"
                                                   min="1"
                                                   class="qty-input qty-value">

                                            <button type="button" class="qty-btn plus">+</button>

                                        </div>

                                        <button class="add-cart-btn mt-3">
                                            У кошик
                                        </button>

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

        </div>
    </div>

    <!-- MODAL -->
    <div class="modal fade" id="imageModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">

                <button type="button"
                        class="btn-close position-absolute top-0 end-0 m-3"
                        data-bs-dismiss="modal"></button>

                <div class="modal-body text-center p-0">
                    <img id="modalImage" class="img-fluid" style="max-height:85vh;">
                </div>

            </div>
        </div>
    </div>

@endsection


