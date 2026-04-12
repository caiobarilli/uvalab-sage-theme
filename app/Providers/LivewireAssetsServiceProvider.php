<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Livewire\Mechanisms\FrontendAssets\FrontendAssets;

class LivewireAssetsServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        add_action('wp_footer', function () {
            echo $this->app->make(FrontendAssets::class)->scripts();
        }, 100);
    }
}
