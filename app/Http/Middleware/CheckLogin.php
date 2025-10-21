<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckLogin
{
    public function handle(Request $request, Closure $next)
    {
        // Se já estiver logado, redireciona para o dashboard
        if (session('usuario')) {
            return redirect()->route('dashboard');
        }

        return $next($request);
    }
}
