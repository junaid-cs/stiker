<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class rolecontroller extends Controller
{
    public function index(){
        $show = Role::orderBy('id', 'DESC')->get();
        return view('admin/role',compact('show'));
    }

    public function storeroles(Request $req){
        $store = new Role;
        $store->name = $req->name;
        $store->save();
        return redirect()->back()->with('status', 'Role Add Successfully');
    }

    public function editroles($id){
        $result = Role::find($id);
        return response()->json(['show' => $result]);

    }

    public function accesscontrols($id){
        $role = Role::find($id);
        $permission = Permission::get();
        
        return view('admin/asignrole',compact('role','permission'));

    }

    public function rolehavepermissions(Request $req){
        $assign = [];
        $permissions = $req->input('permission');
        $roleid = $req->roleid;
        
        foreach ($permissions as $key => $value) {
            $assign[] = $value;
        }
        $role = Role::find($roleid);
        foreach ($assign as $key => $permission) {
            if($role->hasPermissionTo($permission))
            {

            }
            else{
    
                $role->givePermissionTo($permission);
               
                
            }
            
        }
        return redirect()->back()->with('status','Permission Assign');
    }
    public function deleteassigns($permission_id, $role_id){
        $role = Role::find($role_id);
        if($role->hasPermissionTo($permission_id))
        {
            $role->revokePermissionTo($permission_id);
        return redirect()->back()->with('status','Permission Remove');
            
        }

    }

    public function updateroles(Request $req){
    
        $store = Role::find($req->id);
        $store->name = $req->name;
        $store->update();
        return redirect()->back()->with('status', 'Role Updated Successfully');
    }

    public function deleteroles($id){
        $result = Role::find($id)->delete();
        return redirect()->back()->with('status', 'Role Delected Successfully');


    }
}
