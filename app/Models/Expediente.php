<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Expediente extends Model
{
    protected $fillable = [
        'numero',
        'assunto',
        'remetente',
        'tipo',
        'data_entrada',
        'descricao',
        'estado',
        'criado_por',
    ];

    protected function casts(): array
    {
        return [
            'data_entrada' => 'date',
        ];
    }

    public function criador(): BelongsTo
    {
        return $this->belongsTo(User::class, 'criado_por');
    }

    public function tramitacoes(): HasMany
    {
        return $this->hasMany(Tramitacao::class, 'expediente_id');
    }

    public function despacho(): HasOne
    {
        return $this->hasOne(Despacho::class, 'expediente_id');
    }
}