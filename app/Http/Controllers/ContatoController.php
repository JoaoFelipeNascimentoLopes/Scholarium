<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContatoFormulario;
use Illuminate\Support\Facades\Mail;

class ContatoController extends Controller
{
    public function enviar(Request $request)
    {
        // Validação dos dados
        $request->validate([
            'emailRetorno' => 'required|email',
            'mesageContato' => 'required|string',
        ]);

        // Dados do formulário
        $emailRetorno = $request->emailRetorno;
        $mensagem = $request->mesageContato;

        // Envia o e-mail para a equipe de administradores
        Mail::to('administracao@scholarium.com')->send(new ContatoFormulario($emailRetorno, $mensagem));

        // Redireciona com uma mensagem de sucesso
        return redirect()->route('welcome')->with('success', 'Mensagem enviada com sucesso!');
    }
}
