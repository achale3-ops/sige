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
        Schema::create('papel_permissao', function (Blueprint $table) {
            $table->foreignId('papel_id')
                ->constrained('papeis')
                ->cascadeOnDelete();

            $table->foreignId('permissao_id')
                ->constrained('permissoes')
                ->cascadeOnDelete();

            $table->primary(['papel_id', 'permissao_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('papel_permissao');
    }
};