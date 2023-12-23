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
        Schema::create('padrinos', function (Blueprint $table) {

            $table->id();

            $table->string(column: 'padrCedula', length:10)->unique();
            $table->string(column: 'padrNombre',length:80);
            $table->string(column: 'padrApellido',length:80);
            $table->string(column: 'padrTelefono',length:15)->nullable();
            $table->string(column: 'padrDireccion',length:250)->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('padrinos');
    }
};
