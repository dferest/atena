<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->foreignId('profesor_id')->nullable()->constrained('profesores')->onDelete('set null');
            $table->foreignId('empresa_id')->nullable()->constrained('empresas')->onDelete('set null');
            $table->foreignId('alumno_id')->nullable()->constrained('alumnos')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['profesor_id']);
            $table->dropForeign(['empresa_id']);
            $table->dropForeign(['alumno_id']);
            $table->dropColumn(['profesor_id', 'empresa_id', 'alumno_id']);
        });
    }
};
