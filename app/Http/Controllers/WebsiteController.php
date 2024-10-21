<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\HomeSlider;
use App\Category;
use App\HomeImage;
use DB;
use App\MenuItem;
use App\Course;
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
use App\Inspiro;
use App\SeoAssistant;
use App\Configration;
use Melbahja\Seo\Schema;
use Melbahja\Seo\Schema\Thing;
use Melbahja\Seo\MetaTags;
use App\Faq;
use App\Job;
use App\Comment;
use App\Career;
// use App\Department;
use App\Writer;
use App\Testimonial;
use App\Traits\SeoTrait;
use \Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Brand;

class WebsiteController extends Controller{
    use SeoTrait;
    
    public function checkUrl($slug){
        $checkMenu = MenuItem::where('type',$slug)->first();
        // $checkBlog = BlogItem::where('link_en', $slug)->orWhere('link_ar', $slug)->first();
        // $checkService = Service::where('link_en',$slug)->orWhere('link_ar',$slug)->first();
        // $checkProject = Project::where('link_en', $slug)->orWhere('link_ar', $slug)->first();
        
        if($checkMenu){
            return $this->menus($checkMenu->type);
        }else{
            abort('404');
        }
        
        // if($checkBlog){
        //     return $this->getBlogPage($slug);
        // }
        
        // if($checkService){
        //     return $this->getServiceDetails($slug);
        // }
        // if($checkProject){
        //     return $this->getProjectDetails($slug);
        // }
    }
    
    
    //////// function retun dynamic menu//////////
    public function menus($menu){
        $menu = MenuItem::where('type',$menu)->first();
        $lang=\LaravelLocalization::getCurrentLocale();
        
        if($menu->type == 'home'){
            return $this->home();
        }

        elseif($menu->type == 'about-us'){
            return $this->aboutUs();
        }

        elseif($menu->type == 'contact-us'){
            return $this->contactUs();
        }

        elseif($menu->type == 'projects'){
            return $this->getProjects();
        }
        
        elseif($menu->type == 'project'){
            return $this->getProjectDetails($menu->type_value);
        }

        elseif($menu->type == 'services'){
            return $this->getservices();
        }
        
        elseif($menu->type == 'service'){
            return $this->getServiceDetails($menu->type_value);
        }
        elseif($menu->type == 'galleryImages'){
             return $this->getGalleryImages();
        }
        
        
        elseif($menu->type == 'galleryVideos'){
             return $this->getGalleryVideos();
        }

        elseif($menu->type == 'blogs'){
             return $this->getBlogs();
        }
    }
    
    ////////////// function returnindex page///////////
    public function home(){
        $lang=\LaravelLocalization::getCurrentLocale();
        $configration = Configration::where('lang',$lang)->first();
        $about = About::first();
        $setting = Setting::first();
        $seo = SeoAssistant::first();
        $services = Service::where('status',1)->orderBy('order')->get();
        $courses = Course::where('status',1)->where('parent_id', '!=' ,0)->orderBy('order')->take(3)->get();
        $inspiros = Inspiro::where('status',1)->get();
        $projects =Project::where('status',1)->limit(6)->orderBy('order')->get();
        $blogs = BlogItem::where('status',1)->get();

        ////// seo script//////
        list($schema, $metatags) = $this->homePageSeo();
        
        return view('website.home',compact('services','blogs','schema','metatags', 'inspiros','courses', 'about', 'projects'));
    }
    
    public function getWriter($id){
        $writer = Writer::find($id);
        $blogss = BlogItem::where('status', 1)->where('writer_id', $id)->get();
        $lang=\LaravelLocalization::getCurrentLocale();
        $about = About::first();
        $configration = Configration::where('lang',$lang)->first();
        $setting = Setting::first();
        $seo = SeoAssistant::first();
        $schema1 = new Thing('LocalBusiness', [
            'name'          => $configration->app_name,
            'url'          => url('/'),
            'image'         => url("uploads/settings/source/$configration->app_logo"),
            'telephone' => $setting->mobile,
            'address' => $configration->address1,
        ]);

        
        $schema2= new Thing('Organization', [
            'url'          => url('/'),
            'logo'         => url("uploads/settings/source/$configration->app_logo"),
            'contactPoint' => new Thing('ContactPoint', [
                'telephone' => $setting->mobile,
                'contactType' => 'customer service'
            ]),
        ]);

        $schema = new Schema(
            $schema1,
            $schema2
        );
        
        $metatags = new MetaTags();
        $metatags
                ->title(($seo->home_meta_title)? $seo->home_meta_title:$configration->app_name)
                ->meta('title',($seo->home_meta_title)? $seo->home_meta_title:$configration->app_name)
                ->description(($seo->home_meta_desc)?$seo->home_meta_desc:strip_tags($configration->about_app))
                ->meta('author',$configration->app_name)
                ->image(url("uploads/settings/source/$configration->app_logo"))
                ->mobile(url('/'))
                ->canonical(url('/'))
                ->shortlink(url('/'))
                ->meta('robots',($seo->home_meta_robots)?'index':'noindex');
        

        return view('website.writer_details', compact('writer', 'metatags', 'blogss','schema', 'setting', 'lang', 'seo'));
    }
    
    ////////////FUNCTION RETURN VIEW ABOUT US//////
    public function aboutUs(){
        $lang=\LaravelLocalization::getCurrentLocale();
        $about = About::first();
        $aboutStrucs = AboutStruc::where('lang',$lang)->where('status',1)->get();
        $testimonials = Testimonial::where('status', 1)->where('lang', $lang)->get();
        $brands = Brand::where('status', 1)->get();
        $inspiros = Inspiro::where('status',1)->get();
        ////// seo script//////
        list($schema, $metatags) = $this->aboutUsPageSeo();
        return view('website.about-us',compact('lang','about','aboutStrucs','brands', 'inspiros','metatags','schema', 'testimonials'));
    }

    ////////////FUNCTION RETURN VIEW CONTACT US//////
    public function contactUs(){
        $lang=\LaravelLocalization::getCurrentLocale();
        $services = Service::where('status',1)->orderBy('order')->get();
        ////// seo script//////
        list($schema, $metatags) = $this->contactUsPageSeo();
        return view('website.contact-us',compact('lang', 'services','schema','metatags'));
    }

    ////////////// function saveContact//////////
    public function saveContactUs(Request $request){
        //dd($request->all());
        $request->validate([
          'name'=>'required|max:150',
          'message'=>'required|string',
          'service' => 'required',
          'message'=>'required',
          'email' => 'nullable|email',
          'budget'=>'required|in:10-20k,30-40k,40-50k,50-100k,more100k',
          'attachments' => 'required|mimes:pdf',
        ]);

        $contact = new ContactUs();
        $contact->name = $request->name;
        $contact->budget = $request->budget;
        $contact->email = $request->email;
        $contact->message = $request->message;
        $contact->service = implode(",",$request->service);
        if($request->hasFile("attachments")){
            $extension = $request->file('attachments')->getClientOriginalExtension();
            $filename = rand(11111111, 99999999). '.' . $extension;
            $request->file('attachments')->move( base_path() . '/uploads/forms', $filename );
            $contact->attachments = $filename;
        }
        $contact->save();

//         $data = array('contact' => $contact);
//         $setting = Setting::first();
// 	    Mail::send('emails/email', $data, function($msg) use ($setting) {
//   		$msg->to($setting ->email, 'allsafe')->subject('allsafe');
//   		$msg->cc(['']);
//   		$msg->from(config('mail.from.address'),config('mail.from.name'));
// 		});

        return redirect()->route('thanks')->with(['contact_message'=>trans('home.Thank you for contacting us. A customer service officer will contact you soon')]);

    }
        public function career(){
        $lang=\LaravelLocalization::getCurrentLocale();
        // $departments = Department::where('status', 1)->get();
        $jobs = Job::get();
        $configration = Configration::where('lang',$lang)->first();
        $seo = SeoAssistant::first();
        return view('website.career',compact('seo', 'jobs'));
    }
    
    public function saveCareer(Request $request){
        $request->validate([
            'name'=>'required|max:150',
            'email'=>'required|email',
            'phone'=>'required|numeric',
            'message'=>'nullable|string',
            // 'phone'=>'required|regex:/(01)[0-9]{9}/',
            'cv' => 'required|mimes:pdf',
            'exp_salary' => 'required|numeric'
            // 'job' => 'string',
            // 'image' => 'image|mimes:jpg,png,jpeg,gif,svg,webp',
        ]);
        $add = new Career();
        $add->name = $request->name;
        $add->email = $request->email;
        $add->phone = $request->phone;
        $add->job = implode(",",$request->job);
        $add->message = $request->message;
        $add->exp_salary = $request->exp_salary;
        //upload pdf file
        if($request->hasFile("cv")){
            $extension = $request->file('cv')->getClientOriginalExtension();
            $filename = rand(11111111, 99999999). '.' . $extension;
            $request->file('cv')->move( base_path() . '/uploads/careers/pdf', $filename );
            $add->cv = $filename;
        }
        // if($request->hasFile('image')){
        //     $extension = $request->file('image')->getClientOriginalExtension();
        //     $filename = rand(11111111, 99999999). '.' . $extension;
        //     $request->file('image')->move( base_path() . '/uploads/careers/image', $filename );
        //     $add->image = $filename;
        // }
        $add->save();

//      $data = array('contact' => $contact);
//      $setting = Setting::first();
// 	    Mail::send('emails/contact_email', $data, function($msg) use ($setting) {
//   			$msg->to($setting ->contact_email, 'Ikokeez')->subject('Contact Us');
//   			$msg->from(config('mail.from.address'),config('mail.from.name'));
// 		});

        return back()->with(['success'=>trans('Thank you. One of our hiring team members will contact you soon')]);

    }

    ////////// FUNCTION RETURN PAGE INFORMATION /////////
    public function getPage($link){
        $lang=\LaravelLocalization::getCurrentLocale();
        $page =Page::where('link',$link)->first();
        return view('website.page',compact('lang','page'));
    }
    ////////// FUNCTION RETURN PAGE INFORMATION /////////
    public function getPrivacy(){
        $lang=\LaravelLocalization::getCurrentLocale();
        $configration = Configration::where('lang',$lang)->first();
        return view('website.privacy',compact('lang' , 'configration'));
    }

    /////////////////////FUNCTION RETURN VIEW BLOGS ///////////
    public function getBlogs(){
        $lang=\LaravelLocalization::getCurrentLocale();
        $blogCategories = BlogCategory::where('status',1)->get();
        $blogCategoriesIds = BlogCategory::where('status',1)->pluck('id')->toArray();
        $parentBlogs = BlogItem::whereIn('blogcategory_id',$blogCategoriesIds)->where('parent_id', 0)->where('status',1)->get();
        $blogs = BlogItem::whereIn('blogcategory_id',$blogCategoriesIds)->where('parent_id', '!=',0)->where('status',1)->get();
        ////// seo script//////
        list($metatags) = $this->blogsPageSeo();
        return view('website.blogs',compact('lang','blogCategories','blogs','metatags', 'parentBlogs'));
    }

    /////////////////////FUNCTION RETURN VIEW BLOG ///////////
    public function getBlogPage($link){
        $lang=\LaravelLocalization::getCurrentLocale();
        $blog = BlogItem::where('link_en',$link)->orWhere('link_ar',$link)->first();
        $blogs = BlogItem::where('status', 1)->orderBy('id', 'desc')->limit(5)->get();
        $faqs = Faq::where('type','blog_item')->where('blog_item_id',$blog->id)->where('lang', $lang)->get();
        $comments = Comment::where('type','blog')->where('type_id',$blog->id)->where('admin_approve',1)->get();
        ////// seo script//////
        list($schema, $metatags)= $this->blogSeo($link);
        
        return view('website.blogPage',compact('blog','schema','metatags','faqs','comments', 'blogs'));
    }

    /////////////////////FUNCTION RETURN VIEW CATEGORY BLOGs ///////////
    public function getCategoryBlogs($id){
        $blogCategory = BlogCategory::find($id);
        $blogCategories = BlogCategory::where('status',1)->get();
        $blogs = BlogItem::where('blogcategory_id',$id)->where('status',1)->get();
        
        ////// seo script//////
        list($metatags) = $this->blogsPageSeo();
        return view('website.category-blogs',compact('$metatags','blogCategories','blogs','blogCategory'));
    }

    ////////// function return list of published products/////
    public function getProjects(){
        $lang=\LaravelLocalization::getCurrentLocale();
        $configration = Configration::where('lang',$lang)->first();
        $services = Service::where('status',1)->where('parent_id', 0)->orderBy('order')->get();
        $projects =Project::where('status',1)->get();
        ////// seo script//////
        list($metatags)= $this->projectsPageSeo();
        return view('website.projects',compact('projects', 'services','configration','metatags'));
    }
    
    ////////// function return project Details /////
    public function getProjectDetails($link){
        $project =Project::where('link_en', $link)->orWhere('link_ar', $link)->first();
        $projects = Project::where('status', 1)->get();
        $nextProject = Project::where('parent_id', $project->parent_id)->where('id', '>', $project->id)->orderBy('id')->first();
        $prevProject = Project::where('parent_id', $project->parent_id)->where('id', '<', $project->id)->orderBy('id')->first();
        $subProjects = Project::where('parent_id',$project->id)->where('status',1)->get();
        if(count($subProjects) > 0){
            $projects =$subProjects;
            ////// seo script//////
            list($schema,$metatags)= $this->projectSeo($link);
            return view('website.sub_project',compact('project', 'nextProject','prevProject','projects','metatags'));
        }
        if($project){
            list($schema, $metatags)= $this->projectSeo($link);
            return view('website.project-details',compact('project','prevProject', 'nextProject','projects'));
        }else{
            abort('404');
        }
    }
    
    ////////// function return list of published services/////
    public function servicesPageSeo(){
        $services =Service::orderBy('order')->where('status',1)->get();
        ////// seo script//////
        list($metatags)= $this->servicesPageSeo();
        return view('website.services',compact('services','metatags'));
    }
    ////////// function return list of published services/////
    public function getservices(){
        $lang=\LaravelLocalization::getCurrentLocale();
        $services =Service::orderBy('order')->where('status',1)->get();
        $about = About::first();
        $configration = Configration::where('lang',$lang)->first();
        $seo = SeoAssistant::first();
        $subServices = Service::where('status',1)->where('parent_id', '!=', 0)->orderBy('order')->get();

        $metatags = new MetaTags();
        $metatags
                ->title(($seo->services_meta_title)?$seo->services_meta_title:$configration->app_name)
                ->meta('title',($seo->services_meta_title)?$seo->services_meta_title:$configration->app_name)
                ->description(($seo->services_meta_dsec)?$seo->services_meta_desc:strip_tags($configration->about_app))
                ->meta('author',$configration->app_name)
                ->image(url("uploads/settings/source/$configration->app_logo"))
                ->mobile(LaravelLocalization::localizeUrl('/services'))
                ->canonical(LaravelLocalization::localizeUrl('/services'))
                ->shortlink(LaravelLocalization::localizeUrl('/services'))
                ->meta('robots',($seo->services_meta_robots)?'index':'noindex');
                
        return view('website.services',compact('services',  'subServices','about','metatags'));
    }
    
    ////////// function return project service /////
    public function getServiceDetails($link){
        $lang=\LaravelLocalization::getCurrentLocale();
        $service =Service::where('link_en',$link)->orWhere('link_ar',$link)->first();
        $about = About::first();
        $subServices = Service::where('parent_id',$service->id)->where('status',1)->get();
        
        if(count($subServices) > 0){
            $services =$subServices;
            ////// seo script//////
            list($metatags)= $this->servicesPageSeo();
            return view('website.sub_services',compact('service','services','metatags'));
        }

        if($service){
            $faqs = Faq::where('type','service')->where('blog_item_id',$blog->id)->where('lang', $lang)->get();
            $services = Service::where('status',1)->orderBy('id', 'desc')->limit(5)->get();
            ////// seo script//////
            list($schema, $metatags)= $this->serviceSeo($link);
            return view('website.service-details',compact('service','services', 'about','metatags','schema','faqs'));
        }else{
            abort('404');
        }
    }

    public function getCourses(){
        $lang=\LaravelLocalization::getCurrentLocale();
        $about = About::first();
        $parentCourses = Course::where('parent_id', 0)->where('status',1)->orderBy('order')->get();
        $courses = Course::where('parent_id', '!=' , 0)->where('status',1)->orderBy('order')->get();
        return view('website.courses',compact('about', 'courses', 'parentCourses'));
    }
    public function getCourseDetails($link){
        $lang=\LaravelLocalization::getCurrentLocale();
        $course =Course::where('link_en',$link)->orWhere('link_ar',$link)->first();
        $about = About::first();
        $subCourses = Course::where('parent_id',$course->id)->where('status',1)->get();
        
        if(count($subCourses) > 0){
            $courses =$subCourses;
            ////// seo script//////
            return view('website.sub_course',compact('course','courses'));
        }

        if($course){
            $courses = Course::where('status',1)->where('id', '!=', $course->id)->where('parent_id', '!=', 0)->orderBy('id', 'desc')->limit(6)->get();
            ////// seo script//////
            return view('website.course-details',compact('course','courses'));
        }else{
            abort('404');
        }
    }
    
    public function getGalleryImages(){
        $images =GalleryImage::where('status',1)->orderBy('order','asc')->get();
        ////// seo script//////
        list($schema, $metatags)= $this->galleryImagesPageSeo();
        return view('website.gallery-images',compact('images','about','metatags','schema'));
    }
    
    public function getGalleryVideos(){
        $videos =GalleryVideo::where('status',1)->orderBy('order','asc')->get();
        ////// seo script//////
        list($schema, $metatags)= $this->galleryVideosPageSeo();
        return view('website.gallery-videos',compact('videos'));
    }
    
    public function saveComment(Request $request){
        $add = new Comment();
        $add->name=$request->name;
        $add->email=$request->email;
        $add->comment=$request->comment;
        $add->type=$request->type;
        $add->type_id=$request->type_id;
        $add->save();
        return back()->with(['success'=>trans('home.Thank you for your Comment , your commnet under review')]);
        
    }
    
}
