<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\TransactionCategory;
use App\Balance;
use App\SettingRequest;
use App\RequestDetail;
use Carbon\Carbon;
use App\Claim;
use App\ClaimAttachment;
use App\TransactionType;
use App\ClaimDetail;    



class BusinessTravelController extends Controller
{
    public function index(){
    	return view('user.self_service.business-travel');
    }
    public function store(){
    	$settingBusinessTravel = SettingRequest::
        join('transaction_categories','category_id','=','transaction_categories.id')
        ->where('transaction_categories.name','Business Travel')->first();
        $businessTravel = TransactionCategory::where('name','Business Travel')->first();

        // Create Request
		$request = new \App\Request();
        $request->status='Waiting for Approval';
        $request->save();
        $isFirst=true;
        foreach($settingBusinessTravel->details as $setting){
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
        //get total value
        $requestValue = request("ticket")+request("taxi")+request("transport")+request("hotel")+request("rental")+request("mileage")+request("uang_makan")+request("uang_saku")+request("laundry")+request("tpb")+request("other");

        //create claim
        $tr_date = Carbon::now();
        $noUrut = Claim::where('transaction_date',$tr_date->format('Y-m-d'))->count();
        $noUrut++;
        $invNoUrut = str_pad($noUrut, 3, '0', STR_PAD_LEFT);
        $claim = new Claim();
        $claim->employee_id=auth()->user()->employee->id;
        $claim->request_id=$request->id;
        $claim->transaction_category_id = $businessTravel->id;
        $claim->name='BN/'.$tr_date->format('Ymd').'/'.$invNoUrut;
        $claim->transaction_date= $tr_date;
        $claim->total_value=$requestValue;
        $claim->info=request("spd_type");
        $claim->description=request("remark");
        $claim->save();
        if (request()->hasFile('image1')) {
            $photoName = time().'.'.request()->file('image1')->getClientOriginalExtension();
            request()->file('image1')->move(public_path('img/upload/'), $photoName);
            $claimAttachment = new ClaimAttachment();
            $claimAttachment->claim_id=$claim->id;
            $claimAttachment->name=$photoName;
            $claimAttachment->save();
        }
        if (request()->hasFile('image2')) {
            $photoName = time().'.'.request()->file('image2')->getClientOriginalExtension();
            request()->file('image2')->move(public_path('img/upload/'), $photoName);
            $claimAttachment = new ClaimAttachment();
            $claimAttachment->claim_id=$claim->id;
            $claimAttachment->name=$photoName;
            $claimAttachment->save();
        }
        if (request()->hasFile('image3')) {
            $photoName = time().'.'.request()->file('image3')->getClientOriginalExtension();
            request()->file('image3')->move(public_path('img/upload/'), $photoName);
            $claimAttachment = new ClaimAttachment();
            $claimAttachment->claim_id=$claim->id;
            $claimAttachment->name=$photoName;
            $claimAttachment->save();
        }
        $ticket = TransactionType::where('name','Ticket')->first();
        $taxi = TransactionType::where('name','Taxi')->first();
        $transport = TransactionType::where('name','Transport')->first();
        $hotel = TransactionType::where('name','Hotel')->first();
        $rental = TransactionType::where('name','Rental Mobil')->first();
        $mileage = TransactionType::where('name','Mileage')->first();
        $umdn = TransactionType::where('name','Uang Makan Dalam Negri')->first();
        $umln = TransactionType::where('name','Uang Makan Luar Negri')->first();
        $usdn = TransactionType::where('name','Uang Saku Dalam Negri')->first();
        $usln = TransactionType::where('name','Uang Saku Luar Negri')->first();
        $laundry = TransactionType::where('name','Laundry')->first();
        $tpb = TransactionType::where('name','Tol Parkir Bensin')->first();
        $other = TransactionType::where('name','Other')->first();

        if(request("ticket")!=null && request("ticket")!=0){
            $claimDetail = new ClaimDetail();
            $claimDetail->transaction_type_id=$ticket->id;
            $claimDetail->claim_id=$claim->id;
            $claimDetail->value=request("ticket");
            $claimDetail->save();
        }
        if(request("taxi")!=null && request("taxi")!=0){
            $claimDetail = new ClaimDetail();
            $claimDetail->transaction_type_id=$taxi->id;
            $claimDetail->claim_id=$claim->id;
            $claimDetail->value=request("taxi");
            $claimDetail->save();
        }
        if(request("transport")!=null && request("transport")!=0){
            $claimDetail = new ClaimDetail();
            $claimDetail->transaction_type_id=$transport->id;
            $claimDetail->claim_id=$transport->id;
            $claimDetail->value=request("transport");
            $claimDetail->save();
        }
        if(request("hotel")!=null && request("hotel")!=0){
            $claimDetail = new ClaimDetail();
            $claimDetail->transaction_type_id=$hotel->id;
            $claimDetail->claim_id=$claim->id;
            $claimDetail->value=request("hotel");
            $claimDetail->save();
        }
        if(request("rental")!=null && request("rental")!=0){
            $claimDetail = new ClaimDetail();
            $claimDetail->transaction_type_id=$rental->id;
            $claimDetail->claim_id=$claim->id;
            $claimDetail->value=request("rental");
            $claimDetail->save();
        }
        if(request("mileage")!=null && request("mileage")!=0){
            $claimDetail = new ClaimDetail();
            $claimDetail->transaction_type_id=$mileage->id;
            $claimDetail->claim_id=$claim->id;
            $claimDetail->value=request("mileage");
            $claimDetail->save();
        }
        if(request("uang_makan")!=null && request("uang_makan")!=0){
            $claimDetail = new ClaimDetail();
            if(request("uang_makan_type")=="umdn"){
           		$claimDetail->transaction_type_id=$umdn->id;
            }else if(request("uang_makan_type")=="umln"){
           		$claimDetail->transaction_type_id=$umln->id;
            }
            $claimDetail->claim_id=$claim->id;
            $claimDetail->value=request("uang_makan");
            $claimDetail->save();
        }
        if(request("uang_saku")!=null && request("uang_saku")!=0){
            $claimDetail = new ClaimDetail();
            if(request("uang_saku_type")=="usdn"){
           		$claimDetail->transaction_type_id=$usdn->id;
            }else if(request("uang_saku_type")=="usln"){
           		$claimDetail->transaction_type_id=$usln->id;
            }
            $claimDetail->claim_id=$claim->id;
            $claimDetail->value=request("uang_saku");
            $claimDetail->save();
        }
        if(request("laundry")!=null && request("laundry")!=0){
            $claimDetail = new ClaimDetail();
            $claimDetail->transaction_type_id=$laundry->id;
            $claimDetail->claim_id=$claim->id;
            $claimDetail->value=request("laundry");
            $claimDetail->save();
        }
        if(request("tpb")!=null && request("tpb")!=0){
			$claimDetail = new ClaimDetail();
            $claimDetail->transaction_type_id=$tpb->id;
            $claimDetail->claim_id=$claim->id;
            $claimDetail->value=request("tpb");
            $claimDetail->save();
        }
        if(request("other")!=null && request("other")!=0){
            $claimDetail = new ClaimDetail();
            $claimDetail->transaction_type_id=$other->id;
            $claimDetail->claim_id=$claim->id;
            $claimDetail->value=request("other");
            $claimDetail->save();
        }
        return redirect()->intended(route('request.list'));
    }
    	
    	
}
