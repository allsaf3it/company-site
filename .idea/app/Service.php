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
}
