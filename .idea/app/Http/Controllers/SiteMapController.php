<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Service;
use App\Project;
use App\Brand;
use App\Page;
use App\BlogItem;

class SiteMapController extends Controller
{
    public function index(){
	  return response()->view('sitemap.index')->header('Content-Type', 'text/xml');
	}

    public function services(){
        $services= Service::latest()->get();
        return response()->view('sitemap.services-sitemap', [
    	      'services'=>$services,
    	])->header('Content-Type', 'text/xml');
    }
    
    public function brands(){
        $brands= Brand::latest()->get();
        return response()->view('sitemap.brands-sitemap', [
    	      'brands' => $brands,
    	])->header('Content-Type', 'text/xml');
    }
    
    public function categories(){
        $categories= Category::latest()->get();
        return response()->view('sitemap.categories-sitemap', [
    	      'categories' => $categories,
    	])->header('Content-Type', 'text/xml');
    }
    
    public function projects(){
        $projects= Project::latest()->get();
        return response()->view('sitemap.projects-sitemap', [
    	      'projects' => $projects,
    	])->header('Content-Type', 'text/xml');
    }
    
    public function pages(){
        $pages = Page::latest()->get();
        return response()->view('sitemap.pages-sitemap', [
    	      'pages' => $pages,
    	])->header('Content-Type', 'text/xml');
    }
    
    public function blogs(){
        $blogs = BlogItem::latest()->get();
        return response()->view('sitemap.blogs-sitemap', [
    	      'blogs' => $blogs,
    	])->header('Content-Type', 'text/xml');
    }

}