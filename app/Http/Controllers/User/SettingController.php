<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\SettingRequest;
use App\Position;
class SettingController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
    	return view('user.setting.index');
    }
    public function marital(){
    	$setting = $this->settingRequestCategory('Change Marital Status');
    	return view('user.setting.marital',compact('setting'));
	}
	public function family(){
		$setting = $this->settingRequestCategory('Family');
		return view('user.setting.family',compact('setting'));
	}
    public function address(){
        $setting = $this->settingRequestCategory('Address');
        return view('user.setting.address',compact('setting'));
    }
    public function certificate(){
        $setting = $this->settingRequestCategory('Certificate');
        return view('user.setting.certificate',compact('setting'));
    }
    public function eyeglasses(){
        $setting = $this->settingRequestCategory('Kacamata');
        return view('user.setting.eyeglasses',compact('setting'));   
    }
    public function medical(){
        $setting = $this->settingRequestCategory('Medical');
        return view('user.setting.medical',compact('setting'));
    }
    public function medicaloverlimit(){
        $setting = $this->settingRequestCategory('Medical Overlimit');
        return view('user.setting.medicaloverlimit',compact('setting'));
    }
    public function businesstravel(){
        $setting = $this->settingRequestCategory('Business Travel');
        return view('user.setting.businesstravel',compact('setting'));
    }
    public function spdadvance(){
        $setting = $this->settingRequestCategory('SPD Advance');
        return view('user.setting.spdadvance',compact('setting'));
    }
    public function wedding(){
        $setting = $this->settingRequestCategory('Wedding');
        return view('user.setting.wedding',compact('setting'));
    }
    public function settingRequestCategory($category){
        return SettingRequest::join('transaction_categories','setting_requests.category_id','=','transaction_categories.id')->where('transaction_categories.name',$category)->select('setting_requests.*')->first();
    }
    public function approver(){
        $positions = Position::all();
        return view('user.setting.approver',compact('positions'));
    }
    public function updateApprove(SettingRequest $setting){
        $positions = Position::all();
        return view('user.setting.update-approver',compact('positions','setting'));
    }
        
        
                
		
    			
}
