@extends('layouts.admin')

@section('content')
    <div class="mt-2">
        <flux:sidebar collapsible="mobile" class="bg-zinc-50 border-r border-zinc-200">
            <flux:sidebar.header>
                <flux:sidebar.brand href="#" logo="{{ Vite::asset('resources/images/uva-logo.png') }}" name="Uvalab" />
                <flux:sidebar.collapse class="lg:hidden" />
            </flux:sidebar.header>

            <flux:sidebar.nav>
                <flux:sidebar.item icon="cog-6-tooth" href="/uvalab-admin" current>Settings</flux:sidebar.item>
            </flux:sidebar.nav>

            <flux:sidebar.spacer />

            <flux:sidebar.nav>
                <flux:sidebar.item icon="information-circle" href="#">Help</flux:sidebar.item>
            </flux:sidebar.nav>
        </flux:sidebar>

        <flux:header class="lg:hidden">
            <flux:sidebar.toggle class="lg:hidden" icon="bars-2" inset="left" />
            <flux:spacer />
        </flux:header>

        <flux:main>
            <flux:heading size="xl">UvaLab Settings</flux:heading>
            <flux:separator variant="subtle" class="my-8" />
        </flux:main>
    </div>
@endsection
