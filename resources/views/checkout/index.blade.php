@extends('layouts.main')

@section('content')

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="container-1600">

        <h2 class="mb-4">{{ __('checkout.title') }}</h2>

        @if(empty($cart))
            <p>{{ __('checkout.empty_cart') }}</p>
        @else

            <div class="mb-3">
                <strong>{{ __('checkout.products') }}:</strong> {{ $cartCount }}
            </div>

            <div class="mb-3">
                <strong>{{ __('checkout.total') }}:</strong>
                {{ number_format($cartTotal, 0, '.', ' ') }} ₴
            </div>

            <form method="POST" action="{{ route('checkout.store') }}"
                  onsubmit="this.querySelector('button').disabled = true;">
                @csrf

                <button type="submit" class="checkout-btn">
                    {{ __('checkout.confirm_order') }}
                    <i class="bi bi-arrow-right ms-2"></i>
                </button>

            </form>

        @endif

    </div>
@endsection
