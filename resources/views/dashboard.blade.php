<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <h1>Bem vindo, {{ session('usuario') }}</h1>
    <p>Você está logado no sistema</p>
    <a href="{{ route('logout') }}">Sair</a>
</body>
</html>
