@extends('layouts.main')

@section('content')
    <div class="container-1600">

        <h2 class="mb-4">Замовлення (історія замовлень)</h2>

        @if($orders->isEmpty())
            <p>У вас ще немає замовлень</p>
        @else

            @foreach($orders as $order)
                <div class="border p-3 mb-3">

                    <div class="d-flex justify-content-between">
                        <div>
                            <strong>Замовлення №{{ $order->id }}</strong>
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
                        Дивитись деталі
                    </a>

                </div>
            @endforeach

        @endif

    </div>
@endsection
