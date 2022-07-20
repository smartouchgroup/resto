<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ManagerAdded
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */


    public $mailData;
     public $userEmail;


    public function __construct(User $manager, String $password)
    {
        $this->mailData['firstname'] = $manager->firstname;
        $this->mailData['lastname'] = $manager->lastname;
        $this->mailData['email'] = $manager->email;
        $this->mailData['phone'] = $manager->phone;
        $this->mailData['password'] = $password;

        $this->userEmail = $manager->email;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
