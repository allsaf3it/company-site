<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GalleryImage;

class GalleryImagesController extends Controller
{
    public function index()
    {
        //
        $gallerys = GalleryImage::get();
        return view('backend.galleryImages.gallerys_all',compact('gallerys'));

    }//end method
    public function create()
    {
        //
        return view('backend.galleryImages.gallery_add');
    }//end method
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|mimes:jpeg,jpg,png,gif,svg,webp'
        ]);
        $add = new GalleryImage();
        if($request->file('image')){
            $file = $request->file('image');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('uploads/galleryImages'), $filename);
            $add['image'] = $filename;
        }
        $add->save();
        $notification = array(
            'message' => 'Gallery created Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.gallery')->with($notification);
    }
    public function edit($id)
    {
        $gallery=GalleryImage::findOrFail($id);
        if($gallery){
            return view('backend.galleryImages.gallery_edit',compact('gallery'));
        }else{
            abort('404');
        }
    }
    public function update(Request $request){
        $request->validate([
            'image' => 'mimes:jpeg,jpg,png,gif,svg,webp'
        ]);
        $gallery_id = $request->id;
        $add = GalleryImage::findOrFail($gallery_id);
        if($request->file('image')){
            $file = $request->file('image');
            @unlink(public_path('uploads/galleryImages/' . $add->image));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('uploads/galleryImages'), $filename);
            $add['image'] = $filename;
        }
        $add->save();
        $notification = array(
            'message' => 'Gallery Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.gallery')->with($notification);
    }
    public function destroy($id){
        $gallery = GalleryImage::findOrFail($id);
        //delete message from folder
        @unlink(public_path('uploads/galleryImages/' . $gallery->image));
        $gallery->delete();
        $notification = array(
            'message' => 'Gallery Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);

    }//end method
}
