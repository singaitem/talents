<?php

use Illuminate\Database\Seeder;
use App\Balance;
use App\Employee;
use App\TransactionType;
use App\BalanceDetail;
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
        $lensa = TransactionType::where('name','like','%Lensa%')->get();
        $balanceDummy1 = new Balance();
        $balanceDummy1->employee_id=$dummy1->id;
        $balanceDummy1->transaction_category_id=$frame->category->id;
        $balanceDummy1->save();
        $balanceDetail1 = new BalanceDetail();
        $balanceDetail1->balance_id=$balanceDummy1->id;
        $balanceDetail1->transaction_type_id=$frame->id;
        $balanceDetail1->limit=400000;
        $balanceDetail1->used=0; 
        $balanceDetail1->value=400000;
        $balanceDetail1->adjustment=0;
        $balanceDetail1->save();
        $balLimit=175000;
        foreach($lensa as $lens){
            $balanceDetailLoop = new BalanceDetail();
            $balanceDetailLoop->balance_id=$balanceDummy1->id;
            $balanceDetailLoop->transaction_type_id=$lens->id;
            $balanceDetailLoop->limit=$balLimit;
            $balanceDetailLoop->used=0;
            $balanceDetailLoop->value=$balLimit;
            $balanceDetailLoop->adjustment=0;
            $balanceDetailLoop->save();
            $balLimit+=25000;
        }   
    }
}
