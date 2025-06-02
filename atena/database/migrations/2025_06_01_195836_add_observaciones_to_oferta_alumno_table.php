<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('oferta_alumno', function (Blueprint $table) {
            $table->string('observaciones', 100)->nullable();
        });
    }
    public function down()
    {
        Schema::table('oferta_alumno', function (Blueprint $table) {
            $table->dropColumn('observaciones');
        });
    }
};
