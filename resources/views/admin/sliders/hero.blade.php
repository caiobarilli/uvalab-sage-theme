@extends('layouts.admin')

@section('content')
    <flux:main>
        <flux:callout icon="information-circle" class="mb-4">
            <flux:callout.heading>Manage Hero Slides</flux:callout.heading>
            <flux:callout.text>
                You can manage your hero slides directly in the WordPress editor.
                <flux:callout.link href="{{ admin_url('edit.php?post_type=hero_slide') }}" target="_parent">
                    Open Hero Slides in WordPress Admin
                </flux:callout.link>
            </flux:callout.text>
        </flux:callout>

        <flux:heading size="xl">Hero Slides</flux:heading>
        <flux:separator variant="subtle" class="my-4" />

        <flux:table>
            <flux:table.columns>
                <flux:table.column>Title</flux:table.column>
                <flux:table.column>Status</flux:table.column>
                <flux:table.column>Date</flux:table.column>
                <flux:table.column></flux:table.column>
            </flux:table.columns>

            <flux:table.rows>
                @forelse ($slides as $slide)
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

                                <flux:modal.trigger name="delete-slide-{{ $slide->ID }}">
                                    <flux:button size="sm" variant="danger">Delete</flux:button>
                                </flux:modal.trigger>
                            </div>

                            <flux:modal name="delete-slide-{{ $slide->ID }}" class="min-w-[22rem]">
                                <div class="space-y-6">
                                    <div>
                                        <flux:heading size="lg">Delete slide?</flux:heading>
                                        <flux:text class="mt-2">
                                            You're about to delete <strong>{{ $slide->post_title }}</strong>.<br>
                                            This action cannot be reversed.
                                        </flux:text>
                                    </div>
                                    <div class="flex gap-2">
                                        <flux:spacer />
                                        <flux:modal.close>
                                            <flux:button variant="ghost">Cancel</flux:button>
                                        </flux:modal.close>
                                        <flux:button type="submit" variant="danger">Delete slide</flux:button>
                                    </div>
                                </div>
                            </flux:modal>
                        </flux:table.cell>
                    </flux:table.row>
                @empty
                    <flux:table.row>
                        <flux:table.cell colspan="4">No hero slides found.</flux:table.cell>
                    </flux:table.row>
                @endforelse
            </flux:table.rows>
        </flux:table>
    </flux:main>
@endsection
