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

<body class="bg-zinc-200 h-full">
    @php(wp_body_open())

    <main>
        <div class="flex min-h-[60vh] flex-col items-center justify-center text-center px-4">
            <img src="{{ Vite::asset('resources/images/uva.svg') }}" alt="Uvalab" class="h-16 mb-8 opacity-80">

            <flux:heading size="xl" class="mb-4">{{ __('We\'re coming soon', 'sage') }}</flux:heading>

            <flux:text class="max-w-md mb-8">
                {{ __('Our store is currently under construction. We\'ll be back soon with something amazing.', 'sage') }}
            </flux:text>
        </div>
    </main>

    @php(do_action('get_footer'))
    @php(wp_footer())
    @livewireScripts
    @fluxScripts
</body>

</html>
