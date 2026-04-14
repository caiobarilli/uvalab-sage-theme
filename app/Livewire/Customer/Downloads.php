<?php

namespace App\Livewire\Customer;

use Livewire\Component;

class Downloads extends Component
{
    public array $downloads = [];

    public function mount(): void
    {
        if (! is_user_logged_in()) {
            $this->redirect('/login');

            return;
        }

        $this->downloads = wc_get_customer_available_downloads(get_current_user_id());
    }

    public function render()
    {
        return view('livewire.customer.downloads');
    }
}
