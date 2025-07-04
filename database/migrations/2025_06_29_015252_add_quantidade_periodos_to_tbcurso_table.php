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
        Schema::table('tbcurso', function (Blueprint $table) {
            $table->integer('periodosCurso')->nullable()->after('nivelCurso');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tbcurso', function (Blueprint $table) {
            $table->dropColumn('periodosCurso');
        });
    }
};
