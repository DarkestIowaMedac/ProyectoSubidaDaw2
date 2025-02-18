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
        Schema::create('muestras', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->unUpdate('cascade')
                  ->onDelete('cascade');

            $table->unsignedBigInteger('sede_id');
            $table->foreign('sede_id')
                ->references('id')
                ->on('sedes')
                ->unUpdate('cascade')
                ->onDelete('cascade');

            $table->unsignedBigInteger('formato_id');
            $table->foreign('formato_id')
                ->references('id')
                ->on('formatos')
                ->unUpdate('cascade')
                ->onDelete('cascade');

            $table->unsignedBigInteger('naturaleza_id');
            $table->foreign('naturaleza_id')
                ->references('id')
                ->on('naturalezas')
                ->unUpdate('cascade')
                ->onDelete('cascade');

            $table->string('codigo');
            $table->date('fecha');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('muestras');
    }
};
