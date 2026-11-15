<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MovimentacaoCaixa extends Model
{
    protected $fillable = [
        'data_movimento',
        'tipo',
        'descricao',
        'valor',
        'forma_pagamento',
        'pagamento_id',
        'user_id',
    ];

    protected function casts(): array
    {
        return [
            'data_movimento' => 'datetime',
            'valor' => 'decimal:2',
        ];
    }

    public function pagamento(): BelongsTo
    {
        return $this->belongsTo(Pagamento::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
