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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            //Se crean Campos para ejercicio del Curso
                $table->string('title', 45);
                $table->text('biografia');
                $table->string('website', 45);
                //Para agregar un PK externo se tiene que indicar claramente el MISMO tipo que el PK origen en el destino y que es ÚNICO...
                    $table->unsignedBigInteger('user_id')->unique();
                    $table->foreign('user_id')->references('id')->on('users')
                        ->onDelete('cascade') //Si se indica "cascade" es para que si se ELIMINA uno tambien se borreo el otro
                        ->onUpdate('cascade'); //Si se indica "cascade" es para que si se MODIFICA uno tambien se borreo el otro
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
