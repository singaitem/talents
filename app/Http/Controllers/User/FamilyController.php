<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FamilyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
    	return view('user.myhr.family');	
    }
    public function detail(Family $family){
        return view('user.myhr.family-update',compact('family'));
    }
    public function create(){
        return view('user.myhr.family-new');
    }
}
