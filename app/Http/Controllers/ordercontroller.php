<?php

namespace App\Http\Controllers;
use App\Models\ordermodel;
use App\Models\order_submodel;
use App\Models\User;

use RealRashid\SweetAlert\Facades\Alert;

use Illuminate\Http\Request;

class ordercontroller extends Controller
{
    public function index(){
        $show = ordermodel::orderBy('id','desc')->get();

        return view('admin/order',compact('show'));
    }

    public function deleteorders($id){
        $result = ordermodel::find($id)->delete();
        Alert::success('Order Delete', 'Order Deleted Successfully');
        return redirect()->back();
       }
   
       
       public function confirmOrders($id){
           $result = ordermodel::find($id);
           $result->status = 'Ready';
           $result->update();
           Alert::success('Order Ready', 'Order Ready Successfully');
           return redirect()->route('printpage',$result->id);
          }
   

    public function suborder(){
        $show = order_submodel::orderBy('id','desc')->get();
        return view('admin/sub_order',compact('show'));
    }

    public function deletesuborder($id){
     $result = order_submodel::find($id)->delete();
     Alert::success('Sub Order Delete', 'Sub order Deleted Successfully');

     return redirect()->back();
    }

    
    public function confirmsuborders($id){
        $result = order_submodel::find($id);
        $result->status = 'Ready';
        $result->update();
        Alert::success('Order Ready', 'Sub order Ready Successfully');
        return redirect()->back();
       }

    //    order print

    public function listorderview($id){
        $orders = ordermodel::find($id);
        $suborders = order_submodel::where('order_id',$orders->id)->with('products')->get();
        $userdata = User::find($orders->user_id );
        return view('admin/orderprint',compact('orders','suborders','userdata'));
    }

    public function print($id){
        $orders = ordermodel::find($id);
        $suborders = order_submodel::where('order_id',$orders->id)->with('products')->get();
        $userdata = User::find($orders->user_id );
        return view('admin/print',compact('orders','suborders','userdata'));
    }

}
