<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class permissioncontroller extends Controller
{
    public function index(){
        $show = Permission::orderBy('id', 'DESC')->get();
        return view('admin/permission',compact('show'));
    }

    public function storepermissions(Request $req){
        $store = new Permission;
        $store->name = $req->name;
        $store->save();
        return redirect()->back()->with('status', 'Permission Add Successfully');
    }

    public function editpermissions($id){
        $result = Permission::find($id);
        return response()->json(['show' => $result]);

    }

    public function updatepermissions(Request $req){
    
        $store = Permission::find($req->id);
        $store->name = $req->name;
        $store->update();
        return redirect()->back()->with('status', 'Permission Updated Successfully');
    }

    public function deletepermissions($id){
        $result = Permission::find($id)->delete();
        return redirect()->back()->with('status', 'Permission Delected Successfully');


    }
}
