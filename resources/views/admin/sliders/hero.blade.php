@extends('layouts.admin')

@section('content')
    <flux:main>
        <flux:callout icon="information-circle" class="mb-4">
            <flux:callout.heading>{{ __('Manage Hero Slides', 'sage') }}</flux:callout.heading>
            <flux:callout.text>
                {{ __('You can manage your hero slides directly in the WordPress editor.', 'sage') }}
                <flux:callout.link href="{{ admin_url('edit.php?post_type=hero_slide') }}" target="_parent">
                    {{ __('Open Hero Slides in WordPress Admin', 'sage') }}
                </flux:callout.link>
            </flux:callout.text>
        </flux:callout>

        <flux:heading size="xl">{{ __('Hero Slides', 'sage') }}</flux:heading>
        <flux:separator variant="subtle" class="my-4" />

        <livewire:admin.sliders.hero-slider />
    </flux:main>
@endsection
