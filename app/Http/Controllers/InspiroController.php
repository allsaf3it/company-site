<?php

namespace App\Http\Controllers;

use App\Inspiro;
use File;
use Image;
use Auth;
use DB;
use Illuminate\Http\Request;
class InspiroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $inspiros = Inspiro::all();
        return view('admin.inspiros.inspiros',compact('inspiros'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $inspiros = Inspiro::get();
        return view('admin.inspiros.addInspiro',compact('inspiros'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $add = new Inspiro();
        $add->title_en = $request->title_en;
        $add->title_ar = $request->title_ar;
        $add->text_en = $request->text_en;
        $add->text_ar = $request->text_ar;
        $add->slug = $request->slug;
        $add->status = $request->status;
        if($request->hasFile("image")){
            $extension = $request->file('image')->getClientOriginalExtension();
            $filename = rand(11111111, 99999999). '.' . $extension;
            $request->file('image')->move( base_path() . '/uploads/inspiros/source', $filename );
            $add->image = $filename;
        }
        $add->save();

        return redirect('admin/inspiros')->with('success',trans('home.your_item_added_successfully'));
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
        $inspiro=Inspiro::find($id);
        if($inspiro){
            $inspiros = Inspiro::where('status', 1)->get();
            
            return view('admin.inspiros.editInspiro',compact('inspiro', 'inspiros'));
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
        $add = Inspiro::find($id);
        $add->title_en = $request->title_en;
        $add->title_ar = $request->title_ar;
        $add->text_en = $request->text_en;
        $add->text_ar = $request->text_ar;
        $add->slug = $request->slug;
        $add->status = $request->status;
        if($request->hasFile("image")){
            @unlink( base_path() . '/uploads/inspiros/source/'. $add->image);
            $extension = $request->file('image')->getClientOriginalExtension();
            $filename = rand(11111111, 99999999). '.' . $extension;
            $request->file('image')->move( base_path() . '/uploads/inspiros/source', $filename );
            $add->image = $filename;
        }

        $add->save();
        return redirect('admin/inspiros')->with('success',trans('home.your_item_updated_successfully'));
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
            $inspiro = Inspiro::findOrFail($id);
            $img_path = base_path() . '/uploads/inspiros/source/';

            if ($inspiro->image != null) {
                unlink(sprintf($img_path . '%s', $inspiro->image));
            }

            $inspiro->delete();
        }
    }
    
}
