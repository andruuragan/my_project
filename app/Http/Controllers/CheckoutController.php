<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;


class CheckoutController extends Controller
{
    /**
     * Страница оформления заказа
     */
    public function index()
    {
        $cart = session('cart', []);

        $cartCount = 0;
        $cartTotal = 0;

        foreach ($cart as $item) {
            $qty = $item['qty'] ?? 1;
            $price = $item['price'] ?? 0;

            $cartCount += $qty;
            $cartTotal += $price * $qty;
        }

        return view('checkout.index', compact(
            'cart',
            'cartCount',
            'cartTotal'
        ));
    }

    /**
     * (пока заготовка) обработка заказа
     */
    public function store(Request $request)
    {
        $cart = session('cart', []);

        if (empty($cart)) {
            return redirect()->route('cart.index')
                ->with('error', 'Кошик порожній');
        }

        // 1. создаём заказ
        $order = Order::create([
            'user_id' => auth()->id(),
            'total_price' => 0, // временно
            'status' => Order::STATUS_PENDING,
        ]);

        $total = 0;

        foreach ($cart as $item) {

            $qty = $item['qty'];
            $price = $item['price'];

            $itemTotal = $qty * $price;

            $total += $itemTotal; // 🔥 ВОТ ЭТОГО НЕ ХВАТАЛО

            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item['id'],
                'product_name' => $item['title'],
                'product_image' => $item['image'],
                'quantity' => $qty,
                'price' => $price,
                'total' => $itemTotal,
            ]);
        }

        // 3. обновляем итог заказа
        $order->update([
            'total_price' => $total,
        ]);

        // 4. очищаем корзину
        session()->forget('cart');

        return redirect()->route('shop.index')
            ->with('success', 'Замовлення оформлено');
    }
}
