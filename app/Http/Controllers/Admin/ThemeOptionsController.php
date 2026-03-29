<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class ThemeOptionsController extends Controller
{
    public function index()
    {
        if (! current_user_can('manage_options')) {
            wp_redirect(wp_login_url());
            exit;
        }

        return view('admin.theme-options');
    }

    public function heroSlider()
    {
        if (! current_user_can('manage_options')) {
            wp_redirect(wp_login_url());
            exit;
        }

        return view('admin.sliders.hero');
    }
}
