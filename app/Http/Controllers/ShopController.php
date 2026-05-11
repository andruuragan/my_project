<?php

namespace App\Http\Controllers;

use App\Models\Catalog;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index(Request $request)
    {
        $query = Catalog::query();

        // поиск
        if ($request->filled('name')) {
            $query->where('name', 'like', '%' . $request->name . '%');
        }

        // тип
        if ($request->filled('type')) {
            $query->where('type', $request->type);
        }

        // толщина
        if ($request->filled('thickness')) {
            $query->where('thickness', $request->thickness);
        }

        // AISI
        if ($request->filled('grade')) {
            $query->where('grade', $request->grade);
        }

        // диаметр
        if ($request->filled('diameter')) {
            $query->where('diameter', $request->diameter);
        }

        // тип дымохода
        if ($request->filled('chimneyType')) {
            $query->where('chimneyType', $request->chimneyType);
        }

        // кожух
        if ($request->filled('casing')) {
            $query->where('casing', $request->casing);
        }

        // цена
        if ($request->filled('price_to')) {
            $query->where('price', '<=', $request->price_to);
        }

        $catalogs = $query
            ->orderBy('id', 'asc')
            ->paginate(12)
            ->withQueryString();

        return view('shop', compact('catalogs'));
    }
}
