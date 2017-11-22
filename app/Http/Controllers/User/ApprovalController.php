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
    	$allClaim = Claim::all();
        return view('user.approval.benefit',['claims'=>$allClaim]);
    }
    public function detail(Claim $claim){
    	return view('user.approval.detail',['claim'=>$claim]);
    }
    	
    	
}
