<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductImage;
use DB;
use Image;
use File;

class ProductsController extends Controller
{
    public function index()
    {
        //
        $products = Product::get();
        return view('backend.products.products_all',compact('products'));

    }//end method
    public function create()
    {
        //
        return view('backend.products.product_add');
    }//end method
    public function store(Request $request)
    {
        $request->validate([
            'name_en' => 'required|string',
            'name_ar' => 'string|nullable',
            'image' => 'mimes:jpeg,jpg,png,gif,svg,webp'
        ]);
        $add = new Product();
        $add->name_en = $request->name_en;
        $add->name_ar = $request->name_ar;
        $add->category_id = $request->category_id;
        $link = str_replace(" ","-",$add->name_en);
        $add->link = str_replace("/","-",$link);
        $add->text_en = $request->text_en;
        $add->text_ar = $request->text_ar;
        if($request->file('image')){
            $file = $request->file('image');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('uploads/products'), $filename);
            $add['image'] = $filename;
        }
        $add->save();
        $notification = array(
            'message' => 'Product created Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.products')->with($notification);
    }
    public function edit($id)
    {
        $product=Product::findOrFail($id);
        if($product){
            return view('backend.products.product_edit',compact('product'));
        }else{
            abort('404');
        }
    }
    public function update(Request $request){
        $request->validate([
            'name_en' => 'required|string',
            'name_ar' => 'string|nullable',
            'image' => 'mimes:jpeg,jpg,png,gif,svg,webp'
        ]);
        $product_id = $request->id;
        $add = Product::findOrFail($product_id);
        $add->name_en = $request->name_en;
        $add->name_ar = $request->name_ar;
        $add->category_id = $request->category_id;
        $link = str_replace(" ","-",$add->name_en);
        $add->link = str_replace("/","-",$link);
        $add->text_en = $request->text_en;
        $add->text_ar = $request->text_ar;
        if($request->file('image')){
            $file = $request->file('image');
            @unlink(public_path('uploads/products/' . $add->image));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('uploads/products'), $filename);
            $add['image'] = $filename;
        }
        $add->save();
                ///////// save project images//////
            if(\Session::has('imagesUpload')){
                $images = \Session::get('imagesUpload');
                foreach ($images as $key=>$file) {
                    $img = new ProductImage();
                    $img->image = $file;
                    $img->product_id=$add->id;
                    $img->save();
                }
            }
    
            DB::table('temp_upload_files')->where('product_id',$product_id)->delete();
            session()->forget('imagesUpload');
            session()->forget('imagesUploadRealName');
        $notification = array(
            'message' => 'Product Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.products')->with($notification);
    }
    public function destroy($id){
        $product = Product::findOrFail($id);
        //delete message from folder
        @unlink(public_path('uploads/products/' . $product->image));
        $product->delete();
        $notification = array(
            'message' => 'Product Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);

    }//end method
           /////// upload product images///////////////
       public function uploadImages(Request $request){
        if($request->hasFile('file')){

            $file = $request->file("file");
            $realName = $file->getClientOriginalName();
            $mime = File::mimeType($file);
            $mimearr = explode('/', $mime);

            // $destinationPath = base_path() . '/uploads/'; // upload path
            $extension = $mimearr[1]; // getting file extension
            $fileName = rand(11111111, 99999999) . '.' . $extension; // renameing image
            
            $path = public_path('uploads/products/' . $fileName);
            
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
            DB::table('temp_upload_files')->insert(['server_name' => $fileName,'original_name' => $realName ,'product_id' => $request->productId, 'type'=>'product']);
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
        
        $img_path = public_path('uploads/products/');


        unlink(sprintf($img_path . '%s', $images[$key]));
              
        unset($images[$key]);
        unset($names[$key]);
        \Session::put('imagesUpload',$images);
        \Session::put('imagesUploadRealName',$names);
        DB::table('temp_upload_files')->where('original_name',$name)->delete();
    }
    
    public function deleteImege(){
        $productId = $_POST['productId'];
        $image = $_POST['image'];
        $img =ProductImage::where('product_id',$productId)->where('id',$image)->first();

        $img_path = public_path('uploads/products/');


        if ($img->image != null) {
            unlink(sprintf($img_path . '%s', $img->image));
        }
        $img->delete();
    }
}
