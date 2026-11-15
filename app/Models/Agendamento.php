<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Agendamento extends Model
{
    protected $fillable = [
        'data_hora_inicio',
        'data_hora_fim',
        'status',
        'veiculo_id',
        'mecanico_id',
    ];

    protected function casts(): array
    {
        return [
            'data_hora_inicio' => 'datetime',
            'data_hora_fim' => 'datetime',
        ];
    }

    public function veiculo(): BelongsTo
    {
        return $this->belongsTo(Veiculo::class);
    }

    public function mecanico(): BelongsTo
    {
        return $this->belongsTo(Funcionario::class, 'mecanico_id');
    }
}
