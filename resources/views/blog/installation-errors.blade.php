@extends('layouts.main')
@section('title', __('article-errors.title'))

@section('description', __('article-errors.description'))

@section('content')
<main class="py-5 bg-white">
    <div class="container" style="max-width: 1200px;">
        {{-- Навігація --}}
<nav class="mb-4 breadcrumb-nav">
    <a href="{{ route('main.index') }}"
       class="text-decoration-none text-muted small">
        {{ __('article-errors.home') }}
    </a> /

    <a href="{{ route('useful.index') }}"
       class="text-decoration-none text-muted small">
        {{ __('article-errors.useful_information') }}
    </a> /

    <a href="{{ route('chimney.installation-rules') }}"
       class="text-decoration-none text-muted small">
        {{ __('article-errors.installation') }}
    </a> /

    <a href="{{ route('blog.installation-errors') }}"
       class="text-decoration-none small {{ request()->routeIs('blog.installation-errors') ? 'active text-warning' : 'text-muted' }}">
        {{ __('article-errors.blog') }}
    </a>
</nav>

      <h1 class="display-5 fw-bold mb-4">
    {{ __('article-errors.title') }}
</h1>

<p class="lead text-muted mb-5">
    {{ __('article-errors.expert_intro') }}
</p>

    <img src="{{ asset('images/chimney/' . (app()->getLocale() === 'ru' ? 'article-mainru.webp' : 'article-main.webp')) }}"
     width="1679"
     height="937"
     class="img-fluid rounded-4 mb-5 shadow"
     alt="{{ __('article-errors.image_alt') }}"
     loading="lazy"
     decoding="async">

        <article class="fs-5 text-secondary lh-lg">
           <p class="mb-4">
    {{ __('article-errors.intro_description') }}
</p>

<p class="mb-5">
    {{ __('article-errors.intro_errors') }}
</p>

           {{-- Помилка 1 --}}
<h2 class="fw-bold text-dark mt-5 mb-3">
    {{ __('article-errors.error_1_title') }}
</h2>

<p>
    {{ __('article-errors.error_1_text_1') }}
</p>

<p>
    {{ __('article-errors.why_dangerous') }}
</p>

<ul class="list-unstyled">
    <li class="mb-2">
        <i class="bi bi-x-circle-fill text-danger me-2"></i>
        <strong>{{ __('article-errors.corrosion_title') }}</strong>
        {{ __('article-errors.corrosion_text') }}
    </li>

    <li class="mb-2">
        <i class="bi bi-x-circle-fill text-danger me-2"></i>
        <strong>{{ __('article-errors.gas_breakthrough_title') }}</strong>
        {{ __('article-errors.gas_breakthrough_text') }}
    </li>

    <li class="mb-2">
        <i class="bi bi-x-circle-fill text-danger me-2"></i>
        <strong>{{ __('article-errors.steel_grade_title') }}</strong>
        {{ __('article-errors.steel_grade_text') }}
    </li>
</ul>

<div class="p-4 bg-light rounded-4 my-4 border-start border-4 border-warning">
    <strong>{{ __('article-errors.engineer_advice_title') }}</strong>
    {{ __('article-errors.engineer_advice_text') }}
</div>
      {{-- Помилка 2 --}}
<h2 class="fw-bold text-dark mt-5 mb-3">
    {{ __('article-errors.error_2_title') }}
</h2>

<p>
    {{ __('article-errors.error_2_text_1') }}
</p>

<p>
    {{ __('article-errors.why_dangerous') }}
</p>

<ul class="list-unstyled">
    <li class="mb-2">
        <i class="bi bi-x-circle-fill text-danger me-2"></i>
        <strong>{{ __('article-errors.pyrolysis_title') }}</strong>
        {{ __('article-errors.pyrolysis_text') }}
    </li>

    <li class="mb-2">
        <i class="bi bi-x-circle-fill text-danger me-2"></i>
        <strong>{{ __('article-errors.thermal_insulation_title') }}</strong>
        {{ __('article-errors.thermal_insulation_text') }}
    </li>
</ul>

<div class="p-4 bg-light rounded-4 my-4 border-start border-4 border-warning">
    <strong>{{ __('article-errors.engineer_advice_2_title') }}</strong>
    {{ __('article-errors.engineer_advice_2_text') }}
</div>

           {{-- Помилка 3 --}}
<h2 class="fw-bold text-dark mt-5 mb-3">
    {{ __('article-errors.error_3_title') }}
</h2>

<p>
    {{ __('article-errors.error_3_text_1') }}
</p>

<p>
    {{ __('article-errors.why_dangerous') }}
</p>

<ul class="list-unstyled">
    <li class="mb-2">
        <i class="bi bi-x-circle-fill text-danger me-2"></i>
        <strong>{{ __('article-errors.soot_accumulation_title') }}</strong>
        {{ __('article-errors.soot_accumulation_text') }}
    </li>

    <li class="mb-2">
        <i class="bi bi-x-circle-fill text-danger me-2"></i>
        <strong>{{ __('article-errors.maintenance_impossibility_title') }}</strong>
        {{ __('article-errors.maintenance_impossibility_text') }}
    </li>
</ul>

<div class="p-4 bg-light rounded-4 my-4 border-start border-4 border-warning">
    <strong>{{ __('article-errors.engineer_advice_3_title') }}</strong>
    {{ __('article-errors.engineer_advice_3_text') }}
</div>
   {{-- Помилка 4 --}}
<h2 class="fw-bold text-dark mt-5 mb-3">
    {{ __('article-errors.error_4_title') }}
</h2>

<p>
    {{ __('article-errors.error_4_text_1') }}
</p>

<p>
    {{ __('article-errors.why_dangerous') }}
</p>

<ul class="list-unstyled">
    <li class="mb-2">
        <i class="bi bi-x-circle-fill text-danger me-2"></i>
        <strong>{{ __('article-errors.draft_loss_title') }}</strong>
        {{ __('article-errors.draft_loss_text') }}
    </li>

    <li class="mb-2">
        <i class="bi bi-x-circle-fill text-danger me-2"></i>
        <strong>{{ __('article-errors.excessive_cooling_title') }}</strong>
        {{ __('article-errors.excessive_cooling_text') }}
    </li>

    <li class="mb-2">
        <i class="bi bi-x-circle-fill text-danger me-2"></i>
        <strong>{{ __('article-errors.insufficient_height_title') }}</strong>
        {{ __('article-errors.insufficient_height_text') }}
    </li>
</ul>

<div class="p-4 bg-light rounded-4 my-4 border-start border-4 border-warning">
    <strong>{{ __('article-errors.engineer_advice_4_title') }}</strong>
    {{ __('article-errors.engineer_advice_4_text') }}
</div>

          {{-- Помилка 5 --}}
<h2 class="fw-bold text-dark mt-5 mb-3">
    {{ __('article-errors.error_5_title') }}
</h2>

<p>
    {{ __('article-errors.error_5_text_1') }}
</p>

<p>
    {{ __('article-errors.why_dangerous') }}
</p>

<ul class="list-unstyled">
    <li class="mb-2">
        <i class="bi bi-x-circle-fill text-danger me-2"></i>
        <strong>{{ __('article-errors.leakage_title') }}</strong>
        {{ __('article-errors.leakage_text') }}
    </li>

    <li class="mb-2">
        <i class="bi bi-x-circle-fill text-danger me-2"></i>
        <strong>{{ __('article-errors.system_destruction_title') }}</strong>
        {{ __('article-errors.system_destruction_text') }}
    </li>
</ul>

<div class="p-4 bg-light rounded-4 my-4 border-start border-4 border-warning">
    <strong>{{ __('article-errors.engineer_advice_5_title') }}</strong>
    {{ __('article-errors.engineer_advice_5_text') }}
</div>
            <hr class="my-5">

         <h3 class="fw-bold text-dark mb-4">
    {{ __('article-errors.checklist_title') }}
</h3>
            
            <div class="row align-items-center">
                {{-- Ліва колонка з чек-листом --}}
                <div class="col-md-8">
                    <ul class="list-unstyled mb-0">
            <li class="mb-2">
    <i class="bi bi-check-circle-fill text-success me-2"></i>
    {{ __('article-errors.checklist_item_1') }}
</li>

<li class="mb-2">
    <i class="bi bi-check-circle-fill text-success me-2"></i>
    {{ __('article-errors.checklist_item_2') }}
</li>

<li class="mb-2">
    <i class="bi bi-check-circle-fill text-success me-2"></i>
    {{ __('article-errors.checklist_item_3') }}
</li>

<li class="mb-2">
    <i class="bi bi-check-circle-fill text-success me-2"></i>
    {{ __('article-errors.checklist_item_4') }}
</li>
                    </ul>
                </div>
                
                {{-- Права колонка з кнопкою --}}
                <div class="col-md-4 text-md-end mt-4 mt-md-0">
<a href="{{ route('shop.index') }}" 
   class="btn px-4 py-3 fw-bold shadow-sm" 
   style="background-color: #d97706; border-color: #d97706; color: white;">
    <i class="bi bi-cart-fill me-2"></i>
    {{ __('article-errors.buy_chimney') }}
</a>
                </div>
            </div>
        </article>

        {{-- CTA блок --}}
    <div class="p-5 mt-5 bg-dark text-white rounded-4 text-center">
    <h3 class="fw-bold">
        {{ __('article-errors.specialist_help_title') }}
    </h3>

    <p>
        {{ __('article-errors.specialist_help_text') }}
    </p>

    <a href="{{ route('chimney.installation-rules') }}#form"
       class="btn btn-warning px-4 py-2">
        {{ __('article-errors.specialist_help_button') }}
    </a>
</div>
    </div>
</main>
<style>
    /* Ефект наведення для всіх посилань, крім активного */
.breadcrumb-nav a:hover:not(.active) {
    color: #d97706 !important; /* Оранжевий колір при наведенні */
    text-decoration: underline !important;
}

/* Стиль для активної сторінки */
.breadcrumb-nav a.active {
    color: #d97706 !important; /* Оранжевий колір для тексту */
    font-weight: bold;        /* Жирний шрифт для акценту */
    pointer-events: none;      /* Вимикає клікабельність активної сторінки */
}

</style>
@endsection
@push('schema-article')
<script type="application/ld+json">
{!! json_encode([
  '@' . 'context' => 'https://schema.org',
  '@type' => 'Article',

  '@id' => url('/blog/pomylky-montazhu#article'),
  'headline' => '5 критичних помилок при монтажі димоходу',
  'url' => url('/blog/pomylky-montazhu'),

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
      'name' => 'Корисна інформація',
      'item' => url('/useful-info')
    ],
    [
      '@type' => 'ListItem',
      'position' => 3,
      'name' => 'Монтаж димоходу: правила та вимоги',
      'item' => url('/montazh-dymohodu-pravyla')
    ],
    [
      '@type' => 'ListItem',
      'position' => 4,
      'name' => '5 критичних помилок при монтажі димоходу',
     'item' => [
        '@id' => url('/blog/pomylky-montazhu'),
        'name' => '5 критичних помилок при монтажі димоходу'
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