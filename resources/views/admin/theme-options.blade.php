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

            @php
                $myaccount_page_id = get_option('woocommerce_myaccount_page_id');
                $myaccount_page = $myaccount_page_id ? get_post($myaccount_page_id) : null;
                $page_content = $myaccount_page ? $myaccount_page->post_content : '';
                $uses_uvalab = str_contains($page_content, 'uvalab_my_account');
                $uses_woo = str_contains($page_content, 'woocommerce_my_account');
            @endphp

            @if ($myaccount_page)
                @if ($uses_uvalab)
                    <flux:callout icon="check-circle" variant="success" inline>
                        <flux:callout.heading>My Account page is using Uvalab</flux:callout.heading>
                        <flux:callout.text>The page "{{ $myaccount_page->post_title }}" is using
                            <code>[uvalab_my_account]</code>.</flux:callout.text>
                    </flux:callout>
                @elseif($uses_woo)
                    <flux:callout icon="exclamation-triangle" variant="warning" inline>
                        <flux:callout.heading>My Account page is using WooCommerce default</flux:callout.heading>
                        <flux:callout.text>Replace <code>[woocommerce_my_account]</code> with
                            <code>[uvalab_my_account]</code> in the My Account page.</flux:callout.text>
                        <x-slot name="actions">
                            <flux:button href="{{ admin_url('post.php?post=' . $myaccount_page_id . '&action=edit') }}"
                                target="_parent">
                                Edit My Account page
                            </flux:button>
                        </x-slot>
                    </flux:callout>
                @else
                    <flux:callout icon="exclamation-triangle" variant="warning" inline>
                        <flux:callout.heading>My Account page has no shortcode</flux:callout.heading>
                        <flux:callout.text>Add <code>[uvalab_my_account]</code> to the My Account page.</flux:callout.text>
                        <x-slot name="actions">
                            <flux:button href="{{ admin_url('post.php?post=' . $myaccount_page_id . '&action=edit') }}"
                                target="_parent">
                                Edit My Account page
                            </flux:button>
                        </x-slot>
                    </flux:callout>
                @endif
            @else
                <flux:callout icon="exclamation-triangle" variant="danger" inline>
                    <flux:callout.heading>My Account page not found</flux:callout.heading>
                    <flux:callout.text>WooCommerce My Account page is not configured.</flux:callout.text>
                </flux:callout>
            @endif
        </div>

        <flux:separator variant="subtle" class="my-6" />
    </flux:main>
@endsection
