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
        Schema::create('matrimonios', function (Blueprint $table) {
            $table->id();

            $table->string('matFechaRegistro',25);
            $table->string('matRegistroEclesiastico',50);
            $table->string('matRegistroCivil',50);

            $table->unsignedBigInteger('matEsposoId')->nullable();
            $table->unsignedBigInteger('matEsposaId')->nullable();
            $table->unsignedBigInteger('matPadrinoId')->nullable();
            $table->unsignedBigInteger('matMadrinaId')->nullable();
            $table->unsignedBigInteger('matParrocoId')->nullable();

            $table->timestamps();

            $table->foreign('matEsposoId')->references('id')->on('esposos')->onDelete('restrict');
            $table->foreign('matEsposaId')->references('id')->on('esposas')->onDelete('restrict');
            $table->foreign('matPadrinoId')->references('id')->on('padrinos')->onDelete('restrict');
            $table->foreign('matMadrinaId')->references('id')->on('madrinas')->onDelete('restrict');
            $table->foreign('matParrocoId')->references('id')->on('parrocos')->onDelete('restrict');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('matrimonios');
    }
};
