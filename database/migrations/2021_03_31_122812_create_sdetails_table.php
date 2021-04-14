<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSdetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sdetails', function (Blueprint $table) {
            $table->id();
            $table->string('sorder');
            $table->string('name');
            $table->string('qty');
            $table->string('rate');
            $table->string('total');
            $table->string('unit');
            $table->string('free');
            $table->string('free2');
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
        Schema::dropIfExists('sdetails');
    }
}
