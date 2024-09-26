<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\categorymodel;
use App\Models\productmodel;
use App\Models\subcategorymodel;

use Cart;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Redirect;
class AllProducts extends Component
{
    public $category;
    
    public $search;

    public $subcategoryproduct;


    public function mount($category, $search, $subcat)
    {
        $this->category = $category;
        $this->search = $search;
        $this->subcategoryproduct = $subcat;

       
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

    public function subcategory($subcat){
        $subcategory = subcategorymodel::find($subcat);
       $this->subcategoryproduct = $subcategory->subcategory;
    }

    

    public function render()
    {
        if($this->category){
            $product = categorymodel::where('name',  $this->category)->with(['products' => function($query) { $query->where('status', 'In Stock'); }])->paginate(2);
            $subcategory = subcategorymodel::where('category',  $this->category)->get(); 
            if($this->subcategoryproduct){
                $product = subcategorymodel::where('subcategory',  $this->subcategoryproduct)->with(['products' => function($query) { $query->where('status', 'In Stock'); }])->paginate(2);
            }

        }elseif($this->search){
            $product = categorymodel::where('name', 'like', '%'.$this->search.'%')->with(['products' => function($query) { $query->where('status', 'In Stock'); }])->paginate(2);  
             $subcategory = [];
        }
        elseif($this->subcategoryproduct){
            $product = subcategorymodel::where('subcategory',  $this->subcategoryproduct)->with(['products' => function($query) { $query->where('status', 'In Stock'); }])->paginate(2);
            $subcategory = subcategorymodel::get();
 
        }
        else{
        $product = categorymodel::with(['products' => function($query) { $query->where('status', 'In Stock'); }])->paginate(2); 
        $subcategory = subcategorymodel::get();  }

        

        
        return view('livewire.all-products',compact('product','subcategory'));
    }
    public function redirectproductdetail($productId)
    {
        // You can use Livewire route redirection or standard Laravel redirection here
        return redirect()->route('product.detail', ['id' => $productId]);
    }
}
