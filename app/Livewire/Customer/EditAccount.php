<?php

namespace App\Livewire\Customer;

use Flux\Flux;
use Livewire\Component;

class EditAccount extends Component
{
    public string $firstName = '';

    public string $lastName = '';

    public string $displayName = '';

    public string $email = '';

    public string $currentPassword = '';

    public string $newPassword = '';

    public string $confirmPassword = '';

    public function mount(): void
    {
        if (! is_user_logged_in()) {
            $this->redirect('/login');

            return;
        }

        $user = wp_get_current_user();
        $this->firstName = $user->first_name ?? '';
        $this->lastName = $user->last_name ?? '';
        $this->displayName = $user->display_name;
        $this->email = $user->user_email;
    }

    public function save(): void
    {
        $this->validate([
            'firstName' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'displayName' => 'required|string|max:255',
            'email' => 'required|email|max:255',
        ]);

        $user = wp_get_current_user();

        if ($this->currentPassword || $this->newPassword || $this->confirmPassword) {
            if (! wp_check_password($this->currentPassword, $user->user_pass, $user->ID)) {
                $this->addError('currentPassword', __('Current password is incorrect.', 'sage'));

                return;
            }

            if ($this->newPassword !== $this->confirmPassword) {
                $this->addError('confirmPassword', __('New passwords do not match.', 'sage'));

                return;
            }

            if (strlen($this->newPassword) < 6) {
                $this->addError('newPassword', __('New password must be at least 6 characters.', 'sage'));

                return;
            }

            wp_set_password($this->newPassword, $user->ID);
        }

        wp_update_user([
            'ID' => $user->ID,
            'first_name' => $this->firstName,
            'last_name' => $this->lastName,
            'display_name' => $this->displayName,
            'user_email' => $this->email,
        ]);

        $this->currentPassword = '';
        $this->newPassword = '';
        $this->confirmPassword = '';

        Flux::toast(
            heading: __('Account updated', 'sage'),
            text: __('Your account details have been saved.', 'sage'),
            variant: 'success',
        );
    }

    public function render()
    {
        return view('livewire.customer.edit-account');
    }
}
