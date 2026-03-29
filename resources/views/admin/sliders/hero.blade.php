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

        <livewire:admin.sliders.hero-slider />
    </flux:main>
@endsection
