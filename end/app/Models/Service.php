<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\ServiceImage;

class Service extends Model
{
    //
	protected $table = 'services';
    protected $guarded = [];
    
    public function images(){
	    return ServiceImage::where('service_id',$this->id)->get(); 
	}
	
	// public function writer(){
	//     return $this->belongsTo('App\Writer','writer_id','id');
	// }
	public function childs(){
		return Service::where('parent_id',$this->id)->where('status',1)->orderBy('order','asc')->get();

	}
}
