<div class="card shadow-sm border-0" id="tableContainer">
    {{-- Таблиця: видно тільки на середніх екранах і вище --}}
    <div class="table-responsive d-none d-md-block">
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
            <tbody>
                @foreach($orders as $order)
                    <tr>
                        <td class="fw-semibold text-secondary">№{{ $order->id }}</td>
                        <td>
                            <div class="fw-bold text-dark">{{ $order->user->name ?? 'Гість' }}</div>
                            <small class="text-muted">{{ $order->user->email ?? '' }}</small>
                             @if(!empty($order->user?->phone))
        <small class="text-muted d-block">
            {{ $order->user->phone }}
        </small>
    @endif
                        </td>
                        <td>
                            <select class="form-select form-select-sm status-select" data-id="{{ $order->id }}">
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
                            <a href="{{ route('profile.orders.show', $order) }}" class="btn btn-sm btn-outline-primary">👁</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- Картки: видно тільки на мобільних --}}
    <div class="d-md-none">
        @foreach($orders as $order)
            <div class="p-3 border-bottom">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <span class="fw-bold text-secondary">№{{ $order->id }}</span>
                    <span class="badge bg-secondary rounded-pill">{{ $order->items->count() }} товарів</span>
                </div>
                
                <div class="fw-bold text-dark">{{ $order->user->name ?? 'Гість' }}</div>
                <div class="text-muted small mb-2">{{ $order->user->email ?? '' }}</div>
                
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <div class="fw-bold text-primary">{{ number_format($order->total_price, 0, '.', ' ') }} грн</div>
                    <div class="text-muted small">{{ $order->created_at->format('d.m.Y') }}</div>
                </div>

                <div class="d-flex gap-2">
                    <select class="form-select form-select-sm status-select flex-grow-1" data-id="{{ $order->id }}">
                        <option value="pending" @selected($order->status === 'pending')>очікує</option>
                        <option value="paid" @selected($order->status === 'paid')>сплачено</option>
                        <option value="processing" @selected($order->status === 'processing')>обробка</option>
                        <option value="shipped" @selected($order->status === 'shipped')>відправлено</option>
                        <option value="completed" @selected($order->status === 'completed')>завершено</option>
                        <option value="cancelled" @selected($order->status === 'cancelled')>скасовано</option>
                    </select>
                    <a href="{{ route('profile.orders.show', $order) }}" class="btn btn-sm btn-outline-primary">👁</a>
                </div>
            </div>
        @endforeach
    </div>
</div>
<div class="mt-4 d-flex justify-content-center" id="paginationContainer">
    {{ $orders->links() }}
</div>
<style>
   @media (max-width: 576px) {
    .pagination .page-link {
        padding: 0.375rem 0.5rem; /* Менші відступи на дуже малих екранах */
        font-size: 0.875rem;
    }
}
</style>
  
