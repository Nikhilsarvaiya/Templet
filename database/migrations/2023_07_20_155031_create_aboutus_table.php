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
        Schema::create('about_us', function (Blueprint $table) {
            $table->id();
            $table->string('aboutus_title')->nullable();
            $table->text('aboutus_description')->nullable();
            $table->text('aboutus_image')->nullable();
            $table->string('programs_title')->nullable();
            $table->text('programs_description1')->nullable();
            $table->text('programs_description2')->nullable();
            $table->text('programs_description3')->nullable();
            $table->string('ourmission_title')->nullable();
            $table->text('ourmission_description')->nullable();
            $table->string('history_title')->nullable();
            $table->text('history_description1')->nullable();
            $table->text('history_description2')->nullable();
            $table->text('history_description3')->nullable();
            $table->text('history_image')->nullable();
            $table->string('whoweare_title')->nullable();
            $table->text('whoweare_description')->nullable();
            $table->string('whatarewe_title')->nullable();
            $table->text('whatarewe_description')->nullable();
            $table->string('objectives_title')->nullable();
            $table->text('objectives_description1')->nullable();
            $table->text('objectives_description2')->nullable();
            $table->text('objectives_description3')->nullable();
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
        Schema::dropIfExists('aboutus');
    }
};
