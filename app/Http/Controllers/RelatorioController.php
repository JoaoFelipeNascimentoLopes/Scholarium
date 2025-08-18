<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\Disciplina;
use Illuminate\Http\Request;
use App\Models\Instituicao;
use Barryvdh\DomPDF\Facade\Pdf; // Importa a facade do PDF

class RelatorioController extends Controller
{
    /**
     * Gera um relatório de cursos em PDF e exibe em um visualizador.
     *
     * @param string $status ('todos', 'ativos', 'inativos')
     * @return \Illuminate\Contracts\View\View
     */
    public function gerarRelatorioCursos($status)
    {
        // 1. Pega o ID da instituição logada na sessão
        $instituicaoId = session('usuario_id');
        if (!$instituicaoId) {
            return redirect()->back()->with('error', 'Sessão inválida para gerar relatório.');
        }

        // --- BUSCA OS DADOS DA INSTITUIÇÃO ---
        $instituicao = Instituicao::find($instituicaoId);

        // 2. Monta a consulta ao banco de dados
        $query = Curso::where('instituicaoCurso', $instituicaoId);

        $titulo = "Relatório de Cursos Cadastrados"; // Título padrão

        // 3. Adiciona filtros condicionais
        if ($status === 'ativos') {
            $query->where('statusCurso', 'Ativo');
            $titulo = "Relatório de Cursos Ativos";
        } elseif ($status === 'inativos') {
            $query->where('statusCurso', 'Inativo');
            $titulo = "Relatório de Cursos Inativos";
        }

        // 4. Executa a consulta
        $cursos = $query->orderBy('nomeCurso', 'asc')->get();

        // 5. Carrega a view do PDF
        $pdf = PDF::loadView('reports.cursos_pdf', compact('cursos', 'titulo', 'instituicao'));

        // 6. Define o nome do arquivo
        $nomeArquivo = 'relatorio-cursos-' . $status . '-' . $instituicaoId . '.pdf';

        // 7. Converte o PDF para Base64 para poder embutir no HTML
        $pdfBase64 = base64_encode($pdf->output());

        // 8. Retorna a view do visualizador, passando os dados necessários
        return view('reports.viewRelatorio', compact('pdfBase64', 'titulo', 'nomeArquivo'));
    }

    /**
     * Gera um relatório de disciplinas em PDF e exibe em um visualizador.
     *
     * @param string $status ('todas', 'ativas', 'inativas')
     * @return \Illuminate\Contracts\View\View
     */
    public function gerarRelatorioDisciplinas($status)
    {
        $instituicaoId = session('usuario_id');
        if (!$instituicaoId) {
            return redirect()->back()->with('error', 'Sessão inválida.');
        }

        $instituicao = Instituicao::find($instituicaoId);

        // 1. Inicia a consulta em Disciplina
        $query = Disciplina::whereHas('curso', function ($q) use ($instituicaoId) {
            $q->where('instituicaoCurso', $instituicaoId);
        });

        $titulo = "Relatório de Disciplinas Cadastradas";

        // 2. Adiciona os filtros de status
        if ($status === 'ativas') {
            $query->where('statusDisciplina', 'Ativa');
            $titulo = "Relatório de Disciplinas Ativas";
        } elseif ($status === 'inativas') {
            $query->where('statusDisciplina', 'Inativo');
            $titulo = "Relatório de Disciplinas Inativas";
        }

        // 3. Executa a consulta
        $disciplinas = $query->with('curso')->orderBy('nomeDisciplina', 'asc')->get();

        // 4. Carrega a view do PDF
        $pdf = PDF::loadView('reports.disciplinas_pdf', compact('disciplinas', 'titulo', 'instituicao'));

        // 5. Gera o nome do arquivo
        $nomeArquivo = 'relatorio-disciplinas-' . $status . '-' . date('Y-m-d') . '.pdf';

        // 6. Converte o PDF para Base64
        $pdfBase64 = base64_encode($pdf->output());

        // 7. Retorna a view do visualizador
        return view('reports.viewRelatorio', compact('pdfBase64', 'titulo', 'nomeArquivo'));
    }
}
