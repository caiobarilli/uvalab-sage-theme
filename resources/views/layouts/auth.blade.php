<!doctype html>
<html @php(language_attributes())>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body class="min-h-screen antialiased">
    <div class="flex min-h-screen">
        <div class="flex-1 flex justify-center items-center">
            <div class="w-80 max-w-80 space-y-6">
                <div class="flex justify-center">
                    <a href="/" class="flex items-center gap-3">
                        <img src="{{ Vite::asset('resources/images/uva-logo.png') }}" alt="Uvalab" class="h-8">
                    </a>
                </div>

                {{ $slot }}
            </div>
        </div>

        <div class="flex-1 p-4 max-lg:hidden">
            <div class="relative rounded-lg h-full text-white w-full bg-zinc-900 flex flex-col items-start justify-end p-16"
                style="background-image: url('{{ Vite::asset('resources/images/auth-bg.png') }}'); background-size: cover">

                <div class="flex gap-2 mb-4">
                    <flux:icon.star variant="solid" />
                    <flux:icon.star variant="solid" />
                    <flux:icon.star variant="solid" />
                    <flux:icon.star variant="solid" />
                    <flux:icon.star variant="solid" />
                </div>
                <div class="mb-6 italic font-base text-3xl xl:text-4xl">
                    {{ __('Flux has enabled me to design, build, and deliver apps faster than ever before.', 'sage') }}
                </div>
                <div class="flex gap-4">
                    <flux:avatar src="https://fluxui.dev/img/demo/caleb.png" size="xl" />
                    <div class="flex flex-col justify-center font-medium">
                        <div class="text-lg">Caleb Porzio</div>
                        <div class="text-zinc-300">{{ __('Creator of Livewire', 'sage') }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @livewireScripts
    @fluxScripts
</body>

</html>
