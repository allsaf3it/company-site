<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\BlogItem;
use App\BlogCategory;
use DB;
use File;
use Illuminate\Support\Facades\Input;
use Image;

class BlogItemController extends Controller
{


    public function __construct()
    {
        //$this->middleware('permission:blogitem');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $blogItems = BlogItem::orderBy('id','desc')->get();
        return view('admin.blogItems.blogItems',compact('blogItems'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $blogCategories = BlogCategory::where('status',1)->get();
        return view('admin.blogItems.addBlogItem',compact('blogCategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $blogitem = new BlogItem();
        $blogitem->title_en = $request->title_en;
        $blogitem->title_ar = $request->title_ar;
        $blogitem->blogcategory_id  = $request->blogcategory_id ;
        $link = str_replace(" ","-",$blogitem->title_en);
        $blogitem->link = str_replace("/","-",$link);
        $blogitem->date = $request->date;
        $blogitem->writer = $request->writer;
        $blogitem->status = $request->status;
        $blogitem->text_en = $request->text_en;
        $blogitem->text_ar = $request->text_ar;
        $blogitem->meta_keywords = $request->meta_keywords;
        $blogitem->meta_description = $request->meta_description;
        if ($request->hasFile("image")) {

            $file = $request->file("image");
            $mime = File::mimeType($file);
            $mimearr = explode('/', $mime);

           // $destinationPath = base_path() . '/uploads/'; // upload path   
            $extension = $mimearr[1]; // getting file extension
            $fileName = rand(11111, 99999) . '.' . $extension; // renameing image
            $path = base_path('uploads/blogitems/source/' . $fileName);
            $resize200 = base_path('uploads/blogitems/resize200/' . $fileName);
            $resize800 = base_path('uploads/blogitems/resize800/' . $fileName);
              //  $file->move($destinationPath, $fileName);

            Image::make($file->getRealPath())->save($path);

            $arrayimage = getimagesize($file->getRealPath());
            $widthreal = $arrayimage[0];
            $heightreal = $arrayimage[1];
            $width200 = ($widthreal / $heightreal) * 200;
            $height200 = $width200 / ($widthreal / $heightreal);
            if($widthreal > 200 && $heightreal > 200){
                $img200 = Image::canvas($width200, $height200);
                $image200 = Image::make($file->getRealPath())->resize($width200, $height200, function ($c) {
                    $c->aspectRatio();
                    $c->upsize();
                });
                $img200->insert($image200, 'center');
                $img200->save($resize200);
            }
            else{
               Image::make($file->getRealPath())->save($resize200);
            }
            $width800 = ($widthreal / $heightreal) * 800;
            $height800 = $width800 / ($widthreal / $heightreal);
            if($widthreal > 800 && $heightreal > 800){
                $img800 = Image::canvas($width800, $height800);
                $image800 = Image::make($file->getRealPath())->resize($width800, $height800, function ($c) {
                    $c->aspectRatio();
                    $c->upsize();
                });
                $img800->insert($image800, 'center');
                $img800->save($resize800);
            }
            else{
               Image::make($file->getRealPath())->save($resize800);
            }
            $blogitem->image = $fileName;
        }

        $blogitem->save();
        return redirect()->route('blog-items.index')->with('success',trans('home.your_item_added_successfully'));
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
        $blogItem = BlogItem::find($id);
        if($blogItem){
            $blogCategories = BlogCategory::where('status',1)->get();
            return view('admin.blogItems.editBlogItem',compact('blogCategories','blogItem'));
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
    public function update(Request $request, $id)
    {
        //
       
        $blogitem = BlogItem::find($id);
        $blogitem->title_en = $request->title_en;
        $blogitem->title_ar = $request->title_ar;
        $blogitem->blogcategory_id = $request->blogcategory_id;
        $link = str_replace(" ","-",$blogitem->title_en);
        $blogitem->link = str_replace("/","-",$link);
        $blogitem->date = $request->date;
        $blogitem->writer = $request->writer;
        $blogitem->status = $request->status;
        $blogitem->text_en = $request->text_en;
        $blogitem->text_ar = $request->text_ar;
        $blogitem->meta_keywords = $request->meta_keywords;
        $blogitem->meta_description = $request->meta_description;
        if ($request->hasFile("image")) {

            $file = $request->file("image");
            $mime = File::mimeType($file);
            $mimearr = explode('/', $mime);

            $img_path = base_path() . '/uploads/blogitems/source/';
            $img_path200 = base_path() . '/uploads/blogitems/resize200/';
            $img_path800 = base_path() . '/uploads/blogitems/resize800/';

            if ($blogitem->image != null) {
                unlink(sprintf($img_path . '%s', $blogitem->image));
                unlink(sprintf($img_path200 . '%s', $blogitem->image));
                unlink(sprintf($img_path800 . '%s', $blogitem->image));
            }
           // $destinationPath = base_path() . '/uploads/'; // upload path   
            $extension = $mimearr[1]; // getting file extension
            $fileName = rand(11111, 99999) . '.' . $extension; // renameing image
            $path = base_path('uploads/blogitems/source/' . $fileName);
            $resize200 = base_path('uploads/blogitems/resize200/' . $fileName);
            $resize800 = base_path('uploads/blogitems/resize800/' . $fileName);
              //  $file->move($destinationPath, $fileName);

            Image::make($file->getRealPath())->save($path);

            $arrayimage = getimagesize($file->getRealPath());
            $widthreal = $arrayimage[0];
            $heightreal = $arrayimage[1];
            $width200 = ($widthreal / $heightreal) * 200;
            $height200 = $width200 / ($widthreal / $heightreal);
            if($widthreal > 200 && $heightreal > 200){
                $img200 = Image::canvas($width200, $height200);
                $image200 = Image::make($file->getRealPath())->resize($width200, $height200, function ($c) {
                    $c->aspectRatio();
                    $c->upsize();
                });
                $img200->insert($image200, 'center');
                $img200->save($resize200);
            }
            else{
               Image::make($file->getRealPath())->save($resize200);
            }
            $width800 = ($widthreal / $heightreal) * 800;
            $height800 = $width800 / ($widthreal / $heightreal);
            if($widthreal > 800 && $heightreal > 800){
                $img800 = Image::canvas($width800, $height800);
                $image800 = Image::make($file->getRealPath())->resize($width800, $height800, function ($c) {
                    $c->aspectRatio();
                    $c->upsize();
                });
                $img800->insert($image800, 'center');
                $img800->save($resize800);
            }
            else{
               Image::make($file->getRealPath())->save($resize800);
            }
            $blogitem->image = $fileName;
        }
        $blogitem->save();
        return redirect()->route('blog-items.index',app()->getLocale())->with('success',trans('home.your_item_updated_successfully'));

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
            $m = BlogItem::findOrFail($id);
            $img_path = base_path() . '/uploads/blogitems/source/';
            $img_path200 = base_path() . '/uploads/blogitems/resize200/';
            $img_path800 = base_path() . '/uploads/blogitems/resize800/';

            if ($m->image != null) {
                unlink(sprintf($img_path . '%s', $m->image));
                unlink(sprintf($img_path200 . '%s', $m->image));
                unlink(sprintf($img_path800 . '%s', $m->image));
            }
            $m->delete();
        }
    }
}
