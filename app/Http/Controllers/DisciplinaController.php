<?php

namespace App\Http\Controllers;

use App\Models\Disciplina;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Models\Curso;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Illuminate\Support\Facades\DB;

class DisciplinaController extends Controller
{
    //
    public function create(Request $request): View
    {
        $instituicaoId = session('usuario_id');

        $totalDisciplinasAtivas = Disciplina::where('statusDisciplina', 'Ativa') // 1. Filtra primeiro por status 'Ativa'
        ->whereHas('curso', function ($query) use ($instituicaoId) {   // 2. Depois, filtra por cursos da instituição
            $query->where('instituicaoCurso', $instituicaoId);
        })
            ->count();

        $totalDisciplinasInativas = Disciplina::where('statusDisciplina', 'Inativo') // 1. Filtra primeiro por status 'Inativo'
        ->whereHas('curso', function ($query) use ($instituicaoId) {     // 2. Depois, filtra por cursos da instituição
            $query->where('instituicaoCurso', $instituicaoId);
        })
            ->count();

        $totalDisciplinas = $totalDisciplinasAtivas + $totalDisciplinasInativas;
        // 1. Busca no banco de dados todos os cursos que pertencem
        //    à instituição do usuário que está logado.
        $cursos = Curso::where('instituicaoCurso', session('usuario_id'))
            ->orderBy('nomeCurso', 'asc') // Ordena por nome para facilitar a seleção
            ->get();

        $queryDisciplinas = Disciplina::whereHas('curso', function ($query) use ($instituicaoId) {
            $query->where('instituicaoCurso', $instituicaoId);
        });

        // --- DADOS PARA O GRÁFICO (APENAS DISCIPLINAS POR CURSO) ---
        $disciplinasPorCurso = Disciplina::whereHas('curso', function ($q) use ($instituicaoId) {
            $q->where('instituicaoCurso', $instituicaoId);
        })
            ->join('tbcurso', 'tbdisciplina.cursoDisciplina', '=', 'tbcurso.id')
            ->select('tbcurso.nomeCurso', DB::raw('count(*) as total'))
            ->groupBy('tbcurso.nomeCurso')
            ->orderBy('total', 'desc')
            ->pluck('total', 'tbcurso.nomeCurso');

        // Prepara os dados para o Chart.js
        $labelsDisciplinasPorCurso = $disciplinasPorCurso->keys();
        $dataDisciplinasPorCurso = $disciplinasPorCurso->values();


        if ($request->filled('busca')) {
            $queryDisciplinas->where('nomeDisciplina', 'LIKE', '%' . $request->busca . '%');
        }

        // A MÁGICA ESTÁ AQUI: ->with('curso')
        // Esta linha diz ao Laravel: "Ao buscar as disciplinas, já traga junto os dados do curso de cada uma".
        $disciplinas = $queryDisciplinas->with('curso')->latest()->paginate(10);

        // 2. Retorna a view do formulário e passa a variável '$cursos' para ela.
        //    (Assumindo que sua view se chama 'disciplinas_create.blade.php')
        return view('instituicao.disciplinas', compact('cursos', 'totalDisciplinasAtivas', 'totalDisciplinasInativas', 'totalDisciplinas', 'disciplinas', 'labelsDisciplinasPorCurso', 'dataDisciplinasPorCurso'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'nomeDisciplina' => 'required|string|max:255',
            'cursoDisciplina' => 'required|exists:tbcurso,id',
            'cargaDisciplina' => 'required|integer|min:1',
            'tipoDisciplina' => 'required|string',
            'periodoDisciplina' => 'required|integer|min:1',
            'ementaDisciplina' => 'nullable|file|mimes:pdf,doc,docx|max:5120',
            'descricaoDisciplina' => 'nullable|string|max:200',
        ]);

        // Agora, quando adicionamos a ementa, estamos adicionando a um array que já tem os outros dados.
        if ($request->hasFile('ementaDisciplina')) {
            $path = $request->file('ementaDisciplina')->store('ementas', 'public');
            $validatedData['ementaDisciplina'] = $path;
        }

        // O mesmo para o status.
        $validatedData['statusDisciplina'] = 'Ativa';

        // Se você deixar o dd() aqui agora, verá o array completo!
        // dd($validatedData);

        // O método create() agora recebe todos os dados para salvar.
        Disciplina::create($validatedData);

        // MELHORIA: Redirecionando para a lista de disciplinas para ver o novo item cadastrado.
        return redirect()->route('instituicao.disciplinas_create')
            ->with('success', '✓ Disciplina cadastrada com sucesso!');
    }

    public function destroy(Disciplina $disciplina): \Illuminate\Http\RedirectResponse
    {
        // A verificação de segurança para Disciplinas
        if ($disciplina->cursoDisciplina->instituicaoCurso != session('usuario_id')) {
            abort(403, 'Você não tem permissão para acessar esta disciplina.');
        }
        // Tenta excluir o curso e trata possíveis erros
        try {
            $disciplina->delete();
            return redirect()->route('instituicao.disciplinas_create')
                ->with('success', '✓ Disciplina excluída com sucesso!');
        } catch (QueryException $e) {
            return redirect()->back()
                ->with('error', '☒ Ocorreu um erro ao excluir a Disciplina. Verifique se ele não está vinculado a outras entidades.');
        }
    }

    // Em app/Http/Controllers/DisciplinaController.php

    public function edit(Disciplina $disciplina): View
    {
        // A verificação de segurança agora acessa o relacionamento 'curso' primeiro
        // para pegar o objeto Curso, e só então acessa a propriedade 'instituicaoCurso'.
        if ($disciplina->curso->instituicaoCurso != session('usuario_id')) {
            abort(403, 'Acesso Não Autorizado');
        }

        // Como o curso da disciplina não pode ser alterado, não precisamos buscar a lista de cursos.
        // Apenas a disciplina que está sendo editada é enviada para a view.
        return view('instituicao.disciplinas_edit', compact('disciplina'));
    }

    public function update(Request $request, Disciplina $disciplina): RedirectResponse
    {
        // Verificação de segurança (está ótima!)
        if ($disciplina->curso->instituicaoCurso != session('usuario_id')) {
            abort(403, 'Acesso Não Autorizado');
        }

        // 1. Validação Corrigida
        // A chave 'cargaDisciplina' foi ajustada para corresponder ao formulário e ao banco.
        $validatedData = $request->validate([
            'nomeDisciplina'      => 'required|string|max:255',
            'cargaDisciplina'     => 'required|integer|min:1',
            'tipoDisciplina'      => 'required|string',
            'periodoDisciplina'   => 'required|integer|min:1',
            'descricaoDisciplina' => 'nullable|string|max:200',
            'ementaDisciplina'    => 'nullable|file|mimes:pdf,doc,docx|max:5120',
            'statusDisciplina'    => 'required|string',
        ]);

        // 2. Lógica para tratar a ATUALIZAÇÃO do arquivo de ementa
        if ($request->hasFile('ementaDisciplina')) {
            // Se já existia um arquivo antigo, apaga ele primeiro.
            if ($disciplina->ementaDisciplina) {
                Storage::disk('public')->delete($disciplina->ementaDisciplina);
            }
            // Salva o novo arquivo e atualiza o caminho nos dados validados.
            $validatedData['ementaDisciplina'] = $request->file('ementaDisciplina')->store('ementas', 'public');
        }

        // 3. Atualiza o registro no banco com todos os dados validados e processados.
        $disciplina->update($validatedData);

        // 4. Redirecionamento Corrigido
        // Redireciona para a página de LISTAGEM para que o usuário veja a alteração.
        return redirect()->route('instituicao.disciplinas_create')
            ->with('success', '✓ Disciplina atualizada com sucesso!');
    }
}
