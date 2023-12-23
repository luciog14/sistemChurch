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
        Schema::create('esposas', function (Blueprint $table) {

            $table->id();

            $table->string(column: 'wifCedula', length:10)->unique();
            $table->string(column: 'wifNombre',length:80);
            $table->string(column: 'wifApellido',length:80);
            $table->string(column: 'wifEmail',length:255)->unique();
            $table->string(column: 'wifTelefono',length:10)->nullable();
            $table->string(column: 'wifDireccion',length:250)->nullable();
            

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('esposas');
    }
};
