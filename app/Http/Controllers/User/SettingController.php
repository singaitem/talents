<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\SettingRequest;
use App\SettingRequestDetail;
use App\Position;
use App\TransactionCategory;
use App\Employee;

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
    public function addApprover(SettingRequest $setting){
        $positions = Position::all();
        return view('user.setting.approver',compact('positions','setting'));
    }
    public function store(SettingRequest $setting){

        $settingdetail = new SettingRequestDetail();
        $settingdetail->setting_request_id = $setting->id;
        if(request("type")==1){
            $settingdetail->type=1;
            $settingdetail->position_id=null;
            $settingdetail->employee_id=null;
        }elseif (request("type")==2) {
            $settingdetail->type=2;
            $settingdetail->position_id=request("position");
            $settingdetail->employee_id=null;
        }elseif (request("type")==3) {
            $settingdetail->type=3;
            $settingdetail->position_id=null;
            $employee = Employee::where('name',request("empno"))->first();
            $settingdetail->employee_id=$employee->id;
        }  
        $settingdetail->save();
        if($settingdetail->setting->category->name=='Change Marital Status'){
            return redirect()->route('setting.marital');
        }
        if($settingdetail->setting->category->name=='Family'){
            return redirect()->route('setting.family');
        }
        if($settingdetail->setting->category->name=='Address'){
            return redirect()->route('setting.address');
        }
        if($settingdetail->setting->category->name=='Certificate'){
            return redirect()->route('setting.certificate');
        }
        if($settingdetail->setting->category->name=='Kacamata'){
            return redirect()->route('setting.eyeglasses');
        }
        if($settingdetail->setting->category->name=='Medical'){
            return redirect()->route('setting.medical');
        }
        if($settingdetail->setting->category->name=='Medical Overlimit'){
            return redirect()->route('setting.medicaloverlimit');
        }
        if($settingdetail->setting->category->name=='Business Travel'){
            return redirect()->route('setting.businesstravel');
        }
        if($settingdetail->setting->category->name=='SPD Advance'){
            return redirect()->route('setting.spdadvance');
        }
        if($settingdetail->setting->category->name=='Wedding'){
            return redirect()->route('setting.wedding');
        }
        return redirect()->route('setting');
    }
        
    public function changeApprover(SettingRequestDetail $settingdetail){
        $positions = Position::all();
        return view('user.setting.update-approver',compact('positions','settingdetail'));
    }
    public function change(SettingRequestDetail $settingdetail){
        if(request("type")==1){
            $settingdetail->type=1;
            $settingdetail->position_id=null;
            $settingdetail->employee_id=null;
        }elseif (request("type")==2) {
            $settingdetail->type=2;
            $settingdetail->position_id=request("position");
            $settingdetail->employee_id=null;
        }elseif (request("type")==3) {
            $settingdetail->type=3;
            $settingdetail->position_id=null;
            $employee = Employee::where('name',request("empno"))->first();
            $settingdetail->employee_id=$employee->id;
        }  
        $settingdetail->save();
        if($settingdetail->setting->category->name=='Change Marital Status'){
            return redirect()->route('setting.marital');
        }
        if($settingdetail->setting->category->name=='Family'){
            return redirect()->route('setting.family');
        }
        if($settingdetail->setting->category->name=='Address'){
            return redirect()->route('setting.address');
        }
        if($settingdetail->setting->category->name=='Certificate'){
            return redirect()->route('setting.certificate');
        }
        if($settingdetail->setting->category->name=='Kacamata'){
            return redirect()->route('setting.eyeglasses');
        }
        if($settingdetail->setting->category->name=='Medical'){
            return redirect()->route('setting.medical');
        }
        if($settingdetail->setting->category->name=='Medical Overlimit'){
            return redirect()->route('setting.medicaloverlimit');
        }
        if($settingdetail->setting->category->name=='Business Travel'){
            return redirect()->route('setting.businesstravel');
        }
        if($settingdetail->setting->category->name=='SPD Advance'){
            return redirect()->route('setting.spdadvance');
        }
        if($settingdetail->setting->category->name=='Wedding'){
            return redirect()->route('setting.wedding');
        }
        return redirect()->route('setting');
    }
    public function delete(SettingRequestDetail $settingdetail){
        $settingdetail->delete();
       if($settingdetail->setting->category->name=='Change Marital Status'){
            return redirect()->route('setting.marital');
        }
        if($settingdetail->setting->category->name=='Family'){
            return redirect()->route('setting.family');
        }
        if($settingdetail->setting->category->name=='Address'){
            return redirect()->route('setting.address');
        }
        if($settingdetail->setting->category->name=='Certificate'){
            return redirect()->route('setting.certificate');
        }
        if($settingdetail->setting->category->name=='Kacamata'){
            return redirect()->route('setting.eyeglasses');
        }
        if($settingdetail->setting->category->name=='Medical'){
            return redirect()->route('setting.medical');
        }
        if($settingdetail->setting->category->name=='Medical Overlimit'){
            return redirect()->route('setting.medicaloverlimit');
        }
        if($settingdetail->setting->category->name=='Business Travel'){
            return redirect()->route('setting.businesstravel');
        }
        if($settingdetail->setting->category->name=='SPD Advance'){
            return redirect()->route('setting.spdadvance');
        }
        if($settingdetail->setting->category->name=='Wedding'){
            return redirect()->route('setting.wedding');
        }
        return redirect()->route('setting');     
    }
                          
        
                
		
    			
}
