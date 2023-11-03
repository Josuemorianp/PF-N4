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
        Schema::create('enlaces', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_pagina');
            $table->foreign('id_pagina')->references('id')->on('paginas')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('id_rol');
            $table->foreign('id_rol')->references('id')->on('roles')->onDelete('cascade')->onUpdate('cascade');
            $table->string('descripcion');
            $table->timestamp('usuario_creacion')->useCurrent()->nullable();
            $table->timestamp('usuario_modificacion')->useCurrent()->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enlaces');
    }
};
