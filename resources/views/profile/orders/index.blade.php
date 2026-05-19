@extends('layouts.main')

@section('content')
    <div class="container-1600">

        <h2 class="mb-4">Заказы (история покупок)</h2>

        @if($orders->isEmpty())
            <p>У вас ещё нет заказов</p>
        @else

            @foreach($orders as $order)
                <div class="border p-3 mb-3">

                    <div class="d-flex justify-content-between">
                        <div>
                            <strong>Заказ #{{ $order->id }}</strong>
                        </div>

                        <div>
                            {{ number_format($order->total_price, 0, '.', ' ') }} грн.
                        </div>
                    </div>

                    <div class="mt-2">
                        Статус:
                        <span>{{ $order->status }}</span>
                    </div>

                    <a href="{{ route('profile.orders.show', $order->id) }}">
                        Смотреть детали
                    </a>

                </div>
            @endforeach

        @endif

    </div>
@endsection
