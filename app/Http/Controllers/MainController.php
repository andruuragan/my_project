<?php

namespace App\Http\Controllers;

use App\Models\Catalog;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        // 1. ТОП-4 найпопулярніших товарів за лайками (без виклику несуexisting зв'язку)
        $popularCatalogs = Catalog::withCount('likedByUsers')
            ->orderBy('liked_by_users_count', 'desc')
            ->take(4)
            ->get();

        // 2. Останні новинки за ID
        $latestCatalogs = Catalog::orderBy('id', 'desc')->take(4)->get();

        return view('main', compact('popularCatalogs', 'latestCatalogs'));
    }
}
