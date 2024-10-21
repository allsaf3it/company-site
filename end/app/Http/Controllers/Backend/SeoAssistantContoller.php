<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SeoAssistant;

class SeoAssistantContoller extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:seo');
    }

    public function index()
    {
        $seo = SeoAssistant::first();
        return view('backend.seo.seo',compact('seo'));
    }

    public function update(Request $request)
    {
        $add = SeoAssistant::first();
        $add->home_meta_title_en = $request->home_meta_title_en;
        $add->home_meta_title_ar = $request->home_meta_title_ar;
        $add->home_meta_desc_en = $request->home_meta_desc_en;
        $add->home_meta_desc_ar = $request->home_meta_desc_ar;
        $add->about_meta_title_en = $request->about_meta_title_en;
        $add->about_meta_title_ar = $request->about_meta_title_ar;
        $add->about_meta_desc_en = $request->about_meta_desc_en;
        $add->about_meta_desc_ar = $request->about_meta_desc_ar;
        $add->gallery_images_meta_title = $request->gallery_images_meta_title;
        $add->gallery_images_meta_desc = $request->gallery_images_meta_desc;
        $add->gallery_videos_meta_title = $request->gallery_videos_meta_title;
        $add->gallery_videos_meta_desc = $request->gallery_videos_meta_desc;
        $add->contact_meta_title_en = $request->contact_meta_title_en;
        $add->contact_meta_title_ar = $request->contact_meta_title_ar;
        $add->contact_meta_desc_en = $request->contact_meta_desc_en;
        $add->contact_meta_desc_ar = $request->contact_meta_desc_ar;
        $add->home_meta_robots = $request->home_meta_robots; 
        $add->about_meta_robots = $request->about_meta_robots; 
        $add->contact_meta_robots = $request->contact_meta_robots; 
        $add->gallery_images_meta_robots = $request->gallery_images_meta_robots; 
        $add->gallery_videos_meta_robots = $request->gallery_videos_meta_robots; 
        $add->services_meta_title_en = $request->services_meta_title_en; 
        $add->services_meta_title_ar = $request->services_meta_title_ar; 
        $add->services_meta_desc_en = $request->services_meta_desc_en;
        $add->services_meta_desc_ar = $request->services_meta_desc_ar;
        $add->services_meta_robots = $request->services_meta_robots ; 
        $add->projects_meta_title_en = $request->projects_meta_title_en; 
        $add->projects_meta_title_ar = $request->projects_meta_title_ar; 
        $add->projects_meta_desc_en = $request->projects_meta_desc_en; 
        $add->projects_meta_desc_ar = $request->projects_meta_desc_ar; 
        $add->projects_meta_robots = $request->projects_meta_robots ; 
        $add->blogs_meta_title_en = $request-> blogs_meta_title_en;
        $add->blogs_meta_title_ar = $request-> blogs_meta_title_ar;
        $add->blogs_meta_desc_en = $request-> blogs_meta_desc_en;
        $add->blogs_meta_desc_ar = $request-> blogs_meta_desc_ar;
        $add->blogs_meta_robots = $request-> blogs_meta_robots;
        $add->courses_meta_title_en = $request-> courses_meta_title_en;
        $add->courses_meta_title_ar = $request-> courses_meta_title_ar;
        $add->courses_meta_desc_en = $request-> courses_meta_desc_en;
        $add->courses_meta_desc_ar = $request-> courses_meta_desc_ar;
        $add->courses_meta_robots = $request-> courses_meta_robots;
        $add->save();
        $notification = array(
            'message' => trans('home.this_item_updated_successfully'),
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

}
