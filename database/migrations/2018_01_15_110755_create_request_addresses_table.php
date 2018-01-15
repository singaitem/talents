<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequestAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request_addresses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('address_id');
            $table->integer('claim_id');
            $table->string('name');
            $table->integer('homebase_id');
            $table->string('district');
            $table->string('subdistrict');
            $table->string('rt');
            $table->string('rw');
            $table->string('stay_status');
            $table->string('zip_code');
            $table->boolean('primary_address')->default(false);
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
        Schema::dropIfExists('request_addresses');
    }
}
