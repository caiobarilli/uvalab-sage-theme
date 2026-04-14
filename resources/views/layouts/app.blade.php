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
        @yield('content')
        {{ $slot ?? '' }}
    </main>

    @blockpart('footer')

    @php(do_action('get_footer'))
    @php(wp_footer())
    @livewireScripts
    @fluxScripts
</body>

</html>
