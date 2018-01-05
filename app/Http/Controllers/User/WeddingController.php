<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WeddingController extends Controller
{
    public function index(){
    	return view('user.self_service.wedding');
    }
    	
}
