<?php

namespace App\Http\Controllers;
use App\Models\Catalog;

use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function index()
    {

        return view('admin');

        //return response()->json(Catalog::all(), 200, [], JSON_UNESCAPED_UNICODE);
    }
}
