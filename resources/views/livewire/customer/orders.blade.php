<div class="space-y-4">
    <flux:heading size="xl">{{ __('Orders', 'sage') }}</flux:heading>

    <flux:table>
        <flux:table.columns>
            <flux:table.column>{{ __('Order', 'sage') }}</flux:table.column>
            <flux:table.column>{{ __('Date', 'sage') }}</flux:table.column>
            <flux:table.column>{{ __('Status', 'sage') }}</flux:table.column>
            <flux:table.column>{{ __('Total', 'sage') }}</flux:table.column>
            <flux:table.column></flux:table.column>
        </flux:table.columns>
        <flux:table.rows>
            @forelse ($orders as $order)
                <flux:table.row>
                    <flux:table.cell>#{{ $order->get_order_number() }}</flux:table.cell>
                    <flux:table.cell>{{ $order->get_date_created()->date('M j, Y') }}</flux:table.cell>
                    <flux:table.cell>
                        <flux:badge size="sm" inset="top bottom"
                            color="{{ $order->get_status() === 'completed' ? 'green' : ($order->get_status() === 'processing' ? 'yellow' : 'zinc') }}">
                            {{ wc_get_order_status_name($order->get_status()) }}
                        </flux:badge>
                    </flux:table.cell>
                    <flux:table.cell>{!! $order->get_formatted_order_total() !!}</flux:table.cell>
                    <flux:table.cell>
                        <flux:button size="sm" variant="ghost" href="{{ $order->get_view_order_url() }}">
                            {{ __('View', 'sage') }}
                        </flux:button>
                    </flux:table.cell>
                </flux:table.row>
            @empty
                <flux:table.row>
                    <flux:table.cell colspan="5">
                        {{ __('No orders found.', 'sage') }}
                    </flux:table.cell>
                </flux:table.row>
            @endforelse
        </flux:table.rows>
    </flux:table>
</div>
