@extends('layouts.main')

@section('title', 'Система кріплень та комплектуючих | DymSystems')
@section('description', 'Кронштейни, хомути, прохідні елементи, деки, конуси, грибки та інші комплектуючі для монтажу димохідних систем.')

@section('content')

<div class="container-1600 py-5">

    {{-- Breadcrumbs --}}
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item">
                <a href="{{ route('main.index') }}"
                   class="text-decoration-none text-black-50 hover-orange">
                    Головна
                </a>
            </li>

            <li class="breadcrumb-item">
                <a href="{{ route('categories.index') }}"
                   class="text-decoration-none text-black-50 hover-orange">
                    Категорії димарів
                </a>
            </li>

            <li class="breadcrumb-item active" aria-current="page">
                <span style="color:#f97316;font-weight:500;">
                    Система кріплень та комплектуючих
                </span>
            </li>
        </ol>
    </nav>

    {{-- HERO --}}
    <div class="hero-banner rounded-4 p-5 text-center border mb-5">

        <div class="display-3 text-warning mb-3">
            <i class="bi bi-tools"></i>
        </div>

        <h1 class="display-5 fw-bold mb-3">
            Система кріплень, хомутів та комплектуючих
        </h1>

        <p class="lead text-muted mx-auto" style="max-width:850px;">
            Оберіть необхідний тип комплектуючих для монтажу димохідної системи.
            Для окремих елементів ми допоможемо швидко визначити потрібний діаметр,
            після чого автоматично відкриємо відповідний каталог.
        </p>

        <div class="d-flex justify-content-center flex-wrap gap-2 mt-4">

            <span class="badge bg-light text-dark border px-3 py-2">
                <i class="bi bi-check-circle-fill text-success me-1"></i>
                Кронштейни
            </span>

            <span class="badge bg-light text-dark border px-3 py-2">
                <i class="bi bi-check-circle-fill text-success me-1"></i>
                Хомути
            </span>

            <span class="badge bg-light text-dark border px-3 py-2">
                <i class="bi bi-check-circle-fill text-success me-1"></i>
                Прохідні елементи
            </span>

            <span class="badge bg-light text-dark border px-3 py-2">
                <i class="bi bi-check-circle-fill text-success me-1"></i>
                Комплектуючі
            </span>

        </div>

    </div>

    {{-- КАРТОЧКИ --}}
    <section id="selection">

        <div class="text-center mb-5">

            <span class="badge bg-warning text-dark mb-3">
                Оберіть категорію
            </span>

            <h2 class="fw-bold">
                Що вам потрібно?
            </h2>

            <p class="text-muted">
                Натисніть на потрібний елемент, після чого ми допоможемо швидко
                перейти до відповідного каталогу.
            </p>

        </div>

        <div class="row g-4">

            {{-- Тут будут карточки --}}

        </div>

    </section>


    <div class="row g-4">

@foreach([

    [
        'name' => 'Кронштейни',
        
        'img'  => 'example.webp',
        'description' => 'Для надійного кріплення димоходу до стіни.'
    ],

    [
        'name' => 'Хомути',
        
        'img'  => 'example.webp',
        'description' => 'Монтажні та обтискні хомути різних типів.'
    ],

    [
        'name' => 'Деки',
        
        'img'  => 'example.webp',
        'description' => 'Елементи для герметичного проходу.'
    ],

] as $item)

<div class="col-12 col-sm-6 col-lg-4 col-xl-3">

    <button
        class="card h-100 border-0 shadow-sm custom-product-card solution-card fitting-card w-100"
        data-type="{{ $item['name'] }}">

          <img src="{{ asset('images/' . $item['img']) }}"
             width="70"
             height="70"
             class="img-fluid mb-2"
             alt="{{ $item['name'] }}">

        <div class="card-body d-flex flex-column">

            <h5 class="fw-bold text-center mb-3">
                {{ $item['name'] }}
            </h5>

            <p class="text-muted small flex-grow-1 text-center">
                {{ $item['description'] }}
            </p>

            <span class="btn btn-warning mt-3">
                Обрати
            </span>

        </div>

    </button>

</div>

@endforeach

</div>

</div>

@endsection

@push('styles')
<style>

.hero-banner{
    position:relative;
    overflow:hidden;
    background:linear-gradient(135deg,#fff8e8 0%,#ffffff 100%);
}

.hero-banner::before{
    content:"";
    position:absolute;
    inset:0;
    opacity:.18;
    background:url('{{ asset("images/chimney/fittings-banner.webp") }}')
        center/cover no-repeat;
}

.hero-banner>*{
    position:relative;
    z-index:2;
}

.hover-orange{
    transition:.25s;
}

.hover-orange:hover{
    color:#f97316!important;
}

</style>
@endpush