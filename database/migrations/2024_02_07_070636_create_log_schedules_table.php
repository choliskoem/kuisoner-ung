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
        Schema::create('log_schedules', function (Blueprint $table) {
            $table->uuid('id_log_schedule')->primary();
            $table->uuid('id_schedule');
            $table->foreign('id_schedule')->references('id_schedule')->on('schedules')->onUpdate('cascade')->onDelete('restrict');
            $table->dateTime('tmt', $precision = 0);
            $table->dateTime('tst', $precision = 0);
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('log_schedules');
    }
};
