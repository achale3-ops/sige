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
        Schema::create('expedientes', function (Blueprint $table) {
            $table->id();
            $table->string('numero', 50)->unique();
            $table->string('assunto', 255);
            $table->string('remetente', 150);
            $table->string('tipo', 100);
            $table->date('data_entrada');
            $table->text('descricao')->nullable();
            $table->string('estado', 50)->default('RECEBIDO');

            $table->foreignId('criado_por')
                ->constrained('users')
                ->restrictOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expedientes');
    }
};