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
        Schema::create('animal_cuidador', function (Blueprint $table) {
            $table->foreignId('animal_id')->constrained('animals')->onDelete('cascade');
            $table->foreignId('cuidador_id')->constrained('cuidadores')->onDelete('cascade');
            $table->primary(['cuidador_id','animal_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('animal_cuidador');
    }
};
