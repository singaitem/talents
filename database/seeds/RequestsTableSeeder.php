<?php

use Illuminate\Database\Seeder;
use App\Request;
use App\RequestDetail;
use App\Employee;
class RequestsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$dummy2 = Employee::where('name','00002')->first();
    	$dummy3 = Employee::where('name','00003')->first();

    	

        $req1 = new Request();
        $req1->status='Waiting for Approval';
        $req1->save();
        $reqdetail1 = new RequestDetail();
        $reqdetail1->request_id=$req1->id;
        $reqdetail1->request_to=$dummy2->id;
        $reqdetail1->status ='Waiting';
        $reqdetail1->save();
        $reqdetail2 = new RequestDetail();
        $reqdetail2->request_id=$req1->id;
        $reqdetail2->request_to=$dummy3->id;
        $reqdetail2->status ='Pending';
        $reqdetail2->save();

    }
}
