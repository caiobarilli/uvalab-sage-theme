<?php

namespace App\Livewire\Customer;

use Flux\Flux;
use Livewire\Component;

class EditAddress extends Component
{
    public string $billingFirstName = '';

    public string $billingLastName = '';

    public string $billingCompany = '';

    public string $billingAddress1 = '';

    public string $billingCity = '';

    public string $billingState = '';

    public string $billingPostcode = '';

    public string $billingCountry = '';

    public string $shippingFirstName = '';

    public string $shippingLastName = '';

    public string $shippingCompany = '';

    public string $shippingAddress1 = '';

    public string $shippingCity = '';

    public string $shippingState = '';

    public string $shippingPostcode = '';

    public string $shippingCountry = '';

    public function mount(): void
    {
        if (! is_user_logged_in()) {
            $this->redirect('/login');

            return;
        }

        $userId = get_current_user_id();

        $this->billingFirstName = get_user_meta($userId, 'billing_first_name', true);
        $this->billingLastName = get_user_meta($userId, 'billing_last_name', true);
        $this->billingCompany = get_user_meta($userId, 'billing_company', true);
        $this->billingAddress1 = get_user_meta($userId, 'billing_address_1', true);
        $this->billingCity = get_user_meta($userId, 'billing_city', true);
        $this->billingState = get_user_meta($userId, 'billing_state', true);
        $this->billingPostcode = get_user_meta($userId, 'billing_postcode', true);
        $this->billingCountry = get_user_meta($userId, 'billing_country', true);

        $this->shippingFirstName = get_user_meta($userId, 'shipping_first_name', true);
        $this->shippingLastName = get_user_meta($userId, 'shipping_last_name', true);
        $this->shippingCompany = get_user_meta($userId, 'shipping_company', true);
        $this->shippingAddress1 = get_user_meta($userId, 'shipping_address_1', true);
        $this->shippingCity = get_user_meta($userId, 'shipping_city', true);
        $this->shippingState = get_user_meta($userId, 'shipping_state', true);
        $this->shippingPostcode = get_user_meta($userId, 'shipping_postcode', true);
        $this->shippingCountry = get_user_meta($userId, 'shipping_country', true);
    }

    public function saveBilling(): void
    {
        $userId = get_current_user_id();

        update_user_meta($userId, 'billing_first_name', $this->billingFirstName);
        update_user_meta($userId, 'billing_last_name', $this->billingLastName);
        update_user_meta($userId, 'billing_company', $this->billingCompany);
        update_user_meta($userId, 'billing_address_1', $this->billingAddress1);
        update_user_meta($userId, 'billing_city', $this->billingCity);
        update_user_meta($userId, 'billing_state', $this->billingState);
        update_user_meta($userId, 'billing_postcode', $this->billingPostcode);
        update_user_meta($userId, 'billing_country', $this->billingCountry);

        Flux::toast(
            heading: __('Billing address updated', 'sage'),
            text: __('Your billing address has been saved.', 'sage'),
            variant: 'success',
        );
    }

    public function saveShipping(): void
    {
        $userId = get_current_user_id();

        update_user_meta($userId, 'shipping_first_name', $this->shippingFirstName);
        update_user_meta($userId, 'shipping_last_name', $this->shippingLastName);
        update_user_meta($userId, 'shipping_company', $this->shippingCompany);
        update_user_meta($userId, 'shipping_address_1', $this->shippingAddress1);
        update_user_meta($userId, 'shipping_city', $this->shippingCity);
        update_user_meta($userId, 'shipping_state', $this->shippingState);
        update_user_meta($userId, 'shipping_postcode', $this->shippingPostcode);
        update_user_meta($userId, 'shipping_country', $this->shippingCountry);

        Flux::toast(
            heading: __('Shipping address updated', 'sage'),
            text: __('Your shipping address has been saved.', 'sage'),
            variant: 'success',
        );
    }

    public function render()
    {
        return view('livewire.customer.edit-address');
    }
}
