<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AboutStruc;

class AboutStrucController extends Controller
{
    public function index()
    {
        //
        $aboutStrucs = AboutStruc::get();
        return view('backend.aboutStruc.aboutStrucs_all',compact('aboutStrucs'));

    }//end method
    public function create()
    {
        //
        return view('backend.aboutStruc.aboutStruc_add');
    }//end method
    public function store(Request $request)
    {
        $request->validate([
            'name_en' => 'required|string',
            'name_ar' => 'string|nullable',
        ]);
        $add = new AboutStruc();
        $add->name_en = $request->name_en;
        $add->name_ar = $request->name_ar;
        $add->text_en = $request->text_en;
        $add->text_ar = $request->text_ar;
        $add->save();
        $notification = array(
            'message' => 'AboutStruc created Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.aboutStruc')->with($notification);
    }
    public function edit($id)
    {
        $aboutStruc=AboutStruc::findOrFail($id);
        if($aboutStruc){
            return view('backend.aboutStruc.aboutStruc_edit',compact('aboutStruc'));
        }else{
            abort('404');
        }
    }
    public function update(Request $request){
        $request->validate([
            'name_en' => 'required|string',
            'name_ar' => 'string|nullable',
        ]);
        $aboutstruc_id = $request->id;
        $add = AboutStruc::findOrFail($aboutstruc_id);
        $add->name_en = $request->name_en;
        $add->name_ar = $request->name_ar;
        $add->text_en = $request->text_en;
        $add->text_ar = $request->text_ar;
        $add->save();
        $notification = array(
            'message' => 'AboutStruc Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.aboutStruc')->with($notification);
    }
    public function destroy($id){
        $aboutStruc = AboutStruc::findOrFail($id);
        $aboutStruc->delete();
        $notification = array(
            'message' => 'aboutStruc Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);

    }//end method
}
