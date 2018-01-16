<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Claim;
use App\RequestDetail;
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
            ->orWhere('request_details.request_to_position',auth()->user()->employee->position->name);
        })
        ->select('claims.*')
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
            ->orWhere('request_details.request_to_position',auth()->user()->employee->position->name);
        })
        ->select('claims.*')
        ->orderBy('claims.name','desc')
        ->get();
        return view('user.approval.benefit',['claims'=>$allClaim]);
    }
    public function detail(Claim $claim){
    	return view('user.approval.detail',['claim'=>$claim]);
    }
    	
    public function approve(Claim $claim){
        $requestDetail = $claim->request->getWaitingRequestAuth();
        if($requestDetail!=null){
            $requestDetail->status='Approved';
            $requestDetail->save();
            return back();
        }
        dd('error');
    }
    public function reject(){
        
    }
        
        
}
