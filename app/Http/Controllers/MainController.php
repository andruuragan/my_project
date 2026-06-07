<?php

namespace App\Http\Controllers;

class MainController extends Controller
{
    public function index()
    {
        // Тільки базова інформація для вітрини
        return view('main');
    }
}