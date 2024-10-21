<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;


class Client extends Model
{
	protected $table='clients';
	protected $guarded = [];
	
	// public function products(){
	//     return Product::where('brand_id',$this->id)->where('status',1)->where('stock','>',0)->take(20)->get()->shuffle();
	// }

}
