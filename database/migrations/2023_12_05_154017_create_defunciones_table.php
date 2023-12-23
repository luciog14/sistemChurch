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
        Schema::create('defunciones', function (Blueprint $table) {

            $table->id();

            $table->string(column: 'defCedula',length:10)->unique();
            $table->string(column: 'defNombre', length:80);
            $table->string(column: 'defApellido',length:80);
            $table->string(column: 'defRegistro',length:120);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('defunciones');
    }
};
