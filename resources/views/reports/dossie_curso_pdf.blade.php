<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>{{ $titulo }}</title>
    <style>
        body { font-family: 'Helvetica', sans-serif; color: #333; font-size: 12px; }
        .header { text-align: center; margin-bottom: 20px; }
        .header h1 { margin: 0; font-size: 18px; }
        .header h2 { margin: 0; font-size: 14px; font-weight: normal; }
        .section-title {
            background-color: #272727;
            color: #fff;
            padding: 8px;
            margin-top: 20px;
            margin-bottom: 10px;
            font-size: 14px;
            text-transform: uppercase;
        }
        .info-table { width: 100%; border-collapse: collapse; margin-bottom: 15px; }
        .info-table td { padding: 6px; border: 1px solid #ddd; }
        .info-table .label { font-weight: bold; background-color: #f9f9f9; width: 25%; }

        .disciplinas-table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        .disciplinas-table th, .disciplinas-table td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        .disciplinas-table th { background-color: #f2f2f2; }

        .periodo-title {
            font-size: 13px;
            font-weight: bold;
            margin-top: 15px;
            margin-bottom: 5px;
            border-bottom: 2px solid #272727;
            padding-bottom: 3px;
        }
        .footer { position: fixed; bottom: 0; width: 100%; text-align: center; font-size: 10px; color: #777; }
        .page-break { page-break-after: always; }
    </style>
</head>
<body>
<div class="header">
    <h1>{{ $instituicao->nomeInstituicao ?? 'Nome da Instituição' }}</h1>
    <h2>{{ $titulo }}</h2>
</div>

<div class="section-title">Informações Gerais do Curso</div>
<table class="info-table">
    <tr>
        <td class="label">Nome do Curso:</td>
        <td>{{ $curso->id }} - {{ $curso->nomeCurso }}</td>
    </tr>
    <tr>
        <td class="label">Nível:</td>
        <td>{{ $curso->nivelCurso }}</td>
    </tr>
    <tr>
        <td class="label">Status:</td>
        <td>{{ ucfirst($curso->statusCurso) }}</td>
    </tr>
    <tr>
        <td class="label">Formato / Duração:</td>
        <td>{{ $curso->formatoCurso }} / {{ $curso->periodosCurso }} Períodos</td>
    </tr>
    <tr>
        <td class="label">Descrição:</td>
        <td>{{ $curso->descricaoCurso ?? 'Nenhuma descrição fornecida.' }}</td>
    </tr>
</table>

<div class="section-title">Matriz Curricular (Disciplinas)</div>

@if($disciplinas->isEmpty())
    <p>Nenhuma disciplina cadastrada para este curso.</p>
@else
    @php
        // Agrupa as disciplinas pelo número do período
        $disciplinasPorPeriodo = $disciplinas->groupBy('periodoDisciplina');
    @endphp

    @foreach($disciplinasPorPeriodo as $periodo => $disciplinasDoPeriodo)
        <div class="periodo-title">{{ $periodo }}º Período</div>
        <table class="disciplinas-table">
            <thead>
            <tr>
                <th>Nome da Disciplina</th>
                <th>Carga Horária</th>
                <th>Status</th>
            </tr>
            </thead>
            <tbody>
            @foreach($disciplinasDoPeriodo as $disciplina)
                <tr>
                    <td>{{ $disciplina->nomeDisciplina }}</td>
                    <td>{{ $disciplina->cargaDisciplina ?? 'N/A' }} horas</td>
                    <td>{{ ucfirst($disciplina->statusDisciplina) }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endforeach
@endif

<div class="footer">
    Relatório gerado em {{ date('d/m/Y H:i') }}
</div>
</body>
</html>
