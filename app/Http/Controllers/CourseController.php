<?php

namespace App\Http\Controllers;

use App\Course;
use File;
use Image;
use Auth;
use DB;
use Illuminate\Http\Request;
class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $courses = Course::all();
        return view('admin.courses.courses',compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $courses = Course::get();
        return view('admin.courses.addCourse',compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $add = new Course();
        $add->title_en = $request->title_en;
        $add->title_ar = $request->title_ar;
        $add->parent_id = $request->parent_id;
        $add->order = $request->order;
        $add->link_en = str_replace("/","-",$request->link_en);
        $add->link_ar = str_replace("/","-",$request->link_ar);
        $add->text_en = $request->text_en;
        $add->text_ar = $request->text_ar;
        $add->small_text_en = $request->small_text_en;
        $add->small_text_ar = $request->small_text_ar;
        $add->youtube_link = $request->youtube_link ? $this->getYoutubeEmbedUrl($request->youtube_link) : '';
        $add->status = $request->status;
        if($request->hasFile("image")){
            $extension = $request->file('image')->getClientOriginalExtension();
            $filename = rand(11111111, 99999999). '.' . $extension;
            $request->file('image')->move( base_path() . '/uploads/courses/source', $filename );
            $add->image = $filename;
        }
        if($request->hasFile("breadcrump_video")){
            $extension = $request->file('breadcrump_video')->getClientOriginalExtension();
            $filename = rand(11111111, 99999999). '.' . $extension;
            $request->file('breadcrump_video')->move( base_path() . '/uploads/courses/source', $filename );
            $add->breadcrump_video = $filename;
        }
        $add->save();

        return redirect('admin/courses')->with('success',trans('home.your_item_added_successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $course=Course::find($id);
        if($course){
            $courses = Course::where('status', 1)->get();
            
            return view('admin.courses.editCourse',compact('course', 'courses'));
        }else{
            abort('404');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $add = Course::find($id);
        $add->title_en = $request->title_en;
        $add->title_ar = $request->title_ar;
        $add->parent_id = $request->parent_id;
        $add->order = $request->order;
        $add->link_en = str_replace("/","-",$request->link_en);
        $add->link_ar = str_replace("/","-",$request->link_ar);
        $add->text_en = $request->text_en;
        $add->text_ar = $request->text_ar;
        $add->small_text_en = $request->small_text_en;
        $add->small_text_ar = $request->small_text_ar;
        $add->youtube_link = $request->youtube_link ? $this->getYoutubeEmbedUrl($request->youtube_link) : '';
        $add->status = $request->status;
        if($request->hasFile("image")){
            @unlink( base_path() . '/uploads/courses/source/'. $add->image);
            $extension = $request->file('image')->getClientOriginalExtension();
            $filename = rand(11111111, 99999999). '.' . $extension;
            $request->file('image')->move( base_path() . '/uploads/courses/source', $filename );
            $add->image = $filename;
        }
        if($request->hasFile("breadcrump_video")){
            @unlink( base_path() . '/uploads/courses/source/'. $add->breadcrump_video);
            $extension = $request->file('breadcrump_video')->getClientOriginalExtension();
            $filename = rand(11111111, 99999999). '.' . $extension;
            $request->file('breadcrump_video')->move( base_path() . '/uploads/courses/source', $filename );
            $add->breadcrump_video = $filename;
        }

        $add->save();
        return redirect('admin/courses')->with('success',trans('home.your_item_updated_successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($ids)
    {
        //
        $ids = explode(',', $ids);
        if ($ids[0] == 'on') {
            unset($ids[0]);
        }
        foreach ($ids as $id) {
            $courses = Course::findOrFail($id);
            $img_path = base_path() . '/uploads/courses/source/';

            if ($course->image != null) {
                unlink(sprintf($img_path . '%s', $course->image));
            }

            $course->delete();
        }
    }
    
    function getYoutubeEmbedUrl($url){
         $shortUrlRegex = '/youtu.be\/([a-zA-Z0-9_-]+)\??/i';
         $longUrlRegex = '/youtube.com\/((?:embed)|(?:watch))((?:\?v\=)|(?:\/))([a-zA-Z0-9_-]+)/i';
    
        if (preg_match($longUrlRegex, $url, $matches)) {
            $youtube_id = $matches[count($matches) - 1];
        }
    
        if (preg_match($shortUrlRegex, $url, $matches)) {
            $youtube_id = $matches[count($matches) - 1];
        }
        return 'https://www.youtube.com/embed/' . $youtube_id ;
    }
}
