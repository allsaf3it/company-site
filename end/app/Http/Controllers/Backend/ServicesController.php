<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\ServiceImage;
use DB;
use Image;
use File;

class ServicesController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:service');
    }

    public function index()
    {
        //
        $services = Service::get();
        return view('backend.services.services_all',compact('services'));

    }//end method
    public function create()
    {
        //
        $services = Service::get();
        return view('backend.services.service_add', compact('services'));
    }//end method
    public function store(Request $request)
    {
        $request->validate([
            'name_en' => 'required|string',
            'name_ar' => 'string|nullable',
            'image' => 'mimes:jpeg,jpg,png,gif,svg,webp'
        ]);
        $add = new Service();
        $add->name_en = $request->name_en;
        $add->name_ar = $request->name_ar;
        $add->order = $request->order;
        $add->link_en = str_replace(" ","-",$request->link_en);
        $add->link_ar = str_replace(" ","-",$request->link_ar);
        $add->text_en = $request->text_en;
        $add->text_ar = $request->text_ar;
        $add->left_desc_en = $request->left_desc_en;
        $add->left_desc_ar = $request->left_desc_ar;
        $add->visit_link = $request->visit_link;
        $add->right_desc_en = $request->right_desc_en;
        $add->right_desc_ar = $request->right_desc_ar;
        $add->alt_img = $request->alt_img;
        $add->color = $request->color;
        $add->meta_keywords_en = $request->meta_keywords_en;
        $add->meta_keywords_ar = $request->meta_keywords_ar;
        $add->meta_descriptions_en =$request->meta_descriptions_en;
        $add->meta_descriptions_ar =$request->meta_descriptions_ar;
        $add->status = $request->status;
        $add->parent_id = $request->parent_id;
        if($request->file('image')){
            $file = $request->file('image');
            $filename = rand(11111111, 99999999). '.' .$file->getClientOriginalExtension();
            $file->move(public_path('uploads/services'), $filename);
            $add['image'] = $filename;
        }
        if($request->file('breadcrump')){
            $file = $request->file('breadcrump');
            $filename = rand(11111111, 99999999). '.' .$file->getClientOriginalExtension();
            $file->move(public_path('uploads/services'), $filename);
            $add['breadcrump'] = $filename;
        }
        if($request->file('video')){
            $file = $request->file('video');
            $filename = rand(11111111, 99999999). '.' .$file->getClientOriginalExtension();
            $file->move(public_path('uploads/services'), $filename);
            $add['video'] = $filename;
        }
        $add->save();
        $notification = array(
            'message' => trans('home.this_item_created_Successfully'),
            'alert-type' => 'success'
        );
        return redirect()->route('all.service')->with($notification);
    }
    public function edit($id)
    {
        $service=Service::findOrFail($id);
        if($service){
            $services = Service::get();
            return view('backend.services.service_edit',compact('service','services'));
        }else{
            abort('404');
        }
    }
    public function update(Request $request){
        $request->validate([
            'name_en' => 'required|string',
            'name_ar' => 'string|nullable',
            'order' => 'numeric|nullable',
            'image' => 'mimes:jpeg,jpg,png,gif,svg,webp'
        ]);
        $service_id = $request->id;
        $add = Service::findOrFail($service_id);
        $add->name_en = $request->name_en;
        $add->name_ar = $request->name_ar;
        $add->order = $request->order;
        $add->link_en = str_replace(" ","-",$request->link_en);
        $add->link_ar = str_replace(" ","-",$request->link_ar);
        $add->text_en = $request->text_en;
        $add->text_ar = $request->text_ar;
        $add->left_desc_en = $request->left_desc_en;
        $add->left_desc_ar = $request->left_desc_ar;
        $add->visit_link = $request->visit_link;
        $add->right_desc_en = $request->right_desc_en;
        $add->right_desc_ar = $request->right_desc_ar;
        $add->alt_img = $request->alt_img;
        $add->color = $request->color;
        $add->meta_keywords_en = $request->meta_keywords_en;
        $add->meta_keywords_ar = $request->meta_keywords_ar;
        $add->meta_descriptions_en =$request->meta_descriptions_en;
        $add->meta_descriptions_ar =$request->meta_descriptions_ar;
        $add->status = $request->status;
        $add->parent_id = $request->parent_id;
        if($request->file('image')){
            $file = $request->file('image');
            @unlink(public_path('uploads/services/' . $add->image));
            $filename = rand(11111111, 99999999). '.' .$file->getClientOriginalExtension();
            $file->move(public_path('uploads/services'), $filename);
            $add['image'] = $filename;
        }
        if($request->file('breadcrump')){
            $file = $request->file('breadcrump');
            @unlink(public_path('uploads/services/' . $add->breadcrump));
            $filename = rand(11111111, 99999999). '.' .$file->getClientOriginalExtension();
            $file->move(public_path('uploads/services'), $filename);
            $add['breadcrump'] = $filename;
        }
        if($request->file('video')){
            $file = $request->file('video');
            @unlink(public_path('uploads/services/' . $add->video));
            $filename = rand(11111111, 99999999). '.' .$file->getClientOriginalExtension();
            $file->move(public_path('uploads/services'), $filename);
            $add['video'] = $filename;
        }
        $add->save();
                ///////// save project images//////
            if(\Session::has('imagesUpload')){
                $images = \Session::get('imagesUpload');
                foreach ($images as $key=>$file) {
                    $img = new ServiceImage();
                    $img->image = $file;
                    $img->service_id=$add->id;
                    $img->save();
                }
            }
    
            DB::table('temp_upload_files')->where('service_id',$service_id)->delete();
            session()->forget('imagesUpload');
            session()->forget('imagesUploadRealName');
        $notification = array(
            'message' => trans('home.this_item_updated_successfully'),
            'alert-type' => 'success'
        );
        return redirect()->route('all.service')->with($notification);
    }
    public function destroy($id){
        $service = Service::findOrFail($id);
        //delete message from folder
        @unlink(public_path('uploads/services/' . $service->image));
        @unlink(public_path('uploads/services/' . $service->breadcrump));
        @unlink(public_path('uploads/services/' . $service->video));
        $service->delete();
        $notification = array(
            'message' => trans('home.this_item_deleted_successfully'),
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);

    }//end method
           /////// upload service images///////////////
       public function uploadImages(Request $request){
        if($request->hasFile('file')){

            $file = $request->file("file");
            $realName = $file->getClientOriginalName();
            $mime = File::mimeType($file);
            $mimearr = explode('/', $mime);

            // $destinationPath = base_path() . '/uploads/'; // upload path
            $extension = $mimearr[1]; // getting file extension
            $fileName = rand(11111111, 99999999) . '.' . $extension; // renameing image
            
            $path = public_path('uploads/services/' . $fileName);
            
            //  $file->move($destinationPath, $fileName);
            
            Image::make($file->getRealPath())->save($path);

            $arrayimage = list($width, $height) = getimagesize($file->getRealPath());
            // $widthreal = $arrayimage['0'];
            // $heightreal = $arrayimage['1'];

            // $width200 = ($widthreal / $heightreal) * 150;
            // $height200 = $width200 / ($widthreal / $heightreal);

            // $img200 = Image::canvas($width200, $height200);
            // $image200 = Image::make($file->getRealPath())->resize($width200, $height200, function ($c) {
            //     $c->aspectRatio();
            //     $c->upsize();
            // });
            // $img200->insert($image200, 'center');
            // $img200->save($resize200);

            // $width800 = ($widthreal / $heightreal) * 800;
            // $height800 = $width800 / ($widthreal / $heightreal);

            // $img800 = Image::canvas($width800, $height800);
            // $image800 = Image::make($file->getRealPath())->resize($width800, $height800, function ($c) {
            //     $c->aspectRatio();
            //     $c->upsize();
            // });
            // $img800->insert($image800, 'center');
            // $img800->save($resize800);
            DB::table('temp_upload_files')->insert(['server_name' => $fileName,'original_name' => $realName ,'service_id' => $request->serviceId, 'type'=>'service']);
            if(\Session::has('imagesUpload')){
                \Session::push('imagesUpload',$fileName);
                \Session::push('imagesUploadRealName',$realName);
            }else{
                $images = [];
                array_push($images,$fileName);
                \Session::put('imagesUpload',$images);
                
                $realImages = [];
                array_push($realImages,$realName);
                \Session::put('imagesUploadRealName',$realImages);
            }
        }
    }
    
    ///////// delete uploaded images///////////
    public function removeUploadImages(Request $request)
    {
        $name = $request->name;
        $names = \Session::get('imagesUploadRealName');
        $images = \Session::get('imagesUpload');
        $key = array_search($name, $names);
        
        $img_path = public_path('uploads/services/');


        unlink(sprintf($img_path . '%s', $images[$key]));
              
        unset($images[$key]);
        unset($names[$key]);
        \Session::put('imagesUpload',$images);
        \Session::put('imagesUploadRealName',$names);
        DB::table('temp_upload_files')->where('original_name',$name)->delete();
    }
    
    public function deleteImege(){
        $serviceId = $_POST['serviceId'];
        $image = $_POST['image'];
        $img =ServiceImage::where('service_id',$serviceId)->where('id',$image)->first();

        $img_path = public_path('uploads/services/');


        if ($img->image != null) {
            unlink(sprintf($img_path . '%s', $img->image));
        }
        $img->delete();
    }
}
