<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

        // TODO: тут можно создать Order в БД

        session()->forget('cart');

        return redirect()->route('main.index')
            ->with('success', 'Замовлення оформлено');
    }
}
