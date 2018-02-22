<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Family;
use App\SettingRequest;
use App\TransactionCategory;
use App\RequestDetail;
use Carbon\Carbon;
use App\Claim;
use App\ClaimAttachment;
use App\RequestFamily;

class FamilyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
    	return view('user.myhr.family');	
    }
    public function detail(Family $family){
        return view('user.myhr.family-update',compact('family'));
    }
    public function create(){
        return view('user.myhr.family-new');
    }
    public function addFamily(){
        $settingFamily = SettingRequest::
        join('transaction_categories','category_id','=','transaction_categories.id')
        ->where('transaction_categories.name','Family')->first();

        $family = TransactionCategory::where('name','Family')->first();

        // Create Request
        $request = new \App\Request();
        $request->status='Waiting for Approval';
        $request->save();
        $isFirst=true;
        foreach($settingFamily->details as $setting){
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
        $claim1->transaction_category_id = $family->id;
        $claim1->name='PN/'.$tr_date->format('Ymd').'/'.$invNoUrut;
        $claim1->transaction_date=$tr_date;
        $claim1->total_value=0;
        $claim1->info='Add new Family Members';
        $claim1->description='';
        $claim1->save();
        $reqFamily = new RequestFamily();
        $reqFamily->claim_id=$claim1->id;
        $reqFamily->name=request("fullname");
        $reqFamily->relationship = request("relationship");
        $reqFamily->placeofbirth = request("placeofbirth");
        $reqDOB =  request("dateofbirth");
        $strDOB = str_replace('/', '-', $reqDOB);
        $dateDOB = date('Y-m-d', strtotime($strDOB));
        $reqFamily->dateofbirth = $dateDOB;
        $reqFamily->alive_status=request("alivestatus");
        $reqFamily->gender=request("gender");
        $reqFamily->marital_status=request("marital");
        $reqFamily->identity_no=request("identity");
        $reqFamily->family_card_no=request("familycard");
        $reqFamily->address=request("address");
        $reqFamily->save();
        if (request()->hasFile('image1')) {
            $photoName = time().'.'.request()->file('image1')->getClientOriginalExtension();
            request()->file('image1')->move(public_path('img/upload/'), $photoName);
            $claimAttachment = new ClaimAttachment();
            $claimAttachment->claim_id=$claim1->id;
            $claimAttachment->name=$photoName;
            $claimAttachment->save();
        }
        if (request()->hasFile('image2')) {
            $photoName = time().'.'.request()->file('image2')->getClientOriginalExtension();
            request()->file('image2')->move(public_path('img/upload/'), $photoName);
            $claimAttachment = new ClaimAttachment();
            $claimAttachment->claim_id=$claim1->id;
            $claimAttachment->name=$photoName;
            $claimAttachment->save();
        }
        return redirect()->intended(route('request.personal'));
    }
    public function changeFamily(Family $oldFamily){
        $settingFamily = SettingRequest::
        join('transaction_categories','category_id','=','transaction_categories.id')
        ->where('transaction_categories.name','Family')->first();

        $family = TransactionCategory::where('name','Family')->first();

        // Create Request
        $request = new \App\Request();
        $request->status='Waiting for Approval';
        $request->save();
        $isFirst=true;
        foreach($settingFamily->details as $setting){
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
        $claim1->transaction_category_id = $family->id;
        $claim1->name='PN/'.$tr_date->format('Ymd').'/'.$invNoUrut;
        $claim1->transaction_date=$tr_date;
        $claim1->total_value=0;
        $claim1->info='Update Family Members';
        $claim1->description='';
        $claim1->save();
        $reqFamily = new RequestFamily();
        $reqFamily->family_id=$oldFamily->id;
        $reqFamily->claim_id=$claim1->id;
        $reqFamily->name=request("fullname");
        $reqFamily->relationship = request("relationship");
        $reqFamily->placeofbirth = request("placeofbirth");
        $reqDOB =  request("dateofbirth");
        $strDOB = str_replace('/', '-', $reqDOB);
        $dateDOB = date('Y-m-d', strtotime($strDOB));
        $reqFamily->dateofbirth = $dateDOB;
        $reqFamily->alive_status=request("alivestatus");
        $reqFamily->gender=request("gender");
        $reqFamily->marital_status=request("marital");
        $reqFamily->identity_no=request("identity");
        $reqFamily->family_card_no=request("familycard");
        $reqFamily->address=request("address");
        $reqFamily->save();
        if (request()->hasFile('image1')) {
            $photoName = time().'.'.request()->file('image1')->getClientOriginalExtension();
            request()->file('image1')->move(public_path('img/upload/'), $photoName);
            $claimAttachment = new ClaimAttachment();
            $claimAttachment->claim_id=$claim1->id;
            $claimAttachment->name=$photoName;
            $claimAttachment->save();
        }
        if (request()->hasFile('image2')) {
            $photoName = time().'.'.request()->file('image2')->getClientOriginalExtension();
            request()->file('image2')->move(public_path('img/upload/'), $photoName);
            $claimAttachment = new ClaimAttachment();
            $claimAttachment->claim_id=$claim1->id;
            $claimAttachment->name=$photoName;
            $claimAttachment->save();
        }
        return redirect()->intended(route('request.personal'));
    }
        
        
}
