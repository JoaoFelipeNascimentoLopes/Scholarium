<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Database\QueryException;

class CursoController extends Controller
{
    /**
     * Exibe o formulário para criar um novo curso.
     *
     * @return \Illuminate\View\View
     */
    public function create(): View
    {
        // Apenas retorna a view que contém o formulário de cadastro de cursos.
        // 1. Pegar o ID da instituição que está na sessão.
        $instituicaoId = session('usuario_id');

        // 2. Fazer as contagens específicas no banco de dados.
        // Adicionamos uma segunda condição 'where' para filtrar pelo status.

        // Contar cursos ATIVOS
        $totalAtivos = Curso::where('instituicaoCurso', $instituicaoId)
                              ->where('statusCurso', 'Ativo')
                              ->count();

        // Contar cursos INATIVOS
        $totalInativos = Curso::where('instituicaoCurso', $instituicaoId)
                                ->where('statusCurso', 'Inativo')
                                ->count();
        
        // O total geral pode ser a soma dos dois, evitando outra consulta ao banco.
        $totalCursos = $totalAtivos + $totalInativos;

        // Contagem de cursos por nível
        $niveisCursos = Curso::where('instituicaoCurso', $instituicaoId)
                           ->select('nivelCurso')
                           ->where('statusCurso', 'Ativo') // Considerando apenas cursos ativos
                           ->get()
                           ->groupBy('nivelCurso')
                           ->map(function ($item) {
                               return $item->count();
                           });

        // Preparar os dados para o gráfico no formato esperado pelo Chart.js
        $labelsNiveis = $niveisCursos->keys()->toArray();
        $dataNiveis = $niveisCursos->values()->toArray();
        // 3. Enviar todas as variáveis para a view.
        // A função compact() é um atalho para criar um array como ['totalCursos' => $totalCursos, ...].
        return view('instituicao.cursos', compact('totalCursos', 'totalAtivos', 'totalInativos', 'labelsNiveis', 'dataNiveis'));
    }

    /**
     * Armazena um novo curso no banco de dados.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request): RedirectResponse
{
    // A validação continua a mesma
    $request->validate([
        'nomeCurso' => 'required|string|max:255',
        'nivelCurso' => 'required|string',
        'descricaoCurso' => 'nullable|string|max:200',
    ]);

    // O bloco try...catch vai envolver a lógica do banco de dados
    try {
        // TENTAMOS criar o curso no banco de dados
        Curso::create([
            'nomeCurso' => $request->nomeCurso,
            'nivelCurso' => $request->nivelCurso,
            'descricaoCurso' => $request->descricaoCurso,
            'instituicaoCurso' => session('usuario_id'),
            'statusCurso' => 'Ativo',
        ]);

    } catch (QueryException $e) {
        // SE DER UM ERRO NO BANCO, NÓS O CAPTURAMOS AQUI
        
        // Verificamos se o código de erro é 1062 (entrada duplicada)
        if ($e->errorInfo[1] == 1062) {
            // Se for, redirecionamos de volta com uma MENSAGEM DE ERRO amigável
            return redirect()->back()
                ->with('error', 'Este curso já está cadastrado para esta instituição.')
                ->withInput(); // withInput() mantém os campos do formulário preenchidos
        }

        // Para qualquer outro erro de banco de dados, podemos ter uma mensagem genérica
        return redirect()->back()
            ->with('error', 'Ocorreu um erro inesperado ao salvar o curso. Tente novamente.')
            ->withInput();
    }

    // Se o 'try' funcionou sem erros, redirecionamos com SUCESSO
    return redirect()->route('instituicao.cursos.create')
                     ->with('success', 'Curso cadastrado com sucesso!');
}
}