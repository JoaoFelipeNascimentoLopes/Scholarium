<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContatoFormulario extends Mailable
{
    use Queueable, SerializesModels;

    public $emailRetorno; // E-mail de retorno
    public $mensagem; // Mensagem do formulário

    public function __construct($emailRetorno, $mensagem) {
        $this->emailRetorno = $emailRetorno;
        $this->mensagem = $mensagem;
    }

    public function build() {
        return $this->subject('Nova Mensagem de Contato - Scholarium')->view('emails.contato-formulario');
    }
}
