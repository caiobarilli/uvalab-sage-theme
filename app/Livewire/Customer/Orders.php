<?php

namespace App\Livewire\Customer;

use Livewire\Component;

class Orders extends Component
{
    public array $orders = [];

    public function mount(): void
    {
        if (! is_user_logged_in()) {
            $this->redirect('/login');

            return;
        }

        $this->orders = wc_get_orders([
            'customer_id' => get_current_user_id(),
            'limit' => 10,
            'orderby' => 'date',
            'order' => 'DESC',
        ]);
    }

    public function render()
    {
        return view('livewire.customer.orders');
    }
}
