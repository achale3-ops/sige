<?php

namespace App\Models;

use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

#[Fillable(['name', 'email', 'password', 'papel_id', 'active'])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    public function papel(): BelongsTo
    {
        return $this->belongsTo(Papel::class);
    }

    public function expedientesCriados(): HasMany
    {
        return $this->hasMany(Expediente::class, 'criado_por');
    }

    public function tramitacoesResponsaveis(): HasMany
    {
        return $this->hasMany(Tramitacao::class, 'responsavel_id');
    }

    public function despachosResponsaveis(): HasMany
    {
        return $this->hasMany(Despacho::class, 'responsavel_id');
    }

    public function auditorias(): HasMany
    {
        return $this->hasMany(Auditoria::class, 'utilizador_id');
    }

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'active' => 'boolean',
        ];
    }
}