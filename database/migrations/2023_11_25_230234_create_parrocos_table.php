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
        Schema::create('parrocos', function (Blueprint $table) {

            $table->id();

            $table->string(column: 'parrNombre',length:80);
            $table->string(column: 'parrApellido',length:80);
            $table->string(column: 'parrParroquia',length:50);
            $table->string(column: 'parrTelefono',length:15);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parrocos');
    }
};
