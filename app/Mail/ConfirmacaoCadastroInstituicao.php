<?php 
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ConfirmacaoCadastroInstituicao extends Mailable
{
    use Queueable, SerializesModels;

    public $dados; // Dados da escola

    /**
     * Create a new message instance.
     */
    public function __construct($dados)
    {
        $this->dados = $dados; // Recebe os dados da escola
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this->subject('Cadastro Realizado com Sucesso') // Assunto do e-mail
                    ->view('emails.confirmacao-cadastro-instituicao'); // View do e-mail
    }
}