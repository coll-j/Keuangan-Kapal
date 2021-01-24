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
    private $nama;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($token, $nama_perusahaan)
    {
        //
        $this->token_ = $token;
        $this->nama = $nama_perusahaan;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('invitation')->subject('Undangan Bergabung Perusahaan '.$this->nama)
                    ->with(['token' => $this->token_]);
    }
}
