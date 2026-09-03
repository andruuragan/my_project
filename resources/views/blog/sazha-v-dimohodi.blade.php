@extends('layouts.main')

@section('title', __('article-soot.title'))
@section('description', __('article-soot.description'))

@section('content')

<div class="container py-5">
  {{-- Навігаційні крихти --}}
    <nav aria-label="breadcrumb" class="mb-4">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('main.index') }}"
               class="text-decoration-none text-muted">
                {{ __('article-soot.breadcrumb_home') }}
            </a>
        </li>

        <li class="breadcrumb-item">
            <a href="{{ route('useful.index') }}"
               class="text-decoration-none text-muted">
                {{ __('article-soot.breadcrumb_useful') }}
            </a>
        </li>

        <li class="breadcrumb-item active"
            aria-current="page"
            style="color:#ea580c;">
            {{ __('article-soot.breadcrumb_title') }}
        </li>
    </ol>
</nav>
    {{-- Заголовок --}}
    <div class="text-center mb-5">

        <h1 class="fw-bold display-5">
    {{ __('article-soot.heading') }}
</h1>

<p class="lead text-muted mx-auto" style="max-width:850px;">
    {{ __('article-soot.intro') }}
</p>

    </div>

    {{-- Місце під банер --}}
    <div class="mb-5">

        <div class="rounded-4 border overflow-hidden shadow-sm">

          <img src="{{ asset('images/chimney/soot-main.webp') }}"
     alt="Сажа в димоході"
     class="img-fluid w-100">

        </div>

    </div>

    {{-- Тут буде основний текст статті --}}
<section class="mb-5">

    <div class="text-center mb-4">

   <h2 class="fw-bold">
    {{ __('article-soot.what_is_soot_title') }}
</h2>

<p class="text-muted">
    {{ __('article-soot.what_is_soot_text') }}
</p>

    </div>


    <div class="row align-items-center g-5">


        {{-- Текст --}}
        <div class="col-lg-7">

          <p class="fs-5">
    {!! __('article-soot.what_is_soot_text_1') !!}
</p>

<p>
    {{ __('article-soot.what_is_soot_text_2') }}
</p>

<p class="mb-0">
    {{ __('article-soot.what_is_soot_text_3') }}
</p>

        </div>


        {{-- Місце під інфографіку --}}
        <div class="col-lg-5">

            <div class="rounded-4 border overflow-hidden shadow-sm">

               <img src="{{ asset('images/chimney/' . (app()->getLocale() === 'ru'
    ? 'soot-formationru.webp'
    : 'soot-formation.webp')) }}"
     alt="{{ app()->getLocale() === 'ru'
        ? 'Образование сажи в дымоходе'
        : 'Утворення сажі в димоході' }}"
     class="img-fluid w-100">

            </div>

        </div>


    </div>

</section>
<hr class="my-5">
<section class="mb-5">

    <div class="text-center mb-4">

  <h2 class="fw-bold">
    {{ __('article-soot.why_soot_title') }}
</h2>

<p class="text-muted">
    {{ __('article-soot.why_soot_text') }}
</p>

    </div>


    <div class="row g-4">


        <div class="col-md-6 col-lg-4">

            <div class="card h-100 border-0 shadow-sm rounded-4">

                <div class="card-body">

                    <i class="bi bi-droplet-half text-warning fs-2"></i>

                 <h3 class="h5 fw-bold mt-3">
    {{ __('article-soot.id_1_title') }}
</h3>

<p class="text-muted mb-0">
    {{ __('article-soot.id_1_text') }}
</p>

                </div>

            </div>

        </div>



        <div class="col-md-6 col-lg-4">

            <div class="card h-100 border-0 shadow-sm rounded-4">

                <div class="card-body">

                    <i class="bi bi-fire text-warning fs-2"></i>

            <h3 class="h5 fw-bold mt-3">
    {{ __('article-soot.id_2_title') }}
</h3>

<p class="text-muted mb-0">
    {{ __('article-soot.id_2_text') }}
</p>

                </div>

            </div>

        </div>



        <div class="col-md-6 col-lg-4">

            <div class="card h-100 border-0 shadow-sm rounded-4">

                <div class="card-body">

                    <i class="bi bi-wind text-warning fs-2"></i>

                  <h3 class="h5 fw-bold mt-3">
    {{ __('article-soot.id_3_title') }}
</h3>

<p class="text-muted mb-0">
    {{ __('article-soot.id_3_text') }}
</p>

                </div>

            </div>

        </div>



        <div class="col-md-6 col-lg-4">

            <div class="card h-100 border-0 shadow-sm rounded-4">

                <div class="card-body">

                    <i class="bi bi-snow text-warning fs-2"></i>

                  <h3 class="h5 fw-bold mt-3">
    {{ __('article-soot.id_4_title') }}
</h3>

<p class="text-muted mb-0">
    {{ __('article-soot.id_4_text') }}
</p>

                </div>

            </div>

        </div>



        <div class="col-md-6 col-lg-4">

            <div class="card h-100 border-0 shadow-sm rounded-4">

                <div class="card-body">

                    <i class="bi bi-bezier2 text-warning fs-2"></i>

             <h3 class="h5 fw-bold mt-3">
    {{ __('article-soot.id_5_title') }}
</h3>

<p class="text-muted mb-0">
    {{ __('article-soot.id_5_text') }}
</p>

                </div>

            </div>

        </div>



        <div class="col-md-6 col-lg-4">

            <div class="card h-100 border-0 shadow-sm rounded-4">

                <div class="card-body">

                    <i class="bi bi-sliders text-warning fs-2"></i>

               <h3 class="h5 fw-bold mt-3">
    {{ __('article-soot.id_6_title') }}
</h3>

<p class="text-muted mb-0">
    {{ __('article-soot.id_6_text') }}
</p>

                </div>

            </div>

        </div>


    </div>

</section>
<hr class="my-5">
<section class="mb-5">

    <div class="text-center mb-4">

  <h2 class="fw-bold">
    {{ __('article-soot.why_dangerous_title') }}
</h2>

<p class="text-muted">
    {{ __('article-soot.why_dangerous_text') }}
</p>

    </div>


    <div class="row align-items-center g-5">


        {{-- Текст --}}
        <div class="col-lg-7">


        <p class="fs-5">
    {{ __('article-soot.why_dangerous_text_1') }}
</p>

<p>
    {{ __('article-soot.why_dangerous_text_2') }}
</p>


            <div class="mt-4">


               <div class="d-flex mb-3">

    <div class="me-3">
        <i class="bi bi-arrow-down-circle-fill text-warning fs-3"></i>
    </div>

    <div>
        <strong>{{ __('article-soot.danger_1_title') }}</strong>
        <p class="text-muted mb-0">
            {{ __('article-soot.danger_1_text') }}
        </p>
    </div>

</div>


<div class="d-flex mb-3">

    <div class="me-3">
        <i class="bi bi-cloud-haze2-fill text-warning fs-3"></i>
    </div>

    <div>
        <strong>{{ __('article-soot.danger_2_title') }}</strong>
        <p class="text-muted mb-0">
            {{ __('article-soot.danger_2_text') }}
        </p>
    </div>

</div>


<div class="d-flex mb-3">

    <div class="me-3">
        <i class="bi bi-fire text-danger fs-3"></i>
    </div>

    <div>
        <strong>{{ __('article-soot.danger_3_title') }}</strong>
        <p class="text-muted mb-0">
            {{ __('article-soot.danger_3_text') }}
        </p>
    </div>

</div>


<div class="d-flex">

    <div class="me-3">
        <i class="bi bi-exclamation-triangle-fill text-warning fs-3"></i>
    </div>

    <div>
        <strong>{{ __('article-soot.danger_4_title') }}</strong>
        <p class="text-muted mb-0">
            {{ __('article-soot.danger_4_text') }}
        </p>
    </div>

</div>


            </div>


        </div>



        {{-- Инфографика --}}
        <div class="col-lg-5">

            <div class="rounded-4 border overflow-hidden shadow-sm">

                <img src="{{ asset('images/chimney/' . (app()->getLocale() === 'ru'
    ? 'soot-dangerru.webp'
    : 'soot-danger.webp')) }}"
     alt="{{ app()->getLocale() === 'ru'
        ? 'Опасность сажи в дымоходе'
        : 'Небезпека сажі в димоході' }}"
     class="img-fluid w-100">

            </div>

        </div>


    </div>

</section>
<hr class="my-5">
<section class="mb-5">

    <div class="text-center mb-4">

        <h2 class="fw-bold">
            {{ __('article-soot.signs_title') }}
        </h2>

        <p class="text-muted">
            {{ __('article-soot.signs_text') }}
        </p>

    </div>


    <div class="row g-4">


        <div class="col-md-6">

            <div class="d-flex align-items-start p-4 rounded-4 shadow-sm border">

                <i class="bi bi-wind text-warning fs-2 me-3"></i>

                <div>
                    <h3 class="h5 fw-bold">
                        {{ __('article-soot.sign_1_title') }}
                    </h3>

                    <p class="text-muted mb-0">
                        {{ __('article-soot.sign_1_text') }}
                    </p>
                </div>

            </div>

        </div>


        <div class="col-md-6">

            <div class="d-flex align-items-start p-4 rounded-4 shadow-sm border">

                <i class="bi bi-cloud-haze text-warning fs-2 me-3"></i>

                <div>
                    <h3 class="h5 fw-bold">
                        {{ __('article-soot.sign_2_title') }}
                    </h3>

                    <p class="text-muted mb-0">
                        {{ __('article-soot.sign_2_text') }}
                    </p>
                </div>

            </div>

        </div>


        <div class="col-md-6">

            <div class="d-flex align-items-start p-4 rounded-4 shadow-sm border">

                <i class="bi bi-fire text-warning fs-2 me-3"></i>

                <div>
                    <h3 class="h5 fw-bold">
                        {{ __('article-soot.sign_3_title') }}
                    </h3>

                    <p class="text-muted mb-0">
                        {{ __('article-soot.sign_3_text') }}
                    </p>

                </div>

            </div>

        </div>


        <div class="col-md-6">

            <div class="d-flex align-items-start p-4 rounded-4 shadow-sm border">

                <i class="bi bi-droplet-fill text-warning fs-2 me-3"></i>

                <div>
                    <h3 class="h5 fw-bold">
                        {{ __('article-soot.sign_4_title') }}
                    </h3>

                    <p class="text-muted mb-0">
                        {{ __('article-soot.sign_4_text') }}
                    </p>

                </div>

            </div>

        </div>


        <div class="col-md-6">

            <div class="d-flex align-items-start p-4 rounded-4 shadow-sm border">

                <i class="bi bi-circle-fill text-dark fs-2 me-3"></i>

                <div>
                    <h3 class="h5 fw-bold">
                        {{ __('article-soot.sign_5_title') }}
                    </h3>

                    <p class="text-muted mb-0">
                        {{ __('article-soot.sign_5_text') }}
                    </p>

                </div>

            </div>

        </div>


        <div class="col-md-6">

            <div class="d-flex align-items-start p-4 rounded-4 shadow-sm border">

                <i class="bi bi-arrow-repeat text-warning fs-2 me-3"></i>

                <div>
                    <h3 class="h5 fw-bold">
                        {{ __('article-soot.sign_6_title') }}
                    </h3>

                    <p class="text-muted mb-0">
                        {{ __('article-soot.sign_6_text') }}
                    </p>

                </div>

            </div>

        </div>


    </div>

</section>
<hr class="my-5">
<section class="mb-5">

    <div class="text-center mb-4">

     <h2 class="fw-bold">
    {{ __('article-soot.boiler_soot_title') }}
</h2>

<p class="text-muted">
    {{ __('article-soot.boiler_soot_text') }}
</p>

    </div>


    <div class="row align-items-center g-5">


        {{-- Текст --}}
        <div class="col-lg-7">


          <p class="fs-5">
    {{ __('article-soot.boiler_soot_text_1') }}
</p>

<p>
    {{ __('article-soot.boiler_soot_text_2') }}
</p>

<p>
    {{ __('article-soot.boiler_soot_text_3') }}
</p>


            <div class="alert alert-warning rounded-4 mt-4">

              <strong>
    <i class="bi bi-lightbulb-fill me-2"></i>
    {{ __('article-soot.important_title') }}
</strong>

<p class="mb-0 mt-2">
    {{ __('article-soot.important_text') }}
</p>

            </div>


        </div>



        {{-- Иллюстрация --}}
        <div class="col-lg-5">

            <div class="rounded-4 border overflow-hidden shadow-sm">

               <img src="{{ asset('images/chimney/' . (app()->getLocale() === 'ru'
    ? 'soot-boilerru.webp'
    : 'soot-boiler.webp')) }}"
     alt="{{ app()->getLocale() === 'ru'
        ? 'Сажа в дымоходе твердотопливного котла'
        : 'Сажа в димоході твердопаливного котла' }}"
     class="img-fluid w-100">

            </div>

        </div>


    </div>

</section>
<hr class="my-5">
<section class="mb-5">

    <div class="text-center mb-4">

   <h2 class="fw-bold">
    {{ __('article-soot.stove_soot_title') }}
</h2>

<p class="text-muted">
    {{ __('article-soot.stove_soot_text') }}
</p>

    </div>


    <div class="row align-items-center g-5">


        {{-- Ілюстрація --}}
        <div class="col-lg-5 order-lg-1">

            <div class="rounded-4 border overflow-hidden shadow-sm">

               <img src="{{ asset('images/chimney/' . (app()->getLocale() === 'ru'
    ? 'soot-fireplaceru.webp'
    : 'soot-fireplace.webp')) }}"
     alt="{{ app()->getLocale() === 'ru'
        ? 'Сажа в дымоходе печи или камина'
        : 'Сажа в димоході печі або каміна' }}"
     class="img-fluid w-100">

            </div>

        </div>



        {{-- Текст --}}
        <div class="col-lg-7 order-lg-2">


           <p class="fs-5">
    {{ __('article-soot.stove_soot_text_1') }}
</p>

<p>
    {{ __('article-soot.stove_soot_text_2') }}
</p>

<p>
    {{ __('article-soot.stove_soot_text_3') }}
</p>



            <div class="alert alert-info rounded-4 mt-4">

            <strong>
    <i class="bi bi-info-circle-fill me-2"></i>
    {{ __('article-soot.advice_title') }}
</strong>

<p class="mb-0 mt-2">
    {{ __('article-soot.advice_text') }}
</p>

            </div>


        </div>


    </div>

</section>

<hr class="my-5">
<section class="mb-5">

    <div class="text-center mb-4">

     <h2 class="fw-bold">
    {{ __('article-soot.soot_condensate_title') }}
</h2>

<p class="text-muted">
    {{ __('article-soot.soot_condensate_text') }}
</p>

    </div>


    <div class="row align-items-center g-5">


        {{-- Текст --}}
        <div class="col-lg-7">


           <p class="fs-5">
    {{ __('article-soot.soot_condensate_text_1') }}
</p>

<p>
    {{ __('article-soot.soot_condensate_text_2') }}
</p>

<p>
    {{ __('article-soot.soot_condensate_text_3') }}
</p>



            <div class="alert alert-warning rounded-4 mt-4">

           <strong>
    <i class="bi bi-lightbulb-fill me-2"></i>
    {{ __('article-soot.condensate_important_title') }}
</strong>

<p class="mb-0 mt-2">
    {{ __('article-soot.condensate_important_text') }}
</p>

            </div>


        </div>



        {{-- Інфографіка --}}
        <div class="col-lg-5">

            <div class="rounded-4 border overflow-hidden shadow-sm">

               <img src="{{ asset('images/chimney/' . (app()->getLocale() === 'ru'
    ? 'soot-condensateru.webp'
    : 'soot-condensate.webp')) }}"
     alt="{{ app()->getLocale() === 'ru'
        ? 'Образование сажи и конденсата в дымоходе'
        : 'Утворення сажі та конденсату в димоході' }}"
     class="img-fluid w-100">

            </div>

        </div>


    </div>

</section>
<hr class="my-5">
<section class="mb-5">

    <div class="text-center mb-4">

        <h2 class="fw-bold">
            {{ __('article-soot.prevention_title') }}
        </h2>

        <p class="text-muted">
            {{ __('article-soot.prevention_text') }}
        </p>

    </div>


    <div class="row g-4">


        <div class="col-md-6 col-lg-4">

            <div class="card h-100 border-0 shadow-sm rounded-4">

                <div class="card-body">

                    <i class="bi bi-tree-fill text-success fs-2"></i>

                    <h3 class="h5 fw-bold mt-3">
                        {{ __('article-soot.prevention_1_title') }}
                    </h3>

                    <p class="text-muted mb-0">
                        {{ __('article-soot.prevention_1_text') }}
                    </p>

                </div>

            </div>

        </div>


        <div class="col-md-6 col-lg-4">

            <div class="card h-100 border-0 shadow-sm rounded-4">

                <div class="card-body">

                    <i class="bi bi-fire text-warning fs-2"></i>

                    <h3 class="h5 fw-bold mt-3">
                        {{ __('article-soot.prevention_2_title') }}
                    </h3>

                    <p class="text-muted mb-0">
                        {{ __('article-soot.prevention_2_text') }}
                    </p>

                </div>

            </div>

        </div>


        <div class="col-md-6 col-lg-4">

            <div class="card h-100 border-0 shadow-sm rounded-4">

                <div class="card-body">

                    <i class="bi bi-wind text-primary fs-2"></i>

                    <h3 class="h5 fw-bold mt-3">
                        {{ __('article-soot.prevention_3_title') }}
                    </h3>

                    <p class="text-muted mb-0">
                        {{ __('article-soot.prevention_3_text') }}
                    </p>

                </div>

            </div>

        </div>


        <div class="col-md-6 col-lg-4">

            <div class="card h-100 border-0 shadow-sm rounded-4">

                <div class="card-body">

                    <i class="bi bi-slash-circle text-danger fs-2"></i>

                    <h3 class="h5 fw-bold mt-3">
                        {{ __('article-soot.prevention_4_title') }}
                    </h3>

                    <p class="text-muted mb-0">
                        {{ __('article-soot.prevention_4_text') }}
                    </p>

                </div>

            </div>

        </div>


        <div class="col-md-6 col-lg-4">

            <div class="card h-100 border-0 shadow-sm rounded-4">

                <div class="card-body">

                    <i class="bi bi-tools text-warning fs-2"></i>

                    <h3 class="h5 fw-bold mt-3">
                        {{ __('article-soot.prevention_5_title') }}
                    </h3>

                    <p class="text-muted mb-0">
                        {{ __('article-soot.prevention_5_text') }}
                    </p>

                </div>

            </div>

        </div>


        <div class="col-md-6 col-lg-4">

            <div class="card h-100 border-0 shadow-sm rounded-4">

                <div class="card-body">

                    <i class="bi bi-layers text-warning fs-2"></i>

                    <h3 class="h5 fw-bold mt-3">
                        {{ __('article-soot.prevention_6_title') }}
                    </h3>

                    <p class="text-muted mb-0">
                        {{ __('article-soot.prevention_6_text') }}
                    </p>

                </div>

            </div>

        </div>


    </div>

</section>
<hr class="my-5">

<section class="mb-5">

    <div class="text-center mb-4">

      <h2 class="fw-bold">
    {{ __('article-soot.cleaning_title') }}
</h2>

<p class="text-muted">
    {{ __('article-soot.cleaning_text') }}
</p>

    </div>


    <div class="row align-items-center g-5">


        {{-- Текст --}}
        <div class="col-lg-7">


          <p class="fs-5">
    {{ __('article-soot.cleaning_text_1') }}
</p>

<p>
    {{ __('article-soot.cleaning_text_2') }}
</p>

<p>
    {{ __('article-soot.cleaning_text_3') }}
</p>


            <div class="row g-3 mt-4">


               <div class="col-md-6">

    <div class="p-3 rounded-4 border h-100">

        <i class="bi bi-brush text-warning fs-3"></i>

        <h3 class="h5 fw-bold mt-2">
            {{ __('article-soot.cleaning_mechanical_title') }}
        </h3>

        <p class="text-muted mb-0">
            {{ __('article-soot.cleaning_mechanical_text') }}
        </p>

    </div>

</div>


<div class="col-md-6">

    <div class="p-3 rounded-4 border h-100">

        <i class="bi bi-droplet text-primary fs-3"></i>

        <h3 class="h5 fw-bold mt-2">
            {{ __('article-soot.cleaning_chemical_title') }}
        </h3>

        <p class="text-muted mb-0">
            {{ __('article-soot.cleaning_chemical_text') }}
        </p>

    </div>

</div>


            </div>


        </div>



        {{-- Картинка --}}
        <div class="col-lg-5">

            <div class="rounded-4 border overflow-hidden shadow-sm">

                <img src="{{ asset('images/chimney/' . (app()->getLocale() === 'ru'
    ? 'chimney-cleaningru.webp'
    : 'chimney-cleaning.webp')) }}"
     alt="{{ app()->getLocale() === 'ru'
        ? 'Чистка дымохода от сажи'
        : 'Чистка димоходу від сажі' }}"
     class="img-fluid w-100">

            </div>

        </div>


    </div>

</section>
<hr class="my-5">
<section class="mb-5">

    <div class="text-center mb-4">

      <h2 class="fw-bold">
    {{ __('article-soot.revision_title') }}
</h2>

<p class="text-muted">
    {{ __('article-soot.revision_text') }}
</p>

    </div>


    <div class="row align-items-center g-5">


        {{-- Ілюстрація --}}
        <div class="col-lg-5">

            <div class="rounded-4 border overflow-hidden shadow-sm">

               <img src="{{ asset('images/chimney/' . (app()->getLocale() === 'ru'
    ? 'chimney-revisionru.webp'
    : 'chimney-revision.webp')) }}"
     alt="{{ app()->getLocale() === 'ru'
        ? 'Ревизия дымохода для очистки от сажи'
        : 'Ревізія димоходу для очищення від сажі' }}"
     class="img-fluid w-100">

            </div>

        </div>



        {{-- Текст --}}
        <div class="col-lg-7">


            <p class="fs-5">
    {!! __('article-soot.revision_text_1') !!}
</p>

<p>
    {{ __('article-soot.revision_text_2') }}
</p>

<p>
    {{ __('article-soot.revision_text_3') }}
</p>



            <div class="alert alert-info rounded-4 mt-4">

             <strong>
    <i class="bi bi-info-circle-fill me-2"></i>
    {{ __('article-soot.advantage_title') }}
</strong>

<p class="mb-0 mt-2">
    {{ __('article-soot.advantage_text') }}
</p>

            </div>


        </div>


    </div>

</section>
<hr class="my-5">
<section class="mb-5">

    <div class="text-center mb-4">

        <h2 class="fw-bold">
            {{ __('article-soot.urgent_cleaning_title') }}
        </h2>

        <p class="text-muted">
            {{ __('article-soot.urgent_cleaning_text') }}
        </p>

    </div>


    <div class="row g-4">


        <div class="col-md-6">

            <div class="alert alert-danger rounded-4 h-100">

                <div class="d-flex align-items-start">

                    <i class="bi bi-exclamation-triangle-fill fs-3 me-3"></i>

                    <div>

                        <h3 class="h5 fw-bold">
                            {{ __('article-soot.urgent_1_title') }}
                        </h3>

                        <p class="mb-0">
                            {{ __('article-soot.urgent_1_text') }}
                        </p>

                    </div>

                </div>

            </div>

        </div>


        <div class="col-md-6">

            <div class="alert alert-warning rounded-4 h-100">

                <div class="d-flex align-items-start">

                    <i class="bi bi-wind fs-3 me-3"></i>

                    <div>

                        <h3 class="h5 fw-bold">
                            {{ __('article-soot.urgent_2_title') }}
                        </h3>

                        <p class="mb-0">
                            {{ __('article-soot.urgent_2_text') }}
                        </p>

                    </div>

                </div>

            </div>

        </div>


        <div class="col-md-6">

            <div class="alert alert-warning rounded-4 h-100">

                <div class="d-flex align-items-start">

                    <i class="bi bi-fire fs-3 me-3"></i>

                    <div>

                        <h3 class="h5 fw-bold">
                            {{ __('article-soot.urgent_3_title') }}
                        </h3>

                        <p class="mb-0">
                            {{ __('article-soot.urgent_3_text') }}
                        </p>

                    </div>

                </div>

            </div>

        </div>


        <div class="col-md-6">

            <div class="alert alert-danger rounded-4 h-100">

                <div class="d-flex align-items-start">

                    <i class="bi bi-fire fs-3 me-3"></i>

                    <div>

                        <h3 class="h5 fw-bold">
                            {{ __('article-soot.urgent_4_title') }}
                        </h3>

                        <p class="mb-0">
                            {{ __('article-soot.urgent_4_text') }}
                        </p>

                    </div>

                </div>

            </div>

        </div>


        <div class="col-md-6">

            <div class="alert alert-secondary rounded-4 h-100">

                <div class="d-flex align-items-start">

                    <i class="bi bi-circle-fill fs-3 me-3"></i>

                    <div>

                        <h3 class="h5 fw-bold">
                            {{ __('article-soot.urgent_5_title') }}
                        </h3>

                        <p class="mb-0">
                            {{ __('article-soot.urgent_5_text') }}
                        </p>

                    </div>

                </div>

            </div>

        </div>


        <div class="col-md-6">

            <div class="alert alert-info rounded-4 h-100">

                <div class="d-flex align-items-start">

                    <i class="bi bi-search fs-3 me-3"></i>

                    <div>

                        <h3 class="h5 fw-bold">
                            {{ __('article-soot.urgent_6_title') }}
                        </h3>

                        <p class="mb-0">
                            {{ __('article-soot.urgent_6_text') }}
                        </p>

                    </div>

                </div>

            </div>

        </div>


    </div>

</section>
<hr class="my-5">

<section class="mb-5">

    <div class="rounded-4 shadow-sm p-5 text-center bg-light">

        <h2 class="fw-bold mb-3">
            {{ __('article-soot.cta_title') }}
        </h2>

        <p class="lead text-muted mx-auto mb-4" style="max-width:750px;">
            {{ __('article-soot.cta_text') }}
        </p>

        <div class="d-flex flex-wrap justify-content-center gap-3">

            <a href="{{ route('shop.index') }}"
               class="btn btn-warning btn-lg rounded-pill px-4">

                <i class="bi bi-cart3 me-2"></i>

                {{ __('article-soot.cta_catalog') }}

            </a>

            <a href="{{ route('contacts.index') }}"
               class="btn btn-outline-dark btn-lg rounded-pill px-4">

                <i class="bi bi-chat-dots me-2"></i>

                {{ __('article-soot.cta_consultation') }}

            </a>

        </div>

    </div>

</section>
<section class="mb-5">

    <div class="text-center mb-4">

        <h2 class="fw-bold">
            {{ __('article-soot.read_also') }}
        </h2>

    </div>


    <div class="row g-4">


        {{-- Марки стали --}}

        <div class="col-md-4">

            <a href="{{ route('blog.steel-grades') }}"
               class="text-decoration-none text-dark">

                <div class="card h-100 border-0 shadow-sm rounded-4">

                    <div class="card-body">

                        <div style="height:220px; overflow:hidden;">
                            <img src="{{ asset('images/chimney/' . (app()->getLocale() === 'ru'
                                ? 'grade1ru.webp'
                                : 'grade1.webp')) }}"
                                 alt="{{ app()->getLocale() === 'ru'
                                    ? 'Марки стали в дымоходах'
                                    : 'Марки сталі в димоходах' }}"
                                 class="w-100 h-100"
                                 style="object-fit:cover;">
                        </div>

                        <h3 class="h5 fw-bold mt-3">
                            {{ __('article-soot.related_steel_title') }}
                        </h3>

                        <p class="text-muted mb-0">
                            {{ __('article-soot.related_steel_text') }}
                        </p>

                        <a href="{{ route('blog.steel-grades') }}"
                           class="btn btn-outline-orange mt-4">
                            {{ __('article-soot.related_steel_button') }}
                        </a>

                    </div>

                </div>

            </a>

        </div>


        {{-- Базальтовая вата --}}

        <div class="col-md-4">

            <a href="{{ route('blog.basalt-wool') }}"
               class="text-decoration-none text-dark">

                <div class="card h-100 border-0 shadow-sm rounded-4">

                    <div class="card-body">

                        <div style="height:220px; overflow:hidden;">
                            <img src="{{ asset('images/chimney/basalt.webp') }}"
                                 alt="{{ app()->getLocale() === 'ru'
                                    ? 'Базальтовая вата'
                                    : 'Базальтова вата' }}"
                                 class="w-100 h-100"
                                 style="object-fit:cover;">
                        </div>

                        <h3 class="h5 fw-bold mt-3">
                            {{ __('article-soot.related_basalt_title') }}
                        </h3>

                        <p class="text-muted mb-0">
                            {{ __('article-soot.related_basalt_text') }}
                        </p>

                        <a href="{{ route('blog.basalt-wool') }}"
                           class="btn btn-outline-orange mt-4">
                            {{ __('article-soot.related_basalt_button') }}
                        </a>

                    </div>

                </div>

            </a>

        </div>


        {{-- Калькулятор --}}

        <div class="col-md-4">

            <a href="{{ route('chimney.calculator') }}"
               class="text-decoration-none text-dark">

                <div class="card h-100 border-0 shadow-sm rounded-4">

                    <div class="card-body">

                        <div style="height:220px; overflow:hidden;">
                            <img src="{{ asset('images/chimney/calculator.webp') }}"
                                 alt="{{ app()->getLocale() === 'ru'
                                    ? 'Онлайн-калькулятор дымохода'
                                    : 'Онлайн-калькулятор димоходу' }}"
                                 class="w-100 h-100"
                                 style="object-fit:cover;">
                        </div>

                        <h3 class="h5 fw-bold mt-3">
                            {{ __('article-soot.related_calculator_title') }}
                        </h3>

                        <p class="text-muted mb-0">
                            {{ __('article-soot.related_calculator_text') }}
                        </p>

                        <a href="{{ route('chimney.calculator') }}"
                           class="btn btn-outline-orange mt-4">
                            {{ __('article-soot.related_calculator_button') }}
                        </a>

                    </div>

                </div>

            </a>

        </div>


    </div>

</section>
<section class="mb-5">

    <div class="text-center mb-4">

        <h2 class="fw-bold">
            {{ __('article-soot.faq_title') }}
        </h2>

        <p class="text-muted">
            {{ __('article-soot.faq_text') }}
        </p>

    </div>


    <div class="accordion rounded-4 overflow-hidden" id="sootFaq">


        <div class="accordion-item">

            <h3 class="accordion-header">

                <button class="accordion-button"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#faq1">

                    {{ __('article-soot.faq_1_question') }}

                </button>

            </h3>

            <div id="faq1"
                 class="accordion-collapse collapse show"
                 data-bs-parent="#sootFaq">

                <div class="accordion-body">

                    {{ __('article-soot.faq_1_answer') }}

                </div>

            </div>

        </div>


        <div class="accordion-item">

            <h3 class="accordion-header">

                <button class="accordion-button collapsed"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#faq2">

                    {{ __('article-soot.faq_2_question') }}

                </button>

            </h3>

            <div id="faq2"
                 class="accordion-collapse collapse"
                 data-bs-parent="#sootFaq">

                <div class="accordion-body">

                    {{ __('article-soot.faq_2_answer') }}

                </div>

            </div>

        </div>


        <div class="accordion-item">

            <h3 class="accordion-header">

                <button class="accordion-button collapsed"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#faq3">

                    {{ __('article-soot.faq_3_question') }}

                </button>

            </h3>

            <div id="faq3"
                 class="accordion-collapse collapse"
                 data-bs-parent="#sootFaq">

                <div class="accordion-body">

                    {{ __('article-soot.faq_3_answer') }}

                </div>

            </div>

        </div>


        <div class="accordion-item">

            <h3 class="accordion-header">

                <button class="accordion-button collapsed"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#faq4">

                    {{ __('article-soot.faq_4_question') }}

                </button>

            </h3>

            <div id="faq4"
                 class="accordion-collapse collapse"
                 data-bs-parent="#sootFaq">

                <div class="accordion-body">

                    {{ __('article-soot.faq_4_answer') }}

                </div>

            </div>

        </div>


        <div class="accordion-item">

            <h3 class="accordion-header">

                <button class="accordion-button collapsed"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#faq5">

                    {{ __('article-soot.faq_5_question') }}

                </button>

            </h3>

            <div id="faq5"
                 class="accordion-collapse collapse"
                 data-bs-parent="#sootFaq">

                <div class="accordion-body">

                    {{ __('article-soot.faq_5_answer') }}

                </div>

            </div>

        </div>


        <div class="accordion-item">

            <h3 class="accordion-header">

                <button class="accordion-button collapsed"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#faq6">

                    {{ __('article-soot.faq_6_question') }}

                </button>

            </h3>

            <div id="faq6"
                 class="accordion-collapse collapse"
                 data-bs-parent="#sootFaq">

                <div class="accordion-body">

                    {{ __('article-soot.faq_6_answer') }}

                </div>

            </div>

        </div>


    </div>

</section>
</div>
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

  '@id' => url('/blog/sazha-v-dimohodi'),
  'headline' => 'Сажа в димоході: причини утворення та способи очищення',
  'url' => url('/blog/sazha-v-dimohodi'),

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
      'name' => 'Сажа в димоході: причини утворення та способи очищення',
     'item' => [
        '@id' => url('/blog/sazha-v-dimohodi'),
        'name' => 'Сажа в димоході: причини утворення та способи очищення'
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