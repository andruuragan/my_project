<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;

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
        if ($order->user_id !== auth()->id()) {
            abort(403);
        }

        $order->load('items');

        return view('profile.orders.show', compact('order'));
    }
    public function updateStatus(Request $request, Order $order)
    {
        $request->validate([
            'status' => 'required|in:pending,paid,cancelled',
        ]);

        $order->update([
            'status' => $request->status
        ]);

        return back()->with('success', 'Статус обновлён');
    }
}
