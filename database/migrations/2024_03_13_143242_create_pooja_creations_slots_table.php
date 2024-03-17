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
        Schema::create('pooja_creations_slots', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pooja_create_id')->nullable();
            $table->string('morning_start_time')->nullable();
            $table->string('morning_end_time')->nullable();
            $table->string('evening_start_time')->nullable();
            $table->string('evening_end_time')->nullable();
            $table->tinyInteger('is_morning')->nullable()->default(0)->comment('0=not,1=checked');
            $table->tinyInteger('is_evening')->nullable()->default(0)->comment('0=not,1=checked');
            $table->string('start_time')->nullable();
            $table->string('end_time')->nullable();

            $table->foreign('pooja_create_id')->references('id')->on('pooja_creations')->cascadeOnDelete();
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
        Schema::dropIfExists('pooja_creations_slots');
    }
};
