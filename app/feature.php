<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class feature extends Model
{
    //
    protected $table = 'feature';
    protected $fillable = [
        'title_en',
        'title_ar',
        'icon',
        'security_id',
        'status',
    ];
}
