@extends('layouts.main')

@section('content')
    <div class="container-1600 py-4">
        <a href="{{ route('dashboard') }}"  class="btn btn-secondary mb-3">
            ← Назад
        </a>

        <!-- Заголовок з іконкою та лічильником -->
        <div class="d-flex align-items-center justify-content-between mb-4 pb-2 border-bottom">
            <h2 class="h3 mb-0 text-dark d-flex align-items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="text-secondary" viewBox="0 0 16 16">
                    <path d="M10.854 8.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L7.5 10.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
                    <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z"/>
                </svg>
                Історія замовлень
            </h2>
            @if(!$orders->isEmpty())

                <span class="badge bg-secondary rounded-pill fs-6">кількість {{ $orders->count() }}</span>
            @endif
        </div>

        @if($orders->isEmpty())
            <!-- Гарна заглушка, якщо замовлень немає -->
            <div class="text-center py-5 border rounded bg-light my-4">
                <div class="mb-3 text-muted">
                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" class="bi bi-bag-x" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M6.146 8.146a.5.5 0 0 1 .708 0L8 9.293l1.146-1.147a.5.5 0 1 1 .708.708L8.707 10l1.147 1.146a.5.5 0 0 1-.708.708L8 10.707l-1.146 1.147a.5.5 0 0 1-.708-.708L7.293 10 6.146 8.854a.5.5 0 0 1 0-.708z"/>
                        <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z"/>
                    </svg>
                </div>
                <h4 class="text-secondary">У вас ще немає замовлень</h4>
                <p class="text-muted">Перейдіть до каталогу, щоб зробити ваше перше замовлення.</p>
                <a href="/" class="btn btn-primary btn-sm mt-2">Перейти до магазину</a>
            </div>
        @else

            <!-- Список замовлень -->
            <div class="row row-cols-1 g-3">
                @foreach($orders as $order)
                    @php
                        // Мапінг статусів на класи Bootstrap для обводки та бейджів
                        $statusStyles = [
                            'pending'    => ['border' => 'border-warning',   'badge' => 'bg-warning text-dark',  'text' => 'Очікує'],
                            'paid'       => ['border' => 'border-success',   'badge' => 'bg-success text-white', 'text' => 'Сплачено'],
                            'processing' => ['border' => 'border-primary',   'badge' => 'bg-primary text-white', 'text' => 'Обробка'],
                            'shipped'    => ['border' => 'border-info',      'badge' => 'bg-info text-dark',     'text' => 'Відправлено'],
                            'completed'  => ['border' => 'border-secondary', 'badge' => 'bg-secondary text-white','text' => 'Завершено'],
                            'cancelled'  => ['border' => 'border-danger',    'badge' => 'bg-danger text-white',   'text' => 'Скасовано'],
                        ];

                        // Якщо статус невідомий, даємо базовий сірий колір
                        $currentStyle = $statusStyles[$order->status] ?? ['border' => 'border-light', 'badge' => 'bg-dark text-white', 'text' => $order->status];
                    @endphp

                    <div class="col">
                        <!-- Замість border-0 додаємо border-2 і динамічний клас обводки -->
                        <div class="card h-100 shadow-sm border-2 {{ $currentStyle['border'] }} bg-white rounded-3 overflow-hidden">

                            <div class="card-body p-4">
                                <div class="row align-items-center g-3">

                                    <!-- Номер замовлення та дата -->
                                    <div class="col-sm-4">
                                        <div class="text-muted small text-uppercase fw-bold">Номер замовлення</div>
                                        <h5 class="mb-0 text-dark fw-bold">№ {{ $order->id }}</h5>
                                        @if(isset($order->created_at))
                                            <span class="text-muted small">{{ $order->created_at->format('d.m.Y H:i') }}</span>
                                        @endif
                                    </div>

                                    <!-- Статус (тепер кольоровий відповідно до бази) -->
                                    <div class="col-sm-3">
                                        <div class="text-muted small text-uppercase fw-bold mb-1">Статус</div>
                                        <span class="badge {{ $currentStyle['badge'] }} px-3 py-2 rounded-pill fw-medium">
                                            {{ $currentStyle['text'] }}
                                        </span>
                                    </div>

                                    <!-- Сума -->
                                    <div class="col-sm-3">
                                        <div class="text-muted small text-uppercase fw-bold">Сума до сплати</div>
                                        <span class="fs-5 fw-bold text-dark">
                                            {{ number_format($order->total_price, 0, '.', ' ') }} <small class="fs-6 fw-normal text-muted">грн</small>
                                        </span>
                                    </div>

                                    <!-- Кнопка дії -->
                                    <div class="col-sm-2 text-sm-end">
                                        <a href="{{ route('profile.orders.show', $order->id) }}" class="btn btn-outline-primary btn-sm px-3 rounded-pill w-100 w-sm-auto">
                                            Деталі
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right short ms-1" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 1 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                                            </svg>
                                        </a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        @endif
        <a href="{{ route('dashboard') }}"  class="btn btn-secondary mt-4">
            ← Назад
        </a>


    </div>
@endsection
