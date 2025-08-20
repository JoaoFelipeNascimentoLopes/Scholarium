<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Instituicao;
use App\Models\Departamento; // 1. Adicionado para buscar os departamentos
use Illuminate\Validation\Rule;

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

        if (!$idEntidadeLogada || !$tipoUsuario) {
            return redirect()->route('login.form')->with('error', 'Sessão inválida. Por favor, faça login novamente.');
        }

        // Busca os departamentos da instituição logada
        $departamentos = Departamento::where('instituicao_id', $idEntidadeLogada)
            ->orderBy('nomeDepartamento', 'asc')
            ->get();

        $instituicaoParaExibir = null;
        if ($tipoUsuario == '1') {
            $instituicaoParaExibir = Instituicao::find($idEntidadeLogada);
        }

        if (!$instituicaoParaExibir) {
            $instituicaoParaExibir = new Instituicao();
        }

        // 2. Corrigido para não enviar a mesma variável duas vezes
        return view('instituicao.configuracoes', [
            'instituicao' => $instituicaoParaExibir,
            'departamentos' => $departamentos,
            'nomeUsuarioLogado' => $nomeEntidadeLogada,
            'tipoUsuarioLogado' => $tipoUsuario
        ]);
    } // 3. Removido um '}' extra que estava aqui

    /**
     * Atualiza os dados da instituição no banco de dados.
     */
    public function update(Request $request)
    {
        $idInstituicaoLogada = session('usuario_id');
        if (session('usuario_tipo') != '1' || !$idInstituicaoLogada) {
            // 4. Corrigido o nome da rota para o redirecionamento de erro
            return redirect()->route('instituicao.configuracoes.index')->with('error', 'Acesso negado.');
        }

        $validatedData = $request->validate([
            'nomeInstituicao' => 'required|string|max:255',
            'cnpjInstituicao' => ['required', 'string', 'max:18', Rule::unique('tbinstituicao', 'cnpjInstituicao')->ignore($idInstituicaoLogada)],
            'emailInstituicao' => ['required', 'email', Rule::unique('tbinstituicao', 'emailInstituicao')->ignore($idInstituicaoLogada)],
            'telefoneInstituicao' => 'required|string|max:20',
            'cepInstituicao' => 'required|string|max:10',
            'logradouroInstituicao' => 'required|string|max:255',
            'numeroInstituicao' => 'required|string|max:10',
            'cidadeInstituicao' => 'required|string|max:255',
            'ufInstituicao' => 'required|string|max:2',
            // 'notasInstituicao' => 'required|in:numeral,conceito', // Campo removido se não estiver no seu formulário
        ]);

        $instituicao = Instituicao::find($idInstituicaoLogada);

        if ($instituicao) {
            $instituicao->update($validatedData);
            // 4. Corrigido o nome da rota para o redirecionamento de sucesso
            return redirect()->route('instituicao.configuracoes.index')->with('success', 'Dados da instituição atualizados com sucesso!');
        }

        // 4. Corrigido o nome da rota para o redirecionamento de erro
        return redirect()->route('instituicao.configuracoes.index')->with('error', 'Não foi possível encontrar a instituição para atualizar.');
    }
}
