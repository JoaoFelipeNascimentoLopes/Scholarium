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
            $table->string('cnpjInstituicao', 18)->unique()->change(); // Torna o CNPJ único
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tbinstituicao', function (Blueprint $table) {
            $table->string('cnpjInstituicao', 18)->unique(false)->change();
        });
    }
};
