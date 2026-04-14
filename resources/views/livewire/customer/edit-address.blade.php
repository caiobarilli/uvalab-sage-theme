<div class="space-y-6">
    <flux:heading size="xl">{{ __('Addresses', 'sage') }}</flux:heading>

    <flux:text>
        {{ __('The following addresses will be used on the checkout page by default.', 'sage') }}
    </flux:text>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        {{-- Billing --}}
        <flux:card class="space-y-4">
            <flux:heading size="lg">{{ __('Billing address', 'sage') }}</flux:heading>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <flux:input wire:model="billingFirstName" label="{{ __('First name', 'sage') }}" />
                <flux:input wire:model="billingLastName" label="{{ __('Last name', 'sage') }}" />
            </div>

            <flux:input wire:model="billingCompany" label="{{ __('Company', 'sage') }}" />
            <flux:input wire:model="billingAddress1" label="{{ __('Address', 'sage') }}" />

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <flux:input wire:model="billingCity" label="{{ __('City', 'sage') }}" />
                <flux:input wire:model="billingState" label="{{ __('State', 'sage') }}" />
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <flux:input wire:model="billingPostcode" label="{{ __('Postcode', 'sage') }}" />
                <flux:input wire:model="billingCountry" label="{{ __('Country', 'sage') }}" />
            </div>

            <flux:button variant="primary" wire:click="saveBilling">
                {{ __('Save billing address', 'sage') }}
            </flux:button>
        </flux:card>

        {{-- Shipping --}}
        <flux:card class="space-y-4">
            <flux:heading size="lg">{{ __('Shipping address', 'sage') }}</flux:heading>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <flux:input wire:model="shippingFirstName" label="{{ __('First name', 'sage') }}" />
                <flux:input wire:model="shippingLastName" label="{{ __('Last name', 'sage') }}" />
            </div>

            <flux:input wire:model="shippingCompany" label="{{ __('Company', 'sage') }}" />
            <flux:input wire:model="shippingAddress1" label="{{ __('Address', 'sage') }}" />

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <flux:input wire:model="shippingCity" label="{{ __('City', 'sage') }}" />
                <flux:input wire:model="shippingState" label="{{ __('State', 'sage') }}" />
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <flux:input wire:model="shippingPostcode" label="{{ __('Postcode', 'sage') }}" />
                <flux:input wire:model="shippingCountry" label="{{ __('Country', 'sage') }}" />
            </div>

            <flux:button variant="primary" wire:click="saveShipping">
                {{ __('Save shipping address', 'sage') }}
            </flux:button>
        </flux:card>
    </div>
</div>
