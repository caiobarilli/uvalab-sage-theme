@extends('layouts.app')

@section('content')
    <div class="flex min-h-[60vh] flex-col items-center justify-center text-center px-4">
        <img src="{{ Vite::asset('resources/images/uva-logo.png') }}" alt="Uvalab" class="h-16 mb-8 opacity-80">

        <flux:heading size="xl" class="mb-4">We're coming soon</flux:heading>

        <flux:text class="max-w-md mb-8">
            Our store is currently under construction. We'll be back soon with something amazing.
        </flux:text>

        @if (is_user_logged_in())
            <flux:button href="/" variant="primary">Back to Home</flux:button>
        @endif
    </div>
@endsection
