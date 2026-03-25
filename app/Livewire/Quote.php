<?php

namespace App\Livewire;

use Livewire\Component;

class Quote extends Component
{
    public string $quote = 'Silence is the loudest form of communication.';

    public function render()
    {
        return view('livewire.quote');
    }
}
