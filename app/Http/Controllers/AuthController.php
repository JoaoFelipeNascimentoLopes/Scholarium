<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'emailLogin' => 'required|email',
            'senhaLogin' => 'required',
            'opcao' => 'required|in:1,2,3',
        ]);

        $email = $request->input('emailLogin');
        $senha = $request->input('senhaLogin');
        $tipo = $request->input('opcao');

        // Define tabela e colunas com base no tipo de usuário
        switch ($tipo) {
            case '1':
                $tabela = 'tbinstituicao';
                $colunaEmail = 'emailInstituicao';
                $colunaSenha = 'senhaInstituicao';
                break;
            case '2':
                $tabela = 'tbprofessor';
                $colunaEmail = 'emailProfessor';
                $colunaSenha = 'senhaProfessor';
                break;
            case '3':
                $tabela = 'tbestudante';
                $colunaEmail = 'emailEstudante';
                $colunaSenha = 'senhaEstudante';
                break;
            default:
                return back()->withErrors(['emailLogin' => 'Tipo de usuário inválido.']);
        }

        // Busca o usuário com base na tabela e coluna de e-mail
        $usuario = DB::table($tabela)->where($colunaEmail, $email)->first();

        if (!$usuario || !Hash::check($senha, $usuario->$colunaSenha)) {
            return back()->withErrors(['emailLogin' => 'E-mail ou senha inválidos. Tente Novamente']);
        }

        // Armazena informações do usuário na sessão
        $campoNome = match ($tipo) {
            '1' => 'nomeInstituicao',
            '2' => 'nomeProfessor',
            '3' => 'nomeEstudante',
        };
        
        Session::put('usuario_nome', $usuario->$campoNome ?? 'Usuário');
        Session::put('usuario_id', $usuario->id);
        Session::put('usuario_tipo', $tipo);

        // Redireciona conforme o tipo de usuário
        return match ($tipo) {
            '1' => redirect()->route('instituicao.dashboard'),
            '2' => redirect()->route('professor.dashboard'),
            '3' => redirect()->route('estudante.dashboard'),
        };
    }

    public function logout()
    {   
        Session::flush(); // Limpa todas as variáveis de sessão
        return redirect()->route('login'); // Redireciona para a página inicial
    }
    
}
