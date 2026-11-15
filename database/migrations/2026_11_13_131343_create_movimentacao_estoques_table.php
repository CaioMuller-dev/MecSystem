<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('movimentacao_estoques', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->dateTime('data_movimento')->useCurrent();
            $table->string('tipo', 20);
            $table->decimal('quantidade', 10, 2);
            $table->decimal('custo_unitario', 10, 2)->nullable();
            $table->string('observacao', 200)->nullable();

            $table->foreignId('produto_id')
                ->constrained('produtos')
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            $table->foreignId('ordem_servico_id')
                ->nullable()
                ->constrained('ordem_servicos')
                ->cascadeOnUpdate()
                ->nullOnDelete();

            $table->foreignId('user_id')
                ->constrained('users')
                ->cascadeOnUpdate()
                ->restrictOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movimentacao_estoques');
    }
};
