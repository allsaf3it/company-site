<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DashboardMenuItem;

class DashboardMenuItemController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:dashboardMenuItem');
    }

    public function index()
    {
        //
        $dashboardMenuItems = DashboardMenuItem::get();
        return view('backend.dashboardMenuItems.menuItems_all',compact('dashboardMenuItems'));

    }//end method
    public function create()
    {
        //
        $menuItems = DashboardMenuItem::get();
        return view('backend.dashboardMenuItems.menuItem_add', compact('menuItems'));
    }//end method
    public function store(Request $request)
    {
        $request->validate([
            'name_en' => 'required|string',
            'name_ar' => 'string|nullable',
            'order' => 'integer|nullable',
            'type' => 'required'
        ]);
        $add = new DashboardMenuItem();
        $add->name_en = $request->name_en;
        $add->name_ar = $request->name_ar;
        $add->order = $request->order;
        $add->parent_id = $request->parent_id;
        $add->font_awsome = $request->font_awsome;
        $add->type = $request->type;
        $add->status = $request->status;
        $add->save();
        $notification = array(
            'message' => trans('home.this_item_created_Successfully'),
            'alert-type' => 'success'
        );
        return redirect()->route('all.dashboardMenuitem')->with($notification);
    }
    public function edit($id)
    {
        $menuItem=DashboardMenuItem::findOrFail($id);
        $menuItems = DashboardMenuItem::get();
        if($menuItem){
            return view('backend.dashboardMenuItems.menuItem_edit',compact('menuItem', 'menuItems'));
        }else{
            abort('404');
        }
    }
    public function update(Request $request){
        $request->validate([
            'name_en' => 'required|string',
            'name_ar' => 'string|nullable',
            'order' => 'integer|nullable',
            'type' => 'required'
        ]);
        $menuItem_id = $request->id;
        $add = DashboardMenuItem::findOrFail($menuItem_id);
        $add->name_en = $request->name_en;
        $add->name_ar = $request->name_ar;
        $add->order = $request->order;
        $add->parent_id = $request->parent_id;
        $add->font_awsome = $request->font_awsome;
        $add->type = $request->type;
        $add->status = $request->status;
        $add->save();
        $notification = array(
            'message' => trans('home.this_item_updated_successfully'),
            'alert-type' => 'success'
        );
        return redirect()->route('all.dashboardMenuitem')->with($notification);
    }
    public function destroy($id){
        $menuItem = dashboardMenuitem::findOrFail($id);
        $menuItem->delete();
        $notification = array(
            'message' => trans('home.this_item_deleted_successfully'),
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);

    }//end method
}
