<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateYearlySalariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('yearly_salaries', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('employee_id');
            $table->integer('total_take_home_pay');
            $table->integer('total_allowance');
            $table->integer('total_deduction');
            $table->string('period');
            $table->integer('effective_month');
            $table->integer('current_month');
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
        Schema::dropIfExists('yearly_salaries');
    }
}
