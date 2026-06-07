<?php
namespace App\Http\Controllers;

use App\Models\Catalog;

class UsefulController extends Controller
{
    public function index()
    {
        // Отримуємо популярні товари саме тут
        $popularCatalogs = Catalog::withCount('likedByUsers')
            ->orderBy('liked_by_users_count', 'desc')
            ->take(7) 
            ->get();

        return view('useful.index', compact('popularCatalogs'));
    }
}