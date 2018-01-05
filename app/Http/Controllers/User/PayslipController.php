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
    	return view('user.self_service.payslip.monthly');
    }
   	public function payslip(MonthlySalary $monthly){
   		return view('user.self_service.payslip.payslip-monthly',compact('monthly'));
   	}
   		
}
