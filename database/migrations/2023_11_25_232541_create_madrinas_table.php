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
        Schema::create('madrinas', function (Blueprint $table) {
            
            $table->id();

            $table->string(column: 'madrCedula', length:10)->unique();
            $table->string(column: 'madrNombre',length:80);
            $table->string(column: 'madrApellido',length:80);
            $table->string(column: 'madrTelefono',length:15)->nullable();
            $table->string(column: 'madrDireccion',length:250)->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('madrinas');
    }
};
