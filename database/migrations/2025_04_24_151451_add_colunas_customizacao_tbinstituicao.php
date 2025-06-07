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
        Schema::table('tbinstituicao', function (Blueprint $table) {
            $table->boolean('customizacaoInstituicao')->default(false);
            $table->enum('notasInstituicao', ['numeral', 'conceito'])->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('institutions', function (Blueprint $table) {
            $table->dropColumn(['customizacaoInstituicao', 'notasInstituicao']);
        });
    }
};
