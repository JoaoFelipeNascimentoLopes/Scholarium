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

        // --- Bloco 1: Contagem para os Cards (sem alterações) ---
        $totalAtivos = Curso::where('instituicaoCurso', $instituicaoId)->where('statusCurso', 'Ativo')->count();
        $totalInativos = Curso::where('instituicaoCurso', $instituicaoId)->where('statusCurso', 'Inativo')->count();
        $totalCursos = $totalAtivos + $totalInativos;

        // --- Bloco 2: Dados para o Gráfico de Níveis (sem alterações) ---
        $niveisCursos = Curso::where('instituicaoCurso', $instituicaoId)
            ->where('statusCurso', 'Ativo')
            ->select('nivelCurso', DB::raw('count(*) as total'))
            ->groupBy('nivelCurso')
            ->pluck('total', 'nivelCurso');

        $labelsNiveis = $niveisCursos->keys();
        $dataNiveis = $niveisCursos->values();

        // --- Bloco 3: Lógica da Tabela (AGORA COM ORDENAÇÃO) ---

        // NOVO: Captura os parâmetros de ordenação da URL, com valores padrão.
        $sortBy = $request->query('sortBy', 'id');
        $direction = $request->query('direction', 'desc');

        // NOVO: Validação de segurança para as colunas permitidas.
        $colunasPermitidas = ['id', 'nomeCurso', 'nivelCurso', 'statusCurso'];
        if (!in_array($sortBy, $colunasPermitidas)) {
            $sortBy = 'id'; // Retorna ao padrão se a coluna for inválida
        }

        // 1. Inicia a consulta base
        $queryCursos = Curso::where('instituicaoCurso', $instituicaoId);

        // 2. Adiciona o filtro de busca, se houver
        if ($request->filled('busca')) {
            $termoBusca = $request->busca;
            $queryCursos->where('nomeCurso', 'LIKE', '%' . $termoBusca . '%');
        }

        // 3. ATUALIZADO: Aplica a ordenação dinâmica à consulta.
        $queryCursos->orderBy($sortBy, $direction);

        // 4. Executa a consulta e pagina os resultados. O .latest() foi removido pois agora temos orderBy().
        $cursos = $queryCursos->paginate(10);


        // --- Bloco 4: Enviando tudo para a View (COM AS NOVAS VARIÁVEIS) ---
        return view('instituicao.cursos', compact(
            'totalCursos',
            'totalAtivos',
            'totalInativos',
            'labelsNiveis',
            'dataNiveis',
            'cursos',
            'sortBy',    // <-- NOVO: Envia a coluna de ordenação atual para a view
            'direction'  // <-- NOVO: Envia a direção da ordenação atual para a view
        ));
    }
    public function getTotalDisciplinas(Curso $curso)
    {
        // A consulta que você queria: conta as disciplinas relacionadas a este curso.
        $total = $curso->disciplinas()->count();

        // Retorna a resposta em formato JSON, que o JavaScript pode entender facilmente.
        return response()->json(['total_disciplinas' => $total]);
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
            'periodoCurso' => 'nullable|integer|min:1',
            'descricaoCurso' => 'nullable|string|max:200',
        ]);

        try {
            Curso::create([
                'nomeCurso' => $request->nomeCurso,
                'nivelCurso' => $request->nivelCurso,
                'periodosCurso' => $request->periodosCurso,
                'descricaoCurso' => $request->descricaoCurso,
                'instituicaoCurso' => session('usuario_id'),
                'statusCurso' => 'Ativo',
            ]);

        } catch (QueryException $e) {
            if ($e->errorInfo[1] == 1062) {
                return redirect()->back()
                    ->with('error', '☒ Este curso já está cadastrado para esta instituição.')
                    ->withInput();
            }
            return redirect()->back()
                ->with('error', '☒ Ocorreu um erro inesperado ao salvar o curso.')
                ->withInput();
        }

        return redirect()->route('instituicao.cursos.create')
                         ->with('success', '✔ Curso cadastrado com sucesso!');
    }
    public function destroy(Curso $curso): RedirectResponse
    {
        // Verifica se o curso pertence à instituição do usuário logado
        if ($curso->instituicaoCurso !== session('usuario_id')) {
            return redirect()->back()->with('error', '🗙 Você não tem permissão para excluir este curso.');
        }

        // Tenta excluir o curso e trata possíveis erros
        try {
            $curso->delete();
            return redirect()->route('instituicao.cursos.create')
                             ->with('success', '✔ Curso excluído com sucesso!');
        } catch (QueryException $e) {
            return redirect()->back()
                             ->with('error', '🗙 Ocorreu um erro ao excluir o curso. Verifique se ele não está vinculado a outras entidades.');
        }
    }
    public function edit(Curso $curso): View
    {
        // Verifica se o curso pertence à instituição do usuário logado
        if ($curso->instituicaoCurso !== session('usuario_id')) {
            abort(403, '☒ Você não tem permissão para editar este curso.');
        }

        return view('instituicao.cursos_edit', compact('curso'));
    }
    public function update(Request $request, Curso $curso): RedirectResponse
    {
        // Verifica se o curso pertence à instituição do usuário logado
        if ($curso->instituicaoCurso !== session('usuario_id')) {
            return redirect()->back()->with('error', '🗙 Você não tem permissão para editar este curso.');
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
                         ->with('success', '✔ Curso atualizado com sucesso!');
    }
    public function getDisciplinasDoCurso(Curso $curso)
    {
        // Segurança: Garante que só se pode pegar dados de cursos da própria instituição
        if ($curso->instituicaoCurso != session('usuario_id')) {
            abort(403, 'Acesso não autorizado.');
        }

        // 1. Busca as disciplinas ativas do curso
        $disciplinasAtivas = $curso->disciplinas()
            ->where('statusDisciplina', 'Ativa')
            ->get();

        // 2. CALCULA a soma da coluna 'cargaDisciplina' da coleção que buscamos
        $cargaHorariaTotal = $disciplinasAtivas->sum('cargaDisciplina');

        // 3. AGRUPA as disciplinas por período para a exibição em tabelas
        $disciplinasAgrupadas = $disciplinasAtivas->groupBy('periodoDisciplina');

        // 4. Retorna uma resposta JSON contendo AMBOS os dados
        return response()->json([
            'periodos' => $disciplinasAgrupadas,
            'carga_horaria_total' => $cargaHorariaTotal
        ]);
    }
}
