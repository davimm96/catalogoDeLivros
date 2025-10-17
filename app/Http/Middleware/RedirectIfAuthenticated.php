<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        // Se o usuário estiver logado
        if (Auth::check()) {
            // Redireciona para o dashboard caso tente acessar login ou cadastro
           echo "você já esta logado";
            //return redirect()->route('dashboard');

        }

        // Caso não esteja logado, deixa passar
        echo "Você não está logado";
        return $next($request);

    }
}
