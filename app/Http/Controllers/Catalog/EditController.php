<?php

namespace App\Http\Controllers\Catalog;

use App\Http\Controllers\Controller;
use App\Models\Catalog;
use App\Models\Description;

class EditController extends Controller
{
    public function __invoke(Catalog $catalog)
    {
        $descriptions = Description::all();

        return view('catalog.edit', compact('catalog', 'descriptions'));
    }
}
