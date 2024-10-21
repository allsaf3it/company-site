<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use DB;
use Image;
use File;

class CourseController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:course');
    }

    public function index()
    {
        //
        $courses = Course::get();
        return view('backend.courses.courses_all',compact('courses'));

    }//end method
    public function create()
    {
        //
        $courses = Course::get();
        return view('backend.courses.course_add', compact('courses'));
    }//end method
    public function store(Request $request)
    {
        $request->validate([
            'name_en' => 'required|string',
            'name_ar' => 'string|nullable',
            'image' => 'mimes:jpeg,jpg,png,gif,svg,webp'
        ]);
        $add = new course();
        $add->name_en = $request->name_en;
        $add->name_ar = $request->name_ar;
        $add->youtube_link = $request->youtube_link;
        $add->order = $request->order;
        $add->link_en = str_replace(" ","-",$request->link_en);
        $add->link_ar = str_replace(" ","-",$request->link_ar);
        $add->text_en = $request->text_en;
        $add->text_ar = $request->text_ar;
        $add->left_desc_en = $request->left_desc_en;
        $add->left_desc_ar = $request->left_desc_ar;
        $add->visit_link = $request->visit_link;
        $add->right_desc_en = $request->right_desc_en;
        $add->right_desc_ar = $request->right_desc_ar;
        $add->alt_img = $request->alt_img;
        $add->color = $request->color;
        $add->meta_keywords_en = $request->meta_keywords_en;
        $add->meta_keywords_ar = $request->meta_keywords_ar;
        $add->meta_descriptions_en =$request->meta_descriptions_en;
        $add->meta_descriptions_ar =$request->meta_descriptions_ar;
        $add->status = $request->status;
        $add->parent_id = $request->parent_id;
        if($request->file('image')){
            $file = $request->file('image');
            $filename = rand(11111111, 99999999). '.' .$file->getClientOriginalExtension();
            $file->move(public_path('uploads/courses'), $filename);
            $add['image'] = $filename;
        }
        if($request->file('breadcrump')){
            $file = $request->file('breadcrump');
            $filename = rand(11111111, 99999999). '.' .$file->getClientOriginalExtension();
            $file->move(public_path('uploads/courses'), $filename);
            $add['breadcrump'] = $filename;
        }
        if($request->file('video')){
            $file = $request->file('video');
            $filename = rand(11111111, 99999999). '.' .$file->getClientOriginalExtension();
            $file->move(public_path('uploads/courses'), $filename);
            $add['video'] = $filename;
        }
        $add->save();
        $notification = array(
            'message' => trans('home.this_item_created_Successfully'),
            'alert-type' => 'success'
        );
        return redirect()->route('all.course')->with($notification);
    }
    public function edit($id)
    {
        $course=Course::findOrFail($id);
        if($course){
            $courses = Course::get();
            return view('backend.courses.course_edit',compact('course','courses'));
        }else{
            abort('404');
        }
    }
    public function update(Request $request){
        $request->validate([
            'name_en' => 'required|string',
            'name_ar' => 'string|nullable',
            'order' => 'numeric|nullable',
            'image' => 'mimes:jpeg,jpg,png,gif,svg,webp'
        ]);
        $course_id = $request->id;
        $add = Course::findOrFail($course_id);
        $add->name_en = $request->name_en;
        $add->name_ar = $request->name_ar;
        $add->youtube_link = $request->youtube_link;
        $add->order = $request->order;
        $add->link_en = str_replace(" ","-",$request->link_en);
        $add->link_ar = str_replace(" ","-",$request->link_ar);
        $add->text_en = $request->text_en;
        $add->text_ar = $request->text_ar;
        $add->left_desc_en = $request->left_desc_en;
        $add->left_desc_ar = $request->left_desc_ar;
        $add->visit_link = $request->visit_link;
        $add->right_desc_en = $request->right_desc_en;
        $add->right_desc_ar = $request->right_desc_ar;
        $add->alt_img = $request->alt_img;
        $add->color = $request->color;
        $add->meta_keywords_en = $request->meta_keywords_en;
        $add->meta_keywords_ar = $request->meta_keywords_ar;
        $add->meta_descriptions_en =$request->meta_descriptions_en;
        $add->meta_descriptions_ar =$request->meta_descriptions_ar;
        $add->status = $request->status;
        $add->parent_id = $request->parent_id;
        if($request->file('image')){
            $file = $request->file('image');
            @unlink(public_path('uploads/courses/' . $add->image));
            $filename = rand(11111111, 99999999). '.' .$file->getClientOriginalExtension();
            $file->move(public_path('uploads/courses'), $filename);
            $add['image'] = $filename;
        }
        if($request->file('breadcrump')){
            $file = $request->file('breadcrump');
            @unlink(public_path('uploads/courses/' . $add->breadcrump));
            $filename = rand(11111111, 99999999). '.' .$file->getClientOriginalExtension();
            $file->move(public_path('uploads/courses'), $filename);
            $add['breadcrump'] = $filename;
        }
        if($request->file('video')){
            $file = $request->file('video');
            @unlink(public_path('uploads/courses/' . $add->video));
            $filename = rand(11111111, 99999999). '.' .$file->getClientOriginalExtension();
            $file->move(public_path('uploads/courses'), $filename);
            $add['video'] = $filename;
        }
        $add->save();
        $notification = array(
            'message' => trans('home.this_item_updated_successfully'),
            'alert-type' => 'success'
        );
        return redirect()->route('all.course')->with($notification);
    }
    public function destroy($id){
        $course = Course::findOrFail($id);
        //delete message from folder
        @unlink(public_path('uploads/courses/' . $course->image));
        @unlink(public_path('uploads/courses/' . $course->breadcrump));
        @unlink(public_path('uploads/courses/' . $course->video));
        $course->delete();
        $notification = array(
            'message' => trans('home.this_item_deleted_successfully'),
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);

    }//end method
}
