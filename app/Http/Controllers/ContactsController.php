<?php

namespace App\Http\Controllers;
use App\Models\Catalog;

use Illuminate\Http\Request;

class ContactsController extends Controller
{
    public function index()
    {

        return view('contacts');

        //return response()->json(Catalog::all(), 200, [], JSON_UNESCAPED_UNICODE);
    }
}
