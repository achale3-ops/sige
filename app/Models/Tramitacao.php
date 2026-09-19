<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Tramitacao extends Model
{
    protected $table = 'tramitacoes';

    protected $fillable = [
        'expediente_id',
        'origem',
        'destino',
        'observacao',
        'responsavel_id',
        'data_tramitacao',
    ];

    protected function casts(): array
    {
        return [
            'data_tramitacao' => 'datetime',
        ];
    }

    public function expediente(): BelongsTo
    {
        return $this->belongsTo(Expediente::class);
    }

    public function responsavel(): BelongsTo
    {
        return $this->belongsTo(User::class, 'responsavel_id');
    }
}