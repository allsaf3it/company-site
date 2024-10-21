<?php

namespace App\Http\Controllers;

use App\Job;
use DB;
use File;
use Image;
use Illuminate\Http\Request;

class JobsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        //
        $jobs = Job::orderBy('id','DESC')->get();
        return view('admin.jobs.jobs',compact('jobs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.jobs.addJob');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $add = new Job();
        $add->position_en = $request->position_en;
        $add->position_ar = $request->position_ar;
        $add->time = $request->time;
        $add->location = $request->location;

        if($request->status){
            $add->status = 1;
        }else{
            $add->status = 0;
        }

        $add->save();
        return redirect('admin/jobs')->with('success',trans('home.your_item_added_successfully'));
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
        $job=Job::find($id);
        if($job){
            return view('admin.jobs.editJob',compact('job'));
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
        $add = Job::find($id);
        $add->position_en = $request->position_en;
        $add->position_ar = $request->position_ar;
        $add->time = $request->time;
        $add->location = $request->location;

        if($request->status){
            $add->status = 1;
        }else{
            $add->status = 0;
        }

        $add->save();
        return redirect('/admin/jobs')->with('success',trans('home.your_item_updated_successfully'));
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
            $job = Job::findOrFail($id);

            $job->delete();
        }
    }  
    
}
