<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Cart;

class Cartcount extends Component
{
    protected $listeners = ['cartUpdated'];

    public function render()
    {
        $items = Cart::count();
        return view('livewire.cartcount', compact('items'));
    }

    public function cartUpdated()
    {
        $this->render(); // Refresh the component
    }
}
