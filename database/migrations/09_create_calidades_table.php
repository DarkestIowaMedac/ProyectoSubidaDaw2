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
        Schema::create('calidades', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->unsignedBigInteger('naturaleza_id');
            $table->foreign('naturaleza_id')
                ->references('id')
                ->on('naturalezas')
                ->unUpdate('cascade')
                ->onDelete('cascade');

            $table->string('codigo');
            $table->string('texto');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('calidades');
    }
};
