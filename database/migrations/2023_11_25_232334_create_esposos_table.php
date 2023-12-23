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
        Schema::create('esposos', function (Blueprint $table) {

            $table->id();

            $table->string(column: 'husCedula', length:10)->unique();
            $table->string(column: 'husNombre',length:80);
            $table->string(column: 'husApellido',length:80);
            $table->string(column: 'husEmail',length:255)->unique();
            $table->string(column: 'husTelefono',length:15)->nullable();
            $table->string(column: 'husDireccion',length:250)->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('esposos');
    }
};
