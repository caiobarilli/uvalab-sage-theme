<!doctype html>
<html @php(language_attributes())>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body class="overflow-hidden">
    <div class="h-screen mt-4">
        <flux:sidebar sticky collapsible class="bg-zinc-50  border-r border-zinc-200  ">
            <flux:sidebar.header>
                <flux:sidebar.brand href="#" logo="{{ Vite::asset('resources/images/uva-logo.png') }}"
                    name="UvaLab." />
                <flux:sidebar.collapse
                    class="in-data-flux-sidebar-on-desktop:not-in-data-flux-sidebar-collapsed-desktop:-mr-2" />
            </flux:sidebar.header>

            <flux:sidebar.nav>
                <flux:sidebar.item icon="home" href="/uvalab-admin">
                    Theme
                </flux:sidebar.item>

                <flux:sidebar.group expandable icon="star" heading="Sliders" class="grid">
                    <flux:sidebar.item href="/uvalab-admin/sliders/hero">
                        Hero Slides
                    </flux:sidebar.item>
                </flux:sidebar.group>
            </flux:sidebar.nav>
        </flux:sidebar>

        <flux:header class="lg:hidden">
            <flux:sidebar.toggle class="lg:hidden" icon="bars-2" inset="left" />
            <flux:spacer />
        </flux:header>

        @yield('content')
    </div>

    @livewireScripts
    @fluxScripts
</body>

</html>
