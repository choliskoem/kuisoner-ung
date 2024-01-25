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
        Schema::create('type_options', function (Blueprint $table) {
            $table->uuid('id_type_option')->primary();
            $table->uuid('id_type');
            $table->uuid('id_option');
            $table->foreign('id_type')->references('id_type')->on('types')->onDelete('cascade');
            $table->foreign('id_option')->references('id_option')->on('options')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('type_options');
    }
};
