<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cadastro;
use Illuminate\Support\Facades\Hash;

class CadastroController extends Controller
{
    public function showForm()
    {
        return view('cadastro');
    }

    public function cadastrar(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:100',
            'email' => 'required|email|unique:table_cadastro,email',//verifica se o e-mail informado já existe na tabela
            'senha' => 'required|min:6'
        ]);

        // Criptografa a senha
        Cadastro::create([
            'nome' => $request->nome,
            'email' => $request->email,
            'senha' => Hash::make($request->senha),
        ]);

        return redirect()->route('login.form')->with('sucesso', 'Cadastro realizado com sucesso!');
    }
}
