<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\HomeBase;
class MyHRController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $homebases = HomeBase::all();
    	return view('user.myhr.profile',['homebases'=>$homebases]);
    }
    public function family()
    {
    	return view('user.myhr.family');	
    }
    public function address(){
        return view('user.myhr.address');
    }
    public function certificate(){
        return view('user.myhr.certificate');
    }
        
        
}
