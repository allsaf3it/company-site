<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Testimonial;

class TestimonialsController extends Controller
{
    public function index()
    {
        //
        $testimonials = Testimonial::get();
        return view('backend.testimonials.testimonials_all',compact('testimonials'));

    }//end method
    public function create()
    {
        //
        return view('backend.testimonials.testimonials_add');
    }//end method
    public function store(Request $request)
    {
        $request->validate([
            'name_en' => 'required|string',
            'name_ar' => 'string|nullable',
            'position_en' => 'string|nullable',
            'position_ar' => 'string|nullable',
            'text_en' => 'string|nullable',
            'text_ar' => 'string|nullable',
            'image' => 'mimes:jpeg,jpg,png,gif,svg,webp'
        ]);
        $add = new Testimonial();
        $add->name_en = $request->name_en;
        $add->name_ar = $request->name_ar;
        $add->position_en = $request->position_en;
        $add->position_ar = $request->position_ar;
        $add->text_en = $request->text_en;
        $add->text_ar = $request->text_ar;
        if($request->file('image')){
            $file = $request->file('image');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('uploads/testimonials'), $filename);
            $add['image'] = $filename;
        }
        $add->save();
        $notification = array(
            'message' => 'Testimonial created Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.testimonial')->with($notification);
    }
    public function edit($id)
    {
        $testimonial=Testimonial::findOrFail($id);
        if($testimonial){
            return view('backend.testimonials.testimonials_edit',compact('testimonial'));
        }else{
            abort('404');
        }
    }
    public function update(Request $request){
        $request->validate([
            'name_en' => 'required|string',
            'name_ar' => 'string|nullable',
            'position_en' => 'string|nullable',
            'position_ar' => 'string|nullable',
            'text_en' => 'string|nullable',
            'text_ar' => 'string|nullable',
            'image' => 'mimes:jpeg,jpg,png,gif,svg,webp'
        ]);
        $testimonial_id = $request->id;
        $add = Testimonial::findOrFail($testimonial_id);
        $add->name_en = $request->name_en;
        $add->name_ar = $request->name_ar;
        $add->position_en = $request->position_en;
        $add->position_ar = $request->position_ar;
        $add->text_en = $request->text_en;
        $add->text_ar = $request->text_ar;
        if($request->file('image')){
            $file = $request->file('image');
            @unlink(public_path('uploads/testimonials/' . $add->image));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('uploads/testimonials'), $filename);
            $add['image'] = $filename;
        }
        $add->save();
        $notification = array(
            'message' => 'Testimonial Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.testimonial')->with($notification);
    }
    public function destroy($id){
        $testimonial = Testimonial::findOrFail($id);
        //delete message from folder
        @unlink(public_path('uploads/testimonials/' . $testimonial->image));
        $testimonial->delete();
        $notification = array(
            'message' => 'Testimonial Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);

    }//end method
}
