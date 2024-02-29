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
        Schema::create('permiso_role', function (Blueprint $table) {
            $table->id();
            #Se crean los campos necesarios
                $table->unsignedBigInteger('permiso_id');
                $table->unsignedBigInteger('role_id');
                $table->foreign('permiso_id')->references('id')->on('permisos')->onDelete('cascade');
                $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('permiso_role');
    }
};
