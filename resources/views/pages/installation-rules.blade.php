@extends('layouts.main')
@section('title', 'Монтаж димоходу: правила та вимоги | DymSystems')

@section('description',
'Правила монтажу димоходу: висота, горизонтальні ділянки, утеплення, безпека та відведення конденсату. Інструкція для правильного встановлення димохідних систем.')

@section('content')

@php
// Определяем переменные здесь, чтобы они были доступны во всем шаблоне
$rules = [
    ['bi-arrows-expand', 'Висота', 'Мінімум 5 м для стабільної тяги'],
    ['bi-arrow-left-right', 'Горизонталь', 'Не більше 1 м'],
    ['bi-fire', 'Утеплення', 'Сендвіч для холодних зон'],
    ['bi-exclamation-triangle', 'Безпека', 'Пожежні відступи обов’язкові'],
    ['bi-droplet', 'Конденсат', 'Збір системи по потоку конденсату'],
];
@endphp



<main class="bg-light pb-5">
<div class="container-1600 my-5">
    {{-- HERO --}}
    <div class="position-relative text-white d-flex align-items-center hero-glow rounded-4 overflow-hidden"
        style="min-height: 520px; background: url('{{ asset('images/chimney/hero-banner.webp') }}') center/cover no-repeat;">

        <div class="position-absolute w-100 h-100"
             style="background: linear-gradient(90deg, rgba(15,23,42,0.85), rgba(15,23,42,0.4));"></div>

        <div class="container position-relative">
            <div class="row align-items-center">
                <div class="col-lg-7">
                    <nav class="mb-3">
                        <a href="{{ route('main.index') }}" class="text-white-50 text-decoration-none">Головна</a> 
                        <span class="text-white-50 mx-2">/</span> 
                        <a href="{{ route('useful.index') }}" class="text-white-50 text-decoration-none">Корисна інформація</a> 
                        <span class="text-white-50 mx-2">/</span>
                        <span class="text-white">Монтаж</span>
                    </nav>
                    <div class="mb-3">
                        <span class="badge text-bg-warning px-3 py-2 rounded-pill fw-semibold">
                            Професійний монтаж димоходів
                        </span>
                    </div>

                    <h1 class="fw-bold display-5">
                        Інженерний монтаж <br>
                        <span style="color:#fbbf24;">димохідних систем</span>
                    </h1>

                    <p class="soft-text mt-3 fs-5">
                        Безпечні рішення для котлів, камінів та твердопаливних систем з гарантією герметичності.
                    </p>

                    <div class="d-flex gap-3 mt-4">
                        <a href="#form" class="btn btn-warning px-4 fw-bold shadow">
                            Отримати консультацію
                        </a>
                        <a href="{{ route('chimney.calculator') }}" class="btn btn-outline-light px-4">
                            Калькулятор
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- FEATURES --}}
    <div class="container mt-5 px-0">
        <div class="row g-4">
            <div class="col-md-4">
                <div class="p-card p-4 text-center h-100">
                    <div class="p-icon mx-auto mb-3">
                        <i class="bi bi-shield-check fs-4"></i>
                    </div>
                    <h5 class="fw-bold">Безпека</h5>
                    <p class="text-muted small mb-0">Дотримання всіх пожежних норм і стандартів.</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="p-card p-4 text-center h-100">
                    <div class="p-icon mx-auto mb-3">
                        <i class="bi bi-rulers fs-4"></i>
                    </div>
                    <h5 class="fw-bold">Точний розрахунок</h5>
                    <p class="text-muted small mb-0">Підбір діаметра, висоти та тяги під обладнання.</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="p-card p-4 text-center h-100">
                    <div class="p-icon mx-auto mb-3">
                        <i class="bi bi-award fs-4"></i>
                    </div>
                    <h5 class="fw-bold">Гарантія</h5>
                    <p class="text-muted small mb-0">Контроль монтажу та гарантія на роботи.</p>
                </div>
            </div>
        </div>

   {{-- ОСНОВНА СІТКА --}}
    <div class="row mt-5 g-4">
        {{-- ЛЕВАЯ КОЛОНКА (Правила + Схема) --}}
        <div class="col-lg-8">
            <div class="p-card p-4 p-md-5 mb-4">
                <h2 class="fw-bold mb-4">5 ключових правил монтажу</h2>
                <div class="row g-4">
                    @foreach($rules as $r)
                        <div class="col-md-6">
                            <div class="d-flex">
                                <div class="p-icon me-3 flex-shrink-0">
                                    <i class="bi {{ $r[0] }}"></i>
                                </div>
                                <div>
                                    <h5 class="fw-bold mb-1">{{ $r[1] }}</h5>
                                    <p class="text-muted small mb-0">{{ $r[2] }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="p-card p-4 text-center">
                <h4 class="fw-bold mb-3">Інженерна схема монтажу</h4>
                <img src="{{ asset('images/chimney/chimney-main-schema.webp') }}"
     width="1165"
     height="1350"
     class="img-fluid rounded-4"
     alt="Схема монтажу димоходу"
     loading="lazy"
     decoding="async">
            </div>
        </div>

        {{-- ПРАВАЯ КОЛОНКА (САЙДБАР) --}}
        <div class="col-lg-4">
            <div class="sticky-top" style="top: 140px;">
                <div id="form" class="p-card p-4 mb-4">
                    <h4 class="fw-bold mb-2">Консультація</h4>
                    <p class="text-muted small mb-3">Підбір системи та безкоштовний розрахунок.</p>
                   <form action="{{ route('leads.store') }}" 
      data-action="{{ route('leads.store') }}" 
      method="POST" 
      class="needs-validation" 
      novalidate>
    @csrf
    
    <input type="hidden" name="device_type" value="Консультація з блогу">

    <input type="text" name="name" id="name" class="form-control mb-3" placeholder="Ваше ім'я" autocomplete="name" required>
    <input 
    type="tel" 
    name="phone" 
    id="phone" 
    class="form-control mb-3" 
    placeholder="+38 (___) ___-__-__" 
    autocomplete="tel" 
    required
    pattern="\+38\s\(\d{3}\)\s\d{3}-\d{2}-\d{2}">
    
    <button type="submit" class="btn btn-warning w-100 fw-bold">Відправити</button>
</form>
                </div>
                <div class="p-card p-4 bg-dark text-white text-center">
                    <i class="bi bi-calculator fs-2 text-warning"></i>
                    <h5 class="fw-bold mt-2">Калькулятор</h5>
                    <p class="small text-white-50">Розрахунок діаметра та висоти онлайн.</p>
                    <a href="{{ route('chimney.calculator') }}" class="btn btn-outline-light w-100">Відкрити</a>
                </div>
            </div>
        </div>
    </div>

    {{-- БЛОК ОШИБОК (Полноширинный, находится за пределами основного row) --}}
    <div class="mt-4">
        <div class="p-card p-4 p-md-5">
            <h3 class="fw-bold mb-4">Типові помилки під час монтажу</h3>
            <div class="row">
                <div class="col-12 mb-4">
                    <img src="{{ asset('images/chimney/pomulku_montag.webp') }}"
     width="1693"
     height="929"
     class="img-fluid rounded-4 shadow-sm w-100"
     alt="Типові помилки монтажу димоходу"
     loading="lazy"
     decoding="async">
                </div>
            </div>
            <div class="row g-3">
                @foreach(['Завуження діаметра', 'Відсутність утеплення', 'Довгі горизонти', 'Неправильні стики', 'Відсутність ревізії', 'Недостатня висота'] as $m)
                  <div class="col-6 col-md-4 col-lg-2">
                        <div class="border rounded-3 p-3 bg-light text-center h-100">
                            <i class="bi bi-x-circle-fill text-danger d-block mb-2"></i>
                            <span class="small fw-medium">{{ $m }}</span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <section class="mt-5">
    <div class="p-card p-4 p-md-5">
        <h3 class="fw-bold mb-4">Технічні вимоги та етапи монтажу димохідних систем</h3>
        <div class="row">
            <div class="col-lg-6">
                <p>Правильний монтаж димоходу починається з вибору матеріалу. Ми використовуємо нержавіючу сталь марок AISI 321 або 304, які стійкі до високих температур та кислотного середовища.</p>
                <h5 class="fw-bold">Основні етапи робіт:</h5>
                <ul class="text-muted">
                    <li><strong>Проектування:</strong> розрахунок перерізу каналу та висоти труби відносно конька даху.</li>
                    <li><strong>Монтаж системи "сендвіч":</strong> правильне утеплення базальтовою ватою для запобігання утворенню конденсату.</li>
                    
                </ul>
            </div>
            <div class="col-lg-6">
                <p>Особливу увагу приділяємо <strong>пожежній безпеці при проходженні через перекриття та покрівлю</strong>. Використання спеціальних прохідних вузлів (коробів) дозволяє уникнути перегріву дерев'яних конструкцій, що є критично важливим для безпеки вашого дому.</p>
                <div class="bg-light p-3 rounded-3 border-start border-4 border-warning">
                    <p class="mb-0 small italic"><strong>Важливо:</strong> Згідно з ДБН, горизонтальні ділянки димоходу повинні бути мінімальними (до 1 м), а загальна висота системи — забезпечувати достатню природну тягу для стабільної роботи котла.</p>
                </div>
            </div>
        </div>
    </div>
</section>

    {{-- БЛОК СТАТТІ --}}
<div class="mt-5">
    <div class="p-card p-4 p-md-5" style="background: #f8fafc;">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h3 class="fw-bold mb-3">Чому професійний монтаж димоходу — це не розкіш, а необхідність?</h3>
                <p class="text-muted">
                    Самостійний монтаж або залучення некваліфікованих майстрів часто призводить до порушення тяги, утворення конденсату та, що найгірше, ризику пожежі через перегрів конструкцій. 
                </p>
                <p class="text-muted">
                    У нашій статті ми детально розібрали, як інженерний підхід до вибору матеріалів та дотримання пожежних норм подовжує термін служби вашої опалювальної системи на десятиліття.
                </p>
                <a href="{{ route('blog.installation-errors') }}" class="btn btn-outline-dark fw-bold mt-2">Читати повну статтю</a>
            </div>
            <div class="col-lg-6 text-lg-end mt-4 mt-lg-0">
                <div class="position-relative">
                    <img src="{{ asset('images/chimney/article-preview.webp') }}"
     width="1280"
     height="714"
     class="img-fluid rounded-4 shadow-lg"
     alt="Професійний монтаж димоходу"
     loading="lazy"
     decoding="async">
                </div>
            </div>
        </div>
    </div>
</div>

    {{-- НИЖНІЙ СТАЦІОНАРНИЙ БАНЕР --}}
    <div class="mt-5">
        <div class="p-card p-5 text-center" style="background: linear-gradient(135deg,#0f172a,#1e293b); color:#fff;">
            <h2>Чому правильний монтаж димоходу настільки важливий?</h2>

<p>
Навіть якісний димохід із нержавіючої сталі не забезпечить ефективну роботу,
якщо під час встановлення були допущені помилки. Неправильний вибір діаметра,
надмірна кількість горизонтальних ділянок або порушення правил проходу через
покрівлю можуть негативно вплинути на тягу та безпечність експлуатації.
</p>

<p>
Саме тому перед монтажем рекомендується виконати попередній розрахунок,
врахувати характеристики опалювального обладнання та використовувати
сертифіковані комплектуючі. Дотримання вимог виробника та будівельних норм
дозволяє забезпечити стабільну роботу системи протягом багатьох років.
</p>
            <h3 class="fw-bold">Потрібен монтаж під ключ?</h3>
            <p class="text-white-50">Інженер підбере оптимальне рішення для вашого об'єкта</p>
            <a href="#form" class="btn btn-warning px-4 fw-bold">Отримати консультацію</a>
        </div>
    </div>
    
</div>
<section class="mt-5">
    <div class="p-card p-4 p-md-5">
        <h3 class="fw-bold mb-4">Часті запитання про монтаж димоходів</h3>
        <div class="accordion" id="faqAccordion">
            <!-- FAQ 1 -->
            <div class="accordion-item border-0 mb-3">
                <h2 class="accordion-header">
                     <button
            class="accordion-button shadow-none fw-bold"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#faq1"
            aria-expanded="true"
            aria-controls="faq1">
            Яка марка нержавіючої сталі найкраща для твердопаливного котла?
        </button>
                </h2>
                <div
        id="faq1"
        class="accordion-collapse collapse show"
        data-bs-parent="#faqAccordion">
                    <div class="accordion-body text-muted">
                        Для твердопаливних котлів рекомендується використовувати сталь марки AISI 321 або 304. Вони містять домішки титану або молібдену, що робить їх стійкими до високих температур (до 800°C) та агресивного впливу конденсату з кислотними сполуками.
                    </div>
                </div>
            </div>
            <!-- FAQ 2 -->
            <div class="accordion-item border-0 mb-3">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed shadow-none fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                        Чи можна монтувати димохід без утеплення (сендвіча)?
                    </button>
                </h2>
                <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                    <div class="accordion-body text-muted">
                        Монтаж без утеплення допустимий лише всередині опалювального приміщення (якщо димохід проходить через теплу зону). Для зовнішніх ділянок або при проходженні через холодний горищний простір утеплення "сендвіч" є обов'язковим, щоб уникнути швидкого охолодження газів, утворення надмірної кількості конденсату та втрати тяги.
                    </div>
                </div>
            </div>
            <!-- FAQ 3 -->
            <div class="accordion-item border-0 mb-3">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed shadow-none fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                        Як часто потрібно проводити обслуговування системи?
                    </button>
                </h2>
                <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                    <div class="accordion-body text-muted">
                        Чистку димохідної системи необхідно проводити мінімум один раз на опалювальний сезон. При використанні смолянистих порід деревини (сосна, ялина) — двічі на сезон. Регулярна профілактика запобігає накопиченню сажі, яка може призвести до її займання.
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</main>


<script>
document.querySelectorAll('form[action="{{ route("leads.store") }}"]').forEach(form => {
    form.addEventListener('submit', async (e) => {
        // 1. Стандартна перевірка Bootstrap (замість старого блоку)
        if (!form.checkValidity()) {
            form.classList.add('was-validated');
            e.preventDefault();
            e.stopPropagation();
            return;
        }

        // 2. Валідація маски телефону
        if (window.phoneMaskInstance && !window.phoneMaskInstance.masked.isComplete) {
            e.preventDefault();
            alert('Будь ласка, введіть повний номер телефону');
            return;
        }

        e.preventDefault(); // Зупиняємо стандартну відправку, щоб відправити через AJAX
        
        const btn = form.querySelector('button[type="submit"]');
        btn.disabled = true;
        btn.textContent = 'Відправка...';

        try {
            const response = await fetch(form.action, {
                method: 'POST',
                body: new FormData(form),
                headers: {
    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
    'Accept': 'application/json'
}
});

            if (response.ok) {
                // Очищаємо поля
                form.querySelectorAll('input, textarea').forEach(input => input.value = '');
                
                // Очищаємо маску
                if (window.phoneMaskInstance) {
                    window.phoneMaskInstance.value = ''; 
                }
                
                // Знімаємо класи помилок
                form.classList.remove('was-validated'); 
                form.querySelectorAll('.is-invalid').forEach(el => el.classList.remove('is-invalid'));

                // ВИКЛИКАЄМО ФУНКЦІЮ ПОВІДОМЛЕННЯ
                showFlashMessage('Дякуємо! Заявку успішно прийнято.');
                
            }
        } catch (err) {
            console.error(err);
        } finally {
            btn.disabled = false;
            btn.textContent = 'Відправити';
        }
    });
});

// Ця функція має бути тут, щоб працювати в контексті цього скрипта
function showFlashMessage(text) {
    const div = document.createElement('div');
    div.className = 'custom-alert success-alert';
    div.style.position = 'fixed';
    div.style.top = '20px';
    div.style.right = '20px';
    div.style.zIndex = '9999';
    div.style.padding = '15px';
    div.style.background = '#198754';
    div.style.color = '#fff';
    div.style.borderRadius = '8px';
    div.innerHTML = `<i class="bi bi-check-circle-fill"></i> ${text}`;
    document.body.appendChild(div);
    setTimeout(() => div.remove(), 4000);
}
</script>
<style>
/* ===== PREMIUM UI LAYER ===== */
html {
    scroll-behavior: smooth;
}

.p-card {
    background: #fff;
    border-radius: 18px;
    box-shadow: 0 12px 35px rgba(15, 23, 42, 0.08);
    border: 1px solid rgba(15, 23, 42, 0.05);
    transition: all .25s ease;
}

.p-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 18px 50px rgba(15, 23, 42, 0.15);
}

.p-icon {
    width: 52px;
    height: 52px;
    border-radius: 14px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: linear-gradient(135deg,#f59e0b,#d97706);
    color: #fff;
    box-shadow: 0 10px 25px rgba(217,119,6,0.35);
}

.hero-glow {
    background: radial-gradient(circle at 20% 20%, rgba(245,158,11,.25), transparent 40%),
                radial-gradient(circle at 80% 30%, rgba(15,23,42,.6), transparent 40%);
}

.soft-text {
    color: rgba(255,255,255,0.75);
}

#form {
    /* Оптимальний відступ для більшості Navbar */
    scroll-margin-top: 150px; 
}

/* Гарантуємо, що кнопки в Hero можна натиснути */
.position-relative .btn {
    position: relative;
    z-index: 5;
}
/* Ефект наведення на посилання у навігації банера */
.hero-glow nav a {
    transition: all 0.3s ease;
    color: rgba(255, 255, 255, 0.5) !important;
    text-decoration: none !important;
}

.hero-glow nav a:hover {
    color: #ffffff !important;
    text-decoration: underline !important;
    text-shadow: 0 0 8px rgba(255, 255, 255, 0.4);
}

</style>

@endsection
@push('schema-useful-item3')
<script type="application/ld+json">
{!! json_encode([
  '@context' => 'https://schema.org',
  '@type' => 'CollectionPage',

  '@id' => url('/useful-info/montazh-dymohodu-pravyla#page'),
  'name' => 'Монтаж димоходу: правила та вимоги',
  'url' => url('/useful-info/montazh-dymohodu-pravyla'),

  'mainEntity' => [
    '@type' => 'ItemList',
    '@id' => url('/useful-info/montazh-dymohodu-pravyla#itemlist'),

    'itemListElement' => [
      [
        '@type' => 'ListItem',
        'position' => 1,
        'name' => '5 критичних помилок при монтажі димоходу',
        'item' => url('/useful-info/blog/pomylky-montazhu')
      ]
    ]
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
      'name' => 'Монтаж димоходу',
      'item' => url('/useful-info/montazh-dymohodu-pravyla')
    ]
  ]
], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) !!}
</script>
@endpush

@push('schema-webpage')
<script type="application/ld+json">
{!! json_encode([
    '@context' => 'https://schema.org',
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