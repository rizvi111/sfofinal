<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SubmittedForm extends Mailable
{
    use Queueable, SerializesModels;

    public $invest;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($invest)
    {
        $this->invest = $invest;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Application Submitted !')
            ->view('mails.submitted-email', ['invest' => $this->invest]);
    }
}
