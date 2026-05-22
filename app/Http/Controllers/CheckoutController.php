<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
// Добавляем импорт фасада уведомлений и нашего нового класса
use App\Notifications\OrderCreatedNotification;
use Illuminate\Support\Facades\Notification;

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

        // 3. обновляем итог заказа
        $order->update([
            'total_price' => $total,
        ]);

        // 🔥 ОТПРАВКА УВЕДОМЛЕНИЯ В TELEGRAM
        // Подгружаем связь items, чтобы уведомление знало, какие товары внутри заказа
        // 🔥 ПРЯМАЯ ОТПРАВКА В TELEGRAM (Обход cURL error 60)
        $itemsList = "";
        foreach ($order->items as $item) {
            $itemsList .= "• {$item->product_name} x {$item->quantity} шт. — " . number_format($item->price, 0, '.', ' ') . " грн\n";
        }

        $message = "📦 *Нове замовлення №{$order->id}*\n"
            . "----------------------------------\n"
            . "👤 *Клієнт:* " . (auth()->user()->name ?? 'Гість') . "\n"
            . "📧 *Email:* " . (auth()->user()->email ?? 'Не вказано') . "\n"
            . "💰 *Сума замовлення:* " . number_format($order->total_price, 0, '.', ' ') . " грн\n\n"
            . "🛒 *Склад замовлення:*\n"
            . $itemsList
            . "----------------------------------";

        // Отправляем обычный POST-запрос, который слушается AppServiceProvider
        \Illuminate\Support\Facades\Http::post("https://api.telegram.org/bot" . env('TELEGRAM_BOT_TOKEN') . "/sendMessage", [
            'chat_id' => env('TELEGRAM_ADMIN_CHAT_ID'),
            'text' => $message,
            'parse_mode' => 'Markdown',
        ]);

        // 4. очищаем корзину
        session()->forget('cart');

        return redirect()->route('shop.index')
            ->with('success', 'Замовлення підтверджено');
    }
}
