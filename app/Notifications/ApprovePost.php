<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class ApprovePost extends Notification
{
    use Queueable;

    private $user;
    private $post;

    public function __construct($post, $user)
    {
        $this->post = $post;
        $this->user = $user;
    }


    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('Congrates '. $this->user->first_namee . ' ' . $this->user->last_namee . ' Your Post ' . $this->post->title . ' has been approved ')
                    ->action('View', route('post.show', $this->post->id))
                    ->line('Thank you for using our application!');
    }

   
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
