<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/cadastroStyle.css')}}">
    <title>Cadastro</title>
</head>
<body>

<div class="container">
    <h2>Criar Conta</h2>

    <!-- Mensagem de erro geral -->
    @if($errors->any())
        <div class="erro">
            <ul style="padding-left: 15px;">
                @foreach($errors->all() as $erro)
                    <li>{{ $erro }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('cadastro.salvar') }}" method="POST">
        @csrf

        <input type="text" name="nome" placeholder="Nome completo" value="{{ old('nome') }}" required>
        @error('nome')
            <div class="erro">{{ $message }}</div>
        @enderror

        <input type="email" name="email" placeholder="E-mail" value="{{ old('email') }}" required>
        @error('email')
            <div class="erro">{{ $message }}</div>
        @enderror

        <input type="password" name="senha" placeholder="Senha" required>
        @error('senha')
            <div class="erro">{{ $message }}</div>
        @enderror

        <button type="submit">Cadastrar</button>
    </form>

    <a href="{{ route('login.form') }}">Já tem uma conta? Fazer login</a>
</div>

</body>
</html>
