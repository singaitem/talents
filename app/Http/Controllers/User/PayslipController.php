<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\MonthlySalary;
use App\YearlySalary;
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
   	public function yearly(){
      return view('user.self_service.payslip.yearly');
    }
    public function yearlyPayslipDetail(YearlySalary $yearly){
      return view('user.self_service.payslip.payslip-yearly',compact('yearly'));    
    }
        	
}
