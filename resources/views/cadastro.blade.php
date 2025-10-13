<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
</head>
<body>
    <h1>Cdastre-se ou faça <a href="{{route('login.form')}}">login</a></h1>

    @if (session('success'))
        <p style="color: green">{{ session('success')}}</p>
    @endif

    <form action="{{route('cadastro.store')}}" method="POST">
        @csrf
        <label for="nome">Nome:</label><br>
        <input type="text" id="nome" name="nome" minlength="6" maxlength="200" required><br><br>

        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" minlength="6" maxlength="200" required><br><br>

        <label for="senha">Senha:</label><br>
        <input type="password" id="senha" name="senha" minlength="6" maxlength="200" required><br><br>

        <button type="submit">Enviar</button>
    </form>
</body>
</html>
