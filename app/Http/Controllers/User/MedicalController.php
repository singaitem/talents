<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\TransactionCategory;
use App\TransactionType;
use App\Balance;
use App\SettingRequest;
use App\Claim;
use App\ClaimDetail;
use Carbon\Carbon;
use App\ClaimAttachment;
use App\RequestDetail;

class MedicalController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
    	$transaction_categories = TransactionCategory::where('name','Medical')->first();
        $balance = Balance::where('employee_id',auth()->user()->employee->id)
        ->where('transaction_category_id',$transaction_categories->id)->first();
    	return view('user.self_service.medical',compact('transaction_categories','balance'));
    }
    public function store(){
    	$settingMedical = SettingRequest::
        join('transaction_categories','category_id','=','transaction_categories.id')
        ->where('transaction_categories.name','Medical')->select('setting_requests.*')->first();
        $medical = TransactionCategory::where('name','Medical')->first();
        $dokter = TransactionType::where('name','Dokter')->first();
        $apotik = TransactionType::where('name','Apotik')->first();

        // Create Request
		$request = new \App\Request();
        $request->status='Waiting for Approval';
        $request->save();
        $isFirst=true;
        foreach($settingMedical->details as $setting){
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

        $balanceMedical = Balance::where('employee_id',auth()->user()->employee->id)
        ->where('transaction_category_id',$medical->id)->first();
        $balanceMedicalDetail = $balanceMedical->findDetail('Medical');


        //get value detail
        $valueDokter=0;
        $valueApotik=0;
        $totalRequest = request('dokter')+request('apotik');
        if($totalRequest>$balanceMedicalDetail->value+$balanceMedicalDetail->adjustment){
        	if(request('dokter')>$balanceMedicalDetail->value){
	        	$valueDokter=$balanceMedicalDetail->value;
	        }else{
	        	$valueDokter = request('dokter');
	        	$valueApotik = $balanceMedicalDetail->value - request('dokter');
	        }	
        }else{
        	$valueDokter = request('dokter');
        	$valueApotik = request('apotik');
        }

        //create claim
        $tr_date = Carbon::createFromFormat('d/m/Y', request('transaction_date'));
        $noUrut = Claim::where('transaction_date',$tr_date->format('Y-m-d'))->count();
        $noUrut++;
        $invNoUrut = str_pad($noUrut, 3, '0', STR_PAD_LEFT);
        $claim = new Claim();
        $claim->employee_id=auth()->user()->employee->id;
        $claim->request_id=$request->id;
        $claim->transaction_category_id = $medical->id;
        $claim->name='BN/'.$tr_date->format('Ymd').'/'.$invNoUrut;
        $claim->transaction_date= $tr_date;
        $claim->total_value=$valueDokter+$valueApotik;
        $claim->info='Claim Benefit';
        $claim->description='On '.request('name');
        $claim->save();
        if (request()->hasFile('image1')) {
            $photoName = time().'-'.request()->file('image1')->getClientOriginalName().'.'.request()->file('image1')->getClientOriginalExtension();
            request()->file('image1')->move(public_path('img/upload/'), $photoName);
            $claimAttachment = new ClaimAttachment();
            $claimAttachment->claim_id=$claim->id;
            $claimAttachment->name=$photoName;
            $claimAttachment->save();
        }
        if (request()->hasFile('image2')) {
            $photoName = time().'-'.request()->file('image2')->getClientOriginalName().'.'.request()->file('image2')->getClientOriginalExtension();
            request()->file('image2')->move(public_path('img/upload/'), $photoName);
            $claimAttachment = new ClaimAttachment();
            $claimAttachment->claim_id=$claim->id;
            $claimAttachment->name=$photoName;
            $claimAttachment->save();
        }
        if (request()->hasFile('image3')) {
            $photoName = time().'-'.request()->file('image3')->getClientOriginalName().'.'.request()->file('image3')->getClientOriginalExtension();
            request()->file('image3')->move(public_path('img/upload/'), $photoName);
            $claimAttachment = new ClaimAttachment();
            $claimAttachment->claim_id=$claim->id;
            $claimAttachment->name=$photoName;
            $claimAttachment->save();
        }
        if($valueDokter!=0){
            $claimdokter = new ClaimDetail();
            $claimdokter->transaction_type_id=$dokter->id;
            $claimdokter->claim_id=$claim->id;
            $claimdokter->value=$valueDokter;
            $claimdokter->save();
        }
        if($valueApotik!=0){
            $claimapotik = new ClaimDetail();
            $claimapotik->transaction_type_id=$apotik->id;
            $claimapotik->claim_id=$claim->id;
            $claimapotik->value=$valueApotik;
            $claimapotik->save();
        }
        return redirect()->intended(route('request.list'));




    }
    	
    	
}
