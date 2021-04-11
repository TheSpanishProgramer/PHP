<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendContactForm extends Mailable
{
    use Queueable, SerializesModels;

    public string $txtSubject;
    public string $txtMensaje;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(string $sub, string $men)
    {
        $this->txtSubject=$sub;
        $this->txtMensaje=$men;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
        ->subject("Formulario de contacto de la app:".config("app.name"))
        ->markdown("email.contacto");
    }
}
