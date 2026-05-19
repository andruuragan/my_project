@extends('layouts.main')

@section('content')
    <div class="container-1600">

        <h3>
            История заказов пользователя: {{ $user->name }}
        </h3>

        <a href="{{ route('users.show', $user) }}" class="btn btn-secondary mb-3">
            ← Назад к пользователю
        </a>

        @if($orders->isEmpty())
            <div class="alert alert-info">
                У пользователя пока нет заказов
            </div>
        @else

            <table class="table table-hover align-middle">

                <thead>
                <tr>
                    <th>ID</th>
                    <th>Статус</th>
                    <th>Сумма</th>
                    <th>Дата</th>
                    <th>Действия</th>
                </tr>
                </thead>

                <tbody>

                @foreach($orders as $order)
                    <tr>

                        <!-- ID -->
                        <td>
                            #{{ $order->id }}
                        </td>

                        <!-- STATUS -->
                        <td>
                            @if($order->status === 'pending')
                                <span class="badge bg-warning text-dark">Ожидает</span>
                            @elseif($order->status === 'paid')
                                <span class="badge bg-success">Оплачен</span>
                            @elseif($order->status === 'cancelled')
                                <span class="badge bg-danger">Отменён</span>
                            @else
                                <span class="badge bg-secondary">
                                {{ $order->status }}
                            </span>
                            @endif
                        </td>

                        <!-- TOTAL -->
                        <td>
                            <strong>
                                {{ number_format($order->total_price, 0, '.', ' ') }} ₴
                            </strong>
                        </td>

                        <!-- DATE -->
                        <td>
                            {{ $order->created_at->format('d.m.Y H:i') }}
                        </td>

                        <!-- ACTIONS -->
                        <td>

                            <a href="{{ route('profile.orders.show', $order) }}"
                               class="btn btn-sm btn-outline-info"
                               title="Просмотр заказа">
                                <i class="bi bi-eye"></i>
                            </a>

                        </td>

                    </tr>
                @endforeach

                </tbody>

            </table>

        @endif

    </div>
@endsection
