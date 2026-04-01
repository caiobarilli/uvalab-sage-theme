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
    }
}
