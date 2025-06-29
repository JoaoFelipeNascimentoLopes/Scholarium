<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>{{ $titulo }}</title>
    <style>
        /* --- O seu CSS pode ser exatamente o mesmo, ele é genérico e funcional --- */
        body {
            font-family: 'Helvetica', 'Arial', sans-serif;
            font-size: 12px;
            color: #272727;
            line-height: 1.4;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
            border-bottom: 2px solid #272727;
            padding-bottom: 15px;
        }
        .header h1 { margin: 0; font-size: 22px; font-weight: bold; color: #272727; }
        .header p { margin: 4px 0 0; font-size: 11px; color: #525252; }
        .header h2 { font-size: 18px; margin-top: 15px; font-weight: normal; border-top: 1px solid #ccc; padding-top: 10px; }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th {
            background-color: #272727;
            color: #ffffff;
            padding: 10px 12px;
            text-align: left;
            text-transform: uppercase;
            font-size: 10px;
            letter-spacing: 0.5px;
        }
        td {
            padding: 10px 12px;
            border-bottom: 1px solid #e5e5e5;
            vertical-align: top;
        }
        tbody tr:last-child td {
            border-bottom: none;
        }
        .empty-row td {
            text-align: center;
            font-style: italic;
            color: #777;
            padding: 20px;
        }
        .footer {
            position: fixed;
            bottom: -20px;
            left: 0; right: 0;
            height: 50px;
            text-align: center;
            font-size: 10px;
            color: #aaa;
        }
        .footer .page-number:before {
            content: "Página " counter(page);
        }
    </style>
</head>
<body>
{{-- O cabeçalho continua o mesmo, pois exibe dados da instituição e um título dinâmico --}}
<div class="header">
    <h1 style="font-size: 20px; margin: 0;">{{ $instituicao->nomeInstituicao }}</h1>
    @if(isset($instituicao->cnpjInstituicao))
        <p>CNPJ: {{ $instituicao->cnpjInstituicao }}</p>
    @endif
    @if(isset($instituicao->logradouroInstituicao))
        <p>{{ $instituicao->logradouroInstituicao }}, Nº {{ $instituicao->numeroInstituicao }} - CEP: {{ $instituicao->cepInstituicao }}</p>
        <p>{{ $instituicao->cidadeInstituicao }} - {{ $instituicao->ufInstituicao }}</p>
    @endif

    <h2>{{ $titulo }}</h2>
    <p>Gerado em: {{ now()->format('d/m/Y H:i:s') }}</p>
</div>

<table>
    <thead>
    <tr>
        <th style="width: 40px;">ID</th>
        <th style="width: 30%;">Nome da Disciplina</th>
        <th style="width: 30%;">Curso Pertencente</th>
        <th style="width: 15%;">Carga Horária</th>
        <th style="width: 15%;">Tipo</th>
        <th style="width: 10%;">Status</th>
    </tr>
    </thead>
    <tbody>
    {{-- O loop agora itera sobre a variável $disciplinas --}}
    @forelse($disciplinas as $disciplina)
        <tr>
            {{-- Exibindo os dados da disciplina e do seu curso relacionado --}}
            <td>{{ $disciplina->id }}</td>
            <td>{{ $disciplina->nomeDisciplina }}</td>
            <td>{{ $disciplina->curso->nomeCurso }}</td>
            <td>{{ $disciplina->cargaDisciplina }}h</td>
            <td>{{ $disciplina->tipoDisciplina }}</td>
            <td>{{ ucfirst($disciplina->statusDisciplina) }}</td>
        </tr>
    @empty
        <tr class="empty-row">
            {{-- Colspan ajustado para o novo número de colunas (6) --}}
            <td colspan="6">Nenhuma disciplina encontrada para este critério.</td>
        </tr>
    @endforelse
    </tbody>
</table>

<div class="footer">
    <span class="page-number"></span>
</div>
</body>
</html>
