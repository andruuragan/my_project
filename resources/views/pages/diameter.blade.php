@extends('layouts.main')
@section('title', 'Розрахунок димоходу для твердопаливного котла | DymSystems')

@section('description',
'Повний посібник з розрахунку димоходу для твердопаливного котла. Підбір діаметра, висоти та параметрів димохідної системи для безпечної роботи опалення.')

@section('content')
<div class="container my-5" style="max-width: 1000px;">
    {{-- Навігаційні крихти (Breadcrumbs) --}}
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
    <a href="{{ route('main.index') }}" class="text-decoration-none text-muted">Головна</a>
</li>
<li class="breadcrumb-item">
    <a href="{{ route('useful.index') }}" class="text-decoration-none text-muted">Корисна інформація</a>
</li>
            <li class="breadcrumb-item active" aria-current="page" style="color: #ea580c;">Розрахунок діаметру та висоти димоходу</li>
        </ol>
    </nav>

    <article class="article-content bg-white p-4 p-md-5 rounded-4 shadow-sm border">
        
        {{-- Головний заголовок сторінки --}}
        <header class="mb-5">
            <div class="useful-badge mb-3">Технічний посібник</div>
            <h1 class="fw-bold text-dark display-5 mb-3" style="letter-spacing: -1px; line-height: 1.15;">
                Розрахунок димоходу для твердопаливного котла: повний посібник
            </h1>
            <p class="lead text-muted fs-5">
                Правильний розрахунок димоходу для твердопаливного котла — основа безпечної та ефективної роботи системи опалення. Неправильно спроєктований димохід може призвести до зворотної тяги, задимлення приміщень і навіть отруєння чадним газом.
            </p>
        </header>

        {{-- Блок: Чому це важливо --}}
        <div class="p-4 rounded-4 mb-5" style="background: linear-gradient(135deg, #fbfbfb 0%, #f3f4f6 100%); border-left: 5px solid #ea580c;">
            <h4 class="fw-semibold text-dark mb-3">Що таке розрахунок димоходу і навіщо він потрібен</h4>
            <p class="text-muted mb-0">
                Розрахунок димоходу — це комплекс обчислень, що визначає оптимальні геометричні та аеродинамічні параметри димової труби для конкретного опалювального обладнання. Правильні розрахунки забезпечують стабільну тягу для повного згоряння палива, безпечне відведення продуктів згоряння, максимальний ККД котла та повну відповідність вимогам пожежної безпеки.
            </p>
        </div>

        {{-- РОЗДІЛ 1: ДІАМЕТР --}}
        <section class="mb-5">
            <div class="d-flex align-items-center mb-4">
                <div class="step-number-ui">1</div>
                <h2 class="fw-bold text-dark h3 m-0">Розрахунок діаметра димоходу</h2>
            </div>
            
            <p>
                Розрахунок діаметра димоходу для твердопаливного котла — першочергове завдання. Він базується на визначенні необхідної площі поперечного перерізу, через яку проходить об'єм газів, що утворюються в процесі горіння. Розрахунок виконується за формулою:
            </p>

           <div class="formula-box-ui my-4">
    \[
    D = \sqrt{\frac{4 \cdot V}{\pi \cdot w}}
    \]
</div>

            <div class="row g-3 text-muted mb-4 ps-3">
                <div class="col-md-6"><strong>D</strong> — потрібний діаметр димоходу (м)</div>
                <div class="col-md-6"><strong>w</strong> — швидкість руху газів (для твердого палива: 1.5 – 2.5 м/с)</div>
                <div class="col-md-6"><strong>V</strong> — об’єм димових газів (м³/с)</div>
                <div class="col-md-6"><strong>$\pi$</strong> — математична константа ($\approx 3.1416$)</div>
            </div>

          {{-- 3D Інфографіка: Конструкція труби (Сендвіч) - Максимальний розмір --}}
<div class="infographic-container my-5">
    <div class="infographic-header">
        <span class="badge bg-orange mb-1">Технічна специфікація</span>
        <h5 class="m-0 text-white fw-semibold">Анатомія термоізольованого сендвіч-димоходу</h5>
    </div>
    
    <div class="p-4 bg-white">
        {{-- Центральний блок із величезною картинкою --}}
        <div class="text-center mb-4">
            <div class="visual-3d-placeholder py-5 px-3 rounded-4" style="background: radial-gradient(circle, #f8fafc 0%, #e2e8f0 100%);">
                <img src="{{ asset('images/chimney/sandwich-structure.webp') }}" 
                     alt="Анатомія сендвіч-димоходу" 
                     class="img-fluid" 
                     style="mix-blend-mode: multiply; max-height: 480px; width: auto; object-fit: contain; transform: scale(1.02);">
            </div>
        </div>

        {{-- Текстові характеристики знизу у вигляді трьох колонок --}}
        <div class="row g-4 pt-3 border-top">
            <div class="col-md-4">
                <div class="d-flex align-items-start">
                    <i class="bi bi-shield-check text-orange fs-4 me-2 mt-n1"></i>
                    <div>
                        <h6 class="fw-bold text-dark mb-1">Внутрішній діаметр</h6>
                        <p class="text-muted small mb-0">Визначає пропускну здатність системи та забезпечує оптимальну швидкість виведення газів.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="d-flex align-items-start">
                    <i class="bi bi-layers text-orange fs-4 me-2 mt-n1"></i>
                    <div>
                        <h6 class="fw-bold text-dark mb-1">Базальтова вата</h6>
                        <p class="text-muted small mb-0">Шар від 30-50 мм мінімізує утворення агресивного конденсату та утримує тепло в системі.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="d-flex align-items-start">
                    <i class="bi bi-fire text-orange fs-4 me-2 mt-n1"></i>
                    <div>
                        <h6 class="fw-bold text-dark mb-1">Сталь AISI 321/304</h6>
                        <p class="text-muted small mb-0">Кислотостійкий жароміцний внутрішній шар, стійкий до критичних температур твердого палива.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
        </section>

        <hr class="my-5" style="border-color: #edf2f7;">

        {{-- РОЗДІЛ 2: ВИСОТА --}}
        <section class="mb-5">
            <div class="d-flex align-items-center mb-4">
                <div class="step-number-ui">2</div>
                <h2 class="fw-bold text-dark h3 m-0">Розрахунок висоти димової труби</h2>
            </div>

            <p>
                Висота димоходу забезпечує первинну різницю тисків і виводить димові гази за межі зони аеродинамічного підпору даху. Розрахунок висоти димоходу виконується за формулою природної тяги:
            </p>

            <div class="formula-box-ui my-4">
\[
H = \frac{A \cdot Q_n \cdot (T_e - T_h)}
{S \cdot T_e \cdot T_h}
\]
</div>

            <div class="row g-3 text-muted mb-4 ps-3">
                <div class="col-md-6"><strong>H</strong> — висота димоходу (м)</div>
                <div class="col-md-6"><strong>Qn</strong> — кількість спалюваного палива (кг/год)</div>
                <div class="col-md-6"><strong>A</strong> — коефіцієнт, що залежить від метеоумов</div>
                <div class="col-md-6"><strong>S</strong> — площа перерізу димоходу (м²)</div>
                <div class="col-md-6"><strong>Te</strong> — температура відхідних газів (К)</div>
                <div class="col-md-6"><strong>Th</strong> — температура зовнішнього повітря (К)</div>
            </div>

            {{-- Елемент Інфографіки: Нормативні висоти над дахом --}}
            <div class="p-4 rounded-4 my-4" style="background-color: #f8fafc; border: 1px solid #e2e8f0;">
                <h5 class="fw-bold text-dark mb-3 text-center text-md-start"><i class="bi bi-cone-striped text-orange me-2"></i>Нормативи розташування відносно коника даху</h5>
                <div class="table-responsive">
                    <table class="table table-borderless align-middle mb-0">
                        <tbody>
                            <tr>
                                <td><span class="badge-distance">до 1.5 метра</span></td>
                                <td><strong>Труба повинна підніматися мінімум на 0.5 метра</strong> над коником.</td>
                            </tr>
                            <tr>
                                <td><span class="badge-distance">від 1.5 до 3 метрів</span></td>
                                <td><strong>Труба встановлюється врівень</strong> з коником даху.</td>
                            </tr>
                            <tr>
                                <td><span class="badge-distance">більше 3 метрів</span></td>
                                <td>Труба виводиться не нижче лінії, проведеної від коника вниз під кутом <strong>10° до горизонту</strong>.</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>

        <hr class="my-5" style="border-color: #edf2f7;">

        {{-- РОЗДІЛ 3: ТЯГА --}}
        <section class="mb-5">
            <div class="d-flex align-items-center mb-4">
                <div class="step-number-ui">3</div>
                <h2 class="fw-bold text-dark h3 m-0">Розрахунок і норми тяги</h2>
            </div>

            <p>
                Статична тяга (самотяга) виникає через різницю густини гарячих газів всередині труби та холодного повітря ззовні:
            </p>

           <div class="formula-box-ui my-4">
\[
\Delta p =
g \cdot H \cdot
(\rho_{н} - \rho_{г})
\]
</div>

            <div class="row g-3 text-muted mb-4 ps-3">
                <div class="col-md-6"><strong>$\Delta p$</strong> — різниця тисків / тяга (Па)</div>
                <div class="col-md-6"><strong>$\rho_н$</strong> — густина зовнішнього повітря (кг/м³)</div>
                <div class="col-md-6"><strong>g</strong> — прискорення вільного падіння (9.81 м/с²)</div>
                <div class="col-md-6"><strong>$\rho_г$</strong> — густина димових газів (кг/м³)</div>
            </div>

            {{-- Візуальна шкала тяги --}}
            <h5 class="fw-semibold text-dark mb-3">Діапазони сили тяги в системі:</h5>
            <div class="progress-scale-container mb-4">
                <div class="progress-scale-item style-low" style="width: 30%">
                    <span class="scale-title">10–20 Pa</span>
                    <span class="scale-desc">Мінімальна</span>
                </div>
                <div class="progress-scale-item style-opt" style="width: 40%">
                    <span class="scale-title">20–30 Pa</span>
                    <span class="scale-desc">Оптимальна</span>
                </div>
                <div class="progress-scale-item style-high" style="width: 30%">
                    <span class="scale-title">понад 60 Pa</span>
                    <span class="scale-desc">Надмірна</span>
                </div>
            </div>
        </section>

        <hr class="my-5" style="border-color: #edf2f7;">

        {{-- РОЗДІЛ 4: ТИПИ ОБЛАДНАННЯ (ТАБЛИЦЯ) --}}
        <section class="mb-5">
            <h3 class="fw-bold text-dark mb-4">Швидкий підбір за типом обладнання</h3>
            <p>Якщо вам потрібні усереднені інженерні дані для швидкого орієнтування, скористайтеся нашою таблицею зведення технічних характеристик:</p>
            
            <div class="table-responsive rounded-3 border">
                <table class="table table-hover align-middle mb-0 custom-tech-table">
                    <thead class="table-dark">
                        <tr>
                            <th>Тип приладу</th>
                            <th>Потужність / Параметр</th>
                            <th>Рекомен. переріз</th>
                            <th>Особливість монтажу</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="fw-semibold">Тверд-ний котел</td>
                            <td>До 16 кВт<br><small class="text-muted">16 – 35 кВт</small></td>
                            <td><strong>150–180 мм</strong><br><small class="text-muted">180–220 мм</small></td>
                            <td>Запас потужності 20%</td>
                        </tr>
                        <tr>
                            <td class="fw-semibold">Банна піч</td>
                            <td>Мінімальна висота 5м</td>
                            <td><strong>115–200 мм</strong></td>
                            <td>Утеплення на горищі обов'язкове</td>
                        </tr>
                        <tr>
                            <td class="fw-semibold">Буржуйка</td>
                            <td>До 2 кВт<br><small class="text-muted">2 – 5 кВт</small></td>
                            <td><strong>80–100 мм</strong><br><small class="text-muted">100–120 мм</small></td>
                            <td>Залежить від об'єму топки</td>
                        </tr>
                        <tr>
                            <td class="fw-semibold">Камін</td>
                            <td>Відкрита топка</td>
                            <td><strong>1/8 – 1/10 площі топки</strong></td>
                            <td>Мінім. діаметр 200 мм</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>

        {{-- Кнопка Дії (Перехід на калькулятор) --}}
        <footer class="text-center mt-5 pt-4 border-top">
            <h5 class="fw-semibold mb-3">Бажаєте виконати розрахунок автоматично?</h5>
            <p class="text-muted mb-4">Наш інтерактивний онлайн-калькулятор димоходу врахує всі змінні та видасть  рекомендований діаметр, висоту та орієнтовну тягу димоходу для вашого обладнання.</p>
            <a href="{{ route('chimney.calculator') }}" class="btn btn-orange-lg px-5 py-3 fw-bold rounded-3 text-uppercase">
                <i class="bi bi-calculator me-2"></i> Запустити онлайн-калькулятор
            </a>
        </footer>

    </article>
</div>

{{-- Стилі для сторінки інструкції та 3D елементів --}}
<style>
    .bg-orange { background-color: #ea580c; }
    .text-orange { color: #ea580c; }
    
    .useful-badge {
        display: inline-flex;
        align-items: center;
        background: #fff7ed;
        color: #ea580c;
        font-size: .85rem;
        font-weight: 700;
        padding: 6px 16px;
        border-radius: 30px;
        border: 1px solid #ffedd5;
    }

    .step-number-ui {
        width: 38px;
        height: 38px;
        background: #ea580c;
        color: #ffffff;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
        margin-right: 15px;
        box-shadow: 0 4px 10px rgba(234, 88, 12, 0.25);
    }

    /* Візуальне оформлення формул */
    .formula-box-ui {
        background: #1e293b;
        color: #f8fafc;
        padding: 24px;
        border-radius: 12px;
        text-align: center;
        font-size: 1.35rem;
        overflow-x: auto;
        box-shadow: inset 0 2px 8px rgba(0,0,0,0.2);
    }

    /* Блок 3D інфографіки */
    .infographic-container {
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 10px 25px rgba(0,0,0,0.03);
    }

    .infographic-header {
        background: #1e293b;
        padding: 15px 20px;
        border-bottom: 3px solid #ea580c;
    }

    .visual-3d-placeholder {
        background: radial-gradient(circle, #f8fafc 0%, #e2e8f0 100%);
        padding: 20px;
        border-radius: 12px;
        display: inline-block;
        width: 100%;
    }

    .custom-features-list li {
        margin-bottom: 12px;
        font-size: 1.05rem;
    }

    .badge-distance {
        background: #e2e8f0;
        color: #334155;
        padding: 4px 12px;
        border-radius: 6px;
        font-weight: 600;
        font-size: 0.85rem;
        display: inline-block;
        width: 100%;
        text-align: center;
    }

    /* Інтерактивна шкала прогресу */
    .progress-scale-container {
        display: flex;
        height: 45px;
        border-radius: 8px;
        overflow: hidden;
        font-weight: 600;
        color: #fff;
        text-shadow: 0 1px 2px rgba(0,0,0,0.1);
    }

    .progress-scale-item {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        font-size: 0.85rem;
        padding: 0 5px;
    }

    .style-low { background-color: #3b82f6; }
    .style-opt { background-color: #10b981; }
    .style-high { background-color: #ef4444; }

    .scale-title { font-weight: 700; font-size: 0.95rem; }
    .scale-desc { font-size: 0.72rem; opacity: 0.9; }

    /* Таблиця технічних характеристик */
    .custom-tech-table th {
        padding: 14px;
        font-weight: 600;
    }
    
    .custom-tech-table td {
        padding: 14px;
    }

    /* Велика кнопка */
    .btn-orange-lg {
        background: #ea580c;
        color: #ffffff;
        border: none;
        box-shadow: 0 5px 15px rgba(234, 88, 12, 0.3);
        transition: all 0.2s ease;
    }

    .btn-orange-lg:hover {
        background: #c2410c;
        color: #ffffff;
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(234, 88, 12, 0.4);
    }
    /* Ефект наведення для хлібних кришок */
.breadcrumb-item a {
    transition: color 0.2s ease-in-out;
}

.breadcrumb-item a:hover {
    color: #ea580c !important; /* Ваш фірмовий помаранчевий колір */
    text-decoration: underline !important; /* Підкреслення для кращого акценту */
}
@media (max-width: 475px) {
.scale-title { font-weight: 700; font-size: 0.8em; }
    .scale-desc { font-size: 0.7rem; opacity: 0.9; }
     .progress-scale-container {
       
        height: 60px;
       
    }
     .custom-tech-table th {
        padding: 2px;
        font-weight: 400;
    }
    
    .custom-tech-table td {
        padding: 8px;
    }
}
</style>
@endsection
@push('schema-useful-item2')
<script type="application/ld+json">
{!! json_encode([
  '@context' => 'https://schema.org',
  '@type' => 'WebPage',

  '@id' => url('/useful-info/how-to-choose-chimney-diameter#page'),
  'name' => 'Розрахунок димоходу для твердопаливного котла',
  'url' => url('/useful-info/how-to-choose-chimney-diameter'),

  'publisher' => [
    '@type' => 'Organization',
    '@id' => 'https://www.dymsystems.pp.ua/#organization'
  ]
], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) !!}
</script>
@endpush