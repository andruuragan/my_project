@extends('layouts.main')

@section('content')
<div class="container-1600">

    <h3>Історія замовлень клієнта: {{ $user->name }}</h3>

    {{-- FILTER --}}
    <form method="GET" class="mb-3 d-flex gap-2">
        <select name="status" class="form-select" style="max-width: 200px;">
            <option value="">Всі статуси</option>
            <option value="pending">Очікує</option>
            <option value="paid">Сплачено</option>
            <option value="processing">Обробка</option>
            <option value="shipped">Відправлено</option>
            <option value="completed">Завершено</option>
            <option value="cancelled">Скасовано</option>
        </select>
        <button class="btn btn-primary">Фільтр</button>
    </form>

    <a href="{{ route('users.show', $user) }}" class="btn btn-secondary mb-3">← Назад до клієнта</a>

    @if($orders->isEmpty())
        <div class="alert alert-info">У клієнта поки немає замовлень</div>
    @else
        
        {{-- ТАБЛИЦЯ (Desktop) --}}
        <div class="table-responsive d-none d-md-block">
            <table class="table table-hover align-middle">
                <thead>
                    <tr>
                        <th>ID</th><th>Статус</th><th>Сума</th><th>Дата</th><th>Зміна статуса</th><th>Дія</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <td>#{{ $order->id }}</td>
                            <td>{{-- Ваш бейдж тут --}}</td>
                            <td><strong>{{ number_format($order->total_price, 0, '.', ' ') }} грн.</strong></td>
                            <td>{{ $order->created_at->format('d.m.Y H:i') }}</td>
                            <td>
                                {{-- Ваш селект з window.changeOrderStatus --}}
                            </td>
                            <td>{{-- Ваші кнопки дій --}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- КАРТКИ (Mobile) --}}
        <div class="d-md-none">
            @foreach($orders as $order)
                <div class="card mb-3 shadow-sm">
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-2">
                            <strong>Замовлення #{{ $order->id }}</strong>
                            <span class="text-muted">{{ $order->created_at->format('d.m.Y') }}</span>
                        </div>
                        <p><strong>Сума:</strong> {{ number_format($order->total_price, 0, '.', ' ') }} грн.</p>
                        
                        <div class="mb-3">
                            <label class="small text-muted">Статус:</label>
                            {{-- Ми використовуємо той самий селект --}}
                            <select onchange="window.changeOrderStatus(this, '{{ route('admin.orders.status', $order) }}')" 
                                    class="form-select form-select-sm">
                                <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Очікує</option>
                                <option value="paid" {{ $order->status == 'paid' ? 'selected' : '' }}>Сплачено</option>
                                <option value="processing" {{ $order->status == 'processing' ? 'selected' : '' }}>Обробка</option>
                                <option value="shipped" {{ $order->status == 'shipped' ? 'selected' : '' }}>Відправлено</option>
                                <option value="completed" {{ $order->status == 'completed' ? 'selected' : '' }}>Завершено</option>
                                <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>Скасовано</option>
                            </select>
                        </div>

                        <div class="d-flex gap-2">
                            <a href="{{ route('profile.orders.show', $order) }}" class="btn btn-sm btn-outline-info flex-fill">Інфо</a>
                            <button type="button" onclick="deleteOrder(this, '{{ route('admin.orders.destroy', $order) }}')" 
                                    class="btn btn-sm btn-outline-danger flex-fill">Видалити</button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
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
