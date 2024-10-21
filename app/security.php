<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class security extends Model
{
    //
    protected $table = 'security';
    protected $fillable = [
        'title_en',
        'title_ar',
        'descrption_en',
        'descrption_ar',
        'image',
        'status',
        'name'
    ];
}
