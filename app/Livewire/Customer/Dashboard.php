<?php

namespace App\Livewire\Customer;

use Livewire\Component;

class Dashboard extends Component
{
    public string $name = '';

    public string $email = '';

    public function mount(): void
    {
        if (! is_user_logged_in()) {
            $this->redirect('/login');

            return;
        }

        $user = wp_get_current_user();
        $this->name = $user->display_name;
        $this->email = $user->user_email;
    }

    public function render()
    {
        return view('livewire.customer.dashboard');
    }
}
