@extends('layouts.main')
@section('title', 'Корисна інформація про димоходи | DymSystems')

@section('description',
'Корисна інформація про димоходи: калькулятор димоходу, підбір діаметра, правила монтажу та рекомендації щодо вибору димохідних систем.')

@section('content')
    <div class="container-1600 my-5">

        {{-- Блок: Корисна інформація --}}
        <section class="useful-section">
            <div class="text-center mb-5">
                <h1 class="fw-semibold useful-title">Корисна інформація</h1>
                <p class="text-muted useful-subtitle">Поради, калькулятори та інструкції щодо вибору димоходу</p>
            </div>

            <div class="row g-4">
                {{-- КАЛЬКУЛЯТОР --}}
                <div class="col-lg-4 col-md-6">
                    <div class="useful-card h-100 useful-fade">
                       <a href="{{ route('chimney.calculator') }}" class="d-block">
    <div class="useful-image-wrapper">
        <img src="{{ asset('images/chimney/calculator.webp') }}"
     width="1280"
     height="714"
     class="useful-image"
     alt="Калькулятор димоходу"
     loading="lazy"
     decoding="async">
    </div>
</a>
                        <div class="p-4">
                            <div class="useful-badge mb-3">Онлайн інструмент</div>
                            <h3 class="useful-card-title">Калькулятор димоходу</h3>
                            <p class="text-muted mb-4">Розрахунок діаметра, висоти та тяги димоходу.</p>
                            <a href="{{ route('chimney.calculator') }}" class="btn useful-btn">Відкрити</a>
                        </div>
                    </div>
                </div>

                {{-- ДІАМЕТР --}}
                <div class="col-lg-4 col-md-6">
                   <div class="useful-card h-100 useful-fade">
                        <a href="{{ route('chimney.diameter') }}" class="d-block overflow-hidden rounded-4">
    <div class="useful-image-wrapper">
        <img src="{{ asset('images/chimney/diameter.webp') }}"
     width="1280"
     height="633"
     alt="Як обрати діаметр"
     class="useful-image">
    </div>
</a>
                        <div class="p-4">
                            <div class="useful-badge mb-3">Інструкція</div>
                            <h3 class="useful-card-title">Як обрати діаметр</h3>
                            <p class="text-muted mb-4">Таблиці та рекомендації для котлів і камінів.</p>
                            <a href="{{ route('chimney.diameter') }}" class="btn useful-btn">Читати</a>
                        </div>
                    </div>
                </div>

                {{-- МОНТАЖ --}}
                <div class="col-lg-4 col-md-6">
                    <div class="useful-card h-100 useful-fade">
                        <a href="{{ route('chimney.installation-rules') }}" class="d-block overflow-hidden rounded-4">
    <div class="useful-image-wrapper">
        <img src="{{ asset('images/chimney/montage.webp') }}"
     width="1280"
     height="633"
     class="useful-image"
     alt="Монтаж димоходу"
     loading="lazy"
     decoding="async">
    </div>
</a>
                        <div class="p-4">
                            <div class="useful-badge mb-3">Монтаж</div>
                            <h3 class="useful-card-title">Монтаж димоходу</h3>
                            <p class="text-muted mb-4">Основні правила безпечного встановлення системи.</p>
                           <a href="{{ route('chimney.installation-rules') }}" class="btn useful-btn">Детальніше</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- Блок: Популярні товари --}}
        @if($popularCatalogs->isNotEmpty())
            <div class="mt-5 pt-4">
                <h2 class="text-center mb-4" style="font-weight: 600; color: #2d3748; letter-spacing: -0.5px;">
                    Популярні елементи димохода
                </h2>
                <p class="text-center text-muted mb-5">Товари, які найчастіше обирають наші клієнти</p>

                {{-- Максимально щільна сітка: від 3 карток на мобілках до 7 карток на великих моніторах --}}
                <div class="row row-cols-3 row-cols-sm-4 row-cols-md-5 row-cols-lg-6 row-cols-xl-7 g-2">
                    @foreach($popularCatalogs as $item)
                        <div class="col">
                            {{-- Сама відкритка --}}
                            <div class="card h-100 product-card-postcard border-0">

                                <div class="postcard-img-wrapper">
                                    {{-- Виводимо картинку --}}
                                    @if($item->image)
                                        <img src="{{ asset($item->image) }}" alt="{{ $item->name }}" class="postcard-img">
                                    @else
                                        {{-- Заглушка, якщо у товару немає фото --}}
                                        <div class="postcard-placeholder">
                                            <i class="bi bi-image text-muted" style="font-size: 1.5rem;"></i>
                                        </div>
                                    @endif

                                    {{-- Компактна та завжди видима іконка лайка --}}
                                    <div class="postcard-badge-static">
                                        <i class="bi bi-heart-fill text-danger"></i>
                                        <span>{{ $item->liked_by_users_count }}</span>
                                    </div>
                                </div>

                                {{-- Міні-контент (падінг зменшено до p-2 для економії місця) --}}
                                <div class="card-body p-2 d-flex flex-column justify-content-between text-center">
                                    <div>
                                        <h5 class="postcard-title mb-1">
                                            <a href="{{ route('catalog.public.show', $item->id) }}" class="stretched-link text-decoration-none">
                                                {{ $item->name }}
                                            </a>
                                        </h5>
                                        <p class="postcard-category text-uppercase text-muted mb-1">Димоходи</p>
                                    </div>

                                    {{-- Міні-ціна внизу --}}
                                    <div class="postcard-price mt-auto">
                                        {{ number_format($item->price, 0, '.', ' ') }} <small style="font-size: 0.7rem;">грн</small>
                                    </div>
                                </div>

                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </div>

    {{-- Оновлені ультра-компактні стилі --}}
    <style>
        .product-card-postcard {
            background: #ffffff;
            border-radius: 8px; /* Менший радіус для маленьких карток */
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.04);
            transition: transform 0.25s ease, box-shadow 0.25s ease;
            overflow: hidden;
            position: relative;
        }

        .product-card-postcard:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
        }

        .postcard-img-wrapper {
            position: relative;
            width: 100%;
            padding-top: 85%; /* Зменшено з 100% до 85% — тепер картинка акуратний прямокутник */
            background-color: #f8f9fa;
            overflow: hidden;
        }

        .postcard-img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: contain;
            padding: 8px; /* Мінімальний відступ для картинки */
            transition: transform 0.4s ease;
        }

        .product-card-postcard:hover .postcard-img {
            transform: scale(1.03);
        }

        .postcard-placeholder {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* Ультра-компактний бейдж, який не перекриває крихітну картку */
        .postcard-badge-static {
            position: absolute;
            top: 6px;
            right: 6px;
            background: #ffffff;
            padding: 1px 6px;
            border-radius: 8px;
            font-size: 0.7rem;
            font-weight: 700;
            color: #2d3748;
            box-shadow: 0 1px 5px rgba(0,0,0,0.06);
            z-index: 3;
            display: flex;
            align-items: center;
            gap: 3px;
            border: 1px solid #edf2f7;
        }

        /* Адаптація назви товару під мікро-розмір */
        .postcard-title a {
            color: #2d3748;
            font-weight: 600;
            font-size: 0.82rem; /* Оптимальний дрібний шрифт */
            line-height: 1.25;
            display: -webkit-box;
            -webkit-line-clamp: 2; /* Строго 2 рядки */
            -webkit-box-orient: vertical;
            overflow: hidden;
            transition: color 0.2s ease;
        }

        .postcard-title a::after {
            border-radius: 8px;
        }

        .postcard-category {
            font-size: 0.62rem;
            letter-spacing: 0.3px;
        }

        /* Компактна ціна */
        .postcard-price {
            font-size: 0.95rem;
            font-weight: 700;
            color: #1a202c;
        }
        
        .postcard-price small {
            font-weight: 500;
            color: #718096;
        }

        /* ========================================
           USEFUL SECTION (Залишено без змін)
        ======================================== */
        .useful-title{
            font-size: 2rem;
            color: #1f2937;
            letter-spacing: -0.5px;
        }

        .useful-subtitle{
            font-size: 1rem;
        }

        .useful-card{
            background: #ffffff;
            border-radius: 22px;
            overflow: hidden;
            border: 1px solid rgba(0,0,0,.05);
            box-shadow: 0 8px 24px rgba(0,0,0,.05);
            transition: transform .35s ease, box-shadow .35s ease;
        }

        .useful-card:hover{
            transform: translateY(-8px);
            box-shadow: 0 18px 40px rgba(0,0,0,.10);
        }

      .useful-image-wrapper {
    width: 100%;
    overflow: hidden;
    border-top-left-radius: 16px;  /* Округлення кутів під стать вашій картці */
    border-top-right-radius: 16px;
    height: 200px;  
    transition: transform 0.3s ease;               /* Фіксована висота, щоб усі картки в ряду були однаковими */
}
a:hover .useful-image-wrapper {
    transform: scale(1.02); /* Легке збільшення при наведенні */
    box-shadow: 0 10px 20px rgba(0,0,0,0.1);
}

.useful-image {
    width: 100%;
    height: 100%;
    object-fit: cover;             /* Масштабує картинку без спотворення (як background-size: cover) */
    object-position: center;       /* Центрує фокус зображення */
    transition: transform 0.3s ease;
}

/* Ефект при наведенні для крутого UI */
.useful-card:hover .useful-image {
    transform: scale(1.05);
}

        .useful-badge{
            display: inline-flex;
            align-items: center;
            background: #fff7ed;
            color: #ea580c;
            font-size: .78rem;
            font-weight: 600;
            padding: 6px 12px;
            border-radius: 30px;
        }

        .useful-card-title{
            font-size: 1.3rem;
            font-weight: 600;
            color: #1f2937;
            margin-bottom: 14px;
        }

        .useful-btn{
            background: #ea580c;
            color: #fff;
            border-radius: 12px;
            padding: 12px 22px;
            font-weight: 600;
            transition: .25s ease;
        }

        .useful-btn:hover{
            background: #c2410c;
            color: #fff;
            transform: translateY(-1px);
        }
    </style>
@endsection
@push('schema-useful')
<script type="application/ld+json">
{!! json_encode([
  '@context' => 'https://schema.org',
  '@type' => 'CollectionPage',

  '@id' => url('/useful-info#page'),
  'name' => 'Корисна інформація про димоходи DymSystems',
  'url' => url('/useful-info'),

  'mainEntity' => [
    '@type' => 'ItemList',
    '@id' => url('/useful-info#itemlist'),

    'itemListElement' => [
      [
        '@type' => 'ListItem',
        'position' => 1,
        'name' => 'Калькулятор димоходу',
        'item' => url('/useful-info/chimney-calculator')
      ],
      [
        '@type' => 'ListItem',
        'position' => 2,
        'name' => 'Вибір діаметра димоходу',
        'item' => url('/useful-info/how-to-choose-chimney-diameter')
      ],
      [
        '@type' => 'ListItem',
        'position' => 3,
        'name' => 'Монтаж димоходу: правила та вимоги',
        'item' => url('/useful-info/montazh-dymohodu-pravyla')
      ],
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
    ]
  ]
], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) !!}
</script>
@endpush