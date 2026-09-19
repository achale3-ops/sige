<?php

namespace App\Http\Controllers;

use App\Models\Expediente;
use App\Services\AuditoriaService;

class EstadoExpedienteController extends Controller
{
    public function enviarParaDespacho(
        Expediente $expediente,
        AuditoriaService $auditoriaService
    ) {
        if ($expediente->estado !== 'EM TRAMITAÇÃO') {
            abort(422, 'O expediente precisa estar em tramitação.');
        }

        $expediente->update([
            'estado' => 'AGUARDANDO DESPACHO',
        ]);

        $auditoriaService->registar(
            request()->user()->id,
            'ENVIAR_PARA_DESPACHO',
            'Expediente ' . $expediente->numero . ' enviado para despacho.'
        );

        return redirect()
            ->back()
            ->with('success', 'Expediente enviado para despacho com sucesso.');
    }
}