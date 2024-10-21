<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client;
use DB;
use Image;
use File;

class ClientController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:client');
    }
    
    public function index()
    {
        //
        $clients = Client::get();
        return view('backend.clients.clients_all',compact('clients'));

    }//end method
    public function create()
    {
        //
        $clients = Client::get();
        return view('backend.clients.client_add', compact('clients'));
    }//end method
    public function store(Request $request)
    {
        $add = new Client();

        $add->status = $request->status;
        if($request->file('image')){
            $file = $request->file('image');
            $filename = rand(11111111, 99999999). '.' .$file->getClientOriginalExtension();
            $file->move(public_path('uploads/clients'), $filename);
            $add['image'] = $filename;
        }
        $add->save();
        $notification = array(
            'message' => trans('home.this_item_created_Successfully'),
            'alert-type' => 'success'
        );
        return redirect()->route('all.client')->with($notification);
    }
    public function edit($id)
    {
        $client=Client::findOrFail($id);
        if($client){
            $clients = Client::get();
            return view('backend.clients.client_edit',compact('client','clients'));
        }else{
            abort('404');
        }
    }
    public function update(Request $request){
        $client_id = $request->id;
        $add = Client::findOrFail($client_id);
        $add->status = $request->status;
        if($request->file('image')){
            $file = $request->file('image');
            @unlink(public_path('uploads/clients/' . $add->image));
            $filename = rand(11111111, 99999999). '.' .$file->getClientOriginalExtension();
            $file->move(public_path('uploads/clients'), $filename);
            $add['image'] = $filename;
        }
        $add->save();
        $notification = array(
            'message' => trans('home.this_item_updated_successfully'),
            'alert-type' => 'success'
        );
        return redirect()->route('all.client')->with($notification);
    }
    public function destroy($id){
        $client = Client::findOrFail($id);
        //delete message from folder
        @unlink(public_path('uploads/clients/' . $client->image));
        $client->delete();
        $notification = array(
            'message' => trans('home.this_item_deleted_successfully'),
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);

    }//end method
}
