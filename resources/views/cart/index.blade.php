@extends('layouts.main')

@section('content')
  <div class="container-1600">

    {{-- Заголовок --}}
    <h2 class="mb-3">Кошик</h2>

    {{-- Кнопка під заголовком (зліва) --}}
    <div class="mb-4">
        <a href="{{ route('shop.index') }}" class="btn btn-success d-inline-flex align-items-center gap-2">
            <i class="bi bi-plus-lg"></i> Додати товар
        </a>
    </div>

    @php $total = 0; @endphp

    @if(empty($cart))
        <div class="alert alert-info">
            Кошик порожній. Перейдіть до каталогу, щоб зробити замовлення.
        </div>
    @else
        {{-- ТАБЛИЦЯ ТОВАРІВ --}}
        <div class="table-responsive">
            <table class="table align-middle">
                <thead>
                    <tr>
                        <th>Товар</th>
                        <th class="text-center">Назва</th>
                        <th class="text-center">Кількість</th>
                        <th>Ціна</th>
                        <th>Сума</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                @foreach($cart as $id => $item)
                    @php
                        $qty = $item['qty'] ?? 1;
                        $price = $item['price'] ?? 0;
                        $sum = $qty * $price;
                        $total += $sum;
                    @endphp
                    <tr data-id="{{ $id }}">
                        <td style="width:80px">
                            <img src="{{ asset($item['image']) }}" style="width:60px;height:60px;object-fit:contain;">
                        </td>
                        <td><strong>{{ $item['title'] }}</strong></td>
                        <td style="width:160px">
                            <div class="quantity-box">
                                <button type="button" class="qty-btn minus">−</button>
                                <input type="number" name="qty" autocomplete="off" class="qty-input qty text-center" value="{{ $qty }}" min="1">
                                <button type="button" class="qty-btn plus">+</button>
                            </div>
                        </td>
                        <td class="price-cell">{{ number_format($price, 0, '.', ' ') }} грн.</td>
                        <td class="item-sum">{{ number_format($sum, 0, '.', ' ') }} грн.</td>
                        <td>
                            <button class="btn btn-link text-danger delete-btn" data-id="{{ $id }}">
                                <i class="bi bi-trash"></i>
                            </button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        {{-- ПІДСУМОК ТА ОФОРМЛЕННЯ --}}
        <div class="d-flex justify-content-between align-items-start mt-4">
            <div class="d-flex gap-2">
                <button id="clearCartBtn" class="btn btn-warning">Очистити кошик</button>
            </div>
            <div class="text-end text-md-end text-center"> 
    <h4>Загальна сума: <span id="cartTotal">{{ number_format($total, 0, '.', ' ') }}</span> грн.</h4>
    <a href="{{ route('checkout.index') }}" class="checkout-btn mt-3 d-inline-flex justify-content-center align-items-center gap-2 w-100 w-md-auto">
        Оформити замовлення <i class="bi bi-arrow-right"></i>
    </a>
</div>
        </div>
    @endif
</div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            if (window.refreshCart) {
                window.refreshCart();
            }
        });
    </script>
    <style>
        .quantity-box {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 5px;
        }

        @media (max-width: 767px) {
            .quantity-box {
                flex-direction: column;
                gap: 2px;
            }

            .qty-input {
                width: 50px !important;
                order: 2;
            }

            .qty-btn.minus {
                order: 3;
            }

            .qty-btn.plus {
                order: 1;
            }
        }
    /* Базові стилі для quantity-box */
.quantity-box {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 5px;
}

/* На мобільних: перемикаємо на стовпчик */
@media (max-width: 767px) {
    .quantity-box {
        flex-direction: column; /* Кнопки стають зверху та знизу */
        gap: 2px;
    }

    .qty-input {
        width: 50px !important; /* Робимо поле трохи вужчим для мобілок */
        order: 2; /* Встановлюємо порядок елементів */
    }

    .qty-btn.minus {
        order: 3; /* Мінус знизу */
    }

    .qty-btn.plus {
        order: 1; /* Плюс зверху */
    }
}
</style>
@endsection

