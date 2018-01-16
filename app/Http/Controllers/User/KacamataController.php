<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\TransactionCategory;
use App\TransactionType;
use App\RequestDetail;
use App\Claim;
use App\ClaimDetail;
use App\Balance;
use App\SettingRequest;
use App\Employee;
use App\Position;
use Carbon\Carbon;
use App\ClaimAttachment;
class KacamataController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $kacamata = TransactionCategory::where('name','Kacamata')->first();
        $balanceKacamata = Balance::where('employee_id',auth()->user()->employee->id)
        ->where('transaction_category_id',$kacamata->id)->first();
    	return view('user.self_service.kacamata',['transaction_categories'=>$kacamata,'balance'=>$balanceKacamata]);
    }
    public function store(){
        
    	$settingKacamata = SettingRequest::
        join('transaction_categories','category_id','=','transaction_categories.id')
        ->where('transaction_categories.name','Kacamata')->first();
        $kacamata = TransactionCategory::where('name','Kacamata')->first();


        $request = new \App\Request();
        $request->status='Waiting for Approval';
        $request->save();
        $isFirst=true;
        foreach($settingKacamata->details as $setting){
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

        $balanceKacamata = Balance::where('employee_id',auth()->user()->employee->id)
        ->where('transaction_category_id',$kacamata->id)->first();
        $balanceFrame = $balanceKacamata->findDetail('Frame');
        $balanceLensa = $balanceKacamata->findDetail(request('selected_type'));

        $valueFrame = 0;
        $valueLensa = 0;

        if(request('frame')<$balanceFrame->value){
            $valueFrame=request('frame');
        }else{
            $valueFrame=$balanceFrame->value;
        }
        if(request('lensa')<$balanceLensa->value){
            $valueLensa=request('lensa');
        }else{
            $valueLensa=$balanceLensa->value;
        }
        $tr_date = Carbon::createFromFormat('d/m/Y', request('transaction_date'));
        $noUrut = Claim::where('transaction_date',$tr_date->format('Y-m-d'))->count();
        $noUrut++;
        $invNoUrut = str_pad($noUrut, 3, '0', STR_PAD_LEFT);
        $claim = new Claim();
        $claim->employee_id=auth()->user()->employee->id;
        $claim->request_id=$request->id;
        $claim->transaction_category_id = $kacamata->id;
        $claim->name='BN/'.$tr_date->format('Ymd').'/'.$invNoUrut;
        $claim->transaction_date= $tr_date;
        $claim->total_value=$valueFrame+$valueLensa;
        $claim->info='Claim Benefit';
        $claim->description='On '.request('optical_store').' Optical Store';
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
        if($valueFrame!=0){
            $frame = new ClaimDetail();
            $frame->transaction_type_id=$balanceFrame->transaction_type->id;
            $frame->claim_id=$claim->id;
            $frame->value=$valueFrame;
            $frame->save();
        }
        if($valueLensa!=0){
            $lensa = new ClaimDetail();
            $lensa->transaction_type_id=$balanceLensa->transaction_type->id;
            $lensa->claim_id=$claim->id;
            $lensa->value=$valueLensa;
            $lensa->save();
        }
        return redirect()->intended(route('request.list'));
    }
    	
    	
}
