<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('programs_details', function (Blueprint $table) {
            $table->id();
            $table->text('morning_title')->nullable();
            $table->text('morning_start_time')->nullable();
            $table->text('morning_end_time')->nullable();
            $table->text('evening_title')->nullable();
            $table->text('evening_start_time')->nullable();
            $table->text('evening_end_time')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('programs_details');
    }
};
