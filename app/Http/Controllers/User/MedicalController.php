<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\TransactionCategory;
use App\Balance;

class MedicalController extends Controller
{
    public function index(){
    	$transaction_categories = TransactionCategory::where('name','Kacamata')->first();
        $balance = Balance::where('employee_id',auth()->user()->employee->id)
        ->where('transaction_category_id',$transaction_categories->id)->first();
    	return view('user.self_service.medical',compact('transaction_categories','balance'));
    }
    	
}
