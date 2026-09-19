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
        Schema::create('tramitacoes', function (Blueprint $table) {
            $table->id();

            $table->foreignId('expediente_id')
                ->constrained('expedientes')
                ->cascadeOnDelete();

            $table->string('origem', 150);
            $table->string('destino', 150);
            $table->text('observacao')->nullable();

            $table->foreignId('responsavel_id')
                ->constrained('users')
                ->restrictOnDelete();

            $table->dateTime('data_tramitacao');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tramitacoes');
    }
};