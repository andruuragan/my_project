@extends('layouts.main')

@section('title', __('steel.title'))

@section('description', __('steel.description'))
@section('content')

<div class="container py-5">
      {{-- Навігаційні крихти (Breadcrumbs) --}}
   <nav aria-label="breadcrumb" class="mb-4">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('main.index') }}"
               class="text-decoration-none text-muted">
                {{ __('steel.breadcrumb_home') }}
            </a>
        </li>

        <li class="breadcrumb-item">
            <a href="{{ route('useful.index') }}"
               class="text-decoration-none text-muted">
                {{ __('steel.breadcrumb_useful') }}
            </a>
        </li>

        <li class="breadcrumb-item active"
            aria-current="page"
            style="color: #ea580c;">
            {{ __('steel.breadcrumb_title') }}
        </li>
    </ol>
</nav>

    {{-- Заголовок --}}
<div class="text-center mb-5">
    <h1 class="fw-bold display-5">
        {{ __('steel.heading') }}
    </h1>

    <p class="text-muted small">
        {{ __('steel.updated') }}
    </p>

    <p class="lead text-muted mx-auto" style="max-width:850px;">
        {{ __('steel.intro') }}
    </p>
</div>

    {{-- Місце під банер --}}
    <div class="mb-5">

        {{-- Потім вставиш сюди картинку --}}
        <div class="rounded-4 border overflow-hidden shadow-sm">

         <img src="{{ asset('images/chimney/' . (app()->getLocale() === 'ru' ? 'graderu.webp' : 'grade.webp')) }}"
     alt="{{ __('steel.heading') }}"
     class="img-fluid w-100">

        </div>

    </div>

    {{-- Швидкий зміст --}}
    <div class="card border-0 shadow-sm rounded-4 mb-5">

        <div class="card-body p-4">

           <h3 class="mb-3">
    <i class="bi bi-list-check text-warning me-2"></i>
    {{ __('steel.contents_title') }}
</h3>

<div class="row">

    <div class="col-md-6">

        <ul class="mb-0">
            <li>AISI 201</li>
            <li>AISI 304</li>
            <li>AISI 316</li>
            <li>AISI 321</li>
        </ul>

    </div>

    <div class="col-md-6">

        <ul class="mb-0">
            <li>{{ __('steel.contents_comparison') }}</li>
            <li>{{ __('steel.contents_choose') }}</li>
            <li>{{ __('steel.contents_mistakes') }}</li>
            <li>{{ __('steel.contents_faq') }}</li>
        </ul>

    </div>

</div>

        </div>

    </div>

    {{-- Початок статті --}}
    <section class="mb-5">

    <h2 class="fw-bold mb-4">
        {{ __('steel.why_grade_matters_title') }}
    </h2>

    <p class="fs-5">
        {{ __('steel.why_grade_matters_text_1') }}
    </p>

    <p>
        {{ __('steel.why_grade_matters_text_2') }}
    </p>

</section>

   <div class="row g-4 mb-5">

    <div class="col-md-6 col-lg-3">
        <div class="card h-100 border-0 shadow rounded-4">
            <div class="card-body text-center">
                <h3 class="text-warning">AISI 201</h3>
                <p class="small text-muted">
                    {{ __('steel.aisi_201_description') }}
                </p>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-lg-3">
        <div class="card h-100 border-0 shadow rounded-4">
            <div class="card-body text-center">
                <h3 class="text-warning">AISI 304</h3>
                <p class="small text-muted">
                    {{ __('steel.aisi_304_description') }}
                </p>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-lg-3">
        <div class="card h-100 border-0 shadow rounded-4">
            <div class="card-body text-center">
                <h3 class="text-warning">AISI 316</h3>
                <p class="small text-muted">
                    {{ __('steel.aisi_316_description') }}
                </p>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-lg-3">
        <div class="card h-100 border-0 shadow rounded-4">
            <div class="card-body text-center">
                <h3 class="text-warning">AISI 321</h3>
                <p class="small text-muted">
                    {{ __('steel.aisi_321_description') }}
                </p>
            </div>
        </div>
    </div>

</div>


{{-- Порівняння марок сталі --}}
<section class="mb-5">

    <div class="text-center mb-4">
        <h2 class="fw-bold">
            {{ __('steel.comparison_title') }}
        </h2>

        <p class="text-muted">
            {{ __('steel.comparison_description') }}
        </p>
    </div>

    <div class="table-responsive">

        <table class="table table-bordered table-hover align-middle shadow-sm">

            <thead class="table-warning">

                <tr>
                    <th>{{ __('steel.table_steel_grade') }}</th>
                    <th>{{ __('steel.table_corrosion_resistance') }}</th>
                    <th>{{ __('steel.table_heat_resistance') }}</th>
                    <th>{{ __('steel.table_recommended_use') }}</th>
                </tr>

            </thead>

            <tbody>

                <tr>
                    <td><strong>AISI 201</strong></td>
                    <td>★★★☆☆</td>
                    <td>★★☆☆☆</td>
                    <td>{{ __('steel.aisi_201_use') }}</td>
                </tr>

                <tr>
                    <td><strong>AISI 304</strong></td>
                    <td>★★★★☆</td>
                    <td>★★★☆☆</td>
                    <td>{{ __('steel.aisi_304_use') }}</td>
                </tr>

                <tr>
                    <td><strong>AISI 316</strong></td>
                    <td>★★★★★</td>
                    <td>★★★☆☆</td>
                    <td>{{ __('steel.aisi_316_use') }}</td>
                </tr>

                <tr>
                    <td><strong>AISI 321</strong></td>
                    <td>★★★★☆</td>
                    <td>★★★★★</td>
                    <td>{{ __('steel.aisi_321_use') }}</td>
                </tr>

            </tbody>

        </table>

    </div>

</section>
<hr class="my-5">
<section class="mb-5">

    <h2 class="fw-bold mb-4">
        {{ __('steel.aisi_201_title') }}
    </h2>

    <p>
        {{ __('steel.aisi_201_description2') }}
    </p>

    <div class="row g-4 mt-2">

        <div class="col-lg-6">

            <div class="card border-0 bg-light h-100">

                <div class="card-body">

                    <h4 class="text-success">
                        <i class="bi bi-check-circle-fill me-2"></i>
                        {{ __('steel.advantages') }}
                    </h4>

                    <ul class="mb-0">
                        <li>{{ __('steel.aisi_201_advantage_1') }}</li>
                        <li>{{ __('steel.aisi_201_advantage_2') }}</li>
                        <li>{{ __('steel.aisi_201_advantage_3') }}</li>
                    </ul>

                </div>

            </div>

        </div>

        <div class="col-lg-6">

            <div class="card border-0 bg-light h-100">

                <div class="card-body">

                    <h4 class="text-primary">
                        <i class="bi bi-tools me-2"></i>
                        {{ __('steel.where_used') }}
                    </h4>

                    <ul class="mb-0">
                        <li>{{ __('steel.aisi_201_use_1') }}</li>
                        <li>{{ __('steel.aisi_201_use_2') }}</li>
                        <li>{{ __('steel.aisi_201_use_3') }}</li>
                        <li>{{ __('steel.aisi_201_use_4') }}</li>
                    </ul>

                </div>

            </div>

        </div>

    </div>

</section>
<hr class="my-5">

{{-- AISI 304 --}}
<section class="mb-5">

    <h2 class="fw-bold mb-4">
        {{ __('steel.aisi_304_title') }}
    </h2>

    <p>
        {{ __('steel.aisi_304_description2') }}
    </p>

    <div class="row g-4 mt-2">

        <div class="col-lg-6">

            <div class="card border-0 bg-light h-100">

                <div class="card-body">

                    <h4 class="text-success">
                        <i class="bi bi-check-circle-fill me-2"></i>
                        {{ __('steel.advantages') }}
                    </h4>

                    <ul class="mb-0">
                        <li>{{ __('steel.aisi_304_advantage_1') }}</li>
                        <li>{{ __('steel.aisi_304_advantage_2') }}</li>
                        <li>{{ __('steel.aisi_304_advantage_3') }}</li>
                        <li>{{ __('steel.aisi_304_advantage_4') }}</li>
                    </ul>

                </div>

            </div>

        </div>

        <div class="col-lg-6">

            <div class="card border-0 bg-light h-100">

                <div class="card-body">

                    <h4 class="text-primary">
                        <i class="bi bi-tools me-2"></i>
                        {{ __('steel.where_used') }}
                    </h4>

                    <ul class="mb-0">
                        <li>{{ __('steel.aisi_304_use_1') }}</li>
                        <li>{{ __('steel.aisi_304_use_2') }}</li>
                        <li>{{ __('steel.aisi_304_use_3') }}</li>
                        <li>{{ __('steel.aisi_304_use_4') }}</li>
                    </ul>

                </div>

            </div>

        </div>

    </div>

</section>
<hr class="my-5">
{{-- AISI 316 --}}
<section class="mb-5">

    <h2 class="fw-bold mb-4">
        {{ __('steel.aisi_316_title') }}
    </h2>

    <p>
        {{ __('steel.aisi_316_description_1') }}
    </p>

    <p>
        {{ __('steel.aisi_316_description_2') }}
    </p>

    <div class="row g-4 mt-2">

        <div class="col-lg-6">

            <div class="card border-0 bg-light h-100">

                <div class="card-body">

                    <h4 class="text-success">
                        <i class="bi bi-check-circle-fill me-2"></i>
                        {{ __('steel.advantages') }}
                    </h4>

                    <ul class="mb-0">
                        <li>{{ __('steel.aisi_316_advantage_1') }}</li>
                        <li>{{ __('steel.aisi_316_advantage_2') }}</li>
                        <li>{{ __('steel.aisi_316_advantage_3') }}</li>
                        <li>{{ __('steel.aisi_316_advantage_4') }}</li>
                    </ul>

                </div>

            </div>

        </div>

        <div class="col-lg-6">

            <div class="card border-0 bg-light h-100">

                <div class="card-body">

                    <h4 class="text-primary">
                        <i class="bi bi-tools me-2"></i>
                        {{ __('steel.where_used') }}
                    </h4>

                    <ul class="mb-0">
                        <li>{{ __('steel.aisi_316_use_1') }}</li>
                        <li>{{ __('steel.aisi_316_use_2') }}</li>
                        <li>{{ __('steel.aisi_316_use_3') }}</li>
                        <li>{{ __('steel.aisi_316_use_4') }}</li>
                    </ul>

                </div>

            </div>

        </div>

    </div>

</section>

<hr class="my-5">
{{-- AISI 321 --}}
<section class="mb-5">

    <h2 class="fw-bold mb-4">
        {{ __('steel.aisi_321_title') }}
    </h2>

    <p>
        {{ __('steel.aisi_321_description_1') }}
    </p>

    <p>
        {{ __('steel.aisi_321_description_2') }}
    </p>

    <div class="row g-4 mt-2">

        <div class="col-lg-6">

            <div class="card border-0 bg-light h-100">

                <div class="card-body">

                    <h4 class="text-success">
                        <i class="bi bi-check-circle-fill me-2"></i>
                        {{ __('steel.advantages') }}
                    </h4>

                    <ul class="mb-0">
                        <li>{{ __('steel.aisi_321_advantage_1') }}</li>
                        <li>{{ __('steel.aisi_321_advantage_2') }}</li>
                        <li>{{ __('steel.aisi_321_advantage_3') }}</li>
                        <li>{{ __('steel.aisi_321_advantage_4') }}</li>
                    </ul>

                </div>

            </div>

        </div>

        <div class="col-lg-6">

            <div class="card border-0 bg-light h-100">

                <div class="card-body">

                    <h4 class="text-primary">
                        <i class="bi bi-tools me-2"></i>
                        {{ __('steel.where_used') }}
                    </h4>

                    <ul class="mb-0">
                        <li>{{ __('steel.aisi_321_use_1') }}</li>
                        <li>{{ __('steel.aisi_321_use_2') }}</li>
                        <li>{{ __('steel.aisi_321_use_3') }}</li>
                        <li>{{ __('steel.aisi_321_use_4') }}</li>
                        <li>{{ __('steel.aisi_321_use_5') }}</li>
                    </ul>

                </div>

            </div>

        </div>

    </div>

</section>
<hr class="my-5">









{{-- Яку сталь обрати --}}
<section class="my-5">

    <div class="text-center mb-5">
        <h2 class="fw-bold">
            {{ __('steel.choose_title') }}
        </h2>

        <p class="text-muted">
            {{ __('steel.choose_description') }}
        </p>
    </div>

    <div class="row g-4">

        {{-- Газовый котел --}}
        <div class="col-md-6 col-lg-3">
            <div class="card h-100 border-0 shadow rounded-4">
                <div class="card-body text-center">

                    <div class="display-5 text-warning mb-3">
                        <img src="{{ asset('images/icons/gas-boiler.svg') }}"
                             alt="{{ __('steel.gas_boiler') }}"
                             width="50"
                             height="50"
                             class="me-2">
                    </div>

                    <h4>{{ __('steel.gas_boiler') }}</h4>

                    <p class="text-muted">
                        {{ __('steel.gas_boiler_text') }}
                        <strong>AISI 304</strong>.
                    </p>

                </div>
            </div>
        </div>

        {{-- Конденсационный котел --}}
        <div class="col-md-6 col-lg-3">
            <div class="card h-100 border-0 shadow rounded-4">
                <div class="card-body text-center">

                    <div class="display-5 text-primary mb-3">
                        <img src="{{ asset('images/icons/condens-boiler.svg') }}"
                             alt="{{ __('steel.condensing_boiler') }}"
                             width="60"
                             height="60"
                             class="me-2">
                    </div>

                    <h4>{{ __('steel.condensing_boiler') }}</h4>

                    <p class="text-muted">
                        {{ __('steel.condensing_boiler_text') }}
                        <strong>AISI 316</strong>.
                    </p>

                </div>
            </div>
        </div>

        {{-- Твердотопливный котел --}}
        <div class="col-md-6 col-lg-3">
            <div class="card h-100 border-0 shadow rounded-4">
                <div class="card-body text-center">

                    <div class="display-5 text-danger mb-3">
                        <img src="{{ asset('images/icons/solid-fuel-boiler.svg') }}"
                             alt="{{ __('steel.solid_fuel_boiler') }}"
                             width="50"
                             height="50"
                             class="me-2">
                    </div>

                    <h4>{{ __('steel.solid_fuel_boiler') }}</h4>

                    <p class="text-muted">
                        {{ __('steel.solid_fuel_boiler_text') }}
                        <strong>AISI 321</strong>.
                    </p>

                </div>
            </div>
        </div>

        {{-- Камін / банна піч --}}
        <div class="col-md-6 col-lg-3">
            <div class="card h-100 border-0 shadow rounded-4">
                <div class="card-body text-center">

                    <div class="display-5 text-success mb-3">
                        <img src="{{ asset('images/icons/fireplace.svg') }}"
                             alt="{{ __('steel.fireplace_bath_stove') }}"
                             width="50"
                             height="50"
                             class="me-2">
                    </div>

                    <h4>{{ __('steel.fireplace_bath_stove') }}</h4>

                    <p class="text-muted">
                        {{ __('steel.fireplace_bath_stove_text') }}
                        <strong>AISI 321</strong>.
                    </p>

                </div>
            </div>
        </div>

    </div>

</section>

<section class="my-5">

    <div class="alert alert-warning rounded-4 shadow-sm">

        <h2 class="h4 mb-3">
            <i class="bi bi-exclamation-triangle-fill me-2"></i>
            {{ __('steel.common_mistakes_title') }}
        </h2>

        <ul class="mb-0">

            <li>{{ __('steel.common_mistake_1') }}</li>

            <li>{{ __('steel.common_mistake_2') }}</li>

            <li>{{ __('steel.common_mistake_3') }}</li>

            <li>{{ __('steel.common_mistake_4') }}</li>

            <li>{{ __('steel.common_mistake_5') }}</li>

            <li>{{ __('steel.common_mistake_6') }}</li>

        </ul>

    </div>

</section>

<section class="container-1600 py-5">

    <div class="text-center mb-5">
        <h2 class="fw-bold display-6 mb-3">
            {{ __('steel.faq_title') }}
        </h2>

        <div class="mx-auto bg-warning" style="width:60px;height:3px;"></div>
    </div>

    <div class="accordion" id="faqSteelAccordion">

        @for ($i = 1; $i <= 8; $i++)

            <div class="accordion-item">

                <h3 class="accordion-header">
                    <button class="accordion-button {{ $i !== 1 ? 'collapsed' : '' }} fw-bold"
                            type="button"
                            data-bs-toggle="collapse"
                            data-bs-target="#steelFaq{{ $i }}">

                        {{ __('steel.faq_' . $i . '_question') }}

                    </button>
                </h3>

                <div id="steelFaq{{ $i }}"
                     class="accordion-collapse collapse {{ $i === 1 ? 'show' : '' }}"
                     data-bs-parent="#faqSteelAccordion">

                    <div class="accordion-body">
                        {{ __('steel.faq_' . $i . '_answer') }}
                    </div>

                </div>

            </div>

        @endfor

    </div>

</section>
{{-- Заклик до дії --}}
<section class="py-5 bg-light border-top">

    <div class="container-1600">

        <div class="text-center">

            <h2 class="fw-bold mb-3">
                {{ __('steel.cta_title') }}
            </h2>

            <p class="text-muted fs-5 mx-auto mb-4" style="max-width: 800px;">
                {{ __('steel.cta_text') }}
            </p>

            <div class="d-flex flex-column flex-sm-row justify-content-center gap-3">

                <a href="{{ route('shop.index') }}"
                   class="btn btn-warning btn-lg px-5">
                    <i class="bi bi-grid me-2"></i>
                    {{ __('steel.cta_catalog') }}
                </a>

                <a href="{{ route('contacts.index') }}"
                   class="btn btn-outline-dark btn-lg px-5">
                    <i class="bi bi-chat-dots me-2"></i>
                    {{ __('steel.cta_consultation') }}
                </a>

            </div>

        </div>

    </div>

</section>


{{-- Читайте також --}}
<section class="py-5">

    <div class="container-1600">

        <div class="text-center mb-5">
            <h2 class="fw-bold">
                {{ __('steel.read_also_title') }}
            </h2>

            <p class="text-muted">
                {{ __('steel.read_also_description') }}
            </p>
        </div>

        <div class="row g-4">

            {{-- Статья 1 --}}
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 border-0 shadow rounded-4">

                    <div style="height:220px; overflow:hidden;">
                        <img src="{{ asset('images/chimney/basalt.webp') }}"
                             alt="{{ __('steel.basalt_article_alt') }}"
                             class="w-100 h-100"
                             style="object-fit:cover;">
                    </div>

                    <div class="card-body">

                        <h3 class="h4">
                            {{ __('steel.basalt_article_title') }}
                        </h3>

                        <p class="text-muted">
                            {{ __('steel.basalt_article_description') }}
                        </p>

                        <a href="{{ route('blog.basalt-wool') }}"
                           class="btn btn-outline-orange">
                            {{ __('steel.read_article') }}
                        </a>

                    </div>

                </div>
            </div>

            {{-- Статья 2 --}}
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 border-0 shadow rounded-4">

                    <div style="height:220px; overflow:hidden;">
                        <img src="{{ asset('images/chimney/soot.webp') }}"
                             alt="{{ __('steel.soot_article_alt') }}"
                             class="w-100 h-100"
                             style="object-fit:cover;">
                    </div>

                    <div class="card-body">

                        <h3 class="h4">
                            {{ __('steel.soot_article_title') }}
                        </h3>

                        <p class="text-muted">
                            {{ __('steel.soot_article_description') }}
                        </p>

                        <a href="{{ route('blog.soot') }}"
                           class="btn btn-outline-orange">
                            {{ __('steel.read_article') }}
                        </a>

                    </div>

                </div>
            </div>

            {{-- Калькулятор --}}
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 border-0 shadow rounded-4">

                    <div style="height:220px; overflow:hidden;">
                        <img src="{{ asset('images/chimney/calculator.webp') }}"
                             alt="{{ __('steel.calculator_article_alt') }}"
                             class="w-100 h-100"
                             style="object-fit:cover;">
                    </div>

                    <div class="card-body">

                        <h3 class="h4">
                            {{ __('steel.calculator_article_title') }}
                        </h3>

                        <p class="text-muted">
                            {{ __('steel.calculator_article_description') }}
                        </p>

                        <a href="{{ route('chimney.calculator') }}"
                           class="btn btn-outline-orange">
                            {{ __('steel.go_to_calculation') }}
                        </a>

                    </div>

                </div>
            </div>

        </div>

    </div>

</section>
</div>

<style>
    .btn-outline-orange {
    color: #ff7a00;
    border-color: #ff7a00;
}

.btn-outline-orange:hover {
    color: #fff;
    background-color: #ff7a00;
    border-color: #ff7a00;
}
 /* Ефект наведення для хлібних кришок */
.breadcrumb-item a {
    transition: color 0.2s ease-in-out;
}

.breadcrumb-item a:hover {
    color: #ea580c !important; /* Ваш фірмовий помаранчевий колір */
    text-decoration: underline !important; /* Підкреслення для кращого акценту */
}
</style>
@endsection
@push('schema-article')
<script type="application/ld+json">
{!! json_encode([
  '@' . 'context' => 'https://schema.org',
  '@type' => 'Article',

  '@id' => url('/blog/marky-stali-dlya-dymohodiv'),
  'headline' => 'Марки сталі для димоходів',
  'url' => url('/blog/marky-stali-dlya-dymohodiv'),

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
      'name' => 'Марки сталі для димоходів',
      'item' => [
        '@id' => url('/blog/marky-stali-dlya-dymohodiv'),
        'name' => 'Марки сталі для димоходів'
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