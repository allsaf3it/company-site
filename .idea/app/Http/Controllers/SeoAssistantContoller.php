<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SeoAssistant;
class SeoAssistantContoller extends Controller
{
    public function index()
    {
        $seo =SeoAssistant::first();
        return view('admin.seo.seo',compact('seo'));
    }

    public function update(Request $request, $id)
    {
        
        $add=SeoAssistant::first();
        $add->home_meta_title = $request->home_meta_title;
        $add->home_meta_desc = $request->home_meta_desc;
        $add->about_meta_ttitle = $request->about_meta_ttitle;
        $add->about_meta_desc = $request->about_meta_desc;
        $add->gallery_images_meta_title = $request->gallery_images_meta_title;
        $add->gallery_images_meta_desc = $request->gallery_images_meta_desc;
        $add->gallery_videos_meta_title = $request->gallery_videos_meta_title;
        $add->gallery_videos_meta_desc = $request->gallery_videos_meta_desc;
        $add->contact_meta_title = $request->contact_meta_title;
        $add->contact_meta_desc = $request->contact_meta_desc;
        $add->save();
        return back()->with('success',trans('home.data_updated_successfully'));
    }


}
