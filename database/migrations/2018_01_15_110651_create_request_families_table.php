<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequestFamiliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request_families', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('family_id');
            $table->integer('claim_id');
            $table->string('name');
            $table->string('relationship');
            $table->string('placeofbirth');
            $table->date('dateofbirth');
            $table->string('alive_status');
            $table->char('gender',10);
            $table->string('marital_status');
            $table->string('identity_no')->nullable();
            $table->string('family_card_no')->nullable();
            $table->string('address');
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
        Schema::dropIfExists('request_families');
    }
}
