<?php

namespace App\Http\Controllers;

use App\Models\Expediente;
use Illuminate\Http\Request;

class RelatorioController extends Controller
{
    public function index(Request $request)
    {
        $query = Expediente::with('criador');

        if ($request->filled('estado')) {
            $query->where('estado', $request->estado);
        }

        if ($request->filled('tipo')) {
            $query->where('tipo', $request->tipo);
        }

        if ($request->filled('data_inicio')) {
            $query->whereDate('data_entrada', '>=', $request->data_inicio);
        }

        if ($request->filled('data_fim')) {
            $query->whereDate('data_entrada', '<=', $request->data_fim);
        }

        $expedientes = $query
            ->latest('data_entrada')
            ->get();

        $tipos = Expediente::query()
            ->select('tipo')
            ->distinct()
            ->orderBy('tipo')
            ->pluck('tipo');

        $estados = [
            'RECEBIDO',
            'EM TRAMITAÇÃO',
            'AGUARDANDO DESPACHO',
            'DESPACHADO',
            'ARQUIVADO',
        ];

        return view('relatorios.index', compact(
            'expedientes',
            'tipos',
            'estados'
        ));
    }
}