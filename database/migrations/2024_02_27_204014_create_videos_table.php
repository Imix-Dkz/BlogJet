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
        Schema::create('videos', function (Blueprint $table) {
            $table->id();
            //Se añaden los campos faltantes
                $table->string('name',45);
                $table->string('descripción');
                $table->string('url', 45);
                $table->unsignedBigInteger('user_id')->nullable(); //Esto es para que no se borren los registros por completo
                    $table->foreign('user_id')->references('id')->on('users')
                        ->onDelete('set null'); //Si se indica "cascade" es para que si se ELIMINA no se borren sus post...
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('videos');
    }
};
