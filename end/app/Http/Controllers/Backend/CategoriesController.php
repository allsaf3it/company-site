<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoriesController extends Controller
{
    public function index()
    {
        //
        $categories = Category::get();
        return view('backend.categories.categories_all',compact('categories'));

    }//end method
    public function create()
    {
        //
        return view('backend.categories.categories_add');
    }//end method
    public function store(Request $request)
    {
        $request->validate([
            'name_en' => 'required|string',
            'name_ar' => 'string|nullable',
            'text_en' => 'string|nullable',
            'text_ar' => 'string|nullable',
            'image' => 'mimes:jpeg,jpg,png,gif,svg,webp'
        ]);
        $add = new Category();
        $add->name_en = $request->name_en;
        $add->name_ar = $request->name_ar;
        $link = str_replace(" ","-",$add->name_en);
        $add->link = str_replace("/","-",$link);
        $add->text_en = $request->text_en;
        $add->text_ar = $request->text_ar;
        if($request->file('image')){
            $file = $request->file('image');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('uploads/categories'), $filename);
            $add['image'] = $filename;
        }
        $add->save();
        $notification = array(
            'message' => 'Category created Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.category')->with($notification);
    }
    public function edit($id)
    {
        $category=Category::findOrFail($id);
        if($category){
            return view('backend.categories.categories_edit',compact('category'));
        }else{
            abort('404');
        }
    }
    public function update(Request $request){
        $request->validate([
            'name_en' => 'required|string',
            'name_ar' => 'string|nullable',
            'text_en' => 'string|nullable',
            'text_ar' => 'string|nullable',
            'image' => 'mimes:jpeg,jpg,png,gif,svg,webp'
        ]);
        $category_id = $request->id;
        $add = Category::findOrFail($category_id);
        $add->name_en = $request->name_en;
        $add->name_ar = $request->name_ar;
        $link = str_replace(" ","-",$add->name_en);
        $add->link = str_replace("/","-",$link);
        $add->text_en = $request->text_en;
        $add->text_ar = $request->text_ar;
        if($request->file('image')){
            $file = $request->file('image');
            @unlink(public_path('uploads/categories/' . $add->image));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('uploads/categories'), $filename);
            $add['image'] = $filename;
        }
        $add->save();
        $notification = array(
            'message' => 'Category Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.category')->with($notification);
    }
    public function destroy($id){
        $category = Category::findOrFail($id);
        //delete message from folder
        @unlink(public_path('uploads/categories/' . $category->image));
        $category->delete();
        $notification = array(
            'message' => 'Category Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);

    }//end method
}
