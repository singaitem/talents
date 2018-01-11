<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class YearlySalary extends Model
{
    public function employee(){
    	return $this->belongsTo(Employee::Class);
    }
    public function monthlies(){
    	return $this->hasMany(MonthlySalary::Class);
    }
    public function details(){
    	return $this->hasMany(YearlySalaryDetail::Class);
    }
    public function detailElementType(String $type){
        $yearlysalarydetail[] = new YearlySalaryDetail();
        array_pop($yearlysalarydetail);
        foreach ($this->details as $ytdd) {
            if($ytdd->element->type==$type){
                array_push($yearlysalarydetail,$ytdd);
            }
            
        }
        return $yearlysalarydetail;
    }
    
}
