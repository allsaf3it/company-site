<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use DB;
use App\ProjectImage;
class Project extends Model
{
	protected $table='projects';
	
	public function images(){
	    return ProjectImage::where('project_id',$this->id)->get(); 
	}
	public function projects(){
        $projects = project::where('status', 1)->get();
        $collections = $projects->split(2);
        $collections->toArray();
        
        return $collections;
    }
	public function projectDetails(){
        $projects = project::where('parent_id', $this->id)->where('status', 1)->get();
        $collections = $projects->split(2);
        $collections->toArray();
        
        return $collections;
    }

}
