<?php

namespace App\Http\Controllers;

use App\Models\Despacho;
use App\Models\Expediente;
use App\Services\AuditoriaService;
use Illuminate\Http\Request;

class DespachoController extends Controller
{
    public function store(
        Request $request,
        Expediente $expediente,
        AuditoriaService $auditoriaService
    ) {
        $dados = $request->validate([
            'conteudo' => ['required', 'string'],
        ]);

        if ($expediente->estado !== 'AGUARDANDO DESPACHO') {
            abort(422, 'O expediente não está aguardando despacho.');
        }

        if ($expediente->despacho) {
            abort(422, 'Este expediente já possui um despacho.');
        }

        Despacho::create([
            'expediente_id' => $expediente->id,
            'conteudo' => $dados['conteudo'],
            'responsavel_id' => $request->user()->id,
            'data_despacho' => now(),
        ]);

        $expediente->update([
            'estado' => 'DESPACHADO',
        ]);

        $auditoriaService->registar(
            $request->user()->id,
            'REGISTAR_DESPACHO',
            'Despacho registado no expediente ' . $expediente->numero . '.'
        );

        return redirect()
            ->back()
            ->with('success', 'Despacho registado com sucesso.');
    }
}