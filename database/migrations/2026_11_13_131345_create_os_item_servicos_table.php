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
        Schema::create('os_item_servicos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->decimal('quantidade', 10, 2);
            $table->decimal('preco_aplicado', 10, 2);

            $table->foreignId('ordem_servico_id')
                ->constrained('ordem_servicos')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            $table->foreignId('servico_id')
                ->constrained('servicos')
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            $table->foreignId('mecanico_id')
                ->nullable()
                ->constrained('funcionarios')
                ->cascadeOnUpdate()
                ->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('os_item_servicos');
    }
};
