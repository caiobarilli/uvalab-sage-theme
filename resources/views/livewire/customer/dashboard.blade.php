<div class="space-y-4">
    <flux:heading size="xl">{{ __('Dashboard', 'sage') }}</flux:heading>

    <flux:text>
        {!! sprintf(
            esc_html__('Hello %1$s (not %1$s? %2$sLog out%3$s)', 'sage'),
            '<strong>' . esc_html($displayName) . '</strong>',
            '<a href="' . esc_url(route('auth.logout')) . '" class="underline">',
            '</a>',
        ) !!}
    </flux:text>

    <flux:text>
        {{ __('From your account dashboard you can view your recent orders, manage your shipping and billing addresses, and edit your password and account details.', 'sage') }}
    </flux:text>
</div>
