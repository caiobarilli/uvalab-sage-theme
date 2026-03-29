<?php

/**
 * Theme filters.
 */

namespace App;

/**
 * Add "… Continued" to the excerpt.
 *
 * @return string
 */
add_filter('excerpt_more', function () {
    return sprintf(' &hellip; <a href="%s">%s</a>', get_permalink(), __('Continued', 'sage'));
});

add_filter('template_include', function ($template) {
    if (! function_exists('WC')) {
        return $template;
    }

    $coming_soon = get_option('woocommerce_coming_soon');
    $is_admin = current_user_can('manage_options');

    if ($coming_soon === 'yes' && ! $is_admin) {
        wp_redirect(home_url('/coming-soon'));
        exit;
    }

    return $template;
}, 1);
