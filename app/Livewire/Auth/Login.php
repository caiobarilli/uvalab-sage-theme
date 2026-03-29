<?php

namespace App\Livewire\Auth;

use Livewire\Component;

class Login extends Component
{
    public string $login = '';

    public string $password = '';

    public string $error = '';

    public function submit(): void
    {
        $this->validate([
            'login' => 'required|string',
            'password' => 'required|string',
        ]);

        $user = wp_signon([
            'user_login' => $this->login,
            'user_password' => $this->password,
            'remember' => true,
        ], false);

        if (is_wp_error($user)) {
            $this->error = 'Invalid username or password.';

            return;
        }

        wp_set_current_user($user->ID);
        wp_set_auth_cookie($user->ID, true);

        $this->redirect('/dashboard');
    }

    public function render()
    {
        return view('livewire.auth.login')
            ->layout('layouts.auth');
    }
}
