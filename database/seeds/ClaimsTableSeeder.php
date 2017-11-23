<?php

use Illuminate\Database\Seeder;
use App\Claim;
use App\Employee;
use App\Request;
use App\TransactionCategory;
use App\ClaimAttachment;
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
        $req1 = Request::find(1);
        $kacamata = TransactionCategory::where('name','Kacamata')->first();
        $claim1 = new Claim();
        $claim1->employee_id=$dummy1->id;
        $claim1->request_id=$req1->id;
        $claim1->transaction_category_id = $kacamata->id;
        $claim1->name='BN/20171114/001';
        $claim1->transaction_date='2017-11-14';
        $claim1->total_value=200000;
        $claim1->image='image.jpg';
        $claim1->info='Claim Benefit';
        $claim1->description='On Melawai Optical Store';
        $claim1->save();

        $claimAttach1 = new ClaimAttachment();
        $claimAttach1->claim_id=$claim1->id;
        $claimAttach1->name='2-1.jpg';
        $claimAttach1->save();
        $claimAttach2 = new ClaimAttachment();
        $claimAttach2->claim_id=$claim1->id;
        $claimAttach2->name='2-2.jpg';
        $claimAttach2->save();
    }
}
