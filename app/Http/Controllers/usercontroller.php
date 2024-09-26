<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\usermodel;


class usercontroller extends Controller
{
    public function index(){
        $show = usermodel::where('role','0')->orderBy('id','desc')->get();
        return view('admin/users',compact('show'));
    }
    public function storeuser(Request $req){
     $store = new usermodel;
     $store->name= $req->name;
     $store->email= $req->email;
     $store->password= Hash::make($req->password);
     $store->pass= $req->password;

     $store->save();
     return redirect()->back()->with('status', 'User Added Successfully');

    }
    public function edituser($id){
        $result = usermodel::find($id);
        return response()->json(['show' => $result]);

    }
    public function updateuser(Request $req){
        $store = usermodel::find($req->id);
        $store->name= $req->name;
        $store->email= $req->email;
        $store->password= Hash::make($req->password);
        $store->pass= $req->password;

        $store->update();
        return redirect()->back()->with('status', 'User Updation Successfully');
   
       }

    public function deleteuser($id){
        $show = usermodel::find($id)->delete();
        return redirect()->back()->with('status', 'User Deletion Successfully');

    }

 
}
