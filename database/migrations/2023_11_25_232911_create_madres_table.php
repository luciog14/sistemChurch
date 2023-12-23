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
        Schema::create('madres', function (Blueprint $table) {

            $table->id();

            $table->string(column: 'madCedPas', length:10)->unique();
            $table->string(column: 'madNombre',length:80);
            $table->string(column: 'madApellido',length:80);
            $table->string(column: 'madEmail',length:255)->unique();
            $table->string(column: 'madTelefono',length:15)->nullable();
            $table->string(column: 'madDireccion',length:250)->nullable();
            $table->string(column: 'madNacionalidad',length:150);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('madres');
    }
};
