<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePprofitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pprofits', function (Blueprint $table) {
            $table->id();
            $table->string('billing');
            $table->string('partner');
            $table->string('veseel');
            $table->string('imo');
            $table->string('profit');
            $table->string('user');
            $table->string('free');
            $table->string('free1');
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
        Schema::dropIfExists('pprofits');
    }
}
