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
        Schema::create('movimentacao_caixas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->dateTime('data_movimento')->useCurrent();
            $table->string('tipo', 20);
            $table->string('descricao', 180);
            $table->decimal('valor', 10, 2);
            $table->string('forma_pagamento', 30)->nullable();

            $table->foreignId('pagamento_id')
                ->nullable()
                ->unique()
                ->constrained('pagamentos')
                ->cascadeOnUpdate()
                ->restrictOnDelete();

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
        Schema::dropIfExists('movimentacao_caixas');
    }
};
