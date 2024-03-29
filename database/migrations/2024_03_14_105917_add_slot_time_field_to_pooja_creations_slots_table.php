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
        Schema::table('pooja_creations_slots', function (Blueprint $table) {
            $table->string('slot_time')->nullable()->after('is_evening');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pooja_creations_slots', function (Blueprint $table) {
            //
        });
    }
};
