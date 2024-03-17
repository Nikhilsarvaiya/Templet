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
        Schema::create('pooja_creations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pooja_id')->nullable();
            $table->string('pooja_name')->nullable();
            $table->text('pooja_desc')->nullable();
            $table->text('samagri_list')->nullable();
            $table->date('date')->nullable();
            $table->string('morning_start_time')->nullable();
            $table->string('morning_end_time')->nullable();
            $table->string('evening_start_time')->nullable();
            $table->string('evening_end_time')->nullable();
            $table->tinyInteger('morning_blocked')->nullable()->default(0)->comment('0=not,1=checked');
            $table->tinyInteger('evening_blocked')->nullable()->default(0)->comment('0=not,1=checked');


            $table->foreign('pooja_id')->references('id')->on('pooja_masters')->cascadeOnDelete();
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
        Schema::dropIfExists('pooja_creations');
    }
};
