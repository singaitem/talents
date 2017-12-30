<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMonthlySalariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('monthly_salaries', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('employee_id');
            $table->integer('yearly_salary_id');
            $table->integer('take_home_pay');
            $table->integer('total_allowance');
            $table->integer('total_deduction');
            $table->date('payment_start_date');
            $table->string('period');
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
        Schema::dropIfExists('monthly_salaries');
    }
}
