<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\About;

class AboutController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:about-us');
    }
    public function editAbout()
    {
        $about = About::first();
        return view('backend.about.about_edit',compact('about'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'title_en' => 'required|string',
            'title_ar' => 'string|nullable',
            'image' => 'mimes:jpeg,jpg,png,gif,svg,webp',
            // 'video' => 'mimes:mp4,mov,ogg',
            'years_of_experience' => 'numeric',
            'expert_specialist' => 'numeric',
            'successful_shipments' => 'numeric',
            'happy_customers' => 'numeric',
        ]);
        $add = About::first();
        $add->title_en = $request->title_en;
        $add->text_en = $request->text_en;
        $add->title_ar = $request->title_ar;
        $add->text_ar = $request->text_ar;
        $add->wallet_number = $request->wallet_number;
        $add->years_of_experience = $request->years_of_experience;
        $add->expert_specialist = $request->expert_specialist;
        $add->successful_shipments = $request->successful_shipments;
        $add->happy_customers = $request->happy_customers;
        if($request->file('image')){
            $file = $request->file('image');
            @unlink(public_path('uploads/about/' . $add->image));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('uploads/about'), $filename);
            $add['image'] = $filename;
        }
        if($request->file('video')){
            $file2 = $request->file('video');
            @unlink(public_path('uploads/about/' . $add->video));
            $filename2 = date('YmdHi').$file2->getClientOriginalName();
            $file2->move(public_path('uploads/about'), $filename2);
            $add['video'] = $filename2;
        }
        $add->save();
        $notification = array(
            'message' => 'About Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

}
