<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('tbinstituicao', function (Blueprint $table) {
        $table->id();
        $table->string('nomeInstituicao');
        $table->string('cnpjInstituicao', 18);
        $table->string('emailInstituicao');
        $table->string('telefoneInstituicao', 20);
        $table->string('cepInstituicao', 10);
        $table->string('logradouroInstituicao');
        $table->string('numeroInstituicao', 10);
        $table->string('cidadeInstituicao');
        $table->string('ufInstituicao', 2);
        $table->string('senhaInstituicao');
        $table->timestamps(); // Adiciona created_at e updated_at
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbinstituicao');
    }
};