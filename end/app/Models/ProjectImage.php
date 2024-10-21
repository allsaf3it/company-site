<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use DB;
class ProjectImage extends Model
{
	protected $table='project_images';
    protected $guarded = [];

    public $timestamps =false;
}
