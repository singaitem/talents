<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\TransactionCategory;
use App\Balance;
use App\Claim;
class SPDAdvanceController extends Controller
{
	public function index(){
		$transaction_categories = TransactionCategory::where('name','Kacamata')->first();
        $balance = Balance::where('employee_id',auth()->user()->employee->id)
        ->where('transaction_category_id',$transaction_categories->id)->first();
        $spdAdvance = TransactionCategory::where('name','SPD Advance')->first();
        $claimSPD = Claim::where('transaction_category_id',$spdAdvance->id)->where('employee_id',auth()->user()->employee->id)->get();
    	return view('user.self_service.spdadvance',compact('transaction_categories','balance','claimSPD'));
	}
		
    
}
