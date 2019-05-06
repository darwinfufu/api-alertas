<?php

namespace App\Mail;

use App\Alerta;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class CorreoAlertaAdmin extends Mailable
{
    use Queueable, SerializesModels;

    public $alerta;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Alerta $alerta)
    {
        $this->alerta = $alerta;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.alerta')->subject('Alerta Nueva!');
    }
}
