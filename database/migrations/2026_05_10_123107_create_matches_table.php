<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up()
{
    Schema::create('matches', function (Blueprint $table) {
        $table->id();
        $table->foreignId('league_id')->constrained()->onDelete('cascade');
        $table->foreignId('home_team_id')->constrained('teams')->onDelete('cascade');
        $table->foreignId('away_team_id')->constrained('teams')->onDelete('cascade');
        $table->date('match_date');     // tanggal pertandingan
        $table->time('match_time');     // jam pertandingan
        $table->string('venue')->nullable();  // stadion
        $table->enum('status', ['upcoming', 'live', 'finished'])->default('upcoming');
        $table->integer('home_score')->nullable();  // skor tim kandang
        $table->integer('away_score')->nullable();  // skor tim tamu
        $table->timestamps();
    });
}

public function down()
{
    Schema::dropIfExists('matches');
}
};
