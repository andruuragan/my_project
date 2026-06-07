@extends('layouts.main')

@section('content')
    @php
        // Мапінг англійських статусів на українські тексти та класи Bootstrap
        $statusStyles = [
            'pending'    => ['badge' => 'bg-warning text-dark',  'text' => 'Очікує'],
            'paid'       => ['badge' => 'bg-success text-white', 'text' => 'Сплачено'],
            'processing' => ['badge' => 'bg-primary text-white', 'text' => 'Обробка'],
            'shipped'    => ['badge' => 'bg-info text-dark',     'text' => 'Відправлено'],
            'completed'  => ['badge' => 'bg-secondary text-white','text' => 'Завершено'],
            'cancelled'  => ['badge' => 'bg-danger text-white',   'text' => 'Скасовано'],
        ];

        // Отримуємо стиль для поточного статусу замовлення (якщо статус новий або невідомий — буде сірий дефолт)
        $currentStyle = $statusStyles[$order->status] ?? ['badge' => 'bg-secondary text-white', 'text' => $order->status];
    @endphp

    <div class="container-1600 py-4">

        <h2 class="mb-4 fw-bold">Заказ №{{ $order->id }}</h2>

        {{-- INFO BLOCK (как в корзине итог) --}}
        <div class="d-flex justify-content-between align-items-start mb-4 bg-light p-3 rounded-3 border">

            <!-- LEFT -->
            <div>
                <div>
                    <strong>Статус:</strong>
                    <!-- Тепер бейдж кольоровий і виводить перекладений текст -->
                    <span class="badge {{ $currentStyle['badge'] }} px-3 py-2 rounded-pill fw-medium ms-1">
                        {{ $currentStyle['text'] }}
                    </span>
                </div>

                <div class="mt-3">
                    <strong>Дата:</strong>
                    <span class="text-muted">{{ $order->created_at->format('d.m.Y / H:i') }}</span>
                </div>
            </div>

            <!-- RIGHT -->
            <div class="text-end">
                <h4 class="mb-0 fw-bold text-dark">
                    Разом:
                    <span class="text-success fs-3">
                        {{ number_format($order->total_price, 0, '.', ' ') }}
                    </span>
                    <small class="fs-5 fw-normal text-muted">грн.</small>
                </h4>
            </div>

        </div>

        {{-- TABLE (как корзина) --}}
        <div class="table-responsive mb-4">
            <table class="table align-middle">

                <thead>
                <tr>
                    <th>Товар</th>
                    <th>Назва</th>
                    <th class="text-center">Кількість</th>
                    <th>Ціна</th>
                    <th>Сума</th>
                </tr>
                </thead>

                <tbody>

                @foreach($order->items as $item)
                    <tr>

                        <!-- IMAGE -->
                        <td style="width:80px">
                            @if($item->product_image)
                                <img src="{{ asset('storage/' . $item->product_image) }}"
                                     style="width:60px;height:60px;object-fit:contain;">
                            @endif
                        </td>

                        <!-- NAME -->
                        <td>
                            <strong class="text-dark">{{ $item->product_name }}</strong>
                        </td>

                        <!-- QTY -->
                        <td class="text-center fw-bold text-secondary">
                            {{ $item->quantity }}
                        </td>

                        <!-- PRICE -->
                        <td>
                            {{ number_format($item->price, 0, '.', ' ') }} <small class="text-muted">грн.</small>
                        </td>

                        <!-- SUM -->
                        <td>
                            <strong class="text-dark">
                                {{ number_format($item->total, 0, '.', ' ') }} <small class="fw-normal text-muted">грн.</small>
                            </strong>
                        </td>

                    </tr>
                @endforeach

                </tbody>

            </table>
        </div>

        {{-- NAVIGATION BUTTONS --}}
        <div class="d-flex gap-2">
            <a href="javascript:history.back()"
               class="btn btn-secondary px-4 rounded-pill">
                ← Назад
            </a>
            <a href="{{ route('orders.export.excel', $order) }}"
               class="btn btn-success px-4 rounded-pill d-inline-flex align-items-center gap-2">
                <i class="bi bi-file-earmark-excel"></i>
                Зберегти в Excel
            </a>
        </div>

    </div>
@endsection
