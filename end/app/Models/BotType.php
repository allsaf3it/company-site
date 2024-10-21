<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\BotTypeChild;

class BotType extends Model
{
    protected $table = 'bot_types';
    protected $guarded = [];
    public $timestamps =false;
	public function childs(){
		return BotTypeChild::where('type_id',$this->id)->where('status',1)->get();
	}

}
