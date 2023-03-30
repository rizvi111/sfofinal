<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Storage;

class FormSubmitted extends Notification
{
    use Queueable;
    protected $form;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($form)
    {
        $this->form = $form;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $file = Storage::path('public/attachment/unknown.pdf');
        return (new MailMessage)
            ->from('information@sfosecureform.claims')
            ->subject('Application Submitted !')
            ->greeting('Congrats ' . $this->form->fname)
            ->view('mails.submitted-email', ['invest' => $this->form]);
        // ->attach($file, [
        //     'as' => 'attachtment.pdf',
        //     'mime' => 'application/pdf',
        // ]);
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
            // 
        ];
    }
}
