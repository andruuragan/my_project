<?php

namespace App\Http\Controllers;

use App\Models\Catalog;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        // 1. Завантажуємо ТОП-4 найпопулярніших товарів за лайками
        $popularCatalogs = Catalog::withCount('likedByUsers')
            ->orderBy('liked_by_users_count', 'desc')
            ->take(4)
            ->get();

        // 2. Сюди ж можна додати, наприклад, просто останні новинки (якщо треба)
        $latestCatalogs = Catalog::latest()->take(4)->get();

        // Передаємо ВСЕ в одну в'юшку головної сторінки
        return view('main', compact('popularCatalogs', $latestCatalogs));
    }
}
