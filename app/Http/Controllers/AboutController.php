<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\About;

use DB;
use File;
use Image;

class AboutController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:about');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function editAbout()
    {
        $about = About::first();
        return view('admin.about.editAbout',compact('about'));
    }

    public function update(Request $request)
    {
        $add = About::first();
        $add->title_en = $request->title_en;
        $add->text_en = $request->text_en;
        $add->title_ar = $request->title_ar;
        $add->text_ar = $request->text_ar;
        $add->more_title_en = $request->more_title_en;
        $add->more_title_ar = $request->more_title_ar;
        $add->more_text_en = $request->more_text_en;
        $add->more_text_ar = $request->more_text_ar;
        $add->last_title_en = $request->last_title_en;
        $add->last_title_ar = $request->last_title_ar;
        $add->last_text_en = $request->last_text_en;
        $add->last_text_ar = $request->last_text_ar;
        $add->courses_title_en = $request->courses_title_en;
        $add->courses_title_ar = $request->courses_title_ar;
        $add->courses_text_en = $request->courses_text_en;
        $add->courses_text_ar = $request->courses_text_ar;
        // $add->video_cdn = $request->video_cdn;
        $add->services_text_en = $request->services_text_en;
        $add->services_text_ar = $request->services_text_ar;
        $add->course_desc_en = $request->course_desc_en;
        $add->course_desc_ar = $request->course_desc_ar;
        $add->completed_projects = $request->completed_projects;
        $add->years_of_experience = $request->years_of_experience;
        $add->members = $request->members;

        if ($request->hasFile("image")) {

            $file = $request->file("image");
            $mime = File::mimeType($file);
            $mimearr = explode('/', $mime);

            $img_path = base_path() . '/uploads/aboutStrucs/source/';
            $img_path200 = base_path() . '/uploads/aboutStrucs/resize200/';
            $img_path800 = base_path() . '/uploads/aboutStrucs/resize800/';
            if ($add->image != null) {
                unlink(sprintf($img_path . '%s', $add->image));
                unlink(sprintf($img_path200 . '%s', $add->image));
                unlink(sprintf($img_path800 . '%s', $add->image));
            }
           // $destinationPath = base_path() . '/uploads/'; // upload path
            $extension = $mimearr[1]; // getting file extension
            $fileName = rand(11111, 99999) . '.' . $extension; // renameing image
            $path = base_path('uploads/aboutStrucs/source/' . $fileName);
            $resize200 = base_path('uploads/aboutStrucs/resize200/' . $fileName);
            $resize800 = base_path('uploads/aboutStrucs/resize800/' . $fileName);
              //  $file->move($destinationPath, $fileName);

            Image::make($file->getRealPath())->save($path);

            $arrayimage = list($width, $height) = getimagesize($file->getRealPath());
            $widthreal = $arrayimage['0'];
            $heightreal = $arrayimage['1'];

            $width200 = ($widthreal / $heightreal) * 150;
            $height200 = $width200 / ($widthreal / $heightreal);

            $img200 = Image::canvas($width200, $height200);
            $image200 = Image::make($file->getRealPath())->resize($width200, $height200, function ($c) {
                $c->aspectRatio();
                $c->upsize();
            });
            $img200->insert($image200, 'center');
            $img200->save($resize200);

            $width800 = ($widthreal / $heightreal) * 800;
            $height800 = $width800 / ($widthreal / $heightreal);

            $img800 = Image::canvas($width800, $height800);
            $image800 = Image::make($file->getRealPath())->resize($width800, $height800, function ($c) {
                $c->aspectRatio();
                $c->upsize();
            });
            $img800->insert($image800, 'center');
            $img800->save($resize800);

            $add->image = $fileName;
        }
        if ($request->hasFile("image2")) {

            $file = $request->file("image2");
            $mime = File::mimeType($file);
            $mimearr = explode('/', $mime);

            $img_path = base_path() . '/uploads/aboutStrucs/source/';
            $img_path200 = base_path() . '/uploads/aboutStrucs/resize200/';
            $img_path800 = base_path() . '/uploads/aboutStrucs/resize800/';
            if ($add->image2 != null) {
                unlink(sprintf($img_path . '%s', $add->image2));
                unlink(sprintf($img_path200 . '%s', $add->image2));
                unlink(sprintf($img_path800 . '%s', $add->image2));
            }
           // $destinationPath = base_path() . '/uploads/'; // upload path
            $extension = $mimearr[1]; // getting file extension
            $fileName = rand(11111, 99999) . '.' . $extension; // renameing image
            $path = base_path('uploads/aboutStrucs/source/' . $fileName);
            $resize200 = base_path('uploads/aboutStrucs/resize200/' . $fileName);
            $resize800 = base_path('uploads/aboutStrucs/resize800/' . $fileName);
              //  $file->move($destinationPath, $fileName);

            Image::make($file->getRealPath())->save($path);

            $arrayimage = list($width, $height) = getimagesize($file->getRealPath());
            $widthreal = $arrayimage['0'];
            $heightreal = $arrayimage['1'];

            $width200 = ($widthreal / $heightreal) * 150;
            $height200 = $width200 / ($widthreal / $heightreal);

            $img200 = Image::canvas($width200, $height200);
            $image200 = Image::make($file->getRealPath())->resize($width200, $height200, function ($c) {
                $c->aspectRatio();
                $c->upsize();
            });
            $img200->insert($image200, 'center');
            $img200->save($resize200);

            $width800 = ($widthreal / $heightreal) * 800;
            $height800 = $width800 / ($widthreal / $heightreal);

            $img800 = Image::canvas($width800, $height800);
            $image800 = Image::make($file->getRealPath())->resize($width800, $height800, function ($c) {
                $c->aspectRatio();
                $c->upsize();
            });
            $img800->insert($image800, 'center');
            $img800->save($resize800);

            $add->image2 = $fileName;
        }
        if ($request->hasFile("image3")) {

            $file = $request->file("image3");
            $mime = File::mimeType($file);
            $mimearr = explode('/', $mime);

            $img_path = base_path() . '/uploads/aboutStrucs/source/';
            $img_path200 = base_path() . '/uploads/aboutStrucs/resize200/';
            $img_path800 = base_path() . '/uploads/aboutStrucs/resize800/';
            if ($add->image3 != null) {
                unlink(sprintf($img_path . '%s', $add->image3));
                unlink(sprintf($img_path200 . '%s', $add->image3));
                unlink(sprintf($img_path800 . '%s', $add->image3));
            }
           // $destinationPath = base_path() . '/uploads/'; // upload path
            $extension = $mimearr[1]; // getting file extension
            $fileName = rand(11111, 99999) . '.' . $extension; // renameing image
            $path = base_path('uploads/aboutStrucs/source/' . $fileName);
            $resize200 = base_path('uploads/aboutStrucs/resize200/' . $fileName);
            $resize800 = base_path('uploads/aboutStrucs/resize800/' . $fileName);
              //  $file->move($destinationPath, $fileName);

            Image::make($file->getRealPath())->save($path);

            $arrayimage = list($width, $height) = getimagesize($file->getRealPath());
            $widthreal = $arrayimage['0'];
            $heightreal = $arrayimage['1'];

            $width200 = ($widthreal / $heightreal) * 150;
            $height200 = $width200 / ($widthreal / $heightreal);

            $img200 = Image::canvas($width200, $height200);
            $image200 = Image::make($file->getRealPath())->resize($width200, $height200, function ($c) {
                $c->aspectRatio();
                $c->upsize();
            });
            $img200->insert($image200, 'center');
            $img200->save($resize200);

            $width800 = ($widthreal / $heightreal) * 800;
            $height800 = $width800 / ($widthreal / $heightreal);

            $img800 = Image::canvas($width800, $height800);
            $image800 = Image::make($file->getRealPath())->resize($width800, $height800, function ($c) {
                $c->aspectRatio();
                $c->upsize();
            });
            $img800->insert($image800, 'center');
            $img800->save($resize800);

            $add->image3 = $fileName;
        }
        if ($request->hasFile("image4")) {

            $file = $request->file("image4");
            $mime = File::mimeType($file);
            $mimearr = explode('/', $mime);

            $img_path = base_path() . '/uploads/aboutStrucs/source/';
            $img_path200 = base_path() . '/uploads/aboutStrucs/resize200/';
            $img_path800 = base_path() . '/uploads/aboutStrucs/resize800/';
            if ($add->image4 != null) {
                unlink(sprintf($img_path . '%s', $add->image4));
                unlink(sprintf($img_path200 . '%s', $add->image4));
                unlink(sprintf($img_path800 . '%s', $add->image4));
            }
           // $destinationPath = base_path() . '/uploads/'; // upload path
            $extension = $mimearr[1]; // getting file extension
            $fileName = rand(11111, 99999) . '.' . $extension; // renameing image
            $path = base_path('uploads/aboutStrucs/source/' . $fileName);
            $resize200 = base_path('uploads/aboutStrucs/resize200/' . $fileName);
            $resize800 = base_path('uploads/aboutStrucs/resize800/' . $fileName);
              //  $file->move($destinationPath, $fileName);

            Image::make($file->getRealPath())->save($path);

            $arrayimage = list($width, $height) = getimagesize($file->getRealPath());
            $widthreal = $arrayimage['0'];
            $heightreal = $arrayimage['1'];

            $width200 = ($widthreal / $heightreal) * 150;
            $height200 = $width200 / ($widthreal / $heightreal);

            $img200 = Image::canvas($width200, $height200);
            $image200 = Image::make($file->getRealPath())->resize($width200, $height200, function ($c) {
                $c->aspectRatio();
                $c->upsize();
            });
            $img200->insert($image200, 'center');
            $img200->save($resize200);

            $width800 = ($widthreal / $heightreal) * 800;
            $height800 = $width800 / ($widthreal / $heightreal);

            $img800 = Image::canvas($width800, $height800);
            $image800 = Image::make($file->getRealPath())->resize($width800, $height800, function ($c) {
                $c->aspectRatio();
                $c->upsize();
            });
            $img800->insert($image800, 'center');
            $img800->save($resize800);

            $add->image4 = $fileName;
        }
        if ($request->hasFile("image5")) {

            $file = $request->file("image5");
            $mime = File::mimeType($file);
            $mimearr = explode('/', $mime);

            $img_path = base_path() . '/uploads/aboutStrucs/source/';
            $img_path200 = base_path() . '/uploads/aboutStrucs/resize200/';
            $img_path800 = base_path() . '/uploads/aboutStrucs/resize800/';
            if ($add->image5 != null) {
                unlink(sprintf($img_path . '%s', $add->image5));
                unlink(sprintf($img_path200 . '%s', $add->image5));
                unlink(sprintf($img_path800 . '%s', $add->image5));
            }
           // $destinationPath = base_path() . '/uploads/'; // upload path
            $extension = $mimearr[1]; // getting file extension
            $fileName = rand(11111, 99999) . '.' . $extension; // renameing image
            $path = base_path('uploads/aboutStrucs/source/' . $fileName);
            $resize200 = base_path('uploads/aboutStrucs/resize200/' . $fileName);
            $resize800 = base_path('uploads/aboutStrucs/resize800/' . $fileName);
              //  $file->move($destinationPath, $fileName);

            Image::make($file->getRealPath())->save($path);

            $arrayimage = list($width, $height) = getimagesize($file->getRealPath());
            $widthreal = $arrayimage['0'];
            $heightreal = $arrayimage['1'];

            $width200 = ($widthreal / $heightreal) * 150;
            $height200 = $width200 / ($widthreal / $heightreal);

            $img200 = Image::canvas($width200, $height200);
            $image200 = Image::make($file->getRealPath())->resize($width200, $height200, function ($c) {
                $c->aspectRatio();
                $c->upsize();
            });
            $img200->insert($image200, 'center');
            $img200->save($resize200);

            $width800 = ($widthreal / $heightreal) * 800;
            $height800 = $width800 / ($widthreal / $heightreal);

            $img800 = Image::canvas($width800, $height800);
            $image800 = Image::make($file->getRealPath())->resize($width800, $height800, function ($c) {
                $c->aspectRatio();
                $c->upsize();
            });
            $img800->insert($image800, 'center');
            $img800->save($resize800);

            $add->image5 = $fileName;
        }
        if ($request->hasFile("about_breadcrump")) {

            $file = $request->file("about_breadcrump");
            $mime = File::mimeType($file);
            $mimearr = explode('/', $mime);

            $img_path = base_path() . '/uploads/aboutStrucs/source/';
            $img_path200 = base_path() . '/uploads/aboutStrucs/resize200/';
            $img_path800 = base_path() . '/uploads/aboutStrucs/resize800/';
            if ($add->about_breadcrump != null) {
                unlink(sprintf($img_path . '%s', $add->about_breadcrump));
                unlink(sprintf($img_path200 . '%s', $add->about_breadcrump));
                unlink(sprintf($img_path800 . '%s', $add->about_breadcrump));
            }
           // $destinationPath = base_path() . '/uploads/'; // upload path
            $extension = $mimearr[1]; // getting file extension
            $fileName = rand(11111, 99999) . '.' . $extension; // renameing image
            $path = base_path('uploads/aboutStrucs/source/' . $fileName);
            $resize200 = base_path('uploads/aboutStrucs/resize200/' . $fileName);
            $resize800 = base_path('uploads/aboutStrucs/resize800/' . $fileName);
              //  $file->move($destinationPath, $fileName);

            Image::make($file->getRealPath())->save($path);

            $arrayimage = list($width, $height) = getimagesize($file->getRealPath());
            $widthreal = $arrayimage['0'];
            $heightreal = $arrayimage['1'];

            $width200 = ($widthreal / $heightreal) * 150;
            $height200 = $width200 / ($widthreal / $heightreal);

            $img200 = Image::canvas($width200, $height200);
            $image200 = Image::make($file->getRealPath())->resize($width200, $height200, function ($c) {
                $c->aspectRatio();
                $c->upsize();
            });
            $img200->insert($image200, 'center');
            $img200->save($resize200);

            $width800 = ($widthreal / $heightreal) * 800;
            $height800 = $width800 / ($widthreal / $heightreal);

            $img800 = Image::canvas($width800, $height800);
            $image800 = Image::make($file->getRealPath())->resize($width800, $height800, function ($c) {
                $c->aspectRatio();
                $c->upsize();
            });
            $img800->insert($image800, 'center');
            $img800->save($resize800);

            $add->about_breadcrump = $fileName;
        }

        if($request->hasFile("video")){
            @unlink( base_path() . '/uploads/aboutStrucs/source/'. $add->video);
            $extension = $request->file('video')->getClientOriginalExtension();
            $filename = rand(11111111, 99999999). '.' . $extension;
            $request->file('video')->move( base_path() . '/uploads/aboutStrucs/source', $filename );
            $add->video = $filename;
        }
        if($request->hasFile("show_reel")){
            @unlink( base_path() . '/uploads/aboutStrucs/source/'. $add->show_reel);
            $extension = $request->file('show_reel')->getClientOriginalExtension();
            $filename = rand(11111111, 99999999). '.' . $extension;
            $request->file('show_reel')->move( base_path() . '/uploads/aboutStrucs/source', $filename );
            $add->show_reel = $filename;
        }
        if($request->hasFile("about_video")){
            @unlink( base_path() . '/uploads/aboutStrucs/source/'. $add->about_video);
            $extension = $request->file('about_video')->getClientOriginalExtension();
            $filename = rand(11111111, 99999999). '.' . $extension;
            $request->file('about_video')->move( base_path() . '/uploads/aboutStrucs/source', $filename );
            $add->about_video = $filename;
        }
        if($request->hasFile("courses_video")){
            @unlink( base_path() . '/uploads/aboutStrucs/source/'. $add->courses_video);
            $extension = $request->file('courses_video')->getClientOriginalExtension();
            $filename = rand(11111111, 99999999). '.' . $extension;
            $request->file('courses_video')->move( base_path() . '/uploads/aboutStrucs/source', $filename );
            $add->courses_video = $filename;
        }
        $add->save();
        return redirect()->back()->with('success',trans('home.about_info_updated_successfully'));
    }
}
