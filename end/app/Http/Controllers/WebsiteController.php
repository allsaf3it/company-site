<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\Configration;
use App\Models\Product;
use App\Models\AboutValue;
use App\Models\About;
use App\Models\Service;
use App\Models\Project;
use App\Models\Bot;
use App\Models\Client;
use App\Models\GalleryImage;
use App\Models\GalleryVideo;
use App\Models\HomeSlider;
use App\Traits\SeoTrait;
use App\Models\AboutStruc;
use App\Models\SeoAssistant;
use App\Models\Course;
use App\Models\ContactUs;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Pricing;
use App\Models\Testimonial;
use Mail;


class WebsiteController extends Controller
{
    use SeoTrait;

    ///// function set session lang of the app////
    // public function setlang($lang){
    //     $langs = ['en', 'ar'];
    //     if (in_array($lang, $langs)) {
    //         session(['lang' => $lang]);
    //         return redirect()->back();
    //     }
    // }
    // public function checkUrl($slug){
    //     $checkProduct = Product::where('link',$slug)->first();
        
    //     if($checkProduct){
    //         return $this->menus($checkProduct->type);
    //     }
        
    // }
    // public function menus($menu){
    //     if($menu->type == 'product'){
    //         return $this->getProductDetails($menu->type);
    //     }
    // }
    public function home(){
        $lang=\LaravelLocalization::getCurrentLocale();
        $setting = Setting::first();
        $about = About::first();
        $configration = Configration::first();
        $services = Service::where('parent_id', 0)->where('status', 1)->orderBy('order')->limit(6)->get();
        $servicesTags = Service::select('name_en', 'name_ar', 'link_en', 'link_ar')->where('parent_id', 0)->where('status', 1)->orderBy('order')->limit(3)->get();
        $courses = Course::where('parent_id', 0)->where('status', 1)->orderBy('order')->limit(3)->get();
        $projects = Project::where('parent_id', 0)->where('status', 1)->limit(4)->get();
        $blogs = Blog::where('status', 1)->where('parent_id', '!=', 0)->limit(6)->get();
        $blogsParent = Blog::where('status', 1)->where('parent_id', 0)->get();
        $clients = Client::where('status', 1)->get();
        $bots = Bot::where('status', 1)->get();
        $pricings = Pricing::where('status', 1)->get();
        $seo = SeoAssistant::first();
        list($schema, $metatags) = $this->homePageSeo();
        return view('frontend.index', compact('lang', 'setting', 'about', 'pricings', 'configration', 'bots', 'clients', 'services', 'servicesTags', 'blogs', 'courses', 'projects', 'seo', 'schema', 'metatags', 'blogsParent'));
    }
    public function aboutUs(){
        $about = About::first();
        $aboutStrucs = AboutStruc::get();
        $testimonials = Testimonial::get();
        $seo = SeoAssistant::first();
        list($schema, $metatags) = $this->aboutUsPageSeo();
        return view('frontend.about-us', compact('about', 'aboutStrucs', 'testimonials', 'seo', 'metatags', 'schema'));
    }
    public function getservices(){
        $lang=\LaravelLocalization::getCurrentLocale();
        $services =Service::orderBy('order')->where('parent_id' , 0)->where('status',1)->paginate(6);
        // $subServices = Service::where('status',1)->where('parent_id', '!=', 0)->orderBy('order')->get();
        list($metatags)= $this->servicesPageSeo();
        return view('frontend.services',compact('services', 'metatags'));
    }
        ////////// function return project service /////
        public function getServiceDetails($link){
            $lang=\LaravelLocalization::getCurrentLocale();
            $service =Service::where('link_en',$link)->orWhere('link_ar',$link)->first();
            $subServices = Service::where('parent_id',$service->id)->where('status',1)->get();
            
            if(count($subServices) > 0){
                $services =$subServices;
                ////// seo script//////
                // list($metatags)= $this->servicesPageSeo();
                list($schema, $metatags)= $this->serviceSeo($link);
                return view('frontend.sub_services',compact('service','services', 'schema', 'metatags'));
            }
    
            if($service){
                $services = Service::where('status',1)->orderBy('id', 'desc')->limit(5)->get();
                ////// seo script//////
                list($schema, $metatags)= $this->serviceSeo($link);
                return view('frontend.service-details',compact('service','services', 'schema', 'metatags'));
            }else{
                abort('404');
            }
        }
    public function getCourses(){
        $lang=\LaravelLocalization::getCurrentLocale();
        $courses =Course::where('parent_id' , 0)->where('status',1)->paginate(6);
        // $subServices = Service::where('status',1)->where('parent_id', '!=', 0)->orderBy('order')->get();
        list($metatags)= $this->coursesPageSeo();
        return view('frontend.courses',compact('courses','metatags'));
    }
    ////////// function return project service /////
    public function getCourseDetails($link){
        $lang=\LaravelLocalization::getCurrentLocale();
        $course =Course::where('link_en',$link)->orWhere('link_ar',$link)->first();
        $subCourses = Course::where('parent_id',$course->id)->where('status',1)->get();
        
        if(count($subCourses) > 0){
            $courses =$subCourses;
            ////// seo script//////
            // list($metatags)= $this->servicesPageSeo();
            list($schema, $metatags)= $this->courseSeo($link);
            return view('frontend.sub_courses',compact('course','courses', 'schema', 'metatags'));
        }

        if($course){
            $courses = Course::where('status',1)->orderBy('id', 'desc')->limit(6)->get();
            ////// seo script//////
            // list($schema, $metatags)= $this->serviceSeo($link);
            list($schema, $metatags)= $this->courseSeo($link);
            return view('frontend.course-details',compact('course','courses', 'schema', 'metatags'));
        }else{
            abort('404');
        }
    }
    public function getProjects(){
        $lang=\LaravelLocalization::getCurrentLocale();
        $projects =Project::where('parent_id' , 0)->where('status',1)->paginate(6);
        // $subServices = Service::where('status',1)->where('parent_id', '!=', 0)->orderBy('order')->get();
        list($metatags)= $this->projectsPageSeo();
        return view('frontend.projects',compact('projects', 'metatags'));
    }
    
    ////////// function return project service /////
    public function getProjectDetails($link){
        $lang=\LaravelLocalization::getCurrentLocale();
        $project =Project::where('link_en',$link)->orWhere('link_ar',$link)->first();
        $subProjects = Project::where('parent_id',$project->id)->where('status',1)->get();
        
        if(count($subProjects) > 0){
            $projects =$subProjects;
            ////// seo script//////
            // list($metatags)= $this->servicesPageSeo();
            list($schema, $metatags)= $this->projectSeo($link);
            return view('frontend.sub_projects',compact('project','projects', 'schema', 'metatags'));
        }

        if($project){
            $projects = Project::where('status',1)->orderBy('id', 'desc')->limit(6)->get();
            ////// seo script//////
            // list($schema, $metatags)= $this->serviceSeo($link);
            list($schema, $metatags)= $this->projectSeo($link);
            return view('frontend.project-details',compact('project','projects', 'schema', 'metatags'));
        }else{
            abort('404');
        }
    }

    // public function products(){
    //     $products = Product::get();
    //     return view('frontend.products', compact('products'));
    // }
    // public function categories(){
    //     $categories = Category::get();
    //     return view('frontend.categories', compact('categories'));
    // }
    public function blogs(){
        $blogs = Blog::where('status', 1)->where('parent_id', '!=', 0)->get();
        $blogsParent = Blog::where('status', 1)->where('parent_id', 0)->get();
        list($metatags) = $this->blogsPageSeo();
        return view('frontend.blogs', compact('blogs', 'metatags', 'blogsParent'));
    }
    public function getBlogDetails($link){
        $blog =Blog::where('link_en',$link)->orWhere('link_ar',$link)->first();
        if($blog){
            $swipService = Blog::where('status', 1)->where('parent_id', $blog->parent_id)->where('id', '>' ,$blog->id)->first();
            if($swipService){
                $nextService = $swipService;
            }else{
                $nextService = Blog::where('status', 1)->where('parent_id', $blog->parent_id)->where('id', '<' ,$blog->id)->first();
            }
            $parentNextService = Blog::where('status', 1)->where('id', $nextService->parent_id)->first();
            $blogs = Blog::where('id', '!=', $blog->id)->orderBy('id', 'desc')->limit(6)->get();
            list($schema, $metatags)= $this->blogSeo($link);
            return view('frontend.blog-details', compact('blog', 'blogs', 'metatags', 'schema', 'nextService', 'parentNextService'));
        }else{
            abort('404');
        }
    }
    public function contactUs(){
        $setting = Setting::first();
        $configration = Configration::first();
        $addresses = Address::where('status', 1)->get();
        list($schema, $metatags) = $this->contactUsPageSeo();
        return view('frontend.contact-us', compact('setting', 'configration', 'schema', 'metatags', 'addresses'));
    }
    public function gallery(){
        $gallerys = GalleryImage::get();
        return view('frontend.gallery', compact('gallerys'));
    }
    public function video(){
        $videos = GalleryVideo::get();
        return view('frontend.video', compact('videos'));
    }
    public function getProductDetails($link){
        $product = Product::where('link',$link)->first();
        if($product){
            $products = Product::orderBy('id', 'desc')->get();
            return view('frontend.product-details', compact('product', 'products'));
        }else{
            abort('404');
        }
    }
    public function getCategoryDetails($link){
        $category = Category::where('link',$link)->first();
        if($category){
            $categories = Category::orderBy('id', 'desc')->get();
            $products = Product::where('category_id', $category->id)->get();
            return view('frontend.category-details', compact('category', 'categories', 'products'));
        }else{
            abort('404');
        }
    }

    // save contactus
    public function saveContactUs(Request $request){
        $request->validate([
          'name'=>'required|string|max:150',
          'email'=>'required|email|max:150',
          'message'=>'required|string',
          'company' => 'nullable|string',
          'phone'=>'nullable|numeric',
        ]);
        $setting = Setting::first();
       $formData= $request->all();
       
       $contact = new ContactUs();
       $contact->name = $request->name;
       $contact->email = $request->email;
    //    $contact->phone = $request->phone;
    //    if($request->company){
    //         $contact->company = $request->company;
    //    }
       $contact->message = $request->message;
       $contact->save();
       
    // Mail::send('email', [
    // 'name' => $request->get('name'),
    // 'email' => $request->get('email'),
    // // 'phone' => $request->get('phone'),
    // // 'company' => $request->get('company'),
    // 'comment' => $request->get('message') ],
    // function ($message)  use ($request) {
    // $setting = Setting::first();
    // $message->from($request->get('email'));
    // $message->to([$setting->email,'ahmed.m@dr-mahdyexporting.com','ahmed.m@dr-mahdyagri.com','hanan.gouda@dr-mahdyexporting.com', 'hanan.gouda@dr-mahdyagri.com', 'info@dr-mahdyexporting.com','info@dr-mahdyagri.com','mahdy@dr-mahdyexporting.com','mahdy@dr-mahdyagri.com', 'sales@dr-mahdyexporting.com', 'sales@dr-mahdyagri.com'])
    // ->subject($request->get('subject'));
    // });
       

       
    //   $data = array('contact' => $contact);
    //   $email = $setting->email;
    //   $subject = 'Contact Us';
    //   Mail::send('email', $data, function($message) use ($email, $subject) {
    // $message->to($email,'ahmed.m@dr-mahdyagri.com','hanan.gouda@dr-mahdyagri.com','info@dr-mahdyagri.com','mahdy@dr-mahdyagri.com','sales@dr-mahdyagri.com')->subject($subject);
// });
       
       
// Mail::send('email', [
// 'name' => $request->get('name'),
// 'email' => $request->get('email'),
// 'phone' => $request->get('phone'),
// 'comment' => $request->get('message') ],
// function ($message)  use ($request) {
//             $setting = Setting::first();

// $message->from($request->get('email'));
// $message->to([$setting->email, 'ahmed.m@dr-mahdyexporting.com', 'mahdy@dr-mahdyexporting.com', 'sales@dr-mahdyexporting.com', 'hanan.gouda@dr-mahdyexporting.com'])
// ->subject('Contact Us');
// });

        // $data = array('contact' => $contact);
        // $setting = Setting::first();
        // Mail::send('email', $data, function($msg) use ($setting, $request) {
        //      $msg->to([$setting->email,'info@dr-mahdyexporting.com'], 'Conatact Info...')->subject('Contact Us');
        //      $msg->from($request->email);
        // });

       return redirect()->back()->with(['contact_message'=>trans('home.Thank you for contacting us. A customer service officer will contact you soon')]);

   }
}
