<?php

namespace App\Http\Controllers;

use App\Models\Papel;
use App\Models\User;
use App\Services\AuditoriaService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $utilizadores = User::with('papel')
            ->orderBy('name')
            ->get();

        return view('utilizadores.index', compact('utilizadores'));
    }

    public function create()
    {
        $papeis = Papel::orderBy('nome')->get();

        return view('utilizadores.create', compact('papeis'));
    }

    public function store(
        Request $request,
        AuditoriaService $auditoriaService
    ) {
        $dados = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'papel_id' => ['required', 'exists:papeis,id'],
        ]);

        $user = User::create([
            'name' => $dados['name'],
            'email' => $dados['email'],
            'password' => Hash::make($dados['password']),
            'papel_id' => $dados['papel_id'],
        ]);

        $papel = Papel::find($dados['papel_id']);

        $auditoriaService->registar(
            $request->user()->id,
            'CRIAR_UTILIZADOR',
            'Utilizador ' . $user->name .
            ' criado com o papel ' . ($papel?->nome ?? 'Sem papel') . '.'
        );

        return redirect()
            ->route('utilizadores.index')
            ->with('success', 'Utilizador criado com sucesso.');
    }

    public function edit(User $user)
    {
        $papeis = Papel::orderBy('nome')->get();

        return view('utilizadores.edit', compact('user', 'papeis'));
    }

    public function update(
        Request $request,
        User $user,
        AuditoriaService $auditoriaService
    ) {
        $dados = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                'unique:users,email,' . $user->id,
            ],
            'papel_id' => ['required', 'exists:papeis,id'],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
        ]);

        $nomeAnterior = $user->name;
        $papelAnterior = $user->papel?->nome ?? 'Sem papel';

        $user->name = $dados['name'];
        $user->email = $dados['email'];
        $user->papel_id = $dados['papel_id'];

        if (!empty($dados['password'])) {
            $user->password = Hash::make($dados['password']);
        }

        $user->save();

        $papelNovo = Papel::find($dados['papel_id']);

        $auditoriaService->registar(
            $request->user()->id,
            'ACTUALIZAR_UTILIZADOR',
            'Utilizador ' . $nomeAnterior .
            ' actualizado para ' . $user->name .
            '. Papel: ' . $papelAnterior .
            ' para ' . ($papelNovo?->nome ?? 'Sem papel') . '.'
        );

        return redirect()
            ->route('utilizadores.index')
            ->with('success', 'Utilizador actualizado com sucesso.');
    }

    public function toggleEstado(
        Request $request,
        User $user,
        AuditoriaService $auditoriaService
    ) {
        if ($request->user()->id === $user->id) {
            return redirect()
                ->route('utilizadores.index')
                ->with('error', 'Não é permitido desactivar a própria conta.');
        }

        $novoEstado = !$user->active;

        $user->update([
            'active' => $novoEstado,
        ]);

        $estado = $novoEstado ? 'activado' : 'desactivado';

        $auditoriaService->registar(
            $request->user()->id,
            'ALTERAR_ESTADO_UTILIZADOR',
            'Utilizador ' . $user->name .
            ' foi ' . $estado . '.'
        );

        return redirect()
            ->route('utilizadores.index')
            ->with('success', 'Estado do utilizador actualizado com sucesso.');
    }
}