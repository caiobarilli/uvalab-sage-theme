<div class="flex flex-col gap-6">
    <flux:heading class="text-center" size="xl">Welcome back</flux:heading>

    <flux:separator />

    @if ($error)
        <flux:callout variant="danger" icon="exclamation-triangle">
            <flux:callout.text>{{ $error }}</flux:callout.text>
        </flux:callout>
    @endif

    <div class="flex flex-col gap-6">
        <flux:input wire:model="login" label="Username or Email" type="text" placeholder="your@email.com" />

        <flux:field>
            <flux:label>Password</flux:label>
            <flux:input wire:model="password" type="password" placeholder="Your password" />
        </flux:field>

        <flux:button variant="primary" class="w-full" wire:click="submit">
            Log in
        </flux:button>
    </div>

    <flux:subheading class="text-center">
        Don't have an account?
        <flux:link href="/register">Sign up for free</flux:link>
    </flux:subheading>
</div>
