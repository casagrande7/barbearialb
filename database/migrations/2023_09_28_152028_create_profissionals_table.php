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
        Schema::create('profissionals', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 120)->nullable(false);
            $table->string('celular', 11)->nullabe(false);
            $table->string('email', 120)->nullabe(false);
            $table->string('cpf', 11)->nullabe(false);
            $table->date('dataNascimento')->nullabe(false);
            $table->string('cidade', 120)->nullabe(false);
            $table->string('estado', 2)->nullabe(false);
            $table->string('pais', 80)->nullabe(false);
            $table->string('rua', 120)->nullabe(false);
            $table->string('numero', 10)->nullabe(false);
            $table->string('bairro', 100)->nullabe(false);
            $table->string('cep', 8)->nullabe(false);
            $table->string('complemento', 150)->nullable(true);
            $table->string('senha')->nullabe(false);
            $table->decimal('salario')->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profissionals');
    }
};
