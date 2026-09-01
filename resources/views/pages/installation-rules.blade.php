@extends('layouts.main')
@section('title', __('chimney-installation.seo_title'))

@section('description', __('chimney-installation.seo_description'))

@section('content')

@php
    $rules = __('chimney-installation.rules');
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
    <a href="{{ route('main.index') }}"
       class="text-white-50 text-decoration-none">
        {{ __('chimney-installation.breadcrumb_home') }}
    </a>

    <span class="text-white-50 mx-2">/</span>

    <a href="{{ route('useful.index') }}"
       class="text-white-50 text-decoration-none">
        {{ __('chimney-installation.breadcrumb_useful') }}
    </a>

    <span class="text-white-50 mx-2">/</span>

    <span class="text-white">
        {{ __('chimney-installation.breadcrumb_current') }}
    </span>
</nav>
                    <div class="mb-3">
    <span class="badge text-bg-warning px-3 py-2 rounded-pill fw-semibold">
        {{ __('chimney-installation.hero_badge') }}
    </span>
</div>

<h1 class="fw-bold display-5">
    {{ __('chimney-installation.hero_title') }} <br>
    <span style="color:#fbbf24;">
        {{ __('chimney-installation.hero_title_highlight') }}
    </span>
</h1>

<p class="soft-text mt-3 fs-5">
    {{ __('chimney-installation.hero_text') }}
</p>

<div class="d-flex gap-3 mt-4">
    <a href="#form" class="btn btn-warning px-4 fw-bold shadow">
        {{ __('chimney-installation.hero_consultation') }}
    </a>

    <a href="{{ route('chimney.calculator') }}"
       class="btn btn-outline-light px-4">
        {{ __('chimney-installation.hero_calculator') }}
    </a>
</div>
                </div>
            </div>
        </div>
    </div>

    {{-- FEATURES --}}
    <div class="container mt-5 px-0">
    <div class="row g-4">
        @foreach(__('chimney-installation.advantages') as $advantage)
            <div class="col-md-4">
                <div class="p-card p-4 text-center h-100">
                    <div class="p-icon mx-auto mb-3">
                        <i class="bi {{ $advantage['icon'] }} fs-4"></i>
                    </div>

                    <h5 class="fw-bold">
                        {{ $advantage['title'] }}
                    </h5>

                    <p class="text-muted small mb-0">
                        {{ $advantage['text'] }}
                    </p>
                </div>
            </div>
        @endforeach
    </div>
</div>

   {{-- ОСНОВНА СІТКА --}}
    <div class="row mt-5 g-4">
        {{-- ЛЕВАЯ КОЛОНКА (Правила + Схема) --}}
        <div class="col-lg-8">
            <div class="p-card p-4 p-md-5 mb-4">
               <h2 class="fw-bold mb-4">
    {{ __('chimney-installation.key_rules_title') }}
</h2>
                <div class="row g-4">
                 @foreach($rules as $r)
    <div class="col-md-6">
        <div class="d-flex">
            <div class="p-icon me-3 flex-shrink-0">
                <i class="bi {{ $r['icon'] }}"></i>
            </div>

            <div>
                <h5 class="fw-bold mb-1">
                    {{ $r['title'] }}
                </h5>

                <p class="text-muted small mb-0">
                    {{ $r['text'] }}
                </p>
            </div>
        </div>
    </div>
@endforeach
                </div>
            </div>

            <div class="p-card p-4 text-center">
               <h4 class="fw-bold mb-3">
    {{ __('chimney-installation.engineering_scheme_title') }}
</h4>
     <img src="{{ asset('images/chimney/' . (app()->getLocale() === 'ru' ? 'chimney-main-schemaru.webp' : 'chimney-main-schema.webp')) }}" 
     width="1165" 
     height="1350" 
     class="img-fluid rounded-4" 
     alt="{{ __('chimney-installation.main_schema_image_alt') }}" 
     loading="lazy" 
     decoding="async">
            </div>
        </div>

        {{-- ПРАВАЯ КОЛОНКА (САЙДБАР) --}}
        <div class="col-lg-4">
            <div class="sticky-top" style="top: 140px;">
                <div id="form" class="p-card p-4 mb-4">
                   <h4 class="fw-bold mb-2">
    {{ __('chimney-installation.consultation_title') }}
</h4>

<p class="text-muted small mb-3">
    {{ __('chimney-installation.consultation_text') }}
</p>
                   <form action="{{ route('leads.store') }}" 
      data-action="{{ route('leads.store') }}" 
      method="POST" 
      class="needs-validation" 
      novalidate>
    @csrf
    
 <input type="hidden"
       name="device_type"
       value="{{ __('chimney-installation.consultation_device_type') }}">

   <input type="text"
       name="name"
       id="name"
       class="form-control mb-3"
       placeholder="{{ __('chimney-installation.name_placeholder') }}"
       autocomplete="name"
       required>
    <input 
    type="tel" 
    name="phone" 
    id="phone" 
    class="form-control mb-3" 
    placeholder="+38 (___) ___-__-__" 
    autocomplete="tel" 
    required
    pattern="\+38\s\(\d{3}\)\s\d{3}-\d{2}-\d{2}">
    
    <button type="submit" class="btn btn-warning w-100 fw-bold">
    {{ __('chimney-installation.submit_button') }}
</button>
</form>
                </div>
               <div class="p-card p-4 bg-dark text-white text-center">
    <i class="bi bi-calculator fs-2 text-warning"></i>

    <h5 class="fw-bold mt-2">
        {{ __('chimney-installation.calculator_title') }}
    </h5>

    <p class="small text-white-50">
        {{ __('chimney-installation.calculator_text') }}
    </p>

    <a href="{{ route('chimney.calculator') }}"
       class="btn btn-outline-light w-100">
        {{ __('chimney-installation.calculator_button') }}
    </a>
</div>
            </div>
        </div>
    </div>

    {{-- БЛОК ОШИБОК (Полноширинный, находится за пределами основного row) --}}
    <div class="mt-4">
        <div class="p-card p-4 p-md-5">
           <h3 class="fw-bold mb-4">
    {{ __('chimney-installation.common_mistakes_title') }}
</h3>
            <div class="row">
                <div class="col-12 mb-4">
        <img src="{{ asset('images/chimney/' . (app()->getLocale() === 'ru' ? 'pomulku_montagru.webp' : 'pomulku_montag.webp')) }}"
     width="1693"
     height="929"
     class="img-fluid rounded-4 shadow-sm w-100"
     alt="{{ __('chimney-installation.mistakes_image_alt') }}"
     loading="lazy"
     decoding="async">
                </div>
            </div>
            <div class="row g-3">
               @foreach(__('chimney-installation.mistakes') as $m)
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

        <h3 class="fw-bold mb-4">
            {{ __('chimney-installation.technical_requirements.title') }}
        </h3>

        <div class="row">

            <div class="col-lg-6">

                <p>
                    {{ __('chimney-installation.technical_requirements.intro') }}
                </p>

                <h5 class="fw-bold">
                    {{ __('chimney-installation.technical_requirements.stages_title') }}
                </h5>

                <ul class="text-muted">

                    <li>
                        <strong>
                            {{ __('chimney-installation.technical_requirements.design_title') }}
                        </strong>
                        {{ __('chimney-installation.technical_requirements.design_text') }}
                    </li>

                    <li>
                        <strong>
                            {{ __('chimney-installation.technical_requirements.sandwich_title') }}
                        </strong>
                        {{ __('chimney-installation.technical_requirements.sandwich_text') }}
                    </li>

                </ul>

            </div>

            <div class="col-lg-6">

                <p>
                    {{ __('chimney-installation.technical_requirements.safety') }}
                </p>

                <div class="bg-light p-3 rounded-3 border-start border-4 border-warning">
                    <p class="mb-0 small italic">
                        <strong>
                            {{ __('chimney-installation.technical_requirements.important_title') }}
                        </strong>
                        {{ __('chimney-installation.technical_requirements.important_text') }}
                    </p>
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

    <h3 class="fw-bold mb-3">
        {{ __('chimney-installation.professional_installation.title') }}
    </h3>

    <p class="text-muted">
        {{ __('chimney-installation.professional_installation.text_1') }}
    </p>

    <p class="text-muted">
        {{ __('chimney-installation.professional_installation.text_2') }}
    </p>

    <a href="{{ route('blog.installation-errors') }}"
       class="btn btn-outline-dark fw-bold mt-2">
        {{ __('chimney-installation.professional_installation.button') }}
        <i class="bi bi-arrow-right-circle ms-2"></i>
    </a>

</div>
            <div class="col-lg-6 text-lg-end mt-4 mt-lg-0">
                <div class="position-relative">
       <img src="{{ asset('images/chimney/' . (app()->getLocale() === 'ru' ? 'article-previewru.webp' : 'article-preview.webp')) }}"
     width="1280"
     height="714"
     class="img-fluid rounded-4 shadow-lg"
     alt="{{ __('chimney-installation.article_preview_image_alt') }}"
     loading="lazy"
     decoding="async">
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Адаптивний банер --}}
<div class="mt-5">
  <picture>
    {{-- Телефон --}}
    <source
        media="(max-width: 767.98px)"
        srcset="{{ app()->getLocale() === 'ru'
            ? asset('images/chimney/addmobru.webp')
            : asset('images/chimney/addmob.webp') }}">

    {{-- Планшет/ПК --}}
    <img
        src="{{ app()->getLocale() === 'ru'
            ? asset('images/chimney/addru.webp')
            : asset('images/chimney/add.webp') }}"
        alt="{{ __('installation.banner_image_alt') }}"
        class="img-fluid rounded-4 w-100"
        width="1600"
        height="600"
        loading="lazy"
        decoding="async">
</picture>
</div>

 {{-- НИЖНІЙ СТАЦІОНАРНИЙ БАНЕР --}}
<div class="mt-5">
    <div class="p-card p-5 text-center" style="background: linear-gradient(135deg,#0f172a,#1e293b); color:#fff;">

        <h2>{{ __('chimney-installation.bottom_banner_title') }}</h2>

        <p>
            {{ __('chimney-installation.bottom_banner_text_1') }}
        </p>

        <p>
            {{ __('chimney-installation.bottom_banner_text_2') }}
        </p>

        <h3 class="fw-bold">
            {{ __('chimney-installation.bottom_banner_cta_title') }}
        </h3>

        <p class="text-white-50">
            {{ __('chimney-installation.bottom_banner_cta_text') }}
        </p>

        <a href="#form" class="btn btn-warning px-4 fw-bold">
            {{ __('chimney-installation.bottom_banner_button') }}
        </a>

    </div>
</div>
<section class="mt-5">

    <div class="p-card p-4 p-md-5">

        <h3 class="fw-bold mb-4">
            {{ __('chimney-installation.faq_title') }}
        </h3>

        <div class="accordion" id="faqAccordion">

            {{-- FAQ 1 --}}
            <div class="accordion-item border-0 mb-3">

                <h2 class="accordion-header">
                    <button
                        class="accordion-button shadow-none fw-bold"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#faq1"
                        aria-expanded="true"
                        aria-controls="faq1">

                        {{ __('chimney-installation.faq_1_question') }}

                    </button>
                </h2>

                <div
                    id="faq1"
                    class="accordion-collapse collapse show"
                    data-bs-parent="#faqAccordion">

                    <div class="accordion-body text-muted">
                        {{ __('chimney-installation.faq_1_answer') }}
                    </div>

                </div>
            </div>

            {{-- FAQ 2 --}}
            <div class="accordion-item border-0 mb-3">

                <h2 class="accordion-header">
                    <button
                        class="accordion-button collapsed shadow-none fw-bold"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#faq2">

                        {{ __('chimney-installation.faq_2_question') }}

                    </button>
                </h2>

                <div
                    id="faq2"
                    class="accordion-collapse collapse"
                    data-bs-parent="#faqAccordion">

                    <div class="accordion-body text-muted">
                        {{ __('chimney-installation.faq_2_answer') }}
                    </div>

                </div>
            </div>

            {{-- FAQ 3 --}}
            <div class="accordion-item border-0 mb-3">

                <h2 class="accordion-header">
                    <button
                        class="accordion-button collapsed shadow-none fw-bold"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#faq3">

                        {{ __('chimney-installation.faq_3_question') }}

                    </button>
                </h2>

                <div
                    id="faq3"
                    class="accordion-collapse collapse"
                    data-bs-parent="#faqAccordion">

                    <div class="accordion-body text-muted">
                        {{ __('chimney-installation.faq_3_answer') }}
                    </div>

                </div>
            </div>

        </div>

    </div>

</section>
</main>

@php
    $installationTranslations = [
        'form_phone_incomplete' => __('chimney-installation.form_phone_incomplete'),
        'form_sending' => __('chimney-installation.form_sending'),
        'form_success' => __('chimney-installation.form_success'),
        'form_submit' => __('chimney-installation.form_submit'),
        'form_error' => __('chimney-installation.form_error'),
    ];
@endphp

<script>
    const installationTranslations = @json($installationTranslations);
</script>
<script>
document.querySelectorAll('form[action="{{ route("leads.store") }}"]').forEach(form => {

    form.addEventListener('submit', async (e) => {

        // 1. Стандартная проверка Bootstrap
        if (!form.checkValidity()) {
            e.preventDefault();
            e.stopPropagation();

            form.classList.add('was-validated');
            return;
        }

        // 2. Проверка маски телефона
        if (
            window.phoneMaskInstance &&
            !window.phoneMaskInstance.masked.isComplete
        ) {
            e.preventDefault();

            alert(installationTranslations.form_phone_incomplete);
            return;
        }

        // 3. Останавливаем стандартную отправку
        e.preventDefault();

        const btn = form.querySelector('button[type="submit"]');

        if (!btn) {
            console.error('Кнопка отправки формы не найдена.');
            return;
        }

        // 4. Защита от двойного клика
        if (btn.disabled) {
            return;
        }

        btn.disabled = true;
        btn.textContent = installationTranslations.form_sending;

        try {

            const response = await fetch(form.action, {
                method: 'POST',
                body: new FormData(form),
                headers: {
                    'X-CSRF-TOKEN': document
                        .querySelector('meta[name="csrf-token"]')
                        .content,

                    'Accept': 'application/json'
                }
            });

            // 5. Успешная отправка
            if (response.ok) {

                // Очищаем обычные поля
                form.querySelectorAll('input, textarea').forEach(input => {

                    // Не очищаем hidden-поля
                    if (input.type !== 'hidden') {
                        input.value = '';
                    }

                });

                // Очищаем телефонную маску
                if (window.phoneMaskInstance) {
                    window.phoneMaskInstance.value = '';
                }

                // Убираем состояние валидации
                form.classList.remove('was-validated');

                form.querySelectorAll('.is-invalid').forEach(el => {
                    el.classList.remove('is-invalid');
                });

                // Показываем сообщение
                showFlashMessage(
                    installationTranslations.form_success
                );

            } else {

                // Если сервер вернул ошибку
                console.error(
                    'Ошибка отправки формы:',
                    response.status,
                    response.statusText
                );

                alert(
                    installationTranslations.form_error ||
                    'Не вдалося відправити заявку. Спробуйте ще раз.'
                );
            }

        } catch (err) {

            // Ошибка сети / сервера
            console.error('Ошибка:', err);

            alert(
                installationTranslations.form_error ||
                'Помилка з’єднання. Спробуйте ще раз.'
            );

        } finally {

            // 6. ВАЖНО:
            // после отправки кнопка снова активна
            btn.disabled = false;
            btn.textContent = installationTranslations.form_submit;

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
  '@' . 'context' => 'https://schema.org',
  '@type' => 'CollectionPage',

  '@id' => url('/montazh-dymohodu-pravyla#page'),
  'name' => 'Монтаж димоходу: правила та вимоги',
  'url' => url('/montazh-dymohodu-pravyla'),

  'mainEntity' => [
    '@type' => 'ItemList',
    '@id' => url('/montazh-dymohodu-pravyla#itemlist'),

    'itemListElement' => [
      [
        '@type' => 'ListItem',
        'position' => 1,
        'name' => '5 критичних помилок при монтажі димоходу',
        'item' => url('/blog/pomylky-montazhu')
      ]
    ]
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
      'name' => 'Корисна інформація',
      'item' => url('/useful-info')
    ],
    [
      '@type' => 'ListItem',
      'position' => 3,
      'name' => 'Монтаж димоходу: правила та вимоги',
      'item' => url('/montazh-dymohodu-pravyla')
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