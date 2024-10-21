<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\ServiceImage;

class Service extends Model
{
    //
    
    public function images(){
	    return ServiceImage::where('service_id',$this->id)->get(); 
	}
	
	public function writer(){
	    return $this->belongsTo('App\Writer','writer_id','id');
	}
	public function childs(){
		return Service::where('parent_id',$this->id)->where('status',1)->orderBy('order','asc')->get();

	}
}
