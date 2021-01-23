<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PerusahaanInvitation extends Mailable
{
    use Queueable, SerializesModels;
    private $token_;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($token)
    {
        //
        $this->token_ = $token;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('invitation')->subject('Undangan Bergabung Perusahaan PT.XYZ')
                    ->with(['token' => $this->token_]);
    }
}
