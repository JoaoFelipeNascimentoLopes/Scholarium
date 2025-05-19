<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Session;

class AuthInstituicao
{
    public function handle(Request $request, Closure $next): Response
    {
        // Verificar se o usuário está logado e se o tipo de usuário é "instituição" (1)
        if (!session()->has('usuario_id') || session('usuario_tipo') !== '1') {
            // Caso não esteja logado ou não seja uma instituição, redireciona para o login
            return redirect()->route('login')->withErrors(['login_error' => 'Acesso restrito à instituições.']);
        }

        return $next($request);  // Caso contrário, prossegue com a requisição
    }
}
