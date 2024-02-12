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
        Schema::create('corenspondens', function (Blueprint $table) {
            $table->uuid('id_question');
            $table->uuid('id_option');
            $table->bigIncrements('id');

            $table->foreign('id_question')->references('id_question')->on('questions')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('id_option')->references('id_option')->on('options')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('id')->references('id')->on('users')->onUpdate('cascade')->onDelete('restrict');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('corenspondens');
    }
};
