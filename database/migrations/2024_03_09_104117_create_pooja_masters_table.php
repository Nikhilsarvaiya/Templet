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
        Schema::create('pooja_masters', function (Blueprint $table) {
            $table->id();
            $table->string('pooja_name')->nullable();
            $table->text('pooja_desc')->nullable();
            $table->text('samagri_list')->nullable();
            $table->text('random_id')->nullable();
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
        Schema::dropIfExists('pooja_masters');
    }
};
