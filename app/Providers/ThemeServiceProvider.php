<?php

namespace App\Providers;

use App\Http\Middleware\CustomerMiddleware;
use Roots\Acorn\Sage\SageServiceProvider;

class ThemeServiceProvider extends SageServiceProvider
{
    public function register(): void
    {
        parent::register();
    }

    public function boot(): void
    {
        parent::boot();

        (new CustomerMiddleware)->handle();
    }
}
