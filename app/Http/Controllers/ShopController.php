<?php

namespace App\Http\Controllers;

use App\Models\Catalog;
use Illuminate\Http\Request;

class ShopController extends Controller
{
   public function index(Request $request)
{
    $query = Catalog::query();

    if ($request->filled('name')) {
        $query->where('name', 'like', '%' . $request->name . '%');
    }

    if ($request->filled('type')) {
        $query->where('type', $request->type);
    }

    if ($request->filled('thickness')) {
        $query->where('thickness', $request->thickness);
    }

    if ($request->filled('grade')) {
        $query->where('grade', $request->grade);
    }

    if ($request->filled('diameter')) {
        $query->where('diameter', $request->diameter);
    }

    if ($request->filled('chimneyType')) {
        $query->where('chimneyType', $request->chimneyType);
    }

    if ($request->filled('casing')) {
        $query->where('casing', $request->casing);
    }

    if ($request->filled('price_to')) {
        $query->where('price', '<=', $request->price_to);
    }

    switch ($request->input('sort')) {
        case 'price_asc':
            $query->orderBy('price', 'asc');
            break;

        case 'price_desc':
            $query->orderBy('price', 'desc');
            break;

        case 'name_asc':
            $query->orderBy('name', 'asc');
            break;

        default:
            $query->orderBy('id', 'asc');
            break;
    }

    $catalogs = $query->paginate(32)->withQueryString();

    // ОБЩИЙ СЧЁТ ВСЕХ РЕЗУЛЬТАТОВ (ВАЖНО!)
    $total = $catalogs->total();

    if ($request->ajax()) {
        return response()->json([
            'html'  => view('partials.products', compact('catalogs'))->render(),
            'total' => $total,
        ]);
    }

    return view('shop', compact('catalogs', 'total'));
}
}