<?php

// database/migrations/xxxx_xx_xx_xxxxxx_create_cursos_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tbcurso', function (Blueprint $table) {
            $table->id();
            $table->foreignId('instituicaoCurso')->constrained('tbinstituicao')->onDelete('cascade');
            $table->string('nomeCurso');
            $table->enum('nivelCurso', ['Ensino Fundamental', 'Ensino Médio', 'Técnico', 'Superior', 'Pós-Graduação']);
            $table->text('descricaoCurso')->nullable();
            $table->enum('statusCurso', ['ativo', 'inativo'])->default('ativo');
            $table->timestamps();

            // Garante que o nome do curso seja único apenas dentro da mesma instituição
            $table->unique(['instituicaoCurso', 'nomeCurso']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tbcurso');
    }
};
