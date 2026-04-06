<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;

class ShortcodesServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        add_shortcode('livewire', function ($atts) {
            $atts = shortcode_atts(['component' => ''], $atts);

            if (empty($atts['component'])) {
                return '';
            }

            return Livewire::mount($atts['component']);
        });

        add_shortcode('uvalab_my_account', function () {
            return Livewire::mount('customer.dashboard');
        });

        add_shortcode('uvalab_menu', function ($atts) {
            $atts = shortcode_atts([
                'location' => 'primary_navigation',
                'class' => 'site-header__nav',
            ], $atts);

            if (! has_nav_menu($atts['location'])) {
                return '<nav class="'.esc_attr($atts['class']).'" id="site-nav">'
                    .'<a href="'.esc_url(admin_url('nav-menus.php')).'">'
                    .esc_html__('Defina o menu em Primary Navigation', 'sage')
                    .'</a>'
                    .'</nav>';
            }

            return wp_nav_menu([
                'theme_location' => $atts['location'],
                'container' => 'nav',
                'container_class' => $atts['class'],
                'container_id' => 'site-nav',
                'fallback_cb' => false,
                'echo' => false,
            ]);
        });
    }
}
