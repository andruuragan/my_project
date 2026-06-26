@extends('layouts.main')

@section('title', 'Калькулятор димоходу | DymSystems')
@section('description', 'Online калькулятор розрахунку димоходу.')

@section('content')

<div class="container-1600 py-5">

    {{-- HERO --}}
    <section class="calc-hero mb-5">
        <div class="row align-items-center">
            <div class="col-lg-7">
                {{-- Навігаційні крихти (Breadcrumbs) --}}
                <nav aria-label="breadcrumb" class="mb-4">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item">
                            <a href="{{ route('main.index') }}" class="text-decoration-none text-white-50 hover-orange transition-all">Головна</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('useful.index') }}" class="text-decoration-none text-white-50 hover-orange transition-all">Корисна інформація</a>
                        </li>
                        <li class="breadcrumb-item active text-white" aria-current="page" style="--bs-breadcrumb-divider-color: rgba(255,255,255,0.4);">
                            <span style="color: #f97316; font-weight: 500;">Калькулятор димоходу</span>
                        </li>
                    </ol>
                </nav>
                <div class="calc-badge mb-3">
                    Онлайн калькулятор
                </div>
                <h1 class="calc-title mb-4">
                    Калькулятор розрахунку димоходу
                </h1>
                <p class="calc-subtitle mb-4">
                    Розрахуйте рекомендований діаметр, висоту та орієнтовну тягу димоходу для вашого обладнання.
                </p>
                <a href="#calculator" class="btn calc-btn px-4 py-3" aria-label="Перейти до калькулятора димоходу">
                    Почати розрахунок
                </a>
            </div>
            <div class="col-lg-5 text-center">
        <img src="{{ asset('images/chimney/chimney-3d.webp') }}"
             width="1200"
             height="675"
             class="img-fluid calc-hero-image"
             style="mix-blend-mode: lighten;"
             alt="3D розрахунок димоходу"
             loading="lazy"
             decoding="async">
    </div>
        </div>
    </section>

    {{-- CALCULATOR ANCHOR --}}
    <div id="calculator" style="position: relative; top: -130px; visibility: hidden; clear: both;"></div>

    {{-- CALCULATOR BOX --}}
    <section class="calculator-box">
        <h2 class="mb-4 fw-semibold">
            Введіть параметри
        </h2>
        
        {{-- Додано правильну обгортку row для сітки елементів --}}
        <div class="row">
            <div class="col-md-6 mb-4">
                <label class="form-label fw-medium text-dark" for="power">Потужність котла (кВт)</label>
                <input type="number" id="power" class="form-control custom-input" value="20" min="1">
            </div>

            <div class="col-md-6 mb-4">
                <label class="form-label fw-medium text-dark" for="height">Висота димоходу (м)</label>
                <input type="number" id="height" class="form-control custom-input" value="5" min="1">
            </div>

            <div class="col-md-6 mb-4">
                <label class="form-label fw-medium text-dark" for="chimneyType">Тип конфігурації димоходу</label>
                <select id="chimneyType" class="form-select custom-input">
                    <option value="straight">Прямий (без поворотів)</option>
                    <option value="simple">1–2 повороти (до 45°)</option>
                    <option value="medium">Складний (2–3 повороти 90°)</option>
                    <option value="hard">Складна траса + горізонтальні ділянки</option>
                </select>
            </div>

            <div class="col-md-6 mb-4">
                <label class="form-label fw-medium text-dark" for="insulation">Утеплення</label>
                <select id="insulation" class="form-select custom-input">
                    <option value="yes">Так</option>
                    <option value="no">Ні</option>
                </select>
            </div>
        </div> {{-- Кінець row (Прибрано зайвий stray div, що ламав сторінку) --}}

        <button type="button" class="btn calc-btn px-5 py-3 mt-2 shadow-sm" onclick="calculateChimney()">
            Розрахувати <i class="bi bi-gear-fill ms-1"></i>
        </button>

        {{-- RESULT --}}
        <div id="result" class="result-box d-none">
            <div class="row text-center">
                <div class="col-md-4 mb-4 mb-md-0">
                    <div class="result-label">Діаметр</div>
                    <div class="result-value" id="diameterResult"></div>
                </div>
                <div class="col-md-4 mb-4 mb-md-0">
                    <div class="result-label">Висота</div>
                    <div class="result-value" id="heightResult"></div>
                </div>
                <div class="col-md-4">
                    <div class="result-label">Тяга</div>
                    <div class="result-value" id="draftResult"></div>
                </div>
            </div>

            <div class="recommendation-box" id="recommendation"></div>
            
            {{-- EXPLANATION INSIDE RESULT --}}
            <div id="explanation" class="mt-4 p-4 bg-white rounded-4 border d-none">
                <div class="d-flex flex-column flex-sm-row justify-content-between align-items-start align-items-sm-center gap-3 mb-3">
                    <h4 class="mb-0 text-dark fw-semibold">Пояснення розрахунку</h4>
                    
                    <a href="{{ route('shop.index') }}" id="shopLink" class="btn btn-lg fw-bold text-white px-4 py-2_5 shadow-lg d-inline-flex align-items-center justify-content-center" 
                       style="background: linear-gradient(135deg, #f97316 0%, #ea580c 100%); border-radius: 14px; border: none; min-width: 240px; box-shadow: 0 6px 20px rgba(234, 88, 12, 0.4) !important;">
                        <span>Купити димохід</span> 
                        <i class="bi bi-cart-fill ms-2 fs-5"></i>
                    </a>
                </div>
                <div id="explanationText" class="mb-0 text-muted small"></div> 
            </div>
        </div>
    </section>

    {{-- SEO TEXT BLOCK --}}
    <section class="mt-5 seo-content">
        <div class="row g-4 g-lg-5 align-items-start">
            
            <div class="col-lg-7 order-2 order-lg-1">
                <h2 class="mb-4 fw-semibold lh-sm">
                    Розрахунок димоходу для твердопаливного котла: повний посібник та онлайн-калькулятор
                </h2>
                
                <p class="lead text-muted mb-4 fs-6">
                    Правильний розрахунок димоходу для твердопаливного котла — основа безпечної та ефективної роботи системи опалення.
                    Неправильно спроєктований димохід може призвести до зворотної тяги, задимлення приміщень і навіть отруєння чадним газом.
                    У цій статті розглянуто основні параметри розрахунку та принципи роботи онлайн-калькулятора.
                </p>

                <h4 class="mt-4 text-dark fw-semibold">Що таке розрахунок димоходу і навіщо він потрібен</h4>
                <p class="text-muted">
                    Розрахунок димоходу — це визначення оптимальних параметрів димової труби для опалювального обладнання.
                    Він забезпечує стабільну тягу, безпечне відведення газів і максимальний ККД котла.
                </p>

                <h4 class="mt-4 text-dark fw-semibold">Основні параметри розрахунку</h4>
                <ul class="ps-3 mb-4 text-muted">
                    <li class="mb-2">Потужність опалювального котла</li>
                    <li class="mb-2">Загальна висота димохідної труби</li>
                    <li class="mb-2">Тип використовуваного палива</li>
                    <li class="mb-2">Кількість конструктивних поворотів</li>
                    <li class="mb-2">Рівень та якість утеплення</li>
                </ul>

                <h4 class="mt-4 text-dark fw-semibold">Норми та інженерні рекомендації</h4>
                <p class="text-muted">
                    Мінімальна висота димоходу становить 5 метрів. Діаметр підбирається залежно від потужності котла:
                    до 16 кВт — 150–180 мм, 16–35 кВт — 180–220 мм, понад 35 кВт — від 220 мм.
                </p>
                <p class="mb-0 text-muted">
                    Онлайн-калькулятор допомагає швидко отримати рекомендовані значення та уникнути критичних помилок при проєктуванні.
                </p>
            </div>

            <div class="col-lg-5 order-1 order-lg-2 mb-4 mb-lg-0 text-center text-lg-start">
                <div class="sticky-lg-top pt-2" style="top: 100px; z-index: 10;">
                    <div class="pt-3 px-0 pb-3 bg-white rounded-4 border shadow-sm text-center">
                        <img src="{{ asset('images/chimney/budova-dymohodu-z-nerzhaviyuchoyi-stali.webp') }}"
     width="600"
     height="853"
     class="img-fluid w-100"
     style="max-height:700px; object-fit: contain;"
     alt="Будова димоходу з нержавіючої сталі"
     loading="lazy"
     decoding="async">
                        
                        <div class="px-3 mt-3">
                            <div class="p-2 bg-light rounded-3">
                                <small class="text-muted d-block lh-sm" style="font-size: 0.8rem;">
                                    <i class="bi bi-info-circle me-1 text-orange"></i> 
                                    Схема базових елементів конструкції сендвіч-системи
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- СЕКЦІЯ: ПОМИЛКИ МОНТАЖУ --}}
    <section class="mt-5 errors-section">
        <div class="row g-4 align-items-center mb-4">
            <div class="col-md-8">
                <h3 class="fw-semibold text-dark mb-2">Поширені помилки при монтажі димоходу</h3>
                <p class="text-muted mb-0">
                    Недотримання технології встановлення або неправильний підбір комплектуючих часто стають причиною задимлення, падіння ККД котла та швидкого прогорання металу.
                </p>
            </div>
            <div class="col-md-4 text-md-end">
                <span class="badge bg-danger-subtle text-danger px-3 py-2 rounded-3 fw-medium">
                    <i class="bi bi-shield-slash-fill me-1"></i> Критично для безпеки
                </span>
            </div>
        </div>

        <div class="p-3 bg-white rounded-4 border shadow-sm text-center mb-4 overflow-hidden">
           <img src="{{ asset('images/chimney/pomulku_montagy.webp') }}"
     width="805"
     height="182"
     class="img-fluid rounded-3 w-100"
     style="max-width: 805px; height: auto; object-fit: cover;"
     alt="Поширені помилки при монтажі димоходу"
     loading="lazy"
     decoding="async">
        </div>

        <div class="row g-3">
            <div class="col-md-6 col-lg-4">
                <div class="p-3 bg-white border rounded-4 d-flex align-items-center h-100 shadow-sm transition-card">
                    <div class="p-2 bg-danger-subtle text-danger rounded-3 me-3">
                        <i class="bi bi-rulers fs-5 lh-1"></i>
                    </div>
                    <div class="fw-medium text-dark small">Занадто малий діаметр труби</div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="p-3 bg-white border rounded-4 d-flex align-items-center h-100 shadow-sm transition-card">
                    <div class="p-2 bg-danger-subtle text-danger rounded-3 me-3">
                        <i class="bi bi-snow fs-5 lh-1"></i>
                    </div>
                    <div class="fw-medium text-dark small">Відсутність утеплення на вулиці</div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="p-3 bg-white border rounded-4 d-flex align-items-center h-100 shadow-sm transition-card">
                    <div class="p-2 bg-danger-subtle text-danger rounded-3 me-3">
                    <i class="bi bi-distribute-horizontal fs-5 lh-1"></i>
                    </div>
                    <div class="fw-medium text-dark small">Горизонтальні ділянки понад норму</div>
                  
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="p-3 bg-white border rounded-4 d-flex align-items-center h-100 shadow-sm transition-card">
                    <div class="p-2 bg-danger-subtle text-danger rounded-3 me-3">
                        <i class="bi bi-arrow-down-square fs-5 lh-1"></i>
                    </div>
                    <div class="fw-medium text-dark small">Недостатня висота димоходу</div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="p-3 bg-white border rounded-4 d-flex align-items-center h-100 shadow-sm transition-card">
                    <div class="p-2 bg-danger-subtle text-danger rounded-3 me-3">
                        <i class="bi bi-droplet-half fs-5 lh-1"></i>
                    </div>
                    <div class="fw-medium text-dark small">Погана герметизація стиків елементів</div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="p-3 bg-light border border-dashed rounded-4 d-flex align-items-center h-100 justify-content-center text-center">
                    <div>
                        <div class="d-flex align-items-center justify-content-center mb-1">
                            <span class="pulse-dot me-2"></span>
                            <small class="text-muted fw-medium">Експрес-тест системи</small>
                        </div>
                        <a href="#calculator" class="btn btn-calc-trigger btn-sm fw-bold shadow-sm d-inline-flex align-items-center justify-content-center mt-2">
                            Запустити калькулятор <i class="bi bi-play-circle-fill ms-2"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- СЕКЦІЯ: ПРОХІД ЧЕРЕЗ ПОКРІВЛЮ --}}
    <section class="mt-5 roof-passage-section">
        <div class="p-4 p-lg-5 bg-white rounded-4 shadow-sm border">
            <div class="row g-4 g-lg-5 align-items-center">
                
                <div class="col-lg-7 order-2 order-lg-1">
                    <div class="d-flex align-items-center mb-3">
                        <div class="p-2 bg-warning-subtle text-warning-custom rounded-3 me-3">
                            <i class="bi bi-fire fs-4 lh-1"></i>
                        </div>
                        <h3 class="fw-semibold text-dark m-0">Прохід через покрівлю</h3>
                    </div>
                    
                    <p class="text-muted mb-4">
                        При проході димоходу через покрівлю та міжповерхове перекриття обов’язково використовується спеціальний вузол проходу (прохідний патрубок) з посиленою термоізоляцією. Це критично важливо для захисту дерев'яних крокв та елементів даху від займання.
                    </p>
                    
                    <div class="roof-rules">
                        <div class="d-flex align-items-start mb-3">
                            <div class="text-orange me-3 pt-1">
                                <i class="bi bi-check-circle-fill"></i>
                            </div>
                            <div>
                                <strong class="text-dark d-block">Пожежна відстань</strong>
                                <span class="text-muted small">Мінімальна відстань від внутрішньої труби до горючих матеріалів покрівлі становить 130–250 мм.</span>
                            </div>
                        </div>
                        
                        <div class="d-flex align-items-start mb-3">
                            <div class="text-orange me-3 pt-1">
                                <i class="bi bi-check-circle-fill"></i>
                            </div>
                            <div>
                                <strong class="text-dark d-block">Герметизація та гідроізоляція</strong>
                                <span class="text-muted small">Обов’язкова фіксація покрівельним фланцем (майстер-флеш або конусна криза) для захисту від протікання дощу та снігу.</span>
                            </div>
                        </div>
                        
                        <div class="d-flex align-items-start">
                            <div class="text-orange me-3 pt-1">
                                <i class="bi bi-check-circle-fill"></i>
                            </div>
                            <div>
                                <strong class="text-dark d-block">Негорюче наповнення</strong>
                                <span class="text-muted small">Простір у прохідній гільзі заповнюється виключно базальтовою ватою з робочою температурою до 600–1000°C або суперсилом.</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-5 order-1 order-lg-2 text-center">
                    <div class="p-3 bg-light rounded-4 border border-dashed d-inline-block w-100" style="max-width: 410px;">
                        <img src="{{ asset('images/chimney/prohod_cherez_krovly.webp') }}"
     width="438"
     height="607"
     class="img-fluid rounded-3 shadow-sm bg-white"
     style="max-height: 480px; width: auto; height: auto; object-fit: contain;"
     alt="Вузол проходу димоходу через покрівлю"
     loading="lazy"
     decoding="async">
                        <div class="mt-2 text-center">
                            <span class="badge bg-dark-subtle text-dark px-2 py-1 rounded-2 fw-normal" style="font-size: 0.75rem;">
                                <i class="bi bi-layers me-1"></i> Схема безпечного монтажу даху
                            </span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- Блок: Підсумок статті --}}
    <section class="summary-section my-5">
        <div class="p-4 p-md-5 rounded-4 border-start border-5 shadow-sm bg-white" style="border-color: #ea580c !important;">
            
            <div class="d-flex align-items-center mb-4">
                <div class="step-number-ui bg-dark" style="box-shadow: 0 4px 10px rgba(30, 41, 59, 0.25);">
                    <i class="bi bi-bookmark-check-fill text-white fs-5"></i>
                </div>
                <h3 class="fw-bold text-dark m-0 h4">Підсумок: Головні висновки</h3>
            </div>

            <p class="lead text-muted fs-6 mb-4">
                Правильний розрахунок димоходу для твердопаливного котла — це запорука безпечної, стабільної та ефективної роботи всієї системи опалення вашого дому. Сучасні онлайн-інструменти значно спрощують процес проєктуження, але вони вимагають від вас максимальної уваги до кожної деталі.
            </p>

            <div class="row g-4 mb-4">
                <div class="col-md-6">
                    <div class="d-flex align-items-start">
                        <div class="text-orange me-3 fs-4">
                            <i class="bi bi-arrow-repeat"></i>
                        </div>
                        <div>
                            <h6 class="fw-semibold text-dark mb-1">Все зациклено в систему</h6>
                            <p class="text-muted small mb-0">Пам’ятайте, що <strong>діаметр, висота та статична тяга</strong> — це взаємопов'язані параметри. Зміна одного показника критично впливає на інші.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="d-flex align-items-start">
                        <div class="text-danger me-3 fs-4">
                            <i class="bi bi-shield-exclamation"></i>
                        </div>
                        <div>
                            <h6 class="fw-semibold text-dark mb-1">Ціна помилки — безпека</h6>
                            <p class="text-muted small mb-0">У разі виникнення будь-яких сумнівів у формулах чи коефіцієнтах, обов’язково звертайтеся до кваліфікованих інженерів-монтажників.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="p-3 rounded-3 mb-0" style="background-color: #fff7ed; border: 1px dashed #ffedd5;">
                <p class="text-dark mb-0 small">
                    <i class="bi bi-lightbulb text-orange me-2 fw-bold"></i>
                    Використання нашого <strong>калькулятора розрахунку димоходу</strong> — це ваш перший впевнений крок до створення надійної інженерної системи, яка бездоганно прослужить десятиліттями.
                </p>
            </div>

        </div>
    </section>
</div>

<style>
html {
    scroll-behavior: smooth;
}

.calc-hero {
    background: linear-gradient(135deg, #111827, #1f2937);
    border-radius: 32px;
    padding: 60px;
    color: white;
}

.calc-badge {
    display: inline-flex;
    background: rgba(255, 255, 255, .08);
    border: 1px solid rgba(255, 255, 255, .12);
    padding: 8px 14px;
    border-radius: 30px;
    font-size: .85rem;
}

.calc-title {
    font-size: 3rem;
    font-weight: 700;
    line-height: 1.1;
}

.calc-subtitle {
    color: rgba(255, 255, 255, .75);
    max-width: 600px;
}

.calc-btn {
    background: #ea580c;
    color: white;
    border-radius: 14px;
    font-weight: 600;
    border: none;
    transition: background 0.2s ease-in-out;
}

.calc-btn:hover {
    background: #c2410c;
    color: white;
}

.calc-hero-image {
    max-height: 420px;
    width: auto;
    object-fit: contain;
    filter: drop-shadow(0 10px 40px rgba(234, 88, 12, 0.25)) drop-shadow(0 0 10px rgba(255, 255, 255, 0.05));
    transition: transform 0.4s cubic-bezier(0.16, 1, 0.3, 1);
}

.calc-hero:hover .calc-hero-image {
    transform: translateY(-8px) scale(1.03);
}

.calculator-box {
    background: white;
    border-radius: 28px;
    padding: 40px;
    box-shadow: 0 10px 35px rgba(0, 0, 0, .06);
}

.custom-input {
    height: 54px;
    border-radius: 14px;
}

.custom-input:focus {
    border-color: #ea580c;
    box-shadow: 0 0 0 0.25rem rgba(234, 88, 12, 0.15);
}

.result-box {
    margin-top: 35px;
    background: #f9fafb;
    border-radius: 24px;
    padding: 35px;
}

.result-label {
    color: #6b7280;
    margin-bottom: 10px;
}

.result-value {
    font-size: 2rem;
    font-weight: 700;
    color: #ea580c;
}

.recommendation-box {
    margin-top: 25px;
    background: white;
    border-radius: 18px;
    padding: 20px;
    border-left: 5px solid #ea580c;
}

.transition-card {
    transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
}

.transition-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.05) !important;
    border-color: #f87171 !important;
}

.step-number-ui {
    width: 40px;
    height: 40px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-right: 15px;
    flex-shrink: 0;
}

.bg-danger-subtle { background-color: #fee2e2 !important; }
.text-orange { color: #ea580c !important; }
.bg-warning-subtle { background-color: #fef3c7 !important; }
.text-warning-custom { color: #d97706 !important; }
.border-dashed { border-style: dashed !important; }
.bg-dark-subtle { background-color: #e2e8f0 !important; }

.hover-orange { transition: color 0.2s ease; }
.hover-orange:hover { color: #ea580c !important; }

.pulse-dot {
    width: 8px;
    height: 8px;
    background: #22c55e;
    border-radius: 50%;
    box-shadow: 0 0 0 0 rgba(34, 197, 94, 0.7);
    animation: pulse 1.6s infinite;
}

@keyframes pulse {
    0% { transform: scale(0.95); box-shadow: 0 0 0 0 rgba(34, 197, 94, 0.7); }
    70% { transform: scale(1); box-shadow: 0 0 0 6px rgba(34, 197, 94, 0); }
    100% { transform: scale(0.95); box-shadow: 0 0 0 0 rgba(34, 197, 94, 0); }
}

.btn-shop {
    background: #d97706;
    color: white;
    border-radius: 12px;
    font-weight: 600;
    border: none;
    transition: all 0.2s ease-in-out;
}

.btn-shop:hover {
    background: #b45309;
    color: white;
    transform: translateY(-1px);
    box-shadow: 0 4px 12px rgba(217, 119, 6, 0.25);
}
.btn-calc-trigger {
    background: #fff7ed;
    color: #ea580c;
    border: 1px solid #ffedd5;
    border-radius: 10px;
    padding: 6px 16px;
    transition: all 0.2s ease-in-out;
}

.btn-calc-trigger:hover {
    background: #ea580c;
    color: white;
    border-color: #ea580c;
    transform: translateY(-1px);
    box-shadow: 0 4px 12px rgba(234, 88, 12, 0.15) !important;
}

.btn-calc-trigger:hover .bi-play-circle-fill {
    transform: scale(1.1);
    transition: transform 0.2s ease;
}

.btn-shop-action {
    background: linear-gradient(135deg, #f97316 0%, #ea580c 100%);
    color: white !important;
    border-radius: 14px;
    font-weight: 700;
    font-size: 0.95rem;
    padding: 10px 24px;
    letter-spacing: 0.3px;
    box-shadow: 0 4px 15px rgba(234, 88, 12, 0.3) !important;
    transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
    position: relative;
    overflow: hidden;
}

.btn-shop-action:hover {
    background: linear-gradient(135deg, #ea580c 0%, #c2410c 100%);
    transform: translateY(-2px);
    box-shadow: 0 8px 24px rgba(234, 88, 12, 0.45) !important;
}

.btn-shop-action:active {
    transform: translateY(0);
}

.btn-shop-icon-wrapper {
    display: inline-block;
    transition: transform 0.3s ease;
}

.btn-shop-action:hover .btn-shop-icon-wrapper {
    animation: cartBounce 0.5s ease infinite alternate;
}

@keyframes cartBounce {
    0% { transform: translateY(0); }
    100% { transform: translateY(-3px); }
}

@media (max-width: 576px) {
    .btn-shop-action {
        width: 100%;
        padding: 12px 20px;
    }
    .calc-title {
    font-size: 2rem;
    font-weight:600;
   
}
}
/* --- ВИПРАВЛЕННЯ ДЛЯ BREADCRUMBS --- */
.breadcrumb .breadcrumb-item a {
    color: rgba(255, 255, 255, 0.7) !important; /* Робимо посилання чіткішими */
    text-decoration: none;
    transition: color 0.2s;
}

.breadcrumb .breadcrumb-item a:hover {
    color: #f97316 !important; /* Помаранчевий при наведенні */
}

/* Примусово виділяємо роздільник */
.breadcrumb-item + .breadcrumb-item::before {
    content: "/";
    color: rgba(255, 255, 255, 0.5) !important; /* Роздільник не буде зливатися */
    padding: 0 10px; /* Додаємо "повітря" навколо знаку */
    font-weight: 300;
}

/* Щоб активний елемент (Калькулятор) виділявся */
.breadcrumb-item.active {
    color: #f97316 !important;
}
.breadcrumb {
    text-shadow: 0 1px 2px rgba(0,0,0,0.5);
}
@media (max-width: 576px) {
    #shopLink {
        min-width: unset !important;
        width: 100%;
        max-width: 220px;
        padding: 10px 16px !important;
        font-size: 14px;
    }
}
</style>

<script>
function calculateChimney() {
    const power = parseFloat(document.getElementById('power').value);
    const height = parseFloat(document.getElementById('height').value);
    const chimneyType = document.getElementById('chimneyType').value;
    const insulation = document.getElementById('insulation').value;

    if (!power || power <= 0 || !height || height <= 0) {
        alert('Введіть коректні значення потужності та висоти');
        return;
    }

    let turnsPenalty = 0;
    switch (chimneyType) {
        case 'straight': turnsPenalty = 0; break;
        case 'simple': turnsPenalty = 2; break;
        case 'medium': turnsPenalty = 5; break;
        case 'hard': turnsPenalty = 8; break;
    }

    let diameter;
    if (power <= 16) {
        diameter = 150;
    } else if (power <= 35) {
        diameter = 200;
    } else {
        diameter = 250;
    }

    const availableDiameters = [
        100, 110, 120, 125, 130, 140, 150, 160, 180, 
        200, 220, 230, 250, 300, 350, 400, 
        420, 450, 460, 500
    ];

    let currentIndex = availableDiameters.indexOf(diameter);

    if (currentIndex !== -1) {
        if (chimneyType === 'hard') {
            currentIndex = Math.min(currentIndex + 2, availableDiameters.length - 1);
        } else if (chimneyType === 'medium') {
            currentIndex = Math.min(currentIndex + 1, availableDiameters.length - 1);
        }
        diameter = availableDiameters[currentIndex];
    }

    const sandwichMap = {
        100: 160, 110: 180, 120: 180, 130: 200, 140: 200,
        150: 220, 160: 220, 180: 250, 200: 260, 220: 280,
        230: 300, 250: 320, 300: 360, 350: 420, 400: 460,
        500: 560
    };

    let displayDiameter = diameter + ' мм';
    let shopQueryParam = '';

   if (insulation === 'yes') {
    const casing = encodeURIComponent('н/н');

    if (sandwichMap[diameter]) {
        const outerDiameter = sandwichMap[diameter];
        displayDiameter = `${diameter}/${outerDiameter} мм (сендвіч)`;
        shopQueryParam = `?diameter=${diameter}/${outerDiameter}&chimneyType=Термо&grade=304&&thickness=${encodeURIComponent('0,8 мм')}&casing=${casing}`;
    } else {
        displayDiameter = `${diameter} мм (сендвіч)`;
        shopQueryParam = `?diameter=${diameter}&chimneyType=Термо&grade=304&&thickness=${encodeURIComponent('0,8 мм')}&casing=${casing}`;
    }
} else {
    displayDiameter = `${diameter} мм (одностінний)`;
    shopQueryParam = `?diameter=${diameter}&chimneyType=Одностінний&grade=304&&thickness=${encodeURIComponent('0,8 мм')}`;
}

    const recommendedHeight = Math.max(5, height);

    let draft = (recommendedHeight * 4.2) - turnsPenalty;
    if (insulation === 'yes') draft += 3;
    if (chimneyType === 'hard') draft -= 2;
    if (draft < 0) draft = 0;

    let draftStatus = '';
    if (draft < 10) {
        draftStatus = 'Недостатня тяга — можливий ризик зворотної тяги. Рекомендується збільшити висоту або зменшити опір траси.';
    } else if (draft <= 30) {
        draftStatus = 'Тяга знаходиться в нормальному робочому діапазоні.';
    } else {
        draftStatus = 'Підвищена тяга — можливі втрати тепла, рекомендовано встановлення регулятора (шибера).';
    }

    document.getElementById('diameterResult').innerText = displayDiameter;
    document.getElementById('heightResult').innerText = recommendedHeight + ' м';
    document.getElementById('draftResult').innerText = draft.toFixed(1) + ' Па';

   document.getElementById('recommendation').innerHTML = `
    <i class="bi bi-check-circle-fill text-orange me-2"></i>
    <strong>Рекомендація:</strong>
    ${
        insulation === 'yes'
            ? 'Утеплений сендвіч-димохід з нержавіючої сталі (AISI 304/321) в кожусі з нержавійки AISI 201 (0.5 мм)'
            : 'Одностінний димохід з нержавіючої сталі (AISI 304/321)'
    }.
`;

    let currentSandwichText = insulation === 'yes' && sandwichMap[diameter] 
        ? `${diameter}/${sandwichMap[diameter]} мм` 
        : `${diameter} мм`;

    const diameterText = insulation === 'yes'
    ? `Рекомендований внутрішній діаметр труби <strong>${diameter} мм</strong> підібрано відповідно до потужності <strong>${power} кВт</strong>.`
    : `Рекомендований діаметр труби <strong>${diameter} мм</strong> підібрано відповідно до потужності <strong>${power} кВт</strong>.`;

let explanationText = `
    <div class="mb-2">
        ${diameterText}
    </div>

    ${insulation === 'yes' ? `
    <div class="mb-2">
        Оскільки обрано варіант з утепленням, вам підходить сендвіч-система розміром <strong>${currentSandwichText}</strong>.
    </div>` : ''}

     <div class="mb-2">
        Рекомендована товщина нержавійки min 0.8 мм., що забезпечує довговічність та стійкість до корозії.
    </div>

    <div class="mb-2">
        Рекомендована висота <strong>${recommendedHeight} м</strong> забезпечує стабільну тягу.
    </div>
        ${height < 5 ? `
        <div class="alert alert-warning py-2 px-3 my-2 small rounded-3">
            <i class="bi bi-exclamation-triangle-fill me-1"></i>
            Мінімальна рекомендована висота димоходу — 5 м.
        </div>` : ''}
        <div class="mb-2">
            Розрахункова тяга: <strong>${draft.toFixed(1)} Па</strong>.
        </div>
        <div class="mt-2">
            <strong>Оцінка:</strong> ${draftStatus}
        </div>
    `;

    document.getElementById('explanationText').innerHTML = explanationText;

    const shopBaseUrl = "{{ route('shop.index') }}";
    const shopLinkElement = document.getElementById('shopLink');
    if (shopLinkElement) {
        shopLinkElement.href = shopBaseUrl + shopQueryParam;
    }

    document.getElementById('result').classList.remove('d-none');
    document.getElementById('explanation').classList.remove('d-none');
    document.getElementById('result').scrollIntoView({ behavior: 'smooth', block: 'nearest' });
}
</script>
@endsection
@push('schema-useful-item1')
<script type="application/ld+json">
{!! json_encode([
  '@context' => 'https://schema.org',
  '@type' => 'WebApplication',
  '@id' => url('/useful-info/chimney-calculator#page'),

  'name' => 'Калькулятор димоходу',
  'url' => url('/useful-info/chimney-calculator'),

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
  '@context' => 'https://schema.org',
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
      'name' => 'Корисна інформація',
      'item' => url('/useful-info')
    ],
    [
      '@type' => 'ListItem',
      'position' => 3,
      'name' => 'Калькулятор димоходу',
      'item' => url('/useful-info/chimney-calculator')
    ]
  ]
], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) !!}
</script>
@endpush