<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MenuItem;

class MenuItemController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:menuItem');
    }

    public function index()
    {
        //
        $menuItems = MenuItem::get();
        return view('backend.menuItems.menuItems_all',compact('menuItems'));

    }//end method
    public function create()
    {
        //
        return view('backend.menuItems.menuItem_add');
    }//end method
    public function store(Request $request)
    {
        $request->validate([
            'name_en' => 'required|string',
            'name_ar' => 'string|nullable',
            'order' => 'integer|nullable',
            'type' => 'required'
        ]);
        $add = new MenuItem();
        $add->name_en = $request->name_en;
        $add->name_ar = $request->name_ar;
        $add->order = $request->order;
        $add->type = $request->type;
        $add->status = $request->status;
        $add->save();
        $notification = array(
            'message' => trans('home.this_item_created_Successfully'),
            'alert-type' => 'success'
        );
        return redirect()->route('all.menuitem')->with($notification);
    }
    public function edit($id)
    {
        $menuItem=MenuItem::findOrFail($id);
        if($menuItem){
            return view('backend.menuItems.menuItem_edit',compact('menuItem'));
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
        $add = MenuItem::findOrFail($menuItem_id);
        $add->name_en = $request->name_en;
        $add->name_ar = $request->name_ar;
        $add->order = $request->order;
        $add->type = $request->type;
        $add->status = $request->status;
        $add->save();
        $notification = array(
            'message' => trans('home.this_item_updated_successfully'),
            'alert-type' => 'success'
        );
        return redirect()->route('all.menuitem')->with($notification);
    }
    public function destroy($id){
        $menuItem = MenuItem::findOrFail($id);
        $menuItem->delete();
        $notification = array(
            'message' => trans('home.this_item_deleted_successfully'),
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);

    }//end method
}
