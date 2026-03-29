@extends('layouts.admin')

@section('content')
    <flux:main>
        <flux:heading size="xl">Theme Options</flux:heading>
        <flux:text class="mt-2 mb-6">Theme status and configuration overview.</flux:text>
        <flux:separator variant="subtle" class="my-6" />

        <flux:heading size="lg" class="mb-4">System Status</flux:heading>

        <livewire:admin.system-status />

        <flux:separator variant="subtle" class="my-6" />
    </flux:main>
@endsection
