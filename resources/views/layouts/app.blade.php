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

    <div id="app">
        <a class="sr-only focus:not-sr-only" href="#main">
            {{ __('Skip to content', 'sage') }}
        </a>

        @include('sections.header')

        <main id="main" class="main">
            @if (is_user_logged_in())
                <flux:button href="/logout" variant="primary" color="zinc">Logout</flux:button>
                <flux:button href="/logout" variant="ghost">Logout</flux:button>
                <flux:button href="/logout" variant="primary" color="red">Logout</flux:button>
                <flux:button href="/logout" variant="primary" color="orange">Logout</flux:button>
                <flux:button href="/logout" variant="primary" color="amber">Logout</flux:button>
                <flux:button href="/logout" variant="primary" color="yellow">Logout</flux:button>
                <flux:button href="/logout" variant="primary" color="lime">Logout</flux:button>
                <flux:button href="/logout" variant="primary" color="green">Logout</flux:button>
                <flux:button href="/logout" variant="primary" color="emerald">Logout</flux:button>
                <flux:button href="/logout" variant="primary" color="teal">Logout</flux:button>
                <flux:button href="/logout" variant="primary" color="cyan">Logout</flux:button>
                <flux:button href="/logout" variant="primary" color="sky">Logout</flux:button>
                <flux:button href="/logout" variant="primary" color="blue">Logout</flux:button>
                <flux:button href="/logout" variant="primary" color="indigo">Logout</flux:button>
                <flux:button href="/logout" variant="primary" color="violet">Logout</flux:button>
                <flux:button href="/logout" variant="primary" color="purple">Logout</flux:button>
                <flux:button href="/logout" variant="primary" color="fuchsia">Logout</flux:button>
                <flux:button href="/logout" variant="primary" color="pink">Logout</flux:button>
                <flux:button href="/logout" variant="primary" color="rose">Logout</flux:button>
            @endif

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
