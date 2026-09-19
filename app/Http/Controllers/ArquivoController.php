<?php

namespace App\Http\Controllers;

use App\Models\Expediente;
use App\Services\AuditoriaService;

class ArquivoController extends Controller
{
    public function store(
        Expediente $expediente,
        AuditoriaService $auditoriaService
    ) {
        if ($expediente->estado !== 'DESPACHADO') {
            abort(422, 'O expediente precisa estar despachado para ser arquivado.');
        }

        $expediente->update([
            'estado' => 'ARQUIVADO',
        ]);

        $auditoriaService->registar(
            request()->user()->id,
            'ARQUIVAR_EXPEDIENTE',
            'Expediente ' . $expediente->numero . ' arquivado.'
        );

        return redirect()
            ->back()
            ->with('success', 'Expediente arquivado com sucesso.');
    }
}