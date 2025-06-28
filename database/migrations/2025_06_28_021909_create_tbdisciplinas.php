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
        Schema::create('tbdisciplinas', function (Blueprint $table) {
            $table->id();
            // Colunas baseadas nos campos do seu formulário
            $table->string('nomeDisciplina');
            $table->integer('cargaDisciplina');
            $table->string('tipoDisciplina'); // Armazenará "Anual" ou "Semestral"
            $table->text('descricaoDisciplina')->nullable();
            $table->string('ementaDisciplina')->nullable(); // Armazenará o caminho do arquivo PDF/DOCX
            $table->string('statusDisciplina')->default('Ativa');

            // Chave estrangeira que se conecta à tabela 'tbcurso'
            // O nome 'cursoDisciplina' corresponde ao que definimos no Model.
            // 'onDelete('cascade')' apaga as disciplinas se o curso pai for deletado.
            $table->foreignId('cursoDisciplina')->constrained('tbcurso')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbdisciplinas');
    }
};
