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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            //Se añaden los campos faltantes
                $table->string('name');
                $table->text('body');
                $table->unsignedBigInteger('user_id')->nullable(); //Esto es para que no se borren los registros por completo
                    $table->foreign('user_id')->references('id')->on('users')
                        ->onDelete('set null'); //Si se indica "set null" es para que si se ELIMINA no se borren sus post...
                        //->onUpdate('cascade'); //Si se indica "cascade" es para que si se MODIFICA uno tambien se borreo el otro
                $table->unsignedBigInteger('categoria_id')->nullable();
                    $table->foreign('categoria_id')->references('id')->on('categorias')
                        ->onDelete('set null'); //Si se indica "set null" es para que si se ELIMINA no se borren sus post...
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
