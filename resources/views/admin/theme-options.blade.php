@extends('layouts.admin')

@section('content')
    <flux:main>
        <flux:heading size="xl">Theme Options</flux:heading>
        <flux:text class="mt-2 mb-6">Theme status and configuration overview.</flux:text>
        <flux:separator variant="subtle" class="my-6" />

        <flux:heading size="lg" class="mb-4">System Status</flux:heading>

        <div class="space-y-3">

            @if (function_exists('WC'))
                <flux:callout icon="check-circle" variant="success" inline>
                    <flux:callout.heading>WooCommerce is installed and active</flux:callout.heading>
                    <flux:callout.text>Version {{ WC()->version }}</flux:callout.text>
                </flux:callout>
            @else
                <flux:callout icon="exclamation-triangle" variant="danger" inline>
                    <flux:callout.heading>WooCommerce is not installed</flux:callout.heading>
                    <flux:callout.text>Uvalab requires WooCommerce to run properly.</flux:callout.text>
                    <x-slot name="actions">
                        <flux:button href="{{ admin_url('plugin-install.php?s=woocommerce&tab=search&type=term') }}"
                            target="_parent">
                            Install WooCommerce
                        </flux:button>
                    </x-slot>
                </flux:callout>
            @endif

            @if (get_option('woocommerce_coming_soon') === 'yes')
                <flux:callout icon="exclamation-triangle" variant="warning" inline>
                    <flux:callout.heading>Store is in Coming Soon mode</flux:callout.heading>
                    <flux:callout.text>Visitors are being redirected to the Coming Soon page.</flux:callout.text>
                    <x-slot name="actions">
                        <flux:button href="{{ admin_url('admin.php?page=wc-settings&tab=site-visibility') }}"
                            target="_parent">
                            Manage visibility
                        </flux:button>
                    </x-slot>
                </flux:callout>
            @else
                <flux:callout icon="check-circle" variant="success" inline>
                    <flux:callout.heading>Store is live</flux:callout.heading>
                    <flux:callout.text>Your store is visible to all visitors.</flux:callout.text>
                </flux:callout>
            @endif

        </div>

        <flux:separator variant="subtle" class="my-6" />
    </flux:main>
@endsection
