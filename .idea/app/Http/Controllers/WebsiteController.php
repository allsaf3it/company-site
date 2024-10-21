<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HomeSlider;
use App\Category;
use App\HomeImage;
use DB;
use App\MenuItem;
use Auth;
use App\Service;
use App\Project;
use App\Page;
use App\AboutStruc;
use App\About;
use App\ContactUs;
use App\Setting;
use Mail;
use App\BlogCategory;
use App\BlogItem;
use App\GalleryImage;
use App\GalleryVideo;
use Melbahja\Seo\Schema;
use Melbahja\Seo\Schema\Thing;
use Melbahja\Seo\MetaTags;
class WebsiteController extends Controller
{

    ////////////// function returnindex page///////////
    public function home(){
        $lang=\App::getLocale();
        $sliders = HomeSlider :: where('lang',$lang)->where('status',1)->get();
        $services = Service::where('status',1)->get();
        $blogs = BlogItem::where('status',1)->get();
        
        


        $schema = new Schema(
            new Thing('Organization', [
                'url'          => 'https://example.com',
                'logo'         => 'https://example.com/logo.png',
                'contactPoint' => new Thing('ContactPoint', [
                    'telephone' => '+1-000-555-1212',
                    'contactType' => 'customer service'
                ])
            ])
        );
        
        echo $schema;
        
        $metatags = new MetaTags();

        // $metatags
        //     ->title('PHP SEO')
        //     ->description('This is my description')
        //     ->meta('author', 'Mohamed Elabhja')
        //     ->image('https://avatars3.githubusercontent.com/u/8259014')
        //     ->mobile('https://m.example.com')
        //     ->canonical('https://example.com')
        //     ->shortlink('https://git.io/phpseo')
        //     ->amp('https://apm.example.com');

        // echo $metatags;
        
        

        return view('website.home',compact('sliders','services','blogs'));
    }

    ////////////FUNCTION RETURN VIEW ABOUT US//////
    public function aboutUs(){
        $lang=\App::getLocale();
        $about = About::first();
        $aboutStrucs = AboutStruc::where('lang',$lang)->where('status',1)->get();
        return view('website.about-us',compact('lang','about','aboutStrucs'));
    }

    ////////////FUNCTION RETURN VIEW CONTACT US//////
    public function contactUs(){
        $lang=\App::getLocale();
        $about = About::first();
        return view('website.contact-us',compact('lang','about'));
    }

    ////////////// function saveContact//////////
    public function saveContactUs(Request $request){
        $request->validate([
          'name'=>'required|max:150',
          'email'=>'required|email',
          'message'=>'required',
          'phone'=>'required|regex:/(01)[0-9]{9}/',
        ]);

        $contact = new ContactUs();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->message = $request->message;
        $contact->save();

//         $data = array('contact' => $contact);
//         $setting = Setting::first();
// 	    Mail::send('emails/contact_email', $data, function($msg) use ($setting) {
//   			$msg->to($setting ->contact_email, 'Ikokeez')->subject('Contact Us');
//   			$msg->from(config('mail.from.address'),config('mail.from.name'));
// 		});

        return back()->with(['contact_message'=>trans('home.Thank you for contacting us. A customer service officer will contact you soon')]);

    }


    ////////// FUNCTION RETURN PAGE INFORMATION /////////
    public function getPage($link){
        $lang=\App::getLocale();
        $page =Page::where('link',$link)->first();
        return view('website.page',compact('lang','page'));

    }

    ///////// function retun dynamic menu//////////
    public function menus(Request $request ,$menu,$id){
        $menu = MenuItem::where('id',$id)->where('type',$menu)->first();
        $lang=\App::getLocale();
        if($menu->type == 'home'){
            return redirect('/');
        }

        elseif($menu->type == 'about-us'){
            return redirect('about-us');
        }

        elseif($menu->type == 'contact-us'){
            return redirect('contact-us');
        }

        elseif($menu->type == 'projects'){
            return redirect('projects');
        }
        
        elseif($menu->type == 'project'){
            return redirect('project/'.$menu->type_value.'/details');
        }

        elseif($menu->type == 'services'){
            return redirect('services');
        }
        
        elseif($menu->type == 'service'){
            return redirect('service/'.$menu->type_value.'/details');
        }
        elseif($menu->type == 'galleryImages'){
            return redirect('galleryImages');
        }
        
        
        elseif($menu->type == 'galleryVideos'){
            return redirect('galleryVideos');
        }

        elseif($menu->type == 'blogs'){
            return redirect('blogs');
        }
    }


    /////////////////////FUNCTION RETURN VIEW BLOGS ///////////
    public function getBlogs(){
        $lang=\App::getLocale();
        $blogCategories = BlogCategory::where('status',1)->get();
        $blogCategoriesIds = BlogCategory::where('status',1)->pluck('id')->toArray();
        $blogs = BlogItem::whereIn('blogcategory_id',$blogCategoriesIds)->where('status',1)->paginate(15);
        return view('website.blogs',compact('lang','blogCategories','blogs'));
    }

    /////////////////////FUNCTION RETURN VIEW BLOG ///////////
    public function getBlogPage($link){
        $lang=\App::getLocale();
        $blog = BlogItem::where('link',$link)->first();
        return view('website.blogPage',compact('lang','blog'));
    }

    /////////////////////FUNCTION RETURN VIEW CATEGORY BLOGs ///////////
    public function getCategoryBlogs($id){
        $lang=\App::getLocale();
        $blogCategory = BlogCategory::find($id);
        $blogCategories = BlogCategory::where('status',1)->get();
        $blogs = BlogItem::where('blogcategory_id',$id)->where('status',1)->get();
        return view('website.category-blogs',compact('lang','blogCategories','blogs','blogCategory'));
    }

    ////////// function return country regions/////
    public function getRegions(){
        $id = $_POST['id'];
        $regions = Region::where('Country_id',$id)->where('status',1)->select('name_en','id','name_ar')->get();
        return response()->json($regions);
    }

    ////////// function return region areas/////
    public function getAreas(){
        $id = $_POST['id'];
        $areas = Area::where('region_id',$id)->where('status',1)->select('name_en','id','name_ar')->get();
        return response()->json($areas);
    }
    
    ////////// function return list of published products/////
    public function getProjects(){
        $projects =Project::where('status',1)->get();
        return view('website.projects',compact('projects'));
    }
    
    ////////// function return project Details /////
    public function getProjectDetails($id){
        $project =Project::find($id);
        if($project){
            return view('website.project-details',compact('project'));
        }else{
            abort('404');
        }
    }
    
    ////////// function return list of published services/////
    public function getservices(){
        $services =Service::where('status',1)->get();
        $about = About::first();
        return view('website.services',compact('services','about'));
    }
    
    ////////// function return project service /////
    public function getServiceDetails($id){
        $service =Service::find($id);
        if($service){
            $services = Service::where('status',1)->get();
            $about = About::first();
            return view('website.service-details',compact('service','about','services'));
        }else{
            abort('404');
        }
    }
    
    public function getGalleryImages(){
        $images =GalleryImage::where('status',1)->orderBy('order','asc')->paginate(9);
        $about = About::first();
        return view('website.gallery-images',compact('images','about'));
    }
    
    public function getGalleryVideos(){
        $videos =GalleryVideo::where('status',1)->orderBy('order','asc')->get();
        $about = About::first();
        return view('website.gallery-videos',compact('videos','about'));
    }
    
    public function BookNow(){
        
        return view('website.book-now');
    }
}
