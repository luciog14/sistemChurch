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
        Schema::create('confirmaciones', function (Blueprint $table) {
            $table->id();

            $table->string('confCedula')->unique();
            $table->string('confNombre', 80);
            $table->string('confApellido', 80);

            $table->unsignedBigInteger('confPadreId')->nullable();
            $table->unsignedBigInteger('confMadreId')->nullable();
            $table->unsignedBigInteger('confPadrinoId')->nullable();
            $table->unsignedBigInteger('confMadrinaId')->nullable();
            $table->unsignedBigInteger('confParrocoId')->nullable();

            $table->string('confFechaRegistro',25);
            $table->string('confRegistroEclesiastico',25);

            $table->timestamps();

            $table->foreign('confPadreId')->references('id')->on('padres')->onDelete('restrict');
            $table->foreign('confMadreId')->references('id')->on('madres')->onDelete('restrict');
            $table->foreign('confPadrinoId')->references('id')->on('padrinos')->onDelete('restrict');
            $table->foreign('confMadrinaId')->references('id')->on('madrinas')->onDelete('restrict');
            $table->foreign('confParrocoId')->references('id')->on('parrocos')->onDelete('restrict');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('confirmaciones');
    }
};
