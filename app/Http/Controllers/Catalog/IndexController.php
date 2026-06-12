<?php

namespace App\Http\Controllers\Catalog;
use App\Http\Controllers\Controller;
use App\Models\Catalog;


use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        $items = Catalog::orderBy('id', 'asc')->paginate(20);

        return view('catalog.index', compact('items'));
    }
}
