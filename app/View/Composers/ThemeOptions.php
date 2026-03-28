<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class ThemeOptions extends Composer
{
    protected static $views = [
        'admin.theme-options',
    ];

    public function with(): array
    {
        return [
            // 'siteName' => get_bloginfo('name', 'display'),
            // 'adminUrl' => admin_url(),
        ];
    }
}
