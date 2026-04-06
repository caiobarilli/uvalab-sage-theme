<?php

namespace App\Livewire;

use Livewire\Component;

class ShopMenu extends Component
{
    public int $cartCount = 0;

    public function mount(): void
    {
        $this->cartCount = function_exists('WC')
            ? (int) WC()->cart->get_cart_contents_count()
            : 0;
    }

    public function render()
    {
        return view('livewire.shop-menu');
    }
}
