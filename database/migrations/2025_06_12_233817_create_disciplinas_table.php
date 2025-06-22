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
        Schema::create('tbdisciplina', function (Blueprint $table) {
            $table->id();
            $table->string('nomeDisciplina');
            $table->integer('cargaDisciplina');
            $table->string('tipoDisciplina'); // Armazenará "Anual" ou "Semestral"
            $table->text('descricaoDisciplina')->nullable();
            $table->string('ementaDisciplina')->nullable(); // Armazenará o caminho do arquivo PDF
            $table->string('statusDisciplina')->default('Ativa');

            // Chave estrangeira para o curso
            $table->foreignId('cursoDisciplina')->constrained('tbcurso')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('disciplinas');
    }
};
