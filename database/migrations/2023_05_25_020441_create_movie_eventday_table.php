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
        Schema::create('movie_eventdays', function (Blueprint $table) {
            $table->id();
            $table->foreignId('movie_id')->constrained('movies');
            $table->foreignId('event_day_show_time_id')->constrained('event_day_show_times')->onDelete('cascade');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movie_eventdays');
    }
};
