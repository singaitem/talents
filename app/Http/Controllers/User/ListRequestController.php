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
    	$allClaim = Claim::where('employee_id',auth()->user()->employee->id)->get();
        return view('user.self_service.list',['claims'=>$allClaim]);
    }
    public function personal()
    {
        $allClaim = Claim::where('employee_id',auth()->user()->employee->id)->get();
        return view('user.self_service.request-personal',['claims'=>$allClaim]);
    }
    	
}
