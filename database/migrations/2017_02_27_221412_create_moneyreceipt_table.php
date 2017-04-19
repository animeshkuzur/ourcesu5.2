<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMoneyreceiptTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('moneyreceipt', function (Blueprint $table) {
            $table->increments('id');
            $table->string('series');
            $table->string('serial');
            $table->date('date');
            /*Amount always in paisa. No float*/ 
            $table->integer('amount');
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
        Schema::drop('moneyreceipt');
    }
}
