<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>{{ $titulo }}</title>
    <style>
        body { font-family: 'Helvetica', sans-serif; font-size: 12px; color: #333; }
        .header { text-align: center; margin-bottom: 25px; }
        .header h1 { margin: 0; font-size: 22px; }
        .header p { margin: 5px 0 0; font-size: 12px; color: #777; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; font-weight: bold; }
        tr:nth-child(even) { background-color: #f9f9f9; }
        .footer { position: fixed; bottom: 0; left: 0; right: 0; text-align: center; font-size: 10px; color: #aaa; }
        .footer .page-number:before { content: "Página " counter(page); }
    </style>
</head>
<body>
    <div class="header">
        <h1>{{ $titulo }}</h1>
        <p>Gerado em: {{ now()->format('d/m/Y H:i:s') }}</p>
    </div>

    <table>
        <thead>
            <tr>
                <th>Nome do Curso</th>
                <th>Nível</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse($cursos as $curso)
                <tr>
                    <td>{{ $curso->nomeCurso }}</td>
                    <td>{{ $curso->nivelCurso }}</td>
                    <td>{{ $curso->statusCurso }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" style="text-align: center;">Nenhum curso encontrado para este critério.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="footer">
        <span class="page-number"></span>
    </div>
</body>
</html>