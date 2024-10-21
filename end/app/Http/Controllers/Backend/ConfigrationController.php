<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Configration;

class ConfigrationController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:configration');
    }

    public function editAbout()
    {
        $configration = Configration::first();
        return view('backend.configration.configration_edit',compact('configration'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'app_name_en' => 'string|nullable',
            'app_name_ar' => 'string|nullable',
            'about_app_en' => 'string|nullable',
            'about_app_ar' => 'string|nullable',
            'hero_text_en' => 'string|nullable',
            'hero_text_ar' => 'string|nullable',
            'address1' => 'string|nullable',
            'address2' => 'string|nullable',
            'copyright_text' => 'string|nullable',
            'copyright_link' => 'string|nullable',
            'app_logo' => 'mimes:jpeg,jpg,png,gif,svg,webp',
            'footer_logo' => 'mimes:jpeg,jpg,png,gif,svg,webp',
            'fav_icon' => 'mimes:jpeg,jpg,png,gif,svg,webp',
            'video_image' => 'mimes:jpeg,jpg,png,gif,svg,webp',
            'home_video' => 'mimes:mp4,mov,ogg,qt',
        ]);
        $configration = Configration::first();
        $configration->app_name_en = $request->app_name_en;
        $configration->app_name_ar = $request->app_name_ar;
        $configration->about_app_en = $request->about_app_en;
        $configration->about_app_ar = $request->about_app_ar;
        $configration->hero_text_en = $request->hero_text_en;
        $configration->hero_text_ar = $request->hero_text_ar;
        $configration->long_term_en = $request->long_term_en;
        $configration->long_term_ar = $request->long_term_ar;
        $configration->medium_term_en = $request->medium_term_en;
        $configration->medium_term_ar = $request->medium_term_ar;
        $configration->terms_and_conditions_en = $request->terms_and_conditions_en;
        $configration->terms_and_conditions_ar = $request->terms_and_conditions_ar;
        $configration->address1 = $request->address1;
        $configration->address2 = $request->address2;
        $configration->copyright_link = $request->copyright_link;
        $configration->copyright_text = $request->copyright_text;
        if($request->file('app_logo')){
            $file = $request->file('app_logo');
            @unlink(public_path('uploads/configration/' . $configration->app_logo));
            $filename = rand(11111, 99999). '.' .$file->getClientOriginalExtension();
            $file->move(public_path('uploads/configration'), $filename);
            $configration['app_logo'] = $filename;
        }
        if($request->file('footer_logo')){
            $file2 = $request->file('footer_logo');
            @unlink(public_path('uploads/configration/' . $configration->footer_logo));
            $filename2 = rand(11111, 99999). '.' .$file2->getClientOriginalExtension();
            $file2->move(public_path('uploads/configration'), $filename2);
            $configration['footer_logo'] = $filename2;
        }
        if($request->file('fav_icon')){
            $file2 = $request->file('fav_icon');
            @unlink(public_path('uploads/configration/' . $configration->fav_icon));
            $filename2 = rand(11111, 99999). '.' .$file2->getClientOriginalExtension();
            $file2->move(public_path('uploads/configration'), $filename2);
            $configration['fav_icon'] = $filename2;
        }
        if($request->file('video_image')){
            $file2 = $request->file('video_image');
            @unlink(public_path('uploads/configration/' . $configration->video_image));
            $filename2 = rand(11111, 99999). '.' .$file2->getClientOriginalExtension();
            $file2->move(public_path('uploads/configration'), $filename2);
            $configration['video_image'] = $filename2;
        }
        if($request->file('home_video')){
            $file2 = $request->file('home_video');
            @unlink(public_path('uploads/configration/' . $configration->home_video));
            $filename2 = rand(11111, 99999). '.' .$file2->getClientOriginalExtension();
            $file2->move(public_path('uploads/configration'), $filename2);
            $configration['home_video'] = $filename2;
        }
        $configration->save();
        $notification = array(
            'message' => 'Configration Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

}
