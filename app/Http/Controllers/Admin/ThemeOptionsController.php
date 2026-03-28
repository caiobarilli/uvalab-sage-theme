<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class ThemeOptionsController extends Controller
{
    public function index()
    {
        return view('admin.theme-options');
    }
}
