<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class ThemeOptionsController extends Controller
{
    public function index()
    {
        if (! current_user_can('manage_options')) {
            abort(403);
        }

        return view('admin.theme-options');
    }
}
