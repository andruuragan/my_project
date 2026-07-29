<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
   public function showInstallationErrors() {
    return view('blog.installation-errors');
}
public function showSteelGrades()
{
    return view('blog.steel-grades');
}
public function showBasaltWool()
{
    return view('blog.basalt-wool');
}
public function showSoot()
{
    return view('blog.sazha-v-dimohodi');
}
}

