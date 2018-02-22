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

class WeddingController extends Controller
{
    public function index(){
    	return view('user.self_service.wedding');
    }
	public function store(){
		$settingWedding = SettingRequest::
        join('transaction_categories','category_id','=','transaction_categories.id')
        ->where('transaction_categories.name','Wedding')->first();

        $wedding = TransactionCategory::where('name','Wedding')->first();
        $weddingtype = TransactionType::where('name','Wedding')->first();

    	// Create Request
		$request = new \App\Request();
        $request->status='Waiting for Approval';
        $request->save();
        $isFirst=true;
        foreach($settingWedding->details as $setting){
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

        
        //create claim
        $tr_date = Carbon::now();
        $noUrut = Claim::where('transaction_date',$tr_date->format('Y-m-d'))->count();
        $noUrut++;
        $invNoUrut = str_pad($noUrut, 3, '0', STR_PAD_LEFT);
        $claim = new Claim();
        $claim->employee_id=auth()->user()->employee->id;
        $claim->request_id=$request->id;
        $claim->transaction_category_id = $wedding->id;
        $claim->name='BN/'.$tr_date->format('Ymd').'/'.$invNoUrut;
        $claim->transaction_date= $tr_date;
        $claim->total_value=0;
        $claim->info='Claim Benefit';
        $claim->description='Wedding Donation';
        $claim->save();

        $claimdetail = new ClaimDetail();
        $claimdetail->transaction_type_id=$weddingtype->id;
        $claimdetail->claim_id=$claim->id;
        $claimdetail->value=0;
        $claimdetail->save();
        return redirect()->intended(route('request.list'));    		
	}
	    		    	
}
