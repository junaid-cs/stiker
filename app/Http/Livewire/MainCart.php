<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\productmodel;
use Illuminate\Support\Facades\Auth;
use Cart;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Redirect;

class MainCart extends Component
{
    public $products;

    public function mount()
    {
        $this->products = productmodel::all();
    }

    public function storecart($product_id, $product_name, $product_price){
        Cart::add($product_id, $product_name, 1, $product_price)->associate('\App\Models\productmodel');
        $this->dispatchBrowserEvent('swal', [
            'position' => 'center-center',
            'icon' => 'success',
            'title' => 'Add to Cart Successfully',
            'showConfirmButton' => false,
            'timer' => 2000,
        ]);
        $this->emit('cartUpdated');

    }
  
    public function render()
    {
        $products = productmodel::where('discount_percentage', '!=', 0)
        ->whereNotNull('discount_percentage')->orderby("id", "desc")->limit(4)->latest()->get();
        return view('livewire.main-cart',compact('products'));
    }

    public function redirectproductdetail($productId)
    {
        // You can use Livewire route redirection or standard Laravel redirection here
        return redirect()->route('product.detail', ['id' => $productId]);
    }
}
