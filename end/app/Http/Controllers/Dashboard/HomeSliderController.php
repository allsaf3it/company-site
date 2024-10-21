<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomeSlider;

class HomeSliderController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:homeSlider');
    }
    public function index()
    {
        //
        $homeSliders = HomeSlider::get();
        return view('backend.homeSlider.homeSliders_all',compact('homeSliders'));

    }//end method
    public function create()
    {
        //
        return view('backend.homeSlider.homeSlider_add');
    }//end method
    public function store(Request $request)
    {
        $request->validate([
            'title_en' => 'required|string',
            'title_ar' => 'string|nullable',
            'text_en' => 'string|nullable',
            'text_ar' => 'string|nullable',
            'ex_years' => 'numeric|nullable',
            'image' => 'mimes:jpeg,jpg,png,gif,svg,webp'
        ]);
        $add = new HomeSlider();
        $add->title_en = $request->title_en;
        $add->title_ar = $request->title_ar;
        $add->text_en = $request->text_en;
        $add->text_ar = $request->text_ar;
        $add->ex_years = $request->ex_years;
        if($request->file('image')){
            $file = $request->file('image');
            $filename = rand(11111111, 99999999). '.' .$file->getClientOriginalExtension();
            $file->move(public_path('uploads/home-sliders'), $filename);
            $add['image'] = $filename;
        }
        $add->save();
        $notification = array(
            'message' => trans('home.this_item_created_Successfully'),
            'alert-type' => 'success'
        );
        return redirect()->route('all.homeslider')->with($notification);
    }
    public function edit($id)
    {
        $homeSlider=HomeSlider::findOrFail($id);
        if($homeSlider){
            return view('backend.homeSlider.homeSlider_edit',compact('homeSlider'));
        }else{
            abort('404');
        }
    }
    public function update(Request $request){
        $request->validate([
            'title_en' => 'required|string',
            'title_ar' => 'string|nullable',
            'text_en' => 'string|nullable',
            'text_ar' => 'string|nullable',
            'ex_years' => 'numeric|nullable',
            'image' => 'mimes:jpeg,jpg,png,gif,svg,webp'
        ]);
        $homeSlider_id = $request->id;
        $add = HomeSlider::findOrFail($homeSlider_id);
        $add->title_en = $request->title_en;
        $add->title_ar = $request->title_ar;
        $add->text_en = $request->text_en;
        $add->text_ar = $request->text_ar;
        $add->ex_years = $request->ex_years;
        if($request->file('image')){
            $file = $request->file('image');
            @unlink(public_path('uploads/home-sliders/' . $add->image));
            $filename = rand(11111111, 99999999). '.' .$file->getClientOriginalExtension();
            $file->move(public_path('uploads/home-sliders'), $filename);
            $add['image'] = $filename;
        }
        $add->save();
        $notification = array(
            'message' => trans('home.this_item_updated_successfully'),
            'alert-type' => 'success'
        );
        return redirect()->route('all.homeslider')->with($notification);
    }
    public function destroy($id){
        $homeSlider = HomeSlider::findOrFail($id);
        //delete message from folder
        @unlink(public_path('uploads/home-sliders/' . $homeSlider->image));
        $homeSlider->delete();
        $notification = array(
            'message' => trans('home.this_item_deleted_successfully'),
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);

    }//end method
}
