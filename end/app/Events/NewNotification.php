<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Carbon\Carbon;

class NewNotification implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $user_id;
    public $title_en; 
    public $title_ar; 
    public $content_en; 
    public $content_ar; 
    public $date;
    public $time;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($pusherData)
    {
        $this->user_id = $pusherData['user_id'];
        $this->title_en = $pusherData['title_en'];
        $this->title_ar = $pusherData['title_ar'];
        $this->content_en = $pusherData['content_en'];
        $this->content_ar = $pusherData['content_ar'];
        $this->date = date('Y M d', strtotime(Carbon::now()));
        $this->time = Carbon::now()->diffForHumans();
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        // return new channel('new-notification');
        return new Channel('new-notification');
    }
}
