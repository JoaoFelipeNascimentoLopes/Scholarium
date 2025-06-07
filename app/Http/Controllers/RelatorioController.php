<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use Illuminate\Http\Request;
use App\Models\Instituicao;
use Barryvdh\DomPDF\Facade\Pdf; // Importa a facade do PDF

class RelatorioController extends Controller
{
    /**
     * Gera um relatório de cursos em PDF com base no status.
     *
     * @param string $status ('todos', 'ativos', 'inativos')
     * @return \Illuminate\Http\Response
     */
    public function gerarRelatorioCursos($status)
    {
        // 1. Pega o ID da instituição logada na sessão
        $instituicaoId = session('usuario_id');
        if (!$instituicaoId) {
            return redirect()->back()->with('error', 'Sessão inválida para gerar relatório.');
        }

        // --- NOVO: BUSCA OS DADOS DA INSTITUIÇÃO ---
        $instituicao = Instituicao::find($instituicaoId);

        // 2. Monta a consulta ao banco de dados, começando com o filtro da instituição
        $query = Curso::where('instituicaoCurso', $instituicaoId);

        $titulo = "Relatório de Cursos Cadastrados"; // Título padrão

        // 3. Adiciona filtros condicionais baseados no status vindo da URL
        if ($status === 'ativos') {
            $query->where('statusCurso', 'Ativo');
            $titulo = "Relatório de Cursos Ativos";
        } elseif ($status === 'inativos') {
            $query->where('statusCurso', 'Inativo');
            $titulo = "Relatório de Cursos Inativos";
        }

        // 4. Executa a consulta para obter os dados
        $cursos = $query->orderBy('nomeCurso', 'asc')->get();

        // 5. Carrega a view do PDF, passando os dados (cursos e título) para ela
        $pdf = PDF::loadView('reports.cursos_pdf', compact('cursos', 'titulo', 'instituicao'));

        // 6. Define o nome do arquivo e força o download no navegador do usuário
        $nomeArquivo = 'relatorio-cursos-' . $status . '-' . $instituicaoId . '.pdf';
        return $pdf->download($nomeArquivo);
    }
}