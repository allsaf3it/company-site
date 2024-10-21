<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use DB;
use Image;
use File;

class PermissionController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:permission');
    }

    public function index()
    {
        //
        $permissions = Permission::get();
        return view('backend.permissions.permissions_all',compact('permissions'));

    }//end method
    public function create()
    {
        //
        $permissions = Permission::get();
        return view('backend.permissions.permission_add', compact('permissions'));
    }//end method
    public function store(Request $request)
    {
        Permission::create(['name' => $request->name]);
        $notification = array(
            'message' => trans('home.this_item_created_Successfully'),
            'alert-type' => 'success'
        );
        return redirect()->route('all.permission')->with($notification);
    }
    public function edit($id)
    {
        $permission=Permission::findOrFail($id);
        if($permission){
            $permissions = Permission::get();
            return view('backend.permissions.permission_edit',compact('permission','permissions'));
        }else{
            abort('404');
        }
    }
    public function update(Request $request){
        $permission_id = $request->id;
        $add = Permission::findOrFail($permission_id);
        $add->name = $request->name;
        $add->save();
        $notification = array(
            'message' => trans('home.this_item_updated_successfully'),
            'alert-type' => 'success'
        );
        return redirect()->route('all.permission')->with($notification);
    }
    public function destroy($id){
        $permission = Permission::findOrFail($id);
        //delete message from folder
        $permission->delete();
        $notification = array(
            'message' => trans('home.this_item_deleted_successfully'),
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);

    }//end method
}
