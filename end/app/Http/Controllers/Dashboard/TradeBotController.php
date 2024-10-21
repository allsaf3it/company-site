<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BotType;
use App\Models\BotTypeChild;
use DB;
use Image;
use File;

class TradeBotController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:tradeBot');
    }
    
    public function index()
    {
        //
        $botsType = BotType::get();
        return view('backend.tradeBots.bots_all',compact('botsType'));

    }//end method
    public function create()
    {
        //
        $botsType = BotType::get();
        return view('backend.tradeBots.bot_add', compact('botsType'));
    }//end method
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
        ]);
        $add = new BotType();
        $add->name = $request->name;
        $link = str_replace(" ","-",$add->name);
        $add->link = str_replace("/","-",$link);
        $add->status = $request->status;
        if($request->file('image')){
            $file = $request->file('image');
            $filename = rand(11111111, 99999999). '.' .$file->getClientOriginalExtension();
            $file->move(public_path('uploads/tradeBots'), $filename);
            $add['image'] = $filename;
        }
        $add->save();
        
        $notification = array(
            'message' => trans('home.this_item_created_Successfully'),
            'alert-type' => 'success'
        );
        return redirect()->route('all.tradeBot')->with($notification);
    }
    public function edit($id)
    {
        $botType=BotType::findOrFail($id);
        if($botType){
            $bot = $botType;
            return view('backend.tradeBots.bot_edit',compact('bot'));
        }else{
            abort('404');
        }
    }
    public function update(Request $request){
        $request->validate([
            'name' => 'required|string',
        ]);
        $bot_id = $request->id;
        $botType=BotType::findOrFail($bot_id);
        // $botTypeChild=BotTypeChild::findOrFail($bot_id);
        $botType->name = $request->name;
        $link = str_replace(" ","-",$botType->name);
        $botType->link = str_replace("/","-",$link);
        $botType->status = $request->status;
        if($request->file('image')){
            $file = $request->file('image');
            @unlink(public_path('uploads/tradeBots/' . $botType->image));
            $filename = rand(11111111, 99999999). '.' .$file->getClientOriginalExtension();
            $file->move(public_path('uploads/tradeBots'), $filename);
            $botType['image'] = $filename;
        }
        $botType->save();

        $notification = array(
            'message' => trans('home.this_item_updated_successfully'),
            'alert-type' => 'success'
        );
        return redirect()->route('all.tradeBot')->with($notification);
    }
    public function destroy($id){
        $botType=BotType::findOrFail($id);
        //delete message from folder
        if($botType){
            $allChildsUsdt = BotTypeChild::where('type_id', $id)->get();
            foreach($allChildsUsdt as $allChildUsdt){
                @unlink(public_path('uploads/tradeBots/' . $allChildUsdt->image));
                $allChildUsdt->delete();
            }
            @unlink(public_path('uploads/tradeBots/' . $botType->image));
            $botType->delete();

        }
        $notification = array(
            'message' => trans('home.this_item_deleted_successfully'),
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);

    }//end method
}
