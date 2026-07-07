<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class SingleWallSystemController extends Controller
{
    public function __invoke(): View
    {
        return view('categories.single-wall-system');
    }
}