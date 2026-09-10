@extends('layouts.main')

@section('title', __('categories.title'))
@section('description', __('categories.description'))

@section('content')




<div class="container-1600 py-5">
{{-- Навігаційні крихти (Breadcrumbs) --}}
                
                <nav aria-label="breadcrumb" class="mb-4">
    <ol class="breadcrumb mb-0">

        <li class="breadcrumb-item">
            <a href="{{ route('main.index') }}"
               class="text-decoration-none text-black-50 hover-orange">
                {{ __('categories.breadcrumb_home') }}
            </a>
        </li>

        <li class="breadcrumb-item active text-black" aria-current="page">
            <span style="color: #f97316; font-weight: 500;">
                {{ __('categories.breadcrumb_categories') }}
            </span>
        </li>

    </ol>
</nav>
 <!-- HERO -->

<div class="hero-banner1 rounded-4 p-5 mb-5 text-center border"
     style="background: linear-gradient(135deg, #fff8e8 0%, #ffffff 100%);">

    <div class="display-3 text-warning mb-3">
        <i class="bi bi-house-gear-fill"></i>
    </div>

    <h1 class="display-5 fw-bold mb-3">
        {{ __('categories.hero_title') }}
    </h1>

    <p class="lead text-muted mx-auto" style="max-width:800px;">
        {{ __('categories.hero_description') }}
    </p>

    <div class="d-flex justify-content-center flex-wrap gap-2 mt-4">

        <span class="badge bg-light text-dark border px-3 py-2">
            <i class="bi bi-check-circle-fill text-success me-1"></i>
            AISI 304 / 321
        </span>

        <span class="badge bg-light text-dark border px-3 py-2">
            <i class="bi bi-check-circle-fill text-success me-1"></i>
            Ø100–500 мм
        </span>

        <span class="badge bg-light text-dark border px-3 py-2">
            <i class="bi bi-check-circle-fill text-success me-1"></i>
            {{ __('categories.hero_badge_systems') }}
        </span>

    </div>

</div>

<!-- END HERO -->

   <section class="py-5">
    <div class="container-1600">

        <div class="text-center mb-5">

            <span class="badge bg-warning text-dark mb-3">
                {{ __('categories.advice_badge') }}
            </span>

            <h2 class="fw-bold">
                {{ __('categories.advice_title') }}
            </h2>

            <p class="text-muted mx-auto" style="max-width:800px">
                {{ __('categories.advice_description') }}
            </p>

        </div>

    </div>
</section>
       

  <div class="row g-4">

    @foreach([
        [
            'cat' => 'single',
            'img' => 'single-wall-banner1.webp',
            'title' => __('categories.single_title'),
            'desc' => __('categories.single_description')
        ],
        [
            'cat' => 'sandwich',
            'img' => 'sandwich-banner.webp',
            'title' => __('categories.sandwich_title'),
            'desc' => __('categories.sandwich_description'),
            'badge' => __('categories.sandwich_badge')
        ],
        [
            'cat' => 'fittings',
            'img' => 'fittings-banner.webp',
            'title' => __('categories.fittings_title'),
            'desc' => __('categories.fittings_description')
        ],
        [
            'cat' => 'oval-chimney',
            'img' => 'oval-banner.webp',
            'title' => __('categories.oval_title'),
            'desc' => __('categories.oval_description')
        ]
    ] as $item)

        <div class="col-12 col-md-6">

            <div class="card h-100 border-0 shadow-sm custom-product-card solution-card">

                <a href="{{
                    $item['cat'] === 'single'
                    ? route('single-wall-system')
                    : ($item['cat'] === 'sandwich'
                        ? route('sandwich-system')
                        : ($item['cat'] === 'oval-chimney'
                            ? route('oval-chimney-system')
                            : ($item['cat'] === 'fittings'
                                ? route('fittings-system')
                                : route('shop.index', ['category' => $item['cat']])
                            )
                        )
                    )
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
                        <span class="badge bg-warning text-dark mb-3 px-3 py-2">
                            {{ $item['badge'] }}
                        </span>
                    @endif

                    <h3 class="h4 fw-bold mb-3">
                        {{ $item['title'] }}
                    </h3>

                    <p class="text-muted mb-4">
                        {{ $item['desc'] }}
                    </p>

                    <a href="{{
                        $item['cat'] === 'single'
                        ? route('single-wall-system')
                        : ($item['cat'] === 'sandwich'
                            ? route('sandwich-system')
                            : ($item['cat'] === 'oval-chimney'
                                ? route('oval-chimney-system')
                                : ($item['cat'] === 'fittings'
                                    ? route('fittings-system')
                                    : route('shop.index', ['category' => $item['cat']])
                                )
                            )
                        )
                    }}"
                       class="btn btn-outline-dark rounded-pill px-4">

                        {{ __('categories.choose_system') }}

                        <i class="bi bi-arrow-right-circle ms-2"></i>

                    </a>

                </div>

            </div>

        </div>

    @endforeach

</div>

<!-- CONFIGURATOR -->
<div id="configurator1"class="mt-5">

   <div class="card border-0 rounded-4 shadow-lg overflow-hidden position-relative"
     style="background: linear-gradient(135deg,#fff8e8,#ffffff);">

    <!-- Фоновое изображение -->
    <img src="/images/chimney/forconfigurator.webp"
         class="config-bg"
         alt="fon">

    <div class="card-body p-5 text-center position-relative" style="z-index:2;">

    <div class="display-3 text-warning mb-3 d-flex justify-content-center">
            <div class="icon-compass mb-4">
           <svg xmlns="http://www.w3.org/2000/svg"
     width="72"
     height="72"
     viewBox="0 0 24 24"
     fill="none"
     stroke="currentColor"
     stroke-width="2"
     stroke-linecap="round"
     stroke-linejoin="round">
    <circle cx="12" cy="12" r="10"/>
    <polygon points="16.24 7.76 14.12 14.12 7.76 16.24 9.88 9.88 16.24 7.76"/>
</svg>
</div>
        </div>

       <h2 class="fw-bold mb-3">
    {{ __('categories.configurator_title') }}
</h2>

<p class="text-muted mx-auto mb-4" style="max-width:700px;">
    {{ __('categories.configurator_description') }}
    <strong>{{ __('categories.configurator_scheme_note') }}</strong>
</p>

<button id="openConfigurator"
        class="btn btn-warning btn-lg rounded-pill px-5 shadow-sm">

    <i class="bi bi-stars me-2"></i>

    {{ __('categories.configurator_button') }}

    <img src="/images/icons/heand.svg"
         alt="heand"
         width="32"
         height="32"
         class="ms-2">

</button>

    </div>
</div>

</div>
{{-- Конфігуратор --}}
<section class="mt-5" id="configuratorSection" style="display:none;">
    <div id="configurator">

        <div class="d-flex justify-content-between small fw-semibold mb-3">
            <span id="stepText">{{ __('categories.config_step') }}</span>
            <span id="percentText">25%</span>
        </div>

        <div class="progress mb-4" style="height:10px;">
            <div class="progress-bar bg-warning" style="width:25%"></div>
        </div>

        <div class="d-flex justify-content-between mt-3 mb-4">
            <button id="prevBtn"
                    class="btn btn-outline-secondary btn-sm"
                    style="display:none;">
                {{ __('categories.config_back') }}
            </button>
        </div>

        <div id="step1">
            <h4 class="fw-bold text-center mb-4">
                {{ __('categories.config_equipment_question') }}
            </h4>

            <div class="row g-3">

                <div class="col-md-4">
                    <button class="config-option w-100 btn btn-outline-dark p-3"
                            data-value="304">

                        <img src="{{ asset('images/icons/solid-fuel-boiler.svg') }}"
                             alt="{{ __('categories.solid_fuel_boiler_alt') }}"
                             width="40"
                             height="40"
                             class="me-2">

                        {{ __('categories.solid_fuel_boiler_title') }}

                    </button>
                </div>

                <div class="col-md-4">
                    <button class="config-option w-100 btn btn-outline-dark p-3"
                            data-value="321">

                        <img src="{{ asset('images/icons/fireplace.svg') }}"
                             alt="{{ __('categories.fireplace_alt') }}"
                             width="40"
                             height="40"
                             class="me-2">

                        {{ __('categories.fireplace_title') }}

                    </button>
                </div>

                <div class="col-md-4">
                    <button class="config-option w-100 btn btn-outline-dark p-3"
                            data-value="304">

                        <img src="{{ asset('images/icons/gas-boiler.svg') }}"
                             alt="{{ __('categories.gas_boiler_alt') }}"
                             width="40"
                             height="40"
                             class="me-2">

                        {{ __('categories.gas_boiler_title') }}

                    </button>
                </div>

            </div>
        </div>

        <div id="step2" style="display:none;">
            <h4 class="fw-bold text-center mb-4">
                {{ __('categories.config_installation_question') }}
            </h4>

            <div class="row g-3">

                <div class="col-md-6">
                    <button
                        class="config-option w-100 btn btn-outline-dark p-3"
                        data-value="Одностінний">

                        <i class="bi bi-house-door d-block fs-3 mb-2"></i>

                        <strong>{{ __('categories.config_inside_title') }}</strong>

                        <div class="small text-muted mt-2">
                            {{ __('categories.config_inside_description') }}
                        </div>

                    </button>
                </div>

                <div class="col-md-6">
                    <button
                        class="config-option w-100 btn btn-outline-dark p-3"
                        data-value="Термо">

                        <i class="bi bi-cloud d-block fs-3 mb-2"></i>

                        <strong>{{ __('categories.config_outside_title') }}</strong>

                        <div class="small text-muted mt-2">
                            {{ __('categories.config_outside_description') }}
                        </div>

                    </button>
                </div>

            </div>
        </div>

        <div id="step2b" style="display:none;">

            <h4 class="fw-bold text-center mb-4">
                {{ __('categories.config_casing_question') }}
            </h4>

            <div class="row g-3">

                <div class="col-md-6">
                    <button class="config-option w-100 btn btn-outline-dark p-3"
                            data-value="н/оц">

                        <img src="{{ asset('images/icons/trzn.svg') }}"
                             alt="{{ __('categories.galvanized_casing_alt') }}"
                             width="50"
                             height="50"
                             class="me-2">

                        🟡 {{ __('categories.config_economy') }}

                        <div class="small text-muted mt-2">
                            {{ __('categories.galvanized_casing') }}
                        </div>

                    </button>
                </div>

                <div class="col-md-6">
                    <button class="config-option w-100 btn btn-outline-dark p-3"
                            data-value="н/н">

                        <img src="{{ asset('images/icons/trner.svg') }}"
                             alt="{{ __('categories.stainless_casing_alt') }}"
                             width="50"
                             height="50"
                             class="me-2">

                        ⚫ {{ __('categories.config_standard') }}

                        <div class="small text-muted mt-2">
                            {{ __('categories.stainless_casing') }}
                        </div>

                    </button>
                </div>

            </div>
        </div>

        <div id="step3" style="display:none;">
            <h4 class="fw-bold text-center mb-4">
                {{ __('categories.config_diameter_question') }}
            </h4>

            <div id="diameters" class="row g-3"></div>
        </div>

        <div id="step4" style="display:none;">

            <h4 class="fw-bold text-center mb-4">
                {{ __('categories.config_thickness_question') }}
            </h4>

            <div class="row g-3">

                <div class="col-md-4">
                    <button class="config-option w-100 btn btn-outline-dark p-3"
                            data-value="0,5 мм">

                        <span class="metal-line line-05"></span>
                        <span>0,5 мм</span>

                    </button>
                </div>

                <div class="col-md-4">
                    <button class="config-option w-100 btn btn-outline-dark p-3"
                            data-value="0,8 мм">

                        <span class="metal-line line-08"></span>
                        <span>0,8 мм</span>

                    </button>
                </div>

                <div class="col-md-4">
                    <button class="config-option w-100 btn btn-outline-dark p-3"
                            data-value="1 мм">

                        <span class="metal-line line-10"></span>
                        <span>1 мм</span>

                    </button>
                </div>

            </div>
        </div>

    </div>
</section>

<div id="resultsContainer" class="mt-5" style="display:none;">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h3 class="fw-bold">
            {{ __('categories.results_title') }}
            <i class="bi-arrow-down-circle-fill ms-2"></i>
        </h3>

        <button class="btn btn-outline-danger" id="resetConfigurator">
            {{ __('categories.results_reset') }}
        </button>

    </div>

    <div id="productsGrid" class="row g-4"></div>

    <div class="alert alert-warning border-0 shadow-sm rounded-4 mt-4">

        <h5 class="fw-bold mb-2">
            <i class="bi bi-info-circle me-2"></i>
            {{ __('categories.results_notice_title') }}
        </h5>

        <p class="mb-0">
            {{ __('categories.results_notice_text') }}
        </p>

        <a href="{{ route('fittings-system') }}"
           class="btn rounded-pill mt-3"
           style="color: #fd7e14; border: 1px solid #fd7e14;">
            {{ __('categories.results_fittings_button') }}
        </a>

    </div>

</div>

<section class="mt-5">
    <div class="card border-0 shadow-sm rounded-4">
        <div class="card-body p-5">

            <div class="text-center mb-4">
                <span class="badge bg-warning text-dark mb-3">
                    {{ __('categories.scheme_badge') }}
                </span>

                <h2 class="fw-bold">
                    {{ __('categories.scheme_title') }}
                </h2>

                <p class="text-muted mx-auto" style="max-width:750px;">
                    {{ __('categories.scheme_description') }}
                </p>
            </div>

           <div class="text-center">
    <a href="{{ asset('images/chimney/' . (app()->getLocale() === 'ru' ? 'scemaru.webp' : 'scema.webp')) }}"
       target="_blank">

        <img
            src="{{ asset('images/chimney/' . (app()->getLocale() === 'ru' ? 'scemaru.webp' : 'scema.webp')) }}"
            class="img-fluid rounded-3 border"
            alt="{{ __('categories.scheme_image_alt') }}">
            
    </a>
</div>

            <div class="alert alert-light border mt-4 mb-0">
                <i class="bi bi-info-circle me-2"></i>
                {{ __('categories.scheme_notice') }}
            </div>

        </div>
    </div>
</section>
<section class="py-5">
    <div class="container-1600">

        <div class="text-center mb-5">
            <span class="badge bg-warning text-dark mb-3">
                {{ __('categories.type_advice_badge') }}
            </span>

            <h2 class="fw-bold">
                {{ __('categories.type_advice_title') }}
            </h2>
        </div>

        <div class="row g-4">

            <div class="col-lg-6">
                <div class="card single-wall-card h-100 border-0 shadow rounded-4 p-4 position-relative">

                    <img src="{{ asset('images/chimney/in.webp') }}"
                         class="single-wall-image"
                         alt="{{ __('categories.single_wall_alt') }}">

                    <div class="position-relative" style="z-index:2;">
                        <div class="display-5 text-warning mb-3">
                            <i class="bi bi-house-door-fill"></i>
                        </div>

                        <h4 class="fw-bold mb-3">
                            {{ __('categories.single_wall_title') }}
                        </h4>

                        <ul class="list-unstyled mb-0">
                            <li class="mb-2">
                                <i class="bi bi-check-circle-fill text-success me-2"></i>
                                {{ __('categories.single_wall_inside') }}
                            </li>

                            <li class="mb-2">
                                <i class="bi bi-check-circle-fill text-success me-2"></i>
                                {{ __('categories.single_wall_sleeving') }}
                            </li>

                            <li>
                                <i class="bi bi-x-circle-fill text-danger me-2"></i>
                                {{ __('categories.single_wall_outside') }}
                            </li>
                        </ul>
                    </div>

                </div>
            </div>

            <div class="col-lg-6">
                <div class="card thermo-card h-100 border-0 shadow rounded-4 p-4 position-relative">

                    <img src="{{ asset('images/chimney/out.webp') }}"
                         class="thermo-image"
                         alt="{{ __('categories.thermo_alt') }}">

                    <div class="position-relative" style="z-index:2;">

                        <div class="display-5 text-warning mb-3">
                            <i class="bi bi-shield-check"></i>
                        </div>

                        <h4 class="fw-bold mb-3">
                            {{ __('categories.thermo_title') }}
                        </h4>

                        <ul class="list-unstyled mb-0">

                            <li class="mb-2">
                                <i class="bi bi-check-circle-fill text-success me-2"></i>
                                {{ __('categories.thermo_outside') }}
                            </li>

                            <li class="mb-2">
                                <i class="bi bi-check-circle-fill text-success me-2"></i>
                                {{ __('categories.thermo_condensate') }}
                            </li>

                            <li>
                                <i class="bi bi-check-circle-fill text-success me-2"></i>
                                {{ __('categories.thermo_draft') }}
                            </li>

                        </ul>

                    </div>
                </div>
            </div>

        </div>

    </div>
</section>

<section class="pb-5">

    <div class="container-1600">

        <div class="bg-light rounded-4 p-4 p-lg-5 text-center border shadow-sm">

            <div class="display-6 text-warning mb-3">
                <i class="bi bi-exclamation-triangle-fill"></i>
            </div>

            <h3 class="fw-bold mb-3">
                {{ __('categories.soot_question') }}
            </h3>

            <p class="text-muted mb-4 mx-auto" style="max-width:700px;">
                {{ __('categories.soot_description') }}
            </p>

            <a href="{{ route('blog.soot') }}"
               class="btn btn-warning btn-lg px-4 rounded-pill">

                <i class="bi bi-arrow-right-circle me-2"></i>
                {{ __('categories.soot_button') }}

            </a>

        </div>

    </div>

</section>
<section class="py-5 bg-light rounded-4">

    <div class="container-1600">

        <div class="text-center mb-5">

            <h2 class="fw-bold">
                {{ __('categories.equipment_title') }}
            </h2>

        </div>

        <div class="row g-4">

            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm p-4">

                    <h5 class="fw-bold">
                        <img src="{{ asset('images/icons/fireplace.svg') }}"
                             alt="{{ __('categories.fireplace_alt') }}"
                             width="32"
                             height="32"
                             class="me-2">
                        🔥 {{ __('categories.fireplace_title') }}
                    </h5>

                    <p class="text-muted mb-0">
                        {{ __('categories.fireplace_description') }}
                    </p>

                    <div class="mt-3">
                        <span class="badge bg-warning text-dark px-3 py-2">
                            AISI 321
                        </span>
                    </div>

                </div>
            </div>

            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm p-4">

                    <h5 class="fw-bold">
                        <img src="{{ asset('images/icons/gas-boiler.svg') }}"
                             alt="{{ __('categories.gas_boiler_alt') }}"
                             width="32"
                             height="32"
                             class="me-2">
                        🏠 {{ __('categories.gas_boiler_title') }}
                    </h5>

                    <p class="text-muted mb-0">
                        {{ __('categories.gas_boiler_description') }}
                    </p>

                    <div class="mt-3">
                        <span class="badge bg-warning text-dark px-3 py-2">
                            AISI 304
                        </span>
                    </div>

                </div>
            </div>

            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm p-4">

                    <h5 class="fw-bold">
                        <img src="{{ asset('images/icons/solid-fuel-boiler.svg') }}"
                             alt="{{ __('categories.solid_fuel_boiler_alt') }}"
                             width="32"
                             height="32"
                             class="me-2">
                        🪵 {{ __('categories.solid_fuel_boiler_title') }}
                    </h5>

                    <p class="text-muted mb-0">
                        {{ __('categories.solid_fuel_boiler_description') }}
                    </p>

                    <div class="mt-3">
                        <span class="badge bg-warning text-dark px-3 py-2">
                            AISI 321
                        </span>

                        <span class="badge bg-warning text-dark px-3 py-2">
                            AISI 304
                        </span>
                    </div>

                </div>
            </div>

        </div>

    </div>

</section>

<section class="py-5">

    <div class="container-1600">

        <div class="card border-0 shadow-lg rounded-4 cta-configurator">

            {{-- Фоновое изображение --}}
            <img src="/images/chimney/conf2.webp"
                 class="config-bg"
                 alt="{{ __('categories.configurator_bg_alt') }}">

            <div class="card-body text-center p-5">

                <span class="badge bg-warning text-dark px-3 py-2 mb-3">
                    {{ __('categories.quick_selection_badge') }}
                </span>

                <div class="display-3 text-warning mb-3">
                    <i class="bi bi-stars"></i>
                </div>

                <h2 class="fw-bold mb-3">
                    {{ __('categories.configurator_cta_title') }}
                </h2>

                <p class="text-muted mx-auto mb-4" style="max-width:700px;">
                    {{ __('categories.configurator_cta_description') }}
                </p>

                <div class="d-flex justify-content-center flex-wrap gap-2 mb-4">

                    <span class="badge bg-light border text-dark px-3 py-2">
                        <i class="bi bi-lightning-charge-fill text-warning me-1"></i>
                        {{ __('categories.configurator_time') }}
                    </span>

                    <span class="badge bg-light border text-dark px-3 py-2">
                        <i class="bi bi-check-circle-fill text-success me-1"></i>
                        {{ __('categories.configurator_accuracy') }}
                    </span>

                    <span class="badge bg-light border text-dark px-3 py-2">
                        <i class="bi bi-sliders me-1"></i>
                        {{ __('categories.configurator_no_errors') }}
                    </span>

                </div>

                <a href="#"
                   id="startConfigurator"
                   class="btn btn-warning btn-lg rounded-pill px-5 shadow-sm">

                    <i class="bi bi-magic me-2"></i>

                    {{ __('categories.configurator_start_button') }}

                    <img src="/images/icons/heand.svg"
                         alt="heand"
                         width="32"
                         height="32"
                         class="ms-2">

                </a>

                <div class="text-muted small mt-4">
                    {{ __('categories.configurator_footer') }}
                </div>

            </div>
        </div>

    </div>

</section>


<section class="py-5">

    <div class="container-1600">

        <div class="text-center mb-5">

            <h2 class="fw-bold">
                {{ __('categories.faq_title') }}
            </h2>

        </div>

        <div class="accordion" id="faq">

            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button"
                            data-bs-toggle="collapse"
                            data-bs-target="#faq1">
                        {{ __('categories.faq1_question') }}
                    </button>
                </h2>

                <div id="faq1"
                     class="accordion-collapse collapse show"
                     data-bs-parent="#faq">

                    <div class="accordion-body">
                        {{ __('categories.faq1_answer') }}
                    </div>

                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed"
                            data-bs-toggle="collapse"
                            data-bs-target="#faq2">
                        {{ __('categories.faq2_question') }}
                    </button>
                </h2>

                <div id="faq2"
                     class="accordion-collapse collapse"
                     data-bs-parent="#faq">

                    <div class="accordion-body">
                        {{ __('categories.faq2_answer') }}
                    </div>

                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed"
                            data-bs-toggle="collapse"
                            data-bs-target="#faq3">
                        {{ __('categories.faq3_question') }}
                    </button>
                </h2>

                <div id="faq3"
                     class="accordion-collapse collapse"
                     data-bs-parent="#faq">

                    <div class="accordion-body">
                        {{ __('categories.faq3_answer') }}
                    </div>

                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed"
                            data-bs-toggle="collapse"
                            data-bs-target="#faq4">
                        {{ __('categories.faq4_question') }}
                    </button>
                </h2>

                <div id="faq4"
                     class="accordion-collapse collapse"
                     data-bs-parent="#faq">

                    <div class="accordion-body">
                        {{ __('categories.faq4_answer') }}
                    </div>

                </div>
            </div>

        </div>

    </div>

</section>

@php
    $configuratorTranslations = [
        'step_text' => __('categories.config_step_text'),
        'cart_added' => __('categories.cart_added'),
        'cart_error' => __('categories.cart_error'),
    ];
@endphp

<script>
    const configuratorTranslations = @json($configuratorTranslations);
</script>
<script>
   
document.addEventListener('DOMContentLoaded', function () {
    const state = {
    step: 1,
    equipment: null,
    mount: null,
    casing: null, // 👈 новое
    diameter: null,
    thickness: null
};
   const steps = {
    1: document.getElementById('step1'),
    2: document.getElementById('step2'),
    2.5: document.getElementById('step2b'), // 👈 новый логический шаг
    3: document.getElementById('step3'),
    4: document.getElementById('step4')
};

    // Єдиний обробник кліків для конфігуратора
   document.getElementById('configurator').addEventListener('click', function (e) {
    const btn = e.target.closest('.config-option');
    if (!btn) return;

    // ===== SAVE STATE =====
    if (state.step === 1) {
        state.equipment = btn.dataset.value;

    } else if (state.step === 2) {
        state.mount = btn.dataset.value;
         state.casing = null;
    state.diameter = null;
    state.thickness = null;

    } else if (state.step === 2.5) {
        state.casing = btn.dataset.value;

    } else if (state.step === 3) {
        state.diameter = btn.dataset.value;

    } else if (state.step === 4) {
        state.thickness = btn.dataset.value;
    }

    // ===== ACTIVE STYLE =====
    steps[state.step].querySelectorAll('.config-option')
        .forEach(b => b.classList.remove('active'));

    btn.classList.add('active');

    // ===== NEXT STEP =====
    setTimeout(() => {

        // внешний монтаж → дополнительный шаг
        if (state.step === 2 && state.mount === "Термо") {
            showStep(2.5);
            return;
        }

        // после 2.5 → диаметр
       if (state.step === 2.5) {
    renderDiameters();   // 👈 ВАЖНО
    showStep(3);
    return;
}
        if (state.step < 4) {

            if (state.step === 2) {
                renderDiameters();
            }

            showStep(state.step + 1);

        } else {
            search();
        }

    }, 300);
});
 function getTotalSteps() {
    return state.mount === 'Термо' ? 5 : 4;
}
    // Обробка кнопки "Назад"
 document.getElementById('prevBtn').addEventListener('click', function () {

    switch (state.step) {

        case 2.5:
            state.casing = null;
            state.diameter = null;
            state.thickness = null;
            showStep(2);
            break;

        case 4:
            state.thickness = null;
            showStep(3);
            break;

        case 3:
            state.diameter = null;
            
            showStep(
                state.mount === "Термо" ? 2.5 : 2
            );
            break;

        case 2:
            state.mount = null;
            state.equipment = null;
            showStep(1);
            break;

        default:
            break;
    }

   

});
const singleDiameters = [
    "100","110","120","130","140","150","160","180","200","220","230","250",
    "300","350","400","450"
];

const thermoDiameters = [
    "100/160",
    "110/180",
    "120/180",
    "130/200",
    "140/200",
    "150/220",
    "160/220",
    "180/250",
    "200/260",
    "220/280",
    "230/300",
    "250/320",
    "300/360",
    '350/420',
    '400/460',
    '450/520',
    '500/560',
    "100/200",
    "120/220",
    "130/230",
    "140/240",
    "150/250",
    "160/260",
    "180/280",
    "200/300"
];
function renderDiameters() {

    const container = document.getElementById('diameters');

    const list = state.mount === "Одностінний"
        ? singleDiameters
        : thermoDiameters;

    container.innerHTML = list.map(d => `
        <div class="col-4 col-md-2">
        <button
            class="config-option diameter-btn w-100 btn btn-outline-dark"
            data-value="${d}">
            ${d}
        </button>
    </div>
    `).join('');
}

function updateThicknessOptions() {
    const btn05 = document.querySelector('#step4 .config-option[data-value="0,5 мм"]');

    if (!btn05) return;

    const col = btn05.closest('.col-md-4');

    if (state.equipment === "321") {
        col.style.display = "none";
    } else {
        col.style.display = "";
    }
}
function restoreActiveButton() {

   steps[state.step].querySelectorAll('.config-option').forEach(btn => {
    btn.classList.remove('active');
});

    let value = null;

    switch (state.step) {
        case 1:
            value = state.equipment;
            break;
        case 2:
            value = state.mount;
            break;
        case 2.5:
            value = state.casing;
            break;
        case 3:
            value = state.diameter;
            break;
        case 4:
            value = state.thickness;
            break;
    }

    if (!value) return;

    const btn = steps[state.step]?.querySelector(
        `.config-option[data-value="${value}"]`
    );

    if (btn) {
        btn.classList.add('active');
    }
}
    // Функція відображення кроку
   function showStep(n) {
    Object.values(steps).forEach(s => s.style.display = 'none');
    steps[n].style.display = 'block';
    state.step = n;

    if (n === 4) {
    updateThicknessOptions();
    
}
restoreActiveButton();
    document.getElementById('prevBtn').style.display = (n > 1) ? 'block' : 'none';

    let currentStep;
    let totalSteps;

    if (state.mount === 'Термо') {
        totalSteps = 5;

        switch (n) {
            case 1: currentStep = 1; break;
            case 2: currentStep = 2; break;
            case 2.5: currentStep = 3; break;
            case 3: currentStep = 4; break;
            case 4: currentStep = 5; break;
        }
    } else {
        totalSteps = 4;

        switch (n) {
            case 1: currentStep = 1; break;
            case 2: currentStep = 2; break;
            case 3: currentStep = 3; break;
            case 4: currentStep = 4; break;
        }
    }

    const percent = currentStep / totalSteps * 100;

    document.querySelector('.progress-bar').style.width = percent + '%';
  document.getElementById('stepText').textContent =
    configuratorTranslations.step_text
        .replace(':current', currentStep)
        .replace(':total', totalSteps);
    document.getElementById('percentText').textContent =
        Math.round(percent) + '%';
if (n !== 4) 
        setTimeout(() => {
    document.getElementById('configuratorSection').scrollIntoView({
        behavior: 'smooth',
        block: 'start'
    });
}, 100);
}

    // Функція пошуку
  function search() {
    fetch('/search-chimneys', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        },
        body: JSON.stringify(state)
    })
    .then(r => r.json())
    .then(data => {

       

        renderResults(data);
    })
    .catch(err => console.error('ERROR:', err));
}
    // Рендер результатів
function renderResults(response) {
    const container = document.getElementById('resultsContainer');
    const grid = document.getElementById('productsGrid');

    container.style.display = 'block';
    grid.innerHTML = response.html;

    // Только для телефона
    if (window.innerWidth < 768) {
        setTimeout(() => {
            container.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }, 100);
    }
}
    // Кнопка відкриття
    document.getElementById('openConfigurator').addEventListener('click', function () {
        document.getElementById('configuratorSection').style.display = 'block';
        this.closest('.mt-5').style.display = 'none';
        showStep(1);
    });
    document.getElementById('startConfigurator').addEventListener('click', function (e) {
    e.preventDefault();

    document.getElementById('openConfigurator').click();

    document.getElementById('configuratorSection').scrollIntoView({
        behavior: 'smooth',
        block: 'start'
    });
});
document.getElementById('resetConfigurator').addEventListener('click', function () {

    // Скрываем результаты
    document.getElementById('resultsContainer').style.display = 'none';

    // Показываем конфигуратор
    document.getElementById('configuratorSection').style.display = 'block';

    // Сбрасываем состояние
    state.step = 1;
    state.equipment = null;
    state.mount = null;
    state.casing = null;
    state.diameter = null;
    state.thickness = null;

    // Убираем активные кнопки
    document.querySelectorAll('.config-option').forEach(btn => {
        btn.classList.remove('active');
    });

    // Возвращаем на первый шаг
    showStep(1);

    // Скролл к конфигуратору
    document.getElementById('configuratorSection').scrollIntoView({
        behavior: 'smooth',
        block: 'start'
    });
});
});



document.addEventListener('DOMContentLoaded', function () {

    // ===== ADD TO CART ANIMATION =====
    document.addEventListener('click', function (e) {
        const button = e.target.closest('.add-cart-btn');
        if (!button) return;

        const icon = button.querySelector('i');
        if (!icon) return;

        const originalClass = icon.className;

        icon.classList.remove('bi-cart3');
        icon.classList.add('bi-check2');

        button.style.backgroundColor = '#10b981';

        setTimeout(() => {
            icon.className = originalClass;
            button.style.backgroundColor = '#d97706';
        }, 1500);
    });

    // ===== TOOLTIP (SAFE INIT) =====
    document.body.addEventListener('mouseover', function (event) {
        const target = event.target.closest('[data-bs-toggle="tooltip"]');

        if (!target || typeof bootstrap === 'undefined') return;

        if (!bootstrap.Tooltip.getInstance(target)) {
            new bootstrap.Tooltip(target, {
                trigger: 'hover'
            });
        }
    });

});
// 1. Анимация полета
function animateFlyToCart(imgElement) {
    const cartBtn = document.querySelector('.cart-btn') || document.getElementById('cartBtnContainer');
    if (!imgElement || !cartBtn) return;

    const imgRect = imgElement.getBoundingClientRect();
    const cartRect = cartBtn.getBoundingClientRect();

    const clone = imgElement.cloneNode(true);
    clone.classList.add('flying-cart-item');
    clone.style.position = 'fixed';
    clone.style.zIndex = '99999';
    clone.style.pointerEvents = 'none';
    clone.style.objectFit = 'contain';
    clone.style.background = '#fff';
    clone.style.borderRadius = '12px';
    clone.style.boxShadow = '0 10px 25px rgba(0,0,0,0.15)';
    clone.style.transition = 'transform 0.8s cubic-bezier(0.25, 1, 0.5, 1), opacity 0.8s ease, width 0.8s ease, height 0.8s ease';
    clone.style.left = `${imgRect.left}px`;
    clone.style.top = `${imgRect.top}px`;
    clone.style.width = `${imgRect.width}px`;
    clone.style.height = `${imgRect.height}px`;

    document.body.appendChild(clone);

    requestAnimationFrame(() => {
        clone.style.transformOrigin = 'left top';
        const mobileOffsetX = window.innerWidth < 992 ? 300 : 0;
        const mobileOffsetY = window.innerWidth < 992 ? 30 : 0;
        const targetX = cartRect.left + 15 + mobileOffsetX;
        const targetY = cartRect.top + (cartRect.height / 2) - 8 + mobileOffsetY;
        clone.style.transform = `translate(${targetX - imgRect.left}px, ${targetY - imgRect.top}px) scale(0.12)`;
        clone.style.opacity = '0.15';
    });

    setTimeout(() => {
        clone.remove();
        cartBtn.style.transform = 'scale(1.15)';
        setTimeout(() => { cartBtn.style.transform = 'none'; }, 150);
    }, 800);
}

// 2. Делегированный клик «КУПИТИ»
document.addEventListener('click', function (e) {
    const buyBtn = e.target.closest('.add-cart-btn');
    if (!buyBtn) return;

    e.preventDefault();
    const card = buyBtn.closest('.product-card');
    if (!card) return;

    const productImg = card.querySelector('.product-image');
    if (productImg) animateFlyToCart(productImg);

    const form = buyBtn.closest('form');
    let url, csrfToken, formData;

    if (form) {
        url = form.action;
        csrfToken = form.querySelector('[name="_token"]')?.value;
        formData = new FormData(form);
    } else {
        const productId = buyBtn.dataset.id;
        url = `/shop/${productId}/add`;
        csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');
        formData = new FormData();
        formData.append('qty', 1);
    }

    if (!csrfToken) return;

    // ИНДИКАЦИЯ ПРОЦЕССА
    buyBtn.classList.add('active-process');
    buyBtn.disabled = true;

    fetch(url, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': csrfToken,
            'Accept': 'application/json',
            'X-Requested-With': 'XMLHttpRequest'
        },
        body: formData
    })
    .then(res => res.ok ? res.json() : null)
   .then(data => {
    buyBtn.classList.remove('active-process');
    buyBtn.disabled = false;
    if (!data) return;

    // 1. Обновляем количество
    const countIds = ['cartCountMobile', 'cartCountDesktop', 'cartCount'];
    countIds.forEach(id => {
        const el = document.getElementById(id);
        if (el && typeof data.count !== 'undefined') el.textContent = data.count;
    });

    // 2. Обновляем сумму (с логикой скрытия если 0)
    const totalIds = ['cartTotalMobile', 'cartTotalDesktop', 'cartTotalNav'];
    totalIds.forEach(id => {
        const el = document.getElementById(id);
        if (el) {
            if (data.count > 0 && typeof data.total !== 'undefined') {
                el.textContent = new Intl.NumberFormat('uk-UA').format(data.total);
                el.style.display = ''; // Показываем элемент
            } else {
                el.textContent = '0'; // Или оставьте пустым, если нужно
                // el.style.display = 'none'; // Раскомментируйте, если нужно полностью скрывать сумму
            }
        }
    });

    // 3. Управление видимостью бейджа с количеством
    const badge = document.getElementById('cartBadgeMobile');
    if (badge) {
        badge.style.display = (data.count > 0) ? 'flex' : 'none';
    }

    // 4. Уведомления и анимация
    if (data.success) {
        if (typeof refreshCart === 'function') refreshCart();
       if (typeof showAlert === 'function') {
    showAlert(configuratorTranslations.cart_added, 'success');
}
        
        const originalContent = buyBtn.innerHTML;
       
        
        setTimeout(() => { 
            buyBtn.innerHTML = originalContent; 
            buyBtn.classList.remove('btn-success-animated'); 
        }, 1500);
    }
})
    .catch(err => {
        buyBtn.classList.remove('active-process');
        buyBtn.disabled = false;
       console.error(configuratorTranslations.cart_error, err);
    });
});

// 3. Остальные обработчики (DOMContent...)
document.addEventListener('DOMContentLoaded', function () {
    const modalEl = document.getElementById('imageModal');
    let modalInstance = null;
    if (modalEl && typeof bootstrap !== 'undefined') {
        modalInstance = bootstrap.Modal.getOrCreateInstance(modalEl);
        
    }
    document.addEventListener('click', function (e) {
        const btn = e.target.closest('.open-image');
        if (!btn) return;
        const modalImage = document.getElementById('modalImage');
        if (modalImage) {
            modalImage.src = btn.dataset.image;
            if (modalInstance) modalInstance.show();
        }
    });
});


document.addEventListener('submit', function (e) {
    if (e.target.matches('.filter-form')) {
        const offcanvasEl = document.getElementById('filterOffcanvas');
        
        // Добавляем проверку наличия bootstrap и экземпляра offcanvas
        if (offcanvasEl && typeof bootstrap !== 'undefined') {
            const bsOffcanvas = bootstrap.Offcanvas.getInstance(offcanvasEl);
            if (bsOffcanvas) {
                bsOffcanvas.hide();
            }
        }
    }
});

    document.addEventListener('click', function (e) {
    const btn = e.target.closest('.open-image');
    if (!btn) return;

    const modalEl = document.getElementById('imageModal');
    const img = document.getElementById('modalImage');

    if (!modalEl || !img) return;

    img.src = btn.dataset.image;

    bootstrap.Modal.getOrCreateInstance(modalEl).show();
});
   document.addEventListener('DOMContentLoaded', function () {
    const modalEl = document.getElementById('imageModal');

    if (!modalEl) return;

    modalEl.addEventListener('hide.bs.modal', function () {
        document.activeElement?.blur();
    });
});


</script>
<style>
.config-option {
    transition: all 0.3s ease;
    border: 2px solid #333;
    font-weight: 600;
}
.config-option:hover {
   
    transform: translateY(-3px);
}
.config-option.active {
    background: #ffc107 !important;
    border-color: #ffc107 !important;
    color: #000 !important;
    box-shadow: 0 4px 10px rgba(255,193,7,0.3);
}
/* Анімація появи */
#configurator > div {
    animation: fadeIn 0.4s;
}
@keyframes fadeIn {
    from { opacity: 0; transform: translateY(10px); }
    to { opacity: 1; transform: translateY(0); }
}
#configurator1 {
    scroll-margin-top: 140px;
}
.hover-orange {
    transition: color .2s ease;
}

.hover-orange:hover {
    color: #f97316 !important;
}
.cta-configurator{
    position: relative;
    overflow: hidden;
    background: linear-gradient(135deg,#fff8e8 0%,#ffffff 100%);
}

.cta-configurator::before{
    content:"";
    position:absolute;
    width:260px;
    height:260px;
    border-radius:50%;
    background:rgba(249,115,22,.08);
    top:-120px;
    right:-120px;
}

.cta-configurator::after{
    content:"";
    position:absolute;
    width:180px;
    height:180px;
    border-radius:50%;
    background:rgba(255,193,7,.08);
    bottom:-80px;
    left:-80px;
}

.cta-configurator .card-body{
    position:relative;
    z-index:2;
}
#configuratorSection {
    scroll-margin-top: 180px;
}
.config-option{
    display:flex;
    flex-direction:column;
    align-items:center;
    justify-content:center;
    gap:12px;
    min-height:120px;
}

.metal-line{
    display:block;
    height:50px;
    border-radius:20px;
    background: linear-gradient(
        to right,
        #bfc3c7,
        #5f6368,
        #bfc3c7
    );
}

.line-05{
    width:3px;
}

.line-08{
    width:6px;
}

.line-10{
    width:9px;
}
.hero-banner1{
    position: relative;
    overflow: hidden;
    background: linear-gradient(135deg,#fff8e8 0%,#ffffff 100%);
}

.hero-banner1::before{
    content: "";
    position: absolute;
    inset: 0;

    background: url('{{ asset("images/chimney/chimney-systems-banner.webp") }}')
                center center / cover no-repeat;

    opacity: .40;
    z-index: 0;
}

.hero-banner1 > *{
    position: relative;
    z-index: 1;
}
.diameter-btn{
    min-height: 60px !important;
    flex-direction: row;
    gap: 0;
    padding: 8px 12px;
}
@media (max-width: 767.98px) {
    #resultsContainer {
        scroll-margin-top: 100px;
    }
}
.config-bg {
    position: absolute;
    inset: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;

    opacity: .25;      /* прозрачность */
    pointer-events: none;
    user-select: none;
}
.icon-compass{
    width:72px;
    height:72px;
    color:#f4b400;
    transition:.35s ease;
}

.card:hover .icon-compass{
    transform:rotate(15deg) scale(1.08);
}
.single-wall-card{
    background: linear-gradient(135deg,#fff8e8,#ffffff);
    overflow: hidden;
}

.single-wall-image{
    position: absolute;
    right: 50px;
    bottom: 0;

    width: 170px;

   

    pointer-events: none;
    user-select: none;
}

@media (max-width: 991.98px){
    .single-wall-image{
        width: 100px;
        right: -10px;
        opacity: .50;
    }
}
.thermo-card{
    background: linear-gradient(135deg,#fff8e8,#ffffff);
    overflow: hidden;
}

.thermo-image{
    position: absolute;
    right: -30px;
    bottom: 0;

    height: 100%;
    max-height: 240px;
    width: auto;

  

    pointer-events: none;
    user-select: none;
}

@media (max-width:991.98px){
    .thermo-image{
        max-height: 150px;
        opacity: .50;
         right: -60px;
    }
}
</style>
@endsection
@push('schema-categories')
<script type="application/ld+json">
{!! json_encode([
  '@' . 'context' => 'https://schema.org',
  '@type' => 'CollectionPage',

    '@id' => url('/categories') . '#page',
  'name' => 'Категорії димарів DymSystems',
  'url' => url('/categories'),

  'mainEntity' => [
    '@type' => 'ItemList',
    '@id' => url('/categories') . '#itemlist',
    'name' => 'Категорії димарів',
    'itemListElement' => [
      [
        '@type' => 'ListItem',
        'position' => 1,
        'name' => 'Система одностінних димоходів',
        'item' => [
    '@id' => url('/systema-odnostinnih-dimohodiv'),
    'name' => 'Система одностінних димоходів',
]
      ],
      [
        '@type' => 'ListItem',
        'position' => 2,
        'name' => 'Система сендвіч-димоходів',
        'item' => [
    '@id' => url('/termo-sendvich-dimohidna-systema'),
    'name' => 'Система сендвіч-димоходів',
]
      ],
      [
        '@type' => 'ListItem',
        'position' => 3,
        'name' => 'Система кріплень, хомутів, прохідних та завершувальних елементів',
        'item' => [
        '@id' => url('/systema-kriplen-homutiv-ta-komplektuyuchih'),
        'name' => 'Система кріплень, хомутів, прохідних та завершувальних елементів',
    ],
      ],
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
        'item' => [
            '@id' => url('/'),
            'name' => 'Головна',
        ],
    ],
    [
        '@type' => 'ListItem',
        'position' => 2,
        'name' => 'Категорії димарів',
        'item' => [
            '@id' => url('/categories'),
            'name' => 'Категорії димарів',
        ],
    ],
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