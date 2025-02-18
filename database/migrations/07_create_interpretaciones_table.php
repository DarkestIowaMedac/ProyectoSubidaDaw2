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
        Schema::create('interpretaciones', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            // Clave foránea muestra_id
            $table->unsignedBigInteger('muestra_id');
            $table->foreign('muestra_id')
                ->references('id')
                ->on('muestras')
                ->onUpdate('cascade') // Actualiza automáticamente si el ID cambia
                ->onDelete('cascade'); // Elimina las interpretaciones si la muestra es eliminada

            $table->text('texto'); // Rellenable
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('interpretaciones');
    }
};