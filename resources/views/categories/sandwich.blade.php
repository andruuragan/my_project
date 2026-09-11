@extends('layouts.main')

@section('title', __('sandwich.title'))

@section('description', __('sandwich.description'))

@section('content')

<section class="container-1600 py-5">
 {{-- Навігаційні крихти (Breadcrumbs) --}}
               <nav aria-label="breadcrumb" class="mb-4">
    <ol class="breadcrumb mb-0">

        <li class="breadcrumb-item">
            <a href="{{ route('main.index') }}"
               class="text-decoration-none text-black-50 hover-orange transition-all">
                {{ __('sandwich.breadcrumb_home') }}
            </a>
        </li>

        <li class="breadcrumb-item">
            <a href="{{ route('categories.index') }}"
               class="text-decoration-none text-black-50 hover-orange transition-all">
                {{ __('sandwich.breadcrumb_categories') }}
            </a>
        </li>

        <li class="breadcrumb-item active text-black" aria-current="page">
            <span style="color: #f97316; font-weight: 500;">
                {{ __('sandwich.breadcrumb_title') }}
            </span>
        </li>

    </ol>
</nav>
   <div class="hero-banner position-relative overflow-hidden rounded-4 p-4 p-lg-5">

    {{-- Зображення --}}
    <img src="{{ asset('images/chimney/sandwich-banner.webp') }}"
         class="hero-image"
         width="500"
         height="500"
         alt="Термо (сендвіч) димохідна система"
         loading="eager">

   <div class="hero-content">

    <span class="badge bg-warning text-dark px-3 py-2 mb-3">
        DymSystems
    </span>

    <h1 class="display-4 fw-bold mb-4">
        {{ __('sandwich.hero_title') }}
    </h1>

    <p class="lead text-muted mb-4" style="max-width:700px;">
        {{ __('sandwich.hero_description') }}
    </p>

    <div class="d-flex flex-wrap gap-3 mb-4">

        <span class="badge rounded-pill bg-light text-dark border px-3 py-2">
            <i class="bi bi-shield-check text-warning me-2"></i>
            {{ __('sandwich.hero_insulation') }}
        </span>

        <span class="badge rounded-pill bg-light text-dark border px-3 py-2">
            <i class="bi bi-house-check-fill text-success me-2"></i>
            {{ __('sandwich.hero_installation') }}
        </span>

        <span class="badge rounded-pill bg-light text-dark border px-3 py-2">
            <i class="bi bi-check-circle-fill text-primary me-2"></i>
            {{ __('sandwich.hero_compatible') }}
        </span>

    </div>

    <a href="#selection"
       class="btn btn-warning btn-lg rounded-pill px-5 shadow-sm mt-4">
        <i class="bi bi-arrow-right-circle-fill me-2"></i>
        {{ __('sandwich.hero_button') }}
    </a>

</div>

</div>
</section>
<section class="container-1600 py-5">

    <div class="text-center mb-5">

        <span class="badge bg-warning text-dark mb-3">
            {{ __('sandwich.steps_badge') }}
        </span>

        <h2 class="fw-bold mb-3">
            {{ __('sandwich.steps_title') }}
        </h2>

        <p class="text-muted mx-auto" style="max-width:700px;">
            {{ __('sandwich.steps_description') }}
        </p>

    </div>

    <div class="row g-4">

        <div class="col">
            <div class="card step-card h-100 border-0 shadow-sm text-center p-4 workfup-card"
                 style="background:linear-gradient(135deg,#fffdf7,#ffffff)">

                <div class="display-5 text-warning mb-3">
                    <i class="bi bi-circle-square"></i>
                </div>

                <h5 class="fw-bold">
                    {{ __('sandwich.step_diameter_title') }}
                </h5>

                <p class="text-muted small mb-0">
                    {{ __('sandwich.step_diameter_text') }}
                </p>

            </div>
        </div>

        <div class="col">
            <div class="card step-card h-100 border-0 shadow-sm text-center p-4 workfup-card"
                 style="background:linear-gradient(135deg,#fffdf7,#ffffff)">

                <div class="display-5 text-warning mb-3">
                    <i class="bi bi-shield-check"></i>
                </div>

                <h5 class="fw-bold">
                    {{ __('sandwich.step_steel_title') }}
                </h5>

                <p class="text-muted small mb-0">
                    {{ __('sandwich.step_steel_text') }}
                </p>

            </div>
        </div>

        <div class="col">
            <div class="card step-card h-100 border-0 shadow-sm text-center p-4 workfup-card"
                 style="background:linear-gradient(135deg,#fffdf7,#ffffff)">

                <div class="display-5 text-warning mb-3">
                    <i class="bi bi-rulers"></i>
                </div>

                <h5 class="fw-bold">
                    {{ __('sandwich.step_thickness_title') }}
                </h5>

                <p class="text-muted small mb-0">
                    {{ __('sandwich.step_thickness_text') }}
                </p>

            </div>
        </div>

        <div class="col">
            <div class="card step-card h-100 border-0 shadow-sm text-center p-4 workfup-card"
                 style="background:linear-gradient(135deg,#fffdf7,#ffffff)">

                <div class="display-5 text-warning mb-3">
                    <i class="bi bi-layers"></i>
                </div>

                <h5 class="fw-bold">
                    {{ __('sandwich.step_casing_title') }}
                </h5>

                <p class="text-muted small mb-0">
                    {{ __('sandwich.step_casing_text') }}
                </p>

            </div>
        </div>

        <div class="col">
            <div class="card step-card h-100 border-0 shadow-sm text-center p-4 workfup-card"
                 style="background:linear-gradient(135deg,#fffdf7,#ffffff)">

                <div class="display-5 text-warning mb-3">
                    <i class="bi bi-box-seam"></i>
                </div>

                <h5 class="fw-bold">
                    {{ __('sandwich.step_element_title') }}
                </h5>

                <p class="text-muted small mb-0">
                    {{ __('sandwich.step_element_text') }}
                </p>

            </div>
        </div>

    </div>

    <div class="alert alert-success border-0 rounded-4 mt-5">
        <i class="bi bi-check-circle-fill me-2"></i>
        {{ __('sandwich.compatible_notice') }}
    </div>

    <div class="config-alert rounded-4 p-4 mt-5">

        <div class="d-lg-flex justify-content-between align-items-center">

            <div>
                <h5 class="fw-bold mb-2">
                    <i class="bi bi-lightbulb me-2"></i>
                    {{ __('sandwich.config_question') }}
                </h5>

                <p class="mb-0">
                    {{ __('sandwich.config_description') }}
                </p>
            </div>

            <div class="mt-3 mt-lg-0 ms-lg-4 flex-shrink-0">
                <a href="{{ route('categories.index') }}#configurator1"
                   class="btn btn-dark rounded-pill d-inline-flex align-items-center justify-content-center"
                   style="width: 190px; height: 48px;">

                    {{ __('sandwich.config_button') }}

                    <img src="/images/icons/heand.svg"
                         width="32"
                         height="32"
                         class="ms-2 invert-icon">
                </a>
            </div>

        </div>

    </div>

    <div class="config-alert rounded-4 p-4 mt-5">

        <div class="d-lg-flex justify-content-between align-items-center">

            <div>
                <h5 class="fw-bold mb-2">
                    <i class="bi bi-calculator me-2"></i>
                    {{ __('sandwich.calculator_question') }}
                </h5>

                <p class="mb-0">
                    {{ __('sandwich.calculator_description') }}
                </p>
            </div>

            <div class="mt-3 mt-lg-0 ms-lg-4 flex-shrink-0">
                <a href="{{ route('chimney.calculator') }}"
                   class="btn btn-warning rounded-pill d-inline-flex align-items-center justify-content-center"
                   style="width: 190px; height: 48px;">

                    {{ __('sandwich.calculator_button') }}

                    <i class="bi bi-calculator ms-2"></i>
                </a>
            </div>

        </div>

    </div>

</section>

<section id="selection" class="container-1600 py-5">

    <div class="card border-0 shadow rounded-4">

        <div class="card-body p-5">
             {{-- Заголовок мастера --}}
        <div class="text-center mb-4">
            <span class="badge bg-warning text-dark mb-2">
                DymSystems
            </span>
<h2 class="fw-bold mb-2">
    {{ __('sandwich.wizard_title') }}
</h2>

<p class="text-muted mb-0">
    {{ __('sandwich.wizard_description') }}
</p>
        </div>

            {{-- Прогресс --}}
           <div class="d-flex justify-content-between mb-3 small fw-semibold">
    <span id="stepText">
        {{ __('sandwich.js_step', ['current' => 1]) }}
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
    {{ __('sandwich.back') }}

</button>

            {{-- Выбранные параметры --}}
            <div
                id="selectedOptions"
                class="alert alert-light border mb-4"
                style="display:none;">

             <strong>{{ __('sandwich.selected_options') }}</strong>

                <div id="selectedList" class="mt-2"></div>

            </div>
<div id="stepsContainer">
            {{-- Шаг 1 --}}
            <div id="step1">
<h2 class="fw-bold text-center mb-4">
    {{ __('sandwich.diameter_title') }}
</h2>

                <div class="row g-3">
                    @foreach([
 '100/160', '110/180', '120/180', '130/200', '140/200',
                                '150/220', '160/220', '180/250', '200/260', '220/280',
                                '230/300', '250/320', '300/360', '350/420', '400/460', '450/520',
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
    {{ __('sandwich.steel_question') }}
</h2>

<p class="text-center text-muted mb-4">
    {{ __('sandwich.steel_description') }}
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
    🟢 {{ __('sandwich.steel_popular') }}
</span>

<div class="small text-muted">
    {{ __('sandwich.steel_popular_description') }}
    <strong>{{ __('sandwich.steel_popular_thickness') }}</strong>.
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
    🔥 {{ __('sandwich.steel_high_temperature') }}
</span>

<div class="small text-muted">
    {{ __('sandwich.steel_high_temperature_description') }}
    <strong>{{ __('sandwich.steel_high_temperature_thickness') }}</strong>.
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
    💰 {{ __('sandwich.steel_economy') }}
</span>

<div class="small text-muted">
    {{ __('sandwich.steel_economy_description') }}
    <strong>{{ __('sandwich.steel_economy_thickness') }}</strong>.
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
    {{ __('sandwich.thickness_title') }}
</h2>

<p class="text-center text-muted mb-4">
    {{ __('sandwich.thickness_description') }}
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
    {{ __('sandwich.casing_title') }}
</h2>

<p class="text-center text-muted mb-4">
    {{ __('sandwich.casing_description') }}
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
    {{ __('sandwich.casing_stainless_title') }}
</div>

<span class="badge bg-success mb-3">
    🟢 {{ __('sandwich.casing_standard') }}
</span>

<div class="small text-muted">
    {{ __('sandwich.casing_stainless_description') }}
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
    {{ __('sandwich.casing_galvanized_title') }}
</div>

<span class="badge bg-warning text-dark mb-3">
    💰 {{ __('sandwich.casing_economy') }}
</span>

<div class="small text-muted">
    {{ __('sandwich.casing_galvanized_description') }}
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
    {{ __('sandwich.element_title') }}
</h2>

<p class="text-center text-muted mb-4">
    {{ __('sandwich.element_description') }}
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
    {{ __('sandwich.selection_ready_title') }}
</h2>

<p class="text-muted mb-0">
    {{ __('sandwich.selection_ready_description') }}
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
    {{ __('sandwich.show_products') }}

</button>

            </div>

        </div>

    </div>
<div id="productsGrid" class="row g-4 mt-2"></div>

   <div class="alert alert-warning border-0 shadow-sm rounded-4 mt-4">
    <h5 class="fw-bold mb-2">
        <i class="bi bi-info-circle me-2"></i>
        {{ __('sandwich.attention_title') }}
    </h5>

    <p class="mb-0">
        {{ __('sandwich.attention_description') }}
    </p>

    <a href="{{ route('fittings-system') }}"
       class="btn rounded-pill mt-3"
       style="color: #fd7e14; border: 1px solid #fd7e14;">
        {{ __('sandwich.attention_button') }}
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
    {{ __('sandwich.why_choose_title') }}
</h2>

<p class="text-muted mb-4">
    {{ __('sandwich.why_choose_description') }}
</p>

               <div class="d-flex flex-wrap gap-3">

    <span class="badge rounded-pill bg-light border text-dark px-3 py-2">
        <i class="bi bi-fire text-warning me-2"></i>
        {{ __('sandwich.feature_heat_resistance') }}
    </span>

    <span class="badge rounded-pill bg-light border text-dark px-3 py-2">
        <i class="bi bi-droplet-half text-primary me-2"></i>
        {{ __('sandwich.feature_low_condensation') }}
    </span>

    <span class="badge rounded-pill bg-light border text-dark px-3 py-2">
        <i class="bi bi-house-check text-success me-2"></i>
        {{ __('sandwich.feature_outdoor_installation') }}
    </span>

</div>

            </div>

            <div class="col-lg-4 text-center mt-4 mt-lg-0">

                <div class="display-1 text-warning">
                    <i class="bi bi-layers-half"></i>
                </div>
<h5 class="fw-bold mt-3">
    {{ __('sandwich.system_title') }}
</h5>

<p class="text-muted mb-0">
    {{ __('sandwich.system_description') }}
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
    {{ __('sandwich.steel_info') }}
    <strong>{{ __('sandwich.steel_info_grades') }}</strong>.
    <a href="{{ route('blog.steel-grades') }}"
       class="fw-semibold text-decoration-underline"
       style="color:#ff8c00; text-decoration-thickness:2px;">
        {{ __('sandwich.steel_info_link') }} →
    </a>
</div>
</div>

<div class="d-flex mb-4">
    <i class="bi bi-check-circle-fill text-success fs-4 me-3"></i>
  <div>
    {{ __('sandwich.insulation_info') }}
    <a href="{{ route('blog.basalt-wool') }}"
       class="article-link">
        {{ __('sandwich.insulation_info_link') }} →
    </a>
</div>
</div>

<div class="d-flex mb-4">
    <i class="bi bi-check-circle-fill text-success fs-4 me-3"></i>
    <div>
        {{ __('sandwich.casing_info') }}
        <strong>{{ __('sandwich.casing_economy_text') }}</strong>
        {{ __('sandwich.casing_or') }}
        <strong>{{ __('sandwich.casing_standard_text') }}</strong>.
    </div>
</div>

<div class="d-flex">
    <i class="bi bi-check-circle-fill text-success fs-4 me-3"></i>
    <div>
        {{ __('sandwich.components_info') }}
    </div>
</div>
<div class="row text-center mt-5">

   <div class="col-4">
    <div class="display-6 fw-bold text-warning counter" data-target="2">2</div>
    <small class="text-muted">{{ __('sandwich.stat_casing_types') }}</small>
</div>

<div class="col-4">
    <div class="display-6 fw-bold text-warning counter" data-target="1000">1000+</div>
    <small class="text-muted">{{ __('sandwich.stat_components') }}</small>
</div>

<div class="col-4">
    <div class="display-6 fw-bold text-warning counter" data-target="100">100%</div>
    <small class="text-muted">{{ __('sandwich.stat_compatibility') }}</small>
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
    {{ __('sandwich.quality_steel') }}
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
    {{ __('sandwich.low_condensation_title') }}
</h5>

<p class="small text-muted mb-0">
    {{ __('sandwich.low_condensation_description') }}
</p>
    </div>
</div>

               

                <div class="col-6">
                   <div class="card feature-card h-100 border-0 shadow-sm p-4 text-center">
                       <div class="display-6 text-warning">
    <i class="bi bi-fire"></i>
</div>
                       <h5 class="fw-bold mt-3">
    {{ __('sandwich.boiler_types_title') }}
</h5>

<p class="small text-muted mb-0">
    {{ __('sandwich.boiler_types_description') }}
</p>
                    </div>
                </div>
                 <div class="col-6">
    <div class="card feature-card h-100 border-0 shadow-sm p-4 text-center">
        <div class="display-6 text-warning">
            <i class="bi bi-layers"></i>
        </div>

      <h5 class="fw-bold mt-3">
    {{ __('sandwich.casing_types_title') }}
</h5>

<p class="small text-muted mb-0">
    {{ __('sandwich.casing_types_description') }}
</p>
    </div>
</div>

<div class="col-6">
    <div class="card feature-card h-100 border-0 shadow-sm p-4 text-center">
        <div class="display-6 text-warning">
            <i class="bi bi-fire"></i>
        </div>

      <h5 class="fw-bold mt-3">
    {{ __('sandwich.high_heat_resistance_title') }}
</h5>

<p class="small text-muted mb-0">
    {{ __('sandwich.high_heat_resistance_description') }}
</p>
    </div>
</div>



                <div class="col-6">
                    <div class="card feature-card h-100 border-0 shadow-sm p-4 text-center">
                        <div class="display-6 text-warning">
    <i class="bi bi-boxes"></i>
</div><h5 class="fw-bold mt-3">
    {{ __('sandwich.large_selection_title') }}
</h5>

<p class="small text-muted mb-0">
    {{ __('sandwich.large_selection_description') }}
</p>
                    </div>
                    
                </div>

            </div>

        </div>
<div class="text-center mt-5">
   <a href="{{ route('shop.index') }}"
   class="btn btn-warning btn-lg rounded-pill px-5">
    <i class="bi bi-grid me-2"></i>
    {{ __('sandwich.view_catalog') }}
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
            {{ __('sandwich.faq_title') }}
        </h2>

    </div>

    <div class="accordion" id="faqAccordion">

        <div class="accordion-item">

            <h2 class="accordion-header">

                <button class="accordion-button"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#faq1">

                    {{ __('sandwich.faq1_question') }}

                </button>

            </h2>

            <div id="faq1"
                 class="accordion-collapse collapse show"
                 data-bs-parent="#faqAccordion">

                <div class="accordion-body">

                    {{ __('sandwich.faq1_answer') }}

                </div>

            </div>

        </div>

        <div class="accordion-item">

            <h2 class="accordion-header">

                <button class="accordion-button collapsed"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#faq2">

                    {{ __('sandwich.faq2_question') }}

                </button>

            </h2>

            <div id="faq2"
                 class="accordion-collapse collapse"
                 data-bs-parent="#faqAccordion">

                <div class="accordion-body">

                    {{ __('sandwich.faq2_intro') }}
                    <strong>{{ __('sandwich.faq2_economy') }}</strong>
                    {{ __('sandwich.faq2_middle') }}
                    <strong>{{ __('sandwich.faq2_standard') }}</strong>
                    {{ __('sandwich.faq2_answer') }}

                </div>

            </div>

        </div>

        <div class="accordion-item">

            <h2 class="accordion-header">

                <button class="accordion-button collapsed"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#faq3">

                    {{ __('sandwich.faq3_question') }}

                </button>

            </h2>

            <div id="faq3"
                 class="accordion-collapse collapse"
                 data-bs-parent="#faqAccordion">

                <div class="accordion-body">

                    {{ __('sandwich.faq3_answer') }}

                </div>

            </div>

        </div>

        <div class="accordion-item">

            <h2 class="accordion-header">

                <button class="accordion-button collapsed"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#faq4">

                    {{ __('sandwich.faq4_question') }}

                </button>

            </h2>

            <div id="faq4"
                 class="accordion-collapse collapse"
                 data-bs-parent="#faqAccordion">

                <div class="accordion-body">

                    {{ __('sandwich.faq4_answer') }}

                </div>

            </div>

        </div>

        <div class="accordion-item">

            <h2 class="accordion-header">

                <button class="accordion-button collapsed"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#faq5">

                    {{ __('sandwich.faq5_question') }}

                </button>

            </h2>

            <div id="faq5"
                 class="accordion-collapse collapse"
                 data-bs-parent="#faqAccordion">

                <div class="accordion-body">

                    {{ __('sandwich.faq5_answer') }}

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
        padding-bottom: 300px !important;
    }

    .hero-content{
        max-width: 100%;
    }

    .hero-image{
        width: 80%;
        right: 50%;
        transform: translateX(50%);
        bottom: -10px;
    }}
.invert-icon {
    filter: invert(1);
}
</style>

  @php
    $sandwichJsTranslations = [
        'diameter' => __('sandwich.js_diameter'),
        'steel' => __('sandwich.js_steel'),
        'thickness' => __('sandwich.js_thickness'),
        'casing' => __('sandwich.js_casing'),
        'element' => __('sandwich.js_element'),
        'stainless_casing' => __('sandwich.js_stainless_casing'),
        'galvanized_casing' => __('sandwich.js_galvanized_casing'),
        'step' => __('sandwich.js_step'),
        'ready' => __('sandwich.js_ready'),
        'select_all' => __('sandwich.js_select_all'),
    ];
@endphp

<script>
    const sandwichTranslations = @json($sandwichJsTranslations);

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
   <li><strong>${sandwichTranslations.diameter}:</strong> ${selected.diameter} мм</li>
<li><strong>${sandwichTranslations.steel}:</strong> AISI ${selected.grade}</li>
<li><strong>${sandwichTranslations.thickness}:</strong> ${selected.thickness}</li>
<li><strong>${sandwichTranslations.casing}:</strong> ${
    selected.casing === 'н/н'
        ? sandwichTranslations.stainless_casing
        : sandwichTranslations.galvanized_casing
}</li>
<li><strong>${sandwichTranslations.element}:</strong> ${selected.type}</li>
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
        ? sandwichTranslations.step.replace(':current', currentStep)
        : sandwichTranslations.ready;

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
            ? sandwichTranslations.stainless_casing
            : sandwichTranslations.galvanized_casing}
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
        alert(sandwichTranslations.select_all);
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

@push('schema-categories-item2')
<script type="application/ld+json">
{!! json_encode([
  '@' . 'context' => 'https://schema.org',
  '@type' => 'WebApplication',
  '@id' => url('/termo-sendvich-dimohidna-systema#page'),

  'name' => 'Система сендвіч-димоходів',
  'url' => url('/termo-sendvich-dimohidna-systema'),

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
      'name' => 'Система сендвіч-димоходів',
      'item' => url('/termo-sendvich-dimohidna-systema')
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
