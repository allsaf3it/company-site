<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;

class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:setting');
    }

    public function editAbout()
    {
        $setting = Setting::first();
        return view('backend.setting.setting_edit',compact('setting'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'email' => 'email|nullable',
            'mobile' => 'numeric|regex:/^([0-9\s\-\+\(\)]*)$/|nullable',
            'mobile2' => 'numeric|regex:/^([0-9\s\-\+\(\)]*)$/|nullable',
            'whatsapp' => 'numeric|regex:/^([0-9\s\-\+\(\)]*)$/|nullable',
            'facebook' => 'string|nullable',
            'twitter' => 'string|nullable',
            'dribbble' => 'string|nullable',
            'behance' => 'string|nullable',
            'instgram' => 'string|nullable',
            'linkedin' => 'string|nullable',
            'youtube' => 'string|nullable'
        ]);
        $settings = Setting::first();
        $settings->email = $request->email;
        $settings->mobile = $request->mobile;
        $settings->mobile2 = $request->mobile2;
        $settings->whatsapp = $request->whatsapp;
        $settings->facebook = $request->facebook;
        $settings->twitter = $request->twitter;
        $settings->behance = $request->behance;
        $settings->dribbble = $request->dribbble;
        $settings->instgram = $request->instgram;
        $settings->linkedin = $request->linkedin;
        $settings->youtube = $request->youtube;
        $settings->website = $request->website;
        $settings->map_url = $request->map_url;
        $settings->save();
        $notification = array(
            'message' => 'Setting Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

}
