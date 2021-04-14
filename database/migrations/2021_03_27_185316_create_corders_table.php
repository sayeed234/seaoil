<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCordersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('corders', function (Blueprint $table) {
            $table->id();
            $table->string('invoice');
            $table->string('customer');
            $table->string('total');
            $table->string('payment');
            $table->string('qty');
            $table->string('user');
            $table->string('free1');
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
        Schema::dropIfExists('corders');
    }
}
