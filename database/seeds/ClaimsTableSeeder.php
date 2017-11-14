<?php

use Illuminate\Database\Seeder;
use App\Claim;
use App\Employee;
class ClaimsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$dummy1 = Employee::where('name','00001')->first();

        $claim1 = new Claim();
        $claim1->employee_id=$dummy1->id;
        $claim1->transaction_date='2017-11-14';
        $claim1->save();

    }
}
