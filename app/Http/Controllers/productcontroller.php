<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\File;

use Illuminate\Http\Request;
use App\Models\categorymodel;
use App\Models\subcategorymodel;
use App\Models\productmodel;


class productcontroller extends Controller
{
    public function index(){
        $show = productmodel::orderBy('id','desc')->get();
        $category = categorymodel::orderBy('id','desc')->get();

        return view('admin/product',compact('show','category'));
    }

    public function storeproduct(Request $req){
        $store = new productmodel;
        $store->name= $req->name;
        $store->title= $req->title;
        $store->category= $req->category;
        $store->subcategory= $req->subcategory;
        $store->price= $req->price;
        $store->discount_percentage= $req->discount_in_per;
        $discountprice= ($req->discount_in_per/100)*$req->price;
        $netdiscountprice = $req->price - $discountprice;
        $store->discountprice= $netdiscountprice;
        $files = [];
        if($req->hasfile('image'))
        { 
           foreach($req->file('image') as $file)
               {
                $filename=time().rand(1,100).'.'.$file->extension();
                $file->move(public_path('public/images'),$filename);
                 $files[] = $filename;
               }
       
       }
       $store->image = implode(',', $files);
    $store->description= $req->description;
    $store->status= $req->status;
    $store->save();
    return redirect()->back()->with('status', 'Product Added Successfully');
   
       }
       public function fatchsubcat($cat){
      
        $get = subcategorymodel::where('category',$cat)->orderBy('id','desc')->get();
        $html='<option value="">Select</option> ';
        foreach($get as $show)
        {
            $html.='<option value="'.$show->subcategory.'">'.$show->subcategory.'</option>';
        }
        
        return response()->json(['html',$html]);
    }

    public function editproduct($id){
        $result = productmodel::find($id);
        $get = subcategorymodel::where('subcategory',$result->subcategory)->orderBy('id','desc')->get();
        $images = explode(',', $result->image);
        $html="";
        foreach($get as $show)
        {
            $html.='<option value="'.$show->subcategory.'">'.$show->subcategory.'</option>';
        }
        return response()->json(['show' => $result, 'images' => $images, 'html' => $html]);

    }




    public function updateproduct(Request $req){
        $store = productmodel::find($req->id);
        $store->name= $req->name;
        $store->title= $req->title;
        $store->category= $req->category;
        $store->subcategory= $req->subcategory;
        $store->price= $req->price;
        $store->discountprice= $req->discountprice;
        $files = [];
        if($req->hasfile('image'))
        { 
           foreach($req->file('image') as $file)
               {
                $filename=time().rand(1,100).'.'.$file->extension();
                $file->move(public_path('public/images'),$filename);
                 $files[] = $filename;
               }
       
       }
       $store->image = implode(',', $files);
    $store->description= $req->description;
    $store->status= $req->status;
    $store->save();
    return redirect()->back()->with('status', 'Product Updated Successfully');
   
       }


public function deleteproduct($id){
        $result= productmodel::find($id);
        $delete=public_path($result->image);
            if(File::exists($delete)){
                File::delete($delete);
               }
               $result->delete();
               return redirect()->back()->with('status', 'Product Deletion Successfully');

      }

}
