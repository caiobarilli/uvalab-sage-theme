<?php

namespace App\Livewire\Auth;

use Livewire\Component;

class Register extends Component
{
    public string $username = '';

    public string $email = '';

    public string $password = '';

    public string $error = '';

    public function submit(): void
    {
        $this->validate([
            'username' => 'required|string',
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        if (username_exists($this->username)) {
            $this->error = 'This username already exists.';

            return;
        }

        if (email_exists($this->email)) {
            $this->error = 'This email is already registered.';

            return;
        }

        $userId = wp_create_user($this->username, $this->password, $this->email);

        if (is_wp_error($userId)) {
            $this->error = $userId->get_error_message();

            return;
        }

        $user = new \WP_User($userId);
        $user->set_role('subscriber');

        wp_set_current_user($userId);
        wp_set_auth_cookie($userId, true);

        $this->redirect(wc_get_page_permalink('myaccount'));
    }

    public function render()
    {
        return view('livewire.auth.register')
            ->layout('layouts.auth');
    }
}
