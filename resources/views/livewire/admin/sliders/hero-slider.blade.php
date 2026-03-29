<div>
    <flux:table>
        <flux:table.columns>
            <flux:table.column>Title</flux:table.column>
            <flux:table.column>Status</flux:table.column>
            <flux:table.column>Date</flux:table.column>
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
                                Edit
                            </flux:button>
                            <flux:button size="sm" variant="danger" wire:click="onDeleteModal({{ $slide->ID }})">
                                Delete
                            </flux:button>
                        </div>
                    </flux:table.cell>
                </flux:table.row>
            @empty
                <flux:table.row>
                    <flux:table.cell colspan="4">No hero slides found.</flux:table.cell>
                </flux:table.row>
            @endforelse
        </flux:table.rows>
    </flux:table>

    <flux:modal name="delete" class="min-w-[22rem]">
        <div class="space-y-6">
            <div>
                <flux:heading size="lg">Delete slide?</flux:heading>
                <flux:text class="mt-2">
                    You're about to delete <strong>{{ $title }}</strong>.<br>
                    This action cannot be reversed.
                </flux:text>
            </div>
            <div class="flex gap-2">
                <flux:spacer />
                <flux:modal.close>
                    <flux:button variant="ghost">Cancel</flux:button>
                </flux:modal.close>
                <flux:button variant="danger" wire:click="onDelete">Delete slide</flux:button>
            </div>
        </div>
    </flux:modal>
</div>
