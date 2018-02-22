<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Address;
use App\HomeBase;
use App\SettingRequest;
use App\TransactionCategory;
use App\RequestDetail;
use Carbon\Carbon;
use App\Claim;
use App\ClaimAttachment;
use App\RequestAddress;
class AddressController extends Controller
{   
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        return view('user.myhr.address');
    }
    public function detail(Address $address){
        $homebases = HomeBase::all();
        return view('user.myhr.address-update',compact('address','homebases'));
    }
    public function create(){
        $homebases = HomeBase::all();
        return view('user.myhr.address-new',compact('homebases'));
    }
    public function addAddress(){
        $settingAddress = SettingRequest::
        join('transaction_categories','category_id','=','transaction_categories.id')
        ->where('transaction_categories.name','Address')->first();

        $address = TransactionCategory::where('name','Address')->first();

        // Create Request
        $request = new \App\Request();
        $request->status='Waiting for Approval';
        $request->save();
        $isFirst=true;
        foreach($settingAddress->details as $setting){
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


        $tr_date = Carbon::now();
        $noUrut = Claim::where('transaction_date',$tr_date->format('Y-m-d'))->count();
        $noUrut++;
        $invNoUrut = str_pad($noUrut, 3, '0', STR_PAD_LEFT);
        $claim1 = new Claim();
        $claim1->employee_id=auth()->user()->employee->id;
        $claim1->request_id=$request->id;
        $claim1->transaction_category_id = $address->id;
        $claim1->name='PN/'.$tr_date->format('Ymd').'/'.$invNoUrut;
        $claim1->transaction_date=$tr_date;
        $claim1->total_value=0;
        $claim1->info='Add new Address';
        $claim1->description='';
        $claim1->save();

        $reqAddress = new RequestAddress();
        $reqAddress->claim_id=$claim1->id;
        $reqAddress->name=request("addressTxt");
        $reqAddress->homebase_id = request("homebase");
        $reqAddress->district = request("district");
        $reqAddress->subdistrict=request("subdistrict");
        $reqAddress->rt=request("rt");
        $reqAddress->rw=request("rw");
        $reqAddress->stay_status=request("stay_status");
        $reqAddress->zip_code=request("zipcode");
        if(request("primary")=='on'){
            $reqAddress->primary_address=true;
        }
        $reqAddress->save();
        return redirect()->intended(route('request.personal'));
    }
    public function changeAddress(Address $oldAddress){
         $settingAddress = SettingRequest::
        join('transaction_categories','category_id','=','transaction_categories.id')
        ->where('transaction_categories.name','Address')->first();

        $address = TransactionCategory::where('name','Address')->first();

        // Create Request
        $request = new \App\Request();
        $request->status='Waiting for Approval';
        $request->save();
        $isFirst=true;
        foreach($settingAddress->details as $setting){
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


        $tr_date = Carbon::now();
        $noUrut = Claim::where('transaction_date',$tr_date->format('Y-m-d'))->count();
        $noUrut++;
        $invNoUrut = str_pad($noUrut, 3, '0', STR_PAD_LEFT);
        $claim1 = new Claim();
        $claim1->employee_id=auth()->user()->employee->id;
        $claim1->request_id=$request->id;
        $claim1->transaction_category_id = $address->id;
        $claim1->name='PN/'.$tr_date->format('Ymd').'/'.$invNoUrut;
        $claim1->transaction_date=$tr_date;
        $claim1->total_value=0;
        $claim1->info='Update Address';
        $claim1->description='';
        $claim1->save();

        $reqAddress = new RequestAddress();
        $reqAddress->address_id=$oldAddress->id;
        $reqAddress->claim_id=$claim1->id;
        $reqAddress->name=request("addressTxt");
        $reqAddress->homebase_id = request("homebase");
        $reqAddress->district = request("district");
        $reqAddress->subdistrict=request("subdistrict");
        $reqAddress->rt=request("rt");
        $reqAddress->rw=request("rw");
        $reqAddress->stay_status=request("stay_status");
        $reqAddress->zip_code=request("zipcode");
        if(request("primary")=='on'){
            $reqAddress->primary_address=true;
        }
        $reqAddress->save();
        return redirect()->intended(route('request.personal'));
    }
          
        
}
