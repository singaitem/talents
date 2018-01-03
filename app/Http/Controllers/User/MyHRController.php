<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\HomeBase;
use App\Family;
use App\Address;
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
    public function familyDetail(Family $family){
        return view('user.myhr.family-update',compact('family'));
    }
    public function familyCreate(){
        return view('user.myhr.family-new');
    }
        
    public function address(){
        return view('user.myhr.address');
    }
    public function addressDetail(Address $address){
        $homebases = HomeBase::all();
        return view('user.myhr.address-update',compact('address','homebases'));
    }
    public function addressCreate(){
        $homebases = HomeBase::all();
        return view('user.myhr.address-new',compact('homebases'));
    }
        
        
    public function certificate(){
        return view('user.myhr.certificate');
    }
    public function certificateCreate(){
        return view('user.myhr.certificate-new');
    }
        
        
        
}
