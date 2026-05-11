<?php

namespace App\Http\Controllers\Catalog;
use App\Http\Controllers\Controller;
use App\Models\Catalog;
use App\Models\Description;


use Illuminate\Http\Request;

class CreateController extends Controller
{
   public function __invoke()
   {
       $descriptions = Description::all();

       return view('catalog.create', compact('descriptions'));
   }
}
