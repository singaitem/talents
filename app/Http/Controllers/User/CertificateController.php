<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Certificate;
use App\SettingRequest;
use App\TransactionCategory;
use App\RequestDetail;
use Carbon\Carbon;
use App\Claim;
use App\ClaimAttachment;
use App\RequestCertificate;

class CertificateController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        return view('user.myhr.certificate');
    }
    public function create(){
        return view('user.myhr.certificate-new');
    }
    public function detail(Certificate $certificate){
        return view('user.myhr.certificate-detail',compact('certificate'));
    }
    public function addCertificate(){
        $settingCertificate = SettingRequest::
        join('transaction_categories','category_id','=','transaction_categories.id')
        ->where('transaction_categories.name','Certificate')->first();

        $certificate = TransactionCategory::where('name','Certificate')->first();

        // Create Request
        $request = new \App\Request();
        $request->status='Waiting for Approval';
        $request->save();
        $isFirst=true;
        foreach($settingCertificate->details as $setting){
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
        $claim1->transaction_category_id = $certificate->id;
        $claim1->name='PN/'.$tr_date->format('Ymd').'/'.$invNoUrut;
        $claim1->transaction_date=$tr_date;
        $claim1->total_value=0;
        $claim1->info='Add new Certificate';
        $claim1->description='';
        $claim1->save();

        $reqCert = new RequestCertificate();
        $reqCert->claim_id=$claim1->id;
        $reqCert->no = request("no");
        $reqCert->name = request("name");
        $reqCert->type = request("lifetime");
        $reqCert->year=request("year");
        $reqCert->principle=request("principle");
        $reqCert->description=request("description");
        $reqCert->save();
        return redirect()->intended(route('request.personal'));
    }
        
}
