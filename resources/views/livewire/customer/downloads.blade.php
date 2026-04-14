<div class="space-y-4">
    <flux:heading size="xl">{{ __('Downloads', 'sage') }}</flux:heading>

    <flux:table>
        <flux:table.columns>
            <flux:table.column>{{ __('Product', 'sage') }}</flux:table.column>
            <flux:table.column>{{ __('Downloads remaining', 'sage') }}</flux:table.column>
            <flux:table.column>{{ __('Expires', 'sage') }}</flux:table.column>
            <flux:table.column></flux:table.column>
        </flux:table.columns>
        <flux:table.rows>
            @forelse ($downloads as $download)
                <flux:table.row>
                    <flux:table.cell>{{ $download['product_name'] }}</flux:table.cell>
                    <flux:table.cell>
                        {{ $download['downloads_remaining'] ?: __('Unlimited', 'sage') }}
                    </flux:table.cell>
                    <flux:table.cell>
                        {{ $download['access_expires'] ? date('M j, Y', strtotime($download['access_expires'])) : __('Never', 'sage') }}
                    </flux:table.cell>
                    <flux:table.cell>
                        <flux:button size="sm" variant="ghost" href="{{ $download['download_url'] }}">
                            {{ __('Download', 'sage') }}
                        </flux:button>
                    </flux:table.cell>
                </flux:table.row>
            @empty
                <flux:table.row>
                    <flux:table.cell colspan="4">
                        {{ __('No downloads available.', 'sage') }}
                    </flux:table.cell>
                </flux:table.row>
            @endforelse
        </flux:table.rows>
    </flux:table>
</div>
