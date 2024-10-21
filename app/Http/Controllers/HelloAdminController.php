<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Hello;

use DB;
use File;
use Image;

class HelloAdminController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function editHello()
    {
        $hello = Hello::first();
        return view('admin.hello.editHello',compact('hello'));
    }

    public function update(Request $request)
    {
        $add = Hello::first();
        $add->first_text_en = $request->first_text_en;
        $add->first_text_ar = $request->first_text_ar;
        $add->creative_title_en = $request->creative_title_en;
        $add->creative_title_ar = $request->creative_title_ar;
        $add->creative_text_en = $request->creative_text_en;
        $add->creative_text_ar = $request->creative_text_ar;
        $add->smart_title_en = $request->smart_title_en;
        $add->smart_title_ar = $request->smart_title_ar;
        $add->smart_text_en = $request->smart_text_en;
        $add->smart_text_ar = $request->smart_text_ar;
        $add->smart_area_en = str_replace(",",",",$request->smart_area_en);
        $add->smart_area_ar = str_replace(",",",",$request->smart_area_ar);
        $add->brand_title_en = $request->brand_title_en;
        $add->brand_title_ar = $request->brand_title_ar;
        $add->brand_text_en = $request->brand_text_en;
        $add->brand_text_ar = $request->brand_text_ar;
        $add->art_title_en = $request->art_title_en;
        $add->art_title_ar = $request->art_title_ar;
        $add->art_text_en = $request->art_text_en;
        $add->art_text_ar = $request->art_text_ar;
        $add->art_details_en = str_replace(",",",",$request->art_details_en);
        $add->art_details_ar = str_replace(",",",",$request->art_details_ar);
        $add->greeting_title_en = $request->greeting_title_en;
        $add->greeting_title_ar = $request->greeting_title_ar;
        $add->greeting_text_en = $request->greeting_text_en;
        $add->greeting_text_ar = $request->greeting_text_ar;
        $add->brandreel_text_en = $request->brandreel_text_en;
        $add->brandreel_text_ar = $request->brandreel_text_ar;
        $add->achievement_text_en = $request->achievement_text_en;
        $add->achievement_text_ar = $request->achievement_text_ar;
        $add->our_philosophy_title_en = $request->our_philosophy_title_en;
        $add->our_philosophy_title_ar = $request->our_philosophy_title_ar;
        $add->our_philosophy_text_en = $request->our_philosophy_text_en;
        $add->our_philosophy_text_ar = $request->our_philosophy_text_ar;

        if($request->hasFile("first_video")){
            @unlink( base_path() . '/uploads/hello/source/'. $add->first_video);
            $extension = $request->file('first_video')->getClientOriginalExtension();
            $filename = rand(11111111, 99999999). '.' . $extension;
            $request->file('first_video')->move( base_path() . '/uploads/hello/source', $filename );
            $add->first_video = $filename;
        }
        if($request->hasFile("creative_video")){
            @unlink( base_path() . '/uploads/hello/source/'. $add->creative_video);
            $extension = $request->file('creative_video')->getClientOriginalExtension();
            $filename = rand(11111111, 99999999). '.' . $extension;
            $request->file('creative_video')->move( base_path() . '/uploads/hello/source', $filename );
            $add->creative_video = $filename;
        }
        if($request->hasFile("smart_video")){
            @unlink( base_path() . '/uploads/hello/source/'. $add->smart_video);
            $extension = $request->file('smart_video')->getClientOriginalExtension();
            $filename = rand(11111111, 99999999). '.' . $extension;
            $request->file('smart_video')->move( base_path() . '/uploads/hello/source', $filename );
            $add->smart_video = $filename;
        }
        if($request->hasFile("smart_video2")){
            @unlink( base_path() . '/uploads/hello/source/'. $add->smart_video2);
            $extension = $request->file('smart_video2')->getClientOriginalExtension();
            $filename = rand(11111111, 99999999). '.' . $extension;
            $request->file('smart_video2')->move( base_path() . '/uploads/hello/source', $filename );
            $add->smart_video2 = $filename;
        }
        if($request->hasFile("brand_video")){
            @unlink( base_path() . '/uploads/hello/source/'. $add->brand_video);
            $extension = $request->file('brand_video')->getClientOriginalExtension();
            $filename = rand(11111111, 99999999). '.' . $extension;
            $request->file('brand_video')->move( base_path() . '/uploads/hello/source', $filename );
            $add->brand_video = $filename;
        }
        if($request->hasFile("art_video")){
            @unlink( base_path() . '/uploads/hello/source/'. $add->art_video);
            $extension = $request->file('art_video')->getClientOriginalExtension();
            $filename = rand(11111111, 99999999). '.' . $extension;
            $request->file('art_video')->move( base_path() . '/uploads/hello/source', $filename );
            $add->art_video = $filename;
        }
        if($request->hasFile("greeting_image")){
            @unlink( base_path() . '/uploads/hello/source/'. $add->greeting_image);
            $extension = $request->file('greeting_image')->getClientOriginalExtension();
            $filename = rand(11111111, 99999999). '.' . $extension;
            $request->file('greeting_image')->move( base_path() . '/uploads/hello/source', $filename );
            $add->greeting_image = $filename;
        }
        if($request->hasFile("brandreel_video")){
            @unlink( base_path() . '/uploads/hello/source/'. $add->brandreel_video);
            $extension = $request->file('brandreel_video')->getClientOriginalExtension();
            $filename = rand(11111111, 99999999). '.' . $extension;
            $request->file('brandreel_video')->move( base_path() . '/uploads/hello/source', $filename );
            $add->brandreel_video = $filename;
        }
        if($request->hasFile("our_philosophy_video")){
            @unlink( base_path() . '/uploads/hello/source/'. $add->our_philosophy_video);
            $extension = $request->file('our_philosophy_video')->getClientOriginalExtension();
            $filename = rand(11111111, 99999999). '.' . $extension;
            $request->file('our_philosophy_video')->move( base_path() . '/uploads/hello/source', $filename );
            $add->our_philosophy_video = $filename;
        }
        $add->save();
        return redirect()->back()->with('success',trans('home.about_info_updated_successfully'));
    }
}
