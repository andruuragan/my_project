@extends('layouts.main')

@section('title', __('article-basalt.title'))

@section('description', __('article-basalt.description'))

@section('content')

<div class="container py-5">

    {{-- Навігаційні крихти --}}
  <nav aria-label="breadcrumb" class="mb-4">
    <ol class="breadcrumb">

        <li class="breadcrumb-item">
            <a href="{{ route('main.index') }}"
               class="text-decoration-none text-muted">
                {{ __('article-basalt.breadcrumb_home') }}
            </a>
        </li>

        <li class="breadcrumb-item">
            <a href="{{ route('useful.index') }}"
               class="text-decoration-none text-muted">
                {{ __('article-basalt.breadcrumb_useful') }}
            </a>
        </li>

        <li class="breadcrumb-item active"
            aria-current="page"
            style="color:#ea580c;">
            {{ __('article-basalt.breadcrumb_title') }}
        </li>

    </ol>
</nav>

    {{-- Заголовок --}}
    <div class="text-center mb-5">

       <h1 class="fw-bold display-5">
    {{ __('article-basalt.heading') }}
</h1>

<p class="lead text-muted mx-auto" style="max-width:900px;">
    {{ __('article-basalt.intro') }}
</p>

    </div>

    {{-- Банер --}}
    <div class="mb-5">

        <div class="rounded-4 border overflow-hidden shadow-sm">

            <img src="{{ asset('images/chimney/basalt-wool.webp') }}"
     alt="Базальтова вата для сендвіч-димоходів"
     class="img-fluid w-100"
    >

        </div>

    </div>

  {{-- Швидкий зміст --}}
<div class="card border-0 shadow-sm rounded-4 mb-5">

    <div class="card-body p-4">

        <h2 class="h3 mb-3">
            <i class="bi bi-list-check text-warning me-2"></i>
            {{ __('article-basalt.contents_title') }}
        </h2>

        <div class="row">

            <div class="col-md-6">

                <ul class="mb-0">
                    <li>{{ __('article-basalt.contents_1') }}</li>
                    <li>{{ __('article-basalt.contents_2') }}</li>
                    <li>{{ __('article-basalt.contents_3') }}</li>
                    <li>{{ __('article-basalt.contents_4') }}</li>
                    <li>{{ __('article-basalt.contents_5') }}</li>
                </ul>

            </div>

            <div class="col-md-6">

                <ul class="mb-0">
                    <li>{{ __('article-basalt.contents_6') }}</li>
                    <li>{{ __('article-basalt.contents_7') }}</li>
                    <li>{{ __('article-basalt.contents_8') }}</li>
                    <li>{{ __('article-basalt.contents_9') }}</li>
                    <li>{{ __('article-basalt.contents_10') }}</li>
                </ul>

            </div>

        </div>

    </div>

</div>

{{-- Що таке базальтова вата --}}
<section class="mb-5">

    <div class="text-center mb-4">

       <h2 class="fw-bold">
    {{ __('article-basalt.what_is_basalt_title') }}
</h2>

<p class="text-muted">
    {{ __('article-basalt.what_is_basalt_text') }}
</p>

    </div>

    <div class="row align-items-center g-5">

        {{-- Текст --}}
        <div class="col-lg-7">

         <p class="fs-5">
    {!! __('article-basalt.what_is_basalt_text_1') !!}
</p>

<p>
    {{ __('article-basalt.what_is_basalt_text_2') }}
</p>

<p class="mb-0">
    {{ __('article-basalt.what_is_basalt_text_3') }}
</p>

        </div>

        {{-- Місце під ілюстрацію --}}
        <div class="col-lg-5">

            <div class="rounded-4 border overflow-hidden shadow-sm">

                <img src="{{ asset('images/chimney/' . (app()->getLocale() === 'ru' ? 'basalt-structureru.webp' : 'basalt-structure.webp')) }}"
     alt="{{ __('article-basalt.structure_image_alt') }}"
     class="img-fluid w-100">

            </div>

        </div>

    </div>

</section>
<hr class="my-5">
<section class="mb-5">

    <div class="text-center mb-4">

  <h2 class="fw-bold">
    {{ __('article-basalt.temperature_title') }}
</h2>

<p class="text-muted">
    {{ __('article-basalt.temperature_description') }}
</p>

    </div>

    <div class="row align-items-center g-5">

        {{-- Текст --}}
        <div class="col-lg-7">

           <p class="fs-5">
    {{ __('article-basalt.temperature_text_1') }}
</p>

<p>
    {!! __('article-basalt.temperature_text_2') !!}
</p>

<p>
    {{ __('article-basalt.temperature_text_3') }}
</p>

            <div class="alert alert-success rounded-4 mt-4">

              <strong>
    <i class="bi bi-shield-check me-2"></i>
    {{ __('article-basalt.advantages_title') }}
</strong>

<ul class="mb-0 mt-3">

    <li>{!! __('article-basalt.advantages_1') !!}</li>

    <li>{!! __('article-basalt.advantages_2') !!}</li>

    <li>{{ __('article-basalt.advantages_3') }}</li>

    <li>{{ __('article-basalt.advantages_4') }}</li>

    <li>{{ __('article-basalt.advantages_5') }}</li>

</ul>

            </div>

        </div>

        {{-- Ілюстрація --}}
        <div class="col-lg-5">

            <div class="rounded-4 border overflow-hidden shadow-sm">

               <img src="{{ asset('images/chimney/' . (app()->getLocale() === 'ru' ? 'paroc-temperatureru.webp' : 'paroc-temperature.webp')) }}"
     alt="{{ __('article-basalt.paroc_temperature_image_alt') }}"
     class="img-fluid w-100">

            </div>

        </div>

    </div>

</section>
<hr class="my-5">
{{-- Навіщо потрібне утеплення --}}
<section class="my-5">

    <div class="text-center mb-5">

       <h2 class="fw-bold">
    {{ __('article-basalt.why_insulation_title') }}
</h2>

<p class="text-muted mx-auto" style="max-width:900px;">
    {{ __('article-basalt.why_insulation_description') }}
</p>

    </div>

    <div class="row g-4">

        {{-- Температура --}}
<div class="col-md-6 col-lg-3">

    <div class="card h-100 border-0 shadow rounded-4">

        <div class="card-body text-center">

            <div class="display-5 text-danger mb-3">
                <i class="bi bi-thermometer-half"></i>
            </div>

            <h3 class="h5 fw-bold">
                {{ __('article-basalt.insulation_benefit_1_title') }}
            </h3>

            <p class="text-muted mb-0">
                {{ __('article-basalt.insulation_benefit_1_text') }}
            </p>

        </div>

    </div>

</div>

{{-- Конденсат --}}
<div class="col-md-6 col-lg-3">

    <div class="card h-100 border-0 shadow rounded-4">

        <div class="card-body text-center">

            <div class="display-5 text-primary mb-3">
                <i class="bi bi-droplet-half"></i>
            </div>

            <h3 class="h5 fw-bold">
                {{ __('article-basalt.insulation_benefit_2_title') }}
            </h3>

            <p class="text-muted mb-0">
                {{ __('article-basalt.insulation_benefit_2_text') }}
            </p>

        </div>

    </div>

</div>

{{-- Тяга --}}
<div class="col-md-6 col-lg-3">

    <div class="card h-100 border-0 shadow rounded-4">

        <div class="card-body text-center">

            <div class="display-5 text-warning mb-3">
                <i class="bi bi-wind"></i>
            </div>

            <h3 class="h5 fw-bold">
                {{ __('article-basalt.insulation_benefit_3_title') }}
            </h3>

            <p class="text-muted mb-0">
                {{ __('article-basalt.insulation_benefit_3_text') }}
            </p>

        </div>

    </div>

</div>

{{-- Безпека --}}
<div class="col-md-6 col-lg-3">

    <div class="card h-100 border-0 shadow rounded-4">

        <div class="card-body text-center">

            <div class="display-5 text-success mb-3">
                <i class="bi bi-shield-check"></i>
            </div>

            <h3 class="h5 fw-bold">
                {{ __('article-basalt.insulation_benefit_4_title') }}
            </h3>

            <p class="text-muted mb-0">
                {{ __('article-basalt.insulation_benefit_4_text') }}
            </p>

        </div>

    </div>

</div>

    </div>

</section>
<hr class="my-5">
{{-- Як базальтова вата впливає на тягу --}}
<section class="mb-5">

    <div class="text-center mb-4">

     <h2 class="fw-bold">
    {{ __('article-basalt.how_draft_title') }}
</h2>

<p class="text-muted">
    {{ __('article-basalt.how_draft_description') }}
</p>

    </div>

    <div class="row align-items-center g-5">

        {{-- Текст --}}
        <div class="col-lg-7">

           <p class="fs-5">
    {{ __('article-basalt.draft_text_1') }}
</p>

<p>
    {{ __('article-basalt.draft_text_2') }}
</p>

            <div class="alert alert-warning rounded-4 mt-4">

               <strong>
    <i class="bi bi-lightbulb-fill me-2"></i>
    {{ __('article-basalt.important_title') }}
</strong>

<p class="mb-0 mt-2">
    {{ __('article-basalt.important_text') }}
</p>

            </div>

        </div>

        {{-- Ілюстрація --}}
        <div class="col-lg-5">

            <div class="rounded-4 border overflow-hidden shadow-sm">

               <img src="{{ asset('images/chimney/' . (app()->getLocale() === 'ru' ? 'draftru.webp' : 'draft.webp')) }}"
     alt="{{ __('article-basalt.draft_image_alt') }}"
     class="img-fluid w-100">

            </div>

        </div>

    </div>

</section>
<hr class="my-5">
{{-- Базальтова вата і конденсат --}}
<section class="mb-5">

    <div class="text-center mb-4">

<h2 class="fw-bold">
    {{ __('article-basalt.condensate_title') }}
</h2>

<p class="text-muted">
    {{ __('article-basalt.condensate_description') }}
</p>

    </div>

    <div class="row align-items-center g-5">

        {{-- Текст --}}
        <div class="col-lg-7">

           <p class="fs-5">
    {{ __('article-basalt.condensate_text_1') }}
</p>

<p>
    {{ __('article-basalt.condensate_text_2') }}
</p>

<p>
    {{ __('article-basalt.condensate_text_3') }}
</p>

            <div class="alert alert-info rounded-4 mt-4">

         <strong>
    <i class="bi bi-info-circle-fill me-2"></i>
    {{ __('article-basalt.worth_knowing_title') }}
</strong>

<p class="mb-0 mt-2">
    {{ __('article-basalt.worth_knowing_text') }}
</p>

            </div>

        </div>

        {{-- Місце під інфографіку --}}
        <div class="col-lg-5">

            <div class="rounded-4 border overflow-hidden shadow-sm">

             <img src="{{ asset('images/chimney/' . (app()->getLocale() === 'ru' ? 'condensateru.webp' : 'condensate.webp')) }}"
     alt="{{ __('article-basalt.condensate_image_alt') }}"
     class="img-fluid w-100">

            </div>

        </div>

    </div>

</section>
<hr class="my-5">
{{-- Одностінна труба чи сендвіч-димохід --}}
<section class="my-5">

    <div class="text-center mb-5">

 <h2 class="fw-bold">
    {{ __('article-basalt.why_sandwich_title') }}
</h2>

<p class="text-muted mx-auto" style="max-width:900px;">
    {{ __('article-basalt.why_sandwich_description') }}
</p>

    </div>

    <div class="row g-4">

        {{-- Одностінна --}}
        <div class="col-lg-6">

            <div class="card border-danger shadow rounded-4 h-100">

                <div class="card-body">

                    <div class="text-center mb-3">
                        <i class="bi bi-x-circle-fill text-danger display-5"></i>
                    </div>

                   <h3 class="text-center text-danger">
    {{ __('article-basalt.single_wall_title') }}
</h3>

<ul class="mt-4 mb-0">
    <li>{{ __('article-basalt.single_wall_1') }}</li>
    <li>{{ __('article-basalt.single_wall_2') }}</li>
    <li>{{ __('article-basalt.single_wall_3') }}</li>
    <li>{{ __('article-basalt.single_wall_4') }}</li>
    <li>{{ __('article-basalt.single_wall_5') }}</li>
</ul>

                </div>

            </div>

        </div>

        {{-- Сендвіч --}}
        <div class="col-lg-6">

            <div class="card border-success shadow rounded-4 h-100">

                <div class="card-body">

                    <div class="text-center mb-3">
                        <i class="bi bi-check-circle-fill text-success display-5"></i>
                    </div>

             <h3 class="text-center text-success">
    {{ __('article-basalt.sandwich_title') }}
</h3>

<ul class="mt-4 mb-0">
    <li>{{ __('article-basalt.sandwich_1') }}</li>
    <li>{{ __('article-basalt.sandwich_2') }}</li>
    <li>{{ __('article-basalt.sandwich_3') }}</li>
    <li>{{ __('article-basalt.sandwich_4') }}</li>
    <li>{{ __('article-basalt.sandwich_5') }}</li>
</ul>

                </div>

            </div>

        </div>

    </div>

</section>
<hr class="my-5">
{{-- Де використовується сендвіч-димохід --}}
<section class="my-5">

    <div class="text-center mb-5">

     <h2 class="fw-bold">
    {{ __('article-basalt.use_cases_title') }}
</h2>

<p class="text-muted mx-auto" style="max-width:900px;">
    {{ __('article-basalt.use_cases_description') }}
</p>

    </div>

    <div class="row g-4">

      {{-- Фасад --}}
<div class="col-md-6 col-lg-4">
    <div class="card h-100 border-0 shadow rounded-4">
        <div class="card-body text-center">

            <div class="display-5 text-warning mb-3">
                <i class="bi bi-house"></i>
            </div>

            <h3 class="h5 fw-bold">
                {{ __('article-basalt.use_case_1_title') }}
            </h3>

            <p class="text-muted mb-0">
                {{ __('article-basalt.use_case_1_text') }}
            </p>

        </div>
    </div>
</div>

{{-- Через стену --}}
<div class="col-md-6 col-lg-4">
    <div class="card h-100 border-0 shadow rounded-4">
        <div class="card-body text-center">

            <div class="display-5 text-primary mb-3">
                <i class="bi bi-box-arrow-right"></i>
            </div>

            <h3 class="h5 fw-bold">
                {{ __('article-basalt.use_case_2_title') }}
            </h3>

            <p class="text-muted mb-0">
                {{ __('article-basalt.use_case_2_text') }}
            </p>

        </div>
    </div>
</div>

{{-- Горище --}}
<div class="col-md-6 col-lg-4">
    <div class="card h-100 border-0 shadow rounded-4">
        <div class="card-body text-center">

            <div class="display-5 text-info mb-3">
                <i class="bi bi-snow"></i>
            </div>

            <h3 class="h5 fw-bold">
                {{ __('article-basalt.use_case_3_title') }}
            </h3>

            <p class="text-muted mb-0">
                {{ __('article-basalt.use_case_3_text') }}
            </p>

        </div>
    </div>
</div>

{{-- Покрівля --}}
<div class="col-md-6 col-lg-4">
    <div class="card h-100 border-0 shadow rounded-4">
        <div class="card-body text-center">

            <div class="display-5 text-success mb-3">
                <i class="bi bi-house-up"></i>
            </div>

            <h3 class="h5 fw-bold">
                {{ __('article-basalt.use_case_4_title') }}
            </h3>

            <p class="text-muted mb-0">
                {{ __('article-basalt.use_case_4_text') }}
            </p>

        </div>
    </div>
</div>

{{-- Камін --}}
<div class="col-md-6 col-lg-4">
    <div class="card h-100 border-0 shadow rounded-4">
        <div class="card-body text-center">

            <div class="display-5 text-danger mb-3">
                <i class="bi bi-fire"></i>
            </div>

            <h3 class="h5 fw-bold">
                {{ __('article-basalt.use_case_5_title') }}
            </h3>

            <p class="text-muted mb-0">
                {{ __('article-basalt.use_case_5_text') }}
            </p>

        </div>
    </div>
</div>

{{-- Котли --}}
<div class="col-md-6 col-lg-4">
    <div class="card h-100 border-0 shadow rounded-4">
        <div class="card-body text-center">

            <div class="display-5 text-secondary mb-3">
                <i class="bi bi-gear-wide-connected"></i>
            </div>

            <h3 class="h5 fw-bold">
                {{ __('article-basalt.use_case_6_title') }}
            </h3>

            <p class="text-muted mb-0">
                {{ __('article-basalt.use_case_6_text') }}
            </p>

        </div>
    </div>
</div>

    </div>

</section>
<hr class="my-5">
{{-- Товщина базальтової вати --}}
<section class="my-5">

    <div class="text-center mb-5">

     <h2 class="fw-bold">
    {{ __('article-basalt.thickness_title') }}
</h2>

<p class="text-muted mx-auto" style="max-width:900px;">
    {{ __('article-basalt.thickness_description') }}
</p>

    </div>

    <div class="row g-4">

        {{-- 30 мм --}}
        <div class="col-md-4">

            <div class="card h-100 border-0 shadow rounded-4">

                <div class="card-body text-center">

                    <div class="display-4 fw-bold text-warning mb-3">
                        30 мм
                    </div>

                  <h3 class="h5">
    {{ __('article-basalt.standard_insulation_title') }}
</h3>

<p class="text-muted mb-0">
    {{ __('article-basalt.standard_insulation_text') }}
</p>

                </div>

            </div>

        </div>

        {{-- 50 мм --}}
        <div class="col-md-4">

            <div class="card h-100 border-0 shadow rounded-4 border-warning">

                <div class="card-body text-center">

                    <div class="display-4 fw-bold text-warning mb-3">
                        50 мм
                    </div>

               <h3 class="h5">
    {{ __('article-basalt.improved_insulation_title') }}
</h3>

<p class="text-muted mb-0">
    {{ __('article-basalt.improved_insulation_text') }}
</p>

                </div>

            </div>

        </div>

        {{-- Важливо --}}
        <div class="col-md-4">

            <div class="card h-100 border-0 shadow rounded-4">

                <div class="card-body text-center">

                    <div class="display-5 text-success mb-3">
                        <i class="bi bi-check2-circle"></i>
                    </div>
<h3 class="h5">
    {{ __('article-basalt.not_only_thickness_title') }}
</h3>

<p class="text-muted mb-0">
    {{ __('article-basalt.not_only_thickness_text') }}
</p>

                </div>

            </div>

        </div>

    </div>

    <div class="alert alert-warning rounded-4 mt-5">

      <h3 class="h5">
    <i class="bi bi-lightbulb-fill me-2"></i>
    {{ __('article-basalt.important_to_know_title') }}
</h3>

<p class="mb-0">
    {{ __('article-basalt.important_to_know_text') }}
</p>

    </div>

</section>
<hr class="my-5">
{{-- Якість базальтової вати --}}
<section class="mb-5">

   <h2 class="fw-bold mb-4">
    {{ __('article-basalt.quality_title') }}
</h2>

<p>
    {{ __('article-basalt.quality_text') }}
</p>
 <p>
    {{ __('article-basalt.quality_text_2') }}
</p>

    <div class="row g-4 mt-2">

        <div class="col-lg-6">

            <div class="card border-0 bg-light h-100">

                <div class="card-body">

                  <h4 class="text-success">
    <i class="bi bi-check-circle-fill me-2"></i>
    {{ __('article-basalt.quality_signs_title') }}
</h4>

<ul class="mb-0">
    <li>{{ __('article-basalt.quality_signs_1') }}</li>
    <li>{{ __('article-basalt.quality_signs_2') }}</li>
    <li>{{ __('article-basalt.quality_signs_3') }}</li>
    <li>{{ __('article-basalt.quality_signs_4') }}</li>
    <li>{{ __('article-basalt.quality_signs_5') }}</li>
</ul>

                </div>

            </div>

        </div>

        <div class="col-lg-6">

            <div class="card border-0 bg-light h-100">

                <div class="card-body">

                <h4 class="text-primary">
    <i class="bi bi-exclamation-circle me-2"></i>
    {{ __('article-basalt.why_quality_matters_title') }}
</h4>

<ul class="mb-0">
    <li>{{ __('article-basalt.why_quality_matters_1') }}</li>
    <li>{{ __('article-basalt.why_quality_matters_2') }}</li>
    <li>{{ __('article-basalt.why_quality_matters_3') }}</li>
    <li>{{ __('article-basalt.why_quality_matters_4') }}</li>
    <li>{{ __('article-basalt.why_quality_matters_5') }}</li>
</ul>

                </div>

            </div>

        </div>

    </div>

</section>
<hr class="my-5">
{{-- Базальтова вата для твердопаливного котла --}}
<section class="mb-5">

 <h2 class="fw-bold mb-4">
    {{ __('article-basalt.boiler_title') }}
</h2>

<p>
    {{ __('article-basalt.boiler_text_1') }}
</p>

<p>
    {{ __('article-basalt.boiler_text_2') }}
</p>
    <div class="row g-4 mt-2">

        <div class="col-lg-6">

            <div class="card border-0 bg-light h-100">

                <div class="card-body">

                 <h4 class="text-success">
    <i class="bi bi-check-circle-fill me-2"></i>
    {{ __('article-basalt.boiler_advantages_title') }}
</h4>

<ul class="mb-0">
    <li>{{ __('article-basalt.boiler_advantages_1') }}</li>
    <li>{{ __('article-basalt.boiler_advantages_2') }}</li>
    <li>{{ __('article-basalt.boiler_advantages_3') }}</li>
    <li>{{ __('article-basalt.boiler_advantages_4') }}</li>
</ul>

                </div>

            </div>

        </div>

        <div class="col-lg-6">

            <div class="card border-0 bg-light h-100">

                <div class="card-body">

                   <h4 class="text-primary">
    <i class="bi bi-tools me-2"></i>
    {{ __('article-basalt.boiler_consider_title') }}
</h4>

<ul class="mb-0">
    <li>{{ __('article-basalt.boiler_consider_1') }}</li>
    <li>{{ __('article-basalt.boiler_consider_2') }}</li>
    <li>{{ __('article-basalt.boiler_consider_3') }}</li>
    <li>{{ __('article-basalt.boiler_consider_4') }}</li>
    <li>{{ __('article-basalt.boiler_consider_5') }}</li>
</ul>

                </div>

            </div>

        </div>

    </div>

</section>
<hr class="my-5">
{{-- Базальтова вата для каміна або печі --}}
<section class="mb-5">

   <h2 class="fw-bold mb-4">
    {{ __('article-basalt.fireplace_title') }}
</h2>

<p>
    {{ __('article-basalt.fireplace_text_1') }}
</p>

<p>
    {{ __('article-basalt.fireplace_text_2') }}
</p>

    <div class="row g-4 mt-2">

        <div class="col-lg-6">

            <div class="card border-0 bg-light h-100">

                <div class="card-body">

                <h4 class="text-success">
    <i class="bi bi-check-circle-fill me-2"></i>
    {{ __('article-basalt.fireplace_advantages_title') }}
</h4>

<ul class="mb-0">
    <li>{{ __('article-basalt.fireplace_advantages_1') }}</li>
    <li>{{ __('article-basalt.fireplace_advantages_2') }}</li>
    <li>{{ __('article-basalt.fireplace_advantages_3') }}</li>
    <li>{{ __('article-basalt.fireplace_advantages_4') }}</li>
    <li>{{ __('article-basalt.fireplace_advantages_5') }}</li>
</ul>

                </div>

            </div>

        </div>

        <div class="col-lg-6">

            <div class="card border-0 bg-light h-100">

                <div class="card-body">

                <h4 class="text-primary">
    <i class="bi bi-fire me-2"></i>
    {{ __('article-basalt.fireplace_features_title') }}
</h4>

<ul class="mb-0">
    <li>{{ __('article-basalt.fireplace_features_1') }}</li>
    <li>{{ __('article-basalt.fireplace_features_2') }}</li>
    <li>{{ __('article-basalt.fireplace_features_3') }}</li>
    <li>{{ __('article-basalt.fireplace_features_4') }}</li>
    <li>{{ __('article-basalt.fireplace_features_5') }}</li>
</ul>

                </div>

            </div>

        </div>

    </div>

</section>
<hr class="my-5">
{{-- Типові помилки --}}
<section class="my-5">

    <div class="alert alert-warning rounded-4 shadow-sm">

      <h2 class="h4 mb-3">
    <i class="bi bi-exclamation-triangle-fill me-2"></i>
    {{ __('article-basalt.common_mistakes_title') }}
</h2>

<ul class="mb-0">
    <li>{{ __('article-basalt.common_mistakes_1') }}</li>
    <li>{{ __('article-basalt.common_mistakes_2') }}</li>
    <li>{{ __('article-basalt.common_mistakes_3') }}</li>
    <li>{{ __('article-basalt.common_mistakes_4') }}</li>
    <li>{{ __('article-basalt.common_mistakes_5') }}</li>
    <li>{{ __('article-basalt.common_mistakes_6') }}</li>
    <li>{{ __('article-basalt.common_mistakes_7') }}</li>
    <li>{{ __('article-basalt.common_mistakes_8') }}</li>
</ul>

    </div>

</section>
<hr class="my-5">
{{-- Пожежна безпека --}}
<section class="mb-5">

    <div class="text-center mb-5">

    <h2 class="fw-bold">
    {{ __('article-basalt.fire_safety_title') }}
</h2>

<p class="text-muted">
    {{ __('article-basalt.fire_safety_description') }}
</p>

    </div>

    <div class="row g-4">

        <div class="col-lg-6">

            <div class="card border-0 shadow rounded-4 h-100">

                <div class="card-body">

                    <div class="display-5 text-warning mb-3">
                        <i class="bi bi-shield-check"></i>
                    </div>

                   <h3 class="h4 mb-3">
    {{ __('article-basalt.fire_safety_provides_title') }}
</h3>

<ul class="mb-0">
    <li>{{ __('article-basalt.fire_safety_provides_1') }}</li>
    <li>{{ __('article-basalt.fire_safety_provides_2') }}</li>
    <li>{{ __('article-basalt.fire_safety_provides_3') }}</li>
    <li>{{ __('article-basalt.fire_safety_provides_4') }}</li>
    <li>{{ __('article-basalt.fire_safety_provides_5') }}</li>
</ul>

                </div>

            </div>

        </div>

        <div class="col-lg-6">

            <div class="card border-0 shadow rounded-4 h-100">

                <div class="card-body">

                    <div class="display-5 text-danger mb-3">
                        <i class="bi bi-exclamation-octagon"></i>
                    </div>

                   <h3 class="h4 mb-3">
    {{ __('article-basalt.fire_safety_required_title') }}
</h3>

<ul class="mb-0">
    <li>{{ __('article-basalt.fire_safety_required_1') }}</li>
    <li>{{ __('article-basalt.fire_safety_required_2') }}</li>
    <li>{{ __('article-basalt.fire_safety_required_3') }}</li>
    <li>{{ __('article-basalt.fire_safety_required_4') }}</li>
    <li>{{ __('article-basalt.fire_safety_required_5') }}</li>
</ul>

                </div>

            </div>

        </div>

    </div>

</section>
<hr class="my-5">
{{-- FAQ --}}
<section class="container-1600 py-5">

    <div class="text-center mb-5">
        <h2 class="fw-bold display-6 mb-3">
            {{ __('article-basalt.faq_title') }}
        </h2>
        <div class="mx-auto bg-warning" style="width:60px;height:3px;"></div>
    </div>

    <div class="accordion" id="faqBasaltAccordion">

        <div class="accordion-item">
            <h3 class="accordion-header">
                <button class="accordion-button fw-bold"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#basaltFaq1">
                    {{ __('article-basalt.faq_1_question') }}
                </button>
            </h3>

            <div id="basaltFaq1"
                 class="accordion-collapse collapse show"
                 data-bs-parent="#faqBasaltAccordion">
                <div class="accordion-body">
                    {{ __('article-basalt.faq_1_answer') }}
                </div>
            </div>
        </div>

        <div class="accordion-item">
            <h3 class="accordion-header">
                <button class="accordion-button collapsed fw-bold"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#basaltFaq2">
                    {{ __('article-basalt.faq_2_question') }}
                </button>
            </h3>

            <div id="basaltFaq2"
                 class="accordion-collapse collapse"
                 data-bs-parent="#faqBasaltAccordion">
                <div class="accordion-body">
                    {{ __('article-basalt.faq_2_answer') }}
                </div>
            </div>
        </div>

        <div class="accordion-item">
            <h3 class="accordion-header">
                <button class="accordion-button collapsed fw-bold"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#basaltFaq3">
                    {{ __('article-basalt.faq_3_question') }}
                </button>
            </h3>

            <div id="basaltFaq3"
                 class="accordion-collapse collapse"
                 data-bs-parent="#faqBasaltAccordion">
                <div class="accordion-body">
                    {{ __('article-basalt.faq_3_answer') }}
                </div>
            </div>
        </div>

        <div class="accordion-item">
            <h3 class="accordion-header">
                <button class="accordion-button collapsed fw-bold"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#basaltFaq4">
                    {{ __('article-basalt.faq_4_question') }}
                </button>
            </h3>

            <div id="basaltFaq4"
                 class="accordion-collapse collapse"
                 data-bs-parent="#faqBasaltAccordion">
                <div class="accordion-body">
                    {{ __('article-basalt.faq_4_answer') }}
                </div>
            </div>
        </div>

        <div class="accordion-item">
            <h3 class="accordion-header">
                <button class="accordion-button collapsed fw-bold"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#basaltFaq5">
                    {{ __('article-basalt.faq_5_question') }}
                </button>
            </h3>

            <div id="basaltFaq5"
                 class="accordion-collapse collapse"
                 data-bs-parent="#faqBasaltAccordion">
                <div class="accordion-body">
                    {{ __('article-basalt.faq_5_answer') }}
                </div>
            </div>
        </div>

        <div class="accordion-item">
            <h3 class="accordion-header">
                <button class="accordion-button collapsed fw-bold"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#basaltFaq6">
                    {{ __('article-basalt.faq_6_question') }}
                </button>
            </h3>

            <div id="basaltFaq6"
                 class="accordion-collapse collapse"
                 data-bs-parent="#faqBasaltAccordion">
                <div class="accordion-body">
                    {{ __('article-basalt.faq_6_answer') }}
                </div>
            </div>
        </div>

        <div class="accordion-item">
            <h3 class="accordion-header">
                <button class="accordion-button collapsed fw-bold"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#basaltFaq7">
                    {{ __('article-basalt.faq_7_question') }}
                </button>
            </h3>

            <div id="basaltFaq7"
                 class="accordion-collapse collapse"
                 data-bs-parent="#faqBasaltAccordion">
                <div class="accordion-body">
                    {{ __('article-basalt.faq_7_answer') }}
                </div>
            </div>
        </div>

        <div class="accordion-item">
            <h3 class="accordion-header">
                <button class="accordion-button collapsed fw-bold"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#basaltFaq8">
                    {{ __('article-basalt.faq_8_question') }}
                </button>
            </h3>

            <div id="basaltFaq8"
                 class="accordion-collapse collapse"
                 data-bs-parent="#faqBasaltAccordion">
                <div class="accordion-body">
                    {{ __('article-basalt.faq_8_answer') }}
                </div>
            </div>
        </div>

    </div>

</section>
<section class="my-5">
    <div class="p-4 p-md-5 rounded-4 text-center shadow-sm"
         style="background: linear-gradient(135deg, #f97316, #fb923c);">

        <h2 class="text-white fw-bold mb-3">
            {{ __('article-basalt.cta_title') }}
        </h2>

        <p class="text-white mb-4 fs-5">
            {{ __('article-basalt.cta_text') }}
        </p>

        <div class="d-flex flex-column flex-md-row justify-content-center gap-3">

            <a href="{{ route('shop.index') }}"
               class="btn btn-light btn-lg px-4 fw-semibold">
                <i class="bi bi-grid me-2"></i>
                {{ __('article-basalt.cta_catalog') }}
            </a>

            <a href="{{ route('contacts.index') }}"
               class="btn btn-outline-light btn-lg px-4 fw-semibold">
                <i class="bi bi-chat-dots me-2"></i>
                {{ __('article-basalt.cta_consultation') }}
            </a>

        </div>

    </div>
</section>
<section class="my-5">

<h2 class="fw-bold mb-4 text-center">
    {{ __('article-basalt.read_also') }}
</h2>


    <div class="row g-4">

        <div class="col-md-4">
            <a href="{{ route('blog.steel-grades') }}"
               class="text-decoration-none">

                <div class="card h-100 border-0 shadow-sm rounded-4">
                    <div class="card-body">

                        <div style="height:220px; overflow:hidden;">
   <img src="{{ asset('images/chimney/' . (app()->getLocale() === 'ru' ? 'grade1ru.webp' : 'grade1.webp')) }}"
     alt="{{ app()->getLocale() === 'ru' ? 'Сажа в дымоходе' : 'Сажа в димоході' }}"
     class="w-100 h-100"
     style="object-fit:cover;">
</div>

<h3 class="h5 text-dark fw-bold mt-2">
    {{ __('article-basalt.read_also_steel_title') }}
</h3>

<p class="text-muted mb-0">
    {{ __('article-basalt.read_also_steel_text') }}
</p>

<a href="{{ route('blog.steel-grades') }}"
   class="btn btn-outline-orange mt-4">
    {{ __('article-basalt.read_also_article') }}
</a>

                    </div>
                </div>

            </a>
        </div>


        <div class="col-md-4">
             <a href="{{ route('blog.soot') }}"
               class="text-decoration-none">

                <div class="card h-100 border-0 shadow-sm rounded-4">
                    <div class="card-body">

                       <div style="height:220px; overflow:hidden;">
    <img src="{{ asset('images/chimney/soot.webp') }}"
         alt="Сажа в димоході"
         class="w-100 h-100"
         style="object-fit:cover;">
</div>

  <h3 class="h5 text-dark fw-bold mt-2">
    {{ __('article-basalt.read_also_soot_title') }}
</h3>

<p class="text-muted mb-0">
    {{ __('article-basalt.read_also_soot_text') }}
</p>

<a href="{{ route('blog.soot') }}"
   class="btn btn-outline-orange mt-4">
    {{ __('article-basalt.read_also_article') }}
</a>

                    </div>
                </div>

            </a>
        </div>


        <div class="col-md-4">
            <a href="{{ route('chimney.installation-rules') }}" 
               class="text-decoration-none">

                <div class="card h-100 border-0 shadow-sm rounded-4">
                    <div class="card-body">

                        <div style="height:220px; overflow:hidden;">
    <img src="{{ asset('images/chimney/montage.webp') }}"
         alt="Монтаж димоходу"
         class="w-100 h-100"
         style="object-fit:cover;">
</div>

                       <h3 class="h5 text-dark fw-bold mt-2">
    {{ __('article-basalt.read_also_installation_title') }}
</h3>

<p class="text-muted mb-0">
    {{ __('article-basalt.read_also_installation_text') }}
</p>

<a href="{{ route('chimney.installation-rules') }}"
   class="btn btn-outline-orange mt-4">
    {{ __('article-basalt.read_also_details') }}
</a>
                    </div>
                </div>

            </a>
        </div>


    </div>

</section>
<style>
/* Ефект наведення для хлібних кришок */
.breadcrumb-item a {
    transition: color 0.2s ease-in-out;
}

.breadcrumb-item a:hover {
    color: #ea580c !important; /* Ваш фірмовий помаранчевий колір */
    text-decoration: underline !important; /* Підкреслення для кращого акценту */
}
  .btn-outline-orange {
    color: #ff7a00;
    border-color: #ff7a00;
}

.btn-outline-orange:hover {
    color: #fff;
    background-color: #ff7a00;
    border-color: #ff7a00;
}
</style>
@endsection
@push('schema-article')
<script type="application/ld+json">
{!! json_encode([
  '@' . 'context' => 'https://schema.org',
  '@type' => 'Article',

  '@id' => url('/blog/bazaltova-vata-dlya-dimohodiv#article'),
  'headline' => 'Базальтова вата для сендвіч-димоходів',
  'url' => url('/blog/bazaltova-vata-dlya-dimohodiv'),

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
      'item' => url('/blog/marky-stali-dlya-dymohodiv')
    ],
    [
      '@type' => 'ListItem',
      'position' => 4,
      'name' => 'Базальтова вата для сендвіч-димоходів',
     'item' => [
        '@id' => url('/blog/bazaltova-vata-dlya-dimohodiv'),
        'name' => 'Базальтова вата для сендвіч-димоходів'
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