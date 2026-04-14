<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AdminCleanupServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        add_action('admin_menu', [$this, 'removeMenuPages'], 9999);
        add_action('admin_init', [$this, 'blockPages']);
    }

    public function removeMenuPages(): void
    {
        remove_submenu_page('themes.php', 'nav-menus.php');
        remove_submenu_page('themes.php', 'widgets.php');
        remove_submenu_page('themes.php', 'customize.php');
    }

    public function blockPages(): void
    {
        $blocked = [
            'nav-menus.php',
            'widgets.php',
            'customize.php',
        ];

        $currentPage = basename($_SERVER['SCRIPT_NAME'] ?? '');

        if (in_array($currentPage, $blocked, true)) {
            wp_redirect(admin_url());
            exit;
        }
    }
}
