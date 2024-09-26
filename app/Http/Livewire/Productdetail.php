<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\productmodel;
use App\Models\categorymodel;
use Illuminate\Support\Facades\Auth;
use App\Models\ratingmodel;

use Cart;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Redirect;



class Productdetail extends Component
{
    public $product_id;
    public $quantity = 1;




    public function mount($product_id)
    {
        $this->product_id = $product_id;
    }
    

 
    public function storecart($product_id, $product_name, $product_price){
        Cart::add($product_id, $product_name, $this->quantity, $product_price)->associate('\App\Models\productmodel');
        $this->dispatchBrowserEvent('swal', [
            'position' => 'center-center',
            'icon' => 'success',
            'title' => 'Add to Cart Successfully',
            'showConfirmButton' => false,
            'timer' => 2000,
        ]);
        $this->emit('cartUpdated');
        
    }

    public function relateddatastore($product_id, $product_name, $product_price){
        Cart::add($product_id, $product_name, 1, $product_price)->associate('\App\Models\productmodel');
        $this->dispatchBrowserEvent('swal', [
            'position' => 'center-center',
            'icon' => 'success',
            'title' => 'Add to Cart Successfully',
            'showConfirmButton' => false,
            'timer' => 2000,
        ]);
        
    }

    

    public function render()
    {
        $product = productmodel::find($this->product_id);
        $rating = RatingModel::where('product_id', $this->product_id)->avg('rating');
        $allrating = RatingModel::where('product_id', $this->product_id)->with('users')->orderBy('id','DESC')->get();
        $countrating = RatingModel::where('product_id', $this->product_id)->count();
        $relatedproducts = categorymodel::where('name',  $product->category)->orderby('id', 'desc')->with('products')->get();
        return view('livewire.productdetail',compact('relatedproducts','product','rating','countrating','allrating'));
    }
 

    public function redirectproductdetail($productId)
    {
        // You can use Livewire route redirection or standard Laravel redirection here
        return redirect()->route('product.detail', ['id' => $productId]);
    }
}
