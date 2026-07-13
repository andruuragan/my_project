@extends('layouts.main')

@section('content')

{{-- 1. Hero Секція --}}
<section class="container-1600 my-5">
    <div class="hero-production p-4 p-md-5 shadow-lg" style="background: linear-gradient(90deg, rgba(15, 23, 42, 0.9) 0%, rgba(15, 23, 42, 0.4) 60%, rgba(15, 23, 42, 0.1) 100%), url('{{ asset('images/chimney/headbanner.webp') }}') center/cover no-repeat;">
        <div class="row w-100 align-items-center">
            <div class="col-lg-7">
                <span class="badge production-badge px-3 py-2 rounded-pill mb-3">
                    <i class="bi bi-shield-check text-warning me-1"></i> Виробництво з 2012 року
                </span>
                <h1 class="display-3 fw-bold mb-4">Надійні димоходи <br><span class="text-warning">від виробника</span></h1>
                <p class="fs-5 text-white-50 mb-4">Проектуємо та виготовляємо димохідні системи з високоякісної нержавіючої сталі. Гарантія герметичності, відповідність пожежним нормам та індивідуальні рішення.</p>
                <div class="d-flex gap-3">
                    <a href="{{ route('shop.index') }}" class="btn btn-warning btn-lg fw-bold px-4">Купити димохід</a>
                    <a href="{{ route('useful.index') }}" class="btn btn-outline-light btn-lg px-4">Корисна інформація про димоходи</a>
                </div>
            </div>
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
        'img' => 'single-wall-banner1.webp',
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
        'title' => 'Система кріпленнь, хомутів, завершальних та прохідних елементів',
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
        <div class="card h-100 border-0 shadow-sm custom-product-card solution-card">
           <a href="{{
    $item['cat'] === 'single'
        ? route('single-wall-system')
        : ($item['cat'] === 'sandwich'
            ? route('sandwich-system')
            : route('shop.index', ['category' => $item['cat']]))
}}"
   class="img-container">
    <img src="{{ asset('images/chimney/' . $item['img']) }}"
         width="500"
         height="500"
         alt="{{ $item['title'] }}"
         class="product-img"
         loading="lazy"
         decoding="async">
</a>
            <div class="card-body p-4 text-center">
                @if(isset($item['badge']))
                    <span class="badge bg-warning text-dark mb-3 px-3 py-2">{{ $item['badge'] }}</span>
                @endif
                <h3 class="h4 fw-bold mb-3">{{ $item['title'] }}</h3>
                <p class="text-muted mb-4">{{ $item['desc'] }}</p>
                <a href="{{
    $item['cat'] === 'single'
        ? route('single-wall-system')
        : ($item['cat'] === 'sandwich'
            ? route('sandwich-system')
            : route('shop.index', ['category' => $item['cat']]))
}}"
   class="btn btn-outline-dark rounded-pill px-4">
    Підібрати систему <i class="bi bi-arrow-right-circle ms-2"></i>
</a>
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
     width="1200"
     height="800"
     class="card-img-top"
     alt="{{ $item['alt'] }}"
     loading="lazy"
     decoding="async">

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
                    <div class="trust-number counter" data-target="12">12+</div>
                    <div class="trust-label">років досвіду</div>
                </div>
            </div>

            <div class="col-md-3 col-6">
                <div class="trust-item">
                    <div class="trust-number counter" data-target="5000">5000+</div>
                    <div class="trust-label">замовлень</div>
                </div>
            </div>

            <div class="col-md-3 col-6">
                <div class="trust-item">
                    <div class="trust-number counter" data-target="1000">1000+</div>
                    <div class="trust-label">об'єктів</div>
                </div>
            </div>

            <div class="col-md-3 col-6">
                <div class="trust-item">
                    <div class="trust-number counter" data-target="98">98%</div>
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
         <h2 class="fw-bold">Потрібна допомога з вибором?</h2>
            <p class="text-muted">Ми підготували для вас онлайн-калькулятор та інструкції, які допоможуть зробити правильний вибір без помилок.</p>
        </div>
        <div class="col-md-6 text-md-end">
    <a href="{{ route('useful.index') }}"
       class="btn btn-dark btn-lg px-5 py-3 fw-semibold">
        Перейти до розділу "Корисна інформація"<i class="bi bi-arrow-right-circle ms-2"></i>
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

            <div class="col-lg-4 text-center text-lg-end mt-4 mt-lg-0">
    <a href="{{ route('chimney.installation-rules') }}#form"
       class="btn btn-warning btn-lg fw-bold px-4">
        <i class="bi bi-telephone-fill me-2"></i>
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
            <div class="card h-100 border-0 shadow-sm custom-product-card project-card overflow-hidden">
                <div class="img-container">
                    <img src="{{ asset('images/chimney/' . $item['img']) }}"
     width="600"
     height="400"
     alt="{{ $item['title'] }}"
     class="product-img">
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
<section class="container-1600 py-5">
    <div class="cta-block">

        <div class="row align-items-center">

            <div class="col-lg-8">
                <h2 class="fw-bold mb-3">
                    Підберіть димохід за 1 хвилину
                </h2>

                <p class="mb-0 cta-text">
                    Відповідайте на кілька простих запитань, і конфігуратор запропонує відповідну димохідну систему саме для ваших умов.
                </p>
                <div class="d-flex flex-wrap gap-3 small fw-semibold text-success mt-3">
        <span><i class="bi bi-check-circle-fill me-1"></i>Безкоштовно</span>
        <span><i class="bi bi-check-circle-fill me-1"></i>До 1 хвилини</span>
        <span><i class="bi bi-check-circle-fill me-1"></i>Без реєстрації</span>
        <span><i class="bi bi-check-circle-fill me-1"></i>За вашими параметрами</span>
    </div>
            </div>

            <div class="col-lg-4 text-center text-lg-end mt-4 mt-lg-0">
                <a href="{{ route('categories.index') }}#configurator1"
                   class="btn btn-warning btn-lg fw-bold px-4">
                   <i class="bi bi-arrow-right-circle me-2"></i>Підібрати димохід
                </a>
            </div>

        </div>

    </div>
</section>

<section class="container-1600 py-5">
    <div class="text-center mb-5">
        <h2 class="fw-bold display-6 mb-3">Актуальні питання та популярні відповіді</h2>
        <div class="mx-auto bg-warning" style="width: 60px; height: 3px;"></div>
    </div>

    <div class="accordion" id="faqAccordion">

        <div class="accordion-item">
            <h3 class="accordion-header">
                <button class="accordion-button fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                    Яку нержавіючу сталь краще обрати для димоходу?
                </button>
            </h3>
            <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                    Для більшості побутових систем використовуються марки AISI 201, AISI 304 та AISI 321. Вони стійкі до корозії, конденсату та високих температур.
                </div>
            </div>
        </div>

        <div class="accordion-item">
            <h3 class="accordion-header">
                <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                    Який діаметр димоходу потрібен для котла?
                </button>
            </h3>
            <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                    Діаметр підбирається відповідно до потужності обладнання та рекомендацій виробника котла. Неправильно підібраний діаметр може погіршити тягу.
                </div>
            </div>
        </div>

        <div class="accordion-item">
            <h3 class="accordion-header">
                <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                    Чим відрізняється сендвіч-димохід від одностінного?
                </button>
            </h3>
            <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                    Сендвіч-система має шар теплоізоляції між двома трубами, що зменшує утворення конденсату та покращує стабільність тяги.
                </div>
            </div>
        </div>

        <div class="accordion-item">
            <h3 class="accordion-header">
                <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#faq4">
                    Яка товщина сталі оптимальна для димоходу?
                </button>
            </h3>
            <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                    Найчастіше використовується сталь товщиною від 0,5 до 1 мм. Вибір залежить від типу палива та температурного режиму роботи.
                </div>
            </div>
        </div>

        <div class="accordion-item">
            <h3 class="accordion-header">
                <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#faq5">
                    Чи можна встановлювати димохід зовні будинку?
                </button>
            </h3>
            <div id="faq5" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                    Так, для зовнішнього монтажу рекомендується використовувати утеплені сендвіч-димоходи, які забезпечують стабільну тягу в холодну пору року.
                </div>
            </div>
        </div>

        <div class="accordion-item">
            <h3 class="accordion-header">
                <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#faq6">
                    Як часто потрібно чистити димохід?
                </button>
            </h3>
            <div id="faq6" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                    Рекомендується проводити профілактичний огляд та очищення не рідше одного разу на рік або частіше при інтенсивній експлуатації.
                </div>
            </div>
        </div>

        <div class="accordion-item">
            <h3 class="accordion-header">
                <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#faq7">
                    Чи виготовляєте ви димоходи за індивідуальними розмірами?
                </button>
            </h3>
            <div id="faq7" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                    Так, ми можемо виготовити нестандартні елементи та димохідні системи відповідно до технічного завдання замовника.
                </div>
            </div>
        </div>

        <div class="accordion-item">
            <h3 class="accordion-header">
                <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#faq8">
                    Яка гарантія на продукцію?
                </button>
            </h3>
            <div id="faq8" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                    Термін гарантії залежить від типу виробу та марки сталі. Детальну інформацію можна отримати під час консультації.
                </div>
            </div>
        </div>

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
<script>
   
document.addEventListener('DOMContentLoaded', function () {
    const params = new URLSearchParams(window.location.search);

    if (params.get('modal') === 'login') {
        const loginModal = document.getElementById('loginModal');

        if (loginModal) {
            new bootstrap.Modal(loginModal).show();
        }
    }

    if (params.get('modal') === 'register') {
        const registerModal = document.getElementById('registerModal');

        if (registerModal) {
            new bootstrap.Modal(registerModal).show();
        }
    }
     const counters = document.querySelectorAll('.counter');

    const observer = new IntersectionObserver((entries) => {

        entries.forEach(entry => {

            if (!entry.isIntersecting) return;

            const counter = entry.target;
            const target = Number(counter.dataset.target);

            let start = 0;
            const duration = 1800;
            const startTime = performance.now();

            const suffix = counter.textContent.includes('%')
                ? '%'
                : counter.textContent.includes('+')
                    ? '+'
                    : '';

            function update(currentTime) {

                const progress = Math.min((currentTime - startTime) / duration, 1);

                const value = Math.floor(progress * target);

                counter.textContent = value + suffix;

                if (progress < 1) {
                    requestAnimationFrame(update);
                } else {
                    counter.textContent = target + suffix;
                }
            }

            requestAnimationFrame(update);

            observer.unobserve(counter);

        });

    }, {
        threshold: 0.5
    });

    counters.forEach(counter => observer.observe(counter));
});
</script>
@endsection

@push('schema-json-ld')
<script type="application/ld+json">
{!! json_encode([
    '@' . 'context' => 'https://schema.org',
    '@type' => 'WebSite',
    '@id' => url('/') . '#website',
    'url' => url('/'),
    'name' => 'DymSystems',
    'inLanguage' => 'uk-UA',
    'potentialAction' => [
        '@type' => 'SearchAction',
        'target' => url('/shop') . '?search={search_term_string}',
        'query-input' => 'required name=search_term_string'
    ]
], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) !!}
</script>
@endpush
@push('schema-breadcrumbs')
<script type="application/ld+json">
{!! json_encode([
  '@' . 'context' => 'https://schema.org',
  '@type' => 'BreadcrumbList',
  'itemListElement' => [
    [
      '@type' => 'ListItem',
      'position' => 1,
      'name' => 'Головна',
      'item' => url('/')
    ]
  ]
], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) !!}
</script>
@endpush
@push('schema-FAQ')
<script type="application/ld+json">
{!! json_encode([
    '@' . 'context' => 'https://schema.org',
    '@type' => 'FAQPage',
    'mainEntity' => [
        [
            '@type' => 'Question',
            'name' => 'Яку нержавіючу сталь краще обрати для димоходу?',
            'acceptedAnswer' => [
                '@type' => 'Answer',
                'text' => 'Для більшості побутових систем використовуються марки AISI 201, AISI 304 та AISI 321. Вони стійкі до корозії, конденсату та високих температур.'
            ]
        ],
        [
            '@type' => 'Question',
            'name' => 'Який діаметр димоходу потрібен для котла?',
            'acceptedAnswer' => [
                '@type' => 'Answer',
                'text' => 'Діаметр підбирається відповідно до потужності обладнання та рекомендацій виробника котла. Неправильний підбір може погіршити тягу.'
            ]
        ],
        [
            '@type' => 'Question',
            'name' => 'Чим відрізняється сендвіч-димохід від одностінного?',
            'acceptedAnswer' => [
                '@type' => 'Answer',
                'text' => 'Сендвіч-система має шар теплоізоляції між двома трубами, що зменшує утворення конденсату та покращує стабільність тяги.'
            ]
        ],
        [
            '@type' => 'Question',
            'name' => 'Яка товщина сталі оптимальна для димоходу?',
            'acceptedAnswer' => [
                '@type' => 'Answer',
                'text' => 'Найчастіше використовується сталь товщиною від 0,5 до 1 мм. Вибір залежить від типу палива та температурного режиму роботи.'
            ]
        ],
        [
            '@type' => 'Question',
            'name' => 'Чи можна встановлювати димохід зовні будинку?',
            'acceptedAnswer' => [
                '@type' => 'Answer',
                'text' => 'Так, для зовнішнього монтажу рекомендується використовувати утеплені сендвіч-димоходи, які забезпечують стабільну тягу в холодну пору року.'
            ]
        ],
        [
            '@type' => 'Question',
            'name' => 'Як часто потрібно чистити димохід?',
            'acceptedAnswer' => [
                '@type' => 'Answer',
                'text' => 'Рекомендується проводити профілактичний огляд та очищення не рідше одного разу на рік або частіше при інтенсивній експлуатації.'
            ]
        ],
        [
            '@type' => 'Question',
            'name' => 'Чи виготовляєте ви димоходи за індивідуальними розмірами?',
            'acceptedAnswer' => [
                '@type' => 'Answer',
                'text' => 'Так, ми виготовляємо нестандартні елементи та димохідні системи відповідно до технічного завдання замовника.'
            ]
        ],
        [
            '@type' => 'Question',
            'name' => 'Яка гарантія на продукцію?',
            'acceptedAnswer' => [
                '@type' => 'Answer',
                'text' => 'Термін гарантії залежить від типу виробу та марки сталі. Детальну інформацію можна отримати під час консультації.'
            ]
        ]
    ]
], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) !!}
</script>
@endpush
@push('schema-webpage')
<script type="application/ld+json">
{!! json_encode([
    '@' . 'context' => 'https://schema.org',
    '@type' => 'WebPage',

    '@id' => url()->current() . '#webpage',
    'url' => url()->current(),

    'name' => trim($__env->yieldContent('title')),
    'description' => trim($__env->yieldContent('description')),

    'inLanguage' => 'uk-UA',

    'isPartOf' => [
        '@type' => 'WebSite',
        '@id' => url('/') . '#website',
    ],
], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) !!}
</script>
@endpush