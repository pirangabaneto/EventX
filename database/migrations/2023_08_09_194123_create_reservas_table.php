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
        Schema::create('reservas', function (Blueprint $table) {
            $table->id();
            $table->double('valor');
            $table->timestamp('horario_inicial')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('horario_final')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->boolean('tem_recepcao');
            $table->boolean('tem_coffe_break');
            $table->string('coffe_break')->default('tradicional');
            $table->integer('quantidade_recepcionistas')->default(0);

            $table->unsignedBigInteger('salao_comercial_id');
            $table->unsignedBigInteger('cliente_id');

            $table->foreign('salao_comercial_id')->references('id')->on('salaos');
            $table->foreign('cliente_id')->references('id')->on('clientes');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reserva');
    }
};
