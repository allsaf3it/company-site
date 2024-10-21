<?php

namespace App\Http\Controllers;

use App\Category;
use App\Lang;
use App\Page;
use App\Menu;
use App\MenuItem;
use Auth;
use App\Service;
use App\Brand;
use App\Project;
use App\User;
use App\GalleryImage;
use App\BlogItem;
use App\ContactUs;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    ///// function return admin index view///////
    public function admin(){
        $services = Service::count();
        $brands = Brand::count();
        $projects = Project::count();
        $users = User::count();
        $galleryImages = GalleryImage::count();
        $blogs = BlogItem::count();
        $messages = ContactUs::count();
        $categories = Category::count();
        
        return view('admin.index',compact('services','brands','projects','users','galleryImages','blogs','messages','categories'));
    }

    ///// function set session lang of the app////
    public function setlang($lang){
        $langs = ['en', 'ar'];
        if (in_array($lang, $langs)) {
            session(['lang' => $lang]);
            return redirect()->back();
        }
    }


    ///// function publish and unpublish status////
    public function updatestatus($name,$ids)
    {
        $ids = explode(',', $ids);
        foreach ($ids as $x) {

            if($name == 'categories'){
                $update = Category::findOrFail($x);
            }

            if($name == 'countries'){
                $update = Country::findOrFail($x);
            }

            if($name == 'regions'){
                $update = Region::findOrFail($x);
            }

            if($name == 'pages'){
                $update = Page::findOrFail($x);
            }

            if($name == 'products'){
                $update = Product::findOrFail($x);
            }

            if($name == 'menus'){
                $update = Menu::findOrFail($x);
            }

            if($name == 'menu-items'){
                $update = MenuItem::findOrFail($x);
            }



            if ($update->status == 0) {
                $update->status = 1;
                $update->save();
            }
            else {
                $update->status = 0;
                $update->save();
            }
        }
    }
    
    public function switchTheme(){
        $user =Auth::user();
        if ($user ->theme == 'light') {
            $user ->theme = 'dark';
            $user ->save();
        }else {
            $user->theme = 'light';
            $user->save();
        }
        return back();
    }
}
