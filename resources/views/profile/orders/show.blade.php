@extends('layouts.main')

@section('content')
    <div class="container-1600">

        <h2 class="mb-4">Заказ #{{ $order->id }}</h2>

        {{-- INFO BLOCK (как в корзине итог) --}}
        <div class="d-flex justify-content-between align-items-start mb-4">

            <!-- LEFT -->
            <div>
                <div>
                    <strong>Статус:</strong>
                    <span class="badge bg-secondary">
                    {{ $order->status }}
                </span>
                </div>

                <div class="mt-2">
                    <strong>Дата:</strong>
                    {{ $order->created_at->format('d.m.Y H:i') }}
                </div>
            </div>

            <!-- RIGHT -->
            <div class="text-end">
                <h4>
                    Сума:
                    <span>
                    {{ number_format($order->total_price, 0, '.', ' ') }}
                </span>
                    грн.
                </h4>
            </div>

        </div>

        {{-- TABLE (как корзина) --}}
        <div class="table-responsive">
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
                            <strong>{{ $item->product_name }}</strong>
                        </td>

                        <!-- QTY -->
                        <td class="text-center">
                            {{ $item->quantity }}
                        </td>

                        <!-- PRICE -->
                        <td>
                            {{ number_format($item->price, 0, '.', ' ') }} грн.
                        </td>

                        <!-- SUM -->
                        <td>
                            <strong>
                                {{ number_format($item->total, 0, '.', ' ') }} грн.
                            </strong>
                        </td>

                    </tr>
                @endforeach

                </tbody>

            </table>
        </div>

        {{-- BACK BUTTON --}}
        <div class="mt-4">
            <a href="{{ route('profile.orders') }}"
               class="btn btn-secondary">
                ← Назад до замовлень
            </a>
        </div>

    </div>
@endsection
