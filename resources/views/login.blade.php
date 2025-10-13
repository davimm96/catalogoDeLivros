<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Faça login ou <a href="{{ route('cadastro.create') }}">cadastre-sa</a></h1>


    @if($errors->has('loginErro'))
        <p style="color:red;">{{$errors->first('loginErro')}}</p>
    @endif

    <form action="{{route('login')}}" method="POST">
        @csrf

        <label for="email">Email:</label></br>
        <input type="email" id="email" name="email" required><br><br>

        <label for="senha">Senha:</label><br>
        <input type="password" id="senha" name="senha" required><br><br>

        <button type="submit">Entrar</button>
    </form>

    <br>

</body>
</html>
