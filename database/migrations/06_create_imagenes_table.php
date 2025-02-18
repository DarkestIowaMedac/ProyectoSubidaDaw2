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

            // Clave foránea muestra_id
            $table->unsignedBigInteger('muestra_id');
            $table->foreign('muestra_id')
                ->references('id')
                ->on('muestras')
                ->onUpdate('cascade') // Actualiza automáticamente si el ID cambia
                ->onDelete('cascade'); // Elimina las imágenes si la muestra es eliminada

            $table->string('ruta'); // Rellenable
            $table->string('zoom'); // Autorrellenable
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()

    {
        Schema::table('imagenes', function (Blueprint $table) {
            $table->dropForeign(['muestra_id']); // Eliminar la clave foránea
        });
        Schema::dropIfExists('imagenes');
    }
};
