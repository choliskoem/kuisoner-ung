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
        Schema::create('schedule_questions', function (Blueprint $table) {
            $table->uuid('id_question');
            $table->uuid('id_log_schedule');
            $table->foreign('id_question')->references('id_question')->on('questions')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('id_log_schedule')->references('id_log_schedule')->on('log_schedules')->onUpdate('cascade')->onDelete('restrict');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schedule_questions');
    }
};
