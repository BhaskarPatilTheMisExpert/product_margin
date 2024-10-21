<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DataRequestUpdateEmail extends Mailable
{
    use Queueable, SerializesModels;

    protected $emailData;
    public $subject;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($subject,$emailData)
    {
        $this->subject = $subject;
        $this->emailData = $emailData;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.mis-data-update-request-email')->with('data', $this->emailData);
    }
}
