<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('despachos', function (Blueprint $table) {
            $table->id();

            $table->foreignId('expediente_id')
                ->constrained('expedientes')
                ->cascadeOnDelete();

            $table->text('conteudo');

            $table->foreignId('responsavel_id')
                ->constrained('users')
                ->restrictOnDelete();

            $table->dateTime('data_despacho');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('despachos');
    }
};