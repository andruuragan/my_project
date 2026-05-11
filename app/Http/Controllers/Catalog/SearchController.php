<?php

namespace App\Http\Controllers\Catalog;
use App\Http\Controllers\Controller;
use App\Models\Catalog;
use Illuminate\Http\Request;






class SearchController extends Controller
{
    public function __invoke(Request $request)
    {
        $query = Catalog::query();

        // 🔍 поиск по названию
        if ($request->filled('name')) {
            $query->where('name', 'like', '%' . $request->name . '%');
        }

        // 🔧 фильтр тип
        if ($request->filled('type')) {
            $query->where('type', $request->type);
        }

        if ($request->filled('thickness')) {
            $query->where('thickness', $request->thickness);
        }

        if ($request->filled('grade')) {
            $query->where('grade', $request->grade);
        }

        // 📏 диаметр
        if ($request->filled('diameter')) {
            $query->where('diameter', $request->diameter);
        }

        if ($request->filled('chimneyType')) {
            $query->where('chimneyType', $request->chimneyType);
        }

        if ($request->filled('casing')) {
            $query->where('casing', $request->casing);
        }

        // 💰 цена (до)
        if ($request->filled('price_to')) {
            $query->where('price', '<=', $request->price_to);
        }

        $items = $query->paginate(10)->withQueryString();

        return view('catalog.search', compact('items'));
    }
}
