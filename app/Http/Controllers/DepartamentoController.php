<?php

namespace App\Http\Controllers;

use App\Models\Departamento;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Database\QueryException;

class DepartamentoController extends Controller
{
    /**
     * Armazena um novo departamento no banco de dados.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $instituicaoId = session('usuario_id');

        $validatedData = $request->validate([
            'nomeDepartamento' => 'required|string|max:255',
            'descricaoDepartamento' => 'nullable|string|max:500',
        ]);

        try {
            Departamento::create([
                'nomeDepartamento' => $validatedData['nomeDepartamento'],
                'descricaoDepartamento' => $validatedData['descricaoDepartamento'],
                'instituicao_id' => $instituicaoId,
            ]);

        } catch (QueryException $e) {
            // Lida com o erro de nome duplicado (baseado no unique index da migration)
            if ($e->errorInfo[1] == 1062) {
                return redirect()->route('instituicao.configuracoes.index', ['tab' => 'estrutura'])
                    ->with('error', 'Já existe um departamento com este nome.');
            }
            return redirect()->route('instituicao.configuracoes.index', ['tab' => 'estrutura'])
                ->with('error', 'Erro ao salvar o departamento.');
        }

        return redirect()->route('instituicao.configuracoes.index', ['tab' => 'estrutura'])
            ->with('success', 'Departamento cadastrado com sucesso!');
    }
    /**
     * Mostra o formulário para editar um departamento.
     */
    public function edit(Departamento $departamento): View
    {
        // Adicione a lógica para a página de edição aqui, se necessário
    }

    /**
     * Atualiza um departamento no banco de dados.
     */
    public function update(Request $request, Departamento $departamento): RedirectResponse
    {
        // Adicione a lógica de atualização aqui, se necessário
    }

    /**
     * Remove um departamento do banco de dados.
     */
    public function destroy(Departamento $departamento): RedirectResponse
    {
        // Segurança: Garante que o utilizador só pode apagar departamentos da sua instituição
        if ($departamento->instituicao_id != session('usuario_id')) {
            abort(403, 'Acesso não autorizado.');
        }

        try {
            // Tenta apagar o departamento
            $departamento->delete();
        } catch (QueryException $e) {
            // Se houver um erro (ex: departamento em uso), retorna com uma mensagem de erro
            return redirect()->route('instituicao.configuracoes.index', ['tab' => 'estrutura'])
                ->with('error', 'Não foi possível apagar o departamento. Verifique se não está em uso.');
        }

        // Se tudo correr bem, redireciona com uma mensagem de sucesso
        return redirect()->route('instituicao.configuracoes.index', ['tab' => 'estrutura'])
            ->with('success', 'Departamento apagado com sucesso!');
    }
}
