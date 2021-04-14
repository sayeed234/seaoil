<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parties', function (Blueprint $table) {
            $table->id();
            $table->string('pid');
            $table->string('name');
            $table->string('mobile');
            $table->string('email');
            $table->string('nid');
            $table->string('address');
            $table->string('bank');
            $table->string('acc');
            $table->string('gender');
            $table->string('image');
            $table->string('free');
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
        Schema::dropIfExists('parties');
    }
}
