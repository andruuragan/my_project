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

    return response()->json([
        'html' => view('partials.cards', compact('catalogs'))->render()
    ]);
}
}