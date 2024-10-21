<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BotTypeChild extends Model
{
    protected $table = 'bots';
    protected $guarded = [];
	public function childs(){
		return BotTypeChild::where('type_id',$this->id)->where('status',1)->get();
	}
}
