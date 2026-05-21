@extends('layouts.main')

@section('content')
    <div class="container-1600">

        {{-- ================= STATISTICS ================= --}}
        <div class="row g-3 mb-4">

            <div class="col-6 col-sm-4 col-md-2">
                <div class="card shadow-sm border-0 h-100 p-3">
                    <small class="text-muted d-block text-truncate">Всього замовлень</small>
                    <h4 class="fw-bold mb-0 text-dark">{{ $totalOrders }}</h4>
                </div>
            </div>
            <div class="col-6 col-sm-4 col-md-2">
                <div class="card shadow-sm border-0 h-100 p-3">
                    <small class="text-muted d-block text-truncate">Сьогодні</small>
                    <h4 class="fw-bold mb-0 text-primary">{{ $todayOrders }}</h4>
                </div>
            </div>
            <div class="col-6 col-sm-4 col-md-2">
                <div class="card shadow-sm border-0 h-100 p-3">
                    <small class="text-muted d-block text-truncate">За місяць</small>
                    <h4 class="fw-bold mb-0 text-info">{{ $monthOrders }}</h4>
                </div>
            </div>
            <div class="col-6 col-sm-6 col-md-3">
                <div class="card shadow-sm border-0 h-100 p-3">
                    <small class="text-muted d-block text-truncate">Виручка за місяць</small>
                    <h4 class="fw-bold mb-0 text-success">
                        {{ number_format($monthRevenue, 0, '.', ' ') }} <small class="fs-6 fw-normal">грн</small>
                    </h4>
                </div>
            </div>
            <div class="col-6 col-sm-6 col-md-2">
                <div class="card shadow-sm border-0 h-100 p-3">
                    <small class="text-muted d-block text-truncate">Середній чек</small>
                    <h4 class="fw-bold mb-0 text-purple">
                        {{ number_format($averageCheck, 0, '.', ' ') }} <small class="fs-6 fw-normal">грн</small>
                    </h4>
                </div>
            </div>
            <div class="col-6 col-sm-4 col-md-1">
                <div class="card shadow-sm border-0 h-100 p-3">
                    <small class="text-muted d-block text-truncate">Скасовані</small>
                    <h4 class="fw-bold mb-0 text-danger">{{ $cancelledOrders }}</h4>
                </div>
            </div>
        </div>

        {{-- ================= FILTERS & ACTIONS ================= --}}
        <div class="card shadow-sm border-0 p-4 mb-4">
            <form method="GET" id="filtersForm">
                <!-- Верхний ряд: Основные фильтры -->
                <div class="row g-3 mb-3">
                    <div class="col-md-4">
                        <label class="form-label small text-muted fw-semibold">Пошук</label>
                        <input type="text" name="search" value="{{ request('search') }}" class="form-control" placeholder="ID або ім'я клієнта...">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label small text-muted fw-semibold">Статус</label>
                        <select name="status" class="form-select">
                            <option value="">Всі статуси</option>
                            <option value="pending" @selected(request('status') === 'pending')>очікує</option>
                            <option value="paid" @selected(request('status') === 'paid')>сплачено</option>
                            <option value="processing" @selected(request('status') === 'processing')>обробка</option>
                            <option value="shipped" @selected(request('status') === 'shipped')>відправлено</option>
                            <option value="completed" @selected(request('status') === 'completed')>завершено</option>
                            <option value="cancelled" @selected(request('status') === 'cancelled')>скасовано</option>
                        </select>
                    </div>
                    <div class="col-md-5">
                        <label class="form-label small text-muted fw-semibold">Період замовлень</label>
                        <div class="input-group">
                            <span class="input-group-text bg-white text-muted">з</span>
                            <input type="date" name="date_from" value="{{ request('date_from') }}" class="form-control">
                            <span class="input-group-text bg-white text-muted">по</span>
                            <input type="date" name="date_to" value="{{ request('date_to') }}" class="form-control">
                        </div>
                    </div>
                </div>

                <!-- Нижний ряд: Цены и Кнопки управления -->
                <div class="row g-3 align-items-end">
                    <div class="col-md-3 col-sm-6">
                        <label class="form-label small text-muted fw-semibold">Мін. сума</label>
                        <input type="number" name="min_price" value="{{ request('min_price') }}" placeholder="0 грн" class="form-control">
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <label class="form-label small text-muted fw-semibold">Макс. сума</label>
                        <input type="number" name="max_price" value="{{ request('max_price') }}" placeholder="Мах грн" class="form-control">
                    </div>

                    <!-- Кнопки выровнены по правому краю -->
                    <div class="col-md-6 text-md-end d-flex gap-2 justify-content-end mt-3 mt-md-0">
                        <button type="submit" class="btn btn-dark px-4">
                            <i class="bi bi-funnel me-1"></i> Фільтр
                        </button>
                        <a href="{{ url()->current() }}" class="btn btn-light px-3 border">
                            <i class="bi bi-x-circle me-1"></i> Скинути
                        </a>
                        <a href="{{ route('admin.orders.export', request()->query()) }}" id="exportBtn" class="btn btn-success px-3">
                            <i class="bi bi-file-earmark-excel me-1"></i> Export Excel
                        </a>
                    </div>
                </div>
            </form>
        </div>

        {{-- ================= CHART ================= --}}
        <div class="card shadow-sm border-0 p-3 mb-4">
            <div style="position: relative; width:100%; height:160px;">
                <canvas id="ordersChart"></canvas>
            </div>
        </div>

        {{-- ================= TABLE ================= --}}

        <div id="dynamicContentZone">
            @include('admin.orders.table')
        </div>
        {{-- ================= PAGINATION ================= --}}

        <a href="{{ route('admin.index') }}" class="btn btn-secondary mb-3">
            ← Назад
        </a>
    </div>

    {{-- ================= JAVASCRIPT ================= --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {

            // 1. ИНИЦИАЛИЗАЦИЯ ГРАФИКА
            const canvas = document.getElementById('ordersChart');
            let ordersChart = null;

            function updateChart(labels, values) {
                if (!canvas) return;

                if (ordersChart) {
                    ordersChart.destroy(); // Обязательно уничтожаем старый экземпляр, чтобы графики не накладывались
                }

                ordersChart = new Chart(canvas, {
                    type: 'line',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'Замовлення',
                            data: values,
                            borderColor: '#0d6efd',
                            backgroundColor: 'rgba(13, 110, 253, 0.05)',
                            fill: true,
                            borderWidth: 2,
                            tension: 0.2,
                            pointRadius: 3
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: { legend: { display: false } },
                        scales: { y: { beginAtZero: true } }
                    }
                });
            }

            // Запуск графика при первой загрузке страницы данными из Blade
            updateChart(@json($labels ?? []), @json($values ?? []));


            // 2. ОБРАБОТКА ФИЛЬТРАЦИИ (AJAX)
            const form = document.getElementById('filtersForm');

            form.addEventListener('submit', function (e) {
                e.preventDefault();
                loadOrders();
            });

            function loadOrders(url = null) {
                const currentUrl = url || window.location.pathname;
                const queryString = new URLSearchParams(new FormData(form)).toString();
                const fetchUrl = `${currentUrl}?${queryString}`;

                window.history.pushState({}, '', fetchUrl);

                const exportBtn = document.getElementById('exportBtn');
                if(exportBtn) {
                    exportBtn.href = `/admin/orders/export?${queryString}`;
                }

                fetch(fetchUrl, { headers: { 'X-Requested-With': 'XMLHttpRequest' } })
                    .then(res => res.json())
                    .then(data => {

                        // 1. Просто вставляем готовую таблицу и пагинацию в их общую зону
                        document.getElementById('dynamicContentZone').innerHTML = data.table_html;

                        // 2. Обновляем цифру "Всього замовлень" на карточке
                        const totalCounter = document.querySelector('.card h4.text-dark');
                        if(totalCounter) totalCounter.innerText = data.total_orders;

                        // 3. Обновляем график
                        updateChart(data.labels, data.values);

                        // 4. Переподключаем статусы
                        bindStatusSelects();
                    })
                    .catch(err => console.error('Помилка завантаження:', err));
            }
            // 3. АСИНХРОННАЯ ПАГИНАЦИЯ
            document.getElementById('paginationContainer').addEventListener('click', function (e) {
                const link = e.target.closest('.pagination a');
                if (!link) return;
                e.preventDefault();
                loadOrders(link.href);
            });

            // 4. ИЗМЕНЕНИЕ СТАТУСА ЗАКАЗА В ТАБЛИЦЕ
            function bindStatusSelects() {
                document.querySelectorAll('.status-select').forEach(select => {
                    select.removeEventListener('change', handleStatusChange);
                    select.addEventListener('change', handleStatusChange);
                });
            }

            function handleStatusChange() {
                const orderId = this.dataset.id;
                const status = this.value;
                const selectElement = this;

                selectElement.disabled = true;

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
                        selectElement.disabled = false;
                        if (data.success) {
                            selectElement.classList.add('is-valid');
                            setTimeout(() => selectElement.classList.remove('is-valid'), 1200);
                        }
                    })
                    .catch(() => selectElement.disabled = false);
            }

            bindStatusSelects();
        });
    </script>
@endsection
