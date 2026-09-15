<?php

namespace App\Http\Controllers\Catalog;

use App\Http\Controllers\Controller;
use App\Models\Catalog;
use App\Models\Description;
use App\Models\CatalogGeometry;
use Illuminate\Http\Request;

class CreateController extends Controller
{
    public function __invoke()
    {
        $descriptions = Description::all();
        $geometries = CatalogGeometry::orderBy('name')->get();

        return view('catalog.create', compact('descriptions', 'geometries'));
    }
}

