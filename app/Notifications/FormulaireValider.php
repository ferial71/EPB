<?php

namespace App\Notifications;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class FormulaireValider extends Notification
{
    use Queueable;

    public $user_id;
    public $formulaire;
    public $user_name;
    public $message;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($user_id,$formulaire)
    {
        $this->user_id = $user_id;
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

//    /**
//     * Get the mail representation of the notification.
//     *
//     * @param  mixed  $notifiable
//     * @return \Illuminate\Notifications\Messages\MailMessage
//     */
//    public function toMail($notifiable)
//    {
//        return (new MailMessage)
//                    ->line('The introduction to the notification.')
//                    ->action('Notification Action', url('/'))
//                    ->line('Thank you for using our application!');
//    }



//    public function toBroadcast()
//    {
//
//        return[
//            'user'=>1,
//            'message'=>"Formulaire Valide"
//        ];
//    }
    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray()
    {

        $this->user_name = User::findOrFail($this->user_id);
        $this->message = "Un ".$this->formulaire->titre." a été validé.";
        return[
            'user'=>$this->user_id,
            'titre'=>  $this->formulaire->titre,
            'url'=>$this->formulaire->url,
            'message'=>$this->message,
            'formulaire'=> $this->formulaire->id,
            'user_name' => $this->user_name->name
        ];
    }

//    public function toArray($notifiable)
//    {
//        return [
//            'user_id'=>$this->user_id,
//            'message'=>$this->formulaire->titre.'est validé.' ,
//            'url'=>$this->formulaire->url,
//            'user_name' => User::findOrFail($this->user_id)
//        ];
//    }
}
