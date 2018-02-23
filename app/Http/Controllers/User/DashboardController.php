<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Claim;
use App\RequestDetail;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $allClaim = Claim::where('employee_id',auth()->user()->employee->id)->count();
        $claimBenefit = Claim::join('transaction_categories','claims.transaction_category_id','=','transaction_categories.id')
        ->where('employee_id',auth()->user()->employee->id)
        ->where('transaction_categories.module','Benefit')
        ->count();
        $claimPersonal = Claim::join('transaction_categories','claims.transaction_category_id','=','transaction_categories.id')
        ->where('employee_id',auth()->user()->employee->id)
        ->where('transaction_categories.module','Personalia')
        ->count();
        $pendingRequest = Claim::join('requests','claims.request_id','=','requests.id')
        ->where('employee_id',auth()->user()->employee->id)
        ->where('requests.status','Waiting for Approval')
        ->count();

        $latestclaims = Claim::where('employee_id',auth()->user()->employee->id)
        ->orderBy('name')
        ->take(5)
        ->get();

        return view('user.home',compact('allClaim','claimBenefit','claimPersonal','pendingRequest','latestclaims'));
    }
    public function confirmation(){
    	
    }
    	
}
