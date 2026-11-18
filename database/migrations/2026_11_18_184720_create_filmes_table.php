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
        Schema::create('filmes', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->text('descricao');
            $table->integer('ano_lancamento');
            $table->foreignId('categoria_id')->nullable()->constrained('categorias')->nullOnDelete();
            $table->foreignId('idioma_id')->nullable()->constrained('idiomas')->nullOnDelete();
            $table->string('classificacao', 20);
            $table->foreignId('nacionalidade_id')->nullable()->constrained('nacionalidades')->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('filmes');
    }
};
