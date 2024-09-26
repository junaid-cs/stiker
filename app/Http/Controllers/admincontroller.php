<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class admincontroller extends Controller
{
    public function index(){
        $roles = Role::get();
        $show = User::where('role','!=','0')->orderBy('id','desc')->get();
        return view('admin/admin',compact('show','roles'));
    }
    public function storeadmin(Request $req){
     $store = new User;
     $store->name= $req->name;
     $store->email= $req->email;
     $store->password= Hash::make($req->password);
     $store->pass= $req->password;
     $store->role= $req->role;
     $store->save();
     $store->assignRole($req->role);
     return redirect()->back()->with('status', 'Admin Added Successfully');

    }
    public function editadmin($id){
        $result = User::find($id);
        return response()->json(['show' => $result]);

    }

   
    public function updateadmin(Request $req){
        $store = User::find($req->id);
        $store->name= $req->name;
        $store->email= $req->email;
        $store->password= Hash::make($req->password);
        $store->pass= $req->password;
        $store->role= $req->role;
        $store->update();
        $store->assignRole($req->role);
        return redirect()->back()->with('status', 'Admin Updation Successfully');
   
       }

    public function deleteadmin($id){
        $show = usermodel::find($id)->delete();
        return redirect()->back()->with('status', 'Admin Deletion Successfully');

    }
}
