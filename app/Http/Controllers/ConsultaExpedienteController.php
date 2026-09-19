<?php

namespace App\Http\Controllers;

use App\Models\Expediente;

class ConsultaExpedienteController extends Controller
{
    public function show(Expediente $expediente)
    {
        $expediente->load([
            'criador',
            'tramitacoes.responsavel',
            'despacho.responsavel',
        ]);

        return view('expedientes.show', compact('expediente'));
    }
}