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
    public function benefit()
    {
    	$allClaim = Claim::join('transaction_categories','claims.transaction_category_id','=','transaction_categories.id')->where('transaction_categories.module','Benefit')->where('employee_id',auth()->user()->employee->id)->select('claims.*')->orderBy('claims.name','desc')->get();
        return view('user.self_service.list',['claims'=>$allClaim]);
    }
    public function personal()
    {
        $allClaim = Claim::join('transaction_categories','claims.transaction_category_id','=','transaction_categories.id')->where('transaction_categories.module','Personalia')->where('claims.employee_id',auth()->user()->employee->id)->select('claims.*')->orderBy('claims.name','desc')
        ->get();
        return view('user.self_service.request-personal',['claims'=>$allClaim]);
    }
    public function detail(Claim $claim){
        $hideButton = false;
        if($claim->transaction_category->module=="Personalia" || $claim->request->hasApprove()==true){
            $hideButton=true;
        }
        return view('user.request.detail',compact('claim','hideButton'));
    }
    public function cancel(Claim $claim){
        $claim->request->status='Canceled';
        $claim->request->save();
        if($claim->transaction_category->module=="Benefit"){
            return redirect()->intended(route('request.list'));
        }else{
            return redirect()->intended(route('request.personal'));
        }
    }
        
    	
}
