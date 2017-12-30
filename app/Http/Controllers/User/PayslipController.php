<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\MonthlySalary;
class PayslipController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }
    public function monthly(){
    	$monthlies = MonthlySalary::where('employee_id',auth()->user()->employee->id)->get();
    	return view('user.self_service.payslip.monthly',compact('monthlies'));
    }
    	
}
