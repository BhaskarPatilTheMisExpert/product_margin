<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BorrowerBalancesMail extends Mailable
{
    use Queueable, SerializesModels;

    public $entityData;
    public $attachment;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($entityData,$attachment,$subject)
    {
        $this->entityData = $entityData;
        $this->subject = $subject;
        $this->attachment = $attachment;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.borrower-balance')->with('data',$this->entityData)->attach($this->attachment[0]['file'],[
            'as' => $this->attachment[0]['fileName']
        ]);
    }
}
