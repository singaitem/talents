<?php

use Illuminate\Database\Seeder;
use App\Claim;
use App\ClaimDetail;
use App\TransactionType;
class ClaimDetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $frame = TransactionType::where('name','Frame')->first();
        //$dummy1 = App\Employee::where('name','00001')->first()->claims;
        $claim1 = Claim::where('transaction_date','2017-11-14')->first();
        $dt1 = new ClaimDetail();
        $dt1->transaction_type_id=$frame->id;
        $dt1->claim_id=$claim1->id;
        $dt1->value=200000;
        $dt1->save();


        $spdAdvance = TransactionType::where('name','Regular')->first();
        $claim1 = Claim::find(2);
        $dt1 = new ClaimDetail();
        $dt1->transaction_type_id=$spdAdvance->id;
        $dt1->claim_id=$claim1->id;
        $dt1->value=200000;
        $dt1->save();
    }
}
