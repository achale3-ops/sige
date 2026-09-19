<?php

namespace App\Http\Controllers;

use App\Models\Expediente;
use App\Services\AuditoriaService;
use Illuminate\Http\Request;

class ExpedienteController extends Controller
{
    public function create()
    {
        return view('expedientes.create');
    }

    public function store(
        Request $request,
        AuditoriaService $auditoriaService
    ) {
        $dados = $request->validate([
            'numero' => ['required', 'string', 'max:50', 'unique:expedientes,numero'],
            'assunto' => ['required', 'string', 'max:255'],
            'remetente' => ['required', 'string', 'max:150'],
            'tipo' => ['required', 'string', 'max:100'],
            'data_entrada' => ['required', 'date'],
            'descricao' => ['nullable', 'string'],
        ]);

        $expediente = Expediente::create([
            'numero' => $dados['numero'],
            'assunto' => $dados['assunto'],
            'remetente' => $dados['remetente'],
            'tipo' => $dados['tipo'],
            'data_entrada' => $dados['data_entrada'],
            'descricao' => $dados['descricao'] ?? null,
            'estado' => 'RECEBIDO',
            'criado_por' => $request->user()->id,
        ]);

        $auditoriaService->registar(
            $request->user()->id,
            'REGISTAR_EXPEDIENTE',
            'Expediente ' . $expediente->numero . ' registado no sistema.'
        );

        return redirect()
            ->route('dashboard')
            ->with('success', 'Expediente registado com sucesso.');
    }
}