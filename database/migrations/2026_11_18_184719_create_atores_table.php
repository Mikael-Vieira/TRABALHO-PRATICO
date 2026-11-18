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
        Schema::create('atores', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('sobrenome');
            $table->foreignId('nacionalidade_id')->constrained('nacionalidades')->onDelete('cascade');
            $table->date('data_nascimento');
            $table->string('sexo', 20);
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('atores');
    }
};
