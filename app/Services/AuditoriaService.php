<?php

namespace App\Services;

use App\Models\Auditoria;

class AuditoriaService
{
    public function registar(
        int $utilizadorId,
        string $acao,
        string $descricao
    ): void {
        Auditoria::create([
            'utilizador_id' => $utilizadorId,
            'acao' => $acao,
            'descricao' => $descricao,
            'data_hora' => now(),
        ]);
    }
}