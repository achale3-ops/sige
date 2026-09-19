<?php

namespace App\Http\Controllers;

use App\Models\Expediente;
use App\Models\Tramitacao;
use App\Services\AuditoriaService;
use Illuminate\Http\Request;

class TramitacaoController extends Controller
{
    public function store(
        Request $request,
        Expediente $expediente,
        AuditoriaService $auditoriaService
    ) {
        if (!in_array($expediente->estado, ['RECEBIDO', 'EM TRAMITAÇÃO'], true)) {
            abort(
                422,
                'O expediente não pode ser tramitado no estado actual.'
            );
        }

        $dados = $request->validate([
            'origem' => ['required', 'string', 'max:150'],
            'destino' => ['required', 'string', 'max:150'],
            'observacao' => ['nullable', 'string'],
        ]);

        Tramitacao::create([
            'expediente_id' => $expediente->id,
            'origem' => $dados['origem'],
            'destino' => $dados['destino'],
            'observacao' => $dados['observacao'] ?? null,
            'responsavel_id' => $request->user()->id,
            'data_tramitacao' => now(),
        ]);

        $expediente->update([
            'estado' => 'EM TRAMITAÇÃO',
        ]);

        $auditoriaService->registar(
            $request->user()->id,
            'TRAMITAR_EXPEDIENTE',
            'Expediente ' . $expediente->numero .
            ' tramitado de ' . $dados['origem'] .
            ' para ' . $dados['destino'] . '.'
        );

        return redirect()
            ->back()
            ->with('success', 'Expediente tramitado com sucesso.');
    }
}
