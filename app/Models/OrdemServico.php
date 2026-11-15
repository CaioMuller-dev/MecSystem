<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class OrdemServico extends Model
{
    protected $fillable = [
        'data_abertura',
        'status',
        'observacoes',
        'desconto',
        'veiculo_id',
        'mecanico_id',
        'user_abertura_id',
        'data_inicio_real',
        'data_fim_real',
    ];

    protected function casts(): array
    {
        return [
            'data_abertura' => 'datetime',
            'data_inicio_real' => 'datetime',
            'data_fim_real' => 'datetime',
            'desconto' => 'decimal:2',
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

    public function userAbertura(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_abertura_id');
    }

    public function itensProduto(): HasMany
    {
        return $this->hasMany(OsItemProduto::class);
    }

    public function itensServico(): HasMany
    {
        return $this->hasMany(OsItemServico::class);
    }

    public function movimentacoesEstoque(): HasMany
    {
        return $this->hasMany(MovimentacaoEstoque::class);
    }

    public function pagamentos(): HasMany
    {
        return $this->hasMany(Pagamento::class);
    }
}
