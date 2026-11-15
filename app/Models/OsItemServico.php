<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OsItemServico extends Model
{
    protected $fillable = [
        'ordem_servico_id',
        'servico_id',
        'mecanico_id',
        'quantidade',
        'preco_aplicado',
    ];

    protected function casts(): array
    {
        return [
            'quantidade' => 'decimal:3',
            'preco_aplicado' => 'decimal:2',
        ];
    }

    public function ordemServico(): BelongsTo
    {
        return $this->belongsTo(OrdemServico::class);
    }

    public function servico(): BelongsTo
    {
        return $this->belongsTo(Servico::class);
    }

    public function mecanico(): BelongsTo
    {
        return $this->belongsTo(Funcionario::class, 'mecanico_id');
    }
}
