<div>
    <flux:heading size="lg" class="mb-4">Theme Status</flux:heading>

    <div class="space-y-3">

        @if ($wooInstalled)
            <flux:callout icon="check-circle" variant="success" inline>
                <flux:callout.heading>WooCommerce is installed and active</flux:callout.heading>
                <flux:callout.text>Version {{ $wooVersion }}</flux:callout.text>
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

        @if ($comingSoon)
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

        @if ($myaccountPageId)
            @if (str_contains($myaccountContent ?? '', 'uvalab_my_account'))
                <flux:callout icon="check-circle" variant="success" inline>
                    <flux:callout.heading>My Account page is using Uvalab</flux:callout.heading>
                    <flux:callout.text>The page "{{ $myaccountTitle }}" is using <code>[uvalab_my_account]</code>.
                    </flux:callout.text>
                </flux:callout>
            @elseif(str_contains($myaccountContent ?? '', 'woocommerce_my_account'))
                <flux:callout icon="exclamation-triangle" variant="warning" inline>
                    <flux:callout.heading>My Account page is using WooCommerce default</flux:callout.heading>
                    <flux:callout.text>Replace <code>[woocommerce_my_account]</code> with
                        <code>[uvalab_my_account]</code>
                        in the My Account page.
                    </flux:callout.text>
                    <x-slot name="actions">
                        <flux:button href="{{ admin_url('post.php?post=' . $myaccountPageId . '&action=edit') }}"
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
                        <flux:button href="{{ admin_url('post.php?post=' . $myaccountPageId . '&action=edit') }}"
                            target="_parent">
                            Edit My Account page
                        </flux:button>
                    </x-slot>
                </flux:callout>
            @endif
        @else
            <flux:callout icon="exclamation-triangle" variant="danger" inline>
                <flux:callout.heading>My Account page not found</flux:callout.heading>
                <flux:callout.text>WooCommerce My Account page is not configured. Set it up in WooCommerce Advanced
                    settings.</flux:callout.text>
                <x-slot name="actions">
                    <flux:button href="{{ admin_url('admin.php?page=wc-settings&tab=advanced') }}" target="_parent">
                        Configure My Account page
                    </flux:button>
                </x-slot>
            </flux:callout>
        @endif

    </div>
</div>
