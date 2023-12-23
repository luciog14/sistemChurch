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
        Schema::create('bautizos', function (Blueprint $table) {
            $table->id();

            $table->string('bauCedula')->unique();
            $table->string('bauFechaBautismo', 25);
            $table->string('bauNombre', 80);
            $table->string('bauApellido', 80);
            $table->string('bauGenero', 20);
            $table->string('bauEstado', 20);
            $table->string('bauNacionalidad', 20);
            $table->string('bauFechaNac', 15);
            $table->string('bauLugarNac', 100);
            $table->string('bauFechaReg', 15);
            $table->string('bauLugarReg', 100);
            $table->string('bauRegCivil', 50);
            $table->string('bauRegEcles', 50);

            $table->unsignedBigInteger('bauPadreId')->nullable();
            $table->unsignedBigInteger('bauMadreId')->nullable();
            $table->unsignedBigInteger('bauPadrinoId')->nullable();
            $table->unsignedBigInteger('bauMadrinaId')->nullable();
            $table->unsignedBigInteger('bauParrocoId')->nullable();

            $table->timestamps();

            $table->foreign('bauPadreId')->references('id')->on('padres')->onDelete('restrict');
            $table->foreign('bauMadreId')->references('id')->on('madres')->onDelete('restrict');
            $table->foreign('bauPadrinoId')->references('id')->on('padrinos')->onDelete('restrict');
            $table->foreign('bauMadrinaId')->references('id')->on('madrinas')->onDelete('restrict');
            $table->foreign('bauParrocoId')->references('id')->on('parrocos')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bautizos');
    }
};
