<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>
<body>
    <nav id="menuPrincipal">
        <a  href="{{ route('login') }}">
            <div id="menuLogin">Login</div>
        </a>
        <a href="{{ route('cadastro') }}">
            <div id="menuCadastro">Cadastro</div>
        </a>
    </nav>
</body>
</html>
