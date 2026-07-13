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
                            <span style="color: #f97316; font-weight: 500;">Термо (сендвіч) система</span>
                        </li>
                    </ol>
                </nav>
    <div class="row align-items-center g-5">

       <div class="col-lg-6">

    <span class="badge bg-warning text-dark px-3 py-2 mb-3">
        DymSystems
    </span>
    <div class="display-3 text-warning mb-3"><i class="bi bi-grid-1x2-fill"></i></div>

    <h1 class="display-5 fw-bold mb-4">
        Термо (сендвіч) димохідна система
    </h1>

    <p class="lead text-muted mb-4">
        Оберіть характеристики термо (сендвіч) димоходу, після чого ми
        покажемо лише сумісні елементи відповідно до ваших параметрів.
    </p>

    <div class="d-flex flex-wrap gap-3 mb-4">

        <span class="badge rounded-pill bg-light text-dark border px-3 py-2">
            <i class="bi bi-thermometer-half text-warning me-2"></i>
            З теплоізоляцією
        </span>

        <span class="badge rounded-pill bg-light text-dark border px-3 py-2">
            <i class="bi bi-house-check text-success me-2"></i>
            Для зовнішнього монтажу
        </span>

        <span class="badge rounded-pill bg-light text-dark border px-3 py-2">
            <i class="bi bi-check-circle text-primary me-2"></i>
            Лише сумісні елементи
        </span>

    </div>

    <a href="#selection"
       class="btn btn-warning btn-lg rounded-pill px-5 shadow-sm">
        <i class="bi bi-arrow-right-circle me-2"></i>
        Почати підбір
    </a>

</div>

        <div class="col-lg-6 text-center">

            <img src="{{ asset('images/chimney/sandwich-banner.webp') }}"
                 class="img-fluid"
                 width="650"
                 height="650"
                 alt="Система термо (сендвіч) димоходів"
                 loading="eager">

        </div>

    </div>

</section>
<section class="container-1600 py-5">

    <div class="text-center mb-5">

        <span class="badge bg-warning text-dark mb-3">
            Підбір за 5 кроків
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

        <div class="col">
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

       <div class="col">
           <div class="card step-card h-100 border-0 shadow-sm text-center p-4"
           style="background:linear-gradient(135deg,#fffdf7,#ffffff)">
            

               <div class="display-5 text-warning mb-3">
    <i class="bi bi-shield-check"></i>
</div>

                <h5 class="fw-bold">
                    Марка сталі
                    
                </h5>

                <p class="text-muted small mb-0">
                    Вкажіть марку сталі внутрішньої труби
                    
                </p>

            </div>
        </div>

      <div class="col">
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

        <div class="col">
    <div class="card step-card h-100 border-0 shadow-sm text-center p-4"
         style="background:linear-gradient(135deg,#fffdf7,#ffffff)">

        <div class="display-5 text-warning mb-3">
            <i class="bi bi-layers"></i>
        </div>

        <h5 class="fw-bold">
            Зовнішній кожух
        </h5>

        <p class="text-muted small mb-0">
            Оберіть оцинкований або нержавіючий кожух
        </p>

    </div>
</div>



        <div class="col">
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
                Якщо ви не впевнені, який діаметр, зовнішній кожух або марку сталі обрати,
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
                    Крок 1 із 5
                </span>

                <span id="percentText">
                    20%
                </span>
            </div>

            <div class="progress mb-4" style="height:8px;">
                <div id="progressBar"
                     class="progress-bar bg-warning"
                     style="width:20%">
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
 '100/160', '110/180', '120/180', '130/200', '140/200',
                                '150/220', '160/220', '180/250', '200/260', '220/280',
                                '230/300', '250/320', '300/360', '350/420', '400/460',
                                '500/560',
                                '100/200', '120/220', '130/230', '140/240',
                                '150/250', '160/260', '180/280', '200/300'
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
       З якої сталі вам потрібна внутрішня труба?
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
        Оберіть товщину сталі внутрішньої труби
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
        Оберіть зовнішній кожух димоходу
    </h2>

    <p class="text-center text-muted mb-4">
        Доступні варіанти.
    </p>
 <div class="row g-3 justify-content-center">

        {{-- Н/Н --}}
        <div class="col-lg-4 col-md-6">
            <button
    class="btn btn-outline-dark w-100 option-btn h-100"
    data-step="casing"
    data-value="н/н">

    <img
        src="{{ asset('images/icons/trner.svg') }}"
        alt="Кожух з нержавіючої сталі"
        width="64"
        height="64"
        class="mb-3">

    <div class="fw-bold fs-4 mb-2">
        Кожух нержавійка (AISI 201)
    </div>

    <span class="badge bg-success mb-3">
        🟢 Стандарт
    </span>

    <div class="small text-muted">
        Класичний варіант для зовнішнього монтажу.
        Висока корозійна стійкість, довговічність та
        естетичний вигляд.
    </div>

</button>
        </div>

       

        {{-- Н/ОЦ --}}
        <div class="col-lg-4 col-md-6">
           <button
    class="btn btn-outline-dark w-100 option-btn h-100"
    data-step="casing"
    data-value="н/оц">

    <img
        src="{{ asset('images/icons/trzn.svg') }}"
        alt="Кожух із оцинкованої сталі"
       width="64"
        height="64"
        class="mb-3">

    <div class="fw-bold fs-4 mb-2">
        Кожух із оцинкованої сталі
    </div>

    <span class="badge bg-warning text-dark mb-3">
        💰 Економ
    </span>

    <div class="small text-muted">
        Доступне рішення для менш вимогливих умов експлуатації.
        При належному догляді та обслуговуванні служить довго.
    </div>

</button>
        </div>

    </div>

   


   
</div>


 {{-- ========================= --}}
    {{-- STEP 5 --}}
    {{-- ========================= --}}
<div id="step5" style="display:none;">

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
    'images' => [
        'н/н' => '7b0b6942221ee39e7dde23fd22aadf1f21cd694c.webp',
        'н/оц' => '80a561609b910c269e317014ad882cb3252b6872.webp',
], ],
            ['name' =>'Коліно 45°',
            'images' => [
        'н/н' => 'df29b679a0b7707a616686809abcd618c648a097.webp',
        'н/оц' => 'd613835da3a05b76b031c97b48bc03ab54abe8ba.webp',
            ], ],
            ['name' =>
            'Коліно 90°',
            'images' => [
        'н/н' => '91ee81f2de52a9a37c3aaed728e23fc82eabfb7d.webp',
        'н/оц' => 'ccebfd7346c0463929bf7c714022bdff4e5f1df4.webp',
            ], ],
            ['name' => 'Трійник 90°',
           'images' => [
        'н/н' => '9c50a25508ef6019ba1e6181d02e2d479d9e47e6.webp',
        'н/оц' => '094cdfc096c36e12e0019254d1bef0cf3c456a7f.webp',
            ], ],
            ['name' => 'Трійник 45°',
            'images' => [
        'н/н' => '27cb84058de5fdf94f960d12a23f42a53c47c8fd.webp',
        'н/оц' => '52d804a0690c48f013daf6d49eb878d0585145e0.webp',
            ], ],
            ['name' => 'Регулятор тяги(Кагла)',
            'images' => [
        'н/н' => 'b8a602f7fde18cbdb7c549028bfb810cc86ce972.webp',
        'н/оц' => 'aeac14507ecbaef467f1e7e5796a667744415925.webp',
             ],
            ],
            ['name' => 'Ревізія',
            'images' => [
        'н/н' => '13e8d089e8d0603a37be1af3a7cf8a2989880a61.webp',
        'н/оц' => '479ca422fef268e17acf2a2755a4f8109ebc1465.webp',
             ],
            ],
            ['name' => 'Конус',
            'images' => [
        'н/н' => '497df0f94590eb6627e84cf787904225b8498530.webp',
        'н/оц' => '550c2f91e2266ddc67f9cba84796c4571e7a236f.webp',
             ],
            ],
            ['name' => 'Термоґрибок',
            'images' => [
        'н/н' => '1d855c94e9a8b7971f6470c818282c3177472122.webp',
        'н/оц' => '1d855c94e9a8b7971f6470c818282c3177472122.webp',
            ],
            ],
            ['name' => 'Старт-сендвіч',
            'images' => [
        'н/н' => '3a5834a31a698234418276d0333da7134679ccf4.webp',
        'н/оц' => '3a5834a31a698234418276d0333da7134679ccf4.webp',
            ],
            ],  
            ['name' => 'Розвантажувальна підставка',
            'images' => [
        'н/н' => '6c6786f2e63db2cc3abd5b287d9dc0f250f4cac1.webp',
        'н/оц' => '6c6786f2e63db2cc3abd5b287d9dc0f250f4cac1.webp',
            ],
            ] 
        ] as $item)

       <div class="col-lg-3 col-md-4 col-6">

    <button
        class="btn btn-outline-dark w-100 option-btn element-btn"
        data-step="type"
        data-value="{{ $item['name'] }}">

        <img src="{{ asset('images/' . $item['images']['н/н']) }}"
             width="70"
             height="70"
             data-stainless="{{ asset('images/' . $item['images']['н/н']) }}"
    data-galvanized="{{ asset('images/' . $item['images']['н/оц']) }}"
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

</section>

<section class="container-1600 py-5">

    <div class="text-center mb-5">    
      
        <div class="card border-0 shadow-sm rounded-4 overflow-hidden mb-5"
     style="background: linear-gradient(135deg,#fff8e8 0%,#ffffff 100%);">

    <div class="card-body p-5">

        <div class="row align-items-center">

            <div class="col-lg-8">

                <span class="badge bg-warning text-dark mb-3">
                    DymSystems
                </span>

                <h2 class="fw-bold mb-3">
                     Чому обирають наші термо (сендвіч) димоходи
                </h2>

                <p class="text-muted mb-4">
                    Ми пропонуємо широкий вибір комплектуючих для сендвіч-димоходів,
                    виготовлених із якісної нержавіючої сталі. Система забезпечує
                    надійну теплоізоляцію, стабільну тягу та безпечну експлуатацію
                    протягом багатьох років.
                </p>

                <div class="d-flex flex-wrap gap-3">

                    <span class="badge rounded-pill bg-light border text-dark px-3 py-2">
                        <i class="bi bi-fire text-warning me-2"></i>
                        Висока термостійкість
                    </span>

                    <span class="badge rounded-pill bg-light border text-dark px-3 py-2">
                        <i class="bi bi-droplet-half text-primary me-2"></i>
                        Мінімум конденсату
                    </span>

                    <span class="badge rounded-pill bg-light border text-dark px-3 py-2">
                        <i class="bi bi-house-check text-success me-2"></i>
                        Для зовнішнього монтажу
                    </span>

                </div>

            </div>

            <div class="col-lg-4 text-center mt-4 mt-lg-0">

                <div class="display-1 text-warning">
                    <i class="bi bi-layers-half"></i>
                </div>

                <h5 class="fw-bold mt-3">
                    Сендвіч-система
                </h5>

                <p class="text-muted mb-0">
                    Внутрішня труба • Теплоізоляція • Зовнішній кожух
                </p>

            </div>

        </div>

    </div>

</div>

    </div>

    <div class="row g-4">

        <div class="col-lg-6">

         <div class="d-flex mb-4">
    <i class="bi bi-check-circle-fill text-success fs-4 me-3"></i>
    <div>
        Внутрішня труба виготовляється з нержавіючої сталі <strong>AISI 304 або AISI 321</strong>, що забезпечує стійкість до високих температур.
    </div>
</div>

<div class="d-flex mb-4">
    <i class="bi bi-check-circle-fill text-success fs-4 me-3"></i>
    <div>
        Теплоізоляційний шар мінімізує утворення конденсату та покращує тягу.
    </div>
</div>

<div class="d-flex mb-4">
    <i class="bi bi-check-circle-fill text-success fs-4 me-3"></i>
    <div>
        Зовнішній кожух доступний у двох виконаннях:
        <strong>оцинкована сталь (Економ)</strong> або
        <strong>нержавіюча сталь AISI 201 (Стандарт)</strong>.
    </div>
</div>

<div class="d-flex">
    <i class="bi bi-check-circle-fill text-success fs-4 me-3"></i>
    <div>
        Повний асортимент комплектуючих для монтажу сендвіч-димохідної системи.
    </div>
</div>
<div class="row text-center mt-5">

    <div class="col-4">
        <div class="display-6 fw-bold text-warning counter" data-target="2">2</div>
        <small class="text-muted">Типи кожуха</small>
    </div>

    <div class="col-4">
        <div class="display-6 fw-bold text-warning counter" data-target="1000">1000+</div>
        <small class="text-muted">Комплектуючих</small>
    </div>

    <div class="col-4">
        <div class="display-6 fw-bold text-warning counter" data-target="100">100%</div>
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
            <i class="bi bi-droplet-half"></i>
        </div>

        <h5 class="fw-bold mt-3">
            Мінімум конденсату
        </h5>

        <p class="small text-muted mb-0">
            Теплоізоляція підтримує стабільну температуру димових газів.
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
            <i class="bi bi-layers"></i>
        </div>

        <h5 class="fw-bold mt-3">
            Два типи кожуха
        </h5>

        <p class="small text-muted mb-0">
            Економ (оцинкована сталь) або Стандарт (AISI 201).
        </p>
    </div>
</div>

<div class="col-6">
    <div class="card feature-card h-100 border-0 shadow-sm p-4 text-center">
        <div class="display-6 text-warning">
            <i class="bi bi-fire"></i>
        </div>

        <h5 class="fw-bold mt-3">
            Висока термостійкість
        </h5>

        <p class="small text-muted mb-0">
            Для камінів, печей, твердопаливних та пелетних котлів.
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

                    Чим сендвіч-димохід кращий за одностінний?

                </button>

            </h2>

            <div id="faq1"
                 class="accordion-collapse collapse show"
                 data-bs-parent="#faqAccordion">

                <div class="accordion-body">

                    Сендвіч-димохід має шар теплоізоляції між внутрішньою та зовнішньою
    трубою. Це зменшує утворення конденсату, покращує тягу та робить
    систему безпечнішою для зовнішнього <br> монтажу.

                </div>

            </div>

        </div>

        <div class="accordion-item">

            <h2 class="accordion-header">

                <button class="accordion-button collapsed"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#faq2">

                    Який зовнішній кожух обрати?

                </button>

            </h2>

            <div id="faq2"
                 class="accordion-collapse collapse"
                 data-bs-parent="#faqAccordion">

                <div class="accordion-body">

                    Доступні два варіанти: <strong>Економ</strong> — оцинкована сталь та
    <strong>Стандарт</strong> — нержавіюча сталь AISI 201.
    Оцинкований кожух є більш доступним за ціною, тоді як AISI 201 має
    кращу корозійну <br> стійкість і довший термін служби.
                </div>

            </div>

        </div>

        <div class="accordion-item">

            <h2 class="accordion-header">

                <button class="accordion-button collapsed"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#faq3">

                    Яка сталь підходить для внутрішньої труби?

                </button>

            </h2>

            <div id="faq3"
                 class="accordion-collapse collapse"
                 data-bs-parent="#faqAccordion">

                <div class="accordion-body">

                    Для газових котлів зазвичай використовують AISI 304.
    Для печей, камінів і твердопаливних котлів рекомендується AISI 321,
    яка краще витримує високі температури.

                </div>

            </div>

        </div>

        <div class="accordion-item">

            <h2 class="accordion-header">

                <button class="accordion-button collapsed"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#faq4">

                    Де можна встановлювати сендвіч-димохід?

                </button>

            </h2>

            <div id="faq4"
                 class="accordion-collapse collapse"
                 data-bs-parent="#faqAccordion">

                <div class="accordion-body">

                    Сендвіч-системи підходять як для внутрішнього, так і для зовнішнього
    монтажу. Завдяки теплоізоляції вони забезпечують стабільну роботу
    димоходу навіть у холодну пору року.

                </div>

            </div>

        </div>

         <div class="accordion-item">

            <h2 class="accordion-header">

                <button class="accordion-button collapsed"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#faq5">

                    Чи потрібне утеплення сендвіч-димоходу?

                </button>

            </h2>

            <div id="faq5"
                 class="accordion-collapse collapse"
                 data-bs-parent="#faqAccordion">

                <div class="accordion-body">

                    Ні. Сендвіч-димохід вже має теплоізоляційний шар між внутрішньою та
    зовнішньою трубою, тому в більшості випадків додаткове утеплення не
    потрібне. Винятком є проходження через пожежонебезпечні ділянки
    (наприклад, дерев'яні перекриття або покрівлю), де необхідно
    дотримуватися вимог пожежної безпеки та використовувати відповідні
    ізоляційні й прохідні елементи.

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
.option-btn{
    display:flex;
    flex-direction:column;
    align-items:center;
    justify-content:center;
    gap:10px;
    min-height:150px;
}

.metal-line{
    display:block;
    height:50px;
    border-radius:20px;
    background:linear-gradient(to right,#d8dde2,#7b8188,#d8dde2);
    box-shadow:
        inset 0 0 2px rgba(255,255,255,.6),
        0 1px 3px rgba(0,0,0,.25);
}

.line-05{ width:3px; }
.line-08{ width:6px; }
.line-10{ width:9px; }
</style>

  <script>
  const selected = {
    diameter: null,
    grade: null,
    thickness: null,
    casing: null,  
    type: null
};
const images = {
   "Труба": {
        "н/н": "7b0b6942221ee39e7dde23fd22aadf1f21cd694c.webp",
        "н/оц": "80a561609b910c269e317014ad882cb3252b6872.webp"
    },
    "Коліно 45°": {
        "н/н": "df29b679a0b7707a616686809abcd618c648a097.webp",
        "н/оц": "d613835da3a05b76b031c97b48bc03ab54abe8ba.webp"
    },
    "Коліно 90°": {
        "н/н": "91ee81f2de52a9a37c3aaed728e23fc82eabfb7d.webp",
        "н/оц": "ccebfd7346c0463929bf7c714022bdff4e5f1df4.webp"
    },
    "Трійник 90°": {
        "н/н": "9c50a25508ef6019ba1e6181d02e2d479d9e47e6.webp",
        "н/оц": "094cdfc096c36e12e0019254d1bef0cf3c456a7f.webp"
    },
    "Трійник 45°": {
        "н/н": "27cb84058de5fdf94f960d12a23f42a53c47c8fd.webp",
        "н/оц": "52d804a0690c48f013daf6d49eb878d0585145e0.webp"
    },
    "Регулятор тяги(Кагла)": {
        "н/н": "b8a602f7fde18cbdb7c549028bfb810cc86ce972.webp",
        "н/оц": "aeac14507ecbaef467f1e7e5796a667744415925.webp"
    },
    "Ревізія": {
        "н/н": "13e8d089e8d0603a37be1af3a7cf8a2989880a61.webp",
        "н/оц": "479ca422fef268e17acf2a2755a4f8109ebc1465.webp"
    },
    "Конус": {
        "н/н": "497df0f94590eb6627e84cf787904225b8498530.webp",
        "н/оц": "550c2f91e2266ddc67f9cba84796c4571e7a236f.webp"
    },
    "Термоґрибок": {
        "н/н": "1d855c94e9a8b7971f6470c818282c3177472122.webp",
        "н/оц": "1d855c94e9a8b7971f6470c818282c3177472122.webp"
    },
    "Старт-сендвіч": {
        "н/н": "3a5834a31a698234418276d0333da7134679ccf4.webp",
        "н/оц": "3a5834a31a698234418276d0333da7134679ccf4.webp"
    },
    "Розвантажувальна підставка": {
        "н/н": "6c6786f2e63db2cc3abd5b287d9dc0f250f4cac1.webp",
        "н/оц": "6c6786f2e63db2cc3abd5b287d9dc0f250f4cac1.webp"
    }
    
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
function getLineClass(value) {
    switch (value) {
        case "0,5 мм":
            return "line-05";
        case "0,8 мм":
            return "line-08";
        case "1 мм":
            return "line-10";
        default:
            return "line-05";
    }
}

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

                    <span class="metal-line ${getLineClass(item.value)}"></span>

                    <div class="fw-bold fs-5 mt-3">
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

function showStep(step) {

    document.querySelectorAll('#stepsContainer > div').forEach(el => {
        el.style.display = 'none';
    });

    if (step <= 5) {
        document.getElementById('step' + step).style.display = 'block';
    } else {
        document.getElementById('finishStep').style.display = 'block';

        document.getElementById('summary').innerHTML = `
<ul class="list-unstyled mb-0">
    <li><strong>Діаметр:</strong> ${selected.diameter} мм</li>
    <li><strong>Сталь:</strong> AISI ${selected.grade}</li>
    <li><strong>Товщина:</strong> ${selected.thickness}</li> 
   <li><strong>Кожух:</strong> ${
    selected.casing === 'н/н'
        ? 'Нержавіюча сталь AISI 201'
        : 'Оцинкована сталь'
}</li>
    <li><strong>Елемент:</strong> ${selected.type}</li>
</ul>
`;
const img = document.getElementById('summaryImage');

if (
    images[selected.type] &&
    images[selected.type][selected.casing]
) {
    img.src = "/images/" + images[selected.type][selected.casing];
    img.alt = selected.type;
}
    }

    currentStep = step;

    updateProgress();
    updateSelected();
    document.getElementById('selection').scrollIntoView({ behavior: 'smooth' });
}
function updateProgress() {

   const percent = currentStep <= 5
    ? Math.round(currentStep / 5 * 100)
    : 100;

    document.getElementById('progressBar').style.width = percent + '%';

    document.getElementById('percentText').innerText = percent + '%';

    document.getElementById('stepText').innerText =
        currentStep <= 5
            ? `Крок ${currentStep} із 5`
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
    if (selected.casing) {
        html += `<span class="badge bg-info me-2 mb-2">
            ${selected.casing === 'н/н'
    ? 'Нержавійка AISI 201'
    : 'Оцинкована сталь'}
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
        showStep(currentStep - 1);
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

            if (currentStep < 5) {
                showStep(currentStep + 1);
            } else {
                showStep(6);
            }

        });

    });

}
bindOptionButtons();
document.getElementById('showProducts').addEventListener('click', function () {
    // Перевірка, чи всі кроки заповнені
    // Важливо: для сендвіч-димоходів у вас 5 кроків, тому перевіряємо і 'casing'
    if (!selected.diameter || !selected.thickness || !selected.grade || !selected.casing || !selected.type) {
        alert('Будь ласка, оберіть усі параметри димоходу.');
        return;
    }
    
    let params;

if (selected.type === 'Розвантажувальна підставка') {

    params = new URLSearchParams({
        chimneyType: 'Термо',
        diameter: selected.diameter,
        type: 'Розвантажувальна підставка'
    });

} else if (selected.type === 'Старт-сендвіч') {

    params = new URLSearchParams({
        chimneyType: 'Термо',
        diameter: selected.diameter,
        grade: selected.grade,
        thickness: selected.thickness,
        type: 'Старт-сендвіч'
    });
           
}
 else if (selected.type === 'Термоґрибок') {

    params = new URLSearchParams({
        chimneyType: 'Термо',
        diameter: selected.diameter,
        grade: selected.grade,
        thickness: selected.thickness,
        type: 'Термоґрибок'
    });
           
}
 else if (selected.type === 'Конус') {

    params = new URLSearchParams({
        chimneyType: 'Термо',
        diameter: selected.diameter,
        grade: selected.grade,
        thickness: selected.thickness,
        type: 'Конус'
    });
           
}


else {

    params = new URLSearchParams({
        chimneyType: 'Термо',
        ...selected
    });

}

window.location.href = "{{ route('shop.index') }}?" + params.toString();
    
    
});

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