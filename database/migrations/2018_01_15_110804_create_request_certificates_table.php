<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequestCertificatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request_certificates', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('certificate_id');
            $table->integer('claim_id');
            $table->string('no');
            $table->string('name');
            $table->string('type');
            $table->string('year');
            $table->string('principle');
            $table->string('description');
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
        Schema::dropIfExists('request_certificates');
    }
}
