<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $guarded = [];
    public function images(){
	    return ProductImage::where('product_id',$this->id)->get(); 
	}
	public function Category()
    {
        return $this->belongsTo('App\Models\Category','category_id','id');
    }
}
