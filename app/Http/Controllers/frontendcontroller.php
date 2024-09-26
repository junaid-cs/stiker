<?php

namespace App\Http\Controllers;

use App\Models\cartmodel;
use App\Models\categorymodel;
use App\Models\contactusmodel;
use App\Models\ordermodel;
use App\Models\productmodel;
use App\Models\subcategorymodel;
use App\Models\order_submodel;
use App\Models\ratingmodel;
use App\Models\BannerModel;

use Gloudemans\Shoppingcart\Facades\Cart;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use Stripe;

class frontendcontroller extends Controller
{
    public function index()
    {
        $side_category = categorymodel::orderby("id", "desc")->with('subcategories')->get();
        $products = productmodel::orderby("id", "desc")->limit('4')->latest()->get();
        $subcategory = subcategorymodel::orderby("id", "desc")->latest()->limit(10)->get();
        $banner = BannerModel::orderBy('id','DESC')->get();
        return view("frontend/index", compact('side_category', 'products','subcategory','banner'));
    }
    public function detailpage($id)
    {
        $product = productmodel::find($id);
        $side_category = categorymodel::orderby("id", "desc")->with('subcategories')->get();
        $subcategory = subcategorymodel::orderby("id", "desc")->latest()->limit(10)->get();
        return view("frontend/product_detail", compact("side_category", "product","subcategory"));
    }






// product page
    public function products()
    {
        
        $side_category = categorymodel::orderby("id", "desc")->with('subcategories')->get();
        return view("frontend/products", compact("side_category"));
    }
    public function category_all_product($category)
    {
   
        $side_category = categorymodel::orderby("id", "desc")->with('subcategories')->get();
        $categorydata = categorymodel::where('name',$category)->first();
        return view("frontend/products", compact("category",'side_category','categorydata'));
    }
    public function subcategory_all_product($subcategory)
    {
        $side_category = categorymodel::orderby("id", "desc")->with('subcategories')->get();
           $subcategory = subcategorymodel::orderby("id", "desc")->latest()->limit(10)->get();
        return view("frontend/products", compact('subcategory','side_category'));
    }

    public function search(Request $req)
    {
        $search = $req->search;
        $side_category = categorymodel::orderby("id", "desc")->with('subcategories')->get();
            $subcategory = subcategorymodel::orderby("id", "desc")->latest()->limit(10)->get();
        return view("frontend/products", compact("side_category", "search","subcategory"));
    }

    public function term()
    {
        
        $side_category = categorymodel::orderby("id", "desc")->with('subcategories')->get();
        return view("frontend/term", compact("side_category"));
    }
    public function privacy()
    {
        $side_category = categorymodel::orderby("id", "desc")->with('subcategories')->get();
        return view("frontend/privacy", compact("side_category"));
    }
    public function refund()
    { 
        $side_category = categorymodel::orderby("id", "desc")->with('subcategories')->get();
        return view("frontend/refund", compact("side_category"));
    }
    public function notice()
    {
        
        $side_category = categorymodel::orderby("id", "desc")->with('subcategories')->get();
        return view("frontend/notice", compact("side_category"));
    }
    public function contactpage()
    {
        $side_category = categorymodel::orderby("id", "desc")->with('subcategories')->get();
    $subcategory = subcategorymodel::orderby("id", "desc")->latest()->limit(10)->get();
        return view("frontend/contactus", compact('side_category','subcategory'));
    }

    public function rating(Request $request)
    {
        $userid = Auth::user()->id;
      
            $rating = new ratingmodel;
            $rating->user_id = $userid;
            $rating->product_id = $request->product_id;
            $rating->rating = $request->rate;
            $rating->review = $request->review;
            $rating->save();
        
       
        Alert::success('Rating', 'Product Rating Successfully');

        return redirect()->back();
    }

    public function contactusstore(Request $req)
    {
        $store = new contactusmodel;
        $store->name = $req->name;
        $store->phone = $req->phone;
        $store->email = $req->email;
        $store->subject = $req->subject;
        $store->message = $req->message;
        $store->save();
        Alert::success('Contact Us', 'Your Form Submited Successfully');

        return redirect()->back();
    }
// cart page
    public function cart()
    {
        $side_category = categorymodel::orderby("id", "desc")->with('subcategories')->get();
        return view("frontend/cart", compact('side_category'));
    }

    public function orderlisting()
    {
        $userid = @Auth::user()->id;
        $side_category = categorymodel::orderby("id", "desc")->with('subcategories')->get();
        $show = ordermodel::orderby("id", "desc")->where('user_id', $userid)->get();
        return view("frontend/orderlist", compact('side_category','show'));

    }

    public function completeorder($id)
    {
        $side_category = categorymodel::orderby("id", "desc")->with('subcategories')->get();
        $show = order_submodel::orderby("id", "desc")->where('order_id',$id)->with('products')->get();
        return view("frontend/completeorder", compact('side_category','show'));

    }
    // orders
    public function Store_order(Request $req)
    {
        if($req->stripeToken){
            Stripe\Stripe::setApiKey('sk_test_51GtM8EHIHgm0k6T2WAeNWyx1NjNiLv3AUNUfClxabV3aH8sAV48vDwlSederUcjM5yYkkC9TPrCD5FrgKWG1Zy3E00dMqO9ADX');
            $amountInCents = intval($req->total_amount * 100);

          $payment =  Stripe\Charge::create ([
                    "amount" => $amountInCents,
                    "currency" => "usd",
                    "source" => $req->stripeToken,
                    "description" => "Test payment from delidove.com." 
            ]);
            if($payment){
        $userid = Auth::user()->id;
        $store = new ordermodel;
        $store->user_id = $userid;
        $store->full_name = $req->full_name;
        $store->mobile_no = $req->mobile_no;
        $store->location = $req->location;
        $store->city = $req->city;
        $store->address_type = $req->address_type;
		$totalAmount = str_replace(',', '', $req->total_amount);
        $store->total_amount =intval($totalAmount);
        $store->paymenttype = 'Stripe';
        $store->save();
        $product = Cart::content();
        $order_sum = new order_submodel;
        foreach ($product as $key => $products) {
            $order_sum->create([
                'user_id' => $userid,
                'order_id' => $store->id,
                'product_id' => $products->id,
                'price' => $products->price,
                'qty' => $products->qty,
                'total' => $products->subtotal,
           ]);
        }
        Cart::destroy();
        Alert::success('Order Placed', 'Your order has been placed successfully!');
        return redirect()->back()->with('ordercomplete','Order completed');

    }}else{
        $userid = Auth::user()->id;
        $store = new ordermodel;
        $store->user_id = $userid;
        $store->full_name = $req->full_name;
        $store->mobile_no = $req->mobile_no;
        $store->location = $req->location;
        $store->city = $req->city;
        $store->address_type = $req->address_type;
        $totalAmount = str_replace(',', '', $req->total_amount);
        $store->total_amount =intval($totalAmount);
        $store->paymenttype = 'Cash on Delivery';
        $store->save();
        $product = Cart::content();
        $order_sum = new order_submodel;
        foreach ($product as $key => $products) {
            $order_sum->create([
                'user_id' => $userid,
                'order_id' => $store->id,
                'product_id' => $products->id,
                'price' => $products->price,
                'qty' => $products->qty,
                'total' => $products->subtotal,
           ]);
        }
        Cart::destroy();
        Alert::success('Order Placed', 'Order successfully!');
        return redirect()->back()->with('ordercomplete','Order completed');
    }}

    // about page
    public function aboutpage(){
        $side_category = categorymodel::orderby("id", "desc")->with('subcategories')->get();
        return view("frontend/about",compact('side_category'));
    }
    
        // user login 
    public function userlogin(Request $request){
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        // dd($credentials);
        if (Auth::attempt($credentials)) {
            return redirect()->intended(url()->previous())->with('status', 'Login Successfully');
        } else {
            // Authentication failed, display error message
            return redirect()->intended(url()->previous())->with('statusError', 'Invalid email or password');
        }
    }
}
