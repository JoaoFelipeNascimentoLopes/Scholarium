<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthInstituicao
{
    public function handle(Request $request, Closure $next): Response
    {
        if (session('usuario_tipo') !== 1) {
            return redirect()->route('login')->withErrors([
                'emailLogin' => 'Acesso restrito à instituições.',
            ]);
        }

        return $next($request);
    }
}
