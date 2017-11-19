<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBalanceDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('balance_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('balance_id');
            $table->integer('transaction_type_id');
            $table->integer('limit');
            $table->integer('used');
            $table->integer('value');
            $table->integer('adjustment');
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->dateTime('last_claim_date')->nullable();
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
        Schema::dropIfExists('balance_details');
    }
}
