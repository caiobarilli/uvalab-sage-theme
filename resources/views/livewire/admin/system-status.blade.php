<div>
    <flux:heading size="lg" class="mb-4">{{ __('Theme Status', 'sage') }}</flux:heading>

    <div class="space-y-3">
        @if ($permalinkOk)
            <flux:callout icon="check-circle" variant="success" inline>
                <flux:callout.heading>{{ __('Permalink structure is correct', 'sage') }}</flux:callout.heading>
                <flux:callout.text>{{ __('Permalink is set to Post name (/%postname%/).', 'sage') }}</flux:callout.text>
            </flux:callout>
        @else
            <flux:callout icon="exclamation-triangle" variant="danger" inline>
                <flux:callout.heading>{{ __('Permalink structure is incorrect', 'sage') }}</flux:callout.heading>
                <flux:callout.text>
                    {{ __('Set permalink structure to Post name (/%postname%/) for routes to work correctly.', 'sage') }}
                </flux:callout.text>
                <x-slot name="actions">
                    <flux:button href="{{ admin_url('options-permalink.php') }}" target="_parent">
                        {{ __('Configure Permalinks', 'sage') }}
                    </flux:button>
                </x-slot>
            </flux:callout>
        @endif

        @if ($wooInstalled)
            <flux:callout icon="check-circle" variant="success" inline>
                <flux:callout.heading>{{ __('WooCommerce is installed and active', 'sage') }}</flux:callout.heading>
                <flux:callout.text>{{ __('Version', 'sage') }} {{ $wooVersion }}</flux:callout.text>
            </flux:callout>

            @if ($productCount === 0)
                <flux:callout icon="exclamation-triangle" variant="warning" inline>
                    <flux:callout.heading>{{ __('No products found', 'sage') }}</flux:callout.heading>
                    <flux:callout.text>
                        {{ __('Your store has no products. Import the sample products to get started.', 'sage') }}
                    </flux:callout.text>
                    <x-slot name="actions">
                        <flux:button href="{{ get_stylesheet_directory_uri() }}/resources/files/sample_products.csv"
                            target="_blank">
                            {{ __('Download sample_products.csv', 'sage') }}
                        </flux:button>
                        <flux:button
                            href="{{ home_url('/wp-admin/edit.php?post_type=product&page=product_importer&wc_onboarding_active_task=products') }}"
                            target="_parent">
                            {{ __('Import Products', 'sage') }}
                        </flux:button>
                    </x-slot>
                </flux:callout>
            @endif

            @if ($comingSoon)
                <flux:callout icon="exclamation-triangle" variant="warning" inline>
                    <flux:callout.heading>{{ __('Store is in Coming Soon mode', 'sage') }}</flux:callout.heading>
                    <flux:callout.text>{{ __('Visitors are being redirected to the Coming Soon page.', 'sage') }}
                    </flux:callout.text>
                    <x-slot name="actions">
                        <flux:button href="{{ admin_url('admin.php?page=wc-settings&tab=site-visibility') }}"
                            target="_parent">
                            {{ __('Manage visibility', 'sage') }}
                        </flux:button>
                    </x-slot>
                </flux:callout>
            @else
                <flux:callout icon="check-circle" variant="success" inline>
                    <flux:callout.heading>{{ __('Store is live', 'sage') }}</flux:callout.heading>
                    <flux:callout.text>{{ __('Your store is visible to all visitors.', 'sage') }}</flux:callout.text>
                </flux:callout>
            @endif

            @if (!$myaccountPageId)
                <flux:callout icon="exclamation-triangle" variant="danger" inline>
                    <flux:callout.heading>{{ __('My Account page not found', 'sage') }}</flux:callout.heading>
                    <flux:callout.text>
                        {{ __('WooCommerce My Account page is not configured. Set it up in WooCommerce Advanced settings.', 'sage') }}
                    </flux:callout.text>
                    <x-slot name="actions">
                        <flux:button href="{{ admin_url('admin.php?page=wc-settings&tab=advanced') }}"
                            target="_parent">
                            {{ __('Configure My Account page', 'sage') }}
                        </flux:button>
                    </x-slot>
                </flux:callout>
            @endif
        @else
            <flux:callout icon="exclamation-triangle" variant="danger" inline>
                <flux:callout.heading>{{ __('WooCommerce is not installed', 'sage') }}</flux:callout.heading>
                <flux:callout.text>{{ __('Uvalab requires WooCommerce to run properly.', 'sage') }}</flux:callout.text>
                <x-slot name="actions">
                    <flux:button href="{{ admin_url('plugin-install.php?s=woocommerce&tab=search&type=term') }}"
                        target="_parent">
                        {{ __('Install WooCommerce', 'sage') }}
                    </flux:button>
                </x-slot>
            </flux:callout>
        @endif

    </div>
</div>
