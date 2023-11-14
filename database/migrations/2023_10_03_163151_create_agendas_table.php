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
        Schema::create('agendas', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('profissional_id')->nullable(false);
            $table->bigInteger('cliente_id')->nullabe(true);
            $table->bigInteger('servico_id')->nullabe(true);
            $table->dateTime('data_hora')->nullabe(false);
            $table->string('tipo_pagamento', 20)->nullabe(true);
            $table->string('valor')->nullabe(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agendas');
    }
};
