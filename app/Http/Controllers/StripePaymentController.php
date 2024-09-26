<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Stripe;
use RealRashid\SweetAlert\Facades\Alert;

class StripePaymentController extends Controller
{
    public function stripePost(Request $request)
    {
        dd($request->all());
        Stripe\Stripe::setApiKey('sk_test_51GtM8EHIHgm0k6T2WAeNWyx1NjNiLv3AUNUfClxabV3aH8sAV48vDwlSederUcjM5yYkkC9TPrCD5FrgKWG1Zy3E00dMqO9ADX');
    
        Stripe\Charge::create ([
                "amount" => 100 * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Test payment from itsolutionstuff.com." 
        ]);
      
        Alert::success('Order Placed', 'Your order has been placed successfully!');
              
        return back();
    }
}
