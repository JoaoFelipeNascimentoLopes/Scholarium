<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB; // Adicionado por boa prática

class CursoController extends Controller
{
    /**
     * Exibe o dashboard com estatísticas, gráficos, formulário e a lista de cursos.
     * A lista de cursos agora suporta busca e paginação.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\View\View
     */
    public function create(Request $request): View // O método agora recebe a Request para a busca
    {
        $instituicaoId = session('usuario_id');

        // --- Bloco 1: Contagem para os Cards de Informações Gerais ---
        $totalAtivos = Curso::where('instituicaoCurso', $instituicaoId)->where('statusCurso', 'Ativo')->count();
        $totalInativos = Curso::where('instituicaoCurso', $instituicaoId)->where('statusCurso', 'Inativo')->count();
        $totalCursos = $totalAtivos + $totalInativos;

        // --- Bloco 2: Dados para o Gráfico de Níveis ---
        // (Sua lógica que considera apenas cursos ativos está ótima)
        $niveisCursos = Curso::where('instituicaoCurso', $instituicaoId)
                           ->where('statusCurso', 'Ativo')
                           ->select('nivelCurso', DB::raw('count(*) as total'))
                           ->groupBy('nivelCurso')
                           ->pluck('total', 'nivelCurso');

        $labelsNiveis = $niveisCursos->keys();
        $dataNiveis = $niveisCursos->values();

        // --- Bloco 3: Lógica da Tabela com Busca e Paginação ---
        // 1. Inicia a consulta base, sem executar ainda
        $queryCursos = Curso::where('instituicaoCurso', $instituicaoId);

        // 2. Verifica se o campo 'busca' foi preenchido no formulário
        if ($request->filled('busca')) {
            // Se foi, adiciona uma condição 'where' à consulta para filtrar pelo nome.
            $termoBusca = $request->busca;
            $queryCursos->where('nomeCurso', 'LIKE', '%' . $termoBusca . '%');
        }

        // 3. Executa a consulta (já com o filtro, se houver) e pagina os resultados
        $cursos = $queryCursos->latest()->paginate(10);


        // --- Bloco 4: Enviando tudo para a View ---
        // Todas as variáveis são enviadas de uma vez
        return view('instituicao.cursos', compact(
            'totalCursos',
            'totalAtivos',
            'totalInativos',
            'labelsNiveis',
            'dataNiveis',
            'cursos'
        ));
    }

    /**
     * Armazena um novo curso no banco de dados.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        // Seu método store já está perfeito, com o try-catch. Nenhuma alteração aqui.
        $request->validate([
            'nomeCurso' => 'required|string|max:255',
            'nivelCurso' => 'required|string',
            'descricaoCurso' => 'nullable|string|max:200',
        ]);

        try {
            Curso::create([
                'nomeCurso' => $request->nomeCurso,
                'nivelCurso' => $request->nivelCurso,
                'descricaoCurso' => $request->descricaoCurso,
                'instituicaoCurso' => session('usuario_id'),
                'statusCurso' => 'Ativo',
            ]);

        } catch (QueryException $e) {
            if ($e->errorInfo[1] == 1062) {
                return redirect()->back()
                    ->with('error', 'Este curso já está cadastrado para esta instituição.')
                    ->withInput();
            }
            return redirect()->back()
                ->with('error', 'Ocorreu um erro inesperado ao salvar o curso.')
                ->withInput();
        }

        return redirect()->route('instituicao.cursos.create')
                         ->with('success', 'Curso cadastrado com sucesso!');
    }
    public function destroy(Curso $curso): RedirectResponse
    {
        // Verifica se o curso pertence à instituição do usuário logado
        if ($curso->instituicaoCurso !== session('usuario_id')) {
            return redirect()->back()->with('error', 'Você não tem permissão para excluir este curso.');
        }

        // Tenta excluir o curso e trata possíveis erros
        try {
            $curso->delete();
            return redirect()->route('instituicao.cursos.create')
                             ->with('success', 'Curso excluído com sucesso!');
        } catch (QueryException $e) {
            return redirect()->back()
                             ->with('error', 'Ocorreu um erro ao excluir o curso. Verifique se ele não está vinculado a outras entidades.');
        }
    }
    public function edit(Curso $curso): View
    {
        // Verifica se o curso pertence à instituição do usuário logado
        if ($curso->instituicaoCurso !== session('usuario_id')) {
            abort(403, 'Você não tem permissão para editar este curso.');
        }

        return view('instituicao.cursos_edit', compact('curso'));
    }
    public function update(Request $request, Curso $curso): RedirectResponse
    {
        // Verifica se o curso pertence à instituição do usuário logado
        if ($curso->instituicaoCurso !== session('usuario_id')) {
            return redirect()->back()->with('error', 'Você não tem permissão para editar este curso.');
        }

        // Validação dos dados recebidos
        $request->validate([
            'nomeCurso' => 'required|string|max:255',
            'nivelCurso' => 'required|string',
            'descricaoCurso' => 'nullable|string|max:200',
            'statusCurso' => 'required|string',
        ]);

        // Atualiza os dados do curso
        $curso->update([
            'nomeCurso' => $request->nomeCurso,
            'nivelCurso' => $request->nivelCurso,
            'descricaoCurso' => $request->descricaoCurso,
            'statusCurso' => $request->statusCurso,
        ]);

        return redirect()->route('instituicao.cursos.create')
                         ->with('success', 'Curso atualizado com sucesso!');
    }
}
