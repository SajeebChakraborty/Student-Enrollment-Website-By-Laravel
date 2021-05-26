<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class verifyMail extends Mailable
{
    use Queueable, SerializesModels;

    public $details2;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($details2)
    {
        $this->details2=$details2;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Confirmation Email')
        ->view('student.codeEmail');
    }
}
