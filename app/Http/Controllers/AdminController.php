<?php

namespace App\Http\Controllers;
use App\Models\Catalog;
use Illuminate\Support\Facades\DB; // Обов'язково перевірив наявність цього рядка!
use Illuminate\Http\Request;


class AdminController extends Controller
{

    public function index() {
        // Витягуємо товари, у яких є хоча б один лайк, і сортуємо їх від найпопулярніших
        $popularProducts = Catalog::withCount('likedByUsers')
            ->has('likedByUsers')
            ->orderBy('liked_by_users_count', 'desc')
            ->take(10) // покажемо ТОП-10
            ->get();

        return view('admin', compact('popularProducts')); // або як там твій шаблон називається
    }
    public function resetLikes($id)
    {
        try {
            // Видаляємо всі лайки цього товару з таблиці wishlists
            DB::table('wishlists')->where('catalog_id', $id)->delete();

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
