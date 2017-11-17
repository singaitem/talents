<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\TransactionCategory;
use App\TransactionType;
use App\Claim;
use App\ClaimDetail;
use App\Balance;
class KacamataController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $trCat = TransactionCategory::where('name','Kacamata')->first();
    	return view('user.self_service.kacamata',['transaction_categories'=>$trCat,'status'=>'none']);
    }
    public function confirmation(){
    	$trCat = TransactionCategory::where('name','Kacamata')->first();



    	$emp = auth()->user()->employee;
        $claim = new Claim();
        $claim->employee_id = $emp->id;
        $claim->date=request('transaction_date');
        $totalClaim= request('frame')+request('lensa');

        $balanceFrame = Balance::join('transaction_types','transaction_type_id','=','transaction_types.id')
            ->where('employee_id',$emp->id)
            ->where('transaction_types.name','Frame')->first();
        $balanceCategory = Balance::join('transaction_types','transaction_type_id','=','transaction_types.id')
            ->where('employee_id',$emp->id)
            ->where('transaction_types.name',request('selected_category'))->first();
        if($totalClaim>$balanceFrame->value){
            $claim->total_value = $balanceFrame->value;
        }else{
            $claim->total_value = $totalClaim;
        }

        $claimdetails =  array();
        if(request('frame')!=0&&request('frame')!=null){
            $transaction_frame = TransactionType::where('name','Frame')->first();
            $frame = new ClaimDetail();
            $frame->transaction_type_id=$transaction_frame->id;
            $frame->value=request('frame');
            $claimdetails['frame']=$frame;
        }
        if(request('lensa')!=0&&request('lensa')!=null){
            $transaction_lensa = TransactionType::where('name',request('selected_type'))->first();
            $lensa = new ClaimDetail();
            $lensa->transaction_type_id=$transaction_lensa->id;
            $lensa->value=request('lensa');
            $claimdetails['lensa']=$lensa;
        }
        
        return view('user.self_service.kacamata',['status'=>'success','claim'=>$claim,'claimdetails'=>$claimdetails,'transaction_categories'=>$trCat,'totalClaim'=>$totalClaim]);
        
    }
    public function store(){
    	
    }
    	
    	
}
