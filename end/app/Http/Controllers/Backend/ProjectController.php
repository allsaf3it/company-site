<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\ProjectImage;
use DB;
use Image;
use File;

class ProjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:project');
    }

    public function index()
    {
        //
        $projects = Project::get();
        return view('backend.projects.projects_all',compact('projects'));

    }//end method
    public function create()
    {
        //
        $projects = Project::get();
        return view('backend.projects.project_add', compact('projects'));
    }//end method
    public function store(Request $request)
    {
        $request->validate([
            'name_en' => 'required|string',
            'name_ar' => 'string|nullable',
            'image' => 'mimes:jpeg,jpg,png,gif,svg,webp'
        ]);
        $add = new Project();
        $add->name_en = $request->name_en;
        $add->name_ar = $request->name_ar;
        $add->link_en = str_replace(" ","-",$request->link_en);
        $add->link_ar = str_replace(" ","-",$request->link_ar);
        $add->short_text_en = $request->short_text_en;
        $add->short_text_ar = $request->short_text_ar;
        $add->text_en = $request->text_en;
        $add->text_ar = $request->text_ar;
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
            $file->move(public_path('uploads/projects'), $filename);
            $add['image'] = $filename;
        }
        if($request->file('breadcrump')){
            $file = $request->file('breadcrump');
            $filename = rand(11111111, 99999999). '.' .$file->getClientOriginalExtension();
            $file->move(public_path('uploads/projects'), $filename);
            $add['breadcrump'] = $filename;
        }
        if($request->file('video')){
            $file = $request->file('video');
            $filename = rand(11111111, 99999999). '.' .$file->getClientOriginalExtension();
            $file->move(public_path('uploads/projects'), $filename);
            $add['video'] = $filename;
        }
        $add->save();
        $notification = array(
            'message' => trans('home.this_item_created_Successfully'),
            'alert-type' => 'success'
        );
        return redirect()->route('all.project')->with($notification);
    }
    public function edit($id)
    {
        $project=Project::findOrFail($id);
        if($project){
            $projects = Project::get();
            return view('backend.projects.project_edit',compact('project','projects'));
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
        $project_id = $request->id;
        $add = Project::findOrFail($project_id);
        $add->name_en = $request->name_en;
        $add->name_ar = $request->name_ar;
        $add->link_en = str_replace(" ","-",$request->link_en);
        $add->link_ar = str_replace(" ","-",$request->link_ar);
        $add->short_text_en = $request->short_text_en;
        $add->short_text_ar = $request->short_text_ar;
        $add->text_en = $request->text_en;
        $add->text_ar = $request->text_ar;
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
            @unlink(public_path('uploads/projects/' . $add->image));
            $filename = rand(11111111, 99999999). '.' .$file->getClientOriginalExtension();
            $file->move(public_path('uploads/projects'), $filename);
            $add['image'] = $filename;
        }
        if($request->file('breadcrump')){
            $file = $request->file('breadcrump');
            @unlink(public_path('uploads/projects/' . $add->breadcrump));
            $filename = rand(11111111, 99999999). '.' .$file->getClientOriginalExtension();
            $file->move(public_path('uploads/projects'), $filename);
            $add['breadcrump'] = $filename;
        }
        if($request->file('video')){
            $file = $request->file('video');
            @unlink(public_path('uploads/projects/' . $add->video));
            $filename = rand(11111111, 99999999). '.' .$file->getClientOriginalExtension();
            $file->move(public_path('uploads/projects'), $filename);
            $add['video'] = $filename;
        }
        $add->save();
                ///////// save project images//////
            if(\Session::has('imagesUpload')){
                $images = \Session::get('imagesUpload');
                foreach ($images as $key=>$file) {
                    $img = new ProjectImage();
                    $img->image = $file;
                    $img->project_id=$add->id;
                    $img->save();
                }
            }
    
            DB::table('temp_upload_files')->where('project_id',$project_id)->delete();
            session()->forget('imagesUpload');
            session()->forget('imagesUploadRealName');
        $notification = array(
            'message' => trans('home.this_item_updated_successfully'),
            'alert-type' => 'success'
        );
        return redirect()->route('all.project')->with($notification);
    }
    public function destroy($id){
        $project = Project::findOrFail($id);
        //delete message from folder
        @unlink(public_path('uploads/projects/' . $project->image));
        @unlink(public_path('uploads/projects/' . $project->breadcrump));
        @unlink(public_path('uploads/projects/' . $project->video));
        $project->delete();
        $notification = array(
            'message' => trans('home.this_item_deleted_successfully'),
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);

    }//end method
           /////// upload project images///////////////
       public function uploadImages(Request $request){
        if($request->hasFile('file')){

            $file = $request->file("file");
            $realName = $file->getClientOriginalName();
            $mime = File::mimeType($file);
            $mimearr = explode('/', $mime);

            // $destinationPath = base_path() . '/uploads/'; // upload path
            $extension = $mimearr[1]; // getting file extension
            $fileName = rand(11111111, 99999999) . '.' . $extension; // renameing image
            
            $path = public_path('uploads/projects/' . $fileName);
            
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
            DB::table('temp_upload_files')->insert(['server_name' => $fileName,'original_name' => $realName ,'project_id' => $request->projectId, 'type'=>'project']);
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
        
        $img_path = public_path('uploads/projects/');


        unlink(sprintf($img_path . '%s', $images[$key]));
              
        unset($images[$key]);
        unset($names[$key]);
        \Session::put('imagesUpload',$images);
        \Session::put('imagesUploadRealName',$names);
        DB::table('temp_upload_files')->where('original_name',$name)->delete();
    }
    
    public function deleteImege(){
        $projectId = $_POST['projectId'];
        $image = $_POST['image'];
        $img =ProjectImage::where('project_id',$projectId)->where('id',$image)->first();

        $img_path = public_path('uploads/projects/');


        if ($img->image != null) {
            unlink(sprintf($img_path . '%s', $img->image));
        }
        $img->delete();
    }
}
