<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\categorymodel;
use App\Models\contactusmodel;
use App\Models\ordermodel;
use App\Models\order_submodel;
use App\Models\productmodel;
use App\Models\subcategorymodel;
use App\Models\ratingmodel;
use App\Models\usermodel;
use Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Stripe;

class apicontroller extends Controller
{
    public function category()
    {

        $data = categorymodel::orderBy('id', 'desc')->get();
        foreach ($data as &$item) {
            $item->image = asset($item->image);
        }
        return response()->json($data);
    }

    public function allsubcategory()
    {

        $data = subcategorymodel::orderBy('id', 'desc')->get();
        foreach ($data as &$item) {
            $item->image = asset($item->image);
        }
        return response()->json($data);
    }

    public function allproducts()
    {

        $data = productmodel::orderBy('id', 'desc')->with('relatedproducts')->get();
        foreach ($data as &$item) {
            $item->image = asset($item->image);
            foreach ($item->relatedproducts as &$relproducts) {
                $relproducts->image = asset($relproducts->image);
            }
        }
        return response()->json($data);
    }

    public function allproductratings()
    {

        $data = productmodel::orderBy('id', 'desc')->with('relatedproducts','rating.users')->get();
        foreach ($data as &$item) {
            $item->image = asset($item->image);
            foreach ($item->relatedproducts as &$relproducts) {
                $relproducts->image = asset($relproducts->image);
            }
        }
        return response()->json($data);
    }

    public function categoryproducts($category)
    {

        $data = productmodel::where('category', $category)->orderBy('id', 'desc')->with('relatedproducts')->get();
        foreach ($data as &$item) {
            $item->image = asset($item->image);
            foreach ($item->relatedproducts as &$relproducts) {
                $relproducts->image = asset($relproducts->image);
            }

        }
        return response()->json($data);
    }

    public function category_products()
    {
        $show = categorymodel::orderby("id", "desc")->with('products')->get();
        foreach ($show as &$item) {
            $item->image = asset($item->image);
        }
        return response()->json($show);
    }

    public function get_subcategory($category)
    {

        $data = subcategorymodel::where('category', $category)->orderBy('id', 'desc')->get();
        foreach ($data as &$item) {
            $item->image = asset($item->image);
        }
        return response()->json($data);
    }

    public function get_product($subcategory)
    {

        $data = productmodel::where('subcategory', $subcategory)->orderBy('id', 'desc')->with('relatedproducts')->get();
        foreach ($data as &$item) {
            $item->image = asset($item->image);
            foreach ($item->relatedproducts as &$relproducts) {
                $relproducts->image = asset($relproducts->image);
            }
        }
        return response()->json($data);
    }

    // orders
    public function Store_order(Request $req)
    {
        if ($req->stripeToken) {
            Stripe\Stripe::setApiKey('sk_test_51GtM8EHIHgm0k6T2WAeNWyx1NjNiLv3AUNUfClxabV3aH8sAV48vDwlSederUcjM5yYkkC9TPrCD5FrgKWG1Zy3E00dMqO9ADX');

            $payment = Stripe\Charge::create([
                "amount" => $req->total_amount,
                "currency" => "usd",
                "source" => $req->stripeToken,
                "description" => "Test payment from delidove.com.",
            ]);
            if ($payment) {
                $userid = Auth::user()->id;
                $store = new ordermodel;
                $store->user_id = $userid;
                $store->full_name = $req->full_name;
                $store->mobile_no = $req->mobile_no;
                $store->location = $req->location;
                $store->city = $req->city;
                $store->address_type = $req->address_type;
                $store->total_amount = $req->total_amount;
                $store->paymenttype = $req->cash;
                $store->save();
                if ($store) {
                    $data = $req->all();
                    $orderid = $store->id;
                    foreach ($data['id'] as $key => $productId) {
                        $order = new order_submodel;
                        $order->user_id = $userid;
                        $order->order_id = $orderid;
                        $order->product_id = $productId;
                        $order->price = $data['price'][$key];
                        $order->qty = $data['qty'][$key];
                        $order->total = $data['subtotal'][$key];
                        $order->save();

                    }
                    return response()->json(['status' => 'Order Completed']);
                } else {
                    return response()->json(['status' => 'Order Error']);

                }
            } else {
                return response()->json(['status' => 'payment Error']);
            }

        } else {
            $userid = Auth::user()->id;
            $store = new ordermodel;
            $store->user_id = $userid;
            $store->full_name = $req->full_name;
            $store->mobile_no = $req->mobile_no;
            $store->location = $req->location;
            $store->city = $req->city;
            $store->address_type = $req->address_type;
            $store->total_amount = $req->total_amount;
            $store->paymenttype = 'Cash on Delivery';
            $store->save();
            if ($store) {
                $data = $req->all();
                $orderid = $store->id;
                foreach ($data['id'] as $key => $productId) {
                    $order = new order_submodel;
                    $order->user_id = $userid;
                    $order->order_id = $orderid;
                    $order->product_id = $productId;
                    $order->price = $data['price'][$key];
                    $order->qty = $data['qty'][$key];
                    $order->total = $data['subtotal'][$key];
                    $order->save();

                }
                return response()->json(['status' => 'Order Completed Cash on Delivery']);
            } else {
                return response()->json(['status' => 'Order Error Cash on Delivery']);

            }
        }
    }

    public function completeorder()
    {
        $userid = Auth::user()->id;
        $show = ordermodel::orderby("id", "desc")->where('user_id', $userid)->get();
        return response()->json($show);

    }

    public function completeorderproducts($id)
    {
        $userid = Auth::user()->id;
        $show = order_submodel::orderby("id", "desc")->where('user_id', $userid)->where('order_id', $id)->with('products')->get();
        return response()->json($show);

    }

    // user functions

    public function getuserdata()
    {
        $userid = Auth::user()->id;
        $data = usermodel::find($userid);

        $data->image = asset($data->image);

        return response()->json($data);

    }

    public function updateuser(Request $req)
    {
        $store = usermodel::find($req->id);
        $store->name = $req->name;
        $store->email = $req->email;
        $store->password = Hash::make($req->pass);
        $store->pass = $req->pass;
        $store->contact = $req->contact;
        if ($req->hasFile('image')) {
            $file = $req->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $store->image = $req->file('image')->move('public/profiles', $filename);
        }
        $store->update();
        return response()->json(['Status' => 'User Updated Completed']);

    }

    // contact us api

    public function contactusstore(Request $req)
    {
        $store = new contactusmodel;
        $store->name = $req->name;
        $store->phone = $req->phone;
        $store->email = $req->email;
        $store->subject = $req->subject;
        $store->message = $req->message;
        $store->save();
        return response()->json(['Status' => 'Store Contact Us Completed']);

    }

    // add to cart

    public function storecart($product_id, $product_name, $product_price)
    {

        Cart::add($product_id, $product_name, 1, $product_price)->associate('\App\Models\productmodel');
        $show = Cart::get();
        return response()->json($show);

    }

    // main search
    public function searchproduct(Request $request)
    {

        $data1 = productmodel::where('name', 'LIKE', '%' . $request->search . '%')->orderBy('id', 'desc')->with('relatedproducts')->get();
		  $subcategory = subcategorymodel::where('subcategory', 'LIKE', '%' . $request->search . '%')->orderBy('id', 'desc')->get();
          foreach ($data1 as &$item) {
            $item->image = asset($item->image);
          foreach ($item->relatedproducts as &$relproducts) {
              $relproducts->image = asset($relproducts->image);
          }

      }
		$data = ['subcategory'=>$subcategory, 'products'=>$data1];
        return response()->json($data);
    }

    // rating
    public function rating(Request $req){
        $userid = Auth::user()->id;
        $data = $req->all();
        foreach ($data['product_id'] as $key => $productId) {
            $rating = new ratingmodel;
            $rating->user_id = $userid;
            $rating->product_id = $productId;
            $rating->rating = $req->rating;
            $rating->review = $req->review;
            $rating->save();

        }
        return response()->json(['status' => 'Rating Added Sucessfully']);
    }

    public function getrating($productid){
        $rating = ratingmodel::where('product_id',$productid)->with('users')->get();
       
        return response()->json($rating);

    }

    // notification

    public function notification($id){
        $update = ordermodel::find($id);
        $update->notification = 'read';  
        $update->update();   
        return response()->json(['Status' => 'Notification Update']);

    }

}
