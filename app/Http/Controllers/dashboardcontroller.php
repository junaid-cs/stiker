<?php

namespace App\Http\Controllers;

use App\Models\categorymodel;
use App\Models\contactusmodel;
use App\Models\ordermodel;
use App\Models\order_submodel;
use App\Models\productmodel;
use App\Models\subcategorymodel;
use App\Models\usermodel;
use App\Models\BannerModel;
use Illuminate\Support\Facades\File;

use Illuminate\Http\Request;

class dashboardcontroller extends Controller
{
    public function index()
    {
        $products = productmodel::get();
        $allproducts = $products->count();
        $contact = contactusmodel::get();
        $allcontacts = $contact->count();
        $order = ordermodel::get();
        $allorders = $order->count();
        $suborder = order_submodel::get();
        $allsuborder = $suborder->count();
        $customer = usermodel::where('role', '0')->get();
        $allcustomer = $customer->count();
        $category = categorymodel::get();
        $allcategory = $category->count();
        $subcategory = subcategorymodel::get();
        $allsubcategory = $subcategory->count();

        return view('admin/index', compact('allproducts', 'allcontacts', 'allorders', 'allsuborder', 'allcustomer', 'allcategory', 'allsubcategory'));
    }

    public function viewcontact()
    {
        $show = contactusmodel::orderBy('id', 'desc')->get();
        return view('admin/contactus', compact('show'));
    }

    public function banner()
    {
        $show = BannerModel::orderBy('id','DESC')->get();
        return view('admin/banner',compact('show'));
    }

    public function bannerstore(Request $request)
    {
        $store = new BannerModel;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $store->image = $request->file('image')->move('public/images', $filename);
        }
        $store->save();
        return redirect()->back()->with('status', 'Banner Stored');

    }

    public function banneredit($id){
        $result = BannerModel::find($id);
        return response()->json(['show' => $result]);

    }

    public function bannerupdate(Request $request)
    {
        $store = BannerModel::find($request->id);
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $store->image = $request->file('image')->move('public/images', $filename);
        }
        $store->update();
        return redirect()->back()->with('status', 'Banner Updated');

    }

    public function bannerdelete($id){
        $result= BannerModel::find($id);
        $delete=public_path($result->image);
            if(File::exists($delete)){
                File::delete($delete);
               }
               $result->delete();
               return redirect()->back()->with('status', 'Banner Deletion Successfully');

      }

}
