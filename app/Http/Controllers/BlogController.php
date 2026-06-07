<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
   public function showInstallationErrors() {
    return view('blog.installation-errors');
}
}

