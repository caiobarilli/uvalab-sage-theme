<div class="space-y-6">
    <div class="flex items-center gap-4">
        <flux:button variant="ghost" icon="arrow-left" href="{{ route('customer.orders') }}">
            {{ __('Back to orders', 'sage') }}
        </flux:button>
    </div>

    <div class="flex items-center gap-3">
        <flux:heading size="xl">
            {{ sprintf(__('Order #%s', 'sage'), $order->get_order_number()) }}
        </flux:heading>
        <flux:badge size="sm"
            color="{{ $order->get_status() === 'completed' ? 'green' : ($order->get_status() === 'processing' ? 'yellow' : 'zinc') }}">
            {{ wc_get_order_status_name($order->get_status()) }}
        </flux:badge>
    </div>

    {{-- Order info --}}
    <flux:card>
        <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
            <div>
                <flux:text class="text-sm text-zinc-500">{{ __('Date', 'sage') }}</flux:text>
                <flux:text class="font-medium">{{ $order->get_date_created()->date('M j, Y') }}</flux:text>
            </div>
            <div>
                <flux:text class="text-sm text-zinc-500">{{ __('Total', 'sage') }}</flux:text>
                <flux:text class="font-medium">{!! $order->get_formatted_order_total() !!}</flux:text>
            </div>
            <div>
                <flux:text class="text-sm text-zinc-500">{{ __('Email', 'sage') }}</flux:text>
                <flux:text class="font-medium">{{ $order->get_billing_email() }}</flux:text>
            </div>
            <div>
                <flux:text class="text-sm text-zinc-500">{{ __('Payment method', 'sage') }}</flux:text>
                <flux:text class="font-medium">{{ $order->get_payment_method_title() }}</flux:text>
            </div>
        </div>
    </flux:card>

    {{-- Order items --}}
    <flux:heading size="lg">{{ __('Order details', 'sage') }}</flux:heading>

    <flux:table>
        <flux:table.columns>
            <flux:table.column>{{ __('Product', 'sage') }}</flux:table.column>
            <flux:table.column>{{ __('Quantity', 'sage') }}</flux:table.column>
            <flux:table.column>{{ __('Total', 'sage') }}</flux:table.column>
        </flux:table.columns>
        <flux:table.rows>
            @foreach ($order->get_items() as $item)
                <flux:table.row>
                    <flux:table.cell>{{ $item->get_name() }}</flux:table.cell>
                    <flux:table.cell>{{ $item->get_quantity() }}</flux:table.cell>
                    <flux:table.cell>{!! wc_price($item->get_total()) !!}</flux:table.cell>
                </flux:table.row>
            @endforeach
        </flux:table.rows>
    </flux:table>

    {{-- Order totals --}}
    <flux:card>
        <div class="space-y-2 max-w-xs ml-auto">
            <div class="flex justify-between">
                <flux:text>{{ __('Subtotal', 'sage') }}</flux:text>
                <flux:text>{!! wc_price($order->get_subtotal()) !!}</flux:text>
            </div>

            @if ((float) $order->get_shipping_total() > 0)
                <div class="flex justify-between">
                    <flux:text>{{ __('Shipping', 'sage') }}</flux:text>
                    <flux:text>{!! wc_price($order->get_shipping_total()) !!}</flux:text>
                </div>
            @endif

            @if ((float) $order->get_total_tax() > 0)
                <div class="flex justify-between">
                    <flux:text>{{ __('Tax', 'sage') }}</flux:text>
                    <flux:text>{!! wc_price($order->get_total_tax()) !!}</flux:text>
                </div>
            @endif

            @if ((float) $order->get_total_discount() > 0)
                <div class="flex justify-between">
                    <flux:text>{{ __('Discount', 'sage') }}</flux:text>
                    <flux:text>-{!! wc_price($order->get_total_discount()) !!}</flux:text>
                </div>
            @endif

            <flux:separator />

            <div class="flex justify-between font-semibold">
                <flux:text>{{ __('Total', 'sage') }}</flux:text>
                <flux:text>{!! $order->get_formatted_order_total() !!}</flux:text>
            </div>
        </div>
    </flux:card>

    {{-- Addresses --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <flux:card>
            <flux:heading size="lg">{{ __('Billing address', 'sage') }}</flux:heading>
            <flux:text class="mt-2">{!! $order->get_formatted_billing_address() ?: esc_html__('N/A', 'sage') !!}</flux:text>

            @if ($order->get_billing_phone())
                <flux:text class="mt-1">{{ $order->get_billing_phone() }}</flux:text>
            @endif

            @if ($order->get_billing_email())
                <flux:text class="mt-1">{{ $order->get_billing_email() }}</flux:text>
            @endif
        </flux:card>

        <flux:card>
            <flux:heading size="lg">{{ __('Shipping address', 'sage') }}</flux:heading>
            <flux:text class="mt-2">{!! $order->get_formatted_shipping_address() ?: esc_html__('N/A', 'sage') !!}</flux:text>
        </flux:card>
    </div>
</div>
