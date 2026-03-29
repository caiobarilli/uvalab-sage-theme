<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class PostTypesServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        add_action('init', function () {
            register_post_type('hero_slide', [
                'labels' => [
                    'name' => 'Hero Slides',
                    'singular_name' => 'Hero Slide',
                    'add_new_item' => 'Add New Slide',
                    'edit_item' => 'Edit Slide',
                ],
                'public' => false,
                'show_ui' => true,
                'show_in_menu' => false,
                'show_in_rest' => true,
                'supports' => ['title', 'editor', 'thumbnail', 'page-attributes'],
                'menu_icon' => 'dashicons-images-alt2',
                'rewrite' => false,
            ]);
        });
    }
}
