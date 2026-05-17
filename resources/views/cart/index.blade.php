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
                                <img src="{{ Storage::url($item['image']) }}"
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
                                           class="qty-input qty text-center"
                                           value="{{ $qty }}"
                                           min="1">

                                    <button type="button" class="qty-btn plus">+</button>
                                </div>
                            </td>

                            <!-- PRICE -->
                            <td class="price-cell">
                                {{ number_format($price, 0, '.', ' ') }} ₴
                            </td>

                            <!-- SUM -->
                            <td class="item-sum">
                                {{ number_format($sum, 0, '.', ' ') }} ₴
                            </td>

                            <!-- DELETE -->
                            <td>
                                <button class="btn btn-link text-danger"
                                        data-bs-toggle="modal"
                                        data-bs-target="#deleteModal{{ $id }}">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </td>

                        </tr>

                        <!-- MODAL (ВНУТРИ FOREACH!) -->
                        <div class="modal fade" id="deleteModal{{ $id }}" tabindex="-1">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">

                                    <div class="modal-header">
                                        <h5 class="modal-title">Підтвердження</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>

                                    <div class="modal-body">
                                        Видалити товар <strong>{{ $item['title'] }}</strong>?
                                    </div>

                                    <div class="modal-footer">

                                        <button class="btn btn-secondary" data-bs-dismiss="modal">
                                            Скасувати
                                        </button>

                                        <form action="{{ route('cart.remove', $id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-danger">
                                                Видалити
                                            </button>
                                        </form>

                                    </div>

                                </div>
                            </div>
                        </div>

                    @endforeach

                    </tbody>

                </table>
            </div>

            <!-- TOTAL -->
            <div class="d-flex justify-content-between align-items-start mt-4">

                <!-- LEFT -->
                <form action="{{ route('cart.clear') }}" method="POST">
                    @csrf

                    <button type="submit" class="btn btn-warning">
                        Очистити кошик
                    </button>
                </form>

                <!-- RIGHT -->
                <div class="text-end">

                    <h4>
                        Загальна сума:
                        <span id="cartTotal">
                {{ number_format($total, 0, '.', ' ') }}
            </span>
                        ₴
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
@endsection
<script>
    document.addEventListener('DOMContentLoaded', function () {

        function parsePrice(text) {
            return parseFloat(text.replace(/\s/g, '').replace('₴', '')) || 0;
        }

        function recalcRow(row) {
            let qty = parseInt(row.querySelector('.qty').value) || 1;
            let price = parsePrice(row.querySelector('.price-cell').innerText);

            let sum = qty * price;

            row.querySelector('.item-sum').innerText =
                new Intl.NumberFormat('uk-UA').format(sum) + ' ₴';
        }

        function recalcTotal() {
            let total = 0;

            document.querySelectorAll('tr[data-id]').forEach(row => {
                let qty = parseInt(row.querySelector('.qty').value) || 1;
                let price = parsePrice(row.querySelector('.price-cell').innerText);

                total += qty * price;
            });

            document.getElementById('cartTotal').innerText =
                new Intl.NumberFormat('uk-UA').format(total);
        }

        function updateServer(row) {
            let id = row.dataset.id;
            let qty = row.querySelector('.qty').value;

            fetch(`/cart/update/${id}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ qty })
            });
        }

        function handle(row) {
            recalcRow(row);
            recalcTotal();
            updateServer(row);
        }

        // PLUS
        document.querySelectorAll('.plus').forEach(btn => {
            btn.addEventListener('click', function () {
                let row = this.closest('tr');
                let input = row.querySelector('.qty');

                input.value = parseInt(input.value) + 1;
                handle(row);
            });
        });

        // MINUS
        document.querySelectorAll('.minus').forEach(btn => {
            btn.addEventListener('click', function () {
                let row = this.closest('tr');
                let input = row.querySelector('.qty');

                if (input.value > 1) {
                    input.value = parseInt(input.value) - 1;
                    handle(row);
                }
            });
        });

        // INPUT
        document.querySelectorAll('.qty').forEach(input => {
            input.addEventListener('input', function () {
                let row = this.closest('tr');
                handle(row);
            });
        });

    });
    document.addEventListener('DOMContentLoaded', function () {

        function recalcRow(row) {
            let qty = parseInt(row.querySelector('.qty').value);
            let priceText = row.querySelector('.price-cell').innerText;

            let price = parseFloat(priceText.replace(/\s/g, '').replace('₴', ''));

            let sum = qty * price;

            row.querySelector('.item-sum').innerText =
                new Intl.NumberFormat('uk-UA').format(sum) + ' ₴';
        }

        function recalcTotal() {
            let total = 0;

            document.querySelectorAll('tr[data-id]').forEach(row => {

                let qty = parseInt(row.querySelector('.qty').value);
                let priceText = row.querySelector('.price-cell').innerText;

                let price = parseFloat(priceText.replace(/\s/g, '').replace('₴', ''));

                total += qty * price;
            });

            document.getElementById('cartTotal').innerText =
                new Intl.NumberFormat('uk-UA').format(total);
        }

        function updateNavbar(data) {

            let countEl = document.getElementById('cartCount');
            let totalEl = document.getElementById('cartTotalNav');

            if (countEl) {
                countEl.innerText = data.count;
            }

            if (totalEl) {
                totalEl.innerText =
                    new Intl.NumberFormat('uk-UA').format(data.total) + ' ₴';
            }
        }

        function updateServer(row) {

            let id = row.dataset.id;
            let qty = row.querySelector('.qty').value;

            fetch(`/cart/update/${id}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ qty })
            })
                .then(res => res.json())
                .then(data => {

                    recalcRow(row);
                    recalcTotal();
                    updateNavbar(data); // 👈 ВОТ ГЛАВНОЕ
                });
        }

        function handle(row) {
            updateServer(row);
        }

        document.querySelectorAll('.plus').forEach(btn => {
            btn.addEventListener('click', function () {
                let row = this.closest('tr');
                let input = row.querySelector('.qty');

                input.value = parseInt(input.value) + 1;
                handle(row);
            });
        });

        document.querySelectorAll('.minus').forEach(btn => {
            btn.addEventListener('click', function () {
                let row = this.closest('tr');
                let input = row.querySelector('.qty');

                if (input.value > 1) {
                    input.value = parseInt(input.value) - 1;
                    handle(row);
                }
            });
        });

    });
</script>
