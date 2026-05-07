<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AutenticacaoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Verifica se não existe ID do usuario na sessão
        if(!$request->session()->has('id')){
            return redirect()->route('loginForm')->with('error', 'Você precisa estar logado para acessar esta página.');
        }

        return $next($request);
    }
}
