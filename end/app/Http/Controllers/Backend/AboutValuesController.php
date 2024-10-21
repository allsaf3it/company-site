<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AboutValue;

class AboutValuesController extends Controller
{
    public function index()
    {
        //
        $aboutValues = AboutValue::get();
        return view('backend.aboutValues.aboutValues_all',compact('aboutValues'));

    }//end method
    public function create()
    {
        //
        return view('backend.aboutValues.aboutValues_add');
    }//end method
    public function store(Request $request)
    {
        $request->validate([
            'name_en' => 'required|string',
            'name_ar' => 'string|nullable',
            'image' => 'mimes:jpeg,jpg,png,gif,svg,webp'
        ]);
        $add = new AboutValue();
        $add->name_en = $request->name_en;
        $add->name_ar = $request->name_ar;
        $add->text_en = $request->text_en;
        $add->text_ar = $request->text_ar;
        if($request->file('image')){
            $file = $request->file('image');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('uploads/aboutValues'), $filename);
            $add['image'] = $filename;
        }
        $add->save();
        $notification = array(
            'message' => 'AboutValues created Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.aboutValues')->with($notification);
    }
    public function edit($id)
    {
        $aboutValue=AboutValue::findOrFail($id);
        if($aboutValue){
            return view('backend.aboutValues.aboutValues_edit',compact('aboutValue'));
        }else{
            abort('404');
        }
    }
    public function update(Request $request){
        $request->validate([
            'name_en' => 'required|string',
            'name_ar' => 'string|nullable',
            'image' => 'mimes:jpeg,jpg,png,gif,svg,webp'
        ]);
        $aboutvalue_id = $request->id;
        $add = AboutValue::findOrFail($aboutvalue_id);
        $add->name_en = $request->name_en;
        $add->name_ar = $request->name_ar;
        $add->text_en = $request->text_en;
        $add->text_ar = $request->text_ar;
        if($request->file('image')){
            $file = $request->file('image');
            @unlink(public_path('uploads/aboutValues/' . $add->image));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('uploads/aboutValues'), $filename);
            $add['image'] = $filename;
        }
        $add->save();
        $notification = array(
            'message' => 'AboutValues Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.aboutValues')->with($notification);
    }
    public function destroy($id){
        $aboutValue = AboutValue::findOrFail($id);
        //delete message from folder
        @unlink(public_path('uploads/aboutValues/' . $aboutValue->image));
        $aboutValue->delete();
        $notification = array(
            'message' => 'About Value Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);

    }//end method
}
