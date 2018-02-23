<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\SettingRequest;
use App\RequestDetail;
use App\Balance;
use App\TransactionCategory;
use App\TransactionType;
use Carbon\Carbon;
use App\Claim;
use App\ClaimDetail;

class MedicalOverlimitController extends Controller
{
    public function index(){
    	return view('user.self_service.medicaloverlimit');
    }
    public function store(){
    	$settingMedicalOverlimit = SettingRequest::
        join('transaction_categories','category_id','=','transaction_categories.id')
        ->where('transaction_categories.name','Medical Overlimit')->select('setting_requests.*')->first();
        $medicaloverlimit = TransactionCategory::where('name','Medical Overlimit')->first();
        $medical = TransactionCategory::where('name','Medical')->first();
        $trantypeOverlimit = TransactionType::where('name','Medical Overlimit')->first();

    	// Create Request
		$request = new \App\Request();
        $request->status='Waiting for Approval';
        $request->save();
        $isFirst=true;
        foreach($settingMedicalOverlimit->details as $setting){
        	$requestdetail = new RequestDetail();
            $requestdetail->request_id=$request->id;
            //type 1 = Supervisor
            //type 2 = Position
            //type 3 = Employee No
            if($setting->type==1){
                $requestdetail->request_to=auth()->user()->employee->supervisor->id;
            }else if($setting->type==2){
                $requestdetail->request_to_position=$setting->position_id;
            }else if($setting->type==3){
                $requestdetail->request_to=$setting->employee_id;
            }
            if($isFirst==true){
                $requestdetail->status ='Waiting';
                $isFirst=false;
            }else{
                $requestdetail->status='Pending';
            }
            $requestdetail->save();
        }

        //get value detail
        $balanceMedical = Balance::where('employee_id',auth()->user()->employee->id)
        ->where('transaction_category_id',$medical->id)->first();
        $balanceMedicalDetail = $balanceMedical->findDetail('Medical');

        //create claim
        $tr_date = Carbon::now();
        $noUrut = Claim::where('transaction_date',$tr_date->format('Y-m-d'))->count();
        $noUrut++;
        $invNoUrut = str_pad($noUrut, 3, '0', STR_PAD_LEFT);
        $claim = new Claim();
        $claim->employee_id=auth()->user()->employee->id;
        $claim->request_id=$request->id;
        $claim->transaction_category_id = $medicaloverlimit->id;
        $claim->name='BN/'.$tr_date->format('Ymd').'/'.$invNoUrut;
        $claim->transaction_date= $tr_date;
        $claim->total_value=$balanceMedicalDetail->limit;
        $claim->info='Claim Benefit';
        $claim->description='Increasing Medical Limit';
        $claim->save();

        $claimdetail = new ClaimDetail();
        $claimdetail->transaction_type_id=$trantypeOverlimit->id;
        $claimdetail->claim_id=$claim->id;
        $claimdetail->value=$balanceMedicalDetail->value;
        $claimdetail->save();
        return redirect()->intended(route('request.list'));
    }
    	
    	
}
