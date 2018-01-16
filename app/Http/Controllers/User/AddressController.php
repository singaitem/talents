<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Address;
class AddressController extends Controller
{   
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        return view('user.myhr.address');
    }
    public function detail(Address $address){
        $homebases = HomeBase::all();
        return view('user.myhr.address-update',compact('address','homebases'));
    }
    public function create(){
        $homebases = HomeBase::all();
        return view('user.myhr.address-new',compact('homebases'));
    }
        
}
