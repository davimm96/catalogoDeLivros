<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/loginStyle.css')}}">
    <title>Login</title>

</head>
<body>

<div class="container">
    <h2>Login</h2>

    <!-- Mensagem de sucesso (ex: cadastro concluído) -->
    @if(session('sucesso'))
        <div class="sucesso">{{ session('sucesso') }}</div>
    @endif

    <!-- Erro de login -->
    @if($errors->has('loginErro'))
        <div class="erro">{{ $errors->first('loginErro') }}</div>
    @endif

    <form action="{{ route('login') }}" method="POST">
        @csrf

        <input type="email" name="email" placeholder="E-mail" value="{{ old('email') }}" required>
        @error('email')
            <div class="erro">{{ $message }}</div>
        @enderror

        <input type="password" name="senha" placeholder="Senha" required>
        @error('senha')
            <div class="erro">{{ $message }}</div>
        @enderror

        <button type="submit">Entrar</button>
    </form>

    <a href="{{ route('cadastro.form') }}">Criar conta</a>
</div>

</body>
</html>
