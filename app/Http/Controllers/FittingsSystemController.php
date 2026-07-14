<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FittingsSystemController extends Controller
{
    /**
     * Страница системи кріплень та комплектуючих.
     */
    public function index()
    {
        return view('categories.fittings');
    }
}