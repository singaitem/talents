<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\HomeBase;
use App\Family;
use App\Address;
use App\Certificate;
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
    public function marital(){
    	dd('not done');
    }
    	
    
}
