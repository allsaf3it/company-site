<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogItem extends Model
{
    //
    protected $table = 'blogitems';
    public function Blogcat()
    {
        return $this->belongsTo('BlogCategory','blogcategory_id','id');
    }
    
    public function writers(){
	    return $this->belongsTo('App\Writer','writer_id');
	}
}
