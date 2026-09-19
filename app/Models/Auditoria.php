<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Auditoria extends Model
{
    protected $table = 'auditorias';

    protected $fillable = [
        'utilizador_id',
        'acao',
        'descricao',
        'data_hora',
    ];

    protected function casts(): array
    {
        return [
            'data_hora' => 'datetime',
        ];
    }

    public function utilizador(): BelongsTo
    {
        return $this->belongsTo(User::class, 'utilizador_id');
    }
}