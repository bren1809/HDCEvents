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
        Schema::table('events', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained(); // Cria uma coluna chamada user_id no banco e cria uma chave estrangeira (foreign key)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('events', function (Blueprint $table) {
            $table->foreignId('user_id') // Cria uma coluna "user_id" e cria uma chave estrangeira   
            ->constrained()               
            ->onDelete('cascade'); // Comportamento em cascata, se o user for deletado na tabela, todos os registros vinculados serão deletados também
        });
    }
};
