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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('days')->nullable();
            $table->text('address')->nullable();
            $table->text('description')->nullable();
            $table->text('event_image')->nullable();
            $table->dateTime('start_datetime')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->dateTime('end_datetime')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->text('cost')->nullable();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->text('website_url')->nullable();
            $table->string('name')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->text('organizer_website_url')->nullable();
            $table->text('venue')->nullable();
            $table->text('google_map_url')->nullable();
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
};
