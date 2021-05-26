<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class paymentMail extends Mailable
{
    use Queueable, SerializesModels;

    public $details4;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($details4)
    {
        $this->details4=$details4;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Congrats ! Payment is successful.')
        ->view('student.paymentMail');
    }
}
