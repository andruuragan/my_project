<?php

namespace App\Http\Controllers\Catalog;
use App\Http\Controllers\Controller;
use App\Models\Catalog;


use Illuminate\Http\Request;

class ShowController extends Controller
{
   public function __invoke(Catalog $catalog)
   {
       return view('catalog.show', compact('catalog'));
   }
}
