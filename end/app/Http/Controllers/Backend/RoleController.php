<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use DB;
use Image;
use File;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:role');
    }

    public function index()
    {
        //
        $roles = Role::get();
        return view('backend.roles.roles_all',compact('roles'));

    }//end method
    public function create()
    {
        //
        $permissions = Permission::get();
        return view('backend.roles.role_add', compact('permissions'));
    }//end method
    public function store(Request $request)
    {
        $role = Role::create(['name' => $request->name]);
        $role->syncPermissions($request->permissions);
        $notification = array(
            'message' => trans('home.this_item_created_Successfully'),
            'alert-type' => 'success'
        );
        return redirect()->route('all.role')->with($notification);
    }
    public function edit($id)
    {
        $role=Role::findOrFail($id);
        if($role){
            $allPermissions= Permission::all();
            $rolePermissions= $role->permissions()->pluck('name')->toArray();
            return view('backend.roles.role_edit',compact('role','allPermissions', 'rolePermissions'));
        }else{
            abort('404');
        }
    }
    public function update(Request $request){
        $role_id = $request->id;
        $add = Role::findOrFail($role_id);
        $add->name = $request->name;
        $add->save();
        $rolePermissions= $add->permissions()->get();
        foreach($rolePermissions as $rolePermission){
            $add->revokePermissionTo($rolePermission);
        }

        $add->syncPermissions($request->permissions);
        $notification = array(
            'message' => trans('home.this_item_updated_successfully'),
            'alert-type' => 'success'
        );
        return redirect()->route('all.role')->with($notification);
    }
    public function destroy($id){
        $role = Role::findOrFail($id);
        //delete message from folder
        $role->delete();
        $notification = array(
            'message' => trans('home.this_item_deleted_successfully'),
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);

    }//end method
}
