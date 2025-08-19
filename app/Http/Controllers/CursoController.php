<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage; // Importe a facade Storage

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
        $validatedData = $request->validate([
            'nomeCurso' => 'required|string|max:255',
            'nivelCurso' => 'required|string',
            'periodosCurso' => 'required|integer|min:1',
            'formatoCurso' => 'required|string', // <-- NOVO CAMPO VALIDADO
            'descricaoCurso' => 'nullable|string|max:200',
            'ppcCurso' => 'nullable|file|mimes:pdf|max:5120',
        ]);

        if ($request->hasFile('ppcCurso')) {
            $validatedData['ppcCurso'] = $request->file('ppcCurso')->store('ppcs', 'public');
        }

        // 2. PREPARAÇÃO DOS DADOS PARA SALVAR
        //    Adicionamos os dados que não vêm do formulário diretamente ao array validado.
        $validatedData['instituicaoCurso'] = session('usuario_id');
        $validatedData['statusCurso'] = 'Ativo';

        // O try-catch continua sendo uma excelente prática para lidar com erros de banco.
        try {
            // 3. SALVAR NO BANCO DE DADOS
            //    Agora passamos o array $validatedData completo, que é mais limpo e seguro.
            Curso::create($validatedData);

        } catch (QueryException $e) {
            // Lida com o erro de curso duplicado
            if ($e->errorInfo[1] == 1062) {
                return redirect()->back()
                    ->with('error', '☒ Este curso já está cadastrado para esta instituição.')
                    ->withInput();
            }
            // Lida com outros erros de banco
            return redirect()->back()
                ->with('error', '☒ Ocorreu um erro inesperado ao salvar o curso.')
                ->withInput();
        }

        // 4. REDIRECIONAMENTO CORRIGIDO
        //    Redireciona para a lista de cursos (index) para o usuário ver o item novo.
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
            // Apaga o arquivo PPC se ele existir
            if ($curso->ppcCurso) {
                Storage::disk('public')->delete($curso->ppcCurso);
            }
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
        $validatedData = $request->validate([
            'nomeCurso' => 'required|string|max:255',
            'nivelCurso' => 'required|string',
            'descricaoCurso' => 'nullable|string|max:200',
            'ppcCurso' => 'nullable|file|mimes:pdf|max:5120',
            'statusCurso' => 'required|string',
        ]);

        if ($request->hasFile('ppcCurso')) {
            // Apaga o PPC antigo se ele existir
            if ($curso->ppcCurso) {
                Storage::disk('public')->delete($curso->ppcCurso);
            }
            // Salva o novo arquivo e adiciona o caminho ao array de dados validados
            $validatedData['ppcCurso'] = $request->file('ppcCurso')->store('ppcs', 'public');
        }

        // Atualiza os dados do curso com o array completo
        $curso->update($validatedData);

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
