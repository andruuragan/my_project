@extends('layouts.main')

@section('title', 'Система одностінних димоходів')

@section('content')

<section class="container-1600 py-5">
 {{-- Навігаційні крихти (Breadcrumbs) --}}
                <nav aria-label="breadcrumb" class="mb-4">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item">
                            <a href="{{ route('main.index') }}" class="text-decoration-none text-black-50 hover-orange transition-all">Головна</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('categories.index') }}" class="text-decoration-none text-black-50 hover-orange transition-all">Категорії димарів</a>
                        </li>
                        <li class="breadcrumb-item active text-black" aria-current="page">
                            <span style="color: #f97316; font-weight: 500;">Система одностінних димоходів</span>
                        </li>
                    </ol>
                </nav>
    <div class="row align-items-center g-5">

        <div class="col-lg-6">

            <span class="badge bg-warning text-dark px-3 py-2 mb-3">
                DymSystems
            </span>
           <div class="display-3 text-warning mb-3">
    <i class="bi bi-ui-checks-grid"></i>
</div>

           <h1 class="display-5 fw-bold mb-4">
    Підбір одностінної димохідної системи
</h1>

            <p class="lead text-muted mb-4">
               Оберіть характеристики димохідної системи, після чого ми покажемо лише ті елементи, які підходять саме для вашого вибору.
            </p>

            <div class="d-flex flex-wrap gap-3 mb-4">

                <span class="badge rounded-pill bg-light text-dark border px-3 py-2">
    <i class="bi bi-clock-fill text-warning me-2"></i>
    До 1 хвилини
</span>

               <span class="badge rounded-pill bg-light text-dark border px-3 py-2">
    <i class="bi bi-check-circle-fill text-success me-2"></i>
    Лише сумісні елементи
</span>

               <span class="badge rounded-pill bg-light text-dark border px-3 py-2">
    <i class="bi bi-funnel-fill text-primary me-2"></i>
    Без зайвих фільтрів
</span>

            </div>

            <a href="#selection"
   class="btn btn-warning btn-lg rounded-pill px-5 shadow-sm">
    <i class="bi bi-arrow-right-circle-fill me-2"></i>
    Почати підбір
</a>

        </div>

        <div class="col-lg-6 text-center">

            <img src="{{ asset('images/chimney/single-wall-banner1.webp') }}"
                 class="img-fluid"
                 width="650"
                 height="650"
                 alt="Система одностінних димоходів"
                 loading="eager">

        </div>

    </div>

</section>
<section class="container-1600 py-5">

    <div class="text-center mb-5">

        <span class="badge bg-warning text-dark mb-3">
            Підбір за 4 кроки
        </span>

        <h2 class="fw-bold mb-3">
            Як працює підбір
        </h2>

        <p class="text-muted mx-auto" style="max-width:700px;">
            Вам не потрібно переглядати весь каталог. Послідовно оберіть
            характеристики майбутньої системи, після чого ми покажемо лише
            відповідні елементи.
        </p>

    </div>

    <div class="row g-4">

        <div class="col-md-3">
           <div class="card step-card h-100 border-0 shadow-sm text-center p-4"
           style="background:linear-gradient(135deg,#fffdf7,#ffffff)">

                <div class="display-5 text-warning mb-3">
    <i class="bi bi-circle-square"></i>
</div>

                <h5 class="fw-bold">
                    Діаметр
                </h5>

                <p class="text-muted small mb-0">
                    Оберіть діаметр
                </p>

            </div>
        </div>

        <div class="col-md-3">
           <div class="card step-card h-100 border-0 shadow-sm text-center p-4"
           style="background:linear-gradient(135deg,#fffdf7,#ffffff)">
            

               <div class="display-5 text-warning mb-3">
    <i class="bi bi-shield-check"></i>
</div>

                <h5 class="fw-bold">
                    Марка сталі
                    
                </h5>

                <p class="text-muted small mb-0">
                    Вкажіть марку сталі
                    
                </p>

            </div>
        </div>

        <div class="col-md-3">
           <div class="card step-card h-100 border-0 shadow-sm text-center p-4"
           style="background:linear-gradient(135deg,#fffdf7,#ffffff)">

               <div class="display-5 text-warning mb-3">
    <i class="bi bi-rulers"></i>
</div>

                <h5 class="fw-bold">
                    Товщина сталі
                    
                </h5>

                <p class="text-muted small mb-0">
                    Оберіть товщину нержавіючої сталі
                    
                </p>

            </div>
        </div>

        <div class="col-md-3">
           <div class="card step-card h-100 border-0 shadow-sm text-center p-4"
           style="background:linear-gradient(135deg,#fffdf7,#ffffff)">

                <div class="display-5 text-warning mb-3">
    <i class="bi bi-box-seam"></i>
</div>

                <h5 class="fw-bold">
                    Елемент системи
                </h5>

                <p class="text-muted small mb-0">
                    Отримайте результат
                </p>

            </div>
        </div>

    </div>
    <div class="alert alert-success border-0 rounded-4 mt-5">
    <i class="bi bi-check-circle-fill me-2"></i>
    Після завершення підбору ви побачите лише сумісні комплектуючі.
</div>
  <div class="config-alert rounded-4 p-4 mt-5">

    <div class="d-lg-flex justify-content-between align-items-center">

        <div>
            <h5 class="fw-bold mb-2">
                <i class="bi bi-lightbulb me-2"></i>
                Не впевнені у виборі?
            </h5>

            <p class="mb-0">
                Якщо ви не впевнені, який діаметр або марку сталі обрати,
                скористайтеся нашим конфігуратором. Він допоможе підібрати
                димохідну систему відповідно до вашого обладнання.
            </p>
        </div>

        <div class="mt-3 mt-lg-0 ms-lg-4 flex-shrink-0">
            <a href="{{ route('categories.index') }}#configurator1"
               class="btn btn-dark rounded-pill px-4">
                <i class="bi bi-arrow-right-circle me-2"></i>
                Конфігуратор
            </a>
        </div>

    </div>

</div>
</section>

<section id="selection" class="container-1600 py-5">

    <div class="card border-0 shadow rounded-4">

        <div class="card-body p-5">

            {{-- Прогресс --}}
            <div class="d-flex justify-content-between mb-3 small fw-semibold">
                <span id="stepText">
                    Крок 1 із 4
                </span>

                <span id="percentText">
                    25%
                </span>
            </div>

            <div class="progress mb-4" style="height:8px;">
                <div id="progressBar"
                     class="progress-bar bg-warning"
                     style="width:25%">
                </div>
            </div>

           {{-- Кнопка назад --}}
            <button
                id="prevBtn"
                class="btn btn-outline-secondary btn-sm mb-4"
                style="display:none;">

                <i class="bi bi-arrow-left me-1"></i>
                Назад

            </button>

            {{-- Выбранные параметры --}}
            <div
                id="selectedOptions"
                class="alert alert-light border mb-4"
                style="display:none;">

                <strong>Ваш вибір</strong>

                <div id="selectedList" class="mt-2"></div>

            </div>
<div id="stepsContainer">
            {{-- Шаг 1 --}}
            <div id="step1">

                <h2 class="fw-bold text-center mb-4">

                    Оберіть діаметр

                </h2>

                <div class="row g-3">
                    @foreach([
 '100', '110', '120', '125', '130', '140', '150', '160', '180',
                                '200', '220', '230', '250', 
                                '300', '350', '400', '450', '500'
] as $diameter)

<div class="col-lg-2 col-md-2 col-4">

    <button
        class="btn btn-outline-dark w-100 p-3 option-btn"
        data-step="diameter"
        data-value="{{ $diameter }}">

        <div class="fs-5 fw-bold">

            {{ $diameter }}

        </div>

        <small class="text-muted">

            мм

        </small>

    </button>

</div>

@endforeach
                </div>

            </div>

  
 {{-- ========================= --}}
    {{-- STEP 2 --}}
    {{-- ========================= --}}
<div id="step2" style="display:none;">
 <h2 class="fw-bold text-center mb-2">
        Яка нержавіюча сталь вам потрібна?
    </h2>

    <p class="text-center text-muted mb-4">
        Кожна марка сталі має свої особливості. Оберіть варіант, який найкраще відповідає вашим умовам експлуатації.
    </p>

    <div class="row g-3 justify-content-center">

        {{-- AISI 304 --}}
        <div class="col-lg-4 col-md-6">
            <button
                class="btn btn-outline-dark w-100 option-btn h-100"
                data-step="grade"
                data-value="304">

                <div class="fw-bold fs-4 mb-2">
                    AISI 304
                </div>

                <span class="badge bg-success mb-3">
                    🟢 Найпопулярніша
                </span>

                <div class="small text-muted">
                    Газові котли, універсальне використання, висока корозійна стійкість <strong>(товщина 0.5 мм, 0.8 мм, 1 мм)</strong>.
                </div>

            </button>
        </div>

        {{-- AISI 321 --}}
        <div class="col-lg-4 col-md-6">
            <button
                class="btn btn-outline-dark w-100 option-btn h-100"
                data-step="grade"
                data-value="321">

                <div class="fw-bold fs-4 mb-2">
                    AISI 321
                </div>

                <span class="badge bg-danger mb-3">
                    🔥 Для високих температур
                </span>

                <div class="small text-muted">
                    Каміни, печі та твердопаливні котли. Оптимальний вибір для високих температур <strong>(товщина 0.8 мм та 1 мм)</strong>.
                </div>

            </button>
        </div>

        {{-- AISI 201 --}}
        <div class="col-lg-4 col-md-6">
            <button
                class="btn btn-outline-dark w-100 option-btn h-100"
                data-step="grade"
                data-value="201">

                <div class="fw-bold fs-4 mb-2">
                    AISI 201
                </div>

                <span class="badge bg-warning text-dark mb-3">
                    💰 Економ
                </span>

                <div class="small text-muted">
                    Доступне рішення для менш вимогливих умов експлуатації <strong>(тільки в 0.5 товщині)</strong>.
                </div>

            </button>
        </div>

    </div>

   
</div>

 {{-- ========================= --}}
    {{-- STEP 3 --}}
    {{-- ========================= --}}
<div id="step3" style="display:none;">
 <div id="step3">

    <h2 class="fw-bold text-center mb-2">
        Оберіть товщину сталі
    </h2>

    <p class="text-center text-muted mb-4">
        Доступні варіанти для обраної марки сталі.
    </p>

    <div id="thicknessContainer"
         class="row g-3 justify-content-center">
    </div>

</div>
   
</div>
 {{-- ========================= --}}
    {{-- STEP 4 --}}
    {{-- ========================= --}}
<div id="step4" style="display:none;">

    <h2 class="fw-bold text-center mb-2">
        Який елемент вам потрібен?
    </h2>

    <p class="text-center text-muted mb-4">
        Оберіть елемент, який необхідно знайти.
    </p>

    <div class="row g-3">

        @foreach([
            [
    'name' => 'Труба',
    'img' => 'd1766edbf3680e4dd12178e2096689091c5c9fb4.webp'
],
            ['name' =>'Коліно 45°',
            'img' => '8f7e3270cccefebd8ef0b01eb791e063a35d53da.webp'
            ],
            ['name' =>
            'Коліно 90°',
            'img' => '4da6e275628591fb2c427c810aee46c72194787b.webp'
            ],
            ['name' => 'Трійник 90°',
            'img' => 'ebad524c975ba8687a00eaa06138a19f67b6ba4e.webp'
            ],
            ['name' => 'Трійник 45°',
            'img' => '5a8399f216645295c4236632e984ba223704ae8f.webp'
            ],
            ['name' => 'Ревізія',
            'img' => '22f0ba5bb03393da27218badeab1788433a38ab6.webp'
            ],
            ['name' => 'Перехід',
            'img' => '1d57149fc14067bd6a4cc811a660d82e27524399.webp'
            ],
            ['name' => 'Грибок',
            'img' => 'ae60c4c7157b3a2c8b6856c55f9004e3b7a1b6e3.webp'
            ],
            ['name' => 'Іскрогасник',
            'img' => '102c4895a552be612603f552c303b88139600173.webp'
            ],
            ['name' => 'Волпер',
            'img' => '7372de8d9cc1d6bafd52e03939d198ac9f2f7749.webp'
            ],
            ['name' => 'Регулятор тяги(Кагла)',
            'img' => '85e783177507a9c794bcab90e2cbf841fcd516ad.webp'
            ],
            ['name' => 'Закінчення димоходу',
            'img' => 'b8621901edf97997d2fdbc0402944ed1507259f5.webp'
            ],
            ['name' => 'Радіатор',
            'img' => '56f1b695c42b31c7faff57a768fa0cb6f891680a.webp'
            ],
            ['name' => 'Сітка',
            'img' => 'ea9cc93449a2a910df0e74c2617cf06c57b90f37.webp'
            ],
            ['name' => 'Труба-подовжувач',
            'img' => '044abad5ad84f29eac881da06a1f93017f2d7590.webp'
            ],
            ['name' => 'Лійка',
            'img' => '80731c12dd76219b0954f38d138107e784d693ac.webp'
            ],
            ['name' => 'Розвантажувальна підставка',
            'img' => '6c6786f2e63db2cc3abd5b287d9dc0f250f4cac1.webp'
            ]
        ] as $item)

       <div class="col-lg-3 col-md-4 col-6">

    <button
        class="btn btn-outline-dark w-100 option-btn element-btn"
        data-step="type"
        data-value="{{ $item['name'] }}">

        <img src="{{ asset('images/' . $item['img']) }}"
             width="70"
             height="70"
             class="img-fluid mb-2"
             alt="{{ $item['name'] }}">

        <div class="fw-semibold">
            {{ $item['name'] }}
        </div>

    </button>

</div>
@endforeach

    </div>

</div>
 {{-- ========================= --}}
    {{-- FINISH --}}
    {{-- ========================= --}}
<div id="finishStep" style="display:none;">

    <div class="card border-success shadow-sm">

        <div class="card-body p-5">

            <div class="text-center mb-4">

                <div class="display-5 mb-2">✅</div>

                <h2 class="fw-bold">
                    Ваш вибір готовий
                </h2>

                <p class="text-muted mb-0">
                    Перевірте вибрані параметри перед переходом у каталог.
                </p>

            </div>

            <div class="row align-items-center">

                {{-- Параметри --}}
                <div class="col-lg-7">

                    <div
                        id="summary"
                        class="alert alert-light border mb-0">
                    </div>

                </div>

                {{-- Фото --}}
                <div class="col-lg-5 text-center">

                    <img
                        id="summaryImage"
                        src=""
                        class="img-fluid"
                        style="max-height:220px;object-fit:contain;"
                        alt="Обраний елемент">

                </div>

            </div>

            <div class="text-center mt-4">

                <button
                    id="showProducts"
                    class="btn btn-warning btn-lg rounded-pill px-5">

                    <i class="bi bi-search me-2"></i>
                    Показати товари

                </button>

            </div>

        </div>

    </div>
 <div id="productsGrid" class="row g-4 mt-2"></div>

    <div class="alert alert-warning border-0 shadow-sm rounded-4 mt-4">
        <h5 class="fw-bold mb-2">
            <i class="bi bi-info-circle me-2"></i>
            Зверніть увагу
        </h5>

        <p class="mb-0">
            Для повного монтажу також можуть знадобитися кріплення, хомути, прохідні елементи, розтяжки, кронштейни та інші комплектуючі. Переглянути їх можна в окремому розділі категорій димарів.
        </p>

        <a href="{{ route('shop.index', ['category' => 'fittings']) }}"
           class="btn btn-outline-warning rounded-pill mt-3">
            Переглянути кріплення та комплектуючі
        </a>
    </div>

   
</div>
</div>

      </div>

    </div>

</section>

<section class="container-1600 py-5">

    <div class="text-center mb-5">

        <span class="badge bg-warning text-dark mb-3">
            DymSystems
        </span>

        <h2 class="fw-bold">
            Чому обирають наші одностінні димоходи
        </h2>

    </div>

    <div class="row g-4">

        <div class="col-lg-6">

          <div class="d-flex mb-4">
    <i class="bi bi-check-circle-fill text-success fs-4 me-3"></i>
    <div>
        Використовуємо нержавіючу сталь <strong>AISI 201, 304, 321 та 430</strong>.
    </div>
</div>

<div class="d-flex mb-4">
    <i class="bi bi-check-circle-fill text-success fs-4 me-3"></i>
    <div>
        Точні геометричні розміри забезпечують щільне з'єднання елементів.
    </div>
</div>

<div class="d-flex">
    <i class="bi bi-check-circle-fill text-success fs-4 me-3"></i>
    <div>
        Повний асортимент комплектуючих для монтажу димохідної системи.
    </div>
</div>
<div class="row text-center mt-5">

    <div class="col-4">
    <div class="display-6 fw-bold text-warning counter" data-target="4">
        4
    </div>
    <small class="text-muted">Марки сталі</small>
</div>

<div class="col-4">
    <div class="display-6 fw-bold text-warning counter" data-target="1000">
        1000+
    </div>
    <small class="text-muted">Комплектуючих</small>
</div>

<div class="col-4">
    <div class="display-6 fw-bold text-warning counter" data-target="100">
        100%
    </div>
    <small class="text-muted">Сумісність</small>
</div>
</div>

        </div>

        <div class="col-lg-6">

            <div class="row g-3">

                <div class="col-6">
                    <div class="card feature-card h-100 border-0 shadow-sm p-4 text-center">
                        <div class="display-6 text-warning">
    <i class="bi bi-shield-check"></i>
</div>
                        <h5 class="fw-bold mt-3">
                            Якісна сталь
                        </h5>
                        <p class="small text-muted mb-0">
                            AISI 201, 304, 321, 430
                        </p>
                    </div>
                </div>

                <div class="col-6">
                    <div class="card feature-card h-100 border-0 shadow-sm p-4 text-center">
                        <div class="display-6 text-warning">
    <i class="bi bi-rulers"></i>
</div>
                        <h5 class="fw-bold mt-3">
                            Точна геометрія
                        </h5>
                        <p class="small text-muted mb-0">
                            Легке складання системи
                        </p>
                    </div>
                </div>

                <div class="col-6">
                   <div class="card feature-card h-100 border-0 shadow-sm p-4 text-center">
                       <div class="display-6 text-warning">
    <i class="bi bi-fire"></i>
</div>
                        <h5 class="fw-bold mt-3">
                            Для різних котлів
                        </h5>
                        <p class="small text-muted mb-0">
                            Газ, дрова, пелети
                        </p>
                    </div>
                </div>

                <div class="col-6">
                    <div class="card feature-card h-100 border-0 shadow-sm p-4 text-center">
                        <div class="display-6 text-warning">
    <i class="bi bi-boxes"></i>
</div>
                        <h5 class="fw-bold mt-3">
                            Великий вибір
                        </h5>
                        <p class="small text-muted mb-0">
                            Повний комплект елементів
                        </p>
                    </div>
                    
                </div>

            </div>

        </div>
<div class="text-center mt-5">
    <a href="{{ route('shop.index') }}"
       class="btn btn-warning btn-lg rounded-pill px-5">
        <i class="bi bi-grid me-2"></i>
        Переглянути каталог
    </a>
</div>
    </div>

</section>

<section class="container-1600 py-5">

    <div class="text-center mb-5">

        <span class="badge bg-warning text-dark mb-3">
            FAQ
        </span>

        <h2 class="fw-bold">
            Поширені запитання
        </h2>

    </div>

    <div class="accordion" id="faqAccordion">

        <div class="accordion-item">

            <h2 class="accordion-header">

                <button class="accordion-button"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#faq1">

                    Яка товщина сталі краща?

                </button>

            </h2>

            <div id="faq1"
                 class="accordion-collapse collapse show"
                 data-bs-parent="#faqAccordion">

                <div class="accordion-body">

                    Для більшості газових котлів достатньо товщини
                    <strong>0,5 мм</strong>. Для твердопаливних котлів,
                    камінів і печей рекомендується використовувати
                    <strong>0,8 мм або 1 мм</strong>, оскільки вони краще
                    витримують високі температури.

                </div>

            </div>

        </div>

        <div class="accordion-item">

            <h2 class="accordion-header">

                <button class="accordion-button collapsed"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#faq2">

                    Яку марку сталі обрати?

                </button>

            </h2>

            <div id="faq2"
                 class="accordion-collapse collapse"
                 data-bs-parent="#faqAccordion">

                <div class="accordion-body">

                    AISI 304 є універсальним рішенням для більшості
                    газових котлів. AISI 321 рекомендується для
                    твердопаливного обладнання та високих температур.
                    AISI 201 — економічний варіант для <br> менш вимогливих
                    умов експлуатації.

                </div>

            </div>

        </div>

        <div class="accordion-item">

            <h2 class="accordion-header">

                <button class="accordion-button collapsed"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#faq3">

                    Чи можна встановлювати одностінний димохід зовні?

                </button>

            </h2>

            <div id="faq3"
                 class="accordion-collapse collapse"
                 data-bs-parent="#faqAccordion">

                <div class="accordion-body">

                    Для зовнішнього монтажу зазвичай рекомендується
                    використовувати утеплені (сендвіч) димоходи.
                    Одностінні труби застосовуються переважно всередині
                    приміщень або як внутрішня вставка.

                </div>

            </div>

        </div>

        <div class="accordion-item">

            <h2 class="accordion-header">

                <button class="accordion-button collapsed"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#faq4">

                    Який діаметр димоходу потрібен?

                </button>

            </h2>

            <div id="faq4"
                 class="accordion-collapse collapse"
                 data-bs-parent="#faqAccordion">

                <div class="accordion-body">

                    Діаметр визначається виробником опалювального
                    обладнання. Якщо ви не впевнені у виборі,
                    скористайтеся конфігуратором або зверніться до наших
                    спеціалістів.

                </div>

            </div>

        </div>

    </div>

</section>
<style>
.option-btn{

     padding: 12px;
    border-radius: 12px;
    transition: .2s;
}
.option-btn .fs-5{
    font-size: 1.15rem !important;
    margin-bottom: 2px;
}

.option-btn small{
    font-size: .75rem;
}
.option-btn:hover{

    transform:translateY(-3px);

}

.option-btn.active{

    background:#ffc107;

    border-color:#ffc107;

    color:#000;

    font-weight:700;

}
.element-btn{
    min-height: 180px;
    padding: 16px;
     transition: .2s;
}
.element-btn:hover{
    transform: translateY(-4px);
    box-shadow: 0 .5rem 1rem rgba(0,0,0,.12);
}

.element-btn img{
    width: 100%;
    height: 80px;
    object-fit: contain;
    transition: transform .25s ease;
}

.element-btn:hover img{
    transform: scale(1.08);
}

.element-btn .fw-semibold{
    margin-top: 8px;
    font-size: .95rem;
    line-height: 1.25;
}
.hover-orange {
    transition: color .2s ease;
}

.hover-orange:hover {
    color: #f97316 !important;
}
.step-card{
    transition:.25s;
    border-radius:18px;
}

.step-card:hover{
    transform:translateY(-8px);
    box-shadow:0 18px 35px rgba(0,0,0,.12)!important;
}
.config-alert{
    background:linear-gradient(135deg,#fff8e8,#fffefb);
    border-left:5px solid #f59e0b;
    box-shadow:0 12px 30px rgba(0,0,0,.08);
}
.feature-card{
    background: linear-gradient(135deg,#fff9ef,#ffffff);
    border-radius:18px;
    transition:.3s;
}

.feature-card:hover{
    transform:translateY(-8px);
    box-shadow:0 18px 40px rgba(0,0,0,.12)!important;
}
</style>

  <script>
  const selected = {
    diameter: null,
    grade: null,
    thickness: null,    
    type: null
};
const images = {
    "Труба": "d1766edbf3680e4dd12178e2096689091c5c9fb4.webp",
    "Коліно 45°": "8f7e3270cccefebd8ef0b01eb791e063a35d53da.webp",
    "Коліно 90°": "4da6e275628591fb2c427c810aee46c72194787b.webp",
    "Трійник 90°": "ebad524c975ba8687a00eaa06138a19f67b6ba4e.webp",
    "Трійник 45°": "5a8399f216645295c4236632e984ba223704ae8f.webp",
    "Ревізія": "22f0ba5bb03393da27218badeab1788433a38ab6.webp",
    "Перехід": "1d57149fc14067bd6a4cc811a660d82e27524399.webp",
    "Грибок": "ae60c4c7157b3a2c8b6856c55f9004e3b7a1b6e3.webp",
    "Волпер": "7372de8d9cc1d6bafd52e03939d198ac9f2f7749.webp",
    "Регулятор тяги(Кагла)": "85e783177507a9c794bcab90e2cbf841fcd516ad.webp",
    "Закінчення димоходу": "b8621901edf97997d2fdbc0402944ed1507259f5.webp",
    "Радіатор": "56f1b695c42b31c7faff57a768fa0cb6f891680a.webp",
    "Сітка": "ea9cc93449a2a910df0e74c2617cf06c57b90f37.webp",
    "Труба-подовжувач": "044abad5ad84f29eac881da06a1f93017f2d7590.webp",
    "Лійка": "80731c12dd76219b0954f38d138107e784d693ac.webp",
    "Заглушка": "70f9709ad093575e0fd014ac3fb5b565c6cc5d7e.webp",
    "Розвантажувальна підставка": "6c6786f2e63db2cc3abd5b287d9dc0f250f4cac1.webp"
};
const availableThickness = {
    "201": [
        { value: "0,5 мм", title: "Стандарт" }
    ],
    "304": [
        { value: "0,5 мм", title: "Стандарт" },
        { value: "0,8 мм", title: "Посилена" },
        { value: "1 мм", title: "Максимальна" }
    ],
    "321": [
        { value: "0,8 мм", title: "Посилена" },
        { value: "1 мм", title: "Максимальна" }
    ]
};
function renderThickness() {

    const container = document.getElementById('thicknessContainer');

    container.innerHTML = '';

    availableThickness[selected.grade].forEach(item => {

        container.innerHTML += `
            <div class="col-lg-3 col-md-4 col-6">

                <button
                    class="btn btn-outline-dark w-100 option-btn thickness-btn"
                    data-step="thickness"
                    data-value="${item.value}">

                    <div class="fw-bold fs-5">
                        ${item.value}
                    </div>

                    <small class="text-muted">
                        ${item.title}
                    </small>

                </button>

            </div>
        `;

    });

}

let currentStep = 1;

function showStep(step, scroll = false) {

    document.querySelectorAll('#stepsContainer > div').forEach(el => {
        el.style.display = 'none';
    });

    if (step <= 4) {
        document.getElementById('step' + step).style.display = 'block';
    } else {
        document.getElementById('finishStep').style.display = 'block';

        document.getElementById('summary').innerHTML = `
<ul class="list-unstyled mb-0">
    <li><strong>Діаметр:</strong> ${selected.diameter} мм</li>
    <li><strong>Сталь:</strong> AISI ${selected.grade}</li>
    <li><strong>Товщина:</strong> ${selected.thickness}</li>    
    <li><strong>Елемент:</strong> ${selected.type}</li>
</ul>
`;
const img = document.getElementById('summaryImage');

if (images[selected.type]) {
    img.src = `/images/${images[selected.type]}`;
    img.alt = selected.type;
}
    }

    currentStep = step;

    updateProgress();
    updateSelected();
 
        document.getElementById('selection').scrollIntoView({
            behavior: 'smooth',
            block: 'start'
        });
    
    
}
function updateProgress() {

    const percent = currentStep <= 4
        ? currentStep * 25
        : 100;

    document.getElementById('progressBar').style.width = percent + '%';

    document.getElementById('percentText').innerText = percent + '%';

    document.getElementById('stepText').innerText =
        currentStep <= 4
            ? `Крок ${currentStep} із 4`
            : 'Готово';

    document.getElementById('prevBtn').style.display =
        currentStep > 1 ? 'inline-block' : 'none';
}

   function updateSelected() {

    const box = document.getElementById('selectedOptions');
    const list = document.getElementById('selectedList');

    let html = '';

    if (selected.diameter) {
        html += `<span class="badge bg-warning text-dark me-2 mb-2">
            Ø${selected.diameter} мм
        </span>`;
    }

     if (selected.grade) {
        html += `<span class="badge bg-success me-2 mb-2">
            AISI ${selected.grade}
        </span>`;
    }

    if (selected.thickness) {
        html += `<span class="badge bg-secondary me-2 mb-2">
            ${selected.thickness}
        </span>`;
    }

   

    if (selected.type) {
        html += `<span class="badge bg-dark me-2 mb-2">
            ${selected.type}
        </span>`;
    }

    list.innerHTML = html;

    box.style.display = html ? 'block' : 'none';
}


document.getElementById('prevBtn').onclick = () => {
    if (currentStep > 1) {
        showStep(currentStep - 1, false);
    }

};


function bindOptionButtons() {

    document.querySelectorAll('.option-btn').forEach(btn => {

        if (btn.dataset.bound) return;

        btn.dataset.bound = '1';

        btn.addEventListener('click', function () {

            const step = this.dataset.step;
            const value = this.dataset.value;

            selected[step] = value;

            updateSelected();

            this.closest('.row')
                .querySelectorAll('.option-btn')
                .forEach(b => b.classList.remove('active'));

            this.classList.add('active');

            if (step === 'grade') {
                selected.thickness = null;
                renderThickness();
                bindOptionButtons();
                updateSelected();
            }

            if (currentStep < 4) {
                showStep(currentStep + 1);
            } else {
                showStep(5);
            }

        });

    });

}
bindOptionButtons();
document.getElementById('showProducts').addEventListener('click', function () {
    // Перевірка, чи всі кроки заповнені
    if (!selected.diameter || !selected.thickness || !selected.grade || !selected.type) {
        alert('Будь ласка, оберіть усі параметри димоходу.');
        return;
    }
    
    let params;

if (selected.type === 'Розвантажувальна підставка') {

    params = new URLSearchParams({
        chimneyType: 'Одностінний',
        diameter: selected.diameter,
        type: 'Розвантажувальна підставка'
    });

} else {

    params = new URLSearchParams({
        chimneyType: 'Одностінний',
        ...selected
    });

}

window.location.href = "{{ route('shop.index') }}?" + params.toString();
});

showStep(1);

document.addEventListener('DOMContentLoaded', () => {

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