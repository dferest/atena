<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::table('convenios', function (Blueprint $table) {
            $table->boolean('cerrado')->default(false);
            $table->text('comentario_cierre')->nullable();
            $table->timestamp('cerrado_at')->nullable();
        });
    }

    public function down()
    {
        Schema::table('convenios', function (Blueprint $table) {
            $table->dropColumn(['cerrado', 'comentario_cierre', 'cerrado_at']);
        });
    }

};
