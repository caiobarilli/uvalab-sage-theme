<!doctype html>
<html @php(language_attributes())>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @php(do_action('get_header'))
    @php(wp_head())

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body @php(body_class())>
    @php(wp_body_open())
    <header class="site-header">
        @blockpart('header')
    </header>

    <main class="wp-block-group">
        <div class="my-4 flex mx-auto max-w-[var(--wp--style--global--content-size)]">
            <flux:sidebar sticky collapsible class="bg-white border-r border-zinc-200">
                <flux:sidebar.header>
                    <flux:sidebar.brand href="{{ route('customer.account') }}"
                        logo="{{ Vite::asset('resources/images/uva-logo.png') }}" name="UvaLab." />
                    <flux:sidebar.collapse
                        class="in-data-flux-sidebar-on-desktop:not-in-data-flux-sidebar-collapsed-desktop:-mr-2" />
                </flux:sidebar.header>

                <flux:sidebar.nav>
                    <flux:sidebar.item icon="home" href="{{ route('customer.account') }}">
                        {{ __('Dashboard', 'sage') }}
                    </flux:sidebar.item>

                    <flux:sidebar.item icon="shopping-bag" href="{{ route('customer.orders') }}">
                        {{ __('Orders', 'sage') }}
                    </flux:sidebar.item>

                    <flux:sidebar.item icon="arrow-down-tray" href="{{ route('customer.downloads') }}">
                        {{ __('Downloads', 'sage') }}
                    </flux:sidebar.item>

                    <flux:sidebar.item icon="map-pin" href="{{ route('customer.edit-address') }}">
                        {{ __('Addresses', 'sage') }}
                    </flux:sidebar.item>

                    <flux:sidebar.item icon="user-circle" href="{{ route('customer.edit-account') }}">
                        {{ __('Account details', 'sage') }}
                    </flux:sidebar.item>

                    <flux:sidebar.item icon="arrow-right-start-on-rectangle" href="{{ route('auth.logout') }}">
                        {{ __('Log out', 'sage') }}
                    </flux:sidebar.item>
                </flux:sidebar.nav>
            </flux:sidebar>

            <flux:header class="lg:hidden">
                <flux:sidebar.toggle class="lg:hidden" icon="bars-2" inset="left" />
                <flux:spacer />
            </flux:header>

            <div class="ml-4">
                {{ $slot }}
            </div>
        </div>
    </main>

    @blockpart('footer')

    @php(do_action('get_footer'))
    @php(wp_footer())
    @livewireScripts
    @fluxScripts
</body>

</html>
