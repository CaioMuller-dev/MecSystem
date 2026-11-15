<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MovimentacaoEstoque extends Model
{
    protected $fillable = [
        'produto_id',
        'data_movimento',
        'tipo',
        'quantidade',
        'custo_unitario',
        'ordem_servico_id',
        'user_id',
        'observacao',
    ];

    protected function casts(): array
    {
        return [
            'data_movimento' => 'datetime',
            'quantidade' => 'decimal:2',
            'custo_unitario' => 'decimal:2',
        ];
    }

    public function produto(): BelongsTo
    {
        return $this->belongsTo(Produto::class);
    }

    public function ordemServico(): BelongsTo
    {
        return $this->belongsTo(OrdemServico::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
