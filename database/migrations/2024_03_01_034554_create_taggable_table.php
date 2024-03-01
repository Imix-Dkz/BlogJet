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
        Schema::create('taggable', function (Blueprint $table) {
            //$table->id();
            #Se añaden las columnas necesarias
                $table->unsignedBigInteger('taggable_id');
                $table->string('taggable_type');
                $table->unsignedBigInteger('tag_id');
                    $table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('taggable');
    }
};
