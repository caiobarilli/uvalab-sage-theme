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

        @if ($myaccountPageId)
            @if (str_contains($myaccountContent ?? '', 'uvalab_my_account'))
                <flux:callout icon="check-circle" variant="success" inline>
                    <flux:callout.heading>{{ __('My Account page is using Uvalab', 'sage') }}</flux:callout.heading>
                    <flux:callout.text>{{ __('The page', 'sage') }} "{{ $myaccountTitle }}"
                        {{ __('is using', 'sage') }} <code>[uvalab_my_account]</code>.
                    </flux:callout.text>
                </flux:callout>
            @elseif(str_contains($myaccountContent ?? '', 'woocommerce_my_account'))
                <flux:callout icon="exclamation-triangle" variant="warning" inline>
                    <flux:callout.heading>{{ __('My Account page is using WooCommerce default', 'sage') }}
                    </flux:callout.heading>
                    <flux:callout.text>{{ __('Replace', 'sage') }} <code>[woocommerce_my_account]</code>
                        {{ __('with', 'sage') }}
                        <code>[uvalab_my_account]</code>
                        {{ __('in the My Account page.', 'sage') }}
                    </flux:callout.text>
                    <x-slot name="actions">
                        <flux:button href="{{ admin_url('post.php?post=' . $myaccountPageId . '&action=edit') }}"
                            target="_parent">
                            {{ __('Edit My Account page', 'sage') }}
                        </flux:button>
                    </x-slot>
                </flux:callout>
            @else
                <flux:callout icon="exclamation-triangle" variant="warning" inline>
                    <flux:callout.heading>{{ __('My Account page has no shortcode', 'sage') }}</flux:callout.heading>
                    <flux:callout.text>{{ __('Add', 'sage') }} <code>[uvalab_my_account]</code>
                        {{ __('to the My Account page.', 'sage') }}</flux:callout.text>
                    <x-slot name="actions">
                        <flux:button href="{{ admin_url('post.php?post=' . $myaccountPageId . '&action=edit') }}"
                            target="_parent">
                            {{ __('Edit My Account page', 'sage') }}
                        </flux:button>
                    </x-slot>
                </flux:callout>
            @endif
        @else
            <flux:callout icon="exclamation-triangle" variant="danger" inline>
                <flux:callout.heading>{{ __('My Account page not found', 'sage') }}</flux:callout.heading>
                <flux:callout.text>
                    {{ __('WooCommerce My Account page is not configured. Set it up in WooCommerce Advanced', 'sage') }}
                    settings.</flux:callout.text>
                <x-slot name="actions">
                    <flux:button href="{{ admin_url('admin.php?page=wc-settings&tab=advanced') }}" target="_parent">
                        {{ __('Configure My Account page', 'sage') }}
                    </flux:button>
                </x-slot>
            </flux:callout>
        @endif

    </div>
</div>
