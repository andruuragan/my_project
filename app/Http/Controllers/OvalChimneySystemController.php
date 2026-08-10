<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class OvalChimneySystemController extends Controller
{
    public function __invoke(): View
    {
        return view('categories.oval-chimney-system');
    }
}