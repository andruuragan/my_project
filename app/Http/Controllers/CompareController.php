<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Catalog;

class CompareController extends Controller
{
   public function index(Request $request)
{
    $idsString = $request->query('ids', '');

    $ids = array_filter(explode(',', $idsString));
    $ids = array_map('intval', $ids);
    $ids = array_filter($ids);

    if (empty($ids)) {
        return view('compare.index', [
            'products' => collect(),
            'ids' => []
        ]);
    }

    // ✅ ВАЖНО: сохраняем результат
    $products = Catalog::whereIn('id', $ids)->get();

    // сохраняем порядок как в URL
    $products = $products->sortBy(function ($item) use ($ids) {
        return array_search($item->id, $ids);
    })->values();

    return view('compare.index', [
        'products' => $products,
        'ids' => $ids
    ]);
}
}