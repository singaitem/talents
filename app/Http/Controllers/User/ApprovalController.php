<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Claim;
use App\RequestDetail;
use Illuminate\Database\Eloquent\Collection;
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
                $claim->request->status='Approved';
                $claim->request->save();
            }else{
                $nextRequestDetail->status='Waiting';
                $nextRequestDetail->save();
            }
            return redirect()->intended(route('approve.benefit'));
        }
        return redirect()->intended(route('approve.benefit'));
    }
    public function reject(){
        
    }
        
        
}
