<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;

class BlogsController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:blog');
    }
    public function index()
    {
        //
        $blogs = Blog::get();
        return view('backend.blogs.blogs_all',compact('blogs'));

    }//end method
    public function create()
    {
        //
        return view('backend.blogs.blog_add');
    }//end method
    public function store(Request $request)
    {
        $request->validate([
            'title_en' => 'required|string',
            'title_ar' => 'string|nullable',
            'writer' => 'string|nullable',
            'date' => 'string|nullable',
            'image' => 'mimes:jpeg,jpg,png,gif,svg,webp'
        ]);
        $add = new Blog();
        $add->title_en = $request->title_en;
        $add->title_ar = $request->title_ar;
        $add->link_en = $request->link_en;
        $add->link_ar = $request->link_ar;
        $add->text_en = $request->text_en;
        $add->text_ar = $request->text_ar;
        $add->left_desc_en = $request->left_desc_en;
        $add->left_desc_ar = $request->left_desc_ar;
        $add->visit_link = $request->visit_link;
        $add->right_desc_en = $request->right_desc_en;
        $add->right_desc_ar = $request->right_desc_ar;
        $add->link_en = str_replace(" ","-",$request->link_en);
        $add->link_ar = str_replace(" ","-",$request->link_ar);
        $add->writer = $request->writer;
        $add->date = $request->date;
        $add->color = $request->color;
        $add->alt_img = $request->alt_img;
        $add->status = $request->status;
        $add->meta_keywords_en = $request->meta_keywords_en;
        $add->meta_keywords_ar = $request->meta_keywords_ar;
        $add->meta_descriptions_en =$request->meta_descriptions_en;
        $add->meta_descriptions_ar =$request->meta_descriptions_ar;

        if($request->file('image')){
            $file = $request->file('image');
            $filename = rand(11111111, 99999999). '.' .$file->getClientOriginalExtension();
            $file->move(public_path('uploads/blogs'), $filename);
            $add['image'] = $filename;
        }
        if($request->file('breadcrump')){
            $file = $request->file('breadcrump');
            $filename = rand(11111111, 99999999). '.' .$file->getClientOriginalExtension();
            $file->move(public_path('uploads/blogs'), $filename);
            $add['breadcrump'] = $filename;
        }
        if($request->file('video')){
            $file = $request->file('video');
            $filename = rand(11111111, 99999999). '.' .$file->getClientOriginalExtension();
            $file->move(public_path('uploads/blogs'), $filename);
            $add['video'] = $filename;
        }
        $add->save();
        $notification = array(
            'message' => trans('home.this_item_created_Successfully'),
            'alert-type' => 'success'
        );
        return redirect()->route('all.blogs')->with($notification);
    }
    public function edit($id)
    {
        $blog=Blog::findOrFail($id);
        if($blog){
            return view('backend.blogs.blog_edit',compact('blog'));
        }else{
            abort('404');
        }
    }
    public function update(Request $request){
        $request->validate([
            'title_en' => 'required|string',
            'title_ar' => 'string|nullable',
            'writer' => 'string|nullable',
            'date' => 'string|nullable',
            'image' => 'mimes:jpeg,jpg,png,gif,svg,webp'
        ]);
        $blog_id = $request->id;
        $add = Blog::findOrFail($blog_id);
        $add->title_en = $request->title_en;
        $add->title_ar = $request->title_ar;
        $add->link_en = $request->link_en;
        $add->link_ar = $request->link_ar;
        $add->text_en = $request->text_en;
        $add->text_ar = $request->text_ar;
        $add->left_desc_en = $request->left_desc_en;
        $add->left_desc_ar = $request->left_desc_ar;
        $add->visit_link = $request->visit_link;
        $add->right_desc_en = $request->right_desc_en;
        $add->right_desc_ar = $request->right_desc_ar;
        $add->link_en = str_replace(" ","-",$request->link_en);
        $add->link_ar = str_replace(" ","-",$request->link_ar);
        $add->writer = $request->writer;
        $add->date = $request->date;
        $add->color = $request->color;
        $add->alt_img = $request->alt_img;
        $add->status = $request->status;
        $add->meta_keywords_en = $request->meta_keywords_en;
        $add->meta_keywords_ar = $request->meta_keywords_ar;
        $add->meta_descriptions_en =$request->meta_descriptions_en;
        $add->meta_descriptions_ar =$request->meta_descriptions_ar;
        if($request->file('image')){
            $file = $request->file('image');
            @unlink(public_path('uploads/blogs/' . $add->image));
            $filename = rand(11111111, 99999999). '.' .$file->getClientOriginalExtension();
            $file->move(public_path('uploads/blogs'), $filename);
            $add['image'] = $filename;
        }
        if($request->file('breadcrump')){
            $file = $request->file('breadcrump');
            @unlink(public_path('uploads/blogs/' . $add->breadcrump));
            $filename = rand(11111111, 99999999). '.' .$file->getClientOriginalExtension();
            $file->move(public_path('uploads/blogs'), $filename);
            $add['breadcrump'] = $filename;
        }
        if($request->file('video')){
            $file = $request->file('video');
            @unlink(public_path('uploads/blogs/' . $add->video));
            $filename = rand(11111111, 99999999). '.' .$file->getClientOriginalExtension();
            $file->move(public_path('uploads/blogs'), $filename);
            $add['video'] = $filename;
        }
        $add->save();
        $notification = array(
            'message' => trans('home.this_item_updated_successfully'),
            'alert-type' => 'success'
        );
        return redirect()->route('all.blogs')->with($notification);
    }
    public function destroy($id){
        $blog = Blog::findOrFail($id);
        //delete message from folder
        @unlink(public_path('uploads/blogs/' . $blog->image));
        @unlink(public_path('uploads/blogs/' . $blog->breadcrump));
        @unlink(public_path('uploads/blogs/' . $blog->video));
        $blog->delete();
        $notification = array(
            'message' => trans('home.this_item_deleted_successfully'),
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);

    }//end method
}
