@extends('layouts.main')

@section('content')
    <div class="container-1600">

        <h3>
            Історія замовлень клієнта: {{ $user->name }}
        </h3>

        {{-- FILTER --}}
        <form method="GET" class="mb-3 d-flex gap-2">

            <select name="status" class="form-select" style="max-width: 200px;">
                <option value="">Всі статуси</option>
                <option value="pending">Очікує</option>
                <option value="paid">Сплачено</option>
                <option value="processing">Обробка</option>
                <option value="shipped'">Відправлено</option>
                <option value="completed'">Завершено</option>
                <option value="cancelled">Скасовано</option>

            </select>

            <button class="btn btn-primary">
                Фільтр
            </button>

        </form>

        <a href="{{ route('users.show', $user) }}" class="btn btn-secondary mb-3">
            ← Назад до клієнта
        </a>

        @if($orders->isEmpty())

            <div class="alert alert-info">
                У клієнта поки немає замовлень
            </div>

        @else

            <table class="table table-hover align-middle">

                <thead>
                <tr>
                    <th>ID</th>
                    <th>Статус</th>
                    <th>Сума</th>
                    <th>Дата</th>
                    <th>Зміна статуса</th>
                    <th>Дія</th>
                </tr>
                </thead>

                <tbody>

                @foreach($orders as $order)

                    <tr>

                        <td>#{{ $order->id }}</td>

                        {{-- STATUS BADGE --}}
                        <td class="status-badge-cell">
                            @if($order->status === 'pending')
                                <span class="badge bg-warning text-dark">Очікує</span>
                            @elseif($order->status === 'paid')
                                <span class="badge bg-success">Сплачено</span>
                            @elseif($order->status === 'processing')
                                <span class="badge bg-danger">Обробка</span>
                            @elseif($order->status === 'shipped')
                                <span class="badge bg-danger">Відправлено</span>
                            @elseif($order->status === 'completed')
                                <span class="badge bg-danger">Завершено</span>
                            @elseif($order->status === 'cancelled')
                                <span class="badge bg-danger">Скасовано</span>

                            @else

                                <span class="badge bg-secondary">{{ $order->status }}</span>
                            @endif
                        </td>

                        <td>
                            <strong>
                                {{ number_format($order->total_price, 0, '.', ' ') }} грн.
                            </strong>
                        </td>

                        <td>
                            {{ $order->created_at->format('d.m.Y H:i') }}
                        </td>

                        {{-- STATUS CHANGE --}}
                        {{-- STATUS CHANGE --}}
                        <td>
                            <select name="status" style="width: 135px;"
                                    onchange="window.changeOrderStatus(this, '{{ route('admin.orders.status', $order) }}')"
                                    class="form-select form-select-sm">

                                <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>
                                    Очікує
                                </option>
                                <option value="paid" {{ $order->status == 'paid' ? 'selected' : '' }}>
                                    Сплачено
                                </option>
                                <option value="processing" {{ $order->status == 'processing' ? 'selected' : '' }}>
                                    Обробка
                                </option>
                                <option value="shipped" {{ $order->status == 'shipped' ? 'selected' : '' }}>
                                    Відправлено
                                </option>
                                <option value="completed" {{ $order->status == 'completed' ? 'selected' : '' }}>
                                    Завершено
                                </option>
                                <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>
                                    Скасовано
                                </option>
                            </select>

                        </td>

                        {{-- ACTIONS --}}
                        <td>
                            <div class="d-flex align-items-center gap-2">

                                <a href="{{ route('profile.orders.show', $order) }}"
                                   class="btn btn-sm btn-outline-info">
                                    <i class="bi bi-eye"></i>
                                </a>

                                <button type="button"
                                        onclick="deleteOrder(this, '{{ route('admin.orders.destroy', $order) }}')"
                                        class="btn btn-sm btn-outline-danger">
                                    <i class="bi bi-trash"></i>
                                </button>

                            </div>
                        </td>



                    </tr>

                @endforeach

                </tbody>

            </table>

        @endif

    </div>
    <script>
        function changeOrderStatus(selectElement, url) {
            const status = selectElement.value;

            // Блокируем селект на время запроса, чтобы админ не кликал дважды
            selectElement.disabled = true;

            fetch(url, {
                method: 'POST', // Передаем метод через заголовки или X-HTTP-Method-Override
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'X-HTTP-Method-Override': 'PATCH' // Laravel поймет, что это PATCH запрос
                },
                body: JSON.stringify({ status: status })
            })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Ошибка сервера');
                    }
                    return response.json();
                })
                .then(data => {
                    // Разблокируем селект
                    selectElement.disabled = false;

                    // Здесь можно вывести красивое уведомление (например, через Toastr, SweetAlert2 или просто alert)
                    // Для примера используем обычный alert, но лучше сделать всплывающий тоаст в углу
                    alert(data.message || 'Статус успешно обновлен');

                    // При желании здесь можно скриптом поменять цвет бейджа статуса в этой строке,
                    // чтобы админ сразу видел изменения без перезагрузки!
                })
                .catch(error => {
                    selectElement.disabled = false;
                    alert('Не удалось обновить статус: ' + error.message);
                    // Возвращаем старое значение, если произошла ошибка (можно реализовать при необходимости)
                });
        }
    </script>
@endsection
