<?php

use Illuminate\Database\Seeder;
use App\Balance;
use App\Employee;
use App\TransactionType;
class BalancesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$dummy1 = Employee::where('name','00001')->first();
    	$frame = TransactionType::where('name','Frame')->first();

        $balanceDummy1 = new Balance();
        $balanceDummy1->employee_id=$dummy1->id;
        $balanceDummy1->transaction_type_id=$frame->id;
        $balanceDummy1->limit=400000;
        $balanceDummy1->used=0;
        $balanceDummy1->value=400000;
        $balanceDummy1->adjustment=0;
        $balanceDummy1->save();
    }
}
