<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OtpMail extends Mailable
{
    use Queueable, SerializesModels;


    /**
     * Create a new message instance.
     */
    public function __construct($otp, $expireTime)
    {
        $this->otp = $otp;
        $this->expireTime = $expireTime;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.otp')->with([
            'otp' => $this->otp,
            'expireTime' => $this->expireTime,
        ])->subject('Login OTP - WS IT Automation');
    }
}
