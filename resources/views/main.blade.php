@extends('layouts.main')

@section('content')

{{-- 1. Hero Секція (Перший екран) --}}

<section class="container-1600 my-5">
<div class="hero-production p-4 p-md-5 shadow-lg"
style="background: linear-gradient(90deg, rgba(15, 23, 42, 0.9) 0%, rgba(15, 23, 42, 0.4) 60%, rgba(15, 23, 42, 0.1) 100%),
     url('{{ asset('images/chimney/headbanner.webp') }}') center/cover no-repeat;">
       <div class="row w-100 align-items-center">
    
    <!-- ЛІВА ЧАСТИНА -->
    <div class="col-lg-7">
        <span class="badge production-badge px-3 py-2 rounded-pill mb-3">
            <i class="bi bi-shield-check text-warning me-1"></i> Виробництво з 2012 року
        </span>

        <h1 class="display-3 fw-bold mb-4">
            Надійні димоходи <br>
            <span class="text-warning">від виробника</span>
        </h1>

        <p class="fs-5 text-white-50 mb-4">
            Проектуємо та виготовляємо димохідні системи з високоякісної нержавіючої сталі. 
            Гарантія герметичності, відповідність пожежним нормам та індивідуальні рішення.
        </p>

        <div class="d-flex gap-3">
            <a href="{{ route('shop.index') }}" class="btn btn-warning btn-lg fw-bold px-4">
                Купити димохід
            </a>
            <a href="{{ route('useful.index') }}" class="btn btn-outline-light btn-lg px-4">
                Корисна інформація
            </a>
        </div>
    </div>

    <!-- ПРАВА ЧАСТИНА -->
    <div class="col-lg-5">
        <div class="hero-stats-overlay">
    <div class="stat-item">✓ Власне виробництво</div>
    <div class="stat-item">✓ AISI 304 / 321</div>
    <div class="stat-item">✓ Гарантія до 10 років</div>
    <div class="stat-item">✓ Доставка по Україні</div>
</div>
    </div>

</div>
    </div>
</section>

<section class="container-1600 py-5">
    <div class="text-center mb-5">
        <h2 class="fw-bold display-6 mb-3">Технічні рішення</h2>
        <div class="mx-auto bg-warning" style="width: 60px; height: 3px;"></div>
    </div>

   <div class="row g-4">
    @foreach([
    [
        'cat' => 'single',
        'img' => 'single-wall-banner.webp',
        'title' => 'Система одностінних димоходів',
        'desc' => 'Ø100–350 мм. Використання: гільзування, внутрішні канали, ремонт існуючих шахт.'
    ],
    [
        'cat' => 'sandwich',
        'img' => 'sandwich-banner.webp',
        'title' => 'Термо (сендвіч) система',
        'desc' => 'Ізоляція 30/50 мм. Призначення: зовнішній монтаж, стабільна тяга, захист від конденсату.',
        'badge' => 'Хіт продажів'
    ],
    [
        'cat' => 'fittings',
        'img' => 'fittings-banner.webp',
        'title' => 'Система комплектуючих',
        'desc' => 'Коліна, трійники, ревізії, дефлектори. Повна збірка будь-якої конфігурації.'
    ],
    [
        'cat' => 'oval',
        'img' => 'oval-banner.webp',
        'title' => 'Система овальних нержавіючіх димоходів',
        'desc' => 'Труби, коліна, трійники, ревізії.'
    ]
] as $item)
    <div class="col-12 col-md-6">
        <div class="card h-100 border-0 shadow-sm custom-product-card">
            <a href="{{ route('shop.index', ['category' => $item['cat']]) }}" class="img-container">
                <img src="{{ asset('images/chimney/' . $item['img']) }}" alt="{{ $item['title'] }}" class="product-img">
            </a>
            <div class="card-body p-4 text-center">
                @if(isset($item['badge']))
                    <span class="badge bg-warning text-dark mb-3 px-3 py-2">{{ $item['badge'] }}</span>
                @endif
                <h3 class="h4 fw-bold mb-3">{{ $item['title'] }}</h3>
                <p class="text-muted mb-4">{{ $item['desc'] }}</p>
                <a href="{{ route('shop.index', ['category' => $item['cat']]) }}" class="btn btn-outline-dark rounded-pill px-4">Каталог</a>
            </div>
        </div>
    </div>
    @endforeach
</div>
</section>
<section class="container-1600 py-5">
    <div class="text-center mb-5">
        <h2 class="fw-bold display-6 mb-3">Технології виробництва димоходів з нержавіючої сталі</h2>
        <div class="mx-auto bg-warning" style="width: 60px; height: 3px;"></div>
        <p class="text-muted mt-3">
            Контроль якості на кожному етапі виготовлення димохідних систем
        </p>
    </div>

    <div class="row g-4">

        @foreach([
            [
                'img' => 'tech-cutting.webp',
                'title' => 'Лазерне різання',
                 'alt' => 'Лазерне різання нержавіючої сталі на виробництві димоходів',
                'desc' => 'Точний розкрій нержавіючої сталі без деформації матеріалу.'
            ],
            [
                'img' => 'tech-rolling.webp',
                'title' => 'Формування труб',
                'alt' => 'Формування труб з нержавіючої сталі',
                'desc' => 'Формування труб та фасонних елементів різного діаметра з точним дотриманням геометричних параметрів.'
            ],
            [
                'img' => 'tech-welding.webp',
                'title' => 'Аргонне шовне зварювання',
                'alt' => 'Аргонне шовне зварювання димохідних труб',
                'desc' => 'Забезпечує герметичність з’єднань і стійкість виробів до високих температур.'
            ],
            [
                'img' => 'tech-welding-orbital.webp',
                'title' => 'Орбітальне зварювання',
                'alt' => 'Орбітальне зварювання елементів димоходу',
                'desc' => 'Дозволяє отримати рівний, акуратний та надзвичайно міцний зварювальний шов.'
            ],
             [
                'img' => 'tech-bending.webp',
                'title' => 'Згинання металу',
                'alt' => 'Згинання металу на листозгинальному пресі',
                'desc' => 'Сучасний листозгинальний прес дозволяє виконувати рівні та точні згини металу для виготовлення якісних виробів.'
            ],
            [
                'img' => 'tech-expansion.webp',
                'title' => 'Розширення торців труб',
                'alt' => 'Розширення торців труб для монтажу димоходів',
                'desc' => 'Забезпечує надійне стикування елементів димоходу та правильний напрямок руху конденсату.'
            ],
            [
                'img' => 'tech-3d-cutting.webp',
                'title' => '3D різання',
                'alt' => '3D різання металу та труб на виробництві димоходів',
                'desc' => 'Сучасна технологія дає змогу виготовляти вироби складної конфігурації та виконувати точне різання отворів у металі та трубах.'
            ],
            [
                'img' => 'tech-quality.webp',
                'title' => 'Контроль якості',
                'alt' => 'Перевірка якості димоходів з нержавіючої сталі перед відправкою',
                'desc' => 'Кожен виріб проходить перевірку геометрії, якості швів та відповідності технічним вимогам.'
            ]
        ] as $item)

        <div class="col-lg-3 col-md-6">
            <div class="card border-0 shadow-sm h-100 technology-card">

                <img src="{{ asset('images/chimney/' . $item['img']) }}"
                     class="card-img-top"
                     alt="{{ $item['alt'] }}"
                     loading="lazy">

                <div class="card-body text-center p-4">
                    <h3 class="h5 fw-bold mb-3">
                        {{ $item['title'] }}
                    </h3>

                    <p class="text-muted mb-0">
                        {{ $item['desc'] }}
                    </p>
                </div>

            </div>
        </div>

        @endforeach

    </div>
</section>

<section class="container-1600 py-5 section-gray">
    <div class="trust-block text-center">

        <h2 class="fw-bold mb-5">Нам довіряють по всій Україні</h2>

        <div class="row g-4">

            <div class="col-md-3 col-6">
                <div class="trust-item">
                    <div class="trust-number">12+</div>
                    <div class="trust-label">років досвіду</div>
                </div>
            </div>

            <div class="col-md-3 col-6">
                <div class="trust-item">
                    <div class="trust-number">5000+</div>
                    <div class="trust-label">замовлень</div>
                </div>
            </div>

            <div class="col-md-3 col-6">
                <div class="trust-item">
                    <div class="trust-number">1000+</div>
                    <div class="trust-label">об'єктів</div>
                </div>
            </div>

            <div class="col-md-3 col-6">
                <div class="trust-item">
                    <div class="trust-number">98%</div>
                    <div class="trust-label">задоволених клієнтів</div>
                </div>
            </div>

        </div>
    </div>
</section>
{{-- 3. Блок швидких посилань (Замість великих карток) --}}
<section class="container-1600 py-5">
    <div class="row g-4 align-items-center">
        <div class="col-md-6">
            <h3>Потрібна допомога з вибором?</h3>
            <p class="text-muted">Ми підготували для вас онлайн-калькулятор та інструкції, які допоможуть зробити правильний вибір без помилок.</p>
        </div>
        <div class="col-md-6 text-md-end">
    <a href="{{ route('useful.index') }}"
       class="btn btn-dark btn-lg px-5 py-3 fw-semibold">
        Перейти до розділу "Корисна інформація"
    </a>
</div>
    </div>
</section>
<section class="container-1600 py-5">
    <div class="seo-content">

        <h2 class="fw-bold mb-4">
            Виробництво димоходів з нержавіючої сталі
        </h2>

        <p>
            Компанія DymSystems "Центр Комплектації Димарів" спеціалізується на виготовленні димоходів з нержавіючої сталі для приватних будинків, котелень та промислових об’єктів. 
            Ми виробляємо одностінні та термоізольовані (сендвіч) системи, а також повний спектр комплектуючих для монтажу димохідних каналів.
        </p>

        <p>
            У виробництві використовується нержавіюча сталь марок AISI 304 та AISI 321, що забезпечує високу стійкість до корозії, 
            перепадів температур і агресивних продуктів згоряння. Це гарантує довгий термін служби та безпечну експлуатацію систем.
        </p>

        <p>
            Димохідні системи підбираються індивідуально під кожен об’єкт з урахуванням потужності котла, типу палива та умов монтажу. 
            Ми допомагаємо клієнтам правильно розрахувати діаметр, висоту та конфігурацію системи, щоб забезпечити стабільну тягу.
        </p>

        <p>
            Основні запити, за якими нас знаходять: димоходи з нержавійки, купити димохід, сендвіч димохід, виробник димоходів. 
            Наша продукція відповідає будівельним та пожежним нормам України.
        </p>

    </div>
</section>
<section class="container-1600 py-5">
    <div class="cta-block">

        <div class="row align-items-center">

            <div class="col-lg-8">
                <h2 class="fw-bold mb-3">
                    Розрахунок димохідної системи під ваш об’єкт
                </h2>

                <p class="mb-0 cta-text">
                    Інженер виконає підбір діаметра, висоти та конфігурації системи відповідно до типу котла, палива та умов монтажу.
                </p>
            </div>

            <div class="col-lg-4 text-lg-end mt-4 mt-lg-0">
                <a href="{{ route('chimney.installation-rules') }}#form"
                   class="btn btn-warning btn-lg fw-bold px-4">
                    Отримати консультацію
                </a>
            </div>

        </div>

    </div>
</section>
<section class="container-1600 py-5">
    <div class="text-center mb-5">
        <h2 class="fw-bold display-6 mb-3">Реалізовані об’єкти</h2>
        <div class="mx-auto bg-warning" style="width: 60px; height: 3px;"></div>
        <p class="text-muted mt-3">Приклади встановлених димохідних систем під різні типи об’єктів</p>
    </div>

    <div class="row g-4">
        {{-- Масив з даними для швидкої зміни --}}
        @foreach([
            ['img' => 'house-project.webp', 'title' => 'Приватний будинок', 'text' => 'Сендвіч-димохід Ø200 мм для твердопаливного котла. Висота 7.5 м, утеплення 50 мм.', 'meta' => ['стабільна тяга', 'відсутність конденсату', 'зовнішній монтаж']],
            ['img' => 'commercial-project.webp', 'title' => 'Котельня комерційна', 'text' => 'Модульна система з AISI 321 для газових котлів. Ø250 мм, інженерний розрахунок.', 'meta' => ['висока температура', 'кислотостійка сталь', 'ревізійні вузли']],
            ['img' => 'industrial-project.webp', 'title' => 'Промисловий об’єкт', 'text' => 'Димова система великого діаметра Ø300+ мм. Робота з високим навантаженням.', 'meta' => ['підсилена конструкція', 'теплоізоляція 50 мм', 'довгий ресурс']]
        ] as $item)
        <div class="col-lg-4">
            <div class="card h-100 border-0 shadow-sm custom-product-card overflow-hidden">
                <div class="img-container">
                    <img src="{{ asset('images/chimney/' . $item['img']) }}" alt="{{ $item['title'] }}" class="product-img">
                </div>
                <div class="card-body p-4">
                    <h3 class="h5 fw-bold mb-3 text-center">{{ $item['title'] }}</h3>
                    <p class="text-muted small mb-3">{{ $item['text'] }}</p>
                    <div class="case-meta border-top pt-3 mt-2">
                        @foreach($item['meta'] as $m)
                            <div class="small text-dark mb-1"><i class="bi bi-check2-circle text-warning me-2"></i>{{ $m }}</div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>
{{-- 4. Переваги (Короткий блок для довіри) --}}
<section class="py-5 border-top bg-white">
    <div class="container-1600">

        <div class="text-center mb-5">
            <h2 class="fw-bold">Чому обирають DymSystems</h2>
            <p class="text-muted">
                Власне виробництво димохідних систем з нержавіючої сталі
            </p>
        </div>

        <div class="row g-4 text-center">

            <div class="col-lg-2 col-md-4 col-6">
                <i class="bi bi-shield-check fs-1 text-warning"></i>
                <h3 class="mt-3 fw-bold fs-6">AISI 304 / 321</h3>
                <small class="text-muted">
                    Стійкість до корозії та високих температур
                </small>
            </div>

            <div class="col-lg-2 col-md-4 col-6">
                <i class="bi bi-gear-wide-connected fs-1 text-warning"></i>
               <h3 class="mt-3 fw-bold fs-6">Власне виробництво</h3>
                <small class="text-muted">
                    Контроль якості на кожному етапі
                </small>
            </div>

            <div class="col-lg-2 col-md-4 col-6">
                <i class="bi bi-calendar-check fs-1 text-warning"></i>
                <h3 class="mt-3 fw-bold fs-6">12+ років</h3>
                <small class="text-muted">
                    Досвід виробництва та монтажу
                </small>
            </div>

            <div class="col-lg-2 col-md-4 col-6">
                <i class="bi bi-award fs-1 text-warning"></i>
                <h3 class="mt-3 fw-bold fs-6">Гарантія якості</h3>
                <small class="text-muted">
                    Відповідність технічним вимогам
                </small>
            </div>

            <div class="col-lg-2 col-md-4 col-6">
                <i class="bi bi-truck fs-1 text-warning"></i>
                <h3 class="mt-3 fw-bold fs-6">Швидка доставка</h3>
                <small class="text-muted">
                    Відправлення по всій Україні
                </small>
            </div>

            <div class="col-lg-2 col-md-4 col-6">
                <i class="bi bi-person-workspace fs-1 text-warning"></i>
                <h3 class="mt-3 fw-bold fs-6">Консультація інженера</h3>
                <small class="text-muted">
                    Допомога з розрахунком системи
                </small>
            </div>

        </div>

    </div>
</section>

@endsection