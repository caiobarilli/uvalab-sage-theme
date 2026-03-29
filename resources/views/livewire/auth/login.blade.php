<div class="flex flex-col gap-6">
    <flux:heading class="text-center" size="xl">{{ __('Welcome back', 'sage') }}</flux:heading>

    <flux:separator />

    @if ($error)
        <flux:callout variant="danger" icon="exclamation-triangle">
            <flux:callout.text>{{ $error }}</flux:callout.text>
        </flux:callout>
    @endif

    <div class="flex flex-col gap-6">
        <flux:input wire:model="login" label="Username or Email" type="text" placeholder="your@email.com" />

        <flux:field>
            <flux:label>{{ __('Password', 'sage') }}</flux:label>
            <flux:input wire:model="password" type="password" placeholder="Your password" />
        </flux:field>

        <flux:button variant="primary" class="w-full" wire:click="submit">
            {{ __('Log in', 'sage') }}
        </flux:button>
    </div>

    <flux:subheading class="text-center">
        {{ __('Don\'t have an account?', 'sage') }}
        <flux:link href="/register">{{ __('Sign up for free', 'sage') }}</flux:link>
    </flux:subheading>
</div>
