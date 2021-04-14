<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartnerpaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partnerpayments', function (Blueprint $table) {
            $table->id();
            $table->string('partner');
            $table->string('payment');
            $table->string('user');
            $table->string('free1');
            $table->string('free2');
            $table->string('free3');
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
        Schema::dropIfExists('partnerpayments');
    }
}
