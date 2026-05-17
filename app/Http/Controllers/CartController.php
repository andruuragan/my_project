<?php

namespace App\Http\Controllers;

use App\Models\Catalog;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);

        return view('cart.index', compact('cart'));
    }

    public function add(Request $request, Catalog $catalog)
    {
        if (!auth()->check()) {

            return back()->with('error', 'Спочатку увійдіть в акаунт');

        }
        $cart = session()->get('cart', []);

        // количество
        $qty = (int) $request->qty;

        if ($qty < 1) {
            $qty = 1;
        }

        // если товар уже есть
        if (isset($cart[$catalog->id])) {

            $cart[$catalog->id]['qty'] += $qty;

        } else {

            $cart[$catalog->id] = [
                'id' => $catalog->id,
                'title' => $catalog->name,
                'price' => $catalog->price,
                'image' => $catalog->image,
                'qty' => $qty,
            ];
        }

        session()->put('cart', $cart);

        return back()->with('success', 'Товар додано в кошик');
    }
    public function remove($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
        }

        session()->put('cart', $cart);

        return back()->with('success', 'Товар видалено з кошика');
    }
    public function update(Request $request, $id)
    {
        $cart = session()->get('cart', []);

        if (!isset($cart[$id])) {
            return response()->json(['error' => 'not found'], 404);
        }

        $qty = max(1, (int) $request->qty);

        $cart[$id]['qty'] = $qty;

        session()->put('cart', $cart);

        $total = 0;
        $count = 0;

        foreach ($cart as $item) {
            $total += $item['price'] * $item['qty'];
            $count += $item['qty'];
        }

        return response()->json([
            'total' => $total,
            'count' => $count,
        ]);
    }

    public function clear()
    {
        session()->forget('cart');

        return back();
    }
}
