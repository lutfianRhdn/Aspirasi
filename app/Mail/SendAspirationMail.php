<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendAspirationMail extends Mailable
{
    use Queueable, SerializesModels;
    public $name, $url, $position, $totalSuport, $pesan;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $url, $position, $totalSuport, $pesan)
    {
        $this->name = $name;
        $this->url = $url;
        $this->position = $position;
        $this->totalSuport = $totalSuport;
        $this->pesan = $pesan;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.index');
    }
}
