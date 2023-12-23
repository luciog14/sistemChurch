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
        Schema::create('padres', function (Blueprint $table) {

            $table->id();

            $table->string(column: 'padCedPas', length:10)->unique();
            $table->string(column: 'padNombre',length:80);
            $table->string(column: 'padApellido',length:80);
            $table->string(column: 'padEmail',length:255)->unique();
            $table->string(column: 'padTelefono',length:15)->nullable();
            $table->string(column: 'padDireccion',length:250)->nullable();
            $table->string(column: 'padNacionalidad',length:100);


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('padres');
    }
};
