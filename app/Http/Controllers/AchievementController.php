<?php

namespace App\Http\Controllers;

use App\Achievement;
use DB;
use Illuminate\Http\Request;

class AchievementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        //
        $achievements = Achievement::orderBy('id','DESC')->get();
        return view('admin.achievements.achievements',compact('achievements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.achievements.addAchievement');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $add = new Achievement();
        $add->title_en = $request->title_en;
        $add->title_ar = $request->title_ar;
        $add->text_en = $request->text_en;
        $add->text_ar = $request->text_ar;
        $add->color = $request->color;

        if($request->status){
            $add->status = 1;
        }else{
            $add->status = 0;
        }

        if($request->hasFile("video")){
            $extension = $request->file('video')->getClientOriginalExtension();
            $filename = rand(11111111, 99999999). '.' . $extension;
            $request->file('video')->move( base_path() . '/uploads/achievements/source', $filename );
            $add->video = $filename;
        }
        $add->save();
        return redirect('admin/achievements')->with('success',trans('home.your_item_added_successfully'));
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
        $achievement=Achievement::find($id);
        if($achievement){
            return view('admin.achievements.editAchievement',compact('achievement'));
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
        $add = Achievement::find($id);
        $add->title_en = $request->title_en;
        $add->title_ar = $request->title_ar;
        $add->text_en = $request->text_en;
        $add->text_ar = $request->text_ar;
        $add->color = $request->color;

        if($request->status){
            $add->status = 1;
        }else{
            $add->status = 0;
        }

        // if ($request->hasFile("logo")) {

        //     $file = $request->file("logo");
        //     $mime = File::mimeType($file);
        //     $mimearr = explode('/', $mime);

        //     $img_path = base_path() . '/uploads/brands/source/';
        //     $img_path200 = base_path() . '/uploads/brands/resize200/';
        //     $img_path800 = base_path() . '/uploads/brands/resize800/';

        //     if ($add->logo != null) {
        //         unlink(sprintf($img_path . '%s', $add->logo));
        //         unlink(sprintf($img_path200 . '%s', $add->logo));
        //         unlink(sprintf($img_path800 . '%s', $add->logo));
        //     }

        //     // $destinationPath = base_path() . '/uploads/'; // upload path
        //     $extension = $mimearr[1]; // getting file extension
        //     $fileName = rand(11111, 99999) . '.' . $extension; // renameing image
        //     $path = base_path('uploads/brands/source/' . $fileName);
        //     $resize200 = base_path('uploads/brands/resize200/' . $fileName);
        //     $resize800 = base_path('uploads/brands/resize800/' . $fileName);
        //     //  $file->move($destinationPath, $fileName);

        //     $img =Image::make($file->getRealPath());
        //     $img->save($path);

        //     $arrayimage = list($width, $height) = getimagesize($file->getRealPath());
        //     $widthreal = $arrayimage['0'];
        //     $heightreal = $arrayimage['1'];

        //     $width200 = ($widthreal / $heightreal) * 150;
        //     $height200 = $width200 / ($widthreal / $heightreal);

        //     $img200 = Image::canvas($width200, $height200);
        //     $image200 = Image::make($file->getRealPath())->resize($width200, $height200, function ($c) {
        //         $c->aspectRatio();
        //         $c->upsize();
        //     });
        //     $img200->insert($image200, 'center');
        //     $img200->save($resize200);

        //     $width800 = ($widthreal / $heightreal) * 800;
        //     $height800 = $width800 / ($widthreal / $heightreal);

        //     $img800 = Image::canvas($width800, $height800);
        //     $image800 = Image::make($file->getRealPath())->resize($width800, $height800, function ($c) {
        //         $c->aspectRatio();
        //         $c->upsize();
        //     });
        //     $img800->insert($image800, 'center');
        //     $img800->save($resize800);

        //     $add->logo = $fileName;
        // }
        if($request->hasFile("video")){
            @unlink( base_path() . '/uploads/achievements/source/'. $add->video);
            $extension = $request->file('video')->getClientOriginalExtension();
            $filename = rand(11111111, 99999999). '.' . $extension;
            $request->file('video')->move( base_path() . '/uploads/achievements/source', $filename );
            $add->video = $filename;
        }
        $add->save();
        return redirect('/admin/achievements')->with('success',trans('home.your_item_updated_successfully'));
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
        $img_path = base_path() . '/uploads/achievements/source/';
        
        foreach ($ids as $id) {
            $achievement = Achievement::findOrFail($id);

            if ($achievement->video != null) {
                unlink(sprintf($img_path . '%s', $achievement->video));
            }

            $achievement->delete();
        }
    }  
    
}
