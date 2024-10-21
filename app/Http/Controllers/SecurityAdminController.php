<?php

namespace App\Http\Controllers;

use App\security;
use Illuminate\Http\Request;
use App\Setting;
use File;
use Image;
use App\feature;

class SecurityAdminController extends Controller
{
    public function index(){
        $herosection = security::where('name','heroSection')->first();
        $partenersection = security::where('name','partenerSection')->first();
        $staticsection = security::where('name','statisticSection')->first();
        $titlegoal = security::where('name','goalsSection')->first();
        $lastsection = security::where('name','lastSection')->first();
        return view("admin.security.securitydatapage",compact('herosection','partenersection','staticsection','titlegoal','lastsection'));
    }

    public function store(Request $request){
        if($request->hasFile("image")){
            $extension = $request->file('image')->getClientOriginalExtension();
            $filename = '/uploads/security/'.rand(11111111, 99999999). '.' . $extension;
            $request->file('image')->move( base_path() . '/uploads/security', $filename );
        }else{
            $filename = null;
        }
        if($request->status){
            $status = $request->status;
        }else{
            $status = 0;
        }
        security::create([
            'image' => $filename,
            'name' => $request->name,
            'title_en' => $request->title_en,
            'title_ar' => $request->title_ar,
            'descrption_en' => $request->descrption_en,
            'descrption_ar' => $request->descrption_ar ?? $request->descrption_en,
            'status' => $status
        ]);
        return redirect()->back()->with('success', 'Data added successfully');
    }

    public function update(Request $request){
        $data = security::where('id', $request->dataid)->first();
        if($request->hasFile("image")){
            $oldimage = $data->image;
            if($oldimage && file_exists($oldimage)){
                unlink($oldimage);
            }
            $extension = $request->file('image')->getClientOriginalExtension();
            $filename = '/uploads/security/'.rand(11111111, 99999999). '.' . $extension;
            $request->file('image')->move( base_path() . '/uploads/security', $filename );
        }else{
            if(isset($data->image)){
                $filename = $data->image;
            }else{
                $filename = null;
            }
        }
        $data->name = $request->name;
        $data->image = $filename;
        $data->title_en = $request->title_en;
        $data->title_ar = $request->title_ar;
        $data->descrption_en = $request->descrption_en;
        $data->descrption_ar = $request->descrption_ar ?? $request->descrption_en;
        $data->status = $request->status;
        $data->save();
        return redirect()->back()->with('success', 'Data updated successfully');
    }

    // add image
    public function createimage(){
        return view("admin.security.addimage");
    }
    public function editimage($id){
        $data = security::where('id', $id)->first();
        return view("admin.security.editimage",compact('data'));
    }

    public function listimage(){
        $partenersection = security::where('name','partenerSection')->get();
        return view("admin.security.listimage",compact('partenersection'));
    }

    public function deleteimage($id){
        $data = security::where('id', $id)->first();
        $image = $data->image;
        if($image && file_exists($image)){
            unlink($image);
        }
        $data->delete();
        return redirect()->back()->with('success', 'Data deleted successfully');
    }

    // statistic
    public function showstatics(){
        $staticsection = security::where('name','statisticSection')->get();
        return view("admin.security.liststatistic",compact("staticsection"));
    }
    public function edittatics($id){
        $data = security::where('id', $id)->first();
        return view("admin.security.edittatics",compact('data'));
    }
    public function deletetatics($id){
        $data = security::where('id', $id)->first();
        $data->delete();
        return redirect()->back()->with('success', 'Data deleted successfully');
    }

    // feature
    public function showfeature(){
        $feature = security::where('name','featureSection')->get();
        return view("admin.security.listfeature",compact("feature"));
    }

    public function editfeature($id){
        $data = security::where('id', $id)->first();
        return view("admin.security.editfeature",compact('data'));
    }

    public function deletefeature($id){
        $data = security::where('id', $id)->first();
        $data->delete();
        return redirect()->back()->with('success', 'Data deleted successfully');
    }

    public function moredetails($id){
        $feature = feature::where('security_id', $id)->get();
        return view("admin.security.listfeaturemore",compact("feature","id"));
    }

    public function createfeaturedetails($id){
        $data = security::where('id', $id)->first();
        return view("admin.security.createfeaturedetails",compact('data'));
    }

    public function storefeaturedetails(Request $request){
        if($request->hasFile("icon")){
            $extension = $request->file('icon')->getClientOriginalExtension();
            $filename = '/uploads/security/'.rand(11111111, 99999999). '.' . $extension;
            $request->file('icon')->move( base_path() . '/uploads/security', $filename );
        }else{
            $filename = null;
        }
        if($request->status){
            $status = $request->status;
        }else{
            $status = 0;
        }
        feature::create([
            'security_id' => $request->security_id,
            'title_en' => $request->title_en,
            'title_ar' => $request->title_ar,
            'status' => $status,
            'icon' => $filename,
        ]);
        return redirect()->back()->with('success', 'Data added successfully');
    }
    public function editfeaturedetails($id){
        $data = feature::where('id', $id)->first();
        return view("admin.security.editfeaturedetails",compact('data'));
    }

    public function updatefeaturedetails(Request $request){
        $data = feature::where('id', $request->dataid)->first();
        if($request->hasFile("icon")){
            $oldicon = $data->icon;
            if($oldicon && file_exists($oldicon)){
                unlink($oldicon);
            }
            $extension = $request->file('icon')->getClientOriginalExtension();
            $filename = '/uploads/security/'.rand(11111111, 99999999). '.' . $extension;
            $request->file('icon')->move( base_path() . '/uploads/security', $filename );
        }else{
            $filename = $data->icon;
        }
        $data->title_en = $request->title_en;
        $data->title_ar = $request->title_ar;
        $data->icon = $filename;
        $data->status = $request->status;
        $data->save();
        return redirect()->back()->with('success', 'Data updated successfully');
    }

    public function deletefeaturedetails($id){
        $data = feature::where('id', $id)->first();
        $icon = $data->icon;
        if($icon && file_exists($icon)){
            unlink($icon);
        }
        $data->delete();
        return redirect()->back()->with('success', 'Data deleted successfully');
    }

    // goals
    public function listgoal(){
        $titlegoal = security::where('name','statmentgoal')->get();
        return view("admin.security.listgoal",compact('titlegoal'));
    }
    public function editgoal($id){
        $data = security::where('id',$id)->first();
        return view("admin.security.editgoal",compact('data'));
    }

    public function updategoal(Request $request){
        $data = security::where('id', $request->goalid)->first();
        $data->title_en = $request->title_en;
        $data->title_ar = $request->title_ar;
        $data->descrption_en = $request->descrption_en;
        $data->descrption_ar = $request->descrption_ar ?? $request->descrption_en;
        $data->save();
        return redirect()->back()->with('success', 'Data updated successfully');
    }
    public function deletegoal($id){
        $titlegoal = security::where('id',$id)->first();
        $titlegoal->delete();
        return redirect()->back()->with('success', 'Data deleted successfully');
    }
    // lastsection
    public function lastsection(){
        $lastsection = security::where('name','lastSection')->get();
        return view("admin.security.listlastsection",compact('lastsection'));
    }
    public function editlastsection($id){
        $data = security::where('id',$id)->first();
        return view("admin.security.editlastsection",compact('data'));
    }
}
