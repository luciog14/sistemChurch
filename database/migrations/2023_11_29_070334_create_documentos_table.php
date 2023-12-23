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
        Schema::create('documentos', function (Blueprint $table) {

            $table->id();

            $table->string(column: 'docNumero',)->unique();
            $table->date(column: 'docFechEmision',);
            $table->string(column: 'docRemit',length:80);
            $table->string(column: 'docDest',length:80);
            $table->string(column: 'docAsunto',length:100);
            $table->text(column: 'docEscan')->nullable();
            $table->string(column:'docLibro',length:50);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documentos');
    }
};
