<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ShortcodesServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        add_shortcode('livewire', function ($atts) {
            $atts = shortcode_atts(['component' => ''], $atts);

            if (empty($atts['component'])) {
                return '';
            }

            return \Livewire\Livewire::mount($atts['component']);
        });
    }
}
