@extends('layouts.admin')

@section('content')
    <flux:main>
        <flux:heading size="xl">{{ __('Theme Options', 'sage') }}</flux:heading>
        <flux:text class="mt-2 mb-6">{{ __('Theme status and configuration overview.', 'sage') }}</flux:text>
        <flux:separator variant="subtle" class="my-6" />

        <livewire:admin.system-status />

        <flux:separator variant="subtle" class="my-6" />

        <livewire:admin.acorn-cache />

        <flux:separator variant="subtle" class="my-6" />

        <livewire:admin.seeder />

        <flux:separator variant="subtle" class="my-6" />
    </flux:main>
@endsection
