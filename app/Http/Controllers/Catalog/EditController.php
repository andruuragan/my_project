<?php

namespace App\Http\Controllers\Catalog;

use App\Http\Controllers\Controller;
use App\Models\Catalog;
use App\Models\Description;
use App\Models\CatalogGeometry;

class EditController extends Controller
{
    public function __invoke(Catalog $catalog)
    {
        $descriptions = Description::all();
         $geometries = CatalogGeometry::orderBy('name')->get();
          return view( 'catalog.edit',
           compact('catalog', 'descriptions', 'geometries') );
    }
}
