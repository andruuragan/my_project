<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;

class AdminOrderController extends Controller
{
    public function destroy(Order $order)
    {
        // Твоя логика удаления (например, удаление связанных items, если нет cascade в БД)
        $order->items()->delete();
        $order->delete();

        // Если запрос AJAX
        if (request()->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Заказ видалено'
            ]);
        }

        return back()->with('success', 'Заказ видалено');
    }
}
