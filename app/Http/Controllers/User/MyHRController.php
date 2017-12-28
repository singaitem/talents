<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MyHRController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
    	return view('user.myhr.profile');
    }
    public function family()
    {
    	return view('user.myhr.family');	
    }
}
