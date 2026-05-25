<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Notifications\OrderCreatedNotification;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Http;

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
     * Обработка заказа
     */
    public function store(Request $request)
    {
        $cart = session('cart', []);

        if (empty($cart)) {
            return redirect()->route('cart.index')
                ->with('error', 'Кошик порожній');
        }

        // 1. Создаём заказ
        $order = Order::create([
            'user_id' => auth()->id(),
            'total_price' => 0, // Временно
            'status' => Order::STATUS_PENDING,
        ]);

        $total = 0;

        foreach ($cart as $item) {
            $qty = $item['qty'];
            $price = $item['price'];

            $itemTotal = $qty * $price;
            $total += $itemTotal;

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

        // 2. Обновляем итог заказа
        $order->update([
            'total_price' => $total,
        ]);

       // 🔥 ОТПРАВКА УВЕДОМЛЕНИЯ В TELEGRAM (Через штатную систему Laravel)
        try {
            Notification::route('telegram', env('TELEGRAM_ADMIN_CHAT_ID'))
                ->notify(new OrderCreatedNotification($order));
        } catch (\Exception $e) {
            // Если на локалке пропадет интернет, сайт не упадет, а просто запишет ошибку в лог
            logger()->error("Telegram failed: " . $e->getMessage());
        }

        // 4. очищаем корзину
        session()->forget('cart');

        // 4. Очищаем корзину
        session()->forget('cart');

        return redirect()->route('shop.index')
            ->with('success', 'Замовлення підтверджено');
    }
}