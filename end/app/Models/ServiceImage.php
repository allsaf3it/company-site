<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use DB;
class ServiceImage extends Model
{
	protected $table='service_images';
    protected $guarded = [];

    public $timestamps =false;
}
