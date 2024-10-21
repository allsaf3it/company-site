<?php

namespace App;
use App\Product;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    public function subCategories(){
        return Category::where('parent_id',$this->id)->get();
    }

    public function productsCount(){
        return Product::where('category_id',$this->id)->where('status',1)->where('vendor_status',1)->count();
    }
    
}
