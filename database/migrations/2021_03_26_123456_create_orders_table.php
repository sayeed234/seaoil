<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('billing');
            $table->string('billno');
            $table->string('pid');
            $table->string('pname');
            $table->string('qty');
            $table->string('rate');
            $table->string('total');
            $table->string('type');
            $table->string('comments');
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
        Schema::dropIfExists('orders');
    }
}
