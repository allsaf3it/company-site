<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bot;
use DB;
use Image;
use File;

class BotController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:bot');
    }
    
    public function index()
    {
        //
        $bots = Bot::get();
        return view('backend.bots.bots_all',compact('bots'));

    }//end method
    public function create()
    {
        //
        $bots = Bot::get();
        return view('backend.bots.bot_add', compact('bots'));
    }//end method
    public function store(Request $request)
    {
        $request->validate([
            'name_en' => 'required|string',
            'name_ar' => 'string|nullable',
        ]);
        $add = new Bot();
        $add->name_en = $request->name_en;
        $add->name_ar = $request->name_ar;
        $add->video = $request->video;
        $add->status = $request->status;
        if($request->file('video')){
            $file = $request->file('video');
            $filename = rand(11111111, 99999999). '.' .$file->getClientOriginalExtension();
            $file->move(public_path('uploads/bots'), $filename);
            $add['video'] = $filename;
        }
        $add->save();
        $notification = array(
            'message' => trans('home.this_item_created_Successfully'),
            'alert-type' => 'success'
        );
        return redirect()->route('all.bot')->with($notification);
    }
    public function edit($id)
    {
        $bot=Bot::findOrFail($id);
        if($bot){
            $bots = Bot::get();
            return view('backend.bots.bot_edit',compact('bot','bots'));
        }else{
            abort('404');
        }
    }
    public function update(Request $request){
        $request->validate([
            'name_en' => 'required|string',
            'name_ar' => 'string|nullable',
        ]);
        $bot_id = $request->id;
        $add = Bot::findOrFail($bot_id);
        $add->name_en = $request->name_en;
        $add->name_ar = $request->name_ar;
        $add->status = $request->status;
        if($request->file('video')){
            $file = $request->file('video');
            @unlink(public_path('uploads/bots/' . $add->video));
            $filename = rand(11111111, 99999999). '.' .$file->getClientOriginalExtension();
            $file->move(public_path('uploads/bots'), $filename);
            $add['video'] = $filename;
        }
        $add->save();
        $notification = array(
            'message' => trans('home.this_item_updated_successfully'),
            'alert-type' => 'success'
        );
        return redirect()->route('all.bot')->with($notification);
    }
    public function destroy($id){
        $bot = Bot::findOrFail($id);
        //delete message from folder
        @unlink(public_path('uploads/bots/' . $bot->video));
        $bot->delete();
        $notification = array(
            'message' => trans('home.this_item_deleted_successfully'),
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);

    }//end method
}
