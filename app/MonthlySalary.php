<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class MonthlySalary extends Model
{
    public function employee(){
    	return $this->belongsto(Employee::Class);
    }
    public function yearlysalary(){
    	return $this->belongsTo(YearlySalary::Class);
    }
    public function details(){
    	return $this->hasMany(MonthlySalaryDetail::Class);
    }
    public function paymentDateforHuman(){
        $payment = Carbon::parse($this->payment_start_date);
        $now = Carbon::now();
        $difference = ($payment->diff($now)->days < 1)?'Today': $payment->diffForHumans(); 
        return $difference;    
    }
    public function detailElementType(String $type){
        $monthlysalarydetail[] = new MonthlySalaryDetail();
        array_pop($monthlysalarydetail);
        foreach ($this->details as $mtdd) {
            if($mtdd->element->type==$type){
                array_push($monthlysalarydetail,$mtdd);
            }
            
        }
        return $monthlysalarydetail;
    }
        
            	
    	
    	
    	
}
