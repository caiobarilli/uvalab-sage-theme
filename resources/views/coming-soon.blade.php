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
        <main id="main" class="main">
            <div class="flex min-h-[60vh] flex-col items-center justify-center text-center px-4">
                <img src="{{ Vite::asset('resources/images/uva-logo.png') }}" alt="Uvalab" class="h-16 mb-8 opacity-80">

                <flux:heading size="xl" class="mb-4">We're coming soon</flux:heading>

                <flux:text class="max-w-md mb-8">
                    Our store is currently under construction. We'll be back soon with something amazing.
                </flux:text>
            </div>
        </main>
    </div>

    @php(do_action('get_footer'))
    @php(wp_footer())
    @livewireScripts
    @fluxScripts
</body>

</html>
