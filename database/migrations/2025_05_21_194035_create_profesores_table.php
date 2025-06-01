<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('profesores', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('ape1');
            $table->string('ape2')->nullable();
            $table->string('email')->unique();
            $table->string('telefono');
            $table->string('direccion')->nullable();
            $table->string('ciudad')->nullable();
            $table->date('fecha_nacimiento');
            $table->string('dni')->unique();
            $table->string('titulacion')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('profesores');
    }
};
