<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;


class Career extends Model
{
	protected $table='careers';
	
	public static function careersCount(){
	    return Career::where('admin_seen',0)->count();
	}
}
