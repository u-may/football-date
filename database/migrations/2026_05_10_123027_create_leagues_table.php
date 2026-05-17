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
    Schema::create('leagues', function (Blueprint $table) {
        $table->id();
        $table->string('name');        // nama liga
        $table->string('logo')->nullable(); // logo liga (opsional)
        $table->string('country');     // negara
        $table->timestamps();
    });
}

public function down()
{
    Schema::dropIfExists('leagues');
}
};
