<div>
    <flux:table>
        <flux:table.columns>
            <flux:table.column>{{ __('Title', 'sage') }}</flux:table.column>
            <flux:table.column>{{ __('Status', 'sage') }}</flux:table.column>
            <flux:table.column>{{ __('Date', 'sage') }}</flux:table.column>
            <flux:table.column></flux:table.column>
        </flux:table.columns>

        <flux:table.rows>
            @forelse ($this->slides as $slide)
                <flux:table.row>
                    <flux:table.cell>{{ $slide->post_title }}</flux:table.cell>
                    <flux:table.cell>
                        <flux:badge color="{{ $slide->post_status === 'publish' ? 'green' : 'zinc' }}" size="sm"
                            inset="top bottom">
                            {{ ucfirst($slide->post_status) }}
                        </flux:badge>
                    </flux:table.cell>
                    <flux:table.cell>{{ date('M j, Y', strtotime($slide->post_date)) }}</flux:table.cell>
                    <flux:table.cell>
                        <div class="flex gap-2">
                            <flux:button size="sm" variant="ghost"
                                href="{{ admin_url('post.php?post=' . $slide->ID . '&action=edit') }}" target="_parent">
                                {{ __('Edit', 'sage') }}
                            </flux:button>
                            <flux:button size="sm" variant="danger" wire:click="onDeleteModal({{ $slide->ID }})">
                                {{ __('Delete', 'sage') }}
                            </flux:button>
                        </div>
                    </flux:table.cell>
                </flux:table.row>
            @empty
                <flux:table.row>
                    <flux:table.cell colspan="4">{{ __('No hero slides found.', 'sage') }}</flux:table.cell>
                </flux:table.row>
            @endforelse
        </flux:table.rows>
    </flux:table>

    <flux:modal name="delete" class="min-w-[22rem]">
        <div class="space-y-6">
            <div>
                <flux:heading size="lg">{{ __('Delete slide?', 'sage') }}</flux:heading>
                <flux:text class="mt-2">
                    {{ __('You\'re about to delete', 'sage') }} <strong>{{ $title }}</strong>.<br>
                    {{ __('This action cannot be reversed.', 'sage') }}
                </flux:text>
            </div>
            <div class="flex gap-2">
                <flux:spacer />
                <flux:modal.close>
                    <flux:button variant="ghost">{{ __('Cancel', 'sage') }}</flux:button>
                </flux:modal.close>
                <flux:button variant="danger" wire:click="onDelete">{{ __('Delete slide', 'sage') }}</flux:button>
            </div>
        </div>
    </flux:modal>
</div>
