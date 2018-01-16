<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\HomeBase;
use App\SettingRequest;
use App\TransactionCategory;
use App\RequestDetail;
use Carbon\Carbon;
use App\Claim;
use App\RequestMarital;
use App\ClaimAttachment;
use App\Person;
class MyHRController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $homebases = HomeBase::all();
    	return view('user.myhr.profile',['homebases'=>$homebases]);
    }
    public function changeMaritalStatus(){
        $marital = TransactionCategory::where('name','Change Marital Status')->first();
        $settingreq = SettingRequest::where('category_id',$marital->id)->first();

        $req1 = new \App\Request();
        $req1->status='Waiting for Approval';
        $req1->save(); 
        $isFirst=true;
        foreach($settingreq->details as $setting){
            $reqdetail1 = new RequestDetail();
            $reqdetail1->request_id=$req1->id;
            if($setting->type==1){
                $reqdetail1->request_to=auth()->user()->employee->supervisor->id;
            }else if($setting->type==2){
                $reqdetail1->request_to_position=$setting->position_id;
            }else if($setting->type==3){
                $reqdetail1->request_to=$setting->employee_id;
            }
            if($isFirst==true){
                $reqdetail1->status ='Waiting';
                $isFirst=false;
            }else{
                $reqdetail1->status='Pending';
            }
            $reqdetail1->save();
        }
        $tr_date = Carbon::today();
        $noUrut = Claim::join('transaction_categories','claims.transaction_category_id','=','transaction_categories.id')->where('transaction_categories.module','Personalia')->where('transaction_date',$tr_date->format('Y-m-d'))->count();
        $noUrut++;
        $invNoUrut = str_pad($noUrut, 3, '0', STR_PAD_LEFT);

        $claim1 = new Claim();
        $claim1->employee_id=auth()->user()->employee->id;
        $claim1->request_id=$req1->id;
        $claim1->transaction_category_id = $marital->id;
        $claim1->name='PN/'.$tr_date->format('Ymd').'/'.$invNoUrut;
        $claim1->transaction_date=$tr_date;
        $claim1->total_value=0;
        $claim1->info='Change Marital Status';
        $claim1->description='';
        $claim1->save();

        $requestMarital = new RequestMarital();
        $requestMarital->person_id=auth()->user()->employee->person->id;
        $requestMarital->claim_id=$claim1->id;
        $requestMarital->marital=request('marital');
        $requestMarital->save();

        if (request()->hasFile('image1')) {
            $photoName = time().'-'.request()->file('image1')->getClientOriginalName();
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
        $homebases = HomeBase::all();
        return view('user.myhr.profile',['homebases'=>$homebases]);
    }
    public function changeProfilePicture(){
        
        if (request()->hasFile('image1')) {
            $photoName = time().'.'.request()->file('image1')->getClientOriginalExtension();
            request()->file('image1')->move(public_path('img/profile_picture/'), $photoName);
            
            $authPer = Person::where('id',auth()->user()->employee->person->id)->first();
            $authPer->picture = $photoName;
            $authPer->save();
        }
        
    }
        

    
}
