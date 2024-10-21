<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\Project;
use App\About;
use App\BrandReel;
use App\Hello;
use App\Setting;
use App\Configration;
use App\Postcard;
use App\Achievement;
use App\security;

use App\Traits\SeoTrait;
use \Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class HelloController extends Controller
{
    use SeoTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    ////////////// function returnindex page///////////
    public function hello(){
        $lang=\LaravelLocalization::getCurrentLocale();
        $configration = Configration::where('lang',$lang)->first();
        $about = About::first();
        $hello = Hello::first();
        $setting = Setting::first();
        $projects =Project::where('status',1)->limit(4)->orderBy('order')->get();     
        $brands =BrandReel::where('status',1)->get();     
        $postcards =Postcard::where('status',1)->get();     
        $postcardsFirst =Postcard::where('status',1)->limit(3)->orderBy('id','asc')->get();     
        $achievements =Achievement::where('status',1)->get();     
        list($schema, $metatags) = $this->helloPageSeo();
        return view('website.hello',compact('hello', 'about', 'brands', 'achievements', 'projects', 'postcards', 'configration', 'setting', 'schema', 'metatags'));
    }
    
    public function securityPage() 
    {
        list($schema, $metatags) = $this->securityPageSeo();
        return view('website.security', compact('schema', 'metatags'));
    }
    
    public function securitymainPage()
    {
        $herosection = security::where('name','herosection')->first();
        $partenerSection = security::where('name','partenerSection')->where('descrption_en','!=',null)->first();
        $partenerSectionimage = security::where('name','partenerSection')->where('status','1')->get();
        $numbers = security::where('name','statisticSection')->where('status','1')->get();
        $feature = security::where('name','featureSection')->where('status','1')->get();
        $goaltitle = security::where('name','goalsSection')->first();
        $goals = security::where('name','statmentgoal')->where('status','1')->get();
        $last = security::where('name','lastSection')->where('status','1')->get();
        return view('website.securityPage',compact('herosection','partenerSection','partenerSectionimage',
        'numbers','feature','goaltitle','goals','last'));
    }
    
}
