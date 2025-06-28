<?php

namespace App\Http\Controllers;

use App\Models\Disciplina;
use Illuminate\Http\Request;
use App\Models\Curso;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\RedirectResponse;

class DisciplinaController extends Controller
{
    //
    public function create(): View
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

        // 2. Retorna a view do formulário e passa a variável '$cursos' para ela.
        //    (Assumindo que sua view se chama 'disciplinas_create.blade.php')
        return view('instituicao.disciplinas', compact('cursos', 'totalDisciplinasAtivas', 'totalDisciplinasInativas', 'totalDisciplinas'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'nomeDisciplina'      => 'required|string|max:255',
            'cursoDisciplina'     => 'required|exists:tbcurso,id',
            'cargaDisciplina'     => 'required|integer|min:1',
            'tipoDisciplina'      => 'required|string',
            'ementaDisciplina'    => 'nullable|file|mimes:pdf,doc,docx|max:5120',
            'descricaoDisciplina' => 'nullable|string|max:200',
        ]);

        // Agora, quando adicionamos a ementa, estamos adicionando a um array que já tem os outros dados.
        if($request->hasFile('ementaDisciplina')) {
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
            ->with('success', 'Disciplina cadastrada com sucesso!');
    }
}
