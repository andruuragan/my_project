@extends('layouts.main')

@section('content')
    <div class="container-1600 my-5">

        {{-- Блок: Популярні товари --}}
        @if($popularCatalogs->isNotEmpty())
            <div class="mb-5">
                <h2 class="text-center mb-4" style="font-weight: 600; color: #2d3748; letter-spacing: -0.5px;">
                    Популярні елементи димохода
                </h2>
                <p class="text-center text-muted mb-5">Товари, які найчастіше обирають наші клієнти</p>

                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
                    @foreach($popularCatalogs as $item)
                        <div class="col">
                            {{-- Сама відкритка --}}
                            <div class="card h-100 product-card-postcard border-0">

                                <div class="postcard-img-wrapper">
                                    {{-- Виводимо картинку через оригінальне поле з бази даних --}}
                                    @if($item->image)
                                        <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->name }}" class="postcard-img">
                                    @else
                                        {{-- Заглушка, якщо у товару немає фото --}}
                                        <div class="postcard-placeholder">
                                            <i class="bi bi-image text-muted" style="font-size: 2.5rem;"></i>
                                        </div>
                                    @endif

                                    {{-- Бейдж з лайками поверх фото --}}
                                    <div class="postcard-badge">
                                        <i class="bi bi-heart-fill text-danger me-1"></i>
                                        <span>{{ $item->liked_by_users_count }}</span>
                                    </div>
                                </div>

                                {{-- Текстова частина відкритки --}}
                                <div class="card-body p-4 d-flex flex-column justify-content-between text-center">
                                    <div>
                                        <h5 class="postcard-title mb-2">
                                            <a href="{{ route('catalog.public.show', $item->id) }}" class="stretched-link text-decoration-none">
                                                {{ $item->name }}
                                            </a>
                                        </h5>
                                        <p class="postcard-category text-uppercase small text-muted mb-3">Димоходи</p>
                                    </div>

                                    {{-- Ціна внизу --}}
                                    <div class="postcard-price mt-2">
                                        {{ number_format($item->price, 0, '.', ' ') }} <small>грн</small>
                                    </div>
                                </div>

                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

    </div>

    {{-- Стилі для ефекту відкриток --}}
    <style>
        .product-card-postcard {
            background: #ffffff;
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s cubic-bezier(0.16, 1, 0.3, 1), box-shadow 0.3s ease;
            overflow: hidden;
            position: relative;
        }

        /* Ефект піднімання відкритки при наведенні */
        .product-card-postcard:hover {
            transform: translateY(-6px);
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.1);
        }

        .postcard-img-wrapper {
            position: relative;
            width: 100%;
            padding-top: 100%; /* Робить область картинки ідеально квадратною */
            background-color: #f8f9fa;
            overflow: hidden;
        }

        .postcard-img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: contain; /* Картинка димохода красиво впишеться без обрізання */
            padding: 15px;
            transition: transform 0.5s ease;
        }

        .product-card-postcard:hover .postcard-img {
            transform: scale(1.04); /* Легкий зум картинки при наведенні */
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

        /* Бейдж з лайками */
        .postcard-badge {
            position: absolute;
            top: 15px;
            right: 15px;
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(4px);
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
            color: #2d3748;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            z-index: 2;
        }

        /* Назва товару */
        .postcard-title a {
            color: #2d3748;
            font-weight: 500;
            font-size: 1.05rem;
            transition: color 0.2s ease;
        }

        /* Клік по всій відкритці веде на сторінку товару */
        .postcard-title a::after {
            border-radius: 16px;
        }

        .postcard-category {
            font-size: 0.75rem;
            letter-spacing: 1px;
        }

        /* Ціна */
        .postcard-price {
            font-size: 1.2rem;
            font-weight: 600;
            color: #1a202c;
        }
        .postcard-price small {
            font-size: 0.85rem;
            font-weight: 400;
            color: #718096;
        }
    </style>
@endsection
