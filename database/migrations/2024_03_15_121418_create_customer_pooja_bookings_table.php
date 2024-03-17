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
        Schema::create('customer_pooja_bookings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pooja_creation_id')->nullable();
            $table->date('date')->nullable();
            $table->longText('slots')->nullable();
            $table->string('customer_name')->nullable();
            $table->string('customer_number')->nullable();

            $table->foreign('pooja_creation_id')->references('id')->on('pooja_creations_slots')->cascadeOnDelete();
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
        Schema::dropIfExists('customer_pooja_bookings');
    }
};
