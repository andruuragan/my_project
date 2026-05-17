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

        return response()->json([
            'success' => true,
            'count' => collect($cart)->sum('qty'),
            'total' => collect($cart)->sum(function ($item) {
                return $item['price'] * $item['qty'];
            }),
        ]);
    }
    public function remove($id)
    {
        $cart = session()->get('cart', []);

        unset($cart[$id]);

        session()->put('cart', $cart);

        return $this->cartResponse($cart);
    }
    public function update(Request $request, $id)
    {
        $cart = session()->get('cart', []);

        if (!isset($cart[$id])) {
            return response()->json(['error' => true]);
        }

        $qty = max(1, (int)$request->qty);

        $cart[$id]['qty'] = $qty;

        session()->put('cart', $cart);

        return $this->cartResponse($cart);
    }

    public function clear()
    {
        session()->forget('cart');

        return response()->json([
            'success' => true
        ]);
    }
    private function cartResponse($cart)
    {
        $total = 0;
        $count = 0;

        foreach ($cart as $item) {
            $total += $item['price'] * $item['qty'];
            $count += $item['qty'];
        }

        return response()->json([
            'count' => $count,
            'total' => $total,
        ]);
    }
    public function state()
    {
        $cart = session('cart', []);

        $count = collect($cart)->sum('qty');
        $total = collect($cart)->sum(fn ($i) => $i['price'] * $i['qty']);

        return response()->json([
            'count' => $count,
            'total' => $total,
        ]);
    }
}
