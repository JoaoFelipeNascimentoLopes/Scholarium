<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Instituicao;
use Illuminate\Validation\Rule; // Importante para a validação

class ConfiguracoesController extends Controller
{
    /**
     * Mostra a página de configurações com os dados da instituição logada.
     */
    public function index()
    {
        $tipoUsuario = Session::get('usuario_tipo');
        $idEntidadeLogada = Session::get('usuario_id');
        $nomeEntidadeLogada = Session::get('usuario_nome');

        // Se o usuário não estiver devidamente logado, redireciona para o login
        if (!$idEntidadeLogada || !$tipoUsuario) {
            return redirect()->route('login.form')->with('error', 'Sessão inválida. Por favor, faça login novamente.');
        }

        // Esta página só mostrará os detalhes da instituição para o login tipo '1'
        $instituicaoParaExibir = null;
        if ($tipoUsuario == '1') {
            $instituicaoParaExibir = Instituicao::find($idEntidadeLogada);
        }

        // Se, por qualquer motivo, não encontrar a instituição, passamos um objeto vazio
        if (!$instituicaoParaExibir) {
            $instituicaoParaExibir = new Instituicao();
        }

        return view('instituicao.configuracoes', [
            'instituicao' => $instituicaoParaExibir,
            'nomeUsuarioLogado' => $nomeEntidadeLogada,
            'tipoUsuarioLogado' => $tipoUsuario
        ]);
    }

    /**
     * Atualiza os dados da instituição no banco de dados.
     */
    public function update(Request $request)
    {
        $idInstituicaoLogada = session('usuario_id');
        // Garante que apenas um usuário do tipo '1' (Instituição) pode fazer a atualização
        if (session('usuario_tipo') != '1' || !$idInstituicaoLogada) {
            return redirect()->route('settings.index')->with('error', 'Acesso negado.');
        }

        // Validação dos dados que vêm do formulário do modal
        $validatedData = $request->validate([
            'nomeInstituicao' => 'required|string|max:255',
            // A regra 'unique' agora ignora o CNPJ da própria instituição que está sendo editada
            'cnpjInstituicao' => ['required', 'string', 'max:18', Rule::unique('tbinstituicao', 'cnpjInstituicao')->ignore($idInstituicaoLogada)],
            'emailInstituicao' => ['required', 'email', Rule::unique('tbinstituicao', 'emailInstituicao')->ignore($idInstituicaoLogada)],
            'telefoneInstituicao' => 'required|string|max:20',
            'cepInstituicao' => 'required|string|max:10',
            'logradouroInstituicao' => 'required|string|max:255',
            'numeroInstituicao' => 'required|string|max:10',
            'cidadeInstituicao' => 'required|string|max:255',
            'ufInstituicao' => 'required|string|max:2',
            'notasInstituicao' => 'required|in:numeral,conceito',
        ]);

        $instituicao = Instituicao::find($idInstituicaoLogada);

        if ($instituicao) {
            $instituicao->update($validatedData);
            return redirect()->route('settings.index')->with('success', 'Dados da instituição atualizados com sucesso!');
        }

        return redirect()->route('settings.index')->with('error', 'Não foi possível encontrar a instituição para atualizar.');
    }
}
