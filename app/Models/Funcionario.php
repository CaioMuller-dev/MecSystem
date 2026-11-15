<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Funcionario extends Model
{
    protected $fillable = [
        'nome',
        'cargo',
        'cpf',
        'telefone',
        'ativo',
    ];

    protected function casts(): array
    {
        return ['ativo' => 'boolean'];
    }

    public function user(): HasOne
    {
        return $this->hasOne(User::class, 'funcionario_id');
    }

    public function agendamentos(): HasMany
    {
        return $this->hasMany(Agendamento::class, 'mecanico_id');
    }

    public function ordensServico(): HasMany
    {
        return $this->hasMany(OrdemServico::class, 'mecanico_id');
    }

    public function itensServico(): HasMany
    {
        return $this->hasMany(OsItemServico::class, 'mecanico_id');
    }
}
