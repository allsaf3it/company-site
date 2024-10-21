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

}
