<?php

namespace App\Http\Middleware;

class CustomerMiddleware
{
    public function handle(): void
    {
        add_action('admin_init', function () {
            if (! is_user_logged_in()) {
                return;
            }

            $user = wp_get_current_user();

            if (in_array('subscriber', (array) $user->roles)) {
                wp_redirect('/dashboard');
                exit;
            }
        });
    }
}
