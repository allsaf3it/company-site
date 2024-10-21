<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NetworkPlan extends Model
{
    protected $table = 'network_plans';
    protected $guarded = [];
    public function pricing(){
        return $this->belongsTo('App\Models\Pricing', 'plan_id', 'id');
    }

}
