<?php

namespace App\Http\Controllers;

use App\Models\Auditoria;

class AuditoriaController extends Controller
{
    public function index()
    {
        $auditorias = Auditoria::with('utilizador')
            ->latest('data_hora')
            ->get();

        return view('auditorias.index', compact('auditorias'));
    }
}