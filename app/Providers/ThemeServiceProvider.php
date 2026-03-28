<?php

namespace App\Providers;

use Roots\Acorn\Sage\SageServiceProvider;

class ThemeServiceProvider extends SageServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        parent::register();
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

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
                'show_in_menu' => true,
                'show_in_rest' => true,
                'supports' => ['title', 'editor', 'thumbnail', 'page-attributes'],
                'menu_icon' => 'dashicons-images-alt2',
                'rewrite' => false,
            ]);
        });

        add_shortcode('livewire', function ($atts) {
            $atts = shortcode_atts(['component' => ''], $atts);

            if (empty($atts['component'])) {
                return '';
            }

            return \Livewire\Livewire::mount($atts['component']);
        });
    }
}
