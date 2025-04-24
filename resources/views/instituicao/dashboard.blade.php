<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    Dashboard Instituição
    <h1>Bem-vindo(a), {{ session('usuario_nome') }}!</h1>
    <form action="{{ route('logout') }}" method="GET" style="display:inline;">
        <button type="submit">Sair</button>
    </form>
    
</body>
</html>