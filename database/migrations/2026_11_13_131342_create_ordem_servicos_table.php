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
        Schema::create('ordem_servicos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->dateTime('data_abertura')->useCurrent();
            $table->string('status', 30)->default('Orcamento');
            $table->text('observacoes')->nullable();
            $table->decimal('desconto', 10, 2)->default(0);
            $table->dateTime('data_inicio_real')->nullable();
            $table->dateTime('data_fim_real')->nullable();

            $table->foreignId('veiculo_id')
                ->constrained('veiculos')
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            $table->foreignId('mecanico_id')
                ->nullable()
                ->constrained('funcionarios')
                ->cascadeOnUpdate()
                ->nullOnDelete();

            $table->foreignId('user_abertura_id')
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
        Schema::dropIfExists('ordem_servicos');
    }
};
