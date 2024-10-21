<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\ProjectImage;

class Project extends Model
{
    //
	protected $table = 'projects';
    protected $guarded = [];
    
    public function images(){
	    return ProjectImage::where('project_id',$this->id)->get(); 
	}
	
	// public function writer(){
	//     return $this->belongsTo('App\Writer','writer_id','id');
	// }
	public function childs(){
		return Project::where('parent_id',$this->id)->where('status',1)->get();

	}
}
