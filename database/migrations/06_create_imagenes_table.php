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
        Schema::create('imagenes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->unsignedBigInteger('muestra_id');
            $table->foreign('muestra_id')
                ->references('id')
                ->on('muestras')
                ->unUpdate('cascade')
                ->onDelete('cascade');

            $table->string('ruta'); // Rellenable
            $table->string('zoom'); // Autorrellenable
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('imagenes');
    }
};
