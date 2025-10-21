<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckAuth
{
    public function handle(Request $request, Closure $next)
    {
        // Se não estiver logado, redireciona para o login
        if (!session('usuario')) {
            return redirect()->route('login.form');
        }

        return $next($request);
    }
}
