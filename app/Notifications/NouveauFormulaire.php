<?php

namespace App\Notifications;

use App\User;
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
    public $user_name;

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

        $this->user_name = User::findOrFail($this->user_id);
        return[
            'user'=>$this->user_id,
            'titre'=>  $this->formulaire->titre,
            'formulaire'=> $this->formulaire->id,
            'user_name' => $this->user_name->name
        ];
    }
    /**
     * Get the broadcastable representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return BroadcastMessage
     */
    public function toBroadcast($notifiable)
    {
        return new BroadcastMessage([
            'user_id'=>$this->user_id,
            'message'=>'Nouveau '. $this->formulaire->titre,
            'user_name' => User::findOrFail($this->user_id),
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
            'message'=>'Nouveau '. $this->formulaire->titre
        ];
    }
}
