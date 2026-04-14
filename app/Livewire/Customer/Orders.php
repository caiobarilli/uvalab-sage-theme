<?php

namespace App\Livewire\Customer;

use Livewire\Component;

class Orders extends Component
{
    public function mount(): void
    {
        if (! is_user_logged_in()) {
            $this->redirect('/login');

            return;
        }
    }

    public function render()
    {
        $orders = wc_get_orders([
            'customer_id' => get_current_user_id(),
            'limit' => 10,
            'orderby' => 'date',
            'order' => 'DESC',
        ]);

        return view('livewire.customer.orders', [
            'orders' => $orders,
        ]);
    }
}
