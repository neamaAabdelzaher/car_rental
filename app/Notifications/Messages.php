<?php

namespace App\Notifications;
use App\Models\Message;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class Messages extends Notification
{
    use Queueable;

   private $message;

     public function __construct(Message $message)
    {
       $this->message=$message;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     */
   
    public function toDatabase(object $notifiable): array
    {
        return [
            'message_id'=>$this->message->id,
            'firstName'=>$this->message->f_name,
            'lastName'=>$this->message->l_name,
            'message'=>$this->message->message,
        ];
    }
}
