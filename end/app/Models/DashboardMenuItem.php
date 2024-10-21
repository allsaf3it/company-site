<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DashboardMenuItem extends Model
{

    protected $table = 'dashboard_menu_items';
    protected $guarded = [];
    public function childs(){
      return DashboardMenuItem::where('parent_id',$this->id)->where('status',1)->orderBy('order','asc')->get();
    }

    public function childs_new(){
      $types = ['medium-term', 'long-term', 'st-wallet'];
      return DashboardMenuItem::where('parent_id',$this->id)->whereNotIn('type', $types)->where('status',1)->orderBy('order','asc')->get();

    }
}
