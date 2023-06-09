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
        Schema::create('event_day_show_times', function (Blueprint $table) {
            $table->id();
            $table->foreignId('event_day_id')->constrained('event_days')->onDelete('cascade');
            $table->foreignId('show_time_id')->constrained('show_times')->onDelete('cascade');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('event_day_show_times');
    }
};
