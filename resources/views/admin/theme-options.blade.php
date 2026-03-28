@extends('layouts.admin')

@section('content')
    <div class="mt-2">
        <flux:sidebar sticky collapsible class="bg-zinc-50  border-r border-zinc-200  ">
            <flux:sidebar.header>
                <flux:sidebar.brand href="#" logo="{{ Vite::asset('resources/images/uva-logo.png') }}" name="UvaLab." />
                <flux:sidebar.collapse
                    class="in-data-flux-sidebar-on-desktop:not-in-data-flux-sidebar-collapsed-desktop:-mr-2" />
            </flux:sidebar.header>

            <flux:sidebar.nav>
                <flux:sidebar.item icon="home" href="/uvalab-admin" current>
                    Theme
                </flux:sidebar.item>

                <flux:sidebar.group expandable icon="star" heading="Sliders" class="grid">
                    <flux:sidebar.item href="{{ admin_url('edit.php?post_type=hero_slide') }}" target="_parent">
                        Hero Slides
                    </flux:sidebar.item>
                </flux:sidebar.group>
            </flux:sidebar.nav>

            <flux:sidebar.spacer />

            <flux:sidebar.nav>
                <flux:sidebar.item icon="cog-6-tooth" href="#">Settings</flux:sidebar.item>
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
