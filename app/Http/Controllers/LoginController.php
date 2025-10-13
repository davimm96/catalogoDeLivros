<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cadastro;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller {
    //Exibe o formulario de login
    public function showLoginForm(){
        return view('login');
    }

    //Processar o login
    public function login(Request $request){
        //validate dos campos
        $request->validate([
            'email' => 'required|email',
            'senha' => 'required'
        ]);

        // Buscar usuário pelo e-mail
        $usuario = Cadastro::where('email', $request->email)->first();

        //Verificar se existe e se a senha está correta
        if($usuario && Hash::check($request->senha, $usuario->senha)){
            //Salva os dados do usuário na sessão
            session(['usuario' => $usuario->nome]);

            //redireciona para uma página protegida
            return redirect()->route('dashboard');
        }

        //Caso falhe
        return back()->withErrors(['loginErro' => 'E-mail ou senha incorretos']);
    }

    //Logout
    public function logout(){
        session()->forget('usuario');
        return redirect()->route('login.form');
    }
}
