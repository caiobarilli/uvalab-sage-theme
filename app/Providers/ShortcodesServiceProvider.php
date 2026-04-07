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

        add_shortcode('footer_nav', function () {
            if (! has_nav_menu('footer_navigation')) {
                return '';
            }

            return wp_nav_menu([
                'theme_location' => 'footer_navigation',
                'menu_class' => 'site-footer__menu',
                'container' => 'nav',
                'container_class' => 'site-footer__nav site-footer__nav--custom',
                'container_aria_label' => __('Footer Navigation', 'sage'),
                'echo' => false,
            ]);
        });
    }
}
