<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cadastro;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    // Formulário de login
    public function showLoginForm()
    {
        return view('login');
    }

    // Processar login
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'senha' => 'required'
        ]);

        // Busca usuário
        $usuario = Cadastro::where('email', $request->email)->first();

        // Se usuario existe, se a senha digitada confere com a senha criptografada
        if ($usuario && Hash::check($request->senha, $usuario->senha)) {
            session(['usuario' => $usuario->nome]);

            return redirect()->route('dashboard');
        }

        return back()->withErrors(['loginErro' => 'E-mail ou senha incorretos']);
    }

    // Logout
    public function logout()
    {
        session()->forget('usuario');
        return redirect()->route('login.form');
    }
}
