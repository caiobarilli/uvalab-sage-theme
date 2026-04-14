<?php

namespace App\Livewire\Customer;

use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Response;
use Livewire\Component;

class ViewOrder extends Component
{
    public int $orderId;

    public function mount(int $orderId): void
    {
        if (! is_user_logged_in()) {
            $this->redirect('/login');

            return;
        }

        $order = wc_get_order($orderId);

        if (! $order || (int) $order->get_customer_id() !== get_current_user_id()) {
            throw new HttpResponseException(new Response('', 404));
        }

        $this->orderId = $orderId;
    }

    public function render()
    {
        $order = wc_get_order($this->orderId);

        return view('livewire.customer.view-order', [
            'order' => $order,
        ]);
    }
}
