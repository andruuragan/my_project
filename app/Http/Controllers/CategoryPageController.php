<?php

namespace App\Http\Controllers;

use App\Models\Catalog;
use Illuminate\Http\Request;

class CategoryPageController extends Controller
{
    public function index()
    {
        return view('categories.index');
    }

public function search(Request $request)
{
    $query = Catalog::query();

    if ($request->filled('equipment')) {
        $query->where('grade', $request->equipment);
    }

    if ($request->filled('mount')) {
        $query->where('chimneyType', $request->mount);
    }
    if ($request->filled('casing')) {
    $query->where('casing', $request->casing);
}

    if ($request->filled('diameter')) {
        $query->where('diameter', $request->diameter);
    }

    if ($request->filled('thickness')) {
        $query->where('thickness', $request->thickness);
    }

    $catalogs = $query->get();
    $recommended = collect();

if (
    $request->mount === 'Термо' &&
    $request->casing === 'н/оц'
) {
    $recommended = collect();

    // Конус, Старт-сендвіч, Термоґрибок — учитываем толщину
    $recommended = $recommended->merge(
        Catalog::query()
            ->where('chimneyType', 'Термо')
            ->where('casing', 'н/н')
            ->where('diameter', $request->diameter)
            ->where('thickness', $request->thickness)
             ->where('grade', $request->equipment)
            ->whereIn('type', [
                'Конус',
                'Термоґрибок',
                'Старт-сендвіч',
            ])
            ->whereNotIn('id', $catalogs->pluck('id'))
            ->get()
    );

    // Разгрузочная подставка — без учета толщины
    $recommended = $recommended->merge(
        Catalog::query()
            ->where('chimneyType', 'Термо')
            ->where('casing', 'н/н')
            ->where('diameter', $request->diameter)
            ->where('type', 'Розвантажувальна підставка')
            ->whereNotIn('id', $catalogs->pluck('id'))
            ->get()
    );
}
   return response()->json([
    'html' => view('partials.cards', [
        'catalogs' => $catalogs,
        'recommended' => $recommended,
    ])->render()
]);
}
}