{{-- resources/views/admin/orders/table.blade.php --}}
<div class="card shadow-sm border-0" id="tableContainer">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-light text-muted small uppercase">
            <tr>
                <th style="width: 90px;">ID</th>
                <th>Клієнт</th>
                <th style="width: 160px;">Статус</th>
                <th>Сума</th>
                <th>Товарів</th>
                <th>Дата</th>
                <th style="width: 60px;" class="text-end">Дія</th>
            </tr>
            </thead>
            <tbody id="ordersTableBody">
            @foreach($orders as $order)
                <tr>
                    <td class="fw-semibold text-secondary">№{{ $order->id }}</td>
                    <td>
                        <div class="fw-bold text-dark">{{ $order->user->name ?? 'Гість' }}</div>
                        <small class="text-muted">{{ $order->user->email ?? '' }}</small>
                    </td>
                    <td>
                        <!-- Добавили динамические id, name, autocomplete и aria-label -->
                        <select id="status_select_{{ $order->id }}"
                                name="status_{{ $order->id }}"
                                class="form-select form-select-sm status-select fw-medium bg-light"
                                data-id="{{ $order->id }}"
                                autocomplete="off"
                                aria-label="Статус замовлення №{{ $order->id }}">
                            <option value="pending" @selected($order->status === 'pending')>очікує</option>
                            <option value="paid" @selected($order->status === 'paid')>сплачено</option>
                            <option value="processing" @selected($order->status === 'processing')>обробка</option>
                            <option value="shipped" @selected($order->status === 'shipped')>відправлено</option>
                            <option value="completed" @selected($order->status === 'completed')>завершено</option>
                            <option value="cancelled" @selected($order->status === 'cancelled')>скасовано</option>
                        </select>
                    </td>
                    <td class="fw-bold text-dark">{{ number_format($order->total_price, 0, '.', ' ') }} грн</td>
                    <td><span class="badge bg-secondary rounded-pill">{{ $order->items->count() }}</span></td>
                    <td class="text-muted small">{{ $order->created_at->format('d.m.Y H:i') }}</td>
                    <td class="text-end">
                        <a href="{{ route('profile.orders.show', $order) }}" class="btn btn-sm btn-icon btn-outline-primary rounded-circle">👁</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>

<div class="mt-4" id="paginationContainer">
    {{ $orders->links() }}
</div>
