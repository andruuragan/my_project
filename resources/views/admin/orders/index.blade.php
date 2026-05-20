@extends('layouts.main')

@section('content')
    <div class="container-1600">

        {{-- ================= STATISTICS ================= --}}
        <div class="row mb-4">

            <div class="col-md-2">
                <div class="card shadow-sm border-0 h-100 p-3">
                    <small class="text-muted">Всього замовлень</small>
                    <h4 class="fw-bold mb-0">{{ $totalOrders }}</h4>
                </div>
            </div>

            <div class="col-md-2">
                <div class="card shadow-sm border-0 h-100 p-3">
                    <small class="text-muted">Сьогодні</small>
                    <h4 class="fw-bold mb-0">{{ $todayOrders }}</h4>
                </div>
            </div>

            <div class="col-md-2">
                <div class="card shadow-sm border-0 h-100 p-3">
                    <small class="text-muted">За місяць</small>
                    <h4 class="fw-bold mb-0">{{ $monthOrders }}</h4>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card shadow-sm border-0 h-100 p-3">
                    <small class="text-muted">Виручка за місяць</small>
                    <h4 class="fw-bold mb-0">
                        {{ number_format($monthRevenue, 0, '.', ' ') }} грн.
                    </h4>
                </div>
            </div>

            <div class="col-md-2">
                <div class="card shadow-sm border-0 h-100 p-3">
                    <small class="text-muted">Середній чек</small>
                    <h4 class="fw-bold mb-0">
                        {{ number_format($averageCheck, 0, '.', ' ') }} грн.
                    </h4>
                </div>
            </div>

            <div class="col-md-1">
                <div class="card shadow-sm border-0 h-100 p-3">
                    <small class="text-muted">Скасовані</small>
                    <h4 class="fw-bold mb-0">{{ $cancelledOrders }}</h4>
                </div>
            </div>

        </div>


        {{-- ================= FILTERS ================= --}}
        <form method="GET"
              id="filtersForm"
              class="card shadow-sm border-0 p-4 mb-4">

            <div class="row g-3 align-items-end">

                <div class="col-md-3">
                    <input type="text"
                           name="search"
                           class="form-control shadow-sm"
                           placeholder="Пошук по ID або клієнту...">
                </div>

                {{-- STATUS --}}
                <div class="col-md-2">
                    <select name="status" class="form-select shadow-sm">
                        <option value="">Статус</option>
                        <option value="pending">очікує</option>
                        <option value="paid">сплачено</option>
                        <option value="processing">обробка</option>
                        <option value="shipped">відпралено</option>
                        <option value="completed">завершено</option>
                        <option value="cancelled">скасовано</option>
                    </select>
                </div>

                {{-- DATE RANGE --}}
                <div class="col-md-4">
                    <div class="d-flex align-items-center gap-2">

                        <span class="small text-muted">з</span>

                        <input type="date"
                               name="date_from"
                               value="{{ request('date_from') }}"
                               class="form-control">

                        <span class="small text-muted">по</span>

                        <input type="date"
                               name="date_to"
                               value="{{ request('date_to') }}"
                               class="form-control">

                    </div>
                </div>

                {{-- MIN PRICE --}}
                <div class="col-md-2">
                    <input type="number"
                           name="min_price"
                           placeholder="Мін. сума"
                           value="{{ request('min_price') }}"
                           class="form-control">
                </div>

                {{-- MAX PRICE --}}
                <div class="col-md-2">
                    <input type="number"
                           name="max_price"
                           placeholder="Макс. сума"
                           value="{{ request('max_price') }}"
                           class="form-control">
                </div>

                {{-- BUTTONS --}}
                <div class="col-md-1 d-grid">
                    <button class="btn btn-dark">
                        Фільтр
                    </button>
                </div>

                <div class="col-md-1 d-grid">
                    <a href="{{ url()->current() }}"
                       class="btn btn-outline-secondary">
                        Скинути
                    </a>
                </div>
                <div class="col-md-1 d-grid">
                    <a href="{{ route('admin.orders.export', request()->query()) }}"
                       class="btn btn-success">
                        Export Excel
                    </a>

                </div>

            </div>

        </form>
        <div class="card shadow-sm border-0 p-3 mb-4">
            <canvas id="ordersChart" height="100"></canvas>
        </div>

        {{-- ================= TABLE ================= --}}
        <div class="card shadow-sm border-0">

            <div class="table-responsive">

                <table class="table table-hover align-middle mb-0">

                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Клієнт</th>
                        <th>Статус</th>
                        <th>Сума</th>
                        <th>Товарів</th>
                        <th>Дата</th>
                        <th>Дія</th>
                    </tr>
                    </thead>

                    <tbody>

                    @foreach($orders as $order)

                        <tr>

                            <td>#{{ $order->id }}</td>

                            <td>{{ $order->user->name ?? '—' }}</td>

                            <td>
                                <select class="form-select form-select-sm status-select"
                                        data-id="{{ $order->id }}"
                                        style="width: 135px;">

                                    <option value="pending" @selected($order->status === 'pending')>очікує</option>
                                    <option value="paid" @selected($order->status === 'paid')>сплачено</option>
                                    <option value="processing" @selected($order->status === 'processing')>обробка</option>
                                    <option value="shipped" @selected($order->status === 'shipped')>відправлено</option>
                                    <option value="completed" @selected($order->status === 'completed')>завершено</option>
                                    <option value="cancelled" @selected($order->status === 'cancelled')>скасовано</option>

                                </select>
                            </td>

                            <td>
                                {{ number_format($order->total_price, 0, '.', ' ') }} грн.
                            </td>

                            <td>
                                {{ $order->items->count() }}
                            </td>

                            <td>
                                {{ $order->created_at->format('d.m.Y / H:i') }}
                            </td>

                            <td>
                                <a href="{{ route('profile.orders.show', $order) }}"
                                   class="btn btn-sm btn-outline-primary rounded-pill px-3">
                                    <i class="bi bi-eye"></i>
                                </a>
                            </td>

                        </tr>

                    @endforeach

                    </tbody>

                </table>

            </div>

        </div>

        {{-- ================= PAGINATION ================= --}}
        <div class="mt-4">
            {{ $orders->links() }}
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        let timer;

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {

            const canvas = document.getElementById('ordersChart');

            if (!canvas) return;

            const labels = @json($labels ?? []);
            const values = @json($values ?? []);

            // если нет данных — не рисуем
            if (!labels.length || !values.length) {
                console.log('Нет данных для графика');
                return;
            }

            new Chart(canvas, {
                type: 'line',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Замовлення',
                        data: values,
                        borderWidth: 2,
                        tension: 0.3
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            display: true
                        }
                    }
                }
            });

        });
    </script>
    <script>
        document.getElementById('filtersForm').addEventListener('input', function () {

            clearTimeout(timer);

            timer = setTimeout(() => {
                loadOrders();
            }, 500);

        });
        const form = document.getElementById('filtersForm');

        form.addEventListener('input', triggerLoad);
        form.addEventListener('change', triggerLoad);

        let timer;

        function triggerLoad() {
            clearTimeout(timer);

            timer = setTimeout(() => {
                loadOrders();
            }, 500);
        }
        document.addEventListener('click', function (e) {

            let link = e.target.closest('.pagination a');

            if (!link) return;

            e.preventDefault();

            fetch(link.href, {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
                .then(res => res.text())
                .then(html => {
                    document.querySelector('tbody').innerHTML =
                        new DOMParser()
                            .parseFromString(html, 'text/html')
                            .querySelector('tbody')
                            .innerHTML;

                    document.querySelector('.pagination').innerHTML =
                        new DOMParser()
                            .parseFromString(html, 'text/html')
                            .querySelector('.pagination')
                            .innerHTML;
                });

        });
    </script>
    <script>
        const ctx = document.getElementById('ordersChart');

        new Chart(ctx, {
            type: 'line',
            data: {
                labels: @json($labels),
                datasets: [{
                    label: 'Замовлення',
                    data: @json($values),
                    borderWidth: 2,
                    tension: 0.3
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: true
                    }
                }
            }
        });
    </script>
    <script>
        document.querySelectorAll('.status-select').forEach(select => {

            select.addEventListener('change', function () {

                let orderId = this.dataset.id;
                let status = this.value;

                fetch(`/admin/orders/${orderId}/status`, {
                    method: 'PATCH',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({ status })
                })
                    .then(res => res.json())
                    .then(data => {

                        if (data.success) {

                            // можно добавить визуальный feedback
                            this.classList.add('border-success');

                            setTimeout(() => {
                                this.classList.remove('border-success');
                            }, 1000);
                        }

                    });

            });

        });
    </script>
@endsection
