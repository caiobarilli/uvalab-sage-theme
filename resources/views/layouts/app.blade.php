<!doctype html>
<html @php(language_attributes())>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @php(do_action('get_header'))
    @php(wp_head())

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    @fluxAppearance
</head>

<body @php(body_class())>
    @php(wp_body_open())

    <div id="app">
        <a class="sr-only focus:not-sr-only" href="#main">
            {{ __('Skip to content', 'sage') }}
        </a>

        @include('sections.header')

        <main id="main" class="main">

            <flux:button variant="primary" color="zinc">Zinc</flux:button>
            <flux:button variant="primary" color="red">Red</flux:button>
            <flux:button variant="primary" color="orange">Orange</flux:button>
            <flux:button variant="primary" color="amber">Amber</flux:button>
            <flux:button variant="primary" color="yellow">Yellow</flux:button>
            <flux:button variant="primary" color="lime">Lime</flux:button>
            <flux:button variant="primary" color="green">Green</flux:button>
            <flux:button variant="primary" color="emerald">Emerald</flux:button>
            <flux:button variant="primary" color="teal">Teal</flux:button>
            <flux:button variant="primary" color="cyan">Cyan</flux:button>
            <flux:button variant="primary" color="sky">Sky</flux:button>
            <flux:button variant="primary" color="blue">Blue</flux:button>
            <flux:button variant="primary" color="indigo">Indigo</flux:button>
            <flux:button variant="primary" color="violet">Violet</flux:button>
            <flux:button variant="primary" color="purple">Purple</flux:button>
            <flux:button variant="primary" color="fuchsia">Fuchsia</flux:button>
            <flux:button variant="primary" color="pink">Pink</flux:button>
            <flux:button variant="primary" color="rose">Rose</flux:button>


            <livewire:quote />


            @yield('content')
        </main>

        @hasSection('sidebar')
            <aside class="sidebar">
                @yield('sidebar')
            </aside>
        @endif

        @include('sections.footer')
    </div>

    @php(do_action('get_footer'))
    @php(wp_footer())
    @livewireScripts
    @fluxScripts
</body>

</html>
