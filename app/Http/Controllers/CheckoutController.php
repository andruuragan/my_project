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
     * Сторінка оформлення замовлення
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
     * Обробка замовлення з кошика
     */
    public function store(Request $request)
    {
        $cart = session('cart', []);

        if (empty($cart)) {
            return redirect()->route('cart.index')
                ->with('error', 'Кошик порожній');
        }

        // 1. Створюємо замовлення
        $order = Order::create([
            'user_id' => auth()->id(),
            'total_price' => 0, // Тимчасово
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

        // 2. Оновлюємо підсумкову вартість
        $order->update([
            'total_price' => $total,
        ]);

        // 3. Відправка сповіщення в Telegram
        try {
            Notification::route('telegram', env('TELEGRAM_ADMIN_CHAT_ID'))
                ->notify(new OrderCreatedNotification($order));
        } catch (\Exception $e) {
            logger()->error("Telegram failed: " . $e->getMessage());
        }

        // 4. Очищаємо кошик (дублікат прибрано)
        session()->forget('cart');

        return redirect()->route('shop.index')
            ->with('success', 'Замовлення підтверджено');
    }

    /**
     * Обробка заявок на монтаж димоходу (Лід-форма)
     */
    public function storeLead(Request $request)
    {
        // 1. Валідація вхідних даних
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'device_type' => 'required|string',
        ]);

        // 2. Миттєве сповіщення в Telegram про нову заявку на замір
        try {
            $chatId = env('TELEGRAM_ADMIN_CHAT_ID');
            $botToken = env('TELEGRAM_BOT_TOKEN'); // Переконайся, що цей токен є в .env

            if ($chatId && $botToken) {
               $text = "🛠️ <b>НОВА ЗАЯВКА НА КОНСУЛЬТАЦІЮ</b> 🛠️\n\n"
      . "👤 <b>Ім'я:</b> " . e($validated['name']) . "\n"
      . "📞 <b>Телефон:</b> " . e($validated['phone']) . "\n"
      . "🔥 <b>Опалювальний прилад:</b> " . e($validated['device_type']);

Http::post("https://api.telegram.org/bot{$botToken}/sendMessage", [
    'chat_id' => $chatId,
    'text' => $text,
    'parse_mode' => 'HTML', // Замінили на HTML
]);
            }
        } catch (\Exception $e) {
            logger()->error("Telegram lead notification failed: " . $e->getMessage());
        }

        // 3. Повертаємо користувача назад із сесійним повідомленням
        return response()->json(['success' => 'Дякуємо! Заявку успішно прийнято.']);
         //return redirect()->back()->with('success', 'Дякуємо! Заявку успішно прийнято. Наш інженер зв\'яжеться з вами найближчим часом.');
    }
}