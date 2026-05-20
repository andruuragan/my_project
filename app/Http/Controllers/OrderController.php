<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use App\Exports\OrderDetailsExport;
use Maatwebsite\Excel\Facades\Excel;

class OrderController extends Controller
{
    public function checkout()
    {

    }

public function index()
{
    $orders = Order::with('items')
        ->where('user_id', auth()->id())
        ->latest()
        ->get();

    return view('profile.orders.index', compact('orders'));
}
    public function show(Order $order)
    {
        if (!auth()->user()->isAdmin() && $order->user_id !== auth()->id()) {
            abort(403);
        }

        $order = Order::with('items')->findOrFail($order->id);

        return view('profile.orders.show', compact('order'));
    }
    public function updateStatus(Request $request, Order $order)
    {
        $request->validate([
            'status' => 'required|in:pending,paid,processing,shipped,completed,cancelled',
        ]);

        $order->update([
            'status' => $request->status
        ]);

        // Если запрос пришел через fetch/ajax, возвращаем JSON
        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Статус успешно обновлён',
                'status' => $order->status
            ]);
        }

        // На всякий случай оставляем обычный редирект, если форма отправится стандартным способом
        return back()->with('success', 'Статус обновлён');
    }
    public function exportExcel(Order $order)
    {
        return Excel::download(
            new OrderDetailsExport($order),
            'order-' . $order->id . '.xlsx'
        );
    }
}
