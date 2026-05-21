<?php

namespace App\Http\Controllers;

use App\Models\Catalog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    // Клік по сердечку (Додати / Видалити)
    public function toggle(Catalog $catalog)
    {
        if (!Auth::check()) {
            return response()->json(['error' => 'Unauthenticated'], 401);
        }

        $user = Auth::user();

        // Метод toggle() сам перевірить: якщо зв'язок є — видалить, якщо немає — створить
        $status = $user->wishlists()->toggle($catalog->id);

        // Повертаємо фронтенду інформацію: прибрали ми чи додали лайк
        $isAttached = count($status['attached']) > 0;

        return response()->json([
            'success' => true,
            'is_liked' => $isAttached,
            // Рахуємо загальну кількість лайків у цього товару для виведення в топ
            'likes_count' => $catalog->likedByUsers()->count()
        ]);
    }

    // Сторінка «Обрані товари» в особистому кабінеті
    public function index()
    {
        // Називаємо $catalogs, щоб Blade-шаблон відразу її підхопив
        $catalogs = Auth::user()->wishlists()->paginate(12);

        return view('profile.wishlist', compact('catalogs'));
    }
}
