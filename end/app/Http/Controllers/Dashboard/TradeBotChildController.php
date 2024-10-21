<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BotType;
use App\Models\BotTypeChild;
use DB;
use Image;
use File;

class TradeBotChildController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:BotTypeChild');
    }
    
    public function index()
    {
        //
        $bots = BotTypeChild::get();
        return view('backend.tradeBotsChild.bots_all',compact('bots'));

    }//end method
    public function create()
    {
        //
        $botsType = BotType::get();
        return view('backend.tradeBotsChild.bot_add', compact('botsType'));
    }//end method
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
        ]);

        $add = new BotTypeChild();
        $add->bot_name = $request->name;
        $add->type_id = $request->parent_id;
        $add->desc_en = $request->desc_en;
        $add->desc_ar = $request->desc_ar;
        $link = str_replace(" ","-",$add->bot_name);
        $add->link = str_replace("/","-",$link);
        $add->status = $request->status;
        if($request->file('image')){
            $file = $request->file('image');
            $filename = rand(11111111, 99999999). '.' .$file->getClientOriginalExtension();
            $file->move(public_path('uploads/tradeBotsChild'), $filename);
            $add['image'] = $filename;
        }
        $add->save();

        $notification = array(
            'message' => trans('home.this_item_created_Successfully'),
            'alert-type' => 'success'
        );
        return redirect()->route('all.tradeBotChild')->with($notification);
    }
    public function edit($id)
    {
        $botTypeChild=BotTypeChild::findOrFail($id);
        if($botTypeChild){
            $botsType = BotType::get();
            $bot = $botTypeChild;
            return view('backend.tradeBotsChild.bot_edit',compact('bot','botsType'));
        }
        else{
            abort('404');
        }
    }
    public function update(Request $request){
        $request->validate([
            'name' => 'required|string',
        ]);
        $bot_id = $request->id;
        $botTypeChild=BotTypeChild::findOrFail($bot_id);
        // $botTypeChild=BotTypeChild::findOrFail($bot_id);
        $botTypeChild->bot_name = $request->name;
        $botTypeChild->type_id = $request->parent_id;
        $botTypeChild->desc_en = $request->desc_en;
        $botTypeChild->desc_ar = $request->desc_ar;
        $link = str_replace(" ","-",$botTypeChild->bot_name);
        $botTypeChild->link = str_replace("/","-",$link);
        $botTypeChild->status = $request->status;
        if($request->file('image')){
            $file = $request->file('image');
            @unlink(public_path('uploads/tradeBotsChild/' . $botTypeChild->image));
            $filename = rand(11111111, 99999999). '.' .$file->getClientOriginalExtension();
            $file->move(public_path('uploads/tradeBotsChild'), $filename);
            $botTypeChild['image'] = $filename;
        }
        $botTypeChild->save();

 
        $notification = array(
            'message' => trans('home.this_item_updated_successfully'),
            'alert-type' => 'success'
        );
        return redirect()->route('all.tradeBotChild')->with($notification);
    }
    public function destroy($id){
        $botTypeChild=BotTypeChild::findOrFail($id);
        //delete message from folder

        if($botTypeChild){
            @unlink(public_path('uploads/tradeBotsChild/' . $botTypeChild->image));
            $botTypeChild->delete();

        }
        $notification = array(
            'message' => trans('home.this_item_deleted_successfully'),
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);

    }//end method
}
