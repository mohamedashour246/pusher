<?php

namespace App\Events;

use Carbon\Carbon;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NewComment
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $user_id, $user_name, $comment, $post_id, $date, $time;

    public function __construct($data)
    {
        $this->user_id = $data['user_id'];
        $this->user_name = $data['user_name'];
        $this->comment = $data['comment'];
        $this->post_id = $data['post_id'];
        $this->date = date("Y m d", strtotime(Carbon::now()));
        $this->time = date("h: i A", strtotime(Carbon::now()));

    }


    public function broadcastOn()
    {

        return ['new-comment'];
    }
}
