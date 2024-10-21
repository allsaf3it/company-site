<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pricing;
use DB;
use Image;
use File;

class PricingController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:pricing');
    }
    
    public function index()
    {
        //
        $pricings = Pricing::get();
        return view('backend.pricings.pricings_all',compact('pricings'));

    }//end method
    public function create()
    {
        //
        $pricing = Pricing::get();
        return view('backend.pricings.pricing_add', compact('pricing'));
    }//end method
    public function store(Request $request)
    {
        $add = new Pricing();
        $add->name_en = $request->name_en;
        $add->name_ar = $request->name_ar;
        $add->desc_en = $request->desc_en;
        $add->desc_ar = $request->desc_ar;
        $add->text_en = $request->text_en;
        $add->text_ar = $request->text_ar;
        $add->price = $request->price;
        $add->discount = $request->discount;
        $add->num_bots = $request->num_bots;
        $add->status = $request->status;
        $add->save();
        $notification = array(
            'message' => trans('home.this_item_created_Successfully'),
            'alert-type' => 'success'
        );
        return redirect()->route('all.pricing')->with($notification);
    }
    public function edit($id)
    {
        $pricing=Pricing::findOrFail($id);
        if($pricing){
            $pricings = Pricing::get();
            return view('backend.pricings.pricing_edit',compact('pricing','pricings'));
        }else{
            abort('404');
        }
    }
    public function update(Request $request){
        $pricing_id = $request->id;
        $add = Pricing::findOrFail($pricing_id);
        $add->name_en = $request->name_en;
        $add->name_ar = $request->name_ar;
        $add->desc_en = $request->desc_en;
        $add->desc_ar = $request->desc_ar;
        $add->text_en = $request->text_en;
        $add->text_ar = $request->text_ar;
        $add->price = $request->price;
        $add->discount = $request->discount;
        $add->num_bots = $request->num_bots;
        $add->status = $request->status;
        $add->save();
        $notification = array(
            'message' => trans('home.this_item_updated_successfully'),
            'alert-type' => 'success'
        );
        return redirect()->route('all.pricing')->with($notification);
    }
    public function destroy($id){
        $pricing = Pricing::findOrFail($id);
        $pricing->delete();
        $notification = array(
            'message' => trans('home.this_item_deleted_successfully'),
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);

    }//end method
}
