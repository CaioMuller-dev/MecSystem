<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Servico extends Model
{
    protected $fillable = [
        'nome',
        'preco_base',
        'tempo_estimado_min',
        'ativo',
    ];

    protected function casts(): array
    {
        return [
            'preco_base' => 'decimal:2',
            'tempo_estimado_min' => 'integer',
            'ativo' => 'boolean',
        ];
    }

    public function itensOrdemServico(): HasMany
    {
        return $this->hasMany(OsItemServico::class);
    }
}
