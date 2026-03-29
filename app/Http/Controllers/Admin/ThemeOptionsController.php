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

    public function heroSlider()
    {
        if (! current_user_can('manage_options')) {
            abort(403);
        }

        $query = new \WP_Query([
            'post_type' => 'hero_slide',
            'posts_per_page' => -1,
            'orderby' => 'menu_order',
            'order' => 'ASC',
            'post_status' => ['publish', 'draft'],
        ]);

        return view('admin.sliders.hero', [
            'slides' => $query->posts,
        ]);
    }
}
