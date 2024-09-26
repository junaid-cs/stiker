<?php

namespace App\Http\Livewire;

use Cart;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Shoppingcart extends Component
{
    protected $listeners = ['delete'];

    public function increaseQuantity($rowId)
    {
        $product = Cart::get($rowId);
        $qty = $product->qty + 1;
        Cart::update($rowId, $qty);
        $this->emit('cartUpdated');
    }

    public function decreaseQuantity($rowId)
    {
        $product = Cart::get($rowId);
        $qty = $product->qty - 1;
        Cart::update($rowId, $qty);
        $this->emit('cartUpdated');
    }
    public function destory($id)
    {
        $this->dispatchBrowserEvent('swal:confirm', [
            'position' => 'center-center',
            'icon' => 'warning',
            'title' => 'Are You Sure?',
            'showConfirmButton' => true,
            'timer' => 0,
            'id' => $id,
        ]);

    }

    public function delete($id)
    {

        Cart::remove($id);
        $this->emit('cartUpdated');
    }

    public function storecart($product_id, $product_name, $product_price)
    {
        $existingItem = Cart::get($product_id);

        if ($existingItem) {
            // If the item is already in the cart, update its quantity
            Cart::update($product_id, [
                'quantity' => $existingItem->quantity + 1,
            ]);
            $this->emit('cartUpdated');
        } else {
            Cart::add($product_id, $product_name, 1, $product_price)->associate('\App\Models\productmodel');
            $this->emit('cartUpdated');
        }
        session()->flash('status', 'Add to cart completed');
    }

    public function checkout()
    {
        $products = Cart::count();
        if ($products) {
            if (Auth::user()) {

                $this->dispatchBrowserEvent('checkout_model');

            } else {
                $this->dispatchBrowserEvent('login_model');
            }
        } else {
            $this->dispatchBrowserEvent('emptyproducts');

        }
    }
    public function cashcheckout()
    {
        $products = Cart::count();
        if ($products) {
            if (Auth::user()) {

                $this->dispatchBrowserEvent('cashcheckout_model');

            } else {
                $this->dispatchBrowserEvent('login_model');
            }
        } else {
            $this->dispatchBrowserEvent('emptyproducts');

        }
    }
    public function render()
    {
        return view('livewire.shoppingcart');
    }
}
