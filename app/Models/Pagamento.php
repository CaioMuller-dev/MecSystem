<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Pagamento extends Model
{
    protected $fillable = [
        'ordem_servico_id',
        'data_pagamento',
        'valor',
        'forma_pagamento',
        'status',
        'referencia',
        'user_id',
    ];

    protected function casts(): array
    {
        return [
            'data_pagamento' => 'datetime',
            'valor' => 'decimal:2',
        ];
    }

    public function ordemServico(): BelongsTo
    {
        return $this->belongsTo(OrdemServico::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function movimentacaoCaixa(): HasOne
    {
        return $this->hasOne(MovimentacaoCaixa::class);
    }
}
