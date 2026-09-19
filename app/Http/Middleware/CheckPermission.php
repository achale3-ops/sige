<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckPermission
{
    public function handle(Request $request, Closure $next, string $permission): Response
    {
        $user = $request->user();

        if (!$user || !$user->active) {
            auth()->logout();

            return redirect()
                ->route('login')
                ->with('error', 'A sua conta está inactiva. Contacte o administrador.');
        }

        if (!$user->papel) {
            abort(403, 'Acesso não autorizado.');
        }

        $temPermissao = $user->papel
            ->permissoes()
            ->where('nome', $permission)
            ->exists();

        if (!$temPermissao) {
            abort(403, 'Acesso não autorizado.');
        }

        return $next($request);
    }
}