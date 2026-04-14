<div class="space-y-6 max-w-lg">
    <flux:heading size="xl">{{ __('Account details', 'sage') }}</flux:heading>

    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        <flux:input wire:model="firstName" label="{{ __('First name', 'sage') }}" required />
        <flux:input wire:model="lastName" label="{{ __('Last name', 'sage') }}" required />
    </div>

    <flux:input wire:model="displayName" label="{{ __('Display name', 'sage') }}" required
        description="{{ __('This will be how your name will be displayed in the account section and in reviews.', 'sage') }}" />

    <flux:input wire:model="email" type="email" label="{{ __('Email address', 'sage') }}" required />

    <flux:separator />

    <flux:heading size="lg">{{ __('Password change', 'sage') }}</flux:heading>

    <flux:input wire:model="currentPassword" type="password"
        label="{{ __('Current password (leave blank to leave unchanged)', 'sage') }}" />

    <flux:input wire:model="newPassword" type="password"
        label="{{ __('New password (leave blank to leave unchanged)', 'sage') }}" />

    <flux:input wire:model="confirmPassword" type="password" label="{{ __('Confirm new password', 'sage') }}" />

    <flux:button variant="primary" wire:click="save">
        {{ __('Save changes', 'sage') }}
    </flux:button>
</div>
