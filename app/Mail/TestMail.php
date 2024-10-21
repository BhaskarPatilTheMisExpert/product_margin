<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TestMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The parameter to include in the mail body text.
     *
     * @var string
     */
    public $param;

    /**
     * Create a new message instance.
     *
     * @param string $param
     * @return void
     */
    public function __construct($param)
    {
        $this->param = $param;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $text = $this->param ? $this->param : 'param is empty';

        return $this->markdown('emails.testMail', [
            'text' => $text
        ]);
    }
}
