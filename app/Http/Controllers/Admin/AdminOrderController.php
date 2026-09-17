<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;

class AdminOrderController extends Controller
{
    public function destroy(Order $order)
    {
        // Удаляем товары заказа
        $order->items()->delete();

        // Удаляем сам заказ
        $order->delete();

        if (request()->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Замовлення видалено'
            ]);
        }

        return back()->with('success', 'Замовлення видалено');
    }
}