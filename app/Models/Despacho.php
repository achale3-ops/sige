<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Despacho extends Model
{
    protected $table = 'despachos';

    protected $fillable = [
        'expediente_id',
        'conteudo',
        'responsavel_id',
        'data_despacho',
    ];

    protected function casts(): array
    {
        return [
            'data_despacho' => 'datetime',
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