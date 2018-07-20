<?php

namespace App\Notifications;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\NexmoMessage;

class UserRegistered extends Notification
{
    /**
     * @var User
     */
    protected $user;


    /**
     * UserRegistered constructor.
     *
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }


    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['nexmo'];
    }


    /**
     * @return NexmoMessage
     */
    public function toNexmo()
    {
        return (new NexmoMessage())->content($this->user->first_name . ' ' . $this->user->last_name . ' joined the football pool');
    }

}
