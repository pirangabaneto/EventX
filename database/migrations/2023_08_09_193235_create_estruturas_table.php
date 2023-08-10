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
        Schema::create('estruturas', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->integer('quantidade');
            $table->boolean('is_adicional');
            $table->boolean('is_comum');
            $table->double('valor');
            
            $table->unsignedBigInteger('salao_comercial_id');

            $table->foreign('salao_comercial_id')->references('id')->on('salaos');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estruturas');
    }
};
