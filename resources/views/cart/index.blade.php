@extends('layouts.main')

@section('content')
    <div class="container-1600">

        <h2 class="mb-4">Кошик</h2>

        @php
            $total = 0;
        @endphp

        @if(empty($cart))
            <p>Кошик порожній</p>
        @else

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

                            <!-- IMAGE -->
                            <td style="width:80px">
                                <img src="{{ asset($item['image']) }}"
                                     style="width:60px;height:60px;object-fit:contain;">
                            </td>

                            <!-- NAME -->
                            <td>
                                <strong>{{ $item['title'] }}</strong>
                            </td>

                            <!-- QTY -->
                            <td style="width:160px">
                                <div class="quantity-box">
                                    <button type="button" class="qty-btn minus">−</button>

                                    <input type="number"
       name="qty"
       autocomplete="off"
       class="qty-input qty text-center"
       value="{{ $qty }}"
       min="1">

                                    <button type="button" class="qty-btn plus">+</button>
                                </div>
                            </td>

                            <!-- PRICE -->
                            <td class="price-cell">
                                {{ number_format($price, 0, '.', ' ') }} грн.
                            </td>

                            <!-- SUM -->
                            <td class="item-sum">
                                {{ number_format($sum, 0, '.', ' ') }} грн.
                            </td>

                            <!-- DELETE -->
                            <td>
                                <button class="btn btn-link text-danger delete-btn"
                                        data-id="{{ $id }}">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </td>

                        </tr>



                    @endforeach

                    </tbody>

                </table>
            </div>

            <!-- TOTAL -->
            <div class="d-flex justify-content-between align-items-start mt-4">

                <!-- LEFT -->
                <div class="d-flex gap-2">

                    <button id="clearCartBtn" class="btn btn-warning">
                        Очистити кошик
                    </button>

                    <a href="{{ route('shop.index') }}" class="btn btn-success">
                        <i class="bi bi-plus-lg"></i>
                        Додати товар
                    </a>

                </div>

                <!-- RIGHT -->
                <div class="text-end">

                    <h4>
                        Загальна сума:
                        <span id="cartTotal">
                {{ number_format($total, 0, '.', ' ') }}
            </span>
                        грн.
                    </h4>

                    <a href="{{ route('checkout.index') }}"
                       class="checkout-btn mt-3 d-inline-flex align-items-center gap-2">
                        Оформити замовлення
                        <i class="bi bi-arrow-right"></i>
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

