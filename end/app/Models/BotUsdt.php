<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BotUsdt extends Model
{
    protected $table = 'bots_usdt';
    protected $guarded = [];
    public function botUsdt(){
        return  $this->belongsTo('App\Models\Bot', 'bot_id', 'id');
    }
    public function index(){
        BotUsdt::select('bot_id')->where('user_id',110)->where('bot_status', 1)->get();
    }
    public function subCategories(){
        return Bot::where('id',$this->bot_id)->get();
    }
}
