<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Claim;
use App\RequestDetail;
use App\TransactionCategory;
use App\Balance;
use App\RequestFamily;
use App\Family;
use App\RequestAddress;
use App\Address;
use App\RequestCertificate;
use App\Attachment;
use App\AttachmentDetail;
use App\Certificate;

class ApprovalController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }
    public function personal(){

        $allClaim = Claim::join('transaction_categories','claims.transaction_category_id','=','transaction_categories.id')
        ->join('requests','claims.request_id','=','requests.id')
        ->join('request_details','requests.id','=','request_details.request_id')
        ->where('transaction_categories.module','personalia')
        ->where('requests.status','!=','Canceled')
        ->where(function($query) {
            $query->where('request_details.request_to',auth()->user()->employee->id)
            ->orWhere('request_details.request_to_position',auth()->user()->employee->position->id);
        })
        ->select('claims.*','request_details.status')
        ->orderBy('claims.name','desc')
        ->get();
        return view('user.approval.personal',['claims'=>$allClaim]);   
    }
        
    public function benefit(){

    	$allClaim = Claim::join('transaction_categories','claims.transaction_category_id','=','transaction_categories.id')
        ->join('requests','claims.request_id','=','requests.id')
        ->join('request_details','requests.id','=','request_details.request_id')
        ->where('transaction_categories.module','benefit')
        ->where('requests.status','!=','Canceled')
        ->where(function($query) {
            $query->where('request_details.request_to',auth()->user()->employee->id)
            ->orWhere('request_details.request_to_position',auth()->user()->employee->position->id);
        })
        ->select('claims.*','request_details.status')
        ->orderBy('claims.name','desc')
        ->get();
        $withoutPending = array();
        foreach ($allClaim as $claim) {
            $hasPending = $claim->request->hasPending();
            if($hasPending==false){
                array_push($withoutPending, $claim);
            }
        }
        return view('user.approval.benefit',['claims'=>$withoutPending]);
    }
    public function detail(Claim $claim){
        $flagShow = true;
        $requestDetail = $claim->request->getWaitingRequestAuth();
        if($requestDetail==null){
            $flagShow = false;
        }
    	return view('user.approval.detail',compact('claim','flagShow'));
    }
    	
    public function approve(Claim $claim){
        $requestDetail = $claim->request->getWaitingRequestAuth();
        $nextRequestDetail = $claim->request->getNextWaitingRequestAuth();
        if($requestDetail!=null){
            $requestDetail->status='Approved';
            $requestDetail->save();
            if($nextRequestDetail==null){
                if($claim->transaction_category->name=='Medical Overlimit'){
                    $catMedical = TransactionCategory::where('name','Medical')->first();
                    $balance = Balance::where('employee_id',$claim->employee->id)
                    ->where('transaction_category_id',$catMedical->id)->first();
                    $balanceMedical = $balance->findDetail('Medical');
                    $balanceMedical->adjustment = $balanceMedical->limit;
                    $balanceMedical->value = $balanceMedical->limit+$balanceMedical->adjustment-$balanceMedical->used;
                    $balanceMedical->save();
                }else if($claim->transaction_category->name=='Family'){
                    $reqFamily = RequestFamily::where('claim_id',$claim->id)->first();
                    if($reqFamily->family_id!=null){
                        $family = $reqFamily->family;
                    }else{
                        $family = new Family();
                    }
                    $family->name=$reqFamily->name;
                    $family->person_id=$claim->employee->person->id;
                    $family->relationship = $reqFamily->relationship;
                    $family->placeofbirth = $reqFamily->placeofbirth;
                    $family->dateofbirth = $reqFamily->dateofbirth;
                    $family->alive_status= $reqFamily->alive_status;
                    $family->gender= $reqFamily->gender;
                    $family->marital_status = $reqFamily->marital_status;
                    $family->identity_no = $reqFamily->identity_no;
                    $family->family_card_no= $reqFamily->family_card_no;
                    $family->address = $reqFamily->address;
                    $family->save();
                }else if($claim->transaction_category->name=='Address'){
                    $reqAddress= RequestAddress::where('claim_id',$claim->id)->first();
                    if($reqAddress->address_id!=null){
                        $address = $reqAddress->address;
                    }else{
                        $address = new Address();
                    }
                    $address->name=$reqAddress->name;
                    $address->person_id=$claim->employee->person->id;
                    $address->homebase_id = $reqAddress->homebase_id;
                    $address->district = $reqAddress->district;
                    $address->subdistrict = $reqAddress->subdistrict;
                    $address->rt= $reqAddress->rt;
                    $address->rw= $reqAddress->rw;
                    $address->stay_status = $reqAddress->stay_status;
                    $address->zip_code = $reqAddress->zip_code;
                    $address->primary_address= $reqAddress->primary_address;
                    $address->save();
                }else if($claim->transaction_category->name=='Certificate'){
                    $reqCertificate= RequestCertificate::where('claim_id',$claim->id)->first();
                    $attach = new Attachment();
                    $attach->name='Attachment Certificate';
                    $attach->save();
                    foreach ($claim->attachments as $claimAttach) {
                        $attachmentDetail = new AttachmentDetail();
                        $attachmentDetail->attachment_id=$attach->id;
                        $attachmentDetail->name=$claimAttach->name;
                        $attachmentDetail->save();
                    }
                    $certif = new Certificate();
                    $certif->name=$reqCertificate->name;
                    $certif->person_id=$claim->employee->person->id;
                    $certif->attachment_id = $attach->id;
                    $certif->no = $reqCertificate->no;
                    $certif->type = $reqCertificate->type;
                    $certif->year= $reqCertificate->year;
                    $certif->principle= $reqCertificate->principle;
                    $certif->description = $reqCertificate->description;
                    $certif->save();
                }
                $claim->request->status='Approved';
                $claim->request->save();
            }else{
                $nextRequestDetail->status='Waiting';
                $nextRequestDetail->save();
            }
            if($claim->transaction_category->module=="Benefit"){
                return redirect()->intended(route('approve.benefit'));
            }else{
                return redirect()->intended(route('approve.personal'));
            }
            
        }
        return redirect()->intended(route('approve.benefit'));
    }
    public function reject(Claim $claim){
        $requestDetail = $claim->request->getWaitingRequestAuth();
        $requestDetail->status='Rejected';
        $requestDetail->save();
        $claim->request->status="Rejected";
        $claim->request->reason=request('reason');
        $claim->request->save();
        if($claim->transaction_category->module=="Benefit"){
            return redirect()->intended(route('approve.benefit'));
        }else{
            return redirect()->intended(route('approve.personal'));
        }
    }
        
        
}
