<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NouveauFormulaire extends Notification
{
    use Queueable;

    public $user_id;
    public $formulaire;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($id,$formulaire)
    {
        $this->user_id = $id;
        $this->formulaire = $formulaire;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database','broadcast'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
//    public function toMail($notifiable)
//    {
//        return (new MailMessage)
//                    ->line('The introduction to the notification.')
//                    ->action('Notification Action', url('/'))
//                    ->line('Thank you for using our application!');
//    }


    public function toDatabase()
    {

        return[
            'user'=>$this->user_id,
            'message'=>"Nouveau formulaire"
        ];
    }

    public function toBroadcast()
    {

        return new BroadcastMessage([
            'user_id'=>$this->user_id,
            'message'=>"Nouveau formulaire"
        ]);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'user_id'=>$this->user_id,
            'message'=>"Nouveau formulaire"
        ];
    }
}
