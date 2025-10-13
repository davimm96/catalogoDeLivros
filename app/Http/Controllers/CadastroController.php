<?php

namespace App\Http\Controllers;

use App\Models\Cadastro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

//'nome', 'email', 'senha'
class CadastroController extends Controller
{
    //Exibe formulário
    public function create(){
        return view('cadastro');
    }

    //Recebe e armazena os dados
    public function store(Request $request){
        $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:table_cadastro,email',
            'senha' => 'required|string|min:6'
    ]);

    //Criptografa a senha
    Cadastro::create([
        'nome' => $request->nome,
        'email' => $request->email,
        'senha' => Hash::make($request->senha)
    ]);

    return redirect()->back()->with('success', 'Cadastro realizado com sucesso');
    }

}
