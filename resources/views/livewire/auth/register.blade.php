<div class="flex flex-col gap-6">
    <flux:heading class="text-center" size="xl">{{ __('Create an account', 'sage') }}</flux:heading>

    <flux:separator />

    @if ($error)
        <flux:callout variant="danger" icon="exclamation-triangle">
            <flux:callout.text>{{ $error }}</flux:callout.text>
        </flux:callout>
    @endif

    <div class="flex flex-col gap-6">
        <flux:input wire:model="username" label="Username" type="text" placeholder="yourname" />

        <flux:input wire:model="email" label="Email" type="email" placeholder="your@email.com" />

        <flux:input wire:model="password" label="Password" type="password" placeholder="Min. 6 characters" />

        <flux:button variant="primary" class="w-full" wire:click="submit">
            {{ __('Create account', 'sage') }}
        </flux:button>
    </div>

    <flux:subheading class="text-center">
        {{ __('Already have an account?', 'sage') }}
        <flux:link href="/login">{{ __('Log in', 'sage') }}</flux:link>
    </flux:subheading>
</div>
