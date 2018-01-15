<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Claim;
class ListRequestController extends Controller
{
   	public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
    	$allClaim = Claim::join('transaction_categories','claims.transaction_category_id','=','transaction_categories.id')->where('transaction_categories.module','Benefit')->where('employee_id',auth()->user()->employee->id)->select('claims.*')->get();
        return view('user.self_service.list',['claims'=>$allClaim]);
    }
    public function personal()
    {
        $allClaim = Claim::join('transaction_categories','claims.transaction_category_id','=','transaction_categories.id')->where('transaction_categories.module','Personalia')->where('claims.employee_id',auth()->user()->employee->id)->select('claims.*')
        ->get();
        return view('user.self_service.request-personal',['claims'=>$allClaim]);
    }
    public function detail(Claim $claim){
        return view('user.request.detail',['claim'=>$claim]);
    }
    	
}
