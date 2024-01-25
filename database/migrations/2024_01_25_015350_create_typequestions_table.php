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
        Schema::create('typequestions', function (Blueprint $table) {
            $table->uuid('id_type_question')->primary();
            $table->uuid('id_question');
            $table->uuid('id_type');
            $table->foreign('id_question')->references('id_question')->on('questions')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('id_type')->references('id_type')->on('types')->onUpdate('cascade')->onDelete('restrict');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('typequestions');
    }
};
