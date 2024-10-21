<?php
namespace App\Traits;
use App\Models\SeoAssistant;
use App\Models\Setting;
use App\Models\Configration;
use Melbahja\Seo\Schema;
use Melbahja\Seo\Schema\Thing;
use Melbahja\Seo\MetaTags;
use App\Models\About;
use App\Models\Service;
// use App\Faq;
use App\Models\Blog;
use App\Models\Project;
use App\Models\Course;
use \Mcamara\LaravelLocalization\Facades\LaravelLocalization;
trait SeoTrait {
    
    public function homePageSeo(){
        $lang=\LaravelLocalization::getCurrentLocale();
        $seo = SeoAssistant::first();
        $setting = Setting::first();
        $configration = Configration::first();
        
        $schema1 = new Thing('LocalBusiness', [
            'name'          => $configration->{'app_name_'.$lang },
            'url'          => LaravelLocalization::localizeUrl('/'),
            'image'         => url("uploads/settings/source/$configration->app_logo"),
            'telephone' => $setting->mobile,
            'address' => $configration->address1,
        ]);

        
        $schema2= new Thing('Organization', [
            'url'          => LaravelLocalization::localizeUrl('/'),
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
                ->title(($seo->home_meta_title_en||$seo->home_meta_title_ar)?(($lang == 'en')?$seo->home_meta_title_en:$seo->home_meta_title_ar):$configration->{'app_name_'.$lang })
                ->meta('title',($seo->home_meta_title_en||$seo->home_meta_title_ar)?(($lang == 'en')?$seo->home_meta_title_en:$seo->home_meta_title_ar):$configration->{'app_name_'.$lang })
                ->description(($seo->home_meta_desc_en||$seo->home_meta_desc_ar)?(($lang == 'en')?$seo->home_meta_desc_en:$seo->home_meta_desc_ar):strip_tags($configration->{'about_app_'.$lang } ))
                ->meta('author',$configration->{'app_name_'.$lang })
                ->image(url("uploads/settings/source/$configration->app_logo"))
                ->mobile(LaravelLocalization::localizeUrl('/'))
                ->canonical(LaravelLocalization::localizeUrl('/'))
                ->shortlink(LaravelLocalization::localizeUrl('/'))
                ->meta('robots',($seo->home_meta_robots)?'index':'noindex');
                
        return [$schema,$metatags];
    }
    
    public function aboutUsPageSeo(){
        $about = About::first();
        $lang=\LaravelLocalization::getCurrentLocale();
        $configration = Configration::first();
        $setting = Setting::first();
        $seo = SeoAssistant::first();
        
        $metatags = new MetaTags();
        $metatags
                ->title(($seo->about_meta_title_en||$seo->about_meta_title_ar)?(($lang == 'en')?$seo->about_meta_title_en:$seo->about_meta_title_ar):$about->{'title_'.$lang} )
                ->meta('title',($seo->about_meta_title_en||$seo->about_meta_title_ar)?(($lang == 'en')?$seo->about_meta_title_en:$seo->about_meta_title_ar):$about->{'title_'.$lang})
                ->description(($seo->about_meta_desc_en||$seo->about_meta_desc_ar)?(($lang == 'en')?$seo->about_meta_desc_en:$seo->about_meta_desc_ar):strip_tags($about->{'text_'.$lang}))
                ->meta('author',$configration->{'app_name_'.$lang })
                ->image(url("uploads/settings/source/$configration->app_logo"))
                ->mobile(LaravelLocalization::localizeUrl('/about-us'))
                ->canonical(LaravelLocalization::localizeUrl('/about-us'))
                ->shortlink(LaravelLocalization::localizeUrl('/about-us'))
                ->meta('robots',($seo->about_meta_robots)?'index':'noindex');
                
        $schema = new Schema(
            new Thing('Article', [
                'url'=> LaravelLocalization::localizeUrl("/about-us"),
                'image'=> url("uploads/settings/source/$configration->app_logo"),
                'headline'=> ($seo->about_meta_title)?$seo->about_meta_title:(($lang == 'en')?$about->title_en:$about->title_ar),
                'author' => new Thing('person', [
                    'name'=>$configration->app_name,
                    'url'=> LaravelLocalization::localizeUrl("/about-us"),
                ]),
                
                'datePublished'=> $about->crated_at,
                'dateModified'=> $about->updated_at,
            ])
        );
        return [$schema,$metatags];
    }
    
    public function contactUsPageSeo(){
        $lang=\LaravelLocalization::getCurrentLocale();
        $configration = Configration::first();
        $setting = Setting::first();
        $seo = SeoAssistant::first();
        $metatags = new MetaTags();

        $metatags
                ->title(($seo->contact_meta_title_en||$seo->contact_meta_title_ar)?(($lang == 'en')?$seo->contact_meta_title_en:$seo->contact_meta_title_ar):$configration->{'app_name_'.$lang })
                ->meta('title',($seo->contact_meta_title_en||$seo->contact_meta_title_ar)?(($lang == 'en')?$seo->contact_meta_title_en:$seo->contact_meta_title_ar):$configration->{'app_name_'.$lang })
                ->description(($seo->contact_meta_desc_en||$seo->contact_meta_desc_ar)?(($lang == 'en')?$seo->contact_meta_desc_en:$seo->contact_meta_desc_ar):strip_tags($configration->{'about_app_'.$lang }))
                ->meta('author',$configration->{'app_name_'.$lang })
                ->image(url("uploads/settings/source/$configration->app_logo"))
                ->mobile(LaravelLocalization::localizeUrl('/contact-us'))
                ->canonical(LaravelLocalization::localizeUrl('/contact-us'))
                ->shortlink(LaravelLocalization::localizeUrl('/contact-us'))
                ->meta('robots',($seo->contact_meta_robots)?'index':'noindex');
                
        $schema = new Schema(
            new Thing('Article', [
                'url'=> LaravelLocalization::localizeUrl("/contact-us"),
                'image'=> url("uploads/settings/source/$configration->app_logo"),
                'headline'=> ($seo->contact_meta_title)?$seo->contact_meta_title:$configration->{'app_name_'.$lang },
                'author' => new Thing('person', [
                    'name'=>$configration->{'app_name_'.$lang },
                    'url'=> LaravelLocalization::localizeUrl("/contact-us"),
                ]),
            ])
        );
        return [$schema,$metatags];
    }
    
    public function blogsPageSeo(){
        $lang=\LaravelLocalization::getCurrentLocale();
        $configration = Configration::first();
        $setting = Setting::first();
        $seo = SeoAssistant::first();
        $metatags = new MetaTags();
        
        $metatags
                ->title(($seo->blogs_meta_title_en||$seo->blogs_meta_title_ar)?(($lang == 'en')?$seo->blogs_meta_title_en:$seo->blogs_meta_title_ar):$configration->{'app_name_'.$lang })
                ->meta('title',($seo->blogs_meta_title_en||$seo->blogs_meta_title_ar)?(($lang == 'en')?$seo->blogs_meta_title_en:$seo->blogs_meta_title_ar):$configration->{'app_name_'.$lang })
                ->description(($seo->blogs_meta_desc_en||$seo->blogs_meta_desc_ar)?(($lang == 'en')?$seo->blogs_meta_desc_en:$seo->blogs_meta_desc_ar):strip_tags($configration->{'about_app_'.$lang }))
                ->meta('author',$configration->{'app_name_'.$lang })
                ->image(url("uploads/settings/source/$configration->app_logo"))
                ->mobile(LaravelLocalization::localizeUrl('/blogs'))
                ->canonical(LaravelLocalization::localizeUrl('/blogs'))
                ->shortlink(LaravelLocalization::localizeUrl('/blogs'))
                ->meta('robots',($seo->blogs_meta_robots)?'index':'noindex');
                
        return [$metatags];
    }

    public function blogSeo($link){
        $lang=\LaravelLocalization::getCurrentLocale();
        $blog = BlogItem::where('link_en',$link)->orwhere('link_ar',$link)->first();
        $configration = Configration::first();
        // $faqs = Faq::get();
        $metatags = new MetaTags();
        $metatags
                ->title(($blog->meta_keywords_en || $blog->meta_keywords_ar)?(($lang == 'en')? $blog->meta_keywords_en : $blog->meta_keywords_ar) : (($lang == 'en')?$blog->title_en:$blog->title_ar))
                ->meta('title',($blog->meta_keywords_en || $blog->meta_keywords_ar)?(($lang == 'en')? $blog->meta_keywords_en : $blog->meta_keywords_ar) : (($lang == 'en')?$blog->title_en:$blog->title_ar))
                ->description(($blog->meta_description_en || $blog->meta_description_ar)?(($lang == 'en')? strip_tags(mb_strimwidth($blog->meta_description_en, 0, 150, "...")) : strip_tags(mb_strimwidth($blog->meta_description_ar, 0, 150, "..."))):(($blog == 'en')?strip_tags(mb_strimwidth($blog->text_en, 0, 150, "...")):strip_tags(mb_strimwidth($blog->text_ar, 0, 150, "..."))))
                ->meta('author',$blog->writers->name)
                ->meta('time',date('D M j G:i:s T Y', strtotime($blog->created_at)))
                ->image(url("uploads/blogitems/source/$blog->image"))
                ->mobile(LaravelLocalization::localizeUrl("blog/" .$link))
                ->canonical(LaravelLocalization::localizeUrl("blog/" . $link))
                ->shortlink(LaravelLocalization::localizeUrl("blog/" .$link))
                ->meta('robots',($blog->meta_robots)?'index':'noindex');
                    
        $schema1 = new Thing('Article', [
            'url'=> LaravelLocalization::localizeUrl("$link"),
            'image'=> url("uploads/blogitems/source/$blog->image"),
            'headline'=>($lang == 'en')?$blog->title_en:$blog->title_ar,
            'author' => new Thing('person', [
                'name'=>$blog->writers,
                'url'=> LaravelLocalization::localizeUrl("$link"),
            ]),
            
            'datePublished'=> $blog->crated_at,
            'dateModified'=> $blog->updated_at,
        ]);
        
        $ques = [];
        // foreach($faqs as $faq){
        //     $x = new Thing('Question', [
        //         'name'=>$faq->question,
        //         'acceptedAnswer' => new Thing('Answer', [
        //             'text'=>$faq->answer,
        //         ]),
        //     ]);
            
        //     array_push($ques,$x);
        // }

        $schema2 = new Thing('FAQPage', [
            'mainEntity' =>[
                $ques
            ]
        
        ]);
            
        $schema = new Schema(
            $schema1,
            $schema2
        );
        
        return [$schema,$metatags];
    }
    
    public function projectsPageSeo(){
        $lang=\LaravelLocalization::getCurrentLocale();
        $configration = Configration::first();
        $setting = Setting::first();
        $seo = SeoAssistant::first();
        $metatags = new MetaTags();
        
        $metatags
                ->title(($seo->projects_meta_title_en||$seo->projects_meta_title_ar)?(($lang == 'en')?$seo->projects_meta_title_en:$seo->projects_meta_title_ar):$configration->{'app_name_'.$lang })
                ->meta('title',($seo->projects_meta_title_en||$seo->projects_meta_title_ar)?(($lang == 'en')?$seo->projects_meta_title_en:$seo->projects_meta_title_ar):$configration->{'app_name_'.$lang })
                ->description(($seo->projects_meta_desc_en||$seo->projects_meta_desc_ar)?(($lang == 'en')?$seo->projects_meta_desc_en:$seo->projects_meta_desc_ar):strip_tags($configration->{'about_app_'.$lang }))
                ->meta('author',$configration->{'app_name_'.$lang })
                ->image(url("uploads/settings/source/$configration->app_logo"))
                ->mobile(LaravelLocalization::localizeUrl('/projects'))
                ->canonical(LaravelLocalization::localizeUrl('/projects'))
                ->shortlink(LaravelLocalization::localizeUrl('/projects'))
                ->meta('robots',($seo->projects_meta_robots)?'index':'noindex');
                
        return [$metatags];
    }
    
    
    public function coursesPageSeo(){
        $lang=\LaravelLocalization::getCurrentLocale();
        $configration = Configration::first();
        $seo = SeoAssistant::first();
        
        $metatags = new MetaTags();
        $metatags
                ->title(($seo->courses_meta_title_en||$seo->courses_meta_title_ar)?(($lang == 'en')?$seo->courses_meta_title_en:$seo->courses_meta_title_ar):$configration->{'app_name_'.$lang })
                ->meta('title',($seo->courses_meta_title_en||$seo->courses_meta_title_ar)?(($lang == 'en')?$seo->courses_meta_title_en:$seo->courses_meta_title_ar):$configration->{'app_name_'.$lang })
                ->description(($seo->courses_meta_desc_en||$seo->courses_meta_desc_ar)?(($lang == 'en')?$seo->courses_meta_desc_en:$seo->courses_meta_desc_ar):strip_tags($configration->{'about_app_'.$lang } ))
                ->meta('author',$configration->{'app_name_'.$lang })
                ->image(url("uploads/settings/source/$configration->app_logo"))
                ->mobile(LaravelLocalization::localizeUrl('/courses'))
                ->canonical(LaravelLocalization::localizeUrl('/courses'))
                ->shortlink(LaravelLocalization::localizeUrl('/courses'))
                ->meta('robots',($seo->courses_meta_robots)?'index':'noindex');
                
        return [$metatags];
    }
    public function courseSeo($link){
        $lang=\LaravelLocalization::getCurrentLocale();
        $configration = Configration::first();
        $course =Course::where('link_en',$link)->orwhere('link_ar',$link)->first();
        $seo = SeoAssistant::first();

        $schema1 = new Thing('Article', [
            'url'=> LaravelLocalization::localizeUrl("$link"),
            'image'=> url("uploads/settings/source/$configration->app_logo"),
            'headline'=>($course->meta_keywords_en || $course->meta_keywords_ar)?(($lang == 'en')? $course->meta_keywords_en : $course->meta_keywords_ar): $course->name_en,
            'author' => new Thing('person', [
                'name'=>$configration->{'app_name_'.$lang },
                'url'=> LaravelLocalization::localizeUrl('/'),
            ]),
            
            'datePublished'=> $course->crated_at,
            'dateModified'=> $course->updated_at,
        ]);
            
        
        $schema = new Schema(
            $schema1
        );
        
        $metatags = new MetaTags();
        $metatags
                ->title(($course->meta_keywords_en || $course->meta_keywords_ar)?(($lang == 'en')? $course->meta_keywords_en : $course->meta_keywords_ar) : (($course == 'en')?$course->name_en:$course->name_ar))
                ->meta('title',($course->meta_keywords_en || $course->meta_keywords_ar)?(($lang == 'en')? $course->meta_keywords_en : $course->meta_keywords_ar) : (($course == 'en')?$course->name_en:$course->name_ar))
                ->description(($course->meta_description_en || $course->meta_description_ar)?(($lang == 'en')? $course->meta_description_en : $course->meta_description_ar):(($course == 'en')?strip_tags($course->text_en):strip_tags($course->text_ar)))
                ->meta('author',$configration->{'app_name_'.$lang })
                ->meta('time',date('D M j G:i:s T Y', strtotime($course->created_at)))
                ->image(url("uploads/courses/source/$course->img"))
                ->mobile(LaravelLocalization::localizeUrl("course/" . $link))
                ->canonical(LaravelLocalization::localizeUrl("course/" . $link))
                ->shortlink(LaravelLocalization::localizeUrl("course/" . $link))
                ->meta('robots',($seo->courses_meta_robots)?'index':'noindex');

        return [$schema,$metatags];
    }
    public function servicesPageSeo(){
        $lang=\LaravelLocalization::getCurrentLocale();
        $configration = Configration::first();
        $seo = SeoAssistant::first();
        
        $metatags = new MetaTags();
        $metatags
                ->title(($seo->services_meta_title_en||$seo->services_meta_title_ar)?(($lang == 'en')?$seo->services_meta_title_en:$seo->services_meta_title_ar):$configration->{'app_name_'.$lang })
                ->meta('title',($seo->services_meta_title_en||$seo->services_meta_title_ar)?(($lang == 'en')?$seo->services_meta_title_en:$seo->services_meta_title_ar):$configration->{'app_name_'.$lang })
                ->description(($seo->services_meta_desc_en||$seo->services_meta_desc_ar)?(($lang == 'en')?$seo->services_meta_desc_en:$seo->services_meta_desc_ar):strip_tags($configration->{'about_app_'.$lang } ))
                ->meta('author',$configration->{'app_name_'.$lang })
                ->image(url("uploads/settings/source/$configration->app_logo"))
                ->mobile(LaravelLocalization::localizeUrl('/services'))
                ->canonical(LaravelLocalization::localizeUrl('/services'))
                ->shortlink(LaravelLocalization::localizeUrl('/services'))
                ->meta('robots',($seo->services_meta_robots)?'index':'noindex');
                
        return [$metatags];
    }
    public function galleryImagesPageSeo(){
        $lang=\LaravelLocalization::getCurrentLocale();
        $configration = Configration::first();
        $seo = SeoAssistant::first();
        
        $metatags = new MetaTags();
        $metatags
                ->title(($seo->gallery_images_meta_title)?$seo->gallery_images_meta_title:$configration->{'app_name_'.$lang })
                ->meta('title',($seo->gallery_images_meta_title)?$seo->gallery_images_meta_title:$configration->{'app_name_'.$lang })
                ->description(($seo->gallery_images_meta_desc)?$seo->gallery_images_meta_desc:strip_tags($configration->{'about_app_'.$lang } ))
                ->meta('author',$configration->{'app_name_'.$lang })
                ->image(url("uploads/settings/source/$configration->app_logo"))
                ->mobile(LaravelLocalization::localizeUrl('/galleryImages'))
                ->canonical(LaravelLocalization::localizeUrl('/galleryImages'))
                ->shortlink(LaravelLocalization::localizeUrl('/galleryImages'))
                ->meta('robots',($seo->gallery_images_meta_robots)?'index':'noindex');
                
        $schema = new Schema(
            new Thing('Article', [
                'url'=> LaravelLocalization::localizeUrl("/galleryImages"),
                'image'=> url("uploads/settings/source/$configration->app_logo"),
                'headline'=> ($seo->gallery_images_meta_title)?$seo->gallery_images_meta_title:$configration->{'app_name_'.$lang },
                'author' => new Thing('person', [
                    'name'=>$configration->{'app_name_'.$lang },
                    'url'=> LaravelLocalization::localizeUrl("/galleryImages"),
                ]),
            ])
        );
                
        return [$schema,$metatags];
    }
    
    public function galleryVideosPageSeo(){
        $lang=\LaravelLocalization::getCurrentLocale();
        $configration = Configration::first();
        $seo = SeoAssistant::first();
        
        $metatags = new MetaTags();
        $metatags
                ->title(($seo->gallery_videos_meta_title)?$seo->gallery_videos_meta_title:$configration->{'app_name_'.$lang })
                ->meta('title',($seo->gallery_videos_meta_title)?$seo->gallery_videos_meta_title:$configration->{'app_name_'.$lang })
                ->description(($seo->gallery_videos_meta_desc)?$seo->gallery_videos_meta_desc:strip_tags($configration->{'about_app_'.$lang } ))
                ->meta('author',$configration->{'app_name_'.$lang })
                ->image(url("uploads/settings/source/$configration->app_logo"))
                ->mobile(LaravelLocalization::localizeUrl('/galleryVideos'))
                ->canonical(LaravelLocalization::localizeUrl('/galleryVideos'))
                ->shortlink(LaravelLocalization::localizeUrl('/galleryVideos'))
                ->meta('robots',($seo->gallery_videos_meta_robots)?'index':'noindex');
                
        $schema = new Schema(
            new Thing('Article', [
                'url'=> LaravelLocalization::localizeUrl("/galleryVideos"),
                'image'=> url("uploads/settings/source/$configration->app_logo"),
                'headline'=> ($seo->gallery_videos_meta_title)?$seo->gallery_videos_meta_title:$configration->{'app_name_'.$lang },
                'author' => new Thing('person', [
                    'name'=>$configration->{'app_name_'.$lang },
                    'url'=> LaravelLocalization::localizeUrl("/galleryVideos"),
                ]),
            ])
        );
                
       return [$schema,$metatags];
    }
    
     public function serviceSeo($link){
        $lang=\LaravelLocalization::getCurrentLocale();
        $configration = Configration::first();

        $service =Service::where('link_en',$link)->orWhere('link_ar',$link)->first();
        // $faqs = Faq::where('type','service')->where('service_id',$service->id)->get();
        
        
        $schema1 = new Thing('Article', [
            'url'=> LaravelLocalization::localizeUrl("$link"),
            'image'=> url("uploads/settings/source/$configration->app_logo"),
            'headline'=>($service->meta_keywords_en || $service->meta_keywords_ar)?(($lang == 'en')? $service->meta_keywords_en : $service->meta_keywords_ar): $service->name_en,
            'author' => new Thing('person', [
                'name'=>$configration->{'app_name_'.$lang },
                'url'=> LaravelLocalization::localizeUrl('/'),
            ]),
            
            'datePublished'=> $service->crated_at,
            'dateModified'=> $service->updated_at,
        ]);
            
        $ques = [];
        // foreach($faqs as $faq){
        //     $x = new Thing('Question', [
        //         'name'=>$faq->question,
        //         'acceptedAnswer' => new Thing('Answer', [
        //             'text'=>$faq->answer,
        //         ]),
        //     ]);
            
        //     array_push($ques,$x);
        // }

        $schema2 = new Thing('FAQPage', [
            'mainEntity' =>[
                $ques
            ]
        
        ]);
        
        $schema = new Schema(
            $schema1,
            $schema2
        );
        
        $metatags = new MetaTags();
        $metatags
                ->title(($service->meta_keywords_en || $service->meta_keywords_ar)?(($lang == 'en')? $service->meta_keywords_en : $service->meta_keywords_ar) : (($service == 'en')?$service->name_en:$service->name_ar))
                ->meta('title',($service->meta_keywords_en || $service->meta_keywords_ar)?(($lang == 'en')? $service->meta_keywords_en : $service->meta_keywords_ar) : (($service == 'en')?$service->name_en:$service->name_ar))
                ->description(($service->meta_descriptions_en || $service->meta_descriptions_ar)?(($lang == 'en')? strip_tags(mb_strimwidth($service->meta_descriptions_en, 0, 150, "...")) : strip_tags(mb_strimwidth($service->meta_descriptions_ar, 0, 150, "..."))):(($service == 'en')?strip_tags(mb_strimwidth($service->text_en, 0, 150, "...")):strip_tags(mb_strimwidth($service->text_ar, 0, 150, "..."))))
                ->meta('author',$configration->{'app_name_'.$lang })
                ->meta('time',date('D M j G:i:s T Y', strtotime($service->created_at)))
                ->image(url("uploads/services/source/$service->img"))
                ->mobile(LaravelLocalization::localizeUrl("service/" .$link))
                ->canonical(LaravelLocalization::localizeUrl("service/" .$link))
                ->shortlink(LaravelLocalization::localizeUrl("service/" .$link))
                ->meta('robots',($service->meta_robots)?'index':'noindex');

        return [$schema,$metatags];
     }
     
    public function projectSeo($link){
        $lang=\LaravelLocalization::getCurrentLocale();
        $configration = Configration::first();
        $project =Project::where('link_en',$link)->orwhere('link_ar',$link)->first();
        $seo = SeoAssistant::first();

        $schema1 = new Thing('Article', [
            'url'=> LaravelLocalization::localizeUrl("$link"),
            'image'=> url("uploads/settings/source/$configration->app_logo"),
            'headline'=>($project->meta_keywords_en || $project->meta_keywords_ar)?(($lang == 'en')? $project->meta_keywords_en : $project->meta_keywords_ar): $project->name_en,
            'author' => new Thing('person', [
                'name'=>$configration->{'app_name_'.$lang },
                'url'=> LaravelLocalization::localizeUrl('/'),
            ]),
            
            'datePublished'=> $project->crated_at,
            'dateModified'=> $project->updated_at,
        ]);
            
        
        $schema = new Schema(
            $schema1
        );
        
        $metatags = new MetaTags();
        $metatags
                ->title(($project->meta_keywords_en || $project->meta_keywords_ar)?(($lang == 'en')? $project->meta_keywords_en : $project->meta_keywords_ar) : (($project == 'en')?$project->name_en:$project->name_ar))
                ->meta('title',($project->meta_keywords_en || $project->meta_keywords_ar)?(($lang == 'en')? $project->meta_keywords_en : $project->meta_keywords_ar) : (($project == 'en')?$project->name_en:$project->name_ar))
                ->description(($project->meta_description_en || $project->meta_description_ar)?(($lang == 'en')? $project->meta_description_en : $project->meta_description_ar):(($project == 'en')?strip_tags($project->text_en):strip_tags($project->text_ar)))
                ->meta('author',$configration->{'app_name_'.$lang })
                ->meta('time',date('D M j G:i:s T Y', strtotime($project->created_at)))
                ->image(url("uploads/projects/source/$project->img"))
                ->mobile(LaravelLocalization::localizeUrl("project/" . $link))
                ->canonical(LaravelLocalization::localizeUrl("project/" . $link))
                ->shortlink(LaravelLocalization::localizeUrl("project/" . $link))
                ->meta('robots',($seo->projects_meta_robots)?'index':'noindex');

        return [$schema,$metatags];
    }
    
}