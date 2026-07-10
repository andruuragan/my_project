<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SandwichSystemController extends Controller
{
    public function __invoke(Request $request)
    {
        return view('categories.sandwich');
    }
}