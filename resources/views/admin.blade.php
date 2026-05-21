@extends('layouts.main')

@section('content')
    <div class="container-1600 py-4">

        <!-- Заголовок адмінки -->
        <div class="mb-4 border-bottom pb-3">
            <h2 class="fw-bold text-dark m-0">Панель адміністратора</h2>
            <small class="text-muted">Керування магазином димоходів</small>
        </div>

        <!-- Сітка з картками керування -->
        <div class="row g-4">

            <!-- Картка: Замовлення -->
            <div class="col-12 col-md-4">
                <div class="card h-100 shadow-sm border-0 bg-white p-4 rounded-3 text-center">
                    <h4 class="fw-bold text-dark mb-2">Замовлення</h4>
                    <p class="text-muted small mb-4">Перегляд нових замовлений, зміна статусів, генерація звітів в Excel.</p>
                    <a href="{{ route('admin.orders.index') }}" class="btn btn-dark w-100 py-2 rounded-3 fw-semibold">
                        Перейти до замовлень
                    </a>
                </div>
            </div>

            <!-- Картка: Каталог товарів -->
            <div class="col-12 col-md-4">
                <div class="card h-100 shadow-sm border-0 bg-white p-4 rounded-3 text-center">
                    <h4 class="fw-bold text-dark mb-2">Каталог товарів</h4>
                    <p class="text-muted small mb-4">Додавання нових елементів димохода, редагування цін, діаметрів та наявності.</p>
                    <a href="{{ route('catalog.index') }}" class="btn btn-warning w-100 py-2 rounded-3 fw-semibold text-dark">
                        Керувати каталогом
                    </a>
                </div>
            </div>

            <!-- Картка: Тексти та Описи -->
            <div class="col-12 col-md-4">
                <div class="card h-100 shadow-sm border-0 bg-white p-4 rounded-3 text-center">
                    <h4 class="fw-bold text-dark mb-2">Описи товарів</h4>
                    <p class="text-muted small mb-4">Редагування SEO-текстів, переваг, інструкцій із застосування в табах.</p>
                    <a href="{{ route('descriptions.index') }}" class="btn btn-primary w-100 py-2 rounded-3 fw-semibold">
                        Редагувати описи
                    </a>
                </div>
            </div>

        </div>

    </div>
@endsection
