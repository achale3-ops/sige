<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('auditorias', function (Blueprint $table) {
            $table->id();

            $table->foreignId('utilizador_id')
                ->constrained('users')
                ->restrictOnDelete();

            $table->string('acao', 100);
            $table->text('descricao');
            $table->dateTime('data_hora');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('auditorias');
    }
};