@extends('layouts.main')

@section('content')
    <div class="container-1600">

        <h2 class="mb-4">Оформлення замовлення</h2>

        @if(empty($cart))
            <p>Кошик порожній</p>
        @else

            <div class="mb-3">
                <strong>Товарів:</strong> {{ $cartCount }}
            </div>

            <div class="mb-3">
                <strong>Сума:</strong> {{ number_format($cartTotal, 0, '.', ' ') }} ₴
            </div>

            <form method="POST" action="{{ route('checkout.store') }}">
                @csrf

                <button class="checkout-btn">
                    Підтвердити замовлення
                    <i class="bi bi-arrow-right ms-2"></i>
                </button>

            </form>

        @endif

    </div>
@endsection
