<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\BlogCategory;

class BlogCategoryController extends Controller
{


    public function __construct()
    {
        //$this->middleware('permission:blogcategory');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogCategories= BlogCategory::orderBy('id','desc')->get();
        return view('admin.blogCategories.blogCategories',compact('blogCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.blogCategories.addBlogCategory');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $blogcategory = new BlogCategory();
        $blogcategory->title_en = $request->title_en;
        $blogcategory->title_ar = $request->title_ar;
        $blogcategory->text_en = $request->text_en;
        $blogcategory->text_ar = $request->text_ar;
        $blogcategory->status = $request->status;
        $blogcategory->meta_keywords = $request->meta_keywords;
        $blogcategory->meta_description = $request->meta_description;
        $blogcategory->save();
        return redirect()->route('blog-categories.index',app()->getLocale())->with('success',trans('home.your_item_added_successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $blogCategory = BlogCategory::find($id);
        if($blogCategory){
            return view('admin.blogCategories.editBlogCategory',compact('blogCategory'));
        }else{
            abort('404');
        }
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //
        $blogcategory = BlogCategory::find($id);
        $blogcategory->title_en = $request->title_en;
        $blogcategory->title_ar = $request->title_ar;
        $blogcategory->text_en = $request->text_en;
        $blogcategory->text_ar = $request->text_ar;
        $blogcategory->status = $request->status;
        $blogcategory->meta_keywords = $request->meta_keywords;
        $blogcategory->meta_description = $request->meta_description;
        $blogcategory->save();
        return redirect()->route('blog-categories.index')->with('success',trans('home.your_item_updated_successfully'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($ids)
    {
        //
        $ids = explode(',', $ids);
        if ($ids[0] == 'on') {
            unset($ids[0]);
        }
        foreach ($ids as $id) {
            $m = BlogCategory::findOrFail($id);
            $m->delete();
        }
    }
}
