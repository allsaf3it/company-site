<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;


class BrandReel extends Model
{
	protected $table='brandsreel';
	public function brands(){
        $brands = \DB::table('brandsreel')->get();
        $collections = $brands->split(2);
        $collections->toArray();
        
        return $collections;
    }
	

}
