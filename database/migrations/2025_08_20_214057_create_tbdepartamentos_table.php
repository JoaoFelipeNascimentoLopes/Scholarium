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
        Schema::create('tbdepartamentos', function (Blueprint $table) {
            $table->id();
            $table->string('nomeDepartamento');
            $table->text('descricaoDepartamento')->nullable();

            // Chave estrangeira que se conecta à tabela 'tbinstituicao'
            $table->foreignId('instituicao_id')
                ->constrained('tbinstituicao') // Especifica o nome correto da tabela
                ->onDelete('cascade');

            $table->timestamps();

            // Garante que não pode haver dois departamentos com o mesmo nome na mesma instituição
            $table->unique(['nomeDepartamento', 'instituicao_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbdepartamentos');
    }
};

