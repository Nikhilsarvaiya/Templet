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
        Schema::create('panditji_availabilities', function (Blueprint $table) {
            $table->id();
            $table->date('date')->nullable();
            $table->tinyInteger('morning')->nullable()->default(0)->comment('0=not,1=checked');
            $table->tinyInteger('evening')->nullable()->default(0)->comment('0=not,1=checked');
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
        Schema::dropIfExists('panditji_availabilities');
    }
};
