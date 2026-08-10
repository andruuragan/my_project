@extends('layouts.main')

@section('title', 'Система овальних димоходів | DymSystems')
@section('description', 'Обирайте надійну систему овальних димоходів від DymSystems для безпечної та ефективної вентиляції вашого дому. Професійний підбір та консультації.')

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
                            <span style="color: #f97316; font-weight: 500;">Система овальних димоходів</span>
                        </li>
                    </ol>
                </nav>
   <div class="hero-banner position-relative overflow-hidden rounded-4 p-4 p-lg-5">

    {{-- Зображення --}}
    <img src="{{ asset('images/chimney/oval-banner.webp') }}"
         class="hero-image"
         width="500"
         height="500"
         alt="Система овальних димоходів"
         loading="eager">

    <div class="hero-content">

        <span class="badge bg-warning text-dark px-3 py-2 mb-3">
            DymSystems
        </span>

        <h1 class="display-4 fw-bold mb-4">
            Підбір овальної димохідної системи
        </h1>

        <p class="lead text-muted mb-4" style="max-width:700px;">
            Оберіть характеристики овальної димохідної системи, після чого
            ми автоматично покажемо лише ті елементи, які повністю сумісні
            з вашим вибором.
        </p>

        <div class="d-flex flex-wrap gap-3 mb-4">

            <span class="badge rounded-pill bg-light text-dark border px-3 py-2">
                <i class="bi bi-lightning-charge-fill text-warning me-2"></i>
                Швидкий підбір
            </span>

            <span class="badge rounded-pill bg-light text-dark border px-3 py-2">
                <i class="bi bi-check-circle-fill text-success me-2"></i>
                Лише сумісні елементи
            </span>

            <span class="badge rounded-pill bg-light text-dark border px-3 py-2">
                <i class="bi bi-funnel-fill text-primary me-2"></i>
                Автоматичний відбір
            </span>

        </div>

        <a href="#selection"
           class="btn btn-warning btn-lg rounded-pill px-5 shadow-sm mt-4">
            <i class="bi bi-arrow-right-circle-fill me-2"></i>
            Почати підбір
        </a>

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
           <div class="card step-card h-100 border-0 shadow-sm text-center p-4 workfup-card"
           style="background:linear-gradient(135deg,#fffdf7,#ffffff)">

                <div class="display-5 text-warning mb-3">
    <i class="bi bi-circle-square"></i>
</div>

                <h5 class="fw-bold">
                    Розмір
                </h5>

                <p class="text-muted small mb-0">
                    Оберіть розмір
                </p>

            </div>
        </div>

        <div class="col-md-3">
           <div class="card step-card h-100 border-0 shadow-sm text-center p-4 workfup-card"
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
           <div class="card step-card h-100 border-0 shadow-sm text-center p-4 workfup-card"
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
           <div class="card step-card h-100 border-0 shadow-sm text-center p-4 workfup-card"
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

                    Оберіть розмір

                </h2>

                <div class="row g-3">
                    @foreach([
 '100х200', '110х220', '110х230', '110х240', '120х220', '120х230', '120х240'
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
    'name' => 'Труба овальна',
    'img' => '0af9d81727ab4a0d58f1d3420f20d205fe96af56.webp'
],
            ['name' =>'Коліно овальне 45°',
            'img' => '81ecce57a26dbb8106cef846d8c3ed6f354df2ef.webp'
            ],
            ['name' =>'Коліно овальне 90°',
            'img' => 'b47b425539b2bf71c4855c7823344ef2e05b8eae.webp'
            ],
            ['name' => 'Трійник овальний 90°',
            'img' => '041e03144f50ce1ec153ae2426c509e259937f45.webp'
            ],
            ['name' => 'Трійник овальний 45°',
            'img' => 'dda29be9a76443a28d2ee1c204a7f8c9fa09868e.webp'
            ],
            
            ['name' => 'Перехід овальний',
            'img' => 'cb343d443fb58ad99912fea8663b1f348d236d5c.webp'
            ],
            ['name' => 'Грибок овальний',
            'img' => '4e55c68323a7fc6a1978fc18b2eb5b5abfde7803.webp'
            ],
           
            
           
            ['name' => 'Закінчення димоходу овальне',
            'img' => 'a42dc24ab6caac1f7a461e5258a6af52c13ec110.webp'
            ],
            
           
            
            ['name' => 'Лійка овальна',
            'img' => '77d274c6a25d45c427b858b46c8043e2b1b97598.webp'
            ],
            ['name' => 'Скоба овальна',
            'img' => '6fd409bd13c5f765dbad2081863088a639ec3dae.webp'
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

      <a href="{{ route('fittings-system') }}"
   class="btn rounded-pill mt-3"
   style="color: #fd7e14; border: 1px solid #fd7e14;">
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
            Чому обирають наші овальні димоходи
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
.hero-banner{
    min-height: 560px;
    background: linear-gradient(135deg,#fff8e8 0%,#ffffff 100%);
    border:1px solid #ececec;
}

.hero-content{
    position: relative;
    z-index: 2;
    max-width: 760px;
}

.hero-image{
    position: absolute;
    right: -10px;
    bottom: 0;
    width: 46%;
    max-width:550px;
    height: auto;
    z-index: 1;
    pointer-events: none;
}

@media (max-width: 991px){

    .hero-banner{
        min-height: auto;
        text-align: center;
        padding-bottom: 280px !important;
    }

    .hero-content{
        max-width: 100%;
    }

    .hero-image{
        width: 80%;
        right: 50%;
        transform: translateX(50%);
        bottom: -10px;
    }

}
.invert-icon {
    filter: invert(1);
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
    "Труба овальна": "0af9d81727ab4a0d58f1d3420f20d205fe96af56.webp",
    "Коліно овальне 45°": "81ecce57a26dbb8106cef846d8c3ed6f354df2ef.webp",
    "Коліно овальне 90°": "b47b425539b2bf71c4855c7823344ef2e05b8eae.webp",
    "Трійник овальний 90°": "041e03144f50ce1ec153ae2426c509e259937f45.webp",
    "Трійник овальний 45°": "dda29be9a76443a28d2ee1c204a7f8c9fa09868e.webp",
    
    "Перехід овальний": "cb343d443fb58ad99912fea8663b1f348d236d5c.webp",
    "Грибок овальний": "4e55c68323a7fc6a1978fc18b2eb5b5abfde7803.webp",
    
   
    "Закінчення димоходу овальне": "a42dc24ab6caac1f7a461e5258a6af52c13ec110.webp",   
       
    
    "Лійка овальна": "77d274c6a25d45c427b858b46c8043e2b1b97598.webp",
    
    "Скоба овальна": "6fd409bd13c5f765dbad2081863088a639ec3dae.webp"
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
    <li><strong>Розмір:</strong> ${selected.diameter} мм</li>
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
@push('schema-categories-item4')
<script type="application/ld+json">
{!! json_encode([
  '@' . 'context' => 'https://schema.org',
  '@type' => 'WebApplication',
  '@id' => url('/ovalni-nerzhaviyuchi-dimohody'),

  'name' => 'Система овальних димоходів',
  'url' => url('/ovalni-nerzhaviyuchi-dimohody'),

  'publisher' => [
    '@type' => 'Organization',
    '@id' => 'https://www.dymsystems.pp.ua/#organization'
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
    ],
    [
      '@type' => 'ListItem',
      'position' => 2,
      'name' => 'Категорії димарів',
      'item' => url('/categories')
    ],
    [
      '@type' => 'ListItem',
      'position' => 3,
      'name' => 'Система овальних димоходів',
      'item' => url('/ovalni-nerzhaviyuchi-dimohody')
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