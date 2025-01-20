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
        Schema::create('animals', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('especie')->unique(); // Clave unica para especie
            $table->string('slug')->unique(); // Clave unica para slug
            $table->decimal('peso', 6, 1); // Decimal por que double no acepta parametros (6 digitos y 1 de precision)
            $table->decimal('altura',6,1); // Decimal por que double no acepta parametros (6 digitos y 1 de precision)
            $table->date('fechaNacimiento'); // Fecha de nacimiento
            $table->string('imagen')->nullable(); // Puede ser null
            $table->string('alimentacion',20)->nullable(); // Longitud maxima 20 y puede ser null
            $table->longText('descripcion')->nullable(); // Puede ser null
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('animals');
    }
};
