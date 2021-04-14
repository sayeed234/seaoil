<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyexpensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companyexpenses', function (Blueprint $table) {
            $table->id();
            $table->string('user');
            $table->string('type');
            $table->string('qty');
            $table->string('rate');
            $table->string('total');
            $table->string('free1');
            $table->string('free2');
            $table->string('free3');
            $table->string('free4');
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
        Schema::dropIfExists('companyexpenses');
    }
}
