<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Claim;
class ApprovalController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }
    public function benefit(){
    	$allRequest = Claim::all();
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
        
}
