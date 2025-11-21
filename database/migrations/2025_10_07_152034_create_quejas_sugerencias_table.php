<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('quejas_sugerencias', function (Blueprint $table) {
            $table->id();
            $table->char('periodo',5)->nullable();
            $table->string('no_de_control',10)->nullable();
            $table->text('mensaje')->nullable();
            $table->dateTime('fecha')->nullable(); 
            $table->integer('no')->nullable(); 
            $table->string('titulo',255)->nullable(); 
            $table->char('clave_area',6)->nullable(); 
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('quejas_sugerencias');
    }
};